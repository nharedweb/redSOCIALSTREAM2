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
        <?php echo $this->form->getLabel('type_id'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('type_id'); ?>
    </div>
</div>
<div class="control-group">
    <div class="control-label">
        <?php echo $this->form->getLabel('profile_id'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('profile_id'); ?>
    </div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('key'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('key'); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('secret'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('secret'); ?>
	</div>
</div>
<div class="control-group">
    <div class="control-label">
        <?php echo $this->form->getLabel('intro'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('intro'); ?>
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
