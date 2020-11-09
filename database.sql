-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 20-11-09 16:14
-- 서버 버전: 5.7.31
-- PHP 버전: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `postest`
--
CREATE DATABASE IF NOT EXISTS `postest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `postest`;

-- --------------------------------------------------------

--
-- 테이블 구조 `Booked`
--

CREATE TABLE `Booked` (
  `SName` varchar(20) NOT NULL,
  `TName` varchar(20) NOT NULL,
  `MName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `Booked`
--

INSERT INTO `Booked` (`SName`, `TName`, `MName`) VALUES
('청도반점', '테이블2', '짬뽕'),
('청도반점', '테이블2', '탕수육'),
('청도반점', '테이블2', '탕수육');

-- --------------------------------------------------------

--
-- 테이블 구조 `Menu`
--

CREATE TABLE `Menu` (
  `SName` varchar(20) NOT NULL,
  `MName` varchar(20) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `Menu`
--

INSERT INTO `Menu` (`SName`, `MName`, `count`) VALUES
('동아치킨', '후라이드치킨', 5),
('동아치킨', '양념치킨', 1),
('동아치킨', '간장치킨', 1),
('청도반점', '짜장면', 0),
('청도반점', '짬뽕', 2),
('청도반점', '탕수육', 2),
('하루식당', '김치찌개', 1),
('하루식당', '된장찌개', 2),
('하루식당', '제육볶음', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `Store`
--

CREATE TABLE `Store` (
  `SID` int(11) NOT NULL,
  `SName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `Store`
--

INSERT INTO `Store` (`SID`, `SName`) VALUES
(1, '동아치킨'),
(2, '청도반점'),
(3, '하루식당');

-- --------------------------------------------------------

--
-- 테이블 구조 `TBL`
--

CREATE TABLE `TBL` (
  `SName` varchar(20) NOT NULL,
  `TName` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `TBL`
--

INSERT INTO `TBL` (`SName`, `TName`, `Status`) VALUES
('동아치킨', '테이블1', 0),
('동아치킨', '테이블2', 0),
('동아치킨', '테이블3', 0),
('동아치킨', '테이블4', 0),
('청도반점', '테이블1', 1),
('청도반점', '테이블2', 2),
('청도반점', '테이블3', 0),
('청도반점', '테이블4', 0),
('하루식당', '테이블1', 0),
('하루식당', '테이블2', 0),
('하루식당', '테이블3', 0),
('하루식당', '테이블4', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`MName`,`SName`) USING BTREE;

--
-- 테이블의 인덱스 `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`SID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `Store`
--
ALTER TABLE `Store`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
