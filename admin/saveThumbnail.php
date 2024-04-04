<?php
$thumbnail_klasor_yolu = '../images/thumbnails/'; // Thumbnail'ların kaydedileceği klasör yolu

if (isset($_POST['thumbnail']) && isset($_POST['videoName'])) {
    $encodedData = $_POST['thumbnail'];
    $decodedData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $encodedData));

    $videoAdi = $_POST['videoName'];
    $thumbnailDosyaAdi = $thumbnail_klasor_yolu . pathinfo($videoAdi, PATHINFO_FILENAME) . '.jpg'; // Video adından uzantıyı kaldırarak thumbnail adını oluştur

    // Thumbnail'ı sunucuya kaydetme
    file_put_contents($thumbnailDosyaAdi, $decodedData);
    // Burada $thumbnailDosyaAdi ile oluşturulan thumbnail'ın yolunu kullanabilirsiniz.
    // Örneğin, veritabanına kaydedebilir veya başka bir işlem yapabilirsiniz.
    // Daha sonra, bu dosya yolunu kullanarak HTML'de görüntüleyebilirsiniz.
    // Örnek olarak: echo '<img src="' . $thumbnailDosyaAdi . '" alt="Thumbnail" />';
    // Eğer işiniz bittiğinde gerekmiyorsa dosyayı silebilirsiniz: unlink($thumbnailDosyaAdi);
}
?>