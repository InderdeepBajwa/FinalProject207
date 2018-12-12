-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2018 at 06:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vhlblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `authorName` text NOT NULL,
  `authorPassword` text NOT NULL,
  `authorEmail` text NOT NULL,
  `authorImg` text,
  `isAdmin` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `authorName`, `authorPassword`, `authorEmail`, `authorImg`, `isAdmin`) VALUES
(10, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin', 'https://img.freepik.com/free-photo/profile-portrait-of-serious-man-looking-out-window_1262-1879.jpg?size=338&ext=jpg&ve=1', 'HasAccess'),
(11, 'Bob', '9f9d51bc70ef21ca5c14f307980a29d8', 'bob@bob.bob', 'http://www.bobthebuilder.com/en-us/Images/btb_where_to_watch_background_Bob_tcm1239-232957.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `commentText` text NOT NULL,
  `commentDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `postID`, `authorID`, `commentText`, `commentDate`) VALUES
(1, 3, 11, 'This is an interesting post!', '2018-12-12'),
(3, 3, 11, 'I wrote a very interesting post!', '2018-12-12'),
(4, 3, 11, 'This is amazing', '2018-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `postTitle` text NOT NULL,
  `postHeader` text NOT NULL,
  `postContent` text NOT NULL,
  `publishDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `authorID`, `postTitle`, `postHeader`, `postContent`, `publishDate`) VALUES
(3, 11, 'Bob\'s Second Post!', 'https://angiemakes.com/wp-content/uploads/2015/01/werpoie.jpg', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere consequat mi eu mollis. Vestibulum eu sapien id sapien feugiat laoreet. Duis sed facilisis tellus. Aliquam erat volutpat. Curabitur eget erat tempus, consectetur arcu nec, viverra mauris. Duis quis arcu sit amet est ultricies luctus. Proin faucibus nec orci et aliquam. Donec viverra elementum metus volutpat luctus. Vivamus elementum efficitur sodales. Morbi dictum lectus eget risus elementum blandit.\r\n\r\nDonec scelerisque urna non justo ornare, finibus maximus turpis interdum. Maecenas eu ipsum luctus, auctor elit id, dignissim sem. Suspendisse faucibus elit ut viverra semper. Proin non sem hendrerit, blandit metus ac, accumsan risus. Praesent eleifend magna ac lorem aliquet gravida. Nunc ac est non tortor molestie ultrices volutpat eu elit. Integer vehicula in massa quis dictum. Maecenas ac neque sed orci lobortis fermentum. \r\n', '2018-12-11'),
(2, 11, 'Bob\'s first post', 'https://www.articque.com/wp-content/themes/articque/images/backgrounds/header/art-header-main/full/blue_art-header-main.jpg', 'Bob likes technology. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi cursus arcu nec elit varius dictum. Mauris facilisis ipsum in elit bibendum placerat. Ut finibus arcu eget tortor tempor ornare. In leo ex, convallis aliquam est et, molestie laoreet tellus. Pellentesque eget nibh orci. Nullam sit amet ornare orci. Quisque non mattis erat. Nam aliquet posuere tincidunt. Aenean viverra arcu odio, id imperdiet elit ultrices sed.\r\n\r\nAenean quis bibendum elit. Suspendisse congue ultrices tellus, congue accumsan felis fringilla eget. Sed vel libero at enim euismod feugiat. Aenean vitae lobortis massa. Vestibulum neque erat, rutrum id faucibus id, luctus sit amet ante. Proin porttitor et diam a imperdiet. Nunc mattis velit eu mi vulputate, sed iaculis erat vehicula. Praesent ac tellus vehicula, eleifend nunc sit amet, varius mauris. Duis porttitor orci nibh, in venenatis sem porta quis. ', '2018-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
