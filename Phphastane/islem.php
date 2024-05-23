<?php
/*
 * Bu dosya, Hastane Otomasyonu uygulamasının işlem dosyasıdır.
 * Kullanıcı kayıt işlemleri, giriş işlemleri ve randevu kayıt işlemleri bu dosyada gerçekleştirilir.
 * Bu dosya, kullanıcıların sisteme kaydolmasını, sisteme giriş yapmasını ve randevu oluşturmasını sağlar.
 */
ob_start();
session_start();
include 'bagla.php';

class Kullanici {
    public $tc;
    public $adsoyad;

    public function __construct($tc, $adsoyad) {
        $this->tc = $tc;
        $this->adsoyad = $adsoyad;
    }

    public function getBilgiler() {
        return "TC: " . $this->tc . ", Ad Soyad: " . $this->adsoyad;
    }
}

// Kullanıcı oluşturma
$kullanici = new Kullanici($_SESSION['userkullanici_tc'], $kullanicicek['kullanici_adsoyad']);

if(isset($_POST['KullaniciKaydet'])){
     $kullanici_tc = isset($_POST['kullanici_tc']) ? $_POST['kullanici_tc'] : null;
     $kullanici_adsoyad = isset($_POST['kullanici_adsoyad']) ? $_POST['kullanici_adsoyad'] : null;
     $kullanici_password = isset($_POST['kullanici_password']) ? $_POST['kullanici_password'] : null;

     #veritabanı ekleme
     $sorgu = $db->prepare('INSERT INTO kullanici SET
     kullanici_tc = ?,
     kullanici_adsoyad = ?,
     kullanici_password = ? 
     ');

     $ekle = $sorgu->execute([
            $kullanici_tc,$kullanici_adsoyad,$kullanici_password
     ]);
     if($ekle){
        header('location:index.php?durumbasarili');
     }else{
        $hata = $sorgu->errorInfo();
        echo 'mysql hatası' . $hata[2];
     }
    }
                    // Kullanıcı kayıt işlemleri





     # üye girişi #
     if (isset($_POST['giris_yap'])) {
        $kullanici_tc = $_POST['kullanici_tc'];
        $kullanici_password = $_POST['kullanici_password'];
        $kullanicisor = $db->prepare('SELECT * FROM kullanici WHERE kullanici_tc=:kullanici_tc and kullanici_password=:kullanici_password');
            $kullanicisor->execute([
                'kullanici_tc' => $kullanici_tc,
                'kullanici_password' => $kullanici_password
            ]);

            $say = $kullanicisor->rowCount();
            if ($say==1) {
               $_SESSION['userkullanici_tc']=$kullanici_tc;
               header('location:Anasayfa.php?durum=girisbasarili');
               exit;
            }else{
                header('location:index.php?durum=girisbasarisiz');
                exit;
            }         
     }                          // Kullanıcı giriş işlemleri

                    // Randevu kayıt işlemleri
                    static $previous_barcodes = array();  // static değişkenimiz: rastgele sayımızın aynı sayı denk gelmemesini sağlıyor

                    if(isset($_POST['Randevu_Kaydet'])){
                        $randevu_sehir = isset($_POST['Sehir']) ? $_POST['Sehir'] : null;
                        $randevu_hastane = isset($_POST['hastane']) ? $_POST['hastane'] : null;
                        $randevu_doktor = isset($_POST['doktor']) ? $_POST['doktor'] : null;
                        $randevu_tarih = isset($_POST['tarih']) ? $_POST['tarih'] : null;
                        $randevu_klinik = isset($_POST['Klinik']) ? $_POST['Klinik'] : null;
                        $hasta_id = isset($_POST['kullanici_id']) ? $_POST['kullanici_id'] : null;
                    
                        // Rastgele sayı oluşturuyoruz.
                        do {
                        $randevu_barkod = mt_rand(100000, 999999);
                        } while (in_array($randevu_barkod, $GLOBALS['previous_barcodes']));
                        // Yeni barkodu önceki barkodlar dizisine ekliyoruz
                        $GLOBALS['previous_barcodes'][] = $randevu_barkod;
                    
                        $kaydet = $db->prepare("INSERT INTO randevu SET
                            randevu_sehir = ?,
                            randevu_hastane = ?,
                            randevu_doktor = ?,
                            randevu_tarih = ?,
                            randevu_klinik = ?,
                            randevu_hasta_id = ?,
                            randevu_barkod = ?
                        ");
                    
                        $insert = $kaydet->execute([
                            $randevu_sehir, $randevu_hastane, $randevu_doktor, $randevu_tarih, $randevu_klinik, $hasta_id, $randevu_barkod
                        ]);
                    
                        if ($insert) {
                            header("location:Anasayfa.php?kayit_basarili");
                        } else {
                            header("location:Anasayfa.php?kayit_basarisiz");
                        }
                    }
            
?>
 