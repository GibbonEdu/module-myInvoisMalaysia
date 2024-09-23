<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http:// www.gnu.org/licenses/>.
*/

// This file describes the module, including database tables

// Basic variables
$name        = 'MyInvois Malaysia';
$description = 'A module for passing Gibbon invoicing information to Mayalsia\'s MyInvois platform, via their API.';            
$entryURL    = "settings_manage.php";   
$type        = "Additional";  
$category    = 'Other';            
$version     = '0.1.00';            
$author      = 'Gibbon Foundation';
$url         = 'http://gibbonedu.org';

// Module tables & gibbonSettings entries
//$moduleTables[] = ''; 

// Add gibbonSettings entries
$gibbonSetting[] = "INSERT INTO `gibbonSetting` (`gibbonSettingID` ,`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES (NULL , 'MyInvois Malaysia', 'installationType', 'Installation Type', '', 'Production');";
$gibbonSetting[] = "INSERT INTO `gibbonSetting` (`gibbonSettingID` ,`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES (NULL , 'MyInvois Malaysia', 'clientID', 'Client ID', 'As provided by the MyInvois platform.', '');";
$gibbonSetting[] = "INSERT INTO `gibbonSetting` (`gibbonSettingID` ,`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES (NULL , 'MyInvois Malaysia', 'clientSecret1', 'Client Secret 1', 'As provided by the MyInvois platform.', '');";
$gibbonSetting[] = "INSERT INTO `gibbonSetting` (`gibbonSettingID` ,`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES (NULL , 'MyInvois Malaysia', 'clientSecret2', 'Client Secret 2', 'As provided by the MyInvois platform.', '');";

// Action rows 
// One array per action
$actionRows[] = [
    'name'                      => 'Manage Settings', 
    'precedence'                => '0',
    'category'                  => 'Admin',
    'description'               => 'Allows a privileged user to manage MyInvois Malaysia settings.',
    'URLList'                   => 'settings_manage.php',
    'entryURL'                  => 'settings_manage.php',
    'entrySidebar'              => 'Y',
    'menuShow'                  => 'Y',
    'defaultPermissionAdmin'    => 'Y',
    'defaultPermissionTeacher'  => 'N',
    'defaultPermissionStudent'  => 'N',
    'defaultPermissionParent'   => 'N',
    'defaultPermissionSupport'  => 'Y',
    'categoryPermissionStaff'   => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent'  => 'N',
    'categoryPermissionOther'   => 'N',
];
