<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı için filtreleme yapılabilir (güvenlik amacıyla)
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['admin_logged_in'] = true;
                header("Location: index.php");
                exit;
        } else {
            echo "Kullanıcı bulunamadı";
        }
    } else {
        echo "Sorgu hatası: " . $conn->error;
    }
}
?>