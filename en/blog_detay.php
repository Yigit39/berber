<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="" />

    <title>CS Saç Kaynak Merkezi</title>

  <link rel="icon" type="image/ico" href="images/sekme.ico">

    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <style>
        .social-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .social-buttons a {
            display: block;
            margin-bottom: 10px;
        }

        .card-img-top {
            width: 300px;
            /* Belirli bir genişlik */
            height: auto;
            /* Belirli bir yükseklik */
            /* İçeriği kırpılmadan sığdırır */
        }
    </style>


    <style>
        .navbar-nav {
            background-color: transparent !important;
            /* Menü arka planını saydam (transparent) yapar */
            backdrop-filter: none;
            /* Gerekirse arka planı daha da saydamlaştırabilir */
            box-shadow: none;
            /* Gerekirse menüyü çevreleyen gölgeyi kaldırır */
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
            /* Metin rengi */
            /* Burada istediğiniz diğer metin stillerini ayarlayabilirsiniz */
        }

        .randevu-al {
            position: fixed;
            bottom: 20px;
            /* İstediğiniz yükseklik değeri */
            right: 20px;
            /* İstediğiniz sağdan uzaklık değeri */
            z-index: 9999;
            /* Gerekirse, diğer elementlerin üzerine gelmesini sağlamak için z-index değeri */
        }

        .social-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .social-buttons a {
            display: block;
            margin-bottom: 10px;
        }

        body {
            background-image: url('images/contact_br.png');
            /* Diğer stil ayarları */
        }
    </style>
</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
            <img src="images/hero-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <?php include 'navbar.php'; ?>
        <!-- end header section -->
    </div>

    <div class="container">
  <div class="row">
    <?php
    require_once 'admin/config.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $blog_id = $_GET['id'];

        $query = "SELECT * FROM blog_posts WHERE id = $blog_id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo '<div class="col-md-10 offset-md-1">';
            echo '<div class="card mb-3">';
            echo '<div class="row g-0">';
            echo '<div class="col-md-5">';
            echo '<img src="admin/' . $row['image'] . '" class="img-fluid rounded-start" alt="Görsel" style="height: 300px;">';
            echo '</div>';
            echo '<div class="col-md-7">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title" style="font-size: 2em;">' . $row['title'] . '</h5>';
            echo '<p class="card-text" style="font-size: 1.2em;">' . $row['content'] . '</p>';
            echo '<p class="card-text"><small class="text-muted" style="font-size: 0.8em;">Tarih: ' . $row['date'] . '</small></p>';
            echo '</div></div></div></div></div>';
        } else {
            echo '<p class="alert alert-info">Belirtilen ID ile blog gönderisi bulunamadı.</p>';
        }
    } else {
        echo '<p class="alert alert-info">ID belirtilmedi.</p>';
    }
    ?>
  </div>
</div>

    <?php include 'social-media.php'; ?>

    <!-- end food section -->

    <!-- footer section -->
    <?php include 'footer.php'; ?>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>