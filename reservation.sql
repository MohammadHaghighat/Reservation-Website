-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2023 at 07:40 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

DROP TABLE IF EXISTS `durations`;
CREATE TABLE IF NOT EXISTS `durations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `count` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `each_price` int(11) NOT NULL,
  `first_price` int(11) NOT NULL,
  `bank_address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `profs` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `winners` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_reservations`
--

DROP TABLE IF EXISTS `loan_reservations`;
CREATE TABLE IF NOT EXISTS `loan_reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `cover` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `images` text COLLATE utf8mb4_persian_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `tel` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `floors` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `has_elevator` varchar(1) COLLATE utf8mb4_persian_ci NOT NULL,
  `has_parking` varchar(1) COLLATE utf8mb4_persian_ci NOT NULL,
  `has_resturant` varchar(1) COLLATE utf8mb4_persian_ci NOT NULL,
  `has_kitchen` varchar(1) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `city`, `cover`, `images`, `address`, `tel`, `floors`, `has_elevator`, `has_parking`, `has_resturant`, `has_kitchen`, `description`) VALUES
(2, '1', '2', '', 'a:0:{}', '3', '4', '0', '0', '0', '0', '0', '<p>789</p>\r\n'),
(3, '1', '1', '', 'a:0:{}', '1', '1', '1', '0', '0', '0', '0', '<p>1</p>\r\n'),
(4, '112', '1212', '', 'a:0:{}', '123', '123123', '123123', '0', '0', '1', '0', '<p>123123</p>\r\n'),
(5, '1', '2', '', 'a:0:{}', '3', '4', '5', '1', '1', '1', '1', '<p>6</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `loc_reservations`
--

DROP TABLE IF EXISTS `loc_reservations`;
CREATE TABLE IF NOT EXISTS `loc_reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `  loc_reservelist_id` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loc_reservelist`
--

DROP TABLE IF EXISTS `loc_reservelist`;
CREATE TABLE IF NOT EXISTS `loc_reservelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `url` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `parent_id`, `status`, `sort`) VALUES
(1, 'صفحه اصلی', 'index.php', 0, 1, 1),
(2, 'درباره ما', 'index.php?controller=page&action=detail&id=1', 0, 1, 3),
(3, 'فروشگاه', 'index.php?controller=product&action=list', 0, 1, 2),
(6, 'موبایل', 'index.php?controller=product&action=list&category=موبایل', 3, 1, 21),
(7, 'لپ تاپ', 'index.php?controller=product&action=list&category=لپ تاپ', 3, 1, 22),
(8, 'کنسول بازی', 'index.php?controller=product&action=list&category=کنسول بازی', 3, 1, 23),
(9, 'تماس با ما', 'index.php?controller=page&action=detail&id=2', 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `release_date` datetime NOT NULL,
  `category` enum('loan','location') NOT NULL,
  `status` enum('published','draft') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `body`, `release_date`, `category`, `status`) VALUES
(1, '1111', 'public/admin/images/news/1111/img-8832.jpg', '', '2023-06-27 02:06:06', 'location', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `text` text COLLATE utf8mb4_persian_ci NOT NULL,
  `status` enum('published','draft') COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `text`, `status`) VALUES
(1, 'درباره ما', '<p>شرکت ما در سال ۱۳۹۶ با ۳ نفر شروع به کار کرد. در ابتدای کار مشکلات بسیاری در راه ما قرار گرفت ولی با پشتکار بسیار و توکل به خداوند متعال توانستیم مشکلات را یکی پس از دیگری پشت سر بگذاریم.</p>\r\n\r\n<p>هم اکنون در رتبه ۹۵ در بین سایت های برتر ایران قرار داریم و برای پیشرفت تلاش میکنیم.</p>\r\n\r\n<p>امیدواریم خرید خوبی را با سایت Store داشته باشید...</p>\r\n', 'published'),
(2, 'تماس با ما', '<h3>فروشگاه اینترنتی Store</h3>\r\n\r\n<p><strong>آدرس:&nbsp;</strong>تهران ، ...</p>\r\n\r\n<p><strong>تلفن تماس:&nbsp;</strong>55566678-021</p>\r\n\r\n<p><strong>ایمیل:&nbsp; AlizadeMatin@gmail.com&nbsp;,&nbsp;Haghighat.Mohammad.2020@gmail.com</strong></p>\r\n', 'published'),
(3, 'سوالات متداول', '<p><strong>1-چطور میتوانم مشخصات کاربری و ایمیل خود را ویرایش کنم؟</strong></p>\r\n\r\n<ul>\r\n	<li>با وارد کردن ایمیل و گذرواژه&nbsp;وارد حساب کاربری خود شوید.</li>\r\n	<li>روی گزینه &quot; ویرایش اطلاعات کاربری &quot; کلیک کرده و اطلاعات خود را ویرایش&nbsp;کنید.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2- برای خرید از وبسایت، حتما باید در سایت عضو باشم ؟</strong></p>\r\n\r\n<ul>\r\n	<li>بله. قبل از خرید میبایست&nbsp;ثبت نام کنید.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3- چگونه میتوانم یک پروفایل ایجاد کنم؟</strong></p>\r\n\r\n<ul>\r\n	<li>در وب سایت روی گزینه &quot;ثبت نام&quot; کلیک کنید. میتوانید با استفاده از ایمیل&nbsp;ثبت نام خود را انجام دهید.</li>\r\n	<li>سپس روی گزینه &quot; ویرایش اطلاعات کاربری &quot;&nbsp;کلیک و اطلاعات خود را تکمیل نمایید.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4- چگونه یک کلمه عبور امن ایجاد کنیم ؟</strong></p>\r\n\r\n<ul>\r\n	<li>یکی از راه&zwnj;هایی که از نفوذ هکرها و مجرمان سایبری به حساب&zwnj;های کاربری و حریم شخصی شما جلوگیری می&zwnj;کند، ساخت و استفاده از یک گذرواژه قوی و غیرقابل حدس است.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5-&nbsp;می&rlm;&zwnj;توانم سفارشم را تلفنی ثبت کنم؟</strong></p>\r\n\r\n<ul>\r\n	<li>&nbsp;خیر، امکان ثبت سفارش بصورت تلفنی امکان پذیر نیست.</li>\r\n</ul>\r\n', 'published'),
(4, 'ثبت شکایات و پیشنهادات', '<p style=\"direction: rtl;\">به منظور بهبود خدمات رسانی مجموعه پذیرای تمام پیشنهادات و شکایات شما مشتریان گرامی هستیم .</p>\r\n\r\n<p style=\"direction: rtl;\">میتوانید جهت ارتباط و ثبت شکایات خود با شماره ثابت 55566678-021</p>\r\n\r\n<p style=\"direction: rtl;\">و تلفن همراه 09128957065 و یا از طریق صندوق های پستی <strong>AlizadeMatin@gmail.com&nbsp;,&nbsp;Haghighat.Mohammad.2020@gmail.com</strong>&nbsp;&nbsp; با ما در میان بگذارید .</p>\r\n\r\n<p style=\"direction: rtl;\">با سپاس .</p>\r\n', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_option` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `value` text COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `site_option`, `value`) VALUES
(1, 'title', 'سامانه رفاهی و رزرو اماکن اقامتی'),
(2, 'address', 'شرکت ما در سال ۱۳۹۶ با ۳ نفر شروع به کار کرد. در ابتدای کار مشکلات بسیاری در راه ما قرار گرفت ولی با پشتکار بسیار و توکل به خداوند متعال توانستیم مشکلات را یکی پس از دیگری پشت سر بگذاریم.\r\n\r\nهم اکنون در رتبه ۹۵ در بین سایت های برتر ایران قرار داریم و برای پیشرفت تلاش میکنیم.\r\n\r\nامیدواریم خرید خوبی را با سایت Store داشته باشید...'),
(3, 'footer', 'طراحی و پیاده سازی توسط محمد حقیقت و متین علیزاده1'),
(4, 'logo', 'public/admin/images/setting/logo/img-5719.png'),
(5, 'tel', '0255220022022'),
(6, 'fax', '021555520250');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `url` text COLLATE utf8mb4_persian_ci NOT NULL,
  `image_path` varchar(512) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `url`, `image_path`) VALUES
(1, 'نقد و بررسی کنسول بازی سونی مدل Playstation 5 ظرفیت 825 گیگابایت', 'index.php?controller=product&action=detail&id=12', 'public/admin/images/slider/نقد و بررسی کنسول بازی PS5/img-1983.jpg'),
(2, 'نقد و برسی گوشی موبایل iPhone 12 Pro Max A2412 ظرفیت 256 گیگابایت', 'index.php?controller=product&action=detail&id=9', 'public/admin/images/slider/نقد و برسی گوشی موبایل iPhone 12 Pro Max A2412 ظرفیت 256 گیگابایت/img-2230.jpg'),
(3, 'نقد و بررسی گوشی موبایل سامسونگ مدل Galaxy S20 ظرفیت 128 گیگابایت', 'index.php?controller=product&action=detail&id=7', 'public/admin/images/slider/نقد و بررسی گوشی موبایل سامسونگ مدل Galaxy S20 ظرفیت 128 گیگابایت/img-5924.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `father_name` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `code_melli` varchar(15) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(1024) COLLATE utf8mb4_persian_ci NOT NULL,
  `grade` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `image_path` varchar(128) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_persian_ci NOT NULL DEFAULT 'user',
  `birth_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `father_name`, `code_melli`, `password`, `grade`, `image_path`, `role`, `birth_date`, `created_at`, `updated_at`) VALUES
(1, 'محمد', 'حقیقت', '5555', '0024501034', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'لیسانس', 'public/admin/images/users/mohammad.m.h.f.16@gmail.com/img-6690.jpg', 'admin', '0220-02-02 00:00:00', '2020-09-06 15:27:48', '2023-06-18 14:51:59'),
(2, 'متین', 'علیزاده', '0', '11', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'public/admin/images/users/alizadehmatin@gmail.com/img-6039.jpg', 'user', '2000-06-22 00:00:00', '2020-12-24 01:34:48', '2023-06-18 14:51:59'),
(3, 'سعید', 'هاشمی', '0', '23', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', 'user', '1999-12-08 00:00:00', '2021-01-02 18:07:07', '2023-06-18 14:51:59'),
(4, 'حمید', 'عباسی', '0', '22', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'public/admin/images/users/hamidabbasi@gmail.com/img-6700.jpg', 'user', '1990-01-01 00:00:00', '2021-01-10 23:53:07', '2023-06-18 14:51:59'),
(6, 'علی', '123', '123', '123', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '123', '', 'user', '2000-02-02 00:00:00', '2023-06-21 19:07:49', '2023-06-21 19:07:49'),
(7, '33', '22', '2222', '11212', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '22222', '', 'user', '2200-02-02 00:00:00', '2023-06-21 19:20:05', '2023-06-21 19:20:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
