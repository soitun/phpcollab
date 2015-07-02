<?php
/*
** Application name: phpCollab
** Last Edit page: 2004-08-23 
** Path by root: ../includes/library.php
** Authors: Ceam / Fullo 
**
** =============================================================================
**
**               phpCollab - Project Managment 
**
** -----------------------------------------------------------------------------
** Please refer to license, copyright, and credits in README.TXT
**
** -----------------------------------------------------------------------------
** FILE: library.php
**
** DESC: Screen: library file 
**
** -----------------------------------------------------------------------------
** TO-DO:
** move to a better login system and authentication (try to db session)
**
** =============================================================================
**
** New Edit Blocks
** Last Modified: $Date: 2009/02/01 13:52:37 $
** RCS: $Id: library.php,v 1.23 2009/02/01 13:52:37 norman77 Exp $
** -- Edit Log: --
** 2008-11-18   -   Updated the library.php to reflect the new settings object. (dab-norman77)
**
*/

define('APP_ROOT', dirname(dirname(__FILE__)));
// require the autoloader class file
require_once APP_ROOT . '/classes/phpCollab/Autoloader.php';
$autoloader = new \phpCollab\Autoloader();
spl_autoload_register(array($autoloader, 'load'));
if (ini_get('session.auto_start') == 0) {
    $profilSession = "";
}

error_reporting(2039);
@ini_set("session.use_trans_sid", 0);

//disable session on export
if ($export != "true") {
    session_start();
}

// register_globals cheat code
if (ini_get(register_globals) != "1") {
    //GET and POST VARS
    while (list($key, $val) = @each($_REQUEST)) {
        $GLOBALS[$key] = Util::replaceSpecialCharacters($val);
    }
    //$HTTP_SESSION_VARS
    while (list($key, $val) = @each($_SESSION)) {
        $GLOBALS[$key] = Util::replaceSpecialCharacters($val);
    }
    //$HTTP_SERVER_VARS
    while (list($key, $val) = @each($_SERVER)) {
        $GLOBALS[$key] = Util::replaceSpecialCharacters($val);
    }
}

$msg = Util::returnGlobal('msg', 'GET');
$session = Util::returnGlobal('session', 'GET');
$logout = Util::returnGlobal('logout', 'GET');
$idSession = Util::returnGlobal('idSession', 'SESSION');
$dateunixSession = Util::returnGlobal('dateunixSession', 'SESSION');
$loginSession = Util::returnGlobal('loginSession', 'SESSION');
$profilSession = Util::returnGlobal('profilSession', 'SESSION');
$logouttimeSession = Util::returnGlobal('logouttimeSession', 'SESSION');


$parse_start = Util::getMicroTime();

//database update array
$updateDatabase = array(
    0 => "1.0",
    1 => "1.1",
    2 => "1.3",
    3 => "1.4",
    4 => "1.6",
    5 => "1.8",
    6 => "1.9",
    7 => "2.0",
    8 => "2.1",
    9 => "2.5"
);

//languages array
$langValue = array(
    "en" => "English",
    "es" => "Spanish",
    "fr" => "French",
    "it" => "Italian",
    "pt" => "Portuguese",
    "da" => "Danish",
    "no" => "Norwegian",
    "nl" => "Dutch",
    "de" => "German",
    "zh" => "Chinese simplified",
    "uk" => "Ukrainian",
    "pl" => "Polish",
    "in" => "Indonesian",
    "ru" => "Russian",
    "az" => "Azerbaijani",
    "ko" => "Korean",
    "zh-tw" => "Chinese traditional",
    "ca" => "Catalan",
    "pt-br" => "Brazilian Portuguese",
    "et" => "Estonian",
    "bg" => "Bulgarian",
    "ro" => "Romanian",
    "hu" => "Hungarian",
    "cs-iso" => "Czech (iso)",
    "cs-win1250" => "Czech (win1250)",
    "is" => "Icelandic",
    "sk-win1250" => "Slovak (win1250)",
    "tr" => "Turkish",
    "lv" => "Latvian",
    "ar" => "Arabic",
    "ja" => "Japanese"
);


//language browser detection
if ($langDefault == "") {
    if (isset($HTTP_ACCEPT_LANGUAGE)) {
        $plng = explode(",", $HTTP_ACCEPT_LANGUAGE);
        if (count($plng) > 0) {
            while (list($k, $v) = each($plng)) {
                $k = explode(";", $v, 1);
                $k = explode("-", $k[0]);

                if (file_exists("../languages/lang_" . $k[0] . ".php")) {
                    $langDefault = $k[0];
                    break;
                }
                $langDefault = "en";
            }
        } else {
            $langDefault = "en";
        }
    } else {
        $langDefault = "en";
    }
}

//set language session
if ($langDefault != "") {
    $langSelected[$langDefault] = "selected";
} else {
    $langSelected = "";
}

if ($languageSession == "") {
    $lang = $langDefault;
} else {
    $lang = $languageSession;
}


$settings = null;
//settings and date selector includes
if ($indexRedirect == "true") {
    include("includes/settings.php");
//    echo "DEBUG:: Server - " . MYSERVER . "<br />User: " . MYLOGIN . "<br />Database: " . MYDATABASE;
    if (defined('CONVERTED') && CONVERTED) {
        require_once("includes/classes/settings.class.php");
        $settings = new Settings(true);
        $settings->makeGlobal();
    }

    include("includes/initrequests.php");

    include("languages/lang_en.php");
    include("languages/lang_" . $lang . ".php");
    include("languages/help_" . $lang . ".php");
} else {
    include("../includes/settings.php");

    if (defined('CONVERTED') && CONVERTED) {
        require_once("../includes/classes/settings.class.php");
        $settings = new Settings(true);
        $settings->makeGlobal();
    }

    include("../includes/initrequests.php");

    include("../languages/lang_en.php");
    include("../languages/lang_" . $lang . ".php");
    include("../languages/help_" . $lang . ".php");
}

//fix if update from old version
if ($theme == "") {
    $theme = "default";
}
if (!is_resource(THEME)) {
    define('THEME', $theme);
}
if (!is_resource(FTPSERVER)) {
    define('FTPSERVER', '');
}
if (!is_resource(FTPLOGIN)) {
    define('FTPLOGIN', '');
}
if (!is_resource(FTPPASSWORD)) {
    define('FTPPASSWORD', '');
}
if ($uploadMethod == "") {
    $uploadMethod = "PHP";
}
if ($peerReview == "") {
    $peerReview = "true";
}

if ($loginMethod == "") {
    $loginMethod = "PLAIN";
}
if ($databaseType == "") {
    $databaseType = "mysql";
}
if ($installationType == "") {
    $installationType = "online";
}


//check session validity on main phpcollab, except for demo user
if ($checkSession != "false" && $demoSession != "true") {
    if ($profilSession == "3" && !strstr($PHP_SELF, "projects_site")) {
        Util::headerFunction("../projects_site/home.php");
    }

    if ($lastvisitedpage && $profilSession != "0") { // If the user has admin permissions, do not log the last page visited.
        if (!strstr($_SERVER['PHP_SELF'], "graph")) {
            $sidCode = session_name();
            $page = $_SERVER['PHP_SELF'] . "?" . $QUERY_STRING;
            $page = preg_replace('/(&' . $sidCode . '=)([A-Za-z0-9.]*)($|.)/', '', $page);
            $page = preg_replace('/(' . $sidCode . '=)([A-Za-z0-9.]*)($|.)/', '', $page);
            $page = strrev($page);
            $pieces = explode("/", $page);
            $pieces[0] = strrev($pieces[0]);
            $pieces[1] = strrev($pieces[1]);
            $page = $pieces[1] . "/" . $pieces[0];
            $tmpquery = "UPDATE " . $tableCollab["members"] . " SET last_page='$page' WHERE id = '" . Util::fixInt($idSession) . "'";
            Util::connectSql("$tmpquery");
        }
    }
    //if auto logout feature used, store last required page before deconnexion
    if ($profilSession != "3") {
        if ($logouttimeSession != "0" && $logouttimeSession != "") {
            $dateunix = date("U");
            $diff = $dateunix - $dateunixSession;

            if ($diff > $logouttimeSession) {
                Util::headerFunction("../general/login.php?logout=true");
            } else {
                $dateunixSession = $dateunix;
                $_SESSION['dateunixSession'] = $dateunixSession;
            }
        }
    }

    $tmpquery = "WHERE log.login = '" . Util::fixInt($loginSession) . "'";
    $checkLog = new request();
    $checkLog->openLogs($tmpquery);
    $comptCheckLog = count($checkLog->log_id);
    if ($comptCheckLog != "0") {
        if (session_id() != $checkLog->log_session[0]) {
            Util::headerFunction("../index.php?session=false");
        }
    } else {
        Util::headerFunction("../index.php?session=false");
    }
}

//count connected users
if ($checkConnected != "false") {
    $dateunix = date("U");
    $tmpquery1 = "UPDATE " . $tableCollab["logs"] . " SET connected='$dateunix' WHERE login = '$loginSession'";
    Util::connectSql("$tmpquery1");
    $tmpsql = "SELECT * FROM " . $tableCollab["logs"] . " WHERE connected > $dateunix-5*60";
    Util::computeTotal($tmpsql);
    $connectedUsers = $countEnregTotal;
}

//redirect if server/database in error
if ($databaseType == "mysql") {
    if (!@mysql_connect(MYSERVER, MYLOGIN, MYPASSWORD)) {
        Util::headerFunction("../general/error.php?type=myserver");
        exit;
    } else {
        $res = mysql_connect(MYSERVER, MYLOGIN, MYPASSWORD);
    }
    if (!@mysql_select_db(MYDATABASE, $res)) {
        Util::headerFunction("../general/error.php?type=mydatabase");
        exit;
    } else {
        @mysql_close($res);
    }
}

//disable actions if demo user logged in demo mode
if ($action != "") {
    if ($demoSession == "true") {
        $closeTopic = "";
        $addToSiteTask = "";
        $removeToSiteTask = "";
        $addToSiteTopic = "";
        $removeToSiteTopic = "";
        $addToSiteTeam = "";
        $removeToSiteTeam = "";
        $action = "";
        $msg = "demo";
    }
}

//provide id session if trans_sid false on server (if $trans_sid true in settings)
if ($trans_sid == "true") {
    global $transmitSid;
    $transmitSid = session_name() . "=" . session_id();
}

//time variables
if ($gmtTimezone == "true") {
    $date = gmdate("Y-m-d");
    $dateheure = gmdate("Y-m-d H:i");
} else {
    $date = date("Y-m-d");
    $dateheure = date("Y-m-d H:i");
}

//update sorting table if query sort column
if (!empty($sor_cible) && $sor_cible != "" && $sor_champs != "none") {
    $sor_champs = Util::convertData($sor_champs);
    $sor_cible = Util::convertData($sor_cible);

    $tmpquery = "UPDATE " . $tableCollab["sorting"] . " SET $sor_cible='$sor_champs $sor_ordre' WHERE member = '$idSession'";
    Util::connectSql("$tmpquery");
}

//set all sorting values for logged user
$tmpquery = "WHERE sor.member = '" . Util::fixInt($idSession) . "'";
$sortingUser = new request();
$sortingUser->openSorting($tmpquery);

// :-)
$setCopyright = "<!-- Powered by PhpCollab v$version //-->";
?>