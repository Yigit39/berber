<?php
$klasor_yolu = '../images/galeri/'; // Klasör yolunu burada belirtin

if(isset($_FILES['dosyalar'])){
    $dosya_sayisi = count($_FILES['dosyalar']['name']);
    echo 'Dosyalar Yükleniyor...<br>';
    $hata = false;
    for($i = 0; $i < $dosya_sayisi; $i++){
        $hedef_dosya = $klasor_yolu . basename($_FILES['dosyalar']['name'][$i]);

        // Hata ayıklama modu aktif ediliyor
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if (move_uploaded_file($_FILES['dosyalar']['tmp_name'][$i], $hedef_dosya)) {
            echo 'Dosya başarıyla yüklendi: ' . htmlspecialchars(basename($_FILES['dosyalar']['name'][$i])) . '<br>';
        } else {
            echo 'Dosya yüklenirken hata oluştu: ' . error_get_last()['message'] . '<br>';
            $hata = true;
        }
    }

    if (!$hata) {
        header("Location: resim.php");
        exit; // işlem sonlandır
    }
}
?>