-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 02:34 PM
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
  `contactPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_persons`
--

INSERT INTO `contact_persons` (`contactId`, `churchId`, `contactName`, `contactPhone`) VALUES
(1, 1, 'person 1', '456798465'),
(2, 1, 'person 2', '5649461');

-- --------------------------------------------------------

--
-- Table structure for table `eg_council`
--

CREATE TABLE `eg_council` (
  `councilId` int(11) NOT NULL,
  `councilName` varchar(255) NOT NULL,
  `councilSlug` varchar(255) NOT NULL,
  `councilLocation` varchar(255) NOT NULL,
  `councilInstitute` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_council`
--

INSERT INTO `eg_council` (`councilId`, `councilName`, `councilSlug`, `councilLocation`, `councilInstitute`, `startDate`, `endDate`, `createdAt`) VALUES
(1, 'STUDENT 1', 'student1', 'Pathanamthitta', 'Mar Ivanios College', '0000-00-00', '0000-00-00', '2024-08-24 09:11:53');

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
  `memberEmail` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_council_member`
--

INSERT INTO `eg_council_member` (`memberId`, `councilId`, `memberName`, `designation`, `cgpfNumber`, `memberEmail`, `createdAt`) VALUES
(1, 1, 'JSJFLKSJFLKSJF', 'Joint Secretary', '4', '', '2024-08-24 09:11:53'),
(2, 1, '', 'Select Designation', '', '', '2024-08-24 09:11:53');

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
-- Table structure for table `eg_location`
--

CREATE TABLE `eg_location` (
  `locationId` int(11) NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `locationStatus` tinyint(1) NOT NULL,
  `locationSlug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_location`
--

INSERT INTO `eg_location` (`locationId`, `locationName`, `locationStatus`, `locationSlug`) VALUES
(1, 'Sreekariyam', 1, 'sreekariyam');

-- --------------------------------------------------------

--
-- Table structure for table `eg_region`
--

CREATE TABLE `eg_region` (
  `regionId` int(11) NOT NULL,
  `regionName` varchar(255) NOT NULL,
  `regionSlug` varchar(255) NOT NULL,
  `regionActive` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eg_region`
--

INSERT INTO `eg_region` (`regionId`, `regionName`, `regionSlug`, `regionActive`) VALUES
(2, 'North Kerala', 'northkerala', 1),
(4, 'South Kerala', 'southkerala', 1);

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
(4, '2024-09-28', '323', '3232', '32323', 3232, NULL, '2024-09-03 11:58:43', 0);

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
  `fifth_sunday_church` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `CGPF_Number`, `House_Visit_Number`, `Hostel_Visit_Number`, `Evangelisms_Number`, `Accepted_Christ`, `Baptism_Decision`, `Baptism_Number`, `Holyspirit_Received`, `Ministry_Commitments`, `Existing_Student_Councils`, `New_Student_Councils`, `Existing_CGPF`, `New_CGPF`, `first_sunday_church`, `second_sunday_church`, `third_sunday_church`, `fourth_sunday_church`, `fifth_sunday_church`) VALUES
(3, '23', '323', '32', '43', '32', '23', '23', '34', '43', '43', '434', '34', '43', 1, 1, 1, 1, 1),
(4, '343434', '4343', '43434', '43434', '43434', '34434', '43434', '4343', '4343', '4343423', '42232', '2323', '32323', 1, 1, 1, 1, 1);

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
(79, 'admin', 'admin', 2, 4, 'Regional Staff', 'Head Office', '2024-09-05', '2024-08-19', 'admin', '$2y$10$3czqK0oB9UsT4GFFCAurmepokO9MArt0k0vcaBTdjubMsZB/y1DyS', '1234567', '654564654165', '2024-08-19', '2024-08-11'),
(81, 'staff', 'staff', 2, 2, 'Regional Staff', 'Head Office', '2024-09-13', NULL, 'staff', '$2y$10$U5pL/pNsMntxA.yFOEjvdOQBc1L2ZyUwDfpwRCdCj3kn1ebtMn8nq', '456321', '454651321', '2024-09-18', NULL);

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
-- Indexes for table `eg_location`
--
ALTER TABLE `eg_location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `eg_region`
--
ALTER TABLE `eg_region`
  ADD PRIMARY KEY (`regionId`);

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
  ADD PRIMARY KEY (`transferId`),
  ADD KEY `staffId` (`staffId`);

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
  ADD PRIMARY KEY (`familyId`),
  ADD KEY `staffId` (`staffId`);

--
-- Indexes for table `staff_transfers`
--
ALTER TABLE `staff_transfers`
  ADD PRIMARY KEY (`transferId`),
  ADD KEY `staffId` (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `churchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_persons`
--
ALTER TABLE `contact_persons`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_council`
--
ALTER TABLE `eg_council`
  MODIFY `councilId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_council_member`
--
ALTER TABLE `eg_council_member`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_country`
--
ALTER TABLE `eg_country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_family_details`
--
ALTER TABLE `eg_family_details`
  MODIFY `familyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eg_location`
--
ALTER TABLE `eg_location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_region`
--
ALTER TABLE `eg_region`
  MODIFY `regionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eg_staff`
--
ALTER TABLE `eg_staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eg_station`
--
ALTER TABLE `eg_station`
  MODIFY `stationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eg_transfer_details`
--
ALTER TABLE `eg_transfer_details`
  MODIFY `transferId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD CONSTRAINT `contact_persons_ibfk_1` FOREIGN KEY (`churchId`) REFERENCES `churches` (`churchId`) ON DELETE CASCADE;

--
-- Constraints for table `eg_council_member`
--
ALTER TABLE `eg_council_member`
  ADD CONSTRAINT `eg_council_member_ibfk_1` FOREIGN KEY (`councilId`) REFERENCES `eg_council` (`councilId`) ON DELETE CASCADE;

--
-- Constraints for table `eg_family_details`
--
ALTER TABLE `eg_family_details`
  ADD CONSTRAINT `eg_family_details_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `eg_staff` (`staffId`);

--
-- Constraints for table `eg_transfer_details`
--
ALTER TABLE `eg_transfer_details`
  ADD CONSTRAINT `eg_transfer_details_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `eg_staff` (`staffId`);

--
-- Constraints for table `staff_family`
--
ALTER TABLE `staff_family`
  ADD CONSTRAINT `staff_family_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`) ON DELETE CASCADE;

--
-- Constraints for table `staff_transfers`
--
ALTER TABLE `staff_transfers`
  ADD CONSTRAINT `staff_transfers_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
