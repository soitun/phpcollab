<?php

$checkSession = "true";
require_once '../includes/library.php';

try {
    $teams = $container->getTeams();
    $tasks = $container->getTasksLoader();
    $notes = $container->getNotesLoader();
} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}

$id = $request->query->get('id');
$strings = $GLOBALS["strings"];
$msgLabel = $GLOBALS["msgLabel"];

$userDetail = $members->getMemberById($id);

if ($userDetail["mem_profil"] == "3") {
    phpCollab\Util::headerFunction("../users/viewclientuser.php?id=$id&organization=" . $userDetail["mem_organization"]);
}

if ($comptUserDetail == "0") {
    phpCollab\Util::headerFunction("../users/listusers.php?msg=blankUser");
}

$setTitle .= " : User Management (" . $userDetail["mem_login"] . ")";


include APP_ROOT . '/views/layout/header.php';

$blockPage = new phpCollab\Block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../administration/admin.php?", $strings["administration"], "in"));
$blockPage->itemBreadcrumbs($blockPage->buildLink("../users/listusers.php?", $strings["user_management"], "in"));
$blockPage->itemBreadcrumbs($userDetail["mem_login"]);
$blockPage->closeBreadcrumbs();

if ($session->getFlashBag()->has('message')) {
    $blockPage->messageBox( $session->getFlashBag()->get('message')[0] );
} else if ($msg != "") {
    include '../includes/messages.php';
    $blockPage->messageBox($msgLabel);
}

$block1 = new phpCollab\Block();

$block1->form = "userD";
$block1->openForm("../users/viewuser.php#" . $block1->form . "Anchor", null, $csrfHandler);

if ($session->getFlashBag()->has('errors')) {
    $blockPage->headingError($strings["errors"]);
    foreach ($session->getFlashBag()->get('errors', []) as $error) {
        $blockPage->contentError($error);
    }
} else if (!empty($error)) {
    $blockPage->headingError($strings["errors"]);
    $blockPage->contentError($error);
}

$block1->heading($strings["user_profile"]);

$block1->openPaletteIcon();
if ($session->get("profile") == "0") {
    if ($id != "1" && $id != "2") {
        $block1->paletteIcon(0, "remove", $strings["delete"]);
    }
    $block1->paletteIcon(1, "edit", $strings["edit"]);
}
$block1->paletteIcon(2, "export", $strings["export"]);
$block1->paletteIcon(3, "email", $strings["email"]);
$block1->closePaletteIcon();

$block1->openContent();
$block1->contentTitle($strings["user_details"]);

$block1->contentRow($strings["user_name"], $userDetail["mem_login"]);
$block1->contentRow($strings["full_name"], $userDetail["mem_name"]);
$block1->contentRow($strings["title"], $userDetail["mem_title"]);
$block1->contentRow($strings["email"],
    $blockPage->buildLink($userDetail["mem_email_work"], $userDetail["mem_email_work"], "mail"));
$block1->contentRow($strings["work_phone"], $userDetail["mem_phone_work"]);
$block1->contentRow($strings["home_phone"], $userDetail["mem_phone_home"]);
$block1->contentRow($strings["mobile_phone"], $userDetail["mem_mobile"]);
$block1->contentRow($strings["fax"], $userDetail["mem_fax"]);


if ($userDetail["mem_profil"] == "0") {
    $permission = $strings["administrator_permissions"];
} elseif ($userDetail["mem_profil"] == "1") {
    $permission = $strings["project_manager_permissions"];
} elseif ($userDetail["mem_profil"] == "2") {
    $permission = $strings["user_permissions"];
} elseif ($userDetail["mem_profil"] == "4") {
    $permission = $strings["disabled_permissions"];
} elseif ($userDetail["mem_profil"] == "5") {
    $permission = $strings["project_manager_administrator_permissions"];
}
$block1->contentRow($strings["permissions"], $permission ?? '');

$block1->contentRow($strings["comments"], nl2br($userDetail["mem_comments"]));
$block1->contentRow($strings["account_created"],
    phpCollab\Util::createDate($userDetail["mem_created"], $session->get('timezone')));
$block1->contentRow($strings["last_page"], $userDetail["mem_last_page"]);
$block1->contentTitle($strings["information"]);

$valueProjects = count($teams->getTeamsImAMemberOf($userDetail["mem_id"]));

$valueTasks = count($tasks->getTasksAssignedToMeThatAreNotCompletedOrSuspended($userDetail["mem_id"]));

$valueNotes = count($notes->getMyNotesWhereProjectIsNotCompletedOrSuspended($userDetail["mem_id"]));

$block1->contentRow($strings["projects"], $valueProjects);
$block1->contentRow($strings["tasks"], $valueTasks);
$block1->contentRow($strings["notes"], $valueNotes);

if ($userDetail["mem_log_connected"] > $dateunix - 5 * 60) {
    $connected_result = $strings["yes"] . " " . $z;
} else {
    $connected_result = $strings["no"];
}
$block1->contentRow($strings["connected"], $connected_result);

$block1->closeContent();
$block1->closeForm();

$block1->openPaletteScript();
if ($session->get("profile") == "0") {
    if ($id != "1" && $id != "2") {
        $block1->paletteScript(0, "remove", "../users/deleteusers.php?id=$id&", "true,true,true", $strings["delete"]);
    }
    $block1->paletteScript(1, "edit", "../users/edituser.php?id=$id&", "true,true,true", $strings["edit"]);
}
$block1->paletteScript(2, "export", "../users/exportuser.php?id=$id&", "true,true,true", $strings["export"]);
$block1->paletteScript(3, "email", "../users/emailusers.php?id=$id&", "true,true,true", $strings["email"]);
$block1->closePaletteScript("", []);

include APP_ROOT . '/views/layout/footer.php';
