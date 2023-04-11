-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 02:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `story`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(255) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_author` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_image` text NOT NULL,
  `post_status` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_content`, `post_author`, `post_date`, `post_image`, `post_status`, `post_tags`, `post_views`) VALUES
(1, 0, 'আদায় কাচকলা', 'গল্প - কার্টুন গল্প, শিক্ষনীয় গল্প, হাসির গল্প, বাংলা গল্প, রূপকথার গল্প, জীবনের গল্প, বাংলা ভালো গল্প, ভুতের কার্টুন গল্প, গল্পের শহর, বাংলা কার্টুন গল্প ইত্যাদি গল্প পড়তে ভিজিট করুন নিউজবাংলার গল্পের পাতা।', 'তারিকুল ', '2023-04-11 10:55:32', 'i1.jpg', 'published', 'golpo', 0),
(2, 0, 'দোলনা', 'মনে আছে তোর , আমাদের বাড়িতে একটা ‌দড়ির দোলনা ছিলো। তোকে ওটাতে বসতে দিতে চাইলো না‌ , সেদিন নতুন কাকিমা মানে ছোটো কাকিমা। তুই কেন, আমাকেও বসতে দিতে চাইছিলো না। পুচুকটার জন্য সাবধানে থাকতে হয়েছিল বোধহয়। অসুখ হবে তাই। আসলে আমরা পাড়া গাঁয়ের মানুষেরা সবাই সবার জিনিস, সবাই ব্যবহার করি। কাকিমার সেটা ভালো লাগতো না।', 'Tareq', '2023-04-11 13:54:52', 'i1.jpg', 'published', 'zero', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_type` text NOT NULL,
  `user_email` text NOT NULL,
  `user_image` text NOT NULL,
  `token` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_type`, `user_email`, `user_image`, `token`, `first_name`, `last_name`, `password`, `date`) VALUES
(1, 'Tareq', 'admin', 'adnantareq2@gmail.com', '', '', 'তারিকুল', 'ইসলাম', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
