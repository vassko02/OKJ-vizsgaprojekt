-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2022. Jan 21. 09:36
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
(21, 'TestUser', 696.44, 'Guest paying when checking-out', 700, 3.56);

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
(10, 'Bac Ilus', '+36304206969', 'example@gmail.com', '9027 GyÅ‘r SzeszgyÃ¡r utca 1', '', '', 0),
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
(20, 2, 3199.95, 0, 2, '2022-04-20', '2022-04-25', 10, 1, 3, 0);

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
(54, 'Cranberry Brie Bites', 13.99, 'Appetizer', 'https://hips.hearstapps.com/hmg-prod/images/delish-cranberry-brie-bites-horizontal-3-1540486092.jpg'),
(55, 'Cheesy Garlic Pull-Apart Bread', 12.99, 'Appetizer', 'https://www.recipetineats.com/wp-content/uploads/2014/09/DSC_0297.jpg'),
(56, 'Sweet Potato Bites', 15.99, 'Appetizer', 'https://hips.hearstapps.com/del.h-cdn.co/assets/18/10/1520823181-shot-5-449.jpg?crop=1.0xw:1xh;center,top&resize=480:*'),
(57, 'Antipasto Bites', 11.49, 'Appetizer', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt7xgKMlSZZJhAeoDcRM_JUHHPKhc8029lzw&usqp=CAU'),
(58, 'Jalapeño Cheese Crisps', 13.49, 'Appetizer', 'https://images.squarespace-cdn.com/content/v1/56a1b35c57eb8dec1842726c/1561053505206-QBN2LRMEX1MWQCL8DBY1/BigBookOfKeto_Bacon_Jalapeno_Cheese_Crisps_01.jpg'),
(59, 'Shrimp Cocktail\r\n\r\n', 15.89, 'Appetizer', 'https://assets.bonappetit.com/photos/5b3bed6d02847f05a1933429/1:1/w_2560%2Cc_limit/ba-best-shrimp-cocktail-2.jpg'),
(60, 'Butternut Squash Soup With Bacon', 19.99, 'Soup', 'data:image/jpeg;base64,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'),
(61, 'Cream of Asparagus Soup', 18.79, 'Soup', 'https://bellyfull.net/wp-content/uploads/2020/02/Creamy-Asparagus-Soup-blog-3.jpg'),
(62, 'French Onion Potato Soup', 20.99, 'Soup', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/french-onion-potato-soup-1588871038.jpg?crop=0.532xw:1.00xh;0.146xw,0&resize=480:*'),
(63, 'Homemade Chicken Noodle Soup', 21.69, 'Soup', 'https://www.the-girl-who-ate-everything.com/wp-content/uploads/2016/10/homemade-chicken-noodle-soup-14.jpg'),
(64, 'Creamy Chicken and Wild Rice Soup', 22.49, 'Soup', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/instant-pot-chicken-soup-wild-rice-1603141135.jpg?crop=0.658xw:0.823xh;0.185xw,0.0574xh&resize=640:*'),
(65, 'Broccoli Cheese Soup', 23.19, 'Soup', 'https://www.twopeasandtheirpod.com/wp-content/uploads/2021/01/broccoli-cheese-soup-7.jpg'),
(66, 'Cedar-Plank Salmon', 34.99, 'Main Course', 'data:image/jpeg;base64,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'),
(67, 'Braised Chicken Legs With Grapes and Fennel', 37.49, 'Main Course', 'https://www.skinnytaste.com/wp-content/uploads/2018/12/Braised-Chicken-Thighs-with-Mushrooms-and-Leeks-1-3.jpg'),
(68, 'Seared Scallops With Brown Butter and Lemon Pan Sauce', 40.99, 'Main Course', 'https://i.pinimg.com/originals/96/58/ae/9658aef3dabc2535083adfe36985f102.jpg'),
(69, 'Grilled Pizza', 39.99, 'Main Course', 'https://cookieandkate.com/images/2021/08/grilled-pizza-recipe-2-1.jpg'),
(70, 'Double-Stack Mushroom and Chicken Cheeseburgers', 43.99, 'Main Course', 'https://assets.epicurious.com/photos/60d1e9f95ce75804b416ca3b/4:6/w_3029,h_4544,c_limit/ChickenMushroomBurger_HERO_061721_18274.jpg'),
(71, 'Quick Potato Gnocchi', 43.99, 'Main Course', 'https://img.buzzfeed.com/video-api-prod/assets/926dbe7dcb454e079331930ced3b4e5c/FB_Thumb.jpg'),
(72, 'Broken Lasagna With Parmesan and All the Peas', 46.99, 'Main Course', 'https://i2.wp.com/hipfoodiemom.com/wp-content/uploads/2021/01/Broken_Lasagna_pasta_2557.jpg'),
(73, 'Habanero BBQ Shrimp', 47.19, 'Main Course', 'data:image/jpeg;base64,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'),
(74, 'Grilled Pork Spare Ribs With Soda Bottle Barbecue Sauce', 43.99, 'Main Course', 'https://dinnerthendessert.com/wp-content/uploads/2017/02/Slow-Cooker-Barbecue-Ribs-680x1020.jpg'),
(75, 'Caesar Salad Roast Chicken', 37.99, 'Main Course', 'https://assets.epicurious.com/photos/5f8e0436eb27e3e71e94dd98/4:6/w_1000,h_1500,c_limit/caesar-salad-roast-chicken-recipe-BA-101920.jpg'),
(76, 'Grilled Coconut Shrimp With Shishito Peppers', 38.99, 'Main Course', 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F8475819.jpg&q=85'),
(77, 'Gado Gado', 42.99, 'Main Course', 'https://minimalistbaker.com/wp-content/uploads/2019/05/Gado-Gado-SQUARE.jpg'),
(78, 'Ginger Layer Cake with Wine Poached Pears and Cream Cheese Frosting', 15.99, 'Dessert', 'https://www.supergoldenbakes.com/wordpress/wp-content/uploads/2018/09/Ginger_pear_cake-1.jpg'),
(79, 'Matchamisu - Matcha (Green Tea) Tiramisu', 18.99, 'Dessert', 'https://www.ohhowcivilized.com/wp-content/uploads/2013/06/0613-matcha-green-tea-tiramisu-matchamisu-1.jpg'),
(80, 'Chocolate Covered Strawberry Mini Cheesecakes', 21.99, 'Dessert', 'https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_683,h_1024/https://www.awayfromthebox.com/wp-content/uploads/2016/11/Chocolate-Covered-Strawberry-Mini-Cheesecakes-683x1024.jpg'),
(81, 'Blueberry Lavender Mini Cheesecakes', 18.79, 'Dessert', 'https://res.cloudinary.com/abillionveg/image/upload/q_auto,a_exif,w_1080,h_1080,c_fill/v1613800013/unaaspnm8ibtf4tvgtiu.jpg'),
(82, 'Wine Soaked Chocolate Covered Cherries', 17.89, 'Dessert', 'https://www.awayfromthebox.com/wp-content/uploads/2018/07/Wine-Soaked-Chocolate-Covered-Cherries-2.jpg'),
(83, 'Lemon Blueberry Trifle', 21.99, 'Dessert', 'https://www.the-girl-who-ate-everything.com/wp-content/uploads/2017/08/TheGirlWhoAteEverything_LemonBlueberryTrifle_Hero-004.jpg');

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
  MODIFY `CashRegisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `consumption`
--
ALTER TABLE `consumption`
  MODIFY `ConsumptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT a táblához `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
