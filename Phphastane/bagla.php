<?php
/*
 * Bu dosya, Hastane Otomasyonu uygulamasının veritabanı bağlantı dosyasıdır.
 * PDO kullanarak MySQL veritabanına bağlantı kurar.
 */

try {
    $db = new PDO("mysql:host=localhost; dbname=hastane_otomasyonu; charest=utf8",'root','');
   // echo " Veritabanı Bağlantısı Başarılı";
} catch (Exception $e) {
    echo $e->getMessage();  // Hata durumunda hata mesajını ekrana yazdır.
}

?>