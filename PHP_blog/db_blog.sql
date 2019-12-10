-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 11:20 AM
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
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_catagory`
--

CREATE TABLE `db_catagory` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_catagory`
--

INSERT INTO `db_catagory` (`id`, `cat_name`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(30, 'Other'),
(31, 'eew221dfd');

-- --------------------------------------------------------

--
-- Table structure for table `db_contract`
--

CREATE TABLE `db_contract` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `massage` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_contract`
--

INSERT INTO `db_contract` (`id`, `fname`, `lname`, `mobile`, `email`, `massage`, `status`, `time`) VALUES
(2, 'Saidur', 'PK', '01740108543', 'pksaidur@gmail.com', 'hi i am here....', 1, '2019-12-05 18:00:00'),
(3, 'Saidur', 'PK', '01740108543', 'pksaidur@gmail.com', 'hi i am here....', 1, '2019-12-05 18:00:00'),
(4, 'Saidur', 'PK', '01740108543', 'pksaidur@gmail.com', 'gsg', 1, '2019-12-05 18:00:00'),
(17, 'Saidur', 'Rahman', '01674572535', 'pksaidur@gmail.com', 'is every thing right', 1, '2019-12-05 18:00:00'),
(18, 'Saidur', 'Rahman', '01674572535', 'pksaidur@gmail.com', 'is every thing right', 1, '2019-12-05 18:00:00'),
(21, 'saidur', 'Rahman', '01674572835', 'pksaidur@gmail.com', 'Why to Learn PHP?\r\n\r\nPHP started out as a small open source project that evolved as more and more people found out how useful it was. Rasmus Lerdorf unleashed the first version of PHP way back in 1994.\r\n\r\nPHP is a MUST for students and working professionals to become a great Software Engineer specially when they are working in Web Development Domain. I will list down some of the key advantages of learning PHP:\r\n\r\n    PHP is a recursive acronym for &quot;PHP: Hypertext Preprocessor&quot;.\r\n\r\n    PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.\r\n\r\n    It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle, Sybase, Informix, and Microsoft SQL Server.\r\n\r\n    PHP is pleasingly zippy in its execution, especially when compiled as an Apache module on the Unix side. The MySQL server, once started, executes even very complex queries with huge result sets in record-setting time.\r\n\r\n    PHP supports a large number of major protocols such as POP3, IMAP, and LDAP. PHP4 added support for Java and distributed object architectures (COM and CORBA), making n-tier development a possibility for the first time.\r\n\r\n    PHP is forgiving: PHP language tries to be as forgiving as possible.\r\n\r\n    PHP Syntax is C-Like.', 1, '2019-12-06 17:12:16'),
(22, 'pk', 'Saidur', '01674572535', 'pksaidur@gmail.com', 'asaas', 1, '2019-12-07 05:57:14'),
(23, 'regerg', 'rere', 'swfew', 'pksaidur@gmail.com', 'ew', 0, '2019-12-07 05:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `db_nav`
--

CREATE TABLE `db_nav` (
  `id` int(11) NOT NULL,
  `aboutus` text NOT NULL,
  `privacy` text NOT NULL,
  `dmca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='for about us, Privacy and DMCA';

--
-- Dumping data for table `db_nav`
--

INSERT INTO `db_nav` (`id`, `aboutus`, `privacy`, `dmca`) VALUES
(1, '                You have successfully installed XAMPP on this system! Now you can start using Apache, MariaDB, PHP and other components. You can find more info in the FAQs section or check the HOW-TO Guides for getting started with PHP applications. XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others. If you want have your XAMPP accessible from the internet, make sure you understand the implications and you checked the FAQs to learn how to protect your site. Alternatively you can use WAMP, MAMP or LAMP which are similar packages which are more suitable for production.Start the XAMPP Control Panel to check the server status. qwqw', ' Wärtsilä Oyj Abp (Finnish: [ˈʋærtsilæ]) is a Finnish corporation which manufactures and services power sources and other equipment in the marine and energy markets. The core products of Wärtsilä include technologies for the energy sector, including gas, multi-fuel, liquid fuel and biofuel power plants and energy storage systems; and technologies for the marine sector, including cruise ...\r\nSVFdwAFEGW', 'PHP: Hypertext Preprocessor (or simply PHP) is a general-purpose programming language originally designed for web development. It was originally created by Rasmus Lerdorf in 1994;[5] the PHP reference implementation is now produced by The PHP Group.[6] PHP originally stood for Personal Home Page,[5] but it now stands for the recursive initialism PHP: Hypertext Preprocessor.[7]\r\n\r\nPHP code may be executed with a command line interface (CLI), embedded into HTML code, or used in combination with various web template systems, web content management systems, and web frameworks. PHP code is usually processed by a PHP interpreter implemented as a module in a web server or as a Common Gateway Interface (CGI) executable. The web server outputs the results of the interpreted and executed PHP code, which may be any type of data, such as generated HTML code or binary image data. PHP can be used for many programming tasks outside of the web context, such as standalone graphical applications[8] and robotic drone control.[9]\r\n\r\nThe standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on almost every operating system and platform, free of charge.[10]\r\n\r\nThe PHP language evolved without a written formal specification or standard until 2014, with the original implementation acting as the de facto standard which other implementations aimed to follow. Since 2014, work has gone on to create a formal PHP specification.[11]\r\n\r\nAs of September 2019, over 60% of sites on the web using PHP are still on discontinued/\"EOLed\"[12] version 5.6 or older;[13] versions prior to 7.1 are no longer officially supported by The PHP Development Team,[14] but security support is provided by third parties, such as Debian.[15] ');

-- --------------------------------------------------------

--
-- Table structure for table `db_social`
--

CREATE TABLE `db_social` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_social`
--

INSERT INTO `db_social` (`id`, `name`, `link`, `image`) VALUES
(1, 'Facebook', 'https://www.facebook.com/pksaidur', 'icon/facebook.png'),
(2, 'Twitter', 'https://www.twitter.com/pksaidur', 'icon/twitter.png'),
(3, 'Linkedin', 'https://www.Linkedin.com/pksaidur', 'icon/linkedin.png'),
(4, 'Youtube', 'https://www.youtube.com/', 'icon/youtube.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `name`, `user_name`, `user_password`, `email`, `details`, `role`) VALUES
(1, 'Saidur Rahman', 'admin', '202cb962ac59075b964b07152d234b70', 'pksaidur@gmail.com', '&lt;p&gt;Administer&lt;/p&gt;', 1),
(12, '', 'author', '202cb962ac59075b964b07152d234b70', 'pksaidur@yahoo.com', '', 2),
(13, '', 'editor', '202cb962ac59075b964b07152d234b70', 'pksaidur@yahoo.com', '', 3),
(14, '', 'author2', '202cb962ac59075b964b07152d234b70', 'pksaidur@yahoo.com', '', 1),
(18, '', 'saidur', '202cb962ac59075b964b07152d234b70', 'pmsaidur@yahoo.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `name`, `title`) VALUES
(1, 'Title', 'PK Technology.'),
(2, 'Description', 'Let we win');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `role`, `userid`) VALUES
(2, 'PHP', 'Our Health post will be go here uu', '<p>Aundry detergent, dryer sheets, fabric softeners, personal care products (e.g., shampoo, soap, lotion), household cleaners, and cigarette smoke can further irritate sensitive skin and mucous membranes. That’s why it’s important to use natural products instead of harsh chemicals. The negative effects of second-hand smoke on your child (even more so when s/he’s ill) is yet another reason to quit smoking cigarettes. Most children will recover from these scarlet fever symptoms with adequate rest, nutrition, and antibiotic treatment in 7-10 days. If on an antibiotic regimen, don’t allow your child to come into contact with others until 24 hours after treatment starts, when the infection is no longer contagious.Next » Sign up for our FREE daily newsletter.Get daily health tips and exclusive offers delivered straight to your inbox.</p>\r\n', 'image/desktop_pic (14).jpg', 'admin', 'Java, Programming', '2019-12-09 06:15:24', 0, 0),
(3, 'PHP', 'Our Health post will be go here', '<p>Aundry detergent, dryer sheets, fabric softeners, personal care products (e.g., shampoo, soap, lotion), household cleaners, and cigarette smoke can further irritate sensitive skin and mucous membranes. That&rsquo;s why it&rsquo;s important to use natural products instead of harsh chemicals. The negative effects of second-hand smoke on your child (even more so when s/he&rsquo;s ill) is yet another reason to quit smoking cigarettes. Most children will recover from these scarlet fever symptoms with adequate rest, nutrition, and antibiotic treatment in 7-10 days. If on an antibiotic regimen, don&rsquo;t allow your child to come into contact with others until 24 hours after treatment starts, when the infection is no longer contagious.Next &raquo; Sign up for our FREE daily newsletter.Get daily health tips and exclusive offers delivered straight to your inbox.</p>\r\n', 'image/desktop_pic (22).jpg', 'admin', 'php, programming', '2019-12-09 06:15:43', 0, 0),
(4, 'PHP', 'Our Health post will\"PHP OOP', 'Aundry detergent, dryer sheets, fabric softeners, personal care products (e.g., shampoo, soap, lotion), household cleaners, and cigarette smoke can further irritate sensitive skin and mucous membranes. That’s why it’s important to use natural products instead of harsh chemicals. The negative effects of second-hand smoke on your child (even more so when s/he’s ill) is yet another reason to quit smoking cigarettes. Most children will recover from these scarlet fever symptoms with adequate rest, nutrition, and antibiotic treatment in 7-10 days. If on an antibiotic regimen, don’t allow your child to come into contact with others until 24 hours after treatment starts, when the infection is no longer contagious.Next » Sign up for our FREE daily newsletter.Get daily health tips and exclusive offers delivered straight to your inbox ...', 'image/desktop_pic (50).jpg', 'saidur', 'php oop, programming', '2019-12-02 12:54:20', 0, 0),
(5, 'css', 'Our Health post will\"mySQLi', 'Aundry detergent, dryer sheets, fabric softeners, personal care products (e.g., shampoo, soap, lotion), household cleaners, and cigarette smoke can further irritate sensitive skin and mucous membranes. That’s why it’s important to use natural products instead of harsh chemicals. The negative effects of second-hand smoke on your child (even more so when s/he’s ill) is yet another reason to quit smoking cigarettes. Most children will recover from these scarlet fever symptoms with adequate rest, nutrition, and antibiotic treatment in 7-10 days. If on an antibiotic regimen, don’t allow your child to come into contact with others until 24 hours after treatment starts, when the infection is no longer contagious.Next » Sign up for our FREE daily newsletter.Get daily health tips and exclusive offers delivered straight to your inbox.', 'image/desktop_pic (14).jpg', 'pksaidur', 'mySQLi, programming', '2019-12-02 13:52:59', 0, 0),
(7, 'Java', 'my first post', 'Aundry detergent, dryer sheets, fabric softeners, personal care products (e.g., shampoo, soap, lotion), household cleaners, and cigarette smoke can further irritate sensitive skin and mucous membranes. That’s why it’s important to use natural products instead of harsh chemicals. The negative effects of second-hand smoke on your child (even more so when s/he’s ill) is yet another reason to quit smoking cigarettes. Most children will recover from these scarlet fever symptoms with adequate rest, nutrition, and antibiotic treatment in 7-10 days. If on an antibiotic regimen, don’t allow your child to come into contact with others until 24 hours after treatment starts, when the infection is no longer contagious.Next » Sign up for our FREE daily newsletter.Get daily health tips and exclusive offers delivered straight to your inbox.', 'image/4f6520b98e.jpg', 'pk', 'PHP', '2019-12-02 13:30:31', 0, 0),
(14, 'Other', 'test post', 'sjbd7auisdf', 'image/cba39b51dd.jpg', 'Editor', 'other', '2019-12-08 08:53:29', 2, 0),
(15, 'Other', 'qwqw', '<p>sddddddddddddcxzzczzzzzz</p>\r\n', 'image/11c9db9d20.jpg', 'admin', 'ddd', '2019-12-08 12:15:50', 0, 1),
(16, 'PHP', 'about laravel', '<h3><a href=\"https://laravel.com/docs/6.x#server-requirements\">Server Requirements</a></h3>\r\n\r\n<p>The Laravel framework has a few system requirements. All of these requirements are satisfied by the <a href=\"https://laravel.com/docs/6.x/homestead\">Laravel Homestead</a> virtual machine, so it&#39;s highly recommended that you use Homestead as your local Laravel development environment.</p>\r\n\r\n<p>However, if you are not using Homestead, you will need to make sure your server meets the following requirements:</p>\r\n\r\n<ul>\r\n	<li>PHP &gt;= 7.2.0</li>\r\n	<li>BCMath PHP Extension</li>\r\n	<li>Ctype PHP Extension</li>\r\n	<li>JSON PHP Extension</li>\r\n	<li>Mbstring PHP Extension</li>\r\n	<li>OpenSSL PHP Extension</li>\r\n	<li>PDO PHP Extension</li>\r\n	<li>Tokenizer PHP Extension</li>\r\n	<li>XML PHP Extension</li>\r\n</ul>\r\n\r\n<p><a name=\"installing-laravel\"></a></p>\r\n\r\n<h3><a href=\"https://laravel.com/docs/6.x#installing-laravel\">Installing Laravel</a></h3>\r\n\r\n<p>Laravel utilizes <a href=\"https://getcomposer.org\">Composer</a> to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.</p>\r\n\r\n<p>Via Laravel Installer</p>\r\n\r\n<p>First, download the Laravel installer using Composer:</p>\r\n\r\n<pre>\r\n<code>composer global require laravel/installer</code></pre>\r\n\r\n<p>Make sure to place Composer&#39;s system-wide vendor bin directory in your <code>$PATH</code> so the laravel executable can be located by your system. This directory exists in different locations based on your operating system; however, some common locations include:</p>\r\n\r\n<ul>\r\n	<li>macOS and GNU / Linux Distributions: <code>$HOME/.composer/vendor/bin</code></li>\r\n	<li>Windows: <code>%USERPROFILE%\\AppData\\Roaming\\Composer\\vendor\\bin</code></li>\r\n</ul>\r\n\r\n<p>Once installed, the <code>laravel new</code> command will create a fresh Laravel installation in the directory you specify. For instance, <code>laravel new blog</code> will create a directory named <code>blog</code> containing a fresh Laravel installation with all of Laravel&#39;s dependencies already installed:</p>\r\n\r\n<pre>\r\n<code>laravel new blog</code></pre>\r\n\r\n<p>Via Composer Create-Project</p>\r\n\r\n<p>Alternatively, you may also install Laravel by issuing the Composer <code>create-project</code> command in your terminal:</p>\r\n\r\n<pre>\r\n<code>composer create-project --prefer-dist laravel/laravel blog</code></pre>\r\n\r\n<p>Local Development Server</p>\r\n\r\n<p>If you have PHP installed locally and you would like to use PHP&#39;s built-in development server to serve your application, you may use the <code>serve</code> Artisan command. This command will start a development server at <code>http://localhost:8000</code>:</p>\r\n\r\n<pre>\r\n<code>php artisan serve</code></pre>\r\n\r\n<p>More robust local development options are available via <a href=\"https://laravel.com/docs/6.x/homestead\">Homestead</a> and <a href=\"https://laravel.com/docs/6.x/valet\">Valet</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'image/1cf5df8610.jpg', 'author', 'php,laravel', '2019-12-08 12:23:56', 1, 12),
(17, 'Other', 'Our Health post will be go here uu', '<p>Aundry detergent, dryer sheets, fabric softeners, personal care products (e.g., shampoo, soap, lotion), household cleaners, and cigarette smoke can further irritate sensitive skin and mucous membranes. That&rsquo;s why it&rsquo;s important to use natural products instead of harsh chemicals. The negative effects of second-hand smoke on your child (even more so when s/he&rsquo;s ill) is yet another reason to quit smoking cigarettes. Most children will recover from these scarlet fever symptoms with adequate rest, nutrition, and antibiotic treatment in 7-10 days. If on an antibiotic regimen, don&rsquo;t allow your child to come into contact with others until 24 hours after treatment starts, when the infection is no longer contagious.Next &raquo; Sign up for our FREE daily newsletter.Get daily health tips and exclusive offers delivered straight to your inbox.</p>\r\n', 'image/af33083088.jpg', 'admin', 'werewr', '2019-12-09 06:39:18', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_catagory`
--
ALTER TABLE `db_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_contract`
--
ALTER TABLE `db_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_nav`
--
ALTER TABLE `db_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_social`
--
ALTER TABLE `db_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_catagory`
--
ALTER TABLE `db_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `db_contract`
--
ALTER TABLE `db_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `db_nav`
--
ALTER TABLE `db_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_social`
--
ALTER TABLE `db_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
