-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 29 2023 г., 20:43
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `music_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `musics`
--

CREATE TABLE `musics` (
  `id` int NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(51) COLLATE utf8mb4_general_ci NOT NULL,
  `dir` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `musics`
--

INSERT INTO `musics` (`id`, `title`, `author`, `dir`, `image`) VALUES
(2, 'На повторі', 'Botashe', '/app/music/na_povtori.mp3', 'https://is1-ssl.mzstatic.com/image/thumb/Music126/v4/76/2f/0e/762f0eb4-a2bc-5dcd-16d2-ce29051407d5/859752150637_cover.jpg/1200x1200bf-60.jpg'),
(5, 'Amore', 'Bude tak', '/app/music/Amore-BudeTak.mp3', 'https://i.ibb.co/jZzSFPJ/1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(3, 'Mitter', '57758gfk@gmail.com', '$2y$10$na2dAtHoKvgWgzJrbjTWUuHc7Kq5bIB7lKC5Reu2p4xlX69JeTRE6', 1),
(4, 'UWU', '454545@gmail.com', '$2y$10$n3oWtmg7kBe7GDYYJr8Oxe/5Gl4tms0hGJJsxmPOsVdPE1YyoBrma', 0),
(7, 'Admin', '57758gfk@gmai.com', '$2y$10$Ms3nDT.BCmgaZtxdX1tEm.1ApUDujEKq6zrPsLb7pbJ8H4m74kSYy', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
