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
    // Twitter access token url
    public static $twitterAccessTokenUrl = "https://api.twitter.com/oauth2/token";

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
