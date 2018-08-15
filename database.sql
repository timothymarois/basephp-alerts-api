SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for AlertActivity
-- ----------------------------
DROP TABLE IF EXISTS `AlertActivity`;
CREATE TABLE `AlertActivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` varchar(16) NOT NULL,
  `message` varchar(155) NOT NULL,
  `level` varchar(16) NOT NULL DEFAULT 'LOW',
  PRIMARY KEY (`id`),
  KEY `alert_id` (`alert_id`) USING BTREE,
  CONSTRAINT `alert_fk` FOREIGN KEY (`alert_id`) REFERENCES `Alerts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Alerts
-- ----------------------------
DROP TABLE IF EXISTS `Alerts`;
CREATE TABLE `Alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handle` varchar(32) NOT NULL,
  `status` char(3) NOT NULL DEFAULT 'Y',
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
