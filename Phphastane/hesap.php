<?php

include 'header.php';


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastane Otomasyonu</title>
</head>
<body>
    <!--
     * Bu dosya, Hastane Otomasyonu uygulamasının hesap bilgileri sayfasını içerir.
     * Kullanıcının hesap bilgilerini güncellemesini sağlar.
     -->
<div class="hesabım_content">
    <form action="hesap.php" method="post">
        <div class="label">
            <label>ADI SOYADI</label>
            <input type="text" name="kullanici_adsoyad" placeholder="<?php echo $kullanicicek['kullanici_adsoyad']; ?>">
            <br>
        </div>

        <div class="label">
            <label>TC NO</label>
            <input type="text" name="kullanici_tc" placeholder="<?php echo $kullanicicek['kullanici_tc']; ?>">
            <br>
        </div>
        <button type="submit" name="hesap_guncelle">guncelle</button>
        </div>
    </form>
</div>
</body>
</html>


