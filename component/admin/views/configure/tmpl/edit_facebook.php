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
        <?php echo $this->form->getLabel('fb_profile_id'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('fb_profile_id'); ?>
    </div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('fb_key'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('fb_key'); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('fb_secret'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('fb_secret'); ?>
	</div>
</div>
<div class="control-group">
    <div class="control-label">
        <?php echo $this->form->getLabel('fb_intro'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('fb_intro'); ?>
    </div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('fb_type_id'); ?>
	</div>
	<div class="controls">
		<?php echo $this->form->getInput('fb_type_id'); ?>
	</div>
</div>
