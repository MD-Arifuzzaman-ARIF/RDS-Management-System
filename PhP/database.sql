-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2024 at 11:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `advising`
--

CREATE TABLE `advising` (
  `advising_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `timings` varchar(100) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent','late') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `course_id`, `attendance_date`, `status`) VALUES
(1, 1, 1, '2024-04-01', 'present'),
(2, 1, 2, '2024-04-01', 'absent'),
(3, 2, 1, '2024-04-01', 'late'),
(4, 3, 1, '2024-04-01', 'present'),
(5, 3, 2, '2024-04-01', 'absent'),
(6, 4, 2, '2024-04-01', 'late'),
(7, 4, 3, '2024-04-01', 'present'),
(8, 5, 2, '2024-04-01', 'present'),
(9, 6, 3, '2024-04-01', 'absent'),
(10, 7, 1, '2024-04-01', 'late'),
(11, 8, 3, '2024-04-01', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_description`, `user_id`) VALUES
(1, 'CSE482', 'Advanced Database Management System', 'This course covers advanced topics in database management systems including relational algebra, SQL, indexing, query optimization, transaction management, and concurrency control.', 1),
(2, 'CSE428L', 'Software Engineering Lab', 'This lab course provides hands-on experience in software engineering principles and practices. Students will work on real-world projects applying software engineering methodologies.', 2),
(3, 'MAT250', 'Linear Algebra', 'This course introduces fundamental concepts in linear algebra, including vector spaces, linear transformations, matrices, determinants, eigenvalues, and eigenvectors.', 3),
(4, 'ENG110', 'English Composition', 'This course focuses on developing writing skills, including grammar, syntax, and composition.', 1),
(5, 'CHEM210', 'Organic Chemistry', 'This course covers the fundamental principles of organic chemistry, including nomenclature, structure, and reactions.', 1),
(6, 'BIO450', 'Molecular Biology', 'This course explores the molecular basis of biological processes, including DNA replication, transcription, and translation.', 2),
(7, 'MAT202', 'Calculus II', 'This course builds upon the concepts introduced in Calculus I, focusing on techniques of integration, sequences, and series.', 2),
(8, 'EEE305', 'Digital Signal Processing', 'This course covers the analysis and processing of digital signals, including filtering, modulation, and spectral analysis.', 2),
(9, 'PHY301', 'Quantum Mechanics', 'This course introduces the principles of quantum mechanics, including wave-particle duality, Schrödinger\'s equation, and quantum operators.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_evaluation`
--

CREATE TABLE `faculty_evaluation` (
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `teachings` enum('excellent','good','average','poor') NOT NULL,
  `enjoy` enum('yes','no') NOT NULL,
  `useful` enum('very','somewhat','not') NOT NULL,
  `up_to_date` enum('yes','no') NOT NULL,
  `recommend` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_evaluation`
--

INSERT INTO `faculty_evaluation` (`course_id`, `user_id`, `teachings`, `enjoy`, `useful`, `up_to_date`, `recommend`) VALUES
(2, 1, 'good', 'no', 'somewhat', 'yes', 'no'),
(3, 3, 'good', 'no', 'somewhat', 'no', 'no'),
(2, 2, 'average', 'yes', 'somewhat', 'no', 'yes'),
(2, 2, 'average', 'no', 'somewhat', 'no', 'no'),
(3, 3, 'good', 'no', 'very', 'no', 'no'),
(3, 3, 'good', 'no', 'very', 'no', 'no'),
(2, 2, 'good', 'no', 'not', 'yes', 'yes'),
(1, 1, 'good', 'no', 'somewhat', 'yes', 'no'),
(3, 3, 'good', 'no', 'not', 'no', 'no'),
(1, 1, 'excellent', 'no', 'somewhat', 'no', 'no'),
(1, 1, 'good', 'no', 'very', 'no', 'no'),
(1, 1, 'excellent', 'yes', 'not', 'no', 'no'),
(2, 1, 'excellent', 'yes', 'very', 'yes', 'yes'),
(1, 1, 'average', 'yes', 'somewhat', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `course_id`, `message`, `created_at`) VALUES
(1, 1, 'k.llli', '2024-05-27 01:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `offeredcourses`
--

CREATE TABLE `offeredcourses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offeredcourses`
--

INSERT INTO `offeredcourses` (`course_id`, `course_code`, `course_name`, `course_description`) VALUES
(1, 'CSE482', 'Advanced Database Management System', 'This course covers advanced topics in database management systems including relational algebra, SQL, indexing, query optimization, transaction management, and concurrency control.'),
(2, 'CSE428L', 'Software Engineering Lab', 'This lab course provides hands-on experience in software engineering principles and practices. Students will work on real-world projects applying software engineering methodologies.'),
(3, 'MAT250', 'Linear Algebra', 'This course introduces fundamental concepts in linear algebra, including vector spaces, linear transformations, matrices, determinants, eigenvalues, and eigenvectors.'),
(4, 'ENG110', 'English Composition', 'This course focuses on developing writing skills, including grammar, syntax, and composition.'),
(5, 'CHEM210', 'Organic Chemistry', 'This course covers the fundamental principles of organic chemistry, including nomenclature, structure, and reactions.'),
(6, 'BIO450', 'Molecular Biology', 'This course explores the molecular basis of biological processes, including DNA replication, transcription, and translation.'),
(7, 'MAT202', 'Calculus II', 'This course builds upon the concepts introduced in Calculus I, focusing on techniques of integration, sequences, and series.'),
(8, 'EEE305', 'Digital Signal Processing', 'This course covers the analysis and processing of digital signals, including filtering, modulation, and spectral analysis.'),
(9, 'PHY301', 'Quantum Mechanics', 'This course introduces the principles of quantum mechanics, including wave-particle duality, Schrödinger\'s equation, and quantum operators.');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 4, 2),
(6, 4, 3),
(7, 5, 1),
(8, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `registration_type`) VALUES
(1, 'hello', 'hello1@gmail.com', '$2y$10$cBdQvP8Rx3bcn3joBP7lhe6uwTC5Iuoa1b8qn6731AOKSVF6rk2oW', 'student'),
(2, 'Arif', 'arif@gmail.com', '$2y$10$DUuXO47ZdA1amVwC0jiaiucRCVW9FQ2gDEPfbx2w4naxgtIgoNYIS', 'student'),
(3, 'Lia', 'lia@gmail.com', '$2y$10$9XsaUG6y9xOg3500pjKUA.b33vD9PgXh5Asqlw6v.EnGX5utIRWE.', 'teacher'),
(4, 'zack', 'zack@gmail.com', '$2y$10$VDXR8224tjTDtIAOk7lLbefG6SCUJEPZ7obhJ7V9CcNsM1cmBiGei', 'student'),
(5, 'Diptu', 'Diptu@gmail.com', '$2y$10$RBFhERXikqPx7wD9dP7O6.jQ2stH3mGMtE/yUkZUazq3/VPExMZza', 'student'),
(6, 'cat', 'cat@gmail.com', '$2y$10$7d./Dr1tHw2kFRHUhW2oDebb3WK0boKD3HiXffX1vXZEwfHndOXj6', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advising`
--
ALTER TABLE `advising`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `advising_id` (`advising_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `faculty_evaluation`
--
ALTER TABLE `faculty_evaluation`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `offeredcourses`
--
ALTER TABLE `offeredcourses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advising`
--
ALTER TABLE `advising`
  ADD CONSTRAINT `advising_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `offeredcourses` (`course_id`),
  ADD CONSTRAINT `advising_ibfk_2` FOREIGN KEY (`advising_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `faculty_evaluation`
--
ALTER TABLE `faculty_evaluation`
  ADD CONSTRAINT `faculty_evaluation_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `faculty_evaluation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
