-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 09:48 AM
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
-- Database: `bolam`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `document_path`) VALUES
(1, 1, 'uploads/MuscleBlaze Creatine Monohydrate CreAMP, 250 g (0.55 lb) (22).jpg'),
(2, 2, 'uploads/MuscleBlaze Creatine Monohydrate CreAMP, 250 g (0.55 lb) (22).jpg'),
(3, 4, 'uploads/photo_2024-11-17_09-09-39.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_interval` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `order_id`, `image`, `approved`, `created_at`, `name`, `price`, `description`, `date`, `time_interval`, `user_id`) VALUES
(1, NULL, '../uploads/6673d9b888794cdc3435cc36.webp', 1, '2024-11-18 14:23:54', 'Vaccination for dogs', 1900.00, 'Vaccination that protects your dogs against canine distemper-parvovirus, parainfluenza , adenovirus,laptoesparesi, corona and rabies virus.', '2024-11-19', '1pm-4pm', 4),
(2, NULL, '../uploads/compiler.png', 1, '2024-11-18 14:32:21', 'Barbara Dillard', 696.00, 'Eum neque voluptatib', '1974-11-04', 'Et accusamus odit en', 4),
(3, NULL, '../uploads/665314ed87f3dd0b77df1fbe.webp', 1, '2024-11-18 15:39:39', 'Umesh Plumber', 2000.00, 'Hire a plumber involves all kinds of plumbing work', '2024-11-18', '1pm-4pm', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `citizenship_number` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','vendor') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `age`, `address`, `email`, `phone`, `citizenship_number`, `password`, `role`, `created_at`) VALUES
(1, 'Virginia Holder', 'mynes', 72, 'Quo expedita debitis', 'xyzemycite@mailinator.com', '+1 (958) 358-4204', '222', '$2y$10$s20HKa5qBmKOD42pjsIWI.9GLmlQtnNEYM/MgFnKcaLfyY5b1mptK', '', '2024-11-18 13:53:28'),
(2, 'Jelani Turner', 'syjov', 97, 'Tempor ab porro rem ', 'wunizo@mailinator.com', '+1 (958) 375-5139', '223', '$2y$10$w5xQhubE/GryjOB4MBm37eK4VfJypI9i4doXKb6Si5KM75TShMiEK', 'vendor', '2024-11-18 13:53:58'),
(4, 'Reuben Villarreal', 'tasida', 62, 'Itaque eius sit eum ', 'bodo@mailinator.com', '+1 (842) 955-2285', '742', '$2y$10$5jELePIhq0IY0UuXhVjSA.POUXWgp0SaV0UVfB5bQ1UFcHLVG5jVK', 'vendor', '2024-11-18 13:54:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
