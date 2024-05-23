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
     * Bu dosya, Hastane Otomasyonu uygulamasının giriş sayfasını içerir.
     * Kullanıcıların sisteme giriş yapmalarını sağlar.
     -->
    <header>
        <H2>Hastane Otomasyonu</H2>
    </header>
    <div class="tableOuter">
        <h1>Giriş Yap</h1>
        <form action="islem.php" method="post">
    <div class="user">
        <input type="text" name="kullanici_tc" placeholder="Tc Kimlik No">
    </div>
    <div class="pass">
        <input type="password" name="kullanici_password" placeholder="Şifre">
    </div>
    <button type="submit" class="sub" name="giris_yap">Giriş Yap</button>
    <br>
</form>
<a href="üye.php"><button type="submit" class="sub" name="sayfagecir">Kayıt ol</button></a>
<a href="üye.php" class="c" type="submit"> Şifremi Unuttum</a>

    </div>
</body>
</html>