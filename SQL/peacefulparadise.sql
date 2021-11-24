-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 24. 10:28
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `IDNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Customer data';

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
  `ServiceID` int(11) NOT NULL
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
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `Capacity`, `Description`, `Price`) VALUES
(1, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600),
(2, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600),
(3, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600),
(4, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600),
(5, 'Classic Room | 1 King | Non-Smoking', 2, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 600),
(6, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900),
(7, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900),
(8, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900),
(9, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900),
(10, 'Classic Room | 2 Kings | Non-Smoking', 4, 'One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.', 900),
(11, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000),
(12, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000),
(13, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000),
(14, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000),
(15, 'Exclusive Room | 1 King | Smoking', 2, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1000),
(16, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300),
(17, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300),
(18, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300),
(19, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300),
(20, 'Exclusive Room | 2 Kings | Smoking', 4, 'One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.', 1300),
(21, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800),
(22, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800),
(23, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800),
(24, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800),
(25, 'Premium Room  | 1 King | Non-Smoking', 2, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 800),
(26, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200),
(27, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200),
(28, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200),
(29, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200),
(30, 'Premium Room  | 2 Kings | Non-Smoking', 4, 'A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.', 1200);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `servicetype`
--

CREATE TABLE `servicetype` (
  `ServiceID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `ServiceType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexek a kiírt táblákhoz
--

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
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `consumption`
--
ALTER TABLE `consumption`
  MODIFY `ConsumptionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT;

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
