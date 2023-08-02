-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 02 2023 г., 17:03
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `recipe_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `amounts`
--

CREATE TABLE `amounts` (
  `ID` int(11) NOT NULL,
  `ingredient_ID` int(11) NOT NULL,
  `recipe_ID` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `amounts`
--

INSERT INTO `amounts` (`ID`, `ingredient_ID`, `recipe_ID`, `amount`) VALUES
(1, 5, 1, 2),
(2, 2, 1, 1.2),
(3, 4, 2, 0.5),
(4, 6, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `measure_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`ID`, `name`, `measure_ID`) VALUES
(1, 'Соль', 1),
(2, 'Картофель мытый', 3),
(3, 'Перец', 1),
(4, 'Куриное филе', 3),
(5, 'Вода', 4),
(6, 'Растительное масло', 5),
(8, 'лук', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `measure`
--

CREATE TABLE `measure` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `measure`
--

INSERT INTO `measure` (`ID`, `name`) VALUES
(1, 'Граммы'),
(2, 'Миллиграммы'),
(3, 'Килограммы'),
(4, 'Литры'),
(5, 'Миллилитры');

-- --------------------------------------------------------

--
-- Структура таблицы `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `steps` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `recipes`
--

INSERT INTO `recipes` (`ID`, `name`, `steps`, `photo`) VALUES
(1, 'Вареный картофель', '1. Положить картофель в воду.\r\n2. Варить сорок минут.', 'application\\pictures\\gilberto-olimpio-MfgJxZdX39w-unsplash.jpg'),
(2, 'Жареное куриное филе', '1. Разогреть на сковороде растительное масло.\r\n2. Положить на сковороду куриное филе, жарить 15 минут, переворачивая.', 'application\\pictures\\egor-gordeev-1KT7q1IeDxU-unsplash.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ingredient_ID` (`ingredient_ID`),
  ADD KEY `recipe_ID` (`recipe_ID`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_measure` (`measure_ID`);

--
-- Индексы таблицы `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `amounts`
--
ALTER TABLE `amounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `measure`
--
ALTER TABLE `measure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `amounts`
--
ALTER TABLE `amounts`
  ADD CONSTRAINT `amounts_ibfk_1` FOREIGN KEY (`ingredient_ID`) REFERENCES `ingredients` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amounts_ibfk_2` FOREIGN KEY (`recipe_ID`) REFERENCES `recipes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`measure_ID`) REFERENCES `measure` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
