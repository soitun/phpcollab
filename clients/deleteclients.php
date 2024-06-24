<?php
/*
** Application name: phpCollab
** Last Edit page: 2003-10-23
** Path by root: ../clients/deleteclients.php
** Authors: Ceam / Fullo
** =============================================================================
**
**               phpCollab - Project Management
**
** -----------------------------------------------------------------------------
** Please refer to license, copyright, and credits in README.TXT
**
** -----------------------------------------------------------------------------
** FILE: deleteclients.php
**
** DESC: screen: delete client info
**
** HISTORY:
** 	2003-10-23	-	main page for client module
** -----------------------------------------------------------------------------
** TO-DO:
**
** =============================================================================
*/


use phpCollab\Messages\Messages;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;

$checkSession = "true";
require_once '../includes/library.php';

try {
    $clients = $container->getOrganizationsManager();
    $projects = $container->getProjectsLoader();
} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}

$id = $request->query->get("id");

if ($request->isMethod('post')) {
    try {
        if ($csrfHandler->isValid($request->request->get("csrf_token"))) {

            if ($request->request->get("action") == "delete") {

                $id = str_replace("**", ",", $id);

                $listOrganizations = $clients->getOrganizationsOrderedByName($id);

                foreach ($listOrganizations as $org) {
                    if (file_exists("logos_clients/" . $org['org_id'] . "." . $org['org_extension_logo'])) {
                        unlink("logos_clients/" . $org['org_id'] . "." . $org['org_extension_logo']);
                    }
                }

                try {
                    $deleteOrg = $clients->deleteClient($id);

                    $setDefaultOrg = $projects->setDefaultOrg($id);
                    $deleteMembers = $members->deleteMemberByOrgId($id);

                    Messages::add(sprintf($strings["success"], $strings["deletion_succeeded"]), $session);
                    phpCollab\Util::headerFunction("../clients/listclients.php");
                } catch (Exception $e) {
                    echo 'Message: ' . $e->getMessage();
                    Messages::addError(sprintf($strings["error_message"], $e->getMessage()), $session);
                }
            }
        }
    } catch (InvalidCsrfTokenException $csrfTokenException) {
        $logger->error('CSRF Token Error', [
            'Clients: Delete Client',
            '$_SERVER["REMOTE_ADDR"]' => $request->server->get("REMOTE_ADDR"),
            '$_SERVER["HTTP_X_FORWARDED_FOR"]'=> $request->server->get('HTTP_X_FORWARDED_FOR')
        ]);
        Messages::addError(sprintf($strings["error_message"], $strings["genericError"]), $session);
    } catch (Exception $e) {
        $logger->critical('Exception', ['Error' => $e->getMessage()]);
        Messages::addError(sprintf($strings["error_message"], $strings["no_permissions"]), $session);
    }
}


$setTitle .= " : Delete Client";

include APP_ROOT . '/views/layout/header.php';

$blockPage = new phpCollab\Block();
$blockPage->openBreadcrumbs();
$blockPage->itemBreadcrumbs($blockPage->buildLink("../clients/listclients.php?", $strings["clients"], 'in'));
$blockPage->itemBreadcrumbs($strings["delete_organizations"]);
$blockPage->closeBreadcrumbs();

if ($session->getFlashBag()->has('message')) {
    $blockPage->messageBox( $session->getFlashBag()->get('message')[0] );
} else if ($msg != "") {
    include '../includes/messages.php';
    $blockPage->messageBox($msgLabel);
}

$block1 = new phpCollab\Block();

$block1->form = "saP";
$block1->openForm("../clients/deleteclients.php?action=delete&id=$id", null, $csrfHandler);

if ($session->getFlashBag()->has('errors')) {
    $blockPage->headingError($strings["errors"]);
    foreach ($session->getFlashBag()->get('errors', []) as $error) {
        $blockPage->contentError($error);
    }
} else if (!empty($error)) {
    $blockPage->headingError($strings["errors"]);
    $blockPage->contentError($error);
}

$block1->heading($strings["delete_organizations"]);

$block1->openContent();
$block1->contentTitle($strings["delete_following"]);

$id = str_replace("**", ",", $id);

$listOrganizations = $clients->getOrganizationsOrderedByName($id);

foreach ($listOrganizations as $org) {
    $block1->contentRow("#" . $org['org_id'], $org['org_name']);
}

$block1->contentRow("",
    '<button type="submit" name="action" value="delete">' . $strings["delete"] . '</button> <input type="button" name="cancel" value="' . $strings["cancel"] . '" onClick="history.back();">');

$block1->closeContent();
$block1->closeForm();

$block1->note($strings["delete_organizations_note"]);

include APP_ROOT . '/views/layout/footer.php';
