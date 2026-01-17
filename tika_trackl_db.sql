-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2026 at 02:32 PM
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
-- Database: `tika_track_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `health_id`
--

CREATE TABLE `health_id` (
  `health_id` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `history_id` int(11) NOT NULL,
  `health_id` varchar(20) DEFAULT NULL,
  `type` enum('allergy','prescription','report') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `record_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `profile_id` int(11) NOT NULL,
  `health_id` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `sms_id` int(11) NOT NULL,
  `health_id` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` enum('user','parent','doctor','nurse','admin') NOT NULL,
  `name` varchar(100) NOT NULL,
  `nid_birth` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_records`
--

CREATE TABLE `vaccination_records` (
  `record_id` int(11) NOT NULL,
  `health_id` varchar(20) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_number` int(11) DEFAULT NULL,
  `vaccination_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccine_id` int(11) NOT NULL,
  `disease_name` varchar(150) DEFAULT NULL,
  `vaccine_name` varchar(150) DEFAULT NULL,
  `total_doses` int(11) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `disease_name`, `vaccine_name`, `total_doses`, `age`) VALUES
(1, 'Tuberculosis', 'BCG', 1, 'At birth'),
(2, 'Polio', 'OPV', 4, '0, 6, 10, 14 weeks'),
(3, 'Polio', 'IPV', 2, '14 weeks, 4 years'),
(4, 'Diphtheria, Pertussis, Tetanus, Hepatitis B, Hib', 'Pentavalent', 3, '6, 10, 14 weeks'),
(5, 'Pneumococcal disease', 'PCV', 3, '6, 10, 14 weeks'),
(6, 'Measles and Rubella', 'MR', 2, '9 months, 15 months'),
(7, 'Tetanus and Diphtheria', 'Td', 2, '10 years, 15 years'),
(8, 'COVID-19', 'Pfizer-BioNTech', 2, '12+ years'),
(9, 'COVID-19', 'Moderna', 2, '18+ years'),
(10, 'COVID-19', 'AstraZeneca', 2, '18+ years'),
(11, 'COVID-19', 'Sinopharm', 2, '18+ years'),
(12, 'Hepatitis A', 'Hepatitis A', 2, '1+ years'),
(13, 'Hepatitis B', 'Hepatitis B', 3, 'All ages'),
(14, 'Typhoid', 'Typhoid Conjugate Vaccine (TCV)', 1, '6 months+'),
(15, 'Cholera', 'Oral Cholera Vaccine (OCV)', 2, '1+ years'),
(16, 'Rabies', 'Rabies Vaccine', 5, 'All ages'),
(17, 'Meningococcal meningitis', 'Meningococcal Vaccine', 1, '2+ years'),
(18, 'Human Papillomavirus', 'HPV Vaccine', 2, '9–14 years'),
(19, 'Seasonal Influenza', 'Influenza Vaccine', 1, '6 months+ (yearly)'),
(20, 'Chickenpox', 'Varicella', 2, '1+ years'),
(21, 'Measles, Mumps, Rubella', 'MMR', 2, '1+ years'),
(22, 'Japanese Encephalitis', 'JE Vaccine', 2, '9 months+'),
(23, 'Tetanus', 'TT', 5, '15–49 years (women)'),
(24, 'Pneumococcal disease', 'PPSV23', 1, '50+ years');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_id`
--
ALTER TABLE `health_id`
  ADD PRIMARY KEY (`health_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `health_id` (`health_id`);

--
-- Indexes for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `health_id` (`health_id`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nid_birth` (`nid_birth`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `health_id` (`health_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_profile`
--
ALTER TABLE `patient_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `health_id`
--
ALTER TABLE `health_id`
  ADD CONSTRAINT `health_id_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`health_id`) REFERENCES `health_id` (`health_id`);

--
-- Constraints for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD CONSTRAINT `patient_profile_ibfk_1` FOREIGN KEY (`health_id`) REFERENCES `health_id` (`health_id`);

--
-- Constraints for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  ADD CONSTRAINT `vaccination_records_ibfk_1` FOREIGN KEY (`health_id`) REFERENCES `health_id` (`health_id`),
  ADD CONSTRAINT `vaccination_records_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`vaccine_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
