-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 04:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hopekelldev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_songs`
--

CREATE TABLE `tbl_songs` (
  `songID` int(225) NOT NULL,
  `songName` text NOT NULL,
  `songCat` varchar(255) NOT NULL,
  `songArtist` varchar(255) NOT NULL,
  `songUploader` varchar(255) NOT NULL,
  `songCover` text NOT NULL,
  `songFile` text NOT NULL,
  `songSize` int(225) NOT NULL,
  `songDate` datetime NOT NULL,
  `songViews` int(225) NOT NULL,
  `songLike` int(225) NOT NULL,
  `songDislikes` int(225) NOT NULL,
  `songDownloads` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_songs`
--

INSERT INTO `tbl_songs` (`songID`, `songName`, `songCat`, `songArtist`, `songUploader`, `songCover`, `songFile`, `songSize`, `songDate`, `songViews`, `songLike`, `songDislikes`, `songDownloads`) VALUES
(1, 'Teating music', 'Blues Test', 'Hopekell', 'Unknown Uploader', 'realsoundz_com_29718_ada_-_testify.mp3_hopekell.jpg', 'realsoundz_com_29718_ada_-_testify.mp3', 7354, '2021-01-17 23:02:30', 16, 4, 1, 2),
(2, 'Amaragi', 'Blues Test', 'Uzee', 'Hopekell', 'realsoundz_com_26482_amaragi_by_u_zee.mp3_photostudio_1595908902995(0).jpg', 'realsoundz_com_26482_amaragi_by_u_zee.mp3', 3316, '2021-01-17 23:56:58', 2, 4, 1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_songs`
--
ALTER TABLE `tbl_songs`
  ADD PRIMARY KEY (`songID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_songs`
--
ALTER TABLE `tbl_songs`
  MODIFY `songID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
