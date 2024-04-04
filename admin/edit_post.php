<!DOCTYPE html>
<html>

<head>
    <title>Blog Gönderisi Düzenle</title>

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
            selector: 'textarea', // Biçimlendirme seçeneklerinin ekleneceği textarea etiketi
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | link image | forecolor backcolor',
            menubar: 'file edit view insert format tools table help'
        });
    </script>
</head>


<?php
session_start();
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: admin_login.php");
        exit;
    }

    // Eğer yeni bir fotoğraf yükleniyorsa
    if ($_FILES['image']['size'] > 0) {
        // Mevcut fotoğrafı silmek veya değiştirmek için gerekli işlemler
        // ...

        // Yeni fotoğrafı yükleme işlemi
        $imageName = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $upload_directory = "uploads/";
        $target_file = "uploads/" . $imageName;
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0777, true);
        }

        if (move_uploaded_file($image_tmp, $target_file)) {
            // Fotoğraf yükleme işlemi başarılıysa devam edin
            $image_path = "http://" . $_SERVER['HTTP_HOST'] . "/" . $target_file;

            // Gönderiyi güncelle, resim yolu da dahil edilmiş olarak
            $image_path = $upload_directory . $imageName;
            if (editBlogPost($post_id, $title, $content, $image_path)) {
                echo "Gönderi başarıyla güncellendi!";
                header("Location: blog.php");
                exit;
                // Başka bir işlem yapılabilir veya yönlendirme yapılabilir
            } else {
                echo "Gönderi güncellenirken bir hata oluştu.";
            }
        } else {
            echo "Fotoğraf yüklenirken bir hata oluştu.";
        }
    } else {
        $post = getBlogPostById($post_id);
        // Eğer yeni bir fotoğraf yüklenmediyse, sadece metin içeriği güncelle
        if (editBlogPost($post_id, $title, $content, $post['image'])) {
            header("Location: blog.php");
            exit;
            // Başka bir işlem yapılabilir veya yönlendirme yapılabilir
        } else {
            echo "Gönderi güncellenirken bir hata oluştu.";
        }
    }
}
?>


<?php
// Düzenlenecek gönderinin bilgilerini alalım
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $post = getBlogPostById($post_id);
} else {
    echo "ID parametresi eksik.";
}

if ($post) {
?>





    <div class="container mt-5">
        <h2>Blog Gönderisi Düzenle</h2>
        <form method="post" action="edit_post.php" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <div class="form-group">
                <label for="title">Başlık:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>">
            </div>
            <div class="form-group">
                <label for="content">İçerik:</label>
                <textarea class="form-control" id="content" name="content" rows="6"><?php echo $post['content']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Yeni Fotoğraf:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <div class="text-center">
                <a href="index.php" class="btn btn-secondary mt-3">Admin Panele Dön</a>
            </div>
        </form>
    </div>
<?php
} else {
    echo "Gönderi bulunamadı.";
}
?>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>