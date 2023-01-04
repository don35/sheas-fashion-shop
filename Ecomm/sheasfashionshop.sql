-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 12:35 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheasfashionshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `tag_name` varchar(200) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `topsales` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `tag_name`, `description`, `status`, `topsales`, `image`, `created_at`) VALUES
(1001, 'Coat', 'coat', 'For Ladies and For Men', 0, 0, '22-296999-row4-gallery3-1-2x.png', '2022-11-13 10:50:29'),
(1002, 'Dress', 'dress', 'Dress For Ladies', 0, 0, '4681ba8e-0c00-4dbd-b029-003af0ca.png', '2022-11-13 06:23:48'),
(1003, 'Shorts', 'shorts', 'For Ladies and Men', 0, 0, 'p2073161.png', '2022-11-13 06:24:38'),
(1004, 'Blouses', 'blouses', 'For Ladies Only', 0, 0, '747ebe2820aa3826ba77337e89a55411.png', '2022-11-13 06:25:14'),
(1005, 'Cardigan', 'cardigan', 'For Ladies Only', 0, 0, 'cardigan-sweaters-for-women-grac.png', '2022-11-13 06:26:03'),
(1006, 'Ladies Bags', 'bags', 'For Ladies Only', 0, 1, '1668320793.jpg', '2022-11-13 06:26:33'),
(1008, 'Trousers ', 'trousers', 'For Ladies Only', 0, 1, '1668320855.png', '2022-11-13 06:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(200) NOT NULL,
  `cust_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` mediumtext NOT NULL,
  `postalcode` int(200) NOT NULL,
  `total_price` int(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `cust_id`, `name`, `email`, `phone`, `address`, `postalcode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(18, 'SFOS3439457529218', 0, 'Dwight Ramos', 'dwight@gmail.com', '09457529218', 'Sitio Kanluran Masbate Philippines ', 4220, 4900, 'COD', '', 2, NULL, '2022-12-04 07:19:40'),
(19, 'SFOS8900457529218', 0, 'Dwight Ramos', 'dwight@gmail.com', '09457529218', 'Sitio Kanluran Masbate City', 4200, 7000, 'COD', '', 0, NULL, '2022-12-04 09:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(8, '8', '2010', 1, '3000.00', '2022-11-30 04:34:34'),
(9, '9', '2010', 1, '3000.00', '2022-11-30 04:37:05'),
(10, '10', '2010', 1, '3000.00', '2022-11-30 04:41:57'),
(11, '11', '2001', 5, '300', '2022-11-30 05:23:19'),
(12, '12', '2010', 1, '3000.00', '2022-12-01 11:32:07'),
(13, '13', '2011', 1, '500.00', '2022-12-02 00:23:09'),
(14, '14', '2010', 1, '3000.00', '2022-12-02 01:39:47'),
(15, '14', '2009', 1, '500.00', '2022-12-02 01:39:48'),
(16, '15', '2010', 2, '3000.00', '2022-12-03 03:52:38'),
(17, '16', '2009', 3, '500.00', '2022-12-03 06:08:00'),
(18, '16', '2010', 1, '3000.00', '2022-12-03 06:08:00'),
(19, '16', '2008', 1, '400', '2022-12-03 06:08:00'),
(20, '17', '2038', 2, '1000.00', '2022-12-04 01:25:20'),
(21, '17', '2020', 2, '2000.00', '2022-12-04 01:25:20'),
(22, '18', '2030', 2, '400.00', '2022-12-04 07:19:40'),
(23, '18', '2038', 2, '1000.00', '2022-12-04 07:19:41'),
(24, '18', '2008', 3, '700.00', '2022-12-04 07:19:42'),
(25, '19', '2008', 10, '700.00', '2022-12-04 09:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `user_id` varchar(15) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` varchar(200) NOT NULL,
  `user_review` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`user_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
('', 'dsadsad', '3', 'dsadsads', '0000-00-00 00:00:00'),
('', 'Fernando', '2', 'SASADA', '2022-11-28 03:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `tag_name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` varchar(15) NOT NULL,
  `selling_price` varchar(15) NOT NULL,
  `image` varchar(200) NOT NULL,
  `qty` int(15) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `topsales` tinyint(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `category_id`, `name`, `tag_name`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `topsales`, `created_at`) VALUES
(2001, 1006, 'Urban Revivo', 'Urban Revivo', '- Solid tone crocodile textured mini crossbody bag\r\n- Polyurethane\r\n- 1 main clasp compartment-\r\n- Adjustable and detachable strap\r\n- Lined interior', '400.00', '500.00', '1668826517.png', 45, 1, 0, '2022-11-19 02:55:17'),
(2002, 1002, 'Charlotte Dress', 'Charlotte Dress', 'Crafted in matte organdy, the Charlotte is perfect for those who wish to embody a non-traditional look paired with low heels and a short veil.', '250.00', '450.00', '1668827098.jpg', 50, 0, 0, '2022-11-19 03:04:58'),
(2008, 1001, 'Blazers', 'Blazers ', 'A blazer is a type of jacket resembling a suit jacket, but cut more casually. A blazer is generally distinguished from a sport coat as a more formal garment and tailored from solid colour fabrics.', '500.00', '700.00', '1670060866.png', 36, 0, 0, '2022-11-23 06:28:43'),
(2009, 1008, 'Corduroy Trousers', 'Corduroy Trousers', 'This stripey fabric also does an excellent job of adding a touch of personality to more formal attire. A slim-cut corduroy suit will make an excellent companion for a light-gauge roll neck and monk-strap shoes come party season. Swerve the shirt and tie, though â€“ Doctor Who has rendered that combo unwearable everywhere outside of Comic Con.', '600.00', '500.00', '1669515444.png', 46, 0, 1, '2022-11-27 02:17:24'),
(2010, 1006, 'Tory Burch', 'Tory Burch', 'Tory Burch is an American fashion designer, businesswoman and philanthropist.\r\n\r\nShe is the Executive Chairman and Chief Creative Officer of her own brand.Tory Burch bag McGraw - Gold Hardware, Beige Lining, Beige Exterior', '2000.00', '3000.00', '1669516588.jpg', 15, 0, 1, '2022-11-27 02:36:28'),
(2011, 1002, 'Bohemian Beach ', 'Bohemian Beach', 'This Bohemian beach dress was designed to be your go-to summer dress because it will keep you cozy and stylish all day long. It is loose enough to be comfortable without seeming baggy, and it is snug enough to be captivating.\r\n\r\nThis dress comes with a belt tie that fastens in the front which gives you look taller and slimmer look. The carefree and effortless ensemble exudes a cool vibe, perfect for summer, and the Bohemian style will give you the feeling of a nomadic spirit.\r\n\r\nThe high slit skirt will make your legs looks teasingly attractive and give your legs a sense of freedom. The hidden side zipper will give you a snug and secure fit and the ankle skirt will add a dash of fashion to your rotation. The natural waistline is super flattering and the short sleeves will make this dress a comfortable choice for your spring and summer wardrobe.', '300.00', '400.00', '1669517445.png', 29, 0, 1, '2022-11-27 02:50:45'),
(2012, 1002, 'Floral Dress', 'Floral Dress', 'Floral dresses are symbol of elegance, sophistication and femininity. Floral dresses are appropriate for every season even if they always symbolize the spring, the bloom, the blossoming, the develop, a good and full of beauty growth. They indicate carefreeness and cheerfulness (or at least the hope and the desire to feel that way).', '250.00', '350.00', '1669536196.png', 10, 0, 0, '2022-11-27 08:03:16'),
(2015, 1002, 'Fashion Blazer Dress', 'Fashion Blazer Dress', 'The hybrid style borrows its shape from classic outerwear and is the type of staple that fits the needs of do-it-all women. ', '600.00', '450.00', '1670060248.png', 20, 0, 1, '2022-12-03 09:37:28'),
(2016, 1001, 'Camel Wool Cashmere', 'Camel Wool Cashmere', 'Made from a luxurious wool-cashmere blend, our single-breasted topcoat is a classic for any gentleman. Style features include a 3-roll-2 button closure, notch lapels, and hand-warmer pockets for practicality', '1200.00', '1500.00', '1670061272.png', 10, 0, 1, '2022-12-03 09:54:32'),
(2017, 1001, 'Balmacaan', 'Balmacaan', 'The balmacaan is shorter and lighter than an overcoat. They can be dressed up or down to fit your occasion; some come with zip-out liners that make them suitable for all-season wear.', '300.00', '500.00', '1670063245.png', 20, 0, 0, '2022-12-03 10:27:25'),
(2018, 1001, 'Trench Coat', 'Trench Coat', 'Originally developed for Army officers during World War I, the trench coat gets its name from its use in trench warfare. Theyâ€™re characterized by heavy-duty waterproof construction, wide lapels, double breasted fastening with up to 10 buttons, and a waist belt.', '1500.00', '2000.00', '1670067265.png', 30, 0, 1, '2022-12-03 11:34:25'),
(2019, 1001, 'Spier & Mackay Sport ', 'Spier & Mackay Sport ', 'Sport coats come in a wide variety of materials, patterns, and colors and are meant to be worn without matching pants', '800.00', '1000.00', '1670069740.png', 15, 0, 0, '2022-12-03 12:15:40'),
(2020, 1001, 'Peacoat', 'Peacoat', 'Originally worn by European and American navy crewmen, the peacoat is a dedicated outer layer thatâ€™s made of warm and heavy wool. Theyâ€™re shorter than many other overcoats, with double-breasted design, broad lapels, and large buttons.', '1500.00', '2000.00', '1670071282.png', 13, 0, 0, '2022-12-03 12:41:22'),
(2021, 1001, 'Chesterfield Coat', 'Chesterfield Coat', 'The high-quality cashmere-blended fabric combines warmth and style. Every inch is carefully designed, from the fabric, to the fit, to the functionality.', '1000.00', '1500.00', '1670071395.png', 15, 0, 0, '2022-12-03 12:43:15'),
(2022, 1001, 'Car Coat', 'Car Coat', 'From the early era of automobile adoption comes the car coat. This coat is made for maximum warmth and cut to a length thatâ€™s perfect for sitting in your car', '800.00', '1200.00', '1670071554.png', 12, 0, 0, '2022-12-03 12:45:54'),
(2023, 1001, 'Loaden Coat', 'Loaden Coat', 'The quintessential Alpine Loden Overcoat. The \"Tirol\" was designed to help Austrian men comfortably get through the harsh winter while looking respectable at the same time.', '1000.00', '1300.00', '1670071708.png', 15, 0, 0, '2022-12-03 12:48:28'),
(2024, 1001, 'Sherling Coat', 'Sherling Coat', 'The quintessential Alpine Loden Overcoat. The \"Tirol\" was designed to help Austrian men comfortably get through the harsh winter while looking respectable at the same time.', '1000.00', '1400.00', '1670071836.png', 15, 0, 0, '2022-12-03 12:50:36'),
(2025, 1002, 'Coulette Dress', 'Coulette Dress', 'Evening culotte dress of black chiffon velvet with black sequin embroidery on shoulders and pocket flap. It has a narrow peter pan collar, long sleeves and deep shoulder pads and is cut to form loose trousers (the gusset open) with a skirt panel at the rear. There is a large plastic zip from neck to crotch. On the left hip there is a large pocket with an embroidered flap.', '800.00', '1200.00', '1670073940.png', 10, 0, 1, '2022-12-03 13:25:40'),
(2027, 1002, 'Midi Dress', 'Midi Dress', 'The mini dress which falls between a maxi and mini, is what everyone needs for situations where you are not sure of the level of formality of the event.  ', '150.00', '250', '1670074295.png', 15, 0, 0, '2022-12-03 13:31:35'),
(2028, 1002, 'A Line Dress ', 'A Line Dress ', 'An \"A\" form is created by an A-line dress, which is fitted at the hips and progressively widens out toward the hem. It is ideal for a casual situation and is simple to dress up or down. This look works best on pear-shaped bodies since it highlights your wonderful shoulders and gives your bottom half a feminine touch.', '100.00', '200.00', '1670075035.png', 20, 0, 0, '2022-12-03 13:43:55'),
(2029, 1002, 'Bodycon Dress', 'Bodycon Dress', 'A bodycon dress is form-hugging and draws attention to your best features. They are ideal for a night out on the town and are frequently constructed of flexible material. This outfit is perfect for people with an hourglass physique because it accentuates the lovely curves!', '100.00', '150.00', '1670075170.png', 20, 0, 0, '2022-12-03 13:46:10'),
(2030, 1002, 'Maxi Dress', 'Maxi Dress', 'In the easy maxi dress, unwind at the beach or by the pool all day. Although the cloth hits the floor (or at least your ankles) in this style, which is ideally suited for a more informal environment, it gives the impression that you are dressed up. Everyone would enviously wish they were as fashionable and comfortable as you are if you combine sandals and long-hanging jewelry to create the ideal lazy ensemble!', '300.00', '400.00', '1670075519.png', 18, 0, 0, '2022-12-03 13:51:59'),
(2031, 1002, 'Wrap Dress ', 'Wrap Dress ', 'In the easy maxi dress, unwind at the beach or by the pool all day. Although the cloth hits the floor (or at least your ankles) in this style, which is ideally suited for a more informal environment, it gives the impression that you are dressed up. Everyone would enviously wish they were as fashionable and comfortable as you are if you combine sandals and long-hanging jewelry to create the ideal lazy ensemble!', '300.00', '400.00', '1670075699.png', 15, 0, 0, '2022-12-03 13:54:59'),
(2032, 1006, 'Carson Convertible ', 'Carson Convertible', 'A recent hit amongst Instagram influencers, the belt bag has been one of the most trending pieces of the season. ', '400.00', '600.00', '1670076943.png', 15, 0, 0, '2022-12-03 14:15:43'),
(2033, 1006, 'Polo Ralph Lauren', 'Polo Ralph Lauren', 'Crafted from rugged canvas, this medium-size tote features the iconic Polo Bear, stylishly dressed in a ski-inspired sweater, color-blocked jacket, and shades.\r\nTwo webbed top handles secured with metal rivets, each with a 9\" drop.\r\nTop zip closure with a leather zipper pull.', '500.00', '900.00', '1670077240.png', 10, 0, 0, '2022-12-03 14:20:40'),
(2034, 1006, 'Fleece Belt Bag', 'Fleece Belt Bag', 'Featuring a Polo jacquard webbed belt, the sporty belt bag is updated for the season with a high-pile fleece fabrication and leather trim. An iconic hands-free accessory, itâ€™s finished with our signature embroidered Pony at the front.\r\nZip front.', '400.00', '800.00', '1670077439.png', 10, 0, 0, '2022-12-03 14:23:59'),
(2037, 1003, 'Marks Spencer', 'Marks Spencer', 'Crafted from pure cotton, these beach shorts belong on your sunny getaway packing list. Regular fit, with a comfy, elasticated waist. With two side pockets for your holiday essentials. We only ever use responsibly sourced cotton for our clothes.', '400.00', '700.00', '1670078032.png', 15, 0, 0, '2022-12-03 14:33:52'),
(2038, 1003, 'Denim Shorts', 'Denim Shorts', 'These pure cotton denim shorts will make a versatile addition to your casual wardrobe. Cut to a comfy regular fit with an elasticated waist. Finished with two handy side pockets and two buttoned back pockets. We only ever use responsibly sourced cotton for our clothes.', '500.00', '1000.00', '1670078524.png', 11, 0, 0, '2022-12-03 14:42:04'),
(2039, 1003, 'Calvin Klein', 'Calvin KleinCalvin Klein', 'Simple elastic waist design, fit is not tight. Simple hand pockets on both sides, casual and generous. Silver embroidered LOGO, fashionable and eye-catching. Double-needle overstitching and smoothing of the sewing line, showing high-quality workmanship. Comfortable blend fabric, skin-friendly and breathable.', '500.00', '800.00', '1670078826.png', 15, 0, 0, '2022-12-03 14:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(26, 'admin ', 'admin@gmail.com', '09198002123', 'e66055e8e308770492a44bf16e875127', 1, '2022-10-19 07:31:39'),
(27, 'Fernando Bingga', 'fernandobingga10@gmail.com', '09457529218', '081048ffd54e8dabb5644ed19027c819', 0, '2022-10-19 07:32:15'),
(28, 'fernando', 'fernandobingga17@gmail.com', '09198002123', 'd0e4b0c2f37e1178c1821d99de25010c', 0, '2022-10-21 07:29:09'),
(30, 'sadasdas', 'don@gmail.com', '0929323', '73015b80f3210271d072499488ef2045', 0, '2022-11-11 14:49:39'),
(32, 'Kevin Durant', 'kevindurant@gmail.com', '09198002123', '0e87f108852b47cff817d62ae15761e1', 0, '2022-11-28 03:38:51'),
(33, 'Jeorge Allen Balmes', 'jeorgeallen@gmail.com', '09198002123', 'ca4f836be2513d2eeda6a4f74fa47ead', 0, '2022-11-30 10:55:38'),
(34, 'dwight', 'dwight@gmail.com', '09457529218', 'ab34c5fd45ea77f66d86484095158d13', 0, '2022-12-04 07:08:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2041;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
