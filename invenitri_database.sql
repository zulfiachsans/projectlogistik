-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 02:03 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invenitri_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `invenitri_session`
--

CREATE TABLE `invenitri_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invenitri_session`
--

INSERT INTO `invenitri_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7nm2jcae93mbpdiq9l3f09ibfrgm7486', '::1', 1595816775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353831363736303b),
('qvhab4fhon516tuoq47303knlt0u9rbb', '::1', 1595996358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353939363335373b),
('t2vva7k3e1jjlnot9sbi9a78ohq183tn', '::1', 1596004126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539363030333837313b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353935383136303230223b6c6173745f636865636b7c693a313539363030333838393b6d6573736167657c733a3134363a223c64697620636c6173733d22616c65727420616c6572742d696e666f223e3c627574746f6e20747970653d22627574746f6e2220636c6173733d22636c6f73652220646174612d6469736d6973733d22616c6572742220617269612d68696464656e3d2274727565223e2674696d65733b3c2f627574746f6e3e496e76656e746f72792044656c65746564213c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('rja1kddmmambrt82tiq4p0une94445lt', '::1', 1595815813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353831353831333b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353935363635353130223b6c6173745f636865636b7c693a313539353831353534323b637372666b65797c733a383a224449516141576675223b5f5f63695f766172737c613a323a7b733a373a22637372666b6579223b733a333a226e6577223b733a393a226373726676616c7565223b733a333a226e6577223b7d6373726676616c75657c733a32303a224a6579507073565a387849644163584f46616957223b),
('0njj5i03r4ddmeu0djdllerjhphv7gm3', '::1', 1595816328, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353831363332383b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353935383135383433223b6c6173745f636865636b7c693a313539353831363032303b6d6573736167657c733a3135323a223c64697620636c6173733d22616c65727420616c6572742d696e666f223e3c627574746f6e20747970653d22627574746f6e2220636c6173733d22636c6f73652220646174612d6469736d6973733d22616c6572742220617269612d68696464656e3d2274727565223e2674696d65733b3c2f627574746f6e3e44617461205361766564205375636365737366756c6c79213c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `inv_categories`
--

CREATE TABLE `inv_categories` (
  `id` int(12) UNSIGNED NOT NULL,
  `code` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = deleted',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_categories`
--

INSERT INTO `inv_categories` (`id`, `code`, `name`, `description`, `deleted`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '1', 'peminjaman', '<p>barang di pinjam<br></p>', 0, 'administrator', '2020-07-27 09:07:43', 'administrator', '2020-07-27 09:07:43'),
(2, '2', 'Sewa', '<p>Barang sewaaan<br></p>', 0, 'zulfiachsans', '2020-07-27 09:11:27', 'zulfiachsans', '2020-07-27 09:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `inv_datas`
--

CREATE TABLE `inv_datas` (
  `id` int(12) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `category_id` int(12) NOT NULL COMMENT 'FK inv_category',
  `location_id` int(12) DEFAULT NULL COMMENT 'FK inv_location',
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `status` int(12) DEFAULT NULL COMMENT 'FK master_status',
  `length` int(12) DEFAULT NULL COMMENT 'Panjang',
  `width` int(12) DEFAULT NULL COMMENT 'Lebar',
  `height` int(12) DEFAULT NULL COMMENT 'Tinggi',
  `weight` int(12) DEFAULT NULL COMMENT 'Berat',
  `color` varchar(20) DEFAULT NULL COMMENT 'Warna',
  `price` int(12) DEFAULT NULL COMMENT 'Harga Beli',
  `date_of_purchase` date DEFAULT NULL COMMENT 'Tgl Beli',
  `photo` text COMMENT 'Foto',
  `thumbnail` text COMMENT 'Thumb',
  `description` text COMMENT 'Keterangan',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_datas`
--

INSERT INTO `inv_datas` (`id`, `code`, `category_id`, `location_id`, `brand`, `model`, `serial_number`, `status`, `length`, `width`, `height`, `weight`, `color`, `price`, `date_of_purchase`, `photo`, `thumbnail`, `description`, `deleted`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '1', 1, 1, 'kardus', 'indomie', '1234567', 1, 20, 20, 10, 30, 'Black', 200000, '2020-07-08', NULL, NULL, '<p>barang di pinjam<br></p>', 0, 'administrator', '2020-07-27 09:09:04', 'administrator', '2020-07-27 09:09:04'),
(2, '2', 2, 2, 'kardus', 'pamper', '123456789', 1, 12, 12, 12, 12, 'Black', 5, '2020-07-11', NULL, NULL, '<p>dsds<br></p>', 0, 'zulfiachsans', '2020-07-27 09:13:06', 'zulfiachsans', '2020-07-27 09:13:06'),
(3, '3', 1, 1, 'kardus', 'minuman', '918234', 1, 123, 421, 124, 124, 'White', 5000, '2020-07-03', NULL, NULL, '<p>weewqeq<br></p>', 1, 'administrator', '2020-07-27 09:14:49', 'administrator', '2020-07-29 13:28:46'),
(4, '4', 1, 1, 'ga ada', 'ga ada', '45', 1, 123, 14, 15, 15, 'Black', 25, '2020-07-16', NULL, NULL, '<p>2112<br></p>', 1, 'administrator', '2020-07-27 09:18:06', 'administrator', '2020-07-27 09:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `inv_locations`
--

CREATE TABLE `inv_locations` (
  `id` int(12) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text,
  `photo` text,
  `thumbnail` text,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_locations`
--

INSERT INTO `inv_locations` (`id`, `code`, `name`, `detail`, `photo`, `thumbnail`, `deleted`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '1', 'gudang', '<p>barang digudang<br></p>', NULL, NULL, 0, 'administrator', '2020-07-27 09:08:08', 'administrator', '2020-07-27 09:08:08'),
(2, '2', 'rumah', '<p>barang dirumah<br></p>', NULL, NULL, 0, 'zulfiachsans', '2020-07-27 09:12:01', 'zulfiachsans', '2020-07-27 09:12:01'),
(3, '3', 'Cluster Melati', '<p>dapat menampung 30 pengungsi<br></p>', NULL, NULL, 0, 'administrator', '2020-07-29 13:28:15', 'administrator', '2020-07-29 13:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `inv_log_data_location`
--

CREATE TABLE `inv_log_data_location` (
  `id` int(12) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'FK inv_datas',
  `location_id` int(12) NOT NULL COMMENT 'FK inv_locations',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_log_data_location`
--

INSERT INTO `inv_log_data_location` (`id`, `code`, `location_id`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '1', 1, 'administrator', '2020-07-27 09:09:04', 'administrator', '2020-07-27 09:09:04'),
(2, '2', 2, 'zulfiachsans', '2020-07-27 09:13:06', 'zulfiachsans', '2020-07-27 09:13:06'),
(3, '3', 1, 'administrator', '2020-07-27 09:14:49', 'administrator', '2020-07-27 09:14:49'),
(4, '4', 1, 'administrator', '2020-07-27 09:18:06', 'administrator', '2020-07-27 09:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `inv_log_data_status`
--

CREATE TABLE `inv_log_data_status` (
  `id` int(12) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'FK inv_datas',
  `status_id` int(12) NOT NULL COMMENT 'FK inv_status',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_log_data_status`
--

INSERT INTO `inv_log_data_status` (`id`, `code`, `status_id`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '1', 1, 'administrator', '2020-07-27 09:09:04', 'administrator', '2020-07-27 09:09:04'),
(2, '2', 1, 'zulfiachsans', '2020-07-27 09:13:06', 'zulfiachsans', '2020-07-27 09:13:06'),
(3, '3', 1, 'administrator', '2020-07-27 09:14:49', 'administrator', '2020-07-27 09:14:49'),
(4, '4', 1, 'administrator', '2020-07-27 09:18:06', 'administrator', '2020-07-27 09:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `inv_status`
--

CREATE TABLE `inv_status` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_status`
--

INSERT INTO `inv_status` (`id`, `name`, `description`, `deleted`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'In Use', '<p>Aktif digunakan</p>', 0, 'administrator', '2018-04-13 11:16:07', 'administrator', '2018-04-13 11:16:07'),
(2, 'Not Used', '<p>Tidak digunakan</p>', 0, 'administrator', '2018-04-13 11:17:25', 'administrator', '2018-04-13 11:17:25'),
(3, 'In Repair', '<p>Status barang masih dalam perbaikan</p>', 0, 'administrator', '2018-04-18 16:34:43', 'administrator', '2018-04-18 16:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_color`
--

CREATE TABLE `master_color` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_color`
--

INSERT INTO `master_color` (`id`, `name`, `deleted`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'Black', 0, 'administrator', '2018-04-03 16:30:13', 'administrator', '2018-04-03 16:30:13'),
(2, 'White', 0, 'administrator', '2018-04-13 10:48:13', 'administrator', '2018-04-13 10:48:13'),
(3, 'Grey', 0, 'administrator', '2018-04-13 11:32:37', 'administrator', '2018-04-18 15:38:32'),
(4, 'Blue', 0, 'administrator', '2018-04-13 11:32:44', 'administrator', '2018-04-18 15:38:24'),
(5, 'Red', 0, 'administrator', '2018-04-18 15:37:57', 'administrator', '2018-04-18 15:37:57'),
(6, 'Brown', 0, 'administrator', '2018-05-09 10:56:40', 'administrator', '2018-05-09 10:56:40'),
(7, 'Yellow', 0, 'administrator', '2018-05-09 11:02:17', 'administrator', '2018-05-09 11:02:17'),
(8, 'Black White', 0, 'administrator', '2018-05-11 09:43:40', 'administrator', '2018-05-11 09:43:40'),
(9, 'Green', 0, 'administrator', '2018-05-18 15:13:17', 'administrator', '2018-05-18 15:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'gGSTNbCuCI/8jRvE.dfQZ.', 1268889823, 1596003889, 1, 'System', 'Administrator', '01234567'),
(8, '::1', 'zulfiachsans', '$2y$08$xYV3u58ZB8zEqwNSm.Kh5OKmU3va1opf5B8P2rgI.hfPl6eFwW.DO', NULL, 'zulfiachsans44@gmail.com', NULL, NULL, NULL, NULL, 1595666164, 1595815858, 1, 'Zulfi', 'Sani', '085715928302');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_users_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
	INSERT INTO users_photo VALUES( NEW.username, "no_picture.png", "no_picture.png", now());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 1, 1),
(6, 1, 2),
(9, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_photo`
--

CREATE TABLE `users_photo` (
  `username` varchar(100) NOT NULL,
  `photo` text,
  `thumbnail` text,
  `updated_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_photo`
--

INSERT INTO `users_photo` (`username`, `photo`, `thumbnail`, `updated_on`) VALUES
('administrator', 'ADMINISTRATOR.jpg', 'ADMINISTRATOR_thumb.jpg', '2017-12-08 14:02:41'),
('ajiii', 'no_picture.png', 'no_picture.png', '2020-07-25 15:34:20'),
('zulfiachsans', 'no_picture.png', 'no_picture.png', '2020-07-25 15:36:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invenitri_session`
--
ALTER TABLE `invenitri_session`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `inv_categories`
--
ALTER TABLE `inv_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_datas`
--
ALTER TABLE `inv_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_locations`
--
ALTER TABLE `inv_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_log_data_location`
--
ALTER TABLE `inv_log_data_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_log_data_status`
--
ALTER TABLE `inv_log_data_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_status`
--
ALTER TABLE `inv_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_color`
--
ALTER TABLE `master_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_photo`
--
ALTER TABLE `users_photo`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inv_categories`
--
ALTER TABLE `inv_categories`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inv_datas`
--
ALTER TABLE `inv_datas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inv_locations`
--
ALTER TABLE `inv_locations`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inv_log_data_location`
--
ALTER TABLE `inv_log_data_location`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inv_log_data_status`
--
ALTER TABLE `inv_log_data_status`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inv_status`
--
ALTER TABLE `inv_status`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_color`
--
ALTER TABLE `master_color`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
