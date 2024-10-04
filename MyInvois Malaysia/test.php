<?php
/*
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/


// Module Bootstrap
require 'module.php';

use Gibbon\Domain\System\SettingGateway;
use Klsheng\Myinvois\MyInvoisClient;


// if (isActionAccessible($guid, $connection2, '/modules/MyInvois Malaysia/settings_manage.php') == false) {
//     // Access denied
//     $page->addError(__('You do not have access to this action.'));
// } else {
    //Proceed!
    $page->breadcrumbs->add(__m('Test'));

    $settingGateway = $container->get(SettingGateway::class);
    
    // GET SET UP FOR MYINVOIS
    $prodMode = ($settingGateway->getSettingByScope('MyInvois Malaysia', 'installationType') == 'Production') ? true : false;
    $clientID = $settingGateway->getSettingByScope('MyInvois Malaysia', 'clientID');
    $clientSecret = $settingGateway->getSettingByScope('MyInvois Malaysia', 'clientSecret1');

    $client = new MyInvoisClient($clientID, $clientSecret, $prodMode);

    $client->login();
    $accessToken = $client->getAccessToken();

    // QUERY AND PRINT DOCUMENT TYPES
    $documentTypes = $client->getAllDocumentTypes()["result"];
    
    foreach ($documentTypes as $documentType) {
        echo $documentType["description"]."<br/>";
    }

    // Continue with https://github.com/klsheng/myinvois-php-sdk

    
// }
