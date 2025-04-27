-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 05:59 AM
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
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `name`, `password`, `email`) VALUES
(1, 'Bhalgama Smit', '226090307003', 'smit@gmail.com'),
(2, 'Chanpura Keyur', '226090307006', 'keyur@gmail.com'),
(3, 'Chanpura Shivam', '226090307007', 'shivam@gmail.com'),
(4, 'Gondaliya Parth', '226090307031', 'parth@gmail.com'),
(5, 'Maheriya Hardik', '226090307064', 'hardik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(5) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `author_email` varchar(50) NOT NULL,
  `author_number` varchar(20) NOT NULL,
  `author_city` varchar(50) NOT NULL,
  `author_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_email`, `author_number`, `author_city`, `author_img`) VALUES
(3, 'ayush patel', 'ayush@gmail.com', '7894562350', 'vadodra', 'New folder1/Clifford Stein.jpg'),
(4, 'chaudhri rudraraj', 'rudra@gmail.com', '1278459630', 'surendrangar ', 'New folder1/Daniel Lokshtanov.jpeg.jpg'),
(5, 'david s.', 'dvid@gmail.com', '9631245780', 'anand', 'New folder1/David S.jpg'),
(6, 'shivam', 'shivam@gmail.com', '9857461320', 'kach', 'New folder1/Doughlas West.jpeg.jpg'),
(7, 'neha c.', 'neha@gmaail.com', '7865493012', 'dwarka', 'New folder1/Eva Tardos.jpeg.jpg'),
(8, 'ankit', 'ankit@gmail.com', '4598763120', 'saberkatha', 'New folder1/Geoffrey Grimmett.jpeg.jpg'),
(10, 'vishvas', 'vishvas@gmail.com', '9857643120', 'bhuj', 'New folder1/harles E Leiserson.jpeg.jpg'),
(11, 'narendra', 'narendra@gmail.com', '7598460213', 'rajkot', 'New folder1/images.jpeg.jpg'),
(12, 'dev', 'dev@gmail.com', '9578624310', 'valsad', 'New folder1/Jon Kleinberg.jpeg.jpg'),
(13, 'hardik', 'hardik@gmail.com', '9578641230', 'vakaner', 'New folder1/Kenneth Rosen.jpeg.jpg'),
(14, 'harsh', 'harsh@gmail.com', '9871235460', 'morbi', 'New folder1/Michael Mitzenmache.jpeg.jpg'),
(15, 'samir', 'samir@gmail.com', '7865493210', 'Bhavnagar ', 'New folder1/Michael Sipser.jpg'),
(16, 'faizan', 'faizan@gmail.com', '8745693210', 'bad dwarka', 'New folder1/photoNormal.jpeg.jpg'),
(17, 'mahi', 'mahi@gmail.com', '8795462130', 'Ahmedabad ', 'New folder1/Nielsen and Chuang.jpeg.jpg'),
(18, 'rutul', 'rutul@gmail.com', '7845996230', 'Rajkot ', 'New folder1/Ran El-Yaniv.jpg'),
(19, 'parth', 'parth@gmail.com', '8874522056', 'banashkantha', 'New folder1/Ronarld l rivest.jpeg.jpg'),
(20, 'sahil', 'sahil@gmail.com', '8875548749', 'danavada', 'New folder1/RonGraham.jpg'),
(21, 'dinesh', 'dinesh@gmail.com', '9099334561', 'surendrangar ', 'New folder1/Sanjeev Arora.jpg'),
(22, 'het', 'het@gmail.com', '7785544849', 'anand', 'New folder1/Scott Aaronson.jpg'),
(23, 'nigam', 'nigam@gmail.com', '8855226644', 'kach', 'New folder1/Silberschatz.jpeg.jpg'),
(24, 'vinu', 'vinu@gmail.com', '8845566799', 'vadodra', 'New folder1/Tim Roughgarden.jpg'),
(30, 'samir shah', 'samirs@gmail.com', '7845103690', 'surendrangar', 'Newfolder/Geoffrey Grimmett.jpeg.jpg'),
(34, 'Shivam', 'shivam@gmail.com', '9016880648', 'Surendranagar', 'New folder1/shivam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(10) NOT NULL,
  `sem` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `b_price` int(10) NOT NULL,
  `b_image` varchar(200) NOT NULL,
  `b_description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `sem`, `subject`, `b_price`, `b_image`, `b_description`) VALUES
(1, 1, 'python', 125, 'Newfolder/book4.jpg', '2rdwsa'),
(2, 1, 'mathemetics', 150, 'Newfolder/a1.jpg', 'book is good'),
(3, 1, 'communication skill and English ', 105, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.56_ed919b2b.jpg', 'english communication book\r\n'),
(4, 1, 'basic computer programing', 125, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.57_82e61b18.jpg', 'c programing book'),
(5, 1, 'fundamental of electrical and electronics', 145, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.57_ba9aa9ea.jpg', 'elctrical and electronics book'),
(6, 1, 'environment and sustainable ', 135, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.57_d3043446.jpg', 'environment book'),
(7, 2, 'mathemetics', 40, 'Newfolder/math.jpg', 'mathemetics book'),
(8, 2, 'basic object oriented programming ', 135, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.55_0f455c64.jpg', 'c++ programing book'),
(9, 2, 'physics', 165, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.56_e4082478.jpg', 'physics book'),
(10, 3, 'data structure and algorithm ', 140, 'Newfolder/data.webp', 'data structure'),
(11, 3, 'python', 225, 'Newfolder/images.jpeg', 'python programming book'),
(12, 3, 'operating system', 145, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.54_dcd47615.jpg', 'operaating system book'),
(13, 3, 'rdbms', 125, 'Newfolder/WhatsApp Image 2024-07-12 at 16.50.55_f9c817da.jpg', 'database book'),
(14, 4, 'software engineering ', 165, 'Newfolder/61j6abm-N2L._SY342_.jpg', 'software book'),
(15, 4, 'computer network ', 195, 'Newfolder/download (7).jpeg', 'network book'),
(16, 4, 'php', 185, 'Newfolder/download (8).jpeg', 'php programming book'),
(17, 4, 'introduction to personality development ', 175, 'Newfolder/download.jpeg', 'perosnality development book'),
(18, 4, 'advance object oriented programming ', 165, 'Newfolder/oop.jpg', 'java programing book'),
(19, 5, 'fundamental of artificial intelligence and machine', 155, 'Newfolder/51oyUk5EoaL._AC_UF1000,1000_QL80_.jpg', 'machin learning book'),
(20, 5, 'android ', 145, 'Newfolder/61WdNvkKSJL._AC_UF1000,1000_QL80_.jpg', 'android book'),
(21, 5, 'computer organization and architecture ', 135, 'Newfolder/71rS+bjv8PL._AC_UF1000,1000_QL80_.jpg', 'computer architecture book '),
(22, 5, 'machine learning ', 125, 'Newfolder/download (1).jpeg', 'machine learning book'),
(23, 5, 'web base java programing', 115, 'Newfolder/download (2).jpeg', 'web base java programing book'),
(24, 6, 'computer maintenance and troubleshooting ', 115, 'Newfolder/download (3).jpeg', 'computer maintenance and troubleshooting book'),
(25, 6, 'basic of information security ', 125, 'Newfolder/download (4).jpeg', 'basic of information security book'),
(26, 6, 'fundamental of iot', 135, 'Newfolder/download (5).jpeg', 'fundamental of iot book');

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `b_id`, `method`, `card_number`, `card_name`, `expiry_date`, `cvv`, `amount`, `created_at`) VALUES
(78, 23, '', '226090307064', 'maheriya hardik', '06/2026', '335', 115.00, '2025-04-24 14:49:34'),
(79, 2, '', '226090304655', '11', '11111', '111', 150.00, '2025-04-24 14:50:30'),
(81, 2, '', '1234567890159951', 'hardik', '04/12', '123', 150.00, '2025-04-25 03:58:18'),
(82, 3, '', '123456789123', 'parth', '02/26', '023', 105.00, '2025-04-25 04:12:38'),
(83, 3, '', '13456788', '1232456588', '123', '123', 105.00, '2025-04-25 06:49:18'),
(84, 3, '', '1234567891234567', 'maheriya hardik', '06/26', '123', 105.00, '2025-04-25 06:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `b_id`, `order_date`) VALUES
(1, 2, 18, '2025-04-24 20:38:19'),
(2, 1, 20, '2025-04-24 20:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `feedback` mediumtext NOT NULL,
  `rate` int(10) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `u_id`, `feedback`, `rate`, `r_name`, `r_email`) VALUES
(1, 1, 'keyur@gmail.com', 4, 'abc', 'Chanpura keyur Dineshkumar '),
(2, 2, 'shivamchanpura@gmail.com', 3, 'good', 'shivam'),
(3, 5, 'harsh@gmail.com', 5, 'very good', 'harsh'),
(4, 6, 'hardik@gmail.com', 2, 'good', 'hardik'),
(5, 7, 'happy@gmail.com', 3, 'excellent ', 'happy'),
(6, 9, 'mihir@gmail.com', 4, 'good\r\n', 'mihir'),
(7, 10, 'ankit@gmail.com', 4, 'good', 'ankit'),
(8, 11, 'mitesh@gmail.com', 1, 'good', 'mitesh rathod'),
(9, 12, 'xyz@gmail.com', 2, 'good', 'xyz'),
(10, 13, 'abc@gmail.com', 3, 'good', 'abc'),
(14, 1, 'qq', 1, 'maheriya hardik', 'maheriyahardiksureshbhai2007@gmail.com'),
(15, 1, 'good', 5, 'hardik', 'hardik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(5) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `phno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `email`, `password`, `phno`) VALUES
(1, 'Bhalgama Smit', 'smit@gmail.com', 'smit', '9428475530'),
(2, 'Chanpura Keyur', 'keyur@gmail.com', 'keyur', '9825389178'),
(3, 'Chanpura Shivam', 'shivam@gmail.com', 'shivam', '7046390769'),
(4, 'Gondaliya Parth', 'parth@gmail.com', 'parth', '8320590204'),
(5, 'Maheriya Hardik', 'hardik@gmail.com', 'hardik1', '9016880649'),
(59, 'test', 'test@gmail.com', 'test', '9016880649'),
(60, 'abhi', 'abhi@gmail.com', 'abhi', '9428291394');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD CONSTRAINT `credit_cards_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `books` (`b_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `books` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
