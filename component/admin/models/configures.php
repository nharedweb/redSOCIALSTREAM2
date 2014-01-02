<?php
/**
 * @package     redSocialstream
 * @subpackage  Controllers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamModelConfigures extends RModelList
{
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
                'c.id', 'profile_name', 'type_name',
                'p.created_date',
                'p.updated_date',
                'p.ordering',
                'p.state',
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
            ->select('c.*, f.name AS profile_name, t.name AS type_name')
            ->from('#__redsocialstream_configures c')
            ->leftJoin('#__redsocialstream_profiles f ON f.id = c.profile_id')
            ->leftJoin('#__redsocialstream_profiles_types t ON t.id = f.type_id');

        return $query;
    }
}
