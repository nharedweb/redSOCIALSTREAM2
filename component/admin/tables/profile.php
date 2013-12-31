<?php
/**
 * @package     redSocialstream
 * @subpackage  Models
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamTableProfile extends RTable
{
    /**
     * The table name without the prefix.
     *
     * @var  string
     */
    protected $_tableName = 'redsocialstream_profiles';

    /**
     * @var  integer
     */
    public $id;

    /**
     * @var  string
     */
    public $name;

    /**
     * @var  string
     */
    public $title;

    /**
     * @var  integer
     */
    public $ordering;

    /**
     * @var  integer
     */
    public $state = '0';
} 
