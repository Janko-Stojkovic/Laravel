-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 06:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `listed`, `created_at`, `updated_at`) VALUES
(1, 'Rolex', 1, NULL, NULL),
(2, 'Tissot', 1, NULL, NULL),
(3, 'Hublot', 1, NULL, NULL),
(4, 'Fossil', 1, NULL, NULL),
(5, 'Tommy Hilfiger', 1, NULL, NULL),
(6, 'Bvlgari', 1, NULL, NULL),
(7, 'Citizen', 1, NULL, NULL),
(8, 'Patek Philippe', 1, NULL, NULL),
(9, 'Cartier', 1, NULL, NULL),
(10, 'Montblanc', 1, NULL, NULL),
(11, 'Piaget', 1, NULL, NULL),
(12, 'Casio', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `feedback`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lora Grill', 'Get closer than ever to your customers. So close, in fact, that you tell them what they need well before they realize it themselves.', 'c2.jpg', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(2, 'Smith Roy', 'A satisfied customer\n									 is one who will continue to buy from you,\n									  seldom shop around, refer other customers and in general\n									 be a superstar advocate for your business.', 'c1.jpg', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(3, 'John Lee', 'I always want to know whether the customers are satisfied;\n									customer satisfaction is, after all, my ultimate goal!', 'c3.jpg', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(4, 'Steve Jobs', 'There is\n									 a big difference between a satisfied customer\n									 and a loyal customer. Never settle for ‘satisfied’', 'c4.jpg', '2022-12-11 16:26:45', '2022-12-11 16:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_products`
--

CREATE TABLE `home_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brandId` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_products`
--

INSERT INTO `home_products` (`id`, `brandId`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'grid-1.jpg', NULL, NULL),
(2, 6, 'grid2.jpg', NULL, NULL),
(3, 2, 'grid3.jpg', NULL, NULL),
(4, 7, 'grid4.jpg', NULL, NULL),
(5, 3, 'grid5.jpg', NULL, NULL),
(6, 5, 'grid6.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `route`, `order`, `admin`) VALUES
(1, 'Home', NULL, 'home', 1, 0),
(2, 'About', NULL, 'about', 2, 0),
(3, 'Shop', NULL, 'shop', 3, 0),
(4, 'Contact', NULL, 'contact', 4, 0),
(5, 'Dashboard', 'fas fa-tachometer-alt', 'admin.dashboard', 1, 1),
(6, 'Actions', 'fas fa-tasks', 'admin.actions', 2, 1),
(7, 'Users', 'fa fa-user', 'admin.users.index', 3, 1),
(8, 'Products', 'fas fa-equals', 'admin.products.index', 4, 1),
(9, 'Brands', 'fas fa-equals', 'admin.brands.index', 5, 1),
(10, 'Orders', 'fas fa-shopping-cart', 'admin.orders', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_11_28_160540_create_brands_table', 1),
(5, '2022_11_28_163433_create_products_table', 1),
(6, '2022_11_28_170546_create_customers_table', 1),
(7, '2022_11_29_132739_create_menus_table', 1),
(8, '2022_11_29_195204_create_home_products_table', 1),
(9, '2022_12_07_151428_create_roles_table', 1),
(10, '2022_12_07_212600_create_users_table', 1),
(11, '2022_12_08_142255_create_carts_table', 1),
(12, '2022_12_08_185016_create_orders_table', 1),
(13, '2022_12_09_195915_create_contacts_table', 1),
(14, '2022_12_09_235658_create_action_log_table', 1),
(15, '2022_12_09_235816_create_access_logs_table', 1),
(16, '2022_12_10_123719_create_ordered_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandId` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageHover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brandId`, `price`, `image`, `imageHover`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Powermatic 80 Black Men\'s Watch', 2, '794.99', 'shop-1.jpg', 'shop-11.jpg', 'Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Black dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(2, 'Endurer Chronograph Automatic Black Dial Men\'s Watch', 7, '15999.99', 'shop-2.jpg', 'shop-22.jpg', 'Stainless steel case with a black rubber strap. Fixed bezel. Black dial with silver-tone hands and index hour markers. Dial Type: Analog. Luminescent hands and markers. Date display at the 12 o\'clock position.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(3, 'Ballon Bleu Silver Diamond Dial 18kt Pink Gold Ladies Watch', 9, '16099.99', 'shop-3.jpg', 'shop-33.jpg', 'Cartier Ballon Bleu Silver Dial 18K Rose Gold Ladies Watch W6900256. Quartz movement. Caliber 057. Round 18k rose gold case 28.0 mm in diameter.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(4, 'Quartz Mother of Pearl Dial Ladies Watch', 6, '7450.00', 'shop-4.jpg', 'shop-44.jpg', 'Popular series \'Bulgari Bulgari\' representing Bvlgari. The brand logo engraved around the bezel and the simple and elegant design are popular. ', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(5, 'Calatrava Pilot Travel Time 18kt White Gold Automatic Men\'s Watch', 8, '55590.59', 'shop-5.jpg', 'shop-55.jpg', '8kt white gold case with a brown calfskin leather strap. Fixed white 18kt white gold bezel. Blue varnished dial with luminous sword-shaped hands and Arabic numeral hour markers.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(6, 'Open Box - Tommy Hilfiger Sport Champagne Dial Men\'s Watch', 5, '164.95', 'shop-6.jpg', 'shop-66.jpg', 'VERSATILE AND CONTEMPORARY: A 44mm case with slim bezel and brushed curved dial with textured sub-eyes and iconic Tommy Hilfiger tipped hands.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(7, 'Blue Altiplano Ultra-This Hand Wind Men\'s Watch', 11, '27100.00', 'shop-7.jpg', 'shop-77.jpg', '18kt rose gold case with a blue (alligator) leather strap. Fixed 18kt rose gold bezel. Blue dial with rose gold hands. No markers. Dial Type: Analog.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(8, 'Datejust 36mm Automatic Chronometer Diamond Pink Dial Ladies Watch', 1, '12915.00', 'shop-8.jpg', 'shop-88.jpg', 'Stainless steel case with a stainless steel Rolex oyster bracelet. Fixed 18kt white gold bezel set with diamonds.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(9, 'Boheme Silver Dial Black Leather Ladies Watch', 10, '1950.00', 'shop-9.jpg', 'shop-99.jpg', 'Display model. Excellent condition. Comes with an original box and the seller\'s warranty card. No manuals.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(10, 'Baby G Shock Resistant Black Multi-Function Sport Ladies Watch', 12, '64.00', 'shop-10.jpg', 'shop-1010.jpg', 'Slip on a splash of clean, fresh color with an eye-catcher inspired by the popular design of the G-SHOCK GA-110.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(11, 'GMT-Master II Pepsi Blue and Red Bezel Stainless Steel Jubilee Men\'s Watch', 1, '35500.00', 'shop-p11.jpg', 'shop-1111.jpg', 'Designed to show the time in two different time zones simultaneously, the GMT-Master, launched in 1955, was originally developed as a navigation instrument for professionals criss-crossing the globe.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(12, 'Lady Heart Flower Automatic White Mother of Pearl Dial Ladies Watch', 2, '795.00', 'shop-12.jpg', 'shop-1212.jpg', 'Case Size: 35.00 mm, Band Width: 16, Case Thickness: 9.75 mm. Swiss automatic movement, 316L stainless steel case, Index + Arabic dial type', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(13, 'Classic Fusion Automatic Blue Sunray Dial Titanium Men\'s Watch', 3, '6150.00', 'shop-13.jpg', 'shop-1313.jpg', 'STUNNING Hublot Classic Fusion 45 in Titanium with the Blue Dial on Dark Blue Alligator Strap & Deploy Clasp!', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(14, 'Classic Fusion Titanium Black Dial Black Rubber Ladies Watch', 3, '4325.00', 'shop-14.jpg', 'shop-1414.jpg', 'Titanium case with a black rubber strap. Fixed titanium bezel. Black composite resin bezel lug sandwiched between the bezel and case. Black dial with rhodium-plated hands and index hour markers.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(15, 'Georgia Beige Dial Sand Tan Leather Ladies Watch', 4, '164.95', 'shop-15.jpg', 'shop-1515.jpg', 'Stainless steel case with a sand tan leather strap. Fixed stainless steel bezel. Beige dial with luminous silver-tone hands and index hour markers. Arabic numerals mark the 6 and 12 o\'clock positions.', '2022-12-11 16:26:45', '2022-12-11 16:26:45'),
(16, 'Star Classique Date Stainless Steel Brown Leather Men\'s Watch', 10, '2290.00', 'shop-16.jpg', 'shop-1616.jpg', 'Stainless steel case with a brown (alligator) leather strap. Fixed stainless steel bezel. Silver dial with silver-tone hands and stick hour markers. An Arabic numeral appears at the 12 o\'clock position.', '2022-12-11 16:26:45', '2022-12-11 16:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 1, '2022-12-11 16:26:45', NULL),
(2, 'test2', 'test2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2022-12-11 16:26:45', NULL),
(3, 'testAdmin1', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 2, '2022-12-11 16:26:45', NULL),
(4, 'testAdmin2', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', 2, '2022-12-11 16:26:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_products`
--
ALTER TABLE `home_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_products_brandid_foreign` (`brandId`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_order_admin_unique` (`order`,`admin`),
  ADD UNIQUE KEY `menus_name_admin_unique` (`name`,`admin`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_products`
--
ALTER TABLE `home_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `home_products`
--
ALTER TABLE `home_products`
  ADD CONSTRAINT `home_products_brandid_foreign` FOREIGN KEY (`brandId`) REFERENCES `brands` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
