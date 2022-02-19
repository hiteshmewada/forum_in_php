-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 06:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cat_user_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_date`, `cat_user_name`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.', '2021-12-13 16:23:42', 0),
(2, 'JavaScript', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.', '2021-12-13 16:25:31', 0),
(3, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2021-12-16 15:02:27', 0),
(12, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2021-12-17 19:09:09', 0),
(13, 'DBMS', 'A database management system (or DBMS) is essentially nothing more than a computerized data-keeping system. Users of the system are given facilities to perform several kinds of operations on such a system for either manipulation of the data in the databas', '2021-12-19 12:05:24', 18),
(14, 'Database Management System', 'A database management system (or DBMS) is essentially nothing more than a computerized data-keeping system. Users of the system are given facilities to perform several kinds of operations on such a system for either manipulation of the data in the database or the management of the database structure itself.', '2021-12-19 12:21:22', 18),
(15, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2021-12-19 12:36:29', 19);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_desc` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `com_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `com_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `com_desc`, `thread_id`, `com_dt`, `com_by`) VALUES
(1, 'This is a comment', 1, '2021-12-16 16:56:13', 1),
(2, '', 1, '2021-12-16 17:26:23', 2),
(3, 'Hii', 1, '2021-12-16 17:31:29', 3),
(4, '$id', 2, '2021-12-16 17:37:40', 4),
(5, '$id', 2, '2021-12-16 17:38:02', 10),
(6, '$idi', 2, '2021-12-16 17:38:08', 8),
(7, '$idi', 2, '2021-12-16 17:38:24', 5),
(8, '$idi', 2, '2021-12-16 17:38:32', 6),
(9, '$idi', 2, '2021-12-16 17:38:34', 7),
(10, '$idi', 2, '2021-12-16 17:42:24', 9),
(18, 'ka rpaa ', 18, '2021-12-18 20:43:30', 17),
(19, 'ka rpaa ', 18, '2021-12-18 20:48:19', 17),
(20, 'Yes ..... I will love to solve', 19, '2021-12-18 20:53:44', 18),
(21, '&ltlion&gt', 32, '2021-12-19 14:59:19', 19),
(22, '&ltlion&gt', 32, '2021-12-19 15:03:55', 19),
(23, 'hii', 18, '2021-12-20 15:50:27', 19);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `con_id` int(11) NOT NULL,
  `con_email` text NOT NULL,
  `con_rat` int(11) NOT NULL,
  `con_feed` text NOT NULL,
  `con_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`con_id`, `con_email`, `con_rat`, `con_feed`, `con_dt`) VALUES
(1, 'mewa@gmail.com', 1, 'hii', '2021-12-19 17:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user` int(11) NOT NULL,
  `thread_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user`, `thread_dt`) VALUES
(1, 'Unable to install pyaudio', 'I am not able to install pyaudio in windows', 1, 1, '2021-12-15 15:59:49'),
(2, 'While loop in Javascript', 'Can someone explain me about the while loop in Js?', 2, 2, '2021-12-15 16:02:22'),
(3, 'Not able to use python', 'plzz help', 1, 5, '2021-12-15 16:11:11'),
(4, 'new title', 'new desc\r\n', 1, 3, '2021-12-16 15:58:23'),
(5, 'new title', 'new desc', 1, 6, '2021-12-16 15:58:40'),
(6, 'new title', 'new desc', 1, 4, '2021-12-16 15:59:30'),
(7, 'new title', 'new desc', 1, 10, '2021-12-16 16:00:00'),
(8, 'for loop in js', 'explain', 2, 9, '2021-12-16 16:01:04'),
(9, 'Python Framework', 'Please provide good source to learn this', 1, 8, '2021-12-16 16:05:12'),
(10, 'Is Js simple?', 'I want to start learning it.', 2, 7, '2021-12-16 16:10:32'),
(24, 'problems', 'can you solve', 1, 0, '2021-12-18 21:03:48'),
(25, 'problems', 'can you solve', 1, 0, '2021-12-18 21:03:53'),
(26, 'e', 'e', 1, 18, '2021-12-18 21:03:58'),
(27, 'e', 'e', 1, 18, '2021-12-19 11:23:15'),
(28, 'e', 'e', 1, 18, '2021-12-19 11:23:56'),
(29, 'new problem', 'plzz help', 1, 18, '2021-12-19 11:24:22'),
(30, 'new problem', 'plzz help', 1, 18, '2021-12-19 11:27:17'),
(31, 'new problem', 'plzz help', 1, 18, '2021-12-19 11:28:12'),
(32, 'C++ is best', 'I want to learn', 15, 19, '2021-12-19 12:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_name`, `user_email`, `user_pass`, `user_dt`) VALUES
(1, 'hitu04', 'mewadahitesh00@gmail.com', '$2y$10$K9BwcjfzjcyUvDjXwKBle.DwZbrrSBqLGbxgvwobphMbGxEYqc/YW', '2021-12-17 17:33:56'),
(2, 'hitu04', 'mewash00@gmail.com', '$2y$10$saHD7Z9H/rwNXnIib8gaROlJVaI6R/vcCjrHCjY.f8X8kGE56TApG', '2021-12-17 17:34:48'),
(3, 'hitu04', 'mwash00@gmail.com', '$2y$10$SNNT9EjZt4hwsLrzfF9zR.WFsYeMnBAhLqyC/44a4z1LHWsMFBhSe', '2021-12-17 17:37:49'),
(4, 'hitu04', 'mwas00@gmail.com', '$2y$10$a.rNUqf1a26jPZSjDkD.5u0K.rnDHKWefW18F5VDwArQFRWnpwFkS', '2021-12-17 17:38:27'),
(5, 'hitu04', 'mas00@gmail.com', '$2y$10$Sa4v/I/BjJ3aMnbP8.3YWep2VN7iC4THZJGKIDi8DO7dA1aIUZvr2', '2021-12-17 17:39:45'),
(6, 'hitu04', 'mas0@gmail.com', '$2y$10$sbjME9E/2y8CD.w7hpQ5wO0li.nGF5QsvHcMoMWUDcjcQR4kkyecq', '2021-12-17 17:40:31'),
(7, 'hitu04', 'ma0@gmail.com', '$2y$10$ZRvwOC0xce1BW859qr5O2uqeD/0ZRfFKq5xXJ4AKwMMSj1CQCKFce', '2021-12-17 17:42:44'),
(8, 'hitu04', 'm0@gmail.com', '$2y$10$fEzsVltikjagNRvFFuv8reHV.W0GIVqpak2HkF9tKlNtgNFekgf/q', '2021-12-17 17:44:42'),
(9, 'hitu04', 'm@gmail.com', '$2y$10$uf9GO5TKkXuNXC6LN5iYQeeRfvK.oE7fGhVknaIG8JAigeJtzPCIK', '2021-12-17 17:49:11'),
(10, 'h', 'm@gail.com', '$2y$10$XXS9rmv6yQ0PelRPqnl7vuNAv01UbJd9asy08iD7BTam72Q.CVE9G', '2021-12-17 17:54:15'),
(11, 'k', 'a@a.com', '$2y$10$9JBQ0PX5ldBGvKsePjn.wOpoQ2PuoUQ3twiC8YSOMPPUXDwjuOUHW', '2021-12-17 17:55:33'),
(12, 'k', 'ab@z.com', '$2y$10$xSD7Mak1sS/uyFDgi4ma7u5jp6oSBESk9RYZzjr2I9kUxnpsxkcZi', '2021-12-17 17:56:14'),
(13, 'l', '2@a.com', '$2y$10$ENOnTwQ8ez5EcCPG4JCeheUmSelUgJqIORWS.V/1M7gq47iMN0OVK', '2021-12-17 17:56:40'),
(14, '1', 'm02@gmail.com', '$2y$10$6Hx0gKptEGe5VZicRzYhM..UmUP.zn5V5gSzutrrvRKqNbxIxDlRW', '2021-12-17 18:30:13'),
(15, '', '', '$2y$10$BWP7eFY9wYErMokjPXCduObqYtOf1htuNEy2VPgBEG3qlwwIjsEv6', '2021-12-17 18:38:54'),
(16, '1', 'r@email.com', '$2y$10$YMH.w2oKbfMPRLLN27MSo.s0DPHxOLMGxekk7G34ry5r3HWQQ3wGy', '2021-12-17 19:16:38'),
(17, '', 'hit@1.com', '$2y$10$gT88i2vFPNibnFzcX9Q.Zepu.men5ZnleEQeHjht/i7MosKsl2iq2', '2021-12-18 17:22:30'),
(18, 'Anita', 'anita@a.com', '$2y$10$YyGB4q5ksY8PTi6SIC81eOIBb9tlEJu98VnFMqT0XMcynOSMOqbWq', '2021-12-18 20:49:46'),
(19, 'Hitesh Mew', 'hitesh.mewada@slrtce.in', '$2y$10$kS8AIgeiR6WM4ednaq6JhetvVQlGhUr1b9E9nSQJnBin7J.Z9mOOC', '2021-12-19 12:35:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);
ALTER TABLE `category` ADD FULLTEXT KEY `cat_desc` (`cat_desc`,`cat_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);
ALTER TABLE `comments` ADD FULLTEXT KEY `com_desc` (`com_desc`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
