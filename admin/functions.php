<?php
require_once 'config.php';

function addNewBlogPost($title, $content, $imagePath)
{
    global $conn;

    // Gönderi eklemek için SQL sorgusu
    $query = "INSERT INTO blog_posts (title, content, image, date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

    // Hazırlanan sorguyu çalıştır
    $statement = $conn->prepare($query);

    // Değişkenleri bağla
    $statement->bind_param("sss", $title, $content, $imagePath);

    // Sorguyu çalıştır
    if ($statement->execute()) {
        return true; // Gönderi eklendi
    } else {
        return false; // Gönderi eklenemedi
    }
}


function getBlogPostById($post_id)
{
    global $conn;

    // Veritabanından belirli bir yazıyı almak için SQL sorgusu
    $query = "SELECT * FROM blog_posts WHERE id = ?";

    // Hazırlanan sorguyu çalıştır
    $statement = $conn->prepare($query);

    // Değişkeni bağla
    $statement->bind_param("i", $post_id);

    // Sorguyu çalıştır
    $statement->execute();

    // Sonucu al
    $result = $statement->get_result();

    // Sonucu döndür
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; // Belirtilen ID'ye sahip bir yazı bulunamadı
    }
}

function editBlogPost($post_id, $title, $content, $image_path = null) {
    global $conn;

    $current_date = date("Y-m-d H:i:s"); // Güncel tarih ve saat

    if ($image_path) {
        // Eğer yeni bir fotoğraf yükleniyorsa, gönderinin fotoğrafını, içeriğini ve tarihini güncelle
        $query = "UPDATE blog_posts SET title = ?, content = ?, image = ?, date = ? WHERE id = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("ssssi", $title, $content, $image_path, $current_date, $post_id);
    } else {
        // Eğer yeni bir fotoğraf yüklenmiyorsa, sadece gönderinin içeriğini ve tarihini güncelle
        $query = "UPDATE blog_posts SET title = ?, image = ?, date = ? WHERE id = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("sssi", $title, $content, $current_date, $post_id);
    }

    if ($statement->execute()) {
        return true; // Gönderi güncellendi
    } else {
        return false; // Gönderi güncellenemedi
    }
}

function deleteBlogPost($post_id)
{
    global $conn;

    // Silme sorgusu
    $query = "DELETE FROM blog_posts WHERE id = ?";

    // Hazırlanan sorguyu çalıştır
    $statement = $conn->prepare($query);

    // Değişkeni bağla
    $statement->bind_param("i", $post_id);

    // Sorguyu çalıştır
    if ($statement->execute()) {
        return true; // Gönderi silindi
    } else {
        return false; // Gönderi silinemedi
    }
}

function cleanFileName($text) {
    $search = array('Ç', 'Ğ', 'İ', 'I', 'Ö', 'Ş', 'Ü', 'ç', 'ğ', 'ı', 'ö', 'ş', 'ü', ' ', '?', '!', '+');
    $replace = array('c', 'g', 'i', 'i', 'o', 's', 'u', 'c', 'g', 'i', 'o', 's', 'u', '-', '', '', '');
    $text = str_replace($search, $replace, $text);
    return strtolower($text);
}


?>
