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
	var $_id = null;
	var $_data = null;
	var $_total = null;
	var $_pagination = null;
	var $_table_prefix = null;

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
//
//        $context   = "groups";
//        $this->_table_prefix = '#__redsocialstream';
//
//        $app = JFactory::getApplication();
//
//        $limit      = $app->getUserStateFromRequest($context . 'limit', 'limit', $app->getCfg('list_limit'), 0);
//        $limitstart = $app->getUserStateFromRequest($context . 'limitstart', 'limitstart', 0);
//        $array      = $app->input->get('cid', 0, '', 'array');
//
//        $this->setId((int) $array[0]);
//
//        $this->setState('limit', $limit);
//        $this->setState('limitstart', $limitstart);

        parent::__construct($config);
    }

//    protected function getListQuery()
//    {
//
//    }

//	function setId($id)
//	{
//		$this->_id   = $id;
//		$this->_data = null;
//	}

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

//	function getData()
//	{
//		//DEVNOTE: Lets load the content if it doesn't already exist
//		if (empty($this->_data))
//		{
//			$query       = $this->_buildQuery();
//			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
//		}
//
//		return $this->_data;
//	}
//
//	function getTotal()
//	{
//		//DEVNOTE: Lets load the content if it doesn't already exist
//		if (empty($this->_total))
//		{
//			$query        = $this->_buildQuery();
//			$this->_total = $this->_getListCount($query);
//		}
//
//		return $this->_total;
//	}
//
//	function getPagination()
//	{
//		// Lets load the content if it doesn't already exist
//		if (empty($this->_pagination))
//		{
//			jimport('joomla.html.pagination');
//			$this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
//		}
//
//		return $this->_pagination;
//	}
//
//	function _buildQuery()
//	{
//		$query = '
//		SELECT * FROM #__redsocialstream_group
//		ORDER BY ordering
//		';
//
//		return $query;
//	}
//
//	function move($direction)
//	{
//		$row = $this->getTable('redsocialstream_groups');
//		if (!$row->load($this->_id))
//		{
//			$this->setError($this->_db->getErrorMsg());
//
//			return false;
//		}
//
//		if (!$row->move($direction))
//		{
//			$this->setError($this->_db->getErrorMsg());
//
//			return false;
//		}
//
//		return true;
//	}
//
//	function saveorder($cid = array(), $order)
//	{
//		$row = $this->getTable('redsocialstream_groups');
//		// update ordering values
//		for ($i = 0; $i < count($cid); $i++)
//		{
//			$row->load((int) $cid[$i]);
//			// track categories
//			if ($row->ordering != $order[$i])
//			{
//				$row->ordering = $order[$i];
//				if (!$row->store())
//				{
//					$this->setError($this->_db->getErrorMsg());
//
//					return false;
//				}
//			}
//		}
//
//		return true;
//	}
}






