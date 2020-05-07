/*
 Navicat Premium Data Transfer

 Source Server         : php_host
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : duan1_db

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 07/05/2020 12:26:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `short_ct` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `author_id` int(11) NULL DEFAULT NULL,
  `create_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `blog_author`(`author_id`) USING BTREE,
  CONSTRAINT `blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES (1, 'Best Things to Do In London Enjoy the Nightlife', 'public/images/photo-services-1-2.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper leo eu aliquet ultricies. Proin sit amet porta lorem, nec bibendum augue. Phasellus vehicula augue eu bibendum varius. Fusce egestas urna ac ullamcorper pulvinar. Mauris a mauris accumsan felis auctor ultrices. Maecenas eu vehicula dolor. Nullam ac facilisis mi. Praesent efficitur rutrum accumsan. Vivamus aliquet eros vel suscipit pretium.\r\n\r\nEtiam congue mollis mi a mollis. Fusce quam enim, posuere et nibh nec, facilisis tempus odio. In blandit lectus dignissim ipsum suscipit, hendrerit hendrerit turpis accumsan. Aliquam auctor orci erat, vitae vehicula tellus dapibus sed. Mauris bibendum diam in ex dignissim, id cursus neque venenatis. Donec at libero vulputate, maximus mauris vel, maximus sem. Pellentesque dapibus pulvinar augue aliquam dictum. Morbi sit amet elementum ipsum. Cras venenatis turpis ac efficitur mattis. Proin venenatis euismod massa, vitae gravida mauris mattis ut. In placerat tristique nulla, sed commodo magna cursus ut. Nullam scelerisque imperdiet magna in dignissim. Vivamus vitae odio nec ipsum pellentesque dapibus at sed augue. Fusce vel luctus risus, non viverra sem. Nullam sit amet massa enim.\r\n\r\nProin aliquam consectetur mi id vehicula. Nam cursus mauris lorem, ac mollis tortor ultricies a. Nam pulvinar nulla tellus, volutpat dignissim dui elementum mollis. Donec feugiat mi eu porta dignissim. Proin scelerisque nulla ex, sit amet fringilla nunc vulputate vel. Pellentesque sit amet vestibulum odio, in elementum risus. Duis ut mi sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut efficitur ante eu sem hendrerit facilisis. Aliquam non efficitur nulla. Curabitur ante felis, tincidunt a libero ac, mollis accumsan enim. Morbi hendrerit semper nunc, eget aliquam leo feugiat sed.', 2, '2020-03-26 20:26:47', 1);
INSERT INTO `blog` VALUES (2, 'Best Things to Do In London Enjoy the Nightlife', 'public/images/photo-services-1-2.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper leo eu aliquet ultricies. Proin sit amet porta lorem, nec bibendum augue. Phasellus vehicula augue eu bibendum varius. Fusce egestas urna ac ullamcorper pulvinar. Mauris a mauris accumsan felis auctor ultrices. Maecenas eu vehicula dolor. Nullam ac facilisis mi. Praesent efficitur rutrum accumsan. Vivamus aliquet eros vel suscipit pretium.\r\n\r\nEtiam congue mollis mi a mollis. Fusce quam enim, posuere et nibh nec, facilisis tempus odio. In blandit lectus dignissim ipsum suscipit, hendrerit hendrerit turpis accumsan. Aliquam auctor orci erat, vitae vehicula tellus dapibus sed. Mauris bibendum diam in ex dignissim, id cursus neque venenatis. Donec at libero vulputate, maximus mauris vel, maximus sem. Pellentesque dapibus pulvinar augue aliquam dictum. Morbi sit amet elementum ipsum. Cras venenatis turpis ac efficitur mattis. Proin venenatis euismod massa, vitae gravida mauris mattis ut. In placerat tristique nulla, sed commodo magna cursus ut. Nullam scelerisque imperdiet magna in dignissim. Vivamus vitae odio nec ipsum pellentesque dapibus at sed augue. Fusce vel luctus risus, non viverra sem. Nullam sit amet massa enim.\r\n\r\nProin aliquam consectetur mi id vehicula. Nam cursus mauris lorem, ac mollis tortor ultricies a. Nam pulvinar nulla tellus, volutpat dignissim dui elementum mollis. Donec feugiat mi eu porta dignissim. Proin scelerisque nulla ex, sit amet fringilla nunc vulputate vel. Pellentesque sit amet vestibulum odio, in elementum risus. Duis ut mi sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut efficitur ante eu sem hendrerit facilisis. Aliquam non efficitur nulla. Curabitur ante felis, tincidunt a libero ac, mollis accumsan enim. Morbi hendrerit semper nunc, eget aliquam leo feugiat sed.', 2, '2020-03-27 20:26:55', 1);
INSERT INTO `blog` VALUES (3, 'Best Things to Do In London Enjoy the Nightlife', 'public/images/photo-services-2-1.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper leo eu aliquet ultricies. Proin sit amet porta lorem, nec bibendum augue. Phasellus vehicula augue eu bibendum varius. Fusce egestas urna ac ullamcorper pulvinar. Mauris a mauris accumsan felis auctor ultrices. Maecenas eu vehicula dolor. Nullam ac facilisis mi. Praesent efficitur rutrum accumsan. Vivamus aliquet eros vel suscipit pretium.\r\n\r\nEtiam congue mollis mi a mollis. Fusce quam enim, posuere et nibh nec, facilisis tempus odio. In blandit lectus dignissim ipsum suscipit, hendrerit hendrerit turpis accumsan. Aliquam auctor orci erat, vitae vehicula tellus dapibus sed. Mauris bibendum diam in ex dignissim, id cursus neque venenatis. Donec at libero vulputate, maximus mauris vel, maximus sem. Pellentesque dapibus pulvinar augue aliquam dictum. Morbi sit amet elementum ipsum. Cras venenatis turpis ac efficitur mattis. Proin venenatis euismod massa, vitae gravida mauris mattis ut. In placerat tristique nulla, sed commodo magna cursus ut. Nullam scelerisque imperdiet magna in dignissim. Vivamus vitae odio nec ipsum pellentesque dapibus at sed augue. Fusce vel luctus risus, non viverra sem. Nullam sit amet massa enim.\r\n\r\nProin aliquam consectetur mi id vehicula. Nam cursus mauris lorem, ac mollis tortor ultricies a. Nam pulvinar nulla tellus, volutpat dignissim dui elementum mollis. Donec feugiat mi eu porta dignissim. Proin scelerisque nulla ex, sit amet fringilla nunc vulputate vel. Pellentesque sit amet vestibulum odio, in elementum risus. Duis ut mi sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut efficitur ante eu sem hendrerit facilisis. Aliquam non efficitur nulla. Curabitur ante felis, tincidunt a libero ac, mollis accumsan enim. Morbi hendrerit semper nunc, eget aliquam leo feugiat sed.', 2, '2020-03-27 20:26:57', 1);
INSERT INTO `blog` VALUES (4, 'Best Things to Do In London Enjoy the Nightlife', 'public/images/photo-services-3-1.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper leo eu aliquet ultricies. Proin sit amet porta lorem, nec bibendum augue. Phasellus vehicula augue eu bibendum varius. Fusce egestas urna ac ullamcorper pulvinar. Mauris a mauris accumsan felis auctor ultrices. Maecenas eu vehicula dolor. Nullam ac facilisis mi. Praesent efficitur rutrum accumsan. Vivamus aliquet eros vel suscipit pretium.\r\n\r\nEtiam congue mollis mi a mollis. Fusce quam enim, posuere et nibh nec, facilisis tempus odio. In blandit lectus dignissim ipsum suscipit, hendrerit hendrerit turpis accumsan. Aliquam auctor orci erat, vitae vehicula tellus dapibus sed. Mauris bibendum diam in ex dignissim, id cursus neque venenatis. Donec at libero vulputate, maximus mauris vel, maximus sem. Pellentesque dapibus pulvinar augue aliquam dictum. Morbi sit amet elementum ipsum. Cras venenatis turpis ac efficitur mattis. Proin venenatis euismod massa, vitae gravida mauris mattis ut. In placerat tristique nulla, sed commodo magna cursus ut. Nullam scelerisque imperdiet magna in dignissim. Vivamus vitae odio nec ipsum pellentesque dapibus at sed augue. Fusce vel luctus risus, non viverra sem. Nullam sit amet massa enim.\r\n\r\nProin aliquam consectetur mi id vehicula. Nam cursus mauris lorem, ac mollis tortor ultricies a. Nam pulvinar nulla tellus, volutpat dignissim dui elementum mollis. Donec feugiat mi eu porta dignissim. Proin scelerisque nulla ex, sit amet fringilla nunc vulputate vel. Pellentesque sit amet vestibulum odio, in elementum risus. Duis ut mi sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut efficitur ante eu sem hendrerit facilisis. Aliquam non efficitur nulla. Curabitur ante felis, tincidunt a libero ac, mollis accumsan enim. Morbi hendrerit semper nunc, eget aliquam leo feugiat sed.', 2, '2020-03-27 20:26:58', 1);
INSERT INTO `blog` VALUES (5, 'Best Things to Do In London Enjoy the Nightlife 1', 'public/images/photo-services-4-1.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper leo eu aliquet ultricies. Proin sit amet porta lorem, nec bibendum augue. Phasellus vehicula augue eu bibendum varius. Fusce egestas urna ac ullamcorper pulvinar. Mauris a mauris accumsan felis auctor ultrices. Maecenas eu vehicula dolor. Nullam ac facilisis mi. Praesent efficitur rutrum accumsan. Vivamus aliquet eros vel suscipit pretium.\r\n\r\nEtiam congue mollis mi a mollis. Fusce quam enim, posuere et nibh nec, facilisis tempus odio. In blandit lectus dignissim ipsum suscipit, hendrerit hendrerit turpis accumsan. Aliquam auctor orci erat, vitae vehicula tellus dapibus sed. Mauris bibendum diam in ex dignissim, id cursus neque venenatis. Donec at libero vulputate, maximus mauris vel, maximus sem. Pellentesque dapibus pulvinar augue aliquam dictum. Morbi sit amet elementum ipsum. Cras venenatis turpis ac efficitur mattis. Proin venenatis euismod massa, vitae gravida mauris mattis ut. In placerat tristique nulla, sed commodo magna cursus ut. Nullam scelerisque imperdiet magna in dignissim. Vivamus vitae odio nec ipsum pellentesque dapibus at sed augue. Fusce vel luctus risus, non viverra sem. Nullam sit amet massa enim.\r\n\r\nProin aliquam consectetur mi id vehicula. Nam cursus mauris lorem, ac mollis tortor ultricies a. Nam pulvinar nulla tellus, volutpat dignissim dui elementum mollis. Donec feugiat mi eu porta dignissim. Proin scelerisque nulla ex, sit amet fringilla nunc vulputate vel. Pellentesque sit amet vestibulum odio, in elementum risus. Duis ut mi sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut efficitur ante eu sem hendrerit facilisis. Aliquam non efficitur nulla. Curabitur ante felis, tincidunt a libero ac, mollis accumsan enim. Morbi hendrerit semper nunc, eget aliquam leo feugiat sed.', 2, '2020-03-27 22:12:07', 1);
INSERT INTO `blog` VALUES (6, 'Best Things to Do In London Enjoy the Nightlife 2', 'public/images/photo-services-5-1.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper leo eu aliquet ultricies. Proin sit amet porta lorem, nec bibendum augue. Phasellus vehicula augue eu bibendum varius. Fusce egestas urna ac ullamcorper pulvinar. Mauris a mauris accumsan felis auctor ultrices. Maecenas eu vehicula dolor. Nullam ac facilisis mi. Praesent efficitur rutrum accumsan. Vivamus aliquet eros vel suscipit pretium.\r\n\r\nEtiam congue mollis mi a mollis. Fusce quam enim, posuere et nibh nec, facilisis tempus odio. In blandit lectus dignissim ipsum suscipit, hendrerit hendrerit turpis accumsan. Aliquam auctor orci erat, vitae vehicula tellus dapibus sed. Mauris bibendum diam in ex dignissim, id cursus neque venenatis. Donec at libero vulputate, maximus mauris vel, maximus sem. Pellentesque dapibus pulvinar augue aliquam dictum. Morbi sit amet elementum ipsum. Cras venenatis turpis ac efficitur mattis. Proin venenatis euismod massa, vitae gravida mauris mattis ut. In placerat tristique nulla, sed commodo magna cursus ut. Nullam scelerisque imperdiet magna in dignissim. Vivamus vitae odio nec ipsum pellentesque dapibus at sed augue. Fusce vel luctus risus, non viverra sem. Nullam sit amet massa enim.\r\n\r\nProin aliquam consectetur mi id vehicula. Nam cursus mauris lorem, ac mollis tortor ultricies a. Nam pulvinar nulla tellus, volutpat dignissim dui elementum mollis. Donec feugiat mi eu porta dignissim. Proin scelerisque nulla ex, sit amet fringilla nunc vulputate vel. Pellentesque sit amet vestibulum odio, in elementum risus. Duis ut mi sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut efficitur ante eu sem hendrerit facilisis. Aliquam non efficitur nulla. Curabitur ante felis, tincidunt a libero ac, mollis accumsan enim. Morbi hendrerit semper nunc, eget aliquam leo feugiat sed.', 2, '2020-03-27 22:12:09', 1);
INSERT INTO `blog` VALUES (9, 'Best Things to Do In London Enjoy the Sunlife', 'public/images/5e985b2ac3f80-5e92db690ca41-photo-blog-big-2.jpg', 'agabds', 'agadfgads', 1, '2020-04-17 20:55:39', 1);
INSERT INTO `blog` VALUES (14, 'Touch The Sea 2', 'public/images/5e9a4a782d687-5e986e9059ace-photo-gallery-1.jpg', 'fafsdsdf', 'ầgadfg', 1, NULL, 1);
INSERT INTO `blog` VALUES (18, 'ầddgs', 'public/images/5e9c1b9058f06-5e9a47a34385f-5e97d8da09091-5e928c78c2c89-about.jpg', 'adsafa', 'fasdsad', 1, '2020-04-19 16:36:16', 1);
INSERT INTO `blog` VALUES (22, 'Best Things to Do In NewYork Enjoy the Sunlife', 'public/images/5ea3ef88a3b9d-5e97d98767054-5e928c1e8d619-photo-blog-big-1.jpg', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú.', 'Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú. Những dịch vụ trong khách sạn được mở ra nhằm mục đích mang đến sự hài lòng, tiện lợi cho khách lưu trú.', 1, '2020-04-25 15:09:12', 1);
INSERT INTO `blog` VALUES (23, 'New blog', 'public/images/5ea4d25380b55-5ea3f37106c86-5ea3f1b06699f-5e980452ddfac-photo-blog-big-3.jpg', 'abcbabababacbacba', 'babababababababababba', 12, '2020-04-26 07:14:11', 1);

-- ----------------------------
-- Table structure for blog_cate_xref
-- ----------------------------
DROP TABLE IF EXISTS `blog_cate_xref`;
CREATE TABLE `blog_cate_xref`  (
  `blog_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_id`, `cate_id`) USING BTREE,
  INDEX `blog_cate_id`(`cate_id`) USING BTREE,
  CONSTRAINT `blog_blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blog_cate_id` FOREIGN KEY (`cate_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_cate_xref
-- ----------------------------
INSERT INTO `blog_cate_xref` VALUES (1, 1);
INSERT INTO `blog_cate_xref` VALUES (1, 2);
INSERT INTO `blog_cate_xref` VALUES (1, 3);
INSERT INTO `blog_cate_xref` VALUES (2, 3);
INSERT INTO `blog_cate_xref` VALUES (2, 4);
INSERT INTO `blog_cate_xref` VALUES (2, 5);
INSERT INTO `blog_cate_xref` VALUES (2, 6);
INSERT INTO `blog_cate_xref` VALUES (3, 2);
INSERT INTO `blog_cate_xref` VALUES (4, 3);
INSERT INTO `blog_cate_xref` VALUES (5, 5);
INSERT INTO `blog_cate_xref` VALUES (6, 1);
INSERT INTO `blog_cate_xref` VALUES (6, 2);
INSERT INTO `blog_cate_xref` VALUES (6, 3);
INSERT INTO `blog_cate_xref` VALUES (9, 1);
INSERT INTO `blog_cate_xref` VALUES (9, 2);
INSERT INTO `blog_cate_xref` VALUES (9, 4);
INSERT INTO `blog_cate_xref` VALUES (14, 1);
INSERT INTO `blog_cate_xref` VALUES (14, 5);
INSERT INTO `blog_cate_xref` VALUES (14, 6);
INSERT INTO `blog_cate_xref` VALUES (18, 1);
INSERT INTO `blog_cate_xref` VALUES (18, 2);
INSERT INTO `blog_cate_xref` VALUES (22, 1);
INSERT INTO `blog_cate_xref` VALUES (22, 2);
INSERT INTO `blog_cate_xref` VALUES (22, 3);
INSERT INTO `blog_cate_xref` VALUES (23, 2);
INSERT INTO `blog_cate_xref` VALUES (23, 6);

-- ----------------------------
-- Table structure for blog_categories
-- ----------------------------
DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_categories
-- ----------------------------
INSERT INTO `blog_categories` VALUES (1, 'TRAVEL', 1);
INSERT INTO `blog_categories` VALUES (2, 'SERVICES', 1);
INSERT INTO `blog_categories` VALUES (3, 'EVENTS', 1);
INSERT INTO `blog_categories` VALUES (4, 'ROOM & SUITES', 1);
INSERT INTO `blog_categories` VALUES (5, 'SPA & GYM', 1);
INSERT INTO `blog_categories` VALUES (6, 'POOL & SWIM', 1);

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `phone_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `checkin_date` date NULL DEFAULT NULL,
  `checkout_date` date NULL DEFAULT NULL,
  `adults` int(1) NULL DEFAULT NULL,
  `children` int(1) NULL DEFAULT NULL,
  `room_types` int(11) NULL DEFAULT NULL,
  `request` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `created_date` timestamp(0) NULL DEFAULT current_timestamp(0),
  `total_price` int(11) NULL DEFAULT NULL,
  `reply_by` int(11) NULL DEFAULT NULL,
  `reply_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `reply_date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `check_in` int(11) NULL DEFAULT 1,
  `checked_in_date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `book_type`(`room_types`) USING BTREE,
  INDEX `book_re_by`(`reply_by`) USING BTREE,
  CONSTRAINT `book_re_by` FOREIGN KEY (`reply_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `book_room_id` FOREIGN KEY (`room_types`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (11, 'Duc Dinh', '1234567890', 'ducdvvph09332@fpt.edu.vn', '0000-00-00', '0000-00-00', 5, 5, 18, '', NULL, 120000000, 1, 'chúc mừng', '2020-04-19 07:41:18', 0, '2020-04-19 07:41:18');
INSERT INTO `booking` VALUES (17, 'Duc Dinh', '1234567890', 'ducdvvph09332@fpt.edu.vn', '2020-03-13', '2020-03-17', 5, 5, 17, '', NULL, 147483647, 1, 'THÀNH CÔNG', '2020-05-05 11:15:16', 0, '2020-05-05 11:15:16');
INSERT INTO `booking` VALUES (18, 'Duc Dinh', '1234567890', 'dinhvietduc260820@gmail.com', '2020-03-13', '2020-03-17', 2, 2, 5, '', NULL, 28000000, 1, 'Đặt phòng thành công', '2020-05-05 07:19:17', 0, '2020-06-18 20:48:30');
INSERT INTO `booking` VALUES (19, 'Duc Dinh', '1234567890', 'dinhvietduc260820@gmail.com', '2020-03-13', '2020-03-14', 2, 2, 5, '', '2020-04-24 18:55:22', 7000000, 12, 'Xin loi chung toi da het phong', '2020-05-05 07:19:25', 2, '2020-07-24 18:55:22');
INSERT INTO `booking` VALUES (23, '123', '1234567890', 'abcd@gmail.com', '2020-04-20', '2029-04-20', 5, 5, 17, '', NULL, 147483647, NULL, NULL, '2020-05-05 11:15:14', 1, '2020-05-05 11:15:14');
INSERT INTO `booking` VALUES (25, 'ducdd', '1234567890', 'ducdinh0129@gmail.com', '2020-04-24', '2020-04-25', 5, 5, 18, '', '2020-04-24 19:08:02', 10000000, 12, 'Chung toi da het phong', '2020-04-24 19:08:02', 2, '2020-04-24 19:08:02');
INSERT INTO `booking` VALUES (26, 'Duc Dinh', '1234567890', 'ducdinh08239@gmail.com', '2020-04-25', '2020-04-27', 5, 5, 18, '', '2020-04-24 21:02:02', 20000000, 12, 'Chúng tôi đã có phòng', '2020-04-24 21:02:02', 0, '2020-04-24 21:02:02');
INSERT INTO `booking` VALUES (27, 'thienth', '0987654321', 'thienth32@gmail.com', '2020-04-27', '2020-04-28', 5, 5, 18, '', '2020-04-26 07:39:01', 10000000, NULL, NULL, '2020-05-07 10:22:46', 1, '2020-05-05 10:22:53');
INSERT INTO `booking` VALUES (28, 'Test booking', '1234567890', 'ducdinh0129@gmail.com', '2020-05-05', '2020-05-07', 5, 5, 17, '', '2020-05-04 22:14:34', 2000000, 1, 'Cảm ơn bạn đã đặt phòng tại grandium', '2020-05-04 22:15:14', 0, '2020-05-04 22:15:14');
INSERT INTO `booking` VALUES (29, 'MAza', '1234567890', 'abcd@gmail.com', '2020-05-06', '2020-05-09', 5, 5, 18, '', '2020-05-05 09:13:56', 30000000, 12, '<p>ok</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', '2020-05-05 09:14:18', 0, '2020-05-05 09:14:18');
INSERT INTO `booking` VALUES (30, 'ddd', '1234567890', 'abcd@gmail.com', '2020-05-13', '2020-05-22', 5, 5, 17, '', '2020-05-05 09:38:20', 9000000, 12, '<p>abc</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', '2020-05-05 09:39:49', 0, '2020-07-05 09:38:34');
INSERT INTO `booking` VALUES (31, 'spa', '1234567890', 'abcd@gmail.com', '2020-05-06', '2020-05-13', 5, 5, 18, '', '2020-05-05 09:54:57', 70000000, 12, '<p>ok</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', '2020-05-05 09:56:32', 0, '2020-09-05 09:56:13');
INSERT INTO `booking` VALUES (32, '123', '1234567890', 'abcd@gmail.com', '2020-05-06', '2020-05-07', 5, 5, 18, '', '2020-05-05 09:55:31', 10000000, 12, '<p>&nbsp;</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', '2020-05-05 14:30:48', 0, '2020-09-05 09:55:59');
INSERT INTO `booking` VALUES (33, 'Test booking 2', '1234567890', 'ducdinh08239@gmail.com', '2020-05-06', '2020-05-08', 5, 5, 18, 'Ko có j', '2020-05-05 13:21:45', 20000000, 12, '<p>&nbsp;</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', '2020-05-05 13:23:14', 0, '2020-05-05 13:23:14');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `reply_by` int(11) NULL DEFAULT NULL,
  `reply_for` int(11) NULL DEFAULT NULL,
  `create_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `contacts_for`(`reply_for`) USING BTREE,
  INDEX `contact_re_by`(`reply_by`) USING BTREE,
  CONSTRAINT `contact_re_by` FOREIGN KEY (`reply_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contact_reply` FOREIGN KEY (`reply_for`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (32, 'Duc Dinh', '1234567890', 'ducdvvph09332@fpt.edu.vn', 'Gop y', '12345123', 1, NULL, '2020-04-18 16:32:16', 0);
INSERT INTO `contacts` VALUES (33, 'superadmin', '123456', 'superadmin@gmail.com', NULL, 'GUI THANH CONG', 1, 32, NULL, 0);
INSERT INTO `contacts` VALUES (34, 'Duc Dinh', '1234567890', 'ducdinh0129@gmail.com', 'Gop y', 'abcbabc', 1, NULL, '2020-04-18 18:01:30', 0);
INSERT INTO `contacts` VALUES (35, 'superadmin', '123456', 'superadmin@gmail.com', NULL, 'abcbabc', 1, 34, NULL, 0);
INSERT INTO `contacts` VALUES (36, 'ducdvvph09332', '1234567890', 'dinhvietduc260820@gmail.com', 'Gop y', 'TỐT', 1, NULL, '2020-04-18 20:39:50', 0);
INSERT INTO `contacts` VALUES (37, 'superadmin', '123456', 'superadmin@gmail.com', NULL, 'Cảm ơn', 1, 36, NULL, 0);
INSERT INTO `contacts` VALUES (38, 'Duc Dinh', '1234567890', 'ducdinh08239@gmail.com', 'Gop y', 'TOT', 1, NULL, '2020-04-25 14:40:51', 0);
INSERT INTO `contacts` VALUES (39, 'spa', '1234567890', 'abcd@gmail.com', 'Good', 'blab', NULL, NULL, '2020-05-06 10:16:30', 1);
INSERT INTO `contacts` VALUES (40, 'superadmin', '123456', 'superadmin@gmail.com', NULL, 'cam on', 1, 38, NULL, 0);
INSERT INTO `contacts` VALUES (43, 'Duc Dinh test contact', '1234567890', 'abcda@gmail.com', 'Gop y', 'OK', NULL, NULL, '2020-07-06 10:19:04', 1);
INSERT INTO `contacts` VALUES (44, 'Duc Dinh test 2', '1234567890', 'ab@gmail.com', 'Gop y', 'OC', 12, NULL, '2020-05-05 13:19:04', 0);
INSERT INTO `contacts` VALUES (45, 'Duc Dinh test 3', '1234567890', 'aab@gmail.com', 'Good', '123', NULL, NULL, '2020-05-05 10:20:52', 1);
INSERT INTO `contacts` VALUES (46, 'Duc Dinh test 4', '1234567890', 'test4@gmail.com', 'good', '123', NULL, NULL, '2020-05-05 10:36:09', 1);
INSERT INTO `contacts` VALUES (47, 'Duc Dinh', '0987456321', 'ducdinh08239@gmail.com', NULL, '<p>Test Gửi</p>\r\n<p>&nbsp;</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', 12, 44, '2020-05-05 13:19:04', 0);
INSERT INTO `contacts` VALUES (48, 'test contact 5', '1234567890', 'abcdef@gmail.com', 'Gop y', 'abc', 1, NULL, '2020-05-07 09:19:48', 0);
INSERT INTO `contacts` VALUES (49, 'superadmin', '123456', 'superadmin@gmail.com', NULL, '<p>ok</p>\r\n<p>&nbsp;</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', 1, 48, '2020-05-07 09:19:47', 0);

-- ----------------------------
-- Table structure for customer_feedback
-- ----------------------------
DROP TABLE IF EXISTS `customer_feedback`;
CREATE TABLE `customer_feedback`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer_feedback
-- ----------------------------
INSERT INTO `customer_feedback` VALUES (1, 'MARILYN SUTTLE', 'HA NOI', 'public/images/user-1.jpg', 'Mình vừa trải qua kỳ nghỉ 3 ngày 2 đêm tại Khách sạn Kings finger ở Đà Nẵng. Thực sự mình rất ấn tượng và cực kỳ happy vì đã gặp được những con người Đà Nẵng thân thiện và khách sạn Kings finger hoàn toàn hoàn hảo theo ý muốn của mình.', 1);
INSERT INTO `customer_feedback` VALUES (2, 'JACK MASON', 'HAI PHONG', 'public/images/user-2.jpg', 'Mình vừa trải qua kỳ nghỉ 3 ngày 2 đêm tại Khách sạn Kings finger ở Đà Nẵng. Thực sự mình rất ấn tượng và cực kỳ happy vì đã gặp được những con người Đà Nẵng thân thiện và khách sạn Kings finger hoàn toàn hoàn hảo theo ý muốn của mình. hahahaha', 1);
INSERT INTO `customer_feedback` VALUES (4, 'JOHN FEDERICO', 'QUANG NINH', 'public/images/user-4.jpg', 'Mình vừa trải qua kỳ nghỉ 3 ngày 2 đêm tại Khách sạn Kings finger ở Đà Nẵng. Thực sự mình rất ấn tượng và cực kỳ happy vì đã gặp được những con người Đà Nẵng thân thiện và khách sạn Kings finger hoàn toàn hoàn hảo theo ý muốn của mình.', 1);
INSERT INTO `customer_feedback` VALUES (7, 'test tiny mce', 'Haiphong', 'public/images/5eb03b8d8ffeb-5e95bf66391e4-5e915d393689d-user-3.jpg', '<p>testing tiny</p>\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\"></div>', 1);

-- ----------------------------
-- Table structure for forgot_password
-- ----------------------------
DROP TABLE IF EXISTS `forgot_password`;
CREATE TABLE `forgot_password`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `expire_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forgot_password
-- ----------------------------
INSERT INTO `forgot_password` VALUES (29, 'ducdinh08239@gmail.com', 'd07d02f856', '2020-04-22 21:25:45');
INSERT INTO `forgot_password` VALUES (30, 'ducdinh08239@gmail.com', '4fa2957b48', '2020-04-24 18:52:33');
INSERT INTO `forgot_password` VALUES (31, 'ducdinh08239@gmail.com', '4b497923d4', '2020-04-25 16:14:16');
INSERT INTO `forgot_password` VALUES (32, 'ducdinh08239@gmail.com', 'c0cd64b1f5', '2020-05-02 15:57:42');

-- ----------------------------
-- Table structure for galleries
-- ----------------------------
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galleries
-- ----------------------------
INSERT INTO `galleries` VALUES (1, 'Swimming Pool', 'public/images/photo-services-6-1.jpg', 1);
INSERT INTO `galleries` VALUES (2, 'Sky Bar &amp; Lounge', 'public/images/photo-services-1-2.jpg', 1);
INSERT INTO `galleries` VALUES (3, 'Private Dining', 'public/images/photo-services-2-1.jpg', 1);
INSERT INTO `galleries` VALUES (4, 'Conference &amp; Events', 'public/images/photo-services-3-1.jpg', 1);
INSERT INTO `galleries` VALUES (5, 'Wedding Venue', 'public/images/photo-services-4-1.jpg', 1);
INSERT INTO `galleries` VALUES (6, 'Spa &amp; Beauty Center', 'public/images/photo-services-5-1.jpg', 1);
INSERT INTO `galleries` VALUES (9, NULL, 'public/images/5ea3f3136f7a2-5e9a4a782d687-5e986e9059ace-photo-gallery-1.jpg', 1);
INSERT INTO `galleries` VALUES (10, NULL, 'public/images/5ea3f31cda89e-5e9a47a34385f-5e97d8da09091-5e928c78c2c89-about.jpg', 1);
INSERT INTO `galleries` VALUES (12, NULL, 'public/images/5ea3f36452dc8-5e986e621af0e-5e97d98767054-5e928c1e8d619-photo-blog-big-1.jpg', 1);
INSERT INTO `galleries` VALUES (13, NULL, 'public/images/5ea3f37106c86-5ea3f1b06699f-5e980452ddfac-photo-blog-big-3.jpg', 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'thành viên', 1);
INSERT INTO `roles` VALUES (2, 'quản trị viên', 1);
INSERT INTO `roles` VALUES (3, 'superadmin', 0);

-- ----------------------------
-- Table structure for room_galleries
-- ----------------------------
DROP TABLE IF EXISTS `room_galleries`;
CREATE TABLE `room_galleries`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `room_gall_id`(`room_id`) USING BTREE,
  CONSTRAINT `room_gall_id` FOREIGN KEY (`room_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_galleries
-- ----------------------------
INSERT INTO `room_galleries` VALUES (1, 1, 'public/images/5e980452ddfac-photo-blog-big-3.jpg', 1);
INSERT INTO `room_galleries` VALUES (2, 1, 'public/images/photo-gallery-3.jpg', 1);
INSERT INTO `room_galleries` VALUES (3, 1, 'public/images/photo-gallery-4.jpg', 1);
INSERT INTO `room_galleries` VALUES (4, 2, 'public/images/photo-services-2-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (5, 2, 'public/images/photo-services-3-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (6, 1, 'public/images/photo-services-4-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (7, 1, 'public/images/photo-gallery-6.jpg', 1);
INSERT INTO `room_galleries` VALUES (8, 3, 'public/images/photo-gallery-6.jpg', 1);
INSERT INTO `room_galleries` VALUES (9, 3, 'public/images/photo-services-4-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (10, 4, 'public/images/photo-services-4-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (11, 5, 'public/images/photo-services-4-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (12, 4, 'public/images/photo-gallery-6.jpg', 1);
INSERT INTO `room_galleries` VALUES (13, 5, 'public/images/photo-gallery-6.jpg', 1);
INSERT INTO `room_galleries` VALUES (15, 18, 'public/images/5e986e57ec4d8-5e92db690ca41-photo-blog-big-2.jpg', 1);
INSERT INTO `room_galleries` VALUES (16, 17, 'public/images/5e986e621af0e-5e97d98767054-5e928c1e8d619-photo-blog-big-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (17, 2, 'public/images/5e986e7c8c662-5e983614e590c-5e97d8da09091-5e928c78c2c89-about.jpg', 1);
INSERT INTO `room_galleries` VALUES (18, 18, 'public/images/5e986e9059ace-photo-gallery-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (19, 17, 'public/images/5e98f7f9c9f7d-5e97d8da09091-5e928c78c2c89-about.jpg', 1);
INSERT INTO `room_galleries` VALUES (20, 18, 'public/images/5e98f81c4a0ef-5e97d98767054-5e928c1e8d619-photo-blog-big-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (21, 1, 'public/images/5ea3f0f710081-photo-room-detail-4.jpg', 1);
INSERT INTO `room_galleries` VALUES (22, 18, 'public/images/5ea3f12823a4a-5e9a47a34385f-5e97d8da09091-5e928c78c2c89-about.jpg', 1);
INSERT INTO `room_galleries` VALUES (23, 5, 'public/images/5ea3f13976028-5e92db690ca41-photo-blog-big-2.jpg', 1);
INSERT INTO `room_galleries` VALUES (24, 1, 'public/images/5ea3f1b06699f-5e980452ddfac-photo-blog-big-3.jpg', 1);
INSERT INTO `room_galleries` VALUES (25, 2, 'public/images/5ea3f1e970fac-5e9a4a782d687-5e986e9059ace-photo-gallery-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (26, 17, 'public/images/5ea3f3c4b25af-5e9c17f8b2032-5e9a4a782d687-5e986e9059ace-photo-gallery-1.jpg', 1);
INSERT INTO `room_galleries` VALUES (27, 17, 'public/images/5ea3f3d3749ff-5e92db690ca41-photo-blog-big-2.jpg', 1);
INSERT INTO `room_galleries` VALUES (28, 5, 'public/images/5ea3f3e825706-5ea3f0f710081-photo-room-detail-4.jpg', 1);

-- ----------------------------
-- Table structure for room_service_xref
-- ----------------------------
DROP TABLE IF EXISTS `room_service_xref`;
CREATE TABLE `room_service_xref`  (
  `room_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`, `service_id`) USING BTREE,
  INDEX `room_service_id`(`service_id`) USING BTREE,
  CONSTRAINT `room_room_id` FOREIGN KEY (`room_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_service_xref
-- ----------------------------
INSERT INTO `room_service_xref` VALUES (1, 1);
INSERT INTO `room_service_xref` VALUES (1, 2);
INSERT INTO `room_service_xref` VALUES (1, 3);
INSERT INTO `room_service_xref` VALUES (1, 4);
INSERT INTO `room_service_xref` VALUES (2, 1);
INSERT INTO `room_service_xref` VALUES (2, 4);
INSERT INTO `room_service_xref` VALUES (3, 2);
INSERT INTO `room_service_xref` VALUES (3, 3);
INSERT INTO `room_service_xref` VALUES (4, 1);
INSERT INTO `room_service_xref` VALUES (4, 3);
INSERT INTO `room_service_xref` VALUES (5, 1);
INSERT INTO `room_service_xref` VALUES (5, 2);
INSERT INTO `room_service_xref` VALUES (5, 3);
INSERT INTO `room_service_xref` VALUES (5, 4);
INSERT INTO `room_service_xref` VALUES (17, 1);
INSERT INTO `room_service_xref` VALUES (17, 2);
INSERT INTO `room_service_xref` VALUES (17, 3);
INSERT INTO `room_service_xref` VALUES (17, 4);
INSERT INTO `room_service_xref` VALUES (17, 5);
INSERT INTO `room_service_xref` VALUES (17, 6);
INSERT INTO `room_service_xref` VALUES (18, 1);
INSERT INTO `room_service_xref` VALUES (18, 2);
INSERT INTO `room_service_xref` VALUES (18, 3);
INSERT INTO `room_service_xref` VALUES (18, 4);
INSERT INTO `room_service_xref` VALUES (18, 5);
INSERT INTO `room_service_xref` VALUES (18, 6);

-- ----------------------------
-- Table structure for room_services
-- ----------------------------
DROP TABLE IF EXISTS `room_services`;
CREATE TABLE `room_services`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_services
-- ----------------------------
INSERT INTO `room_services` VALUES (1, 'WI-FI', 'public/images/wifi.jpg', 1);
INSERT INTO `room_services` VALUES (2, 'BREAKFAST', 'public/images/breakfast.jpg', 1);
INSERT INTO `room_services` VALUES (3, 'HAIR DRYER', 'public/images/dryer.jpg', 1);
INSERT INTO `room_services` VALUES (4, 'LCD TV', 'public/images/tv.jpg', 1);
INSERT INTO `room_services` VALUES (5, 'BICYCLE', 'public/images/bicycle.jpg', 1);
INSERT INTO `room_services` VALUES (6, 'BEER', 'public/images/beer.jpg', 1);

-- ----------------------------
-- Table structure for room_types
-- ----------------------------
DROP TABLE IF EXISTS `room_types`;
CREATE TABLE `room_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `short_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `price` int(11) NULL DEFAULT NULL,
  `adults` int(11) NULL DEFAULT NULL,
  `children` int(11) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_types
-- ----------------------------
INSERT INTO `room_types` VALUES (1, 'Single Room', 'public/images/photo-gallery-2.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 1000000, 1, 1, 1);
INSERT INTO `room_types` VALUES (2, 'Double Room', 'public/images/photo-gallery-3.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 2000000, 2, 1, 1);
INSERT INTO `room_types` VALUES (3, 'Deluxe Single Room', 'public/images/photo-gallery-4.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 2500000, 1, 1, 1);
INSERT INTO `room_types` VALUES (4, 'Deluxe Double Room', 'public/images/photo-gallery-6.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 5000000, 3, 1, 1);
INSERT INTO `room_types` VALUES (5, 'Royal Room', 'public/images/photo-gallery-9.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 7000000, 2, 2, 1);
INSERT INTO `room_types` VALUES (17, 'VIPS', 'public/images/5e983614e590c-5e97d8da09091-5e928c78c2c89-about.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 1000000, 5, 5, 1);
INSERT INTO `room_types` VALUES (18, 'SUPER', 'public/images/5e984d0f29d08-5e97d98767054-5e928c1e8d619-photo-blog-big-1.jpg', 'gadf', 'gádfgas', 10000000, 5, 5, 1);

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `short_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 'Sky Bar & Lounge', 'public/images/photo-services-1-2.jpg', 'Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 'Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 1);
INSERT INTO `services` VALUES (2, 'Private Dining', 'public/images/photo-services-2-1.jpg', 'Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 'Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 1);
INSERT INTO `services` VALUES (3, 'Conference & Events', 'public/images/photo-services-3-1.jpg', 'Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 'Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 1);
INSERT INTO `services` VALUES (4, 'Wedding Venue', 'public/images/photo-services-4-1.jpg', 'Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 'Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 1);
INSERT INTO `services` VALUES (5, 'Spa &amp; Beauty Center', 'public/images/photo-services-5-1.jpg', 'Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 'Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 1);
INSERT INTO `services` VALUES (6, 'Swimming Pool', 'public/images/photo-services-6-1.jpg', 'Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 'Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…Với những khách sạn tặng thêm dịch vụ Spa đi kèm với tiền phòng, sẽ khiến cho khách hàng ưu ái chọn dịch vụ của khách sạn nhiều hơn.Quầy bar thường là nơi khách hàng lui tới để thư giãn, trò chuyện và thưởng thức các loại rượu, cocktail…', 1);
INSERT INTO `services` VALUES (9, 'Travel', 'public/images/5ea3f4e171f71-5e92db690ca41-photo-blog-big-2.jpg', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 'Only a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet watersOnly a 45-minute drive from downtown Hanoi, Flamingo Dai Lai lies secluded where mountains meet waters', 1);

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intro_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of slides
-- ----------------------------
INSERT INTO `slides` VALUES (2, 'WELCOME TO THE GRANDIUM', 'A Place To Relax', 'in Madives', 'public/images/photo-blog-big-2.jpg\r\n', 1);
INSERT INTO `slides` VALUES (3, 'WELCOME TO THE GRANDIUM', 'Experience the Freedom', 'in London', 'public/images/photo-blog-big-1.jpg', 1);
INSERT INTO `slides` VALUES (4, 'WELCOME TO THE GRANDIUM', 'Time To Relax', 'in Grandium', 'public/images/photo-room-detail-1.jpg', 1);
INSERT INTO `slides` VALUES (5, 'WELCOME TO THE GRANDIUM', 'Touch The Sea 2', 'in Monaco 2', 'public/images/5e928c78c2c89-about.jpg', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_role`(`role_id`) USING BTREE,
  CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin@gmail.com', 'superadmin', '$2y$10$aov0JsRu8R41ECbePdnVNOsZL4UeXlGK/1SdwkSPege6Z/rTGwTcm', 'public/images/user-1.jpg', '123456', 3, 1);
INSERT INTO `users` VALUES (2, 'admin@gmail.com', 'admin', '$2y$10$aov0JsRu8R41ECbePdnVNOsZL4UeXlGK/1SdwkSPege6Z/rTGwTcm', 'public/images/user-2.jpg', '123456789', 2, 1);
INSERT INTO `users` VALUES (7, 'guest@gmail.com', 'Khách hàng', '$2y$10$tK6gg75qKjNJwXcrcaIEGeA1xH.z9yEAUPRmMHqqpDZGizkXz.mU6', 'public/images/5e915d09d9040-5e915cc625ef0-user-4.jpg', '0987456321', 1, 1);
INSERT INTO `users` VALUES (8, 'abc@gmail.com', 'ducdvvph09332', '$2y$10$9H5EUUnK4aXKLINfs3mZL.t6j6sSgdfKe9wvhohlg8U1lVZU21nca', 'public/images/5e915d393689d-user-3.jpg', '1111111111111', 2, 1);
INSERT INTO `users` VALUES (9, '123456@gmail.com', '123', '$2y$10$.XZeqMkmkQxJCkUydmlJlOX1N3Vs7VulszLhP1FmNqKyeEwy9w6VS', 'public/images/5e919f8b80b29-5e915d393689d-user-3.jpg', '0987456321', 1, 1);
INSERT INTO `users` VALUES (10, 'ducdvvph09332@fpt.edu.vn', 'Duc Dinh', '$2y$10$ei.ZFOYR0hCGRSGypGArWO.9rTV6EAzpk3w/uEs2AhsMDXwgG9NBq', NULL, '0987456321', 1, 1);
INSERT INTO `users` VALUES (11, 'abcd@gmail.com', 'Duc Dinh', '$2y$10$BaOFlt2Q/UFOqZSyeyrjtuh78.D10nimkHPue6vGWCXWomuc38hO.', NULL, '0987456321', 1, 1);
INSERT INTO `users` VALUES (12, 'ducdinh08239@gmail.com', 'Duc Dinh', '$2y$10$oOObMLuXyMTSZIjfGkDLa.XySEEEvQ4xXXBFpehoQdHfk6kfYkC4G', NULL, '0987456321', 2, 1);
INSERT INTO `users` VALUES (14, 'ducdinh0129@gmail.com', 'ddd', '$2y$10$rkx67RPPMEax3JNxbXd2gOevR7tWtq4CnEOlm8A7AS2rCPuTOE2Vy', NULL, '34673216648', 1, 1);

-- ----------------------------
-- Table structure for web_settings
-- ----------------------------
DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE `web_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `map_url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `facebook_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `twitter_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `instagram_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `googleplus_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `intro_about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `intro_service` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `intro_gallery` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `intro_blog` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `intro_testimonials` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of web_settings
-- ----------------------------
INSERT INTO `web_settings` VALUES (1, 'NORMAL', 'public/images/logo.png', '8001234567', 'FPT POLYTECHNIC HANOI, TÒA NHÀ FPT POLYTECHNIC, PHỐ TRỊNH VĂN BÔ, NAM TỪ LIÊM, HÀ NỘI, VIETNAM', 'GRANDIUM@GMAIL.COM', 'https://www.google.com/maps/place/FPT+Polytechnic+Hanoi/@21.0381278,105.7445984,17z/data=!3m1!4b1!4m5!3m4!1s0x313454b991d80fd5:0x53cefc99d6b0bf6f!8m2!3d21.0381278!4d105.7467871', 'https://www.facebook.com/', 'https://twitter.com/explore', 'https://www.instagram.com/', 'https://myaccount.google.com/', 'Hiện nay, bất kỳ một khách sạn cao cấp 4 – 5 sao nào, cũng có ít nhất 1 nhà hàng sang trọng, thậm chí có khách sạn có đến 2, 3 nhà hàng. Nhà hàng trong khách sạn có vai trò sẽ mang đến cho khách hàng những trải nghiệm phong cách ẩm thực của các quốc gia Âu, Á khác nhau, như: Hàn Quốc, Trung Quốc, Nhật Bản, Ý, Mexico…', 'Hiện nay, bất kỳ một khách sạn cao cấp 4 – 5 sao nào, cũng có ít nhất 1 nhà hàng sang trọng, thậm chí có khách sạn có đến 2, 3 nhà hàng. Nhà hàng trong khách sạn có vai trò sẽ mang đến cho khách hàng những trải nghiệm phong cách ẩm thực của các quốc gia Âu, Á khác nhau, như: Hàn Quốc, Trung Quốc, Nhật Bản, Ý, Mexico…', 'Hiện nay, bất kỳ một khách sạn cao cấp 4 – 5 sao nào, cũng có ít nhất 1 nhà hàng sang trọng, thậm chí có khách sạn có đến 2, 3 nhà hàng. Nhà hàng trong khách sạn có vai trò sẽ mang đến cho khách hàng những trải nghiệm phong cách ẩm thực của các quốc gia Âu, Á khác nhau, như: Hàn Quốc, Trung Quốc, Nhật Bản, Ý, Mexico…', 'Hiện nay, bất kỳ một khách sạn cao cấp 4 – 5 sao nào, cũng có ít nhất 1 nhà hàng sang trọng, thậm chí có khách sạn có đến 2, 3 nhà hàng. Nhà hàng trong khách sạn có vai trò sẽ mang đến cho khách hàng những trải nghiệm phong cách ẩm thực của các quốc gia Âu, Á khác nhau, như: Hàn Quốc, Trung Quốc, Nhật Bản, Ý, Mexico…', 'Hiện nay, bất kỳ một khách sạn cao cấp 4 – 5 sao nào, cũng có ít nhất 1 nhà hàng sang trọng, thậm chí có khách sạn có đến 2, 3 nhà hàng. Nhà hàng trong khách sạn có vai trò sẽ mang đến cho khách hàng những trải nghiệm phong cách ẩm thực của các quốc gia Âu, Á khác nhau, như: Hàn Quốc, Trung Quốc, Nhật Bản, Ý, Mexico…', 1);
INSERT INTO `web_settings` VALUES (3, 'WINTER', 'public/images/5e96895b47219-5e92db690ca41-photo-blog-big-2.jpg', '1231231233', 'Số nhà 35,  Ngõ 126 Nguyễn Đổng Chi', 'ducdinh08239@gmail.com', '123', '123', '123', '123', '123', 'aaaaaaaaaaaaa', 'bbbbbbbbbbbbbbb', 'ccccccccccccccccccccccccc', 'dddddddddddddddddddd', 'eeeeeeeeeeeeeeeeeeeeeee', 0);

SET FOREIGN_KEY_CHECKS = 1;
