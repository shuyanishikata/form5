-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-20 04:07:18
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db4`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `file_table`
--

CREATE TABLE `file_table` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` varchar(140) DEFAULT NULL,
  `insert_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `file_table`
--

INSERT INTO `file_table` (`id`, `file_name`, `file_path`, `description`, `insert_time`, `update_time`) VALUES
(1, 'kubo.jpg', 'images/20230112102622kubo.jpg', 'kubo', '2023-01-12 18:26:22', '2023-01-12 18:56:28'),
(2, 'kamada.jpg', 'images/20230112105138kamada.jpg', 'kmd', '2023-01-12 18:51:38', '2023-01-12 18:51:38'),
(3, 'endo.jpg', 'images/20230112114138endo.jpg', NULL, '2023-01-12 19:41:38', '2023-01-12 19:41:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bn_table`
--

CREATE TABLE `gs_bn_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url1` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bn_table`
--

INSERT INTO `gs_bn_table` (`id`, `name`, `url1`, `content`, `date`, `file_name`, `file_path`, `insert_time`, `update_time`) VALUES
(32, '5', '10', '枝豆', '2023-01-13 01:41:58', NULL, NULL, NULL, '2023-01-13 01:41:58'),
(35, '3', '2', '冷奴', '2023-01-13 03:01:31', NULL, NULL, NULL, '2023-01-13 03:01:31'),
(36, '9', '5', 'ポテト', '2023-01-13 03:01:22', NULL, NULL, NULL, '2023-01-13 03:01:22'),
(38, '10', '3', 'たこざわび', '2023-01-13 23:14:27', NULL, NULL, NULL, '2023-01-13 23:14:27'),
(40, '6', '7', '獺祭', '2023-01-14 13:44:32', NULL, NULL, NULL, '2023-01-14 13:44:32'),
(41, '7', '1', 'ハイボール', '2023-01-14 16:54:42', NULL, NULL, NULL, '2023-01-14 16:54:42'),
(42, '4', '2', 'ハイボール', '2023-01-20 10:22:59', NULL, NULL, NULL, '2023-01-20 10:22:58'),
(43, '6', '1', 'ハイボール', '2023-01-20 10:51:45', NULL, NULL, NULL, '2023-01-20 10:51:45'),
(44, '8', '2', '枝豆', '2023-01-20 10:53:09', NULL, NULL, NULL, '2023-01-20 10:53:09'),
(45, '7', '2', '唐揚げ', '2023-01-20 10:55:42', NULL, NULL, NULL, '2023-01-20 10:55:42'),
(46, '7', '1', 'レモンサワー', '2023-01-20 11:16:14', NULL, NULL, NULL, '2023-01-20 11:16:14'),
(47, '2', '1', 'ハイボール', '2023-01-20 11:21:52', NULL, NULL, NULL, '2023-01-20 11:21:52'),
(48, '10', '1', 'チャミスル パイナップル', '2023-01-20 11:22:06', NULL, NULL, NULL, '2023-01-20 11:22:06'),
(49, '3', '1', '餃子', '2023-01-20 11:27:50', NULL, NULL, NULL, '2023-01-20 11:27:50'),
(50, '1', '1', '獺祭', '2023-01-20 11:35:16', NULL, NULL, NULL, '2023-01-20 11:35:16'),
(52, '1', '1', '生ビール', '2023-01-20 11:43:42', NULL, NULL, NULL, '2023-01-20 11:43:42'),
(53, '3', '1', '冷奴', '2023-01-20 11:45:14', NULL, NULL, NULL, '2023-01-20 11:45:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0),
(4, 'テストユーザー', 'izakaya', 'staff', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `menu_table`
--

CREATE TABLE `menu_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `price` varchar(12) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `insert_time` datetime DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `menu_table`
--

INSERT INTO `menu_table` (`id`, `name`, `price`, `file_name`, `file_path`, `insert_time`, `update_time`) VALUES
(42, 'たこざわび', '250', 'たこわさび.jpg', 'images/20230112162955たこわさび.jpg', '2023-01-13 00:29:55', '2023-01-13 00:29:55'),
(43, 'ポテト', '350', 'ポテト.jpg', 'images/20230112163012ポテト.jpg', '2023-01-13 00:30:12', '2023-01-13 00:30:12'),
(44, '枝豆', '250', '枝豆.jpg', 'images/20230112163029枝豆.jpg', '2023-01-13 00:30:29', '2023-01-13 00:30:29'),
(45, '冷奴', '300', '冷奴.jpg', 'images/20230112163046冷奴.jpg', '2023-01-13 00:30:46', '2023-01-13 00:30:46'),
(46, '唐揚げ', '480', '唐揚げ.jpg', 'images/20230112163058唐揚げ.jpg', '2023-01-13 00:30:58', '2023-01-13 00:30:58'),
(47, 'だし巻き玉子', '380', 'だし巻き卵.jpg', 'images/20230112163120だし巻き卵.jpg', '2023-01-13 00:31:20', '2023-01-13 00:31:20'),
(48, '生ビール', '350', '生ビール.jpg', 'images/20230112182437生ビール.jpg', '2023-01-13 02:24:37', '2023-01-13 02:24:37'),
(49, 'レモンサワー', '330', 'レモンサワー.jpg', 'images/20230112182653レモンサワー.jpg', '2023-01-13 02:26:53', '2023-01-13 02:26:53'),
(50, '梅酒', '400', '梅酒.jpg', 'images/20230112183145梅酒.jpg', '2023-01-13 02:31:45', '2023-01-13 02:31:45'),
(51, '獺祭', '800', '獺祭.jpg', 'images/20230112185917獺祭.jpg', '2023-01-13 02:59:17', '2023-01-13 02:59:17'),
(53, '赤ワイン', '400', '赤ワイン.jpg', 'images/20230113033734赤ワイン.jpg', '2023-01-13 11:37:34', '2023-01-13 11:37:34'),
(54, 'チャミスル パイナップル', '460', 'チャミスルパイナップル.jpg', 'images/20230113034018チャミスルパイナップル.jpg', '2023-01-13 11:40:18', '2023-01-13 11:40:18'),
(55, 'ハイボール', '350', 'ハイボール.jpg', 'images/20230114050841ハイボール.jpg', '2023-01-14 13:08:41', '2023-01-14 13:08:41'),
(56, '餃子', '300', '餃子.jpg', 'images/20230114054540餃子.jpg', '2023-01-14 13:45:40', '2023-01-14 13:45:40');

-- --------------------------------------------------------

--
-- テーブルの構造 `zaseki_table`
--

CREATE TABLE `zaseki_table` (
  `zaseki` int(11) NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `zaseki_table`
--

INSERT INTO `zaseki_table` (`zaseki`, `id`) VALUES
(0, 1),
(1, 2),
(0, 3),
(1, 4),
(3, 5);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `file_table`
--
ALTER TABLE `file_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_path` (`file_path`);

--
-- テーブルのインデックス `gs_bn_table`
--
ALTER TABLE `gs_bn_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_path` (`file_path`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `zaseki_table`
--
ALTER TABLE `zaseki_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `file_table`
--
ALTER TABLE `file_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `gs_bn_table`
--
ALTER TABLE `gs_bn_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `menu_table`
--
ALTER TABLE `menu_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- テーブルの AUTO_INCREMENT `zaseki_table`
--
ALTER TABLE `zaseki_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
