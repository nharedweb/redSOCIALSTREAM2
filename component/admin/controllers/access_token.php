<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class RedSocialStreamControllerAccess_token extends RControllerAdmin
{
	function __construct($config = array())
	{
		parent::__construct($config);
	}

	function cancel()
	{
		$this->setRedirect('index.php?option=com_redsocialstream');
	}
}
