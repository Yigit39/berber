<?php
if(isset($_GET['dosya'])){
    $dosya_adi = $_GET['dosya'];
    $klasor_yolu = '../images/salon/'; // Klasör yolunu burada belirtin
    $dosya_yolu = $klasor_yolu . $dosya_adi;

    // Dosya varsa sil
    if (file_exists($dosya_yolu)) {
        unlink($dosya_yolu);
        echo 'Dosya başarıyla silindi.';
    } else {
        echo '<script>alert("Dosya bulunamadı.");</script>';
    }
} else {
    echo '<script>alert("Dosya belirtilmedi.");</script>';
}
header("Location: salon.php");
?>