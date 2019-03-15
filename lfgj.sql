/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lfgj

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-15 11:05:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lhgj_account`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_account`;
CREATE TABLE `lhgj_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0:未使用;1:使用',
  `userid` varchar(255) DEFAULT NULL COMMENT '关联的用户注册id',
  `ctime` int(11) DEFAULT NULL,
  `utime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `zhanghao` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_account
-- ----------------------------

-- ----------------------------
-- Table structure for `lhgj_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_admin`;
CREATE TABLE `lhgj_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '帐号',
  `passwd` varchar(255) NOT NULL COMMENT '密码',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `utime` int(11) DEFAULT NULL COMMENT '更改时间',
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_admin
-- ----------------------------
INSERT INTO `lhgj_admin` VALUES ('1', 'root', 'root123', '1', null, null, '127.0.0.1');

-- ----------------------------
-- Table structure for `lhgj_agent`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_agent`;
CREATE TABLE `lhgj_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agentnum` varchar(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:个人 2:代理',
  `username` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `banknum` varchar(50) NOT NULL,
  `banklocal` varchar(100) NOT NULL,
  `bindphone` varchar(20) NOT NULL,
  `ppnum` varchar(50) NOT NULL,
  `img1` varchar(255) NOT NULL COMMENT '返佣人身份证正面',
  `img2` varchar(255) NOT NULL COMMENT '返佣人身份证反面',
  `company` varchar(255) DEFAULT NULL,
  `ceo` varchar(20) DEFAULT NULL,
  `ppnumceo` varchar(30) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL COMMENT '法人身份证正面',
  `img4` varchar(255) DEFAULT NULL COMMENT '法人身份证反面',
  `img5` varchar(255) DEFAULT NULL COMMENT 'y营业执照',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:未审核1:审核 2:审核不通过',
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_agent
-- ----------------------------

-- ----------------------------
-- Table structure for `lhgj_config`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_config`;
CREATE TABLE `lhgj_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) DEFAULT '0' COMMENT '归属id',
  `name` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `remind` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:启用 1 未启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_config
-- ----------------------------
INSERT INTO `lhgj_config` VALUES ('1', '0', 'WEB_NAME', 'dangcafe', 'text', '网站名称', '1');
INSERT INTO `lhgj_config` VALUES ('2', '0', 'WEB_URL', 'www.dangcafe.cn', 'text', '网站网址', '1');
INSERT INTO `lhgj_config` VALUES ('3', '0', 'WEB_PHONE', '', 'text', '服务热线', '1');
INSERT INTO `lhgj_config` VALUES ('4', '0', 'WEB_ADDRESS', '', 'text', '公司地址', '1');
INSERT INTO `lhgj_config` VALUES ('5', '0', 'WEB_ICP', '', 'text', '网站备案号', '1');

-- ----------------------------
-- Table structure for `lhgj_pay`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_pay`;
CREATE TABLE `lhgj_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `account` varchar(20) NOT NULL COMMENT '软件账号',
  `money` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL,
  `peoplenum` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `telphone` varchar(30) NOT NULL DEFAULT '' COMMENT '固定电话',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `addr` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  `ctime` int(11) NOT NULL,
  `utime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_pay
-- ----------------------------

-- ----------------------------
-- Table structure for `lhgj_user`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_user`;
CREATE TABLE `lhgj_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utel` varchar(255) NOT NULL COMMENT '用户手机号',
  `uname` varchar(25) DEFAULT NULL,
  `upass` varchar(25) NOT NULL,
  `invite` varchar(20) NOT NULL DEFAULT '1' COMMENT '邀请码',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态0：禁用；1：正常2：异常',
  `logintime` int(11) DEFAULT NULL COMMENT '最新的登录时间',
  `ltime` int(11) NOT NULL DEFAULT '1' COMMENT '登录次数',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `utime` int(11) DEFAULT NULL COMMENT '更新时间',
  `ip` varchar(30) DEFAULT NULL COMMENT '最后一次登录ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `utel` (`utel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_user
-- ----------------------------

-- ----------------------------
-- Table structure for `lhgj_user_lists`
-- ----------------------------
DROP TABLE IF EXISTS `lhgj_user_lists`;
CREATE TABLE `lhgj_user_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `realname` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `ppnum` varchar(20) DEFAULT NULL COMMENT '身份证号',
  `bankname` varchar(50) DEFAULT NULL COMMENT '银行归属地',
  `banknum` varchar(20) DEFAULT NULL COMMENT '银行卡号码',
  `banktel` varchar(20) DEFAULT NULL COMMENT '银行绑定手机号',
  `status` tinyint(4) DEFAULT '1' COMMENT '当前资料状态',
  `accountid` varchar(20) DEFAULT NULL COMMENT '交易账号',
  `password` varchar(50) DEFAULT NULL COMMENT '交易账号密码',
  `checked` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未认证 1:已认证',
  `ctime` int(11) DEFAULT NULL,
  `utime` int(11) DEFAULT NULL,
  `img1` varchar(250) DEFAULT NULL,
  `img2` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lhgj_user_lists
-- ----------------------------
