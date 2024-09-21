-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 09:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'tushar', 'df7c905d9ffebe7cda405cf1c82a3add', '2024-06-10 07:51:27'),
(2, 'tharun', '382f81ab4aeb1d3558a88462a9b1c9fc', '2024-06-10 07:51:55'),
(3, 'vignesh', '49b01b584d0ee82813b940ddad08d231', '2024-06-10 07:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(3, 231083511, 'vignesh@gmail.com', 5, '2024-06-29', '2024-06-30', 'Need a best quoation', 1, '2024-06-10 16:14:36', '2024-06-10 16:42:44'),
(4, 563741500, 'tharun@gmail.com', 6, '2024-07-25', '2024-07-27', 'Need delivery one day earlier.', 2, '2024-06-10 16:15:29', '2024-06-10 16:43:05'),
(5, 200398225, 'tushar@gmail.com', 7, '2024-06-09', '2024-06-10', 'Need a call back', 1, '2024-06-10 16:35:14', '2024-07-03 15:48:50'),
(6, 410307370, 'manishvr@gmail.com', 3, '2024-06-26', '2024-06-30', 'Call back required', 1, '2024-06-16 14:39:30', '2024-06-16 14:40:07'),
(9, 208833870, 'surajkumar@gmail.com', 4, '2024-07-27', '2024-07-29', 'Need for vacation', 1, '2024-06-16 18:41:10', '2024-06-16 18:41:24'),
(10, 345617350, 'tharun@gmail.com', 1, '2024-06-29', '2024-06-29', 'hi', 0, '2024-06-22 09:01:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2023-06-18 16:24:34', '2023-06-19 06:42:23'),
(2, 'BMW', '2023-06-18 16:24:50', NULL),
(3, 'Audi', '2023-06-18 16:25:03', NULL),
(4, 'Nissan', '2023-06-18 16:25:13', NULL),
(5, 'Toyota', '2023-06-18 16:25:24', NULL),
(7, 'Volkswagon', '2023-06-19 06:22:13', '2023-07-07 14:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Kasturinagar, Bangalore', 'saicarrentals@gmail.com', '9991169694');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Tejas Raj', 'tejas@gmail.com', '1593574562', 'Can I rent multiple cars for rent at same time', '2024-06-30 08:48:46', 1),
(2, 'Keshav', 'Keshav@gmail.com', '9513578963', 'Can I visit the store for checking the cars?', '2024-06-30 08:48:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<br>\r\n<ol style=\"text-align:left;\">\r\n\r\n<li style=\"color:#990000;font-size:17px;\"><b>Driver’s License: </b></li>\r\n<ul>\r\n<li>Residents of India: You must present a valid driver’s license issued by the Indian government for the entire rental period. </li>\r\n<li>International Driver’s License: If you’re a resident of a country outside India, present a driver’s license issued by your country of residence. If it’s not in English, also provide a current International Driver’s Permit (IDP) or a Japanese Translation Service (for Japan). An IDP provides a certified translation of the valid foreign driver’s license.</li>\r\n<li>Learner’s permits are not accepted as valid driver’s licenses.</li>\r\n</ul><br>\r\n\r\n<li style=\"color:#990000;font-size:17px;\"><b>Sensitive Information: </b></li>\r\n<ul>Sai Rentals handles sensitive personal information according to Indian privacy laws. </li>\r\n</ul><br>\r\n\r\n<li style=\"color:#990000;font-size:17px;\"><b>Individual Access Rights: </b></li>\r\n<ul>\r\n<li>You have rights regarding your data. Read our <a href=\"page.php?type=privacy\">Privacy policy</a> or <a href=\"contact-us.php\">Contact us</a> for more details. </li>\r\n</ul>\r\n\r\n</ol>'),
(2, 'Privacy Policy', 'privacy', '<br>\r\nAt <b>Sai Rentals</b>, we value your privacy and are committed to protecting your personal information. This policy outlines how we collect, use, disclose, and safeguard your data when you use our services.<br><br>\r\n\r\nWe collect various types of information, including contact details (such as name, address, phone numbers, and email addresses), driver qualifications (including driver’s license information, insurance details, passport, proof of residence, and personal references), transaction information (vehicle rental details, rental locations, dates, and ancillary products purchased), billing information (charges, payments, and credit card details), loyalty and affiliation information (rewards, loyalty programs, and corporate account IDs), claims information (details related to accidents involving our vehicles), health information (relevant health conditions for adaptive driving devices), optional information (emergency contacts and preferences), and video recordings from CCTV and other cameras in public areas of our rental locations.<br><br>\r\n\r\nWe also collect sensitive personal information as defined by state privacy laws, using and disclosing it only for lawful purposes.<br><br>\r\n\r\nIndividuals have rights regarding their data, which can be found on our website. <b>Our privacy policy was last updated on March 13, 2024.</b>'),
(3, 'About Us ', 'aboutus', '\r\n<br>\r\n<b>Sai Rentals</b> is more than just a car rental company. We prioritize your needs and comfort, offering a wide range of vehicles—from compact cars to spacious SUVs. Our experienced drivers and transparent policies ensure a seamless journey. Whether you’re exploring the city or embarking on a scenic road trip, Sai Rentals is your trusted travel companion. Book with us today by <a href=\"contact-us.php\">contacting us</a> right away.'),
(4, 'FAQs', 'faqs', '<br>\r\n<ol style=\"text-align:left;\">\r\n\r\n<li><b>When should I book a rental car? </b></li>\r\n<ul>\r\n<li>It depends on your priorities. If getting the best deal is crucial, waiting until the last minute might work. However, if having a wide selection of cars matters more, book sooner. </li>\r\n</ul><br>\r\n\r\n<li><b>How much do rental cars usually cost? </b></li>\r\n<ul>\r\n<li>On average, rental cars now cost about Rs4000 per day for normal cars and prices vary for luxury cars, down 20-25% compared to last year. Travelers renting cars can also expect relief on gas prices. </li>\r\n</ul><br>\r\n\r\n<li><b>Should I prepay for gas on my rental car? </b></li>\r\n<ul>\r\n<li>It’s almost never worth it to prepay for gas. Instead, fill up the tank before returning the vehicle. </li>\r\n</ul>\r\n\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(1, 'deepak.nitsikkim@ggmail.com', '2024-06-10 08:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'surajkumar@gmail.com', 'Had a privileged owing a vehicle from this dealership, the executives were responsive and provided an excellent service.', '2020-07-07 14:30:12', 1),
(2, 'manishvr@gmail.com', 'The car was in great condition and we had a comfortable ride, highly recorded. The staff were very informative and helpful.', '2020-07-07 14:30:12', 1),
(3, 'sudeep@gmail.com', 'The staff is very communicative and friend the process of booking, delivery and drop-in went extremely smooth.', '2020-07-07 14:30:12', 1),
(4, 'vaibhavs@gmail.com', 'The car was delivered quick, tidy car, comfortable seats, excellent staff, budget friendly.\r\n\r\nhighly recomemded', '2020-07-07 14:30:12', 1),
(5, 'tushar@gmail.com', 'Very very awesome service', '2024-06-20 11:37:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Suraj Kumar', 'surajkumar@gmail.com', '8275772ce4837c086a909ab7f6fd821c', '8896547231', '', 'halasuru, Bangalore', 'Bangalore', 'India', '2020-07-07 14:00:49', '2024-06-10 08:00:58'),
(2, 'Manish VR', 'manishvr@gmail.com', '8dc4b12a76e0e5c8bff45b8a11f21647', '9975684123', '', 'KR Puram, Bangalore', 'Bangalore', 'India', '2020-07-07 14:00:49', '2024-06-10 08:01:32'),
(3, 'Vaibhav S', 'vaibhavs@gmail.com', 'e0035bb71277e02310652f9194c7806f', '7789658745', '', 'RR Nagar, Bangalore', 'Bangalore', 'India', '2020-07-07 14:00:49', '2024-06-10 08:02:05'),
(4, 'Sudeep Cheta', 'sudeep@gmail.com', '2425ba423812055b9da4453bddda212d', '9685723156', '', 'Indranagar, Bangalore', 'Bangalore', 'India', '2020-07-07 14:00:49', '2024-06-10 08:02:47'),
(5, 'Vignesh KM', 'vignesh@gmail.com', '49b01b584d0ee82813b940ddad08d231', '8878965458', NULL, NULL, NULL, NULL, '2024-06-10 16:07:23', NULL),
(6, 'Tushar K', 'tushar@gmail.com', 'df7c905d9ffebe7cda405cf1c82a3add', '8896231475', NULL, NULL, NULL, NULL, '2024-06-10 16:11:54', NULL),
(7, 'Tharun S', 'tharun@gmail.com', '382f81ab4aeb1d3558a88462a9b1c9fc', '9875984231', NULL, NULL, NULL, NULL, '2024-06-10 16:12:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'Maruti Suzuki Wagon R', 1, 'Maruti Wagon R Latest Updates\r\n\r\nMaruti Suzuki has launched the BS6 Wagon R S-CNG in India. The LXI CNG and LXI (O) CNG variants now cost Rs 5.25 lakh and Rs 5.32 lakh respectively, up by Rs 19,000. Maruti claims a fuel economy of 32.52km per kg. The CNG Wagon R’s continuation in the BS6 era is part of the carmaker’s ‘Mission Green Million’ initiative announced at Auto Expo 2020.\r\n\r\nPreviously, the carmaker had updated the 1.0-litre powertrain to meet BS6 emission norms. It develops 68PS of power and 90Nm of torque, same as the BS4 unit. However, the updated motor now returns 21.79 kmpl, which is a little less than the BS4 unit’s 22.5kmpl claimed figure. Barring the CNG variants, the prices of the Wagon R 1.0-litre have been hiked by Rs 8,000.', 5000, 'Petrol', 2019, 5, 'rear-3-4-left-589823254_930x620.jpg', 'tail-lamp-1666712219_930x620.jpg', 'rear-3-4-right-520328200_930x620.jpg', 'steering-close-up-1288209207_930x620.jpg', 'boot-with-standard-luggage-202327489_930x620.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-07 07:04:35', '2024-06-10 07:42:46'),
(2, 'BMW 5 Series', 2, 'BMW 5 Series price starts at Rs 55.4 Lakh and goes upto Rs 68.39 Lakh. The price of Petrol version for 5 Series ranges between Rs 55.4 Lakh - Rs 60.89 Lakh and the price of Diesel version for 5 Series ranges between Rs 60.89 Lakh - Rs 68.39 Lakh.', 15000, 'Petrol', 2018, 5, 'BMW-5-Series-Exterior-102005.jpg', 'BMW-5-Series-New-Exterior-89729.jpg', 'BMW-5-Series-Exterior-102006.jpg', 'BMW-5-Series-Interior-102021.jpg', 'BMW-5-Series-Interior-102022.jpg', 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, '2020-07-07 07:12:02', '2024-06-20 11:00:21'),
(3, 'Audi Q8', 3, 'As per ARAI, the mileage of Q8 is 0 kmpl. Real mileage of the vehicle varies depending upon the driving habits. City and highway mileage figures also vary depending upon the road conditions.', 12000, 'Petrol', 2017, 5, 'audi-q8-front-view4.jpg', '1920x1080_MTC_XL_framed_Audi-Odessa-Armaturen_Spiegelung_CC_v05.jpg', 'audi1.jpg', '1audiq8.jpg', 'audi-q8-front-view4.jpeg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-07 07:19:21', '2024-06-10 07:43:32'),
(4, 'Nissan Kicks', 4, 'Latest Update: Nissan has launched the Kicks 2020 with a new turbocharged petrol engine. You can read more about it here.\r\n\r\nNissan Kicks Price and Variants: The Kicks is available in four variants: XL, XV, XV Premium, and XV Premium(O).', 8000, 'Petrol', 2020, 5, 'front-left-side-47.jpg', 'kicksmodelimage.jpg', 'download.jpg', 'kicksmodelimage.jpg', '', 1, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, '2020-07-07 07:25:28', NULL),
(5, 'Nissan GT-R', 4, ' The GT-R packs a 3.8-litre V6 twin-turbocharged petrol, which puts out 570PS of max power at 6800rpm and 637Nm of peak torque. The engine is mated to a 6-speed dual-clutch transmission in an all-wheel-drive setup. The 2+2 seater GT-R sprints from 0-100kmph in less than 3', 20000, 'Petrol', 2019, 2, 'Nissan-GTR-Right-Front-Three-Quarter-84895.jpg', 'Best-Nissan-Cars-in-India-New-and-Used-1.jpg', '2bb3bc938e734f462e45ed83be05165d.jpg', '2020-nissan-gtr-rakuda-tan-semi-aniline-leather-interior.jpg', 'images.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-07 07:34:17', NULL),
(6, 'Nissan Sunny 2020', 4, 'Value for money product and it was so good It is more spacious than other sedans It looks like a luxurious car.', 4000, 'CNG', 2018, 4, 'Nissan-Sunny-Right-Front-Three-Quarter-48975_ol.jpg', 'images (1).jpg', 'Nissan-Sunny-Interior-114977.jpg', 'nissan-sunny-8a29f53-500x375.jpg', 'new-nissan-sunny-photo.jpg', 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-07 09:12:49', NULL),
(7, 'Toyota Fortuner', 5, 'Toyota Fortuner Features: It is a premium seven-seater SUV loaded with features such as LED projector headlamps with LED DRLs, LED fog lamp, and power-adjustable and foldable ORVMs. Inside, the Fortuner offers features such as power-adjustable driver seat, automatic climate control, push-button stop/start, and cruise control.\r\n\r\nToyota Fortuner Safety Features: The Toyota Fortuner gets seven airbags, hill assist control, vehicle stability control with brake assist, and ABS with EBD.', 7000, 'Petrol', 2020, 7, '2015_Toyota_Fortuner_(New_Zealand).jpg', 'toyota-fortuner-legender-rear-quarters-6e57.jpg', 'zw-toyota-fortuner-2020-2.jpg', 'download (1).jpg', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 1, 1, '2020-07-07 09:17:46', NULL),
(8, 'Maruti Suzuki Vitara Brezza', 1, 'The new Vitara Brezza is a well-rounded package that is feature-loaded and offers good drivability. And it is backed by Maruti’s vast service network, which ensures a peace of mind to customers. The petrol motor could have been more refined and offered more pep.', 5000, 'Petrol', 2018, 5, 'marutisuzuki-vitara-brezza-right-front-three-quarter3.jpg', 'marutisuzuki-vitara-brezza-rear-view37.jpg', 'marutisuzuki-vitara-brezza-dashboard10.jpg', 'marutisuzuki-vitara-brezza-boot-space59.jpg', 'marutisuzuki-vitara-brezza-boot-space28.jpg', NULL, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, '2020-07-07 09:23:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
