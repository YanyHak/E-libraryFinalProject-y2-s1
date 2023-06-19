-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 06:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pro_img` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `age`, `gender`, `phone`, `email`, `password`, `pro_img`) VALUES
(2, 'admin', 22, 'Female', '0984887', 'admin@gmail.com', 'Test@123', 'uploads/hack-khaby.gif');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `AuthorID` int(11) NOT NULL,
  `AuthorName` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `PinCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthorID`, `AuthorName`, `Address`, `City`, `Country`, `PinCode`) VALUES
(2, 'bela', 'kl', 'Siem Reap', '     Cambodia', '94849'),
(3, 'dara', 'kombol', 'chicao', 'london', '0489'),
(4, 'srey Ma', 'kom', 'ks', 'thai', 'e849'),
(8, 'wern', 'ht', 'js', 'Lao', '40945'),
(9, 'jio', 'abc', 'dfg', 'Thailand', 'B1234'),
(10, 'Kio', 'jong', 'dfg', ' Cambodia', 'B1235');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_category` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_publisher` varchar(100) NOT NULL,
  `book_status` varchar(10) NOT NULL,
  `books_image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_category`, `book_author`, `book_publisher`, `book_status`, `books_image`) VALUES
(1, 'Basic code css', '3', '4', '', 'Y', 'uploads/CSS-Duckett-cover.jpg'),
(2, 'Basic java', '1', '3', '3', 'N', 'uploads/s_hero2x.png'),
(3, 'Advance  php', '2', '2', '5', 'N', 'uploads/advance-php.jpg\r\n'),
(4, 'java I', '1', '2', '2', 'Y', 'uploads/250px-Java_Programming_Cover.jpg'),
(5, 'PHP II', '2', '4', '5', 'Y', 'uploads/download.jpg'),
(6, 'basic css', '3', '4', '1', 'Y', ' uploads/cssmine-ebook-cover-3d.png');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `issue_id` int(11) NOT NULL,
  `issue_name` varchar(100) NOT NULL,
  `issue_book` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `issue_status` char(10) NOT NULL,
  `return_day` date NOT NULL,
  `fine` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`issue_id`, `issue_name`, `issue_book`, `issue_date`, `return_date`, `issue_status`, `return_day`, `fine`) VALUES
(11, '2', '1', '2023-03-26', '2023-04-15', 'Y', '2023-03-28', NULL),
(78, '8', '2', '2023-04-11', '2023-05-01', 'N', '2023-04-18', NULL),
(79, '7', '3', '2023-04-12', '2023-05-02', 'N', '2023-04-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(2, 'PHP I'),
(3, 'HTML'),
(5, 'law');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PublisherID` int(11) NOT NULL,
  `PublisherName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherID`, `PublisherName`) VALUES
(1, 'soksoma'),
(2, 'nan'),
(3, 'Tai'),
(5, 'John');

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE `request_book` (
  `request_id` int(11) NOT NULL,
  `request_name` varchar(100) NOT NULL,
  `request_book` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(100) NOT NULL,
  `receive_day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_book`
--

INSERT INTO `request_book` (`request_id`, `request_name`, `request_book`, `request_date`, `request_status`, `receive_day`) VALUES
(11, '1', '3', '2023-03-27', 'Y', NULL),
(12, '2', '6', '2023-03-28', 'N', NULL),
(14, '8', '4', '2023-04-06', 'N', NULL),
(16, '1', '5', '2023-04-15', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `return_days` int(11) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `return_days`, `fine`) VALUES
(1, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `studentGender` varchar(100) NOT NULL,
  `studentAge` int(11) NOT NULL,
  `studentCalss` varchar(100) NOT NULL,
  `studentPhone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pro_img` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `studentGender`, `studentAge`, `studentCalss`, `studentPhone`, `email`, `password`, `pro_img`) VALUES
(2, 'kaka', 'female', 21, 'B123', '0983847', 'kaka@gmail.com', '4994f', 'uploads/istockphoto-1173805290-612x612.jpg'),
(4, 'sasa', 'Male', 22, 'A236', '0984757', 'sa168@gmail.com', '5555', 'uploads/alan-turing-greg-joens.jpg'),
(7, 'ham', 'Female', 21, 'A232', '0984757', 'ham@gmail.com', '345', 'uploads/360_F_314065916_W0GSc7ucoh5frt233zaSyGUdoWhxKoZg.jpg'),
(8, 'HengKa', 'Female', 18, 'A236', '0349847', 'hengka@gmail.com', '9999', 'uploads/tumblr_p1wfbmsMqK1vgryixo1_1280.jpg'),
(12, 'ah', 'Male', 21, 'B123', '0349847', 'a@gmail.com', '5555', 'uploads/logic.jpg'),
(13, 'da', 'Female', 21, 'B123', '0349847', 'da@gmail.com', '456', 'uploads/cute girl.jpg'),
(14, 'Sasa', 'Female', 21, 'B123', '0349847', 'sa@gmail.com', '456', 'uploads/01a9f3740fc249cb830c.jpg'),
(15, 'Bopha', 'Female', 21, 'B123', '0984757', 'bopha333@gmail.com', '345', 'uploads/5e0a443a972750adbf6882f159335a8d.jpg'),
(16, 'Kaka', 'female', 19, 'B122', '0399484', 'kaka123@gmail.com', '49945', 'uploads/pic6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PublisherID`);

--
-- Indexes for table `request_book`
--
ALTER TABLE `request_book`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_book`
--
ALTER TABLE `request_book`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
