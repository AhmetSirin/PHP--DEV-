<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hastane Otomasyonu</title>
</head>
<body>
    <!--
     * Bu dosya, Hastane Otomasyonu uygulamasının kullanıcı kayıt formunu içerir.
     * Kullanıcıların sisteme kaydolmalarını sağlar.
     -->
    <header>
        <H2>Hastane Otomasyonu</H2>
    </header>
    <div class="tableOuter">
        <h1>Kayıt ol</h1>
        <form action="islem.php" method="post">
    <div class="user">
        <input type="text" name="kullanici_adsoyad" placeholder="Ad Soyad" required>
    </div>
    <div class="user">
        <input type="text" name="kullanici_tc" placeholder="Tc Kimlik No" required>
    </div>
    <div class="pass">
        <input type="password" name="kullanici_password" placeholder="Şifre" required>
    </div>
    <button type="submit" class="sub" name="KullaniciKaydet">Kayıt ol</button>
    <br>
</form>
        <a href="index.php"><button type="submit" class="sub">Geri</button></a>
    </div>
</body>
</html>