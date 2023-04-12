-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 02:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `story`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'ছোট গল্প'),
(2, 'বৈজ্ঞানিক কল্পকাহিনি\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(255) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_author` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_image` text NOT NULL,
  `post_status` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_content`, `post_author`, `post_date`, `post_image`, `post_status`, `post_tags`, `post_views`) VALUES
(2, 0, 'দোলনা', 'মনে আছে তোর , আমাদের বাড়িতে একটা ‌দড়ির দোলনা ছিলো। তোকে ওটাতে বসতে দিতে চাইলো না‌ , সেদিন নতুন কাকিমা মানে ছোটো কাকিমা। তুই কেন, আমাকেও বসতে দিতে চাইছিলো না। পুচুকটার জন্য সাবধানে থাকতে হয়েছিল বোধহয়। অসুখ হবে তাই। আসলে আমরা পাড়া গাঁয়ের মানুষেরা সবাই সবার জিনিস, সবাই ব্যবহার করি। কাকিমার সেটা ভালো লাগতো না।', 'Tareq', '2023-04-11 13:54:52', 'i1.jpg', 'published', 'zero', 0),
(9, 1, 'উকিলের বুদ্ধি', 'গরিব চাষা, তার নামে মহাজন নালিশ করেছে। বেচারা কবে তার কাছে ২৫ টাকা নিয়েছিল, সুদে-আসলে তা এখন ৫০০ টাকায় দাঁড়িয়েছে। চাষা অনেক কষ্টে ১০০ টাকা জোগাড় করেছে; কিন্তু মহাজন বলছে, ‌\'৫০০ টাকার এক পয়সাও কম নয়; দিতে না পারো তো জেলে যাও।\' সুতরাং চাষার আর রক্ষা নাই।\r\n\r\nএমন সময় শামলা মাথায় চশমা চোখে তুখোড় বুদ্ধি উকিল এসে বললেন, \'ওই ১০০ টাকা আমায় দিলে, তোমার বাঁচবার উপায় করতে পারি।\'\r\n\r\nচাষা তার হাতে ধরল, পায়ে ধরল, বলল, ‌\'আমায় বাঁচিয়ে দিন।\'\r\n\r\nউকিল বললেন, \"তবে শোন, আমার ফন্দি বলি। যখন আদালতের কাঠগড়ায় গিয়ে দাঁড়াবে, তখন বাপু হে কথাটথা কয়ো না। যে যা খুশি বলুক, গাল দিক আর প্রশ্ন করুক, তুমি তার জবাবটি দেবে না- খালি পাঁঠার মতো \'ব্যা- \' করবে। তা যদি করতে পারো, তা হলে আমি তোমায় খালাস করিয়ে দেব।\"\r\n\r\nচাষা বলল, \'আপনি কর্তা যা বলেন, তাতেই আমই রাজি।\'\r\n\r\nআদালতে মহাজনের মস্ত উকিল, চাষাকে এক ধমক দিয়ে জিজ্ঞাসা করলেন, \'তুমি সাত বছর আগে ২৫ টাকা কর্জ নিয়েছিলে?\'\r\n\r\nচাষা তার মুখের দিকে চেয়ে বলল, \'ব্যা- \'।\r\n\r\nউকিল বললেন, \'খবরদার!- বল, নিয়েছিলি কি না।\'\r\n\r\nচাষা বলল, \'ব্যা- \'।\r\n\r\nউকিল বললেন, \'হুজুর! আসামির বেয়াদবি দেখুন।\'\r\n\r\nহাকিম রেগে বললেন, \'ফের যদি অমনি করিস, তোকে আমই ফাটক দেব।\'\r\n\r\nচাষা অত্যন্ত ভয় পেয়ে কাঁদ কাঁদ হয়ে বলল, \'ব্যা- ব্যা- \'।\r\n\r\nহাকিম বললেন, \'লোকটা কি পাগল নাকি?\'\r\n\r\nতখন চাষার উকিল উঠে বললেন, \"হুজুর, ও কি আজকের পাগল- ও বহুকালের পাগল, জন্ম-অবধি পাগল। ওর কি কোনো বুদ্ধি আছে, না কাণ্ডজ্ঞান আছে? ও আবার কর্জ নেবে কি! ও কি কখনও খত লিখতে পারে নাকি? আর পাগলের খত লিখলেই বা কী? দেখুন দেখুন, এই হতভাগা মহাজনটার কাণ্ড দেখুন তো! ইচ্ছে করে জেনেশুনে পাগলটাকে ঠকিয়ে নেওয়ার মতলব করেছে। আরে, ওর কি মাথার ঠিক আছে? এরা বলেছে, \'এইখানে একটা আঙ্গুলের টিপ দে\'- পাগল কি জানে, সে অমনি টিপ দিয়েছে। এই তো ব্যাপার!\"\r\n\r\nদুই উকিলে ঝগড়া বেধে গেল।\r\n\r\nহাকিম খানিক শুনেটুনে বললেন, \'মোকদ্দমা ডিসমিস্।\'\r\n\r\nমহাজনের তো চক্ষুস্থির। সে আদালতের বাইরে এসে চাষাকে বললেন, \'আচ্ছা, না হয় তোর ৪০০ টাকা ছেড়েই দিলাম- ওই ১০০ টাকাই দে।\'\r\n\r\nচাষা বলল, \'ব্যা-!\'\r\n\r\nমহাজন যতই বলেন, যতই বোঝান, চাষা তার পাঁঠার বুলি কিছুতেই ছাড়ে না। মহাজন রেগেমেগে বলে গেল, \'দেখে নেব, আমার টাকা তুই কেমন করে হজম করিস।\'\r\n\r\nচাষা তার পোঁটলা নিয়ে গ্রামে ফিরতে চলেছে, এমন সময় তার উকিল এসে ধরল, \'যাচ্ছ কোথায় বাপু? আমার পাওনাটা আগে চুকিয়ে যাও। ১০০ টাকায় রফা হয়েছিল, এখন মোকদ্দমা তো জিতিয়ে দিলাম।\'\r\n\r\nচাষা অবাক হয়ে তার মুখের দিকে তাকিয়ে বলল, \'ব্যা-।\'\r\n\r\nউকিল বললেন, \'বাপু হে, ওসব চালাকি খাটবে না- টাকাটি এখন বের করো।\'\r\n\r\nচাষা বোকার মতো মুখ করে আবার বলল, \'ব্যা-।\'\r\n\r\nউকিল তাকে নরম গরম অনেক কথাই শোনাল, কিন্তু চাষার মুখে কেবলই ঐ এক জবাব! তখন উকিল বলল, \'হতভাগা গোমুখ্যু পাড়া গেঁয়ে ভূত- তোর পেটে অ্যাতো শয়তানি, কে জানে! আগে যদি জানতাম তা হলে পোঁটলাসুদ্ধ টাকাগুলো আটকে রাখতাম।\'\r\n\r\nবুদ্ধিমান উকিলের আর দক্ষিণা পাওয়া হলো না।', 'তারিকুল ইসলাম', '2023-04-12 14:04:08', 'cover.jpg', 'published', 'ছোট', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_type` text NOT NULL,
  `user_email` text NOT NULL,
  `user_image` text NOT NULL DEFAULT 'person.svg',
  `token` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_type`, `user_email`, `user_image`, `token`, `first_name`, `last_name`, `password`, `date`, `status`) VALUES
(1, 'Tareq', 'admin', 'adnantareq2@gmail.com', 'person.svg', '', 'তারিকুল', 'ইসলাম', '123', 0, 'active'),
(2, 'হাসান', 'user', '', '', '', 'হাসান', 'খান', '123', 2147483647, 'rejected'),
(4, 'hasan', 'user', 'hasan@gmail.com', 'Sukumar-Roy.jpg', '', 'হাসান ', 'খান', '123', 2147483647, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
