-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-30 02:09:24
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db01`
--

-- --------------------------------------------------------

--
-- 資料表結構 `que`
--

CREATE TABLE `que` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `que`
--

INSERT INTO `que` (`id`, `text`, `subject`, `count`) VALUES
(1, '你最常做什麼運動來促進健康體能呢?', 0, 2),
(2, '1.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。', 1, 1),
(3, '1.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。', 1, 0),
(4, '1.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。', 1, 1),
(5, '1.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。', 1, 0),
(6, '二手菸沒有安全劑量，只要有暴露，就會有危險，請問它會造成身體上哪些危害?', 0, 3),
(7, '增加罹患冠狀動脈心臟病及罹病死亡之風險。', 6, 2),
(8, '增加罹患冠狀動脈心臟病及罹病死亡之風險。', 6, 0),
(9, '增加罹患冠狀動脈心臟病及罹病死亡之風險。', 6, 0),
(10, '增加罹患冠狀動脈心臟病及罹病死亡之風險。', 6, 1),
(11, 'aaa', 0, 2),
(12, 'aaa', 11, 2),
(13, 'aaa', 0, 0),
(14, 'aaa', 11, 0),
(15, 'www', 0, 0),
(16, 'www', 15, 0),
(17, 'gg', 0, 0),
(18, 'gg', 17, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `que`
--
ALTER TABLE `que`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
