-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2019 at 04:39 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.17-1+ubuntu16.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgfhomes_internet_banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `at_id` int(11) NOT NULL,
  `at_title` varchar(255) NOT NULL,
  `at_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`at_id`, `at_title`, `at_description`) VALUES
(1, 'Savings', ''),
(2, 'Checking', ''),
(3, 'Investment', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_beneficiary`
--

CREATE TABLE `add_beneficiary` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_ifsc_code` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_beneficiary`
--

INSERT INTO `add_beneficiary` (`id`, `user_id`, `name`, `account_number`, `bank_name`, `bank_ifsc_code`, `message`, `created_date`) VALUES
(1, 1600000457, 'Pankaj Negi', '94569439454EA', 'PNB', 'PNB2345', 'Please Check', '2018-07-23 17:46:33'),
(2, 1600000457, 'Neeraj Amoli', '94569432354EA', 'SBI BANK', 'SBI1234', 'Please Check', '2018-07-23 17:50:57'),
(3, 1600000468, 'najv', '1600000457EA', 'PNB', 'PNB2345', 'okay', '2018-09-25 11:04:01'),
(4, 1600000469, 'Junice Andre', '1600000468EA', 'PNB', 'PNB6576', 'ok', '2018-09-25 22:09:53'),
(5, 1600000510, 'Janice', '1600000468EA', 'PNB', 'PNB2345', '', '2018-09-27 15:09:07'),
(6, 1600000513, 'Junice Andre', '1600000468EA', 'Axis Bank', 'AXIS3982', '', '2018-09-28 18:31:05'),
(7, 1600000509, 'test2', '1600000469EA', 'SBI BANK', 'SBI1934', 'tsetset', '2018-10-01 11:40:50'),
(8, 1600000468, 'Wanita ', '1600000513EA', 'Axis Bank', 'AXIS3982', '', '2018-10-02 16:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_level_id` varchar(255) DEFAULT '1',
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_add1` varchar(255) NOT NULL,
  `admin_add2` varchar(255) NOT NULL,
  `admin_city` varchar(255) NOT NULL,
  `admin_state` varchar(255) NOT NULL,
  `admin_country` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_mobile` varchar(255) NOT NULL,
  `admin_gender` varchar(255) NOT NULL,
  `admin_dob` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_level_id`, `admin_username`, `admin_password`, `admin_name`, `admin_add1`, `admin_add2`, `admin_city`, `admin_state`, `admin_country`, `admin_email`, `admin_mobile`, `admin_gender`, `admin_dob`, `admin_image`) VALUES
(4, '1', 'admin', 'test', 'Kaushal Kishore', 'House no : 768', 'Sector 2B', '1', '1', '2', 'kaushal.rahuljaiswal@gmail.com', '987654321', '', '12 january, 2013', 'p1.jpg'),
(7, '1', 'bank', 'test', 'Amit Kumar', 'House no : 768', 'Sector 2B', '2', '1', '2', 'amit@gmail.com', '9324324546', '', '26 December,2015', 'p2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_contact` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_contact`, `author_email`, `author_description`) VALUES
(1, 'Yaswant Kanetkar', '9876543212', 'yaswant@gmail.com', 'BPB Publication author'),
(2, 'Balagur Swami', '987656787', 'Balagur@gmail.com', 'Java Writer'),
(3, 'Kaushal Kishore', '9897786567', 'kaushal@gmail.com', 'PHP Author'),
(4, 'Amit Trivedi', '9878675654', 'amit@gmail.com', 'Writter of Java Books');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`) VALUES
(5, 'Allahabad Bank'),
(4, 'Axis Bank'),
(3, 'HDFC'),
(2, 'PNB'),
(1, 'SBI BANK');

-- --------------------------------------------------------

--
-- Table structure for table `banks_detail`
--

CREATE TABLE `banks_detail` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks_detail`
--

INSERT INTO `banks_detail` (`id`, `bank_id`, `ifsc_code`, `branch_name`, `country`, `state`, `city`) VALUES
(1, 1, 'SBI1947', 'Aiims Branch', 'India', 'Uttrakhand', 'Rishikesh'),
(2, 1, 'SBI1934', 'IDPL Branch', 'India', 'Uttrakhand', 'Rishikesh'),
(3, 1, 'SBI1234', 'Rishikesh Main Branch', 'India', 'Uttrakhand', 'Rishikesh'),
(4, 2, 'PNB2345', 'Vistapit Branch', 'India', 'Uttrakhand', 'Rishikesh'),
(5, 2, 'PNB6576', 'It Park', 'India', 'Uttrakhand', 'Dehradun'),
(6, 3, 'HDFC1654', 'IDPL Branch', 'India', 'Uttrakhand', 'Rishikesh'),
(7, 3, 'HDFC7697', 'Clement Town', 'India', 'Uttrakhand', 'Dehradun'),
(8, 4, 'AXIS3982', 'Patel Nagar', 'India', 'Uttrakhand', 'Rishikesh'),
(9, 5, 'ALL9834', 'Laxmi Nagar', 'India', 'Delhi', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `beneficiary_id` int(11) NOT NULL,
  `beneficiary_currency_id` varchar(255) NOT NULL,
  `beneficiary_user_id` varchar(255) NOT NULL,
  `beneficiary_status_id` varchar(255) NOT NULL DEFAULT '1',
  `beneficiary_bank_name` varchar(255) NOT NULL,
  `beneficiary_account_number` varchar(255) NOT NULL,
  `beneficiary_ifsc_code` varchar(30) NOT NULL,
  `beneficiary_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`beneficiary_id`, `beneficiary_currency_id`, `beneficiary_user_id`, `beneficiary_status_id`, `beneficiary_bank_name`, `beneficiary_account_number`, `beneficiary_ifsc_code`, `beneficiary_amount`) VALUES
(11, '2', '1600000457', '1', 'SBI Bank', '1600000457EA', 'SBI1947', '500'),
(12, '3', '1600000468', '1', 'PNC', '1600000457EA', '123456', '2000'),
(13, '2', '1600000469', '1', 'IEFHOMES', '1600000468EA', '1234', '2500'),
(14, '1', '1600000510', '1', 'Janice', '1600000468EA', '6N234', '5000'),
(15, '4', '1600000513', '1', 'Junice', '1600000468EA', '64NCAC', '20000'),
(16, '4', '1600000513', '1', 'Axis Bank', '1600000468EA', 'AXIS3982', '13000'),
(17, '1', '1600000513', '1', 'AXIS Bank', 'AXIS Bank', 'AXIS3982', '2000'),
(18, '2', '1600000513', '1', 'test', '23452345', 'wert235234', '4000'),
(19, '4', '1600000468', '1', 'Axis Bank', '1600000468EA', 'AXIS3982', '25000000'),
(20, '2', '1600000506', '1', 'test', '23452345', 'wert235234', '345'),
(21, '4', '1600000506', '1', 'test', '23452345', 'wert235234', '345'),
(22, '4', '1600000468', '1', 'PNB', '1600000513EA', 'PNB2345', '200'),
(23, '3', '1600000520', '3', 'test', '23452345', 'wert235234', '1000'),
(24, '3', '1600000520', '3', 'test', '160000999', 'ABC0123', '1000'),
(25, '3', '1600000520', '3', 'test', '23452345', 'ABC0123', '40000'),
(26, '4', '1600000520', '3', 'test', '160000999', 'ABC0123', '84000'),
(27, '2', '1600000522', '3', 'test', '160000999', 'ABC0123', '1222'),
(28, '3', '1600000522', '3', '5', '160000999', 'ALL9834', '23'),
(29, '3', '1600000522', '3', '5', '160000999', 'ALL9834', '44');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_description`) VALUES
(1, 'Computer Science', 'Computer Science Books'),
(2, 'Database Management System', 'Database Management System Books'),
(3, 'Social Science ', 'Social Science Books'),
(4, 'Play Books', 'Play Books');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Mumbai'),
(2, 'Delhi'),
(3, 'Chenai'),
(4, 'Banglore'),
(5, 'Varanasi'),
(6, 'Kolkatta');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(3, 'Afghanistan'),
(4, 'Aland'),
(5, 'Albania'),
(6, 'Algeria'),
(7, 'American Samoa'),
(8, 'Andorra'),
(9, 'Angola'),
(10, 'Anguilla'),
(11, 'Antarctica'),
(12, 'Antigua and Barbuda'),
(13, 'Argentina'),
(14, 'Armenia'),
(15, 'Aruba'),
(16, 'Australia'),
(17, 'Austria'),
(18, 'Azerbaijan'),
(19, 'Bahamas'),
(20, 'Bahrain'),
(21, 'Bangladesh'),
(22, 'Barbados'),
(23, 'Belarus'),
(24, 'Belgium'),
(25, 'Belize'),
(26, 'Benin'),
(27, 'Bermuda'),
(28, 'Bhutan'),
(29, 'Bolivia'),
(30, 'Bonaire'),
(31, 'Bosnia and Herzegovina'),
(32, 'Botswana'),
(33, 'Bouvet Island'),
(34, 'Brazil'),
(35, 'British Indian Ocean Territory'),
(36, 'British Virgin Islands'),
(37, 'Brunei'),
(38, 'Bulgaria'),
(39, 'Burkina Faso'),
(40, 'Burundi'),
(41, 'Cambodia'),
(42, 'Cameroon'),
(43, 'Canada'),
(44, 'Cape Verde'),
(45, 'Cayman Islands'),
(46, 'Central African Republic'),
(47, 'Chad'),
(48, 'Chile'),
(49, 'China'),
(50, 'Christmas Island'),
(51, 'Cocos Keeling Islands'),
(52, 'Colombia'),
(53, 'Comoros'),
(54, 'Cook Islands'),
(55, 'Costa Rica'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Curacao'),
(59, 'Cyprus'),
(60, 'Czech Republic'),
(61, 'Democratic Republic of the Congo'),
(62, 'Denmark'),
(63, 'Djibouti'),
(64, 'Dominica'),
(65, 'Dominican Republic'),
(66, 'East Timor'),
(67, 'Ecuador'),
(68, 'Egypt'),
(69, 'El Salvador'),
(70, 'Equatorial Guinea'),
(71, 'Eritrea'),
(72, 'Estonia'),
(73, 'Ethiopia'),
(74, 'Falkland Islands'),
(75, 'Faroe Islands'),
(76, 'Fiji'),
(77, 'Finland'),
(78, 'France'),
(79, 'French Guiana'),
(80, 'French Polynesia'),
(81, 'French Southern Territories'),
(82, 'Gabon'),
(83, 'Gambia'),
(84, 'Georgia'),
(85, 'Germany'),
(86, 'Ghana'),
(87, 'Gibraltar'),
(88, 'Greece'),
(89, 'Greenland'),
(90, 'Grenada'),
(91, 'Guadeloupe'),
(92, 'Guam'),
(93, 'Guatemala'),
(94, 'Guernsey'),
(95, 'Guinea'),
(96, 'Guinea-Bissau'),
(97, 'Guyana'),
(98, 'Haiti'),
(99, 'Heard Island and McDonald Islands'),
(100, 'Honduras'),
(101, 'Hong Kong'),
(102, 'Hungary'),
(103, 'Iceland'),
(104, 'India'),
(105, 'Indonesia'),
(106, 'Iran'),
(107, 'Iraq'),
(108, 'Ireland'),
(109, 'Isle of Man'),
(110, 'Israel'),
(111, 'Italy'),
(112, 'Ivory Coast'),
(113, 'Jamaica'),
(114, 'Japan'),
(115, 'Jersey'),
(116, 'Jordan'),
(117, 'Kazakhstan'),
(118, 'Kenya'),
(119, 'Kiribati'),
(120, 'Kosovo'),
(121, 'Kuwait'),
(122, 'Kyrgyzstan'),
(123, 'Laos'),
(124, 'Latvia'),
(125, 'Lebanon'),
(126, 'Lesotho'),
(127, 'Liberia'),
(128, 'Libya'),
(129, 'Liechtenstein'),
(130, 'Lithuania'),
(131, 'Luxembourg'),
(132, 'Macao'),
(133, 'Macedonia'),
(134, 'Madagascar'),
(135, 'Malawi'),
(136, 'Malaysia'),
(137, 'Maldives'),
(138, 'Mali'),
(139, 'Malta'),
(140, 'Marshall Islands'),
(141, 'Martinique'),
(142, 'Mauritania'),
(143, 'Mauritius'),
(144, 'Mayotte'),
(145, 'Mexico'),
(146, 'Micronesia'),
(147, 'Moldova'),
(148, 'Monaco'),
(149, 'Mongolia'),
(150, 'Montenegro'),
(151, 'Montserrat'),
(152, 'Morocco'),
(153, 'Mozambique'),
(154, 'Myanmar [Burma]'),
(155, 'Namibia'),
(156, 'Nauru'),
(157, 'Nepal'),
(158, 'Netherlands'),
(159, 'New Caledonia'),
(160, 'New Zealand'),
(161, 'Nicaragua'),
(162, 'Niger'),
(163, 'Nigeria'),
(164, 'Niue'),
(165, 'Norfolk Island'),
(166, 'North Korea'),
(167, 'Northern Mariana Islands'),
(168, 'Norway'),
(169, 'Oman'),
(170, 'Pakistan'),
(171, 'Palau'),
(172, 'Palestine'),
(173, 'Panama'),
(174, 'Papua New Guinea'),
(175, 'Paraguay'),
(176, 'Peru'),
(177, 'Philippines'),
(178, 'Pitcairn Islands'),
(179, 'Poland'),
(180, 'Portugal'),
(181, 'Puerto Rico'),
(182, 'Qatar'),
(183, 'Republic of the Congo'),
(184, 'Reunion'),
(185, 'Romania'),
(186, 'Russia'),
(187, 'Rwanda'),
(188, 'Saint Barthélemy'),
(189, 'Saint Helena'),
(190, 'Saint Kitts and Nevis'),
(191, 'Saint Lucia'),
(192, 'Saint Martin'),
(193, 'Saint Pierre and Miquelon'),
(194, 'Saint Vincent and the Grenadines'),
(195, 'Samoa'),
(196, 'San Marino'),
(197, 'Sao Tome and Principe'),
(198, 'Saudi Arabia'),
(199, 'Senegal'),
(200, 'Serbia'),
(201, 'Seychelles'),
(202, 'Sierra Leone'),
(203, 'Singapore'),
(204, 'Sint Maarten'),
(205, 'Slovakia'),
(206, 'Slovenia'),
(207, 'Solomon Islands'),
(208, 'Somalia'),
(209, 'South Africa'),
(210, 'South Georgia and the South Sandwich Islands'),
(211, 'South Korea'),
(212, 'South Sudan'),
(213, 'Spain'),
(214, 'Sri Lanka'),
(215, 'Sudan'),
(216, 'Suriname'),
(217, 'Svalbard and Jan Mayen'),
(218, 'Swaziland'),
(219, 'Sweden'),
(220, 'Switzerland'),
(221, 'Syria'),
(222, 'Taiwan'),
(223, 'Tajikistan'),
(224, 'Tanzania'),
(225, 'Thailand'),
(226, 'Togo'),
(227, 'Tokelau'),
(228, 'Tonga'),
(229, 'Trinidad and Tobago'),
(230, 'Tunisia'),
(231, 'Turkey'),
(232, 'Turkmenistan'),
(233, 'Turks and Caicos Islands'),
(234, 'Tuvalu'),
(235, 'U.S. Minor Outlying Islands'),
(236, 'U.S. Virgin Islands'),
(237, 'Uganda'),
(238, 'Ukraine'),
(239, 'United Arab Emirates'),
(240, 'United Kingdom'),
(241, 'United States'),
(242, 'Uruguay'),
(243, 'Uzbekistan'),
(244, 'Vanuatu'),
(245, 'Vatican City'),
(246, 'Venezuela'),
(247, 'Vietnam'),
(248, 'Wallis and Futuna'),
(249, 'Western Sahara'),
(250, 'Yemen'),
(251, 'Zambia'),
(252, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_title` varchar(255) NOT NULL,
  `currency_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_title`, `currency_description`) VALUES
(1, '&#8364; (EURO)', 'EURO'),
(2, '&#165; (YEN)', 'YEN'),
(3, '&#163; (POUND)', 'pound'),
(4, '&#36; (USD)', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'IT Department'),
(2, 'Java Developement'),
(3, 'HR Department'),
(4, 'Web Developement');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` text NOT NULL,
  `faq_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_title`, `faq_description`) VALUES
(2, 'What is rental?', 'We started renting textbooks back in 2010. Students now have the option of purchasing or renting their textbooks. If you rent a textbook you pay a lower rental fee upfront which entitles you to use our book for the semester and then you bring the book back to us at the end of the semester.\r\n'),
(3, 'Why should I rent?', 'Renting textbooks can save you on average over 50% from the new textbook price. When you rent books, you pay less up front and then you don’t have to worry about if the book will be bought back or not.\r\n'),
(4, 'How do I rent?', 'If you are buying online, you will see a rental option for eligible titles. If you are buying in store, you will select between purchasing and renting. At checkout, you will sign the rental agreement. For rental textbooks, you will need to pay with a debit or credit card and the card must have an expiration date at least one month later than the rental due date. This card will be used as collateral in case the books are not returned.\r\n'),
(5, 'When is the rental due date?\r\n', 'The rental due date is the Monday after the week of finals by 5pm.\r\n'),
(6, 'How do I return/check-in my rental?\r\n', 'It\'s easy. Just bring your rental to the counter in store and tell us it is a rental. We will check your book in and then a receipt of your check-in will be emailed to you.\r\n'),
(7, 'What if I forget which books I rented and I lost my receipt?\r\n', 'No problem. We know what books you rented and can look it up for you at any time. You also do not need your receipt in order to return your rentals.\r\n'),
(8, 'What is the refund policy for rented textbooks?\r\n', 'Rental books follow the same refund policy as a purchase. You have until the first Friday of your session to return books for any reason. After that, you have until the add/drop date to return books if you dropped the class. Any rented or purchased books after the drop date can be returned for a refund within 48 hours.\r\n'),
(9, 'What if I want to keep the book or need it longer?', 'You can convert your textbook rental to a purchase up until one week after the add/drop date by paying the difference between a sale and a rental.  For full semester classes, this date usually is three weeks after the first day of school. If you do not convert before this day and at the end of the semester you decide you want to keep the book, you would need to pay the replacement cost, which is 50% of the new price of the book.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_title` varchar(255) NOT NULL,
  `gender_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_title`, `gender_description`) VALUES
(1, 'Male', ''),
(2, 'Female', '');

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

CREATE TABLE `marital` (
  `marital_id` int(11) NOT NULL,
  `marital_title` varchar(255) NOT NULL,
  `marital_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`marital_id`, `marital_title`, `marital_description`) VALUES
(1, 'Married', ''),
(2, 'Unmarried', ''),
(3, 'Divorced', '');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Adminstrator'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `salutation`
--

CREATE TABLE `salutation` (
  `salutation_id` int(11) NOT NULL,
  `salutation_title` varchar(255) NOT NULL,
  `salutation_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salutation`
--

INSERT INTO `salutation` (`salutation_id`, `salutation_title`, `salutation_description`) VALUES
(1, 'Mr.', ''),
(2, 'Mrs.', ''),
(3, 'Dr.', ''),
(4, 'Er.', '');

-- --------------------------------------------------------

--
-- Table structure for table `salutions`
--

CREATE TABLE `salutions` (
  `sl_id` int(11) NOT NULL,
  `sl_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salutions`
--

INSERT INTO `salutions` (`sl_id`, `sl_name`) VALUES
(1, 'Mr.'),
(2, 'Mrs.');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill_emp_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Maharastra'),
(2, 'Gujrat'),
(3, 'Bihar'),
(4, 'Uttar Pradesh'),
(5, 'Delhi'),
(6, 'Haryana');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_title` varchar(255) NOT NULL,
  `status_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_title`, `status_color`) VALUES
(1, 'Processing', 'btn-primary'),
(2, 'Cancelled', 'btn-danger'),
(3, 'Completed', 'btn-success');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_user_id` varchar(255) NOT NULL,
  `transaction_type_id` varchar(255) NOT NULL,
  `transaction_amount` double(12,2) NOT NULL DEFAULT '0.00',
  `transaction_date` varchar(255) NOT NULL,
  `transaction_description` text NOT NULL,
  `transaction_bank_name` varchar(255) NOT NULL,
  `transaction_ifsc_code` varchar(30) NOT NULL,
  `transaction_currency_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_user_id`, `transaction_type_id`, `transaction_amount`, `transaction_date`, `transaction_description`, `transaction_bank_name`, `transaction_ifsc_code`, `transaction_currency_id`) VALUES
(38, '1600000522', '1', 10000.00, '26 October,2018', 'test', '4', 'AXIS3982', '3'),
(39, '1600000522', '1', 900.00, '26 October,2018', 'test', '4', 'AXIS3982', '2'),
(40, '1600000522', '2', 1222.00, '26 October,2018', 'Amount Debited', 'test', 'ABC0123', ''),
(41, '1600000522', '2', 23.00, '26 October,2018', 'Amount Debited', '5', 'ALL9834', '3'),
(42, '1600000522', '2', 44.00, '26 October,2018', 'Amount Debited', '5', 'ALL9834', '3'),
(43, '1600000522', '1', 999999999.00, '26 October,2018', 'test', '4', 'AXIS3982', '3'),
(44, '1600000522', '2', 9610.00, '26 October,2018', 'Amount Debited', '3', 'HDFC7697', '3');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_limit`
--

CREATE TABLE `transfer_limit` (
  `id` int(2) NOT NULL,
  `max_transfer_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_limit`
--

INSERT INTO `transfer_limit` (`id`, `max_transfer_limit`) VALUES
(1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_title`) VALUES
(1, 'Credit'),
(2, 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_level_id` varchar(255) DEFAULT '2',
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_salutation_id` varchar(255) NOT NULL,
  `user_at_id` varchar(255) NOT NULL,
  `user_account_name` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_gender_id` varchar(255) NOT NULL,
  `user_marital_id` varchar(255) NOT NULL,
  `user_dob` varchar(255) NOT NULL,
  `user_occupation` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_telephone` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_fax` varchar(255) NOT NULL,
  `user_nationality` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1:Active,0:Deactive',
  `balance_amount` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level_id`, `user_username`, `user_password`, `user_salutation_id`, `user_at_id`, `user_account_name`, `user_first_name`, `user_last_name`, `user_gender_id`, `user_marital_id`, `user_dob`, `user_occupation`, `user_address`, `user_image`, `user_city`, `user_state`, `user_country`, `user_telephone`, `user_mobile`, `user_fax`, `user_nationality`, `status`, `balance_amount`) VALUES
(1600000468, '2', 'juniceandre@usa.com', 'Moneyment123456', '2', '3', 'Junice Andre', 'Junice', 'Andre', '2', '3', '17-05-1976', 'trader', '5135', 'E9738336-3C9A-49FD-B71E-BD168DCF4DFD (1).jpeg', 'blue springs', 'missouri', '241', '', '+140266832056 ', '', 'united states', 0, '0'),
(1600000506, '2', 'nehajaggi@soarlogic.com', '123456789', '3', '2', 'neha jaggi', 'neha', 'jaggi', '2', '2', '30 September,1990', 'sw', 'sidhvihar,jogiwala', '', 'dehradun', 'Gambela', '73', '0123456789', '123456789', '123456789', 'Ethiopia', 0, '0'),
(1600000509, '2', 'sumitkandwal@soarlogic.com', 'soar', '1', '1', 'sumit kandwal', 'sumit', 'kandwal', '1', '1', '25 September,2018', 'job', 'tannisqa vihar', '', 'DEHRADUN', 'Uttarakhand', '104', '+919911090210', '+919911090210', '', 'india', 0, '0'),
(1600000513, '2', 'jddavis884@gmail.com', '123456', '2', '3', 'Wanita Davis', 'Wanita', 'Davis', '2', '1', '1 September,1970', 'Carer', '62nd Avenue', '', 'Bricks', 'Los Angelis', '241', '', '+102345678', '', 'USA', 0, '0'),
(1600000519, '2', 'jlegylykke@consultant.com', '123456', '3', '3', 'Coleman FItz', 'Coleman', 'FItz', '1', '3', '4 October,1976', 'Business man', '34 Flat 3', '', 'Kansas', 'North Carolina', '240', '', '+4647367436', '', 'Australian', 0, '0'),
(1600000520, '2', 'sssbza1@gmail.com', 'blessing', '1', '3', 'Mike Dean', 'Mike', 'Dean', '1', '3', '15 March,2018', 'PI', '214 sleng drive', '1001699_629907727021249_671807873_n.jpg', 'Clovis', 'California', '241', '650-900-5611', '650-900-5611', '', 'Swedish', 1, '7764000'),
(1600000522, '2', 'tsttest@gmail.com', '', '3', '1', 'test test', 'test', 'test', '1', '1', '24 October,2018', 'service', 'test', 'slider2.jpg', 'lucknow', 'up', '11', '9889887733', '9889443322', '+0129384756', 'indian', 1, '1000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `add_beneficiary`
--
ALTER TABLE `add_beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_name` (`bank_name`);

--
-- Indexes for table `banks_detail`
--
ALTER TABLE `banks_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `marital`
--
ALTER TABLE `marital`
  ADD PRIMARY KEY (`marital_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `salutation`
--
ALTER TABLE `salutation`
  ADD PRIMARY KEY (`salutation_id`);

--
-- Indexes for table `salutions`
--
ALTER TABLE `salutions`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transfer_limit`
--
ALTER TABLE `transfer_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `add_beneficiary`
--
ALTER TABLE `add_beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `banks_detail`
--
ALTER TABLE `banks_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `marital`
--
ALTER TABLE `marital`
  MODIFY `marital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salutation`
--
ALTER TABLE `salutation`
  MODIFY `salutation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salutions`
--
ALTER TABLE `salutions`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `transfer_limit`
--
ALTER TABLE `transfer_limit`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1600000523;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
