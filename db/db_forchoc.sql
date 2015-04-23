-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 08:01 PM
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
(1, 'ryanmchale', 'd66fcc742cc640480ace083585445fd5cb3ea224', 'Ryan', 'McHale', '', 0, '3ce75f54793c521eb1a92847d7bd5415');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_categories'
--

CREATE TABLE IF NOT EXISTS tbl_categories (
  categories_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  categories_name varchar(75) NOT NULL,
  categories_slug varchar(15) NOT NULL,
  categories_img varchar(75) NOT NULL,
  categories_desc text NOT NULL,
  categories_longdesc text NOT NULL,
  categories_createdby varchar(75) NOT NULL,
  categories_createddate varchar(15) NOT NULL,
  PRIMARY KEY (categories_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_categories'
--

INSERT INTO tbl_categories (categories_id, categories_name, categories_slug, categories_img, categories_desc, categories_longdesc, categories_createdby, categories_createddate) VALUES
(1, 'Truffles', 'truffles', 'truffles.jpg', 'Savor the delightful rich chocolate sensation that has made Forrat''s famous.', 'What we pride ourselves on at Forrat''s Chocolates is our impeccable quality, and nowhere is that more evident than in our signature Truffles. Made with a variety of unique ingredients and flavors, once you try them you''ll be hooked.', 'Ryan', '20-03-15'),
(2, 'Bars', 'bars', 'bars.jpg', 'Try the Forrat''s spin on a regular chocolate bar.', 'Made with the freshest ingredients and the most luxurious chocolate, these gourmet chocolate bars are sure to have you coming back for more.', 'Ryan', '20-03-15'),
(3, 'Caramels', 'caramels', 'caramels.jpg', 'Our caramels are becoming one of our most popular creations. Try one and find out why.', 'These unique caramels are flavored with a variety of toppings and coatings and are sure to be a great pairing for any of our other signature products.', 'Ryan', '20-03-15'),
(4, 'Clusters', 'clusters', 'clusters.jpg', 'Fresh ingredients coated in rich luxurious chocolate.', 'We take the freshest local ingredients we can find and cover them with chocolate. What more could you ask for? These chocolate coated clusters are sure to please with their delightful crunch and silky chocolate taste.', 'Ryan', '20-03-15'),
(5, 'Dipped Yummies', 'dipped-yummies', 'dippedyummies.jpg', 'What in this world isn''t improved by being dipped in chocolate?', 'We are so confident in our chocolate, we think it can improve anything we coat it in! Try this unique selection of dipped yummies. These interesting flavour combinations are something you have to try to believe!', 'Ryan', '20-03-15'),
(6, 'Baskets', 'baskets', 'baskets.jpg', 'A box of delights awaits!', 'Try a selection of our signature treats for yourself with one of our basket collections. We offer a variety of packing options to fit any occasion. Great for gifts!', 'Ryan', '20-03-15'),
(7, 'Gift Cards', 'giftcards', 'giftcards.jpg', 'Share the love with a Forrat''s Gift Card', 'These gift cards can be preloaded with any amount of money to ensure your special someone never has to go without their fix of Forrat''s delicious chocolates.', 'Ryan', '20-03-15'),
(8, 'Bliss Box', 'blissbox', 'blissbox.jpg', 'A mystery box delivered to your door every month.', 'Can''t get enough Forrat''s? Try signing up for our monthly subscription box service. Every month we''ll send a grab bag of signature goodies and merchandise to your door. It''s different every month, and might just contain some exclusive treats not sold in store!', 'Ryan', '20-03-15'),
(9, 'Bouquet', 'bouquet', 'bouquet.jpg', 'Flowers and chocolate for your loved one.', 'An oldie but a goodie, flowers and chocolate are an unbeatable combination when you need to show that special someone you care. We take the headaches out of the process by becoming your one stop shop. We''ve partnered with 1-800-FLOWERS so you can order some of our treats and a bouquet of flowers for delivery in one go.', 'Ryan', '20-03-15');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_locations'
--

CREATE TABLE IF NOT EXISTS tbl_locations (
  locations_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  locations_telephone varchar(15) NOT NULL,
  locations_title varchar(75) NOT NULL,
  locations_lat varchar(75) NOT NULL,
  locations_long varchar(75) NOT NULL,
  locations_streetaddress varchar(75) NOT NULL,
  locations_city varchar(25) NOT NULL,
  locations_prov varchar(2) NOT NULL,
  locations_postal varchar(9) NOT NULL,
  PRIMARY KEY (locations_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_locations'
--

INSERT INTO tbl_locations (locations_id, locations_telephone, locations_title, locations_lat, locations_long, locations_streetaddress, locations_city, locations_prov, locations_postal) VALUES
(1, '519-455-2285', 'Forrat''s Chocolates at Covent Garden Market', '42.982367', '-81.250959', '130 King Street', 'London', 'ON', 'N6A 1C5'),
(2, '519-204-7904', 'Forrat''s Chocolates and Lounge', '42.960983', '-81.336608', '1304 Commissioners Road West, Unit 3', 'London', 'ON', 'N6K 1E1'),
(3, '289-389-5700', 'Forrat''s Chocolates on Locke', '43.255485', '-79.885753', '184 Locke Street South', 'Hamilton', 'ON', 'L8P 4B3');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_messages'
--

CREATE TABLE IF NOT EXISTS tbl_messages (
  messages_id smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  messages_name varchar(100) NOT NULL,
  messages_email varchar(100) NOT NULL,
  messages_message text NOT NULL,
  PRIMARY KEY (messages_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_messages'
--

INSERT INTO tbl_messages (messages_id, messages_name, messages_email, messages_message) VALUES
(1, 'Test', 'Test@gmail.com', 'Test'),
(2, 'Test', 'Test@gmail.com', 'Sweet'),
(3, 'Test', 'Test@gmail.com', 'Gablaga');

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
  pages_createdby varchar(25) NOT NULL,
  pages_createddate varchar(25) NOT NULL,
  PRIMARY KEY (pages_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_pages'
--

INSERT INTO tbl_pages (pages_id, pages_slug, pages_icon, pages_title, pages_meta, pages_brief, pages_content, pages_navlvl, pages_haskids, pages_navprnt, pages_hascontroller, pages_weight, pages_createdby, pages_createddate) VALUES
(1, 'home', '', 'Home', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Fed by controller', 1, 0, NULL, 1, 99, '', ''),
(2, 'about', '&#xf059;', 'About', '', 'Learn about Forrat''s Chocolate and Marc Forrat himself.', 'Fed by controller', 1, 0, NULL, 1, 85, '', ''),
(3, 'shop', '&#xf07a;', 'Shop', '', 'Browse our selection of delicious treats and bundles.', 'Fed by controller', 1, 0, NULL, 1, 60, '', ''),
(4, 'locations', '&#xf041;', 'Locations', '', 'Find a Forrat''s Chocolates location near you.', 'Fed by controller', 1, 0, NULL, 1, 45, '', ''),
(70, 'contact', '&#xf0e0;', 'Contact Us', '', 'Drop us a line or let us know what you think of our products. We''re always happy to chat to fellow chocolate lovers.', '', 1, 0, NULL, 1, 20, 'Ryan', '20-03-15');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_products'
--

CREATE TABLE IF NOT EXISTS tbl_products (
  products_id smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  products_category smallint(3) NOT NULL,
  products_name varchar(75) NOT NULL,
  products_desc text NOT NULL,
  products_image varchar(50) NOT NULL,
  PRIMARY KEY (products_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_products'
--

INSERT INTO tbl_products (products_id, products_category, products_name, products_desc, products_image) VALUES
(1, 1, 'Butterscotch', 'A bestseller - the sweetness of butterscotch in a milk chocolate ganache - it''s a beautiful mélange.', 'butterscotch_chocolate_truffle_145x145.jpg'),
(2, 1, 'Dark Champagne', 'Everybody celebrate! This is a festive truffle, good for any location. It doesn''t bubble, but it does satisfy.', 'champagne_chocolate_truffle_145x145.jpg'),
(3, 1, 'Chili', 'By popular demand, Chili has been a best seller since its introduction. Imagine sweetness with a little kick - not too hot - available in milk or dark chocolate.', 'chili_chocolate_truffle_145x145.jpg'),
(5, 1, 'Peanut Butter', 'Those other buttercups have nothing on the freshness of a Peanut Butter truffle. Once you try one, you won''t go back!', 'penutbutter_chocolate_truffle_145x145.jpg'),
(6, 1, 'Raspberry Wine', 'Combines a sweet, yet savory raspberry wine with chocolate (available in milk or dark).', 'raspberry_chocolate_truffle_145x145.jpg'),
(7, 3, 'Sea Salt', 'Luxurious chocolate coated with coarse sea salt. Comes in light, milk, and dark chocolate.', 'caramels.jpg'),
(8, 3, 'Hazelnut', 'Luxurious chocolate topped with crunchy hazelnut. Comes in light, milk, and dark chocolate.', 'caramels.jpg'),
(9, 3, 'Mini Pretzel Bites', 'Luxurious chocolate topped with cruncy pretzel pieces. Comes in light, milk, and dark chocolate.', 'caramels.jpg'),
(10, 3, 'Pecan', 'Luxurious chocolate studded with pecans. Comes in light, milk, and dark chocolate.', 'caramels.jpg'),
(11, 3, 'Almond', 'Luxurious chocolate topped with almond shavings. Comes in light, milk, and dark chocolate.', 'caramels.jpg'),
(12, 3, 'Coconut', 'Luxurious chocolate with a light flaking of coconut. Comes in light, milk, and dark chocolate.', 'caramels.jpg'),
(13, 2, 'Plain Chocolate Bars', 'Rich smooth chocolate available in plain, milk, or dark chocolate.', 'plain.jpg'),
(14, 2, 'Gourmet Chocolate Bars', 'Creamy rich chocolate studded with a variety of unique fresh ingredients and made to order by your selection.', 'gourmet.jpg'),
(15, 2, 'Meltaway Bars', 'A great selection of melting chocolate for your baking and cooking needs.', 'meltaway.jpg'),
(16, 4, 'Salted Pretzels', 'Cruncy salted pretzel clusters clusters covered in either dark chocolate, milk chocolate, or white chocolate.', 'clusters.jpg'),
(18, 4, 'Almond', 'Cruncy almond clusters covered in either dark chocolate, milk chocolate, or white chocolate.', 'clusters.jpg'),
(19, 4, 'Coconut', 'Flaked coconut clusters covered in either dark chocolate, milk chocolate, or white chocolate.', 'clusters.jpg'),
(20, 4, 'Berries', 'Fresh berry clusters covered in either dark chocolate, milk chocolate, or white chocolate.', 'clusters.jpg'),
(21, 4, 'Cherries', 'Fresh cherry clusters covered in either dark chocolate, milk chocolate, or white chocolate.', 'clusters.jpg'),
(22, 4, 'Marc''s (graham cookies, oats and nuts)', 'Try Marc''s favourite cluster combination of crunchy graham cookies, rolled oats, and fresh nuts.', 'clusters.jpg'),
(23, 4, 'Honey Roasted Peanuts', 'Delicious and sweet clusters of honey roasted peanuts covered in chocolate.', 'clusters.jpg');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_slide'
--

CREATE TABLE IF NOT EXISTS tbl_slide (
  slide_id tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  slide_title varchar(75) NOT NULL,
  slide_img varchar(100) NOT NULL,
  slide_text text NOT NULL,
  PRIMARY KEY (slide_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_slide'
--

INSERT INTO tbl_slide (slide_id, slide_title, slide_img, slide_text) VALUES
(2, 'For All Occasions', 'slide1.jpg', 'What better way to show someone than you care with one of our special box bundles. Or, if you screw up on a regular basis, consider signing up for our monthly subscription service, Bliss Box.'),
(3, 'Only The Finest', 'slide2.jpg', 'We at Forrat''s Chocolates pride ourselves on using nothing but the best quality chocolate, ensuring a luxurious taste you aren''t soon to forget.'),
(4, 'For that Special Day', 'slide3.jpg', 'Are you planning a wedding? Consider Forrat''s Chocolates. We can supply that perfect sweet treat for gift bags or desserts on your special day.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
