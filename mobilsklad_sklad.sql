-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 26 2019 г., 10:02
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mobilsklad_sklad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--
-- Создание: Май 19 2019 г., 12:13
-- Последнее обновление: Июн 12 2019 г., 13:53
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL DEFAULT '',
  `user_ip` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`) VALUES
(3, 'edmon', '9c50c4dd87bcdbacaba416508ad1fabe', '', 0),
(7, 'Hayk', '82f26dea803018bec9e6c135c540b4cd', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `buxgalter`
--
-- Создание: Май 19 2019 г., 12:13
-- Последнее обновление: Июн 24 2019 г., 05:07
--

DROP TABLE IF EXISTS `buxgalter`;
CREATE TABLE `buxgalter` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL DEFAULT '',
  `user_ip` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `buxgalter`
--

INSERT INTO `buxgalter` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`) VALUES
(1, 'buxgalter', '3675ac5c859c806b26e02e6f9fd62192', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--
-- Создание: Июн 18 2019 г., 12:41
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `kod` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL,
  `ves` double NOT NULL,
  `gorc` varchar(50) NOT NULL,
  `name_lev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`pid`, `name`, `kod`, `created_at`, `updated_at`, `user`, `ves`, `gorc`, `name_lev`) VALUES
(339, 'ПЭНД', '03513', '2019-06-12 09:21:09', '2019-06-12 09:21:09', '', 0, '', 'ПЭНД'),
(340, 'ПЭНД', '03513', '2019-06-12 09:21:23', '2019-06-12 09:21:23', 'edmon', 43.12, 'elq', ''),
(341, 'ПЭНД', '03513', '2019-06-12 09:21:29', '2019-06-12 09:21:29', 'edmon', 27.3, 'elq', ''),
(342, 'ПЭВД', '03153', '2019-06-12 09:31:24', '2019-06-12 09:31:24', '', 0, '', 'ПЭВД'),
(343, 'ПЭВД', '03153', '2019-06-12 07:32:10', '2019-06-12 07:32:10', 'Ivan', 14.34, 'mutq', ''),
(344, 'ПЭВД', '03153', '2019-06-12 08:35:33', '2019-06-12 08:35:33', 'Ivan', 13.17, 'mutq', ''),
(345, 'ПЭВД', '03153', '2019-06-12 09:35:33', '2019-06-12 09:35:33', 'edmon', 23.68, 'mutq', ''),
(346, 'ПЭНД', '03513', '2019-06-12 09:35:33', '2019-06-12 09:35:33', 'Dima', 23.17, 'mutq', ''),
(347, 'ПЭНД', '03513', '2019-06-12 09:35:33', '2019-06-12 09:35:33', 'edmon', 11.34, 'mutq', ''),
(348, 'ПЭВД', '03153', '2019-06-12 09:35:33', '2019-06-12 09:35:33', 'Dima', 31.05, 'mutq', ''),
(349, 'ПЭНД', '03513', '2019-06-12 10:45:33', '2019-06-12 10:45:33', 'Vova', 34.73, 'mutq', ''),
(350, 'ПЭВД', '03153', '2019-06-12 09:35:33', '2019-06-12 09:35:33', 'Vova', 12.49, 'mutq', ''),
(351, 'ПЭВД', '03153', '2019-06-12 09:42:07', '2019-06-12 09:42:07', 'Vova', 51.62, 'mutq', ''),
(352, 'ПЭНД', '03513', '2019-06-12 09:42:08', '2019-06-12 09:42:08', 'Vova', 31.16, 'mutq', ''),
(353, 'ПЭВД', '03153', '2019-06-12 09:42:08', '2019-06-12 09:42:08', 'Dima', 22.54, 'mutq', ''),
(354, 'ПЭВД', '03153', '2019-06-12 09:42:08', '2019-06-12 09:42:08', 'edmon', 13.11, 'mutq', ''),
(355, 'ПЭНД', '03513', '2019-06-12 09:42:08', '2019-06-12 09:42:08', 'edmon', 37.18, 'mutq', ''),
(356, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 31.57, 'mutq', ''),
(357, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 44.34, 'mutq', ''),
(358, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 56.79, 'mutq', ''),
(359, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.65, 'mutq', ''),
(360, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 23.11, 'mutq', ''),
(361, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 65.85, 'mutq', ''),
(362, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 42.14, 'mutq', ''),
(363, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.47, 'mutq', ''),
(364, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.52, 'mutq', ''),
(365, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.59, 'mutq', ''),
(366, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.32, 'mutq', ''),
(367, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.64, 'mutq', ''),
(368, 'ПЭВД', '03153', '2019-06-12 09:42:36', '2019-06-12 09:42:36', 'Vova', 51.81, 'mutq', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Май 26 2019 г., 05:06
-- Последнее обновление: Июн 23 2019 г., 08:15
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`) VALUES
(17, 'Ivan', '0d8d5cd06832b29560745fe4e1b941cf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `buxgalter`
--
ALTER TABLE `buxgalter`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `buxgalter`
--
ALTER TABLE `buxgalter`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
