

<?php
session_start();
require_once 'config.php';
global $conn;

// Eğer kullanıcı zaten giriş yaptıysa, admin paneline yönlendir
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

// Eğer giriş yapılmamışsa ve form gönderilmişse, kullanıcıyı doğrulayın
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Kullanıcı adı
    $password = $_POST['password']; // Şifre

    $query = "SELECT * FROM admins WHERE username = ? AND password='$password'"; // Kullanıcı adına göre sorgu
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password']; // Veritabanından alınan şifre

        $_SESSION['admin_logged_in'] = true;
            header("Location: index.php");
    } else {
        echo "Kullanıcı bulunamadı!";
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Girişi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h2 class="text-center">Admin Girişi</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş</button>
        </form>
    </div>
</body>
</html>