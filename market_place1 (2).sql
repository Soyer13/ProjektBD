-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Paź 2023, 11:13
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `market_place1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_type`
--

CREATE TABLE `delivery_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `delivery_type`
--

INSERT INTO `delivery_type` (`id`, `name`, `price`, `image_url`) VALUES
(1, 'InPost', 10, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order`
--

CREATE TABLE `order` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prod_cat_id` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `users_id` int(11) NOT NULL,
  `if_sold` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `prod_cat_id`, `price`, `quantity`, `description`, `image_url`, `users_id`, `if_sold`) VALUES
(2, 'Komputer gamingowy', 2, '3500.00', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet condimentum purus, in porttitor orci. Morbi rutrum commodo tortor, a commodo ex tempor id. Aenean consequat libero eget neque sodales dapibus. Vestibulum consectetur mauris vitae porttitor bibendum. Etiam laoreet id massa mollis bibendum. Cras a pulvinar purus. Nulla at ornare eros. Nulla ornare quis eros ultricies suscipit. Vestibulum at ullamcorper massa. Etiam arcu urna, convallis maximus augue at, ultricies pulvinar mi. Nam a erat id nulla hendrerit sodales. Curabitur accumsan tincidunt purus id egestas. Etiam sodales, lectus at tempor elementum, justo augue accumsan nisi, ut tincidunt velit ante non nisl. Vestibulum ac lorem id ipsum tristique sodales.', '', 1, 'n'),
(3, 'Koszula', 3, '100.00', 5, 'Brak opisu', '', 1, 'n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `image_url`) VALUES
(1, 'Ogród', 'ogrod.jpg'),
(2, 'Elektronika', 'elektronika.jpg'),
(3, 'Moda', 'moda.jpg'),
(4, 'Motoryzacja', 'motoryzacja.jpg'),
(5, 'Uroda', 'uroda.jpg'),
(6, 'Dziecko', 'dziecko.jpg'),
(7, 'Sport i turystyka', 'sport.jpg'),
(8, 'Supermarket', 'supermarket.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`status`) VALUES
('n'),
('y');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `opinion` text NOT NULL,
  `del_type_id` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(400) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `if_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `phone`, `email`, `login`, `password`, `city`, `address`, `image_url`, `if_admin`) VALUES
(1, 'Nowakowska', 'Marta', '111222333', 'nowakowskam@zsikielce.pl', 'nowakowskam', 'marta123', 'Chełm', 'Janaszka 15', '', 'n');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`transaction_id`,`item_id`),
  ADD KEY `ord_pro_fk` (`product_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_cat_fk` (`prod_cat_id`),
  ADD KEY `pro_use_fk` (`users_id`),
  ADD KEY `if_sold_status` (`if_sold`);

--
-- Indeksy dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tra_del_fk` (`del_type_id`),
  ADD KEY `tra_use_fk` (`users_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `if_admin_status` (`if_admin`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `ord_pro_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `if_sold_status` FOREIGN KEY (`if_sold`) REFERENCES `status` (`status`),
  ADD CONSTRAINT `pro_cat_fk` FOREIGN KEY (`prod_cat_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `pro_use_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `tra_del_fk` FOREIGN KEY (`del_type_id`) REFERENCES `delivery_type` (`id`),
  ADD CONSTRAINT `tra_use_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `if_admin_status` FOREIGN KEY (`if_admin`) REFERENCES `status` (`status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
