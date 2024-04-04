<?php
session_start();
require_once 'functions.php';
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: admin_login.php");
        exit;
    }

    // Gönderiyi silme işlemi
    if (deleteBlogPost($post_id)) {
        // Gönderi başarıyla silindi, yönlendirme yapabilirsiniz
        header("Location: blog.php");
        exit;
    } else {
        echo "Gönderi silinemedi.";
    }
} else {
    echo "Gönderi ID'si eksik.";
}
?>