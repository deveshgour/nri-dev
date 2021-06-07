-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2021 at 11:09 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nriarena_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `status`, `create_date`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '2021-05-11 01:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `ask_me`
--

CREATE TABLE `ask_me` (
  `ask_id` int(11) NOT NULL,
  `your_name` text NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ask_me`
--

INSERT INTO `ask_me` (`ask_id`, `your_name`, `mobile_number`, `email_id`, `create_date`) VALUES
(1, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(2, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(3, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(4, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(5, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(6, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(7, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(8, 'swati', '4234234', 'swati.it03@gmail.com', '0000-00-00 00:00:00'),
(9, 'dwe', '45343434', 'sdfsdf@rgg.hth', '2021-05-29 06:13:21'),
(10, 'swati', '45343434', 'swati.it03@gmail.com', '2021-05-29 06:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `buzz`
--

CREATE TABLE `buzz` (
  `buzz_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buzz`
--

INSERT INTO `buzz` (`buzz_id`, `title`, `image`, `description`, `status`, `create_date`) VALUES
(3, 'Marwadi food', '8a0b0e473aad072e10a9593a9dbe943a.jpg', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', '2021-05-19 13:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `comment`, `status`, `create_date`) VALUES
(1, 36, 6, 'hello', '', '2021-05-10 04:42:54'),
(5, 36, 9, 'sd', '', '2021-05-10 06:25:00'),
(6, 36, 10, 'dfwewewe', '', '2021-05-10 06:26:29'),
(8, 36, 4, 'new comment', '', '2021-05-14 11:07:42'),
(9, 36, 4, 'sadas', '', '2021-05-14 11:07:54'),
(13, 36, 13, 'ganesha picture', '', '2021-05-19 03:25:40'),
(15, 36, 13, 'shri ganesh', '', '2021-05-19 03:26:12'),
(16, 40, 13, 'test', '', '2021-05-19 11:21:11'),
(23, 40, 17, 'test', '', '2021-05-21 11:12:56'),
(24, 40, 17, 'test', '', '2021-05-21 11:13:54'),
(25, 40, 16, 'test', '', '2021-05-21 11:24:39'),
(26, 40, 16, 'test', '', '2021-05-24 12:18:11'),
(27, 36, 4, 'erfwewe', '', '2021-05-25 04:19:36'),
(28, 36, 2, 'ewewe', '', '2021-05-25 04:28:09'),
(29, 40, 16, 'test', '', '2021-05-25 11:15:09'),
(30, 40, 14, 'test', '', '2021-05-25 11:16:29'),
(31, 36, 13, 'NEW COMMENT replyu', '', '2021-05-26 15:25:32'),
(32, 40, 16, 'test', '', '2021-05-28 11:13:35'),
(33, 40, 26, 'test', '', '2021-05-28 11:19:20'),
(35, 40, 5, 'test', '', '2021-05-28 11:28:07'),
(36, 40, 27, 'test', '', '2021-05-28 11:36:48'),
(37, 40, 27, 'test', '', '2021-05-29 11:53:56'),
(38, 40, 27, 'test', '', '2021-05-29 11:54:06'),
(39, 36, 13, 'hello new', '', '2021-05-29 14:17:56'),
(40, 36, 13, 'new comment like', '', '2021-05-29 14:20:20'),
(41, 36, 4, 'ewewe', '', '2021-05-29 14:35:01'),
(42, 40, 4, 'reena new comment', '', '2021-05-29 15:34:15'),
(43, 10, 4, 'hii', '', '2021-05-29 16:11:37'),
(47, 36, 13, 'test', '', '2021-05-30 06:06:46'),
(48, 40, 27, 'test 1233', '', '2021-06-01 11:18:15'),
(49, 40, 16, '---', '', '2021-06-01 13:09:59'),
(50, 36, 12, 'new asdeqw', '', '2021-06-01 15:48:30'),
(52, 36, 12, 'jio', '', '2021-06-01 15:49:16'),
(53, 36, 12, 'jio', '', '2021-06-01 15:51:24'),
(54, 36, 12, 'dfwewewe', '', '2021-06-02 15:35:18'),
(55, 40, 28, 'I am fine', '', '2021-06-05 10:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment_buzz`
--

CREATE TABLE `comment_buzz` (
  `comment_buzz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `buzz_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_buzz`
--

INSERT INTO `comment_buzz` (`comment_buzz_id`, `user_id`, `comment`, `buzz_id`, `create_date`) VALUES
(1, 41, 'test buzz', 2, '2021-05-25 20:59:59'),
(3, 41, 'test buzz 2', 2, '2021-05-25 21:00:46'),
(4, 41, 'test buzz 3', 2, '2021-05-25 21:00:54'),
(5, 41, 'test buzz 4', 2, '2021-05-25 21:01:03'),
(7, 36, 'test buzz', 3, '2021-05-25 14:25:04'),
(8, 36, 'test buzz 2', 3, '2021-05-25 14:25:09'),
(9, 36, 'test buzz 3', 3, '2021-05-25 14:25:21'),
(11, 40, 'Yummy', 3, '2021-06-05 11:04:38'),
(12, 40, '', 3, '2021-06-05 11:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `comment_buzz_like`
--

CREATE TABLE `comment_buzz_like` (
  `comment_buzz_like_id` int(11) NOT NULL,
  `buzz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_buzz_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_buzz_like`
--

INSERT INTO `comment_buzz_like` (`comment_buzz_like_id`, `buzz_id`, `user_id`, `comment_buzz_id`, `status`) VALUES
(6, 3, 41, 8, 1),
(7, 0, 41, 16, 1),
(9, 3, 40, 7, 1),
(10, 0, 40, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_event`
--

CREATE TABLE `comment_event` (
  `comment_event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `event_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_event`
--

INSERT INTO `comment_event` (`comment_event_id`, `user_id`, `comment`, `event_id`, `create_date`) VALUES
(2, 41, 'wrre', 10, '2021-05-22 16:01:03'),
(3, 41, 'xcsdsd', 10, '2021-05-22 16:01:06'),
(4, 41, 'dssdf', 10, '2021-05-22 16:01:08'),
(5, 40, 'test', 14, '2021-05-24 12:21:30'),
(7, 36, 'new', 13, '2021-06-01 14:03:44'),
(8, 36, 'sdfs', 13, '2021-06-01 14:04:00'),
(9, 36, 'dfdfd tree', 13, '2021-06-01 14:04:18'),
(10, 36, 'ss', 13, '2021-06-01 14:32:43'),
(17, 36, 'hhhhhh', 12, '2021-06-01 15:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `comment_event_like`
--

CREATE TABLE `comment_event_like` (
  `comment_like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_event_like`
--

INSERT INTO `comment_event_like` (`comment_like_id`, `user_id`, `post_id`, `comment_id`, `status`) VALUES
(1, 36, 13, 9, 1),
(2, 36, 12, 17, 1),
(3, 36, 0, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_gov`
--

CREATE TABLE `comment_gov` (
  `comment_gov_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `gov_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_like`
--

CREATE TABLE `comment_like` (
  `comment_like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_like`
--

INSERT INTO `comment_like` (`comment_like_id`, `user_id`, `post_id`, `comment_id`, `status`) VALUES
(2, 43, 59, 133, 1),
(29, 36, 27, 38, 1),
(31, 36, 13, 13, 1),
(32, 40, 4, 42, 1),
(33, 36, 12, 44, 1),
(38, 36, 0, 7, 1),
(40, 40, 27, 37, 1),
(41, 36, 4, 43, 1),
(43, 40, 28, 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_major`
--

CREATE TABLE `comment_major` (
  `comment_major_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_major`
--

INSERT INTO `comment_major` (`comment_major_id`, `user_id`, `major_id`, `comment`, `create_date`) VALUES
(1, 41, 2, 'dfwewewe', '2021-05-19 23:05:27'),
(2, 41, 2, 'sadas', '2021-05-19 23:05:30'),
(3, 41, 2, 'qwewqqwqwqw', '2021-05-19 23:05:34'),
(4, 41, 2, 'wqdcca', '2021-05-19 23:05:38'),
(7, 36, 7, 'test2', '2021-05-20 04:19:56'),
(8, 36, 7, 'test3t', '2021-05-20 04:20:02'),
(9, 36, 7, 'test4', '2021-05-20 04:20:07'),
(10, 36, 7, 'ss gg', '2021-05-20 04:20:15'),
(11, 36, 10, 'new post', '2021-06-01 06:02:05'),
(16, 36, 9, 'dhokla', '2021-06-02 05:20:39'),
(17, 36, 9, 'hello', '2021-06-02 05:20:44'),
(18, 36, 9, 'samosa', '2021-06-02 05:43:29'),
(19, 36, 9, 'idli', '2021-06-02 05:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `comment_major_like`
--

CREATE TABLE `comment_major_like` (
  `comment_like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_major_like`
--

INSERT INTO `comment_major_like` (`comment_like_id`, `user_id`, `post_id`, `comment_id`, `status`) VALUES
(5, 41, 6, 7, 1),
(6, 41, 6, 6, 1),
(7, 41, 0, 10, 1),
(8, 36, 10, 11, 1),
(10, 36, 7, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_root`
--

CREATE TABLE `comment_root` (
  `comment_root_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `root_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_root`
--

INSERT INTO `comment_root` (`comment_root_id`, `user_id`, `root_id`, `detail_id`, `comment`, `create_date`) VALUES
(7, 36, 2, 1, 'i love punjabi food', '2021-05-31 05:07:13'),
(8, 36, 2, 6, 'first comment', '2021-05-31 07:03:22'),
(11, 36, 3, 12, 'dfdfd', '2021-05-31 14:03:32'),
(12, 36, 3, 12, 'new', '2021-06-01 06:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `comment_root_like`
--

CREATE TABLE `comment_root_like` (
  `comment_root_like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_root_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_root_like`
--

INSERT INTO `comment_root_like` (`comment_root_like_id`, `user_id`, `post_id`, `comment_root_id`, `status`) VALUES
(1, 36, 0, 8, 1),
(3, 36, 0, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_visit`
--

CREATE TABLE `comment_visit` (
  `comment_visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_visit`
--

INSERT INTO `comment_visit` (`comment_visit_id`, `user_id`, `visit_id`, `comment`, `create_date`) VALUES
(5, 36, 8, 'ewewe', '2021-05-20 06:25:42'),
(6, 36, 8, 'awedqweqw', '2021-05-20 06:25:46'),
(7, 36, 8, 'wererer', '2021-05-20 06:25:49'),
(14, 36, 11, 'wedew', '2021-05-26 05:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `comment_visit_like`
--

CREATE TABLE `comment_visit_like` (
  `comment_visit_like_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_visit_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_visit_like`
--

INSERT INTO `comment_visit_like` (`comment_visit_like_id`, `visit_id`, `user_id`, `comment_visit_id`, `status`) VALUES
(2, 7, 41, 6, 1),
(4, 7, 41, 8, 1),
(5, 7, 41, 9, 1),
(6, 2, 41, 11, 1),
(7, 12, 36, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `connect_to_root`
--

CREATE TABLE `connect_to_root` (
  `root_id` int(11) NOT NULL,
  `connect_root` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connect_to_root`
--

INSERT INTO `connect_to_root` (`root_id`, `connect_root`, `status`, `create_date`) VALUES
(2, 'Food', '1', '2021-05-12 14:17:50'),
(3, 'Festivals', '1', '2021-05-12 14:18:25'),
(4, 'Dress', '1', '2021-05-12 14:19:16'),
(5, 'Places', '1', '2021-05-12 14:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `sortname`, `name`, `slug`, `image`, `phonecode`, `status`) VALUES
(1, 'AF', 'Afghanistan', '', '', 93, 0),
(2, 'AL', 'Albania', '', '', 355, 0),
(3, 'DZ', 'Algeria', '', '', 213, 0),
(4, 'AS', 'American Samoa', '', '', 1684, 0),
(5, 'AD', 'Andorra', '', '', 376, 0),
(6, 'AO', 'Angola', '', '', 244, 0),
(7, 'AI', 'Anguilla', '', '', 1264, 0),
(8, 'AQ', 'Antarctica', '', '', 0, 0),
(9, 'AG', 'Antigua And Barbuda', '', '', 1268, 0),
(10, 'AR', 'Argentina', '', '', 54, 0),
(11, 'AM', 'Armenia', '', '', 374, 0),
(12, 'AW', 'Aruba', '', '', 297, 0),
(13, 'AU', 'Australia', 'australia', 'australia.jpg', 61, 1),
(14, 'AT', 'Austria', '', '', 43, 0),
(15, 'AZ', 'Azerbaijan', '', '', 994, 0),
(16, 'BS', 'Bahamas The', '', '', 1242, 0),
(17, 'BH', 'Bahrain', '', '', 973, 0),
(18, 'BD', 'Bangladesh', '', '', 880, 0),
(19, 'BB', 'Barbados', '', '', 1246, 0),
(20, 'BY', 'Belarus', '', '', 375, 0),
(21, 'BE', 'Belgium', '', '', 32, 0),
(22, 'BZ', 'Belize', '', '', 501, 0),
(23, 'BJ', 'Benin', '', '', 229, 0),
(24, 'BM', 'Bermuda', '', '', 1441, 0),
(25, 'BT', 'Bhutan', '', '', 975, 0),
(26, 'BO', 'Bolivia', '', '', 591, 0),
(27, 'BA', 'Bosnia and Herzegovina', '', '', 387, 0),
(28, 'BW', 'Botswana', '', '', 267, 0),
(29, 'BV', 'Bouvet Island', '', '', 0, 0),
(30, 'BR', 'Brazil', '', '', 55, 0),
(31, 'IO', 'British Indian Ocean Territory', '', '', 246, 0),
(32, 'BN', 'Brunei', '', '', 673, 0),
(33, 'BG', 'Bulgaria', '', '', 359, 0),
(34, 'BF', 'Burkina Faso', '', '', 226, 0),
(35, 'BI', 'Burundi', '', '', 257, 0),
(36, 'KH', 'Cambodia', '', '', 855, 0),
(37, 'CM', 'Cameroon', '', '', 237, 0),
(38, 'CA', 'Canada', 'canada', 'canada.jpg', 1, 1),
(39, 'CV', 'Cape Verde', '', '', 238, 0),
(40, 'KY', 'Cayman Islands', '', '', 1345, 0),
(41, 'CF', 'Central African Republic', '', '', 236, 0),
(42, 'TD', 'Chad', '', '', 235, 0),
(43, 'CL', 'Chile', '', '', 56, 0),
(44, 'CN', 'China', '', '', 86, 0),
(45, 'CX', 'Christmas Island', '', '', 61, 0),
(46, 'CC', 'Cocos (Keeling) Islands', '', '', 672, 0),
(47, 'CO', 'Colombia', '', '', 57, 0),
(48, 'KM', 'Comoros', '', '', 269, 0),
(49, 'CG', 'Republic Of The Congo', '', '', 242, 0),
(50, 'CD', 'Democratic Republic Of The Congo', '', '', 242, 0),
(51, 'CK', 'Cook Islands', '', '', 682, 0),
(52, 'CR', 'Costa Rica', '', '', 506, 0),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', '', '', 225, 0),
(54, 'HR', 'Croatia (Hrvatska)', '', '', 385, 0),
(55, 'CU', 'Cuba', '', '', 53, 0),
(56, 'CY', 'Cyprus', '', '', 357, 0),
(57, 'CZ', 'Czech Republic', '', '', 420, 0),
(58, 'DK', 'Denmark', '', '', 45, 0),
(59, 'DJ', 'Djibouti', '', '', 253, 0),
(60, 'DM', 'Dominica', '', '', 1767, 0),
(61, 'DO', 'Dominican Republic', '', '', 1809, 0),
(62, 'TP', 'East Timor', '', '', 670, 0),
(63, 'EC', 'Ecuador', '', '', 593, 0),
(64, 'EG', 'Egypt', '', '', 20, 0),
(65, 'SV', 'El Salvador', '', '', 503, 0),
(66, 'GQ', 'Equatorial Guinea', '', '', 240, 0),
(67, 'ER', 'Eritrea', '', '', 291, 0),
(68, 'EE', 'Estonia', '', '', 372, 0),
(69, 'ET', 'Ethiopia', '', '', 251, 0),
(70, 'XA', 'External Territories of Australia', '', '', 61, 0),
(71, 'FK', 'Falkland Islands', '', '', 500, 0),
(72, 'FO', 'Faroe Islands', '', '', 298, 0),
(73, 'FJ', 'Fiji Islands', '', '', 679, 0),
(74, 'FI', 'Finland', '', '', 358, 0),
(75, 'FR', 'France', 'france', 'france.jpg', 33, 1),
(76, 'GF', 'French Guiana', '', '', 594, 0),
(77, 'PF', 'French Polynesia', '', '', 689, 0),
(78, 'TF', 'French Southern Territories', '', '', 0, 0),
(79, 'GA', 'Gabon', '', '', 241, 0),
(80, 'GM', 'Gambia The', '', '', 220, 0),
(81, 'GE', 'Georgia', '', '', 995, 0),
(82, 'DE', 'Germany', '', '', 49, 0),
(83, 'GH', 'Ghana', '', '', 233, 0),
(84, 'GI', 'Gibraltar', '', '', 350, 0),
(85, 'GR', 'Greece', '', '', 30, 0),
(86, 'GL', 'Greenland', '', '', 299, 0),
(87, 'GD', 'Grenada', '', '', 1473, 0),
(88, 'GP', 'Guadeloupe', '', '', 590, 0),
(89, 'GU', 'Guam', '', '', 1671, 0),
(90, 'GT', 'Guatemala', '', '', 502, 0),
(91, 'XU', 'Guernsey and Alderney', '', '', 44, 0),
(92, 'GN', 'Guinea', '', '', 224, 0),
(93, 'GW', 'Guinea-Bissau', '', '', 245, 0),
(94, 'GY', 'Guyana', '', '', 592, 0),
(95, 'HT', 'Haiti', '', '', 509, 0),
(96, 'HM', 'Heard and McDonald Islands', '', '', 0, 0),
(97, 'HN', 'Honduras', '', '', 504, 0),
(98, 'HK', 'Hong Kong S.A.R.', '', '', 852, 0),
(99, 'HU', 'Hungary', '', '', 36, 0),
(100, 'IS', 'Iceland', '', '', 354, 0),
(101, 'IN', 'India', '', '', 91, 0),
(102, 'ID', 'Indonesia', '', '', 62, 0),
(103, 'IR', 'Iran', '', '', 98, 0),
(104, 'IQ', 'Iraq', '', '', 964, 0),
(105, 'IE', 'Ireland', '', '', 353, 0),
(107, 'IT', 'Italy', 'italy', 'italy.jfif', 39, 1),
(108, 'JM', 'Jamaica', '', '', 1876, 0),
(109, 'JP', 'Japan', '', '', 81, 0),
(110, 'XJ', 'Jersey', '', '', 44, 0),
(111, 'JO', 'Jordan', '', '', 962, 0),
(112, 'KZ', 'Kazakhstan', '', '', 7, 0),
(113, 'KE', 'Kenya', '', '', 254, 0),
(114, 'KI', 'Kiribati', '', '', 686, 0),
(115, 'KP', 'Korea North', '', '', 850, 0),
(116, 'KR', 'Korea South', '', '', 82, 0),
(117, 'KW', 'Kuwait', '', '', 965, 0),
(118, 'KG', 'Kyrgyzstan', '', '', 996, 0),
(119, 'LA', 'Laos', '', '', 856, 0),
(120, 'LV', 'Latvia', '', '', 371, 0),
(121, 'LB', 'Lebanon', '', '', 961, 0),
(122, 'LS', 'Lesotho', '', '', 266, 0),
(123, 'LR', 'Liberia', '', '', 231, 0),
(124, 'LY', 'Libya', '', '', 218, 0),
(125, 'LI', 'Liechtenstein', '', '', 423, 0),
(126, 'LT', 'Lithuania', '', '', 370, 0),
(127, 'LU', 'Luxembourg', '', '', 352, 0),
(128, 'MO', 'Macau S.A.R.', '', '', 853, 0),
(129, 'MK', 'Macedonia', '', '', 389, 0),
(130, 'MG', 'Madagascar', '', '', 261, 0),
(131, 'MW', 'Malawi', '', '', 265, 0),
(132, 'MY', 'Malaysia', '', '', 60, 0),
(133, 'MV', 'Maldives', '', '', 960, 0),
(134, 'ML', 'Mali', '', '', 223, 0),
(135, 'MT', 'Malta', '', '', 356, 0),
(136, 'XM', 'Man (Isle of)', '', '', 44, 0),
(137, 'MH', 'Marshall Islands', '', '', 692, 0),
(138, 'MQ', 'Martinique', '', '', 596, 0),
(139, 'MR', 'Mauritania', '', '', 222, 0),
(140, 'MU', 'Mauritius', '', '', 230, 0),
(141, 'YT', 'Mayotte', '', '', 269, 0),
(142, 'MX', 'Mexico', '', '', 52, 0),
(143, 'FM', 'Micronesia', '', '', 691, 0),
(144, 'MD', 'Moldova', '', '', 373, 0),
(145, 'MC', 'Monaco', '', '', 377, 0),
(146, 'MN', 'Mongolia', '', '', 976, 0),
(147, 'MS', 'Montserrat', '', '', 1664, 0),
(148, 'MA', 'Morocco', '', '', 212, 0),
(149, 'MZ', 'Mozambique', '', '', 258, 0),
(150, 'MM', 'Myanmar', '', '', 95, 0),
(151, 'NA', 'Namibia', '', '', 264, 0),
(152, 'NR', 'Nauru', '', '', 674, 0),
(153, 'NP', 'Nepal', '', '', 977, 0),
(154, 'AN', 'Netherlands Antilles', '', '', 599, 0),
(155, 'NL', 'Netherlands The', '', '', 31, 0),
(156, 'NC', 'New Caledonia', '', '', 687, 0),
(157, 'NZ', 'New Zealand', '', '', 64, 0),
(158, 'NI', 'Nicaragua', '', '', 505, 0),
(159, 'NE', 'Niger', '', '', 227, 0),
(160, 'NG', 'Nigeria', '', '', 234, 0),
(161, 'NU', 'Niue', '', '', 683, 0),
(162, 'NF', 'Norfolk Island', '', '', 672, 0),
(163, 'MP', 'Northern Mariana Islands', '', '', 1670, 0),
(164, 'NO', 'Norway', '', '', 47, 0),
(165, 'OM', 'Oman', '', '', 968, 0),
(166, 'PK', 'Pakistan', '', '', 92, 0),
(167, 'PW', 'Palau', '', '', 680, 0),
(168, 'PS', 'Palestinian Territory Occupied', '', '', 970, 0),
(169, 'PA', 'Panama', '', '', 507, 0),
(170, 'PG', 'Papua new Guinea', '', '', 675, 0),
(171, 'PY', 'Paraguay', '', '', 595, 0),
(172, 'PE', 'Peru', '', '', 51, 0),
(173, 'PH', 'Philippines', '', '', 63, 0),
(174, 'PN', 'Pitcairn Island', '', '', 0, 0),
(175, 'PL', 'Poland', '', '', 48, 0),
(176, 'PT', 'Portugal', '', '', 351, 0),
(177, 'PR', 'Puerto Rico', '', '', 1787, 0),
(178, 'QA', 'Qatar', '', '', 974, 0),
(179, 'RE', 'Reunion', '', '', 262, 0),
(180, 'RO', 'Romania', '', '', 40, 0),
(181, 'RU', 'Russia', '', '', 70, 0),
(182, 'RW', 'Rwanda', '', '', 250, 0),
(183, 'SH', 'Saint Helena', '', '', 290, 0),
(184, 'KN', 'Saint Kitts And Nevis', '', '', 1869, 0),
(185, 'LC', 'Saint Lucia', '', '', 1758, 0),
(186, 'PM', 'Saint Pierre and Miquelon', '', '', 508, 0),
(187, 'VC', 'Saint Vincent And The Grenadines', '', '', 1784, 0),
(188, 'WS', 'Samoa', '', '', 684, 0),
(189, 'SM', 'San Marino', '', '', 378, 0),
(190, 'ST', 'Sao Tome and Principe', '', '', 239, 0),
(191, 'SA', 'Saudi Arabia', '', '', 966, 0),
(192, 'SN', 'Senegal', '', '', 221, 0),
(193, 'RS', 'Serbia', '', '', 381, 0),
(194, 'SC', 'Seychelles', '', '', 248, 0),
(195, 'SL', 'Sierra Leone', '', '', 232, 0),
(196, 'SG', 'Singapore', '', '', 65, 0),
(197, 'SK', 'Slovakia', '', '', 421, 0),
(198, 'SI', 'Slovenia', '', '', 386, 0),
(199, 'XG', 'Smaller Territories of the UK', '', '', 44, 0),
(200, 'SB', 'Solomon Islands', '', '', 677, 0),
(201, 'SO', 'Somalia', '', '', 252, 0),
(202, 'ZA', 'South Africa', 'southafrica', 'southafrica.jpg', 27, 1),
(203, 'GS', 'South Georgia', '', '', 0, 0),
(204, 'SS', 'South Sudan', '', '', 211, 0),
(205, 'ES', 'Spain', 'spain', 'spain.jpg', 34, 1),
(206, 'LK', 'Sri Lanka', '', '', 94, 0),
(207, 'SD', 'Sudan', '', '', 249, 0),
(208, 'SR', 'Suriname', '', '', 597, 0),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '', '', 47, 0),
(210, 'SZ', 'Swaziland', '', '', 268, 0),
(211, 'SE', 'Sweden', '', '', 46, 0),
(212, 'CH', 'Switzerland', '', '', 41, 0),
(213, 'SY', 'Syria', '', '', 963, 0),
(214, 'TW', 'Taiwan', '', '', 886, 0),
(215, 'TJ', 'Tajikistan', '', '', 992, 0),
(216, 'TZ', 'Tanzania', '', '', 255, 0),
(217, 'TH', 'Thailand', '', '', 66, 0),
(218, 'TG', 'Togo', '', '', 228, 0),
(219, 'TK', 'Tokelau', '', '', 690, 0),
(220, 'TO', 'Tonga', '', '', 676, 0),
(221, 'TT', 'Trinidad And Tobago', '', '', 1868, 0),
(222, 'TN', 'Tunisia', '', '', 216, 0),
(223, 'TR', 'Turkey', '', '', 90, 0),
(224, 'TM', 'Turkmenistan', '', '', 7370, 0),
(225, 'TC', 'Turks And Caicos Islands', '', '', 1649, 0),
(226, 'TV', 'Tuvalu', '', '', 688, 0),
(227, 'UG', 'Uganda', '', '', 256, 0),
(228, 'UA', 'Ukraine', '', '', 380, 0),
(229, 'AE', 'United Arab Emirates', '', '', 971, 0),
(230, 'GB', 'United Kingdom', '', '', 44, 0),
(231, 'US', 'United States', '', '', 1, 0),
(232, 'UM', 'United States Minor Outlying Islands', '', '', 1, 0),
(233, 'UY', 'Uruguay', '', '', 598, 0),
(234, 'UZ', 'Uzbekistan', '', '', 998, 0),
(235, 'VU', 'Vanuatu', '', '', 678, 0),
(236, 'VA', 'Vatican City State (Holy See)', '', '', 39, 0),
(237, 'VE', 'Venezuela', '', '', 58, 0),
(238, 'VN', 'Vietnam', '', '', 84, 0),
(239, 'VG', 'Virgin Islands (British)', '', '', 1284, 0),
(240, 'VI', 'Virgin Islands (US)', '', '', 1340, 0),
(241, 'WF', 'Wallis And Futuna Islands', '', '', 681, 0),
(242, 'EH', 'Western Sahara', '', '', 212, 0),
(243, 'YE', 'Yemen', '', '', 967, 0),
(244, 'YU', 'Yugoslavia', '', '', 38, 0),
(245, 'ZM', 'Zambia', '', '', 260, 0),
(246, 'ZW', 'Zimbabwe', '', '', 263, 0);

-- --------------------------------------------------------

--
-- Table structure for table `create_group`
--

CREATE TABLE `create_group` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_members` text NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_group`
--

INSERT INTO `create_group` (`group_id`, `user_id`, `group_members`, `title`, `image`, `status`, `create_date`) VALUES
(1, 41, '42, 10', 'Family', 'f290bb11eab0d189bf77138c5d777bf5.jpg', 0, '2021-05-27 15:51:28'),
(2, 42, '41', 'Parivaar', '', 0, '2021-05-27 15:51:47'),
(3, 41, '42', 'Friends', '', 0, '2021-05-27 16:01:27'),
(4, 42, '41, 43', 'School', '922a939a7c2a3fef2733bb129b514d9c.jpg', 0, '2021-05-27 16:03:54'),
(5, 36, '40', 'test', '', 0, '2021-05-27 14:08:48'),
(6, 36, '40', 'home test', 'eca48390c3cb7bf1786e32635e758ac7.jpg', 0, '2021-05-27 14:12:38'),
(7, 36, '10, 40', 'major group', '', 0, '2021-05-27 14:28:41'),
(8, 40, '36', 'testreena', 'f1fa4fc6184626cfe8bf49998b1c50e3.jpg', 0, '2021-05-28 11:14:33'),
(9, 36, '10', 'rishigroup', '2c5a5b4cd2cc8546f356de57b17aebb1.jpg', 0, '2021-05-28 11:44:47'),
(10, 40, '36', 'fsdfsdfsdfsd', '583c9e56bf1bf28cc5778c43d920685f.png', 0, '2021-05-29 12:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_path` text NOT NULL,
  `media_type` text NOT NULL,
  `post` text NOT NULL,
  `tag_friends` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `user_id`, `media_path`, `media_type`, `post`, `tag_friends`, `status`, `date_added`) VALUES
(6, 41, '', '', 'tag test', '43, 42', '0', '2021-05-22 13:15:56'),
(7, 41, '', '', 'tag test2', '10', '0', '2021-05-22 13:16:31'),
(8, 41, '', '', 'delete ke liye', '', '0', '2021-05-22 13:49:52'),
(9, 41, 'f9eae6b152c2bc0d94fb40cfdef2c3ec.jpg', 'image', 'marathi sarees look', '43, 42, 10', '0', '2021-05-22 15:37:10'),
(10, 41, '', '', 'sdwed', '43, 10', '0', '2021-05-22 16:00:28'),
(12, 36, '', '', 'tag test', '10', '0', '2021-05-22 08:24:49'),
(13, 36, '48674e10e438817cf02e5958afdad3e1.jpg', 'image', 'The festival of colours is upon us. To celebrate Holi, friends and families come together to have good food and smear colours on each other. ... test', '40, 10', '0', '2021-05-22 08:26:25'),
(14, 40, 'bc8300dfc2eff224f87d3a0a1e1573de.jpg', 'image', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '', '0', '2021-05-24 12:21:03'),
(15, 40, '', '', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '', '0', '2021-05-24 12:21:42'),
(16, 40, 'ab8083814be76b8b3ededdefb14082d6.jpeg', 'image', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '36', '0', '2021-05-24 12:22:13'),
(17, 40, '', '', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '36', '0', '2021-05-25 11:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `fact`
--

CREATE TABLE `fact` (
  `fact_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fact`
--

INSERT INTO `fact` (`fact_id`, `title`, `description`, `image`, `status`, `create_date`) VALUES
(2, 'South Indian thali', 'South Indian thali South Indian thali South Indian thali South Indian thali', 'd7baa9eb173a1217209b8e925b76446e.jpg', 1, '2021-05-20 07:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL,
  `friend_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_status` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friend_id`, `friend_user_id`, `user_id`, `request_status`, `create_at`) VALUES
(2, 10, 36, 1, '2021-05-27 14:20:32'),
(6, 43, 40, 0, '2021-05-27 11:08:12'),
(7, 43, 36, 0, '2021-05-27 14:21:35'),
(8, 40, 36, 0, '2021-05-28 11:48:05'),
(9, 45, 40, 0, '2021-06-05 11:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `groupchat_media`
--

CREATE TABLE `groupchat_media` (
  `chatmedia_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_user_id` text NOT NULL,
  `media` text NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `media_path` text NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `real_video_name` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`chat_id`, `user_id`, `friend_user_id`, `group_id`, `msg`, `media_path`, `media_type`, `real_video_name`, `create_date`) VALUES
(145, 40, 36, 10, 'hii', '', '', '', '2021-06-05 08:26:55'),
(146, 36, 36, 10, 'hello', '', '', '', '2021-06-05 08:27:20'),
(147, 40, 36, 10, 'how r u', '', '', '', '2021-06-05 08:27:41'),
(148, 36, 36, 10, 'what about you', '', '', '', '2021-06-05 08:33:37'),
(149, 40, 36, 10, 'i m house wife', '', '', '', '2021-06-05 08:35:10'),
(150, 36, 36, 10, 'ok', '', '', '', '2021-06-05 08:35:55'),
(151, 40, 36, 10, 'no', '', '', '', '2021-06-05 08:37:06'),
(152, 36, 36, 10, 'hii', '', '', '', '2021-06-05 08:38:34'),
(153, 36, 36, 10, 'g', '', '', '', '2021-06-05 08:40:27'),
(154, 36, 36, 8, 'hii reena', '', '', '', '2021-06-05 11:17:04'),
(155, 40, 36, 8, 'hii swati', '', '', '', '2021-06-05 11:18:36'),
(156, 36, 36, 8, 'how r u', '', '', '', '2021-06-05 11:19:01'),
(157, 36, 36, 8, 'a', '', '', '', '2021-06-05 11:45:01'),
(158, 36, 36, 8, 'b', '', '', '', '2021-06-05 11:45:21'),
(159, 36, 36, 8, 'test', '', '', '', '2021-06-05 11:46:29'),
(160, 36, 36, 8, 'b', '', '', '', '2021-06-05 11:51:34'),
(161, 40, 36, 8, 'c', '', '', '', '2021-06-05 11:51:51'),
(162, 36, 36, 8, 'nice', '', '', '', '2021-06-05 11:54:14'),
(164, 36, 36, 10, 'jai shri ganesha', 'cfec6c4f558e362ac265de2d35982a79.jpg', 'image', 'ganesha_visharjan.jpg', '2021-06-06 16:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `members` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`member_id`, `user_id`, `group_id`, `members`) VALUES
(1, 41, 1, 42),
(2, 41, 1, 10),
(3, 42, 2, 41),
(4, 41, 3, 42),
(5, 42, 4, 41),
(6, 42, 4, 43),
(7, 36, 5, 40),
(8, 36, 6, 40),
(9, 36, 7, 10),
(10, 36, 7, 40),
(11, 40, 8, 36),
(12, 36, 9, 10),
(13, 40, 10, 36);

-- --------------------------------------------------------

--
-- Table structure for table `lets_gov`
--

CREATE TABLE `lets_gov` (
  `gov_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lets_gov`
--

INSERT INTO `lets_gov` (`gov_id`, `title`, `description`, `image`, `url`, `status`, `create_date`) VALUES
(1, 'Ladli laxmi yojna', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\\'t look even slightly believable.', 'aeeea5ba90860c952ad3c19bbefe2ad1.jpg', 'http://ladlilaxmi.mp.gov.in/', '1', '2021-05-30 03:02:58'),
(2, 'Mission COVID Suraksha', 'The government has launched \'Mission Covid Suraksha\' to help accelerate the development of approximately 5-6 vaccine candidates and ensure that these are brought closer to licensure and introduction in the market, the Department of Biotechnology said on Wednesday.', '74c8f5f52236bd9a934e3e7728047902.jpg', 'https://www.mygov.in/covid-19/', '1', '2021-05-30 03:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `post_id`, `user_id`, `status`) VALUES
(11, 10, 36, 1),
(15, 16, 40, 1),
(20, 4, 40, 1),
(22, 14, 40, 1),
(24, 9, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_buzz`
--

CREATE TABLE `like_buzz` (
  `like_buzz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buzz_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_buzz`
--

INSERT INTO `like_buzz` (`like_buzz_id`, `user_id`, `buzz_id`, `status`) VALUES
(4, 41, 2, 1),
(5, 36, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_event`
--

CREATE TABLE `like_event` (
  `like_event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_event`
--

INSERT INTO `like_event` (`like_event_id`, `user_id`, `event_id`, `status`) VALUES
(2, 41, 10, 1),
(4, 36, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_gov`
--

CREATE TABLE `like_gov` (
  `like_gov_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gov_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like_major`
--

CREATE TABLE `like_major` (
  `like_major_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_major`
--

INSERT INTO `like_major` (`like_major_id`, `user_id`, `major_id`, `status`) VALUES
(2, 41, 2, 1),
(5, 36, 10, 1),
(6, 36, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_root`
--

CREATE TABLE `like_root` (
  `like_root_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `root_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_root`
--

INSERT INTO `like_root` (`like_root_id`, `user_id`, `root_id`, `detail_id`, `status`) VALUES
(5, 36, 2, 0, 1),
(6, 36, 1, 0, 1),
(7, 36, 2, 1, 1),
(9, 36, 2, 6, 1),
(10, 36, 3, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_visit`
--

CREATE TABLE `like_visit` (
  `like_visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_visit`
--

INSERT INTO `like_visit` (`like_visit_id`, `user_id`, `visit_id`, `status`) VALUES
(4, 36, 12, 1),
(5, 36, 9, 1),
(6, 36, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `major_missing`
--

CREATE TABLE `major_missing` (
  `major_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_path` varchar(255) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major_missing`
--

INSERT INTO `major_missing` (`major_id`, `user_id`, `media_path`, `media_type`, `post`, `status`, `date_added`) VALUES
(2, 41, '', '', 'delete ke liye', '0', '2021-05-19 22:28:18'),
(3, 41, '86ef958892e678529c0aa7e5dd9a3d1a.jpg', 'image', 'test', '0', '2021-05-19 23:14:56'),
(4, 41, '', '', 'asqwqw', '0', '2021-05-20 11:07:36'),
(5, 41, '', '', 'qwqwwqw', '0', '2021-05-20 11:07:40'),
(6, 41, '', '', 'sdsewew', '0', '2021-05-20 11:59:24'),
(7, 36, '', '', 'delete ke liye', '0', '2021-05-20 04:18:18'),
(8, 36, '', '', 'new test1', '0', '2021-05-20 04:20:36'),
(9, 36, '267f94bf2cbc85e8dfc79b1550f2af8b.jpg', 'image', 'new test2', '0', '2021-05-20 04:20:56'),
(10, 36, '', '', 'new test3 gg', '0', '2021-05-20 04:21:40'),
(11, 40, '', '', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '0', '2021-05-21 11:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `media_path` text COLLATE utf8_unicode_ci NOT NULL,
  `media_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post`, `media_path`, `media_type`, `status`, `date_added`) VALUES
(2, 36, 'one image upload', '8c7dd44949ed71c657d01131f7800330.jpg', 'image', '1', '2021-05-07 05:43:56'),
(3, 36, 'one old video upload', 'dad7992b33eca5c031eecd0bcdd7caf5.mp4', 'video', '1', '2021-05-07 05:44:41'),
(4, 36, '', 'edc24cdffa2a1cdfa40ea710a4c48090.jpg', 'image', '0', '2021-05-07 05:45:07'),
(5, 10, 'rishi testing', '', '', '0', '2021-05-07 06:38:57'),
(12, 36, 'delete ke liye test', '', '', '0', '2021-05-18 12:12:09'),
(13, 36, 'new reg', 'd629db97b26a0ead50a34596aad1d46c.jpg', 'image', '0', '2021-05-18 12:12:42'),
(14, 40, 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '', '', '0', '2021-05-19 11:05:27'),
(16, 40, 'Important Ways to Slow the Spread Wear a mask that covers your nose and mouth to help protect yourself and others. Stay 6 feet apart from others who don’t live with you. Get a COVID-19 vaccine when it is available to you. Avoid crowds and poorly ventilated indoor spaces. Wash your hands often with soap and water. Use hand sanitizer if soap and water aren’t available.', '7739b8c9b59abbfbb7b96b1683eaad82.png', 'image', '0', '2021-05-19 11:07:41'),
(26, 40, 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '', '', '0', '2021-05-27 11:18:44'),
(27, 40, '1212121Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.', '', '', '1', '2021-05-28 11:13:59'),
(28, 40, 'Hi', '', '', '0', '2021-06-05 10:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `recent_visit`
--

CREATE TABLE `recent_visit` (
  `visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_path` text NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent_visit`
--

INSERT INTO `recent_visit` (`visit_id`, `user_id`, `media_path`, `media_type`, `post`, `status`, `date_added`) VALUES
(2, 41, '', '', 'sdfsdfsdfsdfs', '0', '2021-05-20 14:04:08'),
(3, 41, '', '', 'sqwqwqw', '0', '2021-05-20 14:04:14'),
(4, 41, '', '', 'ghgjghj', '0', '2021-05-20 14:04:17'),
(5, 41, '', '', 'uyiuiuiuiui', '0', '2021-05-20 14:04:21'),
(6, 41, '3b1f3c0b77ec782396e24d9de4313d7d.jpg', 'image', '', '0', '2021-05-20 14:04:26'),
(7, 41, '', '', 'iouiyjhyuyuyu', '0', '2021-05-20 14:04:40'),
(8, 36, '', '', 'delete ke liye', '0', '2021-05-20 06:24:14'),
(9, 36, '', '', 'Recent Visit', '0', '2021-05-20 06:26:21'),
(10, 36, 'f280da4101f6ee3bd87d5f9c95293fc7.jpg', 'image', 'Recent Visit2', '0', '2021-05-20 06:27:06'),
(11, 36, '', '', 'wqwqwqwqqw', '0', '2021-05-20 06:27:25'),
(12, 36, '', '', 'new test', '0', '2021-05-20 06:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_buzz`
--

CREATE TABLE `replycomment_buzz` (
  `replybuzz_id` int(11) NOT NULL,
  `comment_buzz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_buzz_user_id` int(11) NOT NULL,
  `reply_comment` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_buzz`
--

INSERT INTO `replycomment_buzz` (`replybuzz_id`, `comment_buzz_id`, `user_id`, `comment_buzz_user_id`, `reply_comment`, `create_date`, `status`) VALUES
(1, 8, 41, 41, 'new reply test', '2021-05-31 23:47:21', 0),
(3, 8, 41, 41, 'new reply', '2021-06-01 00:05:22', 0),
(5, 7, 41, 41, 'sdfsd new', '2021-06-01 00:30:33', 0),
(8, 9, 36, 36, 'new', '2021-06-01 04:41:52', 0),
(9, 9, 36, 36, 'sdfs', '2021-06-01 04:42:21', 0),
(10, 9, 36, 36, 'test', '2021-06-01 04:46:33', 0),
(11, 11, 40, 40, 'Hmm', '2021-06-05 11:04:55', 0),
(12, 11, 40, 40, 'Yes', '2021-06-05 11:05:02', 0),
(13, 11, 40, 40, 'Nice', '2021-06-05 11:05:13', 0),
(14, 11, 40, 40, 'Nice', '2021-06-05 11:05:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_buzz_like`
--

CREATE TABLE `replycomment_buzz_like` (
  `replycomment_buzz_like_id` int(11) NOT NULL,
  `comment_buzz_id` int(11) NOT NULL,
  `replycomment_buzz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_buzz_like`
--

INSERT INTO `replycomment_buzz_like` (`replycomment_buzz_like_id`, `comment_buzz_id`, `replycomment_buzz_id`, `user_id`, `status`) VALUES
(4, 8, 3, 41, 1),
(5, 8, 1, 41, 1),
(6, 9, 8, 36, 1),
(7, 9, 9, 36, 1),
(8, 9, 10, 36, 1),
(9, 7, 5, 36, 1),
(10, 7, 5, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_event`
--

CREATE TABLE `replycomment_event` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `reply_comment` text NOT NULL,
  `create_date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_event`
--

INSERT INTO `replycomment_event` (`reply_id`, `comment_id`, `user_id`, `post_id`, `comment_user_id`, `reply_comment`, `create_date`, `status`) VALUES
(1, 9, 36, 13, 36, 'a', 2021, 0),
(7, 11, 36, 0, 36, 'fse', 2021, 0),
(9, 17, 36, 12, 36, 'iopi', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_event_like`
--

CREATE TABLE `replycomment_event_like` (
  `replycomment_like_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `replycomment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_event_like`
--

INSERT INTO `replycomment_event_like` (`replycomment_like_id`, `comment_id`, `replycomment_id`, `user_id`, `post_id`, `status`) VALUES
(1, 9, 1, 36, 13, 1),
(2, 9, 2, 36, 13, 1),
(3, 11, 7, 36, 0, 1),
(4, 18, 10, 36, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_like`
--

CREATE TABLE `replycomment_like` (
  `replycomment_like_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `replycomment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_like`
--

INSERT INTO `replycomment_like` (`replycomment_like_id`, `comment_id`, `replycomment_id`, `user_id`, `post_id`, `status`) VALUES
(3, 133, 0, 41, 59, 1),
(14, 36, 19, 36, 27, 1),
(20, 47, 23, 36, 0, 1),
(23, 11, 11, 36, 0, 1),
(24, 11, 12, 36, 0, 1),
(25, 9, 8, 36, 0, 1),
(26, 9, 9, 36, 0, 1),
(28, 36, 19, 40, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_major`
--

CREATE TABLE `replycomment_major` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `reply_comment` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_major`
--

INSERT INTO `replycomment_major` (`reply_id`, `comment_id`, `user_id`, `post_id`, `comment_user_id`, `reply_comment`, `create_date`, `status`) VALUES
(2, 7, 41, 6, 41, 'second test', '2021-06-01 15:39:00', 0),
(4, 6, 41, 6, 41, 'werwq', '2021-06-01 15:40:52', 0),
(10, 11, 36, 10, 36, 'reply', '2021-06-01 08:25:16', 0),
(11, 11, 36, 10, 36, 'fsefe', '2021-06-01 08:25:59', 0),
(13, 11, 36, 10, 36, 'new reply', '2021-06-01 11:18:47', 0),
(21, 8, 36, 7, 36, 'gg', '2021-06-02 15:17:14', 0),
(22, 8, 36, 7, 36, 'ds', '2021-06-02 15:18:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_major_like`
--

CREATE TABLE `replycomment_major_like` (
  `replycomment_like_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `replycomment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_major_like`
--

INSERT INTO `replycomment_major_like` (`replycomment_like_id`, `comment_id`, `replycomment_id`, `user_id`, `post_id`, `status`) VALUES
(3, 6, 4, 41, 6, 1),
(4, 7, 2, 41, 6, 1),
(5, 10, 5, 41, 0, 1),
(6, 7, 3, 41, 6, 1),
(7, 11, 8, 36, 10, 1),
(8, 10, 12, 36, 7, 1),
(9, 12, 16, 36, 9, 1),
(13, 8, 22, 36, 7, 1),
(17, 6, 4, 36, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_root`
--

CREATE TABLE `replycomment_root` (
  `replyroot_id` int(11) NOT NULL,
  `comment_root_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_root_user_id` int(11) NOT NULL,
  `reply_comment` text NOT NULL,
  `create_date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_root`
--

INSERT INTO `replycomment_root` (`replyroot_id`, `comment_root_id`, `user_id`, `post_id`, `comment_root_user_id`, `reply_comment`, `create_date`, `status`) VALUES
(1, 0, 36, 0, 36, 'undefined', 2021, 0),
(2, 0, 36, 0, 36, 'undefined', 2021, 0),
(3, 0, 36, 0, 36, 'undefined', 2021, 0),
(4, 0, 36, 0, 36, 'undefined', 2021, 0),
(5, 0, 36, 0, 36, 'undefined', 2021, 0),
(6, 0, 36, 0, 36, 'undefined', 2021, 0),
(8, 8, 36, 0, 36, 'second reply comment', 2021, 0),
(10, 11, 36, 0, 36, 'sdfsef', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_root_like`
--

CREATE TABLE `replycomment_root_like` (
  `replycomment_root_like_id` int(11) NOT NULL,
  `comment_root_id` int(11) NOT NULL,
  `replycomment_root_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_root_like`
--

INSERT INTO `replycomment_root_like` (`replycomment_root_like_id`, `comment_root_id`, `replycomment_root_id`, `user_id`, `post_id`, `status`) VALUES
(1, 8, 7, 36, 0, 1),
(2, 11, 9, 36, 0, 1),
(3, 11, 11, 36, 0, 1),
(4, 11, 12, 36, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_visit`
--

CREATE TABLE `replycomment_visit` (
  `replyvisit_id` int(11) NOT NULL,
  `comment_visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_visit_user_id` int(11) NOT NULL,
  `reply_comment` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_visit`
--

INSERT INTO `replycomment_visit` (`replyvisit_id`, `comment_visit_id`, `user_id`, `comment_visit_user_id`, `reply_comment`, `create_date`, `status`) VALUES
(1, 6, 41, 41, 'test', '2021-06-02 19:03:00', 0),
(4, 6, 41, 41, 'new check', '2021-06-02 19:29:45', 0),
(5, 8, 41, 41, 'reply', '2021-06-02 20:02:16', 0),
(6, 8, 41, 41, 'new comment', '2021-06-02 20:52:24', 0),
(8, 9, 41, 41, 'wsw', '2021-06-02 21:00:33', 0),
(9, 10, 41, 41, 'reply', '2021-06-02 21:01:01', 0),
(10, 11, 41, 41, 'hello nw', '2021-06-02 21:43:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `replycomment_visit_like`
--

CREATE TABLE `replycomment_visit_like` (
  `replycomment_visit_like_id` int(11) NOT NULL,
  `comment_visit_id` int(11) NOT NULL,
  `replycomment_visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replycomment_visit_like`
--

INSERT INTO `replycomment_visit_like` (`replycomment_visit_like_id`, `comment_visit_id`, `replycomment_visit_id`, `user_id`, `status`) VALUES
(3, 6, 1, 41, 1),
(5, 8, 5, 41, 1),
(6, 8, 6, 41, 1),
(8, 11, 10, 41, 1),
(9, 15, 11, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment`
--

CREATE TABLE `reply_comment` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `reply_comment` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply_comment`
--

INSERT INTO `reply_comment` (`reply_id`, `comment_id`, `user_id`, `post_id`, `comment_user_id`, `reply_comment`, `create_date`, `status`) VALUES
(1, 16, 36, 13, 40, 'new REPLY TEST', '2021-05-26 15:19:18', 0),
(2, 16, 36, 13, 40, 'TEST SOMETHING', '2021-05-26 15:19:33', 0),
(3, 11, 36, 0, 36, 'SHRI GANESH', '2021-05-26 15:27:35', 0),
(6, 25, 40, 16, 40, 'ereere', '2021-05-27 11:06:28', 0),
(8, 36, 40, 0, 40, 'reply', '2021-05-28 11:37:09', 0),
(9, 38, 40, 0, 40, '', '2021-05-29 11:54:14', 0),
(10, 16, 36, 0, 40, 'reply', '2021-05-29 14:21:49', 0),
(11, 8, 36, 0, 36, 'test', '2021-05-29 14:34:49', 0),
(12, 42, 40, 0, 40, 'new reply', '2021-05-29 15:35:37', 0),
(13, 31, 36, 13, 36, 'new reply\'s comment', '2021-05-30 03:58:51', 0),
(18, 46, 36, 12, 36, 'hgjhgk', '2021-05-30 06:01:14', 0),
(19, 36, 36, 27, 40, 'hhhhhh', '2021-05-30 06:03:12', 0),
(21, 31, 36, 13, 36, 'dasdasd', '2021-05-30 06:04:33', 0),
(22, 36, 36, 27, 40, 'ttttttttttttttttt', '2021-05-30 06:06:01', 0),
(23, 47, 36, 0, 36, 'brf', '2021-05-30 06:06:55', 0),
(24, 37, 40, 27, 40, '', '2021-06-01 11:03:31', 0),
(25, 37, 40, 0, 40, 'test', '2021-06-01 11:18:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `root_detail`
--

CREATE TABLE `root_detail` (
  `detail_id` int(11) NOT NULL,
  `root_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `root_detail` text NOT NULL,
  `media_path` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `root_detail`
--

INSERT INTO `root_detail` (`detail_id`, `root_id`, `title`, `root_detail`, `media_path`, `status`, `create_date`) VALUES
(1, 2, 'Punjabi food', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '5017efe4605c19c3ae187438ed3ba3ca.jpg', '1', '2021-05-13 13:36:23'),
(5, 2, 'South Indian thali', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', '60cf1f0806c71c2d7ea6403172b0bc46.jpeg', '1', '2021-05-13 20:46:47'),
(6, 2, 'Punjabi thali', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', '7464ee4fb63681f3ba9d5ed3ff5b950f.jpg', '1', '2021-05-13 20:49:29'),
(8, 3, 'Holi', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '081fcc4517d8beca4ed8b3dff4609467.jpg', '1', '2021-05-13 21:16:33'),
(9, 3, 'Ganesh visharjan', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'fc6409d232663eff16a69c3933a78d2e.jpg', '1', '2021-05-13 21:17:59'),
(10, 3, 'Diwali', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '76f1d3413cc75e524acfa3e4fb00ba8b.jpg', '1', '2021-05-13 21:19:29'),
(11, 3, 'Durga puja', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '454c0abeaccdec6f7535bd104c9cc178.jpg', '1', '2021-05-13 21:20:16'),
(12, 3, 'Rakshabandhan', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary', '6ef287e29e7c509d3d9427e72410cf31.jpg', '1', '2021-05-13 21:21:26'),
(13, 3, 'Makar sakranti', ' This the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1e0f6ff43f548518856bc86db7306534.jpg', '1', '2021-05-13 21:22:25'),
(14, 3, 'Krishana janmastmi', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'b0b24cc0b943f3afdc904aef2b69ebff.jpg', '1', '2021-05-13 21:24:44'),
(15, 4, 'South indian dress', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '5b011de1600da534f4b71b309304f1ce.jpg', '1', '2021-05-13 21:28:01'),
(16, 4, 'Punjabi dress', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'aad0b4c25640666e72933d5a35277a5b.jpg', '1', '2021-05-13 21:29:02'),
(17, 4, 'Marathi dress', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'a01c9f235125f22947ada2337af24741.jpg', '1', '2021-05-13 21:30:16'),
(18, 5, 'Tajmahal', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'cc40f97baeb50909e85a07f57364524a.jpg', '1', '2021-05-13 21:32:17'),
(19, 5, 'kanyakumari', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'c74395d987af957e4b8a1d77b6a8d66f.jpg', '1', '2021-05-13 21:34:09'),
(20, 5, 'Shimla', 'The majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '8a1658d3febbded1f6b858709f713138.jpg', '1', '2021-05-13 21:35:38'),
(21, 2, 'Marathi thali', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '674131bfb55b0747c91177e94e17be5b.jpg', '1', '2021-05-13 21:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `smiley_table`
--

CREATE TABLE `smiley_table` (
  `smiley_id` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smiley_table`
--

INSERT INTO `smiley_table` (`smiley_id`, `comments`, `image`, `user_id`) VALUES
(1, ':kiss:', 'http://nriarena.com/smiley/kiss.png', 40),
(2, ':vampire:', 'http://nriarena.com/smiley/vampire.png', 36);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `dial_code` varchar(255) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `permanent_country` varchar(255) NOT NULL,
  `permanent_address` text NOT NULL,
  `local_country` varchar(255) NOT NULL,
  `local_address` text NOT NULL,
  `otp` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `gender`, `dob`, `contact_number`, `dial_code`, `user_image`, `email`, `password`, `country_id`, `permanent_country`, `permanent_address`, `local_country`, `local_address`, `otp`, `date_added`, `status`) VALUES
(10, 'Rishi', 'Singh', 0, '0000-00-00', '', '', '', 'rishi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 9, '', '', '', '', '', '2021-05-02 22:29:57', 2),
(36, 'Swati', 'Shrivastava', 2, '2006-05-10', '3423423423', '91', 'cd1b82a28e68dc97d3d385ec883c8803.jpg', 'swati.it03@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 101, '101', 'vidisha', '107', 'rome', '4797', '2021-05-04 06:48:24', 2),
(40, 'Reena', 'Prajapat', 2, '2021-06-09', '2345678922', '93', 'b692d953f81b048bd8474db540c2d6b9.jpg', 'reenaprajapat135@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 101, '5', 'Test', '5', 'Tets', '4198', '2021-05-18 12:03:26', 2),
(41, 'Swatu', 'Shrivastava', 0, '0000-00-00', '2345678922', '93', '', 'swatu03@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 101, '', '', '', '', '9651', '2021-05-18 12:06:55', 2),
(42, 'devesh', 'Gour', 0, '0000-00-00', '8871244227', '93', '', 'deveshgour98@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 101, '', '', '', '', '5262', '2021-05-19 03:55:06', 1),
(43, 'kashish', 'Prajapat', 0, '0000-00-00', '0000000055', '93', '', 'kashisprajapat2712@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 101, '', '', '', '', '3698', '2021-05-27 11:04:40', 2),
(44, 'KANIKA', 'TRIPATHI', 0, '0000-00-00', '9630915511', '93', '', 'kanikatripathi60@gmail.com', '753452ab2d4db27bafea47d0dc4f091a', 101, '', '', '', '', '2191', '2021-06-02 09:08:37', 1),
(45, 'Aman', 'Tripathi', 0, '0000-00-00', '9956204733', '93', '', 'amanraj.tripathi31@gmail.com', '730669328cd88c494091badcb5644703', 101, '', '', '', '', '4101', '2021-06-02 09:11:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`image_id`, `user_id`, `photo`, `photo_type`) VALUES
(1, 36, '88e4271e9a376f65e02ba5f8815f1686.jpg', 'image'),
(2, 36, 'fa6021f0e93de0232b7676ab341a25ab.mp4', 'video'),
(3, 40, 'ac4fd709beefcdbdab90045b94b9603d.jpg', 'image'),
(4, 40, '8dcb43fba5cc70035ce1da1b0756566f.mp4', 'video'),
(5, 36, '03b3c59d28ff9ef1360ea5c55c8feb86.jpg', 'image');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ask_me`
--
ALTER TABLE `ask_me`
  ADD PRIMARY KEY (`ask_id`);

--
-- Indexes for table `buzz`
--
ALTER TABLE `buzz`
  ADD PRIMARY KEY (`buzz_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_buzz`
--
ALTER TABLE `comment_buzz`
  ADD PRIMARY KEY (`comment_buzz_id`);

--
-- Indexes for table `comment_buzz_like`
--
ALTER TABLE `comment_buzz_like`
  ADD PRIMARY KEY (`comment_buzz_like_id`);

--
-- Indexes for table `comment_event`
--
ALTER TABLE `comment_event`
  ADD PRIMARY KEY (`comment_event_id`);

--
-- Indexes for table `comment_event_like`
--
ALTER TABLE `comment_event_like`
  ADD PRIMARY KEY (`comment_like_id`);

--
-- Indexes for table `comment_gov`
--
ALTER TABLE `comment_gov`
  ADD PRIMARY KEY (`comment_gov_id`);

--
-- Indexes for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD PRIMARY KEY (`comment_like_id`);

--
-- Indexes for table `comment_major`
--
ALTER TABLE `comment_major`
  ADD PRIMARY KEY (`comment_major_id`);

--
-- Indexes for table `comment_major_like`
--
ALTER TABLE `comment_major_like`
  ADD PRIMARY KEY (`comment_like_id`);

--
-- Indexes for table `comment_root`
--
ALTER TABLE `comment_root`
  ADD PRIMARY KEY (`comment_root_id`);

--
-- Indexes for table `comment_root_like`
--
ALTER TABLE `comment_root_like`
  ADD PRIMARY KEY (`comment_root_like_id`);

--
-- Indexes for table `comment_visit`
--
ALTER TABLE `comment_visit`
  ADD PRIMARY KEY (`comment_visit_id`);

--
-- Indexes for table `comment_visit_like`
--
ALTER TABLE `comment_visit_like`
  ADD PRIMARY KEY (`comment_visit_like_id`);

--
-- Indexes for table `connect_to_root`
--
ALTER TABLE `connect_to_root`
  ADD PRIMARY KEY (`root_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_group`
--
ALTER TABLE `create_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `fact`
--
ALTER TABLE `fact`
  ADD PRIMARY KEY (`fact_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `groupchat_media`
--
ALTER TABLE `groupchat_media`
  ADD PRIMARY KEY (`chatmedia_id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `lets_gov`
--
ALTER TABLE `lets_gov`
  ADD PRIMARY KEY (`gov_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `like_buzz`
--
ALTER TABLE `like_buzz`
  ADD PRIMARY KEY (`like_buzz_id`);

--
-- Indexes for table `like_event`
--
ALTER TABLE `like_event`
  ADD PRIMARY KEY (`like_event_id`);

--
-- Indexes for table `like_gov`
--
ALTER TABLE `like_gov`
  ADD PRIMARY KEY (`like_gov_id`);

--
-- Indexes for table `like_major`
--
ALTER TABLE `like_major`
  ADD PRIMARY KEY (`like_major_id`);

--
-- Indexes for table `like_root`
--
ALTER TABLE `like_root`
  ADD PRIMARY KEY (`like_root_id`);

--
-- Indexes for table `like_visit`
--
ALTER TABLE `like_visit`
  ADD PRIMARY KEY (`like_visit_id`);

--
-- Indexes for table `major_missing`
--
ALTER TABLE `major_missing`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `recent_visit`
--
ALTER TABLE `recent_visit`
  ADD PRIMARY KEY (`visit_id`);

--
-- Indexes for table `replycomment_buzz`
--
ALTER TABLE `replycomment_buzz`
  ADD PRIMARY KEY (`replybuzz_id`);

--
-- Indexes for table `replycomment_buzz_like`
--
ALTER TABLE `replycomment_buzz_like`
  ADD PRIMARY KEY (`replycomment_buzz_like_id`);

--
-- Indexes for table `replycomment_event`
--
ALTER TABLE `replycomment_event`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `replycomment_event_like`
--
ALTER TABLE `replycomment_event_like`
  ADD PRIMARY KEY (`replycomment_like_id`);

--
-- Indexes for table `replycomment_like`
--
ALTER TABLE `replycomment_like`
  ADD PRIMARY KEY (`replycomment_like_id`);

--
-- Indexes for table `replycomment_major`
--
ALTER TABLE `replycomment_major`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `replycomment_major_like`
--
ALTER TABLE `replycomment_major_like`
  ADD PRIMARY KEY (`replycomment_like_id`);

--
-- Indexes for table `replycomment_root`
--
ALTER TABLE `replycomment_root`
  ADD PRIMARY KEY (`replyroot_id`);

--
-- Indexes for table `replycomment_root_like`
--
ALTER TABLE `replycomment_root_like`
  ADD PRIMARY KEY (`replycomment_root_like_id`);

--
-- Indexes for table `replycomment_visit`
--
ALTER TABLE `replycomment_visit`
  ADD PRIMARY KEY (`replyvisit_id`);

--
-- Indexes for table `replycomment_visit_like`
--
ALTER TABLE `replycomment_visit_like`
  ADD PRIMARY KEY (`replycomment_visit_like_id`);

--
-- Indexes for table `reply_comment`
--
ALTER TABLE `reply_comment`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `root_detail`
--
ALTER TABLE `root_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `smiley_table`
--
ALTER TABLE `smiley_table`
  ADD PRIMARY KEY (`smiley_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ask_me`
--
ALTER TABLE `ask_me`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buzz`
--
ALTER TABLE `buzz`
  MODIFY `buzz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `comment_buzz`
--
ALTER TABLE `comment_buzz`
  MODIFY `comment_buzz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_buzz_like`
--
ALTER TABLE `comment_buzz_like`
  MODIFY `comment_buzz_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment_event`
--
ALTER TABLE `comment_event`
  MODIFY `comment_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment_event_like`
--
ALTER TABLE `comment_event_like`
  MODIFY `comment_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_gov`
--
ALTER TABLE `comment_gov`
  MODIFY `comment_gov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment_like`
--
ALTER TABLE `comment_like`
  MODIFY `comment_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `comment_major`
--
ALTER TABLE `comment_major`
  MODIFY `comment_major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment_major_like`
--
ALTER TABLE `comment_major_like`
  MODIFY `comment_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment_root`
--
ALTER TABLE `comment_root`
  MODIFY `comment_root_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_root_like`
--
ALTER TABLE `comment_root_like`
  MODIFY `comment_root_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_visit`
--
ALTER TABLE `comment_visit`
  MODIFY `comment_visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment_visit_like`
--
ALTER TABLE `comment_visit_like`
  MODIFY `comment_visit_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `connect_to_root`
--
ALTER TABLE `connect_to_root`
  MODIFY `root_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `create_group`
--
ALTER TABLE `create_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fact`
--
ALTER TABLE `fact`
  MODIFY `fact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groupchat_media`
--
ALTER TABLE `groupchat_media`
  MODIFY `chatmedia_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lets_gov`
--
ALTER TABLE `lets_gov`
  MODIFY `gov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `like_buzz`
--
ALTER TABLE `like_buzz`
  MODIFY `like_buzz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `like_event`
--
ALTER TABLE `like_event`
  MODIFY `like_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `like_gov`
--
ALTER TABLE `like_gov`
  MODIFY `like_gov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like_major`
--
ALTER TABLE `like_major`
  MODIFY `like_major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `like_root`
--
ALTER TABLE `like_root`
  MODIFY `like_root_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `like_visit`
--
ALTER TABLE `like_visit`
  MODIFY `like_visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `major_missing`
--
ALTER TABLE `major_missing`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recent_visit`
--
ALTER TABLE `recent_visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `replycomment_buzz`
--
ALTER TABLE `replycomment_buzz`
  MODIFY `replybuzz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `replycomment_buzz_like`
--
ALTER TABLE `replycomment_buzz_like`
  MODIFY `replycomment_buzz_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replycomment_event`
--
ALTER TABLE `replycomment_event`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replycomment_event_like`
--
ALTER TABLE `replycomment_event_like`
  MODIFY `replycomment_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replycomment_like`
--
ALTER TABLE `replycomment_like`
  MODIFY `replycomment_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `replycomment_major`
--
ALTER TABLE `replycomment_major`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `replycomment_major_like`
--
ALTER TABLE `replycomment_major_like`
  MODIFY `replycomment_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `replycomment_root`
--
ALTER TABLE `replycomment_root`
  MODIFY `replyroot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `replycomment_root_like`
--
ALTER TABLE `replycomment_root_like`
  MODIFY `replycomment_root_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replycomment_visit`
--
ALTER TABLE `replycomment_visit`
  MODIFY `replyvisit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `replycomment_visit_like`
--
ALTER TABLE `replycomment_visit_like`
  MODIFY `replycomment_visit_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reply_comment`
--
ALTER TABLE `reply_comment`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `root_detail`
--
ALTER TABLE `root_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `smiley_table`
--
ALTER TABLE `smiley_table`
  MODIFY `smiley_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
