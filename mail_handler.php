<?php
// Gmail hesap bilgileri
$gonderen_email = 'MusteriCSkuafor@gmail.com';
$gonderen_sifre = 'chqc vxht xwos mnev';

$alici = 'sivasliiii5885@gmail.com';
$konu = 'Merhaba!';
$mesaj = 'Bu bir test mesajıdır.';

// PHPMailer kütüphanesini çağırma
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// PHPMailer örneği oluşturma
$mail = new PHPMailer(true);

try {
    // SMTP ayarları

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $konu = $_POST['subject']; // Konu
        $mesaj = $_POST['message']; // Mesaj
    
        // Gönderen bilgileri
        $from_email = $_POST['email']; // Gönderen e-posta adresi
        $from_name = $_POST['fullname']; // Gönderen adı
    }
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $gonderen_email;
    $mail->Password = $gonderen_sifre;
    $mail->SMTPSecure = 'tls'; // Güvenli bağlantı türü
    $mail->Port = 587; // Gmail SMTP portu

    // Gönderen ve alıcı bilgileri
    $mail->setFrom($gonderen_email);
    $mail->addAddress($alici);

    // E-posta içeriği
    $mail->isHTML(false);
    $mail->Subject = $konu;
    $mail->Body = "Göndere email : " . $from_email .  "\nGönderen Adi: " .  $from_name . "\nMesaj: " . $mesaj;

    // E-postayı gönder
    $mail->send();
    echo "<script>alert('E-posta başarıyla gönderildi.'); window.location = 'contact.php';</script>";
        exit; // Bildirim gösterdikten sonra kodun devam etmemesi için çıkış yapılır
} catch (Exception $e) {
    echo 'E-posta gönderirken hata oluştu: ' . $mail->ErrorInfo;
}
?>