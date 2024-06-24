<?php

use phpCollab\Messages\Messages;

$checkSession = "true";
require_once '../includes/library.php';

try {
    $organizations = $container->getOrganizationsManager();
    $tasks = $container->getTasksLoader();
    $teams = $container->getTeams();
} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}

$orgId = $request->query->get('organization');
$userId = $request->query->get('id');

if (empty($userId) || empty($orgId)) {
    Messages::addError(sprintf($strings["error_message"], $strings["blank_organization"]), $session);
    phpCollab\Util::headerFunction("../clients/listclients.php");
}

$userDetail = $members->getMemberById($userId);
if (empty($userDetail)) {
    phpCollab\Util::headerFunction("../clients/viewclient.php?msg=blankUser&id=$orgId");
}
$memberOrganization = $userDetail['mem_organization'];

if ($clientsFilter == "true" && $session->get("profile") == "2") {

    $teamMember = "false";

    $memberTest = $teams->getTeamByTeamMemberAndOrgId($session->get("id"), $memberOrganization);
    if (empty($memberTest)) {
        Messages::addError(sprintf($strings["error_message"], $strings["blank_organization"]), $session);
        phpCollab\Util::headerFunction("../clients/listclients.php");
    }
} elseif ($clientsFilter == "true" && $session->get("profile") == "1") {
    $detailClient = $organizations->getOrganizationByIdAndOwner($orgId, $session->get("id"));
} else {
    $detailClient = $organizations->getOrganizationById($orgId);
}

$comptDetailClient = "0";

if (empty($detailClient)) {
    Messages::addError(sprintf($strings["error_message"], $strings["blank_organization"]), $session);
    phpCollab\Util::headerFunction("../clients/listclients.php");
}

include APP_ROOT . '/views/layout/header.php';

$blockPage = new phpCollab\Block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../clients/listclients.php?", $strings["clients"], "in"));
$blockPage->itemBreadcrumbs($blockPage->buildLink("../clients/viewclient.php?id=$orgId", $detailClient['org_name'],
    "in"));
$blockPage->itemBreadcrumbs($userDetail['mem_login']);
$blockPage->closeBreadcrumbs();

$block1 = new phpCollab\Block();

$block1->form = "cuserD";
$block1->openForm("../users/viewclientuser.php#" . $block1->form . "Anchor", null, $csrfHandler);

if ($session->getFlashBag()->has('errors')) {
    $blockPage->headingError($strings["errors"]);
    foreach ($session->getFlashBag()->get('errors', []) as $error) {
        $blockPage->contentError($error);
    }
} else if (!empty($error)) {
    $blockPage->headingError($strings["errors"]);
    $blockPage->contentError($error);
}

$block1->heading($strings["client_user"]);

$block1->openPaletteIcon();
if ($session->get("profile") == "0" || $session->get("profile") == "1") {
    $block1->paletteIcon(0, "remove", $strings["delete"]);
    $block1->paletteIcon(1, "edit", $strings["edit"]);
}
$block1->paletteIcon(2, "export", $strings["export"]);
$block1->closePaletteIcon();

$block1->openContent();
$block1->contentTitle($strings["user_details"]);

$block1->contentRow($strings["user_name"], $userDetail['mem_login']);
$block1->contentRow($strings["full_name"], $userDetail['mem_name']);
$block1->contentRow($strings["organization"], $userDetail['org_name']);
$block1->contentRow($strings["email"], $userDetail['mem_email_work']);
$block1->contentRow($strings["work_phone"], $userDetail['mem_phone_work']);
$block1->contentRow($strings["home_phone"], $userDetail['mem_phone_home']);
$block1->contentRow($strings["mobile_phone"], $userDetail['mem_mobile']);
$block1->contentRow($strings["fax"], $userDetail['mem_fax']);
$block1->contentRow($strings["comments"], nl2br($userDetail['mem_comments']));
$block1->contentRow($strings["account_created"],
    phpCollab\Util::createDate($userDetail['mem_created'], $session->get("timezone")));
$block1->contentRow($strings["last_page"], $userDetail['mem_last_page']);

$block1->contentTitle($strings["information"]);

$valueTasks = $tasks->getClientUserTasks($userDetail['mem_id']);

$block1->contentRow($strings["tasks"], $valueTasks);

$z = "(Client on project site)";
if ($userDetail['mem_log_connected'] > $dateunix - 5 * 60) {
    $connected_result = $strings["yes"] . " " . $z;
} else {
    $connected_result = $strings["no"];
}
$block1->contentRow($strings["connected"], $connected_result);

$block1->closeContent();
$block1->closeForm();

$block1->openPaletteScript();
if ($session->get("profile") == "0" || $session->get("profile") == "1") {
    $block1->paletteScript(0, "remove", "../users/deleteclientusers.php?id=$userId&organization=$orgId",
        "true,true,true", $strings["delete"]);
    $block1->paletteScript(1, "edit", "../users/updateclientuser.php?userid=$userId&orgid=$orgId", "true,true,true",
        $strings["edit"]);
}
$block1->paletteScript(2, "export", "../users/exportuser.php?id=$userId", "true,true,true", $strings["export"]);
$block1->closePaletteScript("", []);

include APP_ROOT . '/views/layout/footer.php';
