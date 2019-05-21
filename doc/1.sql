/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.1.57-community : Database - zjri
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zjri` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `zjri`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `qrCode` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL COMMENT '用户id',
  `image` text NOT NULL COMMENT '帖子的图片',
  `content` text NOT NULL COMMENT '内容',
  `auditTime` int(11) DEFAULT NULL COMMENT '审核时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '帖子的审核状态0未审核1审核通过2审核未通过',
  `remark` varchar(255) DEFAULT '' COMMENT '审核不通过理由',
  `viewNum` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `praiseNum` int(11) NOT NULL DEFAULT '0' COMMENT '点攒数',
  `commentsNum` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `forwardNum` int(11) NOT NULL DEFAULT '0' COMMENT '转发数',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `isTop` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否置顶0未置顶1置顶',
  `isQuality` tinyint(4) NOT NULL DEFAULT '0' COMMENT '精品',
  `isDel` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `article` */

/*Table structure for table `article_tags` */

DROP TABLE IF EXISTS `article_tags`;

CREATE TABLE `article_tags` (
  `article_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `article_tags` */

/*Table structure for table `collect` */

DROP TABLE IF EXISTS `collect`;

CREATE TABLE `collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `user_index` (`userId`),
  KEY `article_index` (`articleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `collect` */

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `userId` int(11) NOT NULL COMMENT '用户id',
  `articleId` int(11) NOT NULL COMMENT '帖子id',
  `content` text NOT NULL COMMENT '内容',
  `isDel` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `comment` */

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `images` varchar(255) NOT NULL COMMENT '标题图',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `describe` varchar(255) DEFAULT NULL COMMENT '导语',
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `message` */

/*Table structure for table `money` */

DROP TABLE IF EXISTS `money`;

CREATE TABLE `money` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL COMMENT '用户id',
  `articleId` int(11) NOT NULL COMMENT '帖子id',
  `price` int(11) NOT NULL COMMENT '金额',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `tradeInfo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `money` */

/*Table structure for table `praise` */

DROP TABLE IF EXISTS `praise`;

CREATE TABLE `praise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `user_index` (`userId`),
  KEY `article_index` (`articleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `praise` */

/*Table structure for table `reply` */

DROP TABLE IF EXISTS `reply`;

CREATE TABLE `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `userId` int(11) NOT NULL COMMENT '用户id',
  `commentId` int(11) NOT NULL COMMENT '评论id',
  `content` text NOT NULL COMMENT '内容',
  `reUserId` int(11) DEFAULT NULL,
  `isDel` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `reply` */

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tags` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `openId` varchar(120) NOT NULL,
  `nickName` varchar(32) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `name` varchar(255) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(2) DEFAULT '0' COMMENT '性别',
  `province` varchar(64) DEFAULT '' COMMENT '省份',
  `city` varchar(64) DEFAULT '' COMMENT '城市',
  `imgUrl` varchar(512) DEFAULT '' COMMENT '用户头像',
  `mobile` char(20) NOT NULL DEFAULT '' COMMENT '电话',
  `age` int(11) DEFAULT '0' COMMENT '年龄',
  `correctTime` varchar(255) DEFAULT NULL COMMENT '矫正时间',
  `tooth_socket` varchar(255) DEFAULT NULL COMMENT '牙套类型',
  `tooth_question` varchar(255) DEFAULT '' COMMENT '牙齿问题',
  `content` text COMMENT '个人简介',
  `forwardNum` int(11) DEFAULT NULL COMMENT '转发',
  `commentsNum` int(11) DEFAULT NULL COMMENT '评论',
  `praiseNum` int(11) DEFAULT NULL COMMENT '点赞',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`userId`),
  KEY `openId_index` (`openId`),
  KEY `nickName_index` (`nickName`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`userId`,`openId`,`nickName`,`name`,`sex`,`province`,`city`,`imgUrl`,`mobile`,`age`,`correctTime`,`tooth_socket`,`tooth_question`,`content`,`forwardNum`,`commentsNum`,`praiseNum`,`created_at`,`updated_at`) values (1,'oMTXyjh_DQGGyC1gyJ18PJ7OC_oQ','鳳軒','',1,'北京','','http://thirdwx.qlogo.cn/mmopen/vi_32/l5mB6nPibR89hOromYqI3Bh97cdDIREQFMSmah5VPmpMCKTno3F9FzCURrMQbS7VBNNHOUfXgou9XcFAy5pJCHQ/132','',0,NULL,NULL,'',NULL,NULL,NULL,NULL,'2019-05-18 14:45:30','2019-05-18 14:45:30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
