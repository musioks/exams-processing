-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2019 at 04:33 AM
-- Server version: 5.7.19
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globaltemp`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '2018/2019', 0, '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, '2019/2020', 1, '2019-06-09 15:24:45', '2019-06-09 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `year_of_study_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `course_id`, `academic_year_id`, `term_id`, `year_of_study_id`, `name`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 2, 'MechSep22019', 1, '2019-09-18', '2019-12-28', '2019-06-09 03:48:19', '2019-06-09 03:50:13'),
(3, 2, 2, 1, 1, 'Mech-September2019', 1, '2019-09-18', '2019-12-28', '2019-06-09 03:48:33', '2019-06-09 05:06:16'),
(4, 3, 2, 1, 3, 'BITSEP2019', 1, '2019-09-04', '2019-12-07', '2019-06-09 16:39:07', '2019-06-09 16:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `batch_intake`
--

CREATE TABLE `batch_intake` (
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `intake_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_intake`
--

INSERT INTO `batch_intake` (`batch_id`, `intake_id`) VALUES
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch_student`
--

CREATE TABLE `batch_student` (
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_student`
--

INSERT INTO `batch_student` (`batch_id`, `student_id`) VALUES
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `batch_unit`
--

CREATE TABLE `batch_unit` (
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_unit`
--

INSERT INTO `batch_unit` (`batch_id`, `unit_id`) VALUES
(4, 7),
(4, 8),
(4, 10),
(4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` double(8,2) NOT NULL,
  `duration_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_code`, `duration`, `duration_type`, `description`, `created_at`, `updated_at`) VALUES
(2, 'BSc. Mechanical Engineering', 'BMECH-320', 5.00, 'Years', 'Bachelor of Science in Mechanical Engineering', '2019-06-09 01:53:39', '2019-06-09 05:56:44'),
(3, 'Bsc. Information Technology', 'CIT-221', 4.00, 'Years', 'BSc. Information technology', '2019-06-09 05:54:45', '2019-06-09 05:56:04'),
(4, 'Diploma in Business Administration', 'DBA', 2.00, 'Years', 'Diploma in Business Administration', '2019-06-09 05:55:39', '2019-06-09 05:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `course_unit`
--

CREATE TABLE `course_unit` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_unit`
--

INSERT INTO `course_unit` (`course_id`, `unit_id`) VALUES
(3, 7),
(3, 8),
(3, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_type_id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_marks` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_type_id`, `batch_id`, `unit_id`, `name`, `total_marks`, `exam_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 11, 'Probability and Statistics 1 EXAM', 70, '2019-12-06', '0', '2019-06-10 00:18:55', '2019-06-10 00:18:55'),
(2, 1, 4, 8, 'OOP1 END EXAM', 70, '2019-11-30', '0', '2019-06-10 00:20:07', '2019-06-10 00:20:07'),
(3, 1, 4, 10, 'Introduction to the internet EXAM', 70, '2019-11-29', '0', '2019-06-10 00:21:45', '2019-06-10 00:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `frequency`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Main Exam', 1, 'End of Semester/Term Exams', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 'CAT', 2, 'Continuous Assessment Tests', '2019-06-09 15:24:45', '2019-06-09 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `grading_systems`
--

CREATE TABLE `grading_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_score` int(10) UNSIGNED NOT NULL,
  `max_score` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grading_systems`
--

INSERT INTO `grading_systems` (`id`, `name`, `min_score`, `max_score`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'A', 70, 100, 'Excellent', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 'B', 60, 69, 'Good', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(3, 'C', 50, 59, 'Fair', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(4, 'D', 40, 49, 'Pass', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(5, 'E', 0, 39, 'Fail', '2019-06-09 15:24:45', '2019-06-09 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `intakes`
--

CREATE TABLE `intakes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cutoff_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intakes`
--

INSERT INTO `intakes` (`id`, `name`, `start_date`, `end_date`, `cutoff_date`, `created_at`, `updated_at`) VALUES
(1, 'September 2019 Intake', '2019-06-15', '2019-08-22', '2019-08-31', '2019-06-09 04:13:54', '2019-06-09 04:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'single',
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kenyan',
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `gender`, `dob`, `marital_status`, `nationality`, `national_id`, `postal_address`, `mobile_number`, `email`, `employee_number`, `login_status`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Michael', 'Kyalo', 'Mulungu', 'Male', '1989-07-05', 'single', 'Kenyan', '21458976', '96-90400', '0700765432', 'michaelkyalo@app.com', 'EPS/2019/6376', 0, NULL, 'ACTIVE', '2019-06-09 15:27:57', '2019-06-09 15:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_unit`
--

CREATE TABLE `lecturer_unit` (
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturer_unit`
--

INSERT INTO `lecturer_unit` (`lecturer_id`, `unit_id`) VALUES
(1, 7),
(1, 8),
(1, 10),
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_07_083221_create_academic_years_table', 1),
(4, '2019_06_07_083259_create_year_of_studies_table', 1),
(5, '2019_06_07_083325_create_semester_terms_table', 1),
(6, '2019_06_07_083335_create_courses_table', 1),
(7, '2019_06_07_083341_create_units_table', 1),
(8, '2019_06_07_083414_create_batches_table', 1),
(9, '2019_06_07_083443_create_intakes_table', 1),
(10, '2019_06_07_092718_create_student_statuses_table', 1),
(11, '2019_06_07_095046_create_exam_types_table', 1),
(12, '2019_06_07_095102_create_exams_table', 1),
(13, '2019_06_07_095201_create_students_table', 1),
(14, '2019_06_07_095223_create_lecturers_table', 1),
(15, '2019_06_07_095224_create_scores_table', 1),
(16, '2019_06_07_095512_create_grading_systems_table', 1),
(17, '2019_06_07_125537_create_course_unit_table', 1),
(18, '2019_06_07_125624_create_batch_student_table', 1),
(19, '2019_06_07_125636_create_batch_intake_table', 1),
(20, '2019_06_07_125651_create_batch_unit_table', 1),
(21, '2019_06_07_125708_create_lecturer_unit_table', 1),
(22, '2019_06_07_125759_create_student_unit_table', 1),
(23, '2019_06_09_052116_laratrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'USER', 'ROLE USER', 'USER ROLE', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 'ADMIN', 'ROLE ADMIN', 'ADMIN ROLE', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(3, 'LECTURER', 'ROLE LECTURER', 'LECTURER ROLE', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(4, 'STUDENT', 'ROLE STUDENT', 'STUDENT ROLE', '2019-06-09 15:24:45', '2019-06-09 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(1, 2, 'App\\User'),
(1, 3, 'App\\User'),
(1, 4, 'App\\User'),
(2, 1, 'App\\User'),
(3, 2, 'App\\User'),
(4, 3, 'App\\User'),
(4, 4, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `exam_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 44.00, '2019-06-10 01:19:13', '2019-06-10 01:19:13'),
(2, 2, 2, 39.00, '2019-06-10 01:19:13', '2019-06-10 01:19:13'),
(3, 1, 3, 65.00, '2019-06-10 01:22:46', '2019-06-10 01:22:46'),
(4, 2, 3, 60.00, '2019-06-10 01:22:47', '2019-06-10 01:22:47'),
(5, 1, 1, 38.00, '2019-06-10 01:23:26', '2019-06-10 01:23:26'),
(6, 2, 1, 56.00, '2019-06-10 01:23:26', '2019-06-10 01:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `semester_terms`
--

CREATE TABLE `semester_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_terms`
--

INSERT INTO `semester_terms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Semester 1', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 'Semester 2', '2019-06-09 15:24:45', '2019-06-09 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `course_id`, `surname`, `firstname`, `middlename`, `dob`, `national_id`, `gender`, `mobile_no`, `email`, `admission_no`, `photo`, `admission_date`, `status_id`, `login_status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Muimi', 'Judith', 'Ndanu', '1994-10-11', '19080056', 'Female', '0710487300', 'judith@app.io', 'Stud/2019/7880', NULL, NULL, 2, 0, '2019-06-09 16:42:14', '2019-06-09 16:42:14'),
(2, 4, 3, 'Meza', 'Daniel', 'Osimbo', '1994-10-11', '28653456', 'Male', '0710466300', 'daniel@app.io', 'Stud/2019/5104', NULL, NULL, 2, 0, '2019-06-10 01:01:59', '2019-06-10 01:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_statuses`
--

CREATE TABLE `student_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_statuses`
--

INSERT INTO `student_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Approved', '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 'Rejected', '2019-06-09 15:24:45', '2019-06-09 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_unit`
--

CREATE TABLE `student_unit` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_unit`
--

INSERT INTO `student_unit` (`student_id`, `unit_id`) VALUES
(1, 7),
(1, 8),
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_hrs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `code`, `max_hrs`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Physics for Science', 'PHY/2106', '45', 'Physics for Science', '2019-06-09 02:34:24', '2019-06-09 02:34:24'),
(3, 'Digital Electronics 1', 'DE1235', '50', 'Digital Electronics 1', '2019-06-09 05:24:00', '2019-06-09 05:24:00'),
(4, 'Analog Electronics 1', 'AnE127', '48', 'Analog Electronics 1', '2019-06-09 05:24:38', '2019-06-09 05:24:38'),
(5, 'Calculus 2', 'SMA1238', '50', 'Calculus 2', '2019-06-09 05:25:14', '2019-06-09 05:25:14'),
(7, 'Probability and Statistics 1', 'SMA1167', '45', 'Probability and Statistics 1', '2019-06-09 05:26:01', '2019-06-09 05:26:01'),
(8, 'Object Oriented Programming I', 'BIT2200', '50', 'Object Oriented Programming I', '2019-06-09 06:15:17', '2019-06-09 06:15:17'),
(9, 'Object Oriented Programming II', 'BIT3209', '50', 'Object Oriented Programming II', '2019-06-09 06:15:48', '2019-06-09 06:15:48'),
(10, 'Introduction to the internet', 'BIT2103', '45', 'Introduction to the internet', '2019-06-09 06:16:18', '2019-06-09 06:16:18'),
(11, 'Micro-economics', 'BUS1890', '40', 'Micro-economics', '2019-06-09 06:17:01', '2019-06-09 06:17:01'),
(12, 'Macro-economics', 'BUS3890', '40', 'Macro-economics', '2019-06-09 06:17:36', '2019-06-09 06:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `admin`, `is_activated`, `password`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'user.jpg', 'admin@school.com', 1, 1, '$2y$10$MkjKsVNPNp35IpAitM/NBuaY3.v/J/ZT8l6vtsnlSfbxLGyKc/0zG', NULL, NULL, '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 'Michael Mulungu', 'user.jpg', 'michaelkyalo@app.com', 0, 1, '$2y$10$xQFje2yxrvs/bnSB0DDq5OT7SFwMTN3e5tTLx16G5.GkTFgZ6xyJu', NULL, NULL, '2019-06-09 15:27:55', '2019-06-09 15:27:55'),
(3, 'Judith Muimi', 'user.jpg', 'judith@app.io', 0, 1, '$2y$10$s6XaiIjnvTjLLcvSJq.SEuX8vPdan5lLDMCGwzUV4GmvCABVhgQcy', NULL, NULL, '2019-06-09 16:42:14', '2019-06-09 16:42:14'),
(4, 'Daniel Meza', 'user.jpg', 'daniel@app.io', 0, 1, '$2y$10$DYtKqM8hLoGgDhhRZH6vZ.2ehW9TU1doIxp7W56Zlbkmd9UNdslhi', NULL, NULL, '2019-06-10 01:01:59', '2019-06-10 01:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `year_of_studies`
--

CREATE TABLE `year_of_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_number` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `year_of_studies`
--

INSERT INTO `year_of_studies` (`id`, `year_number`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(2, 2, '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(3, 3, '2019-06-09 15:24:45', '2019-06-09 15:24:45'),
(4, 4, '2019-06-09 15:24:45', '2019-06-09 15:24:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_years_name_unique` (`name`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_course_id_foreign` (`course_id`),
  ADD KEY `batches_academic_year_id_foreign` (`academic_year_id`),
  ADD KEY `batches_term_id_foreign` (`term_id`),
  ADD KEY `batches_year_of_study_id_foreign` (`year_of_study_id`);

--
-- Indexes for table `batch_intake`
--
ALTER TABLE `batch_intake`
  ADD KEY `batch_intake_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_intake_intake_id_foreign` (`intake_id`);

--
-- Indexes for table `batch_student`
--
ALTER TABLE `batch_student`
  ADD KEY `batch_student_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `batch_unit`
--
ALTER TABLE `batch_unit`
  ADD KEY `batch_unit_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_unit_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_unit`
--
ALTER TABLE `course_unit`
  ADD KEY `course_unit_course_id_foreign` (`course_id`),
  ADD KEY `course_unit_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_exam_type_id_foreign` (`exam_type_id`),
  ADD KEY `exams_batch_id_foreign` (`batch_id`),
  ADD KEY `exams_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grading_systems`
--
ALTER TABLE `grading_systems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grading_systems_name_unique` (`name`);

--
-- Indexes for table `intakes`
--
ALTER TABLE `intakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturers_email_unique` (`email`),
  ADD UNIQUE KEY `lecturers_employee_number_unique` (`employee_number`),
  ADD KEY `lecturers_user_id_foreign` (`user_id`);

--
-- Indexes for table `lecturer_unit`
--
ALTER TABLE `lecturer_unit`
  ADD KEY `lecturer_unit_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `lecturer_unit_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_student_id_foreign` (`student_id`),
  ADD KEY `scores_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `semester_terms`
--
ALTER TABLE `semester_terms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester_terms_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_course_id_foreign` (`course_id`),
  ADD KEY `students_status_id_foreign` (`status_id`);

--
-- Indexes for table `student_statuses`
--
ALTER TABLE `student_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_statuses_name_unique` (`name`);

--
-- Indexes for table `student_unit`
--
ALTER TABLE `student_unit`
  ADD KEY `student_unit_student_id_foreign` (`student_id`),
  ADD KEY `student_unit_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_code_unique` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `year_of_studies`
--
ALTER TABLE `year_of_studies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year_of_studies_year_number_unique` (`year_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grading_systems`
--
ALTER TABLE `grading_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `intakes`
--
ALTER TABLE `intakes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester_terms`
--
ALTER TABLE `semester_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_statuses`
--
ALTER TABLE `student_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `year_of_studies`
--
ALTER TABLE `year_of_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batches_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batches_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `semester_terms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batches_year_of_study_id_foreign` FOREIGN KEY (`year_of_study_id`) REFERENCES `year_of_studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_intake`
--
ALTER TABLE `batch_intake`
  ADD CONSTRAINT `batch_intake_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_intake_intake_id_foreign` FOREIGN KEY (`intake_id`) REFERENCES `intakes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_student`
--
ALTER TABLE `batch_student`
  ADD CONSTRAINT `batch_student_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_unit`
--
ALTER TABLE `batch_unit`
  ADD CONSTRAINT `batch_unit_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_unit_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_unit`
--
ALTER TABLE `course_unit`
  ADD CONSTRAINT `course_unit_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_unit_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_exam_type_id_foreign` FOREIGN KEY (`exam_type_id`) REFERENCES `exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lecturer_unit`
--
ALTER TABLE `lecturer_unit`
  ADD CONSTRAINT `lecturer_unit_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lecturer_unit_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `student_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_unit`
--
ALTER TABLE `student_unit`
  ADD CONSTRAINT `student_unit_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_unit_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
