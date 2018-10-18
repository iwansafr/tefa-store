SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `module` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=content,2=product',
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unread, 1=read',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'site', '{\"title\":\"TEFA WISKAR\",\"link\":\"http:\\/\\/localhost\\/tefa-store\",\"image\":\"image_TEFA_WISKAR_1538783921.png\",\"keyword\":\"\",\"description\":\"\"}'),
(2, 'logo', '{\"title\":\"TEFA WISKAR\",\"image\":\"image_TEFA_WISKAR_1538756082.png\",\"width\":\"25\",\"height\":\"75\"}'),
(3, 'contact', '{\"title\":\"esoftgreat\",\"description\":\"website development\",\"phone\":\"085640510460\",\"email\":\"iwansafr@gmail.com\",\"google\":\"http:\\/\\/plus.google.com\\/esoftgreat\",\"facebook\":\"http:\\/\\/facebook.com\\/esoftgreat\",\"twitter\":\"http:\\/\\/twitter.com\\/esoftgreat\"}'),
(4, 'js_extra', '{\"code\":\"\"}'),
(5, 'templates', '{\"templates\":\"super_market\",\"admin_templates\":\"admin-lte\"}'),
(6, 'header', '{\"image\":\"\",\"title\":\"TEACHING FACTORY\",\"description\":\"SMK NEGERI 1 BANGSRI\"}'),
(7, 'header_bottom', '{\"image\":\"\",\"title\":\"TEACHING FACTORY\",\"description\":\"SMK NEGERI 1 BANGSRI\"}'),
(8, 'public_widget', '{\"template\":\"public\",\"menu_top\":\"menu_1\",\"menu_sosmed\":\"menu_1\",\"logo\":\"cat_1\",\"menu_left\":\"menu_1\",\"menu_right\":\"menu_1\",\"news\":\"cat_1\",\"content_top\":\"cat_0\",\"content_middle\":\"cat_0\",\"content_bottom\":\"cat_1\",\"right_1\":\"cat_1\",\"right_2\":\"cat_1\",\"right_3\":\"cat_1\",\"right_4\":\"cat_1\",\"menu_bottom_1\":\"menu_1\",\"menu_bottom_2\":\"menu_1\",\"menu_bottom_3\":\"menu_1\",\"menu_bottom_4\":\"menu_1\",\"menu_sosmed_footer\":\"menu_2\"}'),
(9, 'land_page_widget', '{\"template\":\"land_page\",\"menu_top\":{\"content\":\"menu_2\"},\"menu_header\":{\"content\":\"0\"},\"content\":{\"content\":\"cat_3\",\"limit\":\"2\"},\"content_bottom\":{\"content\":\"cat_3\",\"limit\":\"7\"},\"menu_bottom\":{\"content\":\"0\"},\"menu_footer\":{\"content\":\"menu_2\"}}'),
(10, 'alert', '{\"login_failed\":\"Make Sure That Your Username and Password is Correct\",\"login_max_failed\":\"You have failed login 3 time. please wait 30 minute later and login again\",\"save_success\":\"\"}'),
(11, 'admin-lte_config', '{\"site_title\":\"\",\"site_link\":\"\",\"site_image\":\"\",\"site_keyword\":\"\",\"site_description\":\"\",\"logo_title\":\"\",\"logo_image\":\"\",\"logo_width\":\"200\",\"logo_height\":\"50\"}'),
(12, 'content_config', '{\"author_detail\":\"1\",\"tag_detail\":\"1\",\"comment_detail\":\"1\",\"created_detail\":\"1\",\"author_list\":\"1\",\"tag_list\":\"1\",\"limit_list\":\"2\",\"created_list\":\"1\"}'),
(13, 'super_market_widget', '{\"template\":\"super_market\",\"menu_user\":{\"content\":\"menu_3\"},\"menu_top\":{\"content\":\"menu_2\"},\"slider\":{\"content\":\"cat_4\",\"limit\":\"3\"},\"product_top_offer_1\":{\"content\":\"prodcat_2\",\"limit\":\"7\"},\"product_top_offer_2\":{\"content\":\"prodcat_4\",\"limit\":\"7\"},\"product_top_offer_3\":{\"content\":\"prodcat_4\",\"limit\":\"7\"},\"product_banner_top\":{\"content\":\"prodcat_38\",\"limit\":\"3\"},\"banner_bottom\":{\"content\":\"cat_0\",\"limit\":\"7\"},\"brands\":{\"content\":\"0\",\"limit\":\"7\"},\"product_new_offers\":{\"content\":\"prodcat_38\",\"limit\":\"7\"},\"menu_bottom_1\":{\"content\":\"0\"},\"menu_bottom_2\":{\"content\":\"0\"},\"menu_bottom_3\":{\"content\":\"0\"}}'),
(14, 'super_market_config', '{\"site_title\":\"tefa store\",\"site_link\":\"http:\\/\\/localhost\\/tefa-store\",\"site_image\":\"site_image_tefa_store_1538805732.png\",\"site_keyword\":\"\",\"site_description\":\"\",\"logo_title\":\"tefa store\",\"logo_image\":\"logo_image_image_1538784489.png\",\"logo_width\":\"\",\"logo_height\":\"\"}'),
(15, 'web_type', '{\"type\":\"1\"}');

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `cat_ids` mediumtext NOT NULL,
  `tag_ids` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL,
  `last_hits` datetime NOT NULL,
  `rating` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publish` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `content` (`id`, `cat_ids`, `tag_ids`, `title`, `slug`, `description`, `keyword`, `intro`, `content`, `image`, `icon`, `image_link`, `images`, `author`, `hits`, `last_hits`, `rating`, `params`, `created`, `updated`, `publish`) VALUES
(3, ',3,', '', 'Hello World', 'hello-world', '<p>Hello World !!!!</p>\r\n', 'Hello World', '<p>Hello World !!!!</p>\r\n', '<p>Hello World !!!!</p>\r\n', '', '', '', '', 'admin', 0, '0000-00-00 00:00:00', '', '', '2018-09-17 19:49:52', '2018-09-17 19:49:52', 1),
(4, ',4,', '', 'WHOLE SPICES PRODUCTS ARE NOW ON LINE WITH US', 'whole-spices-products-are-now-on-line-with-us', '', 'WHOLE SPICES PRODUCTS ARE NOW ON LINE WITH US', '', '', 'image_WHOLE_SPICES_PRODUCTS_ARE_NOW_ON_LINE_WITH_US_1538921575.jpg', '', '', '', 'admin', 0, '0000-00-00 00:00:00', '', '', '2018-10-07 21:10:45', '2018-10-07 21:12:55', 1),
(5, ',4,', '', 'BUY RICE PRODUCTS ARE NOW ON LINE WITH US', 'buy-rice-products-are-now-on-line-with-us', '', 'BUY RICE PRODUCTS ARE NOW ON LINE WITH US', '', '', 'image_BUY_RICE_PRODUCTS_ARE_NOW_ON_LINE_WITH_US_1538921594.jpg', '', '', '', 'admin', 0, '0000-00-00 00:00:00', '', '', '2018-10-07 21:11:53', '2018-10-07 21:13:14', 1);

DROP TABLE IF EXISTS `content_cat`;
CREATE TABLE `content_cat` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `content_cat` (`id`, `par_id`, `title`, `slug`, `image`, `icon`, `description`, `publish`, `created`, `updated`) VALUES
(3, 0, 'Uncategorized', 'uncategorized', '', '', '', 1, '2018-09-17 19:49:30', '2018-09-17 19:49:30'),
(4, 0, 'Slider', 'slider', '', '', '', 1, '2018-10-07 21:10:34', '2018-10-07 21:10:34');

DROP TABLE IF EXISTS `content_tag`;
CREATE TABLE `content_tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `content_tag` (`id`, `title`, `created`) VALUES
(1, 'perabot', '2018-10-06 22:30:51'),
(2, 'rumah', '2018-10-06 22:30:51'),
(3, 'tangga', '2018-10-06 22:30:51'),
(4, 'perabotan', '2018-10-06 22:30:51');

DROP TABLE IF EXISTS `expedision`;
CREATE TABLE `expedision` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `expedision` (`id`, `par_id`, `title`, `slug`, `image`, `description`, `publish`, `created`, `updated`) VALUES
(2, 0, 'JNE', 'jne', '', '', 1, '2018-10-06 19:43:15', '2018-10-06 19:43:15'),
(3, 0, 'JNT', 'jnt', '', '', 1, '2018-10-07 18:51:16', '2018-10-07 18:51:16'),
(4, 0, 'POS KILAT', 'pos-kilat', '', '', 1, '2018-10-07 18:51:25', '2018-10-07 18:51:25');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL DEFAULT '0',
  `position_id` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` mediumtext NOT NULL,
  `is_local` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=local link, 0 = external link',
  `publish` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`id`, `par_id`, `position_id`, `sort_order`, `title`, `link`, `is_local`, `publish`) VALUES
(7, 0, 3, 1, 'Create Account', '', 0, 1),
(8, 0, 3, 2, 'Login', '', 0, 1),
(9, 0, 3, 3, 'Help', '', 0, 1),
(10, 0, 2, 0, 'Groceries', 'cat/groceries.html', 1, 1),
(11, 10, 2, 0, 'Dals pulses', 'cat/dals-pulses.html', 1, 1),
(12, 10, 2, 0, 'Almonds', 'cat/almonds.html', 1, 1),
(13, 10, 2, 0, 'Cashews', 'cat/cashews.html', 1, 1),
(14, 10, 2, 0, 'Rice rice products', 'cat/rice-rice-products.html', 1, 1),
(15, 10, 2, 0, 'Mukhwas', 'cat/mukhwas.html', 1, 1),
(16, 10, 2, 0, 'Dry fruit', 'cat/dry-fruit.html', 1, 1),
(17, 0, 2, 0, 'Household', 'cat/household.html', 1, 1),
(18, 17, 2, 0, 'Kitchenware', 'cat/kitchenware.html', 1, 1),
(19, 17, 2, 0, 'Mops', 'cat/mops.html', 1, 1),
(20, 17, 2, 0, 'Dust cloth', 'cat/dust-cloth.html', 1, 1),
(21, 17, 2, 0, 'Scrubbers', 'cat/scrubbers.html', 1, 1),
(22, 17, 2, 0, 'Dust pans', 'cat/dust-pans.html', 1, 1),
(23, 17, 2, 0, 'Cookware', 'cat/cookware.html', 1, 1),
(24, 0, 2, 0, 'Personal care', 'cat/personal-care.html', 1, 1),
(25, 24, 2, 0, 'Baby soap', 'cat/baby-soap.html', 1, 1),
(26, 24, 2, 0, 'Baby care accessories', 'cat/baby-care-accessories.html', 1, 1),
(27, 24, 2, 0, 'Baby oil shampoos', 'cat/baby-oil-shampoos.html', 1, 1),
(28, 24, 2, 0, 'Baby creams lotion', 'cat/baby-creams-lotion.html', 1, 1),
(29, 24, 2, 0, 'Baby powder', 'cat/baby-powder.html', 1, 1),
(30, 24, 2, 0, 'Diapers wipes', 'cat/diapers-wipes.html', 1, 1),
(31, 0, 2, 0, 'Packaged foods', 'cat/packaged-foods.html', 1, 1),
(32, 31, 2, 0, 'Baby food', 'cat/baby-food.html', 1, 1),
(33, 31, 2, 0, 'Dessert items', 'cat/dessert-items.html', 1, 1),
(34, 31, 2, 0, 'Biscuits', 'cat/biscuits.html', 1, 1),
(35, 31, 2, 0, 'Breakfast cereals', 'cat/breakfast-cereals.html', 1, 1),
(36, 31, 2, 0, 'Canned food', 'cat/canned-food.html', 1, 1),
(37, 31, 2, 0, 'Chocolates sweets', 'cat/chocolates-sweets.html', 1, 1),
(38, 0, 2, 0, 'Beverages', 'cat/beverages.html', 1, 1),
(39, 38, 2, 0, 'Green tea', 'cat/green-tea.html', 1, 1),
(40, 38, 2, 0, 'Ground coffee', 'cat/ground-coffee.html', 1, 1),
(41, 38, 2, 0, 'Herbal tea', 'cat/herbal-tea.html', 1, 1),
(42, 38, 2, 0, 'Instant coffee', 'cat/instant-coffee.html', 1, 1),
(43, 38, 2, 0, 'Tea', 'cat/tea.html', 1, 1),
(44, 38, 2, 0, 'Tea bags', 'cat/tea-bags.html', 1, 1),
(45, 0, 2, 0, 'Gourmet', 'cat/gourmet.html', 1, 1),
(46, 0, 2, 0, 'Offers', 'cat/offers.html', 1, 1),
(47, 0, 2, 1, 'Contact', '', 0, 1);

DROP TABLE IF EXISTS `menu_position`;
CREATE TABLE `menu_position` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu_position` (`id`, `title`) VALUES
(2, 'Top Menu'),
(3, 'Menu User');

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_ids` text NOT NULL,
  `tag_ids` text NOT NULL,
  `expedision_ids` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL COMMENT 'in gram',
  `discount` double NOT NULL,
  `stock` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = not publish, 1 = publish',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `product` (`id`, `cat_ids`, `tag_ids`, `expedision_ids`, `image`, `image_link`, `images`, `title`, `slug`, `description`, `price`, `weight`, `discount`, `stock`, `publish`, `created`, `updated`) VALUES
(1, ',1,2,3,4,5,6,7,8,14,15,16,17,18,19,9,20,21,22,23,24,25,10,26,27,28,29,30,31,11,32,33,34,35,36,37,12,', '', ',2,3,4,', 'image_image_1538839851.png', '', '[\"image_0_1538839851.png\",\"image_1_1538839851.png\",\"image_2_1538839851.png\",\"image_3_1538839851.png\"]', 'Perabot Rumah Tangga', 'perabot-rumah-tangga', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 120000, 5000, 0, 20, 1, '2018-10-06 22:30:51', '2018-10-15 11:41:07'),
(2, ',1,2,3,4,5,6,7,8,14,15,16,17,18,19,9,20,21,22,23,24,25,10,26,27,28,29,30,31,11,32,33,34,35,36,37,12,', '', ',2,3,4,', 'image_image_1539140589.png', '', '', 'Teflon', 'teflon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120000, 1000, 0, 56, 1, '2018-10-10 10:03:09', '2018-10-15 11:40:57'),
(3, ',1,2,3,4,5,6,7,8,14,15,16,17,18,19,9,20,21,22,23,24,25,10,26,27,28,29,30,31,11,32,33,34,35,36,37,12,', '', ',2,3,4,', 'image_image_1539140638.png', '', '', 'house hold 8', 'house-hold-8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 90000, 1000, 0, 45, 1, '2018-10-10 10:03:58', '2018-10-15 11:40:48'),
(4, ',1,2,3,4,5,6,7,8,14,15,16,17,18,19,9,20,21,22,23,24,25,10,26,27,28,29,30,31,11,32,33,34,35,36,37,12,', '', ',2,3,4,', 'image_image_1539140679.png', '', '[\"image_0_1539147710.png\",\"image_1_1539147710.png\",\"image_2_1539147710.png\",\"image_3_1539147710.png\"]', 'House Hold 6', 'house-hold-6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 240000, 1000, 1, 78, 1, '2018-10-10 10:04:39', '2018-10-15 11:40:39'),
(5, ',38,', '', ',2,3,4,', 'image_image_1539577708.jpg', '', '', 'Beverages', 'beverages', '', 120000, 1000, 0, 23, 1, '2018-10-15 11:28:28', '2018-10-15 11:28:28');

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE `product_cat` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product_cat` (`id`, `par_id`, `title`, `slug`, `image`, `description`, `publish`, `created`, `updated`) VALUES
(1, 0, 'Groceries', 'groceries', '', '', 1, '2018-10-06 18:57:37', '2018-10-06 18:57:37'),
(2, 1, 'Dals & Pulses', 'dals-pulses', '', '', 1, '2018-10-07 18:57:01', '2018-10-07 18:57:01'),
(3, 1, 'Almonds', 'almonds', '', '', 1, '2018-10-07 18:57:10', '2018-10-07 18:57:10'),
(4, 1, 'Cashews', 'cashews', '', '', 1, '2018-10-07 18:57:17', '2018-10-07 18:57:17'),
(5, 1, 'Dry Fruit', 'dry-fruit', '', '', 1, '2018-10-07 18:57:24', '2018-10-07 18:57:24'),
(6, 1, 'Mukhwas', 'mukhwas', '', '', 1, '2018-10-07 18:57:31', '2018-10-07 18:57:31'),
(7, 1, 'Rice & Rice Products', 'rice-rice-products', '', '', 1, '2018-10-07 18:57:41', '2018-10-07 18:57:41'),
(8, 0, 'Household', 'household', '', '', 1, '2018-10-07 18:58:31', '2018-10-07 18:58:31'),
(9, 0, 'Personal Care', 'personal-care', '', '', 1, '2018-10-07 18:58:39', '2018-10-07 18:58:39'),
(10, 0, 'Packaged Foods', 'packaged-foods', '', '', 1, '2018-10-07 18:58:47', '2018-10-07 18:58:47'),
(11, 0, 'Beverages', 'beverages', '', '', 1, '2018-10-07 18:58:59', '2018-10-07 18:58:59'),
(12, 0, 'Gourmet', 'gourmet', '', '', 1, '2018-10-07 18:59:08', '2018-10-07 18:59:08'),
(13, 0, 'Offers', 'offers', '', '', 1, '2018-10-07 18:59:17', '2018-10-07 18:59:17'),
(14, 8, 'Cookware', 'cookware', '', '', 1, '2018-10-07 18:59:49', '2018-10-07 18:59:49'),
(15, 8, 'Dust Pans', 'dust-pans', '', '', 1, '2018-10-07 18:59:56', '2018-10-07 18:59:56'),
(16, 8, 'Scrubbers', 'scrubbers', '', '', 1, '2018-10-07 19:00:02', '2018-10-07 19:00:02'),
(17, 8, 'Dust Cloth', 'dust-cloth', '', '', 1, '2018-10-07 19:00:09', '2018-10-07 19:00:09'),
(18, 8, 'Mops', 'mops', '', '', 1, '2018-10-07 19:00:16', '2018-10-07 19:00:16'),
(19, 8, 'Kitchenware', 'kitchenware', '', '', 1, '2018-10-07 19:00:23', '2018-10-07 19:00:23'),
(20, 9, 'Baby Soap', 'baby-soap', '', '', 1, '2018-10-07 19:00:46', '2018-10-07 19:00:46'),
(21, 9, 'Baby Care Accessories', 'baby-care-accessories', '', '', 1, '2018-10-07 19:01:00', '2018-10-07 19:01:00'),
(22, 9, 'Baby Oil & Shampoos', 'baby-oil-shampoos', '', '', 1, '2018-10-07 19:01:19', '2018-10-07 19:01:19'),
(23, 9, 'Baby Creams & Lotion', 'baby-creams-lotion', '', '', 1, '2018-10-07 19:01:37', '2018-10-07 19:01:37'),
(24, 9, 'Baby Powder', 'baby-powder', '', '', 1, '2018-10-07 19:01:43', '2018-10-07 19:01:43'),
(25, 9, 'Diapers & Wipes', 'diapers-wipes', '', '', 1, '2018-10-07 19:01:49', '2018-10-07 19:01:49'),
(26, 10, 'Baby Food', 'baby-food', '', '', 1, '2018-10-07 19:02:14', '2018-10-07 19:02:14'),
(27, 10, 'Dessert Items', 'dessert-items', '', '', 1, '2018-10-07 19:02:27', '2018-10-07 19:02:27'),
(28, 10, 'Biscuits', 'biscuits', '', '', 1, '2018-10-07 19:02:35', '2018-10-07 19:02:35'),
(29, 10, 'Breakfast Cereals', 'breakfast-cereals', '', '', 1, '2018-10-07 19:02:43', '2018-10-07 19:02:43'),
(30, 10, 'Canned Food', 'canned-food', '', '', 1, '2018-10-07 19:02:55', '2018-10-07 19:02:55'),
(31, 10, 'Chocolates & Sweets', 'chocolates-sweets', '', '', 1, '2018-10-07 19:03:18', '2018-10-07 19:03:18'),
(32, 11, 'Green Tea', 'green-tea', '', '', 1, '2018-10-07 19:05:08', '2018-10-07 19:05:08'),
(33, 11, 'Ground Coffee', 'ground-coffee', '', '', 1, '2018-10-07 19:05:22', '2018-10-07 19:05:22'),
(34, 11, 'Herbal Tea', 'herbal-tea', '', '', 1, '2018-10-07 19:05:29', '2018-10-07 19:05:29'),
(35, 11, 'Instant Coffee', 'instant-coffee', '', '', 1, '2018-10-07 19:05:40', '2018-10-07 19:05:40'),
(36, 11, 'Tea', 'tea', '', '', 1, '2018-10-07 19:05:46', '2018-10-07 19:05:46'),
(37, 11, 'Tea Bags', 'tea-bags', '', '', 1, '2018-10-07 19:05:59', '2018-10-07 19:05:59'),
(38, 0, 'Promotion', 'promotion', '', '', 1, '2018-10-15 11:10:23', '2018-10-15 11:10:23');

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '5' COMMENT '1=admin, 2=editor, 3=author, 4=contributor, 5=subscriber',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = not active',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `password`, `email`, `image`, `role`, `active`, `created`, `updated`) VALUES
(63, 'admin', '$2y$10$jsvQQvo1zTFSBf9g78JFvePcNmhGsb43PKElswODTA3ZO2vUI8Igi', 'admin@esoftgreat.com', '', 1, 1, '2018-09-17 18:39:21', '2018-09-17 18:39:21');

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=failed, 1=success',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_login` (`id`, `user_id`, `ip`, `status`, `created`) VALUES
(67, 0, '::1', 0, '2018-09-17 18:38:41'),
(68, 63, '::1', 1, '2018-09-17 18:39:28'),
(69, 63, '::1', 1, '2018-09-20 12:29:36'),
(70, 63, '::1', 1, '2018-10-02 07:36:31'),
(71, 63, '::1', 1, '2018-10-05 14:41:48'),
(72, 63, '::1', 1, '2018-10-05 17:28:11'),
(73, 63, '::1', 1, '2018-10-06 06:22:46'),
(74, 63, '::1', 1, '2018-10-06 13:00:02'),
(75, 63, '::1', 1, '2018-10-06 18:46:14'),
(76, 63, '::1', 1, '2018-10-07 18:37:49'),
(77, 63, '::1', 1, '2018-10-10 09:30:55'),
(78, 63, '::1', 1, '2018-10-10 22:07:58'),
(79, 63, '::1', 1, '2018-10-12 06:30:16'),
(80, 63, '::1', 1, '2018-10-12 06:39:40'),
(81, 63, '127.0.0.1', 1, '2018-10-12 08:17:57'),
(82, 63, '127.0.0.1', 1, '2018-10-15 10:51:47'),
(83, 63, '127.0.0.1', 1, '2018-10-15 14:22:31'),
(84, 63, '::1', 1, '2018-10-15 21:58:10'),
(85, 63, '127.0.0.1', 1, '2018-10-16 18:42:59'),
(86, 63, '::1', 1, '2018-10-17 06:20:22'),
(87, 63, '::1', 1, '2018-10-18 21:06:23');

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `visited` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `content_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `content_tag`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `expedision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu_position`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `content_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `content_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `expedision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
ALTER TABLE `menu_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
ALTER TABLE `product_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
