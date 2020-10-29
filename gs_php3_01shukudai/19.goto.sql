-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 10 月 17 日 09:24
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `book_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `book_url` text NOT NULL,
  `review` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `book_name`, `book_url`, `review`, `indate`) VALUES
(3, '人間失格', 'https://www.shinchosha.co.jp/book/100605/', 'ひとがひととして、ひとと生きる意味を問う、太宰治、捨て身の問題作。', '2020-10-17 18:18:17'),
(4, 'SLUM DUNK', 'itplanning.co.jp/works/slamdunk', '庶民シュートは永遠に不滅です。', '2020-10-17 18:20:06'),
(5, '影響力の武器', 'http://www.seishinshobo.co.jp/book/b177759.html', 'マーケティングを極めるための必須ノウハウが満載！', '2020-10-17 18:22:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
