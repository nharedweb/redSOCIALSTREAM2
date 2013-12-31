<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;
?>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('name'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('name'); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('title'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('title'); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('type_id'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('type_id'); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('group_id'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('group_id'); ?>
	</div>
</div>
<div class="control-group">
    <div class="control-label">
        <?php echo $this->form->getLabel('ordering'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('ordering'); ?>
    </div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('state'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('state'); ?>
	</div>
</div>
