-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `newsfeed`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `answers`
-- 

CREATE TABLE `answers` (
  `id` int(11) NOT NULL auto_increment,
  `status` varchar(20) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `date_ans` datetime NOT NULL,
  `detail` varchar(200) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

-- 
-- dump ตาราง `answers`
-- 

INSERT INTO `answers` VALUES (16, '1', '', 7, '2018-08-17 12:46:07', 'hello\r\n');
INSERT INTO `answers` VALUES (17, '1', '', 7, '2018-08-17 12:47:12', 'fefefw');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `calendar`
-- 

CREATE TABLE `calendar` (
  `calendar_id` int(10) NOT NULL auto_increment,
  `calendar_start` date NOT NULL,
  `calendar_end` date NOT NULL,
  `calendar_name` varchar(200) NOT NULL,
  `calendar_detail` text NOT NULL,
  `calendar_date` date NOT NULL,
  `calendar_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`calendar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- 
-- dump ตาราง `calendar`
-- 

INSERT INTO `calendar` VALUES (1, '2017-05-12', '2017-05-12', 'ปัจฉิมนิเทศ ประจำปีการศึกษา 2561', '<p><span>เพื่อแสดงความยินดีในการสำเร็จการศึกษาและสร้างขวัญกำลังใจให้แก่นักศึกษารุ่นน้องแสดงความยินดีต่อรุ่นพี่&nbsp; สร้างความสามัคคีระหว่างรุ่นพี่&nbsp; รุ่นน้อง&nbsp; และอาจารย์&nbsp;&nbsp;</span><br /><span>และเพื่อให้นักศึกษาได้รับความรู้เกี่ยวกับการเตรียมพร้อมสู่โลกแห่งการทำงาน โดยจะดำเนินการในวันที่&nbsp; 12&nbsp; พฤษภาคม&nbsp; 2561</span></p>', '2018-05-11', '');
INSERT INTO `calendar` VALUES (2, '2018-05-31', '2018-05-31', 'ONLINE CADET PRETEST เตรียมพร้อมก่อนสอบ เตรียมทหาร’61', '<p><span>&ldquo;เตรียมก้าวสู้รั้วจักรดาว&rdquo; การสอบเสมือนจริง เก็งข้อสอบความยากใกล้เคียงข้อสอบจริง สอบผ่านระบบออนไลน์ไม่ต้องเดินทาง ประกาศผลพร้อมจัดลำดับนักเรียนที่ร่วมสอบ ประเมินโอกาสติด และวิเคราะห์จุดอ่อนจุดแข็งได้ทันที</span><br /><br /><br /></p>', '2018-05-11', '0');
INSERT INTO `calendar` VALUES (3, '2018-06-01', '2018-06-01', 'ค่ายค้นหาอาชีพที่ใช่ คณะที่ชอบ (Mirror Mirror)  ', '<p><span>เคยมั้ย ไม่รู้ว่าเราจะเรียนวิทย์ หรือ ศิลป์? เคยมั้ย ไม่รู้เราถนัดอะไร? เคยมั้ย ไม่รู้เราชอบอะไร? และเคยมั้ย ไม่รู้อยากเป็นอะไร? ถ้าคำตอบของน้องๆ คือ &ldquo;เคย&rdquo; มาค้นหาตัวตนของเรากับค่าย Mirror Mirror</span><br /><br /><br /></p>', '2018-05-11', 'P');
INSERT INTO `calendar` VALUES (4, '2018-05-17', '2018-05-19', 'เข้าค่าย', '<p>เข้าค่ายภาษาอังกฤษ</p>', '2018-05-17', '0');
INSERT INTO `calendar` VALUES (6, '2018-06-20', '2018-06-22', 'เข้าค่าย', '<p><span style="font-size: large;">czasfsdfsadfsdf</span></p>', '2018-06-20', '0');
INSERT INTO `calendar` VALUES (7, '2018-06-14', '2018-06-15', 'เข้าค่ายการพูด1', '', '2018-06-20', '0');
INSERT INTO `calendar` VALUES (8, '2018-06-13', '2018-06-15', 'เข้าค่ายการพูด1', '<p>เข้าค่ายการพูด1</p>', '2018-06-20', '0');
INSERT INTO `calendar` VALUES (9, '2018-06-20', '2018-06-20', 'เข้าค่ายการพูด1', '<p>1111</p>', '2018-06-20', '0');
INSERT INTO `calendar` VALUES (10, '2018-06-26', '2018-06-29', 'เข้าค่าย1', '<p>เข้าค่ายการพูด1</p>', '2018-06-20', 'P');
INSERT INTO `calendar` VALUES (11, '2018-06-27', '2018-06-30', 'เข้าค่าย2', '<p>เข้าค่ายการพูด1</p>', '2018-06-20', '0');
INSERT INTO `calendar` VALUES (12, '2018-07-25', '2018-07-27', 'อบรมบุคลากร', '<p><span style="font-size: medium;">อบรมบุคลากร</span></p>', '2018-06-28', '');
INSERT INTO `calendar` VALUES (13, '2018-07-04', '2018-07-05', 'อบรมการพูด', '', '2018-07-03', '');
INSERT INTO `calendar` VALUES (14, '2018-07-17', '2018-07-19', 'การใช้คอมพิวเตอร์ในสำนักงาน', '<table style="height: 208px;" border="0" cellspacing="2" cellpadding="2" align="center">\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#eeeeee">\r\n<div><span>1</span></div>\r\n</td>\r\n<td bgcolor="#eeeeee"><span>Microsoft Windows 10</span></td>\r\n<td bgcolor="#eeeeee">\r\n<p><span>18 ส.ค.61 (ทั้งวัน),&nbsp; 19 ส.ค.61(เช้า)</span></p>\r\n</td>\r\n<td bgcolor="#eeeeee">\r\n<div><span>9</span></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<div><span>2</span></div>\r\n</td>\r\n<td><span>Microsoft Word&nbsp;2016</span></td>\r\n<td><span>19 ส.ค.61(บ่าย),&nbsp; 25 ส.ค.61(ทั้งวัน)<br /></span></td>\r\n<td>\r\n<div><span>9</span></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">\r\n<div><span>3</span></div>\r\n</td>\r\n<td bgcolor="#eeeeee"><span>Microsoft Excel&nbsp;2016</span></td>\r\n<td bgcolor="#eeeeee"><span>26 ส.ค.61(ทั้งวัน),&nbsp; 1 ก.ย.61(เช้า)<br /></span></td>\r\n<td bgcolor="#eeeeee">\r\n<div><span>9</span></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<div><span>4</span></div>\r\n</td>\r\n<td><span>Microsoft Power Point&nbsp;2016</span></td>\r\n<td><span>1 ก.ย.61 (บ่าย),&nbsp; 2 ก.ย.61 (ทั้งวัน)<br /></span></td>\r\n<td>\r\n<div><span>9</span></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">\r\n<div><span>5</span></div>\r\n</td>\r\n<td bgcolor="#eeeeee"><span>Internet</span></td>\r\n<td bgcolor="#eeeeee"><span>8 ก.ย.61(ทั้งวัน)<br /></span></td>\r\n<td bgcolor="#eeeeee">\r\n<div><span>6</span></div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2018-07-16', '');
INSERT INTO `calendar` VALUES (15, '2018-07-16', '2018-07-18', 'เข้าค่ายภาษา', '<p>เข้าค่ายภาษา</p>', '2018-07-24', '');
INSERT INTO `calendar` VALUES (16, '2018-08-01', '2018-08-03', 'เข้าค่ายภาษาจีน', '<p>เข้าค่ายภาษาจีน</p>', '2018-07-24', '');
INSERT INTO `calendar` VALUES (17, '2018-07-26', '2018-07-27', 'อบรมการพูด1', '', '2018-07-25', '');
INSERT INTO `calendar` VALUES (18, '2018-08-15', '2018-08-17', 'เข้าค่ายrobot', '<p>เข้าค่ายrobot</p>', '2018-08-14', '');
INSERT INTO `calendar` VALUES (19, '2018-09-03', '2018-09-05', 'อบรบหลักสูตรนานาชาติ', '<p>อบรบหลักสูตรนานาชาติ</p>', '2018-08-14', '');
INSERT INTO `calendar` VALUES (20, '2018-08-15', '2018-08-17', 'เข้าค่ายการพูด10', '<p>test</p>', '2018-08-15', '');
INSERT INTO `calendar` VALUES (21, '2018-08-16', '2018-08-23', 'อบรมบุคลากร10', '<p>อบรมบุคลากร10 วันที่ 20 มกราคม2562</p>', '2018-08-16', '');
INSERT INTO `calendar` VALUES (22, '2018-08-17', '2018-08-19', 'เข้าค่ายอบรม1', '<p>เข้าค่ายอบรม</p>', '2018-08-16', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `department`
-- 

CREATE TABLE `department` (
  `dep_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `dep_name` varchar(255) NOT NULL,
  `dep_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`dep_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `department`
-- 

INSERT INTO `department` VALUES (001, 'หัวหน้าสำนักงาน', '');
INSERT INTO `department` VALUES (002, 'งานวิชาการ', '');
INSERT INTO `department` VALUES (003, 'งานการเงิน', '');
INSERT INTO `department` VALUES (004, 'งานพัสดุ', '');
INSERT INTO `department` VALUES (005, 'งานวิเคราะห์นโยบายและแผน', '');
INSERT INTO `department` VALUES (006, 'งานกิจการนักศึกษา', '');
INSERT INTO `department` VALUES (007, 'งานช่างเทคนิค', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `document`
-- 

CREATE TABLE `document` (
  `doc_id` int(5) unsigned zerofill NOT NULL auto_increment,
  `doc_date` date NOT NULL,
  `dep_id` varchar(3) NOT NULL,
  `tdoc_id` varchar(10) NOT NULL,
  `doc_name` varchar(200) NOT NULL,
  `doc_file` varchar(100) NOT NULL,
  PRIMARY KEY  (`doc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- dump ตาราง `document`
-- 

INSERT INTO `document` VALUES (00001, '2018-05-11', '001', '3', 'xxx xxx xx222', 'docfile/110518_005806.pdf');
INSERT INTO `document` VALUES (00002, '2018-05-18', '006', '1', 'รายงานการประชุม', 'docfile/180518_102623.docx');
INSERT INTO `document` VALUES (00003, '2018-06-20', '002', '2', 'รายงานการประชุม', 'docfile/200618_204521.docx');
INSERT INTO `document` VALUES (00004, '2018-06-28', '001', '2', 'รายงานการประชุม', 'docfile/280618_234328.rar');
INSERT INTO `document` VALUES (00005, '2018-06-28', '001', '3', 'รายงานการประชุม', 'docfile/280618_234803.docx');
INSERT INTO `document` VALUES (00009, '2018-08-14', '', '1', 'รายงานการประชุม', 'docfile/140818_131409.vsd');
INSERT INTO `document` VALUES (00010, '2018-08-14', '003', '1', 'รายงานการประชุม', 'docfile/140818_131658.vsd');
INSERT INTO `document` VALUES (00011, '2018-08-15', '', '1', 'รายงานการประชุม1/61', 'docfile/160818_183934.rar');
INSERT INTO `document` VALUES (00012, '2018-08-16', '', '1', 'แบบประเมิน1/61', 'docfile/160818_183830.rar');
INSERT INTO `document` VALUES (00013, '2018-08-16', '001', '1', 'test', 'docfile/160818_184025.rar');
INSERT INTO `document` VALUES (00014, '2018-08-16', '001', '3', 'test1', 'newsfeed/admin/docfile/160818_184547.rar');
INSERT INTO `document` VALUES (00015, '2018-08-16', '001', '3', 'test2', 'docfile/160818_184855.docx');
INSERT INTO `document` VALUES (00016, '2018-08-22', '001', '1', '11111111111111', 'docfile/220818_230835.rar');
INSERT INTO `document` VALUES (00017, '2018-08-22', '', '', '', 'docfile/220818_231313');
INSERT INTO `document` VALUES (00018, '2018-08-22', '001', '1', '222222222222', 'docfile/220818_231533.rar');
INSERT INTO `document` VALUES (00019, '2018-08-22', '001', '2', '33333333333333', 'docfile/220818_231705.rar');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `employee`
-- 

CREATE TABLE `employee` (
  `emp_id` varchar(10) NOT NULL,
  `title_id` varchar(3) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_mobile` varchar(10) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `po_id` varchar(3) NOT NULL,
  `dep_id` varchar(3) NOT NULL,
  `user_type_id` varchar(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_date` date NOT NULL,
  `emp_status` varchar(1) NOT NULL,
  `birth_date` date NOT NULL,
  `first_date` date NOT NULL,
  PRIMARY KEY  (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `employee`
-- 

INSERT INTO `employee` VALUES ('1234567', '025', 'อุทัยวรรณ แก้วป้อง', '0821990291', '5506021622134@fitm.kmutnb.ac.th', '002', '006', '1', 'mind', '1234567mind', '2018-08-17', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('152346', '117', 'เจ้าหน้าที่', '0854412220', 'a@gmcil.om', '001', '006', '2', 'user', '1234', '2018-05-12', 'C', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('1452136', '117', 'บริหาร', '0842212000', 'ceo@gmail.com', '003', '001', '3', 'ceo', '1234', '2018-05-12', 'C', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('5506021622', '114', 'กัลยา นา', '0821990291', '111@gmail.com', '001', '001', '2', 'mint', '1234', '2018-05-17', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('110072450', '002', 'ณภัทร ศรีปราชญ์', '0821990291', '5506021622134@fitm.kmutnb.ac.th', '003', '001', '3', 'napat', '1234', '2018-08-14', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('55060216', '110', 'มาตา ปิ', '081264854', '44@hotmail.com', '003', '007', '1', 'abc', '1234', '2018-05-18', 'C', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('888888', '106', 'AABB', '0000000', '44@hotmail', '002', '004', '2', 'mint', '1111', '2018-05-23', 'C', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('11111', '106', 'อุทัยวรรณ แก้วป้อง', '0821990291', '2222@gmail.com', '001', '004', '2', 'mint5931', '1234', '2018-06-20', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('1212121', '004', 'กัลยา นา', '0821990291', '2222@gmail.com', '001', '006', '1', 'mint111', '1234', '2018-06-20', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('112233', '102', 'a', '0821990291', '444@gmail.com', '002', '003', '', 'a123', '1234', '2018-06-30', 'C', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('123456789', '031', 'abcd', '0000000', '333@gmail.com', '002', '006', '1', 'a12345', '1234', '2018-06-30', 'C', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('11223344', '025', 'จินตนา ล้ำ', '0816694571', '111@gmail.com', '002', '003', '1', 'admin', '1234', '2018-07-23', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('12345678', '106', 'กิตติศักดิ์ นาลาด', '0821990291', '2222@gmail.com', '002', '003', '2', 'mint55', 'mint5931', '2018-08-14', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('5706021622', '104', 'สมัชชัย สีทา', '0907726880', '5706021622060@fitm.kmutnb.ac.th', '002', '007', '3', 'flookku', '5706021622060flookku', '2018-08-16', '', '0000-00-00', '0000-00-00');
INSERT INTO `employee` VALUES ('55060212', '002', 'สวย มาก', '0821990291', '333@gmail.com', '001', '003', '2', 'aa', '55060212aa', '2018-08-16', 'C', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `leavela`
-- 

CREATE TABLE `leavela` (
  `id` int(10) NOT NULL auto_increment,
  `date_la` date NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `leave_date` date NOT NULL,
  `leave_enddate` date NOT NULL,
  `total_day` varchar(10) NOT NULL,
  `type_leave` varchar(1) NOT NULL,
  `detail_leave` text NOT NULL,
  `status_la` varchar(1) NOT NULL,
  `stamp_con` varchar(200) NOT NULL,
  `date_con` date NOT NULL,
  `file_pdf` varchar(255) NOT NULL,
  `id_Vacation` int(3) NOT NULL,
  `subject_leave` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- dump ตาราง `leavela`
-- 

INSERT INTO `leavela` VALUES (33, '2018-08-16', '5506021622', '2018-08-16', '2018-08-27', '1', '1', 'ลากิจ', '', '110072450', '2018-08-16', 'file/160818_183140.pdf', 0, 'ลากิจ');
INSERT INTO `leavela` VALUES (32, '2018-08-16', '5506021622', '2018-08-17', '2018-08-30', '1', '7', 'ลาคลอด', 'N', '110072450', '2018-08-16', 'file/160818_080610.doc', 0, 'ลาคลอด');
INSERT INTO `leavela` VALUES (31, '2018-08-15', '5506021622', '2018-08-16', '2018-08-31', '1', '7', 'ลาคลอด', 'Y', '110072450', '2018-08-15', 'file/150818_211959.doc', 0, 'ลาคลอด');
INSERT INTO `leavela` VALUES (28, '2018-08-15', '5506021622', '2018-08-13', '2018-08-14', '1', '3', 'ลาพักต่างประเทศเพื่อไปดูงาน', 'Y', '110072450', '2018-08-16', 'file/160818_080326.doc', 0, 'ลาพักไปต่างประเทศ');
INSERT INTO `leavela` VALUES (34, '2018-08-27', '5506021622', '2018-08-27', '2018-08-27', '1', '7', 's', '', '', '0000-00-00', 'file/270818_163438.pdf', 0, 's');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `news`
-- 

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL auto_increment,
  `news_name` varchar(200) NOT NULL,
  `news_detail` text NOT NULL,
  `news_date` datetime NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- dump ตาราง `news`
-- 

INSERT INTO `news` VALUES (12, 'วัฒนธรรมเกาหลี', '<p><span style="font-size: large;">hgsdgs</span></p>', '2018-06-29 08:19:17', 'news/290618_103440.jpg');
INSERT INTO `news` VALUES (2, 'อลงกรณ์ มอบทุนการศึกษาแก่บุตร – ธิดา สมาชิกชมรมช่างภาพการเมือง ครั้งที่ 9', '<h5><span>&ldquo;อลงกรณ์ &rdquo; เป็น ปธ. มอบทุนการศึกษาแก่บุตร &ndash; ธิดา สมาชิกชมรมช่างภาพการเมือง ครั้งที่ 9 จำนวน 80 ทุน และทุนช่างภาพเข้มแข็งให้แก่ช่างภาพ &ndash; ผู้สื่อข่าวอาวุโส ที่ประสบความเดือดร้อน จำนวน 6 ทุน</span></h5>\r\n<p>วันที่ 6 พ.ค. 61 เวลา 10.00 น.นายอลงกรณ์ พลบุตร อดีตรองประธานสภาขับเคลื่อนการปฏิรูปประเทศ คนที่หนึ่ง และประธานที่ปรึกษาชมรมช่างภาพการเมือง เป็นประธานในพิธีมอบทุนการศึกษาแก่บุตร &ndash; ธิดา สมาชิกชมรมช่างภาพการเมือง ครั้งที่ 9 โดยมีนายชัยยศ ศิริสวัสดิ์ ประธานชมรมช่างภาพการเมือง กล่าวรายงาน</p>\r\n<p><a href="https://news.mthai.com/pr-news/639367.html/attachment/31706577_1885044311529811_8819225913632751616_n" rel="attachment wp-att-639368"><img class="aligncenter size-large wp-image-639368" src="https://news.mthai.com/app/uploads/2018/05/31706577_1885044311529811_8819225913632751616_n-1024x684.jpg" alt="" width="640" height="428" /></a></p>\r\n<p>สำหรับพิธีมอบทุนการศึกษาในครั้งนี้ ชมรมช่างภาพการเมือง ได้มอบทุนการศึกษาให้แก่บุตร &ndash; ธิดา สมาชิกชมรมช่างภาพการเมือง จำนวน 80 ทุน และทุนช่างภาพเข้มแข็งให้แก่ช่างภาพ &ndash; ผู้สื่อข่าวอาวุโส ที่ประสบความเดือดร้อน จำนวน 6 ทุน นอกจากนี้ ยังได้มอบทุนการศึกษาพิเศษเพื่อสังคมจำนวน 4 ทุน โดยมอบให้น้องผู้บกพร่องทางการมองเห็น จำนวน 2 ทุน</p>\r\n<p>และน้องผู้บกพร่องทางการได้ยิน จำนวน 2 ทุน เพื่อแบ่งเบาภาระค่าใช้จ่ายในการศึกษา และเป็นกำลังใจให้น้อง ๆ มีความตั้งใจศึกษาเล่าเรียน และเป็นคนดีของสังคมต่อไป โดยหลังจากเสร็จพิธี สมาชิกชมรมช่างภาพการเมือง พร้อมคณะ ได้เข้าชมห้องประชุมรัฐสภา ชั้น 2 อาคารรัฐสภา 1</p>', '2018-05-11 19:09:46', 'news/110518_143122.jpg');
INSERT INTO `news` VALUES (3, 'Chin’s Gallery เปิดแกลเลอรี พาชมผลงานศิลปะ Abstract ชมฟรีถึง 6 พ.ค.', '<h5><span>Chin&rsquo;s Gallery เปิดแกลเลอรี พาชมผลงานศิลปะแนว Abstract โดย Sam Friedman เป็นครั้งแรกในเอเชีย ผู้ทีสนใจสามารถเข้าชมผลงานของ Sam Friedman ได้ฟรี ตั้งแต่วันนี้ &ndash; วันที่ 6 พ.ค. 61&nbsp;</span></h5>\r\n<p>Chin&rsquo;s Gallery แกลเลอรีแนว Contemporary Art แห่งใหม่ใจกลางกรุงเทพฯ ร่วมต้อนรับศิลปินแนว Abstract ดาวรุ่งชาวอเมริกัน อย่าง Sam Friedman ซึ่งมีประสบการณ์ในแวดวงศิลปะมาอย่างยาวนาน ทั้งยังเคยร่วมงานกับ The New York Times, Nike และ KAWS ที่มาจัดแสดงนิทรรศการด้วยผลงานศิลปะ Abstract อันเป็นเอกลักษณ์ภายใต้แนวคิด &lsquo;Running&rsquo; ที่ได้ถ่ายทอดความงดงามของธรรมชาติผ่านการเคลื่อนไหวของลายเส้นและมุมมองที่แตกต่าง โดยการจัดแสดงผลงานในครั้งนี้เป็นการจัดนิทรรศการในเอเชียครั้งแรกของเขา</p>\r\n<p><a href="https://news.mthai.com/pr-news/631345.html/attachment/sam-friedman-4" rel="attachment wp-att-631347"><img class="aligncenter size-full wp-image-631347" src="https://news.mthai.com/app/uploads/2018/04/Sam-Friedman-4.jpg" alt="" width="637" height="424" /></a></p>\r\n<p>อรศิรี ชินกำธรวงศ์ ผู้ก่อตั้ง Chin&rsquo;s Gallery กล่าวว่า &ldquo;ศิลปะแนว Urban Contemporary Art เป็นแนวที่สนุก มีความหลากหลาย น่าตื่นเต้น และคนไทยก็หันมาสนใจศิลปะแนวนี้กันมากขึ้นเรื่อยๆ ดังนั้น เราเห็นว่า คงจะดี หากคนไทยได้มีโอกาสแลกเปลี่ยนประสบการณ์และมุมมองของศิลปะประเภทนี้กับศิลปินหลากหลายเชื้อชาติ</p>\r\n<p>โดยเราตั้งใจว่า ในอนาคตจะมีการนำศิลปินชื่อดังจากหลายประเทศเข้ามาอย่างต่อเนื่อง ให้คนไทยได้มีโอกาสเสพงานศิลป์คุณภาพโดยที่ไม่ต้องเดินทางไปต่างประเทศ ในขณะเดียวกัน เราก็หวังว่าในอนาคต ก็จะสามารถเป็นสะพานเชื่อมให้ศิลปินไทยสามารถนำชิ้นงานไปแสดงในตลาดต่างประเทศได้เช่นกัน&ldquo;</p>\r\n<div id="dfp-inbetween-0" class="placeholder-inbetween" data-google-query-id="CMKOo4WS_doCFdAjaAodo28MkA">&nbsp;</div>', '2018-05-11 07:31:27', 'news/110518_143159.jpg');
INSERT INTO `news` VALUES (4, 'เคล็ดไม่ลับ จากอาจารย์วิโรจน์ แนะเสริมดวงช่วงตรุษจีน', '<h5><span>อาจารย์วิโรจน์ ตั้งวาณิชย์ แนะเคล็ดลับเสริมดวงในช่วงตรุษจีนเพื่อความเฮงตลอดปี</span></h5>\r\n<p>ตรุษจีน หรือเทศกาลปีใหม่ของชาวจีนนับเป็นวันมงคลที่สำคัญของชาวจีนมาช้านาน และในช่วงเทศกาลดังกล่าวชาวจีนได้มีความเชื่อหรือวิถีปฏิบัติสืบต่อกันมา เพื่อเป็นการสร้างสิริมงคลให้กับตัวเองและครอบครัวตลอดทั้งปี หลายท่านอาจยังไม่ทราบถึงที่มาที่ไปของความเชื่อดังกล่าว Shopee ร่วมมือกับกูรูชื่อดังด้านวัฒนธรรมจีน อาจารย์วิโรจน์ ตั้งวาณิชย์ นำที่มาที่ไปของวิถีปฏิบัติในเทศกาลตรุษจีนตามความเชื่อของชาวแต้จิ๋วมาฝาก</p>\r\n<p><a href="https://news.mthai.com/app/uploads/2018/02/15-02-18-32.jpg"><img class="aligncenter size-full wp-image-618734" src="https://news.mthai.com/app/uploads/2018/02/15-02-18-32.jpg" alt="" width="450" height="600" /></a></p>\r\n<p>แต่เดิมที่มาของเทศกาลตรุษจีนคือ การเฉลิมฉลองฤดูใบไม้ผลิ ซึ่งถือเป็นฤดูเริ่มต้นของวงจรการเพาะปลูกเก็บเกี่ยวพืชผลของคนในสมัยก่อน ตรุษจีนจึงถือเป็นการเริ่มต้นนับปีใหม่ ดังนั้น พิธีการและความเชื่อพึงปฏิบัติในวันตรุษจีนจึงถือเป็นเรื่องสำคัญ โดยเฉพาะพิธีการและความเชื่อพึงปฏิบัติในวัน ตรุษจีน ถือเป็นเรื่องสำคัญ โดยมีสิ่งที่ควรและไม่ควรปฏิบ้ติ ดังต่อไปนี้</p>', '2018-05-11 03:09:00', 'news/110518_143456.jpg');
INSERT INTO `news` VALUES (7, 'วัฒนธรรมเกาหลี', '<p>วัฒนธรรมเกาหลี</p>\r\n<p>&nbsp;</p>', '2018-06-20 16:25:30', 'news/280618_233749.jpg');
INSERT INTO `news` VALUES (13, 'วัฒนธรรมเกาหลี2', '', '2018-07-03 06:22:27', 'news/150818_134524.jpg');
INSERT INTO `news` VALUES (14, 'วัฒนธรรมเกาหลี1', '', '2018-07-03 22:09:38', 'news/030718_003107.jpg');
INSERT INTO `news` VALUES (19, 'การทำขนม1', '<p>การทำขนม</p>', '2018-08-16 18:03:04', 'news/160818_180444.jpg');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `portfolio`
-- 

CREATE TABLE `portfolio` (
  `portfolio_id` int(10) NOT NULL auto_increment,
  `calendar_id` varchar(200) NOT NULL,
  `portfolio_detail` text NOT NULL,
  `portfolio_date` date NOT NULL,
  PRIMARY KEY  (`portfolio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `portfolio`
-- 

INSERT INTO `portfolio` VALUES (1, '3', '<p>xxx</p>', '2018-08-27');
INSERT INTO `portfolio` VALUES (2, '10', '<p>asdfsdf</p>', '2018-09-25');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `portfolio_pic`
-- 

CREATE TABLE `portfolio_pic` (
  `proid` int(10) NOT NULL auto_increment,
  `portfolio_id` varchar(10) NOT NULL,
  `portfolio_pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`proid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `portfolio_pic`
-- 

INSERT INTO `portfolio_pic` VALUES (1, '1', '1270818_161954.jpg');
INSERT INTO `portfolio_pic` VALUES (2, '1', '2270818_161954.jpg');
INSERT INTO `portfolio_pic` VALUES (8, '2', '250918_1752283.jpg');
INSERT INTO `portfolio_pic` VALUES (7, '2', '250918_1752282.jpg');
INSERT INTO `portfolio_pic` VALUES (6, '2', '250918_1752281.jpg');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `position`
-- 

CREATE TABLE `position` (
  `po_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `po_name` varchar(100) NOT NULL,
  `po_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`po_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `position`
-- 

INSERT INTO `position` VALUES (001, 'อาจารย์', '');
INSERT INTO `position` VALUES (002, 'ผู้วิเคราะห์ระบบ', '');
INSERT INTO `position` VALUES (003, 'ผู้บริหาร', '');
INSERT INTO `position` VALUES (004, 'ภารโรง', 'C');
INSERT INTO `position` VALUES (005, 'อาจารย์IBT', 'C');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `questions`
-- 

CREATE TABLE `questions` (
  `id` int(11) NOT NULL auto_increment,
  `topic` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `detail` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `status` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `view` int(4) NOT NULL,
  `reply` int(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `questions`
-- 

INSERT INTO `questions` VALUES (7, 'สมัครเรียน', 'hhh', 'hhh', '', 'mimindmit@gmail.com', '2018-08-17 12:41:01', 8, 2);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `titlename`
-- 

CREATE TABLE `titlename` (
  `title_id` int(3) unsigned zerofill NOT NULL auto_increment,
  `title_name` varchar(50) NOT NULL,
  `title_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

-- 
-- dump ตาราง `titlename`
-- 

INSERT INTO `titlename` VALUES (076, 'พลเรือโท', '');
INSERT INTO `titlename` VALUES (075, 'พลเรือเอก หญิง', '');
INSERT INTO `titlename` VALUES (074, 'พลเรือเอก', '');
INSERT INTO `titlename` VALUES (073, 'ว่าที่ ร.ต.', '');
INSERT INTO `titlename` VALUES (072, 'ว่าที่ ร.ท. หญิง', '');
INSERT INTO `titlename` VALUES (070, 'ว่าที่ ร.อ. หญิง', '');
INSERT INTO `titlename` VALUES (071, 'ว่าที่ ร.ท.', '');
INSERT INTO `titlename` VALUES (069, 'ว่าที่ ร.อ.', '');
INSERT INTO `titlename` VALUES (068, 'ว่าที่ พ.ต. หญิง', '');
INSERT INTO `titlename` VALUES (067, 'ว่าที่ พ.ต.', '');
INSERT INTO `titlename` VALUES (066, 'จ่าสิบตรี หญิง', '');
INSERT INTO `titlename` VALUES (065, 'จ่าสิบตรี', '');
INSERT INTO `titlename` VALUES (064, 'จ่าสิบโท หญิง', '');
INSERT INTO `titlename` VALUES (063, 'จ่าสิบโท', '');
INSERT INTO `titlename` VALUES (062, 'จ่าสิบเอก หญิง', '');
INSERT INTO `titlename` VALUES (061, 'จ่าสิบเอก', '');
INSERT INTO `titlename` VALUES (060, 'สิบตรี หญิง', '');
INSERT INTO `titlename` VALUES (059, 'สิบตรี', '');
INSERT INTO `titlename` VALUES (058, 'สิบโท หญิง', '');
INSERT INTO `titlename` VALUES (057, 'สิบโท', '');
INSERT INTO `titlename` VALUES (056, 'สิบเอก หญิง', '');
INSERT INTO `titlename` VALUES (055, 'สิบเอก', '');
INSERT INTO `titlename` VALUES (054, 'ร้อยตรี หญิง', '');
INSERT INTO `titlename` VALUES (053, 'ร้อยตรี', '');
INSERT INTO `titlename` VALUES (052, 'ร้อยโท หญิง', '');
INSERT INTO `titlename` VALUES (051, 'ร้อยโท', '');
INSERT INTO `titlename` VALUES (050, 'ร้อยเอก หญิง', '');
INSERT INTO `titlename` VALUES (049, 'ร้อยเอก', '');
INSERT INTO `titlename` VALUES (048, 'พันตรี หญิง', '');
INSERT INTO `titlename` VALUES (047, 'พันตรี', '');
INSERT INTO `titlename` VALUES (046, 'พันโท หญิง', '');
INSERT INTO `titlename` VALUES (045, 'พันโท', '');
INSERT INTO `titlename` VALUES (044, 'พันเอกพิเศษ หญิง', '');
INSERT INTO `titlename` VALUES (043, 'พันเอกพิเศษ', '');
INSERT INTO `titlename` VALUES (042, 'พันเอก หญิง', '');
INSERT INTO `titlename` VALUES (041, 'พันเอก', '');
INSERT INTO `titlename` VALUES (040, 'พลตรี หญิง', '');
INSERT INTO `titlename` VALUES (039, 'พลตรี', '');
INSERT INTO `titlename` VALUES (038, 'พลโท หญิง', '');
INSERT INTO `titlename` VALUES (037, 'พลโท', '');
INSERT INTO `titlename` VALUES (036, 'พลเอก หญิง', '');
INSERT INTO `titlename` VALUES (035, 'พลเอก', '');
INSERT INTO `titlename` VALUES (034, 'พลตำรวจ หญิง', '');
INSERT INTO `titlename` VALUES (033, 'พลตำรวจ', '');
INSERT INTO `titlename` VALUES (032, 'จ่าสิบตำรวจ หญิง', '');
INSERT INTO `titlename` VALUES (031, 'จ่าสิบตำรวจ', '');
INSERT INTO `titlename` VALUES (030, 'สิบตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (029, 'สิบตำรวจตรี', '');
INSERT INTO `titlename` VALUES (028, 'สิบตำรวจโท', '');
INSERT INTO `titlename` VALUES (027, 'สิบตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (026, 'สิบตำรวจเอก', '');
INSERT INTO `titlename` VALUES (025, 'ดาบตำรวจหญิง', '');
INSERT INTO `titlename` VALUES (024, 'นายดาบตำรวจ', '');
INSERT INTO `titlename` VALUES (023, 'ร้อยตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (022, 'ร้อยตำรวจตรี', '');
INSERT INTO `titlename` VALUES (021, 'ร้อยตำรวจโท หญิง', '');
INSERT INTO `titlename` VALUES (020, 'ร้อยตำรวจโท', '');
INSERT INTO `titlename` VALUES (019, 'ร้อยตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (018, 'ร้อยตำรวจเอก', '');
INSERT INTO `titlename` VALUES (017, 'พันตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (016, 'พันตำรวจตรี', '');
INSERT INTO `titlename` VALUES (015, 'พันตำรวจโท หญิง', '');
INSERT INTO `titlename` VALUES (014, 'พันตำรวจโท', '');
INSERT INTO `titlename` VALUES (013, 'พันตำรวจเอกพิเศษ หญิง', '');
INSERT INTO `titlename` VALUES (012, 'พันตำรวจเอกพิเศษ', '');
INSERT INTO `titlename` VALUES (011, 'พันตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (010, 'พันตำรวจเอก', '');
INSERT INTO `titlename` VALUES (009, 'พลตำรวจตรี หญิง', '');
INSERT INTO `titlename` VALUES (008, 'พลตำรวจตรี', '');
INSERT INTO `titlename` VALUES (006, 'พลตำรวจโท', '');
INSERT INTO `titlename` VALUES (005, 'พลตำรวจเอก หญิง', '');
INSERT INTO `titlename` VALUES (004, 'พลตำรวจเอก', '');
INSERT INTO `titlename` VALUES (003, 'นางสาว', '');
INSERT INTO `titlename` VALUES (002, 'นาง', '');
INSERT INTO `titlename` VALUES (119, 'นาย', '');
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
-- โครงสร้างตาราง `type_doc`
-- 

CREATE TABLE `type_doc` (
  `tdoc_id` int(11) NOT NULL auto_increment,
  `tdoc_name` varchar(255) NOT NULL,
  `tdoc_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`tdoc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `type_doc`
-- 

INSERT INTO `type_doc` VALUES (1, 'แบบประเมินรายงาน', '');
INSERT INTO `type_doc` VALUES (2, 'แบบฟอร์มบริการวิชาการแก่สังคม', '');
INSERT INTO `type_doc` VALUES (3, 'แบบฟอร์มอาจารย์พิเศษ 2/60', '');
INSERT INTO `type_doc` VALUES (4, 'แบบฟอร์มบริการวิชาการ', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `type_leave`
-- 

CREATE TABLE `type_leave` (
  `tleave_id` int(11) NOT NULL auto_increment,
  `tleave_name` varchar(255) NOT NULL,
  `tleave_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`tleave_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `type_leave`
-- 

INSERT INTO `type_leave` VALUES (1, 'ลากิจ', '');
INSERT INTO `type_leave` VALUES (2, 'ลาป่วย', '');
INSERT INTO `type_leave` VALUES (3, 'ลาพักร้อน', '');
INSERT INTO `type_leave` VALUES (8, 'ลาพักผ่อน', '');
INSERT INTO `type_leave` VALUES (7, 'ลาคลอด', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user_type`
-- 

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL auto_increment,
  `user_type_name` varchar(255) NOT NULL,
  `user_type_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `user_type`
-- 

INSERT INTO `user_type` VALUES (1, 'ผู้ดูแลระบบ', '');
INSERT INTO `user_type` VALUES (2, 'เจ้าหน้าที่', '');
INSERT INTO `user_type` VALUES (3, 'ผู้บริหาร', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `vacation_leave`
-- 

CREATE TABLE `vacation_leave` (
  `id_Vacation` int(10) NOT NULL auto_increment,
  `date_Vacation` date NOT NULL,
  `subject_Vacation` varchar(200) NOT NULL,
  `to_Vacation` varchar(50) NOT NULL,
  `cumulative_Vacation` int(3) NOT NULL,
  `total_Vacation` int(3) NOT NULL,
  `address_Vacation` int(200) NOT NULL,
  `la_today` int(3) NOT NULL,
  `la_ago` int(3) NOT NULL,
  PRIMARY KEY  (`id_Vacation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `vacation_leave`
-- 

