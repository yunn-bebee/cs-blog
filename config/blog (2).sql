-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 24, 2023 at 01:28 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `title`, `content`, `image_name`, `user_id`, `tag_id`, `date_created`) VALUES
(28, 'The Future of Artificial Intelligence\'', 'Artificial Intelligence (AI) is transforming industries and reshaping our daily lives. In this blog post, we explore the latest advancements in AI and discuss its potential impact on various sectors.', 'bg.jpg', 10, 1, '2023-09-24 06:21:28'),
(29, 'Getting Started with Python Programming', 'Python is a beginner-friendly programming language known for its simplicity and versatility. In this tutorial, we guide you through the basics of Python programming and help you get started on your coding journey.', 'r.jpg', 10, 2, '2023-09-24 06:22:31'),
(30, 'Cybersecurity Best Practices for Online Safety', 'With the rise of cyber threats, online safety has never been more critical. Learn about essential cybersecurity best practices that can help you protect your digital identity and data from malicious actors.', 'among-us-space-galaxy-4k-wallpaper-11625096754vqrawbaris.jpg', 10, 6, '2023-09-24 09:47:14'),
(37, 'Responsive Web Design', ' In a mobile-first world, responsive web design is crucial. This post delves into the principles of responsive design, including fluid grids, flexible images, and media queries. You\'ll discover how to craft websites that look and function beautifully on all devices, from smartphones to desktops.', 'GIF-a7c9ee388982a5f022c402ccc72bf0f2.gif', 11, 4, '2023-09-24 10:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'Artificial Intelligence\r\n'),
(2, 'Data Science\r\n'),
(3, 'random\r\n'),
(4, 'Web development\r\n'),
(5, 'Application development\r\n'),
(6, 'Beginners');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `status`) VALUES
(2, 'Bebee', 'dc647eb65e6711e155375218212b3964', '123@gmail.com\r\n', 0),
(4, 'kyaw', '698d51a19d8a121ce581499d7b701668', 'kyaw@email.com\r\n', 1),
(5, 'robo', 'b59c67bf196a4758191e42f76670ceba', 'bee@bee.com\r\n', 1),
(8, 'yunnie', '963c3c5aa49143eb1b26ca9ec18f4e68', 'yunnie@gmail.com\r\n', 1),
(9, 'bee', '963c3c5aa49143eb1b26ca9ec18f4e68', 'robobee3110@outlook.com', 1),
(10, 'beebee', 'c4ca4238a0b923820dcc509a6f75849b', 'asdf@gamil.com', 1),
(11, 'bira', 'dc647eb65e6711e155375218212b3964', 'hevido6589@iturkei.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
