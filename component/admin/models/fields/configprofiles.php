<?php
/**
 * @package     redSocialstream
 * @subpackage  Models
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

class JFormFieldConfigProfiles extends JFormFieldlist
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'configprofiles';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
        // Initialize variables.
        $profileTypeKey = (string) $this->element['name'];
        if($profileTypeKey == 'fb_profile_id')
        {
            $profileTypeName = 'facebook';
            $selectedId = (int) $this->form->getValue('fb_profile_id');
        }
        else if($profileTypeKey == 'tw_profile_id')
        {
            $profileTypeName = 'twitter';
            $selectedId = (int) $this->form->getValue('tw_profile_id');
        }
        else if($profileTypeKey == 'lk_profile_id')
        {
            $profileTypeName = 'linkedin';
            $selectedId = (int) $this->form->getValue('lk_profile_id');
        }

		$options 	= array();

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('p.id AS id, p.name AS name')
              ->from('#__redsocialstream_profiles p')
              ->innerJoin("#__redsocialstream_profiles_types t ON t.id = p.type_id AND (t.name LIKE '%" .$profileTypeName. "%' OR t.title LIKE '%". $profileTypeName ."%')");
        $query->where('p.state = 1');
        $db->setQuery($query);

        $results = $db->loadObjectList();

        if (!empty($results))
        {
            foreach($results as $item)
            {
                $options[] = JHTML::_('select.option', $item->id, $item->name);
            }
        }

        $html[] = JHtml::_('select.genericlist', $options, $this->name, null,'value','text', $selectedId);

        return implode($html);
	}
}
