<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('JPATH_REDCORE') or die;

$data = $displayData;

$active = null;

if( isset($data['active']) )
{
	$active = $data['active'];
}
?>
<ul class="nav nav-tabs nav-stacked">
    <li>
        <?php if ($active === 'dashboard') : ?>
            <a class="active" href="<?php echo JRoute::_('index.php?option=com_redsocialstreamb&view=dashboard') ?>">
                <i class="icon-dashboard"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_DASHBOARD_TITLE') ?>
            </a>
        <?php else : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=dashboard') ?>">
                <i class="icon-dashboard"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_DASHBOARD_TITLE') ?>
            </a>
        <?php endif; ?>
    </li>
    <li>
        <?php if ($active === 'groups') : ?>
            <a class="active" href="<?php echo JRoute::_('index.php?option=com_redsocialstreamb&view=groups') ?>">
                <i class="icon-dashboard"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_GROUPS_LIST_TITLE') ?>
            </a>
        <?php else : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=groups') ?>">
                <i class="icon-dashboard"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_GROUPS_LIST_TITLE') ?>
            </a>
        <?php endif; ?>
    </li>
    <li>
        <?php if ($active === 'profiles') : ?>
            <a class="active" href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=profiles') ?>">
                <i class="icon-ticket"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_PROFILES_LIST_TITLE') ?>
            </a>
        <?php else : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=profiles') ?>">
                <i class="icon-ticket"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_PROFILES_LIST_TITLE') ?>
            </a>
        <?php endif; ?>
    </li>
    <li>
        <?php if ($active === 'posts') : ?>
            <a class="active" href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=posts') ?>">
                <i class="icon-ticket"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_POSTS_LIST_TITLE') ?>
            </a>
        <?php else : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=posts') ?>">
                <i class="icon-ticket"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_POSTS_LIST_TITLE') ?>
            </a>
        <?php endif; ?>
    </li>
    <li>
        <?php if ($active !== 'configure') : ?>
            <a class="active" href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=configure') ?>">
                <i class="icon-ticket"></i>
                <?php echo JText::_('COM_REDSOCIALSTREAM_CONFIGURES_LIST_TITLE') ?>
            </a>
        <?php endif; ?>
    </li>
</ul>
