-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 05:44 AM
-- Server version: 10.1.36-MariaDB
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
-- Database: `logintable`
--

-- --------------------------------------------------------

--
-- Table structure for table `listscreens`
--

CREATE TABLE `listscreens` (
  `scno` int(1) NOT NULL,
  `mid` int(11) DEFAULT NULL,
  `timings` time NOT NULL,
  `dat` date NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listscreens`
--

INSERT INTO `listscreens` (`scno`, `mid`, `timings`, `dat`, `price`) VALUES
(1, 1, '02:00:00', '2018-03-03', 200),
(1, 2, '05:00:00', '2018-04-11', 300),
(1, 3, '17:00:00', '2018-04-11', 500),
(2, 4, '07:00:00', '2018-11-04', 270),
(2, 8, '10:00:00', '2018-11-04', 270),
(2, 11, '15:00:00', '2018-11-04', 270),
(3, 1, '00:15:00', '2018-11-04', 270),
(3, 6, '07:00:00', '2018-11-04', 270),
(3, 9, '10:00:00', '2018-11-04', 270),
(3, 3, '18:00:00', '2018-11-04', 270),
(4, 7, '07:00:00', '2018-11-04', 270),
(4, 10, '10:00:00', '2018-11-04', 270),
(4, 11, '15:00:00', '2018-11-04', 270);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `mname` text,
  `rdate` date DEFAULT NULL,
  `mdescription` text,
  `image` blob,
  `duration` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `mname`, `rdate`, `mdescription`, `image`, `duration`) VALUES
(1, 'Avengers: Infinity War', '2018-04-27', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', NULL, '3'),
(2, 'Ready Player One', '2018-03-29', 'When the creator of a virtual reality world called the OASIS dies, he releases a video in which he challenges all OASIS users to find his Easter Egg, which will give the finder his fortune.', NULL, '3'),
(3, 'Johnny English Strikes Again', '2018-10-26', 'After a cyber-attack reveals the identity of all of the active undercover agents in Britain, Johnny English is forced to come out of retirement to find the mastermind hacker. ', NULL, '3'),
(4, 'Jurassic World: Fallen Kingdom ', '2018-06-22', 'When the islands dormant volcano begins roaring to life, Owen and Claire mount a campaign to rescue the remaining dinosaurs from this extinction-level event.', NULL, '3'),
(5, 'Venom', '2018-10-05', 'When Eddie Brock acquires the powers of a symbiote, he will have to release his alter-ego Venom to save his life.', NULL, '3'),
(6, 'Deadpool 2', '2018-05-18', 'Foul-mouthed mutant mercenary Wade Wilson (AKA. Deadpool), brings together a team of fellow mutant rogues to protect a young boy with supernatural abilities from the brutal, time-traveling cyborg, Cable.', NULL, '3'),
(7, 'Ant-Man and the Wasp', '2018-07-06', 'As Scott Lang balances being both a Super Hero and a father, Hope van Dyne and Dr. Hank Pym present an urgent new mission that finds the Ant-Man fighting alongside The Wasp to uncover secrets from their past.', NULL, '3'),
(8, 'A Star Is Born', '2018-10-05', 'A musician helps a young singer find fame, even as age and alcoholism send his own career into a downward spiral.', NULL, '3'),
(9, 'Mission: Impossible - Fallout', '2018-07-27', ' Ethan Hunt and his IMF team, along with some familiar allies, race against time after a mission gone wrong.', NULL, '3'),
(10, 'Incredibles 2', '2018-06-15', ' Bob Parr (Mr. Incredible) is left to care for the kids while Helen (Elastigirl) is out saving the world.', NULL, '3'),
(11, 'Black Panther', '2018-02-18', 'TChalla, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country', NULL, '3');



--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `scno` int(1) NOT NULL,
  `mid` int(11) DEFAULT NULL,
  `timings` time DEFAULT NULL,
  `dat` date NOT NULL,
  `seatsbooked` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`scno`, `mid`, `timings`, `dat`, `seatsbooked`, `price`) VALUES
(1, 1, '02:00:00', '2018-11-14', 1, 200),
(1, 1, '02:00:00', '2018-11-14', 2, 200),
(1, 1, '02:00:00', '2018-11-14', 3, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `tid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `seatno` int(11) DEFAULT NULL,
  `timings` time DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `scno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`tid`, `uid`, `uname`, `mid`, `mname`, `seatno`, `timings`, `dat`, `price`, `scno`) VALUES
(22, 6, 'Admin', 1, 'Avengers: Infinity War', 1, '02:00:00', '2018-11-14', 200, 1),
(23, 6, 'Admin', 1, 'Avengers: Infinity War', 2, '02:00:00', '2018-11-14', 200, 1),
(24, 6, 'Admin', 1, 'Avengers: Infinity War', 3, '02:00:00', '2018-11-14', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(6, 'Admin', 'admin@gmail.com', '$2y$10$g5q3URZV9SJukYrPynZQo.faSjLL4vvYW9Hg2IP2zpehZsq.fxLTO'),
(7, 'b', 'b@b.com', '$2y$10$gUhplcg/Valf74nX0s.tE.Oj48d1qQXc396sMD/Ol2oahM1CgdDWK'),
(8, 'mithun', 'mit@gmail.com', '$2y$10$sDRVNFBs3Jgl7n.dAeQUPuKCCnrbGg5w4kdjTLOsMyxhVQ8DQ7kje'),
(9, 'acc', 'acc@gmail.com', '$2y$10$6cJcO7DV8dPq.8CU/3r0Zu0JpFo1fo8S.APARwZKA1LL2nrr2HNRe'),
(10, 'tester', 'tester@gmail.com', '$2y$10$eyHWSkNpsIdD7XovluF93.JXP1GpKsNW2cw/4gmLcKDy/G2JHeVry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listscreens`
--
ALTER TABLE `listscreens`
  ADD PRIMARY KEY (`scno`,`timings`,`dat`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`scno`,`dat`,`seatsbooked`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
