/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : salgoisportbirok

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 26/05/2023 03:58:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for credentials
-- ----------------------------
DROP TABLE IF EXISTS `credentials`;
CREATE TABLE `credentials`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `password` varchar(999) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `permissionID` int NULL DEFAULT NULL,
  `active` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of credentials
-- ----------------------------
INSERT INTO `credentials` VALUES (1, 'zoltan.tajti92@gmail.com', '178aea561001debe92486ee54d6a986349dfd210c93d746ee8967845fcbdae2dd2f335334fd21e5a020e951cb1d9bd304a2db924228a2976dcde03d48228c594', 4, 1);

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `startDate` date NULL DEFAULT NULL,
  `joinDate` date NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of events
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `perm` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Felhasználó', 1);
INSERT INTO `permissions` VALUES (2, 'Moderátor', 2);
INSERT INTO `permissions` VALUES (3, 'Adminisztrátor', 3);
INSERT INTO `permissions` VALUES (4, 'Webmester', 99);

-- ----------------------------
-- Table structure for user_cars
-- ----------------------------
DROP TABLE IF EXISTS `user_cars`;
CREATE TABLE `user_cars`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `credentialsID` int NULL DEFAULT NULL,
  `haventCar` int NULL DEFAULT NULL,
  `carRegLetter` varchar(2) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `licensePlate` varchar(10) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `carManufacturer` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `carType` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_cars
-- ----------------------------
INSERT INTO `user_cars` VALUES (1, 1, 0, 'H', 'GTJ-904', 'Volkswagen', 'Polo 1.4 kat');

-- ----------------------------
-- Table structure for user_profile
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `credentialsID` int NULL DEFAULT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `marshalCardNo` int NULL DEFAULT NULL,
  `idcardno` varchar(10) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `borndate` date NULL DEFAULT NULL,
  `bornplace` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `postcode` int NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `address` varchar(999) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `phoneNo` varchar(11) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `vatNo` varchar(11) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `tajNo` varchar(11) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES (1, 1, 'Tajti Zoltán', 4686, '875033HA', '1992-09-10', 'Salgótarján', 3065, 'Pásztó-Hasznos', 'Vár utca 117.', '06305805547', '123456789', '044744016');

SET FOREIGN_KEY_CHECKS = 1;
