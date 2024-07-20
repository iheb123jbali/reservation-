SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(111) NOT NULL,
  `customer_name` varchar(111) NOT NULL,
  `customer_cell_no` varchar(111) NOT NULL,
  `hotel_id` int(111) NOT NULL,
  `hotel_name` varchar(111) NOT NULL,
  `suite_id` int(111) NOT NULL,
  `suite_name` varchar(111) NOT NULL,
  `suite_price` varchar(111) NOT NULL,
  `suite_image` varchar(111) NOT NULL,
  `start_date` varchar(111) NOT NULL,
  `start_date_num` varchar(111) NOT NULL,
  `end_date` varchar(111) NOT NULL,
  `end_date_num` varchar(111) NOT NULL,
  `nights` varchar(111) NOT NULL,
  `total` varchar(111) NOT NULL,
  `status` varchar(111) NOT NULL,
  `created_on` varchar(111) NOT NULL,
  `update_on` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` int(11) NOT NULL,
  `sur_name` varchar(111) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `topic` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_on` varchar(111) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `sur_name`, `first_name`, `topic`, `email`, `subject`, `message`, `created_on`, `is_deleted`) VALUES
(1, 'Sarwar', 'Salman', 'I want to make a complaint', 'bclixtech@gmail.com', 'Test Complaint1', 'Test1\r\n', '1650453416000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(111) NOT NULL,
  `mh` int(111) NOT NULL,
  `Group_id` int(111) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `description` varchar(111) NOT NULL,
  `city` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `is_deleted` int(111) NOT NULL,
  `is_updated` int(111) NOT NULL,
  `updated_on` int(111) NOT NULL,
  `Created_on` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `mh`, `Group_id`, `first_name`, `last_name`, `description`, `city`, `address`, `is_deleted`, `is_updated`, `updated_on`, `Created_on`) VALUES
(1, 1, 1, 'La Cour des Consuls Hotel and Spa', '', '', '', '', 0, 0, 2147483647, 2147483647),
(2, 1, 1, 'Le Palais Gallien Hôtel & Spa', '', '', '', '', 0, 0, 2147483647, 2147483647),
(3, 1, 1, 'Royal Madeleine Hôtel & Spa\r\n', '', '', '', '', 0, 0, 2147483647, 2147483647),
(4, 1, 1, 'Althoff Hotel Villa Belrose', '', '', '', '', 0, 0, 2147483647, 2147483647),
(5, 1, 1, 'La Réserve de Beaulieu', '', '', '', '', 0, 0, 2147483647, 2147483647),
(6, 1, 1, 'Hôtel Barrière Le Majestic', '', '', '', '', 0, 0, 2147483647, 2147483647),
(7, 1, 1, 'M Social Hotel Paris Opera', '', '', '', '', 0, 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `suite`
--

CREATE TABLE `suite` (
  `id` int(11) NOT NULL,
  `title` varchar(111) NOT NULL,
  `title_image` varchar(111) NOT NULL,
  `price` varchar(111) NOT NULL,
  `description` varchar(111) NOT NULL,
  `created_on` varchar(111) NOT NULL,
  `updated_on` varchar(111) NOT NULL,
  `is_deleted` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suite`
--

INSERT INTO `suite` (`id`, `title`, `title_image`, `price`, `description`, `created_on`, `updated_on`, `is_deleted`) VALUES
(1, 'Deluxe Room', 'room1.jpg', '500', 'Hypnos\r\n', '', '', '0'),
(2, 'Deluxe Terrace Room', 'room2.jpg', '700', 'Hypnos\r\n\r\n', '', '', '0'),
(16, 'Deluxe Suite', 'room1.jpg', '900', 'Hypnos\r\n', '', '', '0'),
(17, 'Deluxe Suite with private spa', 'room2.jpg', '1100', 'Hypnos\r\n', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `suite_gallery`
--

CREATE TABLE `suite_gallery` (
  `id` int(11) NOT NULL,
  `suite_id` int(11) NOT NULL,
  `suite_name` varchar(111) NOT NULL,
  `img` varchar(111) NOT NULL,
  `created_on` varchar(111) NOT NULL,
  `is_deleted` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suite_gallery`
--

INSERT INTO `suite_gallery` (`id`, `suite_id`, `suite_name`, `img`, `created_on`, `is_deleted`) VALUES
(1, 1, 'Basic Suite', '1650363756_Chinease (1).png', '1650320556000', '0'),
(2, 1, 'Basic Suite', '1650363771_Chinease (1).png', '1650320571000', '0'),
(3, 1, 'Basic Suite', '1650364011_Chinease (1).png', '1650320811000', '0'),
(4, 1, 'Basic Suite', '1650364016_', '1650320816000', '0'),
(5, 1, 'Basic Suite', '1650364036_2.jpg', '1650320836000', '0'),
(6, 1, 'Basic Suite', '1650364063_3.jpg', '1650320863000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `mh` int(111) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `type` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `contact` int(111) NOT NULL,
  `is_deleted` int(111) NOT NULL,
  `is_updated` int(111) NOT NULL,
  `created_on` int(111) NOT NULL,
  `updated_on` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `group_id`, `mh`, `first_name`, `last_name`, `type`, `email`, `password`, `contact`, `is_deleted`, `is_updated`, `created_on`, `updated_on`) VALUES
(1, 1, 1, 'bastosnz74', '', 'ADMIN', 'bastosnz74', 'admin', 2147483647, 0, 0, 2147483647, 0),
(9, 1, 1, 'bernardlafonte', '', 'MANAGER', 'bernardlafonte@gmail.com', 'bernardlafonte', 0, 0, 0, 0, 0),
(10, 1, 1, 'francoisrolland', '', 'MANAGER', 'francoisrolland@gmail.com', 'francois', 0, 0, 0, 0, 0),
(11, 1, 1, 'gaspardleconte', '', 'MANAGER', 'gaspardleconte@gmail.com', 'gaspardleconte12', 0, 0, 0, 0, 0),
(12, 1, 1, 'jeanjacquesdupont', '', 'MANAGER', 'jjd@gmail.com', 'jjdupont', 0, 0, 0, 0, 0),
(13, 1, 1, 'laurencemano', '', 'MANAGER', 'laurencem@gmail.com', 'laurence', 0, 0, 0, 0, 0),
(14, 1, 1, 'marionjolles', '', 'MANAGER', 'marionj@gmail.com', 'marion', 0, 0, 0, 0, 0),
(15, 1, 1, 'pierrelamart', '', 'MANAGER', 'pierrel@gmail.com', 'pierre', 0, 0, 0, 0, 0),
(16, 1, 1, 'pascaljulien', '', 'CUSTOMER', 'pascaljulien@gmail.com', 'pascaljulien123', 0, 0, 0, 0, 0),
(17, 1, 1, 'pauljugnot', '', 'CUSTOMER', 'pauljugnot@gmail.com', 'pauljugnot123', 0, 0, 0, 0, 0),
(18, 1, 1, 'julielescaut', '', 'CUSTOMER', 'julielescaut@gmail.com', 'julielescaut123', 0, 0, 0, 0, 0),
(19, 1, 1, 'williamlefut', '', 'CUSTOMER', 'williamlefut@gmail.com', 'williamlefut123', 0, 0, 0, 0, 0),
(20, 1, 1, 'mathildetrombert', '', 'CUSTOMER', 'mathildetrombert@gmail.com', 'mathildetrombert', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suite`
--
ALTER TABLE `suite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suite_gallery`
--
ALTER TABLE `suite_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suite`
--
ALTER TABLE `suite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `suite_gallery`
--
ALTER TABLE `suite_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
