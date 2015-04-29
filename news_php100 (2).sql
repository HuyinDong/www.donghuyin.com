-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-04-05 18:30:39
-- 服务器版本: 5.6.14
-- PHP 版本: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `news_php100`
--

-- --------------------------------------------------------

--
-- 表的结构 `p_admin`
--

CREATE TABLE IF NOT EXISTS `p_admin` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `mid` varchar(25) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `p_admin`
--

INSERT INTO `p_admin` (`uid`, `mid`, `passwd`, `name`) VALUES
(20, 'admin', 'admin', 'PHP100');

-- --------------------------------------------------------

--
-- 表的结构 `p_config`
--

CREATE TABLE IF NOT EXISTS `p_config` (
  `name` varchar(20) COLLATE gbk_bin NOT NULL,
  `values` varchar(100) COLLATE gbk_bin NOT NULL,
  `Website Address` varchar(50) COLLATE gbk_bin NOT NULL,
  `Key Words` varchar(50) COLLATE gbk_bin NOT NULL,
  `Remark` tinytext COLLATE gbk_bin NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

--
-- 转存表中的数据 `p_config`
--

INSERT INTO `p_config` (`name`, `values`, `Website Address`, `Key Words`, `Remark`) VALUES
('websitename', 'Program聽Learning & Developing', 'www.aptattack.com', 'PHP,聽Mysql,Java', 'a聽good聽place聽to聽learn聽php');

-- --------------------------------------------------------

--
-- 表的结构 `p_newsbase`
--

CREATE TABLE IF NOT EXISTS `p_newsbase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(50) COLLATE gbk_bin NOT NULL,
  `author` varchar(25) COLLATE gbk_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `p_newsbase`
--

INSERT INTO `p_newsbase` (`id`, `cid`, `title`, `author`, `date`) VALUES
(2, 7, 'asdfasdf', 'Huyin Dong', '2014-03-19'),
(4, 20, 'C++ Trend', 'Huyin Dong', '2014-04-04');

-- --------------------------------------------------------

--
-- 表的结构 `p_newsclass`
--

CREATE TABLE IF NOT EXISTS `p_newsclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `f_id` int(11) NOT NULL COMMENT '父id',
  `name` varchar(25) COLLATE gbk_bin NOT NULL COMMENT '分类名称',
  `keyword` varchar(100) COLLATE gbk_bin NOT NULL COMMENT '关键字',
  `remark` varchar(100) COLLATE gbk_bin NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `p_newsclass`
--

INSERT INTO `p_newsclass` (`id`, `f_id`, `name`, `keyword`, `remark`) VALUES
(8, 0, 'Mysql聽Articles', '', ''),
(7, 0, 'JAVA聽Articles', '', ''),
(6, 0, 'PHP聽Articles', '', ''),
(19, 0, 'C++ Articles', '', ''),
(22, 8, 'Mysql聽Senior聽Articles', '', ''),
(11, 7, 'JAVA聽Basic聽Articles', '', ''),
(20, 19, 'C++ Technical Articles', '', ''),
(23, 8, 'Mysql聽Basic Articles', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `p_newscontent`
--

CREATE TABLE IF NOT EXISTS `p_newscontent` (
  `nid` int(11) NOT NULL,
  `keyword` varchar(100) COLLATE gbk_bin NOT NULL,
  `content` text COLLATE gbk_bin NOT NULL,
  `remark` text COLLATE gbk_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

--
-- 转存表中的数据 `p_newscontent`
--

INSERT INTO `p_newscontent` (`nid`, `keyword`, `content`, `remark`) VALUES
(1, 'sdfdsfgdsfg', '<p>dsfdsf&nbsp;gsdfg&nbsp;dsf&nbsp;dsfg&nbsp;dsf&nbsp;sf&nbsp;sf sadfasdf</p>\r\n ', ''),
(2, 'asdfasd', '<p>sadfsdfdsfgfghreyterty</p>\r\n', ''),
(3, 'fgdsfgdsgfsdfgdsf', '', ''),
(4, 'C++,OOP', '<p>hello,world</p>\r\n', ''),
(5, 'PHP', '<p>PHP is a popular programming lauguage.</p>\r\n', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
