-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 20 2026 р., 13:47
-- Версія сервера: 5.6.51
-- Версія PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `market`
--

-- --------------------------------------------------------

--
-- Структура таблиці `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `prod_count` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `cart`
--

INSERT INTO `cart` (`id`, `prod_id`, `prod_count`, `user`, `created_at`) VALUES
(4, 2, 18, 'viqm93tjlkdt150l0tnsr5fv39f6cqm9', '2026-06-07 17:12:52'),
(5, 1, 5, 'c5484p912krhm6hspq4vfejbs4pp09gc', '2026-06-09 08:37:18'),
(6, 2, 1, 'c5484p912krhm6hspq4vfejbs4pp09gc', '2026-06-09 10:15:12'),
(7, 1, 5, 'ermp6dnvua724aobs2vqtut1bcup6fvb', '2026-06-10 06:16:02'),
(8, 6, 1, 'ermp6dnvua724aobs2vqtut1bcup6fvb', '2026-06-10 06:16:06'),
(9, 1, 5, '079tkebr6ltrfp28mc3ktvi1ohbp9tem', '2026-06-11 22:56:38'),
(10, 2, 5, '079tkebr6ltrfp28mc3ktvi1ohbp9tem', '2026-06-11 22:56:42'),
(11, 1, 21, 'acsovuus0qk6h20dm8ho6teumui0olao', '2026-06-15 06:24:14'),
(12, 2, 1, 'acsovuus0qk6h20dm8ho6teumui0olao', '2026-06-15 06:24:17'),
(13, 1, 3, '67cp72q0du0c1ii0l2ut0n7efdr63245', '2026-06-15 06:54:05'),
(14, 2, 2, '67cp72q0du0c1ii0l2ut0n7efdr63245', '2026-06-15 06:54:08'),
(15, 1, 5, '8hab5lt3ansjdfijttnloilh4roethvq', '2026-06-16 21:34:03'),
(16, 2, 2, '8hab5lt3ansjdfijttnloilh4roethvq', '2026-06-16 21:34:10'),
(17, 7, 1, '8hab5lt3ansjdfijttnloilh4roethvq', '2026-06-16 21:34:13'),
(18, 1, 1, 'gs2scosk2keg1gpgn0v09kpod6g9skhm', '2026-06-17 09:23:55'),
(19, 1, 1, 'gs2scosk2keg1gpgn0v09kpod6g9skhm', '2026-06-17 09:24:21'),
(20, 1, 1, 'gs2scosk2keg1gpgn0v09kpod6g9skhm', '2026-06-17 09:24:30'),
(21, 1, 1, 'gs2scosk2keg1gpgn0v09kpod6g9skhm', '2026-06-17 09:24:42'),
(22, 1, 1, 'td7s9gt03uej0f352602gq944p3t7gag', '2026-06-18 07:16:30'),
(23, 1, 3, 'td7s9gt03uej0f352602gq944p3t7gag', '2026-06-18 07:28:09'),
(24, 1, 4, 'g0nafidsqjuh62hte5f814bacu9kaji5', '2026-06-20 06:51:15'),
(25, 2, 2, 'g0nafidsqjuh62hte5f814bacu9kaji5', '2026-06-20 06:51:22'),
(26, 1, 1, 'sq8eqg3pka05qd3qqqo8552g1vb2mdk9', '2026-06-20 09:26:48'),
(27, 2, 2, 'sq8eqg3pka05qd3qqqo8552g1vb2mdk9', '2026-06-20 09:26:53');

-- --------------------------------------------------------

--
-- Структура таблиці `categories_prod`
--

CREATE TABLE `categories_prod` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `categories_prod`
--

INSERT INTO `categories_prod` (`id`, `cat_name`) VALUES
(1, 'Овощи'),
(2, 'Бакалея'),
(3, 'Хлеб'),
(4, 'Мясные продукты'),
(5, 'Крупа'),
(6, 'Макароны'),
(7, 'Фрукты'),
(8, 'Сладости'),
(9, 'Чай / Кофе');

-- --------------------------------------------------------

--
-- Структура таблиці `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `name_id` int(11) NOT NULL DEFAULT '0',
  `value_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `characteristics`
--

INSERT INTO `characteristics` (`id`, `prod_id`, `name_id`, `value_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 3),
(4, 1, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблиці `characteristics_name`
--

CREATE TABLE `characteristics_name` (
  `name_id` int(11) NOT NULL,
  `char_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `characteristics_name`
--

INSERT INTO `characteristics_name` (`name_id`, `char_name`) VALUES
(1, 'Страна происхождения'),
(2, 'Вес'),
(3, 'Условия хранения'),
(4, 'Срок годности');

-- --------------------------------------------------------

--
-- Структура таблиці `characteristics_value`
--

CREATE TABLE `characteristics_value` (
  `value_id` int(11) NOT NULL,
  `char_value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `characteristics_value`
--

INSERT INTO `characteristics_value` (`value_id`, `char_value`) VALUES
(1, 'Кения'),
(2, '2 шт / ~400 г'),
(3, '+4…+8 °C'),
(4, '7 дней');

-- --------------------------------------------------------

--
-- Структура таблиці `delivery_method`
--

CREATE TABLE `delivery_method` (
  `id` int(11) NOT NULL,
  `delivery_name` varchar(50) DEFAULT NULL,
  `description_delivery` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `delivery_method`
--

INSERT INTO `delivery_method` (`id`, `delivery_name`, `description_delivery`) VALUES
(1, 'Курьером', 'Доставка сегодня с 18:00 до 20:00'),
(2, 'Самовывоз', 'Забрать заказ из ближайшего магазина'),
(3, 'Новая Почта (Отделение / Почтомат)', 'Быстро и удобно 1-2 дня'),
(4, 'Укрпочта (Стандарт / Экспресс)', '2-4 дней дешевая доставка');

-- --------------------------------------------------------

--
-- Структура таблиці `filters`
--

CREATE TABLE `filters` (
  `id` int(11) NOT NULL,
  `filter_name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `filters`
--

INSERT INTO `filters` (`id`, `filter_name`) VALUES
(1, 'Только со скидкой'),
(2, 'В наличии'),
(3, 'Новинки'),
(4, 'Фермерские');

-- --------------------------------------------------------

--
-- Структура таблиці `filters_product`
--

CREATE TABLE `filters_product` (
  `prod_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `filters_product`
--

INSERT INTO `filters_product` (`prod_id`, `filter_id`) VALUES
(1, 3),
(1, 2),
(2, 1),
(2, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `img`
--

INSERT INTO `img` (`id`, `prod_id`, `img`) VALUES
(1, 1, 'avocado_first_sub.png'),
(2, 1, 'avocado_2.png'),
(3, 1, 'avocado_3.png'),
(4, 1, 'avocado_4.png');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `delivery_type` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `decription_for_order` text,
  `promo` varchar(50) DEFAULT NULL,
  `order_time` timestamp NULL DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `payment_name` varchar(50) DEFAULT NULL,
  `description_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_name`, `description_payment`) VALUES
(1, 'Наложенный платеж', 'Забрать в близжайшем отделении'),
(2, 'Быстрая оплата через банковские приложения', 'Оплата введя банковские данные'),
(3, 'Google Pay / Apple Pay', 'Оплата через Google pay / Apple pay быстро и удобно'),
(4, 'Покупка частями / Рассрочка', 'Рассрочка оформляется в зависимости вашей кредитной истории и т.д.');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_prod` varchar(50) DEFAULT NULL,
  `price` float DEFAULT '0',
  `main_img` varchar(50) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `article` char(20) DEFAULT NULL,
  `description_main` varchar(300) DEFAULT NULL,
  `description_variety` varchar(300) DEFAULT NULL,
  `cat_id` int(11) DEFAULT '0',
  `name_id` varchar(50) DEFAULT NULL,
  `is_popular` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `name_prod`, `price`, `main_img`, `count`, `article`, `description_main`, `description_variety`, `cat_id`, `name_id`, `is_popular`) VALUES
(1, 'Авокадо ', 109.23, 'avocado_main.png', 100, 'FM-AVO-2201', 'Плотная кожура, стабильное качество и насыщенный вкус. Товар можно использовать в диетическом и спортивном питании. Идеален для гуакамоле и роллов.', 'Спелое авокадо сорта Hass с мягкой кремовой текстурой. Отлично подходит для салатов, тостов, соусов и здоровых завтраков.', 1, 'first', 0),
(2, 'Молоко 1л.', 43.3, 'milk.png', 30, 'FM-BAN-2202', NULL, NULL, 2, NULL, NULL),
(3, 'Хлеб пшеничный', 22, 'bread.png', 0, 'FM-APP-2203', NULL, NULL, 3, NULL, 1),
(4, 'Яйца куриные 1шт.', 6.3, 'eggs.png', 0, 'FM-ORA-2204', NULL, NULL, 2, NULL, NULL),
(5, 'Масло сливочное', 87.4, 'butter.png', 0, 'FM-LEM-2205', NULL, NULL, 2, NULL, 1),
(6, 'Куриное филе 1кг.', 165.33, 'chicken_breast.png', 0, 'FM-MAN-2206', NULL, NULL, 4, NULL, NULL),
(7, 'Сахар-песок 1кг.', 45.31, 'sugar.png', 0, 'FM-MIL-3011', NULL, NULL, 2, NULL, NULL),
(8, 'Мука пшеничная', 54, 'flour.png', 0, 'FM-BRD-3012', NULL, NULL, 3, NULL, 1),
(9, 'Рис круглозерный', 34, 'rise.png', 0, 'FM-CHZ-3013', NULL, NULL, 5, NULL, NULL),
(10, 'Макароны твердых сортов', 65, 'pasta.png', 0, 'FM-TOM-3014', NULL, NULL, 6, NULL, NULL),
(11, 'Масло подсолнечное', 55, 'oil.png', 0, 'FM-POT-3015', NULL, NULL, 2, NULL, 1),
(12, 'Картофель', 23, 'potato.png', 0, 'FM-BER-4021', NULL, NULL, 1, NULL, 1),
(13, 'Лук репчатый', 13, 'onion.png', 0, 'FM-NUT-4022', NULL, NULL, 1, NULL, NULL),
(14, 'Морковь', 10, 'carrot.png', 0, 'FM-COF-4023', NULL, NULL, 1, NULL, 1),
(15, 'Яблоки сезонные', 29, 'apple.png', 0, 'FM-TEA-4024', NULL, NULL, 7, NULL, NULL),
(16, 'Бананы', 64, 'banan.png', 0, 'FM-WTR-4025', NULL, NULL, 7, NULL, NULL),
(17, 'Сыр Гауда', 157.44, 'cheese.png', 0, 'FM-CHO-5031', NULL, NULL, 2, NULL, NULL),
(18, 'Сметана 15%', 34, 'sour_cream.png', 0, 'FM-HON-5032', NULL, NULL, 2, NULL, NULL),
(19, 'Чай черный (25 пакетиков)', 65, 'tea.png', 0, 'FM-OIL-5033', NULL, NULL, 9, NULL, NULL),
(20, 'Кофе молотый (250 г)', 110, 'coffe.png', 0, 'FM-RIC-5034', NULL, NULL, 9, NULL, NULL),
(21, 'Шоколад молочный (85 г)', 50, 'chocolate.png', 0, NULL, NULL, NULL, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `review` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(99, 'User');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`) VALUES
(1, 'superAdmin', '123456', 1),
(2, 'Admin', '654321', 2);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `categories_prod`
--
ALTER TABLE `categories_prod`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `name_id` (`name_id`),
  ADD KEY `value_id` (`value_id`);

--
-- Індекси таблиці `characteristics_name`
--
ALTER TABLE `characteristics_name`
  ADD KEY `name_id` (`name_id`);

--
-- Індекси таблиці `characteristics_value`
--
ALTER TABLE `characteristics_value`
  ADD KEY `value_id` (`value_id`);

--
-- Індекси таблиці `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_name` (`delivery_name`);

--
-- Індекси таблиці `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `filters_product`
--
ALTER TABLE `filters_product`
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `filter_id` (`filter_id`);

--
-- Індекси таблиці `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`) USING BTREE;

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_name` (`payment_name`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`login`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблиці `categories_prod`
--
ALTER TABLE `categories_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `characteristics_name`
--
ALTER TABLE `characteristics_name`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `characteristics_value`
--
ALTER TABLE `characteristics_value`
  MODIFY `value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблиці `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
