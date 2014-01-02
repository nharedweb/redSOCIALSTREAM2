<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamViewConfigures extends RedSocialStreamView
{
    /**
     * @var  array
     */
    protected $items;

    /**
     * @var  object
     */
    protected $state;

    /**
     * @var  JPagination
     */
    protected $pagination;

    /**
     * @var  JForm
     */
    protected $filterForm;

    /**
     * Display method
     *
     * @param   string  $tpl  The template name
     *
     * @return  void
     */
    public function display($tpl = null)
    {
        $model = $this->getModel('configures');

        $this->items = $model->getItems();
        $this->state = $model->getState();
        $this->pagination = $model->getPagination();
        $this->filterForm = $model->getForm();

        parent::display($tpl);
    }

    /**
     * Get the view title.
     *
     * @return  string  The view title.
     */
    public function getTitle()
    {
        return JText::_('COM_REDSOCIALSTREAM_CONFIGURES_LIST_TITLE');
    }

    /**
     * Get the toolbar to render.
     *
     * @return  RToolbar
     */
    public function getToolbar()
    {
        $canDo = RedSocialStreamHelpersAcl::getActions();
        $user = JFactory::getUser();

        $firstGroup = new RToolbarButtonGroup;
        $secondGroup = new RToolbarButtonGroup;

        $new = RToolbarBuilder::createNewButton('configure.add');
        $firstGroup->addButton($new);

        $edit = RToolbarBuilder::createEditButton('configure.edit');
        $firstGroup->addButton($edit);

        $publish = RToolbarBuilder::createPublishButton('configures.publish');
        $unpublish = RToolbarBuilder::createUnpublishButton('configures.unpublish');

        $firstGroup->addButton($publish)
            ->addButton($unpublish);

        $delete = RToolbarBuilder::createDeleteButton('configures.delete');
        $secondGroup->addButton($delete);

//        if ($user->authorise('core.admin', 'com_redsocialstream'))
//        {
//            // Add / edit
//            if ($canDo->get('core.create') || (count($user->getAuthorisedCategories('com_redsocialstream', 'core.create'))) > 0)
//            {
//                $new = RToolbarBuilder::createNewButton('configure.add');
//                $firstGroup->addButton($new);
//            }
//
//            if ($canDo->get('core.edit'))
//            {
//                $edit = RToolbarBuilder::createEditButton('configure.edit');
//                $firstGroup->addButton($edit);
//            }
//
//            // Publish / Unpublish
//            if ($canDo->get('core.edit.state'))
//            {
//                $publish = RToolbarBuilder::createPublishButton('configures.publish');
//                $unpublish = RToolbarBuilder::createUnpublishButton('configures.unpublish');
//
//                $firstGroup->addButton($publish)
//                    ->addButton($unpublish);
//            }
//
//            // Delete / Trash
//            if ($canDo->get('core.delete'))
//            {
//                $delete = RToolbarBuilder::createDeleteButton('configures.delete');
//                $secondGroup->addButton($delete);
//            }
//        }

        $toolbar = new RToolbar;
        $toolbar->addGroup($firstGroup)
            ->addGroup($secondGroup);

        return $toolbar;
    }
}
