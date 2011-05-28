<?php

/**
 * Copyright (C) 2010-2011 Shadez <https://github.com/Shadez>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

// Start sessions
session_start();
// Display all errors
error_reporting(E_ALL);
// Detect main directory
define('WOW_DIRECTORY', dirname(dirname(__FILE__)));
// And check it
if(!defined('WOW_DIRECTORY') || !WOW_DIRECTORY) {
    die('<strong>Fatal Error</strong>: unable to detect directory for system files!');
}
// Load defines
include(WOW_DIRECTORY . '/includes/revision_nr.php');
include(WOW_DIRECTORY . '/includes/UpdateFields.php');
include(WOW_DIRECTORY . '/includes/SharedDefines.php');
// Load Interfaces
include(WOW_DIRECTORY . '/includes/interfaces/interface.db.php');
include(WOW_DIRECTORY . '/includes/interfaces/interface.log.php');
/**
 * Load configs
 * There is two same config files for Database and WoWCS with only one difference:
 * In *.local.php set your configuration for your localhost server where you are testing
 * your changes. In files without .local suffix set your configuration to your public server.
 * Now, if your configurations (like db login and pass) are different on your localhost
 * and public server you can configurate it only once - not with each reup on your public
 * server. Files with suffix .local can be deleted from public server and files without
 * it can be deleted from localhost test server.
 * 
 * IMPORTANT:
 * 1) create file named ".public" in "WOW_DIRECTORY./includes/configs/" ONLY in your public server, NOT in localhost
 **/
if(file_exists(WOW_DIRECTORY . '/includes/configs/.public') ) {
  include(WOW_DIRECTORY . '/includes/configs/DatabaseConfig.php');
  include(WOW_DIRECTORY . '/includes/configs/WoWConfig.php');
}
else{
  include(WOW_DIRECTORY . '/includes/configs/DatabaseConfig.local.php');
  include(WOW_DIRECTORY . '/includes/configs/WoWConfig.local.php');
}
// Load libraries
include(WOW_DIRECTORY . '/includes/classes/libs/mysqldatabase.php');
include(WOW_DIRECTORY . '/includes/classes/libs/log.php');
// Load classes
include(WOW_DIRECTORY . '/includes/classes/class.db.php');
include(WOW_DIRECTORY . '/includes/classes/class.wow.php');
include(WOW_DIRECTORY . '/includes/classes/class.locale.php');
include(WOW_DIRECTORY . '/includes/classes/class.template.php');
// Custom classes
include(WOW_DIRECTORY . '/includes/classes/class.account.php');
include(WOW_DIRECTORY . '/includes/classes/class.utils.php');
include(WOW_DIRECTORY . '/includes/classes/class.characters.php');
include(WOW_DIRECTORY . '/includes/classes/class.achievements.php');
include(WOW_DIRECTORY . '/includes/classes/class.item.php');
include(WOW_DIRECTORY . '/includes/classes/class.items.php');
include(WOW_DIRECTORY . '/includes/classes/class.itemprototype.php');
include(WOW_DIRECTORY . '/includes/classes/class.guild.php');
include(WOW_DIRECTORY . '/includes/classes/class.search.php');
include(WOW_DIRECTORY . '/includes/classes/class.reputation.php');
include(WOW_DIRECTORY . '/includes/classes/class.auction.php');
include(WOW_DIRECTORY . '/includes/classes/class.forums.php');
// Load data
include(WOW_DIRECTORY . '/includes/data/data.classes.php');
include(WOW_DIRECTORY . '/includes/data/data.races.php');
// Perform log in (if required)
if(isset($_GET['login']) || preg_match('/\?login/', $_SERVER['REQUEST_URI'])) {
    header('Location: ' . WoW::GetWoWPath() . '/login/');
    exit;
}
// Perform logout (if required)
if(isset($_GET['logout']) || preg_match('/\?logout/', $_SERVER['REQUEST_URI'])) {
    // $_SERVER['REQUEST_URI'] check is required for mod_rewrited URL cases.
    WoW_Account::PerformLogout();
    header('Location: ' . WoW::GetWoWPath() . '/');
    exit;
}
// Locale
if(isset($_GET['locale']) && !preg_match('/lookup/', $_SERVER['REQUEST_URI'])) {
    $_SESSION['wow_locale'] = $_GET['locale'];
    $_SESSION['wow_locale_id'] = WoW_Locale::GetLocaleIDForLocale($_SESSION['wow_locale']);
    if(WoW_Locale::IsLocale($_SESSION['wow_locale'], $_SESSION['wow_locale_id'])) {
        WoW_Locale::SetLocale($_SESSION['wow_locale'], $_SESSION['wow_locale_id']);
        if(isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        else {
            header('Location: ' . WoW::GetWoWPath() . '/');
            exit; 
        }
    }
}
// Initialize account (if user already logged in we need to re-build his info from session data)
WoW_Account::Initialize();
// Load locale
if(isset($_SESSION['wow_locale']) && WoW_Locale::IsLocale($_SESSION['wow_locale'], $_SESSION['wow_locale_id'])) {
    WoW_Locale::SetLocale($_SESSION['wow_locale'], $_SESSION['wow_locale_id']);
}
else {
    WoW_Locale::SetLocale(WoWConfig::$DefaultLocale, WoWConfig::$DefaultLocaleID);
}
// Initialize debug log
WoW_Log::Initialize(WoWConfig::$UseLog, WoWConfig::$LogLevel);
// Load databases configs
DB::LoadConfigs();
// Initialize connections to databases
DB::ConnectToAllDBs();
// Initialize auction handler
WoW_Auction::InitAuction();
if(isset($_GET['_DISPLAYVERSION_'])) {
    die(WOW_REVISION);
}
// RunOnce.
define('__RUNONCE__', true);
include(WOW_DIRECTORY . '/includes/RunOnce.php');
WoW::AddInWoW();
?>
