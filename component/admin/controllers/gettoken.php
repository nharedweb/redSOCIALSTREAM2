<?php
/**
 * @package     redSocialstream
 * @subpackage  Models
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamControllerGetToken extends RControllerAdmin
{
    /**
     * The prefix to use with controller messages.
     *
     * @var  string
     */
    protected $text_prefix = 'COM_REDSOCIALSTREAM_GETTOKEN';

    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

//	function __construct($config = array())
//	{
//		parent::__construct($config);
//	}
//
//	function cancel()
//	{
//		$this->setRedirect('index.php?option=com_redsocialstream');
//	}
}
