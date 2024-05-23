-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2024, 12:12:44
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastane_otomasyonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adsoyad` varchar(50) NOT NULL,
  `kullanici_tc` varchar(11) NOT NULL,
  `kullanici_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adsoyad`, `kullanici_tc`, `kullanici_password`) VALUES
(3, 'Ahmet Şirin', '12345678910', '123456'),
(4, 'masal şirin', '99999999999', '999999'),
(5, 'admin admin', '00000000000', '000000');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE `randevu` (
  `randevu_id` int(11) NOT NULL,
  `randevu_sehir` varchar(20) NOT NULL,
  `randevu_tarih` date NOT NULL,
  `randevu_hastane` varchar(50) NOT NULL,
  `randevu_klinik` varchar(25) NOT NULL,
  `randevu_doktor` varchar(20) NOT NULL,
  `randevu_hasta_id` int(20) NOT NULL,
  `randevu_barkod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`randevu_id`, `randevu_sehir`, `randevu_tarih`, `randevu_hastane`, `randevu_klinik`, `randevu_doktor`, `randevu_hasta_id`, `randevu_barkod`) VALUES
(14, 'Ağrı', '2024-01-19', 'Acıbadem Hastanesi', 'Dermotoloji', 'Prf.Dr Masal', 3, 379343),
(15, 'Afyonkarahisar', '2024-01-26', 'Medipol Hastanesi', 'Onkoloji', 'Dr. Ali', 3, 780551),
(16, 'Ankara', '2024-01-07', 'Hayat Hastanesi', 'Onkoloji', 'Dr. Rick', 3, 512516),
(17, 'Artvin', '2024-01-12', 'Hayat Hastanesi', 'Dahiliye', 'Doç.Dr. Hilal', 3, 137629),
(18, 'Ankara', '2024-01-12', 'hastane', 'Dahiliye', 'Dr. Ali', 3, 237866),
(19, 'Ankara', '2024-01-04', 'Bölge Eğitim ve Araştırma Hastanesi', 'Onkoloji', 'Uz.Dr. Ahmet', 4, 266886),
(20, 'İstanbul', '2024-01-20', 'hastane', 'Ortopedi', 'Uz.Dr. Ahmet', 5, 470178),
(21, 'İstanbul', '2024-03-01', 'Hayat Hastanesi', 'Onkoloji', 'Doç.Dr. Hilal', 5, 841148),
(22, 'İstanbul', '2024-01-31', 'Bölge Eğitim ve Araştırma Hastanesi', 'Onkoloji', 'Dr. Rick', 5, 465902),
(23, 'Adıyaman', '2024-01-27', 'Medipol Hastanesi', 'Diyetisyen', 'Doç.Dr. Hilal', 5, 646532);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`randevu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `randevu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
