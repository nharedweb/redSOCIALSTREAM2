<?php
/**
 * @package     RedSocialStream.Admin
 * @subpackage  Installer
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

if (!class_exists('Com_RedcoreInstallerScript'))
{
    $searchPaths = array(
        // Install
        dirname(__FILE__) . '/redCORE',
        // Discover install
        JPATH_ADMINISTRATOR . '/components/com_redcore'
    );

    if ($redcoreInstaller = JPath::find($searchPaths, 'install.php'))
    {
        require_once $redcoreInstaller;
    }
    else
    {
        throw new Exception('redCORE installer not found!', 500);
    }
}

/**
 * Custom installation of red social stream
 *
 * @package     RedSocialStream.Admin
 * @subpackage  Install
 * @since       1.0
 */
class Com_RedSocialStreamInstallerScript extends Com_RedcoreInstallerScript
{
}
