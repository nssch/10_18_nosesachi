-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacfd04_db18`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user02_table`
--

CREATE TABLE `user02_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user02_table`
--

INSERT INTO `user02_table` (`id`, `name`, `email`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'sachinose', 'sn@gmail.com', 'aaa', 1, 0),
(2, 'bbb', 'bbb@bbb.bbb', 'bbb', 0, 0),
(3, 'ccc', 'ccc@ccc.ccc', 'ccc', 0, 0),
(6, 'ddd', 'ddd@ddd.ddd', 'ddd', 0, 0),
(7, 'eee', 'eee@eee.ee', 'eee', 0, 0),
(8, 'fff', 'fff@fff.fff', 'fff', 0, 1),
(9, 'ggg', 'ggg@ggg.ggg', 'ggg', 0, 0),
(10, 'aya', 'aya@nnn.nnn', 'ayane', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user02_table`
--
ALTER TABLE `user02_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `user02_table`
--
ALTER TABLE `user02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
