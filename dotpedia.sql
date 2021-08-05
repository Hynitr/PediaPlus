-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 05:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotpedia`
--

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
(1, 'DotPedia | Take a Test', 'demo', '8f96e4f5fcff936298f13a4b8db8a242', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `sn` text NOT NULL,
  `inst` text NOT NULL,
  `typ` text NOT NULL,
  `title` text NOT NULL,
  `fcg` text NOT NULL,
  `dept` text NOT NULL,
  `level` text NOT NULL,
  `upld` text NOT NULL,
  `dwnld` text NOT NULL,
  `approve` text NOT NULL,
  `filer` text NOT NULL,
  `earn` int(11) NOT NULL,
  `pedia` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `sn`, `inst`, `typ`, `title`, `fcg`, `dept`, `level`, `upld`, `dwnld`, `approve`, `filer`, `earn`, `pedia`, `code`) VALUES
(36, '1', 'sbdb', 'University', 'sdbdb', 'babdsb', 'bsbdb', '100 Level', 'DotPedia', '100', 'Yes', 'CERTIFICATE - DOTEIGHTPLUS.pdf', 2, 'pedia3479', ''),
(37, '1', 'bvbvbv', 'College of Education', 'cvvccvc', 'vccvcv', 'vbvbvb', '100 Level', 'DotPedia', '', 'Yes', 'Resume-Abolade-Greatness.pdf', 2, 'pedia5062', 'bvbvbv'),
(38, '1', 'nncdn', 'University', 'NNN', 'ncncn', 'ncncn', 'ND 2', 'DotPedia', '19', 'Yes', 'TEAGO_Brand-Identity.pdf', 2, 'pedia932', 'ncnn');

-- --------------------------------------------------------

--
-- Table structure for table `pq`
--

CREATE TABLE `pq` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `inst` text NOT NULL,
  `typ` text NOT NULL,
  `title` text NOT NULL,
  `fcg` text NOT NULL,
  `dept` text NOT NULL,
  `level` text NOT NULL,
  `upld` text NOT NULL,
  `dwnld` text NOT NULL,
  `approve` text NOT NULL,
  `filer` text NOT NULL,
  `earn` text NOT NULL,
  `pedia` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pq`
--

INSERT INTO `pq` (`id`, `sn`, `inst`, `typ`, `title`, `fcg`, `dept`, `level`, `upld`, `dwnld`, `approve`, `filer`, `earn`, `pedia`, `code`) VALUES
(2, 1, 'bxbxbbxb', 'University', 'bcbcbcbc', 'cbcb', 'cbcb', '100 Level', 'DotPedia', '27', 'Yes', 'Resume-Abolade-Greatness.pdf', '4', 'pedia7195', 'bbcb');

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
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `activator` text NOT NULL,
  `fname` text NOT NULL,
  `usname` text NOT NULL,
  `email` text NOT NULL,
  `pword` text NOT NULL,
  `datereg` date NOT NULL,
  `active` text NOT NULL,
  `tel` text NOT NULL,
  `inst` text NOT NULL,
  `pdfcredit` text NOT NULL,
  `withdraw` text NOT NULL,
  `pix` text NOT NULL,
  `vrf` text NOT NULL,
  `ref` text NOT NULL,
  `pvf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `sn`, `activator`, `fname`, `usname`, `email`, `pword`, `datereg`, `active`, `tel`, `inst`, `pdfcredit`, `withdraw`, `pix`, `vrf`, `ref`, `pvf`) VALUES
(1, 81, '', 'Abolade Greatness', 'DotPedia', 'mydotpedia@gmail.com', '53c1df01e11ec01bcf9ced4ccae8c667', '2021-07-10', '1', '981036', 'FUOYE', '9991', '0', 'hero-img.png', 'Yes', '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `upld` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pq`
--
ALTER TABLE `pq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pq`
--
ALTER TABLE `pq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
