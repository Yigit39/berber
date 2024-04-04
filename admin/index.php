<?php
session_start();
// Kullanıcı girişi yapılmamışsa, giriş sayfasına yönlendir
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Paneli</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
        .container {
            text-align: center;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Paneli</h1>
        <div class="btn-container">
            <a href="blog.php" class="btn btn-primary btn-lg mr-2">Blog'a Git</a>
            <a href="resim.php" class="btn btn-success btn-lg mr-2">Galeriye Git</a>
            <a href="salon.php" class="btn btn-warning btn-lg mr-2">Salona Git</a>
            <a href="video.php" class="btn btn-danger btn-lg">Videolara Git</a>
            <a href="pop-up.php" class="btn btn-success btn-lg mr-2">Pop-Up Reklam</a>
            <a href="logout.php" class="btn btn-secondary btn-lg">Çıkış Yap</a>
        </div>
    </div>
</body>
</html>