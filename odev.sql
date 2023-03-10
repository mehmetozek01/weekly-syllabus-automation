-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Oca 2023, 18:08:18
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
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `logo`, `title`) VALUES
(1, 'galeri/29024logopng.png', 'Takip Sistemi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE `dersler` (
  `id` int(11) NOT NULL,
  `derskodu` varchar(250) NOT NULL,
  `dersadi` varchar(250) NOT NULL,
  `derstime` varchar(250) NOT NULL,
  `ogretmen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`id`, `derskodu`, `dersadi`, `derstime`, `ogretmen_id`) VALUES
(57, '1231', 'Programlama Temelleri', '3', 36),
(58, '3123', 'Web Tasarımı', '3', 34),
(59, '1231qw', 'Kimya', '5', 34);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `unvan` varchar(50) NOT NULL,
  `ad_soyad` varchar(250) NOT NULL,
  `yetki` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `unvan`, `ad_soyad`, `yetki`, `email`, `password`) VALUES
(5, '', 'Admin', 1, 'mail@mail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(37, 'Stajyer', 'Cihan Yaşar Ongun', 1, 'cihankarakuyu6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(34, 'Öğr. Grv.', 'Mehmet Veysi Özek', 2, 'mehmetvozek01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(35, 'Doç.', 'Mahmut Tahsin Gülşin', 1, 'mtahsingulshin35@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(36, 'Prof.', 'Emre Hamarat', 2, 'emrehamarat74@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) NOT NULL,
  `ogretmen_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`id`, `baslik`, `ogretmen_id`) VALUES
(25, '1-A', 0),
(28, '2-A', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dersler`
--
ALTER TABLE `dersler`
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
-- Tablo için AUTO_INCREMENT değeri `dersler`
--
ALTER TABLE `dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
