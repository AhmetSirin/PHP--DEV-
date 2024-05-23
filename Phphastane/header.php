<?php
/*
 * Bu dosya, Hastane Otomasyonu uygulamasının başlık dosyasıdır.
 * Kullanıcı oturumunu doğrular ve başlık bilgilerini içerir.
 */
ob_start();
session_start();
include 'bagla.php';

   // İki katlı ilişkisel dizi tanımlama
static $user_sessions = array();

// Kullanıcı oturumunu doğrulama
$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_tc=:kullanici_tc");
$kullanicisor->execute([
    'kullanici_tc' => $_SESSION['userkullanici_tc']
]);

$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0){
    header('location:index.php?izinsiz');
    exit;
} else {
    // Kullanıcı oturumu doğrulandı

    // Kullanıcının oturum bilgilerini ve ilgili sayfa bilgilerini takip etme
        $user_sessions[$_SESSION['userkullanici_tc']] = array(
    'sayfa' => basename($_SERVER['PHP_SELF']),
    'zaman' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR']  // Kullanıcının IP adresini alıyoruz
);
}
?>

    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="stil.css">
        <title>Hastane Otomasyonu</title>
    </head>
    <body>
        <!--
     * Bu bölüm, Hastane Otomasyonu uygulamasının üst çubuğunu içerir.
     * Kullanıcıya hesap bilgileri, randevu bilgileri ve çıkış yapma seçeneklerini sunar.
     -->
        <div class="üst_bar">
                <a href="Anasayfa.php">Hastane Otomasyonu</a>
                <div class="menu">
                    <a href="hesap.php">Hesap Bilgileri</a>
                    <a href="randevu.php">Randevu Bilgileri</a>
                    <a href="logout.php"><div class="Çikiş">
                Çıkış yap
                 </div></a>
             </div>
        </div>
     </body>
 </html>