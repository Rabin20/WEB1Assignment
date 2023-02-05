-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `article_name` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `articleAuthor` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publishDate` date DEFAULT NULL,
  `categoryID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`article_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`article_name`, `articleAuthor`, `publishDate`, `categoryID`, `Content`) VALUES
('Ballon Drama',	'Roy',	'2023-02-04',	'Politics',	'Balloon drama comes at precarious time in US-China relations'),
('BTS Yet to Come In Cinemas',	'Jung',	'2023-02-01',	'Entertainment',	' BTS Yet to Come in Cinema was so important for the desi fans who have been yearning to see the band'),
('Cardiovascular Disease',	'Dr.Sharma',	'2023-02-02',	'Health',	' Eating 5 Eggs Per Week May Help Lower Your Risk'),
('Expanded EV tax incentives by the Biden administration benefit Tesla, Cadillac, and others',	'Michael',	'2023-02-03',	'Business',	'The car on the right is ELECTRIC ONLY and gets 113 MPEe. It has 330 miles of range.\r<br>'),
('Filmmaker K Viswanath laid to rest',	'Kapil',	'2023-02-03',	'Entertainment',	' S S Rajamouli, Jr NTR, Mammootty, and A R Rahman expressed their condolences on social media.'),
('Ford CEO Jim Farley becomes increasingly frustrated.',	'Autums',	'2023-02-03',	'Business',	' So sad to hear it'),
('Hag Minds Tactics',	'Polard',	'2023-02-02',	'Sport',	' Ten Hag planning to hand Sabitzer Man United debut'),
('Knock At The Cabin movie review',	'Jojo',	'2023-02-03',	'Entertainment',	' Knock At The Cabin movie review: M Night Shyamalan takes the home invasion trope'),
('Legalizing marijuana is not associated with a rise in drug abuse',	'Snoop',	'2023-02-04',	'Health',	' A new study finds legalizing recreational cannabis does not increase substance misuse of cannabis or other illicit drugs.'),
('Ronaldo Back to football',	'Arthur',	'2023-02-06',	'Sport',	' Cristiano Ronaldo scores first goal for Al Nassr'),
('The Whale movie review: Weighing in',	'Tank',	'2023-02-04',	'Entertainment',	' The Whale might be the most schmaltzy of Aronofsky\'s films'),
('Vince McMahon is open to quitting WWE if he sells the business.',	'Alex',	'2023-02-02',	'Business',	' Hope to see new owner in WWE???');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`categoryName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`categoryName`) VALUES
('Business'),
('Entertainment'),
('Health'),
('Politics'),
('Sport');

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `commentId` int NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comnt_Date` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comnt_Content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_name` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorised` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comment` (`commentId`, `firstName`, `LastName`, `Comnt_Date`, `Comnt_Content`, `article_name`, `authorised`, `email`) VALUES
(1,	'khan',	'shek',	'2023/02/03',	' Good to see him back',	'Ronaldo Back to football',	'Y',	'khan@gmail.com'),
(2,	'khan',	'shek',	'2023/02/03',	' Love you',	'Ronaldo Back to football',	'Y',	'khan@gmail.com'),
(3,	'Rajendra',	'Yan',	'2023/02/03',	' what is wrong with them??',	'Ballon Drama',	'Y',	'raj@gmail.com'),
(4,	'Rajendra',	'Yan',	'2023/02/03',	'Yes good point ',	'Legalizing marijuana is not associated with a rise in drug abuse',	'Y',	'raj@gmail.com'),
(5,	'keshav',	'thapad',	'2023/02/03',	' Finally the movie is coming',	'The Whale movie review: Weighing in',	'Y',	'kull@gmail.com'),
(6,	'keshav',	'thapad',	'2023/02/03',	' Not good news',	'Expanded EV tax incentives by the Biden administration benefit Tesla, Cadillac, and others',	'Y',	'kull@gmail.com'),
(7,	'Kaji',	'Shrestha',	'2023/02/03',	' Egg is good idea',	'Cardiovascular Disease',	'Y',	'kaji@gmail.com'),
(8,	'Kaji',	'Shrestha',	'2023/02/03',	' Gooo Backkk',	'BTS Yet to Come In Cinemas',	'Y',	'kaji@gmail.com');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `FirstName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`FirstName`, `LastName`, `DOB`, `Email`, `Password`) VALUES
('Arushi',	'Datta',	'2023-02-28',	'arushi@gmail.com',	'89e7463b9d2ccb1d165779e99ae601545eb49dcf'),
('dolma',	'sherpa',	'2023-02-21',	'dolma@gmail.com',	'd66327f6d12ef8676c454022c26739ccd546cc79'),
('Rabin',	'Joshi',	'2023-02-06',	'joshi@gmail.com',	'52cfdc16cb8a04cac369e5e4cbee5891d41fa704'),
('Kaji',	'Shrestha',	'2023-02-16',	'kaji@gmail.com',	'96c7dd03cded7224cf9d4c766854ba38b050e080'),
('khan',	'shek',	'2023-02-20',	'khan@gmail.com',	'b9d9cff0706d52fb1a8938117691b34661eed2e8'),
('keshav',	'thapad',	'2023-02-22',	'kull@gmail.com',	'8aa5acc8c6a261fc5ead430e0aeda289d1759f59'),
('Peter',	'Park',	'2022-09-26',	'park@gmail.com',	'01e8906a38c867853c9d8421e76429d765b6aa06'),
('Rajendra',	'Yan',	'2023-02-21',	'raj@gmail.com',	'6c44ae31dde4a327a06fce0c161e2cbcf507dfeb'),
('sassy',	'sups',	'2023-02-10',	'sassy@gmail.com',	'd57ccb6da98c2adabb52b9b0386709620e093da4');

-- 2023-02-03 17:59:00