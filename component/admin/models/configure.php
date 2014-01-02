<?php
/**
 * @package     redSocialstream
 * @subpackage  Models
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamModelConfigure extends RModelAdmin
{
//    protected function populateState()
//    {
//        parent::populateState();
//
//        $db = $this->getDbo();
//        $query = $db->getQuery(true);
//        $query->select('id')
//            ->from('#__redsocialstream_configures');
//        $db->setQuery($query);
//        $results = $db->loadObject();
//        if(!empty($results))
//        {
//            $name = $this->getName();
//            $this->setState($name.'.id', $results->id);
//        }
//    }

//    public function save($data)
//    {
//        parent::save($data);
//
//        // Store detail configures
//        $id = (int) $this->getState($this->getName() . '.id');
//
//        $detailData = array();
//        foreach($data as $key => $value)
//        {
//            $detail = array();
//            $detail['configure_id'] = $id;
//
//            if(strpos($key, 'profile_id') !== false)
//            {
//                $detail['profile_id'] = $value;
//            }
//            if(strpos($key, 'type_id') !== false)
//            {
//                $detail['type_id'] = $value;
//            }
//            if(strpos($key, 'key') !== false)
//            {
//                $detail['key'] = $value;
//            }
//            if(strpos($key, 'secret') !== false)
//            {
//                $detail['secret'] = $value;
//            }
//            if(strpos($key, 'intro') !== false)
//            {
//                $detail['intro'] = $value;
//            }
//
//            $detailData[] = $detail;
//        }
//
//        if(count($detailData) > 0)
//        {
//            // Delete all old detail data
//            $db = $this->getDbo();
//            $query = $db->getQuery(true);
//            $query->delete('#__redsocialstream_configures_details');
//            $db->setQuery($query);
//            $db->execute();
//
//            $detailTable = $this->getTable('ConfigureDetail');
//
//            foreach($detailData as $data)
//            {
//                // Allow an exception to be thrown.
//                try
//                {
//                    $detailTable->load();
//
//                    // Bind the data.
//                    if (!$detailTable->bind($data))
//                    {
//                        $this->setError($detailTable->getError());
//                        return false;
//                    }
//
//                    // Check the data.
//                    if (!$detailTable->check())
//                    {
//                        $this->setError($detailTable->getError());
//                        return false;
//                    }
//
//                    // Store the data.
//                    if (!$detailTable->store())
//                    {
//                        $this->setError($detailTable->getError());
//                        return false;
//                    }
//
//                    // Clean the cache.
//                    $this->cleanCache();
//                }
//                catch (Exception $e)
//                {
//                    $this->setError($e->getMessage());
//
//                    return false;
//                }
//            }
//        }
//    }
}
