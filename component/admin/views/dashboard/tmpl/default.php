<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

$views = array(
    'groups',
    'profiles',
	'posts',
	'configures',
);

$images = array(
    'groups' => JHtml::image('media/com_redsocialstream/images/48_redsocialstream_group.png', JText::_('COM_REDSOCIALSTREAM_GROUPS_LIST_TITLE')),
	'profiles' => JHtml::image('media/com_redsocialstream/images/48_redsocialstream_profile.png', JText::_('COM_REDSOCIALSTREAM_PROFILES_LIST_TITLE')),
	'posts' => JHtml::image('media/com_redsocialstream/images/48_redsocialstream_post.png', JText::_('COM_REDSOCIALSTREAM_POSTS_LIST_TITLE')),
	'configures' => JHtml::image('media/com_redsocialstream/images/48_redsocialstream_configure.png', JText::_('COM_REDSOCIALSTREAM_CONFIGURES_LIST_TITLE')),
);

$texts = array(
    'groups' => JText::_('COM_REDSOCIALSTREAM_GROUPS_LIST_TITLE'),
	'profiles' => JText::_('COM_REDSOCIALSTREAM_PROFILES_LIST_TITLE'),
	'posts' => JText::_('COM_REDSOCIALSTREAM_POSTS_LIST_TITLE'),
	'configures' => JText::_('COM_REDSOCIALSTREAM_CONFIGURES_LIST_TITLE'),
);

$countView = count($views);
?>
<div class="row-fluid">
	<div class="span6 offset3">
		<div class="row pagination-centered">
			<?php echo JHtml::image('media/com_redsocialstream/images/socialstream.png', JText::_('COM_REDSOCIALSTREAM')) ?>
			<hr />
		</div>
		<div class="row">
			<table class="table">
				<?php for ($i = 0; $i < $countView; $i++) : ?>
					<?php if ($i % 4 == 0) : ?>
						<tr style="border:0;">
					<?php endif; ?>
					<td style="border:0; width: 25%;">
						<a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&view=' . $views[$i]); ?>">
							<div class="row-fluid pagination-centered">
								<?php echo $images[$views[$i]] ?>
							</div>
							<div class="row-fluid pagination-centered">
								<h4><?php echo $texts[$views[$i]] ?></h4>
							</div>
						</a>
					</td>
					<?php if (($i + 1) % 4 == 0 || $i == $countView - 1) : ?>
						</tr>
					<?php endif; ?>
				<?php endfor; ?>
			</table>
		</div>
	</div>
</div>
