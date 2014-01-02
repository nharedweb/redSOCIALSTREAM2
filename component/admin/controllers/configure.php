<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

class RedSocialStreamControllerConfigure extends RControllerForm
{
    /**
     * The prefix to use with controller messages.
     *
     * @var  string
     */
    protected $text_prefix = 'COM_REDSOCIALSTREAM_CONFIGURE';

    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    public function save($key = null, $urlVar = null)
    {
        $app = JFactory::getApplication();
        $context = "$this->option.edit.$this->context";

        $id = $app->input->getInt('id');
        $app->setUserState($context.'.id', $id);

        $task = $this->getTask();
        if($task == 'save')
        {
            $this->view_list = 'dashboard';
        }

        parent::save($key, $urlVar);
    }

    public function cancel($key = null)
    {
        $app = JFactory::getApplication();
        $context = "$this->option.edit.$this->context";

        $id = $app->input->getInt('id');
        $app->setUserState($context.'.id', $id);

        $task = $this->getTask();
        if($task == 'cancel')
        {
            $this->view_list = 'dashboard';
        }

        parent::cancel($key);
    }
}
