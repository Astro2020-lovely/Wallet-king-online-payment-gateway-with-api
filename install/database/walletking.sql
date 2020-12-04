-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2018 at 02:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walletup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('administrator','staff') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'staff',
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `phone`, `password`, `role`, `photo`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
(1, 'Genius Admin', 'admin', 'admin@gmail.com', '000000000', '$2y$10$oQyZMTc2Ucvvme6tJx4XUuQdx6XEyX7Ttvk4enmN3M0qvje07JLN2', 'administrator', '1491825290645x430-film-animasi-larrikins-borong-bintang-bintang-australia-160604k.jpg', '2017-01-24 03:21:40', '2018-10-17 20:27:03', 'smD2Khqd3N6TtiZOdGoS6z2CMuNFdH8PrL0qOmzSNxeRMa7HrgOgcOYO94Zi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `todays_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `type`, `info`, `total`, `todays_total`) VALUES
(1, 'browser', 'Firefox 57.0', 17, NULL),
(2, 'os', 'Windows 10', 32, NULL),
(4, 'browser', 'Google Chrome 63.0.3239.', 4, NULL),
(5, 'os', 'Windows 8.1', 4, NULL),
(6, 'browser', 'Google Chrome 52.0.2743.', 3, NULL),
(7, 'browser', 'Edge 15.15063', 2, NULL),
(8, 'browser', 'Firefox 62.0', 6, NULL),
(9, 'browser', 'Google Chrome 69.0.3497.', 26, NULL),
(10, 'browser', 'UnKnown UnKnown', 50, NULL),
(11, 'os', 'Mac OS X', 19, NULL),
(12, 'browser', 'Google Chrome 68.0.3440.', 7, NULL),
(13, 'os', 'Android', 28, NULL),
(14, 'os', 'Windows 7', 6, NULL),
(15, 'os', 'iPhone', 30, NULL),
(16, 'browser', 'Google Chrome 70.0.3538.', 4, NULL),
(17, 'os', 'iPad', 3, NULL),
(18, 'browser', 'Firefox 63.0', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` mediumtext COLLATE utf8_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `details`, `featured_image`, `source`, `views`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Living a new Dream', 'coming up soon', 'ukaZ4gZZujLWoK4yRYUR6rj.jpg', 'emailmycash.com', 23, '2017-11-28 15:25:10', '2018-10-23 06:12:21', 1),
(3, 'Buy with confidence', 'coming soon', 'ukaZ4gZZujLWoK4yRYUR6rj.jpg', 'emailmycash.com', 17, '2017-11-28 15:25:10', '2018-10-23 02:45:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code_scripts`
--

CREATE TABLE `code_scripts` (
  `id` int(11) NOT NULL,
  `google_analytics` text NOT NULL,
  `meta_keys` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_scripts`
--

INSERT INTO `code_scripts` (`id`, `google_analytics`, `meta_keys`) VALUES
(1, '<script>\r\n   //Google Analytics Scriptfffffffffffffffffffffffssssfffffs\r\n</script>', 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(11) NOT NULL,
  `number` varchar(11) CHARACTER SET latin1 DEFAULT '0',
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `number`, `title`, `icon`, `status`) VALUES
(1, '800', 'Satisfied Clients', 'fz6678064-star-128.png', 1),
(2, '12412', 'Projects Completed', 'XgIyoutube-icon.png', 1),
(3, '1647', 'Positive Feedbacks', 'XgIyoutube-icon.png', 1),
(4, '682', 'Users Online', 'XgIyoutube-icon.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `accid` int(11) DEFAULT NULL,
  `deposit_method` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `bchain_address` text,
  `bank_information` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_information` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','completed','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`) VALUES
(1, 'How does Wallet KING work?', '<p style=\"padding: 0px; margin-bottom: 0px; border: none; caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif;\">Wallet KING allows you to send money to friends, family or anyone at all.* If your financial institution offers Wallet KING , you can log onto their online banking site to use Wallet KING there. If your bank does not offer Wallet KING you can sign up at Wallet KING .com.</p><p style=\"padding: 0px; margin-bottom: 0px; border: none; caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif;\">After you enter your&nbsp;<font color=\"#3b9fe1\"><span style=\"\">Eligible Transaction Account</span></font>&nbsp;information, you can send or request money from your contacts. They will be notified by email or text message that you wish to send money or are requesting money from them. You and your contacts will never need to exchange financial account information.</p><span style=\"color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"></span><span style=\"color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"></span><span style=\"color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"></span>', 1),
(2, 'Should I use Popmoney at my bank or at Wallet KING ?', '<p style=\"padding: 0px; margin-bottom: 0px; border: none; caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif;\">If your bank or credit union offers Wallet KING you can log into your online banking site and use Popmoney there.&nbsp;<font color=\"#3b9fe1\"><span style=\"\">See if your bank offers Wallet KING </span></font>.</p><p style=\"padding: 0px; margin-bottom: 0px; border: none; caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif;\">If your bank doesn\'t offer Wallet KING , you can still send and receive money from your bank account by signing up</p>', 1),
(3, 'What are different ways I can send money to someone?', '<p style=\"padding: 0px; margin-bottom: 0px; border: none; caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif;\">You can send money using a recipient\'s:</p><ul style=\"padding: 0px 0px 0px 1.8em; margin: 1.6em 0px 0px; border: none; list-style-position: initial; list-style-image: initial; caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif;\"><li style=\"padding: 0px; margin: 0px; border: none;\">Email address: your contact will receive an email with instructions on how to direct the payment into his or her&nbsp;<font color=\"#3b9fe1\"><span style=\"\">Eligible Transaction Account</span></font>.</li><li style=\"padding: 0px; margin: 0px; border: none;\">Mobile number: a text message will be sent to the recipient with instructions on how to direct the payment into his or her Eligible Transaction Account. If the recipient does not respond to the payment notification after 3 days, a reminder text message will be sent reminding him/her to act on the payment notification.&nbsp;</li><li style=\"padding: 0px; margin: 0px; border: none;\">Eligible Transaction Account information (routing and account number): money will be directly deposited into your contact\'s Eligible Transaction Account. You will also have the option to send the contact an email.</li></ul>', 1),
(4, 'How will I know if someone sends me money using Wallet KING ?', '<span style=\"caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; background-color: rgb(247, 247, 247);\">If the sender sends the money using your email address or mobile phone number, you will receive an email or text message with instructions on how to deposit the payment into your&nbsp;</span><font face=\"Arial, Helvetica, sans-serif\" color=\"#3b9fe1\"><span style=\"\">Eligible Transaction Account</span></font><span style=\"caret-color: rgb(102, 102, 102); color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; background-color: rgb(247, 247, 247);\">. If the sender uses your Eligible Transaction Account information, the money will be deposited directly into your Eligible Transaction Account. In that case, you will only receive a notification if the sender enters an optional message when submitting the payment.</span><br>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` int(11) NOT NULL,
  `contact` text CHARACTER SET latin1 NOT NULL,
  `contact_email` text CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1 NOT NULL,
  `faq` text CHARACTER SET latin1 NOT NULL,
  `api_documentation` text COLLATE utf8_unicode_ci,
  `api_status` int(11) NOT NULL DEFAULT '1',
  `c_status` int(11) NOT NULL,
  `a_status` int(11) NOT NULL,
  `f_status` int(11) NOT NULL,
  `slider_status` int(11) NOT NULL DEFAULT '1',
  `service_status` int(11) NOT NULL DEFAULT '1',
  `counter_status` int(11) NOT NULL DEFAULT '1',
  `portfolio_status` int(11) NOT NULL DEFAULT '1',
  `testimonial_status` int(11) NOT NULL DEFAULT '1',
  `blog_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `contact`, `contact_email`, `about`, `faq`, `api_documentation`, `api_status`, `c_status`, `a_status`, `f_status`, `slider_status`, `service_status`, `counter_status`, `portfolio_status`, `testimonial_status`, `blog_status`) VALUES
(1, 'Success! Thanks for contacting us, we will get back to you shortly.', 'admin@geniusocean.com', '<img src=\"https://i.imgur.com/5jymLaU.jpg\" width=\"693\"><br><br><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Flameless Cremation, scientifically known as Alkaline Hydrolysis, is a natural, gentle, and eco-friendly alternative to fire based cremation. The process uses WATER as opposed to fire. By using a combination of 95% water and 5% alkalinity, Flameless Cremation mimics the same natural break down of a body if it were to be laid to rest directly in the soil, only accelerated. The following information is a brief description of what happens during the Flameless Cremation process.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">During the Flameless Cremation process, a body is gently placed in a container which is then placed in a clean stainless steel vessel. A combination of warm water flow and alkalinity are used to accelerate the natural process of tissue hydrolysis and return the body back to nature.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">At the end of the Flameless Cremation process, just like fire-based cremation, the only solid that remains is mineral bone (calcium phosphate) which is then processed and placed in an urn to be given back to the family. However, unlike fire-based cremation, the mineral bone ash from Flameless Cremation is clean and lighter in color because it is out without carbon discoloration. The mineral bone ash is 100% safe; pathogen and disease free.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">If an individual has metal medical devices, such pacemakers or medical implants, those are recovered for recycling after the Flameless Cremation process has taken place.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Flameless Cremation is offered by funeral homes all across the United States, Canada, and Europe. It is even used by medical schools for individuals who have been donated to science, including the world renowned Mayo Clinic.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">With new options we understand that there are questions that you may have about the Flameless Cremation process. By reading our<span>&nbsp;</span><a href=\"http://test.hughesfuneralalternatives.com/faq/\" target=\"_blank\" style=\"box-sizing: border-box; text-decoration: none; color: rgb(51, 51, 51);\">Advantages/Frequently Asked Questions</a><span>&nbsp;</span>Page we hope your&nbsp;questions are answered. We also hope that clarification is made concerning some common misconceptions about the process as well.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">If you still have questions or concerns, feel free to call us anytime. We understand that making funeral arrangements, whether it’s for a pre-need or at-need situation, can be a very stressful and emotional process. We want you to be 100% sure of any decision that is made when making funeral arrangements.</p><p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: rgb(116, 116, 116); font-family: &quot;PT Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"box-sizing: border-box;\"><em style=\"box-sizing: border-box; font-size: 14px;\">PLEASE NOTE: Hughes Funeral Alternatives, LLC only provides its services through funeral homes in St. Louis, St. Louis County, St. Charles County, Eastern Illinois, and surrounding areas. You may request our services by speaking to a funeral director at the funeral home of your choice.</em></strong></p>', '<div>\r\n<h2>What is Lorem Ipsum, Really?</h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and\r\n typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n</div><div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>\r\n</div><br><div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>\r\n</div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', 'Please contact us if you are a developer for more details<br><font color=\"#009900\">(An API Documentation has given with Project Source)</font>', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `image`, `status`) VALUES
(3, '7uJsingle_project1.png', 1),
(4, 'PRSsingle_project2.png', 1),
(5, 'jIOsingle_project3.png', 1),
(6, 'NRysingle_project5.png', 1),
(7, 'VDjsingle_project6.png', 1),
(8, 's36single_project7.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `accto` int(11) DEFAULT NULL,
  `accfrom` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `reference` text,
  `req_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section_titles`
--

CREATE TABLE `section_titles` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `service_text` text CHARACTER SET latin1,
  `pricing_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pricing_text` text CHARACTER SET latin1,
  `portfolio_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `portfolio_text` text CHARACTER SET latin1,
  `testimonial_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `testimonial_text` text CHARACTER SET latin1,
  `blog_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_titles`
--

INSERT INTO `section_titles` (`id`, `service_title`, `service_text`, `pricing_title`, `pricing_text`, `portfolio_title`, `portfolio_text`, `testimonial_title`, `testimonial_text`, `blog_title`, `blog_text`) VALUES
(1, 'Online Wallet Solution', 'Wallet KIng lets you send and receive money instantly!\r\nAround the globe or around the corner, sending money with Wallet King is instant, easy and secure', 'Pricing Plans', 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.', 'Latest Projects', 'We are determine to make the business more flexible by incorporating a number of services that will Waoo our clients and increase potential partners in different domain of marketing and skills', 'Customer Reviews', 'What are people saying about EmailmyCash?', 'living a new Dream', 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.');

-- --------------------------------------------------------

--
-- Table structure for table `service_section`
--

CREATE TABLE `service_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text` text CHARACTER SET latin1 NOT NULL,
  `icon` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_section`
--

INSERT INTO `service_section` (`id`, `title`, `text`, `icon`, `status`) VALUES
(2, 'Send & Receive Money', 'Send money to friends and family or move funds from one account to another.*', 'K8J4.jpg', 1),
(3, 'Powered Payment options', 'Expand your payment options with our credit, debit, prepaid cards, Bitcoins & PayPal Credit', 'zbV5.jpg', 1),
(4, 'Buy with confidence', 'There\'s a reason why over 200 million people trust EmailmyCash: it\'s easy and secure', 'VVB6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fax` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `footer` varchar(255) CHARACTER SET latin1 NOT NULL,
  `background` varchar(255) CHARACTER SET latin1 NOT NULL,
  `transfer_charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw_fee` float DEFAULT '0',
  `paypal_business` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stripe_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocktrail_api` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocktrail_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wallet_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wallet_pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_address` int(11) NOT NULL DEFAULT '1',
  `wallet_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_sign` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `css_file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `paypal_deposit` int(11) NOT NULL DEFAULT '1',
  `pm_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_deposit` int(11) NOT NULL DEFAULT '1',
  `bank_deposit` int(11) NOT NULL DEFAULT '1',
  `mobile_deposit` int(11) NOT NULL DEFAULT '1',
  `pm_deposit` int(11) NOT NULL DEFAULT '1',
  `blocktrail_deposit` int(11) NOT NULL DEFAULT '1',
  `bank_info` text COLLATE utf8_unicode_ci,
  `mobile_info` text COLLATE utf8_unicode_ci,
  `paypal_withdraw` int(11) NOT NULL DEFAULT '1',
  `skrill_withdraw` int(11) NOT NULL DEFAULT '1',
  `payoneer_withdraw` int(11) NOT NULL DEFAULT '1',
  `bank_withdraw` int(11) NOT NULL DEFAULT '1',
  `blocktrail_withdraw` int(11) NOT NULL DEFAULT '1',
  `secret_string` text COLLATE utf8_unicode_ci,
  `blockchain_xpub` text COLLATE utf8_unicode_ci,
  `blockchain_api` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `title`, `url`, `about`, `address`, `phone`, `fax`, `email`, `footer`, `background`, `transfer_charge`, `extra_charge`, `withdraw_fee`, `paypal_business`, `stripe_key`, `stripe_secret`, `blocktrail_api`, `blocktrail_secret`, `wallet_id`, `wallet_pass`, `use_address`, `wallet_address`, `currency_code`, `currency_sign`, `theme_color`, `css_file`, `paypal_deposit`, `pm_account`, `stripe_deposit`, `bank_deposit`, `mobile_deposit`, `pm_deposit`, `blocktrail_deposit`, `bank_info`, `mobile_info`, `paypal_withdraw`, `skrill_withdraw`, `payoneer_withdraw`, `bank_withdraw`, `blocktrail_withdraw`, `secret_string`, `blockchain_xpub`, `blockchain_api`) VALUES
(1, 'logo.png', 'walletfavicon.png', 'WalletKING - Online Wallet and Payment Gateway Solution', 'Fuckcccccc', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae&nbsp;', 'Guamstraat 2 \r\n1339 NW', '+31 970 102 10063', '+31 970 102 10063', 'admin@geniusocean.com', 'Copyright 2018 @ <a href=\"http://geniusocean.com\" title=\"\" target=\"_blank\">GeniusOcean.com</a>', 'smm-min2.jpg', '2', '0.5', 3, 'shaon143-facilitator-1@gmail.com', 'pk_test_UnU1Coi1p5qFGwtpjZMRMgJM', 'sk_test_QQcg3vGsKRPlW6T3dXcNJsor', NULL, NULL, NULL, NULL, 0, NULL, 'USD', '$', '#0099ff', 'genius1.css', 1, 'U16885602', 1, 1, 1, 1, 1, '<b>Bank Info:&nbsp;</b><br>Not Available', '<b>Mobile Info:&nbsp;</b><div>Not Available<br></div>', 1, 1, 1, 1, 1, 'ZzsMLGKe162CfA5EcG6j', 'xpub6CfHiBbFnj1eCa68kYVKYvvW9sxh76YLLHPJGGbWo8Xd3PADnLTG9tX8bpEvoERzDQYCGxvJcc7yyQHKXGKfRUr4KrkYS3gsfDZvVeavqMP', 'a10cca40-7934-4688-810d-adfb821b4b03');

-- --------------------------------------------------------

--
-- Table structure for table `site_language`
--

CREATE TABLE `site_language` (
  `id` int(11) NOT NULL,
  `home` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_us` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign_up` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_center` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pending_deposits` tinytext COLLATE utf8_unicode_ci,
  `notification` tinytext COLLATE utf8_unicode_ci,
  `next` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_details` text COLLATE utf8_unicode_ci,
  `business_details` text COLLATE utf8_unicode_ci,
  `my_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_balance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recent_transaction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `send` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `request` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transactions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_settings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `security_settings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pending_withdraws` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pending_requests` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscribe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us_today` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dashboard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `change_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latest_blogs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_links` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_documentation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_in_social` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_language`
--

INSERT INTO `site_language` (`id`, `home`, `about_us`, `contact_us`, `faq`, `log_in`, `sign_up`, `support_center`, `pending_deposits`, `notification`, `next`, `personal`, `business`, `personal_details`, `business_details`, `my_account`, `current_balance`, `recent_transaction`, `dates`, `action`, `amount`, `send`, `deposit`, `withdraw`, `request`, `settings`, `transactions`, `account_settings`, `security_settings`, `api_details`, `update_info`, `pending_withdraws`, `pending_requests`, `total`, `subscription`, `subscribe`, `address`, `contact_us_today`, `street_address`, `phone`, `email`, `fax`, `submit`, `name`, `dashboard`, `update_profile`, `change_password`, `latest_blogs`, `footer_links`, `view_details`, `blog`, `api_documentation`, `share_in_social`, `logout`) VALUES
(1, 'Home', 'About Us', 'Contact Us', 'FAQ', 'Log In', 'Sign Up', 'Support', 'Pending Deposits', 'Notification', 'Next>>', 'Personal', 'Business', 'Shop online or send money. All without sharing your payment info.', 'Shop online or send and receive money. All without sharing your payment info.', 'My Account', 'Current Balance', 'Recent Transactions', 'Date', 'Action', 'Amount', 'Send', 'Deposit', 'Withdraw', 'Request', 'Settings', 'Transactions', 'Account Settings', 'Security Settings', 'API Details', 'Update Informations', 'Pending Withdraws', 'Pending Requests', 'Total', 'Subscription', 'Subscribe', 'Address', 'Contact Us Today!', 'Contact Info', 'Phone', 'Email', 'Fax', 'Submit', 'Name', 'Dashboard', 'Update Profile', 'Change Password', 'Latest Blogs', 'Footer Links', 'Read More', 'Blog', 'API Documantation', 'Share', 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text_position` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `text`, `image`, `text_position`, `status`) VALUES
(3, 'Send, Receive and Request Money!', 'Send, request and receive money with just about anyone online or through your mobile device', 'd6Ybtc.jpg', 'slide_style_center', 1),
(4, 'Knowing your BitWorld', 'Bringing you closer to the bitcoin world and Electronic currencies', 'JR2dollar222.jpg', 'slide_style_right', 1),
(5, 'Reach Global Expansion', 'Mastercard and PayPal Expand Digital Partnership Globally', 'JG6pexels-photo-48726.jpeg', 'slide_style_left', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `g_plus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `f_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `t_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `g_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `link_status` enum('enable','disable') NOT NULL DEFAULT 'enable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twiter`, `g_plus`, `linkedin`, `f_status`, `t_status`, `g_status`, `link_status`) VALUES
(1, 'http://facebook.com/emailmycash', 'http://twitter.com/', 'http://google.com/', 'http://linkedin.com/', 'enable', 'enable', 'enable', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) DEFAULT NULL,
  `by_admin` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('open','processing','closed') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `ticket_number`, `by_admin`, `userid`, `subject`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, 0, 1, 'Testing First Support Ticket From User Panel', 'Test Test', '2018-11-13 09:25:34', '2018-11-13 09:29:47', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `review` text CHARACTER SET latin1 NOT NULL,
  `client` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `review`, `client`, `designation`) VALUES
(3, 'Now I can shop online. After Wallet King was launched, I could receive money from anywhere in the world at little cost to me. Now I have a EmailmyCash e-wallet I can use to buy things online I never could before.', 'John', 'Business'),
(4, 'I highly recommend it!\r\nI\'ve only been with Wallet King one day and I already love it! Super easy to set up, and fantastic customer support. The customer support agent knew exactly what I needed and directed me to the solution I sought. None of the headaches that I encountered with the other guys.', 'Sued', 'Australia'),
(5, 'Thank you, EmailmyCash.\r\nOnly with EmailmyCash can I send my money to my family in Ghana. No other online payment platform is available in Ghana! Thank you, EmailmyCash, for helping me give my family a better quality of life.', 'Turguela', 'Dubai'),
(6, 'They do really stand behind their promises!\r\nI recently experience an unexpected problem in receiving an order I had placed. I contacted the Resolution Center and they helped me receive a full refund. The quick process made me appreciate a reputable company like Wallet King and its fantastic and secure means of processing payments. They do really stand behind their promises!', 'Bradly', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `reply_by` enum('admin','user') NOT NULL DEFAULT 'user',
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reply_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transid` varchar(255) DEFAULT NULL,
  `mainacc` int(11) DEFAULT NULL,
  `accto` int(11) DEFAULT NULL,
  `accfrom` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `reference` text,
  `amount` float DEFAULT NULL,
  `fee` float DEFAULT '0',
  `reason` varchar(255) DEFAULT NULL,
  `deposit_method` varchar(255) DEFAULT NULL,
  `deposit_transid` varchar(255) DEFAULT NULL,
  `deposit_chargeid` varchar(255) DEFAULT NULL,
  `withdrawid` int(11) DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `custom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `used_api` enum('no','yes') NOT NULL DEFAULT 'no',
  `origin` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transid`, `mainacc`, `accto`, `accfrom`, `type`, `sign`, `reference`, `amount`, `fee`, `reason`, `deposit_method`, `deposit_transid`, `deposit_chargeid`, `withdrawid`, `trans_date`, `status`, `item_name`, `item_code`, `custom`, `used_api`, `origin`) VALUES
(1, 'KN9C5JJDILT', 1, NULL, NULL, 'deposit', '+', NULL, 100, 0, 'Account Deposit', 'BitCoin', NULL, NULL, NULL, '2018-11-12 10:57:25', 0, NULL, NULL, NULL, 'no', NULL),
(2, 'YW6KM5MVBCZ', 1, NULL, NULL, 'deposit', '+', NULL, 1, 0, 'Account Deposit', 'BitCoin', NULL, NULL, NULL, '2018-11-13 07:47:36', 0, NULL, NULL, NULL, 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `agent` text,
  `ip` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `userid`, `login_time`, `agent`, `ip`, `location`, `os`, `status`) VALUES
(1, 1, '2018-11-12 10:04:03', 'Firefox 63.0', '::1', 'No Country', 'Windows 10', 1),
(2, 1, '2018-11-12 10:57:02', 'Firefox 63.0', '45.114.89.8', 'Bangladesh', 'Windows 10', 1),
(3, 1, '2018-11-13 07:43:54', 'Firefox 63.0', '45.114.89.8', 'Bangladesh', 'Windows 10', 1),
(4, 1, '2018-11-13 09:25:52', 'Firefox 63.0', '::1', 'No Country', 'Windows 10', 1),
(5, 1, '2018-11-13 12:38:03', 'Firefox 63.0', '::1', 'No Country', 'Windows 10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `gender` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `acctype` varchar(255) DEFAULT 'basic',
  `business_name` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `current_balance` float DEFAULT '0',
  `zip` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) DEFAULT NULL,
  `email_verified` enum('no','yes') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `account_status` enum('verified','certified','insured','unverified') NOT NULL DEFAULT 'unverified',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `name`, `description`, `gender`, `photo`, `country`, `phone`, `fax`, `email`, `password`, `address`, `city`, `dob`, `acctype`, `business_name`, `api_key`, `current_balance`, `zip`, `website`, `featured`, `verification_token`, `email_verified`, `created_at`, `updated_at`, `remember_token`, `account_status`, `status`) VALUES
(1, 'Demo Account', NULL, NULL, NULL, NULL, '', NULL, 'user@gmail.com', '$2y$10$oQyZMTc2Ucvvme6tJx4XUuQdx6XEyX7Ttvk4enmN3M0qvje07JLN2', NULL, NULL, NULL, 'basic', NULL, NULL, 0, NULL, NULL, 0, NULL, 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'unverified', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(11) NOT NULL,
  `acc` int(11) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `acc_email` varchar(255) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `acc_name` varchar(255) DEFAULT NULL,
  `address` text,
  `swift` varchar(255) DEFAULT NULL,
  `reference` text,
  `amount` float DEFAULT NULL,
  `fee` float DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','completed','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `acc`, `method`, `acc_email`, `iban`, `country`, `acc_name`, `address`, `swift`, `reference`, `amount`, `fee`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Payoneer', 'shun@gmail.com', NULL, NULL, NULL, NULL, NULL, 'thank you', 400, 2, '2018-10-16 05:48:27', '2018-10-16 05:49:20', 'completed'),
(2, 1, 'Paypal', 'megaonnet@gmail.com', NULL, NULL, NULL, NULL, NULL, 'thanks', 100, 2, '2018-10-17 06:59:39', '2018-10-17 07:18:27', 'rejected'),
(3, 1, 'Payoneer', 'megaonnet@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 45, 2, '2018-10-17 07:02:41', '2018-10-17 07:18:24', 'rejected'),
(4, 2, 'Payoneer', 'megaonnet@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 100000, 3, '2018-10-17 07:40:13', '2018-10-17 07:42:07', 'completed'),
(5, 1, 'Payoneer', 'megaonnet@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Thanks', 100, 3, '2018-10-17 14:19:32', '2018-10-17 21:55:08', 'rejected'),
(6, 2, 'Bank', NULL, '76389399763833939303030', 'ALGERIA', 'Atana Louis', '22 north way', '78478378', NULL, 200, 3, '2018-10-18 12:28:11', '2018-10-18 12:29:19', 'completed'),
(7, 5, 'Bank', NULL, '0079111', 'TURKEY', 'Mona Tavakoli Tabazavareh', 'Yusufpasa Subesi', 'AKBKTRIS999', NULL, 2000, 3, '2018-10-19 09:01:15', '2018-10-19 10:23:24', 'rejected'),
(8, 7, 'Bank', NULL, '6397120251', 'THAILAND', 'Nicolaas Francois Stroebel', 'Bangkok Bank, 502/43, M.10, Nongprue, Banglamung, Chonburi, Thailand', 'BKKBTHBK', 'N.F.Stroebel', 1450, 3, '2018-10-21 05:52:23', '2018-10-21 08:20:21', 'rejected'),
(9, 17, 'Bank', NULL, '325043728914', 'UNITED STATES', 'Checking', '2818 Cedarglen Ct', 'BOFAUS3N', NULL, 149997, 3, '2018-10-22 07:27:13', '2018-10-22 07:38:02', 'rejected'),
(10, 17, 'Bank', NULL, '325043728914', 'UNITED STATES', 'Checking', '2818 Cedarglen Ct.', 'BOFAUS3N', 'MOANIES', 149997, 3, '2018-10-22 15:41:40', '2018-10-22 16:28:11', 'rejected'),
(11, 17, 'Bank', NULL, '325043728914', 'UNITED STATES', 'Checking', '2818 Cedarglen Ct.', 'BOFAUS3N', NULL, 150022, 3, '2018-10-22 16:49:36', '2018-10-22 17:15:08', 'rejected'),
(12, 20, 'Bank', NULL, '325060221711', 'UNITED STATES', 'Spendings', '18030 Cottontail Pl', 'BOFAUS3N', NULL, 100022, 3, '2018-10-22 17:03:03', '2018-10-22 17:15:04', 'rejected'),
(13, 24, 'Payoneer', 'stanleyp1015@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0.5, 3, '2018-10-22 18:26:53', '2018-10-22 18:34:19', 'rejected'),
(14, 17, 'Bank', NULL, '325043722914', 'UNITED STATES', 'checking', '2818 Cedarglen Ct.', 'BOFAUS3N', NULL, 10000, 3, '2018-10-22 21:50:22', '2018-10-22 22:02:25', 'rejected'),
(15, 17, 'Bank', NULL, '325043728914', 'UNITED STATES', 'checking', '2818 cedarglen ct.', 'BOFAUS3N', NULL, 10000, 3, '2018-10-23 03:57:25', '2018-10-23 03:57:25', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_scripts`
--
ALTER TABLE `code_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_titles`
--
ALTER TABLE `section_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_section`
--
ALTER TABLE `service_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_language`
--
ALTER TABLE `site_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
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
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `code_scripts`
--
ALTER TABLE `code_scripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `section_titles`
--
ALTER TABLE `section_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_section`
--
ALTER TABLE `service_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_language`
--
ALTER TABLE `site_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
