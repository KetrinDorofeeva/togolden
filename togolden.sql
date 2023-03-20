-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2023 г., 13:50
-- Версия сервера: 5.7.29
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `togolden`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL COMMENT 'ID комментария',
  `id_company` int(11) NOT NULL COMMENT 'ID компании',
  `id_user` int(11) NOT NULL COMMENT 'ID пользователя',
  `name_comment` text COMMENT 'Комментарий к названию компании',
  `inn_comment` text COMMENT 'Комментарий к ИНН компании',
  `general_information_comment` text COMMENT 'Комментарий к общей информации компании',
  `general_manager_comment` text COMMENT 'Комментарий к генеральному директору компании',
  `address_comment` text COMMENT 'Комментарий к адресу компании',
  `phone_comment` text COMMENT 'Комментарий к телефону компании',
  `general_comment` text COMMENT 'Общий комментарий компании',
  `time_comment` datetime NOT NULL COMMENT 'Время добавления комментария'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `id_company`, `id_user`, `name_comment`, `inn_comment`, `general_information_comment`, `general_manager_comment`, `address_comment`, `phone_comment`, `general_comment`, `time_comment`) VALUES
(7, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Все супер', '2023-02-23 18:33:16'),
(12, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Мнение положительное', '2023-02-23 19:42:18'),
(13, 1, 1, 'Отличное название', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 21:53:20'),
(15, 1, 1, NULL, 'Круто', NULL, NULL, NULL, NULL, NULL, '2023-02-24 12:55:50'),
(16, 1, 1, NULL, NULL, 'Интересно...', NULL, NULL, NULL, NULL, '2023-02-24 13:44:04'),
(17, 1, 1, NULL, NULL, NULL, 'Профессиональный специалист', NULL, NULL, NULL, '2023-02-24 13:48:33'),
(18, 1, 1, NULL, NULL, NULL, NULL, 'К счастью, близко', NULL, NULL, '2023-02-24 13:52:25'),
(19, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Отвечает вовремя', NULL, '2023-02-24 13:54:53'),
(20, 1, 2, 'Название не очень', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 20:19:41'),
(21, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Мнение отрицательное', '2023-02-24 20:19:57'),
(22, 2, 3, 'Отличное название', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 17:42:28'),
(23, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Мнение положительное', '2023-03-19 17:42:40');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL COMMENT 'ID компании',
  `id_user` int(11) NOT NULL COMMENT 'ID пользователя',
  `name` varchar(255) NOT NULL COMMENT 'Название компании',
  `inn` int(255) NOT NULL COMMENT 'ИНН компании',
  `general_information` text NOT NULL COMMENT 'Общая информация',
  `general_manager` varchar(255) NOT NULL COMMENT 'Генеральный директор',
  `address` text NOT NULL COMMENT 'Адрес',
  `phone` varchar(255) NOT NULL COMMENT 'Телефон'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `id_user`, `name`, `inn`, `general_information`, `general_manager`, `address`, `phone`) VALUES
(1, 1, 'ОАО ТекстильНефтьМяс', 1434406742, 'О! помилуйте, ничуть. Я не стану есть. Мне лягушку - хоть сахаром облепи, не возьму ее в рот, а губы и руки вытер салфеткой. Повторивши это раза три, он попросил хозяйку приказать заложить его.', 'Тимофеева Анна Ивановна', '795112, Нижегородская область, город Балашиха, бульвар Славы, 59', '(495) 807-9866'),
(2, 1, 'ООО Компания ITСантехСантех', 1386436964, 'Информация о ООО Компания ITСантехСантех', 'Константинова Вероника Евгеньевна', '357498, Мурманская область, город Волоколамск, пр. 1905 года, 24', '(495) 072-2793'),
(3, 1, 'ООО Компания МонтажФинансИнфо', 1530747964, 'Информация о ООО Компания МонтажФинансИнфо', 'Филатова Фаина Борисовна', '165432, Новосибирская область, город Ступино, ул. Балканская, 37', '8-800-418-1595'),
(4, 1, 'МФО ЦементНефтьЮпитер', 1953743785, 'Информация о МФО ЦементНефтьЮпитер', 'Ольга Львовна Андреева', '833988, Курская область, город Клин, шоссе Гоголя, 14', '+7 (922) 141-4129'),
(5, 1, 'МФО ЖелДор', 1237539746, 'Информация о МФО ЖелДор', 'Эмма Евгеньевна Сазонова', '768190, Орловская область, город Балашиха, ул. Ломоносова, 63', '+7 (922) 561-4168'),
(6, 1, 'ОАО ХозЮпитер', 1084638645, 'Информация о ОАО ХозЮпитер', 'Викентий Иванович Ермакова', '630617, Ярославская область, город Видное, пл. Сталина, 20', '(495) 630-2628'),
(7, 1, 'ООО СофтТекстильМетизЭкспедиция', 1329756704, 'Информация о ООО СофтТекстильМетизЭкспедиция', 'Фаина Романовна Сергеевна', '274033, Ростовская область, город Раменское, проезд Славы, 90', '(35222) 33-4905'),
(8, 1, 'ООО Компания РечКрепОблСнос', 1743546342, 'Информация о ООО Компания РечКрепОблСнос', 'Доронина Маргарита Сергеевна', '019133, Магаданская область, город Люберцы, шоссе Будапештсткая, 87', '(495) 634-1384'),
(9, 1, 'ПАО ТехТекстильСервис', 1063696476, 'Информация о ПАО ТехТекстильСервис', 'Сафонова Таисия Фёдоровна', '930687, Калужская область, город Лотошино, пер. Бухарестская, 91', '+7 (922) 047-4920'),
(10, 1, 'ОАО ГаражТелеРосОпт', 1175397456, 'Информация о ОАО ГаражТелеРосОпт', 'Рената Сергеевна Мухина', '552991, Калужская область, город Озёры, проезд Космонавтов, 32', '+7 (922) 232-4993'),
(11, 1, 'ЗАО СервисМоторМетиз', 1116876590, 'Информация о ЗАО СервисМоторМетиз', 'Ника Дмитриевна Матвеева', '320461, Псковская область, город Чехов, пер. Бухарестская, 87', '8-800-767-2917'),
(12, 1, 'МФО ВостокЛифт', 1853797536, 'Информация о МФО ВостокЛифт', 'Иннокентий Дмитриевич Степанов', '619172, Иркутская область, город Воскресенск, пл. Гагарина, 25', '(812) 468-73-51'),
(13, 1, 'ОАО ВекторТяжКазань', 1745643686, 'Информация о ОАО ВекторТяжКазань', 'Сысоева Клара Дмитриевна', '098019, Ярославская область, город Ногинск, ул. Ленина, 72', '+7 (922) 172-2597'),
(15, 3, 'Новая компания', 1234567891, 'Информация о Новой компании', 'Дорофеева Екатерина Александровна', 'Где-то', '89654326781');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ID пользователя',
  `username` varchar(255) NOT NULL COMMENT 'Логин',
  `password` varchar(255) NOT NULL COMMENT 'Пароль',
  `auth_key` varchar(255) DEFAULT NULL COMMENT 'Ключ аутентификации',
  `avatar` text COMMENT 'Аватар',
  `surname` varchar(255) NOT NULL COMMENT 'Фамилия',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `middle_name` varchar(255) DEFAULT NULL COMMENT 'Отчество',
  `gender` int(11) NOT NULL COMMENT 'Пол.\r\n1 - Мужчина;\r\n2 - Женщина.',
  `date_birth` date NOT NULL COMMENT 'Дата рождения',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Телефон',
  `email` text NOT NULL COMMENT 'Email',
  `address` text NOT NULL COMMENT 'Местоположение',
  `description` text COMMENT 'Краткое описание',
  `registration_date` date NOT NULL COMMENT 'Дата регистрации'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `avatar`, `surname`, `name`, `middle_name`, `gender`, `date_birth`, `phone`, `email`, `address`, `description`, `registration_date`) VALUES
(1, 'user', '6edf26f6e0badff12fca32b16db38bf2', NULL, 'avatars/null_user.png', 'Иванов', 'Иван', NULL, 1, '2001-10-05', NULL, 'user@mail.ru', 'Где-то', NULL, '2023-03-08'),
(2, 'admin', '6f5c9031811ded5682af8a15db7ff140', NULL, 'avatars/null_user.png', 'Королева', 'Екатерина', NULL, 2, '2002-05-01', NULL, 'admin@gmail.com', 'Где-то', NULL, '2023-03-09'),
(3, 'NewUser', '39239a4eee605d920ba36fa0251fe6aa', NULL, 'avatars/1679308689_user.jpg', 'Дорофеева', 'Екатерина', '', 2, '2001-05-22', '', 'multiveb@mail.ru', 'Санкт-Петербург ', '', '2023-03-19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID комментария', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID компании', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя', AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
