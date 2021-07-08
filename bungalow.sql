/*
Navicat MySQL Data Transfer

Source Server         : lol
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bungalow

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-21 23:26:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `bungalow_no` int(10) NOT NULL,
  `days` int(10) NOT NULL,
  `sanitary_node` varchar(50) COLLATE utf8_bin NOT NULL,
  `fridge` varchar(50) COLLATE utf8_bin NOT NULL,
  `customer_name` text COLLATE utf8_bin NOT NULL,
  `category_id` int(20) NOT NULL,
  `max_beds` varchar(10) COLLATE utf8_bin NOT NULL,
  `max_person` varchar(10) COLLATE utf8_bin NOT NULL,
  `booking_date` datetime NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `shift` text COLLATE utf8_bin NOT NULL,
  `price_one_night` int(11) NOT NULL,
  `total_price_ddc` int(11) NOT NULL,
  `total_price_no_ddc` int(11) NOT NULL,
  `payment_status` text COLLATE utf8_bin NOT NULL,
  KEY `bungalow_no` (`bungalow_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('1', '39', '10', '', 'yes', 0xD098D0BDD0B5D18120D092D0B0D181D0B8D0BBD0B5D0B2D0B0, '7', '2', '2', '2021-06-07 22:27:51', '2021-06-14 22:27:55', '2021-06-23 22:28:02', 0x56494949, '90', '90', '0', 0x796573);
INSERT INTO `booking` VALUES ('2', '0', '0', '', '', '', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0', '0', '0', '');
INSERT INTO `booking` VALUES ('3', '31', '10', '', '', 0xD0A2D0B0D0BCD0B0D180D0B020D09FD0B5D0BDD187D0B5D0B2D0B0, '3', '', '', '2021-06-01 22:49:15', '2021-06-05 22:49:21', '2021-06-16 22:49:26', 0x56494949, '0', '0', '0', '');
INSERT INTO `booking` VALUES ('4', '32', '10', 'yes', 'yes', 0xD09FD0BBD0B0D0BCD0B5D0BD20D09FD0B5D0BDD187D0B5D0B2, '3', '5', '5', '2021-05-10 22:55:47', '2021-05-19 22:55:59', '2021-05-28 22:56:12', 0x56494949, '0', '0', '0', '');
INSERT INTO `booking` VALUES ('5', '32', '10', 'yes', 'yes', 0xD09FD180D0B5D181D0BBD0B0D0B2D0B020D09FD0B5D0BDD187D0B5D0B2D0B0, '5', '5', '5', '2021-05-10 22:58:32', '2021-05-19 22:58:37', '2021-05-28 22:58:43', 0x56494949, '27', '27', '0', 0x796573);
INSERT INTO `booking` VALUES ('6', '39', '10', 'yes', 'yes', 0xD09DD0B8D0BDD0B020D09FD0B5D0BDD187D0B5D0B2D0B0, '2', '2', '2', '2021-06-07 23:06:33', '2021-06-09 23:06:41', '2021-06-18 23:06:53', 0x56494949, '45', '55', '0', 0x796573);

-- ----------------------------
-- Table structure for bungalow
-- ----------------------------
DROP TABLE IF EXISTS `bungalow`;
CREATE TABLE `bungalow` (
  `bungalow_id` int(11) NOT NULL,
  `bungalow_type_id` int(11) NOT NULL,
  `bungalow_no` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `check_in_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `check_out_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `delete_status` varchar(255) COLLATE utf8_bin NOT NULL,
  KEY `bungalow_no` (`bungalow_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of bungalow
-- ----------------------------

-- ----------------------------
-- Table structure for bungalow_type
-- ----------------------------
DROP TABLE IF EXISTS `bungalow_type`;
CREATE TABLE `bungalow_type` (
  `bungalow_type_id` int(11) NOT NULL,
  `bungalow_type` varchar(50) DEFAULT NULL,
  `max_beds` varchar(50) DEFAULT NULL,
  `max_person` varchar(50) DEFAULT NULL,
  `fridge` varchar(50) DEFAULT NULL,
  `sanitary_node` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bungalow_type_id`) USING BTREE,
  KEY `sanitary_node` (`sanitary_node`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of bungalow_type
-- ----------------------------
INSERT INTO `bungalow_type` VALUES ('1', '1x1,5/2x1', '3', '3,5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('2', '1x1,5/2x1', '3', '3,5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('3', '2х1+1х1,5', '3', '3,5', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('4', '1х1/2х1+1х1,5+ф', '5', '5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('5', '1х1/2х1+1х1,5', '4', '4,5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('6', '1х1/2х1+1х1,5', '4', '4,5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('7', '2х1+1х1,5', '3', '3,5', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('8', '1х1,5/2х1+1х1,5', '4', '5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('9', '1х1+ф / 3х1+ф', '6', '5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('10', '2х1+1х1,5', '3', '3,5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('11', '1х1+1х1,5', '2', '2,5', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('12', '1х1,5/2х1+1х1,5', '4', '5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('13', '3х1', '3', '3', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('14', '2х1+ф', '3', '2,5', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('15', '3х1', '3', '3', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('16', '3х1', '3', '3', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('17', '3х1', '3', '3', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('18', '3х1', '3', '3', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('19', '3х1', '3', '3', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('20', '3х1', '3', '3', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('25', '3х1', '3', '3', 'не', 'не');
INSERT INTO `bungalow_type` VALUES ('26', '2х1', '3', '3,5', 'не', 'да');
INSERT INTO `bungalow_type` VALUES ('27', '2x1', '2', '2', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('28', '2х1,5', '2', '3', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('29', '2х1+3х1', '5', '5', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('30', '2х1+3х1', '5', '5', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('31', '2х1+3х1', '5', '5', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('32', '2х1+3х1', '5', '5', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('33', '2х1+3х1', '5', '5', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('34', '2х1+3х1', '5', '5', 'да', 'да');
INSERT INTO `bungalow_type` VALUES ('48', '2х1', '2', '2', 'да', 'да');

-- ----------------------------
-- Table structure for complaint
-- ----------------------------
DROP TABLE IF EXISTS `complaint`;
CREATE TABLE `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolve_status` tinyint(1) NOT NULL,
  `resolve_date` timestamp NULL DEFAULT current_timestamp(),
  `budget` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of complaint
-- ----------------------------

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_card_type_id` int(11) DEFAULT NULL,
  `id_card_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `FK_customer_bd.id_card_type` (`id_card_type_id`),
  KEY `FK_customer_staff_type` (`category_id`),
  KEY `customer_name` (`customer_name`),
  CONSTRAINT `FK_customer_bd.id_card_type` FOREIGN KEY (`id_card_type_id`) REFERENCES `id_card_type` (`id_card_type_id`),
  CONSTRAINT `FK_customer_staff_type` FOREIGN KEY (`category_id`) REFERENCES `staff_type` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'жале сладката', '894430996', '3', 'veska@abv.bg', '2', '54254543567566');
INSERT INTO `customer` VALUES ('2', 'Иван Николов Иванов', '8753127723', '3', 'ivan@abv.bg', '2', '22564679897');
INSERT INTO `customer` VALUES ('3', 'Цвета Христова', '8966328845', '2', 'fetta@abv.bg', '3', '55242413656467');

-- ----------------------------
-- Table structure for emp_history
-- ----------------------------
DROP TABLE IF EXISTS `emp_history`;
CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `to_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `shift_id` (`shift_id`),
  CONSTRAINT `FK_emp_history_bd.shift` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`),
  CONSTRAINT `FK_emp_history_bd.staff` FOREIGN KEY (`emp_id`) REFERENCES `staff` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of emp_history
-- ----------------------------

-- ----------------------------
-- Table structure for id_card_type
-- ----------------------------
DROP TABLE IF EXISTS `id_card_type`;
CREATE TABLE `id_card_type` (
  `id_card_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_card_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_card_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of id_card_type
-- ----------------------------
INSERT INTO `id_card_type` VALUES ('1', 'VISA');
INSERT INTO `id_card_type` VALUES ('2', 'MasterCard');
INSERT INTO `id_card_type` VALUES ('3', 'Easy Pay');
INSERT INTO `id_card_type` VALUES ('4', 'Another');

-- ----------------------------
-- Table structure for price
-- ----------------------------
DROP TABLE IF EXISTS `price`;
CREATE TABLE `price` (
  `category` text DEFAULT NULL,
  `shift` varchar(50) NOT NULL,
  `days` int(11) NOT NULL,
  `sanitary_node` text NOT NULL,
  `price` int(11) NOT NULL,
  KEY `category` (`category`(768))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of price
-- ----------------------------
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '10', 'no', '24');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '10', 'yes', '45');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '1', 'no', '6');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '1', 'yes', '9');
INSERT INTO `price` VALUES ('Пенсионер или член на дом. на преп. или служител на РУ с ДДС', 'I,II,VIII', '10', 'no', '33');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '10', 'no', '24');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '10', 'yes', '45');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '1', 'no', '6');
INSERT INTO `price` VALUES ('Преподавател или служител на РУ без ДДС', 'I,II,VIII', '1', 'yes', '9');
INSERT INTO `price` VALUES ('Пенсионер или член на дом. на преп. или служител на РУ с ДДС', 'I,II,VIII', '10', 'no', '33');

-- ----------------------------
-- Table structure for shift
-- ----------------------------
DROP TABLE IF EXISTS `shift`;
CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift` varchar(50) NOT NULL,
  `from_date` date NOT NULL DEFAULT current_timestamp(),
  `to_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of shift
-- ----------------------------
INSERT INTO `shift` VALUES ('1', 'I', '2021-06-14', '2021-06-24');
INSERT INTO `shift` VALUES ('2', 'II', '2021-06-26', '2021-07-05');
INSERT INTO `shift` VALUES ('3', 'III', '2021-07-07', '2021-07-16');
INSERT INTO `shift` VALUES ('4', 'IV', '2021-07-18', '2021-07-27');
INSERT INTO `shift` VALUES ('5', 'V', '2021-07-29', '2021-08-07');
INSERT INTO `shift` VALUES ('6', 'VI', '2021-08-09', '2021-08-18');
INSERT INTO `shift` VALUES ('7', 'VII', '2021-08-20', '2021-08-29');
INSERT INTO `shift` VALUES ('8', 'VIII', '2021-08-31', '2021-09-09');
INSERT INTO `shift` VALUES ('9', 'Извън сезона', '2021-09-10', '2022-06-13');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL DEFAULT 0,
  `id_card_type` varchar(50) NOT NULL DEFAULT '',
  `id_card_no` varchar(50) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `shift_id` (`shift_id`),
  KEY `id_card_type` (`id_card_type`),
  KEY `staff_type_id` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'Алина Ставрева', '6', '5', 'Another', '', '0');
INSERT INTO `staff` VALUES ('2', 'Станчо Ставрев', '1', '5', 'Another', '', '0');
INSERT INTO `staff` VALUES ('3', 'Антоанета Ставрева', '1', '5', 'Another', '', '0');
INSERT INTO `staff` VALUES ('4', 'Стоян Казанджиев', '3', '5', 'another', '00', '0');
INSERT INTO `staff` VALUES ('5', 'Тодор Михов', '7', '5', 'another', '000', '0');
INSERT INTO `staff` VALUES ('6', 'Милка Сейкова', '7', '5', 'another', '00', '0');

-- ----------------------------
-- Table structure for staff_type
-- ----------------------------
DROP TABLE IF EXISTS `staff_type`;
CREATE TABLE `staff_type` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of staff_type
-- ----------------------------
INSERT INTO `staff_type` VALUES ('1', 'Преподавател или служител на РУ с ДДС');
INSERT INTO `staff_type` VALUES ('2', 'Преподавател или служител на РУ без ДДС');
INSERT INTO `staff_type` VALUES ('3', 'Пенсионер или член на дом. на преп.или служител на РУ');
INSERT INTO `staff_type` VALUES ('4', 'Дете до 7год.');
INSERT INTO `staff_type` VALUES ('5', 'Дете между 7 и 10год. с ДДС');
INSERT INTO `staff_type` VALUES ('6', 'Дете на 10год. с ДДС');
INSERT INTO `staff_type` VALUES ('7', 'Външен с ДДС');
INSERT INTO `staff_type` VALUES ('9', '');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Zhale Alisheva', 'Zhale', 'zhalealisheva@abv.bg', '0099', '2021-06-21 00:42:31');
INSERT INTO `user` VALUES ('2', 'Галя Иванова', 'Галя', 'galiq@abv.bg', '33555', '2021-06-14 23:11:09');
