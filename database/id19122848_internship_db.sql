-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 10:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19122848_internship_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `filter_conds`
--

CREATE TABLE `filter_conds` (
  `filter_id` int(11) NOT NULL,
  `filter_interns` varchar(100) NOT NULL,
  `filter_tasks` varchar(100) NOT NULL,
  `filter_start_date` date NOT NULL DEFAULT '1000-01-01',
  `filter_end_date` date NOT NULL DEFAULT '9999-12-31'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filter_conds`
--

INSERT INTO `filter_conds` (`filter_id`, `filter_interns`, `filter_tasks`, `filter_start_date`, `filter_end_date`) VALUES
(1, '', '', '0000-00-00', '9999-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `interns`
--

CREATE TABLE `interns` (
  `intern_id` int(11) NOT NULL,
  `name` varchar(63) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interns`
--

INSERT INTO `interns` (`intern_id`, `name`, `avatar`, `email`, `password`, `type`, `join_date`) VALUES
(1, 'Jane Ngo', 'upload_avatar/Admin Chan-1655108521.png', 'admin123@jg-corporation.com', 'admin123', 1, '2022-01-01'),
(22, 'Hiro Taro', 'upload_avatar/Beiti Mohamed-1654483442.png', 'hirotaro@jg-corporation.com', 'beiti123', 2, '0000-00-00'),
(24, 'Takahiro Nakanishi', 'upload_avatar/Phong-1654483435.png', 'nakanishi@jg-corporation.com', 'phongnguyen123', 2, '0000-00-00'),
(28, 'Ai Tanaka', 'upload_avatar/Ai Tanaka-1656059974.png', 'aitanaka123@jg-corporation.com', 'tanaka123', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pg_type_list`
--

CREATE TABLE `pg_type_list` (
  `pg_type_id` int(11) NOT NULL,
  `pg_type` varchar(100) NOT NULL,
  `filter_pg` char(100) NOT NULL DEFAULT 'checked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pg_type_list`
--

INSERT INTO `pg_type_list` (`pg_type_id`, `pg_type`, `filter_pg`) VALUES
(1, 'Long-term Internship', 'checked'),
(2, 'One-day Internship', 'checked'),
(6, 'No Program', 'checked'),
(9, 'Intensive Program', 'checked'),
(10, 'New Program', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `program_list`
--

CREATE TABLE `program_list` (
  `pg_id` int(11) NOT NULL,
  `intern_id` int(11) NOT NULL,
  `pg_start_date` date NOT NULL,
  `pg_end_date` date NOT NULL,
  `pg_status` float NOT NULL,
  `pg_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_list`
--

INSERT INTO `program_list` (`pg_id`, `intern_id`, `pg_start_date`, `pg_end_date`, `pg_status`, `pg_type_id`) VALUES
(26, 22, '2022-05-23', '2022-05-28', 50, 9),
(28, 24, '2022-05-23', '2022-05-24', 0, 1),
(32, 28, '2022-05-23', '2022-05-24', 100, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sort`
--

CREATE TABLE `sort` (
  `name` tinytext NOT NULL,
  `program` tinytext NOT NULL,
  `start_date` tinytext NOT NULL,
  `end_date` tinytext NOT NULL,
  `status` tinytext NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sort`
--

INSERT INTO `sort` (`name`, `program`, `start_date`, `end_date`, `status`, `id`) VALUES
('ASC', 'NO', 'NO', 'ASC', 'ASC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_list`
--

CREATE TABLE `status_list` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `filter_status` char(100) NOT NULL DEFAULT 'checked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_list`
--

INSERT INTO `status_list` (`status_id`, `status`, `filter_status`) VALUES
(2, 'Done', 'checked'),
(7, 'No status', 'checked'),
(9, 'Testing', 'checked'),
(10, 'Blocked', 'checked'),
(11, 'Doing', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `task_id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `task` varchar(63) NOT NULL,
  `description` varchar(300) NOT NULL,
  `task_start_date` date NOT NULL,
  `task_end_date` date NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`task_id`, `pg_id`, `task`, `description`, `task_start_date`, `task_end_date`, `status_id`) VALUES
(34, 26, 'Feed Habib', '', '2022-05-24', '2022-05-27', 2),
(36, 26, 'Cook dinner', 'Make delicious dishes', '2022-05-23', '2022-05-23', 10),
(49, 28, 'Task', '', '2022-05-23', '2022-05-24', 10),
(54, 28, 'New task', '', '2022-05-23', '2022-05-23', 10),
(58, 32, 'Task 2', '', '2022-05-23', '2022-05-23', 2),
(60, 28, 'Task 3', '', '2022-05-24', '2022-05-24', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filter_conds`
--
ALTER TABLE `filter_conds`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indexes for table `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`intern_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pg_type_list`
--
ALTER TABLE `pg_type_list`
  ADD PRIMARY KEY (`pg_type_id`),
  ADD UNIQUE KEY `UNIQUE_pg_type` (`pg_type`);

--
-- Indexes for table `program_list`
--
ALTER TABLE `program_list`
  ADD PRIMARY KEY (`pg_id`),
  ADD KEY `intern_id` (`intern_id`),
  ADD KEY `pg_type_id` (`pg_type_id`);

--
-- Indexes for table `sort`
--
ALTER TABLE `sort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_list`
--
ALTER TABLE `status_list`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`task_id`) USING BTREE,
  ADD KEY `pg_id` (`pg_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filter_conds`
--
ALTER TABLE `filter_conds`
  MODIFY `filter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interns`
--
ALTER TABLE `interns`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pg_type_list`
--
ALTER TABLE `pg_type_list`
  MODIFY `pg_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program_list`
--
ALTER TABLE `program_list`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `status_list`
--
ALTER TABLE `status_list`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `program_list`
--
ALTER TABLE `program_list`
  ADD CONSTRAINT `program_list_ibfk_1` FOREIGN KEY (`intern_id`) REFERENCES `interns` (`intern_id`),
  ADD CONSTRAINT `program_list_ibfk_2` FOREIGN KEY (`pg_type_id`) REFERENCES `pg_type_list` (`pg_type_id`);

--
-- Constraints for table `task_list`
--
ALTER TABLE `task_list`
  ADD CONSTRAINT `task_list_ibfk_1` FOREIGN KEY (`pg_id`) REFERENCES `program_list` (`pg_id`),
  ADD CONSTRAINT `task_list_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status_list` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
