-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 06:50 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dizzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bots`
--

CREATE TABLE `bots` (
  `bot_id` int(11) NOT NULL,
  `bot_name` varchar(255) NOT NULL,
  `bot_desc` varchar(5000) NOT NULL,
  `bot_owner` varchar(255) NOT NULL,
  `bot_lang` varchar(255) NOT NULL,
  `bot_node` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bots`
--

INSERT INTO `bots` (`bot_id`, `bot_name`, `bot_desc`, `bot_owner`, `bot_lang`, `bot_node`) VALUES
(1, 'Teecka', 'A bot that plays audio files from YouTube.', '2', 'NodeJS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `msg_ticket` int(11) NOT NULL,
  `msg_sender` int(11) NOT NULL,
  `msg_content` varchar(10000) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_ticket`, `msg_sender`, `msg_content`, `msg_time`) VALUES
(1, 1, 9, 'My bot is broken', '2018-02-04 17:48:39'),
(2, 1, 2, 'Hello there! Your bot has been fixed :D', '2018-02-04 17:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `node_id` int(11) NOT NULL,
  `node_ip` varchar(255) NOT NULL,
  `node_ram` int(11) NOT NULL,
  `node_bots` int(11) NOT NULL,
  `node_limit` int(11) NOT NULL,
  `node_code` varchar(255) NOT NULL,
  `node_locat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`node_id`, `node_ip`, `node_ram`, `node_bots`, `node_limit`, `node_code`, `node_locat`) VALUES
(1, '192.168.1.10', 2048, 1, 10, 'cl_1', 'Santiago, Chile');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_subject` varchar(100) NOT NULL,
  `ticket_sender` int(11) NOT NULL,
  `ticket_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_subject`, `ticket_sender`, `ticket_status`) VALUES
(1, 'Hey', 9, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_rank` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `user_rank`) VALUES
(2, 'Andy', 'Caraballo', 'andy@zerolag.host', 'AndyC', '$2y$10$BIIn/3DvEk32EPFB4YwK6O1aXpLtTGfg9ufaI0mYaRW8zVxpAhxY6', 2),
(8, 'Dizzy', 'Administrator', 'dizzy@dizzypanel.com', 'Dizzy', '$2y$10$TeOE5cRtHxsvPrEzy/ynYui1Oex8wKaF.MsIJwFWbXLovts991F5.', 2),
(9, 'Mark', 'Emery', 'markymarky@gmail.com', 'Marky', '$2y$10$HRbH/pgcLb9Kc4fpsoHL5O.elxNrke5A/tZP7YdbDydwMvUvKVFu.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`bot_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bots`
--
ALTER TABLE `bots`
  MODIFY `bot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
