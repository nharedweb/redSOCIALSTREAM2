<?php
/**
 * @package     redSocialstream
 * @subpackage  Models
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamTableConfigure extends RTable
{
    /**
     * The table name without the prefix.
     *
     * @var  string
     */
    protected $_tableName = 'redsocialstream_configures';

    /**
     * @var  integer
     */
    public $id;

    /**
     * @var  string
     */
    public $intro;

    /**
     * @var  string
     */
    public $key;

    /**
     * @var  integer
     */
    public $secret;
} 
