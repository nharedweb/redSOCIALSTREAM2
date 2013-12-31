<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamViewProfiles extends RedSocialStreamView
{
//	function display($tpl = null)
//	{
//		//DEVNOTE: we need these 2 globals
//		$mainframe = JFactory::getApplication();
//		$context = "profiles";
//
//		//DEVNOTE: set document title
//		$document = JFactory::getDocument();
//		$document->setTitle(JText::_('COM_REDSOCIALSTREAM_REDSOCIALSTREAMS'));
//		//DEVNOTE: Set ToolBar title
//		JToolBarHelper::title(JText::_('COM_REDSOCIALSTREAM_PROFILES'), 'profile');
//		//DEVNOTE: Set toolbar items for the page
////		JToolBarHelper::addNewX();
////		JToolBarHelper::editListX();
////		JToolBarHelper::deleteList();
////		JToolBarHelper::publishList();
////		JToolBarHelper::unpublishList();
//		//DEVNOTE: Get URL
//		$uri = JFactory::getURI();
//
//		//DEVNOTE:give me ordering from request
//		$filter_order = $mainframe->getUserStateFromRequest($context . 'filter_order', 'filter_order', 'ordering');
//		$filter_order_Dir = $mainframe->getUserStateFromRequest($context . 'filter_order_Dir', 'filter_order_Dir', '');
//
//		//DEVNOTE:remember the actual order and column
//		$lists['order'] = $filter_order;
//		$lists['order_Dir'] = $filter_order_Dir;
//
//		//DEVNOTE:Get data from the model
//		$items = $this->get('Data');
//		$total = $this->get('Total');
//
//		$pagination = $this->get('Pagination');
//		$ordering = ($lists['order'] == 'm.ordering');
//
//		//DEVNOTE:save a reference into view
//		$this->assignRef('user', JFactory::getUser());
//		$this->assignRef('lists', $lists);
//		$this->assignRef('items', $items);
//		$this->assignRef('pagination', $pagination);
//		$this->assignRef('ordering', $ordering);
//		$this->assignRef('request_url', $uri->toString());
//		//DEVNOTE:call parent display
//		parent::display($tpl);
//	}



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
        $model = $this->getModel('profiles');

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
        return JText::_('COM_REDSOCIALSTREAM_PROFILES_LIST_TITLE');
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

        $new = RToolbarBuilder::createNewButton('profile.add');
        $firstGroup->addButton($new);

        $edit = RToolbarBuilder::createEditButton('profile.edit');
        $firstGroup->addButton($edit);

        $publish = RToolbarBuilder::createPublishButton('profiles.publish');
        $unpublish = RToolbarBuilder::createUnpublishButton('profiles.unpublish');

        $firstGroup->addButton($publish)
            ->addButton($unpublish);

        $delete = RToolbarBuilder::createDeleteButton('profiles.delete');
        $secondGroup->addButton($delete);

//        if ($user->authorise('core.admin', 'com_redsocialstream'))
//        {
//            // Add / edit
//            if ($canDo->get('core.create') || (count($user->getAuthorisedCategories('com_redsocialstream', 'core.create'))) > 0)
//            {
//                $new = RToolbarBuilder::createNewButton('profile.add');
//                $firstGroup->addButton($new);
//            }
//
//            if ($canDo->get('core.edit'))
//            {
//                $edit = RToolbarBuilder::createEditButton('profile.edit');
//                $firstGroup->addButton($edit);
//            }
//
//            // Publish / Unpublish
//            if ($canDo->get('core.edit.state'))
//            {
//                $publish = RToolbarBuilder::createPublishButton('profiles.publish');
//                $unpublish = RToolbarBuilder::createUnpublishButton('profiles.unpublish');
//
//                $firstGroup->addButton($publish)
//                    ->addButton($unpublish);
//            }
//
//            // Delete / Trash
//            if ($canDo->get('core.delete'))
//            {
//                $delete = RToolbarBuilder::createDeleteButton('profiles.delete');
//                $secondGroup->addButton($delete);
//            }
//        }

        $toolbar = new RToolbar;
        $toolbar->addGroup($firstGroup)
            ->addGroup($secondGroup);

        return $toolbar;
    }
}
