-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 28, 2023 at 10:21 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artbyyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text,
  `Story` text,
  `AboutImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'A community of artists coming together to share personal work and consignment pieces for the general public. Do you have what it takes?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.', 'files\\Animals\\animal_taylor6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'Naomi Osaka', 'files\\artists\\NaomiOsaka.jpg', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere ex at mattis.'),
(2, 'Taylor Swift', 'files\\artists\\TaylorSwift.jpg', 'Animal Lover', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit etiam gravida nibh quis mauris mollis.'),
(3, 'Shakira', 'files\\artists\\Shakira.jpg', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit proin non lectus id ante fermentum.'),
(4, 'Leonardo DiCaprio', 'files\\artists\\LeonardoDiCaprio.jpg', 'Painter/Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean quis tincidunt est. Ut.'),
(5, 'Roger Federer', 'files\\artists\\RogerFederer.jpg', 'Pottery', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie pellentesque vestibulum. Sed porta.'),
(6, 'Virat Kohli', 'files\\artists\\ViratKohli.jpg', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis felis quis.'),
(7, 'Scarlett Johansson', 'files\\artists\\ScarlettJohansson.jpg', 'Textiles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut mauris at diam.'),
(8, 'Elon Musk', 'files\\artists\\ElonMusk.jpg', 'Painter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet vehicula lectus, id sagittis.');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ArtImage` varchar(100) NOT NULL,
  `ThemeID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'A Mouse', 'files\\Animals\\animal_taylor.jpg', 1, 2),
(2, 'White Wolf', 'files\\Animals\\animal_taylor2.jpg', 1, 2),
(3, 'Birds on a Branch', 'files\\Animals\\animal_taylor3.jpg', 1, 2),
(4, 'Dog', 'files\\Animals\\animal_taylor4.jpg', 1, 2),
(5, 'Strong Eagle', 'files\\Animals\\animal_taylor5.jpg', 1, 2),
(6, 'Fishes', 'files\\Animals\\animal_taylor6.jpg', 1, 2),
(7, 'Townhouses', 'files\\Architecture\\picture_naomi.jpg', 2, 1),
(8, 'Skyline', 'files\\Architecture\\picture_naomi2.jpg', 2, 1),
(9, 'Sunset Skyline', 'files\\Architecture\\picture_naomi3.jpg', 2, 1),
(10, 'Red Flowers', 'files\\Flowers\\picture_naomi4.jpg', 3, 1),
(11, 'Purple Flowers', 'files\\Flowers\\picture_naomi5.jpg', 3, 1),
(12, 'Boat in Sea', 'files\\Water\\picture_shakira.jpg', 4, 3),
(13, 'Beach Stones', 'files\\Water\\picture_shakira2.jpg', 4, 3),
(14, 'Green Water', 'files\\Water\\picture_shakira3.jpg', 4, 3),
(15, 'Aeroplane in Skyline', 'files\\Architecture\\picture_shakira4.jpg', 2, 3),
(16, 'White Bricks', 'files\\Architecture\\picture_shakira5.jpg', 2, 3),
(17, 'Traditional Pots', 'files\\Crafts\\pottery_roger.jpg', 6, 5),
(18, 'Minimalistic Pottery', 'files\\Crafts\\pottery_roger2.jpg	', 6, 5),
(19, 'White Pots', 'files\\Crafts\\pottery_roger3.jpg', 6, 5),
(20, 'Mud Pots', 'files\\Crafts\\pottery_roger4.jpg', 6, 5),
(21, 'Pots', 'files\\Crafts\\pottery_roger5.jpg', 6, 5),
(22, 'Traditional Textile', 'files\\Crafts\\weave_scarlett.jpg', 6, 7),
(23, 'Lines Print', 'files\\Crafts\\weave_scarlett2.jpg', 6, 7),
(24, 'Wool', 'files\\Crafts\\weave_scarlett3.jpg', 6, 7),
(25, 'Color Fusion', 'files\\Crafts\\weave_scarlett4.jpg', 6, 7),
(26, 'Peace', 'files\\Paintings\\painting_leonardo.jpg', 5, 4),
(27, 'Modern Art', 'files\\Paintings\\painting_leonardo2.jpg', 5, 4),
(28, 'Blues', 'files\\Paintings\\painting_leonardo3.jpg', 5, 4),
(29, 'Flowers', 'files\\Flowers\\picture_leonardo4.jpg', 3, 4),
(30, 'Sunflower', 'files\\Flowers\\picture_leonardo5.jpg', 3, 4),
(31, 'Royal ', 'files\\Paintings\\painting_elon.jpg', 5, 8),
(32, 'Farm', 'files\\Paintings\\painting_elon2.jpg', 5, 8),
(33, 'Black & White', 'files\\Paintings\\painting_elon3.jpg', 5, 8),
(34, 'Yello Flower', 'files\\Paintings\\painting_elon4.jpg', 5, 8),
(35, 'Iceberg', 'files\\Water\\picture_virat.jpg', 4, 6),
(36, 'Penguine', 'files\\Water\\picture_virat2.jpg', 4, 6),
(37, 'Bunch of Flowers', 'files\\Flowers\\picture_virat3.jpg', 3, 6),
(38, 'Pink Flowers', 'files\\Flowers\\picture_virat4.jpg', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `UserID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`UserID`, `ArtistID`, `Username`, `Password`) VALUES
(1, 1, 'nosaka', 'abc123'),
(2, 2, 'tswift', 'bca123'),
(3, 3, 'shakira', 'abc123'),
(4, 4, 'ldicaprio', 'bca123'),
(5, 5, 'rfederer', 'abc123'),
(6, 6, 'vkohli', 'abc123'),
(7, 7, 'sjohnanson', 'bca123'),
(8, 8, 'emusk', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Animals', 'files\\Animals\\animal_taylor.jpg'),
(2, 'Architecture', 'files\\Architecture\\picture_naomi3.jpg'),
(3, 'Flowers', 'files\\Flowers\\picture_naomi4.jpg'),
(4, 'Water', 'files\\Water\\picture_shakira3.jpg'),
(5, 'Paintings', 'files\\Paintings\\painting_leonardo.jpg'),
(6, 'Crafts', 'files\\Crafts\\pottery_roger2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ArtID`),
  ADD KEY `ArtistID` (`ArtistID`),
  ADD KEY `ThemeID` (`ThemeID`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `ArtistID` (`ArtistID`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`),
  ADD CONSTRAINT `artwork_ibfk_2` FOREIGN KEY (`ThemeID`) REFERENCES `themes` (`ThemeID`);

--
-- Constraints for table `signin`
--
ALTER TABLE `signin`
  ADD CONSTRAINT `signin_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
