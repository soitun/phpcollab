<?php

use phpCollab\Util;

$checkSession = "true";
require_once '../includes/library.php';

$setTitle .= " : " . $strings["clients_list"];

include APP_ROOT . '/views/layout/header.php';

try {
    $organizations = $container->getOrganizationsManager();
    $teams = $container->getTeams();

    $blockPage = new phpCollab\Block();
    $blockPage->openBreadcrumbs();
    $blockPage->itemBreadcrumbs($blockPage->buildLink("../clients/listclients.php", $strings["organizations"], 'in'));
    $blockPage->itemBreadcrumbs($strings["organizations"]);
    $blockPage->closeBreadcrumbs();

    if ($session->getFlashBag()->has('message')) {
        $blockPage->messageBox( $session->getFlashBag()->get('message')[0] );
    } else if ($msg != "") {
        include '../includes/messages.php';
        $blockPage->messageBox($msgLabel);
    }

    if ($session->getFlashBag()->has('errors')) {
        $blockPage->headingError($strings["errors"]);
        foreach ($session->getFlashBag()->get('errors', []) as $error) {
            $blockPage->contentError($error);
        }
    } else if (!empty($error)) {
        $blockPage->headingError($strings["errors"]);
        $blockPage->contentError($error);
    }


    $blockPage->setLimitsNumber(1);

    $block1 = new phpCollab\Block();

    $block1->form = "clientList";
    $block1->openForm("../clients/listclients.php#" . $block1->form . "Anchor", null, $csrfHandler);

    $block1->heading($strings["organizations"]);

    $block1->setLimit($blockPage->returnLimit(1));
    $block1->setRowsLimit(20);

    $block1->sorting("organizations", $sortingUser["organizations"], "org.name ASC",
        $sortingFields = array(0 => "org.name", 1 => "org.phone", 2 => "org.url"));

    if ($clientsFilter == "true" && $session->get("profile") == "2") {
        /**
         * If the user role is "user"
         */
        $teamMember = "false";

        $myTeams = $teams->getTeamByMemberId($session->get("id"));

        if (count($myTeams) == "0") {
            $listClients = "false";
        } else {
            $clientsOk = '';
            foreach ($myTeams as $team) {
                $clientsOk .= $team['tea_org2_id'] . ',';
            }

            if ($clientsOk == "") {
                $listClients = "false";
            } else {
                $listOrganizations = $organizations->getFilteredOrganizations($clientsOk, $block1->sortingValue);
            }
        }
    } elseif ($clientsFilter == "true" && $session->get("profile") == "1") {
        /**
         * If the user role is "project manager"
         */
        $listOrganizations = $organizations->getOrganizationsByOwner($session->get("id"), $block1->sortingValue);
    } else {
        $listOrganizations = $organizations->getListOfOrganizations($block1->sortingValue);
    }


    if ($listClients == "false") {
        $comptListOrganizations = 0;
    }

    $block1->openPaletteIcon();
// Show Add icon if Admin or PM
    if ($session->get("profile") == "0" || $session->get("profile") == "1") {
        $block1->paletteIcon(0, "add", $strings["add"]);

        if ($listOrganizations) {
            $block1->paletteIcon(1, "remove", $strings["delete"]);
        }
    }

    if ($listOrganizations) {
        $block1->paletteIcon(2, "info", $strings["view"]);
        if ($session->get("profile") == "0" || $session->get("profile") == "1") {
            $block1->paletteIcon(3, "edit", $strings["edit"]);
        }
    }

    $block1->closePaletteIcon();

    $block1->openPaletteScript();

    if ($session->get("profile") == "0" || $session->get("profile") == "1") {
        $block1->paletteScript(0, "add", "../clients/addclient.php?", "true,false,false", $strings["add"]);
        if ($listOrganizations) {
            $block1->paletteScript(1, "remove", "../clients/deleteclients.php?", "false,true,true", $strings["delete"]);
        }
    }

    if ($listOrganizations) {
        $block1->paletteScript(2, "info", "../clients/viewclient.php?", "false,true,false", $strings["view"]);

        if ($session->get("profile") == "0" || $session->get("profile") == "1") {
            $block1->paletteScript(3, "edit", "../clients/editclient.php?", "false,true,false", $strings["edit"]);
        }
    }

    $block1->closePaletteScript(count($listOrganizations), array_column($listOrganizations, 'org_id'));

    if ($listOrganizations) {
        $block1->setRecordsTotal(count($listOrganizations));
        $block1->openResults();
        $block1->labels($labels = array(0 => $strings["name"], 1 => $strings["phone"], 2 => $strings["url"]), "false");

        foreach ($listOrganizations as $org) {
            $block1->openRow();
            $block1->checkboxRow($org["org_id"]);
            $block1->cellRow($blockPage->buildLink("../clients/viewclient.php?id=" . $org["org_id"], $org["org_name"],
                'in'));
            $block1->cellRow(Util::isBlank($org["org_phone"]));
            $block1->cellRow($blockPage->buildLink($org["org_url"], $org["org_url"], 'out'));
            $block1->closeRow();
        }
        $block1->closeResults();

        $block1->limitsFooter("1", $blockPage->getLimitsNumber(), "", "");

        $block1->closeFormResults();

    } else {
        $block1->noresults();
    }
    include APP_ROOT . '/views/layout/footer.php';

} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}
