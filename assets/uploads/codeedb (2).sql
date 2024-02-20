-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 02:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `phone_number`, `comments`) VALUES
(9, 'Mamdoh Zeyad', 'mamdohziyad@gmail.com', '00966545219170', 'This is test'),
(10, 'Ahmed Sabbagh', 'ahmed@gmail.com', '00966589669325', 'this is test'),
(11, 'Ali Mosa', 'ali@gmail.com', '0966545219170', 'this is test'),
(12, 'Mamdoh Mosad Zeyad', 'mamdohzx@gmail.com', '0966545219170', 'this is test'),
(13, 'Mamdoh Mosad Zeyad', 'mamdohzx@gmail.com', '0966545219170', 'this is test'),
(14, 'Mamdoh Mosad Zeyad', 'mamdohzx@gmail.com', '0966545219170', 'this is test'),
(15, 'Mamdoh Mosad Zeyad', 'mamdohzx@gmail.com', '0966545219170', 'this is test'),
(16, 'Mamdoh Mosad Zeyad', 'mamdohzx@gmail.com', '0966545219170', 'this is test');

-- --------------------------------------------------------

--
-- Table structure for table `development_skills`
--

CREATE TABLE `development_skills` (
  `Certification` varchar(255) NOT NULL,
  `country_higher_degree` varchar(255) NOT NULL,
  `Major` varchar(255) NOT NULL,
  `GPA` varchar(255) NOT NULL,
  `programming_experience` varchar(255) NOT NULL,
  `development_category` varchar(255) NOT NULL,
  `preferd_programming_language` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `development_skills`
--

INSERT INTO `development_skills` (`Certification`, `country_higher_degree`, `Major`, `GPA`, `programming_experience`, `development_category`, `preferd_programming_language`, `experience`, `file`, `user_id`) VALUES
('bachelors', 'Andorra', 'Software Engineer', '5', 'one_years', 'back_end', 'php', 'Test', 'شهادة تعريف المعهد .jpeg', 22),
('bachelors', 'Laos', 'xx', '2', 'one_years', 'back_end', 'asp', 'xx', 'uploads/65c56018c0bd8_', 24),
('bachelors', 'Canada', 'test', '4', 'more_10_years', 'full-stack', 'c', 'test', 'Lab-2-for-Students.pdf', 23),
('master', 'Liberia', 'test', '3', 'more_5_years', 'back_end', 'asp', 'test', 'CCSW-437 Project-2024.pdf', 37),
('professional_doctorate', 'Bermuda', 'test', '4', 'more_3_years', 'back_end', 'C#', 'test', 'http://localhost/codee/assets/uploadsCCSW-437 Project-2024.pdf', 34),
('bachelors', 'Liberia', 'test', '5', 'one_years', 'back_end', 'php', 'test', 'http://localhost/codee/assets/uploads/CCSW-437 Project-2024.pdf', 35);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birthdate`, `nationality`, `email`, `phone_number`, `username`, `password`, `role`, `status`) VALUES
(17, 'Mamdoh', 'Zeyad', '2024-01-01', 'DZ', 'mamdohzx@gmail.com', '00966545219170', 'mamdoh', '$2y$10$MEwXsU9vpWmwwu9VsnKQMu1kFoXKkF1Xnoq0lRfeTlzevHfBqz8sS', 'User', 'Inactive'),
(18, 'Ahmed', 'Sabbagh', '2024-01-01', 'ER', 'ahmed@gmail.com', '0096656665885', 'ahmed', '$2y$10$TQRSratQqwKF9mmUzXNpu.VIyD5cNJwRje/f3bKhiyn8Kms07b8U6', 'User', 'Inactive'),
(22, 'Mosa', 'Ali', '2024-01-03', 'LA', 'mosa@gmail.com', '0096665161615', 'mosa', '$2y$10$uotGqGn6tK4koxs9T8BBjOi8ZTCOA/CcLGoFh6LVSHvvQPjhV2gs.', 'Developer', 'Active'),
(23, 'Khalid', 'Ramdan', '2024-01-09', 'IS', 'khalid@gmail.com', '+9665541545454', 'khalid', '$2y$10$ZXyjzScw3J4iYCZgC3TjPemQfWPSGr4AUmZZWowJ4tellcVw3YYiS', 'Consultant', 'Active'),
(24, 'Abdurahman', 'Eido', '2024-01-22', 'VU', 'abdo@outlook.com', '009665545454', 'abdo', '$2y$10$QfEIgaVWe57.CaCzdudspuKdqpkTvwzsxOHrTGAUIB3fJ87jfLLBO', 'Developer', 'Active'),
(25, 'Ali', 'Alharbi', '2024-01-03', 'CA', 'ali@hotmail.com', '00966596999626', 'ali', '$2y$10$1oBKEpwKnLWNFMMyFkLds.yf/akI161Zw99fGaQ/DmZAUnOSdP5f6', 'Admin', 'Inactive'),
(33, 'test', 'test', '2024-02-01', 'Laos', 'test@gmail.com', '0966545219170', 'test', '$2y$10$NYTjSNYT/4NzVnFV.obicezjBeX9mPvw//VgW46vLaDhOSAsE9XkS', 'User', 'Inactive'),
(34, 'test2', 'test2', '2024-02-07', 'Czechia', 'test2@gmail.com', '012998228455', 'test2', '$2y$10$IfQtC0iQWTU9jJgq3pDVSuZbfh5SS24f2XuDjQB1kAJJwBOyE4G5m', 'Consultant', 'Pending'),
(35, 'test3', 'test3', '2024-02-07', 'Czechia', 'test3@gmail.com', '00966545219170', 'test3', '$2y$10$dZsk6HCML5J/SduBY5O6vefRfUgbmLMCIx/pM0Y03CRes2gyoxba2', 'Developer', 'Pending'),
(37, 'joe', 'mai', '2024-02-01', 'Cyprus', 'joe@gmail.com', '00966ddd', 'joe', '$2y$10$e2h/ht0fiCYDfitoDND19OzHPg5YuhV4XQn/HvB8ln3Ci.z18XZEu', 'Developer', 'Active'),
(38, 'aaa', 'aaa', '2024-02-07', 'Liberia', 'aaa@gmail.com', '0966545219170ddd', 'aaa', '$2y$10$JRhSoygGJPN54ktyBNh7eOwEOIgT8efAuX3kApkIkkcS0vrmxyNzC', 'User', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `development_skills`
--
ALTER TABLE `development_skills`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `development_skills`
--
ALTER TABLE `development_skills`
  ADD CONSTRAINT `development_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
