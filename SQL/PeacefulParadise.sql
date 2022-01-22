-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2022. Jan 22. 17:53
-- Kiszolgáló verziója: 5.5.62-0+deb8u1
-- PHP verzió: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `PeacefulParadise`
--
CREATE DATABASE IF NOT EXISTS `PeacefulParadise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `PeacefulParadise`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cashregister`
--

CREATE TABLE `cashregister` (
  `CashRegisterID` int(11) NOT NULL,
  `GuestName` varchar(50) NOT NULL,
  `Amount` double NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Paid` double NOT NULL,
  `Changee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `cashregister`
--

INSERT INTO `cashregister` (`CashRegisterID`, `GuestName`, `Amount`, `Title`, `Paid`, `Changee`) VALUES
(1, 'TestUser', 1, 'Guest paying at chack-in', 0, 0),
(2, 'TestUser', 8.45, 'Guest paying when checking-out', 0, 0),
(3, 'TestUser', 1, 'Guest paying at check-in', 0, 0),
(4, 'TestUser', 1, 'Guest paying at check-in', 0, 0),
(5, 'TestUser', 1, 'Guest paying at check-in', 10, 9),
(6, 'TestUser', 1, 'Guest paying when checking-out', 1, 0),
(7, 'TestUser', 1, 'Guest paying at check-in', 10, 9),
(8, 'TestUser', 8.45, 'Guest paying when checking-out', 10, 1.55),
(9, 'TestUser', 8.45, 'Guest paying when checking-out', 8.45, 0),
(13, 'TestUser', 1, 'Guest paying when checking-out', 1, 0),
(14, 'Béla', 0, 'Guest paying when checking-out', 0, 0),
(15, 'TestUser', 629.99, 'Guest paying at check-in', 630, 0.01),
(16, 'TestUser', 232.38000000000002, 'Guest paying when checking-out (CARD)', 232.38000000000002, 0),
(17, 'TestUser', 629.99, 'Guest paying at check-in', 700, 70.01),
(18, 'TestUser', 639.99, 'Guest paying at check-in', 1000, 360.01),
(19, 'TestUser', 2559.96, 'Guest paying when checking-out', 22222, 19662.04),
(20, 'TestUser', 66.44999999999999, 'Guest paying when checking-out', 70, 3.55),
(21, 'TestUser', 696.44, 'Guest paying when checking-out', 700, 3.56),
(22, 'János', 1229.99, 'Guest paying when checking-in (CARD)', 1229.99, 0),
(23, 'Vass Kornél', 1889.97, 'Guest paying when checking-in (CARD)', 1889.97, 0),
(24, 'Bac Ilus', 2489.97, 'Guest paying when checking-in (CARD)', 2489.97, 0),
(25, 'TestUser', 5279.96, 'Guest paying when checking-in (CARD)', 5279.96, 0),
(26, 'TestUser', 3689.97, 'Guest paying at check-in', 3700, 10.03),
(27, 'Vass Kornél', 4119.96, 'Guest paying when checking-in (CARD)', 4119.96, 0),
(28, 'Vass Kornél', 63.440000000000005, 'Guest paying when checking-out', 70, 6.56);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `consumption`
--

CREATE TABLE `consumption` (
  `ConsumptionID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `ReservationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `consumption`
--

INSERT INTO `consumption` (`ConsumptionID`, `Price`, `ItemName`, `ReservationID`) VALUES
(105, 9.99, 'Bloody Mary', 48),
(107, 15.99, 'Sweet Potato Bites', 48),
(108, 7.99, 'Cosmopolitan', 48),
(110, 6.99, 'Gin fizz', 48),
(111, 8.99, 'Long Island Ice Tea', 48),
(113, 13.49, 'Jalapeño Cheese Crisps', 48);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Customer data';

--
-- A tábla adatainak kiíratása `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `PhoneNumber`, `Email`, `Address`, `UserName`, `Password`, `IsAdmin`) VALUES
(1, 'TestUser', '123', '123', '', '', '', 0),
(3, 'TestUser2', '123', '123', '', '', '', 0),
(4, 'Béla', '+3620123456', 'a@a.hu', '', '', '', 0),
(5, 'János', '123', '123', '', '', '', 0),
(6, 'Vass Kornél', '202483810', 'vass.kornel@gmail.com', 'Táncsics utca 33.', '', '', 0),
(7, 'teszt', '+32595411', 'a@a@teszt', '', '', '', 0),
(8, 'asd', 'asd', 'asd@ä', '', '', '', 0),
(9, 'admin', '', 'admin@admin', '', 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1),
(10, 'Bac Ilus', '+36304206969', 'example@gmail.com', '9027 Győr Szeszgyár utca 1', '', '', 0),
(13, 'Kálmán Dávid', '', 'kalman.david@students.jedlik.eu', '', 'mauzileu', 'b575775b053c3c809187be6ff1714490', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reservation`
--

CREATE TABLE `reservation` (
  `ReservationID` int(11) NOT NULL,
  `GuestNumber` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Children` int(11) NOT NULL,
  `Adults` int(11) NOT NULL,
  `ArrivalDate` date NOT NULL,
  `LeavingDate` date NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `IsCheckedIn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `GuestNumber`, `Price`, `Children`, `Adults`, `ArrivalDate`, `LeavingDate`, `CustomerID`, `RoomID`, `ServiceID`, `IsCheckedIn`) VALUES
(48, 2, 5039.94, 1, 1, '2022-01-22', '2022-01-28', 6, 21, 3, 0),
(49, 4, 2819.9700000000003, 0, 4, '2022-01-23', '2022-01-26', 10, 6, 3, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `room`
--

CREATE TABLE `room` (
  `RoomID` int(11) NOT NULL,
  `RoomName` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `RoomPrice` double NOT NULL,
  `ImageURL1` text NOT NULL,
  `ImageURL2` text NOT NULL,
  `ImageURL3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `Capacity`, `Description`, `RoomPrice`, `ImageURL1`, `ImageURL2`, `ImageURL3`) VALUES
(1, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg'),
(2, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg'),
(3, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg'),
(4, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg'),
(5, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg'),
(6, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg'),
(7, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg'),
(8, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg'),
(9, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg'),
(10, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg'),
(11, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg'),
(12, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg'),
(13, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg'),
(14, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg'),
(15, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg'),
(16, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg'),
(17, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg'),
(18, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg'),
(19, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg'),
(20, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg'),
(21, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg'),
(22, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg'),
(23, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg'),
(24, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg'),
(25, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg'),
(26, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg'),
(27, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg'),
(28, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg'),
(29, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg'),
(30, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `servicetype`
--

CREATE TABLE `servicetype` (
  `ServiceID` int(11) NOT NULL,
  `ServicePrice` double NOT NULL,
  `ServiceType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `servicetype`
--

INSERT INTO `servicetype` (`ServiceID`, `ServicePrice`, `ServiceType`) VALUES
(1, 19.99, 'Breakfast only'),
(2, 29.99, 'Half Board'),
(3, 39.99, 'Full Board');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `storage`
--

CREATE TABLE `storage` (
  `StorageID` int(11) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `Type` varchar(50) NOT NULL,
  `ImageURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `storage`
--

INSERT INTO `storage` (`StorageID`, `ItemName`, `Price`, `Type`, `ImageURL`) VALUES
(2, 'Snickers', 1.49, 'Snack', ''),
(3, 'Planters Mixed Nuts', 7.99, 'Snack', ''),
(4, 'Pringles', 2.49, 'Snack', ''),
(5, 'LIFE WTR Purified Water', 7.99, 'Drink', ''),
(6, 'Red Bull Energy Drink (4 Pack)', 6.99, 'Drink', ''),
(7, 'M&M\'s', 6.49, 'Snack', ''),
(8, 'Coca Cola (1l)', 4.49, 'Drink', ''),
(9, 'Sprite (1l)', 4.49, 'Drink', ''),
(10, 'Fanta (1l)', 4.49, 'Drink', ''),
(11, 'Kinley Tonic (1l)', 4.49, 'Drink', ''),
(13, 'Aperol spritz', 5.99, 'Cocktail', ''),
(14, 'Bloody Mary', 9.99, 'Cocktail', ''),
(15, 'Cosmopolitan', 7.99, 'Cocktail', ''),
(16, 'Gin fizz', 6.99, 'Cocktail', ''),
(17, 'Long Island Ice Tea', 8.99, 'Cocktail', ''),
(18, 'Margarita', 8.99, 'Cocktail', ''),
(19, 'Mojito', 9.99, 'Cocktail', ''),
(20, 'Pina Colada', 7.49, 'Cocktail', ''),
(21, 'Zombie', 10.49, 'Cocktail', ''),
(22, 'Massage', 14.99, 'Service', ''),
(23, 'Billiard', 15.99, 'Service', ''),
(24, 'Hairdresser', 22.99, 'Service', ''),
(25, 'Bowling', 14.99, 'Service', ''),
(26, 'Tennis', 16.99, 'Service', ''),
(27, 'Breakfast in bed', 8.99, 'Service', ''),
(28, 'Natur Aqua', 3.99, 'Drink', ''),
(29, 'Kit Kat ', 10.79, 'Snack', ''),
(30, 'Cheez-It', 5.49, 'Snack', ''),
(31, 'Cheetos', 5.99, 'Snack', ''),
(32, 'Oreo Cookies', 3.99, 'Snack', ''),
(34, 'Heineken', 10.49, 'Drink', ''),
(35, 'Corona Beer', 17.99, 'Drink', ''),
(36, 'Moet & Chandon Imperial Champagne', 54.99, 'Drink', ''),
(37, 'Pol Roger Brut Champagne', 59.99, 'Drink', ''),
(38, 'Taittinger Brut Champagne', 54.99, 'Drink', ''),
(39, 'Ruinart Blanc de Blancs Champagne', 59.99, 'Drink', ''),
(40, '2020 Small Lot Savignon Blanc', 29.99, 'Drink', ''),
(41, 'Cellar Master Michael Cabernet Sauvignon', 34.99, 'Drink', ''),
(42, 'Cellar Master Ashley Cabernet Sauvignon\r\n', 33.99, 'Drink', ''),
(43, 'Cavalie 7 Cabernet Sauvignon\r\n', 36.99, 'Drink', ''),
(44, 'Jack Daniel\'s (2uz)', 6.99, 'Drink', ''),
(45, 'Jim Beam Kentucky Fire Bourbon (2uz)', 8.99, 'Drink', ''),
(46, 'Jameson Whiskey (2uz)', 7.49, 'Drink', ''),
(47, 'Absolut Vodka (1uz)\r\n', 5.99, 'Drink', ''),
(48, 'Finlandia Vodka (1uz)', 5.49, 'Drink', ''),
(49, 'Grey Goose Vodka (1uz)', 6.49, 'Drink', ''),
(50, 'Teremana Tequila (1uz)', 4.99, 'Drink', ''),
(51, 'Don Julio Tequila (1uz)', 5.99, 'Drink', ''),
(52, 'Ocho Tequila (1uz)', 5.49, 'Drink', ''),
(53, 'TartaTea (1uz)', 7.99, 'Drink', ''),
(54, 'Cranberry Brie Bites', 13.99, 'Appetiser', 'https://www.everyday-delicious.com/wp-content/uploads/2021/11/cranberry-brie-bites-everyday-delicious-1.jpg'),
(55, 'Cheesy Garlic Pull-Apart Bread', 12.99, 'Appetiser', 'https://i.pinimg.com/736x/9a/6c/73/9a6c738437bf79f537e30159bb00eaa9--pull-apart-garlic-bread-cheesy-pull-apart-bread.jpg'),
(56, 'Sweet Potato Bites', 15.99, 'Appetiser', 'https://www.wellplated.com/wp-content/uploads/2017/09/Baked-Sweet-Potato-Bites-with-Bacon-Avocado.jpg'),
(57, 'Antipasto Bites', 11.49, 'Appetiser', 'https://thesweetestoccasion.com/wp-content/uploads/2016/10/antipasto-skewers-party-appetizers-13.jpg.webp'),
(58, 'Jalapeño Cheese Crisps', 13.49, 'Appetiser', 'https://images.squarespace-cdn.com/content/v1/56a1b35c57eb8dec1842726c/1561053505206-QBN2LRMEX1MWQCL8DBY1/BigBookOfKeto_Bacon_Jalapeno_Cheese_Crisps_01.jpg'),
(59, 'Shrimp Cocktail\r\n\r\n', 15.89, 'Appetiser', 'https://feelgoodfoodie.net/wp-content/uploads/2021/11/how-to-make-shrimp-cocktail-8.jpg'),
(60, 'Butternut Squash Soup With Bacon', 19.99, 'Soup', 'https://hips.hearstapps.com/del.h-cdn.co/assets/16/42/1476887467-delish-butternut-squash-soup-pin-2.jpg'),
(61, 'Cream of Asparagus Soup', 18.79, 'Soup', 'https://greenhealthycooking.com/wp-content/uploads/2021/12/Creamy-Asparagus-Soup.jpg'),
(62, 'French Onion Potato Soup', 20.99, 'Soup', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/french-onion-potato-soup-1588871038.jpg?crop=0.532xw:1.00xh;0.146xw,0&resize=480:*'),
(63, 'Homemade Chicken Noodle Soup', 21.69, 'Soup', 'https://therecipecritic.com/wp-content/uploads/2019/11/best_chicken_noodle_soup.jpg'),
(64, 'Creamy Chicken and Wild Rice Soup', 22.49, 'Soup', 'https://gimmesomeoven.com/wp-content/uploads/2020/03/Best-Chicken-and-Wild-Rice-Soup-Recipe-1-Recovered.jpg'),
(65, 'Broccoli Cheese Soup', 23.19, 'Soup', 'https://www.twopeasandtheirpod.com/wp-content/uploads/2021/01/broccoli-cheese-soup-7.jpg'),
(66, 'Cedar-Plank Salmon', 34.99, 'Main Course', 'https://d33wubrfki0l68.cloudfront.net/76c92a93bffa4ee25fb916fa43283c905a1de79f/1a96c/images/uploads/2019_05_10_23_spiced_cedar_plank_salmon_with_a_maple_bourbon_glaze_2.jpg'),
(67, 'Braised Chicken Legs With Grapes and Fennel', 37.49, 'Main Course', 'https://assets.epicurious.com/photos/5f737a125a7e264184aab1b4/4:6/w_2220,h_3331,c_limit/ChickenGrapesFennel_HEROv2_12175.jpg'),
(68, 'Seared Scallops With Brown Butter and Lemon Pan Sauce', 40.99, 'Main Course', 'https://lenaskitchenblog.com/wp-content/uploads/2020/12/scallops-6.jpg'),
(69, 'Grilled Pizza', 39.99, 'Main Course', 'https://cookieandkate.com/images/2021/08/grilled-pizza-recipe-2-1.jpg'),
(70, 'Double-Stack Mushroom and Chicken Cheeseburgers', 43.99, 'Main Course', 'https://assets.epicurious.com/photos/60d1e9f95ce75804b416ca3b/4:6/w_3029,h_4544,c_limit/ChickenMushroomBurger_HERO_061721_18274.jpg'),
(71, 'Quick Potato Gnocchi', 43.99, 'Main Course', 'https://www.platingsandpairings.com/wp-content/uploads/2020/04/homemade-gnocchi-recipe-20-scaled.jpg'),
(72, 'Broken Lasagna With Parmesan and All the Peas', 46.99, 'Main Course', 'https://i2.wp.com/hipfoodiemom.com/wp-content/uploads/2021/01/Broken_Lasagna_pasta_2557.jpg'),
(73, 'Habanero BBQ Shrimp', 47.19, 'Main Course', 'https://assets.bonappetit.com/photos/5cdf092bccd61f5e644c2e7f/6:9/w_1524,h_2286,c_limit/grilled-shrimp-with-turmeric-mojo-sauce.jpg'),
(74, 'Grilled Pork Spare Ribs With Soda Bottle Barbecue Sauce', 43.99, 'Main Course', 'https://dinnerthendessert.com/wp-content/uploads/2017/02/Slow-Cooker-Barbecue-Ribs-680x1020.jpg'),
(75, 'Caesar Salad Roast Chicken', 37.99, 'Main Course', 'https://assets.epicurious.com/photos/5f8e0436eb27e3e71e94dd98/4:6/w_1000,h_1500,c_limit/caesar-salad-roast-chicken-recipe-BA-101920.jpg'),
(76, 'Grilled Coconut Shrimp With Shishito Peppers', 38.99, 'Main Course', 'https://assets.epicurious.com/photos/5ebadc7fd3e2cba2a7b37b4e/4:6/w_2011,h_3017,c_limit/GrilledShrimpShishito_HERO_050420_7490.jpg'),
(77, 'Gado Gado', 42.99, 'Main Course', 'https://cdn77-s3.lazycatkitchen.com/wp-content/uploads/2018/09/vegan-gado-gado-salad-tempeh-portion-1000x1500.jpg'),
(78, 'Ginger Layer Cake with Wine Poached Pears and Cream Cheese Frosting', 15.99, 'Dessert', 'https://www.supergoldenbakes.com/wordpress/wp-content/uploads/2018/09/Ginger_pear_cake-1.jpg'),
(79, 'Matchamisu - Matcha (Green Tea) Tiramisu', 18.99, 'Dessert', 'https://www.ohhowcivilized.com/wp-content/uploads/2013/06/0613-matcha-green-tea-tiramisu-matchamisu-1.jpg'),
(80, 'Chocolate Covered Strawberry Mini Cheesecakes', 21.99, 'Dessert', 'https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_683,h_1024/https://www.awayfromthebox.com/wp-content/uploads/2016/11/Chocolate-Covered-Strawberry-Mini-Cheesecakes-683x1024.jpg'),
(81, 'Blueberry Lavender Mini Cheesecakes', 18.79, 'Dessert', 'https://biancazapatka.com/wp-content/uploads/2020/06/blackberry-mini-cheesecake-raw-vegan.jpg'),
(82, 'Wine Soaked Chocolate Covered Cherries', 17.89, 'Dessert', 'https://www.awayfromthebox.com/wp-content/uploads/2018/07/Wine-Soaked-Chocolate-Covered-Cherries-2.jpg'),
(83, 'Lemon Blueberry Trifle', 21.99, 'Dessert', 'https://cdn.sallysbakingaddiction.com/wp-content/uploads/2018/04/lemon-berry-trifle-4.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cashregister`
--
ALTER TABLE `cashregister`
  ADD PRIMARY KEY (`CashRegisterID`);

--
-- A tábla indexei `consumption`
--
ALTER TABLE `consumption`
  ADD PRIMARY KEY (`ConsumptionID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- A tábla indexei `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- A tábla indexei `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- A tábla indexei `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`);

--
-- A tábla indexei `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`ServiceID`);

--
-- A tábla indexei `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`StorageID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cashregister`
--
ALTER TABLE `cashregister`
  MODIFY `CashRegisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `consumption`
--
ALTER TABLE `consumption`
  MODIFY `ConsumptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT a táblához `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT a táblához `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `storage`
--
ALTER TABLE `storage`
  MODIFY `StorageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `consumption`
--
ALTER TABLE `consumption`
  ADD CONSTRAINT `consumption_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`);

--
-- Megkötések a táblához `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`ServiceID`) REFERENCES `servicetype` (`ServiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
