<!DOCTYPE html>
<html>

<head>
    <title>Yeni Blog Yazısı Ekle</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../css/responsive.css" rel="stylesheet" />

    <script src="https://cdn.tiny.cloud/1/szj5eaz6ztsmkx3gx5z831agdn3u05zqijn0dqlte20bz84y/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',  // Biçimlendirme seçeneklerinin ekleneceği textarea etiketi
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | link image | forecolor backcolor',
            menubar: 'file edit view insert format tools table help'
        });
    </script>
</head>
<?php
session_start();
require_once 'functions.php';
require_once 'config.php';

// Klasör yolu
$upload_directory = "uploads/";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: admin_login.php");
        exit;
    }

// Klasör yoksa oluştur
if (!file_exists($upload_directory)) {
    mkdir($upload_directory, 0777, true); // 0777 izinleriyle klasör oluşturuluyor
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Resim yükleme işlemi
    $upload_directory = "uploads/";

    // Dosyanın adını al
    $imageName = cleanFileName($_FILES['image']['name']);
    
    // Dosya yolu
    $target_file = $upload_directory . $imageName;
    
    // Eğer klasör yoksa oluştur
    if (!file_exists($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }
    
    // Dosyanın geçici yolunu al
    $image_tmp = $_FILES['image']['tmp_name'];
    
    // Dosyayı hedef yola taşı
    if (move_uploaded_file($image_tmp, $target_file)) {
        // Dosya yükleme işlemi başarılı olduysa devam edin
        $image_path = $upload_directory . $imageName;
        $image_link = "http://" . $_SERVER['HTTP_HOST'] . "/" . $image_path;
    
        // Gönderiyi eklemek için fonksiyonu kullanın
        $title = $_POST['title'];
        $content = $_POST['content'];
    
        if (addNewBlogPost($title, $content, $image_path)) {
            echo "Yeni gönderi başarıyla eklendi!";
            // Başka bir işlem yapılabilir veya yönlendirme yapılabilir
        } else {
            echo "Gönderi eklenirken bir hata oluştu.";
        }
    } else {
        echo "Resim yüklenirken bir hata oluştu.";
    }

    header("Location: blog.php");
    exit; 
}
?>

<body>
    <div class="container mt-5">
        <h2>Yeni Blog Yazısı Ekle</h2>
        <form method="post" action="admin_add_post.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Başlık:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">İçerik:</label>
                <textarea class="form-control" id="content" name="content" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Resim:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Gönder</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

</html>