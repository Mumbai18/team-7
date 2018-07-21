CREATE TABLE `application` (
  `aid` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `typeedu` varchar(50) NOT NULL,
  `result` float NOT NULL,
  `income` float NOT NULL,
  `year` int(11) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`aid`, `id`, `Status`, `institute`, `typeedu`, `result`, `income`, `year`, `occupation`, `did`) VALUES
(1, 1, '1', 'Ruia', '12th', 89, 10000, 2014, 'Farmer', 1),
(3, 1, '1', 'Ruia', '11th', 80, 12000, 2013, 'Farmer', 2);

-- --------------------------------------------------------
