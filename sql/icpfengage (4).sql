-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 02:06 PM
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
(1, 'South Kerala', 'southkerala', 1),
(2, 'North Kerala', 'northkerala', 1),
(3, 'Tamil Nadu', 'tamilnadu', 1);

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
  `officeLocation` int(11) DEFAULT NULL,
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
(1, 'staff testing', 'stafftesting', NULL, 1, 2, 0, 1, NULL, 'admin', '$2y$10$VQ7p36X87hbtq9CXYACW4ej6.HQOghk52TGY.zM53O5fLmz9fwM0q', '45324234', '234234534', NULL, NULL);

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
(1, 'Trivandrum', 'trivandrum', '1', 1),
(2, 'Kollam', 'kollam', '1', 1),
(3, 'Pathanamthitta', 'pathanamthitta', '1', 1);

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
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `staffSlug` varchar(255) DEFAULT NULL,
  `station` int(11) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `staffType` varchar(255) NOT NULL,
  `officeLocation` int(11) DEFAULT NULL,
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
(4, 'Jase Varghese', 'jasevarghese', 1, 1, 'Regional Staff', 1, '2024-08-01', NULL, 'jasevarghese', '$2y$10$BNnQKlvsbWgFFj2RlN1oxOfV.IAlrbzrLgpzz/s3ikMS09kvVLZeS', '7019234286', '8606465354', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_family`
--

CREATE TABLE `staff_family` (
  `familyId` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
  `familyName` varchar(255) DEFAULT NULL,
  `familyRegion` int(11) DEFAULT NULL,
  `familyAge` int(11) DEFAULT NULL,
  `familyOccupation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_family`
--

INSERT INTO `staff_family` (`familyId`, `staffId`, `familyName`, `familyRegion`, `familyAge`, `familyOccupation`) VALUES
(3, 4, 'Anu Jase', 1, 35, 'Housewife'),
(4, 4, 'Abiya Jase', 0, 12, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `staff_transfers`
--

CREATE TABLE `staff_transfers` (
  `transferId` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
  `fromStation` int(11) DEFAULT NULL,
  `toStation` int(11) DEFAULT NULL,
  `transferDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `regionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eg_staff`
--
ALTER TABLE `eg_staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_family`
--
ALTER TABLE `staff_family`
  MODIFY `familyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_transfers`
--
ALTER TABLE `staff_transfers`
  MODIFY `transferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
