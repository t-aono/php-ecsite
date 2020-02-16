-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2020 年 2 月 16 日 07:06
-- サーバのバージョン： 5.7.29
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_member`
--

CREATE TABLE `dat_member` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `birth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_member`
--

INSERT INTO `dat_member` (`code`, `date`, `password`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`, `sex`, `birth`) VALUES
(1, '2020-02-16 05:28:27', '1a1dc91c907325c69271ddf0c944bc72', 'じろう', 'jiro@sample.com', '123', '4567', '沖縄県那覇市', '123-1234-5678', 2, 1980);

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales`
--

CREATE TABLE `dat_sales` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code_member` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_sales`
--

INSERT INTO `dat_sales` (`code`, `date`, `code_member`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`) VALUES
(1, '2020-02-16 05:18:22', 0, 'taro', 'taro@sample.com', '123', '1234', '福岡県福岡市', '123-1234-1234'),
(2, '2020-02-16 05:28:27', 1, 'じろう', 'jiro@sample.com', '123', '4567', '沖縄県那覇市', '123-1234-5678'),
(3, '2020-02-16 06:05:57', 1, 'じろう', 'jiro@sample.com', '123', '4567', '沖縄県那覇市', '123-1234-5678');

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales_product`
--

CREATE TABLE `dat_sales_product` (
  `code` int(11) NOT NULL,
  `code_sales` int(11) NOT NULL,
  `code_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_sales_product`
--

INSERT INTO `dat_sales_product` (`code`, `code_sales`, `code_product`, `price`, `quantity`) VALUES
(1, 1, 2, 22000, 1),
(2, 2, 5, 8000, 1),
(3, 3, 9, 33000, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `image`) VALUES
(1, 'エアジョーダン レトロ SATIN', 20000, 'Air Jordan 1 Retro High OG SE SATIN.jpg'),
(2, 'エアジョーダン４レトロ', 22000, 'KAWS x Air Jordan 4 RETRO.jpg'),
(3, 'エアフォース１ BY KAWS', 19000, 'NIKE 1 WORLD AIR FORCE 1 BY KAWS.jpg'),
(4, 'ナイキエアー YEEZY', 25000, 'NIKE AIR YEEZY 2.jpg'),
(5, 'ナイキハイパーアダプト', 8000, 'Nike HyperAdapt 1.0.jpg'),
(6, 'ヴァンズ エラ９５DX', 17000, 'ヴァンズ×F.O.G.の「エラ 95 DX」.jpg'),
(7, 'ヴァンズ オールドスクール', 14000, 'ヴァンズ×ビリーズの「オールドスクール」.jpg'),
(8, 'ヴァンズ オールドスクール２', 16000, 'ヴァンズ×マインドシーカーの「オールドスクール ライトニング 2」.jpg'),
(9, 'エアジョーダン レトロ ハイ', 33000, 'ジョーダン ブランド×ユニオンの「エア ジョーダン 1 レトロ ハイ OG NRG」.jpg'),
(10, 'エア イージー１', 25000, 'ナイキ×カニエ・ウェストの「エア イージー 1」.jpg'),
(11, 'ナイキ クラフト マーズヤード', 17000, 'ナイキ×トム・サックスの「ナイキクラフトマーズヤード 2.0」.jpg'),
(12, 'エアフィアオブゴット', 50000, 'ナイキ×フィア オブ ゴッドの「エア フィア オブ ゴッド 1 ライトボーン」.jpg'),
(13, 'エアフォース１馬華', 21000, 'ナイキの「エア フォース 1 ロー “馬・華”」.jpg'),
(14, 'エアジョーダン１ ヴァージル・アブロー', 23000, 'ナイキラボの「エア ジョーダン 1×ヴァージル・アブロー」.jpg'),
(15, 'トリプルSトレーナー', 7000, 'バレンシアガの「トリプル S トレーナー」.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(1, '店長', '1a1dc91c907325c69271ddf0c944bc72'),
(2, 'バイトリーダー', '1a1dc91c907325c69271ddf0c944bc72');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dat_member`
--
ALTER TABLE `dat_member`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `dat_sales`
--
ALTER TABLE `dat_sales`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `dat_member`
--
ALTER TABLE `dat_member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `dat_sales`
--
ALTER TABLE `dat_sales`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルのAUTO_INCREMENT `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
