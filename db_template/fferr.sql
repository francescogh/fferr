SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `fferr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fferr`;

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `venueId` int(11) DEFAULT NULL,
  `venueVisitId` int(11) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `layout_style`;
CREATE TABLE `layout_style` (
  `id` int(11) NOT NULL,
  `label` varchar(25) DEFAULT NULL,
  `bgPatternType` varchar(25) DEFAULT NULL,
  `bgColor1` varchar(6) DEFAULT NULL,
  `bgColor2` varchar(6) DEFAULT NULL,
  `borderColor` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `layout_style` (`id`, `label`, `bgPatternType`, `bgColor1`, `bgColor2`, `borderColor`) VALUES
(1, 'pastisserie', 'flat', 'F4EFC9', NULL, '3C2E28'),
(2, 'imperial', 'flat', '800020', NULL, 'FFD700');

DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `menuItemCategory` varchar(25) NOT NULL,
  `iconURL` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `venue`;
CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `country` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `venueCategory` varchar(25) NOT NULL,
  `websiteURL` varchar(250) DEFAULT NULL,
  `mapURL` varchar(250) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `hasStudySpace` tinyint(1) DEFAULT NULL,
  `hasPoolTable` tinyint(1) DEFAULT NULL,
  `hasPingPong` tinyint(1) DEFAULT NULL,
  `hasLiveMusic` tinyint(1) DEFAULT NULL,
  `hasDanceHall` tinyint(1) DEFAULT NULL,
  `hasSportStreaming` tinyint(1) DEFAULT NULL,
  `about` text,
  `layoutStyleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `venue` (`id`, `name`, `city`, `country`, `address`, `postcode`, `venueCategory`, `websiteURL`, `mapURL`, `tel1`, `tel2`, `hasStudySpace`, `hasPoolTable`, `hasPingPong`, `hasLiveMusic`, `hasDanceHall`, `hasSportStreaming`, `about`, `layoutStyleId`) VALUES
(1, 'Red Box Marchmont', 'Edinburgh', 'UK', '2-6 Spottiswoode Rd', 'EH9 1BQ', 'coffee shop', 'http://www.redboxcoffee.com/', 'https://goo.gl/maps/bmTHuiVh7BkrJXp97', '+441314460188', NULL, 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 'The Chanter', 'Edinburgh', 'UK', '30-32 Bread St', 'EH3 9AF', 'pub', 'https://www.pubswithmore.co.uk/thechanter', 'https://goo.gl/maps/ukEQtf9jiLZAfRSs5', '+441312210575', NULL, 0, 1, 0, NULL, NULL, 1, NULL, 2),
(3, 'The Raging Bull', 'Edinburgh', 'UK', '161 Lothian Rd', 'EH3 9AA', 'pub', 'https://theragingbulledinburgh.co.uk/', 'https://g.page/theragingbulledinburgh?share', '+441312285558', NULL, 0, 0, 0, 1, 0, 0, NULL, 1),
(4, 'The Other Place', 'Edinburgh', 'UK', '2-4 Broughton Road', 'EH7 4EB', 'pub/bar', NULL, 'https://goo.gl/maps/VZ5QEFAmPCzrYvS66', NULL, NULL, 0, 0, 0, 1, 0, 0, 'O\'Connor\'s took over it.', 2);

DROP TABLE IF EXISTS `venue_has_menu_item`;
CREATE TABLE `venue_has_menu_item` (
  `venueId` int(11) NOT NULL,
  `menuItemId` int(11) NOT NULL,
  `note` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `venue_visit`;
CREATE TABLE `venue_visit` (
  `id` int(11) NOT NULL,
  `venueId` int(11) NOT NULL,
  `date` date NOT NULL,
  `rating` int(11) DEFAULT NULL COMMENT '1 to 5',
  `story` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venueId` (`venueId`),
  ADD KEY `venueVisitId` (`venueVisitId`);

ALTER TABLE `layout_style`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layoutStyleId` (`layoutStyleId`);

ALTER TABLE `venue_has_menu_item`
  ADD PRIMARY KEY (`venueId`,`menuItemId`),
  ADD KEY `has_menu_item` (`menuItemId`);

ALTER TABLE `venue_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venueId` (`venueId`);


ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `layout_style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `venue_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `image`
  ADD CONSTRAINT `image_of_venue` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_of_venue_visit` FOREIGN KEY (`venueVisitId`) REFERENCES `venue_visit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `venue`
  ADD CONSTRAINT `venue_layout_style` FOREIGN KEY (`layoutStyleId`) REFERENCES `layout_style` (`id`);

ALTER TABLE `venue_has_menu_item`
  ADD CONSTRAINT `has_menu_item` FOREIGN KEY (`menuItemId`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venue_has` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `venue_visit`
  ADD CONSTRAINT `venue_id` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
