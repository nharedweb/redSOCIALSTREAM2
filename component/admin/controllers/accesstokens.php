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

    // Redirect url
    private $_redirectUrl = '';

    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     */
    public function __construct($config = array())
    {
        parent::__construct($config);

        $this->_redirectUrl = urlencode(JURI::base() . "index.php?option=com_redsocialstream&task=accesstokens.getAccessToken");
    }

    public function getAccessToken()
    {
        // Get token for twitter
        $app = JFactory::getApplication();
        $input = $app->input;
        $session = JFactory::getSession();
        $model = $this->getModel('AccessTokens');

        $configId = $input->get('cid', array(), 'array');

        if(!empty($configId) && count($configId) > 0)
        {
            $type = 'facebook';
            $result = $model->getConfigureInfo($configId[0]);

            if(!empty($result) && is_object($result))
            {
                $type = strtolower(trim($result->type_name));
            }

            switch($type)
            {
                case 'facebook':
                    $session->set('profileId', $result->profile_id);
                    $session->set('appId', $result->key);
                    $session->set('appSecret', $result->screct);

                    header("location: https://www.facebook.com/dialog/oauth?client_id=" . $result->key . "&redirect_uri=" . $this->_redirectUrl . "&scope=manage_pages,publish_stream&manage_pages=1&publish_stream=1");
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
                    }

                    break;

                case 'linkedin':
                    $appKey     = $result->key;
                    $appSecret  = $result->secret;

                    $session->set('profileId', $result->profile_id);
                    $session->set('appKey', $appKey);
                    $session->set('appSecret', $appSecret);

                    $API_CONFIG          = array(
                        'appKey'      => $appKey,
                        'appSecret'   => $appSecret,
                        'callbackUrl' => $this->_redirectUrl
                    );


                    $linkedin = new LinkedIn($API_CONFIG);

                    $parameters = array(
                        'oauth_callback' => $this->getCallbackUrl()
                    );

                    $urlRequest = 'https://api.linkedin.com/uas/oauth/requestToken?scope=r_fullprofile+rw_nus+r_network';

                    $response = $this->fetch('POST', $urlRequest, NULL, $parameters);
                    parse_str($response['linkedin'], $response['linkedin']);

                    $response = $linkedin->retrieveTokenRequest();

                    if ($response['success'] === TRUE)
                    {
                        $session->set('oauthReqToken', $response['linkedin']);
                        // redirect the user to the LinkedIn authentication/authorisation page to initiate validation.
                        header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
                        exit;
                    }

                    break;

                default:
                    $this->setMessage(JText::_('COM_REDSOCIALSTREAM_ACCESSTOKEN_UNSUCCESSFUL'), 'error');

                    break;
            }
        }
        else
        {
            // Redirect from social site
            // Facebook code
            $code = $input->get('code', '');
            if(!empty($code))
            {
                $profileId = $session->get('profileId', '');
                $appId = $session->get('appId', '');
                $appSecret = $session->get('appSecret', '');

                $data = array(
                    'client_id' => $appId,
                    'client_secret' => $appSecret,
                    'code' => $code,
                    'redirect_uri' => $this->_redirectUrl
                );

                $accessToken = RedSocialStreamHelpersHelper::getFacebookAccessToken($data);
                if (!empty($accessToken))
                {
                    $data['token'] = $accessToken;
                    $this->getModel('AccessTokens')->updateToken($profileId, $data);

                    $this->setMessage(JText::_('COM_REDSOCIALSTREAM_ACCESSTOKEN_SUCCESSFUL'));
                }
                else
                {
                    $this->setMessage(JText::_('COM_REDSOCIALSTREAM_ACCESSTOKEN_UNSUCCESSFUL'), 'error');
                }


            }
        }

        $this->redirect = "index.php?option=com_redsocialstream&view=accesstokens";
    }
}
