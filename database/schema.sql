-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 11:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micms`
--

-- --------------------------------------------------------

--
-- Table structure for table `defaultpage`
--

CREATE TABLE `defaultpage` (
  `default_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `default_value` varchar(30) NOT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `defaultpage`
--

INSERT INTO `defaultpage` (`default_id`, `post_id`, `default_value`, `value`) VALUES
(1, 11, 'Home', 1),
(2, 38, 'Blog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exportsearchengine`
--

CREATE TABLE `exportsearchengine` (
  `id` int(11) NOT NULL,
  `cargotype` varchar(255) NOT NULL,
  `bookingstatus` varchar(255) NOT NULL,
  `cargostatus` varchar(255) NOT NULL,
  `commodity` varchar(255) NOT NULL,
  `pol` varchar(255) NOT NULL,
  `pod` varchar(255) NOT NULL,
  `requestform` varchar(255) NOT NULL,
  `shipper` varchar(255) NOT NULL,
  `forwarder` varchar(255) NOT NULL,
  `clearingagent` varchar(255) NOT NULL,
  `emptyfrom` varchar(255) NOT NULL,
  `total20` int(11) NOT NULL,
  `total40` int(11) NOT NULL,
  `totalrf` int(11) NOT NULL,
  `referremarks` text NOT NULL,
  `shippingline` varchar(255) NOT NULL,
  `status` enum('incomplete','complete') NOT NULL DEFAULT 'incomplete',
  `clientsid` int(11) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exportsearchengine`
--

INSERT INTO `exportsearchengine` (`id`, `cargotype`, `bookingstatus`, `cargostatus`, `commodity`, `pol`, `pod`, `requestform`, `shipper`, `forwarder`, `clearingagent`, `emptyfrom`, `total20`, `total40`, `totalrf`, `referremarks`, `shippingline`, `status`, `clientsid`, `dateadded`, `dateupdate`) VALUES
(1, 'Refer', 'Collect', 'Proident ut in maiores minima voluptas eum vero ad', 'Qui necessitatibus lorem libero adipisci aut magnam rerum dignissimos ratione omnis voluptatem beatae magnam sint esse', 'Libero nisi ullamco saepe et nostrum aut laudantium', 'Voluptatum dignissimos sint quia excepteur distinctio Beatae dolores enim ullam laborum amet anim alias consequatur laborum Duis', 'Self', 'Accusamus odit ipsum libero nihil', 'Dolorem est optio quis inventore deserunt veritatis elit mollitia est pariatur Veniam ullamco eos ipsum optio labore illo eius aliquam', '', 'Laboris autem magni beatae et quia pariatur Sit ea commodo alias quam non sapiente esse nemo qui', 0, 0, 0, 'Enim suscipit aut accusamus eveniet sequi id aute dolorem dicta sunt nostrud omnis facere corrupti', '2', 'complete', 14, '2018-01-05 11:27:16', NULL),
(2, 'Dry', 'Collect', 'Deserunt laudantium sint aut officia dolor aut alias molestiae', 'Qui soluta et tempore tempore sed veritatis nihil tempor occaecat ut', 'Sit commodi et vel dolorem ipsam est voluptate iure qui nemo in fugit sunt porro quia', 'Quis molestias perferendis repudiandae ad voluptatibus quae totam cupiditate incidunt consequatur Nulla est sint similique adipisci aperiam et necessitatibus', 'Shiper', 'Anim quo omnis impedit in aute consequatur est nisi iste error pariatur Veritatis sunt', 'Similique minim ut vel sint commodi similique autem', '', 'Sit veniam consequuntur facere ut sapiente commodi et voluptates deleniti optio', 0, 0, 0, 'Dolore explicabo Ut itaque aut laborum eos praesentium iste ut', '1', 'complete', 14, '2018-01-05 11:30:03', NULL),
(3, 'Refer', 'Prepaid', 'Mollitia aut sit modi odit', 'Ex vel aperiam voluptatem ex', 'Repellendus Est minim optio tempora', 'Et quia recusandae Ad et sit nostrud fugit aut et voluptas mollit debitis vel sit impedit', 'Self', 'Maxime voluptatem ea dolor minus fugit nobis aliquid ducimus do doloremque nihil ea aliquip et labore rerum ipsa in', 'Esse similique consequatur quas in culpa anim elit et et non atque earum facere labore minim molestias in laboriosam sed', '', 'Est dolorem amet deserunt cumque earum accusantium ut in enim ea velit nobis totam excepteur non ullam tempora provident odio', 0, 0, 0, 'Aut velit quo voluptas est illum rerum architecto animi expedita culpa et sunt consequuntur quod suscipit alias non', '1', 'complete', 13, '2018-01-19 04:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `attempts` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginattempts`
--

INSERT INTO `loginattempts` (`id`, `ip`, `attempts`, `username`, `last_login`) VALUES
(1, '::1', 1, 'idrees.cis', '2018-01-05 12:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `menu_label` varchar(255) NOT NULL,
  `menu_parent` int(11) NOT NULL DEFAULT '0',
  `menu_status` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `menu_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menu_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `post_id`, `menu_label`, `menu_parent`, `menu_status`, `userId`, `menu_created`, `menu_updated`) VALUES
(1, 11, 'Home', 0, 1, 1, '2018-01-12 11:21:02', NULL),
(2, 12, 'About Us', 0, 1, 1, '2018-01-12 14:18:13', NULL),
(3, 40, 'Services', 0, 1, 1, '2018-01-12 14:19:00', NULL),
(4, 41, 'Vessel Scheduler', 0, 1, 1, '2018-01-12 14:19:22', NULL),
(5, 39, 'Contact Us', 0, 1, 1, '2018-01-12 14:20:20', NULL),
(6, 41, 'Import', 4, 1, 1, '2018-01-12 14:23:22', NULL),
(7, 41, 'Export', 6, 1, 1, '2018-01-12 14:41:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(191) NOT NULL,
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'title', 'Orem', 'yes'),
(2, 'logo', 'CIShop-logo.png', 'yes'),
(3, 'favicon', 'Artboard_1.png', 'yes'),
(4, 'loginBackground', 'banner-12.jpg', 'yes'),
(5, 'address', '[{\"address\":\"124\\/6 Street, Country\",\"phone\":\"00 000 000 000\",\"fax\":\"00 000 000 000\",\"email\":\"admin@admin.com\"}]', 'yes'),
(6, 'googleAnalytics', '<script>\r\n          //Google Analytics Scriptfffffffffffffffffffffffssssfffffs\r\n       </script>', 'yes'),
(7, 'metaKeywords', 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea', 'yes'),
(8, 'metaDescription', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `postmeta`
--

CREATE TABLE `postmeta` (
  `meta_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `meta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postmeta`
--

INSERT INTO `postmeta` (`meta_id`, `post_id`, `meta_value`) VALUES
(1, 30, 'page-home.php'),
(2, 31, 'page-about.php'),
(8, 2, ''),
(9, 34, 'page-contact.php'),
(10, 12, 'default'),
(11, 38, 'default'),
(12, 39, 'page-contact.php'),
(13, 40, 'page-service.php'),
(14, 41, 'default'),
(15, 42, 'default'),
(16, 42, 'default'),
(17, 42, 'default'),
(18, 43, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_updated` datetime DEFAULT NULL,
  `post_type` varchar(50) NOT NULL,
  `menu_orders` tinyint(10) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='posts (type mention in posts or page website) or website_type: (mention in 3 difference  website )';

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `images`, `userId`, `created_at`, `created_updated`, `post_type`, `menu_orders`, `status`) VALUES
(1, 'Hello Worlds', 'hello-worlds', '<p>The quick brown fox jumped over the lazy dog.</p>', 'upload/0b17ff3c7ecb07ac8388e3027c487500.jpg', 1, '2017-09-23 12:20:39', '2017-09-30 02:42:06', 'posts', 0, '1'),
(11, 'Home', 'home', '<p>asasasasasasassasasas</p>', '', 1, '2017-09-25 04:56:21', NULL, 'pages', 0, '1'),
(12, 'About Us', 'about-us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'upload/5d59783606a05c856aee105eee5859f1.jpg', 1, '2017-09-25 05:00:03', '2017-12-11 15:12:46', 'pages', 0, '1'),
(33, 'PROVIDING FIRST CLASS <br> LOGISTIC SERVICES', 'providing-first-class-br-logistic-services', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"banner-text\">\r\n<div class=\"animated fadeInRight\">\r\n<h1>PROVIDING FIRST CLASS <br /> LOGISTIC SERVICES</h1>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>\r\n<div class=\"btn-banner\"><a class=\"btn solid-btn\" href=\"service.html\">our services</a> <a class=\"btn solid-btn\">get a quote</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'upload/61cea14bf9cba1bc9512b01a2c5cb1cc.jpg', 1, '2017-09-23 12:29:42', '2018-01-11 17:06:02', 'slider', 0, '1'),
(37, 'WORLD CLASS <br> SHIPPING SERVICES', 'world-class-br-shipping-services', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"banner-text f-w text-center w-color\">\r\n<div class=\"animated fadeInUp\">\r\n<h1 class=\"w-heading\">WORLD CLASS <br /> SHIPPING SERVICES</h1>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>\r\n<div class=\"btn-banner\"><a class=\"btn solid-btn\" href=\"service.html\">our services</a> <a class=\"btn trns-btn-w\">get a quote</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'upload/bbe6ced13b569a79c79b2467dfd2f935.jpg', 1, '2017-10-09 09:00:10', '2018-01-11 17:07:48', 'slider', 0, '1'),
(39, 'Contact Us', 'contact-us', '<p>[heading] Hello World[/heading]</p>', '', 1, '2017-12-11 11:13:20', '2018-01-15 15:30:40', 'pages', 0, '1'),
(40, 'Services', 'services', '', '', 1, '2017-12-11 12:17:19', NULL, 'pages', 0, '1'),
(41, 'Vessel Scheduler', 'vessel-scheduler', '', '', 1, '2017-12-18 04:37:43', NULL, 'pages', 0, '1'),
(42, '	Services', 'services-1', '', '', 1, '2018-01-23 10:05:13', NULL, 'pages', 0, '1'),
(43, '	Services', 'services-2', '', '', 1, '2018-01-23 10:05:31', NULL, 'pages', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `id` int(11) NOT NULL,
  `name` varchar(190) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password` varchar(32) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `status` enum('inactive','active') NOT NULL DEFAULT 'inactive',
  `hostname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user can register with verification by link';

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`id`, `name`, `email`, `password`, `contact`, `username`, `hash`, `status`, `hostname`, `created_at`, `updated_at`) VALUES
(10, 'Mubashir', 'mubashir.cis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3322398589', 'mubashir.cis', 'f64eac11f2cd8f0efa196f8ad173178e', 'inactive', '', '2017-12-29 04:17:46', NULL),
(11, 'Haris', 'cis.harisali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456789', 'haris.cis', '93db85ed909c13838ff95ccfa94cebd9', 'active', '', '2017-12-29 04:31:42', NULL),
(13, 'Muhammad Idrees', 'midrees.cis@gmail.com', '25f9e794323b453885f5181f1b624d0b', '03242340583', 'midrees.cis', '8b16ebc056e613024c057be590b542eb', 'active', 'CIS-PC', '2017-12-29 07:13:48', NULL),
(14, 'Muhammad Idrees', 'idrees@cloud-innovator.com', '25f9e794323b453885f5181f1b624d0b', '03242340583', 'idrees.cis', '0efe32849d230d7f53049ddc4a4b0c60', 'active', 'CIS-PC', '2017-12-29 07:15:24', NULL),
(15, 'Muhammad Salman', 'salmanm.cis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', 'salman.cis', '821fa74b50ba3f7cba1e6c53e8fa6845', 'inactive', 'CIS-PC', '2017-12-29 07:43:47', NULL),
(16, 'test ', 'saqibshaikh.cis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1244123123123123', 'saqibshaikh', 'd1c38a09acc34845c6be3a127a5aacaf', 'active', 'CIS-PC', '2017-12-29 07:48:44', NULL),
(17, 'waqas', 'waqasahmed.cis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '34567890', 'waqas', 'e6cb2a3c14431b55aa50c06529eaa21b', 'active', 'CIS-PC', '2017-12-29 07:53:08', NULL),
(18, 'zxzxz', 'zxzxzx@asa.com', 'ddcf4466a7ee29215b8595e30b8bfbe4', 'zxzx', 'zxzx', 'e555ebe0ce426f7f9b2bef0706315e0c', 'inactive', 'CIS-PC', '2018-01-05 06:12:04', NULL),
(19, 'Dane Copeland', 'dygizuvuko@hotmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '+834-62-6778103', 'farijyqyv', '5807a685d1a9ab3b599035bc566ce2b9', 'inactive', 'CIS-PC', '2018-01-19 11:31:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rows`
--

CREATE TABLE `rows` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `col1` varchar(255) NOT NULL,
  `col2` varchar(255) NOT NULL,
  `heading_id` int(11) NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` datetime DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rows`
--

INSERT INTO `rows` (`id`, `name`, `status`, `col1`, `col2`, `heading_id`, `sort`, `dateAdded`, `dateUpdate`, `user`) VALUES
(1, 'CY DELEIVERY T H ', 1, '20\"', '40\"', 1, 0, '2017-12-27 15:24:38', NULL, 1),
(2, 'CY DELEIVERY T H C ', 1, '20\"', '40\"', 2, 0, '2017-12-27 16:09:42', NULL, 1),
(3, 'CY REFFER T H ', 1, '20\"', '40\"', 3, 0, '2017-12-27 16:11:51', NULL, 1),
(4, 'assasas', 1, '1212', 'asasas', 1, 0, '2018-01-11 11:55:03', '2018-01-11 15:44:49', 1),
(5, 'asasas', 1, 'asa', 'asass', 4, 0, '2018-01-11 14:35:30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Photo` text NOT NULL,
  `DateModified` datetime NOT NULL,
  `PerformedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `Name`, `Photo`, `DateModified`, `PerformedBy`) VALUES
(1, 'Riazeda', '1.png', '2017-12-18 09:30:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `EmailAddress` text NOT NULL,
  `Password` char(32) NOT NULL,
  `Role` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Photo` text NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  `PerformedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `EmailAddress`, `Password`, `Role`, `Status`, `Photo`, `DateAdded`, `DateModified`, `PerformedBy`) VALUES
(1, 'Demo', 'Demo', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1, 1, '1.png', '2015-08-29 10:50:00', '2017-12-18 09:31:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defaultpage`
--
ALTER TABLE `defaultpage`
  ADD PRIMARY KEY (`default_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `exportsearchengine`
--
ALTER TABLE `exportsearchengine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `postmeta`
--
ALTER TABLE `postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rows`
--
ALTER TABLE `rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defaultpage`
--
ALTER TABLE `defaultpage`
  MODIFY `default_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exportsearchengine`
--
ALTER TABLE `exportsearchengine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postmeta`
--
ALTER TABLE `postmeta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rows`
--
ALTER TABLE `rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
