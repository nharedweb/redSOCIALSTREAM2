<?php
/**
 * @package     redSocialstream
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamViewAccessTokens extends RedSocialStreamView
{
//	function display($tpl = null)
//	{
//		JToolBarHelper::title(JText::_('COM_REDSOCIALSTREAM_ACCESS_TOKEN'), 'configure.png');
//		JToolBarHelper::cancel('cancel', 'COM_REDSOCIALSTREAM_CLOSE');
//		//DEVNOTE: set document title
//		$document =  JFactory::getDocument();
//		$document->setTitle(JText::_('COM_REDSOCIALSTREAM_REDSOCIALSTREAMS'));
//		$mainframe = JFactory::getApplication();
//		$context = "config";
//		$session = JFactory::getSession();
//		$twitter_profile_id = $session->get('twitter_profile_id');
//		$linkedin_profile_id = $session->get('linkedin_profile_id');
//
//		$model = $this->getModel('access_token');
//		$task = JRequest::getVar('task');
//		if ($task == 'genearteToken')
//		{
//			/* Load the data to export */
//			$result = $this->get('Data');
//		}
//		$code = JRequest::getVar('code');
//		if ($code != "")
//		{
//			$model->saveFbAcceesToken($code);
//		}
//		$oauth_verifier = JRequest::getVar('oauth_verifier');
//		$oauth_token = JRequest::getVar('oauth_token');
//		if ($oauth_verifier != "" && $oauth_token != "" && $twitter_profile_id)
//		{
//			$model->saveTwitterAcceesToken($oauth_token);
//		}
//		if ($oauth_verifier != "" && $oauth_token != "" && $linkedin_profile_id)
//		{
//			$model->saveLinkedinAcceesToken($oauth_token, $oauth_verifier);
//		}
//		$fbprofiles = $model->getFbProfiles(1);
//		$lists['fbprofiles'] = $fbprofiles;
//
//		$twitterprofiles = $model->getTwiterProfiles(2);
//		$lists['twitterprofiles'] = $twitterprofiles;
//
//		$linkedinprofiles = $model->getLinkedinProfiles(7);
//		$lists['linkedinprofiles'] = $linkedinprofiles;
//
//		JToolBarHelper :: custom('genearteToken', 'redsocialstream_import_generate32', JText::_('COM_REDSOCIALSTREAM_GENERATE_ACCESS_TOKEN'), JText::_('COM_REDSOCIALSTREAM_GENERATE_ACCESS_TOKEN'), false, false);
//		$this->assignRef('result', $result);
//		$this->assignRef('lists', $lists);
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
        $model = $this->getModel('AccessTokens');

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
        return JText::_('COM_REDSOCIALSTREAM_ACCESSTOKENS_LIST_TITLE');
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

//        $new = RToolbarBuilder::createNewButton('gettokens.add');
//        $firstGroup->addButton($new);
//
//        $edit = RToolbarBuilder::createEditButton('gettokens.edit');
//        $firstGroup->addButton($edit);

        $accessToken = RToolbarBuilder::createStandardButton('accesstokens.getAccessToken', 'Get Access Token');

//        $publish = RToolbarBuilder::createPublishButton('accesstokens.publish');
//        $unpublish = RToolbarBuilder::createUnpublishButton('accesstokens.unpublish');

        $firstGroup//->addButton($publish)
            //->addButton($unpublish)
            ->addButton($accessToken);

//        if ($user->authorise('core.admin', 'com_socialstream'))
//        {
//            // Add / edit
//            if ($canDo->get('core.create') || (count($user->getAuthorisedCategories('com_socialstream', 'core.create'))) > 0)
//            {
//                $new = RToolbarBuilder::createNewButton('group.add');
//                $firstGroup->addButton($new);
//            }
//
//            if ($canDo->get('core.edit'))
//            {
//                $edit = RToolbarBuilder::createEditButton('group.edit');
//                $firstGroup->addButton($edit);
//            }
//
//            // Delete / Trash
//            if ($canDo->get('core.delete'))
//            {
//                $delete = RToolbarBuilder::createDeleteButton('groups.delete');
//                $secondGroup->addButton($delete);
//            }
//        }

        $toolbar = new RToolbar;
        $toolbar->addGroup($firstGroup)
            ->addGroup($secondGroup);

        return $toolbar;
    }
}
