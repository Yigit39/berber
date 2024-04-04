<?php
session_start();

// Tüm oturum değişkenlerini temizle
$_SESSION = array();

// Oturumu sonlandır
session_destroy();

// Kullanıcıyı çıkış yaptıktan sonra başka bir sayfaya yönlendir
header("Location: admin_login.php");
exit;
?>