--
-- Structure `jos_redsocialstream_group`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `intro` text NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL,
  `ordering` int(11) DEFAULT '0',
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  `state` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__redsocialstream_profiles_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `link_prefix` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

INSERT INTO `#__redsocialstream_profiles_types` (`name`, `title`, `img`, `ordering`, `link_prefix`) VALUES
('facebook', 'facebook', 'facebook.jpg', 1, 'http://facebook.com/'),
('twitter', 'twitter', 'twitter.jpg', 2, 'http://twitter.com/'),
('youtube', 'youtube', 'youtube.jpg', 3, 'http://youtube.com/'),
('linkedin', 'linkedin', 'linkedin.jpg', 4, 'http://linkedin.com/');

CREATE TABLE IF NOT EXISTS `#__redsocialstream_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(200) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__redsocialstream_configures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_profile_id` int(11) NOT NULL DEFAULT 0,
  `fb_type_id` int(11) NOT NULL DEFAULT 0,
  `fb_key` varchar(200) DEFAULT NULL,
  `fb_secret` varchar(200) DEFAULT NULL,
  `fb_intro` text,

  `tw_profile_id` int(11) NOT NULL DEFAULT 0,
  `tw_type_id` int(11) NOT NULL DEFAULT 0,
  `tw_key` varchar(200) DEFAULT NULL,
  `tw_secret` varchar(200) DEFAULT NULL,
  `tw_intro` text,

  `lk_profile_id` int(11) NOT NULL DEFAULT 0,
  `lk_type_id` int(11) NOT NULL DEFAULT 0,
  `lk_key` varchar(200) DEFAULT NULL,
  `lk_secret` varchar(200) DEFAULT NULL,
  `lk_intro` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;







-- ----------------------------------------------------------------------------------
--
-- Structure `jos_redsocialstream_profilereference`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_profilereference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profiletypeid` int(11) DEFAULT NULL,
  `profilename` varchar(200) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `groupid` int(11) NOT NULL DEFAULT '0',
  `updatet_time` timestamp NULL DEFAULT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Structure `jos_redsocialstream_posts`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL,
  `ext_profile_id` varchar(256) NOT NULL,
  `ext_post_id` varchar(256) NOT NULL,
  `ext_post_name` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `thumb_uri` varchar(256) NOT NULL,
  `message` varchar(518) NOT NULL,
  `source_link` varchar(518) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` varchar(518) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2024 ;

--
-- Structure `jos_redsocialstream_settings`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datalabel` varchar(255) DEFAULT NULL,
  `dataname` varchar(20) DEFAULT NULL,
  `datatype` varchar(20) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Data `jos_redsocialstream_settings`
--

INSERT INTO `#__redsocialstream_settings` (`datalabel`, `dataname`, `datatype`, `data`) VALUES
('COM_REDSOCIALSTREAM_INTROTEXT','introtext', 'html', ''),
('COM_REDSOCIALSTREAM_FACEBOOK_APPLICATION_ID','app_id', 'text', ''),
('COM_REDSOCIALSTREAM_FACEBOOK_APPLICATION_SECRET', 'app_secret', 'text', ''),
('COM_REDSOCIALSTREAM_TWITTER_CONSUMER_KEY', 'twitter_consumer_key', 'text', ''),
('COM_REDSOCIALSTREAM_TWITTER_CONSUMER_SECRET', 'twitter_consumer_sec', 'text', ''),
('COM_REDSOCIALSTREAM_LINKEDIN_API_KEY', 'linked_api_key', 'text', ''),
('COM_REDSOCIALSTREAM_LINKEDIN_SECRET_KEY', 'linked_secret_key', 'text', '');

--
-- Structure `jos_redsocialstream_profiletype`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_profiletype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `linkprefix` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Data `jos_redsocialstream_profiletype`
--

INSERT INTO `#__redsocialstream_profiletype` (`title`, `img`, `ordering`, `linkprefix`) VALUES
('facebook', 'facebook.jpg', 1, 'http://facebook.com/'),
('twitter', 'twitter.jpg', 2, 'http://twitter.com/'),
('youtube', 'youtube.jpg', 3, 'http://youtube.com/'),
('linkedin', 'linkedin.jpg', 4, '');




--
-- Structure `jos_redsocialstream_linkedin_connections`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_linkedin_connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `linkedin_access_oauth_token` varchar(50) NOT NULL,
  `linkedin_access_oauth_token_secret` varchar(50) NOT NULL,
  `linkedin_oauth_verifier` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


--
-- Structure `jos_redsocialstream_settings`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_facebook_accesstoken` (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `fb_token` text DEFAULT NULL,
  `fb_secret` text DEFAULT NULL,
  `created` text DEFAULT NULL,
  `updated` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


--
-- Structure `jos_redsocialstream_settings`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_twitter_accesstoken` (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `twitter_token` text DEFAULT NULL,
  `twitter_secret` text DEFAULT NULL,
  `created` text DEFAULT NULL,
  `updated` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Structure `jos_redsocialstream_settings`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_linkedin_accesstoken` (

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `linkedin_token` text DEFAULT NULL,
  `linkedin_secret` text DEFAULT NULL,
  `created` text DEFAULT NULL,
  `updated` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Structure `jos_redsocialstream_postfeeds`
--

CREATE TABLE IF NOT EXISTS `#__redsocialstream_postfeeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `facebook` int(11) NOT NULL,
  `twitter` int(11) NOT NULL,
  `linkedin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;
