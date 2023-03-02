-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 02, 2023 lúc 05:39 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asmweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `procart_id` int(11) DEFAULT NULL,
  `usercart_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'Girl'),
(3, 'Boy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230227161118', '2023-02-27 17:11:26', 57),
('DoctrineMigrations\\Version20230228144605', '2023-02-28 15:46:15', 202),
('DoctrineMigrations\\Version20230301011908', '2023-03-01 02:19:33', 158),
('DoctrineMigrations\\Version20230301021708', '2023-03-01 03:17:17', 101),
('DoctrineMigrations\\Version20230301024124', '2023-03-01 03:41:39', 135),
('DoctrineMigrations\\Version20230301041047', '2023-03-01 07:17:45', 41),
('DoctrineMigrations\\Version20230301061649', '2023-03-01 07:17:45', 7),
('DoctrineMigrations\\Version20230301062337', '2023-03-01 07:24:01', 9),
('DoctrineMigrations\\Version20230301063857', '2023-03-01 07:39:04', 26),
('DoctrineMigrations\\Version20230301075208', '2023-03-01 08:52:16', 142),
('DoctrineMigrations\\Version20230301080632', '2023-03-01 09:06:41', 127),
('DoctrineMigrations\\Version20230301090836', '2023-03-01 10:08:44', 18),
('DoctrineMigrations\\Version20230302154258', '2023-03-02 16:43:08', 50),
('DoctrineMigrations\\Version20230302154554', '2023-03-02 16:46:01', 117);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double NOT NULL,
  `supppro_id` int(11) DEFAULT NULL,
  `productinformation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `created`, `image`, `quantity`, `supppro_id`, `productinformation`, `category_id`) VALUES
(1, 'Disney Doorables Multi Peek, Series 8 Featuring Special Edition Scented Figures, Styles May Vary, Officially Licensed Kids Toys for Ages 5 Up, Gifts and Presents', 279000, '2023-03-01', 'Screenshot-2023-03-02-135016-640047479ba18.jpg', 100, 3, 'Behind every door a surprise is in store with Disney Doorables Mini Peek Series 8 Collectible Figures. Unbox 5, 6, or 7 Disney figurines. Then, open the doors! Series 8 includes 58 characters from the stories of Disney’s Hercules, Alice in Wonderland, Wre', 1),
(3, 'Pokemon Trading Card Game: Pokemon GO Tins (1 of 3 tins chosen at random)', 259000, '2023-03-02', 'Screenshot-2023-03-02-134718-640046a235103.jpg', 100, 3, 'Let Pikachu help you to battle hard and build your Pokémon TCG collection! The Mouse Pokémon is here as a foil promo card that can help you find an Item card in your deck, and it\'s joined by another Pokemon friend as a playable foil card. Expand your coll', 3),
(4, 'Minnie Mouse Collectible Mini Figure in Capsule, Styles May Vary, Party Favors and Gifts for Kids, Officially Licensed Kids Toys for Ages 3 Up, Gifts and Presents', 79000, '2023-03-02', 'Screenshot-2023-03-02-135225-640047c2388d4.jpg', 100, 3, 'Surprise your biggest Minnie fan with a Disney Junior’s Minnie Mouse Mini Collectible Figure, featuring Minnie and her friends. Each figure stands 2.5” tall and features a dynamic pose. Kids will love opening the Minnie Mouse shaped capsule to reveal the', 1),
(5, 'Hot Wheels 5-Car Pack of 1:64 Scale Vehicles for Kids & Collectors (Styles May Vary)', 519000, '2023-03-02', 'Screenshot-2023-03-02-135416-6400482c04c11.jpg', 100, 3, 'Speed into an instant Hot Wheels collection with a race-ready pack that features five highly detailed 1:64 scale vehicles. Hot Wheels 5-Car packs deliver five times the amped up action and are perfect for car enthusiasts of all ages. With a cool unifying', 3),
(6, 'Hot Wheels Car Culture Audi R8 LMS Car Play Vehicle', 299000, '2023-03-02', 'Screenshot-2023-03-02-135532-64004874465c7.jpg', 100, 3, 'This premium Car Culture Assortment of 1:64 scale models is a must-have for adult collectors and enthusiasts around the world. Five unique mixes highlight Redliners, Air Heads, Modern Classics, Race Day and Cars and Donuts vehicles featuring realistic cas', 3),
(7, 'Hot Wheels City T-Rex Loop and Stunt Playset, Track Set with 1 Toy Car', 259000, '2023-03-02', 'Screenshot-2023-03-02-135715-640048db0153d.jpg', 100, 3, 'Knock out the dinosaur and save the day in the Hot Wheels City T-Rex Chomp-Down Playset. It features a slam launcher and 9-inch loop where kids launch their Hot Wheel cars just right to defeat the beast. When the dino gets knocked out, its eyes transition', 3),
(8, 'Hot Wheels City Ultimate Octo Car Wash Playset with 1 Color Reveal Car for Kids 4 Years & Up', 259000, '2023-03-02', 'Screenshot-2023-03-02-135820-6400492122f3c.jpg', 100, 3, 'The Hot Wheels City Ultimate Octo Car Wash is packed with 4+ feet of awesome features and comes with a car that offers multiple surprises to make kids want to visit again and again! Straight out of the box, the Color Reveal vehicle is covered in a green c', 3),
(9, '300 Piece Plastic Army Men Toy Soldiers for Boys with Military Figures, Tanks, Planes, Flags, Accessories', 600000, '2023-03-02', 'Screenshot-2023-03-02-135945-64004969d4358.jpg', 100, 3, 'Keep your children busy and let their imagination run wild with this toy soldiers\' play set. It\'s also the perfect tool for educating your children. This package includes 300 miniature soldier figures in various battle poses with weapons, tanks, planes, s', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `suppliername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `address`) VALUES
(3, 'My King Dom', 'Go supermarket, Hung Loi, Ninh Kieu, CT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$a.7S.A4ifwPSe/Wep36BzepaSuNlU0U/nCKJyczreTGWJHTsviu9m', 'admin'),
(2, 'vuanh@gmail.com', '[\"ROLE_USER\"]', '$2y$13$An1P.kO6XYIN1o9db6XkCO9FbnLYy.IIZev1Jl6cxNgEoYZaLSE2K', 'vuanh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BA388B745E4A66B` (`procart_id`),
  ADD KEY `IDX_BA388B786B43101` (`usercart_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD768DD4D5` (`supppro_id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_BA388B745E4A66B` FOREIGN KEY (`procart_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_BA388B786B43101` FOREIGN KEY (`usercart_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_D34A04AD768DD4D5` FOREIGN KEY (`supppro_id`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
