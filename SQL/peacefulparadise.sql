-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jan 12. 10:08
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `peacefulparadise`
--
CREATE DATABASE IF NOT EXISTS `peacefulparadise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `peacefulparadise`;

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
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Customer data';

--
-- A tábla adatainak kiíratása `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `PhoneNumber`, `Email`, `Address`, `UserName`, `Password`) VALUES
(1, 'TestUser', '123', '123', '', '', ''),
(3, 'TestUser2', '123', '123', '', '', ''),
(4, 'Béla', '+3620123456', 'a@a.hu', '', '', ''),
(5, 'János', '123', '123', '', '', ''),
(6, 'Vass Kornél', '202483810', 'vass.kornel@gmail.com', 'Táncsics utca 33.', '', ''),
(7, 'teszt', '+32595411', 'a@a@teszt', '', '', ''),
(8, 'asd', 'asd', 'asd@ä', '', '', '');

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
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `storage`
--

INSERT INTO `storage` (`StorageID`, `ItemName`, `Price`, `Type`) VALUES
(2, 'Snickers', 1.49, 'Snack'),
(3, 'Planters Mixed Nuts', 7.99, 'Snack'),
(4, 'Pringles', 2.49, 'Snack'),
(5, 'LIFE WTR Purified Water', 7.99, 'Drink'),
(6, 'Red Bull Energy Drink (4 Pack)', 6.99, 'Drink'),
(7, 'M&M\'s', 6.49, 'Snack'),
(8, 'Coca Cola (1l)', 4.49, 'Drink'),
(9, 'Sprite (1l)', 4.49, 'Drink'),
(10, 'Fanta (1l)', 4.49, 'Drink'),
(11, 'Kinley Tonic (1l)', 4.49, 'Drink'),
(13, 'Aperol spritz', 5.99, 'Cocktail'),
(14, 'Bloody Mary', 9.99, 'Cocktail'),
(15, 'Cosmopolitan', 7.99, 'Cocktail'),
(16, 'Gin fizz', 6.99, 'Cocktail'),
(17, 'Long Island Ice Tea', 8.99, 'Cocktail'),
(18, 'Margarita', 8.99, 'Cocktail'),
(19, 'Mojito', 9.99, 'Cocktail'),
(20, 'Pina Colada', 7.49, 'Cocktail'),
(21, 'Zombie', 10.49, 'Cocktail'),
(22, 'Massage', 14.99, 'Service'),
(23, 'Billiard', 15.99, 'Service'),
(24, 'Hairdresser', 22.99, 'Service'),
(25, 'Bowling', 14.99, 'Service'),
(26, 'Tennis', 16.99, 'Service'),
(27, 'Breakfast in bed', 8.99, 'Service'),
(28, 'Natur Aqua', 3.99, 'Drink'),
(29, 'Kit Kat ', 10.79, 'Snack'),
(30, 'Cheez-It', 5.49, 'Snack'),
(31, 'Cheetos', 5.99, 'Snack'),
(32, 'Oreo Cookies', 3.99, 'Snack'),
(34, 'Heineken', 10.49, 'Drink'),
(35, 'Corona Beer', 17.99, 'Drink'),
(36, 'Moet & Chandon Imperial Champagne', 54.99, 'Drink'),
(37, 'Pol Roger Brut Champagne', 59.99, 'Drink'),
(38, 'Taittinger Brut Champagne', 54.99, 'Drink'),
(39, 'Ruinart Blanc de Blancs Champagne', 59.99, 'Drink'),
(40, '2020 Small Lot Savignon Blanc', 29.99, 'Drink'),
(41, 'Cellar Master Michael Cabernet Sauvignon', 34.99, 'Drink'),
(42, 'Cellar Master Ashley Cabernet Sauvignon\r\n', 33.99, 'Drink'),
(43, 'Cavalie 7 Cabernet Sauvignon\r\n', 36.99, 'Drink'),
(44, 'Jack Daniel\'s (2uz)', 6.99, 'Drink'),
(45, 'Jim Beam Kentucky Fire Bourbon (2uz)', 8.99, 'Drink'),
(46, 'Jameson Whiskey (2uz)', 7.49, 'Drink'),
(47, 'Absolut Vodka (1uz)\r\n', 5.99, 'Drink'),
(48, 'Finlandia Vodka (1uz)', 5.49, 'Drink'),
(49, 'Grey Goose Vodka (1uz)', 6.49, 'Drink'),
(50, 'Teremana Tequila (1uz)', 4.99, 'Drink'),
(51, 'Don Julio Tequila (1uz)', 5.99, 'Drink'),
(52, 'Ocho Tequila (1uz)', 5.49, 'Drink'),
(53, 'TartaTea (1uz)', 7.99, 'Drink');

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
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `StorageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
