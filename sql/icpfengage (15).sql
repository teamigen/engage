-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 05:45 AM
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
-- Database: `icpfengage`
--

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `churchId` int(11) NOT NULL,
  `churchName` varchar(255) NOT NULL,
  `churchSlug` varchar(255) NOT NULL,
  `churchLocation` int(11) NOT NULL,
  `pastorName` varchar(255) NOT NULL,
  `mobileNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`churchId`, `churchName`, `churchSlug`, `churchLocation`, `pastorName`, `mobileNumber`) VALUES
(1, 'church 1', 'church1', 1, 'pastor 1', '5489654');

-- --------------------------------------------------------

--
-- Table structure for table `contact_persons`
--

CREATE TABLE `contact_persons` (
  `contactId` int(11) NOT NULL,
  `churchId` int(11) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactPhone` varchar(20) NOT NULL,
  `staffId` int(11) NOT NULL,
  `stationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eg_council`
--

CREATE TABLE `eg_council` (
  `councilId` int(11) NOT NULL,
  `councilName` varchar(255) NOT NULL,
  `councilSlug` varchar(255) NOT NULL,
  `councilLocation` int(255) NOT NULL,
  `councilInstitute` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `staffId` int(11) NOT NULL,
  `stationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_council`
--

INSERT INTO `eg_council` (`councilId`, `councilName`, `councilSlug`, `councilLocation`, `councilInstitute`, `startDate`, `endDate`, `createdAt`, `staffId`, `stationId`) VALUES
(2, 'Youth Ministry Council', 'youthministrycouncil', 1, '1', '2024-09-04', '2024-10-12', '2024-09-04 08:13:00', 81, 2),
(3, 'Church Council', 'churchcouncil', 1, '1', '2024-10-03', '2024-09-27', '2024-09-04 09:08:33', 81, 2),
(4, 'Mar Ivanios College', 'marivanioscollege', 1, '3', '2024-06-04', '2025-06-11', '2024-09-04 14:13:12', 81, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eg_council_member`
--

CREATE TABLE `eg_council_member` (
  `memberId` int(11) NOT NULL,
  `councilId` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `cgpfNumber` varchar(20) NOT NULL,
  `stationId` int(11) NOT NULL,
  `memberEmail` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_council_member`
--

INSERT INTO `eg_council_member` (`memberId`, `councilId`, `memberName`, `designation`, `cgpfNumber`, `stationId`, `memberEmail`, `createdAt`) VALUES
(5, 3, 'mem11', 'Joint Secretary', '123', 9, '123@email', '2024-09-04 10:19:42'),
(6, 3, 'mem22', 'Treasurer', '456', 9, '456@email', '2024-09-04 10:19:42'),
(19, 2, 'mem11', 'Secretary', '123', 9, '123@email', '2024-09-04 10:50:07'),
(20, 2, 'mem22', 'Joint Secretary', '4567', 9, '456@email', '2024-09-04 10:50:07'),
(21, 4, 'Joshua Anil', 'Secretary', '8606465354', 2, 'joshu@anil.com', '2024-09-04 14:13:12'),
(22, 4, 'Nathan Tim', 'Joint Secretary', '7019234286', 2, 'nathan@tim.com', '2024-09-04 14:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `eg_country`
--

CREATE TABLE `eg_country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL,
  `countryActive` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_country`
--

INSERT INTO `eg_country` (`countryId`, `countryName`, `countryActive`) VALUES
(1, 'India', 1),
(2, 'United Arab Emirates', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eg_family_details`
--

CREATE TABLE `eg_family_details` (
  `familyId` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
  `familyName` varchar(255) DEFAULT NULL,
  `familyRegion` int(11) DEFAULT NULL,
  `familyAge` int(11) DEFAULT NULL,
  `familyOccupation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eg_institutes`
--

CREATE TABLE `eg_institutes` (
  `instituteId` int(11) NOT NULL,
  `instituteName` varchar(255) NOT NULL,
  `instituteSlug` varchar(255) NOT NULL,
  `instituteLocation` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `stationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `eg_institutes`
--

INSERT INTO `eg_institutes` (`instituteId`, `instituteName`, `instituteSlug`, `instituteLocation`, `staffId`, `stationId`) VALUES
(1, 'Institute', 'institute', 1, 81, 2),
(2, 'Institute1', 'institute1', 1, 81, 3),
(3, 'Mar Ivanios College', 'marivanioscollege', 0, 81, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eg_location`
--

CREATE TABLE `eg_location` (
  `locationId` int(11) NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `locationStatus` tinyint(1) NOT NULL,
  `locationSlug` varchar(255) NOT NULL,
  `stationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_location`
--

INSERT INTO `eg_location` (`locationId`, `locationName`, `locationStatus`, `locationSlug`, `stationId`) VALUES
(1, 'Nalamchira', 1, 'nalamchira', 2),
(2, 'Sreekariyam', 1, 'sreekariyam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `eg_staff`
--

CREATE TABLE `eg_staff` (
  `staffId` int(11) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffSlug` varchar(255) NOT NULL,
  `joiningDate` date DEFAULT NULL,
  `station` int(11) DEFAULT NULL,
  `staffType` int(11) DEFAULT NULL,
  `familyRegion` int(11) DEFAULT NULL,
  `officeLocation` varchar(255) NOT NULL,
  `exitingDate` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `whatsappNumber` varchar(20) DEFAULT NULL,
  `alternateWhatsappNumber` varchar(20) DEFAULT NULL,
  `dateofAnniversary` date DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_staff`
--

INSERT INTO `eg_staff` (`staffId`, `staffName`, `staffSlug`, `joiningDate`, `station`, `staffType`, `familyRegion`, `officeLocation`, `exitingDate`, `username`, `password`, `whatsappNumber`, `alternateWhatsappNumber`, `dateofAnniversary`, `dateofbirth`) VALUES
(1, 'staff testing', 'stafftesting', NULL, 1, 2, 0, '1', NULL, 'admin', '$2y$10$VQ7p36X87hbtq9CXYACW4ej6.HQOghk52TGY.zM53O5fLmz9fwM0q', '45324234', '234234534', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eg_station`
--

CREATE TABLE `eg_station` (
  `stationId` int(11) NOT NULL,
  `stationName` varchar(255) NOT NULL,
  `stationSlug` varchar(255) NOT NULL,
  `selectedRegion` varchar(255) NOT NULL,
  `stationStatus` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_station`
--

INSERT INTO `eg_station` (`stationId`, `stationName`, `stationSlug`, `selectedRegion`, `stationStatus`) VALUES
(2, 'Kollam', 'kollam', '4', 1),
(3, 'Pathanamthitta', 'pathanamthitta', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eg_transfer_details`
--

CREATE TABLE `eg_transfer_details` (
  `transferId` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
  `transferDate` date DEFAULT NULL,
  `fromStation` int(11) DEFAULT NULL,
  `toStation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `program_date` date NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `resource_person` varchar(255) NOT NULL,
  `attendance` int(11) NOT NULL,
  `eventPhotos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `program_date`, `event_name`, `event_location`, `resource_person`, `attendance`, `eventPhotos`, `created_at`, `report_id`) VALUES
(3, '2024-09-26', 'e1', 'l1', 'r1', 11, 'ca65169789ebbf4effce8e8281661d4f.jpg,5a8aa29e0b791f98d5f561b75e5a55d4.jpg,00f7dd517f9686ab41bba65e33be6842.jpg,61cb339d70ef4d0a837b782f06e11f8a.jpg,41afec6756dee05057f232066d0d2419.jpg,855b05599f9916e5871db49b1eb717e1.jpg,867a21a4195e2dcc9c2b2d32bf6e10ca.jpg,b10c96a58df6e43e4c44fa604e0d54ae.jpg,afd64bb0deb56dd5026c992edddf3058.jpg,d583cff2aa1c2e8ca390d6e8b2d14f6c.jpg', '2024-09-03 11:09:11', 3),
(4, '2024-09-28', '323', '3232', '32323', 3232, NULL, '2024-09-03 11:58:43', 0),
(5, '2024-09-19', 'e1', 'l1', 'r1', 11, '', '2024-09-04 06:21:09', 5),
(6, '2024-09-19', 'e1', 'l1', 'r1', 11, '', '2024-09-04 06:21:41', 6),
(7, '2024-09-19', 'e1', 'l1', 'r1', 11, '1742b043cf2fa3ea6b5ce026a1cab761.jpg,dca92d6de0f2400df0091d0cfc196867.jpg,38f0b1bda71b2e442cbba769be517df9.jpg,69d922a77b1573f19cea6284f3a33760.jpg,8b1b73cdf62c5bdbb19fbabd70609062.jpg,ffb08786d04a4b2b7c1a2f71a6ba75a9.jpg', '2024-09-04 06:25:57', 7),
(8, '2024-09-13', 'e1', 'l1', 'r1', 11, '8b9451b4f695671df37d08032c04c8ca.jpg,d19ccbbe4f6ff23fbff86c5691835da9.jpg,ba0e8ca872781563eec5926387228720.jpg,5a9bf8fbb3ea3c22d9c1db8b5b3071b7.jpg,4921b55ad80b529a963c909552c08bc1.jpg,d2b9d1c180036e64744e871dbdc98482.jpg,ac796bbd71e28a4dc21d9128ab54fcce.jpg,1ba424e24b433d547af68d73e26eb0da.jpg,f72e9410ba324c216e93435788498f4c.jpg,2432c55bbbb916156d08c9b8f8054b4f.jpg', '2024-09-04 06:28:13', 8),
(9, '2024-09-13', 'e1', 'l1', 'r1', 11, 'fa9137c1b6c5de2c70fae7808d211c43.jpg,13520a4618d24e182e54640640bdb740.jpg,933ceaf8e7bb4cb933341214e52d71a7.jpg,f33be5eb1d120d87e69fcac0ea749430.jpg,7783046a444ab3c7057ebc299a738373.jpg,77d81bd6fb82cfc08c9d5ad29503410e.jpg,64a6d9f917e9ef78e41bd56c463f6439.jpg,f179eb7724b15c8cfa0e6ef7a5c99b55.jpg,ce755402c1d8532a42802f08a159e0d0.jpg,6fc6ee1c85f53e666245c736d7df8857.jpg', '2024-09-04 06:36:06', 9);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `groupSlug` varchar(255) NOT NULL,
  `groupLocation` int(11) NOT NULL,
  `meetingPlace` varchar(255) NOT NULL,
  `groupType` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupName`, `groupSlug`, `groupLocation`, `meetingPlace`, `groupType`, `createdAt`) VALUES
(1, 'Group 1', 'group1', 1, 'place 1', '', '2024-08-23 09:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `office_location`
--

CREATE TABLE `office_location` (
  `officeId` int(11) NOT NULL,
  `officeLocation` varchar(50) NOT NULL,
  `officeActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_location`
--

INSERT INTO `office_location` (`officeId`, `officeLocation`, `officeActive`) VALUES
(1, 'Head Office', 1),
(2, 'Malabar Centre', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `CGPF_Number` varchar(255) NOT NULL,
  `House_Visit_Number` varchar(255) NOT NULL,
  `Hostel_Visit_Number` varchar(255) NOT NULL,
  `Evangelisms_Number` varchar(255) NOT NULL,
  `Accepted_Christ` varchar(255) NOT NULL,
  `Baptism_Decision` varchar(255) NOT NULL,
  `Baptism_Number` varchar(255) NOT NULL,
  `Holyspirit_Received` varchar(255) NOT NULL,
  `Ministry_Commitments` varchar(255) NOT NULL,
  `Existing_Student_Councils` varchar(255) NOT NULL,
  `New_Student_Councils` varchar(255) NOT NULL,
  `Existing_CGPF` varchar(255) NOT NULL,
  `New_CGPF` varchar(255) NOT NULL,
  `first_sunday_church` int(11) DEFAULT NULL,
  `second_sunday_church` int(11) DEFAULT NULL,
  `third_sunday_church` int(11) DEFAULT NULL,
  `fourth_sunday_church` int(11) DEFAULT NULL,
  `fifth_sunday_church` int(11) DEFAULT NULL,
  `staffId` int(11) NOT NULL,
  `stationId` int(11) NOT NULL,
  `reportMonth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `CGPF_Number`, `House_Visit_Number`, `Hostel_Visit_Number`, `Evangelisms_Number`, `Accepted_Christ`, `Baptism_Decision`, `Baptism_Number`, `Holyspirit_Received`, `Ministry_Commitments`, `Existing_Student_Councils`, `New_Student_Councils`, `Existing_CGPF`, `New_CGPF`, `first_sunday_church`, `second_sunday_church`, `third_sunday_church`, `fourth_sunday_church`, `fifth_sunday_church`, `staffId`, `stationId`, `reportMonth`) VALUES
(3, '23', '323', '32', '43', '32', '23', '23', '34', '43', '43', '434', '34', '43', 1, 1, 1, 1, 1, 0, 0, '0000-00-00'),
(4, '343434', '4343', '43434', '43434', '43434', '34434', '43434', '4343', '4343', '4343423', '42232', '2323', '32323', 1, 1, 1, 1, 1, 0, 0, '0000-00-00'),
(5, '23', '32', '32', '23', '32', '32', '32', '42', '4242', '42', '42', '24', '42', 1, 1, 1, 1, 1, 81, 2, '0000-00-00'),
(6, '23', '32', '32', '23', '32', '32', '32', '42', '4242', '42', '42', '24', '42', 1, 1, 1, 1, 1, 81, 2, '0000-00-00'),
(7, '23', '32', '32', '23', '32', '32', '32', '42', '4242', '42', '42', '24', '42', 1, 1, 1, 1, 1, 81, 2, '0000-00-00'),
(8, '24242', '424', '422', '4224', '424', '424', '4224', '42424', '4242', '4242', '4242', '4242', '4242', 1, 1, 1, 1, 1, 81, 2, '0000-00-00'),
(9, '23', '4242', '42', '42', '32', '42', '42', '42', '42', '42', '424', '42', '424', 1, 1, 1, 1, 1, 81, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `staffSlug` varchar(255) DEFAULT NULL,
  `station` int(11) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `staffType` varchar(255) NOT NULL,
  `officeLocation` varchar(255) DEFAULT NULL,
  `joiningDate` date NOT NULL,
  `exitingDate` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `whatsappNumber` varchar(20) DEFAULT NULL,
  `alternateWhatsappNumber` varchar(20) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `dateofAnniversary` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `staffName`, `staffSlug`, `station`, `region`, `staffType`, `officeLocation`, `joiningDate`, `exitingDate`, `username`, `password`, `whatsappNumber`, `alternateWhatsappNumber`, `dateofbirth`, `dateofAnniversary`) VALUES
(79, 'admin', 'admin', 2, 4, 'Admin Staff', 'Head Office', '2024-09-05', '2024-08-19', 'admin', '$2y$10$3czqK0oB9UsT4GFFCAurmepokO9MArt0k0vcaBTdjubMsZB/y1DyS', '1234567', '654564654165', '2024-08-19', '2024-08-11'),
(81, 'staff', 'staff', 2, 2, 'Station Staff', 'Head Office', '2024-09-13', NULL, 'staff', '$2y$10$3czqK0oB9UsT4GFFCAurmepokO9MArt0k0vcaBTdjubMsZB/y1DyS', '456321', '454651321', '2024-09-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_family`
--

CREATE TABLE `staff_family` (
  `familyId` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
  `familyName` varchar(255) DEFAULT NULL,
  `familyRelation` varchar(255) NOT NULL,
  `FamDOB` date DEFAULT NULL,
  `familyOccupation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_family`
--

INSERT INTO `staff_family` (`familyId`, `staffId`, `familyName`, `familyRelation`, `FamDOB`, `familyOccupation`) VALUES
(164, 79, 'fam 1', 'Son', '2024-08-19', 'son'),
(165, 81, 'fam 1', 'Spouse', '2024-09-03', 'student'),
(166, 81, 'fam 2', 'Son', '2024-09-03', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `staff_transfers`
--

CREATE TABLE `staff_transfers` (
  `transferId` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
  `fromStation` int(11) DEFAULT NULL,
  `toStation` int(11) DEFAULT NULL,
  `transferDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_transfers`
--

INSERT INTO `staff_transfers` (`transferId`, `staffId`, `fromStation`, `toStation`, `transferDate`) VALUES
(103, 79, 2, 3, '2024-08-19'),
(104, 81, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`churchId`);

--
-- Indexes for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD PRIMARY KEY (`contactId`),
  ADD KEY `churchId` (`churchId`);

--
-- Indexes for table `eg_council`
--
ALTER TABLE `eg_council`
  ADD PRIMARY KEY (`councilId`),
  ADD UNIQUE KEY `councilSlug` (`councilSlug`);

--
-- Indexes for table `eg_council_member`
--
ALTER TABLE `eg_council_member`
  ADD PRIMARY KEY (`memberId`),
  ADD KEY `councilId` (`councilId`);

--
-- Indexes for table `eg_country`
--
ALTER TABLE `eg_country`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `eg_family_details`
--
ALTER TABLE `eg_family_details`
  ADD PRIMARY KEY (`familyId`),
  ADD KEY `staffId` (`staffId`);

--
-- Indexes for table `eg_institutes`
--
ALTER TABLE `eg_institutes`
  ADD PRIMARY KEY (`instituteId`);

--
-- Indexes for table `eg_location`
--
ALTER TABLE `eg_location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `eg_staff`
--
ALTER TABLE `eg_staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `eg_station`
--
ALTER TABLE `eg_station`
  ADD PRIMARY KEY (`stationId`);

--
-- Indexes for table `eg_transfer_details`
--
ALTER TABLE `eg_transfer_details`
  ADD PRIMARY KEY (`transferId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_location`
--
ALTER TABLE `office_location`
  ADD PRIMARY KEY (`officeId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `staff_family`
--
ALTER TABLE `staff_family`
  ADD PRIMARY KEY (`familyId`);

--
-- Indexes for table `staff_transfers`
--
ALTER TABLE `staff_transfers`
  ADD PRIMARY KEY (`transferId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eg_council`
--
ALTER TABLE `eg_council`
  MODIFY `councilId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eg_council_member`
--
ALTER TABLE `eg_council_member`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `eg_country`
--
ALTER TABLE `eg_country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_institutes`
--
ALTER TABLE `eg_institutes`
  MODIFY `instituteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eg_station`
--
ALTER TABLE `eg_station`
  MODIFY `stationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eg_transfer_details`
--
ALTER TABLE `eg_transfer_details`
  MODIFY `transferId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office_location`
--
ALTER TABLE `office_location`
  MODIFY `officeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `staff_family`
--
ALTER TABLE `staff_family`
  MODIFY `familyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `staff_transfers`
--
ALTER TABLE `staff_transfers`
  MODIFY `transferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
