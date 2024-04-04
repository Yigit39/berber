<?php
if(isset($_GET['dosya'])){
    $dosya_adi = $_GET['dosya'];
    $klasor_yolu = '../images/videolar/'; // Klasör yolunu burada belirtin
    $klasor_yolu2 = '../images/thumbnails/'; // Klasör yolunu burada belirtin
    $dosya_yolu = $klasor_yolu . $dosya_adi;
    $thumbnail_adi = str_replace('.mp4', '.jpg', $dosya_adi);
    $dosya_yolu2 = $klasor_yolu2 . $thumbnail_adi;

    // Dosya varsa sil
    if (file_exists($dosya_yolu)) {
        unlink($dosya_yolu);
        unlink($dosya_yolu2);
        echo 'Dosya başarıyla silindi.';
    } else {
        echo '<script>alert("Dosya bulunamadı.");</script>';
    }

    if (file_exists($dosya_yolu2)) {
        unlink($dosya_yolu2);
        echo 'Dosya başarıyla silindi.';
    } else {
        echo '<script>alert("thumbnail bulunamadı.");</script>';
    }
} else {
    echo '<script>alert("Dosya belirtilmedi.");</script>';
}
header("Location: video.php");
?>