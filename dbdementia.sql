-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdementia`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `quiz_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `quiz_score` int(11) DEFAULT NULL,
  `quiz_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quiz_completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `quiz_id`, `username`, `topic`, `quiz_score`, `quiz_date`) VALUES
(15, 1, 'willian0704', 'Dementia Symptoms', 3, '2023-08-07 09:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_id`, `topic_name`, `topic_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dementia Symptoms', 'Symptoms.php', '2023-08-02 18:26:08', '2023-08-02 18:26:08'),
(2, 2, 'Tips for communicating with a person with Dementia', 'communication.php', '2023-08-02 18:26:34', '2023-08-02 18:26:34'),
(3, 3, 'Dealing with the troubling behavior of a person with dementia', 'dealing.php', '2023-08-02 18:26:34', '2023-08-02 18:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'willian0704', 'williankong1245@gmail.com', '$2y$10$SlR/5m4VQ0SRoONr/h9DCODzdLUokKjFBLW0GRAteqsTr/XxkdEC6', '2023-07-28 23:30:43'),
(2, 'willian123', 'williankong1234@gmail.com', '$2y$10$Bdv8p0IdxfRyNLzTY3Q1BuciyP1shq3HiSqEluJuYcXv5tk2fxvPu', '2023-07-28 23:36:17'),
(3, 'willian0102', 'williankong220@gmail.com', '$2y$10$RAC9lvopblyiYdBFU6Sr8OTJAY9NyXxa4oD7zwSDkBgJR7PbG79u6', '2023-07-28 23:48:56'),
(4, 'willian', 'williankong@gmail.com', '$2y$10$MImov9KynlpfEDt1iHNtIu1j5uSso9fsSUuyYI8yYtyK9P6J/Sq4y', '2023-07-30 15:31:30'),
(5, 'lee0706', 'lee0706@gmail.com', '$2y$10$UA2N2jYFsxLrSH6alhcrS.zJRXv3aa8FMOB.hqFAiSy9PmpGbFD7.', '2023-08-02 12:47:53'),
(6, 'kok123', 'kok123@gmail.com', '$2y$10$LJ3iac5j0tMJhQyTo4MK9ujgBM8FEVKvEck1uQqYO37h84QmcIAeu', '2023-08-02 16:06:53'),
(7, 'test', 'test1@gmail.com', '$2y$10$oVHIhGsUxlMF6AZnq3WYR.e/CEApY0WfiRHSbvK/3dSm0yRxia7AK', '2023-08-07 01:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`id`, `username`, `topic_id`, `topic_name`, `progress`) VALUES
(1, 'willian0704', 1, 'Dementia Symptoms', 100),
(8, 'willian0704', 2, 'How to Communicate with a person with dementia', 100),
(9, 'willian0704', 3, 'Dealing with the troubling behavior of a person with dementia', 100),
(16, 'willian0102', 1, 'Dementia Symptoms', 100),
(17, 'willian0102', 2, 'How to Communicate with a person with dementia', 100),
(18, 'willian0102', 3, 'Dealing with the troubling behavior of a person with dementia', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`invitation_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_progress`
--
ALTER TABLE `reading_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_topic` (`username`,`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `invitation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reading_progress`
--
ALTER TABLE `reading_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
