<?php
/**
 * @package     redSocialstream
 * @subpackage  Helpers
 *
 * @copyright   Copyright (C) 2012 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

/**
 * Acl helper.
 *
 * @package     redSocialstream.Backend
 * @subpackage  Helpers
 * @since       1.0
 */
final class RedSocialStreamHelpersHelper
{
    // Facebook access token url
    public static $fbAccessTokenUrl = "https://graph.facebook.com/oauth/access_token";

    // Twitter access token url
    public static $twitterAccessTokenUrl = "https://api.twitter.com/oauth2/token";




    public static function getFacebookAccessToken($data)
    {
        $mainframe       = JFactory::getApplication();
		$db              = JFactory::getDbo();
		$session         = JFactory::getSession();
		$redsocialhelper = new redsocialhelper();
		$login           = $redsocialhelper->getsettings();
		//Set the page name or ID
		$app_id     = $login['app_id'];
		$app_secret = $login['app_secret'];

		$fb_profile_id = $session->get('fb_profile_id');
//		$return_url    = urlencode(JURI::base() . "index.php?option=com_redsocialstream&view=access_token");
//		$post_data     = 'https://graph.facebook.com/oauth/access_token?client_id=' . $app_id . '&redirect_uri=' . $return_url . '&client_secret=' . $app_secret . '&code=' . $code;
//
//		$CR = curl_init($post_data);
//
//		curl_setopt($CR, CURLOPT_POST, 1);
//		curl_setopt($CR, CURLOPT_FAILONERROR, true);
//		curl_setopt($CR, CURLOPT_POSTFIELDS, '');
//		curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
//		curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, FALSE);
//		curl_setopt($CR, CURLOPT_CONNECTTIMEOUT, 20);
//		curl_setopt($CR, CURLOPT_TIMEOUT, 30);
//
//		$token = curl_exec($CR);
//		$error = curl_error($CR);
//
//
//		if ($token)
//		{
//			$token        = explode("&", $token);
//			$access_token = explode("=", $token[0]);
//			$access_token = $access_token[1];
//		}
//
//		// Delete Old Token
//		$del_old_token = "DELETE from #__redsocialstream_facebook_accesstoken";
//		$db->setQuery($del_old_token);
//		$db->query();
//
//		// Add New Token
//		$sql = "INSERT into #__redsocialstream_facebook_accesstoken (id, profile_id , fb_token, fb_secret, created, updated)
//        values ('', '$fb_profile_id', '$access_token', '', NOW(), NOW())";
//		$db->setQuery($sql);
//		$db->query();
//		$session->set('fb_profile_id', NULL);
//		$msg = JText::_('COM_REDSOCIALSTREAM_FACEBOOK_TOKEN_GENERATED');
//		$mainframe->Redirect('index.php?option=com_redsocialstream&view=access_token', $msg);
//		exit;


        $header = array(
            'Content-type'  => 'application/x-www-form-urlencoded; charset=UTF-8',
        );

        $param = array(
                'client_id' => '',
                'client_secret' => '',
                'code' => '',
                'redirect_uri'
        );

        $url = self::$fbAccessTokenUrl;

        try
        {
            $http = JHttpFactory::getHttp();
            $response = $http->get($url, $header);
            $access_data = json_decode($response->body);

            if (isset($access_data->errors))
            {
                return "";
            }

            return $access_data->access_token;
        }
        catch (Exception $e)
        {
            return "";
        }
    }

    /**
     * Get access token function
     *
     * @param   string  $consumer_key     string consumer key
     * @param   string  $consumer_secret  string consumer secret
     *
     * @return string
     */
    public static function getTwitterAccessToken($consumer_key, $consumer_secret)
    {
        // Bearer token credentials
        $consumer_key = str_replace('+', ' ', str_replace('%7E', '~', rawurlencode($consumer_key)));
        $consumer_secret = str_replace('+', ' ', str_replace('%7E', '~', rawurlencode($consumer_secret)));

        $header = array(
            'Authorization' => 'Basic ' . base64_encode($consumer_key . ":" . $consumer_secret),
            'Content-type'  => 'application/x-www-form-urlencoded; charset=UTF-8',
        );
        $data = array('grant_type' => 'client_credentials');

        try
        {
            $http = JHttpFactory::getHttp();
            $response = $http->post(self::$twitterAccessTokenUrl, $data, $header);
            $access_data = json_decode($response->body);

            if (isset($access_data->errors))
            {
                return "";
            }

            return $access_data->access_token;
        }
        catch (Exception $e)
        {
            return "";
        }
    }
}
