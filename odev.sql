-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Oca 2023, 17:17:42
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `odev`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `pazartesi_saat` text NOT NULL,
  `pazartesi_program` text NOT NULL,
  `sali_saat` text NOT NULL,
  `sali_program` text NOT NULL,
  `carsamba_saat` text NOT NULL,
  `carsamba_program` text NOT NULL,
  `persembe_saat` text NOT NULL,
  `persembe_program` text NOT NULL,
  `cuma_saat` text NOT NULL,
  `cuma_program` text NOT NULL,
  `cumartesi_saat` text NOT NULL,
  `cumartesi_program` text NOT NULL,
  `program_yayin` int(11) NOT NULL,
  `program_aciklama` text NOT NULL,
  `sinif` varchar(250) NOT NULL,
  `derskodu` varchar(250) NOT NULL,
  `dersadi` varchar(250) NOT NULL,
  `derstime` varchar(250) NOT NULL,
  `ogretmen_id` int(11) NOT NULL,
  `ders_id` int(11) NOT NULL,
  `baslik` varchar(250) NOT NULL,
  `sinif_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `pazartesi_saat`, `pazartesi_program`, `sali_saat`, `sali_program`, `carsamba_saat`, `carsamba_program`, `persembe_saat`, `persembe_program`, `cuma_saat`, `cuma_program`, `cumartesi_saat`, `cumartesi_program`, `program_yayin`, `program_aciklama`, `sinif`, `derskodu`, `dersadi`, `derstime`, `ogretmen_id`, `ders_id`, `baslik`, `sinif_id`) VALUES
(138, '11:50', '', '10:50', '', '13:30', '', '09:50', '', '14:30', '', '14:30', '', 1, '', '25', '', '', '', 0, 58, '', 0),
(137, '09:50', '', '09:50', '', '10:50', '', '13:30', '', '10:50', '', '09:50', '', 1, '', '25', '', '', '', 0, 57, '', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
