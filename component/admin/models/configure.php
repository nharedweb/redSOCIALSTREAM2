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
    protected function populateState()
    {
        parent::populateState();

        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('id')
            ->from('#__redsocialstream_configures');
        $db->setQuery($query);
        $results = $db->loadObject();
        if(!empty($results))
        {
            $name = $this->getName();
            $this->setState($name.'.id', $results->id);
        }
    }
}
