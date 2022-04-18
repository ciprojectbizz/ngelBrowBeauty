-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 01:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngelbrowbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `nbb_add_ons`
--

CREATE TABLE `nbb_add_ons` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_mandarin` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `commission_type` enum('fixed','percentage') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_amount` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_add_ons`
--

INSERT INTO `nbb_add_ons` (`id`, `name`, `name_mandarin`, `image`, `price`, `duration`, `priority`, `status`, `commission_type`, `commission_amount`) VALUES
(1, 'EAR CANDLING', '耳烛式', '20200913135858-2020-09-13add_ons135855.jpg', '10', '30', 1, 0, '', 0),
(2, 'EAR CLEANING', '采耳', '20200913140122-2020-09-13add_ons140119.jpg', '10', '30', 2, 0, '', 0),
(3, 'BA GUAN THERAPY', '拔罐疗法', '20200913141335-2020-09-13add_ons141322.jpg', '10', '30', 3, 0, '', 0),
(4, 'GUA SHA THERAPY', '刮痧疗法', '20200913141421-2020-09-13add_ons141413.jpg', '10', '30', 4, 0, '', 0),
(5, 'BODY/ FOOT SCRUB', '身体/脚部磨砂膏', '20200913141457-2020-09-13add_ons141449.jpg', '10', '30', 5, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_appointment`
--

CREATE TABLE `nbb_appointment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_number` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `therapists` int(10) DEFAULT NULL,
  `services` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandarin_services` text DEFAULT NULL,
  `total_amount` varchar(30) NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `start_slot` varchar(20) DEFAULT NULL,
  `end_slot` varchar(20) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `source` varchar(100) NOT NULL,
  `services_ids` varchar(100) NOT NULL,
  `instructions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt` text NOT NULL,
  `therapist_earning` float DEFAULT NULL,
  `service_earning` float DEFAULT NULL,
  `add_ons_earning` float DEFAULT NULL,
  `health_medical` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `payment_time` timestamp NULL DEFAULT NULL,
  `coupon` varchar(20) DEFAULT NULL,
  `discount` varchar(5) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `display_status` int(50) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_appointment`
--

INSERT INTO `nbb_appointment` (`id`, `customer_id`, `customer_number`, `customer_name`, `email`, `therapists`, `services`, `mandarin_services`, `total_amount`, `time_slot`, `start_slot`, `end_slot`, `duration`, `appointment_date`, `source`, `services_ids`, `instructions`, `feedback`, `receipt`, `therapist_earning`, `service_earning`, `add_ons_earning`, `health_medical`, `payment_mode`, `payment_time`, `coupon`, `discount`, `status`, `display_status`, `created_by`, `created_at`, `updated_at`, `branch_id`) VALUES
(1, 1, '08840910427', 'Twinkal Jaiswal', 'twinkaljaiswal1496@gmail.com', 1, '1', NULL, '500', '09:00-10:30', NULL, '', '', '2022-01-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-01-24 09:27:17', NULL, 1),
(2, 2, '08017692049', 'riya ojha', 'riyaojha2013@gmail.com', 1, '2', NULL, '1000', '09:00-09:30', NULL, '', '', '2022-02-25', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-19 04:10:37', NULL, 0),
(3, 2, '08017692049', 'riya ojha', 'riyaojha2013@gmail.com', 1, '2', NULL, '1000', '09:00-09:30', NULL, '', '', '2022-02-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-19 04:46:45', NULL, 0),
(4, 1, '09903230346', 'susmita ojha', 'fddgdf@gmail.com', 5, '3', NULL, '12', '09:00-09:20', NULL, '', '', '2022-02-24', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-23 05:42:34', NULL, 0),
(5, 2, '8017692049', 'test demo', 'riyaojha2013@gmail.com', 6, '3,5', NULL, '12', '09:00-09:20', NULL, '', '', '2022-02-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-25 02:16:57', NULL, 0),
(6, 1, '9903230346', 'susmita ojha', 'fddgdf@gmail.com', 5, '3,5', NULL, '15', '09:00-09:15', NULL, '', '', '2022-02-26', '', '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, 1, '2022-02-25 02:36:45', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_billing_address`
--

CREATE TABLE `nbb_billing_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `billing_firstname` varchar(200) DEFAULT NULL,
  `billing_lastname` varchar(200) DEFAULT NULL,
  `billing_contactno` int(11) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `billing_postal_code` int(11) DEFAULT NULL,
  `billing_city` text DEFAULT NULL,
  `billing_state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_billing_address`
--

INSERT INTO `nbb_billing_address` (`id`, `user_id`, `billing_firstname`, `billing_lastname`, `billing_contactno`, `billing_address`, `billing_postal_code`, `billing_city`, `billing_state`) VALUES
(1, 1, 'susmita', 'ojha', NULL, 'fgf ghjh hg h', 700102, 'kolkata', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_category`
--

CREATE TABLE `nbb_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(220) DEFAULT NULL,
  `category_image` varchar(225) DEFAULT NULL,
  `category_details` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_category`
--

INSERT INTO `nbb_category` (`id`, `category_name`, `category_image`, `category_details`, `status`, `created_by`, `created_at`) VALUES
(1, 'test', 'TOP-10-HERBAL-COSMETIC-BEAUTY-CARE-PRODUCTS-SECRET-OF-GLOWING-AND-HEALTHY-SKIN1.jpg', 'fg fg fbn mkbmbn ', 0, 1, '2022-02-25 13:06:37'),
(4, 'demo test', 'beautiful-aurora-universe-milky-way-260nw-17870564783.jpg', 'rtgfdg gfdg ', 1, 1, '2022-02-23 05:39:44'),
(5, 'demo', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec4.png', 'trg fdg', 1, 1, '2022-02-24 03:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_customer`
--

CREATE TABLE `nbb_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `medical_information` text DEFAULT NULL,
  `transactional_records` text DEFAULT NULL,
  `skin_conditions` int(11) DEFAULT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_customer`
--

INSERT INTO `nbb_customer` (`id`, `first_name`, `last_name`, `dob`, `age`, `email`, `contact`, `profile_picture`, `address`, `created_at`, `created_by`, `medical_information`, `transactional_records`, `skin_conditions`, `status`) VALUES
(1, 'susmita', 'ojha', '1996-02-28', 25, 'fddgdf@gmail.com', '9903230346', 'whatsapp-profile-pics1.jpg', 'test demo', '2022-02-19 08:00:42', 1, '', '', 1, 1),
(2, 'test', 'demo', '1990-08-25', 31, 'riyaojha2013@gmail.com', '8017692049', 'Facial_Oils.jpg', 'kestopur,kolkata', '2022-02-19 08:59:07', 1, '', '', 0, 0),
(7, 'will', 'Smith', '2007-07-13', 14, 'susmita@gmail.com', '12354567', NULL, 'gvjgv', '2022-03-02 08:26:11', 1, NULL, NULL, NULL, 0),
(8, 'will', 'Smith', '1988-07-22', 33, 'admin1234@gmail.com', '12354567', 'whatsapp-profile-pics.jpg', 'usa', '2022-03-02 09:02:54', 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_delivery_details`
--

CREATE TABLE `nbb_delivery_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `courier` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `courier_price` varchar(30) DEFAULT NULL,
  `tacking_number` varchar(250) DEFAULT NULL,
  `traking_link` varchar(200) DEFAULT NULL,
  `tacking_details` text DEFAULT NULL,
  `date_booked` date DEFAULT NULL,
  `delivery_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_delivery_details`
--

INSERT INTO `nbb_delivery_details` (`id`, `order_id`, `courier`, `quantity`, `courier_price`, `tacking_number`, `traking_link`, `tacking_details`, `date_booked`, `delivery_status`) VALUES
(2, 3, 5, 1, '40', '', '', '', '2022-03-19', 6),
(3, 1, 5, 1, '40', '', '', '', '2022-03-19', 4),
(4, 2, 5, 1, '40', '', '', '', '2022-03-19', 2),
(5, 4, 5, 1, '40', '', '', '', '2022-03-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_delivery_status`
--

CREATE TABLE `nbb_delivery_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_delivery_status`
--

INSERT INTO `nbb_delivery_status` (`id`, `status_name`) VALUES
(1, 'Awaiting Payment of Invoice'),
(2, 'In Production'),
(3, 'Order On Hold'),
(4, 'In Packing Department'),
(5, 'Pending Pick-up'),
(6, 'Order Complete: Dispatched with Courier'),
(7, 'Rejected'),
(8, 'Items prepare'),
(9, 'Order Collected Instore'),
(10, 'Partial Order Ready for Collection');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employees`
--

CREATE TABLE `nbb_employees` (
  `id` int(11) NOT NULL,
  `emp_number` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `employee_photo` varchar(255) DEFAULT NULL,
  `aadhaar_number` bigint(20) DEFAULT NULL,
  `pan_number` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mob_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `husband_name` varchar(255) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `marital_status` tinyint(3) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `jobtype` varchar(50) DEFAULT NULL,
  `date_of_joining` date NOT NULL,
  `willing_to_relocate` tinyint(3) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employees`
--

INSERT INTO `nbb_employees` (`id`, `emp_number`, `first_name`, `last_name`, `employee_photo`, `aadhaar_number`, `pan_number`, `date_of_birth`, `mob_no`, `email`, `password`, `father_name`, `mother_name`, `husband_name`, `gender`, `marital_status`, `designation`, `jobtype`, `date_of_joining`, `willing_to_relocate`, `create_date`, `status`) VALUES
(4, 'NBB0004', 'susmita', 'ojha', 'download.jpg', 123456789, 'gh123', '1992-08-25', '9903230347', 'susmita@gmail.com', NULL, 'p ojha', 'a ojha', '', 'Female', NULL, 2, 'full_time', '0000-00-00', 1, '2022-03-19 11:11:03', 0),
(5, 'NBBE0005', 'test', 'demo', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png', 1225478963, 'gh1232', '1992-11-19', '123456789', 'susmita@gmail.com', NULL, 'p ojha', 'a ojha', '', 'Female', NULL, 3, 'full_time', '2022-03-10', 1, '2022-03-21 10:36:38', 1),
(6, 'NBBE0006', 'firstemp', 'fgfg', NULL, 98745621, 'hjg15487', '2011-02-28', '', '', NULL, 'cbc', 'vbvcb', '', 'Female', NULL, 2, 'full_time', '2022-03-11', 1, '2022-03-23 15:55:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_address`
--

CREATE TABLE `nbb_employee_address` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `full_address` text DEFAULT NULL,
  `land_mark` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_address`
--

INSERT INTO `nbb_employee_address` (`id`, `emp_id`, `full_address`, `land_mark`, `city`, `state`, `pincode`) VALUES
(4, 4, 'fghfcg hghjj jhkj jQuery DataTable is a powerful and smart HTML ', 'xcgfcxvg', 'kolkata', 'WB', 700102),
(5, 5, 'fch jgj ch cfcv', 'xcgfcxvg', 'kolkata', 'WB', 700102),
(6, 6, '', 'xcgfcxvg', 'kolkata', 'xyz', 155687);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_leave`
--

CREATE TABLE `nbb_employee_leave` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `total_leave_days` varchar(50) DEFAULT NULL,
  `reason_for_leave` text DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_leave`
--

INSERT INTO `nbb_employee_leave` (`id`, `emp_id`, `leave_from`, `leave_to`, `total_leave_days`, `reason_for_leave`, `status`) VALUES
(1, 5, '2022-03-28', '2022-03-31', '4', 'fgfg fh cnvbvb', 1),
(3, 6, '2022-03-26', '2022-03-30', '5', 'bhvcbv ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_employee_salary`
--

CREATE TABLE `nbb_employee_salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `basic_pay` float(10,2) DEFAULT NULL,
  `dearness_allowance` float(10,2) DEFAULT NULL,
  `Provident_fund` float(10,2) DEFAULT NULL,
  `employees_state_insurance` float(10,2) DEFAULT NULL,
  `house_rent_allowance` float(10,2) DEFAULT NULL,
  `medical_allowance` float(10,2) DEFAULT NULL,
  `total_earning` float(10,2) DEFAULT NULL,
  `total_deduction` float(10,2) DEFAULT NULL,
  `net_pay` float(10,2) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_employee_salary`
--

INSERT INTO `nbb_employee_salary` (`id`, `emp_id`, `dept_id`, `basic_pay`, `dearness_allowance`, `Provident_fund`, `employees_state_insurance`, `house_rent_allowance`, `medical_allowance`, `total_earning`, `total_deduction`, `net_pay`, `status`) VALUES
(1, 5, 1, 22000.00, 2200.00, 704.00, 352.00, NULL, 440.00, 35200.00, 1056.00, 34144.00, 1),
(2, 6, 1, 40000.00, 4000.00, 1280.00, 640.00, NULL, 800.00, 64000.00, 1920.00, 62080.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_emp_designation`
--

CREATE TABLE `nbb_emp_designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_emp_designation`
--

INSERT INTO `nbb_emp_designation` (`id`, `designation_name`) VALUES
(1, 'Therapists'),
(2, 'Accounter'),
(3, 'Delivery boy');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_emp_education_qualification`
--

CREATE TABLE `nbb_emp_education_qualification` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `institute_university` varchar(255) DEFAULT NULL,
  `year_of_passing` varchar(50) DEFAULT NULL,
  `marks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_emp_education_qualification`
--

INSERT INTO `nbb_emp_education_qualification` (`id`, `emp_id`, `qualification`, `institute_university`, `year_of_passing`, `marks`) VALUES
(1, 4, 'se', 'niit', '2019', '70%'),
(2, 4, 'hs', 'wb', '2015', '70%'),
(3, 5, 'BA', 'gjg', '2019', '70%'),
(4, 6, 'BA', 'gjg', '2019', '70%');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_feedback`
--

CREATE TABLE `nbb_feedback` (
  `id` int(191) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_feedback`
--

INSERT INTO `nbb_feedback` (`id`, `branch_id`, `user_id`, `rate`, `comment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 2, '', 1, '2021-12-30 03:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_invoice_file`
--

CREATE TABLE `nbb_invoice_file` (
  `id` int(11) NOT NULL,
  `invoice_file` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nbb_order_main`
--

CREATE TABLE `nbb_order_main` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_status` tinyint(3) DEFAULT NULL,
  `customer_firstname` varchar(200) DEFAULT NULL,
  `customer_lastname` varchar(200) DEFAULT NULL,
  `customer_email` varchar(200) DEFAULT NULL,
  `customer_phone` int(11) DEFAULT NULL,
  `customer_postcode` int(11) DEFAULT NULL,
  `type_flag` varchar(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_order_main`
--

INSERT INTO `nbb_order_main` (`id`, `order_number`, `user_id`, `order_status`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_phone`, `customer_postcode`, `type_flag`, `payment_method`, `create_date`, `delivery_date`) VALUES
(1, 'NBB0001', 2, 1, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2022-03-10 11:46:13', '2022-03-26'),
(2, 'NBB0002', 7, 1, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2022-03-10 14:04:43', '2022-03-30'),
(3, 'NBB0003', 2, 1, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2022-03-11 11:29:32', '2022-03-19'),
(4, 'NBB0004', 2, 1, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2022-03-12 15:13:57', '2022-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_order_product`
--

CREATE TABLE `nbb_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` bigint(255) NOT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `product_price` decimal(10,0) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_order_product`
--

INSERT INTO `nbb_order_product` (`id`, `order_id`, `product_id`, `total_quantity`, `total_price`, `product_price`, `create_date`, `order_status`) VALUES
(1, 1, 2, 2, '8', '4', '2022-03-10 11:46:13', 0),
(2, 2, 2, 2, '8', '4', '2022-03-10 14:04:43', 0),
(3, 2, 3, 2, '30', '15', '2022-03-10 14:04:43', 0),
(4, 3, 2, 3, '12', '4', '2022-03-11 11:29:32', 0),
(5, 3, 3, 2, '30', '15', '2022-03-11 11:29:32', 0),
(6, 4, 2, 4, '16', '4', '2022-03-12 15:13:57', 0),
(7, 4, 3, 6, '90', '15', '2022-03-12 15:13:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product`
--

CREATE TABLE `nbb_product` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `available_stock` int(11) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product`
--

INSERT INTO `nbb_product` (`id`, `categorie_id`, `sku`, `name`, `product_code`, `description`, `short_description`, `date`, `tags`, `stock`, `available_stock`, `weight`, `price`, `status`) VALUES
(2, 1, 'c23', 'cream', '12345', '', '', '2022-03-14 10:52:42', 'ddd hh', 25, 14, '100g', 50, 1),
(3, 1, 'dsfd43', 'cream test', '123892', '', '', '2022-03-12 15:13:57', 'ddd hhfbghv', 20, 2, '40g', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product_category`
--

CREATE TABLE `nbb_product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product_category`
--

INSERT INTO `nbb_product_category` (`id`, `name`, `status`) VALUES
(1, 'demo test', 1),
(4, 'test', 1),
(5, 'demo 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_product_image`
--

CREATE TABLE `nbb_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_product_image`
--

INSERT INTO `nbb_product_image` (`id`, `product_id`, `image`, `status`) VALUES
(17, 3, 'LOGO-icon2.png', NULL),
(24, 2, 'herbal-products-500x500.jpg', NULL),
(25, 2, 'herbal-products-third-party-manufacturers-500x500.jpg', NULL),
(26, 2, 'TOP-10-HERBAL-COSMETIC-BEAUTY-CARE-PRODUCTS-SECRET-OF-GLOWING-AND-HEALTHY-SKIN.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_service`
--

CREATE TABLE `nbb_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(200) DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `service_category` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `service_price` int(11) DEFAULT NULL,
  `therapist_commission` varchar(50) DEFAULT NULL,
  `commission_amount` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `loyalty_points` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_service`
--

INSERT INTO `nbb_service` (`id`, `service_name`, `service_icon`, `service_category`, `description`, `service_price`, `therapist_commission`, `commission_amount`, `duration`, `priority`, `loyalty_points`, `status`, `created_by`, `created_at`) VALUES
(3, 'spa', 'Facial_Oils.jpg', 1, '', 30, 'fixed', 0, 60, 5, 6, 1, 1, '2022-02-25 15:38:03'),
(4, 'spa', 'beautiful-aurora-universe-milky-way-260nw-17870564784.jpg', 4, '', 30, '12', 0, 30, 4, 7, 1, 1, '2022-02-24 09:11:37'),
(5, 'hair cut', 'start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec5.png', 1, 'dgd dg fg fgf g', 30, '12', 0, 90, 5, 7, 1, 1, '2022-02-25 07:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_shipping_address`
--

CREATE TABLE `nbb_shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipping_firstname` varchar(200) DEFAULT NULL,
  `shipping_lastname` varchar(200) DEFAULT NULL,
  `shipping_contactno` varchar(200) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_city` varchar(200) DEFAULT NULL,
  `shipping_state` int(11) DEFAULT NULL,
  `shipping_postalcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nbb_shipping_address`
--

INSERT INTO `nbb_shipping_address` (`id`, `user_id`, `shipping_firstname`, `shipping_lastname`, `shipping_contactno`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_postalcode`) VALUES
(1, 1, 'susmita', 'ojha', NULL, 'bvnvn iuo jjghj n b', 'kolkata', 1, 700102);

-- --------------------------------------------------------

--
-- Table structure for table `nbb_state`
--

CREATE TABLE `nbb_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_state`
--

INSERT INTO `nbb_state` (`id`, `name`) VALUES
(1, 'test'),
(2, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_therapists`
--

CREATE TABLE `nbb_therapists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `checkin` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `therapist_earning` float DEFAULT 0,
  `service_earning` float DEFAULT 0,
  `add_ons_earning` float DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_therapists`
--

INSERT INTO `nbb_therapists` (`id`, `name`, `age`, `gender`, `service_id`, `checkin`, `mobile`, `image`, `therapist_earning`, `service_earning`, `add_ons_earning`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Twinkal', 25, 'female', 2, 'yes', '8840910427', '20210514112908-2021-05-14therapists1129071.jpeg', 0, 0, 0, 1, '2021-12-30 04:07:06', '2021-12-30 09:37:06'),
(3, 'admin', 24, 'male', 2, 'yes', '', '20201104190323-2020-11-04service190315111.png', 0, 0, 0, 1, '2022-01-18 08:41:42', '2022-01-18 14:11:42'),
(5, 'demo test', 23, 'male', 3, 'yes', '', 'LOGO-text.png', 0, 0, 0, 1, '2022-02-23 05:41:58', '2022-02-23 11:11:58'),
(6, 'susmita', 23, 'female', 3, 'yes', '12458645', 'beautiful-aurora-universe-milky-way-260nw-17870564785.jpg', 0, 0, 0, 1, '2022-02-24 03:46:45', '2022-02-24 09:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_users`
--

CREATE TABLE `nbb_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nbb_users`
--

INSERT INTO `nbb_users` (`id`, `email`, `password`, `first_name`, `status`, `created_at`) VALUES
(1, 'admin1234@gmail.com', '44ce70fd9bf8c294e9c491c89fb05125eaebd16a5553fe402a040200c0c5d901fe8e93db33eef39148169a285a74be1f68d614366f06ce9d3aa6160ad98981d8', 'admin', 1, '2021-12-25 06:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `nbb_work_experience`
--

CREATE TABLE `nbb_work_experience` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `company_name` varchar(220) DEFAULT NULL,
  `work_role` varchar(255) NOT NULL,
  `form_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nbb_work_experience`
--

INSERT INTO `nbb_work_experience` (`id`, `emp_id`, `company_name`, `work_role`, `form_date`, `to_date`) VALUES
(1, 4, 'infotech', 'web', '2020-02-16', '2022-02-02'),
(2, 5, 'infotech', 'web', '2019-02-09', '2022-03-03'),
(3, 6, 'infotech', 'web', '2020-01-03', '2022-03-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nbb_add_ons`
--
ALTER TABLE `nbb_add_ons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_appointment`
--
ALTER TABLE `nbb_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_billing_address`
--
ALTER TABLE `nbb_billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_category`
--
ALTER TABLE `nbb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_customer`
--
ALTER TABLE `nbb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_delivery_details`
--
ALTER TABLE `nbb_delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_delivery_status`
--
ALTER TABLE `nbb_delivery_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employees`
--
ALTER TABLE `nbb_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employee_address`
--
ALTER TABLE `nbb_employee_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employee_leave`
--
ALTER TABLE `nbb_employee_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_employee_salary`
--
ALTER TABLE `nbb_employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_emp_designation`
--
ALTER TABLE `nbb_emp_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_emp_education_qualification`
--
ALTER TABLE `nbb_emp_education_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_feedback`
--
ALTER TABLE `nbb_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_invoice_file`
--
ALTER TABLE `nbb_invoice_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_order_main`
--
ALTER TABLE `nbb_order_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_order_product`
--
ALTER TABLE `nbb_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product`
--
ALTER TABLE `nbb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product_category`
--
ALTER TABLE `nbb_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_product_image`
--
ALTER TABLE `nbb_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_service`
--
ALTER TABLE `nbb_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_shipping_address`
--
ALTER TABLE `nbb_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_state`
--
ALTER TABLE `nbb_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_therapists`
--
ALTER TABLE `nbb_therapists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_users`
--
ALTER TABLE `nbb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nbb_work_experience`
--
ALTER TABLE `nbb_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nbb_add_ons`
--
ALTER TABLE `nbb_add_ons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_appointment`
--
ALTER TABLE `nbb_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_billing_address`
--
ALTER TABLE `nbb_billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_category`
--
ALTER TABLE `nbb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_customer`
--
ALTER TABLE `nbb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nbb_delivery_details`
--
ALTER TABLE `nbb_delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_delivery_status`
--
ALTER TABLE `nbb_delivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nbb_employees`
--
ALTER TABLE `nbb_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_employee_address`
--
ALTER TABLE `nbb_employee_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_employee_leave`
--
ALTER TABLE `nbb_employee_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_employee_salary`
--
ALTER TABLE `nbb_employee_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_emp_designation`
--
ALTER TABLE `nbb_emp_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_emp_education_qualification`
--
ALTER TABLE `nbb_emp_education_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_feedback`
--
ALTER TABLE `nbb_feedback`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_invoice_file`
--
ALTER TABLE `nbb_invoice_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nbb_order_main`
--
ALTER TABLE `nbb_order_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nbb_order_product`
--
ALTER TABLE `nbb_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nbb_product`
--
ALTER TABLE `nbb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbb_product_category`
--
ALTER TABLE `nbb_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_product_image`
--
ALTER TABLE `nbb_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `nbb_service`
--
ALTER TABLE `nbb_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nbb_shipping_address`
--
ALTER TABLE `nbb_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_state`
--
ALTER TABLE `nbb_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nbb_therapists`
--
ALTER TABLE `nbb_therapists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nbb_users`
--
ALTER TABLE `nbb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nbb_work_experience`
--
ALTER TABLE `nbb_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
