<?php
// Dosya yolu
$file_path = '../images/home/pop-up.jpg';

// Dosyayı sil
if (file_exists($file_path)) {
    if (unlink($file_path)) {
        echo 'Dosya başarıyla silindi.';
    } else {
        echo 'Dosya silinirken bir hata oluştu.';
    }
} else {
    echo 'Dosya bulunamadı.';
}
header("Location: pop-up.php");
?>