<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

// Register component prefix
RLoader::registerPrefix('RedSocialStream', __DIR__);

// Register library prefix
RLoader::registerPrefix('RedSocialStream', JPATH_LIBRARIES . '/redsocialstream');

//$document = JFactory::getDocument();
//$document->addStyleSheet(JURI::base() . 'components/com_redsocialstream/assets/css/com_redsocialstream.css');

//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_REDSOCIALSTREAMS'), 'index.php?option=com_redsocialstream');
//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_PROFILES'), 'index.php?option=com_redsocialstream&view=profiles');
//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_GROUPS'), 'index.php?option=com_redsocialstream&view=groups');
//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_POSTS'), 'index.php?option=com_redsocialstream&view=posts');
//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_CONFIGURE'), 'index.php?option=com_redsocialstream&view=configure');
//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_ACCESS_TOKEN'), 'index.php?option=com_redsocialstream&view=access_token');
//JSubMenuHelper::addEntry(JText::_('COM_REDSOCIALSTREAM_POSTFEEDS'), 'index.php?option=com_redsocialstream&view=postfeeds');

$app = JFactory::getApplication();

// Instanciate and execute the front controller.
$controller = JControllerLegacy::getInstance('RedSocialStream');
$controller->execute($app->input->get('task'));
$controller->redirect();