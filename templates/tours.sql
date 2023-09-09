-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 12:10 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u282558932_tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `profile`, `phone`, `email`, `address`, `location`, `website`, `fb`, `insta`, `whatsapp`, `youtube`) VALUES
(1, 'aabha123', 'aabha@123', '', '9022032772', 'AabhaJahagirdar@gmail.com', 'Solapur', 'Solapur', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', '9022032772', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `bookId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `packageId` int(11) NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `payMode` varchar(255) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `distype` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `rem` int(11) NOT NULL,
  `bookedOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookId`, `name`, `phone`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `payMode`, `adults`, `children`, `subTotal`, `discount`, `distype`, `total`, `paid`, `rem`, `bookedOn`) VALUES
(4, 'yeabv', 'Shrawani Dixit', '9865986585', 'Solapur', 3, 37000, '2021-10-24', '2021-10-26', 'UPI', 2, 2, 222000, 5000, 'cash', 217000, 10000, 207000, '2021-10-31'),
(5, 'ijdbc', 'Shriyansh Mahamuni', '876743102', 'Vasud Road, Sangola					       								       ', 5, 7000, '2021-11-01', '2021-11-03', 'OnlineTransfer', 2, 1, 35000, 5, 'per', 33250, 250, 33000, '2021-11-21'),
(6, 'eysjj', 'Mitali Salunkhe', '8764595498', 'Ajinkya plaza,Sangola 							       								       ', 17, 6400, '2021-10-30', '2021-11-02', 'UPI', 2, 0, 38400, 2, 'per', 37632, 37632, 0, '2021-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `bookonline`
--

CREATE TABLE `bookonline` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bookId` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `packageId` int(11) NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `disType` varchar(100) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `paymentId` varchar(255) NOT NULL,
  `paymentStatus` varchar(10) NOT NULL,
  `bookedOn` date NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookonline`
--

INSERT INTO `bookonline` (`id`, `uid`, `bookId`, `name`, `phone`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `adults`, `children`, `subTotal`, `discount`, `disType`, `coupon`, `total`, `paymentId`, `paymentStatus`, `bookedOn`, `status`) VALUES
(1, 2, 'IMPERIOUS94554980_2', 'Aabha', '8767431102', 'Thane', 6, 4000, '2021-10-31', '2021-11-02', 1, 1, 12000, 300, 'cash', 'diwali', 10530, '20211030111212800110168645603136917', 'success', '2021-10-31', 1),
(2, 2, 'IMPERIOUS4756817_2', 'Aabha', '8767431102', 'Thane', 6, 4000, '2021-11-07', '2021-11-09', 1, 1, 12000, 300, 'cash', '', 11700, '20211030111212800110168886903127709', 'success', '2021-10-31', 1),
(3, 1, 'IMPERIOUS8811716_1', 'AabhaJ', '9284552192', 'Sangali', 18, 3000, '2021-11-05', '2021-11-07', 1, 2, 12000, 3, 'per', 'diwali', 10476, '20211031111212800110168210703105638', 'success', '2021-10-31', 1),
(4, 1, 'IMPERIOUS3941622_1', 'AabhaJ', '9284552192', 'Sangali', 1, 3400, '2021-11-04', '2021-11-05', 1, 1, 5100, 200, 'cash', '', 4900, '20211031111212800110168443403108938', 'success', '2021-10-31', 1),
(5, 1, 'IMPERIOUS91794175_1', 'AabhaJahagirdar', '9284552192', 'Sangali', 15, 4300, '2021-11-05', '2021-11-06', 2, 2, 12900, 6, 'per', '', 12126, '20211031111212800110168249703114014', 'success', '2021-10-31', 1),
(6, 1, 'IMPERIOUS15664954_1', 'AabhaJahagirdar', '9284552192', 'Sangali', 16, 7530, '2021-11-03', '2021-11-05', 1, 1, 22590, 200, 'cash', '', 22390, '', 'pending', '2021-11-01', 0),
(7, 1, 'IMPERIOUS10984805_1', 'Aarya', '9284552192', 'Sangali', 16, 7530, '2021-11-03', '2021-11-05', 1, 1, 22590, 200, 'cash', '', 22390, '20211101111212800110168822903135859', 'success', '2021-11-01', 1),
(8, 1, 'IMPERIOUS49634695_1', 'AaryaJ', '9284552192', 'Sangali', 6, 4000, '2021-11-03', '2021-11-05', 1, 1, 12000, 300, 'cash', '', 11700, '20211101111212800110168576603147418', 'success', '2021-11-01', 1),
(9, 2, 'IMPERIOUS76103629_2', 'Aarya', '8767431102', 'Thane', 19, 2000, '2021-11-27', '2021-11-28', 1, 1, 3000, 0, 'per', '', 3000, '20211101111212800110168480503123809', 'success', '2021-11-21', 1),
(10, 3, 'IMPERIOUS93818924_3', '40 AabhJahagirdar', '9284552192', 'Vita', 19, 2000, '2021-11-24', '2021-11-25', 1, 0, 2000, 0, 'per', '', 2000, '20211123111212800110168134903209306', 'success', '2021-11-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`) VALUES
(2, 'Bungee Jumping', '  ', 1),
(3, 'Skiing', '  ', 1),
(4, 'Dirt biking', '  ', 1),
(5, 'Scuba diving', '  ', 1),
(13, 'Zorbing', '', 1),
(14, 'Mountain biking', '  ', 1),
(15, 'Rock climbing', '  ', 1),
(16, 'Hang Gliding', '  ', 1),
(17, 'Hiking', '  ', 1),
(18, 'Rafting', '  ', 1),
(19, 'Heli-Skiing', '  ', 1),
(20, 'Caving', '  ', 1),
(21, 'Desert camping', '  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `couponCode` varchar(20) NOT NULL,
  `couponType` enum('p','r') NOT NULL,
  `couponValue` int(11) NOT NULL,
  `minValue` int(11) NOT NULL,
  `expiredOn` date NOT NULL,
  `status` int(11) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponCode`, `couponType`, `couponValue`, `minValue`, `expiredOn`, `status`, `addedOn`) VALUES
(1, 'diwali', 'p', 10, 5000, '2022-11-01', 1, '2021-10-25 16:56:14'),
(2, 'AFDH90', 'p', 20, 9000, '2023-10-10', 1, '2021-10-27 14:44:40'),
(3, 'AMJKL3', 'r', 500, 5000, '2022-11-11', 1, '2021-10-30 16:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pckgId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `userId`, `pckgId`) VALUES
(2, 2, 2),
(3, 2, 4),
(5, 1, 18),
(6, 1, 16),
(7, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `packageName` varchar(255) NOT NULL,
  `packageDesc` varchar(255) NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `discount` float NOT NULL,
  `disType` varchar(10) NOT NULL,
  `packageType` int(11) NOT NULL,
  `packagePhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `packageName`, `packageDesc`, `packagePrice`, `discount`, `disType`, `packageType`, `packagePhoto`) VALUES
(1, 'Bungee Jumping in Lonavala', 'Bungee Jumping takes place in an adventure park called Della Adventures. The equipment is attached at a height of 150 ft and lasts for about 7-10 minutes. People above the age of 10, with a body weight of above 35 kgs are allowed to take the jump.', 3000, 0, 'cash', 2, '632367775_bungee.jpg'),
(2, 'Bungee Jumping in Delhi', 'Wanderlust is the provider for this sport. All the equipment is imported from Japan and all the staff are also trained from Germany so people don\'t fear you are safe', 3500, 2, 'per', 2, '733746183_bungee2.jpg'),
(3, 'Bungee Jumping in Goa', 'One of the most thrilling and adventurous sport apart from all the watersports that you should definitely not miss while in Goa is Bungee jumping. A relatively new concept that has taken its first steps in Goa, Bungee jumping is not just a thrilling activ', 3000, 0, 'per', 2, '507524597_bungee3.jpg'),
(4, 'Belum Caves', 'Belum caves are naturally made underground caves, which extend over 3km and are 46 meters deep. This cave system is open to public and is known for stalactites and stalagmites that are formed by the underground flowing water, over thousands of years.', 5000, 5, 'per', 20, '547985760_belum.jpg'),
(5, 'Spiti Valley, Himachal Pradesh', 'First on our list is, Spiti Valley nestled in the Keylong district of Himachal Pradesh. It is one of the best camping sites in India. ', 7000, 2, 'per', 21, '471898054_spiti-valley-himachal-pradesh.jpg'),
(6, 'Solang Valley, Manali', 'One of the best camping sites in India, Solang Valley in Manali attracts visitors from the far ends of the world. ', 4000, 300, 'cash', 21, '302561381_solang-valley-manali.jpg'),
(13, 'Hollant Beach:Goa', ' A Picture-Perfect Destination! The curvy bay lined with rustic boats, the clean, golden sand, the colorful shacks on one side.', 7500, 0, 'per', 3, '244305377_Goa-Beach-Hollant.jpg'),
(15, 'Damodara Desert Camp', 'If you are looking for a camping experience that is a bit more peaceful and away from the crowd, Damodara Desert Camp will cater to your needs.', 4300, 0, 'per', 21, '210460589_DSCN0440.jpg'),
(16, 'Ajantha &amp; Ellora Caves', 'Ajanta and Ellora caves, considered to be one of the finest examples of ancient rock-cut caves, are located near Aurangabad in Maharashtra, India.', 7530, 200, 'cash', 20, '613178458_AJANTA-AND-ELLORA-CAVES.jpg'),
(17, 'Lavasa', 'Known as India\'s newest hill station, the Lavasa Corporation is constructing this private city.', 6400, 6, 'per', 3, '409387949_LAVASA.jpg'),
(18, 'Pachgani', 'Deriving its name from the five hills surrounding it, Panchgani is a popular hill station near Mahabaleshwar in Maharashtra.', 3000, 3, 'per', 3, '285277791_PANCHGANI.jpg'),
(19, 'Pachmarhi Caves', 'Pachmari caves are believed to be the caves that were once used as shelter by the Pandava brothers and their wife Draupadi during their exile period. These caves date back to 6th century and the interiors consist of various ancient inscriptions. Many Budd', 3000, 0, 'per', 20, '829179071_Pachmarhi-Caves.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `query` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `name`, `phone`, `query`, `date`) VALUES
(1, '', '9284552192', 'Please add some historical places for tours.', '2021-11-29 07:25:49'),
(4, 'Samina Mulani', '9875621546', ' Nothing', '2021-11-30 03:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `description`, `stars`) VALUES
(1, 1, 'Very nice service! Amazing tours deals in affordable price.', 5),
(2, 1, 'Nice service!', 4),
(4, 1, 'very nice', 4),
(5, 2, 'Better service in affordable price.', 4),
(6, 1, 'Good', 2),
(7, 1, '', 2),
(8, 1, 'woww', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tourmembers`
--

CREATE TABLE `tourmembers` (
  `id` int(11) NOT NULL,
  `bookId` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourmembers`
--

INSERT INTO `tourmembers` (`id`, `bookId`, `name`, `type`, `amount`) VALUES
(15, 'yeabv', 'Monu', 'child', 18500),
(16, 'yeabv', 'riya', 'adult', 37000),
(17, 'yeabv', 'abhi', 'child', 18500),
(18, 'wvbjs', 'Abhi', 'child', 3500),
(19, 'wvbjs', 'Rehan', 'adult', 7000),
(20, 'ijdbc', 'Abhi', 'child', 3500),
(21, 'ijdbc', 'Rehan', 'adult', 7000),
(22, 'eysjj', 'Tanuja', 'adult', 6400);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `address`, `profile`) VALUES
(1, 'VaibhaviD', 'sayalid951@gmail.com', '9284552192', 'Sangali', '726387059_ALIBAG.jpg'),
(2, 'Sayali', 'dixitsayali184@gmail.com', '8767431102', 'Thane', '626145968_LAVASA.jpg'),
(3, '40 ᴠᴀɪʙʜᴀᴠɪ ᴅɪxɪᴛ', 'vaibhavidixit511@gmail.com', '', '', 'https://lh3.googleusercontent.com/a-/AOh14Gi70rfAXTd9N6geCFXu-xdJB-fbulBc_UoBf-eSZA=s96-c');

-- --------------------------------------------------------

--
-- Table structure for table `viewdetails`
--

CREATE TABLE `viewdetails` (
  `id` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photoone` varchar(255) NOT NULL,
  `phototwo` varchar(255) NOT NULL,
  `photthree` varchar(255) NOT NULL,
  `photofour` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewdetails`
--

INSERT INTO `viewdetails` (`id`, `packageId`, `location`, `description`, `photoone`, `phototwo`, `photthree`, `photofour`, `link`, `checkin`, `checkout`) VALUES
(1, 2, 'Delhi', 'Bungee Jumping is available in Delhi too. Wanderlust is the provider for this sport. All the equipment is imported from Japan and all the staff are also trained from Germany so people don\'t fear you are safe. The equipment is attached to a 130 feet high c', '697594299_bungeeL.jpg', '385598733_bLonavala.jpg', '139389906_bungee2.jpg', '135678471_bungee3.jpg', 'https://www.youtube.com/watch?v=ucZRYdoXUF4', '07:00', '16:00'),
(2, 3, 'Goa', 'One of the most thrilling and adventurous sport apart from all the watersports that you should definitely not miss while in Goa is Bungee jumping. A relatively new concept that has taken its first steps in Goa, Bungee jumping is not just a thrilling activ', '827272960_bLonavala.jpg', '538467266_bungee.jpg', '944012299_bungee2.jpg', '259854511_bungee3.jpg', 'https://www.youtube.com/watch?v=vqsojDj6j_s', '08:08', '19:08'),
(3, 1, 'Lonavala', 'Bungee Jumping takes place in an adventure park called Della Adventures. The equipment is attached at a height of 150 ft and lasts for about 7-10 minutes. People above the age of 10, with a body weight of above 35 kgs are allowed to take the jump. The exp', '844002562_bungeeL.jpg', '760488155_bLonavala.jpg', '735126647_lonavlaB.jpg', '371574847_bungee3.jpg', 'https://www.youtube.com/watch?v=wqraeikKu0E', '07:06', '18:00'),
(4, 4, 'Andhra Pradesh', 'Belum caves are naturally made underground caves, which extend over 3km and are 46 meters deep. This cave system is open to public and is known for stalactites and stalagmites that are formed by the underground flowing water, over thousands of years.', '129145295_be3.jpg', '823799841_be4.jpg', '116237561_be2.jpg', '312164224_be1.jpg', 'https://www.youtube.com/watch?v=kiOPoxyVAuU', '05:42', '20:42'),
(5, 5, 'Lahul', 'Spiti Valley is a cold desert mountain valley located high in the Himalayas in the north-eastern part of the northern Indian state of Himachal Pradesh.', '390501261_sp.jpg', '493813567_sp4.jpg', '434847287_sp3.jpg', '653483702_sp2.jpg', 'https://www.youtube.com/watch?v=aP3RrWUT4sw', '07:17', '20:17'),
(6, 6, 'Manali', 'Be it summers or be it winters, Solang Valley is one of the most gorgeous and adventurous places to visit in Manali. It’s not just another skiing paradise, but a lot more than that when it comes to the unique experiences it offers. ', '668467268_sv.jpg', '338501825_sv4.jpg', '987632994_sv2.jpg', '437122405_sv3.jpg', 'https://www.youtube.com/watch?v=6fMzwVkK1qw', '08:23', '22:23'),
(7, 13, 'Goa', 'Located south of Bogmalo beach, this is the only beach in Goa where one can witness a beautiful sunrise (considering Goa is on the West Coast of India). Nestled along the foothills of the lush Western Ghats, Hollant Beach offers visitors beautiful views.', '733180302_hb.jpg', '169668840_hb2.jpg', '865713072_h3.jpg', '704016952_h4.jpg', 'https://www.youtube.com/watch?v=0ECHkEfGMVg', '18:01', '22:01'),
(8, 14, 'Mahabaleshwar', 'Mahableshwar is the best hill station of Maharashtra. It is situated about 4500 ft. above sea level on the Sahyadri spurs. It was the erstwhile summer capital of Old Bombay Presidency. The tourists are enthralled by its exotic greenery, beautiful gardens ', '196798648_download (7).jpg', '500053569_520468845Ganpatipule_Main_thumb.jpg', '689252310_download (1).jpg', '999340734_download (9).jpg', 'https://www.youtube.com/watch?v=GOw-sAXMYek', '07:03', '22:03'),
(9, 15, 'Damodara, Rajasthan', 'There are 10 swiss-style tents and all rents are roomy and well maintained. In addition, air conditioner and heater facilities are available. A night’s stay in such a camp can truly change your perspective of desert camping', '192137915_dm.jpg', '712803223_dm4.jpg', '418508874_dm3.jpg', '647492600_dm2.jpg', 'https://www.youtube.com/watch?v=iX7-UB1xJz4', '06:01', '22:02'),
(10, 16, 'Aurangabad', 'The Buddhist Caves in Ajanta are approximately 30 rock-cut Buddhist cave monuments dating from the 2nd century BCE to about 480 CE in the Aurangabad district of Maharashtra state in India.', '178897627_aj1.jpg', '509043199_aj2.jpg', '444669469_aj3.jpg', '973707133_aj4.jpg', 'https://www.youtube.com/watch?v=kgu6vcNLEC0', '05:30', '21:19'),
(11, 17, 'Pune', 'Located at a distance of about 65 km from Pune, the beautifully planned city of Lavasa is surrounded by the majestic Western Ghats. The city is constructed in the Mulshi Valley and covers a sprawling 25,000 acres. With such mesmerizing views of hills, val', '499760421_lv1.jpg', '706400480_lv2.jpg', '698326253_lv4.jpg', '617340416_lv3.jpg', 'https://www.youtube.com/watch?v=kajJgaWGaFk', '17:29', '22:29'),
(12, 18, 'Satara', 'The \'Land of Five Hills\', or Panchgani, is a distinguished hill station in Maharashtra. Located far away from the bustling city of Mumbai, Panchgani promises its visitors a trip they could cherish for life. ', '156227408_p4.jpg', '446938098_p2.jpg', '742366445_p3.jpg', '286475262_p1.jpg', 'https://www.youtube.com/watch?v=-K9jbvI3Qg0', '17:25', '21:25'),
(13, 19, 'Madhya Pradesh', 'Pachmari caves are believed to be the caves that were once used as shelter by the Pandava brothers and their wife Draupadi during their exile period. These caves date back to 6th century and the interiors consist of various ancient inscriptions. Many Budd', '184264140_pc1.jpg', '336634745_pc2.jpg', '840849467_pc3.jpg', '509595801_p4.jpg', 'https://www.youtube.com/watch?v=hwb2hDUc0zI', '08:33', '19:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookId` (`bookId`);

--
-- Indexes for table `bookonline`
--
ALTER TABLE `bookonline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourmembers`
--
ALTER TABLE `tourmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewdetails`
--
ALTER TABLE `viewdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookonline`
--
ALTER TABLE `bookonline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tourmembers`
--
ALTER TABLE `tourmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `viewdetails`
--
ALTER TABLE `viewdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
