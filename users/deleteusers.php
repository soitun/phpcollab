<?php

use phpCollab\Messages\Messages;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;

$checkSession = "true";
require_once '../includes/library.php';

try {
    $projects = $container->getProjectsLoader();
    $tasks = $container->getTasksLoader();
} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}

$setTitle .= " : Delete User";

$strings = $GLOBALS["strings"];
$msgLabel = $GLOBALS["msgLabel"];

if ($request->isMethod('post')) {
    try {
        if ($csrfHandler->isValid($request->request->get("csrf_token"))) {
            if ($request->request->get("action") == "delete") {
                $assignments = $container->getAssignmentsManager();
                $sorting = $container->getSortingLoader();
                $notifications = $container->getNotificationsManager();
                $teams = $container->getTeams();

                // Check for assigned to value
                $assignTo = !empty($request->request->get("assign_to")) ? $request->request->get("assign_to") : 0;

                if ($assignTo == "0") {
                    $atProject = "1";
                } else {
                    $atProject = $assignTo;
                }

                $id = str_replace("**", ",", $request->request->get('id'));

                $listProjects = $projects->getProjectsByOwner($id);

                foreach ($listProjects as $project) {
                    $listTeams = $teams->getTeamByProjectIdAndTeamMember($project["pro_id"], $atProject);
                    $comptListTeams = count($listTeams);

                    // Why are we adding a team member if we are in the "delete" page?
                    if ($comptListTeams == "0") {
                        $teams->addTeam($project["pro_id"], $atProject, 1, 0);
                    }
                }

                // Delete user from members table
                $members->deleteMemberByIdIn($id);

                // Reassign projects to new owner
                $projects->reassignProject($id, $atProject);

                // Reassign tasks to new owner
                $tasks->reassignTasks($id, $assignTo);

                // Reassign assignments to new owner
                $assignments->reassignAssignmentByAssignedTo($assignTo, $dateheure, $id);

                // Remove user form sorting table
                $sorting->deleteByMember($id);

                // Remove user notifications
                $notifications->deleteNotificationsByMemberIdIn($id);

                // Remove user from teams
                $teams->deleteTeamWhereMemberIn($id);
                //if mantis bug tracker enabled
                if ($enableMantis == "true") {
                    // Call mantis function to remove user
                    include("../mantis/user_delete.php");
                }

                phpCollab\Util::headerFunction("../users/listusers.php?msg=delete");
            }
        }
    } catch (InvalidCsrfTokenException $csrfTokenException) {
        $logger->error('CSRF Token Error', [
            'Users: Delete user(s)',
            '$_SERVER["REMOTE_ADDR"]' => $request->server->get("REMOTE_ADDR"),
            '$_SERVER["HTTP_X_FORWARDED_FOR"]'=> $request->server->get('HTTP_X_FORWARDED_FOR')
        ]);
    } catch (Exception $e) {
        $logger->critical('Exception', ['Error' => $e->getMessage()]);
        Messages::addError(sprintf($strings["error_message"], $strings["no_permissions"]), $session);
    }
}

include APP_ROOT . '/views/layout/header.php';

$blockPage = new phpCollab\Block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../administration/admin.php?", $strings["administration"], "in"));
$blockPage->itemBreadcrumbs($blockPage->buildLink("../users/listusers.php?", $strings["user_management"], "in"));
$blockPage->itemBreadcrumbs($strings["delete_users"]);
$blockPage->closeBreadcrumbs();

if ($session->getFlashBag()->has('message')) {
    $blockPage->messageBox( $session->getFlashBag()->get('message')[0] );
} else if ($msg != "") {
    include '../includes/messages.php';
    $blockPage->messageBox($msgLabel);
}

$block1 = new phpCollab\Block();

$block1->form = "user_delete";
$block1->openForm("../users/deleteusers.php", null, $csrfHandler);

if ($session->getFlashBag()->has('errors')) {
    $blockPage->headingError($strings["errors"]);
    foreach ($session->getFlashBag()->get('errors', []) as $error) {
        $blockPage->contentError($error);
    }
} else if (!empty($error)) {
    $blockPage->headingError($strings["errors"]);
    $blockPage->contentError($error);
}

$block1->heading($strings["delete_users"]);

$block1->openContent();
$block1->contentTitle($strings["delete_following"]);

$id = str_replace("**", ",", $request->query->get('id'));
$listMembers = $members->getMembersByIdIn($id);

foreach ($listMembers as $member) {
    echo <<<ROW
    <tr class="odd">
        <td class="leftvalue">&nbsp;</td>
        <td>{$member["mem_login"]}&nbsp;({$member["mem_name"]})</td>
    </tr>
ROW;
}

$totalProjects = count($projects->getProjectsByOwner($id));

$totalTasks = count($tasks->getTasksAssignedTo($id));

// Only show if there are projects or tasks assigned to the user(s)
if ($totalProjects || $totalTasks) {
    $block1->contentTitle($strings["reassignment_user"]);

    if ($totalProjects) {
        echo <<<OWNED_PROJECTS
    <tr class="odd"><td class="leftvalue">&nbsp;</td><td>{$strings["there"]} $totalProjects {$strings["projects"]} {$strings["owned_by"]}</td></tr>
OWNED_PROJECTS;
    }

    if ($totalTasks) {
        echo <<<OWNED_TASKS
    <tr class="odd">
        <td class="leftvalue">&nbsp;</td>
        <td>{$strings["there"]} $totalTasks {$strings["tasks"]} {$strings["owned_by"]}</td>
    </tr>
OWNED_TASKS;
    }

    echo '<tr class="odd"><td class="leftvalue">&nbsp;</td><td><b>' . $strings["reassign_to"] . ' : </b> ';
    $reassignMembersList = $members->getNonClientMembersExcept($id);
    echo '<select name="assign_to">';
    echo '<option value="0" selected>' . $strings["unassigned"] . '</option>';

    foreach ($reassignMembersList as $member) {
        echo '<option value="' . $member["mem_id"] . '">' . $member["mem_login"] . ' / ' . $member["mem_name"] . '</option>';
    }

    echo "</select></td></tr>";
}

echo <<<FORM_BUTTONS
<tr class="odd">
    <td class="leftvalue">&nbsp;</td>
    <td>
        <button type="submit" name="action" value="delete">{$strings["delete"]}</button> 
        <input type="button" name="cancel" value="{$strings["cancel"]}" onClick="history.back();">
        <input type="hidden" value="$id" name="id">
    </td>
</tr>
FORM_BUTTONS;

$block1->closeContent();
$block1->closeForm();

include APP_ROOT . '/views/layout/footer.php';
