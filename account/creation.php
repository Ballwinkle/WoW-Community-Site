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

include('../includes/WoW_Loader.php');
$url_data = WoW::GetUrlData('management');
if(!is_array($url_data) || !isset($url_data['action1']) || $url_data['action1'] != 'creation') {
    header('Location: /account/creation/tos.html');
    exit;
}
WoW_Template::SetTemplateTheme('account');
if(preg_match('/tos.html/i', $url_data['action2'])) {
    if(isset($_POST['csrftoken'])) {
        $user_data = array(
            'username' => $_POST['firstname'],
            'password' => $_POST['password'],
            'sha' => sha1(strtoupper($_POST['firstname']) . ':' . strtoupper($_POST['password'])),
            'email' => $_POST['emailAddress']
        );
        if(WoW_Account::RegisterUser($user_data, true)) {
            header('Location: /account/management/');
            exit;
            //WoW_Template::SetPageIndex('creation_success');
            //WoW_Template::SetPageData('page', 'creation_success');
            //WoW_Template::SetPageData('email', $_POST['emailAddress']);
        }
        else {
            WoW_Template::SetPageIndex('creation_tos');
            WoW_Template::SetPageData('page', 'creation_tos');
        }
    }
    else {
        WoW_Template::SetPageIndex('creation_tos');
        WoW_Template::SetPageData('page', 'creation_tos');
    }
}
else {
}
WoW_Template::LoadTemplate('page_index');
?>