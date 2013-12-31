<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamViewProfile extends RedSocialStreamView
{
//	function display($tpl = null)
//	{
//		global $mainframe, $option;
//		$uri = JFactory::getURI();
//		$user = JFactory::getUser();
//		$model = $this->getModel();
//		$this->setLayout('default');
//		$lists = array();
//		//DEVNOTE: set document title
//		$document = JFactory::getDocument();
//		$document->setTitle(JText::_('COM_REDSOCIALSTREAM_REDSOCIALSTREAMS'));
//		//get the helloworld
//		$detail = $this->get('data');
//		$groups = $model->getgroups();
//		$profiletypes = $model->getprofiletypes();
//
//		//DEVNOTE: the new record ?  Edit or Create?
//		$isNew = ($detail->id < 1);
//		// Set toolbar items for the page
//		$text = $isNew ? JText::_('COM_REDSOCIALSTREAM_NEW') : JText::_('COM_REDSOCIALSTREAM_EDIT');
//		JToolBarHelper::title(JText::_('COM_REDSOCIALSTREAM_PROFILE') . ': <small><small>[ ' . $text . ' ]</small></small>', 'profile.png');
//
//		JToolBarHelper::apply();
//		JToolBarHelper::save();
//		if ($isNew)
//		{
//			JToolBarHelper::cancel();
//		}
//		else
//		{
//			// for existing items the button is renamed `close`
//			JToolBarHelper::cancel('cancel', 'COM_REDSOCIALSTREAM_CLOSE');
//		}
//
//		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $detail->published);
//
//		//clean helloworld data
//		jimport('joomla.filter.filteroutput');
//		JFilterOutput::objectHTMLSafe($detail, ENT_QUOTES, 'description');
//
//		$this->assignRef('lists', $lists);
//		$this->assignRef('groups', $groups);
//		$this->assignRef('profiletypes', $profiletypes);
//		$this->assignRef('detail', $detail);
//		$this->assignRef('request_url', $uri->toString());
//
//		parent::display($tpl);
//	}

    /**
     * @var  JForm
     */
    protected $form;

    /**
     * @var  object
     */
    protected $item;

    /**
     * Display method
     *
     * @param   string  $tpl  The template name
     *
     * @return  void
     */
    public function display($tpl = null)
    {
        $this->form	= $this->get('Form');
        $this->item	= $this->get('Item');

        parent::display($tpl);
    }

    /**
     * Get the view title.
     *
     * @return  string  The view title.
     */
    public function getTitle()
    {
        $isNew = (int) $this->item->id <= 0;
        $title = JText::_('COM_REDSOCIALSTREAM_PROFILE_FORM_TITLE');
        $state = $isNew ? JText::_('JNEW') : JText::_('JEDIT');

        return $title . ' <small>' . $state . '</small>';
    }

    /**
     * Get the toolbar to render.
     *
     * @return  RToolbar
     */
    public function getToolbar()
    {
        $group = new RToolbarButtonGroup;
        $user = JFactory::getUser();

        if ($user->authorise('core.admin', 'com_redsocialstream'))
        {
            $save = RToolbarBuilder::createSaveButton('profile.apply');
            $saveAndClose = RToolbarBuilder::createSaveAndCloseButton('profile.save');
            $saveAndNew = RToolbarBuilder::createSaveAndNewButton('profile.save2new');

            $group->addButton($save)
                ->addButton($saveAndClose)
                ->addButton($saveAndNew);
        }

        if (empty($this->item->id))
        {
            $cancel = RToolbarBuilder::createCancelButton('profile.cancel');
        }

        else
        {
            $cancel = RToolbarBuilder::createCloseButton('profile.cancel');
        }

        $group->addButton($cancel);

        $toolbar = new RToolbar;
        $toolbar->addGroup($group);

        return $toolbar;
    }
}
