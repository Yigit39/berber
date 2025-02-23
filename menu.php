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
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title>CS Saç Kaynak Merkezi</title>

  <link rel="icon" type="image/ico" href="images/sekme.ico">

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

  <!-- food section -->

  <?php
  // Veritabanı bağlantısı burada olmalı
  require_once 'admin/config.php';


  // Blog yazılarını getir
  $query = "SELECT * FROM blog_posts";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    echo '<section class="food_section layout_padding">
        <div class="container">
            <div class="filters-content">
                <div class="row grid">';
    while ($row = $result->fetch_assoc()) {
      echo '';
      if (!empty($row["image"])) {
        $excerpt = substr($row["content"], 0, 30);
        if (strlen($row["content"]) > 30) {
          $excerpt .= '...';
        }
        $image_path = $row["image"];
        echo '<div class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                        <div class="img-box">
                            <img src="admin/' . $image_path . '" alt="">
                        </div>
                        <div class="detail-box text-center"> 
                            <h5>' . $row["title"] . '</h5> 
                            <p>' . $excerpt . '</p>
                            <div class="options">
                                <h6>' . $row["date"] . '</h6>
                                <button type="button" onclick="window.location.href = \'blog_detay.php?id=' . $row["id"] . '\'" class="btn btn-warning">İncele</button>
                            </div>
                        </div>
                    </div>
                </div>';
      }
    }
    echo '</div></div></div></section>';
  } else {
    echo "Henüz blog yazısı bulunmuyor.";
  } ?>

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