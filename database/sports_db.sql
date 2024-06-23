-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jun 23, 2024 at 08:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` varchar(20) NOT NULL,
  `streetName` varchar(40) NOT NULL,
  `state` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zipcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `streetName`, `state`, `city`, `zipcode`) VALUES
('1717077653', '501 rasta peth', 'maharashtra', 'pune', '653523'),
('', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'pras01', 'pras01'),
(13, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `people` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `number` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `people`, `time`, `date`, `number`, `status`) VALUES
(1, 'prashant kale', 'prashantkale@gmail.com', 2, '1PM', '2024-06-10', '7836764323', 'canceled'),
(5, 'prashant', 'user@gmail.com', 2, '1PM', '2024-06-08', '7873485987', ''),
(6, 'prashant kale', 'prashantkale776@gmail.com', 1, '1PM', '2024-06-11', '7873485987', 'canceled'),
(7, 'prashant kale', 'prashantkale776@gmail.com', 2, '1PM', '2024-06-06', '9832452146', '');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `et_id` int(20) NOT NULL,
  `pid` varchar(40) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `paid_date` varchar(20) NOT NULL,
  `expire` varchar(20) NOT NULL,
  `renewal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`et_id`, `pid`, `uid`, `paid_date`, `expire`, `renewal`) VALUES
(3, '1', '1717077653', '2024-05-30', '2026-11-30', 'yes'),
(4, '', '', '2024-05-30', '1970-01-01', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_description`, `event_location`) VALUES
(1, 't20', '2024-06-04', 'fhjhdfdasdsa', 'balewadi, pune');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_pay_payments`
--

CREATE TABLE `google_pay_payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `upi_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE `grounds` (
  `id` int(11) NOT NULL,
  `ground_name` varchar(100) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `sport_type` varchar(50) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grounds`
--

INSERT INTO `grounds` (`id`, `ground_name`, `location_id`, `sport_type`, `rate`, `image`) VALUES
(2, 'satish sports ground', 1, 'football', 250.00, 'uploads/6658a0cccd9c3.png');

-- --------------------------------------------------------

--
-- Table structure for table `healthstatus`
--

CREATE TABLE `healthstatus` (
  `hid` int(11) NOT NULL,
  `calorie` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `fat` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `uid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthstatus`
--

INSERT INTO `healthstatus` (`hid`, `calorie`, `height`, `weight`, `fat`, `remarks`, `uid`) VALUES
(2, '505', '169', '55', '45', 'great', 1717077653),
(3, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`) VALUES
(1, 'dsfsdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `match_date` date NOT NULL,
  `home_team` varchar(255) NOT NULL,
  `away_team` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `match_date`, `home_team`, `away_team`, `venue`, `created_at`, `status`) VALUES
(3, '2024-06-03', 'csk', 'rr', 'mumbai', '2024-05-30 15:31:41', ''),
(4, '2024-06-17', 'india', 'west indies', 'west indies', '2024-06-02 17:46:24', 'Joined');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `published_date`) VALUES
(1, 'T20 World Cup: ‘Make the most of life, it can’t last forever’ – after conquering mental demons, Aussie Ashton Agar focusing on just being a ‘good person', 'What’s happening, mate? Am I the enemy now? I am just trying to help. You are always fighting me,” when Justin Langer, Western Australia’s coach, asked him one day in 2014, Ashton Agar broke down. “I don’t know. I have no idea. I don’t know.”\r\n\r\nA game against Tasmania in Hobart. Agar bowled two balls, two good deliveries, but a “deep sadness” welled up in him. After another delivery, he felt a tear breaking out from his eye. He threw away the ball, got his hat from the umpire, walked out of the ground, and started to sob', 'image1.jpg', '2024-05-30 17:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pid` int(8) NOT NULL,
  `planName` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `planName`, `description`, `validity`, `amount`, `active`) VALUES
(1, 'vollyball', 'less price', '30', 500, 'yes'),
(2, 'carrom', 'less price ', '90', 1000, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `state` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `street_name`, `city`, `zipcode`, `state`, `gender`, `dob`, `mobile`, `email`) VALUES
(1, '', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `runs_scored` int(11) DEFAULT NULL,
  `balls_faced` int(11) DEFAULT NULL,
  `overs_bowled` decimal(3,1) DEFAULT NULL,
  `wickets_taken` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `runs_scored`, `balls_faced`, `overs_bowled`, `wickets_taken`) VALUES
(1, 2, NULL, NULL, NULL),
(2, 5, 3, 0.0, 0),
(3, 5, 1, 0.0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_name`, `description`, `price`) VALUES
(1, 'cricket', 'sdfgfgfhfgg', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `captain_name` varchar(255) NOT NULL,
  `team_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `sport`, `captain_name`, `team_logo`) VALUES
(1, 'csk', 'cricket', 'dhoni', 'uploads/download.png');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user`, `email`, `mobile`, `comment`) VALUES
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `gender`, `mobile`, `email`, `dob`, `joining_date`) VALUES
(1717077653, 'Rajesh Thakur', 'Male', '4675453443', 'rajesht123@gmail.com', '1992-01-02', '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `username`, `email`, `phone`, `password`) VALUES
(1, 'prashant01', 'prashantkale776@gmail.com', NULL, '$2y$10$YYt/qw/6FbuFJmV8Xc1M0uAa8WPmUjWxCQZOD/nYgqdgZkhBCKvmC'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$EQB8XPCpS/LXA02BUdrHq.74qLx1f3OrqUaZr1DcsPY2.C3RKJbei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `google_pay_payments`
--
ALTER TABLE `google_pay_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grounds`
--
ALTER TABLE `grounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `healthstatus`
--
ALTER TABLE `healthstatus`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `et_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_pay_payments`
--
ALTER TABLE `google_pay_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grounds`
--
ALTER TABLE `grounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `healthstatus`
--
ALTER TABLE `healthstatus`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `pid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1717077654;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grounds`
--
ALTER TABLE `grounds`
  ADD CONSTRAINT `grounds_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
