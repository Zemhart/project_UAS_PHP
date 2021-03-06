-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 02:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `idGroup` varchar(20) CHARACTER SET latin1 NOT NULL,
  `groupName` varchar(20) CHARACTER SET latin1 NOT NULL,
  `groupAdmin` int(10) UNSIGNED NOT NULL,
  `mainPost` text CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`idGroup`, `groupName`, `groupAdmin`, `mainPost`, `created_at`, `updated_at`) VALUES
('dhunter', 'Dragon Hunter', 1, 'Protect People and Hunt All Dragons', '2017-06-03 11:30:55', '2017-06-03 04:30:55'),
('php', 'Grup PHP', 1, 'Sukses UTS dan UAS', '2017-03-10 17:00:00', '0000-00-00 00:00:00'),
('raze', 'Raze', 1, '', '2017-04-04 10:50:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grouptasks`
--

CREATE TABLE `grouptasks` (
  `taskId` int(11) NOT NULL,
  `taskName` varchar(20) NOT NULL,
  `taskDetail` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `userid` int(10) UNSIGNED NOT NULL,
  `groupid` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouptasks`
--

INSERT INTO `grouptasks` (`taskId`, `taskName`, `taskDetail`, `status`, `userid`, `groupid`, `created_at`, `updated_at`) VALUES
(2, 'Lulus UAS', 'Usaha dan Doa yang banyak', 0, 1, 'dhunter', '2017-04-02 13:31:41', '2017-06-03 05:45:16'),
(6, 'Clear the Area', '', 1, 1, 'dhunter', '2017-04-02 13:42:47', '0000-00-00 00:00:00'),
(7, 'Get some material', 'get 5 mythril', 0, 1, 'dhunter', '2017-04-04 10:00:08', '0000-00-00 00:00:00'),
(14, 'abc', 'def', 0, 1, 'php', '2017-06-02 22:45:52', '2017-06-02 22:45:52'),
(15, 'abc', 'def', 0, 1, 'dhunter', '2017-06-03 03:44:37', '2017-06-03 03:44:37'),
(16, 'def', 'defghi', 1, 1, 'dhunter', '2017-06-03 03:44:57', '2017-06-03 04:37:36'),
(17, 'qwer', 'qwert', 0, 1, 'dhunter', '2017-06-03 03:47:10', '2017-06-03 03:47:10'),
(18, 'asdf', 'qwer', 1, 1, 'dhunter', '2017-06-03 03:53:59', '2017-06-03 04:04:10'),
(19, 'Cari makan', 'Buat persiapan begadang bikin tugas', 0, 1, 'php', '2017-06-04 05:21:09', '2017-06-04 05:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberId` int(11) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `groupId` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `userId`, `groupId`, `created_at`, `updated_at`) VALUES
(1, 1, 'php', '2017-06-03 06:15:15', '0000-00-00 00:00:00'),
(3, 1, 'dhunter', '2017-06-03 06:15:15', '0000-00-00 00:00:00'),
(10, 1, 'raze', '2017-06-03 06:15:15', '0000-00-00 00:00:00'),
(15, 3, 'dhunter', '2017-06-04 04:46:03', '2017-06-04 04:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `idgroup` varchar(20) CHARACTER SET latin1 NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `idgroup`, `userid`, `content`, `created_at`, `updated_at`) VALUES
(1, 'php', 1, 'Halo Halo', '2017-06-04 04:07:27', '2017-06-04 04:07:27'),
(2, 'php', 1, 'Lagi coba tulis pesan', '2017-06-04 04:07:41', '2017-06-04 04:07:41'),
(3, 'php', 1, 'hai', '2017-06-04 04:09:15', '2017-06-04 04:09:15'),
(4, 'php', 1, 'Udah sore ya', '2017-06-04 04:11:21', '2017-06-04 04:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2017_05_15_070650_create_tasks_table', 1),
(8, '2017_05_25_150407_user', 1),
(9, '2017_06_04_102315_create_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `groupId` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPost`, `userName`, `groupId`, `title`, `content`, `timestamp`) VALUES
(2, 'yoko', 'php', '7th Heaven', 'Even if fate wears me down, I won''t stop wishing for my hopes to come true ', '2017-03-11 00:00:00'),
(3, 'yoko', 'php', 'odd and end', 'I am you\r\nYou am I', '2017-03-13 07:09:11'),
(4, 'yoko', 'public', 'Mandi Makan Tidur', 'abis mandi, makan, tidur', '2017-03-14 17:34:24'),
(5, 'laymana', 'public', 'Left and Right', 'Nothing left and Nothing right', '2017-03-19 12:17:58'),
(6, 'yoko', 'public', 'Melt', 'Embrace me, if we hadn''t met, here \r\n', '2017-03-20 04:26:35'),
(7, 'yoko', 'public', 'asdf', 'asdfasdf', '2017-03-20 04:27:24'),
(8, 'yoko', 'php', 'asdfasd', 'asdfadsf', '2017-03-20 04:27:42'),
(15, 'yoko', 'dhunter', 'VFD', 'The Last One', '2017-03-20 06:01:26'),
(16, 'kuncoro', 'public', 'Up and Down', 'Getting up and getting down', '2017-03-20 08:18:32'),
(17, 'kuncoro', 'public', 'Left and Riht', 'flamenwerfen', '2017-03-20 08:20:47'),
(18, 'feery', 'public', 'lol', 'pilkada di batalkan', '2017-03-20 08:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `idReply` int(11) NOT NULL,
  `content` text NOT NULL,
  `idPost` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`idReply`, `content`, `idPost`, `username`, `timestamp`) VALUES
(1, 'Heavenz armz', 2, 'yoko', '2017-04-05 00:00:00'),
(5, 'kok bisa', 18, 'yoko', '2017-04-05 12:51:28'),
(6, 'bukannya jadi?', 18, 'yoko', '2017-04-05 12:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Cari air', '2017-06-01 07:21:45', '2017-06-01 07:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(30) NOT NULL,
  `fullName` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birthDay` date NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `timeStamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `fullName`, `email`, `gender`, `birthDay`, `passWord`, `timeStamp`) VALUES
('feery', 'Feery Edwin', 'fycedwin@gmali.com', 'M', '1996-02-22', '$2y$10$StI5H3Dd3usvR9fqT5H9PeDoAikhVhq6puZAXofeLu1rqncNc2pUm', '2017-03-20 08:43:42'),
('kuncoro', 'Kuncoro', 'yoko@yahoo.co.id', 'M', '0000-00-00', '$2y$10$bLE2SzkSiRJD91wf/Cf1BOrJVIN5Pbu8PpbDOSYqKoI0Fg9Yyifdy', '2017-03-19 11:32:41'),
('laymana', 'laymana', 'yoko@yoko.com', 'M', '1996-03-06', '$2y$10$RHy1246A6LV.bsxXHOR9EudaGQVcPmD254xwBmCmEQEnpjlV.2KbG', '2017-03-19 12:17:18'),
('yoko', 'Kuncoro Yoko', 'yoko@abc.com', 'M', '1996-03-06', '$2y$10$bLE2SzkSiRJD91wf/Cf1BOrJVIN5Pbu8PpbDOSYqKoI0Fg9Yyifdy', '2017-03-11 00:00:00'),
('zemhart', 'Zemhart', 'zem@yoko.com', 'M', '1996-03-06', '$2y$10$j1vtYpK3DyE.h6QhH2W7U.gNWMZK4H9vNBEkbdsSJk4HZBK2bA2Va', '2017-04-04 17:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yoko', 'yoko@dhunt.org', '$2y$10$Q6Lpas7qyp/h817Cp6SomOY6RYHnXnErOp0iu4AYSrNhyrQgZiFoW', 'yXY1bJw2G5QxSGwU3lkg3gFUp1ilwu6bmnZAA5E5ERoyghwbbpiUg6mrdme1', '2017-05-25 08:12:51', '2017-06-04 03:21:03'),
(3, 'Kuncoro', 'kuncoro@dhunt.org', '$2y$10$D4y3G7QqaehC/aR0aBKiWOn33wnkwfYGfSMa4Be.ic5efYmBXN.8G', 'wIxWJknCXlU344zIpyL4KmxqX6mTMW3vtfuBkU1xX8kHjsKOg685YGCWCEdd', '2017-06-04 04:41:19', '2017-06-04 05:05:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroup`),
  ADD KEY `grp_usr_idx` (`groupAdmin`);

--
-- Indexes for table `grouptasks`
--
ALTER TABLE `grouptasks`
  ADD PRIMARY KEY (`taskId`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberId`),
  ADD KEY `groupId` (`groupId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_msg_usrid` (`userid`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`idReply`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`),
  ADD UNIQUE KEY `usr_email_unq` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grouptasks`
--
ALTER TABLE `grouptasks`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `idReply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `frm_grp_adm_usr_id` FOREIGN KEY (`groupAdmin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grouptasks`
--
ALTER TABLE `grouptasks`
  ADD CONSTRAINT `fk_grptsk_grpid` FOREIGN KEY (`groupid`) REFERENCES `groups` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grptsk_nmid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_mbr_grpId_fgrp_idGrp` FOREIGN KEY (`groupId`) REFERENCES `groups` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mbr_grpId_fgrp_idnm` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_msg_grpid` FOREIGN KEY (`idgroup`) REFERENCES `groups` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_msg_usrid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
