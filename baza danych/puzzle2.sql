-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Cze 2018, 10:28
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `puzzle2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `indeks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `indeks`) VALUES
(1, 'ZWIERZETA', 'zwierzeta'),
(2, 'MUZYKA', 'muzyka'),
(3, 'ZYWNOSC', 'zywnosc'),
(4, 'SAMOCHODY', 'samochody'),
(5, 'NATURA', 'natura'),
(6, 'SPORT', 'sport');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `puzzles`
--

CREATE TABLE `puzzles` (
  `id` int(11) NOT NULL,
  `name` varchar(160) CHARACTER SET latin1 NOT NULL,
  `category_id` int(11) NOT NULL,
  `indeks` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `puzzles`
--

INSERT INTO `puzzles` (`id`, `name`, `category_id`, `indeks`) VALUES
(1, 'Kotek', 1, 'zwierzeta'),
(2, 'Wróbelek', 1, 'zwierzeta-1'),
(3, 'Gitara', 2, 'muzyka'),
(4, 'Pianino', 2, 'muzyka-1'),
(5, 'Sluchawki', 2, 'muzyka-2'),
(7, 'Skrzypce', 2, 'muzyka-4'),
(8, 'Mikrofon', 2, 'muzyka-5'),
(10, 'rzeka', 5, 'natura'),
(11, 'las', 5, 'natura-1'),
(12, 'grzyb', 5, 'natura-2'),
(13, 'góry', 5, 'natura-3'),
(14, 'krajobraz', 5, 'natura-4'),
(15, 'pole', 5, 'natura-5'),
(16, 'pilka', 6, 'sport'),
(17, 'tor', 6, 'sport-1'),
(18, 'motor', 6, 'sport-2'),
(19, 'narty', 6, 'sport-3'),
(20, 'babington', 6, 'sport-4'),
(21, 'hokej', 6, 'sport-5'),
(22, 'slon', 1, 'zwierzeta-2'),
(23, 'kon', 1, 'zwierzeta-3'),
(24, 'pies', 1, 'zwierzeta-4'),
(25, 'lew', 1, 'zwierzeta-5'),
(26, 'truskwaki', 3, 'zywnosc'),
(27, 'warzywa', 3, 'zywnosc-1'),
(28, 'gofry', 3, 'zywnosc-2'),
(29, 'dodatki', 3, 'zywnosc-3'),
(30, 'kotlet', 3, 'zywnosc-4'),
(31, 'maliny', 3, 'zywnosc-5'),
(32, 'samochod1', 4, 'samochody'),
(33, 'samochod2', 4, 'samochody-1'),
(34, 'samochod3', 4, 'samochody-2'),
(35, 'samochod4', 4, 'samochody-3'),
(36, 'samochod5', 4, 'samochody-4'),
(37, 'samochod6', 4, 'samochody-5'),
(54, 'trabka', 2, 'muzyka-3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session`
--

CREATE TABLE `session` (
  `session_id` varchar(40) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `salt_token` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uniq_info` varchar(32) NOT NULL,
  `browser` text NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `session`
--

INSERT INTO `session` (`session_id`, `updated_at`, `salt_token`, `user_id`, `uniq_info`, `browser`, `ip`) VALUES
('2cNosWBvHj6oTyVzrDk9JmtRyQ7B6A1528043152', 1528043403, 'VvYO31Qi1W', 0, '9c2f1c659988404af27025fadad39aa3', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '::1'),
('5y6dAVudKKMYvw16cHdaaB15XyEtU51530087818', 1530088026, 'FwDTch47XW', 1, '92cd0529bd18bbbd299b49d9326fd559', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '::1'),
('eKnO74bfPduS2ouhijjSBln86HBLZ41529832961', 1529832966, '6UDeNWmDQZ', 0, '92cd0529bd18bbbd299b49d9326fd559', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '::1'),
('MWiv7VlVeciYAx6YGAOP7n8JHir5dp1528044913', 1528044917, 'za2DtbvKSa', 0, '95783d2dd5bc118d974bf3d25ac7e20e', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '::1'),
('wcsmz502eOExhyNQaFn3tTtb20UyTg1530023336', 1530023336, '3rR9drBjYo', 1, '92cd0529bd18bbbd299b49d9326fd559', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '::1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '1234'),
(2, 'madzia', 'madzia2'),
(3, 'kasia', 'kasia3'),
(4, 'papa', 'fdffdf');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puzzles`
--
ALTER TABLE `puzzles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `puzzles`
--
ALTER TABLE `puzzles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
