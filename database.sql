SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for BaseActivity
-- ----------------------------
DROP TABLE IF EXISTS `BaseActivity`;
CREATE TABLE `BaseActivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` varchar(16) NOT NULL,
  `group` varchar(32) NOT NULL DEFAULT 'DEFAULT',
  `message` varchar(155) NOT NULL,
  `level` varchar(16) NOT NULL DEFAULT 'LOW',
  `dismissed` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `alert_id` (`alert_id`) USING BTREE,
  CONSTRAINT `alert_fk` FOREIGN KEY (`alert_id`) REFERENCES `BaseAlerts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for BaseAlerts
-- ----------------------------
DROP TABLE IF EXISTS `BaseAlerts`;
CREATE TABLE `BaseAlerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handle` varchar(32) NOT NULL,
  `status` char(3) NOT NULL DEFAULT 'Y',
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
