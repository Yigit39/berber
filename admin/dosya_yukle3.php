<?php
$klasor_yolu = '../images/salon/'; // Klasör yolunu burada belirtin
session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}
if (isset($_FILES['dosyalar'])) {
    $dosya_sayisi = count($_FILES['dosyalar']['name']);

    for ($i = 0; $i < $dosya_sayisi; $i++) {
        $hedef_dosya = $klasor_yolu . basename($_FILES['dosyalar']['name'][$i]);

        // Dosyayı taşıma
        if (move_uploaded_file($_FILES['dosyalar']['tmp_name'][$i], $hedef_dosya)) {
            echo 'Dosya başarıyla yüklendi: ' . htmlspecialchars(basename($_FILES['dosyalar']['name'][$i])) . '<br>';
        } else {
            echo 'Dosya yüklenirken hata oluştu.<br>';
        }
    }
}
header("Location: salon.php");
