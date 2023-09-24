-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Wrz 2023, 18:57
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `market_place`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_type`
--

CREATE TABLE `delivery_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `delivery_type`
--

INSERT INTO `delivery_type` (`id`, `name`, `price`) VALUES
(1, 'InPost', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prod_cat_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `prod_cat_id`, `price`, `users_id`) VALUES
(1, 'Donica XL Zielona', 1, 35, 1),
(2, 'PS4 Stan Nowy', 2, 1500, 1),
(3, 'Kapelusz', 3, 20, 3),
(4, 'Pieluchy', 5, 20, 2),
(5, 'Inwit - Algorytm Wojny', 8, 30, 4),
(6, 'Opel Astra 2002', 10, 3000, 1),
(7, 'Kąpielówki', 9, 100, 2),
(8, 'Owoce', 4, 12, 1),
(9, 'Dyzodorant', 6, 20, 1),
(10, 'Berwitin', 7, 1500, 1),
(11, 'PS5 Używane', 2, 2500, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Dom i Ogród'),
(2, 'Elektronika'),
(3, 'Moda'),
(4, 'SuperMarket'),
(5, 'Dziecko'),
(6, 'Uroda'),
(7, 'Zdrowie'),
(8, 'Kultura i Rozrywka'),
(9, 'Sport i Turystyka'),
(10, 'Motoryzacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `opinion` text NOT NULL,
  `del_type_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `transactions`
--

INSERT INTO `transactions` (`id`, `products_id`, `users_id`, `quantity`, `address`, `opinion`, `del_type_id`, `total_price`) VALUES
(1, 1, 1, 1, 'Poznań ul. kwiatowa 60', 'Bardzo fajny produkt, szybka dostawa 5/5', 1, 45);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `if_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `email`, `login`, `password`, `if_admin`) VALUES
(1, 'Kowalski', 'Artur', 'kowalski_a99@wp.pl', 'kowalski_a99', '', 'n'),
(2, 'Dudek', 'Adam', 'AdamDudek@gmail.com', 'ADudek', 'maslo123', 'n'),
(3, 'Szlufk', 'Kuba', 'KubaSzlufik@gmail.com', 'KSzlufk', '123', 'n'),
(4, 'Soyer', 'Emil', 'EmilSoyer1234@gamil.com', 'EAdmin', 'Admin', 'y');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_cat_fk` (`prod_cat_id`),
  ADD KEY `pro_use_fk` (`users_id`);

--
-- Indeksy dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tra_del_fk` (`del_type_id`),
  ADD KEY `tra_pro_fk` (`products_id`),
  ADD KEY `tra_use_fk` (`users_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `delivery_type`
--
ALTER TABLE `delivery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `pro_cat_fk` FOREIGN KEY (`prod_cat_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `pro_use_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `tra_del_fk` FOREIGN KEY (`del_type_id`) REFERENCES `delivery_type` (`id`),
  ADD CONSTRAINT `tra_pro_fk` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `tra_use_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
