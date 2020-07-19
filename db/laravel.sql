/*
 Navicat Premium Data Transfer

 Source Server         : soccanc
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : laravel

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 26/05/2020 17:36:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `carts_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `carts_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES (44, 'sdfds', 'green', 'null', 'null', '100', '100', 1, 'images/1/2062575990.png', 1, 16, '2020-05-23 10:26:23', '2020-05-23 10:26:23');
INSERT INTO `carts` VALUES (45, 'sdfds', 'green', 'null', 'null', '100', '100', 1, 'images/1/2062575990.png', 1, 16, '2020-05-23 10:26:24', '2020-05-23 10:26:24');
INSERT INTO `carts` VALUES (48, 'fdgdfg', 'blue', 'xx', '1.5', '4500', '4500', 1, 'images/1/2062575990.png', 12, 14, '2020-05-23 12:08:44', '2020-05-23 12:08:44');

-- ----------------------------
-- Table structure for delivery_addresses
-- ----------------------------
DROP TABLE IF EXISTS `delivery_addresses`;
CREATE TABLE `delivery_addresses`  (
  `receiver_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `country_region` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `street_house_flat` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `mobile_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `delivery_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_danish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of delivery_addresses
-- ----------------------------

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `recipient_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `message_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sender_id`(`sender_id`) USING BTREE,
  INDEX `recipient_id`(`recipient_id`) USING BTREE,
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_danish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (1, 1, 7, 'gnhffhg fgdfg', NULL, NULL, 'larave');
INSERT INTO `messages` VALUES (2, 7, 1, 'fkgfgcfhcfg', NULL, NULL, 'back');
INSERT INTO `messages` VALUES (3, 1, 7, 'sadasdasdasd', '2020-05-22 16:52:21', '2020-05-22 16:52:21', 'dsadasdas');
INSERT INTO `messages` VALUES (4, 1, 1, 'hakob', '2020-05-22 16:59:34', '2020-05-22 16:59:34', 'hfh');
INSERT INTO `messages` VALUES (5, 1, 7, 'dsfsdfdsf', '2020-05-23 08:59:37', '2020-05-23 08:59:37', 'ddsfsd');
INSERT INTO `messages` VALUES (6, 1, 12, 'cxvxcvxc', '2020-05-23 12:22:28', '2020-05-23 12:22:28', 'cvxcv');
INSERT INTO `messages` VALUES (7, 12, 1, 'asdasdasd', '2020-05-23 12:23:03', '2020-05-23 12:23:03', 'sadasd');
INSERT INTO `messages` VALUES (8, 12, 1, 'sadasdasd', '2020-05-23 12:23:36', '2020-05-23 12:23:36', 'dsadasd');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_04_23_205911_create_myshops_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_04_23_205947_create_products_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_04_23_210023_create_products_images_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_04_23_210041_create_products_colors_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_04_23_210111_create_products_sizes_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_04_23_210139_create_products_lengths_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_04_23_210237_create_carts_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_04_23_210335_create_wishlists_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_04_23_211206_create_products_colors_admins_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_04_23_211225_create_products_sizes_admins_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_04_23_211249_create_products_lengths_admins_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_04_23_211307_create_products_categories_admins_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_04_27_143439_create_orders_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_04_27_143449_create_order_details_table', 1);

-- ----------------------------
-- Table structure for myshops
-- ----------------------------
DROP TABLE IF EXISTS `myshops`;
CREATE TABLE `myshops`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'confirmed',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `myshops_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `myshops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of myshops
-- ----------------------------
INSERT INTO `myshops` VALUES (1, 'cxvcx', 911033147, 'images/1/2062575990.png', 'confirmed', 1, '2020-04-27 15:34:35', '2020-04-27 15:34:35');
INSERT INTO `myshops` VALUES (20, 'fdggdfg', 1181577901, 'images/7/1508077333.png', 'confirmed', 7, '2020-05-10 20:41:33', '2020-05-10 20:41:33');
INSERT INTO `myshops` VALUES (21, 'sdaadsa', 757533146, 'images/12/1387313405.jpg', 'confirmed', 12, '2020-05-23 12:13:03', '2020-05-23 12:13:03');

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subtotal` int(255) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `feedback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_details_order_id_foreign`(`order_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (11, 700, 100, 7, NULL, 11, '2020-05-01 22:06:31', '2020-05-01 22:06:31', 2);
INSERT INTO `order_details` VALUES (12, 32880, 4110, 8, NULL, 11, '2020-05-01 22:06:31', '2020-05-01 22:06:31', 3);
INSERT INTO `order_details` VALUES (13, 53430, 4110, 13, NULL, 11, '2020-05-01 22:06:31', '2020-05-01 22:06:31', 3);
INSERT INTO `order_details` VALUES (14, 45, 45, 1, NULL, 12, '2020-05-01 22:11:52', '2020-05-01 22:11:52', 4);
INSERT INTO `order_details` VALUES (15, 100, 100, 1, NULL, 13, '2020-05-02 08:20:33', '2020-05-02 08:20:33', 2);
INSERT INTO `order_details` VALUES (16, 16440, 4110, 4, NULL, 14, '2020-05-02 08:26:18', '2020-05-02 08:26:18', 3);
INSERT INTO `order_details` VALUES (17, 100, 100, 1, NULL, 15, '2020-05-02 08:28:55', '2020-05-02 08:28:55', 2);
INSERT INTO `order_details` VALUES (18, 100, 100, 1, NULL, 15, '2020-05-02 08:28:55', '2020-05-02 08:28:55', 2);
INSERT INTO `order_details` VALUES (19, 45, 45, 1, NULL, 15, '2020-05-02 08:28:55', '2020-05-02 08:28:55', 4);
INSERT INTO `order_details` VALUES (20, 4635, 45, 103, NULL, 15, '2020-05-02 08:28:55', '2020-05-02 08:28:55', 4);
INSERT INTO `order_details` VALUES (21, 100, 100, 1, NULL, 16, '2020-05-02 08:35:40', '2020-05-02 08:35:40', 2);
INSERT INTO `order_details` VALUES (22, 100, 100, 1, NULL, 16, '2020-05-02 08:35:40', '2020-05-02 08:35:40', 2);
INSERT INTO `order_details` VALUES (23, 16440, 4110, 4, NULL, 16, '2020-05-02 08:35:40', '2020-05-02 08:35:40', 3);
INSERT INTO `order_details` VALUES (24, 100, 100, 1, NULL, 17, '2020-05-02 08:36:24', '2020-05-02 08:36:24', 2);
INSERT INTO `order_details` VALUES (25, 100, 100, 1, NULL, 17, '2020-05-02 08:36:24', '2020-05-02 08:36:24', 2);
INSERT INTO `order_details` VALUES (26, 100, 100, 1, NULL, 18, '2020-05-02 08:43:25', '2020-05-02 08:43:25', 2);
INSERT INTO `order_details` VALUES (27, 100, 100, 1, NULL, 18, '2020-05-02 08:43:25', '2020-05-02 08:43:25', 2);
INSERT INTO `order_details` VALUES (28, 4500, 100, 45, NULL, 18, '2020-05-02 08:43:25', '2020-05-02 08:43:25', 2);
INSERT INTO `order_details` VALUES (29, 100, 100, 1, NULL, 19, '2020-05-02 08:46:17', '2020-05-02 08:46:17', 2);
INSERT INTO `order_details` VALUES (30, 100, 100, 1, NULL, 19, '2020-05-02 08:46:17', '2020-05-02 08:46:17', 2);
INSERT INTO `order_details` VALUES (31, 100, 100, 1, NULL, 20, '2020-05-02 08:47:03', '2020-05-02 08:47:03', 2);
INSERT INTO `order_details` VALUES (32, 100, 100, 1, NULL, 20, '2020-05-02 08:47:03', '2020-05-02 08:47:03', 2);
INSERT INTO `order_details` VALUES (33, 100, 100, 1, NULL, 21, '2020-05-02 12:56:25', '2020-05-02 12:56:25', 2);
INSERT INTO `order_details` VALUES (34, 45, 45, 1, NULL, 21, '2020-05-02 12:56:25', '2020-05-02 12:56:25', 4);
INSERT INTO `order_details` VALUES (35, 45, 45, 1, NULL, 21, '2020-05-02 12:56:25', '2020-05-02 12:56:25', 4);
INSERT INTO `order_details` VALUES (36, 100, 100, 1, NULL, 22, '2020-05-02 13:04:22', '2020-05-02 13:04:22', 2);
INSERT INTO `order_details` VALUES (37, 45, 45, 1, NULL, 22, '2020-05-02 13:04:23', '2020-05-02 13:04:23', 4);
INSERT INTO `order_details` VALUES (38, 4110, 4110, 1, NULL, 22, '2020-05-02 13:04:23', '2020-05-02 13:04:23', 3);
INSERT INTO `order_details` VALUES (39, 32880, 4110, 8, NULL, 22, '2020-05-02 13:04:23', '2020-05-02 13:04:23', 3);
INSERT INTO `order_details` VALUES (40, 53430, 4110, 13, NULL, 23, '2020-05-02 13:07:41', '2020-05-02 13:07:41', 3);
INSERT INTO `order_details` VALUES (41, 53430, 4110, 13, NULL, 24, '2020-05-02 13:08:09', '2020-05-02 13:08:09', 3);
INSERT INTO `order_details` VALUES (42, 50, 50, 1, NULL, 25, '2020-05-14 11:11:23', '2020-05-14 11:11:23', 6);
INSERT INTO `order_details` VALUES (43, 100, 100, 1, NULL, 26, '2020-05-21 04:31:56', '2020-05-21 04:31:56', 2);
INSERT INTO `order_details` VALUES (44, 100, 100, 1, NULL, 28, '2020-05-21 04:41:11', '2020-05-21 04:41:11', 2);
INSERT INTO `order_details` VALUES (45, 300, 50, 6, NULL, 29, '2020-05-23 09:31:36', '2020-05-23 09:31:36', 6);
INSERT INTO `order_details` VALUES (46, 800, 100, 8, NULL, 30, '2020-05-23 12:10:39', '2020-05-23 12:10:39', 2);
INSERT INTO `order_details` VALUES (47, 45, 45, 1, NULL, 31, '2020-05-23 12:11:33', '2020-05-23 12:11:33', 17);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `feedback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (11, '87010', 1, '2020-05-01 22:06:31', '2020-05-21 01:33:26', 'sdfsdf', 2);
INSERT INTO `orders` VALUES (12, '45', 1, '2020-05-01 22:11:52', '2020-05-21 01:31:56', 'undefined', 2);
INSERT INTO `orders` VALUES (13, '100', 1, '2020-05-02 08:20:32', '2020-05-02 08:20:32', NULL, 0);
INSERT INTO `orders` VALUES (14, '16440', 1, '2020-05-02 08:26:18', '2020-05-02 08:26:18', NULL, 0);
INSERT INTO `orders` VALUES (15, '4635', 1, '2020-05-02 08:28:54', '2020-05-02 08:28:54', NULL, 0);
INSERT INTO `orders` VALUES (16, '16440', 1, '2020-05-02 08:35:40', '2020-05-02 08:35:40', NULL, 0);
INSERT INTO `orders` VALUES (17, '200', 1, '2020-05-02 08:36:24', '2020-05-02 08:36:24', NULL, 0);
INSERT INTO `orders` VALUES (18, '4500', 1, '2020-05-02 08:43:25', '2020-05-02 08:43:25', NULL, 0);
INSERT INTO `orders` VALUES (19, '100', 1, '2020-05-02 08:46:17', '2020-05-02 08:46:17', NULL, 0);
INSERT INTO `orders` VALUES (20, '100', 1, '2020-05-02 08:47:02', '2020-05-02 08:47:02', NULL, 0);
INSERT INTO `orders` VALUES (21, '45', 1, '2020-05-02 12:56:24', '2020-05-02 12:56:24', NULL, 0);
INSERT INTO `orders` VALUES (22, '32880', 1, '2020-05-02 13:04:22', '2020-05-02 13:04:22', NULL, 0);
INSERT INTO `orders` VALUES (23, '8220', 1, '2020-05-02 13:07:41', '2020-05-02 13:07:41', NULL, 0);
INSERT INTO `orders` VALUES (24, '61650', 1, '2020-05-02 13:08:09', '2020-05-02 13:08:09', NULL, 0);
INSERT INTO `orders` VALUES (25, '50', 1, '2020-05-14 11:11:23', '2020-05-14 11:11:23', NULL, 0);
INSERT INTO `orders` VALUES (26, '100', 7, '2020-05-21 04:31:56', '2020-05-21 04:31:56', NULL, 0);
INSERT INTO `orders` VALUES (27, '100', 7, '2020-05-21 04:31:59', '2020-05-21 04:32:44', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 0);
INSERT INTO `orders` VALUES (28, '100', 7, '2020-05-21 04:41:11', '2020-05-21 04:41:11', 'zxczxczxcxzczxczxc', 2);
INSERT INTO `orders` VALUES (29, '300', 1, '2020-05-23 09:31:36', '2020-05-23 09:31:36', NULL, 6);
INSERT INTO `orders` VALUES (30, '5345', 12, '2020-05-23 12:10:39', '2020-05-23 12:12:33', 'sadsadasdadsad', 14);
INSERT INTO `orders` VALUES (31, '4545', 12, '2020-05-23 12:11:33', '2020-05-23 12:11:33', NULL, 14);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valuable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `myshop_id` int(10) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `count` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `price` double NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_myshop_id_foreign`(`myshop_id`) USING BTREE,
  CONSTRAINT `products_myshop_id_foreign` FOREIGN KEY (`myshop_id`) REFERENCES `myshops` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (2, 'fsdfdsf', '391014449', 'not', 'AMD', 1, 'sdfsd', '45', 100, '2020-04-29 14:24:26', '2020-05-06 22:54:46');
INSERT INTO `products` VALUES (3, 'fsdfsd', '2071993584', 'not', 'RUB', 1, 'dsfsdf', '45', 45, '2020-05-01 11:14:39', '2020-05-13 12:19:19');
INSERT INTO `products` VALUES (4, 'fsdfsd', '1369966843', 'not', 'USD', 1, 'dsfsdf', '45', 45, '2020-05-01 11:49:51', '2020-05-06 22:43:40');
INSERT INTO `products` VALUES (5, 'ghfghgf', '1496135795', 'not', 'RUB', 1, 'hfghfgh', '45', 4110, '2020-05-02 09:12:45', '2020-05-06 22:42:47');
INSERT INTO `products` VALUES (6, 'dsfdsf', '387929563', 'not', 'RUB', 1, 'sdfdsf', '45', 50, '2020-05-02 09:16:06', '2020-05-10 20:42:55');
INSERT INTO `products` VALUES (7, 'fsdfsd', '109650491', 'not', 'RUB', 1, 'dsfsdf', '45', 45, '2020-05-02 09:20:06', '2020-05-06 23:10:47');
INSERT INTO `products` VALUES (8, 'eret', '1786674108', 'not', 'AMD', 1, 'reter', '1000', 2000, '2020-05-02 09:20:55', '2020-05-02 09:20:55');
INSERT INTO `products` VALUES (9, 'sdfdfds', '1858894980', 'not', 'RUB', 1, 'fsdfsdf', '45', 455, '2020-05-02 09:25:25', '2020-05-13 12:13:31');
INSERT INTO `products` VALUES (10, 'սդֆսդֆ', '516775896', 'not', 'AMD', 1, 'սդֆսդֆդս', '45', 10000, '2020-05-02 09:27:50', '2020-05-02 09:27:50');
INSERT INTO `products` VALUES (11, 'zczxczx', '1963488551', 'not', 'AMD', 1, 'ֆդգդֆգ', '45', 55, '2020-05-02 09:29:48', '2020-05-13 10:59:56');
INSERT INTO `products` VALUES (12, 'dfdfg', '1299893164', 'not', 'AMD', 1, 'dfgdfg', '45', 1000, '2020-05-03 09:23:52', '2020-05-03 09:23:52');
INSERT INTO `products` VALUES (13, 'fdsfsdf', '1687782988', 'not', 'USD', 1, 'sdfsdf', '45', 50, '2020-05-03 09:26:24', '2020-05-03 09:26:24');
INSERT INTO `products` VALUES (14, 'fdgdfg', '232351588', 'not', 'RUB', 1, 'fgfdg', '45', 4500, '2020-05-03 09:37:50', '2020-05-03 09:37:50');
INSERT INTO `products` VALUES (15, 'fdg', '517717308', 'not', 'RUB', 1, 'dgfdg', '54', 45, '2020-05-03 09:46:35', '2020-05-06 21:17:58');
INSERT INTO `products` VALUES (16, 'sdfds', '877442856', 'not', 'RUB', 1, 'fsdfsdf', '10', 100, '2020-05-03 09:49:44', '2020-05-03 09:49:44');
INSERT INTO `products` VALUES (17, 'zxczx', '271555677', 'not', 'USD', 1, 'czxczx', '45', 45, '2020-05-03 10:51:05', '2020-05-03 10:51:05');
INSERT INTO `products` VALUES (19, 'fsdfsd', '2073421756', 'not', 'USD', 20, 'dsfsdf', '45', 45, '2020-05-10 20:41:51', '2020-05-13 12:19:19');
INSERT INTO `products` VALUES (20, 'fgh', '1029131229', 'not', 'USD', 1, 'fghfgh', '4545', 4545, '2020-05-13 12:30:00', '2020-05-13 12:30:00');
INSERT INTO `products` VALUES (21, 'gfhg', '1642190322', 'not', 'USD', 1, 'fhfgh', '45', 454, '2020-05-13 12:48:03', '2020-05-13 12:48:03');
INSERT INTO `products` VALUES (22, 'sadasd', '150640863', 'phone', 'USD', 21, 'asdsadasdasd', '42', 100, '2020-05-23 12:14:25', '2020-05-23 12:15:57');

-- ----------------------------
-- Table structure for products_categories_admins
-- ----------------------------
DROP TABLE IF EXISTS `products_categories_admins`;
CREATE TABLE `products_categories_admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imges` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_categories_admins
-- ----------------------------
INSERT INTO `products_categories_admins` VALUES (2, 'not', NULL, '2020-05-07 19:09:04', '2020-05-07 19:09:04');
INSERT INTO `products_categories_admins` VALUES (5, 'telefon', NULL, '2020-05-14 15:55:26', '2020-05-14 15:55:26');
INSERT INTO `products_categories_admins` VALUES (6, 'phone', NULL, '2020-05-14 15:55:42', '2020-05-14 15:55:42');
INSERT INTO `products_categories_admins` VALUES (7, 'video', NULL, '2020-05-14 19:48:06', '2020-05-14 19:48:06');

-- ----------------------------
-- Table structure for products_colors
-- ----------------------------
DROP TABLE IF EXISTS `products_colors`;
CREATE TABLE `products_colors`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_colors_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `products_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_colors
-- ----------------------------
INSERT INTO `products_colors` VALUES (3, 'blue', 2, '2020-04-29 14:24:26', '2020-04-29 14:24:26');
INSERT INTO `products_colors` VALUES (4, 'green', 2, '2020-04-29 14:24:26', '2020-04-29 14:24:26');
INSERT INTO `products_colors` VALUES (5, 'green', 3, '2020-05-01 11:14:39', '2020-05-01 11:14:39');
INSERT INTO `products_colors` VALUES (6, 'red', 4, '2020-05-01 11:49:51', '2020-05-01 11:49:51');
INSERT INTO `products_colors` VALUES (7, 'blue', 4, '2020-05-01 11:49:51', '2020-05-01 11:49:51');
INSERT INTO `products_colors` VALUES (8, 'blue', 5, '2020-05-02 09:12:46', '2020-05-02 09:12:46');
INSERT INTO `products_colors` VALUES (10, 'blue', 6, '2020-05-02 09:16:06', '2020-05-02 09:16:06');
INSERT INTO `products_colors` VALUES (11, 'red', 7, '2020-05-02 09:20:06', '2020-05-02 09:20:06');
INSERT INTO `products_colors` VALUES (12, 'red', 8, '2020-05-02 09:20:55', '2020-05-02 09:20:55');
INSERT INTO `products_colors` VALUES (13, 'blue', 9, '2020-05-02 09:25:25', '2020-05-02 09:25:25');
INSERT INTO `products_colors` VALUES (14, 'green', 9, '2020-05-02 09:25:25', '2020-05-02 09:25:25');
INSERT INTO `products_colors` VALUES (15, 'red', 10, '2020-05-02 09:27:50', '2020-05-02 09:27:50');
INSERT INTO `products_colors` VALUES (16, 'blue', 10, '2020-05-02 09:27:50', '2020-05-02 09:27:50');
INSERT INTO `products_colors` VALUES (17, 'red', 11, '2020-05-02 09:29:49', '2020-05-02 09:29:49');
INSERT INTO `products_colors` VALUES (18, 'blue', 12, '2020-05-03 09:23:52', '2020-05-03 09:23:52');
INSERT INTO `products_colors` VALUES (19, 'green', 12, '2020-05-03 09:23:52', '2020-05-03 09:23:52');
INSERT INTO `products_colors` VALUES (20, 'blue', 13, '2020-05-03 09:26:24', '2020-05-03 09:26:24');
INSERT INTO `products_colors` VALUES (21, 'green', 13, '2020-05-03 09:26:24', '2020-05-03 09:26:24');
INSERT INTO `products_colors` VALUES (22, 'blue', 14, '2020-05-03 09:37:50', '2020-05-03 09:37:50');
INSERT INTO `products_colors` VALUES (23, 'red', 15, '2020-05-03 09:46:35', '2020-05-03 09:46:35');
INSERT INTO `products_colors` VALUES (24, 'blue', 15, '2020-05-03 09:46:35', '2020-05-03 09:46:35');
INSERT INTO `products_colors` VALUES (25, 'blue', 16, '2020-05-03 09:49:44', '2020-05-03 09:49:44');
INSERT INTO `products_colors` VALUES (26, 'green', 16, '2020-05-03 09:49:44', '2020-05-03 09:49:44');
INSERT INTO `products_colors` VALUES (27, 'blue', 17, '2020-05-03 10:51:05', '2020-05-03 10:51:05');
INSERT INTO `products_colors` VALUES (33, 'blue', 20, '2020-05-13 12:30:00', '2020-05-13 12:30:00');
INSERT INTO `products_colors` VALUES (34, 'black', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_colors` VALUES (35, 'blue', 21, '2020-05-13 12:48:03', '2020-05-13 12:48:03');
INSERT INTO `products_colors` VALUES (36, 'red', 22, '2020-05-23 12:14:26', '2020-05-23 12:14:26');
INSERT INTO `products_colors` VALUES (37, 'grenn', 22, '2020-05-23 12:14:26', '2020-05-23 12:14:26');

-- ----------------------------
-- Table structure for products_colors_admins
-- ----------------------------
DROP TABLE IF EXISTS `products_colors_admins`;
CREATE TABLE `products_colors_admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_colors_admins
-- ----------------------------
INSERT INTO `products_colors_admins` VALUES (1, 'red', NULL, NULL);
INSERT INTO `products_colors_admins` VALUES (5, 'grenn', '2020-05-07 18:50:30', '2020-05-07 18:50:30');
INSERT INTO `products_colors_admins` VALUES (7, 'blue', '2020-05-07 20:39:48', '2020-05-07 20:39:48');
INSERT INTO `products_colors_admins` VALUES (9, 'black', '2020-05-07 20:55:14', '2020-05-07 20:55:14');

-- ----------------------------
-- Table structure for products_images
-- ----------------------------
DROP TABLE IF EXISTS `products_images`;
CREATE TABLE `products_images`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_images_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `products_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_images
-- ----------------------------
INSERT INTO `products_images` VALUES (4, 'images/1/2/1143442637.png', 'main', 2, '2020-04-29 14:24:27', '2020-05-06 22:46:39');
INSERT INTO `products_images` VALUES (5, 'images/1/2/1660841147.png', 'null', 2, '2020-04-29 14:24:27', '2020-05-06 22:45:09');
INSERT INTO `products_images` VALUES (6, 'images/1/2/896131241.png', 'null', 2, '2020-04-29 14:24:27', '2020-05-06 22:46:38');
INSERT INTO `products_images` VALUES (7, 'images/1/3/488719878.png', 'null', 3, '2020-05-01 11:14:39', '2020-05-06 22:43:21');
INSERT INTO `products_images` VALUES (8, 'images/1/3/625138483.png', 'main', 3, '2020-05-01 11:14:39', '2020-05-06 22:49:34');
INSERT INTO `products_images` VALUES (10, 'images/1/4/495172970.png', 'null', 4, '2020-05-01 11:49:51', '2020-05-06 22:43:40');
INSERT INTO `products_images` VALUES (11, 'images/1/5/663552711.png', 'main', 5, '2020-05-02 09:12:46', '2020-05-02 09:12:46');
INSERT INTO `products_images` VALUES (12, 'images/1/6/2002605285.png', 'null', 6, '2020-05-02 09:16:06', '2020-05-10 20:42:55');
INSERT INTO `products_images` VALUES (13, 'images/1/7/1352521288.png', 'main', 7, '2020-05-02 09:20:06', '2020-05-06 23:10:47');
INSERT INTO `products_images` VALUES (14, 'images/1/8/1254179466.png', 'main', 8, '2020-05-02 09:20:55', '2020-05-02 09:20:55');
INSERT INTO `products_images` VALUES (15, 'images/1/9/1496357881.png', 'main', 9, '2020-05-02 09:25:25', '2020-05-06 21:24:54');
INSERT INTO `products_images` VALUES (16, 'images/1/10/1322133461.png', 'main', 10, '2020-05-02 09:27:50', '2020-05-02 09:27:50');
INSERT INTO `products_images` VALUES (17, 'images/1/11/1454352200.png', 'null', 11, '2020-05-02 09:29:49', '2020-05-06 21:21:37');
INSERT INTO `products_images` VALUES (18, 'images/1/11/724269719.png', 'main', 11, '2020-05-02 09:29:49', '2020-05-06 21:21:37');
INSERT INTO `products_images` VALUES (19, 'images/1/12/1733895018.png', 'main', 12, '2020-05-03 09:23:53', '2020-05-03 09:23:53');
INSERT INTO `products_images` VALUES (20, 'images/1/12/1505743403.png', 'main', 12, '2020-05-03 09:23:53', '2020-05-03 09:23:53');
INSERT INTO `products_images` VALUES (21, 'images/1/12/395669380.png', 'null', 12, '2020-05-03 09:23:53', '2020-05-03 09:23:53');
INSERT INTO `products_images` VALUES (22, 'images/1/13/845678255.png', 'main', 13, '2020-05-03 09:26:25', '2020-05-03 09:26:25');
INSERT INTO `products_images` VALUES (23, 'images/1/14/1788755621.png', 'main', 14, '2020-05-03 09:37:51', '2020-05-03 09:37:51');
INSERT INTO `products_images` VALUES (24, 'images/1/15/959331052.png', 'null', 15, '2020-05-03 09:46:35', '2020-05-06 21:17:58');
INSERT INTO `products_images` VALUES (25, 'images/1/15/1390145780.png', 'main', 15, '2020-05-03 09:46:35', '2020-05-06 21:17:58');
INSERT INTO `products_images` VALUES (26, 'images/1/16/555912855.png', 'main', 16, '2020-05-03 09:49:44', '2020-05-03 09:49:44');
INSERT INTO `products_images` VALUES (27, 'images/1/16/1450197674.png', 'null', 16, '2020-05-03 09:49:44', '2020-05-03 09:49:44');
INSERT INTO `products_images` VALUES (28, 'images/1/17/61017231.png', 'main', 17, '2020-05-03 10:51:06', '2020-05-03 10:51:06');
INSERT INTO `products_images` VALUES (45, 'images/9/2034794524.png', 'null', 9, '2020-05-06 21:24:42', '2020-05-06 21:24:54');
INSERT INTO `products_images` VALUES (46, 'images/4/114895550.png', 'main', 4, '2020-05-06 22:43:40', '2020-05-06 22:43:40');
INSERT INTO `products_images` VALUES (47, 'images/7/19/1007708840.png', 'main', 19, '2020-05-10 20:41:51', '2020-05-10 20:41:51');
INSERT INTO `products_images` VALUES (48, 'images/6/1492505150.png', 'main', 6, '2020-05-10 20:42:55', '2020-05-10 20:42:55');
INSERT INTO `products_images` VALUES (49, 'images/1/20/1828381451.jpg', 'null', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_images` VALUES (50, 'images/1/20/65379918.jpg', 'null', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_images` VALUES (51, 'images/1/20/1152690280.jpg', 'null', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_images` VALUES (52, 'images/1/20/842792835.jpg', 'null', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_images` VALUES (53, 'images/1/20/531412772.jpg', 'null', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_images` VALUES (54, 'images/1/20/1662673491.jpg', 'main', 20, '2020-05-13 12:30:01', '2020-05-13 12:30:01');
INSERT INTO `products_images` VALUES (55, 'images/1/21/1991758416.jpg', 'main', 21, '2020-05-13 12:48:03', '2020-05-13 12:48:03');
INSERT INTO `products_images` VALUES (56, 'images/12/22/1898855318.jpg', 'null', 22, '2020-05-23 12:14:26', '2020-05-23 12:14:26');
INSERT INTO `products_images` VALUES (57, 'images/12/22/449440866.jpg', 'null', 22, '2020-05-23 12:14:26', '2020-05-23 12:14:26');

-- ----------------------------
-- Table structure for products_lengths
-- ----------------------------
DROP TABLE IF EXISTS `products_lengths`;
CREATE TABLE `products_lengths`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_lengths_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `products_lengths_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_lengths
-- ----------------------------
INSERT INTO `products_lengths` VALUES (3, '1.5', 2, '2020-04-29 14:24:27', '2020-04-29 14:24:27');
INSERT INTO `products_lengths` VALUES (4, '2', 2, '2020-04-29 14:24:27', '2020-04-29 14:24:27');
INSERT INTO `products_lengths` VALUES (5, '1.5', 12, '2020-05-03 09:23:53', '2020-05-03 09:23:53');
INSERT INTO `products_lengths` VALUES (6, '2', 12, '2020-05-03 09:23:53', '2020-05-03 09:23:53');
INSERT INTO `products_lengths` VALUES (7, '1.5', 13, '2020-05-03 09:26:25', '2020-05-03 09:26:25');
INSERT INTO `products_lengths` VALUES (8, '2', 13, '2020-05-03 09:26:25', '2020-05-03 09:26:25');
INSERT INTO `products_lengths` VALUES (9, '1.5', 14, '2020-05-03 09:37:50', '2020-05-03 09:37:50');
INSERT INTO `products_lengths` VALUES (14, '1.5', 22, '2020-05-23 12:14:26', '2020-05-23 12:14:26');

-- ----------------------------
-- Table structure for products_lengths_admins
-- ----------------------------
DROP TABLE IF EXISTS `products_lengths_admins`;
CREATE TABLE `products_lengths_admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_lengths_admins
-- ----------------------------
INSERT INTO `products_lengths_admins` VALUES (1, '1', NULL, NULL);
INSERT INTO `products_lengths_admins` VALUES (2, '1.5', NULL, NULL);
INSERT INTO `products_lengths_admins` VALUES (4, '2', '2020-05-07 16:40:19', '2020-05-07 16:40:19');
INSERT INTO `products_lengths_admins` VALUES (6, '5', '2020-05-07 16:44:20', '2020-05-07 16:44:20');
INSERT INTO `products_lengths_admins` VALUES (8, '4', '2020-05-07 20:39:38', '2020-05-07 20:39:38');

-- ----------------------------
-- Table structure for products_sizes
-- ----------------------------
DROP TABLE IF EXISTS `products_sizes`;
CREATE TABLE `products_sizes`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_sizes_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `products_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_sizes
-- ----------------------------
INSERT INTO `products_sizes` VALUES (3, 'xxl', 2, '2020-04-29 14:24:26', '2020-04-29 14:24:26');
INSERT INTO `products_sizes` VALUES (4, 'xx', 2, '2020-04-29 14:24:27', '2020-04-29 14:24:27');
INSERT INTO `products_sizes` VALUES (5, 'xx', 5, '2020-05-02 09:12:46', '2020-05-02 09:12:46');
INSERT INTO `products_sizes` VALUES (6, 'x', 6, '2020-05-02 09:16:06', '2020-05-02 09:16:06');
INSERT INTO `products_sizes` VALUES (7, 'xx', 6, '2020-05-02 09:16:06', '2020-05-02 09:16:06');
INSERT INTO `products_sizes` VALUES (8, 'xx', 12, '2020-05-03 09:23:52', '2020-05-03 09:23:52');
INSERT INTO `products_sizes` VALUES (9, 'xx', 13, '2020-05-03 09:26:25', '2020-05-03 09:26:25');
INSERT INTO `products_sizes` VALUES (10, 'xxl', 13, '2020-05-03 09:26:25', '2020-05-03 09:26:25');
INSERT INTO `products_sizes` VALUES (11, 'xx', 14, '2020-05-03 09:37:50', '2020-05-03 09:37:50');
INSERT INTO `products_sizes` VALUES (94, 'mxll', 19, '2020-05-10 20:41:51', '2020-05-10 20:41:51');
INSERT INTO `products_sizes` VALUES (95, 'xx', 22, '2020-05-23 12:14:26', '2020-05-23 12:14:26');

-- ----------------------------
-- Table structure for products_sizes_admins
-- ----------------------------
DROP TABLE IF EXISTS `products_sizes_admins`;
CREATE TABLE `products_sizes_admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_sizes_admins
-- ----------------------------
INSERT INTO `products_sizes_admins` VALUES (2, 'xx', NULL, NULL);
INSERT INTO `products_sizes_admins` VALUES (5, 'xxl', '2020-05-07 15:56:57', '2020-05-07 15:56:57');
INSERT INTO `products_sizes_admins` VALUES (8, 'mxll', '2020-05-07 16:00:00', '2020-05-07 16:00:00');
INSERT INTO `products_sizes_admins` VALUES (12, '11', '2020-05-18 20:53:48', '2020-05-18 20:53:48');
INSERT INTO `products_sizes_admins` VALUES (13, 'zxzx', '2020-05-20 11:04:35', '2020-05-20 11:04:35');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `months` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `confirmation_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status_post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standart',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `user_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_block_time` timestamp(0) NULL DEFAULT NULL,
  `block_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Hakob', 'Vardanyan', 'hakob.vardanyan.1996@gmail.com', '$2y$10$9ywQCcXeC7IIYUpgOYd6UempfHA013MtVmT87S8TTd4SxjNTYhynG', '18', 'february', '1965', 'male', 'images/1/2055943224.jpg', '1', '1781803217', 'standart', NULL, NULL, '2020-05-23 12:30:11', 'admin', NULL, NULL);
INSERT INTO `users` VALUES (7, 'hakob.vardanyan.1996@mail.ru', 'hakob.vardanyan.1996@mail.ru', 'hakob.vardanyan.1996@mail.ru', '$2y$10$0QRrVZfWR77TC3U1XCXLaeg51hXrxNRrTlAm.WMGcuz0eAWDrERBW', '2', 'february', '1954', 'male', 'images/difold/user_male.png', 'block', '0', 'standart', NULL, NULL, '2020-05-23 09:20:44', NULL, NULL, 'fdsfsfdsdf');
INSERT INTO `users` VALUES (8, 'panch80@mail.ru', 'panch80@mail.ru', 'panch80@mail.ru', '$2y$10$xD2lQTrlijGLxpQ627LqXeb0NifkSeWFiRU.K80BPbtPf2HAgVKru', '2', 'january', '1952', 'male', 'images/difold/user_male.png', 'disable', '0', 'standart', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'panch80@mail.ru', 'panch80@mail.ru', 'hakob.vardanyan.1996@gil.com', '$2y$10$JIIPL7B424QKJAuOcVO5c.QUeA862BR4mTO9zFeb2iN7fu4NTmmFm', '2', 'february', '1951', 'male', 'images/difold/user_male.png', 'disable', '0', 'standart', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 'hakob.vardanyan.1996@gil.com', 'hakob.vardanyan.1996@gil.com', 'hakob.vardanyan.1996@gilee.com', '$2y$10$kzgSbXHOkH2hfCap5hwF5OQ825kiywczqvQABPDJu3yCpuT/1QJcC', '3', 'february', '1952', 'male', 'images/difold/user_male.png', 'disable', '0', 'standart', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'hakob.vardanyan.1996@gil.com', 'hakob.vardanyan.1996@gil.com', 'hakob.vardanyan.1996@gilssee.com', '$2y$10$dlEdt9cZjp5b2CZmqTIyCeH0lUrHmzP3oXh.KUcFQU6FXdClcNiF6', '1', 'february', '1950', 'male', 'images/difold/user_male.png', 'disable', '0', 'standart', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 'Hakob', 'Hakob', 'hakob_vardanyan_95@bk.ru', '$2y$10$qbui..rkhEHqi1mwOy.SpObFvdniBx8Ov3bWpkczhbbw5/ypIn2e.', '5', 'february', '1952', 'male', 'images/difold/user_male.png', 'block', '1694292094', 'standart', NULL, NULL, '2020-05-23 12:25:11', NULL, '2020-05-15 00:01:00', NULL);

-- ----------------------------
-- Table structure for wishlists
-- ----------------------------
DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wishlists_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `wishlists_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wishlists
-- ----------------------------
INSERT INTO `wishlists` VALUES (14, 'sdfds', 'images/1/2062575990.png', 1, 16, '2020-05-23 10:27:35', '2020-05-23 10:27:35');

SET FOREIGN_KEY_CHECKS = 1;
