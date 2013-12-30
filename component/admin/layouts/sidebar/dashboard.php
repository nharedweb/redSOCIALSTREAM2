<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('JPATH_REDCORE') or die;
?>
<ul class="nav nav-tabs nav-stacked">
    <li>
        <a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=group&layout=edit') ?>">
            <i class="icon-globe"></i>
            <?php echo JText::_('COM_REDSOCIALSTREAM_GROUP_CREATE') ?>
        </a>
    </li>
	<li>
		<a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=profile&layout=edit') ?>">
			<i class="icon-user"></i>
			<?php echo JText::_('COM_REDSOCIALSTREAM_PROFILE_CREATE') ?>
		</a>
	</li>
	<li>
		<a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=post&layout=edit') ?>">
			<i class="icon-building"></i>
			<?php echo JText::_('COM_REDSOCIALSTREAM_POST_CREATE') ?>
		</a>
	</li>
	<li>
		<a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=configure&layout=edit') ?>">
			<i class="icon-suitcase"></i>
			<?php echo JText::_('COM_REDSOCIALSTREAM_CONFIGURE_CREATE') ?>
		</a>
	</li>
</ul>
