<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamViewConfigure extends RedSocialStreamView
{
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
        $this->setLayout('edit');

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
        $title = JText::_('COM_REDSOCIALSTREAM_CONFIGURE_FORM_TITLE');
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
            $save = RToolbarBuilder::createSaveButton('configure.apply');
                $saveAndClose = RToolbarBuilder::createSaveAndCloseButton('configure.save');

            $group->addButton($save)
                ->addButton($saveAndClose);
        }

        if (empty($this->item->id))
        {
            $cancel = RToolbarBuilder::createCancelButton('configure.cancel');
        }

        else
        {
            $cancel = RToolbarBuilder::createCloseButton('configure.cancel');
        }

        $group->addButton($cancel);

        $toolbar = new RToolbar;
        $toolbar->addGroup($group);

        return $toolbar;
    }
}
