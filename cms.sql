-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 03:15 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mountains'),
(2, 'Beaches'),
(3, 'Road Trip');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_email`, `comment_content`, `comment_status`) VALUES
(23, 21, '2019-01-29', 'Kami', 'kami@god.com', 'this is a test comment by God', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(19, 1, 'Mountain Vacation', 'Aatif Ahmad Khan', '2019-01-29', 'pic5.jpeg', '<h2>The Majestic Mountain Journey</h2><p>Quisque pretium viverra diam at egestas. Vivamus consequat auctor aliquam. Nam sit amet arcu in risus ultrices sagittis. Suspendisse potenti. In hac habitasse platea dictumst. Sed sem massa, aliquet in maximus vitae, congue auctor elit. Pellentesque mattis placerat sem, eu consequat augue luctus vitae. Nulla nec feugiat eros. Praesent a eros turpis. Quisque ut lectus commodo, posuere enim at, lobortis odio. Nunc ut tincidunt nulla. Suspendisse tincidunt non ligula quis porta. Aliquam metus urna, tincidunt sit amet eros vel, vehicula dictum libero.</p><p>Donec ornare ligula ultricies, bibendum magna quis, dignissim sapien. Maecenas tincidunt rutrum velit a tempus. Praesent nec pulvinar purus, at lacinia lorem. Cras aliquam porttitor ligula eget ullamcorper. Curabitur cursus lorem euismod, laoreet dui nec, porttitor lorem. Duis accumsan arcu nec dictum commodo. Donec mi odio, vehicula vel vestibulum ut, volutpat eu velit. Ut et gravida elit. Vestibulum vitae sagittis nisl, quis tempus leo. Vivamus ligula risus, lacinia eget convallis ac, tristique vel odio.</p><p>Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.</p>', 'mountains,vacation,trek,peace', 0, 'published'),
(20, 2, 'Peaceful Beaches, Spiritual Cleansing', 'Aatif Ahmad Khan', '2019-01-29', 'pic4.jpeg', '<p>Quisque pretium viverra diam at egestas. Vivamus consequat auctor aliquam. Nam sit amet arcu in risus ultrices sagittis. Suspendisse potenti. In hac habitasse platea dictumst. Sed sem massa, aliquet in maximus vitae, congue auctor elit. Pellentesque mattis placerat sem, eu consequat augue luctus vitae. Nulla nec feugiat eros. Praesent a eros turpis. Quisque ut lectus commodo, posuere enim at, lobortis odio. Nunc ut tincidunt nulla. Suspendisse tincidunt non ligula quis porta. Aliquam metus urna, tincidunt sit amet eros vel, vehicula dictum libero.</p><p>Donec ornare ligula ultricies, bibendum magna quis, dignissim sapien. Maecenas tincidunt rutrum velit a tempus. Praesent nec pulvinar purus, at lacinia lorem. Cras aliquam porttitor ligula eget ullamcorper. Curabitur cursus lorem euismod, laoreet dui nec, porttitor lorem. Duis accumsan arcu nec dictum commodo. Donec mi odio, vehicula vel vestibulum ut, volutpat eu velit. Ut et gravida elit. Vestibulum vitae sagittis nisl, quis tempus leo. Vivamus ligula risus, lacinia eget convallis ac, tristique vel odio.</p><p>Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.</p>', 'beaches,goa,vacation,spiritual', 0, 'published'),
(21, 3, 'A Road Trip is a Perfect Way to Live a Life', 'Aatif Ahmad Khan', '2019-01-29', 'pic3.jpeg', '<p>Quisque pretium viverra diam at egestas. Vivamus consequat auctor aliquam. Nam sit amet arcu in risus ultrices sagittis. Suspendisse potenti. In hac habitasse platea dictumst. Sed sem massa, aliquet in maximus vitae, congue auctor elit. Pellentesque mattis placerat sem, eu consequat augue luctus vitae. Nulla nec feugiat eros. Praesent a eros turpis. Quisque ut lectus commodo, posuere enim at, lobortis odio. Nunc ut tincidunt nulla. Suspendisse tincidunt non ligula quis porta. Aliquam metus urna, tincidunt sit amet eros vel, vehicula dictum libero.</p><p>Donec ornare ligula ultricies, bibendum magna quis, dignissim sapien. Maecenas tincidunt rutrum velit a tempus. Praesent nec pulvinar purus, at lacinia lorem. Cras aliquam porttitor ligula eget ullamcorper. Curabitur cursus lorem euismod, laoreet dui nec, porttitor lorem. Duis accumsan arcu nec dictum commodo. Donec mi odio, vehicula vel vestibulum ut, volutpat eu velit. Ut et gravida elit. Vestibulum vitae sagittis nisl, quis tempus leo. Vivamus ligula risus, lacinia eget convallis ac, tristique vel odio.</p><p>Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.</p>', 'road,roadtrip,biking,touring', 3, 'published'),
(22, 2, 'Future Post Title', 'Aatif Ahmad Khan', '2019-01-29', 'pic2.jpeg', '<p>Quisque pretium viverra diam at egestas. Vivamus consequat auctor aliquam. Nam sit amet arcu in risus ultrices sagittis. Suspendisse potenti. In hac habitasse platea dictumst. Sed sem massa, aliquet in maximus vitae, congue auctor elit. Pellentesque mattis placerat sem, eu consequat augue luctus vitae. Nulla nec feugiat eros. Praesent a eros turpis. Quisque ut lectus commodo, posuere enim at, lobortis odio. Nunc ut tincidunt nulla. Suspendisse tincidunt non ligula quis porta. Aliquam metus urna, tincidunt sit amet eros vel, vehicula dictum libero.</p><p>Donec ornare ligula ultricies, bibendum magna quis, dignissim sapien. Maecenas tincidunt rutrum velit a tempus. Praesent nec pulvinar purus, at lacinia lorem. Cras aliquam porttitor ligula eget ullamcorper. Curabitur cursus lorem euismod, laoreet dui nec, porttitor lorem. Duis accumsan arcu nec dictum commodo. Donec mi odio, vehicula vel vestibulum ut, volutpat eu velit. Ut et gravida elit. Vestibulum vitae sagittis nisl, quis tempus leo. Vivamus ligula risus, lacinia eget convallis ac, tristique vel odio.</p><p>Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.</p>', '', 0, 'draft'),
(23, 2, 'Another Future Post', 'Aatif Ahmad Khan', '2019-01-29', 'pic1.jpeg', '<p>Quisque pretium viverra diam at egestas. Vivamus consequat auctor aliquam. Nam sit amet arcu in risus ultrices sagittis. Suspendisse potenti. In hac habitasse platea dictumst. Sed sem massa, aliquet in maximus vitae, congue auctor elit. Pellentesque mattis placerat sem, eu consequat augue luctus vitae. Nulla nec feugiat eros. Praesent a eros turpis. Quisque ut lectus commodo, posuere enim at, lobortis odio. Nunc ut tincidunt nulla. Suspendisse tincidunt non ligula quis porta. Aliquam metus urna, tincidunt sit amet eros vel, vehicula dictum libero.</p><p>Donec ornare ligula ultricies, bibendum magna quis, dignissim sapien. Maecenas tincidunt rutrum velit a tempus. Praesent nec pulvinar purus, at lacinia lorem. Cras aliquam porttitor ligula eget ullamcorper. Curabitur cursus lorem euismod, laoreet dui nec, porttitor lorem. Duis accumsan arcu nec dictum commodo. Donec mi odio, vehicula vel vestibulum ut, volutpat eu velit. Ut et gravida elit. Vestibulum vitae sagittis nisl, quis tempus leo. Vivamus ligula risus, lacinia eget convallis ac, tristique vel odio.</p><p>Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.Curabitur pulvinar bibendum laoreet. Nunc imperdiet gravida est, at volutpat ligula egestas ut. Nullam volutpat arcu blandit fringilla molestie. Duis ac blandit odio, eget finibus dui. Ut imperdiet orci vitae lorem sodales, ut pretium eros fermentum. Vivamus eu felis venenatis risus varius vehicula ac rutrum magna. Nulla rhoncus ligula et elementum tempus. Curabitur condimentum, velit vitae laoreet convallis, erat tortor imperdiet ligula, vitae ornare dui arcu et orci. Proin venenatis metus in ante consectetur commodo. In laoreet in nibh id dignissim.</p><p>In bibendum pellentesque consequat. Nunc lacinia nisi quam, sit amet pretium diam porttitor placerat. Ut congue augue vitae risus volutpat interdum. Suspendisse porta metus eu ipsum eleifend auctor. Aenean imperdiet placerat convallis. Proin sodales sed nisi non iaculis. Donec vel interdum mauris.</p><p>Duis tincidunt, risus eget ultricies interdum, ligula orci finibus lacus, et sollicitudin nulla nulla vitae massa. Sed eget mollis diam, ut pretium orci. Integer ac dui feugiat, dapibus velit eu, sagittis justo. Morbi et justo odio. Nunc suscipit et nunc eu porttitor. Ut justo nunc, vehicula quis quam sed, tristique scelerisque dolor. Proin hendrerit lectus non molestie tincidunt.</p>', '', 0, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$areorioncharsetforsalt'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(21, 'aatifahmadkhan', '$2y$10$areorioncharsetforsalemRHM9DaPhFxEFs4fIkDAL1O/YgMMmSy', 'Aatif Ahmad', 'Khan', 'aatif.ahmad1020@gmail.com', 'IMG_20171216_100011763.jpg', 'Admin', '$2y$10$areorioncharsetforsalt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
