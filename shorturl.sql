SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";-- 中国时区


--
-- 数据库: `shorturl`
--

-- --------------------------------------------------------

--
-- 表的结构 `shorturl_settings`
--

CREATE TABLE IF NOT EXISTS `shorturl_settings` (
  `last_number` bigint(20) unsigned NOT NULL DEFAULT '0',
  KEY `last_number` (`last_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `shorturl_settings`
--

INSERT INTO `shorturl_settings` (`last_number`) VALUES
(145),
(145);

-- --------------------------------------------------------

--
-- 表的结构 `shorturl_urls`
--

CREATE TABLE IF NOT EXISTS `shorturl_urls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `alias` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `st` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;