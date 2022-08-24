-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 12:47 PM
-- Server version: 10.4.8-MariaDB
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
-- Database: `festivepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(7) NOT NULL,
  `area_name` varchar(15) NOT NULL,
  `city_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `city_id`) VALUES
(1, 'vasna', 1),
(2, 'piplod', 2),
(3, 'gotri', 3),
(4, 'champaknaga', 4),
(5, 'chitra', 5),
(6, 'Asarwa', 1),
(7, 'Bodakdev', 1),
(8, 'Khadia', 1),
(9, 'Jamalpur', 1),
(10, 'Navrangpura', 1),
(11, 'Nanpura', 2),
(12, 'Dabholi', 2),
(14, 'Krishna park', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(5) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_id`, `username`, `qty`) VALUES
(61, 18, 'mahesh123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(7) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `fest_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `fest_id`) VALUES
(1, 'Independence_Day', 1),
(2, 'Republic_day', 1),
(3, 'Diwali', 2),
(4, 'Holi', 2),
(5, 'Makarsankranti', 2),
(6, 'Rakshabandhan', 2),
(7, 'Navratri', 2),
(8, 'Eid', 3),
(9, 'Christmas', 4),
(10, 'New_Year', 4),
(11, 'Good_friday', 4),
(12, 'Lohri', 5),
(13, 'Gurupurab', 5);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(7) NOT NULL,
  `city_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'ahmedabad'),
(2, 'surat'),
(3, 'vadodara'),
(4, 'rajkot'),
(5, 'bhavnagar');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(7) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `Email`, `subject`, `message`, `date`, `username`) VALUES
(1, 'ajay@xyz.com', 'product issue', 'i have been ordered product on 3-4-2021 which is defected', '2021-04-06', 'ajay1'),
(2, 'abc@pqr.com', 'shipping', 'I have not get my order on the shipping address', '2021-04-02', 'Abc'),
(14, 'ram123@gmail.com', 'Product Issue', 'i have been ordered product on 3-4-2021 which is defected', '2021-04-08', 'ram');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(7) NOT NULL,
  `pro_id` int(7) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `feed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `pro_id`, `feedback`, `username`, `feed_date`) VALUES
(1, 15, 'Harmless colors', 'Abc', '2021-04-13'),
(2, 10, 'Good quality crackers for diwali', 'ajay1', '2021-04-02'),
(3, 2, 'Very Good t-shirt', 'Abc', '2021-04-03'),
(4, 16, 'Very strong and colorful thread', 'def', '2021-04-07'),
(5, 21, 'Awesome Navratri Clothes for kids', 'Abc', '2021-04-02'),
(6, 5, 'Colourful Kites with Good quality', 'def', '2021-04-04'),
(7, 23, 'Christmas tree with amazing lights', 'mahesh123', '2021-04-01'),
(12, 25, 'Awesome whistle sound.', 'Abc', '2021-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `fest_id` int(7) NOT NULL,
  `fest_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `festival`
--

INSERT INTO `festival` (`fest_id`, `fest_name`) VALUES
(1, 'National_festivals'),
(2, 'Hindu_festivals'),
(3, 'Muslim_festivals'),
(4, 'Christian_festivals'),
(5, 'Sikh_festivals');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(7) NOT NULL,
  `image_name` varchar(25) DEFAULT NULL,
  `pro_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `pro_id`) VALUES
(1, 'flag1.jpg', 1),
(2, 'india.jpg', 2),
(3, 'tshirt.jpg', 3),
(4, 'cover.jpg', 4),
(5, 'kites.jpg', 5),
(6, 'gun2.jpg', 6),
(7, 'cover1.jpg', 7),
(8, 'flag2.jpg', 8),
(9, 'gun1.jpg', 9),
(10, 'crack.png', 10),
(11, 'light.png', 11),
(12, 'rocket.png', 12),
(13, 'pichkari.png', 13),
(14, 'pichkari1.png', 14),
(15, 'color.png', 15),
(16, 'manjha.png', 16),
(17, 'rakhi.png', 17),
(18, 'rakhi1.png', 18),
(19, 'rakhi2.png', 19),
(20, 'Lehenga.png', 20),
(21, 'kediyu.png', 21),
(22, 'kediiyu1.png', 22),
(23, 'tree.jpg', 23),
(24, 'santa.png', 24),
(25, 'rock2.jpg', 25),
(26, 'rocket1.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(7) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `description`, `start_date`, `end_date`) VALUES
(2, '20% discount', '2021-01-03', '2021-01-29'),
(3, '70% discount', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `pay_id` int(7) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_status` varchar(10) NOT NULL,
  `pay_method` varchar(18) NOT NULL,
  `sales_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`pay_id`, `username`, `pay_date`, `pay_status`, `pay_method`, `sales_id`) VALUES
(6, 'Abc', '2021-04-05', 'Complete', 'Online Payment', 682958580),
(8, 'Abc', '2021-04-06', 'Complete', 'Cash on delivery', 1036879355),
(9, 'def', '2021-04-07', 'Pending', 'Cash on delivery', 1077154581),
(10, 'Abc', '2021-04-07', 'Complete', 'Online Payment', 1724265946),
(11, 'ram', '2021-04-08', 'Pending', 'Cash on delivery', 2090724618),
(12, 'suresh12', '2021-04-08', 'Complete', 'Online Payment', 1033578267),
(13, 'mahesh123', '2021-04-08', 'Complete', 'Online Payment', 233949514),
(14, 'paresh12', '2021-04-08', 'Pending', 'Cash on delivery', 1732274127),
(15, 'Abc', '2021-04-08', 'Pending', 'Cash on delivery', 679731553),
(16, 'Abc', '2021-04-08', 'Pending', 'Cash on delivery', 723166130);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(7) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `pro_price` int(5) NOT NULL,
  `pro_desc` varchar(400) NOT NULL,
  `stock` int(5) NOT NULL,
  `sub_id` int(7) NOT NULL,
  `unit_id` int(7) NOT NULL,
  `offer_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_desc`, `stock`, `sub_id`, `unit_id`, `offer_id`) VALUES
(1, 'National flag', 100, 'National flag of india.\r\ncelebrate the festival of the india with tri-color', 37, 4, 4, 1),
(2, 'Tri-color t-shirt', 250, 'The tri-color cotton t-shirt for independece day or republic day size-XL', 50, 5, 4, 1),
(3, 'T-shirt(flag)', 499, 'This printed t-shirt is something you should add to your casual wear collection. With this printed t shirt, You wont have to efforts to impress.', 44, 5, 4, 2),
(4, 'Mobile cover', 300, 'Today’s lifestyle is incomplete without cell phones and we just cannot manage without our handsets even for a day. So we are providing you mobile cover for your mobile which gives your phone excellent presentation making it scratch free and damage free.', 47, 10, 4, 3),
(5, 'Kites', 200, 'Colorful kites for uttrayan, buy the kites on affordable price(20 items)', 487, 8, 4, 2),
(6, 'Diwali gun', 200, 'Diwali, Toy Pistol in India. It is made of high-quality Zinc and plastic. It is safe for children above age 3. It promotes a pollution-free Diwali Celebration.\r\n\r\n', 47, 3, 4, 1),
(7, 'Mobile cover', 299, 'The way we take care of our clothes to look good and presentable, the same way, for the smartphone to be scratchproof and damage free, mobile cover should be used. It also gives a different look to your mobile. \r\n', 89, 10, 4, 2),
(8, 'Indian flag', 500, 'Patriotism & solidarity exudes from this ultimate group desk flag. Solid steel for our well deserved & rock-solid Indian Armed Forces. The result is an exquisite Indian national flag along with the Indian Army, Indian Navy, Indian Air Force & Indian Coast Guard flags together on a steel stand, which is unlike any desk flag you have ever seen.', 18, 4, 4, 2),
(9, 'Diwali gun', 200, 'Diwali, Toy Pistol in India. It is made of high-quality Zinc and plastic. It is safe for children above age 3. It promotes a pollution-free Diwali Celebration. Quantity- 1 Pistol.\r\n\r\n', 89, 3, 4, 1),
(10, 'Crackers', 999, 'Send this Diwali special cracker chocolate gift box to your near and dear ones. These exclusive chocolates are sure to put a smile to your loved ones. Surprise them with this exotic chocolate box containing mouth watering chocolates in cracker shapes like chakri, anar, rocket, sutli bomb etc.', 55, 11, 4, 2),
(11, 'Led light(wire)', 599, 'Dark Black cable- Perfectly hiding at nights or plants;200 Multi Color LEDs up to 45mLenght - The Longest Available String Light Dark Black cable- Perfectly hiding at nights or plants', 47, 2, 4, 1),
(12, 'rocket', 299, '\r\n4 Golden party popper , Throws golden sparkles into air with a burst when twisted from bottom . Best Diwali fun item. Size 30 cm', 50, 1, 4, 2),
(13, 'Water gun', 499, 'Made of high quality plastic material, the water gun Pichkari is durable and long lasting use. Fill them up with water and have a water fight with your friends. And then kids can have a great time with their friends. This is a practical and funny water shooting toy for your kids, which is made of premium plastic, the toy is safe, non-toxic and durable.', 45, 6, 4, 2),
(14, 'Water gun', 400, 'Get this Fun design ASCENSION Pichkari for your little one and add colour to your Holi celebrations. Features: Hard plastic body Non-toxic and child safe. Make this colorful festival more cheerful by gifting this cute unique Water Gun Pichkari to your dear ones.Pump the handle on the front to make pressure and press the trigger to release water. This colorful pichkari with storage tank will surely', 48, 6, 4, 2),
(15, 'Colors', 260, 'A perfect blend of natural extracts fused with enticing aroma, Lustrous Herbal Gulal is an absolute eco-friendly product that keeps your skin and health completely safe and protected from harmful chemical based Holi colors. Our Herbal Gulal is exported to more than 35 countries across the world.', 199, 12, 4, 1),
(16, 'Kite Spool', 300, 'Kite spool, with fibre wheel and plastic handle, reel, Charkhi, Firki for kite flying with Sadda (plain white cotton thread) Kite flying material The colors might vary for the charkhi (spools) 5000m\r\n\r\n', 98, 8, 4, 1),
(17, 'Rakhi ', 299, 'Cartoon Characters LED Rakhi Friendship Band For Kids / Boys / Girls', 198, 9, 4, 3),
(18, 'Rakhi', 150, ' High Quality as per International Standards that makes it very skin friendly. It has been made from toxic free materials Anti-Allergic and Safe for Skin. It can be worn over long time periods without any complains of ach and swelling. Made from Premium Quality Material this product assures to remain in its Original Glory even after years of usage.', 99, 9, 4, 2),
(19, 'Rakhi', 210, 'Evisha 2 Pcs Assorted Colour And Design With Pom Pom Hanging traditional Lumba Chuda Hanging Rak\r\n\r\n', 50, 9, 4, 3),
(20, 'Lehenga-Choli', 3000, 'Care Instructions: Dry clean only Work : Colourful Kutch Embroidered and Mirror work,Colorful Pom Pom Trim along Hem, Contrast Dupatta Product will come pre-stitched as per standard size. wash instructions: Dry Clean and soft handwash Only\r\n\r\n', 20, 13, 4, 3),
(21, 'Kediyu(kids)', 2000, ' Made from rich quality cotton fabric yellow Kurta with dhoti pant, Adjustable Mukut with Peacock feather, Mala, Dupatta, and Bansuri/ Flute. Your cutey baby will look more awesome in the form of little Krishna.', 50, 13, 4, 2),
(22, 'Kediyu', 2500, 'We always wanted to take part in the fancy dress competitions. Garba Dress for boys are commonly used in Navratras festival of Hindus, It could also be used in Gujrat State Theme fancy dress performance.\r\n\r\n', 20, 13, 4, 2),
(23, 'Christmas Tree', 1299, 'Perfect for indoor and outdoor - this christmas tree is an ideal choice for outdoor and indoor using. PVC material enhanced the waterproof-ness and metal stand help the tree stay straight in the wind. Easy setup - to finish the assembly of this tree it requires only 3 steps, after putting branches and metal stand together, all it requires you to do is straighten out the branches.', 20, 7, 4, 1),
(24, 'Santa-clause suit', 800, 'BookMyCostume products are ideal for Theme Parties, School Fancy Dress Competitions, Annual Day Celebrations, Birthday gifts, Events, Religious Festivals, and for Adding Fun in Daily Life.', 20, 7, 4, 1),
(25, 'Whistle Rocket', 300, 'Diwali Rockets with whistle sound..available with different colors.Launch up to 50 feet in the air with this high-flying rocket', 78, 1, 4, NULL),
(26, 'Rocket', 250, 'Diwali Rockets..Launch up to 50 feet in the air with this high-flying rocket', 210, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pro_id` int(7) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(7) NOT NULL,
  `username` varchar(15) NOT NULL,
  `sdate` date NOT NULL,
  `SGST` varchar(25) DEFAULT NULL,
  `CGST` varchar(25) DEFAULT NULL,
  `del_add` varchar(45) DEFAULT NULL,
  `shipping_chrg` int(5) DEFAULT NULL,
  `area_id` int(7) NOT NULL,
  `offer_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `username`, `sdate`, `SGST`, `CGST`, `del_add`, `shipping_chrg`, `area_id`, `offer_id`) VALUES
(233949514, 'mahesh123', '2021-04-08', '18%', '18%', '21,sai society, bodakdev,ahmedabad', 100, 7, 2),
(679731553, 'Abc', '2021-04-08', '18%', '18%', 'B/35, brahmakrupa society,asarwa, ahmedabad.', 100, 6, 2),
(682958580, 'Abc', '2021-04-05', '18%', '18%', 'mjdsfoipsdoifhsfhosdnfoh23sdnfljkcfl', 100, 5, 2),
(723166130, 'Abc', '2021-04-08', '18%', '18%', 'abc society,asarwa,ahmedabad-16', 100, 6, 2),
(1033578267, 'suresh12', '2021-04-08', '18%', '18%', 'abc,123,xyz,ahmedabad', 100, 6, 2),
(1036879355, 'Abc', '2021-04-06', '18%', '18%', 'oiushgjlk;slfgnsldfldj;dsjfsdfjs;jfs;fjs;fjk;', 100, 11, 2),
(1077154581, 'def', '2021-04-07', '18%', '18%', '23/4 Om society,asarwa', 100, 3, 2),
(1724265946, 'Abc', '2021-04-07', '18%', '18%', '71/4 mohanlal vakil ni chali,asarwa,ahmedabad', 100, 6, 2),
(1732274127, 'paresh12', '2021-04-08', '18%', '18%', 'address-123,abc,xyz-456', 100, 2, 2),
(2090724618, 'ram', '2021-04-08', '18%', '18%', 'B/35, brahmakrupa society,asarwa, ahmedabad.', 100, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_id` int(7) NOT NULL,
  `pro_id` int(7) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_id`, `pro_id`, `qty`, `price`) VALUES
(233949514, 6, 1, 200),
(679731553, 25, 2, 600),
(682958580, 1, 1, 1100),
(682958580, 8, 2, 1000),
(723166130, 2, 1, 250),
(1033578267, 5, 3, 900),
(1033578267, 16, 1, 300),
(1036879355, 3, 1, 499),
(1077154581, 16, 1, 300),
(1724265946, 6, 1, 799),
(1724265946, 11, 1, 599),
(1732274127, 17, 2, 748),
(1732274127, 18, 1, 150),
(2090724618, 14, 2, 800),
(2090724618, 15, 1, 1060);

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `sal_ret_id` int(7) NOT NULL,
  `srDate` date DEFAULT NULL,
  `sales_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`sal_ret_id`, `srDate`, `sales_id`) VALUES
(254854415, '2021-04-08', 1724265946),
(923349651, '2021-04-07', 682958580);

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_details`
--

CREATE TABLE `sales_return_details` (
  `sal_ret_id` int(7) NOT NULL,
  `pro_id` int(7) NOT NULL,
  `qty` int(5) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_return_details`
--

INSERT INTO `sales_return_details` (`sal_ret_id`, `pro_id`, `qty`, `reason`) VALUES
(923349651, 8, 2, 'Quality is not good'),
(254854415, 11, 1, 'Product Quality is not good');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_id` int(7) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `cat_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1, 'Rocket', 3),
(2, 'lights', 3),
(3, 'Diwali_gun', 3),
(4, 'National_flag', 1),
(5, 'patriotic_t-shirt', 1),
(6, 'Pichkari', 4),
(7, 'Christmas_tree', 9),
(8, 'Kites', 5),
(9, 'Rakhi', 6),
(10, 'Cover', 1),
(11, 'Crackers', 3),
(12, 'colors', 4),
(13, 'navratri_Clothes', 7);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(7) NOT NULL,
  `unit_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'kilogram'),
(2, 'gram'),
(3, 'litre'),
(4, 'item');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `sec_que` varchar(25) NOT NULL,
  `sec_ans` varchar(35) NOT NULL,
  `address` varchar(55) NOT NULL,
  `area_id` int(7) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `lname`, `sec_que`, `sec_ans`, `address`, `area_id`, `email`, `mobile_no`, `isAdmin`) VALUES
('Abc', 'e99a18c428cb38d5f260853678922e03', 'Dev', 'mali', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', 'abc society,dabholi,surat', 12, 'dev123@hotmail.com', 2147483647, 0),
('abc1', '5a3c7876bffbe7638ade37b86ed91862', 'khushi', 'shah', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'A/8, gayatri nagar society,vasna,ahmedabad-3800051', 1, 'khushi@gmail.com', 2147483647, 0),
('Admin', '80177534a0c99a7e3645b52f2027a48b', 'Devendra', 'Mali', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'kjfksdgfkdsgfgfsdfdfjkhdsfhlzshflsdhflm,sd;lkfj', 3, 'admin123@gmail.com', 2147483647, 1),
('ajay1', '39e98c25aa3f80a04a682117e312e049', 'ajay', 'dafda', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', 'C/12, rajkrupa society, bodakdev, ahmedabad.', 7, 'ajay456@gmail.com', 2147483647, 0),
('def', 'e88ebfe1ae982a6da01436e48af6eb74', 'Aman', 'Shah', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', '23/4 Om society,asarwa', 6, 'abc@ijk.com', 2147483647, 0),
('def1', 'a45b1c47cc9a1f78b4d9eb1d80381f34', 'niraj', 'patel', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'C/35, surya society, navrangpura , ahmedabad', 10, 'niraj@gmail.com', 2147483647, 0),
('defg', 'cac5ff630494aa784ce97b9fafac2500', 'raj', 'soni', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', '1/8,vasundahara appt,asarwa,ahmedabad.', 6, 'raj123@gmail.com', 2147483647, 0),
('dev1', '227edf7c86c02a44d17eec9aa5b30cd1', 'dev', 'dave', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', 'a/18, aditya enclave, asarwa, ahmedabad.', 6, 'dev123@gmail.com', 2147483647, 0),
('lakshman', '573b410ced2c9d30e08e00ba84f33fae', 'lakshman', 'patel', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'abcd,bodakdev,ahmedabad', 7, 'dev123@gmail.com', 2147483647, 0),
('luv', '6b5e9f465aab8963eebc451e7e4f9f96', 'luv', 'patel', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'A/9, grand appt, krishna park, vadodara.', 14, 'luv123@gmail.com', 2147483647, 0),
('mahesh123', '8af5f9b3e5eea92ff76998c99203d626', 'mahesh', 'mali', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', 'dfgdfsdrfdfgdfzgdfhgfghfghfghfghfghfghfh', 6, 'chirag123@gmail.com', 2147483647, 0),
('omg', 'fe7ced405a04f5b6e8d1e01276e812c9', 'priya', 'mali', 'fvrt book', 'e1bfd762321e409cee4ac0b6e841963c', 'd/51, chanchal tower,khadia,ahmedabad', 8, 'priya123@gmail.com', 2147483647, 0),
('paresh12', '0f9b2c821417610fe789da29f60b7971', 'paresh', 'parmar', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'sdlkiosrhglxnglxcnllxjfvndlxzfiohdliflxcjlxcf', 6, 'abc@ijk.com', 2147483647, 0),
('paru', '0f9b2c821417610fe789da29f60b7971', 'parul', 'pithva', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'A/6,saransh aapt, piplod, surat.', 2, 'paru123@gmail.com', 2147483647, 0),
('ram', '6a557ed1005dddd940595b8fc6ed47b2', 'ram', 'patel', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'B/35, brahmakrupa society,asarwa, ahmedabad.', 6, 'ram123@gmail.com', 2147483647, 0),
('sanju', 'e03e9d09785663f5dfca5413be728faa', 'sanjay ', 'khan', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'A/11, olive garden, chitra, bhavnagar.', 5, 'sanju@gmail.com', 2147483647, 0),
('suresh12', '0d343ce8aead1a732593829368fdde61', 'suresh', 'jain', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'asfdfdffdsfsdfdsfsfssfsdf3rffxzdfxdfxdf', 3, 'abc@ijk.com', 2147483647, 0),
('xyz', 'da5d476b33b8a9c69425c4b1d220e64c', 'rashmi', 'shah', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'A/1, river front society,asrwa, ahmedabad.', 6, 'rashmi123@gmail.com', 2147483647, 0),
('xyz1', '03154f7b91b2ed10d4a77abbd8be70ee', 'vivek', 'rathod', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'e/98, nayankrupa society, jamalpur,ahmedabad', 9, 'vivek123@gmail.com', 2147483647, 0),
('xyz2', '3bd9731a1a6b6bde2598c24b7e728bf6', 'sibu', 'shah', 'fvrt color', '1ffd9e753c8054cc61456ac7fac1ac89', 'A/9, aditya heights,nanpura, surat.', 11, 'sibu@gmail.com', 2147483647, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
-- (See below for the actual view)
--
CREATE TABLE `view1` (
`username` varchar(15)
,`password` varchar(50)
,`fname` varchar(15)
,`lname` varchar(15)
,`sec_que` varchar(25)
,`sec_ans` varchar(35)
,`address` varchar(55)
,`area_id` int(7)
,`email` varchar(25)
,`mobile_no` int(10)
,`isAdmin` tinyint(1)
,`area_name` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view2`
-- (See below for the actual view)
--
CREATE TABLE `view2` (
`pro_id` int(7)
,`pro_name` varchar(25)
,`pro_price` int(5)
,`pro_desc` varchar(400)
,`stock` int(5)
,`unit_name` varchar(15)
,`cat_name` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view3`
-- (See below for the actual view)
--
CREATE TABLE `view3` (
`pay_id` int(7)
,`username` varchar(15)
,`pay_date` date
,`pay_status` varchar(10)
,`pay_method` varchar(18)
,`sales_id` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view4`
-- (See below for the actual view)
--
CREATE TABLE `view4` (
`feed_id` int(7)
,`pro_id` int(7)
,`feedback` varchar(100)
,`username` varchar(15)
,`feed_date` date
,`username1` varchar(15)
,`pro_name` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view5`
-- (See below for the actual view)
--
CREATE TABLE `view5` (
`sales_id` int(7)
,`username` varchar(15)
,`sdate` date
,`del_add` varchar(45)
,`shipping_chrg` int(5)
,`pro_id` int(7)
,`qty` int(5)
,`pro_name` varchar(25)
,`pro_price` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view6`
-- (See below for the actual view)
--
CREATE TABLE `view6` (
`sales_id` int(7)
,`sdate` date
,`del_add` varchar(45)
,`shipping_chrg` int(5)
,`pro_id` int(7)
,`pro_name` varchar(25)
,`qty` int(5)
,`username` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view7`
-- (See below for the actual view)
--
CREATE TABLE `view7` (
`sales_id` int(7)
,`username` varchar(15)
,`sdate` date
,`del_add` varchar(45)
,`pro_id` int(7)
,`qty` int(5)
,`area_name` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view8`
-- (See below for the actual view)
--
CREATE TABLE `view8` (
`sal_ret_id` int(7)
,`pro_name` varchar(25)
,`qty` int(5)
,`reason` varchar(50)
,`srDate` date
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `pro_id` int(7) NOT NULL,
  `username` varchar(15) NOT NULL,
  `wdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`pro_id`, `username`, `wdate`) VALUES
(5, 'paresh12', '2021-04-08'),
(6, 'Abc', '2021-04-07'),
(14, 'ram', '2021-04-08'),
(16, 'mahesh123', '2021-04-08'),
(18, 'mahesh123', '2021-04-08'),
(21, 'paresh12', '2021-04-08'),
(23, 'ram', '2021-04-08'),
(25, 'Abc', '2021-04-08');

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view1`  AS  select `user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`fname` AS `fname`,`user`.`lname` AS `lname`,`user`.`sec_que` AS `sec_que`,`user`.`sec_ans` AS `sec_ans`,`user`.`address` AS `address`,`user`.`area_id` AS `area_id`,`user`.`email` AS `email`,`user`.`mobile_no` AS `mobile_no`,`user`.`isAdmin` AS `isAdmin`,`area`.`area_name` AS `area_name` from (`user` join `area` on(`area`.`area_id` = `user`.`area_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view2`
--
DROP TABLE IF EXISTS `view2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view2`  AS  select `product`.`pro_id` AS `pro_id`,`product`.`pro_name` AS `pro_name`,`product`.`pro_price` AS `pro_price`,`product`.`pro_desc` AS `pro_desc`,`product`.`stock` AS `stock`,`unit`.`unit_name` AS `unit_name`,`category`.`cat_name` AS `cat_name` from (((`category` join `subcategory` on(`category`.`cat_id` = `subcategory`.`cat_id`)) join `product` on(`subcategory`.`sub_id` = `product`.`sub_id`)) join `unit` on(`unit`.`unit_id` = `product`.`unit_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view3`
--
DROP TABLE IF EXISTS `view3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view3`  AS  select `payment_details`.`pay_id` AS `pay_id`,`payment_details`.`username` AS `username`,`payment_details`.`pay_date` AS `pay_date`,`payment_details`.`pay_status` AS `pay_status`,`payment_details`.`pay_method` AS `pay_method`,`payment_details`.`sales_id` AS `sales_id` from `payment_details` ;

-- --------------------------------------------------------

--
-- Structure for view `view4`
--
DROP TABLE IF EXISTS `view4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view4`  AS  select `feedback`.`feed_id` AS `feed_id`,`feedback`.`pro_id` AS `pro_id`,`feedback`.`feedback` AS `feedback`,`feedback`.`username` AS `username`,`feedback`.`feed_date` AS `feed_date`,`user`.`username` AS `username1`,`product`.`pro_name` AS `pro_name` from ((`feedback` join `product` on(`product`.`pro_id` = `feedback`.`pro_id`)) join `user` on(`user`.`username` = `feedback`.`username`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view5`
--
DROP TABLE IF EXISTS `view5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view5`  AS  select `sales`.`sales_id` AS `sales_id`,`sales`.`username` AS `username`,`sales`.`sdate` AS `sdate`,`sales`.`del_add` AS `del_add`,`sales`.`shipping_chrg` AS `shipping_chrg`,`sales_details`.`pro_id` AS `pro_id`,`sales_details`.`qty` AS `qty`,`product`.`pro_name` AS `pro_name`,`product`.`pro_price` AS `pro_price` from ((`sales` join `sales_details` on(`sales`.`sales_id` = `sales_details`.`sales_id`)) join `product` on(`product`.`pro_id` = `sales_details`.`pro_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view6`
--
DROP TABLE IF EXISTS `view6`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view6`  AS  select `sales`.`sales_id` AS `sales_id`,`sales`.`sdate` AS `sdate`,`sales`.`del_add` AS `del_add`,`sales`.`shipping_chrg` AS `shipping_chrg`,`sales_details`.`pro_id` AS `pro_id`,`product`.`pro_name` AS `pro_name`,`sales_details`.`qty` AS `qty`,`sales`.`username` AS `username` from ((`sales` join `sales_details` on(`sales`.`sales_id` = `sales_details`.`sales_id`)) join `product` on(`product`.`pro_id` = `sales_details`.`pro_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view7`
--
DROP TABLE IF EXISTS `view7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view7`  AS  select `sales`.`sales_id` AS `sales_id`,`sales`.`username` AS `username`,`sales`.`sdate` AS `sdate`,`sales`.`del_add` AS `del_add`,`sales_details`.`pro_id` AS `pro_id`,`sales_details`.`qty` AS `qty`,`area`.`area_name` AS `area_name` from ((`sales` join `area` on(`area`.`area_id` = `sales`.`area_id`)) join `sales_details` on(`sales`.`sales_id` = `sales_details`.`sales_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view8`
--
DROP TABLE IF EXISTS `view8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `view8`  AS  select `sales_return`.`sal_ret_id` AS `sal_ret_id`,`product`.`pro_name` AS `pro_name`,`sales_return_details`.`qty` AS `qty`,`sales_return_details`.`reason` AS `reason`,`sales_return`.`srDate` AS `srDate` from ((`sales_return` join `sales_return_details` on(`sales_return`.`sal_ret_id` = `sales_return_details`.`sal_ret_id`)) join `product` on(`product`.`pro_id` = `sales_return_details`.`pro_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `fest_id` (`fest_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `username` (`username`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`fest_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `username` (`username`),
  ADD KEY `fk_payment_details_sales1_idx` (`sales_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `username` (`username`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_id`,`pro_id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`sal_ret_id`),
  ADD KEY `fk_sales_return_sales1_idx` (`sales_id`);

--
-- Indexes for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_product_has_sales_return_sales_return1_idx` (`sal_ret_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`pro_id`,`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `pay_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`fest_id`) REFERENCES `festival` (`fest_id`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `fk_payment_details_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcategory` (`sub_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`);

--
-- Constraints for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD CONSTRAINT `fk_sales_return_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  ADD CONSTRAINT `fk_product_has_sales_return_sales_return1` FOREIGN KEY (`sal_ret_id`) REFERENCES `sales_return` (`sal_ret_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sales_return_details_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `sales_return_details_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
