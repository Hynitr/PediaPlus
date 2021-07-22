-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 03:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic one_mock exam`
--

CREATE TABLE `basic one_mock exam` (
  `id` int(255) NOT NULL,
  `sn` tinytext DEFAULT NULL,
  `question` tinytext DEFAULT NULL,
  `oa` tinytext DEFAULT NULL,
  `ob` tinytext DEFAULT NULL,
  `oc` tinytext DEFAULT NULL,
  `od` tinytext DEFAULT NULL,
  `correct` tinytext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic one_mock exam`
--

INSERT INTO `basic one_mock exam` (`id`, `sn`, `question`, `oa`, `ob`, `oc`, `od`, `correct`) VALUES
(1, '1', 'The boy must apologise _____ the lady', 'For ', 'At', 'To', 'By', 'To'),
(2, '2', 'The man is an authority_____ flowers', 'By', 'Of ', 'Over ', 'Against', 'Over '),
(3, '3', 'The mother was proud ______ her sons success', 'Of ', 'On ', 'For ', 'Over', 'Of '),
(4, '4', 'He placed the bat _____ the wall', 'Against ', 'Over', 'On', 'Near', 'Near'),
(5, '5', 'It is an exception _____ the rule', 'For ', 'By ', 'To ', 'Of ', 'To '),
(6, '6', 'My cousin put the book _____ the drawer', 'On', 'Beyond ', 'Along ', 'Unto', 'On'),
(7, '7', 'That is the boy ______ broke the  Window', 'Whom', 'Who', 'Whose', 'Which', 'Who'),
(8, '8', 'That is the boy ______ I saw breaking the window ', 'Which', 'Whom', 'Who', 'Whosever', 'Whom'),
(9, '9', 'Albert died _____ his own hand', 'With ', 'On', 'Of', 'Over', 'With '),
(10, '10', 'John bought his book ______ one hundred naira', 'At', 'For', 'With', 'On', 'For');

-- --------------------------------------------------------

--
-- Table structure for table `common entrance exam`
--

CREATE TABLE `common entrance exam` (
  `id` int(255) NOT NULL,
  `sn` tinytext DEFAULT NULL,
  `question` tinytext DEFAULT NULL,
  `oa` tinytext DEFAULT NULL,
  `ob` tinytext DEFAULT NULL,
  `oc` tinytext DEFAULT NULL,
  `od` tinytext DEFAULT NULL,
  `correct` tinytext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `common entrance exam`
--

INSERT INTO `common entrance exam` (`id`, `sn`, `question`, `oa`, `ob`, `oc`, `od`, `correct`) VALUES
(1, '1', 'Add 17+13', '20', '30', '40', '10', '30'),
(2, '2', '640&divide;8', '70', '80', '50', '60', '80'),
(3, '3', '1001&times;13', '1313', '13103', '31101', '1301', '1301'),
(4, '4', '2835&divide;7', '45', '415', '504', '405', '405'),
(5, '5', '101-86', '25', '15', '16', '17', '15'),
(6, '6', '#3.00-#1.75', '#1.25', '#1.75', '#1.50', '#2.00', '#1.25'),
(7, '7', '2002+101', '2003', '2103', '2130', '3102', '2103'),
(8, '8', '6045&divide;15', '904', '49', '403', '94', '403'),
(9, '9', '4.01-2.75', '1.36', '1.26', '2.16', '2.61', '1.26'),
(10, '10', '1/2+1/3+1/4', '1 1/2', '9/12', '3/4', '1', '1 1/2'),
(11, '11', 'Find 65% of 140', '68', '81', '91', '101', '91'),
(12, '12', '3 1/5+2/3 of 1 1/5', '4', '5', '5 1/5', '6 1/15', '4'),
(13, '13', '1.01+32.2+01', '33.22', '22.33', '22.03', '32.32', '33.22'),
(14, '14', '3 2/3  1/3&times;1 1/5', '4', '5', '3 4/15', '6', '3 4/15'),
(15, '15', 'I spent 2/3 of my money and had #10.00 left. How much had I ?', '#30', '#20', '#15', '#5', '#30'),
(16, '16', 'Simplify 8/5 x 4/7 x 10/16', '8/5', '3/4', '4/7', '1', '4/7'),
(18, '17', 'If 3/5 = x/35, what is x', '21', '9', '7', '15', '21'),
(19, '18', 'In 1977 obi was four times his sons age. If his son was 10 years old in 1980 what was obis age in 1982 ?', '23', '26', '45', '33', '33'),
(20, '19', 'Find the simple interest on #720.00 at 2.5 for 4 years ', '#144', '#72', '#120', '#108', '#72'),
(21, '20', 'Write 3.0618 correct to 3 decimal places .', '3.62', '.062', '3.062', '3.061', '3.062'),
(22, '21', 'Expresss 3/5 as a percentage ', '80%', '75%', '50%', '60%', '60%'),
(23, '22', 'What is the ratio of 36 to 45 ', '4:5', '5:4', '8:9', '3:5', '4:5'),
(24, '23', 'What are the prime numbers between 3 and 10 ?', '5,7,9', '5,7', '7,9', '3,5,7', '5,7'),
(25, '24', 'The average of three numbers is 25. Two of them are 45 and 16 respectively. Find the third number ', '30', '14', '18', '25', '14'),
(26, '25', 'Multiply 2.012 by 0.05 and write the answer correct to 2 significant figure', '0.01 ', '1.01', '0.10', '1.60', '0.10'),
(27, '26', 'Two of the prime factors of 36 are 2 and 3. Find the other prime factors ', '2,9', '3,4', '2,3', '6,6', '2,3'),
(28, '27', 'Express 3/13 as a decimal correct to 2 place of decimal', '0.23', '0.32', '.31', '0.26', '0.23'),
(29, '28', 'A piece of work is done by 12 men in 9 days. How many people can do the work in 12 days ?', '18', '6', '15', '9', '9'),
(30, '29', 'How many seconds are there in 8 minutes 12 seconds ?', '512 seconds ', '500 seconds', '492 seconds ', '490 seconds', '492 seconds '),
(31, '30', 'There are 750 students in a college. If 70% of them are girls,how many are boys ?', '225', '310', '490', '525', '525'),
(32, '31', 'In a village of people infected with HIV in 2001 were 100. In 2004,205 people were infected.find the ratio of those infected in 2002 to those infected in 2004.', '1:5', '2:5', '3:5', '5:1', '2:5'),
(33, '32', 'Increase 80 by 10%', '8', '10', '80', '88', '8'),
(34, '33', 'Odiri bought 12 cartons of biscuit for 3000 find the cost of 7 Coltons the', '#250', '#442', '#840', '#1750', '#1750'),
(35, '34', 'Reduce 36/100 to its lowest term', '3/10', '6/10', '9/20', '9/25', '9/25'),
(36, '35', 'A man earns #5000 for 10 days work .How should he earn in 14 days, if working at the same rate ', '#12,000', '#10,000', '#7,000', '#700', '#7,000'),
(37, '36', 'Simplify 2x - x + 4x', '3x', '4x', '5x', '6x', '5x'),
(38, '37', 'Convert 0.025 to decimal fraction', '1/10', '1/20', '1/30', '1/44', '1/10'),
(39, '38', 'How many hours and minutes are there between 9.30am and 1.50pm ? ', '2 hours 20 minutes i', '3 hours 20 minutes', '4 hours 20 minutes', '6 hours 20 minutes ', '4 hours 20 minutes'),
(40, '39', 'Find the value of x in the equation 3x + 1 = x + 9', '1', '2', '3', '4', '4'),
(41, '40', 'Find the value of t in the equation 3t - 5 = t + 15', '-20', '-10', '5', '10', '5'),
(42, '41', 'Find the value of x in the equation 5x - 3 = 2x +12', '-5', '0', '5', '10', '5'),
(43, '42', 'The marks scored in a test by ten pupils are as follows : 15,14,15,13,16,16,16,17,13,16,17 find the modal mark.', '13', '14', '15', '16', '16'),
(44, '43', 'Which is greater ? ', '-20', '-4', '-3', '0', '0'),
(45, '44', 'Find the median of this data : 2,3,2,4,5,3,2,6,5', '3', '2', '6', '5', '5'),
(46, '45', 'A six sided polygon is known as', 'Semi quaver', 'Octagon', 'Hexagon', 'Pentagon', 'Hexagon'),
(47, '46', 'Find the mean of the data: 10,12,11,10,7,6,7', '7', '8', '9', '10', '9'),
(48, '47', 'Find the median of the data : 10 , 12, 11, 10 , 7, 6 , 7', '7', '8', '9', '10', '10'),
(49, '48', 'A shape with many lines of symmetry is ______', 'Square ', 'Triangle ', 'Sphere ', 'Pyramid', 'Pyramid'),
(50, '49', 'Express the ratio of 12 to 30 in its simplest form', '1:3', '2:5', '3:4', '3:5', '3:5'),
(51, '50', 'A square has how many lines of symmetry ', '4', '3', '2', '1', '4'),
(52, '51', 'If 9y - (4y+y) = 24. Find the value of y', '20', '18', '11', '6', '6'),
(53, '52', 'What is the value of 8% of 1000k ? ', '#80', '#8', '80k', '8k', '80k'),
(54, '53', 'If x + 35 = 350,find the value of a', '335', '315', '300', '10', '315'),
(55, '54', 'If 4b = 24 what is b', '20', '15', '6', '4', '6'),
(56, '55', 'Y x Y x Y = 27 find the value of   Y', '13', '9', '6', '3', '3'),
(57, '56', 'What is the value of the digit 4 in the number 246,685', '400,000', '40,000', '4,000', '400', '40,000'),
(58, '57', 'If A= 2,B = 3 and M = 5 what is the value of   AM + A/ M - B', '3', '6', '9', '12', '6'),
(59, '58', 'Convert 50% to a fraction and multiply the result by 40', '80', '40', '10', '20', '20'),
(60, '59', 'The value of x that makes 24/x = 8 true is just', '3', '8', '16', '32', '3'),
(61, '60', 'I buy 7m of clothes costing #136 each how much change do I get from #1000', '#26', '#32', '#48', '#16', '#48');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `school` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `acesscode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `school`, `username`, `password`, `acesscode`) VALUES
(1, 'Demo CBT', 'demo', '7e36723822df1cadd0cc888e0681d37b', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `stud_id` text NOT NULL,
  `names` text NOT NULL,
  `subject` text NOT NULL,
  `year` year(4) NOT NULL,
  `tstart` text NOT NULL,
  `score` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `hour` text NOT NULL,
  `min` text NOT NULL,
  `attempt` int(10) NOT NULL,
  `instruct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `subject`, `hour`, `min`, `attempt`, `instruct`) VALUES
(75, 'common entrance exam', '1', '0', 50, ''),
(76, 'basic one_mock exam', '0', '10', 10, '<p>1. Attempt all question</p><p>2. Stay away from any form of examination malpratice</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic one_mock exam`
--
ALTER TABLE `basic one_mock exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common entrance exam`
--
ALTER TABLE `common entrance exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic one_mock exam`
--
ALTER TABLE `basic one_mock exam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `common entrance exam`
--
ALTER TABLE `common entrance exam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
