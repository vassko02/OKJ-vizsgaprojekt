-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Dec 29. 13:39
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 7.3.31

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
(10, 'TestUser2', 8419.99, 'Guest paying at check-in', 9000, 580.0100000000002),
(11, 'Béla', 8129.99, 'Guest paying at check-in', 8200, 70.01000000000022),
(12, 'TestUser', 9129.99, 'Guest paying at check-in', 9200, 70.01000000000022),
(13, 'TestUser', 1, 'Guest paying when checking-out', 1, 0),
(14, 'Béla', 0, 'Guest paying when checking-out', 0, 0);

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
(6, 1, 'Accomodation', 1),
(12, 3619.99, 'Accomodation', 10),
(16, 1.49, 'Snickers', 10),
(20, 1.49, 'Snickers', 10),
(22, 9.99, 'Bloody Mary', 10),
(24, 7.99, 'LIFE WTR Purified Water', 4),
(25, 4.49, 'Coca Cola (1l)', 4),
(26, 1.49, 'Snickers', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Adress` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Customer data';

--
-- A tábla adatainak kiíratása `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `PhoneNumber`, `Email`, `Address`) VALUES
(1, 'TestUser', '123', '123', ''),
(3, 'TestUser2', '123', '123', ''),
(4, 'Béla', '+3620123456', 'a@a.hu', ''),
(5, 'János', '123', '123', '');

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
(1, 4, 9129.99, 3, 1, '2021-12-05', '2021-12-12', 1, 17, 2, 0),
(4, 3, 8419.99, 2, 1, '2021-12-17', '2021-12-24', 3, 26, 1, 1),
(8, 3, 8129.99, 1, 2, '2021-12-20', '2021-12-29', 4, 6, 2, 0),
(10, 4, 3619.99, 2, 2, '2021-12-12', '2021-12-16', 4, 6, 1, 1),
(11, 2, 1019.99, 1, 1, '2021-12-14', '2021-12-15', 1, 11, 1, 0),
(15, 3, 7229.99, 2, 1, '2022-01-05', '2022-01-13', 1, 6, 2, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `room`
--

CREATE TABLE `room` (
  `RoomID` int(11) NOT NULL,
  `RoomName` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `RoomPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `Capacity`, `Description`, `RoomPrice`) VALUES
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
(32, 'Oreo Cookies', 3.99, 'Snack');

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
  MODIFY `CashRegisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `consumption`
--
ALTER TABLE `consumption`
  MODIFY `ConsumptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `StorageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
