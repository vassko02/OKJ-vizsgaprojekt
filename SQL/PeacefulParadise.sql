-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2022. Feb 21. 08:06
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

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`PeacefulParadise`@`localhost` PROCEDURE `InsertIntoLog` (IN `un` VARCHAR(100), IN `st` VARCHAR(150), IN `t` VARCHAR(50), IN `id` INT)  NO SQL
BEGIN

IF t="Reservation" THEN
INSERT INTO reservationLog (Name,Status,Time,ReservationID)
VALUES (un,st,now(),id);

ELSEIF t="User" THEN
INSERT INTO userLog (Name,Status,Time,UserID) VALUES (un,st,now(),id);
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `codes`
--

CREATE TABLE `codes` (
  `CodeID` int(11) NOT NULL,
  `Code` varchar(255) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Expiry` datetime DEFAULT NULL,
  `Type` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `codes`
--

INSERT INTO `codes` (`CodeID`, `Code`, `Expiry`, `Type`, `CustomerID`) VALUES
(1, '12345', '2022-02-10 12:21:12', 'newacc', 9),
(4, '67e8b11bf078867e61a26022cbd5dd9f', '2022-02-11 12:21:20', 'newacc', 98),
(13, '1c7c3a1e4f11d228559a549f3be06f8f', '2022-02-15 13:09:25', 'activation_code', 127),
(14, 'c521379097d5f362e9eca9c201fedc88', '2022-02-15 13:09:46', 'reset_token', 127),
(15, 'b0fccd5ba439b6bc15ffce593bda4f6d', '2022-02-17 10:17:36', 'activation_code', 130);

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
(190, 11.49, 'Antipasto Bites', 327);

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
  `IsAdmin` tinyint(1) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LEVEL` varchar(150) NOT NULL,
  `ReservationNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Customer data';

--
-- A tábla adatainak kiíratása `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `PhoneNumber`, `Email`, `Address`, `UserName`, `Password`, `IsAdmin`, `active`, `activated_at`, `created_at`, `LEVEL`, `ReservationNumber`) VALUES
(9, 'admin', '+1420420123', 'admin@admin', 'Admin Street12311', 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1, 1, '2022-01-25 17:20:27', '0000-00-00 00:00:00', '', 1),
(41, 'Koaxk Ábel', '123', 'ko@x.com', 'dsa', 'koax', 'bb3745d30d57c6279777c579a20483bc', 0, 1, NULL, '2022-01-26 09:13:35', '', 0),
(42, 'Tüdő R. Ákos', '+csoves', 'tudor@akos.com', '9012 Győr Kossuth utca 11', 'TudoRaki', '', 0, NULL, NULL, '2022-01-26 09:20:00', '', 1),
(77, 'Bac Ilus', '+36304206969', 'example@gmail.com', '9027 Győr Szeszgyár utca 1', '', '', 0, NULL, NULL, '2022-01-27 12:25:43', '', 0),
(91, 'Kandisz Nóra', '+3620201234012', 'kandisz@gmail.com', 'EnesePutri Szabadság utca 59', 'Kandisz', 'abfeb5ac73556cadb0d0afc57d7221e8', 0, 1, NULL, '2022-01-31 12:35:28', '', 0),
(98, 'Hat Izsak', '1q2322', 'roncz.gabor@students.jedlik.eu', '', 'hatizsak', '2bcdc1d9f7472c8564fdc52f4bc6e410', 0, 1, NULL, '2022-02-06 17:33:33', '', 1),
(100, 'szia cigANY', '123', 'asd@asd', '', '', '', 0, NULL, NULL, '2022-02-11 14:26:18', '', 0),
(127, 'Anyad', 'asdasd', 'kalman.david@students.jedlik.eu', 'asdasd', 'anyad', '71e26f1fe35aaec97cd2151963c36f2b', 0, 1, '2022-02-14 13:09:31', '2022-02-14 12:09:25', '', 1),
(128, 'valamaiuj', '+36304206969', 'exampleeeeeeeeeeeeeeeeeeeeeeeeeee@gmail.com', '9027 Győr Szeszgyár utca 1', '', '', 0, NULL, NULL, '2022-02-16 08:30:07', '', 0),
(129, 'admin', '+1420420123', 'adminasd@admin', 'Admin Street123', '', '', 0, NULL, NULL, '2022-02-16 08:41:55', '', 0),
(130, 'aaaaaaaaaaaaaaaaaaaad', '', 'roncz.gabor1@gmail.com', '', 'aaaaaaaaaaaaaaaa', '570c4fef50ce6de1335b94e76ef95b53', 0, NULL, NULL, '2022-02-16 09:17:36', '', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Description` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `rating`
--

INSERT INTO `rating` (`RatingID`, `Name`, `Email`, `Description`, `Stars`) VALUES
(33, 'Magic5', 'mag@ic.hu', 'A hangulat, a kedvesség,a profizmus,ásványvíz a szobában, a reggeli fenséges,a házi vaníliás csiga,álom, a búcsuzáskor kapott keksz, az illat és aromadiffúzor a földszinten, a wellness, a berendezés....rengeteg dolgot lehetne felsorolni!', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `GuestName` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Problem` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `reports`
--

INSERT INTO `reports` (`ReportID`, `GuestName`, `Email`, `Problem`, `Time`) VALUES
(1, 'Bélafasz', 'cig@anyad', 'asd', '2022-02-21 08:22:20'),
(2, 'Bélafasz', 'asd@asd', 'asd', '2022-02-21 08:23:06'),
(3, 'Bélafasz', 'asd@asd', 'asd', '2022-02-21 08:30:53');

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
  `IsCheckedIn` tinyint(1) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `GuestNumber`, `Price`, `Children`, `Adults`, `ArrivalDate`, `LeavingDate`, `CustomerID`, `RoomID`, `ServiceID`, `IsCheckedIn`, `Message`) VALUES
(327, 2, 2099.95, 0, 2, '2022-04-20', '2022-04-25', 129, 36, 1, 0, 'Something very very important');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reservationLog`
--

CREATE TABLE `reservationLog` (
  `LogID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Status` varchar(150) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `ReservationID` int(11) DEFAULT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `reservationLog`
--

INSERT INTO `reservationLog` (`LogID`, `Name`, `Status`, `ReservationID`, `Time`) VALUES
(19, 'admin', 'Deleted reservation', 324, '2022-02-16 09:36:59'),
(20, 'valamaiuj', 'Created a reservation', 326, '2022-02-16 09:37:23'),
(21, 'Admin', 'Edited a reservation', 326, '2022-02-16 09:39:11'),
(22, 'Admin', 'Edited a reservation', 326, '2022-02-16 09:39:44'),
(23, 'Admin', 'Deleted a reservation', 326, '2022-02-16 09:39:47'),
(24, 'admin', 'Created a reservation', 327, '2022-02-16 09:41:57'),
(25, 'Admin', 'Added consumption', 327, '2022-02-16 09:42:51'),
(26, 'Hat Izsak', 'Created a reservation', 328, '2022-02-16 10:08:11'),
(27, NULL, 'Deleted a reservation', 328, '2022-02-16 10:08:36'),
(28, 'Hat Izsak', 'Deleted a reservation', 328, '2022-02-16 10:09:56'),
(29, 'Hat Izsak', 'Deleted a reservation', 328, '2022-02-16 10:16:54');

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
  `ImageURL3` text NOT NULL,
  `size` int(11) NOT NULL,
  `attributes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `Capacity`, `Description`, `RoomPrice`, `ImageURL1`, `ImageURL2`, `ImageURL3`, `size`, `attributes`) VALUES
(1, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will see on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(2, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will see on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(3, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will see on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(4, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will see on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(5, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will see on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_168_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_065_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_066_original.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(6, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(7, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(8, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(9, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(10, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1034_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_318_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_244_aspect16x9.jpg', 45, '4ktv;aircon;smartfridge;balcony'),
(11, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(12, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(13, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(14, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(15, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_135_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-168,3553-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_585_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.5,7778-0,0000-2988,4444-1681,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_417_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(16, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(17, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(18, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(19, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(20, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/PHL/PHL_493_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-116,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_494_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/PHL/PHL_496_original.jpg', 95, 'movietheatre;aircon;jacuzzi;balcony;champagne'),
(21, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(22, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(23, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(24, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(25, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-314,5000-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MMD/MMD_137_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-0,0000-1600,0000-900,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_136_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.24,0000-0,0000-2976,0000-1674,0000/publish/content/dam/fourseasons/images/web/MMD/MMD_418_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(26, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(27, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(28, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(29, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(30, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200, 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,7500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_1375_original.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530/publish/content/dam/fourseasons/images/web/ORL/ORL_224_aspect16x9.jpg', 'https://www.fourseasons.com/alt/img-opt/~80.1530.0,0000-156,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/ORL/ORL_541_original.jpg', 60, 'movietheatre;aircon;smartroom;balcony'),
(31, 'Burgundy Room | 2 Queen | Non-Smoking', 4, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 700, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMw/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNQ/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(32, 'Burgundy Room | 2 Queen | Non-Smoking', 4, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 700, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMw/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNQ/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(33, 'Burgundy Room | 2 Queen | Non-Smoking', 4, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 700, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMw/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNQ/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(34, 'Burgundy Room | 2 Queen | Non-Smoking', 4, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 700, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMw/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNQ/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(35, 'Burgundy Room | 2 Queen | Non-Smoking', 4, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 700, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMw/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvcGFyaXMvcGx2L2VuL2J1cmd1bmR5XzJxX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNQ/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(36, 'Burgundy Room | 1 Queen | Non-Smoking', 2, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 400, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMg/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMQ/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(37, 'Burgundy Room | 1 Queen | Non-Smoking', 2, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 400, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMg/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMQ/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(38, 'Burgundy Room | 1 Queen | Non-Smoking', 2, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 400, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMg/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMQ/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(39, 'Burgundy Room | 1 Queen | Non-Smoking', 2, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 400, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMg/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMQ/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(40, 'Burgundy Room | 1 Queen | Non-Smoking', 2, 'Spacious, bright and bold, our Burgundy Room combines classic European elegance with a modern flair. Splashes of vibrant burgundy complement the crisp brown-and-white color palette, creating a space that’s as warm as it is exciting. The luxurious bathroom boasts a marble counter along with a shower. Elsewhere in the room, you’ll find a full-size desk, a large flat-screen TV, custom accent pieces and convenient amenities like an in-room safe.', 400, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMg/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlMQ/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvaGFycmFocy9sYXMvZW4vbXRfZGx4XzFrX25zL19qY3JfY29udGVudC9jYXJkcy9jYXJkL3NsaWRlNA/wide/xl/cover', 35, 'flattv;aircon;coffeemaker'),
(41, 'Resort Room | 2 King | Non-Smoking', 4, 'The renovated Resort Room offers two queens pillowtop bed, all new furnishings and décor. This room measures\r\nmore than 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing\r\nboard, clock radio and wireless internet access. Renovated rooms also consist of an upgraded marble bathroom.', 800, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(42, 'Resort Room | 2 King | Non-Smoking', 4, 'The renovated Resort Room offers two queens pillowtop bed, all new furnishings and décor. This room measures\r\nmore than 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing\r\nboard, clock radio and wireless internet access. Renovated rooms also consist of an upgraded marble bathroom.', 800, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(43, 'Resort Room | 2 King | Non-Smoking', 4, 'The renovated Resort Room offers two queens pillowtop bed, all new furnishings and décor. This room measures\r\nmore than 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing\r\nboard, clock radio and wireless internet access. Renovated rooms also consist of an upgraded marble bathroom.', 800, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(44, 'Resort Room | 2 King | Non-Smoking', 4, 'The renovated Resort Room offers two queens pillowtop bed, all new furnishings and décor. This room measures\r\nmore than 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing\r\nboard, clock radio and wireless internet access. Renovated rooms also consist of an upgraded marble bathroom.', 800, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(45, 'Resort Room | 2 King | Non-Smoking', 4, 'The renovated Resort Room offers two queens pillowtop bed, all new furnishings and décor. This room measures\r\nmore than 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing\r\nboard, clock radio and wireless internet access. Renovated rooms also consist of an upgraded marble bathroom.', 800, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8ycV9ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(46, 'Resort Room | 1 King | Non-Smoking', 2, 'The renovated Resort Room offers one king pillowtop bed, all new furnishings and décor. This room measures more\r\nthan 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing board,\r\nclock radio and wireless internet access. Renovated rooms also consist of an upgraded bathroom.', 500, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(47, 'Resort Room | 1 King | Non-Smoking', 2, 'The renovated Resort Room offers one king pillowtop bed, all new furnishings and décor. This room measures more\r\nthan 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing board,\r\nclock radio and wireless internet access. Renovated rooms also consist of an upgraded bathroom.', 500, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(48, 'Resort Room | 1 King | Non-Smoking', 2, 'The renovated Resort Room offers one king pillowtop bed, all new furnishings and décor. This room measures more\r\nthan 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing board,\r\nclock radio and wireless internet access. Renovated rooms also consist of an upgraded bathroom.', 500, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(49, 'Resort Room | 1 King | Non-Smoking', 2, 'The renovated Resort Room offers one king pillowtop bed, all new furnishings and décor. This room measures more\r\nthan 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing board,\r\nclock radio and wireless internet access. Renovated rooms also consist of an upgraded bathroom.', 500, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker'),
(50, 'Resort Room | 1 King | Non-Smoking', 2, 'The renovated Resort Room offers one king pillowtop bed, all new furnishings and décor. This room measures more\r\nthan 450 square feet and includes a 42-inch flat-screen TV with in-room movies, hairdryer, iron and ironing board,\r\nclock radio and wireless internet access. Renovated rooms also consist of an upgraded bathroom.', 500, 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTE/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTI/wide/xl/cover', 'https://www.caesars.com/api/v1/image/L2NvbnRlbnQvc2NhZmZvbGRfcGFnZXMvcm9vbXMvYmFsbHlzL2Jsdi9lbi9yZXNvcnRfcm9vbV8xa19ucy9famNyX2NvbnRlbnQvY2FyZHMvY2FyZC9zbGlkZTQ/wide/xl/cover', 42, 'flattv;aircon;coffeemaker');

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
(54, 'Cranberry Brie Bites', 13.99, 'Appetiser', 'https://hips.hearstapps.com/hmg-prod/images/delish-cranberry-brie-bites-horizontal-3-1540486092.jpg'),
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
(78, 'Ginger Layer Cake with Wine Poached Pears', 15.99, 'Dessert', 'https://www.supergoldenbakes.com/wordpress/wp-content/uploads/2018/09/Ginger_pear_cake-1.jpg'),
(79, 'Matchamisu - Matcha (Green Tea) Tiramisu', 18.99, 'Dessert', 'https://www.ohhowcivilized.com/wp-content/uploads/2013/06/0613-matcha-green-tea-tiramisu-matchamisu-1.jpg'),
(80, 'Chocolate Covered Strawberry Mini Cheesecakes', 21.99, 'Dessert', 'https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_683,h_1024/https://www.awayfromthebox.com/wp-content/uploads/2016/11/Chocolate-Covered-Strawberry-Mini-Cheesecakes-683x1024.jpg'),
(81, 'Blueberry Lavender Mini Cheesecakes', 18.79, 'Dessert', 'https://biancazapatka.com/wp-content/uploads/2020/06/blackberry-mini-cheesecake-raw-vegan.jpg'),
(82, 'Wine Soaked Chocolate Covered Cherries', 17.89, 'Dessert', 'https://www.awayfromthebox.com/wp-content/uploads/2018/07/Wine-Soaked-Chocolate-Covered-Cherries-2.jpg'),
(83, 'Lemon Blueberry Trifle', 21.99, 'Dessert', 'https://cdn.sallysbakingaddiction.com/wp-content/uploads/2018/04/lemon-berry-trifle-4.jpg'),
(85, 'Caprese Garlic Bread', 15.99, 'Appetiser', 'https://midwestfoodieblog.com/wp-content/uploads/2020/07/FINAL-tomato-bread-1-5.jpg'),
(86, 'Spinach Artichoke Bites', 13.99, 'Appetiser', 'data:image/jpeg;base64,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'),
(87, 'Beer Cheese Soup', 20.59, 'Soup', 'https://midwestfoodieblog.com/wp-content/uploads/2019/11/FINAL-beer-cheese-3-2-2-1200x1800.jpg'),
(88, 'Bourride Fish Stew With Aioli', 21.69, 'Soup', 'https://images.themodernproper.com/billowy-turkey/production/posts/2017/Bourride-french-fish-stew-13.jpg?w=1200&auto=compress%2Cformat&fit=crop&dm=1622907124&s=f1ba47ea227035cbca026a3010e19cdd'),
(89, 'Cinnamon-honey creme brulee\r\n\r\n', 17.99, 'Dessert', 'https://kitchenswagger.com/wp-content/uploads/2019/12/cinnamon-creme-brulee1.jpg'),
(90, 'Almond and date cake', 17.89, 'Dessert', 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `userLog`
--

CREATE TABLE `userLog` (
  `LogID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Status` varchar(150) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `userLog`
--

INSERT INTO `userLog` (`LogID`, `Name`, `Status`, `Time`, `UserID`) VALUES
(7, 'valamaiuj', 'Created a reservation', '2022-02-16 09:37:23', 128),
(8, 'admin', 'Created a reservation', '2022-02-16 09:41:57', 129),
(9, 'admin', 'Edited a user', '2022-02-16 09:59:07', 9),
(11, 'hatizsak', 'Edit his/her account', '2022-02-16 10:03:34', 98),
(12, 'Hat Izsak', 'Created a reservation', '2022-02-16 10:08:11', 98),
(13, 'aaaaaaaaaaaaaaaaaaaad', 'Created an account', '2022-02-16 10:17:36', 130),
(14, 'admin', 'Logged in', '2022-02-16 10:22:20', 9),
(15, 'admin', 'Logged out', '2022-02-16 10:22:25', 9),
(16, 'admin', 'Logged in', '2022-02-18 13:07:30', 9),
(17, 'admin', 'Logged in', '2022-02-18 13:40:57', 9),
(18, 'Bélafasz', 'Sent a report', '2022-02-21 08:22:20', 0),
(19, 'Bélafasz', 'Sent a report', '2022-02-21 08:23:06', 0),
(20, 'Bélafasz', 'Sent a report', '2022-02-21 08:30:53', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`CodeID`),
  ADD KEY `CustomerID` (`CustomerID`);

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
-- A tábla indexei `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`);

--
-- A tábla indexei `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`);

--
-- A tábla indexei `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- A tábla indexei `reservationLog`
--
ALTER TABLE `reservationLog`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `ReservationID` (`ReservationID`);

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
-- A tábla indexei `userLog`
--
ALTER TABLE `userLog`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `UserID` (`UserID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `codes`
--
ALTER TABLE `codes`
  MODIFY `CodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `consumption`
--
ALTER TABLE `consumption`
  MODIFY `ConsumptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT a táblához `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT a táblához `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT a táblához `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT a táblához `reservationLog`
--
ALTER TABLE `reservationLog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT a táblához `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `storage`
--
ALTER TABLE `storage`
  MODIFY `StorageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT a táblához `userLog`
--
ALTER TABLE `userLog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

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
