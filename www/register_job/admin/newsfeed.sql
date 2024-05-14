-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 08:43 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `newsfeed`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `department`
-- 

CREATE TABLE `department` (
  `dep_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `dep_name` varchar(200) NOT NULL,
  `dep_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`dep_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `department`
-- 

INSERT INTO `department` VALUES (001, 'หน่วยงานทะเบียน', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `employee`
-- 

CREATE TABLE `employee` (
  `emp_id` varchar(10) NOT NULL,
  `title_id` varchar(3) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_mobile` varchar(10) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `po_id` varchar(3) NOT NULL,
  `dep_id` varchar(3) NOT NULL,
  `emp_type` varchar(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_date` date NOT NULL,
  `emp_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `employee`
-- 

INSERT INTO `employee` VALUES ('123456', '001', 'ทดสอบ2', '0845555222', '222222@gmail.com', '001', '001', '1', 'user', '1234', '2018-03-29', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL auto_increment,
  `news_name` varchar(200) NOT NULL,
  `news_detail` text NOT NULL,
  `news_date` date NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `news`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `portfolio`
-- 

CREATE TABLE `portfolio` (
  `portfolio_id` int(10) NOT NULL auto_increment,
  `portfolio_start` date NOT NULL,
  `portfolio_end` date NOT NULL,
  `portfolio_name` varchar(200) NOT NULL,
  `portfolio_detail` text NOT NULL,
  `portfolio_date` date NOT NULL,
  PRIMARY KEY  (`portfolio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `portfolio`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `portfolio_pic`
-- 

CREATE TABLE `portfolio_pic` (
  `proid` int(10) NOT NULL auto_increment,
  `portfolio_id` varchar(10) NOT NULL,
  `portfolio_pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`proid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `portfolio_pic`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `position`
-- 

CREATE TABLE `position` (
  `po_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `po_name` varchar(200) NOT NULL,
  `po_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`po_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `position`
-- 

INSERT INTO `position` VALUES (001, 'อาจารย์', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `titlename`
-- 

CREATE TABLE `titlename` (
  `title_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `title_name` varchar(100) NOT NULL,
  `title_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

-- 
-- Dumping data for table `titlename`
-- 

INSERT INTO `titlename` VALUES (001, 'นาย', '');
INSERT INTO `titlename` VALUES (002, 'นาง', '');
INSERT INTO `titlename` VALUES (003, 'นางสาว', '');
INSERT INTO `titlename` VALUES (004, 'พลตำรวจเอก', '');
INSERT INTO `titlename` VALUES (005, 'พลตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (006, 'พลตำรวจโท', '');
INSERT INTO `titlename` VALUES (007, 'พลตำรวจโท หญิง', '');
INSERT INTO `titlename` VALUES (008, 'พลตำรวจตรี', '');
INSERT INTO `titlename` VALUES (009, 'พลตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (010, 'พันตำรวจเอก', '');
INSERT INTO `titlename` VALUES (011, 'พันตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (012, 'พันตำรวจเอกพิเศษ', '');
INSERT INTO `titlename` VALUES (013, 'พันตำรวจเอกพิเศษ หญิง', '');
INSERT INTO `titlename` VALUES (014, 'พันตำรวจโท', '');
INSERT INTO `titlename` VALUES (015, 'พันตำรวจโท หญิง', '');
INSERT INTO `titlename` VALUES (016, 'พันตำรวจตรี', '');
INSERT INTO `titlename` VALUES (017, 'พันตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (018, 'ร้อยตำรวจเอก', '');
INSERT INTO `titlename` VALUES (019, 'ร้อยตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (020, 'ร้อยตำรวจโท', '');
INSERT INTO `titlename` VALUES (021, 'ร้อยตำรวจโท หญิง', '');
INSERT INTO `titlename` VALUES (022, 'ร้อยตำรวจตรี', '');
INSERT INTO `titlename` VALUES (023, 'ร้อยตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (024, 'นายดาบตำรวจ', '');
INSERT INTO `titlename` VALUES (025, 'ดาบตำรวจหญิง', '');
INSERT INTO `titlename` VALUES (026, 'สิบตำรวจเอก', '');
INSERT INTO `titlename` VALUES (027, 'สิบตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (028, 'สิบตำรวจโท', '');
INSERT INTO `titlename` VALUES (029, 'สิบตำรวจตรี', '');
INSERT INTO `titlename` VALUES (030, 'สิบตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (031, 'จ่าสิบตำรวจ', '');
INSERT INTO `titlename` VALUES (032, 'จ่าสิบตำรวจ หญิง', '');
INSERT INTO `titlename` VALUES (033, 'พลตำรวจ', '');
INSERT INTO `titlename` VALUES (034, 'พลตำรวจ หญิง', '');
INSERT INTO `titlename` VALUES (035, 'พลเอก', '');
INSERT INTO `titlename` VALUES (036, 'พลเอก หญิง', '');
INSERT INTO `titlename` VALUES (037, 'พลโท', '');
INSERT INTO `titlename` VALUES (038, 'พลโท หญิง', '');
INSERT INTO `titlename` VALUES (039, 'พลตรี', '');
INSERT INTO `titlename` VALUES (040, 'พลตรี หญิง', '');
INSERT INTO `titlename` VALUES (041, 'พันเอก', '');
INSERT INTO `titlename` VALUES (042, 'พันเอก หญิง', '');
INSERT INTO `titlename` VALUES (043, 'พันเอกพิเศษ', '');
INSERT INTO `titlename` VALUES (044, 'พันเอกพิเศษ หญิง', '');
INSERT INTO `titlename` VALUES (045, 'พันโท', '');
INSERT INTO `titlename` VALUES (046, 'พันโท หญิง', '');
INSERT INTO `titlename` VALUES (047, 'พันตรี', '');
INSERT INTO `titlename` VALUES (048, 'พันตรี หญิง', '');
INSERT INTO `titlename` VALUES (049, 'ร้อยเอก', '');
INSERT INTO `titlename` VALUES (050, 'ร้อยเอก หญิง', '');
INSERT INTO `titlename` VALUES (051, 'ร้อยโท', '');
INSERT INTO `titlename` VALUES (052, 'ร้อยโท หญิง', '');
INSERT INTO `titlename` VALUES (053, 'ร้อยตรี', '');
INSERT INTO `titlename` VALUES (054, 'ร้อยตรี หญิง', '');
INSERT INTO `titlename` VALUES (055, 'สิบเอก', '');
INSERT INTO `titlename` VALUES (056, 'สิบเอก หญิง', '');
INSERT INTO `titlename` VALUES (057, 'สิบโท', '');
INSERT INTO `titlename` VALUES (058, 'สิบโท หญิง', '');
INSERT INTO `titlename` VALUES (059, 'สิบตรี', '');
INSERT INTO `titlename` VALUES (060, 'สิบตรี หญิง', '');
INSERT INTO `titlename` VALUES (061, 'จ่าสิบเอก', '');
INSERT INTO `titlename` VALUES (062, 'จ่าสิบเอก หญิง', '');
INSERT INTO `titlename` VALUES (063, 'จ่าสิบโท', '');
INSERT INTO `titlename` VALUES (064, 'จ่าสิบโท หญิง', '');
INSERT INTO `titlename` VALUES (065, 'จ่าสิบตรี', '');
INSERT INTO `titlename` VALUES (066, 'จ่าสิบตรี หญิง', '');
INSERT INTO `titlename` VALUES (067, 'ว่าที่ พ.ต.', '');
INSERT INTO `titlename` VALUES (068, 'ว่าที่ พ.ต. หญิง', '');
INSERT INTO `titlename` VALUES (069, 'ว่าที่ ร.อ.', '');
INSERT INTO `titlename` VALUES (070, 'ว่าที่ ร.อ. หญิง', '');
INSERT INTO `titlename` VALUES (071, 'ว่าที่ ร.ท.', '');
INSERT INTO `titlename` VALUES (072, 'ว่าที่ ร.ท. หญิง', '');
INSERT INTO `titlename` VALUES (073, 'ว่าที่ ร.ต.', '');
INSERT INTO `titlename` VALUES (074, 'พลเรือเอก', '');
INSERT INTO `titlename` VALUES (075, 'พลเรือเอก หญิง', '');
INSERT INTO `titlename` VALUES (076, 'พลเรือโท', '');
INSERT INTO `titlename` VALUES (077, 'พลเรือโท หญิง', '');
INSERT INTO `titlename` VALUES (078, 'พลเรือตรี', '');
INSERT INTO `titlename` VALUES (079, 'พลเรือตรี หญิง', '');
INSERT INTO `titlename` VALUES (080, 'นาวาเอก', '');
INSERT INTO `titlename` VALUES (081, 'นาวาเอก หญิง', '');
INSERT INTO `titlename` VALUES (082, 'นาวาเอกพิเศษ', '');
INSERT INTO `titlename` VALUES (083, 'นาวาเอกพิเศษ หญิง', '');
INSERT INTO `titlename` VALUES (084, 'นาวาโท', '');
INSERT INTO `titlename` VALUES (085, 'นาวาโท หญิง', '');
INSERT INTO `titlename` VALUES (086, 'นาวาตรี', '');
INSERT INTO `titlename` VALUES (087, 'นาวาตรี หญิง', '');
INSERT INTO `titlename` VALUES (088, 'เรือเอก', '');
INSERT INTO `titlename` VALUES (089, 'เรือเอก หญิง', '');
INSERT INTO `titlename` VALUES (090, 'เรือโท', '');
INSERT INTO `titlename` VALUES (091, 'เรือโท หญิง', '');
INSERT INTO `titlename` VALUES (092, 'เรือตรี', '');
INSERT INTO `titlename` VALUES (093, 'เรือโท หญิง', '');
INSERT INTO `titlename` VALUES (094, 'เรือตรี', '');
INSERT INTO `titlename` VALUES (095, 'เรือตรี หญิง', '');
INSERT INTO `titlename` VALUES (096, 'พันจ่าเอก', '');
INSERT INTO `titlename` VALUES (097, 'พันจ่าเอก หญิง', '');
INSERT INTO `titlename` VALUES (098, 'พันจ่าโท', '');
INSERT INTO `titlename` VALUES (099, 'พันจ่าโท หญิง', '');
INSERT INTO `titlename` VALUES (100, 'พันจ่าตรี', '');
INSERT INTO `titlename` VALUES (101, 'พันจ่าตรี หญิง', '');
INSERT INTO `titlename` VALUES (102, 'จ่าเอก', '');
INSERT INTO `titlename` VALUES (103, 'จ่าเอก หญิง', '');
INSERT INTO `titlename` VALUES (104, 'จ่าโท', '');
INSERT INTO `titlename` VALUES (105, 'จ่าโท หญิง', '');
INSERT INTO `titlename` VALUES (106, 'จ่าตรี', '');
INSERT INTO `titlename` VALUES (107, 'จ่าตรี หญิง', '');
INSERT INTO `titlename` VALUES (108, 'หม่อม', '');
INSERT INTO `titlename` VALUES (109, 'หม่อมหลวง', '');
INSERT INTO `titlename` VALUES (110, 'ดร.', '');
INSERT INTO `titlename` VALUES (111, 'ศ.ดร.', '');
INSERT INTO `titlename` VALUES (112, 'ผศ.ดร.', '');
INSERT INTO `titlename` VALUES (113, 'ผศ.', '');
INSERT INTO `titlename` VALUES (114, 'นพ.', '');
INSERT INTO `titlename` VALUES (115, 'แพทย์หญิง', '');
INSERT INTO `titlename` VALUES (116, 'เภสัชกร', '');
INSERT INTO `titlename` VALUES (117, 'คุณ', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `type_doc`
-- 

CREATE TABLE `type_doc` (
  `tdoc_id` int(10) NOT NULL auto_increment,
  `tdoc_name` varchar(100) NOT NULL,
  `tdoc_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`tdoc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `type_doc`
-- 

INSERT INTO `type_doc` VALUES (1, 'จดหมายเวียน', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `type_leave`
-- 

CREATE TABLE `type_leave` (
  `tleave_id` int(1) NOT NULL auto_increment,
  `tleave_name` varchar(100) NOT NULL,
  `tleave_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`tleave_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `type_leave`
-- 

INSERT INTO `type_leave` VALUES (1, 'ลาป่วย', '');
