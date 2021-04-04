-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 01:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Rasel Rana', 'raselrana1147@gmail.com', '$2y$10$ejzReoUuGmdPs.1d/nA8FuXj5t1i/xZ2jzSbbRrP3dYpfjGMduDPu', NULL, 'admin', '2021-03-28 23:19:28', '2021-03-28 23:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Action', '   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, NULL, NULL),
(3, 'Rommance', 'dsafgrefdhygrtuhyytuty', 1, '2021-03-29 02:53:22', '2021-03-29 02:53:22'),
(4, 'Comedy', 'fdsfgdghfhfg hgtjfghg hgjtgfj', 1, '2021-03-29 03:07:06', '2021-03-29 03:07:06'),
(5, 'TB show', 'ds fdghdfdsa hfgds sfgsdh shfgds fdgdsf', 1, '2021-04-01 06:13:42', '2021-04-04 02:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Unseen, 2=Seen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rasel Rana', 'raselrana1147@gmail.com', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n	                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n	                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n	                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-04-04 03:30:47', '2021-04-04 03:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, NULL, NULL),
(2, 'Hindi', 1, '2021-03-29 03:23:33', '2021-03-29 03:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_29_051347_create_admins_table', 2),
(7, '2021_03_29_064707_create_languages_table', 4),
(9, '2021_03_29_064303_create_categories_table', 5),
(10, '2021_03_29_092423_create_movie_types_table', 6),
(11, '2021_03_29_093848_create_traillers_table', 7),
(14, '2021_03_29_114828_create_videos_table', 8),
(15, '2021_04_01_045235_create_packages_table', 9),
(16, '2014_10_12_000000_create_users_table', 10),
(17, '2021_04_01_104213_create_purchase_packages_table', 11),
(18, '2021_04_04_063929_create_sliders_table', 12),
(19, '2021_04_04_092256_create_contacts_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `movie_types`
--

CREATE TABLE `movie_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_types`
--

INSERT INTO `movie_types` (`id`, `type_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Commedy', 'cdsfdsfds', 1, NULL, NULL),
(2, 'Drama', 'dsafsa', 1, '2021-03-29 03:37:32', '2021-03-29 03:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'as days',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `name`, `price`, `duration`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Enjoy all Time', 'Short Package', '150', '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-03-31 23:41:27', '2021-03-31 23:41:27'),
(7, 'Enjoy With family', 'Medium', '400', '20', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n	                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n	                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n	                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-03-31 23:45:38', '2021-03-31 23:45:38'),
(8, 'Just chill whole month', 'Large', '1000', '30', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n	                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n	                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n	                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-03-31 23:46:20', '2021-03-31 23:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_packages`
--

CREATE TABLE `purchase_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remain_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=not started,2=started',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_packages`
--

INSERT INTO `purchase_packages` (`id`, `package_id`, `user_id`, `expire_date`, `start_date`, `remain_time`, `total_time`, `payment_name`, `transaction_number`, `payment_from`, `package_active`, `created_at`, `updated_at`) VALUES
(5, 7, 10, NULL, NULL, '21', NULL, 'Bkash', 'gdfg', 'sasa', '1', '2021-04-01 06:16:41', '2021-04-04 09:48:07'),
(7, 8, 10, '03 May 2021 12:26:07 am', '03 April 2021 12:26:07 am', NULL, NULL, 'Rocket', '124587965', '01245686955', '2', '2021-04-01 06:16:41', '2021-04-02 18:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=home page,2=movie or tv',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slider_image`, `type`, `created_at`, `updated_at`) VALUES
(1, 'new action movie', 'xg5v5bxjbf1617525829.jpg', 1, NULL, '2021-04-04 02:47:26'),
(2, 'new action movie', '2.jpg', 1, NULL, NULL),
(4, 'new action movie', '4.jpg', 2, NULL, NULL),
(5, 'new action movie', '5.jpg', 2, NULL, NULL),
(6, 'new action movie', '6.jpg', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `traillers`
--

CREATE TABLE `traillers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailler_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traillers`
--

INSERT INTO `traillers` (`id`, `title`, `thumbnail`, `trailler_video`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kabir sing', '1.jpeg\r\n', '1.mkv', 'cdsfsgdfs', 1, NULL, NULL),
(2, 'gdfg', 'mcekztxxxk1617016035.jpg', 'l2czmm7wnr1617016035.mkv', 'dsafdsaf', 1, '2021-03-29 05:07:15', '2021-03-29 05:07:15'),
(3, 'fdsfds', 'fqy6galcnw1617018362.jpeg', 'ohpilorvwi1617018362.mkv', 'fdsfdsa', 1, '2021-03-29 05:46:02', '2021-03-29 05:46:02'),
(4, 'New style', 'kzofx66s3k1617107969.jpg', 'tpp57wih3w1617107969.mkv', 'fdsgfd', 1, '2021-03-30 06:39:29', '2021-03-30 06:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_active` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `address`, `password`, `avatar`, `email_active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(9, 'Raju Ahmed', 'rashidkhan420123@gmail.com', 'rasheduzzam', '124588695222', 'cxsafdsf', '$2y$10$mnk1cv9T6ei/QERW3UeFA.XLHtmdsEZWWsp0TdIWSh9oM7xXLUNk6', NULL, 1, 'zoaockimqriwjsc8yuxxki83jzomf5q7xygoq8bgjrltxig7jjrtbqoq6gki', NULL, '2021-04-01 03:00:42', '2021-04-01 03:00:42'),
(10, 'Rasel Rana', 'raselrana1147@gmail.com', 'raselrana1147', '01964719349', 'Mirpur 1', '$2y$10$NMDiThNgbd0j/0.1P3GxPOtzftIDNgFVB0rCulhWEEe9HAQeJHutK', 'ktg2cuwr7n1617536918.jpg', 2, NULL, NULL, '2021-04-01 03:01:13', '2021-04-04 05:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vedio_type` enum('Movies','TV Shows') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Regular','Trending','Upcoming') COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailler_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 1,
  `trailler_view` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `title`, `category_id`, `language_id`, `description`, `vedio_type`, `quality`, `type`, `trailler_name`, `video_name`, `thumbnail`, `release_year`, `duration`, `video_link`, `view`, `trailler_view`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(14, 'The Shawshank Redemption', 'This is action movie', 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Movies', 'Full HD', 'Trending', '7sf2gubiou1617166308.mkv', '2pa0gakrmb1617166308.mkv', 'qte26oovfl1617166307.jpg', '1994', '1h 38m 10s', NULL, 1, 2, 'The-Shawshank Redemption-This-is-action movie-1617166307', 1, '2021-03-30 22:51:48', '2021-03-31 04:04:41'),
(15, 'Forrest Gump', 'Best Horror movie ever I seen', 3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Movies', 'Full HD', 'Upcoming', '57x0aoedf91617166410.mkv', 'kd011izdz31617166410.mkv', 'konyurxajt1617166410.jpg', '1985', '1h 38m 10s', NULL, 2, 1, 'Forrest-Gump-Best Horror movie-ever I seen-1617166410', 1, '2021-03-30 22:53:30', '2021-03-31 05:19:34'),
(16, 'Schindler\'s List', 'This is action movie', 4, 2, 'German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'Movies', 'HD', 'Upcoming', 'b6ggigztec1617166548.mkv', '6kvb63gs721617166548.mkv', 'aipnotm7mx1617166548.jpg', '2005', '1h 38m 10s', NULL, 7, 1, 'Schindler-s-List-This-is action-movie-1617166548', 1, '2021-03-30 22:55:48', '2021-03-31 05:40:05'),
(17, 'The Godfather', 'This is action movie', 3, 2, 'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son.', 'Movies', 'Standard', 'Trending', 'n6gbxigc2h1617166729.mkv', 'xcg40ftn0e1617166729.mkv', 'ybahibvjrd1617166729.jpg', '1972', '1h 38m 10s', NULL, 1, 1, 'The-Godfather-This-is action movie-1617166729', 1, '2021-03-30 22:58:49', '2021-03-30 22:58:49'),
(18, 'The Green Mile', 'This is action movie', 3, 2, 'The Green Miles dhwq huef8w jhfdwe iuewhjfdrwe jh frujewirw ujrew lsdikqsoa ideqwujr dwuqehreuqw oiewruqwi jfiew', 'TV Shows', 'Full HD', 'Trending', 'p7erfoxucc1617166792.mkv', '8cd4h5mtwh1617166792.mkv', 'twguplbnom1617166792.jpg', '1994', '1h 38m 10s', NULL, 2, 1, 'The-Green Mile-This is-action movie-1617166792', 1, '2021-03-30 22:59:52', '2021-03-31 05:41:53'),
(19, 'Goodfellas', 'This is action movie', 4, 1, 'fdsgtdrf cgbyhrg', 'Movies', 'Full HD', 'Trending', 'vc75ktcyjj1617168051.mkv', 'vrlppjmo0v1617168051.mkv', 's4h0jmwq4x1617168051.jpg', '1994', '00:03:07', 'hfgh', 8, 7, 'Goodfellas-This-is action-movie-1617168051', 1, '2021-03-30 23:20:51', '2021-03-31 03:30:47'),
(20, 'Goodfellas', 'This is action movie', 4, 2, 'dcsarfedwstge', 'Movies', 'Full HD', 'Regular', 'fnv6i7zye11617168985.mkv', 'v3l2wlvody1617168985.mkv', 'i6salopgbo1617168985.jpg', '1994', '00:03:07', 'gdfg', 10, 2, 'Rasel-Rana-This-is-action movie-1617168985', 1, '2021-03-30 23:36:25', '2021-03-31 05:22:40'),
(21, 'Forrest Gump', 'This is action movie', 3, 1, 'dxasfd', 'Movies', 'Full HD', 'Regular', 'fc8ssn9n5e1617170869.jpg', 'ugy6pavxrs1617170869.mkv', 'wh5kxifjme1617170869.jpg', '1994', '00:02:26', 'hfgh', 1, 1, 'Rasel-Rana-This-is-action movie-1617170869', 1, '2021-03-31 00:07:49', '2021-03-31 00:07:49'),
(22, 'Rasel Rana', 'This is action movie', 1, 2, 'dsadsa', 'Movies', 'Standard', 'Regular', 'wrtqvadbr61617174681.mp4', 'h6rolsro5x1617174681.mkv', 'cgl1dre2yp1617174680.jpg', '1994', '00:02:26', 'hfgh', 2, 5, 'Rasel-Rana-This-is-action-movie-1617174680', 1, '2021-03-31 01:11:21', '2021-04-01 03:10:10'),
(23, 'yhtgrt', 'tgryg', 4, 1, 'gfyhf', 'Movies', 'Standard', 'Trending', NULL, 'oawieyove91617189805.mkv', 'v5drgovngi1617189804.jpg', '1994', '00:03:07', 'hfgh', 2, 1, 'yhtgrt-tgryg-1617189804', 1, '2021-03-31 05:23:25', '2021-03-31 05:39:46'),
(24, 'Rasel Rana', 'dsa', 3, 2, 'dsadsa', 'TV Shows', 'Full HD', 'Trending', 'v8w1ldnkv11617191665.mkv', 'dcgy90cqrk1617191665.mkv', 'taelmloaot1617191665.jpg', '1994', '00:03:07', 'hfgh', 1, 1, 'rasel-rana-dsa-1617191665', 1, '2021-03-31 05:54:25', '2021-03-31 05:54:25'),
(25, 'Rasel Rana', 'This is action movie', 4, 1, 'csdfsda', 'TV Shows', 'Full HD', 'Trending', 'hni14wgfsc1617192234.mkv', 'nnaubjx1as1617192234.mp4', 'gawevvsuej1617192234.jpg', '1994', '00:00:17', 'hfgh', 6, 1, 'rasel-rana-this-is-action-movie-1617192234', 1, '2021-03-31 06:03:54', '2021-04-01 03:14:36'),
(26, 'Rasel Rana', 'This is action movie', 3, 1, 'sadas', 'Movies', 'Standard', 'Regular', 'yjybcyswyf1617194125.mkv', 'p54ahmj4qk1617194125.mkv', 'zx2desphzq1617194125.jpg', '1994', '00:09:28', 'dsfsd', 1, 1, 'rasel-rana-this-is-action-movie-1617194125', 1, '2021-03-31 06:35:25', '2021-03-31 06:35:25'),
(27, 'The Shawshank Redemption', 'This is action movie', 3, 2, 'dsadsa', 'Movies', 'Quad HD', 'Trending', 'mn8ic1ta7c1617252171.mp4', 'swkapt7ieg1617252171.mkv', 'a0ipbgcp1e1617252170.jpg', '1994', '00:03:44', 'fvdsfds', 1, 1, 'the-shawshank-redemption-this-is-action-movie-1617252170', 1, '2021-03-31 22:42:51', '2021-03-31 22:42:51'),
(28, 'Rasel Ranads', 'This is action movie', 1, 2, 'dsadas', 'TV Shows', 'Quad HD', 'Trending', 'uio20h0qnc1617252267.mp4', 'vpjfex3ijd1617252267.mkv', 'gnzlzgwe4w1617252266.jpg', '1994', '00:03:44', 'dsfsd', 1, 1, 'rasel-ranads-this-is-action-movie-1617252265', 1, '2021-03-31 22:44:27', '2021-03-31 22:44:27'),
(29, 'Rasel Rana', 'This is action movie', 4, 2, 'zszxZ', 'Movies', 'Full HD', 'Trending', 'cvmabda4kf1617279288.mp4', 'jmzirsyyxc1617279288.mp4', 'nloodr6tf51617279287.jpg', '1994', '00:00:08', 'dsfsd', 1, 2, 'rasel-rana-this-is-action-movie-1617279287', 1, '2021-04-01 06:14:48', '2021-04-01 06:15:54'),
(30, 'Rasel Rana', 'New style', 4, 2, 'dswds', 'TV Shows', 'Full HD', 'Trending', 'n0ir9l7qjo1617310442.mkv', '6rfrpz3bxm1617310442.mkv', 'dxrc4vhm9z1617310441.jpg', '1972', '00:04:09', 'dsad', 1, 1, 'rasel-rana-new-style-1617310441', 1, '2021-04-01 14:54:02', '2021-04-01 14:54:02'),
(31, 'Rasel Ranacx', 'New stylevsfsd', 4, 1, 'fdsfsdf', 'TV Shows', 'Full HD', 'Trending', 'v4akvg9d4p1617310745.mkv', 'e4oubbkk7d1617310745.mkv', 'dd5poudo181617310745.jpg', 'gfdgfd', '00:04:09', 'fdsfs', 2, 1, 'rasel-ranacx-new-stylevsfsd-1617310745', 1, '2021-04-01 14:59:05', '2021-04-04 00:42:31'),
(32, 'Rasel Rana', 'New style', 5, 1, 'esered', 'Movies', 'Standard', 'Trending', '8tcq7ve1ki1617341596.mkv', 'hhous4fplu1617341596.mkv', 'apl0ih3o7c1617341595.jpg', 'gfdg', '00:04:09', 'Qui elit labore cum', 1, 2, 'rasel-rana-new-style-1617341594', 1, '2021-04-01 23:33:16', '2021-04-04 00:42:18'),
(33, 'raselrana1147@gmail.com', 'New style', 5, 2, 'sds', 'TV Shows', 'Standard', 'Regular', 'lhg1wpaoob1617357661.mkv', 'gqfff4ygt81617357661.mkv', '3qtkqzbfwc1617357661.jpg', '1972', '00:04:09', 'Perferendis in incid', 5, 1, 'raselrana1147@gmail.com-new-style-1617357660', 1, '2021-04-02 04:01:01', '2021-04-04 04:19:33'),
(34, 'Rasel Rana', 'New style', 5, 1, 'z', 'Movies', 'Standard', 'Trending', 'vwva3qbril1617357876.mkv', 'nz0fas5xsd1617357876.mkv', 'hlfseastts1617357876.jpg', '2020', '00:04:09', NULL, 1, 1, 'rasel-rana-new-style-1617357876', 1, '2021-04-02 04:04:36', '2021-04-02 04:04:36'),
(35, 'raselrana1147@gmail.com', 'Test Gardener', 5, 1, 'dfd', 'TV Shows', 'Full HD', 'Trending', '3zerzxklht1617358064.mkv', 'iia3torq0f1617358064.mkv', 'cwyrpgwehx1617358064.jpg', 'gfdgfd', '00:04:09', 'Qui elit labore cum', 1, 1, 'raselrana1147@gmail.com-test-gardener-1617358064', 1, '2021-04-02 04:07:44', '2021-04-02 04:07:44'),
(36, 'raselrana1147@gmail.com', 'New style', 5, 2, 'axz', 'Movies', 'Standard', 'Regular', 'dveledwfsx1617358174.mkv', 'vfm3hi86pa1617358174.mkv', '0ehbdfipnw1617358174.jpg', '1972', '00:04:09', 'dsad', 2, 1, 'raselrana1147@gmail.com-new-style-1617358174', 1, '2021-04-02 04:09:34', '2021-04-04 04:19:31'),
(37, 'Rasel Rana', 'New style', 5, 2, 'dgfg', 'Movies', 'Full HD', 'Trending', 'aaujdj3r381617358328.mkv', 'meiodsvpy01617358328.mp4', 'dyjylnbz4q1617358328.jpg', 'gfdgfd', '00:05:20', NULL, 1, 2, 'rasel-rana-new-style-1617358327', 1, '2021-04-02 04:12:08', '2021-04-04 04:12:20'),
(38, 'Rasel Rana', 'New style', 5, 1, 'sdsd', 'Movies', 'Full HD', 'Trending', 'wdn2tpttfi1617358592.mkv', 'z18taixhaf1617358592.mkv', 'tipfumxgmq1617358592.jpg', '2007', '00:05:48', 'Qui elit labore cum', 2, 2, 'rasel-rana-new-style-1617358591', 1, '2021-04-02 04:16:32', '2021-04-04 01:25:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_name_unique` (`language_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_types`
--
ALTER TABLE `movie_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movie_types_type_name_unique` (`type_name`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchase_packages`
--
ALTER TABLE `purchase_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trinsaction_number` (`transaction_number`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traillers`
--
ALTER TABLE `traillers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `traillers_thumbnail_unique` (`thumbnail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movie_types`
--
ALTER TABLE `movie_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_packages`
--
ALTER TABLE `purchase_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `traillers`
--
ALTER TABLE `traillers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
