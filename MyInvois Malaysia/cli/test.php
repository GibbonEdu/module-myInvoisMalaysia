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

use Gibbon\Domain\System\SettingGateway;
use League\oauth2-client;

require getcwd().'/../../../gibbon.php';
require getcwd().'/../moduleFunctions.php';

$settingGateway = $container->get(SettingGateway::class);

getSystemSettings($guid, $connection2);

setCurrentSchoolYear($guid, $connection2);

//Set up for i18n via gettext
if (isset($session->get('i18n')['code']) and $session->get('i18n')['code'] != null) {
    putenv('LC_ALL='.$session->get('i18n')['code']);
    setlocale(LC_ALL, $session->get('i18n')['code']);
    bindtextdomain('gibbon', getcwd().'/../i18n');
    textdomain('gibbon');
}

//Check for CLI, so this cannot be run through browser
$remoteCLIKey = $settingGateway->getSettingByScope('System Admin', 'remoteCLIKey');
$remoteCLIKeyInput = $_GET['remoteCLIKey'] ?? null;
if (!(isCommandLineInterface() OR ($remoteCLIKey != '' AND $remoteCLIKey == $remoteCLIKeyInput))) {
    echo __('This script cannot be run from a browser, only via CLI.');
} else {

    $installationType = $settingGateway->getSettingByScope('MyInvois Malaysia', 'installationType');
    $clientID = $settingGateway->getSettingByScope('MyInvois Malaysia', 'clientID');
    $clientSecret = $settingGateway->getSettingByScope('MyInvois Malaysia', 'clientSecret');
    $url = getURL($installationType);

    $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId'                => $clientID,
        'clientSecret'            => $clientSecret,
        'redirectUri'             => $url,
        'urlAuthorize'            => $url,
        'urlAccessToken'          => $url,
        'urlResourceOwnerDetails' => $url
    ]);
    
    try {
        $accessToken = $provider->getAccessToken('client_credentials');
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
        exit($e->getMessage());
    }
}
?>
