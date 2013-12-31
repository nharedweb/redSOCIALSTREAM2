<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

$action = JRoute::_('index.php?option=com_redsocialstream&view=configure');
$isNew = (int) $this->item->id <= 0;

JHtml::_('behavior.keepalive');
JHtml::_('rbootstrap.tooltip');

$input = JFactory::getApplication()->input;

?>
<form action="<?php echo $action; ?>" method="post" name="adminForm" id="adminForm"
      class="form-validate form-horizontal">

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#fb" data-toggle="tab"><?php echo JText::_('COM_REDSOCIALSTREAM_CONFIGURE_FB'); ?></a>
        </li>
        <li>
            <a href="#tw" data-toggle="tab"><?php echo JText::_('COM_REDSOCIALSTREAM_CONFIGURE_TW'); ?></a>
        </li>
        <li>
            <a href="#lk" data-toggle="tab"><?php echo JText::_('COM_REDSOCIALSTREAM_CONFIGURE_LK'); ?></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="fb">
            <?php echo $this->loadTemplate('facebook') ?>
        </div>
        <div class="tab-pane" id="tw">
            <?php echo $this->loadTemplate('twitter') ?>
        </div>
        <div class="tab-pane" id="lk">
            <?php echo $this->loadTemplate('linkedin') ?>
        </div>
    </div>

    <input type="hidden" name="option" value="com_redsocialstream">
    <input type="hidden" name="return" value="<?php echo $input->get('return') ?>">
    <input type="hidden" name="id" value="<?php echo $this->item->id; ?>">
    <input type="hidden" name="task" value="">
    <?php echo JHTML::_('form.token'); ?>
</form>
