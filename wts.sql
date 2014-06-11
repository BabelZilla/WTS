-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 11. Jun 2014 um 01:49
-- Server Version: 5.5.37-0+wheezy1
-- PHP-Version: 5.4.4-14+deb7u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `4_wts`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fbf_comments`
--

CREATE TABLE IF NOT EXISTS `fbf_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `original`
--

CREATE TABLE IF NOT EXISTS `original` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) DEFAULT NULL,
  `file_id` int(10) NOT NULL,
  `plural_type` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cldr',
  `context` varchar(255) DEFAULT NULL,
  `zero` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `one` text,
  `two` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `few` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `many` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `other` text,
  `md5_hash` varchar(32) NOT NULL,
  `references` text,
  `comment` text,
  `status` varchar(255) NOT NULL DEFAULT '+active',
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `words` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=259 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `original_file`
--

CREATE TABLE IF NOT EXISTS `original_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_md5` varchar(32) DEFAULT NULL,
  `iniRef` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unchanged',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `type_id` tinyint(3) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `is_virtual` tinyint(1) NOT NULL DEFAULT '0',
  `string_count` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `original_file_content`
--

CREATE TABLE IF NOT EXISTS `original_file_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(10) NOT NULL DEFAULT '0',
  `project_id` int(10) NOT NULL DEFAULT '0',
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `original_version`
--

CREATE TABLE IF NOT EXISTS `original_version` (
  `id` int(10) NOT NULL,
  `project_id` int(10) DEFAULT NULL,
  `file_id` int(10) NOT NULL,
  `plural_type` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cldr',
  `context` varchar(255) DEFAULT NULL,
  `zero` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `one` text,
  `two` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `few` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `many` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `other` text,
  `md5_hash` varchar(32) NOT NULL,
  `references` text,
  `comment` text,
  `status` varchar(255) NOT NULL DEFAULT '+active',
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `words` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `version` int(11) NOT NULL AUTO_INCREMENT,
  `version_comment` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`version`),
  KEY `project_id` (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `webSiteURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profileURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photoURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthDay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthMonth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthYear` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailVerified` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coverInfoURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_type` int(10) NOT NULL,
  `moz_id` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `release_date` datetime DEFAULT NULL,
  `ext_guid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'only for Mozilla extensions',
  `ext_ver` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdk` tinyint(1) DEFAULT NULL COMMENT 'only for Mozilla extensions',
  `license` varchar(25) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `locale_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `root_path` text,
  `repo_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `remote_Url` text,
  `description` text,
  `webapp_manifest` text,
  `parent_project_id` int(10) DEFAULT NULL,
  `source_language` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `source_url_template` varchar(255) DEFAULT NULL,
  `topic_id` int(10) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  KEY `path` (`path`),
  KEY `parent_project_id` (`parent_project_id`),
  FULLTEXT KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_maintainer`
--

CREATE TABLE IF NOT EXISTS `project_maintainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_type`
--

CREATE TABLE IF NOT EXISTS `project_type` (
  `project_type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `project_type` varchar(64) NOT NULL,
  PRIMARY KEY (`project_type_id`),
  UNIQUE KEY `fku_project_type_fk_project_type` (`project_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_xpifile`
--

CREATE TABLE IF NOT EXISTS `project_xpifile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `filename` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_id` (`project_id`),
  KEY `impala_xpifile_403f60f` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `payload` text NOT NULL,
  `last_activity` int(15) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spdx_license_list`
--

CREATE TABLE IF NOT EXISTS `spdx_license_list` (
  `license_list_pk` int(11) NOT NULL DEFAULT '0',
  `wts_key` int(11) NOT NULL,
  `license_identifier` text CHARACTER SET latin1 NOT NULL,
  `license_fullname` text CHARACTER SET latin1 NOT NULL,
  `license_matchname_1` text CHARACTER SET latin1,
  `license_matchname_2` text CHARACTER SET latin1,
  `license_matchname_3` text CHARACTER SET latin1,
  `license_text` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`license_list_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ta_auth_tokens`
--

CREATE TABLE IF NOT EXISTS `ta_auth_tokens` (
  `auth_identifier` int(11) NOT NULL,
  `public_key` varchar(96) COLLATE utf8_unicode_ci NOT NULL,
  `private_key` varchar(96) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`auth_identifier`,`public_key`,`private_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translation`
--

CREATE TABLE IF NOT EXISTS `translation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `original_id` int(10) DEFAULT NULL,
  `original_file` int(10) NOT NULL,
  `file_id` int(10) NOT NULL,
  `translation_set_id` int(10) DEFAULT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `one` text NOT NULL COMMENT '[one]',
  `other` text COMMENT '[other]',
  `two` text COMMENT '[two]',
  `few` text COMMENT '[few]',
  `many` text COMMENT '[many]',
  `zero` text COMMENT '[zero]',
  `md5_hash` varchar(32) NOT NULL,
  `untranslated` tinyint(1) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'waiting',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime NOT NULL,
  `warnings` text,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=996 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translationset_member`
--

CREATE TABLE IF NOT EXISTS `translationset_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translationset_id` int(10) NOT NULL DEFAULT '0',
  `project_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 't',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gm` (`translationset_id`,`user_id`),
  KEY `translationset_id` (`translationset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translations_version`
--

CREATE TABLE IF NOT EXISTS `translations_version` (
  `id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `original_id` int(10) DEFAULT NULL,
  `original_file` int(10) NOT NULL,
  `file_id` int(10) NOT NULL,
  `translation_set_id` int(10) DEFAULT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `one` text NOT NULL COMMENT '[one]',
  `other` text COMMENT '[other]',
  `two` text COMMENT '[two]',
  `few` text COMMENT '[few]',
  `many` text COMMENT '[many]',
  `zero` text COMMENT '[zero]',
  `md5_hash` varchar(32) DEFAULT NULL,
  `untranslated` tinyint(1) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'waiting',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime NOT NULL,
  `warnings` text,
  `version` int(11) NOT NULL AUTO_INCREMENT,
  `version_comment` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translation_file`
--

CREATE TABLE IF NOT EXISTS `translation_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `original_file` int(10) NOT NULL,
  `translation_set` int(10) NOT NULL,
  `language` varchar(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_md5` varchar(32) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unchanged',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `type_id` tinyint(3) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `source_language` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `str_added` int(10) NOT NULL,
  `str_missing` int(10) NOT NULL,
  `str_changed` int(10) NOT NULL,
  `str_warnings` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`file_id`),
  KEY `original_file` (`original_file`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translation_file_content`
--

CREATE TABLE IF NOT EXISTS `translation_file_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(10) NOT NULL DEFAULT '0',
  `project_id` int(10) NOT NULL DEFAULT '0',
  `translationset_id` int(10) NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translation_set`
--

CREATE TABLE IF NOT EXISTS `translation_set` (
  `translationset_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `status_id` int(10) NOT NULL,
  `project_id` int(10) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `open` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`translationset_id`),
  UNIQUE KEY `project_id_slug_locale` (`project_id`,`slug`,`locale`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `translation_suggestion`
--

CREATE TABLE IF NOT EXISTS `translation_suggestion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `original_id` int(10) DEFAULT NULL,
  `original_file` int(10) NOT NULL,
  `file_id` int(10) NOT NULL,
  `translation_set_id` int(10) DEFAULT NULL,
  `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `one` text NOT NULL COMMENT '[one]',
  `other` text COMMENT '[other]',
  `two` text COMMENT '[two]',
  `few` text COMMENT '[few]',
  `many` text COMMENT '[many]',
  `zero` text COMMENT '[zero]',
  `user_id` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userlanguage`
--

CREATE TABLE IF NOT EXISTS `userlanguage` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `language` varchar(10) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userprofile`
--

CREATE TABLE IF NOT EXISTS `userprofile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `given_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `settings` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
