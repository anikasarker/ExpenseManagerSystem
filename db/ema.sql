-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 08:07 PM
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
-- Database: `ema`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `budget_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `category_id`, `budget_amount`) VALUES
(2, 12, 15000),
(4, 18, 4000),
(6, 5, 5000),
(7, 19, 2000),
(8, 11, 8000),
(9, 13, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_purpose`) VALUES
(5, 'Study', 'expense'),
(6, 'Salary', 'income '),
(7, 'Pocket-money', 'income '),
(8, 'Savings', 'expense    '),
(10, 'Commission', 'income '),
(11, 'Medical', 'expense'),
(12, 'Grocery', 'expense'),
(13, 'Education', 'expense'),
(17, 'Clothing', 'expense'),
(18, 'Entertainment', 'expense'),
(19, 'Households', 'expense'),
(20, 'Charity', 'expense');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_amount` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `expense_details` varchar(255) NOT NULL,
  `expense_receipt` varchar(255) NOT NULL,
  `expense_date` varchar(255) NOT NULL,
  `expense_month` varchar(255) NOT NULL,
  `expense_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_amount`, `category_id`, `expense_details`, `expense_receipt`, `expense_date`, `expense_month`, `expense_year`) VALUES
(2, 2000, 11, 'No details', 'receipt.png', '2023-09-05', '09', '23'),
(3, 10000, 12, 'No details', 'receipt.png', '2023-09-18', '09', '23'),
(5, 8000, 13, 'No', 'receipt.png', '2023-09-22', '09', '23');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `income_amount` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `income_details` varchar(255) NOT NULL,
  `income_receipt` varchar(255) NOT NULL,
  `income_date` varchar(255) NOT NULL,
  `income_month` varchar(255) NOT NULL,
  `income_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `income_amount`, `category_id`, `income_details`, `income_receipt`, `income_date`, `income_month`, `income_year`) VALUES
(9, 40000, 6, 'No details', 'receipt.png', '2023-09-14', '09', '23'),
(11, 3000, 7, 'No details', 'receipt.png', '2023-09-10', '09', '23'),
(12, 7000, 7, 'no', 'receipt.png', '2023-08-24', '09', '23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`) VALUES
(7, ' User1', 'user1@gmail.com', '123', 'download (1).jpg'),
(8, ' Sarker', 'sarker@gmail.com', '1234', 'images (1).png'),
(9, ' Sarker A', 'sarkera@gmail.com', '  1234', 'images.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
