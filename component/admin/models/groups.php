<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamModelGroups extends RModelList
{
    /**
     * Name of the filter form to load
     *
     * @var  string
     */
    protected $filterFormName = 'filter_users';

    /**
     * Constructor
     *
     * @param   array  $config  Configuration array
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id',
                'title',
                'subtitle',
                'ordering'
            );
        }
        parent::__construct($config);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return  JDatabaseQuery
     */
    protected function getListQuery()
    {
        $db	= $this->getDbo();

        $query = $db->getQuery(true)
            ->select('*')
            ->from('#__redsocialstream_groups');

        return $query;
    }
}
