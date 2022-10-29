-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2022 at 04:57 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'moustafa', '$2y$10$fLK8s7ZDnM.1lE7XMP.J6OuPbQ.DPUVKBo7rENnQY7gYq0xAzsKJy', 'Moustafa', 'Hamra', '20210505_151117.jpg', '2018-04-02'),
(2, 'roberto', '111', 'roberto', 'hajj', '', '2022-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `can_ethnicity` varchar(100) NOT NULL,
  `can_age` int(100) NOT NULL,
  `can_small_district` varchar(100) NOT NULL,
  `can_main_district` varchar(100) NOT NULL,
  `cand_list` int(64) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `can_ethnicity`, `can_age`, `can_small_district`, `can_main_district`, `cand_list`, `photo`, `platform`) VALUES
(18, 8, 'Mishel', 'Aoun', 'marounite', 25, 'akr', 'mount_first', 1, 'LICENSE', 'the public senates'),
(19, 8, 'samir', 'geagea', 'souni', 35, 'bnt_jbl', 'nrth_second', 2, 'LICENSE', 'the public senates'),
(20, 8, 'charbel', 'fakhry', 'maronite', 33, 'denye', 'sth_first', 2, 'LICENSE', 'the public senates'),
(22, 8, 'Jason', 'frem', 'maronite', 20, 'kra', 'mount_second', 1, 'LICENSE', 'the public senates');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `list_id` int(20) NOT NULL,
  `list_name` varchar(64) NOT NULL,
  `list_candidate` int(64) NOT NULL,
  `list_main_district` varchar(64) NOT NULL,
  `list_small_district` varchar(64) NOT NULL,
  `list_number_of_votes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`list_id`, `list_name`, `list_candidate`, `list_main_district`, `list_small_district`, `list_number_of_votes`) VALUES
(1, 'kenna w rah nebaa', 2, 'nrth_third', 'btrn', 22),
(2, 'kellon', 1, 'nrth_third', 'kra', 2),
(3, 'ma3kon', 3, 'mount_first', 'jbl', 0),
(4, 'kenna w mneb2a', 4, 'mount_first', 'ksrwn', 0),
(5, 'hizbouna', 5, 'sth_third', 'bnt_jbl', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_name`
-- (See below for the actual view)
--
CREATE TABLE `list_name` (
`list_name` varchar(64)
);

-- --------------------------------------------------------

--
-- Table structure for table `main_district`
--

CREATE TABLE `main_district` (
  `main_district_id` varchar(64) NOT NULL,
  `main_district_name` varchar(64) NOT NULL,
  `total_seat_number` int(11) NOT NULL,
  `total_muslim_seats` int(11) NOT NULL,
  `total_christian_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_district`
--

INSERT INTO `main_district` (`main_district_id`, `main_district_name`, `total_seat_number`, `total_muslim_seats`, `total_christian_number`) VALUES
('bek_first', 'bekkah the first', 7, 2, 5),
('bek_second', 'bekkah the second', 6, 4, 2),
('bek_third', 'bekkah the third', 10, 8, 2),
('br_first', 'Beirut the first', 8, 0, 8),
('br_second', 'Beirut the second', 11, 9, 2),
('mount_first', 'mount lebanon the first', 8, 1, 7),
('mount_fourth', 'mount lebanon the fourth', 13, 6, 7),
('mount_second', 'mount lebanon the second', 8, 0, 8),
('mount_third', 'mount lebanon the third', 6, 3, 3),
('nrth_first', 'north lebanon the first', 7, 4, 3),
('nrth_second', 'north lebanon the second', 11, 9, 2),
('nrth_third', 'north lebanon the third', 10, 0, 10),
('sth_first', 'south lebanon the first', 5, 2, 3),
('sth_second', 'south lebanon the second', 7, 6, 1),
('sth_third', 'south lebanon the third', 11, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(8, 'senator', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `simulation_candidate`
--

CREATE TABLE `simulation_candidate` (
  `sim_can_id` int(64) NOT NULL,
  `sim_can_name` varchar(64) NOT NULL,
  `sim_can_ethnicity` varchar(30) NOT NULL,
  `sim_can_age` int(2) NOT NULL,
  `sim_can_small_district` varchar(64) NOT NULL,
  `sim_can_main_district` varchar(64) NOT NULL,
  `sim_cand_list` int(64) DEFAULT NULL,
  `number_of_votes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simulation_candidate`
--

INSERT INTO `simulation_candidate` (`sim_can_id`, `sim_can_name`, `sim_can_ethnicity`, `sim_can_age`, `sim_can_small_district`, `sim_can_main_district`, `sim_cand_list`, `number_of_votes`) VALUES
(1, 'georges', 'Maronite', 39, 'kra', 'nrth_third', NULL, 0),
(2, 'Jebran Bassail', 'Maronite', 45, 'btrn', 'nrth_third', NULL, 2),
(3, 'Simon Abi Ramia', 'Maronite', 49, 'jbl', 'mount_first', NULL, 0),
(4, 'Roberto Hajj Botros', 'Roman Orthodox', 32, 'ksrwn', 'mount_first', NULL, 0),
(5, 'ali', 'Shiia', 60, 'bnt_jbl', 'sth_third', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sim_voters`
--

CREATE TABLE `sim_voters` (
  `sim_voters_id` int(20) NOT NULL,
  `sim_voters_name` varchar(64) NOT NULL,
  `sim_voters_lastname` varchar(64) NOT NULL,
  `sim_voters_age` int(2) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `sim_voters_ethnicity` varchar(20) NOT NULL,
  `sim_voters_small_district` varchar(30) NOT NULL,
  `sim_voters_main_district` varchar(64) NOT NULL,
  `main_district_id` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `small_district_id` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sim_can_id` int(64) NOT NULL,
  `list_id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim_voters`
--

INSERT INTO `sim_voters` (`sim_voters_id`, `sim_voters_name`, `sim_voters_lastname`, `sim_voters_age`, `gender`, `sim_voters_ethnicity`, `sim_voters_small_district`, `sim_voters_main_district`, `main_district_id`, `small_district_id`, `sim_can_id`, `list_id`) VALUES
(1, 'moustafa', 'hamra', 24, 'Male', '-1', 'kra', 'nrth_third', NULL, NULL, 4, 4),
(2, 'sam', 'zahran', 45, 'Female', 'Sunni', 'btrn', 'nrth_third', NULL, NULL, 1, 4),
(3, 'andrew', 'aoun', 43, 'Female', 'Maronite', 'mrj_hasb', 'sth_third', NULL, NULL, 1, 4),
(4, '222', '22', 222, 'Female', 'Shiia', '', 'nrth_first', NULL, NULL, 1, 1),
(5, '222', '22', 222, 'Female', 'Shiia', '', 'nrth_first', NULL, NULL, 1, 1),
(6, '222', '22', 222, 'Female', 'Shiia', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(7, '102', '103', 45, 'Female', 'Allawi', 'bbda', 'mount_third', NULL, NULL, 1, 1),
(8, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(9, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(10, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(11, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(12, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(13, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(14, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(15, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(16, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(17, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(18, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(19, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(20, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(21, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(22, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(23, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 2),
(24, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 2),
(25, 'to the moon', 'fsdfd', 22, 'Female', 'Shiia', 'aly', 'mount_fourth', NULL, NULL, 1, 1),
(26, 'samir', 'saleme', 33, 'Male', 'Sunni', 'rash_westbekkah', 'bek_second', NULL, NULL, 3, 1),
(27, 'dasd', 'dasdas', 12, 'Female', 'Durze', 'bbda', 'mount_third', NULL, NULL, 1, 1),
(28, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(29, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(30, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(31, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(32, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(33, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(34, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(35, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(36, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(37, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(38, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(39, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(40, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(41, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(42, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 1, 1),
(43, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 2, 1),
(44, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 2, 1),
(45, 'to the moon', '22', 12, 'Male', 'Durze', 'akr', 'nrth_first', NULL, NULL, 2, 1),
(46, 'mahmoud', 'fergly', 36, 'Male', 'Sunni', 'btrn', 'nrth_third', NULL, NULL, 1, 1),
(47, 'mahmoud', 'fergly', 36, 'Male', 'Sunni', 'btrn', 'nrth_third', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `small_district`
--

CREATE TABLE `small_district` (
  `small_district_id` varchar(64) NOT NULL,
  `small_district_name` varchar(100) NOT NULL,
  `main_district_id` varchar(64) NOT NULL,
  `small_district_total_seats` int(11) NOT NULL,
  `small_district_muslim_seats` int(11) NOT NULL,
  `small_district_christan_seats` int(11) NOT NULL,
  `sunni_seat` int(11) NOT NULL,
  `shiia_seat` int(11) NOT NULL,
  `durze_seat` int(11) NOT NULL,
  `allawi_seat` int(11) NOT NULL,
  `maronite_seat` int(11) NOT NULL,
  `roman_orthodox_seat` int(11) NOT NULL,
  `roman_catholic_seat` int(11) NOT NULL,
  `angellic_seat` int(11) NOT NULL,
  `arminian_catholic_seat` int(11) NOT NULL,
  `arminian_orthodox_seat` int(11) NOT NULL,
  `minorities_seat` int(11) NOT NULL,
  `number of votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `small_district`
--

INSERT INTO `small_district` (`small_district_id`, `small_district_name`, `main_district_id`, `small_district_total_seats`, `small_district_muslim_seats`, `small_district_christan_seats`, `sunni_seat`, `shiia_seat`, `durze_seat`, `allawi_seat`, `maronite_seat`, `roman_orthodox_seat`, `roman_catholic_seat`, `angellic_seat`, `arminian_catholic_seat`, `arminian_orthodox_seat`, `minorities_seat`, `number of votes`) VALUES
('achrf_rml_mdr_sfy', 'ashrafiye-remmel-moudawar-ssayfe', 'br_first', 8, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 3, 1, 0),
('akr', 'akkar', 'nrth_first', 7, 4, 3, 3, 0, 0, 1, 1, 2, 0, 0, 0, 0, 0, 0),
('aly', 'alay', 'mount_fourth', 5, 2, 3, 0, 0, 2, 0, 2, 1, 0, 0, 0, 0, 0, 0),
('bbda', 'beabda', 'mount_third', 6, 3, 3, 0, 2, 1, 0, 3, 0, 0, 0, 0, 0, 0, 0),
('belbk_herml', 'bealbak - hermel', 'bek_third', 10, 8, 2, 2, 6, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0),
('bnt_jbl', 'bent jbeil', 'sth_third', 3, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('bshre', 'besharre', 'nrth_third', 2, 0, 2, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0),
('btrn', 'batroun', 'nrth_third', 2, 0, 2, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0),
('denye', 'denniye', 'nrth_second', 2, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('jbl', 'joubail', 'mount_first', 3, 1, 2, 0, 1, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0),
('jzn', 'jezzin', 'sth_first', 3, 0, 0, 0, 0, 0, 0, 2, 0, 1, 0, 0, 0, 0, 0),
('kra', 'koura', 'nrth_third', 3, 0, 3, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0),
('ksrwn', 'kesserwan', 'mount_first', 5, 0, 5, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0),
('mny', 'menniya', 'nrth_second', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('mrj_hasb', 'marjayoun - hasbayyah', 'sth_third', 5, 4, 1, 1, 2, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0),
('mtn', 'maten', 'mount_second', 8, 0, 8, 0, 0, 0, 0, 4, 2, 1, 0, 0, 1, 0, 0),
('nbth', 'nabattiyeh', 'sth_third', 3, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('rash_westbekkah', 'rashayya - west bekkah', 'bek_second', 6, 4, 2, 2, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0),
('sayda_vill', 'sayda villages(zaharani)', 'sth_second', 3, 2, 1, 0, 2, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
('sd', 'sayda', 'sth_first', 2, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('shf', 'shouf', 'mount_fourth', 8, 4, 4, 2, 0, 2, 0, 3, 0, 1, 0, 0, 0, 0, 0),
('sr', 'sour', 'sth_second', 4, 4, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('trpl', 'tripoli', 'nrth_second', 8, 6, 2, 5, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
('zgrt', 'zegharta', 'nrth_third', 3, 0, 3, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0),
('zhlh', 'zahle', 'bek_first', 7, 2, 5, 1, 1, 0, 0, 1, 1, 2, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `password`, `firstname`, `lastname`, `photo`) VALUES
(3, 'HVBA7aEl32G1kWJ', '$2y$10$0MYuDbiglTdT.bl1cYlyAebaXBrPZaXka/5KRLAhG7oMu.2PfyZse', 'moustafa', 'hamra', ''),
(4, '3yYi4bGTO8PIcjt', '$2y$10$Pz9HKF9fEh7vYYewuYFlXe321f2Bkk2LZ8nD5EyOsz.HW0MNTRRL.', 'roberto', 'hajj botros', ''),
(5, 'bH21gWpEzjZnBDM', '$2y$10$iUS0hE1CrWuhCP2P19mWrOOLxi6p.ePrjYp9xRX8iXoiwdW0W4NeC', 'Tony', 'Farhat', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `small_district_id` varchar(20) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `list_id`, `small_district_id`, `position_id`) VALUES
(81, 3, 18, 1, 'jbl', 8),
(82, 4, 19, 2, 'ksrwn', 8);

-- --------------------------------------------------------

--
-- Structure for view `list_name`
--
DROP TABLE IF EXISTS `list_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_name`  AS  select `lists`.`list_name` AS `list_name` from (`lists` join `simulation_candidate`) where (`lists`.`list_id` = `simulation_candidate`.`sim_can_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `can_small_district` (`can_small_district`),
  ADD KEY `can_main_district` (`can_main_district`),
  ADD KEY `cand_list` (`cand_list`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `list_main_district` (`list_main_district`),
  ADD KEY `list_small_district` (`list_small_district`),
  ADD KEY `list_candidate` (`list_candidate`);

--
-- Indexes for table `main_district`
--
ALTER TABLE `main_district`
  ADD PRIMARY KEY (`main_district_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simulation_candidate`
--
ALTER TABLE `simulation_candidate`
  ADD PRIMARY KEY (`sim_can_id`),
  ADD KEY `sim_can_small_district` (`sim_can_small_district`),
  ADD KEY `sim_can_main_district` (`sim_can_main_district`),
  ADD KEY `sim_cand_list` (`sim_cand_list`);

--
-- Indexes for table `sim_voters`
--
ALTER TABLE `sim_voters`
  ADD PRIMARY KEY (`sim_voters_id`),
  ADD KEY `sim_voters_small_district` (`sim_voters_small_district`),
  ADD KEY `sim_voters_main_district` (`sim_voters_main_district`),
  ADD KEY `main_district_id` (`main_district_id`),
  ADD KEY `small_district_id` (`small_district_id`),
  ADD KEY `list_id` (`list_id`),
  ADD KEY `sim_can_id` (`sim_can_id`);

--
-- Indexes for table `small_district`
--
ALTER TABLE `small_district`
  ADD PRIMARY KEY (`small_district_id`),
  ADD KEY `main_district_id` (`main_district_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voters_id` (`voters_id`),
  ADD KEY `candidate_id` (`candidate_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `list_id` (`list_id`),
  ADD KEY `small_district_id` (`small_district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `simulation_candidate`
--
ALTER TABLE `simulation_candidate`
  MODIFY `sim_can_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sim_voters`
--
ALTER TABLE `sim_voters`
  MODIFY `sim_voters_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`can_small_district`) REFERENCES `small_district` (`small_district_id`),
  ADD CONSTRAINT `candidates_ibfk_3` FOREIGN KEY (`can_main_district`) REFERENCES `main_district` (`main_district_id`),
  ADD CONSTRAINT `candidates_ibfk_4` FOREIGN KEY (`cand_list`) REFERENCES `lists` (`list_id`);

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`list_main_district`) REFERENCES `main_district` (`main_district_id`),
  ADD CONSTRAINT `lists_ibfk_2` FOREIGN KEY (`list_small_district`) REFERENCES `small_district` (`small_district_id`),
  ADD CONSTRAINT `lists_ibfk_3` FOREIGN KEY (`list_candidate`) REFERENCES `simulation_candidate` (`sim_can_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `simulation_candidate`
--
ALTER TABLE `simulation_candidate`
  ADD CONSTRAINT `simulation_candidate_ibfk_1` FOREIGN KEY (`sim_can_small_district`) REFERENCES `small_district` (`small_district_id`),
  ADD CONSTRAINT `simulation_candidate_ibfk_2` FOREIGN KEY (`sim_can_main_district`) REFERENCES `main_district` (`main_district_id`),
  ADD CONSTRAINT `simulation_candidate_ibfk_3` FOREIGN KEY (`sim_cand_list`) REFERENCES `lists` (`list_id`);

--
-- Constraints for table `sim_voters`
--
ALTER TABLE `sim_voters`
  ADD CONSTRAINT `sim_voters_ibfk_3` FOREIGN KEY (`main_district_id`) REFERENCES `main_district` (`main_district_id`),
  ADD CONSTRAINT `sim_voters_ibfk_4` FOREIGN KEY (`small_district_id`) REFERENCES `small_district` (`small_district_id`);

--
-- Constraints for table `small_district`
--
ALTER TABLE `small_district`
  ADD CONSTRAINT `small_district_ibfk_1` FOREIGN KEY (`main_district_id`) REFERENCES `main_district` (`main_district_id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`voters_id`) REFERENCES `voters` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `votes_ibfk_4` FOREIGN KEY (`list_id`) REFERENCES `lists` (`list_id`),
  ADD CONSTRAINT `votes_ibfk_5` FOREIGN KEY (`small_district_id`) REFERENCES `small_district` (`small_district_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
