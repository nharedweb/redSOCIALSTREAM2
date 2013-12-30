<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

// Required objects
$doc = JFactory::getDocument();
$user = JFactory::getUser();

$action = JRoute::_('index.php?option=com_redsocialstream&view=group');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$saveOrder = $listOrder == 'ordering';
?>
<form action="<?php echo $action; ?>" name="adminForm" class="adminForm" id="adminForm" method="post">
    <div class="">
        <?php echo RLayoutHelper::render('search', array('view' => $this, 'filter_name' => 'search_users')) ?>
        <hr />
        <table class="table table-striped table-hover" id="userList">
            <thead>
            <tr>
                <th width="1%"></th>
                <th width="5%"></th>
                <th width="30%"></th>
                <th width="59%"></th>
                <th width="5%"></th>
            </tr>
            <tr>
                <th class="hidden-phone">
                    <input type="checkbox" name="checkall-toggle" value=""
                           title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)"/>
                </th>
                <th class="nowrap hidden-phone">
                    <?php echo JHtml::_('rgrid.sort', 'COM_REDSOCIALSTREAM_STATE', 'published', $listDirn, $listOrder); ?>
                </th>
                <th class="nowrap hidden-phone">
                    <?php echo JHtml::_('rgrid.sort', 'COM_REDSOCIALSTREAM_GROUP_NAME', 'name', $listDirn, $listOrder); ?>
                </th>
                <th class="nowrap hidden-phone">
                    <?php echo JHtml::_('rgrid.sort', 'COM_REDSOCIALSTREAM_GROUP_INTRO', 'intro', $listDirn, $listOrder); ?>
                </th>

                <th class="nowrap hidden-phone">
                    <?php echo JHtml::_('rgrid.sort', 'JGRID_HEADING_ID', 'id', $listDirn, $listOrder); ?>
                </th>
            </tr>
            </thead>
            <?php if ($this->items): ?>
                <tbody>
                <?php foreach ($this->items as $i => $item): ?>
                    <?php
                    $canChange = 1;
                    $canEdit = 1;
                    $canCheckin = 1;
                    ?>
                    <tr>
                        <td>
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td>
                            <?php echo JHtml::_('rgrid.published', $item->state, $i, 'groups.', $canChange, 'cb'); ?>
                        </td>
                        <td>
                            <a href="<?php echo JRoute::_('index.php?option=com_redsocialstream&task=group.edit&id=' . $item->id); ?>">
                                <?php echo $this->escape($item->name); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $this->escape($item->intro); ?>
                        </td>
                        <td>
                            <?php echo $item->id; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
        <?php echo $this->pagination->getListFooter(); ?>
    </div>

    <div>
        <input type="hidden" name="task" value="">
        <input type="hidden" name="boxchecked" value="0">
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
