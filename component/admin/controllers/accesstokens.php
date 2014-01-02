<?php
/**
 * @package     redSocialstream
 * @subpackage  Models
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

class RedSocialStreamControllerAccessTokens extends RControllerAdmin
{
    /**
     * The prefix to use with controller messages.
     *
     * @var  string
     */
    protected $text_prefix = 'COM_REDSOCIALSTREAM_ACCESSTOKENS';

    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    public function getAccessToken()
    {
        // Get token for twitter
        $app = JFactory::getApplication();
        $input = $app->input;

        $configId = $input->get('cid', array(), 'array');

        if(!empty($configId) && count($configId) > 0)
        {
            $type = 'facebook';

            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('c.*, p.name AS profile_name, t.name AS type_name')
                ->from('#__redsocialstream_configures c')
                ->innerJoin('#__redsocialstream_profiles p ON p.id = c.profile_id')
                ->innerJoin('#__redsocialstream_profiles_types t ON t.id = p.type_id')
                ->where('c.state = 1')
                ->where('c.id = ' . $configId[0]);
            $db->setQuery($query);
            $result = $db->loadObject();

            if(!empty($result) && is_object($result))
            {
                $type = strtolower(trim($result->type_name));
            }

            switch($type)
            {
                case 'facebook':
                    break;

                case 'twitter':

                    if ($result->key != "" && $result->secret != "")
                    {
                        $accessToken = RedSocialStreamHelpersHelper::getTwitterAccessToken($result->key, $result->secret);

                        if (!empty($accessToken))
                        {
                            $data['token'] = "Bearer " . $accessToken;
                            $this->getModel('AccessTokens')->updateToken($result->id, $data);

                            $this->setMessage(JText::_('COM_REDSOCIALSTREAM_ACCESSTOKEN_SUCCESSFUL'));
                        }
                        else
                        {
                            $this->setMessage(JText::_('COM_REDSOCIALSTREAM_ACCESSTOKEN_UNSUCCESSFUL'), 'error');
                        }

                        $this->redirect = "index.php?option=com_redsocialstream&view=accesstokens";
                    }

                    break;

                case 'linkedin':
                    break;

                default:
                    break;
            }
        }
    }
}
