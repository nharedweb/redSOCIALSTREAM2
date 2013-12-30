<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamControllerGroup extends RControllerForm
{
    /**
     * The prefix to use with controller messages.
     *
     * @var  string
     */
    protected $text_prefix = 'COM_REDSOCIALSTREAM_GROUP';

    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    /**
     * Gets the URL arguments to append to an item redirect.
     *
     * @param   integer  $recordId  The primary key id for the item.
     * @param   string   $urlVar    The name of the URL variable for the id.
     *
     * @return  string  The arguments to append to the redirect URL.
     */
    protected function getRedirectToItemAppend($recordId = null, $urlVar = 'id')
    {
        $append = parent::getRedirectToItemAppend($recordId, $urlVar);

        $input = JFactory::getApplication()->input;
        $form = $input->get('jform', array(), 'array');
        $companyId = null;

//        if (isset($form['company_id']))
//        {
//            $companyId = (int) $form['company_id'];
//        }
//
//        if ($companyId)
//        {
//            $append .= '&jform[company_id]=' . $companyId;
//        }
//
        return $append;
    }

//	function __construct($default = array())
//	{
//		parent::__construct($default);
//		$this->registerTask('add', 'edit');
//	}

//	function edit()
//	{
//		JRequest::setVar('view', 'group');
//		JRequest::setVar('layout', 'default');
//		JRequest::setVar('hidemainmenu', 1);
//
//		parent::display();
//
//		$model = $this->getModel();
//		$model->checkout();
//	}

//	function apply()
//	{
//		$this->save(1);
//	}

//	function save($apply = 0)
//	{
//		$post       = JRequest::get('post');
//		$cid        = JRequest::getVar('cid', array(0), 'post', 'array');
//		$option     = JRequest::getVar('option');
//		$post['id'] = $cid[0];
//		$model      =  $this->getModel();
//
//		if ($row = $model->store($post))
//		{
//			$msg = JText::_('COM_REDSOCIALSTREAM_GROUP_SAVE');
//		}
//		else
//		{
//			$msg = JText::_('COM_REDSOCIALSTREAM_ERROR_SAVING_GROUP');
//		}
//
//		if ($apply == 1)
//		{
//			$this->setRedirect('index.php?option=' . $option . '&view=group&task=edit&cid[]=' . $row->id, $msg);
//		}
//		else
//		{
//			$this->setRedirect('index.php?option=' . $option . '&view=groups', $msg);
//		}
//	}
//
//	function remove()
//	{
//		global $mainframe;
//
//		$cid = JRequest::getVar('cid', array(0), 'post', 'array');
//
//		if (!is_array($cid) || count($cid) < 1)
//		{
//			JError::raiseError(500, JText::_('COM_REDSOCIALSTREAM_NO_ITEM_SELECTED'));
//		}
//
//		$model = $this->getModel('group');
//		if (!$model->delete($cid))
//		{
//			echo "<script> alert('" . $model->getError(true) . "'); window.history.go(-1); </script>\n";
//		}
//
//		$this->setRedirect('index.php?option=com_redsocialstream&view=groups');
//	}
//
//	function publish()
//	{
//		$cid = JRequest::getVar('cid', array(0), 'post', 'array');
//
//		if (!is_array($cid) || count($cid) < 1)
//		{
//			JError::raiseError(500, JText::_('Select an item to publish'));
//		}
//
//		$model = $this->getModel('group');
//		if (!$model->publish($cid, 1))
//		{
//			echo "<script> alert('" . $model->getError(true) . "'); window.history.go(-1); </script>\n";
//		}
//
//		$this->setRedirect('index.php?option=com_redsocialstream&view=groups');
//	}
//
//	function unpublish()
//	{
//		$cid = JRequest::getVar('cid', array(0), 'post', 'array');
//
//		if (!is_array($cid) || count($cid) < 1)
//		{
//			JError::raiseError(500, JText::_('Select an item to unpublish'));
//		}
//
//		$model = $this->getModel('group');
//		if (!$model->publish($cid, 0))
//		{
//			echo "<script> alert('" . $model->getError(true) . "'); window.history.go(-1); </script>\n";
//		}
//
//		$this->setRedirect('index.php?option=com_redsocialstream&view=groups');
//	}
//
//	function cancel()
//	{
//		$model = $this->getModel('group');
//		$model->checkin();
//		$this->setRedirect('index.php?option=com_redsocialstream&view=groups');
//	}

}
