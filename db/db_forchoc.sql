-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 11:04 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'db_forchoc'
--

-- --------------------------------------------------------

--
-- Table structure for table 'ci_sessions'
--

CREATE TABLE IF NOT EXISTS ci_sessions (
  session_id varchar(40) NOT NULL DEFAULT '0',
  ip_address varchar(45) NOT NULL DEFAULT '0',
  user_agent varchar(120) NOT NULL,
  last_activity int(10) unsigned NOT NULL DEFAULT '0',
  user_data text NOT NULL,
  PRIMARY KEY (session_id),
  KEY last_activity_idx (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'ci_sessions'
--

INSERT INTO ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) VALUES
('053dd28e61996ca09e5554e939fd7e8d', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1426371565, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:10:"ryanmchale";s:4:"name";s:4:"Ryan";s:3:"sId";s:1:"1";s:5:"level";s:1:"0";s:12:"is_logged_in";b:1;}'),
('75f364f572f231ad1b8ad0afb0ddd15c', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1426365132, 'a:5:{s:8:"username";s:10:"ryanmchale";s:4:"name";s:4:"Ryan";s:3:"sId";s:1:"1";s:5:"level";s:1:"0";s:12:"is_logged_in";b:1;}'),
('95b80c0edaa20eed542de56c7f1560b7', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1426366348, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:10:"ryanmchale";s:4:"name";s:4:"Ryan";s:3:"sId";s:1:"1";s:5:"level";s:1:"0";s:12:"is_logged_in";b:1;}'),
('e16d831183aacb26cee6f85373503352', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1426370928, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:10:"ryanmchale";s:4:"name";s:4:"Ryan";s:3:"sId";s:1:"1";s:5:"level";s:1:"0";s:12:"is_logged_in";b:1;}'),
('ef6c99048db5912b68e1e676805441df', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1426365657, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:10:"ryanmchale";s:4:"name";s:4:"Ryan";s:3:"sId";s:1:"1";s:5:"level";s:1:"0";s:12:"is_logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_admin'
--

CREATE TABLE IF NOT EXISTS tbl_admin (
  admin_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  admin_username varchar(75) NOT NULL,
  admin_password varchar(300) NOT NULL,
  admin_firstname varchar(75) NOT NULL,
  admin_lastname varchar(75) NOT NULL,
  admin_email varchar(75) NOT NULL,
  admin_level tinyint(1) NOT NULL,
  admin_lastsession varchar(150) NOT NULL,
  PRIMARY KEY (admin_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_admin'
--

INSERT INTO tbl_admin (admin_id, admin_username, admin_password, admin_firstname, admin_lastname, admin_email, admin_level, admin_lastsession) VALUES
(1, 'ryanmchale', 'd66fcc742cc640480ace083585445fd5cb3ea224', 'Ryan', 'McHale', '', 0, '59e1b05f3ec184081dd3b270ba372553');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_locations'
--

CREATE TABLE IF NOT EXISTS tbl_locations (
  locations_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  locations_title varchar(75) NOT NULL,
  locations_lat varchar(75) NOT NULL,
  locations_long varchar(75) NOT NULL,
  PRIMARY KEY (locations_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_locations'
--

INSERT INTO tbl_locations (locations_id, locations_title, locations_lat, locations_long) VALUES
(1, 'Covent Garden Market - 130 King Street, London', '42.982367', '-81.250959'),
(2, '1304 Commissioners Road West Unit 3, Byron', '42.960983', '-81.336608'),
(3, '184 Locke Street South, Hamilton', '43.255485', '-79.885753');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_pages'
--

CREATE TABLE IF NOT EXISTS tbl_pages (
  pages_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  pages_slug varchar(50) NOT NULL,
  pages_icon varchar(25) NOT NULL DEFAULT '&#xf0f6;',
  pages_title varchar(100) NOT NULL,
  pages_meta varchar(200) NOT NULL,
  pages_brief text NOT NULL,
  pages_content text NOT NULL,
  pages_navlvl tinyint(1) NOT NULL DEFAULT '2',
  pages_haskids tinyint(1) NOT NULL DEFAULT '0',
  pages_navprnt varchar(50) DEFAULT NULL,
  pages_hascontroller tinyint(1) NOT NULL DEFAULT '0',
  pages_weight tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (pages_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_pages'
--

INSERT INTO tbl_pages (pages_id, pages_slug, pages_icon, pages_title, pages_meta, pages_brief, pages_content, pages_navlvl, pages_haskids, pages_navprnt, pages_hascontroller, pages_weight) VALUES
(1, 'home', '', 'Home', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Fed by controller', 1, 0, NULL, 1, 99),
(2, 'about', '&#xf059;', 'About', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Fed by controller', 1, 0, NULL, 1, 85),
(3, 'chocolate', '&#xf042;', 'Chocolate', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Fed by controller', 1, 0, NULL, 1, 60),
(4, 'locations', '&#xf041;', 'Locations', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Fed by controller', 1, 0, NULL, 1, 45),
(6, 'contact', '&#xf003;', 'Contact', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Fed by controller', 1, 0, NULL, 1, 30),
(15, 'newpage', '&#xf0f6;', 'New Page', '', 'A New Page', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis tellus vitae dolor faucibus, nec rhoncus risus scelerisque. Nulla consequat ligula ut sapien suscipit sollicitudin. Vivamus lacinia gravida sollicitudin. Nulla sed turpis et dolor iaculis sagittis ut a justo. Cras eleifend elit tortor. In eget gravida diam. Aliquam ut porta justo. Fusce tincidunt, dui eu varius congue, nunc erat tincidunt risus, eget ultricies mauris lacus ut urna. Ut a arcu facilisis, luctus velit sit amet, placerat metus. Sed velit tortor, maximus a consequat id, rutrum sed elit. Nullam mattis interdum orci, eget bibendum eros laoreet vitae. Fusce rhoncus nisl lectus, ut varius diam venenatis quis. Nam volutpat, lorem non ultrices bibendum, sapien mi convallis dui, vel rutrum nulla mauris vel odio. Ut condimentum faucibus enim a feugiat. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\n\n<p>Cras ac viverra neque. Cras aliquam ultrices lobortis. Quisque ut ex id mauris accumsan sodales. Quisque vestibulum eget magna sit amet tempor. Nam quis mattis tellus. Praesent fringilla dui ac metus luctus, eget tempor ante cursus. Morbi eget diam vehicula, placerat nibh nec, rutrum nisl. Pellentesque lobortis mollis elementum. Nam rutrum purus nec eros pharetra iaculis. Mauris vitae tellus vitae turpis blandit tincidunt sed vel nisi. Vestibulum ultrices nec metus non ornare. Vestibulum sapien nulla, viverra in magna in, luctus pellentesque felis. Praesent posuere sem a tortor dictum, vel laoreet enim aliquet. Maecenas nec tortor urna. Proin malesuada eros felis, nec fringilla justo rhoncus vel. Nulla ut felis in nunc cursus ultrices ac scelerisque augue.</p>\n\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ullamcorper nulla vel felis sollicitudin maximus. Morbi nec ipsum lectus. Suspendisse gravida sagittis dui, vel blandit magna porttitor a. Aliquam vulputate egestas enim, lacinia vehicula est efficitur ultrices. Aenean feugiat ornare feugiat. Proin eros nunc, tincidunt eget mauris ut, rhoncus vestibulum ante.</p>\n\n<p>Vestibulum pretium nunc erat, non tempus sem cursus vel. Nunc tristique felis sed ante ullamcorper, tempus imperdiet purus venenatis. Nunc lobortis elit vitae augue convallis, id fermentum tellus cursus. Quisque at arcu et tortor lobortis dictum vitae et ligula. Mauris feugiat laoreet ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque non leo vel quam tempus ornare id id leo. Nullam dapibus odio diam, id dignissim ipsum volutpat eu. Nullam quis turpis at enim consectetur finibus sit amet non ligula.</p>\n\n<p>Curabitur arcu massa, ultrices non leo et, interdum accumsan felis. Phasellus non eros vehicula, pharetra mauris vulputate, suscipit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eget mi eget turpis finibus congue. Integer interdum velit eu ipsum rutrum, eleifend laoreet enim ultrices. Phasellus volutpat ornare lacus et vestibulum. Vivamus sed nibh eget elit suscipit euismod. Suspendisse potenti. Nam vestibulum mauris magna, id tempor dui sagittis at. Integer blandit nisl vel sapien imperdiet ultrices.</p>\nCras ac viverra neque. Cras aliquam ultrices lobortis. Quisque ut ex id mauris accumsan sodales. Quisque vestibulum eget magna sit amet tempor. Nam quis mattis tellus. Praesent fringilla dui ac metus luctus, eget tempor ante cursus. Morbi eget diam vehicula, placerat nibh nec, rutrum nisl. Pellentesque lobortis mollis elementum. Nam rutrum purus nec eros pharetra iaculis. Mauris vitae tellus vitae turpis blandit tincidunt sed vel nisi. Vestibulum ultrices nec metus non ornare. Vestibulum sapien nulla, viverra in magna in, luctus pellentesque felis. Praesent posuere sem a tortor dictum, vel laoreet enim aliquet. Maecenas nec tortor urna. Proin malesuada eros felis, nec fringilla justo rhoncus vel. Nulla ut felis in nunc cursus ultrices ac scelerisque augue.</p>\n\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ullamcorper nulla vel felis sollicitudin maximus. Morbi nec ipsum lectus. Suspendisse gravida sagittis dui, vel blandit magna porttitor a. Aliquam vulputate egestas enim, lacinia vehicula est efficitur ultrices. Aenean feugiat ornare feugiat. Proin eros nunc, tincidunt eget mauris ut, rhoncus vestibulum ante.\n\nVestibulum pretium nunc erat, non tempus sem cursus vel. Nunc tristique felis sed ante ullamcorper, tempus imperdiet purus venenatis. Nunc lobortis elit vitae augue convallis, id fermentum tellus cursus. Quisque at arcu et tortor lobortis dictum vitae et ligula. Mauris feugiat laoreet ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque non leo vel quam tempus ornare id id leo. Nullam dapibus odio diam, id dignissim ipsum volutpat eu. Nullam quis turpis at enim consectetur finibus sit amet non ligula.</p>\n\n<p>Curabitur arcu massa, ultrices non leo et, interdum accumsan felis. Phasellus non eros vehicula, pharetra mauris vulputate, suscipit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eget mi eget turpis finibus congue. Integer interdum velit eu ipsum rutrum, eleifend laoreet enim ultrices. Phasellus volutpat ornare lacus et vestibulum. Vivamus sed nibh eget elit suscipit euismod. Suspendisse potenti. Nam vestibulum mauris magna, id tempor dui sagittis at. Integer blandit nisl vel sapien imperdiet ultrices.</p>', 2, 0, 'about', 0, 0),
(16, 'secondpage', '&#xf0f6;', 'Second Page', 'a page', 'Second page to test', 'New Page', 0, 0, NULL, 0, 35);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
