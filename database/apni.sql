-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 05:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apni`
--

-- --------------------------------------------------------

--
-- Table structure for table `bustype`
--

CREATE TABLE `bustype` (
  `bus_type_id` int(3) NOT NULL,
  `bus_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bustype`
--

INSERT INTO `bustype` (`bus_type_id`, `bus_type`) VALUES
(1, 'Express'),
(2, 'Gurjarnagari'),
(3, 'Luxury');

-- --------------------------------------------------------

--
-- Table structure for table `citycode`
--

CREATE TABLE `citycode` (
  `city_code` int(3) NOT NULL,
  `city_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citycode`
--

INSERT INTO `citycode` (`city_code`, `city_name`) VALUES
(1, 'Ahmedabad'),
(2, 'Anand'),
(3, 'Baroda'),
(4, 'Borsad'),
(5, 'Bhavnagar'),
(6, 'Dholera'),
(7, 'Atkot'),
(8, 'Limidi'),
(9, 'Rajkot'),
(10, 'Surat'),
(11, 'Vallabhipur'),
(13, 'Rangola'),
(14, 'Dhasa');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(3) NOT NULL,
  `faq_que` varchar(200) NOT NULL,
  `faq_ans` varchar(1000) NOT NULL,
  `faq_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_que`, `faq_ans`, `faq_active`) VALUES
(1, 'Can I book Journey started bus or already In-transition buses?', 'Yes, you can book through Current Booking option in our Mobile Apps. Seats are not assured and Cancellation not allowed for current booking tickets.', 1),
(2, 'Can I Track my Bus and view on live Maps?', 'Yes, you can Track your bus through Track My Bus link and you can view exact location of your bus in map.', 1),
(3, 'Do I need to register a user account with GSRTC to book online (e-ticket)?', 'No, you can book as Guest User in all Booking modes', 0),
(4, 'Does booking online (e-ticket) cost me more?', 'No, e-ticket booking does not include any additional charges. It will cost as much as you buy a reservation ticket from the counter.', 1),
(5, 'Amount debited but ticket is not confirmed (failed transaction), what should I do?', 'Please send e-mail to erefund@mail1.gsrtc.in, mentioning e-ticket reference number or use rid registered with GSRTC and date of transaction. Reference number pops up on clicking the button \"Make payment\". User is supposed to note the displayed reference no. starting with GS. In case of success transactions reference number can be found at \'View-E-Ticket Booking History\' when you login to e-ticket booking.', 1),
(6, 'Does booking through mobile cost me more?', 'No, mobile booking does not include any additional charges. It\'s a free service.', 1),
(7, 'Is it mandatory to carry ID proof for e-ticket?', 'Yes. It is a compulsory to carry photo ID proof. Passenger is supposed to produce it at the time of boarding to conductor and to any authorized GSRTC staff during journey.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(4) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `query` varchar(500) NOT NULL,
  `feed_date` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `user_name`, `user_email`, `query`, `feed_date`) VALUES
(1, 'Satyajeet', 'satya@gmail.com', 'Best service', '30-01-19'),
(2, 'Dennis', 'issacdennis@gmail.com', '', '07-02-19'),
(3, 'Dennis', 'issacdennis@gmail.com', 'Test feedback 2', '07-02-19'),
(4, 'Dennis', 'issacdennis@gmail.com', 'Test Feedback 3', '07-02-19'),
(5, 'Bhadiyadara', 'bhadu@gmail.com', 'Test Feedback 4', '09-02-19'),
(6, 'Dennis', 'd@d.com', 'Test Feedback before sql injection', '15-03-19'),
(7, '', '', '', '15-03-19'),
(8, '', '', '', '15-03-19'),
(9, 'Dennis', 'admin@admin.com', 'dfsdf', '15-03-19'),
(10, 'Dennis', 'ambada@gmail.com', '\"\'; DELETE FROM user; /*\"', '15-03-19'),
(11, 'Kainshk', 'kanishk@gmail.com', 'Hello', '23-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `intermediate`
--

CREATE TABLE `intermediate` (
  `int_id` int(3) NOT NULL,
  `bus_id` int(3) NOT NULL,
  `city_code` int(3) NOT NULL,
  `total_km` int(4) NOT NULL,
  `total_fare` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intermediate`
--

INSERT INTO `intermediate` (`int_id`, `bus_id`, `city_code`, `total_km`, `total_fare`) VALUES
(1, 1, 8, 40, 40),
(2, 2, 11, 40, 40),
(3, 3, 13, 40, 40),
(4, 4, 11, 40, 40),
(5, 5, 3, 40, 40),
(6, 6, 2, 40, 40),
(7, 7, 6, 40, 40),
(8, 8, 13, 40, 40),
(10, 9, 3, 40, 40),
(11, 14, 11, 40, 60),
(12, 15, 13, 40, 50);

-- --------------------------------------------------------

--
-- Table structure for table `login_record`
--

CREATE TABLE `login_record` (
  `log_id` int(5) NOT NULL,
  `user_id` int(3) NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `log_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_record`
--

INSERT INTO `login_record` (`log_id`, `user_id`, `log_date`, `log_time`, `log_out`) VALUES
(1, 2, '2019-03-12', '18:06:48', '18:13:34'),
(2, 3, '2019-03-12', '18:13:46', '00:00:00'),
(3, 3, '2019-03-14', '19:21:57', '19:22:35'),
(4, 1, '2019-03-15', '02:34:55', '02:34:59'),
(5, 1, '2019-03-15', '02:52:41', '02:54:01'),
(6, 2, '2019-03-15', '08:47:36', '08:47:45'),
(7, 1, '2019-03-16', '17:27:24', '17:48:13'),
(8, 1, '2019-03-16', '17:49:03', '17:50:56'),
(9, 1, '2019-03-16', '18:13:38', '18:13:53'),
(10, 2, '2019-03-17', '11:55:14', '11:56:59'),
(11, 1, '2019-03-17', '13:35:28', '18:48:11'),
(12, 1, '2019-03-17', '18:34:12', '18:41:27'),
(13, 1, '2019-03-19', '18:17:33', '19:27:37'),
(14, 1, '2019-03-19', '19:28:43', '19:29:10'),
(15, 1, '2019-03-19', '19:29:50', '00:00:00'),
(16, 1, '2019-03-19', '19:35:19', '19:36:23'),
(17, 1, '2019-03-20', '01:34:51', '02:16:15'),
(18, 1, '2019-03-20', '02:18:17', '02:25:37'),
(19, 1, '2019-03-20', '02:26:39', '02:37:54'),
(20, 1, '2019-03-23', '01:59:29', '02:01:21'),
(21, 1, '2019-03-23', '02:07:16', '02:10:25'),
(22, 1, '2019-03-23', '18:33:59', '18:38:52'),
(23, 1, '2019-03-23', '18:41:38', '18:41:42'),
(24, 1, '2019-03-27', '16:55:59', '16:56:55'),
(25, 1, '2019-03-27', '17:01:24', '17:02:14'),
(26, 1, '2019-03-30', '04:19:01', '04:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_pri` int(4) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `bus_id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `seats` int(1) NOT NULL,
  `fare` int(5) NOT NULL,
  `travel_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_pri`, `reg_id`, `bus_id`, `name`, `email`, `age`, `gender`, `seats`, `fare`, `travel_date`) VALUES
(1, 17823545, 1, 'Dennis', 'dennis@outlook.com', 23, 'male', 4, 493, '2019-03-06'),
(2, 17823546, 7, 'Satyajeet', 'skbanna@gmail.com', 20, 'male', 5, 655, '2019-03-06'),
(3, 1551576416, 5, 'Dennis Issac', 'dennis@outlook.com', 23, 'male', 3, 735, '2019-03-06'),
(4, 1551630661, 5, 'Monali Bhagat', 'bhagat.monali@gmail.com', 23, 'female', 3, 735, '2019-03-06'),
(5, 1551635971, 2, 'Dennis Romeo Issac', 'dennis@outlook.com', 23, 'male', 4, 524, '2019-03-06'),
(6, 1551851318, 5, 'Satyajeet', 'skbanna@gmail.com', 20, 'male', 4, 980, '2019-03-06'),
(7, 1551852490, 5, 'Jini Wilson', 'jini@gmail.com', 23, 'female', 5, 1225, '2019-03-06'),
(8, 1551852556, 5, 'Satyajeet', 'skbanna@gmail.com', 20, 'male', 1, 245, '2019-03-06'),
(9, 1551852679, 5, 'Monali Bhagat', 'bhagat.monali@gmail.com', 30, 'female', 5, 1225, '2019-03-06'),
(10, 1551937253, 14, 'Vidhi Mehta', 'vidhimehta@gmail.com', 32, 'female', 4, 960, '2019-03-07'),
(11, 1551939516, 14, 'Satyajeet', 'skbanna@gmail.com', 20, 'male', 4, 960, '2019-03-07'),
(12, 1551939809, 14, 'Satyajeet Chdasama', 'skbanna@gmail.com', 19, 'male', 4, 960, '2019-03-07'),
(13, 1551939884, 14, 'Srushti Dave', 'urfterrorist@gmail.com', 18, 'female', 5, 1200, '2019-03-08'),
(14, 1551939938, 14, 'Pallavi Harsora', 'bhaneshree@gmail.com', 20, 'female', 4, 960, '2019-03-08'),
(15, 1551940426, 14, 'pallavi harsora', 'pdharsora15@gmail.com', 21, 'female', 2, 480, '2019-03-07'),
(16, 1551940426, 14, 'jini dave', 'jinidave@gmail.com', 18, 'female', 3, 720, '2019-03-07'),
(17, 1551940663, 5, 'monali', 'abc@abc.com', 30, 'female', 2, 490, '2019-03-08'),
(18, 1552020636, 14, 'Satyajeet Chudasama', 'skbanna@gmail.com', 19, 'male', 4, 960, '2019-03-09'),
(19, 1552193146, 14, 'Lali Romeo Issac', 'laliissac@gmail.com', 50, 'female', 4, 960, '2019-03-12'),
(20, 1552193215, 14, 'Dennis Romeo Issac', 'dennis@gmail.com', 23, 'male', 5, 1200, '2019-03-12'),
(21, 1552326964, 5, 'Satyajjet', 'skbanna@gmail.com', 19, 'male', 5, 1225, '2019-03-11'),
(22, 1552587689, 14, 'Dennis', 'dennis@outlook.com', 23, 'male', 5, 1200, '2019-03-15'),
(23, 1552753275, 14, 'Satyajeet', 'skbanna@gmail.com', 19, 'male', 1, 240, '2019-03-21'),
(24, 1552817675, 14, 'Dennis Romeo Issac', 'dennis@outlook.com', 23, 'male', 5, 1200, '2019-03-21'),
(25, 1552843735, 14, 'rome', 'rome110i@yahoo.co.in', 52, 'male', 3, 720, '2019-03-19'),
(26, 1553045178, 14, 'Dennis', 'dennis@outlook.com', 23, 'male', 5, 1200, '2019-03-20'),
(27, 263547236, 14, 'Dennis', 'dennis@outlook.com', 23, 'male', 47, 52333, '2019-03-23'),
(28, 1553362308, 15, 'Kainshk James', 'kanishk@gmail.com', 23, 'male', 5, 1050, '2019-03-24'),
(29, 1553362522, 15, 'Kanishk James', 'kanishk@gmail.com', 23, 'male', 4, 840, '2019-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(3) NOT NULL,
  `bus_id` int(3) NOT NULL,
  `no_seat` int(3) NOT NULL,
  `avi_seat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `bus_id`, `no_seat`, `avi_seat`) VALUES
(1, 1, 52, 52),
(2, 2, 52, 52),
(3, 3, 52, 52),
(4, 4, 52, 52),
(5, 5, 52, 52),
(6, 6, 52, 52),
(7, 7, 52, 52),
(8, 8, 52, 52),
(9, 9, 52, 52),
(10, 10, 52, 30),
(11, 11, 52, 36),
(12, 12, 52, 42),
(13, 13, 52, 8);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `bus_id` int(3) NOT NULL,
  `ori_place_code` int(3) NOT NULL,
  `dest_place_code` int(3) NOT NULL,
  `dept_time` varchar(5) NOT NULL,
  `desti_time` varchar(5) NOT NULL,
  `totalkm` int(4) NOT NULL,
  `total_fare` int(4) NOT NULL,
  `seats` int(2) NOT NULL,
  `bus_type` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`bus_id`, `ori_place_code`, `dest_place_code`, `dept_time`, `desti_time`, `totalkm`, `total_fare`, `seats`, `bus_type`) VALUES
(1, 1, 9, '12:45', '15:00', 180, 131, 52, 1),
(2, 5, 1, '13:00', '18:00', 180, 131, 52, 1),
(3, 5, 9, '12:00', '15:00', 190, 210, 52, 1),
(4, 5, 9, '10:00', '15:00', 250, 210, 52, 1),
(5, 5, 10, '09:00', '15:00', 300, 245, 52, 2),
(6, 5, 10, '10:00', '15:00', 250, 245, 52, 2),
(7, 1, 5, '12:00', '18:00', 180, 131, 52, 1),
(8, 9, 5, '12:00', '18:00', 215, 250, 52, 1),
(9, 9, 10, '12:00', '18:00', 250, 300, 52, 3),
(10, 5, 10, '10:00', '15:00', 250, 245, 52, 2),
(11, 5, 10, '10:00', '15:00', 250, 245, 52, 2),
(12, 5, 10, '10:00', '15:00', 250, 245, 52, 2),
(13, 5, 10, '10:00', '15:00', 250, 245, 52, 2),
(14, 5, 1, '9:00', '12:00', 180, 240, 52, 3),
(15, 5, 9, '9:00', '12:00', 180, 210, 52, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `username`, `email`, `pass`) VALUES
(1, 'admin', 'Admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'admin', 'Satyajeet', 'skbanna@gmail.com', '6518d49168542b92c73d741b636da2d61e987237'),
(3, 'admin', 'Dennis', 'dennis@gmail.com', '7965a665163253a12f43312bf69d07012a113a2a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bustype`
--
ALTER TABLE `bustype`
  ADD PRIMARY KEY (`bus_type_id`);

--
-- Indexes for table `citycode`
--
ALTER TABLE `citycode`
  ADD PRIMARY KEY (`city_code`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `intermediate`
--
ALTER TABLE `intermediate`
  ADD PRIMARY KEY (`int_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `city_code` (`city_code`);

--
-- Indexes for table `login_record`
--
ALTER TABLE `login_record`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_pri`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `ori_place_code` (`ori_place_code`),
  ADD KEY `dest_place_code` (`dest_place_code`),
  ADD KEY `bus_type` (`bus_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bustype`
--
ALTER TABLE `bustype`
  MODIFY `bus_type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `citycode`
--
ALTER TABLE `citycode`
  MODIFY `city_code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `intermediate`
--
ALTER TABLE `intermediate`
  MODIFY `int_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `log_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_pri` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `bus_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `intermediate`
--
ALTER TABLE `intermediate`
  ADD CONSTRAINT `intermediate_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `timetable` (`bus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `intermediate_ibfk_2` FOREIGN KEY (`city_code`) REFERENCES `citycode` (`city_code`) ON DELETE CASCADE;

--
-- Constraints for table `login_record`
--
ALTER TABLE `login_record`
  ADD CONSTRAINT `login_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `timetable` (`bus_id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `timetable` (`bus_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`ori_place_code`) REFERENCES `citycode` (`city_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`dest_place_code`) REFERENCES `citycode` (`city_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`bus_type`) REFERENCES `bustype` (`bus_type_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
