/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : examination

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-14 18:33:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for class_group
-- ----------------------------
DROP TABLE IF EXISTS `class_group`;
CREATE TABLE `class_group` (
  `class_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '班级组',
  `class_name` char(50) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class_group
-- ----------------------------
INSERT INTO `class_group` VALUES ('1', '一班');
INSERT INTO `class_group` VALUES ('2', '二班');
INSERT INTO `class_group` VALUES ('3', '三班');

-- ----------------------------
-- Table structure for grade_group
-- ----------------------------
DROP TABLE IF EXISTS `grade_group`;
CREATE TABLE `grade_group` (
  `grade_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '年级组',
  `grade_name` char(50) NOT NULL,
  PRIMARY KEY (`grade_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grade_group
-- ----------------------------
INSERT INTO `grade_group` VALUES ('1', '初一');
INSERT INTO `grade_group` VALUES ('2', '初二');
INSERT INTO `grade_group` VALUES ('3', '初三');

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `position_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '职位',
  `position_name` char(50) DEFAULT NULL COMMENT '职位名称',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position
-- ----------------------------

-- ----------------------------
-- Table structure for record
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `record_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'record成绩系统',
  `student_name` char(50) NOT NULL,
  `chinese` int(11) DEFAULT NULL COMMENT '语文',
  `mathematics` int(11) DEFAULT NULL COMMENT '数学',
  `english` int(11) DEFAULT NULL COMMENT '英语',
  `politics` int(11) DEFAULT NULL COMMENT '政治',
  `history` int(11) DEFAULT NULL COMMENT '历史',
  `biology` int(11) DEFAULT NULL COMMENT '生物',
  `physics` int(11) DEFAULT NULL COMMENT '物理',
  `total` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `grade_name` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `position_name` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`record_id`,`student_name`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO `record` VALUES ('1', '王世麒', '98', '91', '92', '88', '84', '81', '66', '600', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('2', '张珈瑜', '89', '74', '92', '96', '92', '77', '63', '583', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('3', '刘圣塬', '79', '74', '92', '88', '86', '67', '78', '564', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('4', '张勃洋', '92', '55', '82', '90', '76', '73', '67', '535', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('5', '郑宇博', '81', '54', '86', '92', '72', '80', '62', '527', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('6', '葛姝影', '87', '27', '90', '88', '72', '57', '67', '488', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('7', '孟誉焮', '89', '60', '84', '92', '76', '68', '47', '517', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('8', '张华秋', '82', '73', '86', '84', '80', '70', '63', '538', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('9', '徐佳', '96', '58', '78', '88', '92', '72', '71', '555', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('10', '张红波', '77', '51', '84', '90', '76', '70', '80', '529', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('11', '高雪', '86', '52', '83', '71', '70', '67', '76', '505', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('12', '王文赫', '67', '66', '84', '80', '68', '73', '62', '501', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('13', '吴哲', '71', '50', '88', '82', '60', '70', '48', '469', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('14', '李沂珈', '75', '76', '90', '70', '64', '50', '48', '473', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('15', '董奉儒', '68', '39', '85', '73', '68', '64', '61', '458', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('16', '郭日涵', '72', '27', '76', '74', '58', '51', '41', '400', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('17', '李键', '68', '27', '80', '50', '56', '60', '43', '384', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('18', '王岩', '68', '46', '87', '88', '70', '73', '68', '501', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('19', '袁佰顺', '71', '21', '61', '82', '84', '73', '76', '469', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('20', '葛越双', '71', '30', '64', '84', '60', '55', '68', '432', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('21', '郭佳鸣', '73', '44', '46', '82', '70', '79', '61', '455', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('22', '陈赫宇', '81', '15', '62', '73', '70', '58', '27', '387', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('23', '张宏健', '67', '45', '33', '70', '38', '75', '41', '369', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('24', '方耀举', '67', '15', '60', '55', '56', '56', '60', '370', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('25', '广飞絮', '85', '19', '66', '76', '74', '47', '33', '400', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('26', '孟禹含', '73', '26', '79', '78', '66', '52', '39', '413', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('27', '董佳泽', '70', '24', '69', '71', '56', '47', '40', '377', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('28', '常雨轩', '81', '21', '70', '70', '46', '47', '40', '375', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('29', '王猛', '82', '21', '53', '84', '52', '52', '52', '397', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('30', '杨逸兵', '67', '18', '45', '82', '50', '65', '27', '354', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('31', '李行', '59', '24', '60', '50', '38', '48', '35', '314', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('32', '宋泽铭', '67', '18', '24', '52', '60', '50', '29', '301', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('33', '孙宏亮', '65', '30', '32', '44', '40', '53', '30', '294', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('34', '赵芯瑶', '73', '28', '79', '54', '38', '29', '33', '334', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('35', '张宇', '59', '12', '16', '52', '50', '40', '26', '255', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('36', '付芮同', '67', '12', '37', '51', '18', '37', '15', '237', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('37', '李心如', '61', '12', '30', '52', '38', '37', '30', '260', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('38', '康艳臣', '58', '6', '17', '44', '40', '39', '40', '244', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('39', '曲阳', '62', '12', '23', '30', '30', '35', '17', '209', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('40', '王鑫禹', '60', '9', '23', '27', '30', '35', '25', '209', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('41', '魏宏泽', '50', '9', '18', '37', '20', '36', '38', '208', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('42', '张文亮', '43', '6', '13', '35', '34', '34', '21', '186', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('43', '苏晓旭', '46', '15', '15', '48', '38', '44', '26', '232', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('44', '勾超', '51', '18', '26', '28', '20', '32', '23', '199', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('45', '袁佰顺', '71', '21', '61', '82', '84', '73', '76', '469', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('46', '葛越双', '71', '30', '64', '84', '60', '55', '68', '432', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('47', '郭佳鸣', '73', '44', '46', '82', '70', '79', '61', '455', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('48', '陈赫宇', '81', '15', '62', '73', '70', '58', '27', '387', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('49', '张宏健', '67', '45', '33', '70', '38', '75', '41', '369', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('50', '方耀举', '67', '15', '60', '55', '56', '56', '60', '370', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('51', '广飞絮', '85', '19', '66', '76', '74', '47', '33', '400', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('52', '孟禹含', '73', '26', '79', '78', '66', '52', '39', '413', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('53', '董佳泽', '70', '24', '69', '71', '56', '47', '40', '377', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('54', '常雨轩', '81', '21', '70', '70', '46', '47', '40', '375', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('55', '王猛', '82', '21', '53', '84', '52', '52', '52', '397', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('56', '杨逸兵', '67', '18', '45', '82', '50', '65', '27', '354', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('57', '李行', '59', '24', '60', '50', '38', '48', '35', '314', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('58', '宋泽铭', '67', '18', '24', '52', '60', '50', '29', '301', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('59', '孙宏亮', '65', '30', '32', '44', '40', '53', '30', '294', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('60', '赵芯瑶', '73', '28', '79', '54', '38', '29', '33', '334', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('61', '张宇', '59', '12', '16', '52', '50', '40', '26', '255', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('62', '付芮同', '67', '12', '37', '51', '18', '37', '15', '237', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('63', '李心如', '61', '12', '30', '52', '38', '37', '30', '260', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('64', '康艳臣', '58', '6', '17', '44', '40', '39', '40', '244', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('65', '曲阳', '62', '12', '23', '30', '30', '35', '17', '209', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('66', '王鑫禹', '60', '9', '23', '27', '30', '35', '25', '209', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('67', '魏宏泽', '50', '9', '18', '37', '20', '36', '38', '208', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('68', '张文亮', '43', '6', '13', '35', '34', '34', '21', '186', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('69', '苏晓旭', '46', '15', '15', '48', '38', '44', '26', '232', '2019', '5', '1', '2', '学生', '1', '1');
INSERT INTO `record` VALUES ('70', '勾超', '51', '18', '26', '28', '20', '32', '23', '199', '2019', '5', '1', '2', '学生', '1', '1');

-- ----------------------------
-- Table structure for school
-- ----------------------------
DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
  `school_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '学校标识',
  `school_name` varchar(255) NOT NULL COMMENT '学校名称',
  `introduction` text COMMENT '学校简介',
  `school_url` char(50) DEFAULT NULL COMMENT '学校官网',
  `province` char(50) DEFAULT NULL,
  `abbreviation` char(10) DEFAULT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school
-- ----------------------------
INSERT INTO `school` VALUES ('1', '昌隆一贯制学校', null, null, '辽宁省', 'C');
INSERT INTO `school` VALUES ('2', '朝阳市建平县叶柏寿第二中学', null, null, '辽宁省', 'C');
INSERT INTO `school` VALUES ('3', '国营农场中学', null, null, '辽宁省', 'G');
INSERT INTO `school` VALUES ('4', '桦林学校', null, null, '辽宁省', 'H');
INSERT INTO `school` VALUES ('5', '建平县实验中学', null, null, '辽宁省', 'J');
INSERT INTO `school` VALUES ('6', '建平县蒙古族学校', null, null, '辽宁省', 'J');
INSERT INTO `school` VALUES ('7', '沙海镇中学', null, null, '辽宁省', 'S');
INSERT INTO `school` VALUES ('8', '黑水联合中学\r\n', null, null, '辽宁省', 'H');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '学生表',
  `realname` char(20) NOT NULL,
  `grade_group_id` int(11) DEFAULT NULL,
  `class_group_id` int(11) DEFAULT NULL,
  `position_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_id`,`realname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', '蒋老师');
INSERT INTO `teacher` VALUES ('2', '韩老师');
INSERT INTO `teacher` VALUES ('3', '吴老师');
INSERT INTO `teacher` VALUES ('4', '温老师');
INSERT INTO `teacher` VALUES ('5', '宋老师');
