/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : session

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-06-09 08:02:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lib_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `lib_subjects`;
CREATE TABLE `lib_subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `DELETED` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lib_subjects
-- ----------------------------
INSERT INTO `lib_subjects` VALUES ('1', 'English 1', 'BSIT', '1', '1', '0');
INSERT INTO `lib_subjects` VALUES ('2', 'English 2', 'BSIT', '1', '2', '0');
INSERT INTO `lib_subjects` VALUES ('3', 'English 3', 'BSIT', '2', '1', '0');
INSERT INTO `lib_subjects` VALUES ('4', 'English 4', 'BSIT', '2', '2', '0');
INSERT INTO `lib_subjects` VALUES ('5', 'Physical Education 1', 'BSIT', '1', '1', '0');
INSERT INTO `lib_subjects` VALUES ('6', 'Physical Education 2', 'BSIT', '1', '2', '0');
INSERT INTO `lib_subjects` VALUES ('7', 'Physical Education 3', 'BSIT', '2', '1', '0');
INSERT INTO `lib_subjects` VALUES ('8', 'Physical Education 4', 'BSIT', '2', '2', '0');
INSERT INTO `lib_subjects` VALUES ('9', 'Drawing 1', 'BSIT', '1', '1', '0');
INSERT INTO `lib_subjects` VALUES ('10', 'Drawing 2', 'BSIT', '1', '2', '0');
INSERT INTO `lib_subjects` VALUES ('11', 'English 1', 'BSIT', '1', '1', '0');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'josef', 'josef');
INSERT INTO `login` VALUES ('2', 'may', 'may');
INSERT INTO `login` VALUES ('3', 'sample', 'sample');
INSERT INTO `login` VALUES ('4', 'administra', 'administra');
INSERT INTO `login` VALUES ('5', 'another', 'another');
INSERT INTO `login` VALUES ('6', 'sample123', 'sample123');

-- ----------------------------
-- Table structure for `tbl_students`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `extname` varchar(20) DEFAULT NULL,
  `address` text NOT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `DELETED` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_students
-- ----------------------------
INSERT INTO `tbl_students` VALUES ('1', 'asd', 'asd', 'asd', 'asd', 'asdasdasd', '0', 'BSIT', '1', '2', '0');
INSERT INTO `tbl_students` VALUES ('2', 'Gamo', 'May', 'Gallardo', '', 'SJDM, Bulacan', '0', 'BSIT', '1', '1', '0');
INSERT INTO `tbl_students` VALUES ('3', 'asd', 'asd', 'asd', 'asd', '', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('4', 'asd', 'asd', 'asd', 'asd', '', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('5', 'asd', 'asd', 'asd', 'asd', 'kualng', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('6', 'asd', 'asd', 'asd', 'asd', '', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('7', 'asd', 'asd', 'asd', 'asd', '', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('8', 'Baldo', 'Josef Friedrich', 'Saligumba', '', 'Block 3 Lot 12 Phase 1 DELA COSTA HOMES 3', '123445', 'BSIT', '1', '1', '0');
INSERT INTO `tbl_students` VALUES ('9', 'ba', 'asdasd', '', '', 'dddd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('10', 'Gamo', 'May', 'Gallardo', 'a', 'Quezon City', '123456', 'BSIT', '1', '1', '0');
INSERT INTO `tbl_students` VALUES ('11', 'Baldo', 'Josef Friedrich', '', 'asdasd', 'Block 3 Lot 12 Phase 1', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('12', 'asdasd', 'asdasd', '', '', 'asdasdads', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('13', 'asda', 'asdasd', '', '', 'asdasd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('14', 'asda', 'asdasd', '', '', 'asdasd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('15', 'asad', 'asdasd', '', '', 'asdasd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('16', 'Josef', 'Basdal', 'o', '', 'asd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('17', 'asad', 'asdasd', '', '', 'asdasd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('18', 'asdasd', 'asdasd', '', '', 'kasdlkajskldasda', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('19', 'asdasd', 'asdasda', '', '', 'asdasd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('20', 'asdasd', 'asdasd', '', '', 'asdasd', '0', '', '0', '0', '0');
INSERT INTO `tbl_students` VALUES ('21', 'Saclayan', 'Lerrie John', 'Espejo', '', 'Caloocan City', '1234576', 'BSIT', '1', '1', '1');
INSERT INTO `tbl_students` VALUES ('22', 'Ledesma', 'Eugene', 'Gol', 'Jr', 'Lagro 12345', '2147483647', 'BSIT', '1', '1', '1');

-- ----------------------------
-- Table structure for `tbl_student_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_student_subjects`;
CREATE TABLE `tbl_student_subjects` (
  `student_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL COMMENT 'FK to tbl_students',
  `subject_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `DELETED` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_student_subjects
-- ----------------------------
INSERT INTO `tbl_student_subjects` VALUES ('1', '1', '2', '65', 'dddd', '1');
INSERT INTO `tbl_student_subjects` VALUES ('2', '1', '2', '100', 'remarks sample', '1');
INSERT INTO `tbl_student_subjects` VALUES ('3', '1', '5', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('4', '1', '5', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('5', '1', '1', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('6', '1', '1', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('7', '1', '1', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('8', '1', '1', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('9', '1', '5', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('10', '1', '1', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('11', '2', '1', '85', 'passed', '0');
INSERT INTO `tbl_student_subjects` VALUES ('12', '2', '5', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('13', '2', '5', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('14', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('15', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('16', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('17', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('18', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('19', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('20', '2', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('21', '1', '2', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('22', '1', '6', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('23', '21', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('24', '21', '5', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('25', '21', '9', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('26', '22', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('27', '22', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('28', '22', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('29', '22', '1', null, null, '0');
INSERT INTO `tbl_student_subjects` VALUES ('30', '1', '10', null, null, '1');
INSERT INTO `tbl_student_subjects` VALUES ('31', '1', '2', '80', 'passed', '0');
INSERT INTO `tbl_student_subjects` VALUES ('32', '1', '6', '75', 'passed', '0');
INSERT INTO `tbl_student_subjects` VALUES ('33', '1', '10', '90', 'very good', '0');
INSERT INTO `tbl_student_subjects` VALUES ('34', '1', '2', null, null, '0');
