-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2026 at 07:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betsiteprovider`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `title` varchar(255) NOT NULL DEFAULT '',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) NOT NULL DEFAULT '',
  `breadcrumb_title` varchar(255) NOT NULL DEFAULT '',
  `breadcrumb_image` varchar(255) NOT NULL DEFAULT '',
  `mv_main_title` varchar(255) NOT NULL DEFAULT '',
  `mv_description` text DEFAULT NULL,
  `mission_title` varchar(255) NOT NULL DEFAULT '',
  `mission_description` text DEFAULT NULL,
  `vision_title` varchar(255) NOT NULL DEFAULT '',
  `vision_description` text DEFAULT NULL,
  `company_short_title` varchar(255) NOT NULL DEFAULT '',
  `company_main_title` varchar(255) NOT NULL DEFAULT '',
  `company_description` text DEFAULT NULL,
  `company_image` varchar(255) NOT NULL DEFAULT '',
  `card1_title` varchar(255) NOT NULL DEFAULT '',
  `card1_description` text DEFAULT NULL,
  `card2_title` varchar(255) NOT NULL DEFAULT '',
  `card2_description` text DEFAULT NULL,
  `card3_title` varchar(255) NOT NULL DEFAULT '',
  `card3_description` text DEFAULT NULL,
  `card4_title` varchar(255) NOT NULL DEFAULT '',
  `card4_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `language`, `title`, `meta_title`, `meta_description`, `meta_keywords`, `breadcrumb_title`, `breadcrumb_image`, `mv_main_title`, `mv_description`, `mission_title`, `mission_description`, `vision_title`, `vision_description`, `company_short_title`, `company_main_title`, `company_description`, `company_image`, `card1_title`, `card1_description`, `card2_title`, `card2_description`, `card3_title`, `card3_description`, `card4_title`, `card4_description`) VALUES
(1, 'English', 'Betting Site Provider  |  About Us', 'Betting Site Provider |  About Us', 'Learn about PixelMod, a reliable, high-performance game and web hosting provider committed to giving gamers and businesses a seamless online experience.', 'about us, pixelmod, game hosting, web hosting, hosting company', 'About Us', '20260808183751-1131.jpg', 'Your Game Deserves The Best Hosting', 'Mission & Vision', 'Our Mission', 'At PixelMod, our mission is to provide gamers with reliable, high-performance hosting solutions that enhance their gaming experience. We are committed to delivering exceptional service and support, ensuring that every player can connect and enjoy seamless gameplay.', 'Our Vision', 'Our vision is to become the leading provider of web hosting services by consistently delivering cutting-edge solutions and exceeding customer expectations. We aim to foster a community where businesses of all sizes can thrive online, leveraging our secure, scalable, and user-friendly hosting platforms.', 'About Our Company', 'Built By Gamers, For Gamers', 'PixelMod was founded with a single goal in mind, to give gamers and businesses the fast, secure and reliable hosting they deserve. From humble beginnings to a growing global community, we have stayed focused on performance, support, and trust every step of the way.', '20260808184522-1787.png', '99.9% Uptime Guarantee', 'Lorem ipsum dolor sit amet, cons dectetur adipis cing elit sed dolor.', 'Money Back Guarantee', 'Lorem ipsum dolor sit amet, cons dectetur adipis cing elit sed dolor.', 'Free Let\'s Encrypt SSL', 'Lorem ipsum dolor sit amet, cons dectetur adipis cing elit sed dolor.', 'Advanced Management', 'Lorem ipsum dolor sit amet, cons dectetur adipis cing elit sed dolor.'),
(2, 'Bengali', 'বেটিং সাইট প্রোভাইডার | আমাদের সম্পর্কে', 'PixelMod | আমাদের সম্পর্কে', 'PixelMod সম্পর্কে জানুন, একটি নির্ভরযোগ্য, উচ্চ-পারফরম্যান্স গেম এবং ওয়েব হোস্টিং প্রদানকারী যা গেমার ও ব্যবসাকে নিরবচ্ছিন্ন অনলাইন অভিজ্ঞতা দিতে প্রতিশ্রুতিবদ্ধ।', 'আমাদের সম্পর্কে, পিক্সেলমড, গেম হোস্টিং, ওয়েব হোস্টিং, হোস্টিং কোম্পানি', 'আমাদের সম্পর্কে', '20260808183751-1131.jpg', 'আপনার গেম প্রাপ্য সেরা হোস্টিং', 'লক্ষ্য ও উদ্দেশ্য', 'আমাদের লক্ষ্য', 'PixelMod-এ, আমাদের লক্ষ্য হলো গেমারদের নির্ভরযোগ্য, উচ্চ-পারফরম্যান্স হোস্টিং সমাধান প্রদান করা যা তাদের গেমিং অভিজ্ঞতা বাড়িয়ে তোলে। আমরা ব্যতিক্রমী সেবা ও সহায়তা প্রদানে প্রতিশ্রুতিবদ্ধ, যাতে প্রতিটি খেলোয়াড় নির্বিঘ্নে সংযুক্ত থেকে গেম উপভোগ করতে পারে।', 'আমাদের দৃষ্টিভঙ্গি', 'আমাদের দৃষ্টিভঙ্গি হলো ধারাবাহিকভাবে অত্যাধুনিক সমাধান প্রদান করে এবং গ্রাহকদের প্রত্যাশা ছাড়িয়ে গিয়ে ওয়েব হোস্টিং সেবার শীর্ষস্থানীয় প্রদানকারী হয়ে ওঠা। আমরা এমন একটি কমিউনিটি গড়ে তুলতে চাই যেখানে সব আকারের ব্যবসা আমাদের নিরাপদ, স্কেলযোগ্য ও ব্যবহারকারী-বান্ধব হোস্টিং প্ল্যাটফর্মের মাধ্যমে অনলাইনে সফল হতে পারে।', 'আমাদের কোম্পানি সম্পর্কে', 'গেমারদের দ্বারা, গেমারদের জন্য তৈরি', 'PixelMod প্রতিষ্ঠিত হয়েছিল একটি লক্ষ্য নিয়ে, গেমার ও ব্যবসাগুলোকে দ্রুত, নিরাপদ এবং নির্ভরযোগ্য হোস্টিং প্রদান করা, যা তারা প্রাপ্য। বিনম্র শুরু থেকে একটি ক্রমবর্ধমান বৈশ্বিক কমিউনিটি পর্যন্ত, আমরা প্রতিটি পদক্ষেপে পারফরম্যান্স, সহায়তা এবং বিশ্বাসের উপর মনোযোগ ধরে রেখেছি।', '20260808184522-1787.png', '৯৯.৯% আপটাইম গ্যারান্টি', 'লরেম ইপসাম ডলার সিট আমেট, কনস ডেকটেটুর অ্যাডিপিস সিং এলিট সেড ডলার।', 'মানি ব্যাক গ্যারান্টি', 'লরেম ইপসাম ডলার সিট আমেট, কনস ডেকটেটুর অ্যাডিপিস সিং এলিট সেড ডলার।', 'ফ্রি লেটস এনক্রিপ্ট এসএসএল', 'লরেম ইপসাম ডলার সিট আমেট, কনস ডেকটেটুর অ্যাডিপিস সিং এলিট সেড ডলার।', 'অ্যাডভান্সড ম্যানেজমেন্ট', 'লরেম ইপসাম ডলার সিট আমেট, কনস ডেকটেটুর অ্যাডিপিস সিং এলিট সেড ডলার।');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `group_id` int(11) DEFAULT NULL,
  `shor_title` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `short_desc` text NOT NULL,
  `cta_title` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `language`, `group_id`, `shor_title`, `title`, `short_desc`, `cta_title`, `image`, `status`, `created_at`) VALUES
(1, 'English', 1, 'Connect, Compete, Conquer', 'Seamless Hosting Endless Gaming', 'Lag-free, powerful servers designed to give you the  ultimate gaming experience.', 'Contact Us', '20260818200144-1525.png', 1, '2026-08-08 17:54:44'),
(2, 'Bengali', 1, 'সংযোগ স্থাপন করুন, প্রতিযোগিতা করুন, জয় করুন', 'নিরবচ্ছিন্ন হোস্টিং, অফুরন্ত গেমিং', 'আপনাকে সেরা গেমিং অভিজ্ঞতা দেওয়ার জন্য তৈরি, ল্যাগ-মুক্ত ও শক্তিশালী সার্ভার।', 'আমাদের সাথে যোগাযোগ করুন', '20260818200144-1525.png', 1, '2026-08-08 17:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `language` varchar(50) DEFAULT '',
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `title_url` varchar(255) DEFAULT '',
  `blog_image` varchar(255) DEFAULT '',
  `image_alt` varchar(255) DEFAULT '',
  `page_title` varchar(255) DEFAULT '',
  `meta_title` varchar(255) DEFAULT '',
  `meta_detail` text DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(1) DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `language`, `group_id`, `name`, `title_url`, `blog_image`, `image_alt`, `page_title`, `meta_title`, `meta_detail`, `details`, `created_at`, `status`) VALUES
(4, 'Test', 'English', 4, 'bdbetsolution', 'test', '20260808190005-2232.jpeg', 'test', 'Ready to Launch Your Betting Business?', '', 'Partner with Bdbetexpert to launch a professional Sportsbook Solution in Bangladesh with White Label Betting Websites, casino API integration, secure payment solutions, and dedicated technical support.', '<h4><strong>Best Sportsbook Solution in Bangladesh: Complete Guide</strong></h4><p>The online betting industry in Bangladesh is growing rapidly, creating new opportunities for entrepreneurs who want to start their own betting business. Choosing the right <strong>Sportsbook Solution in Bangladesh</strong> is one of the most important decisions because it directly affects your platform\'s performance, user experience, and business growth.</p><p>Whether you\'re planning to launch a <strong>White Label Betting Website</strong> or a fully branded sportsbook platform, understanding the available solutions will help you make the right choice.</p><p>In this guide, we\'ll explain everything you need to know about choosing the best sportsbook solution for your betting business.</p><h4><strong>What is a Sportsbook Solution?</strong></h4><p>A <strong>Sportsbook Solution</strong> is a complete betting platform that allows businesses to offer online sports betting. It includes everything needed to manage a betting website, including sportsbook software, odds management, user accounts, payment gateways, admin panels, reporting tools, and betting markets.</p><p>Most modern sportsbook solutions also support <strong>live betting</strong>, <strong>mobile applications</strong>, and <strong>casino API integration</strong>, allowing operators to provide a complete gaming experience from one platform.</p><h4><strong>Why Sportsbook Solutions Are Popular in Bangladesh</strong></h4><p>The demand for online betting platforms is increasing in Bangladesh. Business owners prefer ready-made sportsbook solutions because they reduce development time and provide all the essential features required to launch quickly.</p><p>A professional sportsbook solution helps operators focus on marketing and customer acquisition instead of spending months building software from scratch.</p><h4><strong>Key Features of the Best Sportsbook Solution</strong></h4><p>When selecting a sportsbook platform, make sure it includes the following features:</p><p><strong>White Label Betting Website : </strong>Launch your own branded betting website with complete customization, including logo, domain, colors, and business settings.</p><p><strong>Live Sports Betting: </strong>Offer real-time betting markets for cricket, football, tennis, basketball, and many other sports.</p><p><strong>Casino API Integration: </strong>Increase player engagement by adding live casino games, slot games, roulette, blackjack, baccarat, Teen Patti, Dragon Tiger, and more.</p><p><strong>Secure Payment Gateway: </strong>Provide fast and secure payment options to improve user trust and transaction reliability.</p><p><strong>Powerful Admin Panel: </strong>Manage users, agents, payments, betting markets, reports, and platform settings from one centralized dashboard.</p><p><strong>Mobile-Friendly Platform : </strong>Ensure your betting website works smoothly across desktop, Android, and iOS devices.</p><h4><strong>White Label Sportsbook vs Custom Development</strong></h4><p>Many operators compare <strong>White Label Sportsbook Solutions</strong> with custom development.</p><p>A White Label solution is ideal for businesses that want to launch quickly with lower investment and built-in technical support.</p><p>Custom development offers complete flexibility but usually requires more time, higher costs, and a dedicated development team.</p><p>For most businesses in Bangladesh, a <strong>White Label Sportsbook Solution</strong> is the faster and more cost-effective option.</p><h4><strong>Why Choose Bdbetexpert?</strong></h4><p>Bdbetexpert provides advanced <strong>Sportsbook Solutions in Bangladesh</strong> designed for startups, operators, and growing betting businesses.</p><p>Our solutions include:</p><ul><li>White Label Betting Websites</li><li>Sportsbook Platforms</li><li>B2B Betting Platforms</li><li>B2C Betting Websites</li><li>Casino API Integration</li><li>Secure Payment Gateway Integration</li><li>Android &amp; iOS Support</li><li>Complete Branding</li><li>Fast Deployment</li><li>24/7 Technical Support</li></ul><p>We help businesses launch secure, scalable, and high-performance betting platforms tailored to the Bangladesh market.</p><h4><strong>Final Thoughts</strong></h4><p>Choosing the right <strong>Sportsbook Solution in Bangladesh</strong> is essential for building a successful betting business.</p><p>If you want to launch quickly, reduce development costs, and access modern betting technology, a <strong>White Label Sportsbook Solution</strong> is the ideal choice.</p><p>With Bdbetexpert, you receive a complete betting platform, premium sportsbook features, casino API integration, and ongoing technical support to help your business grow.</p><h4><strong>Frequently Asked Questions</strong></h4><p><strong>What is a Sportsbook Solution?</strong></p><p>A Sportsbook Solution is a complete betting platform that enables businesses to offer online sports betting with sportsbook software, payment gateways, and admin management tools.</p><p><strong>Why should I choose a White Label Sportsbook Solution?</strong></p><p>A White Label Sportsbook Solution helps you launch your betting business faster, reduces development costs, and provides complete branding with ongoing technical support.</p><p><strong>Does Bdbetexpert provide Sportsbook Solutions in Bangladesh?</strong></p><p>Yes. Bdbetexpert offers complete <strong>Sportsbook Solutions in Bangladesh</strong>, including White Label Betting Websites, B2B &amp; B2C betting platforms, casino API integration, and payment gateway solutions.</p><p><strong>Can I customize my sportsbook platform?</strong></p><p>Yes. You can customize your logo, domain, colors, payment methods, betting markets, sportsbook settings, and many other platform features.</p><p><strong>Ready to Launch Your Betting Business?</strong></p><p>Partner with <strong>Bdbetexpert</strong> to launch a professional <strong>Sportsbook Solution in Bangladesh</strong> with White Label Betting Websites, casino API integration, secure payment solutions, and dedicated technical support.</p><p><strong>👉 Request a Free Demo Today</strong></p>', '2026-08-08 19:00:05', 'Y'),
(5, 'পরীক্ষা', 'Bengali', 4, 'bdbetsolution', 'test', '20260808190005-2232.jpeg', 'পরীক্ষা', 'আপনার বেটিং ব্যবসা শুরু করতে প্রস্তুত?', 'আপনার বেটিং ব্যবসা শুরু করতে প্রস্তুত?', 'আপনার বেটিং ব্যবসা শুরু করতে প্রস্তুত?', '<h2>বাংলাদেশে সেরা স্পোর্টসবুক সলিউশন: সম্পূর্ণ গাইড</h2><p>বাংলাদেশে অনলাইন বেটিং ইন্ডাস্ট্রি দ্রুত বৃদ্ধি পাচ্ছে, ফলে যারা নিজেদের বেটিং ব্যবসা শুরু করতে চান তাদের জন্য নতুন সুযোগ তৈরি হচ্ছে। সঠিক <strong>Sportsbook Solution in Bangladesh</strong> নির্বাচন করা অত্যন্ত গুরুত্বপূর্ণ, কারণ এটি আপনার প্ল্যাটফর্মের পারফরম্যান্স, ইউজার এক্সপেরিয়েন্স এবং ব্যবসার প্রবৃদ্ধির ওপর সরাসরি প্রভাব ফেলে।</p><p>আপনি যদি <strong>White Label Betting Website</strong> অথবা সম্পূর্ণ নিজস্ব ব্র্যান্ডের sportsbook platform চালু করতে চান, তাহলে বিভিন্ন ধরনের sportsbook solution সম্পর্কে জানা আপনাকে সঠিক সিদ্ধান্ত নিতে সাহায্য করবে।</p><p>এই গাইডে আমরা আপনার বেটিং ব্যবসার জন্য সেরা sportsbook solution নির্বাচন করার ক্ষেত্রে গুরুত্বপূর্ণ বিষয়গুলো বিস্তারিতভাবে আলোচনা করব।</p><h2>Sportsbook Solution কী?</h2><p>একটি <strong>Sportsbook Solution</strong> হলো একটি সম্পূর্ণ বেটিং প্ল্যাটফর্ম, যার মাধ্যমে ব্যবসায়ীরা অনলাইন স্পোর্টস বেটিং সেবা প্রদান করতে পারেন। এতে একটি বেটিং ওয়েবসাইট পরিচালনার জন্য প্রয়োজনীয় sportsbook software, odds management, user accounts, payment gateways, admin panel, reporting tools এবং বিভিন্ন betting market অন্তর্ভুক্ত থাকে।</p><p>আধুনিক sportsbook solution-গুলোতে সাধারণত <strong>Live Betting</strong>, <strong>Mobile Applications</strong> এবং <strong>Casino API Integration</strong>-এর সুবিধাও থাকে। এর মাধ্যমে অপারেটররা একটি প্ল্যাটফর্ম থেকেই সম্পূর্ণ gaming experience প্রদান করতে পারেন।</p><h2>বাংলাদেশে Sportsbook Solutions কেন জনপ্রিয়?</h2><p>বাংলাদেশে অনলাইন বেটিং প্ল্যাটফর্মের চাহিদা বৃদ্ধি পাওয়ায় অনেক ব্যবসায়ী ready-made sportsbook solution বেছে নিচ্ছেন। এর মাধ্যমে শুরু থেকেই প্রয়োজনীয় ফিচার পাওয়া যায় এবং নতুন প্ল্যাটফর্ম দ্রুত চালু করা সম্ভব হয়।</p><p>একটি professional sportsbook solution ব্যবহার করলে ব্যবসায়ীরা কয়েক মাস ধরে software development করার পরিবর্তে marketing, customer acquisition এবং business growth-এর ওপর বেশি গুরুত্ব দিতে পারেন।</p><h2>সেরা Sportsbook Solution-এর গুরুত্বপূর্ণ ফিচার</h2><p>একটি sportsbook platform নির্বাচন করার সময় নিচের ফিচারগুলো অবশ্যই বিবেচনা করুন:</p><h3>White Label Betting Website</h3><p>নিজস্ব ব্র্যান্ডের নামে একটি সম্পূর্ণ betting website চালু করার সুবিধা। Logo, domain, colors এবং বিভিন্ন business settings নিজের প্রয়োজন অনুযায়ী customize করা যায়।</p><h3>Live Sports Betting</h3><p>Cricket, football, tennis, basketball এবং অন্যান্য জনপ্রিয় খেলায় real-time betting market এবং live betting সুবিধা প্রদান করা যায়।</p><h3>Casino API Integration</h3><p>Player engagement বাড়ানোর জন্য live casino games, slot games, roulette, blackjack, baccarat, Teen Patti, Dragon Tiger এবং অন্যান্য casino games API-এর মাধ্যমে যুক্ত করা যায়।</p><h3>Secure Payment Gateway</h3><p>দ্রুত এবং নিরাপদ payment options প্রদান করলে user trust এবং transaction reliability বৃদ্ধি পায়।</p><h3>Powerful Admin Panel</h3><p>একটি centralized dashboard থেকে users, agents, payments, betting markets, reports এবং platform settings পরিচালনা করা যায়।</p><h3>Mobile-Friendly Platform</h3><p>আপনার betting website যেন desktop, Android এবং iOS devices-এ দ্রুত ও smoothভাবে কাজ করে তা নিশ্চিত করা গুরুত্বপূর্ণ।</p><h2>White Label Sportsbook বনাম Custom Development</h2><p>অনেক অপারেটর <strong>White Label Sportsbook Solution</strong> এবং custom sportsbook development-এর মধ্যে তুলনা করেন।</p><p>White Label solution তাদের জন্য উপযোগী যারা দ্রুত platform launch করতে চান, কম initial investment করতে চান এবং built-in technical support পেতে চান।</p><p>অন্যদিকে, custom development সম্পূর্ণ flexibility প্রদান করে। তবে এর জন্য বেশি সময়, বেশি খরচ এবং একটি dedicated development team প্রয়োজন হতে পারে।</p><p>বেশিরভাগ ব্যবসার ক্ষেত্রে, দ্রুত launch এবং কম development cost-এর জন্য <strong>White Label Sportsbook Solution</strong> একটি কার্যকর বিকল্প হতে পারে।</p><h2>কেন Bdbetexpert বেছে নেবেন?</h2><p>Bdbetexpert startups, operators এবং growing betting businesses-এর জন্য advanced <strong>Sportsbook Solutions in Bangladesh</strong> প্রদান করে।</p><p>আমাদের solutions-এর মধ্যে রয়েছে:</p><p>White Label Betting Websites</p><p>Sportsbook Platforms</p><p>B2B Betting Platforms</p><p>B2C Betting Websites</p><p>Casino API Integration</p><p>Secure Payment Gateway Integration</p><p>Android &amp; iOS Support</p><p>Complete Branding</p><p>Fast Deployment</p><p>24/7 Technical Support</p><p>আমরা ব্যবসার প্রয়োজন অনুযায়ী secure, scalable এবং high-performance betting platforms তৈরি ও চালু করতে সহায়তা করি।</p><h2>শেষ কথা</h2><p>একটি সফল betting business গড়ে তুলতে সঠিক <strong>Sportsbook Solution in Bangladesh</strong> নির্বাচন করা অত্যন্ত গুরুত্বপূর্ণ।</p><p>আপনি যদি দ্রুত launch করতে চান, development cost কমাতে চান এবং modern betting technology ব্যবহার করতে চান, তাহলে একটি <strong>White Label Sportsbook Solution</strong> আপনার জন্য উপযোগী হতে পারে।</p><p>Bdbetexpert-এর মাধ্যমে আপনি একটি complete betting platform, advanced sportsbook features, casino API integration এবং ongoing technical support পেতে পারেন, যা আপনার business growth-এ সহায়তা করতে পারে।</p><h2>Frequently Asked Questions</h2><h3>Sportsbook Solution কী?</h3><p>Sportsbook Solution হলো একটি complete betting platform, যার মাধ্যমে ব্যবসায়ীরা online sports betting পরিচালনা করতে পারেন। এতে sportsbook software, payment gateways, user management এবং admin management tools থাকে।</p><h3>কেন White Label Sportsbook Solution বেছে নেব?</h3><p>একটি White Label Sportsbook Solution দ্রুত betting business launch করতে সাহায্য করে, development cost কমায় এবং আপনার নিজস্ব branding-এর মাধ্যমে platform পরিচালনার সুযোগ দেয়।</p><h3>Bdbetexpert কি বাংলাদেশে Sportsbook Solutions প্রদান করে?</h3><p>হ্যাঁ। Bdbetexpert <strong>Sportsbook Solutions in Bangladesh</strong> প্রদান করে, যার মধ্যে White Label Betting Websites, B2B &amp; B2C betting platforms, casino API integration এবং payment gateway solutions অন্তর্ভুক্ত রয়েছে।</p><h3>আমি কি আমার sportsbook platform customize করতে পারব?</h3><p>হ্যাঁ। Logo, domain, colors, payment methods, betting markets, sportsbook settings এবং অন্যান্য platform features আপনার ব্যবসার প্রয়োজন অনুযায়ী customize করা যেতে পারে।</p><h2>আপনার Betting Business শুরু করতে প্রস্তুত?</h2><p><strong>Bdbetexpert</strong>-এর সাথে কাজ করে একটি professional <strong>Sportsbook Solution in Bangladesh</strong> চালু করুন। White Label Betting Website, casino API integration, secure payment solutions এবং dedicated technical support-এর মাধ্যমে আপনার betting business-এর জন্য একটি সম্পূর্ণ platform তৈরি করুন।</p><p><strong>👉 আজই Free Demo-এর জন্য Request করুন।</strong></p>', '2026-08-17 12:09:57', 'Y'),
(6, 'Ready-Made Betting Website vs Custom Development for Bangladesh Read ', 'English', 6, 'bdbetsolution', 'ready-made-betting-website-vs-custom-development-bangladesh', '20260818185305-4350.jpg', '', 'When Should You Choose Custom Development?', 'Custom Development is suitable when your business has very specific requirements that cannot be fulfilled by an existing White Label platform.  If you plan to build unique betting features, create a completely different user experience, or develop proprie', 'Custom Development is suitable when your business has very specific requirements that cannot be fulfilled by an existing White Label platform.\r\n\r\nIf you plan to build unique betting features, create a completely different user experience, or develop proprietary technology, then investing in custom development may be the right decision.', '<h4><strong>Ready-Made Betting Website vs Custom Development for Bangladesh</strong></h4><p>Starting an online betting business in Bangladesh is easier than ever, but choosing the right platform is one of the most important decisions you\'ll make. Many business owners compare a <strong>Ready-Made Betting Website</strong> with <strong>Custom Development</strong> before launching their project.</p><p>Both options have their own advantages, but they are designed for different business goals. If you\'re planning to launch your betting business in Bangladesh, this guide will help you understand which option is the better investment.</p><h4>What is a Ready-Made Betting Website?</h4><p>A <strong>Ready-Made Betting Website</strong> is a fully developed betting platform that is ready to launch. It already includes essential features such as a sportsbook, casino games, payment gateway integration, admin panel, and user management system.</p><p>Instead of spending months developing software from scratch, you can customize the platform with your own logo, domain name, colors, and branding before launching it under your business name.</p><p>Today, many betting operators in Bangladesh prefer <strong>White Label Betting Websites</strong> because they save time, reduce development costs, and allow businesses to start accepting users much faster.</p><h4>What is Custom Betting Website Development?</h4><p>Custom Development means creating an entirely new betting platform according to your own requirements. Every feature, design element, and system is built specifically for your business.</p><p>This option gives you complete flexibility, but it also requires a much larger investment, a professional development team, continuous testing, and regular maintenance.</p><p>For businesses that need unique features or enterprise-level solutions, custom development can be a good choice. However, it usually takes much longer before the website is ready for launch.</p><h4>Why Most Businesses in Bangladesh Choose Ready-Made Betting Websites</h4><p>For startups and growing betting businesses, speed matters.</p><p>A <strong>Ready-Made Betting Website</strong> allows you to enter the market quickly without waiting several months for development. Since the platform is already tested and optimized, you can focus on marketing, customer acquisition, and business growth instead of software development.</p><p>Most White Label solutions also include sportsbook features, live casino integration, payment gateway support, and technical maintenance, making them an attractive option for businesses in Bangladesh.</p><h4>When Should You Choose Custom Development?</h4><p>Custom Development is suitable when your business has very specific requirements that cannot be fulfilled by an existing White Label platform.</p><p>If you plan to build unique betting features, create a completely different user experience, or develop proprietary technology, then investing in custom development may be the right decision.</p><p>However, it\'s important to consider the higher costs, longer development timeline, and ongoing maintenance responsibilities before choosing this option.</p>', '2026-08-17 12:17:51', 'Y'),
(7, 'বাংলাদেশের জন্য রেডি-মেড বেটিং ওয়েবসাইট বনাম কাস্টম ডেভেলপমেন্ট &mdash; বিস্তারিত পড়ুন', 'Bengali', 6, 'bdbetsolution', 'ready-made-betting-website-vs-custom-development-bangladesh', '20260818185305-4350.jpg', 'পরীক্ষা', 'বাংলাদেশের জন্য রেডি-মেড বেটিং ওয়েবসাইট বনাম কাস্টম ডেভেলপমেন্ট — বিস্তারিত পড়ুন', 'বাংলাদেশের জন্য রেডি-মেড বেটিং ওয়েবসাইট বনাম কাস্টম ডেভেলপমেন্ট — বিস্তারিত পড়ুন', 'বাংলাদেশের জন্য রেডি-মেড বেটিং ওয়েবসাইট বনাম কাস্টম ডেভেলপমেন্ট — বিস্তারিত পড়ুন', '<h2>বাংলাদেশে সেরা স্পোর্টসবুক সলিউশন: সম্পূর্ণ গাইড</h2><p>বাংলাদেশে অনলাইন বেটিং ইন্ডাস্ট্রি দ্রুত বৃদ্ধি পাচ্ছে, ফলে যারা নিজেদের বেটিং ব্যবসা শুরু করতে চান তাদের জন্য নতুন সুযোগ তৈরি হচ্ছে। সঠিক <strong>Sportsbook Solution in Bangladesh</strong> নির্বাচন করা অত্যন্ত গুরুত্বপূর্ণ, কারণ এটি আপনার প্ল্যাটফর্মের পারফরম্যান্স, ইউজার এক্সপেরিয়েন্স এবং ব্যবসার প্রবৃদ্ধির ওপর সরাসরি প্রভাব ফেলে।</p><p>আপনি যদি <strong>White Label Betting Website</strong> অথবা সম্পূর্ণ নিজস্ব ব্র্যান্ডের sportsbook platform চালু করতে চান, তাহলে বিভিন্ন ধরনের sportsbook solution সম্পর্কে জানা আপনাকে সঠিক সিদ্ধান্ত নিতে সাহায্য করবে।</p><p>এই গাইডে আমরা আপনার বেটিং ব্যবসার জন্য সেরা sportsbook solution নির্বাচন করার ক্ষেত্রে গুরুত্বপূর্ণ বিষয়গুলো বিস্তারিতভাবে আলোচনা করব।</p>', '2026-08-17 12:21:59', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `career_query`
--

CREATE TABLE `career_query` (
  `id` int(11) NOT NULL,
  `language` varchar(50) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `title_url` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `details` longtext DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(1) DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_list`
--

CREATE TABLE `footer_list` (
  `id` int(11) NOT NULL,
  `language` varchar(50) DEFAULT '',
  `link_value` varchar(255) DEFAULT '',
  `link_name` varchar(255) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_list`
--

INSERT INTO `footer_list` (`id`, `language`, `link_value`, `link_name`) VALUES
(1, 'English', 'white-label-betting-websites', 'White Label'),
(2, 'English', 'payment-methods', 'Payment Methods'),
(3, 'English', 'contact-us', 'Contact Us'),
(4, 'Bengali', 'white-label-betting-websites', 'Óª╣ÓºïÓª»Óª╝Óª¥ÓªçÓªƒ Óª▓ÓºçÓª¼ÓºçÓª▓'),
(5, 'Bengali', 'payment-methods', 'Óª¬ÓºçÓª«ÓºçÓª¿ÓºìÓªƒ Óª¬ÓªªÓºìÓªºÓªñÓª┐'),
(6, 'Bengali', 'contact-us', 'Óª»ÓºïÓªùÓª¥Óª»ÓºïÓªù ÓªòÓª░ÓºüÓª¿');

-- --------------------------------------------------------

--
-- Table structure for table `header_images`
--

CREATE TABLE `header_images` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT '',
  `favicon` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_images`
--

INSERT INTO `header_images` (`id`, `logo`, `favicon`, `title`) VALUES
(1, '20260818215333-7447.png', '20260729144315-3179.png', 'bdbetexpert');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) NOT NULL DEFAULT '',
  `about_short_title` varchar(255) NOT NULL DEFAULT '',
  `about_title` varchar(255) NOT NULL DEFAULT '',
  `about_description` text DEFAULT NULL,
  `about_image` varchar(255) NOT NULL DEFAULT '',
  `about_li1` varchar(255) NOT NULL DEFAULT '',
  `about_li2` varchar(255) NOT NULL DEFAULT '',
  `about_li3` varchar(255) NOT NULL DEFAULT '',
  `about_li4` varchar(255) NOT NULL DEFAULT '',
  `how_short_title` varchar(255) NOT NULL DEFAULT '',
  `how_title` varchar(255) NOT NULL DEFAULT '',
  `how_description` text DEFAULT NULL,
  `how_image` varchar(255) NOT NULL DEFAULT '',
  `how_li1` varchar(255) NOT NULL DEFAULT '',
  `how_li2` varchar(255) NOT NULL DEFAULT '',
  `how_li3` varchar(255) NOT NULL DEFAULT '',
  `faq_image` varchar(255) NOT NULL DEFAULT '',
  `faq1_title` varchar(255) NOT NULL DEFAULT '',
  `faq1_description` text DEFAULT NULL,
  `faq2_title` varchar(255) NOT NULL DEFAULT '',
  `faq2_description` text DEFAULT NULL,
  `faq3_title` varchar(255) NOT NULL DEFAULT '',
  `faq3_description` text DEFAULT NULL,
  `faq4_title` varchar(255) NOT NULL DEFAULT '',
  `faq4_description` text DEFAULT NULL,
  `faq5_title` varchar(255) NOT NULL DEFAULT '',
  `faq5_description` text DEFAULT NULL,
  `newsletter_short_title` varchar(255) NOT NULL DEFAULT '',
  `newsletter_title` varchar(255) NOT NULL DEFAULT '',
  `newsletter_button_name` varchar(255) NOT NULL DEFAULT '',
  `newsletter_image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `language`, `meta_title`, `meta_description`, `meta_keywords`, `about_short_title`, `about_title`, `about_description`, `about_image`, `about_li1`, `about_li2`, `about_li3`, `about_li4`, `faq_image`, `faq1_title`, `faq1_description`, `faq2_title`, `faq2_description`, `faq3_title`, `faq3_description`, `faq4_title`, `faq4_description`, `faq5_title`, `faq5_description`) VALUES
(1, 'English', 'Your Trusted Partner for White Label Solutions', 'We provide comprehensive white label solutions for businesses looking to expand their online presence. Our services include website development, branding, and marketing support.', 'white label solutions, website development, branding, marketing support', 'About PixelMod', 'Your Trusted Partner in Game Hosting', 'We provide secure, high-performance game hosting solutions built for gamers and communities who demand reliability.', '20260818202921-3185.png', 'Free SSL Certificate', '1-Click Game Installer', 'Optimized for Performance', 'Free Migration', '20260818195532-6064.png', 'What is game server hosting? fgdfgfd', 'Game server hosting lets you run and manage your own dedicated multiplayer game server.', 'How fast is server setup?', 'Most servers are set up instantly after payment is confirmed.', 'Can I install mods?', 'Yes, our 1-click installer supports mods for all major games.', 'Do you offer DDoS protection?', 'Yes, every server includes free DDoS protection.', 'Can I upgrade my plan later?', 'Yes, you can upgrade or downgrade your plan at any time.'),
(2, 'Bengali', 'হোয়াইট লেবেল সমাধানের জন্য আপনার বিশ্বস্ত অংশীদার', 'আমরা ব্যবসায়িক সম্প্রসারণের জন্য হোয়াইট লেবেল সমাধান প্রদান করি। আমাদের সেবাগুলির মধ্যে রয়েছে ওয়েবসাইট উন্নয়ন, ব্র্যান্ডিং এবং বিপণন সহায়তা।', 'হোয়াইট লেবেল সমাধান, ওয়েবসাইট উন্নয়ন, ব্র্যান্ডিং, বিপণন সহায়তা', 'পিক্সেলমড সম্পর্কে', 'গেম হোস্টিং-এ আপনার বিশ্বস্ত অংশীদার', 'আমরা গেমার এবং কমিউনিটির জন্য নিরাপদ, উচ্চ-কার্যক্ষমতার গেম হোস্টিং সমাধান প্রদান করি।', '20260818202921-3185.png', 'ফ্রি এসএসএল সার্টিফিকেট', '১-ক্লিক গেম ইনস্টলার', 'কর্মক্ষমতার জন্য অপ্টিমাইজড', 'ফ্রি মাইগ্রেশন', '20260818195532-6064.png', 'গেম সার্ভার হোস্টিং কী?', 'গেম সার্ভার হোস্টিং আপনাকে নিজস্ব ডেডিকেটেড মাল্টিপ্লেয়ার সার্ভার চালাতে দেয়।', 'সার্ভার সেটআপ কত দ্রুত হয়?', 'পেমেন্ট নিশ্চিত হওয়ার সাথে সাথে সার্ভার তাৎক্ষণিকভাবে সেটআপ হয়ে যায়।', 'আমি কি মড ইনস্টল করতে পারি?', 'হ্যাঁ, আমাদের ১-ক্লিক ইনস্টলার সব প্রধান গেমের মড সাপোর্ট করে।', 'আপনারা কি ডিডস সুরক্ষা দেন?', 'হ্যাঁ, প্রতিটি সার্ভারে বিনামূল্যে ডিডস সুরক্ষা অন্তর্ভুক্ত।', 'আমি কি পরে প্ল্যান আপগ্রেড করতে পারি?', 'হ্যাঁ, আপনি যেকোনো সময় আপনার প্ল্যান আপগ্রেড বা ডাউনগ্রেড করতে পারেন।');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `contact` varchar(50) DEFAULT '',
  `subject` varchar(255) DEFAULT '',
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_admin`
--

CREATE TABLE `main_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT 'admin',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_admin`
--

INSERT INTO `main_admin` (`id`, `email`, `username`, `hashed_password`, `type`, `created_at`) VALUES
(1, 'admin@bdbetsolution', 'admin', '$2y$12$GwH2UuA48MknZvNdLliE8.hzv2XHyWdDSgJpEK6.RBqBnfcsNg/xW', 'admin', '2026-07-28 18:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_page`
--

CREATE TABLE `payment_method_page` (
  `id` int(11) NOT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) NOT NULL DEFAULT '',
  `breadcrumb_name` varchar(255) NOT NULL DEFAULT '',
  `breadcrumb_image` varchar(255) NOT NULL DEFAULT '',
  `about_short_title` varchar(255) NOT NULL DEFAULT '',
  `about_title` varchar(255) NOT NULL DEFAULT '',
  `about_description` text DEFAULT NULL,
  `card1_image` varchar(255) NOT NULL DEFAULT '',
  `card1_title` varchar(255) NOT NULL DEFAULT '',
  `card1_description` text DEFAULT NULL,
  `card2_image` varchar(255) NOT NULL DEFAULT '',
  `card2_title` varchar(255) NOT NULL DEFAULT '',
  `card2_description` text DEFAULT NULL,
  `card3_image` varchar(255) NOT NULL DEFAULT '',
  `card3_title` varchar(255) NOT NULL DEFAULT '',
  `card3_description` text DEFAULT NULL,
  `card4_image` varchar(255) NOT NULL DEFAULT '',
  `card4_title` varchar(255) NOT NULL DEFAULT '',
  `card4_description` text DEFAULT NULL,
  `getstarted_short_title` varchar(255) NOT NULL DEFAULT '',
  `getstarted_title` varchar(255) NOT NULL DEFAULT '',
  `getstarted_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method_page`
--

INSERT INTO `payment_method_page` (`id`, `language`, `meta_title`, `meta_description`, `meta_keywords`, `breadcrumb_name`, `breadcrumb_image`, `about_short_title`, `about_title`, `about_description`, `card1_image`, `card1_title`, `card1_description`, `card2_image`, `card2_title`, `card2_description`, `card3_image`, `card3_title`, `card3_description`, `card4_image`, `card4_title`, `card4_description`, `getstarted_short_title`, `getstarted_title`, `getstarted_description`) VALUES
(1, 'English', 'Payment Methods', 'Explore the secure and trusted payment gateways we support for betting platforms in Bangladesh.', 'payment methods, bkash, nagad, rocket, betting payment gateway', 'Payment Methods', '', 'Payments', 'Trusted Payment Gateways For Your Betting Platform', 'We integrate secure, fast and locally trusted payment methods so your players can deposit and withdraw with confidence.', '20260818184429-8386.webp', 'bKash', 'bKash is Bangladesh\'s most popular mobile financial service. We integrate bKash Payment Gateway into your betting platform so users can deposit and withdraw money quickly and securely. It offers fast processing, high security, and a trusted payment experience.', '20260818184429-5707.webp', 'Nagad', 'Nagad is one of the fastest-growing digital payment services in Bangladesh. With Nagad Payment Gateway integration, your betting website can provide instant deposits, secure withdrawals, and reliable payment processing for every user.', '', 'Rocket', 'Reliable mobile banking payment option.', '', 'Bank Transfer', 'Direct bank transfer support for larger transactions.', 'Get Started', 'Ready To Launch With Secure Payments?', 'Launch your betting business with Bdbetexpert\'s Betting Payment Gateway Solutions. We provide complete integration of bKash, Nagad, Rocket, and Upay, helping your platform offer fast, secure, and reliable payment services for users across Bangladesh.'),
(2, 'Bengali', 'বাংলাদেশে বেটিং পেমেন্ট গেটওয়ে | বিকাশ, নগদ ও রকেট', 'দ্রুত জমা ও উত্তোলনের সুবিধার্থে বিকাশ, নগদ, রকেট এবং উপায় (Upay)-এর সমন্বয়ে বাংলাদেশে বেটিংয়ের জন্য নিরাপদ পেমেন্ট গেটওয়ে সলিউশন গ্রহণ করুন।', 'বাংলাদেশে বেটিং পেমেন্ট গেটওয়ে, বেটিং ওয়েবসাইটের জন্য পেমেন্ট গেটওয়ে, বিকাশ পেমেন্ট গেটওয়ে, নগদ পেমেন্ট গেটওয়ে, রকেট পেমেন্ট গেটওয়ে, উপায় পেমেন্ট গেটওয়ে, বেটিং সাইট প্রোভাইডার', '', '', '', '', '', '20260818184429-8386.webp', '', '', '20260818184429-5707.webp', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `language` varchar(50) DEFAULT '',
  `group_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `title_url` varchar(255) DEFAULT '',
  `product_name` varchar(255) DEFAULT '',
  `product_image` varchar(255) DEFAULT '',
  `image_alt` varchar(255) DEFAULT '',
  `page_title` varchar(255) DEFAULT '',
  `meta_title` varchar(255) DEFAULT '',
  `meta_detail` text DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `website_url` varchar(255) DEFAULT '',
  `web_type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(1) DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `language`, `group_id`, `title`, `title_url`, `product_name`, `product_image`, `image_alt`, `page_title`, `meta_title`, `meta_detail`, `details`, `website_url`, `web_type`, `created_at`, `status`) VALUES
(10, 'Bengali', 9, 'পরীক্ষা', 'test', '', '20260817150549-3685.jpg', 'পরীক্ষা', 'পরীক্ষা', 'পরীক্ষা', 'পরীক্ষা', '<p>পরীক্ষা</p>', 'test', 'b2b-whitelabel', '2026-08-17 14:53:32', 'Y'),
(9, 'English', 9, 'Test', 'test', '', '20260817150549-3685.jpg', 'das', 'sadas', 'dasd', 'asdas', '<p>dsadas</p>', 'test', 'b2b-whitelabel', '2026-08-17 14:47:18', 'Y'),
(11, 'English', 11, 'B2C Product', 'b2c-product', '', '20260818194247-8500.webp', 'B2C Product', 'B2C Product', 'B2C Product', 'B2C Product', '<p>b2c-product</p>', 'b2c-product', 'b2c-whitelabel', '2026-08-17 14:54:29', 'Y'),
(12, 'Bengali', 11, 'B2C পণ্য', 'b2c-product', '', '20260818194247-8500.webp', 'B2C পণ্য', 'B2C পণ্য', 'B2C পণ্য', 'B2C পণ্য\r\n', '<p>B2C পণ্য</p><p>&nbsp;</p>', 'b2c-product', 'b2c-whitelabel', '2026-08-17 14:55:13', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `socials_list`
--

CREATE TABLE `socials_list` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) DEFAULT '',
  `whatsapp` varchar(255) DEFAULT '',
  `facebook` varchar(255) DEFAULT '',
  `telegram` varchar(255) DEFAULT '',
  `youtube` varchar(255) DEFAULT '',
  `instagram` varchar(255) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials_list`
--

INSERT INTO `socials_list` (`id`, `mail`, `whatsapp`, `facebook`, `telegram`, `youtube`, `instagram`) VALUES
(1, 'info@bdbetsolution.com', '8801000000000', 'https://facebook.com/bdbetsolution', 'https://t.me/bdbetsolution', 'https://youtube.com/@bdbetsolution', 'https://instagram.com/bdbetsolution');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_language` (`language`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_group_id` (`group_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_group_id` (`group_id`);

--
-- Indexes for table `career_query`
--
ALTER TABLE `career_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_list`
--
ALTER TABLE `footer_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_images`
--
ALTER TABLE `header_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `language` (`language`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_admin`
--
ALTER TABLE `main_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method_page`
--
ALTER TABLE `payment_method_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_language` (`language`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_group_id` (`group_id`);

--
-- Indexes for table `socials_list`
--
ALTER TABLE `socials_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `career_query`
--
ALTER TABLE `career_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_list`
--
ALTER TABLE `footer_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `header_images`
--
ALTER TABLE `header_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_admin`
--
ALTER TABLE `main_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_method_page`
--
ALTER TABLE `payment_method_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `socials_list`
--
ALTER TABLE `socials_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
