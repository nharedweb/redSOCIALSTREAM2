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

class JFormFieldPTypes extends JFormFieldlist
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'ptypes';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
		$options 	= array();

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('id, name')
              ->from('#__redsocialstream_profiles_types');
        $db->setQuery($query);

        $results = $db->loadObjectList();

		$selectedId	= (int) $this->form->getValue('type_id');

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
