<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="../css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="container">
        <h2 class="text-center">Admin Panel</h2>
        <div class="text-center">
            <a href="admin_add_post.php" class="btn btn-primary">Yeni Blog Yazısı Ekle</a>
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-secondary mt-3">Admin Panele Dön</a>
        </div>
        <br>
        <?php
        // Veritabanı bağlantısı burada olmalı
        require_once 'config.php';

        // Oturum kontrolü
        session_start();
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header("Location: admin_login.php");
            exit;
        }

        // Blog yazılarını getir
        $query = "SELECT * FROM blog_posts";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo '<section class="food_section layout_padding">
                <div class="container">
                    <div class="row grid">';
            while ($row = $result->fetch_assoc()) {
                echo '';
                if (!empty($row["image"])) {
                    $excerpt = substr($row["content"], 0, 30);

                    // Eğer içerik 20 karakterden uzunsa, sonuna üç nokta ekleyelim
                    if (strlen($row["content"]) > 30) {
                        $excerpt .= '...';
                    }
                    $image_path = $row["image"];
                    echo '<div class="col-sm-6 col-lg-4 all pizza">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src=' . $image_path . ' alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>' . $row["title"] . '</h5>
                                        <p>' . $excerpt . '</p>
                                        <div class="options">
                                            <h6>' . $row["date"] . '</h6>
                                            <button onclick="window.location.href = \'edit_post.php?id=' . $row["id"] . '\'" type="button" class="btn btn-warning button-edit">Düzenle</button>
                                            <button onclick="window.location.href = \'delete_post.php?id=' . $row["id"] . '\'" type="button" class="btn btn-warning button-delete">Sil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
        } else {
            echo '<p class="text-center">Henüz blog yazısı bulunmuyor.</p>';
        }
        echo '</div></div></section>';
        ?>
        <br>
        
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- Other scripts... -->
</body>

</html>