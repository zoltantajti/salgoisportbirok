/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100424 (10.4.24-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : salgoisportbirok

 Target Server Type    : MySQL
 Target Server Version : 100424 (10.4.24-MariaDB)
 File Encoding         : 65001

 Date: 31/05/2023 13:58:08
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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of credentials
-- ----------------------------
INSERT INTO `credentials` VALUES (1, 'zoltan.tajti92@gmail.com', '**censored**', 4, 1);

-- ----------------------------
-- Table structure for event_infos
-- ----------------------------
DROP TABLE IF EXISTS `event_infos`;
CREATE TABLE `event_infos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventID` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_infos
-- ----------------------------

-- ----------------------------
-- Table structure for event_joins
-- ----------------------------
DROP TABLE IF EXISTS `event_joins`;
CREATE TABLE `event_joins`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `credentialsID` int NULL DEFAULT NULL,
  `eventID` int NULL DEFAULT NULL,
  `approved` int NULL DEFAULT NULL,
  `joinDate` datetime NULL DEFAULT NULL,
  `carID` int NULL DEFAULT NULL,
  `persons` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL COMMENT 'json Object',
  `status` enum('pending','approved','deny') CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of event_joins
-- ----------------------------
INSERT INTO `event_joins` VALUES (3, 1, 4, 0, '2023-05-31 10:58:59', 1, '[{\"id\":\"2\",\"fullName\":\"Teszt Biztosító\"}]', 'approved');

-- ----------------------------
-- Table structure for event_schedule
-- ----------------------------
DROP TABLE IF EXISTS `event_schedule`;
CREATE TABLE `event_schedule`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventID` int NULL DEFAULT NULL,
  `point` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `type` enum('center','TCIcon','StartIcon','FinishIcon','StopIcon','Radio','RadioJ','RadioLassit','RadioLRJ','TRACKLINE') CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 284 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_schedule
-- ----------------------------
INSERT INTO `event_schedule` VALUES (1, 4, '47.934327,19.913104', 'TCIcon', 'Teszt User');
INSERT INTO `event_schedule` VALUES (2, 4, '47.935381,19.912095', 'StartIcon', 'Safiék');
INSERT INTO `event_schedule` VALUES (3, 4, '47.951309,19.818654', 'FinishIcon', 'Hauseresek');
INSERT INTO `event_schedule` VALUES (4, 4, '47.953005,19.815345', 'StopIcon', NULL);
INSERT INTO `event_schedule` VALUES (5, 4, '47.93674,19.908342', 'Radio', '2');
INSERT INTO `event_schedule` VALUES (6, 4, '47.93983,19.903536', 'Radio', '3');
INSERT INTO `event_schedule` VALUES (7, 4, '47.93627,19.899437', 'Radio', '4');
INSERT INTO `event_schedule` VALUES (8, 4, '47.933478,19.893363', 'RadioJ', '5');
INSERT INTO `event_schedule` VALUES (9, 4, '47.933865,19.886627', 'Radio', '6');
INSERT INTO `event_schedule` VALUES (10, 4, '47.937608,19.882841', 'Radio', '7');
INSERT INTO `event_schedule` VALUES (11, 4, '47.93819,19.873968', 'Radio', '8');
INSERT INTO `event_schedule` VALUES (12, 4, '47.94043,19.869345', 'Radio', '9');
INSERT INTO `event_schedule` VALUES (13, 4, '47.937579,19.864965', 'Radio', '10');
INSERT INTO `event_schedule` VALUES (14, 4, '47.935624,19.860359', 'Radio', '11');
INSERT INTO `event_schedule` VALUES (15, 4, '47.938929,19.854698', 'RadioLassit', '12');
INSERT INTO `event_schedule` VALUES (16, 4, '47.940431,19.851694', 'Radio', '13');
INSERT INTO `event_schedule` VALUES (17, 4, '47.937302,19.848033', 'Radio', '14');
INSERT INTO `event_schedule` VALUES (18, 4, '47.940733,19.841833', 'Radio', '15');
INSERT INTO `event_schedule` VALUES (19, 4, '47.946889,19.840167', 'RadioLassit', '16');
INSERT INTO `event_schedule` VALUES (20, 4, '47.949872,19.841242', 'Radio', '17');
INSERT INTO `event_schedule` VALUES (21, 4, '47.950559,19.839592', 'Radio', '18');
INSERT INTO `event_schedule` VALUES (22, 4, '47.951362,19.836866', 'RadioLRJ', '19');
INSERT INTO `event_schedule` VALUES (23, 4, '47.951603,19.830159', 'Radio', '20');
INSERT INTO `event_schedule` VALUES (24, 4, '47.951975,19.827919', 'Radio', '21');
INSERT INTO `event_schedule` VALUES (25, 4, '47.951846,19.8241', 'RadioLassit', '22');
INSERT INTO `event_schedule` VALUES (47, 4, '47.934327,19.913104', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (48, 4, '47.935364,19.912041', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (49, 4, '47.935882,19.911518', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (50, 4, '47.936225,19.911046', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (51, 4, '47.936654,19.910359', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (52, 4, '47.936783,19.910145', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (53, 4, '47.936869,19.909759', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (54, 4, '47.936869,19.909501', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (55, 4, '47.936783,19.909115', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (56, 4, '47.936654,19.908686', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (57, 4, '47.936611,19.908557', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (58, 4, '47.93674,19.908342', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (59, 4, '47.936783,19.908085', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (60, 4, '47.936842,19.908026', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (61, 4, '47.936912,19.907956', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (62, 4, '47.936997,19.907956', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (63, 4, '47.937641,19.908042', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (64, 4, '47.938027,19.907956', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (65, 4, '47.938199,19.90787', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (66, 4, '47.938414,19.907613', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (67, 4, '47.938628,19.907098', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (68, 4, '47.938843,19.90684', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (69, 4, '47.939401,19.90624', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (70, 4, '47.939572,19.906025', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (71, 4, '47.939567,19.906038', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (72, 4, '47.939784,19.905599', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (73, 4, '47.939962,19.904999', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (74, 4, '47.940003,19.90445', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (75, 4, '47.939919,19.903815', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (76, 4, '47.93983,19.903536', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (77, 4, '47.939529,19.902935', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (78, 4, '47.939315,19.902592', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (79, 4, '47.9391,19.902334', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (80, 4, '47.936997,19.900661', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (81, 4, '47.936826,19.900489', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (82, 4, '47.936568,19.900146', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (83, 4, '47.936311,19.899588', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (84, 4, '47.936182,19.899116', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (85, 4, '47.936225,19.898729', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (86, 4, '47.936311,19.898171', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (87, 4, '47.936311,19.897699', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (88, 4, '47.936311,19.897571', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (89, 4, '47.936139,19.897313', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (90, 4, '47.936053,19.897184', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (91, 4, '47.935753,19.897056', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (92, 4, '47.935581,19.897013', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (93, 4, '47.934422,19.897313', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (94, 4, '47.934079,19.897313', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (95, 4, '47.933822,19.897313', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (96, 4, '47.933478,19.897227', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (97, 4, '47.932878,19.897013', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (98, 4, '47.93232,19.896541', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (99, 4, '47.932105,19.896283', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (100, 4, '47.932019,19.896069', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (101, 4, '47.932062,19.895897', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (102, 4, '47.932191,19.895725', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (103, 4, '47.932491,19.895511', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (104, 4, '47.932706,19.895296', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (105, 4, '47.933393,19.893794', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (106, 4, '47.933478,19.893494', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (107, 4, '47.933478,19.893322', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (108, 4, '47.933393,19.893193', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (109, 4, '47.93335,19.892936', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (110, 4, '47.933178,19.892678', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (111, 4, '47.932148,19.89152', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (112, 4, '47.931848,19.891005', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (113, 4, '47.931633,19.890318', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (114, 4, '47.931504,19.889631', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (115, 4, '47.93159,19.889202', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (116, 4, '47.931719,19.888773', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (117, 4, '47.932062,19.888', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (118, 4, '47.932577,19.887314', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (119, 4, '47.933049,19.886971', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (120, 4, '47.93365,19.886756', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (121, 4, '47.93395,19.886498', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (122, 4, '47.934079,19.886284', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (123, 4, '47.934337,19.885426', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (124, 4, '47.934422,19.885211', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (125, 4, '47.935495,19.883966', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (126, 4, '47.935667,19.883752', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (127, 4, '47.935925,19.883666', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (128, 4, '47.936397,19.883494', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (129, 4, '47.937126,19.883366', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (130, 4, '47.937384,19.883151', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (131, 4, '47.937942,19.882379', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (132, 4, '47.938199,19.881907', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (133, 4, '47.938328,19.881563', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (134, 4, '47.938542,19.879889', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (135, 4, '47.938671,19.878387', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (136, 4, '47.938714,19.877872', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (137, 4, '47.938585,19.877272', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (138, 4, '47.938414,19.876671', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (139, 4, '47.938242,19.875984', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (140, 4, '47.938113,19.874525', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (141, 4, '47.938156,19.874053', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (142, 4, '47.938242,19.873838', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (143, 4, '47.938371,19.873581', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (144, 4, '47.939229,19.872422', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (145, 4, '47.940345,19.870663', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (146, 4, '47.940516,19.870319', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (147, 4, '47.940559,19.870105', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (148, 4, '47.940559,19.869804', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (149, 4, '47.940516,19.869461', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (150, 4, '47.940388,19.869289', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (151, 4, '47.940087,19.868903', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (152, 4, '47.939482,19.868191', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (153, 4, '47.93891,19.867307', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (154, 4, '47.938499,19.866285', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (155, 4, '47.938371,19.866114', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (156, 4, '47.937727,19.865427', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (157, 4, '47.937641,19.865255', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (158, 4, '47.937512,19.864655', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (159, 4, '47.937384,19.864397', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (160, 4, '47.936954,19.863925', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (161, 4, '47.936912,19.863753', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (162, 4, '47.936912,19.863195', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (163, 4, '47.936826,19.862852', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (164, 4, '47.936354,19.862294', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (165, 4, '47.936225,19.86208', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (166, 4, '47.936182,19.861908', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (167, 4, '47.936096,19.86135', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (168, 4, '47.93601,19.861093', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (169, 4, '47.935667,19.860492', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (170, 4, '47.935624,19.860363', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (171, 4, '47.935624,19.860148', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (172, 4, '47.935667,19.859977', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (173, 4, '47.936053,19.859419', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (174, 4, '47.936096,19.85929', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (175, 4, '47.936139,19.859118', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (176, 4, '47.936182,19.858518', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (177, 4, '47.936268,19.858131', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (178, 4, '47.937427,19.856114', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (179, 4, '47.937942,19.855599', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (180, 4, '47.938285,19.855299', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (181, 4, '47.938886,19.854741', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (182, 4, '47.940044,19.853454', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (183, 4, '47.940173,19.853368', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (184, 4, '47.940474,19.853282', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (185, 4, '47.940602,19.853196', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (186, 4, '47.940688,19.853067', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (187, 4, '47.940774,19.852767', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (188, 4, '47.940774,19.852595', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (189, 4, '47.940688,19.852166', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (190, 4, '47.940559,19.851866', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (191, 4, '47.940302,19.851522', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (192, 4, '47.939358,19.850793', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (193, 4, '47.938972,19.850578', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (194, 4, '47.938714,19.850578', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (195, 4, '47.938414,19.85075', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (196, 4, '47.938328,19.850707', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (197, 4, '47.938156,19.850578', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (198, 4, '47.938113,19.850407', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (199, 4, '47.938113,19.850278', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (200, 4, '47.938156,19.849892', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (201, 4, '47.938156,19.84942', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (202, 4, '47.93807,19.848948', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (203, 4, '47.937984,19.84869', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (204, 4, '47.937598,19.84839', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (205, 4, '47.937384,19.848132', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (206, 4, '47.937298,19.847918', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (207, 4, '47.937298,19.84766', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (208, 4, '47.937341,19.847445', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (209, 4, '47.937384,19.847317', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (210, 4, '47.937512,19.847188', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (211, 4, '47.937641,19.847059', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (212, 4, '47.937942,19.847016', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (213, 4, '47.938499,19.846716', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (214, 4, '47.939143,19.846029', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (215, 4, '47.939801,19.844864', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (216, 4, '47.940087,19.844356', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (217, 4, '47.940302,19.843926', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (218, 4, '47.940602,19.842982', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (219, 4, '47.940731,19.84251', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (220, 4, '47.940817,19.841609', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (221, 4, '47.94116,19.840837', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (222, 4, '47.941289,19.840407', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (223, 4, '47.941332,19.839249', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (224, 4, '47.941589,19.838734', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (225, 4, '47.941847,19.838562', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (226, 4, '47.942061,19.838519', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (227, 4, '47.942405,19.838562', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (228, 4, '47.94395,19.839206', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (229, 4, '47.945151,19.839635', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (230, 4, '47.945838,19.839721', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (231, 4, '47.946782,19.839978', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (232, 4, '47.946785,19.840314', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (233, 4, '47.947056,19.840225', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (234, 4, '47.947168,19.840064', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (235, 4, '47.948027,19.840279', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (236, 4, '47.949014,19.841008', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (237, 4, '47.949615,19.841437', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (238, 4, '47.949786,19.841309', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (239, 4, '47.949923,19.841311', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (240, 4, '47.949872,19.841051', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (241, 4, '47.950087,19.840665', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (242, 4, '47.950559,19.839592', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (243, 4, '47.950816,19.838777', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (244, 4, '47.951589,19.836073', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (245, 4, '47.951717,19.835386', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (246, 4, '47.95176,19.834614', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (247, 4, '47.95176,19.833455', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (248, 4, '47.95176,19.833026', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (249, 4, '47.951632,19.832726', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (250, 4, '47.951245,19.832125', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (251, 4, '47.951202,19.83191', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (252, 4, '47.951159,19.831524', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (253, 4, '47.951159,19.831309', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (254, 4, '47.951245,19.831052', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (255, 4, '47.951503,19.830537', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (256, 4, '47.951589,19.830065', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (257, 4, '47.951632,19.829807', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (258, 4, '47.951674,19.829679', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (259, 4, '47.951932,19.829335', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (260, 4, '47.952018,19.829121', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (261, 4, '47.951975,19.827919', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (262, 4, '47.951932,19.827361', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (263, 4, '47.951932,19.826717', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (264, 4, '47.952061,19.826331', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (265, 4, '47.952147,19.825859', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (266, 4, '47.952147,19.825473', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (267, 4, '47.951932,19.824529', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (268, 4, '47.951846,19.8241', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (269, 4, '47.95176,19.823842', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (270, 4, '47.951589,19.823585', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (271, 4, '47.951245,19.823155', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (272, 4, '47.951031,19.822812', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (273, 4, '47.950902,19.822383', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (274, 4, '47.950816,19.821868', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (275, 4, '47.950816,19.821353', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (276, 4, '47.950902,19.820881', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (277, 4, '47.951202,19.819851', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (278, 4, '47.951292,19.818638', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (279, 4, '47.951374,19.81792', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (280, 4, '47.951417,19.817748', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (281, 4, '47.951632,19.817405', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (282, 4, '47.952189,19.816976', 'TRACKLINE', '');
INSERT INTO `event_schedule` VALUES (283, 4, '47.940990,19.910219', 'StartIcon', 'Alternatív rajt.');

-- ----------------------------
-- Table structure for event_schedule_bak
-- ----------------------------
DROP TABLE IF EXISTS `event_schedule_bak`;
CREATE TABLE `event_schedule_bak`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventID` int NULL DEFAULT NULL,
  `centerPoint` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `zoom` int NULL DEFAULT NULL,
  `IEPoint` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `StartPoint` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `FinishPoint` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `StopPoint` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `MarshalPoints` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL,
  `ChicanePoints` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL,
  `trackLine` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_schedule_bak
-- ----------------------------
INSERT INTO `event_schedule_bak` VALUES (1, 4, '47.9383716,19.8582951', 13, '47.934327,19.913104', '47.935381,19.912095', '47.951309,19.818654', '47.953005,19.815345', '[\r\n	{\r\n		\"lat\": \"47.93674\",\r\n		\"lon\": \"19.908342\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"1\"\r\n	},\r\n	{\r\n		\"lat\": \"47.93983\",\r\n		\"lon\": \"19.903536\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"2\"\r\n	},\r\n	{\r\n		\"lat\": \"47.93627\",\r\n		\"lon\": \"19.899437\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"3\"\r\n	},\r\n	{\r\n		\"lat\": \"47.933478\",\r\n		\"lon\": \"19.893363\",\r\n		\"type\": \"RadioJ\",\r\n		\"name\": \"4\"\r\n	},\r\n	{\r\n		\"lat\": \"47.933865\",\r\n		\"lon\": \"19.886627\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"5\"\r\n	},\r\n	{\r\n		\"lat\": \"47.937608\",\r\n		\"lon\": \"19.882841\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"6\"\r\n	},\r\n	{\r\n		\"lat\": \"47.93819\",\r\n		\"lon\": \"19.873968\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"7\"\r\n	},\r\n	{\r\n		\"lat\": \"47.94043\",\r\n		\"lon\": \"19.869345\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"8\"\r\n	},\r\n	{\r\n		\"lat\": \"47.937579\",\r\n		\"lon\": \"19.864965\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"9\"\r\n	},\r\n	{\r\n		\"lat\": \"47.935624\",\r\n		\"lon\": \"19.860359\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"10\"\r\n	},\r\n	{\r\n		\"lat\": \"47.938929\",\r\n		\"lon\": \"19.854698\",\r\n		\"type\": \"RadioLassit\",\r\n		\"name\": \"11\"\r\n	},\r\n	{\r\n		\"lat\": \"47.940431\",\r\n		\"lon\": \"19.851694\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"12\"\r\n	},\r\n	{\r\n		\"lat\": \"47.937302\",\r\n		\"lon\": \"19.848033\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"13\"\r\n	},\r\n	{\r\n		\"lat\": \"47.940733\",\r\n		\"lon\": \"19.841833\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"14\"\r\n	},\r\n	{\r\n		\"lat\": \"47.946889\",\r\n		\"lon\": \"19.840167\",\r\n		\"type\": \"RadioLassit\",\r\n		\"name\": \"15\"\r\n	},\r\n	{\r\n		\"lat\": \"47.949872\",\r\n		\"lon\": \"19.841242\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"16\"\r\n	},\r\n	{\r\n		\"lat\": \"47.950559\",\r\n		\"lon\": \"19.839592\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"17\"\r\n	},\r\n	{\r\n		\"lat\": \"47.951362\",\r\n		\"lon\": \"19.836866\",\r\n		\"type\": \"RadioLRJ\",\r\n		\"name\": \"18\"\r\n	},\r\n	{\r\n		\"lat\": \"47.951603\",\r\n		\"lon\": \"19.830159\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"19\"\r\n	},\r\n	{\r\n		\"lat\": \"47.951975\",\r\n		\"lon\": \"19.827919\",\r\n		\"type\": \"Radio\",\r\n		\"name\": \"20\"\r\n	},\r\n	{\r\n		\"lat\": \"47.951846\",\r\n		\"lon\": \"19.8241\",\r\n		\"type\": \"RadioLassit\",\r\n		\"name\": \"21\"\r\n	}\r\n]', NULL, '[[47.934327,19.913104],\r\n[47.935364,19.912041],\r\n[47.935882,19.911518],\r\n[47.936225,19.911046],\r\n[47.936654,19.910359],\r\n[47.936783,19.910145],\r\n[47.936869,19.909759],\r\n[47.936869,19.909501],\r\n[47.936783,19.909115],\r\n[47.936654,19.908686],\r\n[47.936611,19.908557],\r\n[47.93674,19.908342],\r\n[47.936783,19.908085],\r\n[47.936842,19.908026],\r\n[47.936912,19.907956],\r\n[47.936997,19.907956],\r\n[47.937641,19.908042],\r\n[47.938027,19.907956],\r\n[47.938199,19.90787],\r\n[47.938414,19.907613],\r\n[47.938628,19.907098],\r\n[47.938843,19.90684],\r\n[47.939401,19.90624],\r\n[47.939572,19.906025],\r\n[47.939567,19.906038],\r\n[47.939784,19.905599],\r\n[47.939962,19.904999],\r\n[47.940003,19.90445],\r\n[47.939919,19.903815],\r\n[47.93983,19.903536],\r\n[47.939529,19.902935],\r\n[47.939315,19.902592],\r\n[47.9391,19.902334],\r\n[47.936997,19.900661],\r\n[47.936826,19.900489],\r\n[47.936568,19.900146],\r\n[47.936311,19.899588],\r\n[47.936182,19.899116],\r\n[47.936225,19.898729],\r\n[47.936311,19.898171],\r\n[47.936311,19.897699],\r\n[47.936311,19.897571],\r\n[47.936139,19.897313],\r\n[47.936053,19.897184],\r\n[47.935753,19.897056],\r\n[47.935581,19.897013],\r\n[47.934422,19.897313],\r\n[47.934079,19.897313],\r\n[47.933822,19.897313],\r\n[47.933478,19.897227],\r\n[47.932878,19.897013],\r\n[47.93232,19.896541],\r\n[47.932105,19.896283],\r\n[47.932019,19.896069],\r\n[47.932062,19.895897],\r\n[47.932191,19.895725],\r\n[47.932491,19.895511],\r\n[47.932706,19.895296],\r\n[47.933393,19.893794],\r\n[47.933478,19.893494],\r\n[47.933478,19.893322],\r\n[47.933393,19.893193],\r\n[47.93335,19.892936],\r\n[47.933178,19.892678],\r\n[47.932148,19.89152],\r\n[47.931848,19.891005],\r\n[47.931633,19.890318],\r\n[47.931504,19.889631],\r\n[47.93159,19.889202],\r\n[47.931719,19.888773],\r\n[47.932062,19.888],\r\n[47.932577,19.887314],\r\n[47.933049,19.886971],\r\n[47.93365,19.886756],\r\n[47.93395,19.886498],\r\n[47.934079,19.886284],\r\n[47.934337,19.885426],\r\n[47.934422,19.885211],\r\n[47.935495,19.883966],\r\n[47.935667,19.883752],\r\n[47.935925,19.883666],\r\n[47.936397,19.883494],\r\n[47.937126,19.883366],\r\n[47.937384,19.883151],\r\n[47.937942,19.882379],\r\n[47.938199,19.881907],\r\n[47.938328,19.881563],\r\n[47.938542,19.879889],\r\n[47.938671,19.878387],\r\n[47.938714,19.877872],\r\n[47.938585,19.877272],\r\n[47.938414,19.876671],\r\n[47.938242,19.875984],\r\n[47.938113,19.874525],\r\n[47.938156,19.874053],\r\n[47.938242,19.873838],\r\n[47.938371,19.873581],\r\n[47.939229,19.872422],\r\n[47.940345,19.870663],\r\n[47.940516,19.870319],\r\n[47.940559,19.870105],\r\n[47.940559,19.869804],\r\n[47.940516,19.869461],\r\n[47.940388,19.869289],\r\n[47.940087,19.868903],\r\n[47.939482,19.868191],\r\n[47.93891,19.867307],\r\n[47.938499,19.866285],\r\n[47.938371,19.866114],\r\n[47.937727,19.865427],\r\n[47.937641,19.865255],\r\n[47.937512,19.864655],\r\n[47.937384,19.864397],\r\n[47.936954,19.863925],\r\n[47.936912,19.863753],\r\n[47.936912,19.863195],\r\n[47.936826,19.862852],\r\n[47.936354,19.862294],\r\n[47.936225,19.86208],\r\n[47.936182,19.861908],\r\n[47.936096,19.86135],\r\n[47.93601,19.861093],\r\n[47.935667,19.860492],\r\n[47.935624,19.860363],\r\n[47.935624,19.860148],\r\n[47.935667,19.859977],\r\n[47.936053,19.859419],\r\n[47.936096,19.85929],\r\n[47.936139,19.859118],\r\n[47.936182,19.858518],\r\n[47.936268,19.858131],\r\n[47.937427,19.856114],\r\n[47.937942,19.855599],\r\n[47.938285,19.855299],\r\n[47.938886,19.854741],\r\n[47.940044,19.853454],\r\n[47.940173,19.853368],\r\n[47.940474,19.853282],\r\n[47.940602,19.853196],\r\n[47.940688,19.853067],\r\n[47.940774,19.852767],\r\n[47.940774,19.852595],\r\n[47.940688,19.852166],\r\n[47.940559,19.851866],\r\n[47.940302,19.851522],\r\n[47.939358,19.850793],\r\n[47.938972,19.850578],\r\n[47.938714,19.850578],\r\n[47.938414,19.85075],\r\n[47.938328,19.850707],\r\n[47.938156,19.850578],\r\n[47.938113,19.850407],\r\n[47.938113,19.850278],\r\n[47.938156,19.849892],\r\n[47.938156,19.84942],\r\n[47.93807,19.848948],\r\n[47.937984,19.84869],\r\n[47.937598,19.84839],\r\n[47.937384,19.848132],\r\n[47.937298,19.847918],\r\n[47.937298,19.84766],\r\n[47.937341,19.847445],\r\n[47.937384,19.847317],\r\n[47.937512,19.847188],\r\n[47.937641,19.847059],\r\n[47.937942,19.847016],\r\n[47.938499,19.846716],\r\n[47.939143,19.846029],\r\n[47.939801,19.844864],\r\n[47.940087,19.844356],\r\n[47.940302,19.843926],\r\n[47.940602,19.842982],\r\n[47.940731,19.84251],\r\n[47.940817,19.841609],\r\n[47.94116,19.840837],\r\n[47.941289,19.840407],\r\n[47.941332,19.839249],\r\n[47.941589,19.838734],\r\n[47.941847,19.838562],\r\n[47.942061,19.838519],\r\n[47.942405,19.838562],\r\n[47.94395,19.839206],\r\n[47.945151,19.839635],\r\n[47.945838,19.839721],\r\n[47.946782,19.839978],\r\n[47.946785,19.840314],\r\n[47.947056,19.840225],\r\n[47.947168,19.840064],\r\n[47.948027,19.840279],\r\n[47.949014,19.841008],\r\n[47.949615,19.841437],\r\n[47.949786,19.841309],\r\n[47.949923,19.841311],\r\n[47.949872,19.841051],\r\n[47.950087,19.840665],\r\n[47.950559,19.839592],\r\n[47.950816,19.838777],\r\n[47.951589,19.836073],\r\n[47.951717,19.835386],\r\n[47.95176,19.834614],\r\n[47.95176,19.833455],\r\n[47.95176,19.833026],\r\n[47.951632,19.832726],\r\n[47.951245,19.832125],\r\n[47.951202,19.83191],\r\n[47.951159,19.831524],\r\n[47.951159,19.831309],\r\n[47.951245,19.831052],\r\n[47.951503,19.830537],\r\n[47.951589,19.830065],\r\n[47.951632,19.829807],\r\n[47.951674,19.829679],\r\n[47.951932,19.829335],\r\n[47.952018,19.829121],\r\n[47.951975,19.827919],\r\n[47.951932,19.827361],\r\n[47.951932,19.826717],\r\n[47.952061,19.826331],\r\n[47.952147,19.825859],\r\n[47.952147,19.825473],\r\n[47.951932,19.824529],\r\n[47.951846,19.8241],\r\n[47.95176,19.823842],\r\n[47.951589,19.823585],\r\n[47.951245,19.823155],\r\n[47.951031,19.822812],\r\n[47.950902,19.822383],\r\n[47.950816,19.821868],\r\n[47.950816,19.821353],\r\n[47.950902,19.820881],\r\n[47.951202,19.819851],\r\n[47.951292,19.818638],\r\n[47.951374,19.81792],\r\n[47.951417,19.817748],\r\n[47.951632,19.817405],\r\n[47.952189,19.816976]]');

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
  `mapCenter` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `mapZoom` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES (4, 'Teszt Rally', '2023-06-29', '2023-06-10', 'Salgótarján, Hungary', '<p>Ez csak egy teszt!</p>', './assets/img/events/fejlec_salgo_rally_2023.jpg', '47.9383716,19.8582951', 13);
INSERT INTO `events` VALUES (5, 'East Rally 2023', '2023-07-15', '2023-07-01', 'Eger', '<p>M&eacute;g nincs bővebb inform&aacute;ci&oacute; a versenyről!</p>', './assets/img/events/fejlec_east_rally_2023.jpg', '47.9212154,20.3175928', 9);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `perm` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Felhasználó', 1);
INSERT INTO `permissions` VALUES (2, 'Moderátor', 2);
INSERT INTO `permissions` VALUES (3, 'Adminisztrátor', 3);
INSERT INTO `permissions` VALUES (4, 'Webmester', 99);

-- ----------------------------
-- Table structure for persons
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `marshalID` int NULL DEFAULT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `idcardno` varchar(10) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `borndate` date NULL DEFAULT NULL,
  `bornplace` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `postcode` int NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `address` varchar(999) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `phoneNo` varchar(15) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `vatNo` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `tajNo` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES (2, 1, 'Teszt Biztosító', '123456AB', '1992-09-10', 'Salgótarján', 3065, 'Pásztó-Hasznos', 'Vár utca 117', '06305805547', '123456789', '123456789', 'teszt@biztosito.hu');

-- ----------------------------
-- Table structure for persons_invitekeys
-- ----------------------------
DROP TABLE IF EXISTS `persons_invitekeys`;
CREATE TABLE `persons_invitekeys`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `marshalID` int NULL DEFAULT NULL,
  `authKey` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `expiredDate` datetime NULL DEFAULT NULL,
  `used` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persons_invitekeys
-- ----------------------------
INSERT INTO `persons_invitekeys` VALUES (3, 1, '4420e4c067b28f1a6ef32c3b01ca2b57d6d286b1b5e7252c9e64a8842bd36b27b1c6ba5f453018783df3b504d67332b5d1e02c3ab290bb97bceb07a9c14c916b', '2023-06-02 09:17:24', 1);

-- ----------------------------
-- Table structure for texts
-- ----------------------------
DROP TABLE IF EXISTS `texts`;
CREATE TABLE `texts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of texts
-- ----------------------------
INSERT INTO `texts` VALUES (1, 'Adatvédelem', 'adatvedelem', '<p>Hamarosan</p>');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_cars
-- ----------------------------
INSERT INTO `user_cars` VALUES (1, 1, 0, 'H', '**Censored**', 'Volkswagen', 'Polo 1.4 kat');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES (1, 1, 'Tajti Zoltán', 000, '**censored***', '1992-09-10', 'Salgótarján', 0000, '**censored***', '**censored***', '**censored***', '**censored***', '**censored***');

SET FOREIGN_KEY_CHECKS = 1;
