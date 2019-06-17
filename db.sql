-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 17 2019 г., 10:45
-- Версия сервера: 5.7.25-28-log
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `host1560631_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Суши'),
(2, 'Спайс суши'),
(3, 'Классические роллы'),
(4, 'Роллы'),
(5, 'Жареные роллы'),
(6, 'Запечённые роллы'),
(7, 'Сеты'),
(8, 'Дополнительно'),
(9, 'Вок'),
(10, 'Пицца'),
(11, 'Горячие закуски'),
(12, 'Салаты'),
(13, 'Супы'),
(14, 'Бургеры'),
(15, 'Напитки');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subdomain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `subdomain`) VALUES
(1, 'Аксай', 'аксай'),
(2, 'Анапа', 'анапа'),
(3, 'Воронеж', 'воронеж'),
(4, 'Геленджик', 'геленджик'),
(5, 'Горячий Ключ', 'горячий-ключ'),
(6, 'Краснодар', 'краснодар'),
(7, 'Курск', 'курск'),
(8, 'Курчатов', 'курчатов'),
(9, 'Моздок', 'моздок'),
(10, 'Новороссийск', 'новороссийск'),
(11, 'Новочеркасск', 'новочеркасск'),
(12, 'Ростов-на-Дону', 'ростов'),
(13, 'Саратов', 'саратов'),
(14, 'Станица Динская', 'динская'),
(15, 'Тимашевск', 'тимашевск'),
(16, 'Усть-Лабинск', 'усть-лабинск'),
(17, 'Прохладный', 'прохладный'),
(19, 'Таганрог', 'таганрог'),
(20, 'Азов', 'азов'),
(21, 'Яблоновский', 'яблоновский'),
(22, 'Батайск', 'батайск'),
(23, 'Кропоткин', 'кропоткин'),
(24, 'Майкоп', 'майкоп'),
(25, 'Владикавказ', 'владикавказ'),
(26, 'Кореновск', 'кореновск'),
(27, 'Омск', 'омск');

-- --------------------------------------------------------

--
-- Структура таблицы `points`
--

CREATE TABLE `points` (
  `id` int(10) NOT NULL,
  `city` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `second_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `control` varchar(255) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `min_sum` int(11) DEFAULT NULL,
  `filial` int(11) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `points`
--

INSERT INTO `points` (`id`, `city`, `phone`, `second_phone`, `email`, `address`, `time`, `control`, `manager`, `min_sum`, `filial`, `api_key`, `status`) VALUES
(3, 1, '8 (918) 850-04-52', '', 'aksai@суши-даром.рф', 'ул.Платова, 83', 'Ежедневно с 10 : 00 - 23 : 00', '8 (988) 541-01-80 Екатерина', 5, 500, NULL, 'y2H2iiDtYkk7B5y7Aabei7b9z6RFHGh6tSTF5i2NAaG265Ys62AdYBdetTN5nY2HDFbtS46d4D5ZtQbnDBsi3zrhd4btK35by7yaZreQS9AaNBnd4GnS5E38y5r7Tf8ddte3HiDni3rZrF3ead26HQ45Ff3nrZstdzhQGN5SDfESNt2QzKH7nB3THQ72BkfFHsfe592tes9TK2z8A66NtTy4ysRZF2rddzh7y8nDnnh3bF2DATbTBAHZRk', 1),
(4, 2, '8 (938) 534-04-44', '', 'anapa@суши-даром.рф', 'ул. Промышленная, 16', 'Ежедневно с 10:00 - 23:00', 'Дмитрий Хан  8 (918) 094-33-67', 6, 500, 314, 'GR5h9nEhS8EQYtaTzsYGKKZnaEHDDG38iTfh7KtQGZsrdt8BKS8isTAtk8YQFHNRrT3ksf425hb8DaAbTyk9dNssKb6dKGT4nHdFR7tHdzGGz7HesYeyyAQ6BH8adS5sr7265eE7D9D36a7iYaGeBh93T84ZRTb6R43G7sEAr7ki7fzSh5ZHbZAYTrGz8KsQBeiyzRYQN72Hdhnnba2eZk4EDz4B7fbyknSH5BiFy9bBfsRisDrbQeFdDy', 1),
(6, 5, '8 (967) 664-29-29', '', 'kluch@суши-даром.рф', 'ул. Революции, 7, ТЦ «Пятая авеню»', 'Ежедневно с 10 : 00 - 23:00', 'Виктор Пак  8 (988) 474-57-32', 7, 600, 46, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(7, 20, '8 (988) 259-89-56', '', 'azov@суши-даром.рф', 'пер. Маяковского, 77 ГМ «Магнит»', 'Ежедневно с 10 : 00 - 23 : 00', '8 (988) 541-01-80 Екатерина', 5, 500, 62, 'y2H2iiDtYkk7B5y7Aabei7b9z6RFHGh6tSTF5i2NAaG265Ys62AdYBdetTN5nY2HDFbtS46d4D5ZtQbnDBsi3zrhd4btK35by7yaZreQS9AaNBnd4GnS5E38y5r7Tf8ddte3HiDni3rZrF3ead26HQ45Ff3nrZstdzhQGN5SDfESNt2QzKH7nB3THQ72BkfFHsfe592tes9TK2z8A66NtTy4ysRZF2rddzh7y8nDnnh3bF2DATbTBAHZRk', 1),
(8, 3, '8(473)290-6-555', '', 'voronezh@суши-даром.рф', 'ул. Генерала Лизюкова, 50', 'Ежедневно с 10 : 00 - 23 : 00', 'Евгений Семёнов  8 (951) 081-65-61', 18, 500, NULL, 'nKGQZFnRbHRKE7G9Kzr3RRhED8RZbFsse374yhGzSk7ifEiS4BFFeR9GNQsRhK8nB5eYaNeT2b57FbQzEh5H24eBFzeQ8b4A68f7HnQzrGsZH7fbd9K54StydA8aD3BzZGsyZ6SbD92967b97Q4ZtiezHdA952yRyQaeHSh9S89N5aK3QDK7QStiYSiQFGt3ht7TadSSbRt6R5Ytytn89HhYnyzY4RHa9FT9KBSNd9GY5rbkKsiK3ytdRS', 1),
(9, 4, '8 (962) 873-88-81', '', 'gelendzhik@суши-даром.рф', 'ул. Ленина, 30а', 'Ежедневно с 10 : 00 - 22 : 00', 'Константин Семенченко  8 (989) 242-71-42', 17, 500, 315, 'GR5h9nEhS8EQYtaTzsYGKKZnaEHDDG38iTfh7KtQGZsrdt8BKS8isTAtk8YQFHNRrT3ksf425hb8DaAbTyk9dNssKb6dKGT4nHdFR7tHdzGGz7HesYeyyAQ6BH8adS5sr7265eE7D9D36a7iYaGeBh93T84ZRTb6R43G7sEAr7ki7fzSh5ZHbZAYTrGz8KsQBeiyzRYQN72Hdhnnba2eZk4EDz4B7fbyknSH5BiFy9bBfsRisDrbQeFdDy', 1),
(10, 6, '8 (800) 555-24-08', '', 'krasnodar@суши-даром.рф', 'ул. Кубанская набережная 5', 'Ежедневно с 10 : 00 - 22 : 00', 'Валерия Цой  8 (953) 099-17-17', 16, 600, NULL, '2R3G8KrhyQFDiQ82E4YhTYfEYk8rhfN7ZDETbY5zAA2HbZyFQdRy322KaZ3h5DeR6HA7trsSRenS4HkEQ43DQNaQz42rs56iDsfYHABkEQ5ykd347QtKrtnQia5D62QyeYeQhF4QhY8z32kZBGyS4KtaNkEF9e4e47Y9DKQKtK8hAi62SrFG42GD9989e2d7T27iAHZThT4G5ZyHa3d4NNtNKrNRbRKZEF84dTKkBBTsib4k47dEGzeeQS', 1),
(11, 6, '8 (800) 555-24-08', '', 'krasnodar@суши-даром.рф', 'ул. Котлярова, 21', 'Ежедневно с 10 : 00 - 22 : 00', 'Виктория Чучалина 8 (918) 383-70-91‬', 4, 600, 280, '2R3G8KrhyQFDiQ82E4YhTYfEYk8rhfN7ZDETbY5zAA2HbZyFQdRy322KaZ3h5DeR6HA7trsSRenS4HkEQ43DQNaQz42rs56iDsfYHABkEQ5ykd347QtKrtnQia5D62QyeYeQhF4QhY8z32kZBGyS4KtaNkEF9e4e47Y9DKQKtK8hAi62SrFG42GD9989e2d7T27iAHZThT4G5ZyHa3d4NNtNKrNRbRKZEF84dTKkBBTsib4k47dEGzeeQS', 1),
(12, 6, '8 (800) 555-24-08', '', 'krasnodar@суши-даром.рф', 'ул. Лизы Чайкиной, 2/1', 'Ежедневно с 10 : 00 - 22 : 00', 'Валерия Цой  8 (953) 099-17-17', 16, 600, 281, '2R3G8KrhyQFDiQ82E4YhTYfEYk8rhfN7ZDETbY5zAA2HbZyFQdRy322KaZ3h5DeR6HA7trsSRenS4HkEQ43DQNaQz42rs56iDsfYHABkEQ5ykd347QtKrtnQia5D62QyeYeQhF4QhY8z32kZBGyS4KtaNkEF9e4e47Y9DKQKtK8hAi62SrFG42GD9989e2d7T27iAHZThT4G5ZyHa3d4NNtNKrNRbRKZEF84dTKkBBTsib4k47dEGzeeQS', 1),
(13, 6, '8 (800) 555-24-08', '', 'krasnodar@суши-даром.рф', 'ул. Комарова, 21 а', 'Ежедневно с 10 : 00 - 22 : 00', 'Виктория Чучалина 8 (918) 383-70-91‬', 26, 600, 286, '2R3G8KrhyQFDiQ82E4YhTYfEYk8rhfN7ZDETbY5zAA2HbZyFQdRy322KaZ3h5DeR6HA7trsSRenS4HkEQ43DQNaQz42rs56iDsfYHABkEQ5ykd347QtKrtnQia5D62QyeYeQhF4QhY8z32kZBGyS4KtaNkEF9e4e47Y9DKQKtK8hAi62SrFG42GD9989e2d7T27iAHZThT4G5ZyHa3d4NNtNKrNRbRKZEF84dTKkBBTsib4k47dEGzeeQS', 1),
(14, 6, '8 (800) 555-24-08', '', 'krasnodar@суши-даром.рф', 'ул. Тюляева, 9/1', 'Ежедневно с 10 : 00 - 22 : 00', 'Виктория Чучалина 8 (918) 383-70-91‬', 10, 600, 317, '2R3G8KrhyQFDiQ82E4YhTYfEYk8rhfN7ZDETbY5zAA2HbZyFQdRy322KaZ3h5DeR6HA7trsSRenS4HkEQ43DQNaQz42rs56iDsfYHABkEQ5ykd347QtKrtnQia5D62QyeYeQhF4QhY8z32kZBGyS4KtaNkEF9e4e47Y9DKQKtK8hAi62SrFG42GD9989e2d7T27iAHZThT4G5ZyHa3d4NNtNKrNRbRKZEF84dTKkBBTsib4k47dEGzeeQS', 1),
(15, 7, '8 (4712) 550-580', '', 'kursk@суши-даром.рф', 'ул. Бойцов 9 дивизии 185Ж', 'Ежедневно с 10 : 00 - 24 : 00', 'Юрий Ли 8 (920) 700-5-700', 13, 500, NULL, '3fzKAR7hTHiD57Adzz5fYzTeBe3yiSR92aKiRGtAdE48BnbZK76ysNDTSrb57T5YYE6B9k2dSQbe5d5D922sAn9eFb9DZ5iFyd6ysTB9zDenG8SFYE2hTZnk3nQKe3dB59ZiSihbQnshk8R8BDehnyybH9QR2TeSS45AbaDRrT3EREBe7Gnh5KkBK4eAHiera8Rd9eTn3GSFafN7Q4eFDt7ahaBSkF7kEKsDS9RFGzaHENEfDKN55H6aHt', 1),
(16, 7, '8 (4712) 550-590', '', 'kursk@суши-даром.рф', 'пр-т Анатолия Дериглазова, 19', 'Ежедневно с 10 : 00 - 24 : 00', 'Юрий Ли 8 (920) 700-5-700', 13, 500, 56, '3fzKAR7hTHiD57Adzz5fYzTeBe3yiSR92aKiRGtAdE48BnbZK76ysNDTSrb57T5YYE6B9k2dSQbe5d5D922sAn9eFb9DZ5iFyd6ysTB9zDenG8SFYE2hTZnk3nQKe3dB59ZiSihbQnshk8R8BDehnyybH9QR2TeSS45AbaDRrT3EREBe7Gnh5KkBK4eAHiera8Rd9eTn3GSFafN7Q4eFDt7ahaBSkF7kEKsDS9RFGzaHENEfDKN55H6aHt', 1),
(17, 8, '8 (4712) 550-540', '', 'kurchatov@суши-даром.рф', 'ул. Энергетиков, 12а', 'Ежедневно с 10 : 00 - 22 : 00', 'Эльвира Локтионова  8 (920)700-5-700', 13, 500, NULL, '7hd7KDdy8ek5kBhR4ErByeKyB4yyDtbzDetaHzzGEKBS9Hy3bNrzT4TfTbEhyFG2N32hiiSRYfyYRSKTs3eaS2fA4KGkdb9S424b8GSSQbDtTaba4faG6h6YYB73E7FtTyyR4bzFd232342R93i58eQTGKG9FasnyQ5kRrTYdHG5ByHAhTrf363yEyy9zQkSre67zNRBiitKG48RKnZAfNYN7dNtS298655rFHSRY9nr4k6BBS3HsHhnNY', 1),
(18, 9, '8 (938) 863-22-85', '', 'mozdok@суши-даром.рф', 'ул. Армянская 14', 'Ежедневно с 10 : 00 - 23 : 00', 'Роман Тян  8 (909) 477-85-35', 14, 500, NULL, 'tGedDb8rhhaQ36T7HhT6fR7r6ZzEEtrZ3z3sB2HH8HiZD6TabB7he4BaQ2EeeY47eSkFFYdDtnnYf7YiyRyDGZDhH6nQQeHY2ZrsGtY3H8KS6t5r9kSF8fRGb5iS9YBZFSbba24HZBnRYe6YtKrsT62YZ8BZS4GkGKnGzedfGt2sBSaTsr99h2T7ZfTD9nRF35ak9eyGAf2323GeeGdryZie66G5fkA8eAhdFEK6NATBkrFsZHHfyYkrQY', 1),
(19, 10, '8 (800) 550-53-49', '', 'novorossiisk@суши-даром.рф', 'ул. Мира 10', 'пн-чт с 10:00-23:00, пт-вс с 10:00-24:00 ', 'Дмитрий Хан  8 (918) 094-33-67', 6, 500, NULL, 'GR5h9nEhS8EQYtaTzsYGKKZnaEHDDG38iTfh7KtQGZsrdt8BKS8isTAtk8YQFHNRrT3ksf425hb8DaAbTyk9dNssKb6dKGT4nHdFR7tHdzGGz7HesYeyyAQ6BH8adS5sr7265eE7D9D36a7iYaGeBh93T84ZRTb6R43G7sEAr7ki7fzSh5ZHbZAYTrGz8KsQBeiyzRYQN72Hdhnnba2eZk4EDz4B7fbyknSH5BiFy9bBfsRisDrbQeFdDy', 1),
(20, 10, '8 (800) 550-53-49', '', 'novorossiisk@суши-даром.рф', 'ул. Видова, 210д  ТЦ «Мамайка»', 'пн-чт с 10:00-23:00, пт-вс с 10:00-24:00', 'Дмитрий Хан  8 (918) 094-33-67', 6, 500, 273, 'GR5h9nEhS8EQYtaTzsYGKKZnaEHDDG38iTfh7KtQGZsrdt8BKS8isTAtk8YQFHNRrT3ksf425hb8DaAbTyk9dNssKb6dKGT4nHdFR7tHdzGGz7HesYeyyAQ6BH8adS5sr7265eE7D9D36a7iYaGeBh93T84ZRTb6R43G7sEAr7ki7fzSh5ZHbZAYTrGz8KsQBeiyzRYQN72Hdhnnba2eZk4EDz4B7fbyknSH5BiFy9bBfsRisDrbQeFdDy', 1),
(21, 10, '8 (800) 550-53-49', '', 'novorossiisk@суши-даром.рф', 'пр. Дзержинского, 228', 'пн-чт с 10:00-23:00, пт-вс с 10:00-24:00', 'Дмитрий  8 (918) 094-33-67', 6, 500, 313, 'GR5h9nEhS8EQYtaTzsYGKKZnaEHDDG38iTfh7KtQGZsrdt8BKS8isTAtk8YQFHNRrT3ksf425hb8DaAbTyk9dNssKb6dKGT4nHdFR7tHdzGGz7HesYeyyAQ6BH8adS5sr7265eE7D9D36a7iYaGeBh93T84ZRTb6R43G7sEAr7ki7fzSh5ZHbZAYTrGz8KsQBeiyzRYQN72Hdhnnba2eZk4EDz4B7fbyknSH5BiFy9bBfsRisDrbQeFdDy', 1),
(22, 11, '8 (988) 541-05-00', '', 'novocherkassk@суши-даром.рф', 'пр.Ермака, 44, ТЦ \"Арбат\"', 'Ежедневно с 10 : 00 - 22 : 00', '8 (988) 541-01-80 Екатерина', 5, 500, 49, 'y2H2iiDtYkk7B5y7Aabei7b9z6RFHGh6tSTF5i2NAaG265Ys62AdYBdetTN5nY2HDFbtS46d4D5ZtQbnDBsi3zrhd4btK35by7yaZreQS9AaNBnd4GnS5E38y5r7Tf8ddte3HiDni3rZrF3ead26HQ45Ff3nrZstdzhQGN5SDfESNt2QzKH7nB3THQ72BkfFHsfe592tes9TK2z8A66NtTy4ysRZF2rddzh7y8nDnnh3bF2DATbTBAHZRk', 1),
(23, 17, '8 (928) 716-55-67', '', 'prohladny@суши-даром.рф', 'ул. Ленина, 102/1', 'Ежедневно с 10 : 00 - 23 : 00', 'Роман Тян  8 (909) 477-85-35', 14, 500, 48, 'tGedDb8rhhaQ36T7HhT6fR7r6ZzEEtrZ3z3sB2HH8HiZD6TabB7he4BaQ2EeeY47eSkFFYdDtnnYf7YiyRyDGZDhH6nQQeHY2ZrsGtY3H8KS6t5r9kSF8fRGb5iS9YBZFSbba24HZBnRYe6YtKrsT62YZ8BZS4GkGKnGzedfGt2sBSaTsr99h2T7ZfTD9nRF35ak9eyGAf2323GeeGdryZie66G5fkA8eAhdFEK6NATBkrFsZHHfyYkrQY', 1),
(24, 12, '8 (800) 555-82-06', '8 (863) 229-69-46', 'rostov@суши-даром.рф', 'б-р Комарова 20', 'пн-чт с 10:00-23:00, пт-вс с 10:00-24:00', 'Сергей Ким  8 (938) 120-66-21', 25, 500, 0, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1),
(25, 12, '8(800)555-82-06', '', 'rostov@суши-даром.рф', 'ул. Таганрогская 114, ТЦ «Джанфида»', 'Ежедневно с 10 : 00 - 22 : 00', 'Сергей Ким  8 (938) 120-66-21', 25, 500, 64, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1),
(26, 12, '8 (800) 555-82-06', '', 'rostov@суши-даром.рф', 'ул. Темерницкая 41 б', 'пн-чт с 10:00-23:00, пт-вс с 10:00-24:00', 'Сергей Ким  8 (938) 120-66-21', 25, 500, 76, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1),
(27, 12, '8 (800) 555-82-06', '', 'rostov@суши-даром.рф', 'ул. Малиновского 38/29', 'пн-чт с 10:00-23:00, пт-вс с 10:00-24:00', 'Сергей Ким  8 (938) 120-66-21', 25, 500, 141, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1),
(28, 13, '8 (8452) 930-080', '', 'saratov@суши-даром.рф', 'ул. Московская 42', 'Ежедневно с 10 : 00 - 24 : 00', 'Юлия Аленова  8 (937) 149-90-90', 12, 500, NULL, 'n2iFfzQ98iy5EtatKd49fZzB3BA4FZsYHDrS36RZe9QHsQ54ST33FkrtNQhfAD586hQTbsFhshTKZKDEtst2FHfeksnKTfHNriytE3DZ8iyYYZnbbG4Ge8Qsn558aBHrN6KeTb4SkiD88R9ak4Gt2iKbdE9d6HyFD7Ni8D5iNtfK8fKi8fEZtb3zG2BBzZ73SGaR853Ki8hheYtb4Z3h3QFyD7Z2SSQznQbiF4ZR3736Rf8G5ZRTBid4e3', 1),
(29, 13, '8 (8452) 930-020', '', 'saratov@суши-даром.рф', 'п. Солнечный, ул. Мысникова 3', 'Ежедневно с 11:00 - 24:00', 'Юлия Аленова  8 (937) 149-90-90', 12, 500, 71, 'n2iFfzQ98iy5EtatKd49fZzB3BA4FZsYHDrS36RZe9QHsQ54ST33FkrtNQhfAD586hQTbsFhshTKZKDEtst2FHfeksnKTfHNriytE3DZ8iyYYZnbbG4Ge8Qsn558aBHrN6KeTb4SkiD88R9ak4Gt2iKbdE9d6HyFD7Ni8D5iNtfK8fKi8fEZtb3zG2BBzZ73SGaR853Ki8hheYtb4Z3h3QFyD7Z2SSQznQbiF4ZR3736Rf8G5ZRTBid4e3', 1),
(30, 13, '8 (8452) 939-711', '', 'saratov@суши-даром.рф', 'пр-т 50 Лет Октября, 69', 'Ежедневно с 11:00 - 24:00', 'Юлия Аленова  8 (937) 149-90-90', 12, 500, 72, 'n2iFfzQ98iy5EtatKd49fZzB3BA4FZsYHDrS36RZe9QHsQ54ST33FkrtNQhfAD586hQTbsFhshTKZKDEtst2FHfeksnKTfHNriytE3DZ8iyYYZnbbG4Ge8Qsn558aBHrN6KeTb4SkiD88R9ak4Gt2iKbdE9d6HyFD7Ni8D5iNtfK8fKi8fEZtb3zG2BBzZ73SGaR853Ki8hheYtb4Z3h3QFyD7Z2SSQznQbiF4ZR3736Rf8G5ZRTBid4e3', 1),
(31, 13, '8 (8452) 931-322', '', 'saratov@суши-даром.рф', 'ул.Пономарева д.9/14', 'Ежедневно с 10 : 00 - 24 : 00', 'Юлия Аленова  8 (937) 149-90-90', 12, 500, 83, 'n2iFfzQ98iy5EtatKd49fZzB3BA4FZsYHDrS36RZe9QHsQ54ST33FkrtNQhfAD586hQTbsFhshTKZKDEtst2FHfeksnKTfHNriytE3DZ8iyYYZnbbG4Ge8Qsn558aBHrN6KeTb4SkiD88R9ak4Gt2iKbdE9d6HyFD7Ni8D5iNtfK8fKi8fEZtb3zG2BBzZ73SGaR853Ki8hheYtb4Z3h3QFyD7Z2SSQznQbiF4ZR3736Rf8G5ZRTBid4e3', 1),
(32, 13, '8 (8452) 930-080', '', 'saratov@суши-даром.рф', 'ул. Большая Садовая, д. 141', 'Ежедневно с 10 : 00 - 24 : 00', 'Юлия Аленова  8 (937) 149-90-90', 12, 500, 95, 'n2iFfzQ98iy5EtatKd49fZzB3BA4FZsYHDrS36RZe9QHsQ54ST33FkrtNQhfAD586hQTbsFhshTKZKDEtst2FHfeksnKTfHNriytE3DZ8iyYYZnbbG4Ge8Qsn558aBHrN6KeTb4SkiD88R9ak4Gt2iKbdE9d6HyFD7Ni8D5iNtfK8fKi8fEZtb3zG2BBzZ73SGaR853Ki8hheYtb4Z3h3QFyD7Z2SSQznQbiF4ZR3736Rf8G5ZRTBid4e3', 1),
(33, 14, '8 (918) 355-75-05', '', 'stanitsdinskaya@yandex.ru', 'ул. Красная 64', 'Ежедневно с 10 : 00 - 22 : 00', 'Алексей  8 (938) 424-33-48', 19, 600, 45, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(34, 19, '8 (989) 5000-141', '', 'taganrog@суши-даром.рф', 'пер. Спартаковский, 1а', 'Ежедневно с 10 : 00 - 23 : 00', 'Сергей Ким  8 (938) 120-66-21', 11, 500, 314, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1),
(35, 15, '8 (967) 673-2-444', '', 'timashevsk@суши-даром.рф', 'ул. Колесникова 40а', 'Ежедневно с 10 : 00 - 22 : 00', 'Надежда Цой  8 (967) 662-49-49', 16, 500, 47, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(36, 16, '8(928)435-18-08', '', 'ustlabinsk@суши-даром.рф', 'ул. Красная, 291', 'пн-чт с 10:00-22:00, пт-вс с 10:00-23:00', 'Алексей Толузаров  8 (938) 424-33-48', 19, 600, NULL, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(37, 21, '8 (800) 555-24-08', '', 'yablonovski@суши-даром.рф', 'ул. Гагарина, 46/1', 'Ежедневно с 10:00 до 22:00', 'Наталья  8 (918) 113-81-19', 27, 600, 295, '2R3G8KrhyQFDiQ82E4YhTYfEYk8rhfN7ZDETbY5zAA2HbZyFQdRy322KaZ3h5DeR6HA7trsSRenS4HkEQ43DQNaQz42rs56iDsfYHABkEQ5ykd347QtKrtnQia5D62QyeYeQhF4QhY8z32kZBGyS4KtaNkEF9e4e47Y9DKQKtK8hAi62SrFG42GD9989e2d7T27iAHZThT4G5ZyHa3d4NNtNKrNRbRKZEF84dTKkBBTsib4k47dEGzeeQS', 1),
(38, 22, ' 8 (989) 521-23-45', '', 'bataisk@суши-даром.рф', 'ул. Огородная, 74а, ТЦ «Оранжерея»', 'Ежедневно с 10 : 00 - 22 : 00', 'Анатолий Ли  8 (988) 541-01-80', 23, 500, 96, 'y2H2iiDtYkk7B5y7Aabei7b9z6RFHGh6tSTF5i2NAaG265Ys62AdYBdetTN5nY2HDFbtS46d4D5ZtQbnDBsi3zrhd4btK35by7yaZreQS9AaNBnd4GnS5E38y5r7Tf8ddte3HiDni3rZrF3ead26HQ45Ff3nrZstdzhQGN5SDfESNt2QzKH7nB3THQ72BkfFHsfe592tes9TK2z8A66NtTy4ysRZF2rddzh7y8nDnnh3bF2DATbTBAHZRk', 1),
(39, 24, ' 8 (918) 660-29-29', '', 'maikop@суши-даром.рф', ' ул. Курганная,197, «Торговый дом Купеческий»', 'Ежедневно с 10 : 00 - 23 : 00', 'Олег Дооталиев  8 (918) 048-98-51', 24, 600, 109, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(40, 19, ' 8 (989) 500-01-41', '', 'taganrog@суши-даром.рф', 'ул. Морозова, 20, ГМ «Магнит»', 'Ежедневно с 10 : 00 - 23 : 00', 'Сергей Ким  8 (938) 120-66-21', 11, 500, 344, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1),
(41, 23, ' 8 (988) 355-75-05', '', 'kropotkin@суши-даром.рф', '1-МКР, 26/7, магазин 7', 'пн-чт, вс с 10:00-22:00, пт-сб с 10:00-23:00', 'Алексей  8 (938) 424-33-48', 19, 600, 107, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(42, 25, '8 (928) 496-0-222', '', 'vladikavkaz@суши-даром.рф', 'ул.Чкалова, 1а', 'Ежедневно 10:00-23:00', '', 6, 500, 347, 'GR5h9nEhS8EQYtaTzsYGKKZnaEHDDG38iTfh7KtQGZsrdt8BKS8isTAtk8YQFHNRrT3ksf425hb8DaAbTyk9dNssKb6dKGT4nHdFR7tHdzGGz7HesYeyyAQ6BH8adS5sr7265eE7D9D36a7iYaGeBh93T84ZRTb6R43G7sEAr7ki7fzSh5ZHbZAYTrGz8KsQBeiyzRYQN72Hdhnnba2eZk4EDz4B7fbyknSH5BiFy9bBfsRisDrbQeFdDy', 1),
(43, 26, '8 (961) 589-11-99', '', 'korenovsk@суши-даром.рф', 'ул. Циолковского, 1б', 'вс-чт 10:00 -22:00, пт-сб 10:00-23:00', 'Надежда Цой 8 (967) 662-49-49', 16, 500, 108, 'z4FHiB7e662hzAeGaYikibQdYSNFAisZaZtkknsfhdrGDybEdnRrrtt9a6FAeZhfHDtYSN54SfzfDBNGRrZ6Kd6K9B8dkfkYHFFreze2FE686GEHZrEyyz7y25B99NYHer3kN79fA6dsBH4k2tHhRFEEz5DzEk7KDZ2dS2ieTnAhZnyKG6TkAkRZdfhHtefY462HT8RBkbH8s6G22r9kDR8GZfdeni3eeNQ2KskZyYYNRsADGAQ9dNF4YH', 1),
(44, 27, '8 (800) 222-73-46', '', 'omsk@суши-даром.рф', '2-я ул. Поселковая, 2', 'Ежедневно с 9:00 до 22:00', 'Владимир Цой  8 (918) 098-2-009', 29, 600, NULL, '3aBT66AR3dFzFTAGA9DA2866sen3bKT4KhHEd8h5bQrGzQdZQGhBFbtZhHNkfydSENiGKyBN8Rhytnf8YrzntSaDnNRy7TbByk86GzGFbS4z68tRnR6Gy69HFQ6By73ShZKShfki2dHTa4zrFrZ4hZBRAtdYr6DBSbf4htb7zKRABaQ6sBZDiieKFiyZdZiZ2tN8NQ69kHANKaG4DssNEzk9GHYNy7zfn9e4N933GkBen88RrnsTNFSfbD', 1),
(45, 12, '8 (800) 555-82-06 ', '', 'rostov@суши-даром.рф', 'ул. Сельмаш, 29', 'Ежедневно с 10:00 до 24:00', 'Сергей Ким 8 (938) 120-66-21', 25, 500, 362, '34GnZe7d89y7bdt67Dbyret67HDSs7ye25tH9nQ8n86saki8Qkt6tN2nir6EkrH9h5Hffiezf9Qhk3e3bAYyaHHi2ER9Yk95eGanTeK3en9sbdfdE4AFB8SkDykiHkdQTd4BiDrrRnHTtR22Gks7h9hNtzZ4H3Fr6ySe28zDk6iGH8tehNatNh66GSZdGrtDNaGA954i2aTy9bDfQDDrNzhfb7iKiFa2GHkFBbSndAKbDaieDQyd9FibBz', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `point_categories`
--

CREATE TABLE `point_categories` (
  `point_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `point_categories`
--

INSERT INTO `point_categories` (`point_id`, `category_id`) VALUES
(3, 1),
(4, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(3, 2),
(4, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(3, 3),
(4, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(3, 4),
(4, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(3, 5),
(4, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(3, 6),
(4, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(41, 6),
(42, 6),
(43, 6),
(44, 6),
(45, 6),
(3, 7),
(4, 7),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(11, 7),
(12, 7),
(13, 7),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 7),
(27, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 7),
(32, 7),
(33, 7),
(34, 7),
(35, 7),
(36, 7),
(37, 7),
(38, 7),
(39, 7),
(40, 7),
(41, 7),
(42, 7),
(43, 7),
(44, 7),
(45, 7),
(3, 8),
(4, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 8),
(16, 8),
(17, 8),
(18, 8),
(19, 8),
(20, 8),
(21, 8),
(22, 8),
(23, 8),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 8),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(35, 8),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(41, 8),
(42, 8),
(43, 8),
(44, 8),
(45, 8),
(3, 9),
(7, 9),
(8, 9),
(9, 9),
(11, 9),
(14, 9),
(15, 9),
(16, 9),
(17, 9),
(18, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 9),
(27, 9),
(34, 9),
(37, 9),
(38, 9),
(39, 9),
(40, 9),
(42, 9),
(43, 9),
(45, 9),
(3, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(11, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(19, 10),
(20, 10),
(21, 10),
(23, 10),
(25, 10),
(27, 10),
(33, 10),
(35, 10),
(36, 10),
(37, 10),
(39, 10),
(41, 10),
(42, 10),
(43, 10),
(45, 10),
(3, 11),
(6, 11),
(7, 11),
(8, 11),
(9, 11),
(11, 11),
(14, 11),
(15, 11),
(16, 11),
(17, 11),
(18, 11),
(19, 11),
(20, 11),
(21, 11),
(22, 11),
(23, 11),
(25, 11),
(27, 11),
(33, 11),
(35, 11),
(36, 11),
(37, 11),
(39, 11),
(41, 11),
(42, 11),
(43, 11),
(45, 11),
(3, 12),
(7, 12),
(8, 12),
(9, 12),
(11, 12),
(14, 12),
(15, 12),
(16, 12),
(17, 12),
(18, 12),
(19, 12),
(20, 12),
(21, 12),
(23, 12),
(27, 12),
(37, 12),
(39, 12),
(43, 12),
(45, 12),
(3, 13),
(7, 13),
(8, 13),
(9, 13),
(11, 13),
(14, 13),
(15, 13),
(16, 13),
(17, 13),
(27, 13),
(37, 13),
(39, 13),
(42, 13),
(43, 13),
(45, 13),
(9, 14),
(14, 14),
(18, 14),
(23, 14),
(39, 14),
(11, 15),
(24, 15),
(35, 15),
(39, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `name`, `phone`) VALUES
(1, 1, 'VS', '8 (917) 817-16-83'),
(5, 3, 'Валера', '1234356'),
(6, 4, 'Юрий Нагай', '8 (928) 421-92-53'),
(7, 5, 'Андрей Пак', ' 8 (961) 289-05-44'),
(8, 6, 'Дмитрий Хан', ' 8 (918) 094-33-67'),
(9, 7, 'Виктор Пак', '8 (988) 474-57-32'),
(12, 10, 'Виктория Чучалина', ' 8 (918) 311-43-95'),
(13, 11, 'Сергей Ким', '8 (928) 776-29-93'),
(14, 12, 'Юлия Аленова', ' 8 (937) 265-70-30'),
(15, 13, 'Юрий Ли', ' 8 (920) 263-81-91'),
(16, 14, 'Роман Тян', '8 (988) 920-84-75'),
(18, 16, 'Надежда Цой', ' 8 (961) 589-11-99'),
(19, 17, 'Константин Семенченко', ' 8 (989) 242-71-42'),
(20, 18, 'Евгений Семенов', ' 8 (950) 873-14-66'),
(21, 19, 'Алексей Толузаров', ' 8 (908) 673-66-49'),
(25, 23, 'Анатолий Ли', ' 8 (908) 129-56-59'),
(26, 24, 'Олег Дооталиев', '8 (918) 048-98-51'),
(27, 25, 'Александр Нам', '8 (918) 511-62-16'),
(28, 26, 'Лилия Мустафаева', ' 8 (918) 032-32-05'),
(29, 27, 'Наталия Ким', '8 (918) 113-81-19'),
(31, 29, 'Владимир Цой', '8 (918) 098-20-09');

-- --------------------------------------------------------

--
-- Структура таблицы `slides`
--

CREATE TABLE `slides` (
  `id` int(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slides`
--

INSERT INTO `slides` (`id`, `image`, `code`, `sort`) VALUES
(1, '/images/slide/decsite.jpg', '', 2),
(2, '/images/slide/decsite2.jpg', '', 3),
(3, '/images/slide/49.jpg', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `slides_cities`
--

CREATE TABLE `slides_cities` (
  `slides_id` int(11) NOT NULL,
  `cities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slides_cities`
--

INSERT INTO `slides_cities` (`slides_id`, `cities_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(3, 4),
(1, 5),
(2, 5),
(3, 5),
(1, 6),
(2, 6),
(3, 6),
(1, 7),
(2, 7),
(3, 7),
(1, 8),
(2, 8),
(3, 8),
(1, 9),
(2, 9),
(3, 9),
(1, 10),
(2, 10),
(3, 10),
(1, 11),
(2, 11),
(3, 11),
(1, 12),
(2, 12),
(3, 12),
(1, 13),
(2, 13),
(3, 13),
(1, 14),
(2, 14),
(3, 14),
(1, 15),
(2, 15),
(3, 15),
(1, 16),
(2, 16),
(3, 16),
(1, 17),
(2, 17),
(3, 17),
(1, 19),
(2, 19),
(3, 19),
(1, 20),
(2, 20),
(3, 20),
(1, 21),
(2, 21),
(3, 21),
(1, 22),
(2, 22),
(3, 22),
(1, 23),
(2, 23),
(3, 23),
(1, 24),
(2, 24),
(3, 24),
(1, 25),
(2, 25),
(3, 25),
(1, 26),
(2, 26),
(3, 26),
(1, 27),
(2, 27),
(3, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(64) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `auth_key`) VALUES
(1, 'admin', '$2y$13$5lPoOl3z0EcN6MK5duNCTu9/x0wCMqHPB1FyTmTsPhZIUdDt8rxj.', 'root', 'pbJytnDCJ0niMUSLtU47pgVb9q4cTniB'),
(3, 'valera', '$2y$13$U0myuIYt8JDJ/rdYD1/hB.guHJkH.I5h5Slnax6RlYKuTG0ckMaKa', 'admin', 'sOb6eBG-QCCj5gcXZkNdO35DdU-flGNt'),
(4, 'uriinagai', '$2y$13$ttQP9sf.RzUQBZArE1qgBOeAHfF58jOhvUsLSj08r7va4FeNHMniO', 'manager', 'peb6I9f1szV4dq6rR2dHcpTdep-b1lLo'),
(5, 'andreipak', '$2y$13$F5ugMDWJPkwwH/QQ4Oo8M.Sq9y2XMXgX6A7fYId5vhI5KIIvhoc6C', 'manager', 'C2YvVsjildI7OtAcItCAeY9Yt4GfPjVA'),
(6, 'dmitriihan', '$2y$13$PVv9WjyHZL2Piy7RJ6YYCuQlTSvhoDGxhjpD.K.p.DmE9O4ekVpUy', 'manager', 'Tu3M9G2ZaeIY1OaChL9r6WboGmSsOR56'),
(7, 'viktorpak', '$2y$13$B3VHS68ZG10NbZYyQBE.keT/dvUIMDKXo1Ws/3kfDPdPnqp095erS', 'manager', NULL),
(10, 'viktoriyachuchalina', '$2y$13$xF5gxa1V0Yyc92YzH1/AXe2IVzxDM7ULeANSvEf29Ohp0zMN2t4mu', 'manager', NULL),
(11, 'sergeikim', '$2y$13$O2KAv/UVIMEAwrc9mMINh.Aarzu45E7mCfRj3CukO7OHZuZPVjg6.', 'manager', NULL),
(12, ' Juliaalenova', '$2y$13$DdqfDZ05uLfcjTx47NRL7eIfqYnSsokmDYVqEwxfU2vNA7T1cNEDu', 'manager', NULL),
(13, 'jurili', '$2y$13$h.6UfymcDHrg/EcE9d7/rO.4wTqWGfzH3v52LAf0VgOJLcN/4tNc2', 'manager', 'sBwGkkwNvOf3dXbCmUzgZurJbMHFFMEE'),
(14, 'romantyan', '$2y$13$AB2DAkl0TPJb9ObaiPno4.1qe7FXpQIHcYYpxtrUtw4SGluOSshh2', 'manager', 'eQ6qFht3YPb0zlYMUhWxjw7azgpi1zOE'),
(16, 'nadezhdatsoy', '$2y$13$e7xxquXag0HegLSk8a7v/Or3WUEnIKkChTBjNIhmqKSy642TLZtki', 'manager', 'DxaRTS3Q5V8-JYGgflD_dpCxxSAa5yBo'),
(17, ' konstantinsemenchenko', '$2y$13$T1HhITUVZX8dfv.EcG6oLO5g1uZFqbmFj3R/lq.oJPmYupprR1Y7m', 'manager', NULL),
(18, ' evgeniysemenov', '$2y$13$1voXtj/RDmmRMEN4ofLaSeS6A90Cz7PrtL7u/El17W1tt2JlFNnfC', 'manager', NULL),
(19, ' alekseytoluzarov', '$2y$13$y7/cJMfzwb3ou.BNR9lTxOU1EY8s6rdHGjuc4trYBQZzbDsQE15Xq', 'manager', NULL),
(23, 'anatoliili', '$2y$13$wxUgExCWVtzoKGwEOd75jumhCCfxVkozIfAjziByGKIm13adGz4xO', 'manager', NULL),
(24, 'olegdootaliev', '$2y$13$H1VCex4PSgsZowccyozrX.gH8rwbQY88aKbPeVYzkjdVM8t7kCQ8G', 'manager', 'Rnv5IMrmpQezlwFGCw0ysXcQRsJkPhqF'),
(25, 'alexsandrnam', '$2y$13$zLUgPntGjG7QLRzKkkC1G.5GnMlF.yIsyUNhGCr3uuGFUU0t4FkZG', 'manager', 'PUbFQ4YPVEb2e19j1gc-UeJ447UoQNcg'),
(26, 'liliyamystafaeva', '$2y$13$T8ipELK9lzPPA9ce2GPhgOV0t0Payy3P/tUSTff.14h/SILhyYJTK', 'manager', NULL),
(27, 'nataliakim', '$2y$13$GLBRxT/QnkhSvBYbr1FWzO4PKBsg7E5ztSBGA38QzBEfIYDtc3jkG', 'manager', NULL),
(28, 'nadezhdacoi', '$2y$13$FIkULEL4TchWscM1cKaKs.v7rtNgis3fMEnXdqQw/ZcJ3ENllmTJO', 'manager', 'gh2wKEUDf0KWtOymhgFDtVLfGHkCmFvE'),
(29, 'vladimircoi', '$2y$13$O4zhOKUj6U.X5ZDclGSu6O.53dpdl/trK4Ma0oIcddIJkMcS51wYe', 'manager', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `manager` (`manager`);

--
-- Индексы таблицы `point_categories`
--
ALTER TABLE `point_categories`
  ADD PRIMARY KEY (`point_id`,`category_id`),
  ADD KEY `point_id` (`point_id`,`category_id`),
  ADD KEY `point_categories_ibfk_2` (`category_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- Индексы таблицы `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slides_cities`
--
ALTER TABLE `slides_cities`
  ADD PRIMARY KEY (`slides_id`,`cities_id`),
  ADD KEY `cities_id` (`cities_id`),
  ADD KEY `slides_id` (`slides_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `points`
--
ALTER TABLE `points`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`city`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`manager`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `point_categories`
--
ALTER TABLE `point_categories`
  ADD CONSTRAINT `point_categories_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `point_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `slides_cities`
--
ALTER TABLE `slides_cities`
  ADD CONSTRAINT `slides_cities_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `slides_cities_ibfk_2` FOREIGN KEY (`slides_id`) REFERENCES `slides` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
