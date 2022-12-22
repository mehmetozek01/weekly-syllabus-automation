-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Ara 2022, 00:53:01
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 7.4.30

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
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8_turkish_ci NOT NULL,
  `title` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `logo`, `title`) VALUES
(1, 'galeri/29024logopng.png', 'Takip Sistemi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `password` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `ad_soyad`, `yetki`, `email`, `password`) VALUES
(16, 'Mahmut Tahsin Gülşin', 2, 'mtahsingulshin35@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Admin', 5, 'mail@mail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'Mehmet Veysi Özek', 1, 'mehmetvozek01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Cihan Yaşar Ongun', 3, 'cihankarakuyu6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(18, 'Emre Hamarat', 3, 'emrehamarat74@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `pazartesi_saat` text COLLATE utf8_turkish_ci NOT NULL,
  `pazartesi_program` text COLLATE utf8_turkish_ci NOT NULL,
  `sali_saat` text COLLATE utf8_turkish_ci NOT NULL,
  `sali_program` text COLLATE utf8_turkish_ci NOT NULL,
  `carsamba_saat` text COLLATE utf8_turkish_ci NOT NULL,
  `carsamba_program` text COLLATE utf8_turkish_ci NOT NULL,
  `persembe_saat` text COLLATE utf8_turkish_ci NOT NULL,
  `persembe_program` text COLLATE utf8_turkish_ci NOT NULL,
  `cuma_saat` text COLLATE utf8_turkish_ci NOT NULL,
  `cuma_program` text COLLATE utf8_turkish_ci NOT NULL,
  `cumartesi_saat` text COLLATE utf8_turkish_ci NOT NULL,
  `cumartesi_program` text COLLATE utf8_turkish_ci NOT NULL,
  `program_yayin` int(11) NOT NULL,
  `program_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `sinif` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `pazartesi_saat`, `pazartesi_program`, `sali_saat`, `sali_program`, `carsamba_saat`, `carsamba_program`, `persembe_saat`, `persembe_program`, `cuma_saat`, `cuma_program`, `cumartesi_saat`, `cumartesi_program`, `program_yayin`, `program_aciklama`, `sinif`) VALUES
(17, '09:00,14:00', 'Türkçe,Türkçe', '08:00', 'Türkçe', '11:10', 'Türkçe', '', '', '', '', '', '', 1, '', 12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ogretmen_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`id`, `baslik`, `ogretmen_id`) VALUES
(12, '1-B', 16),
(11, '1-A', 16);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
