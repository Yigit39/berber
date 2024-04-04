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

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
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

    .gallery {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
}

.box {
  width: calc(33.33% - 20px); /* Üç sütun için genişlik ayarı */
  margin-bottom: 20px;
  position: relative;
  box-sizing: border-box;
}

.img-box {
  overflow: hidden;
  position: relative;
}

.img-box img {
  width: 100%;
  height: auto;
  transition: transform 0.3s ease;
}

.img-box:hover img {
  transform: scale(1.1);
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

  <section class="food_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Galeri</h2>
    </div>

    <div class="row mt-2">
      <div class="col-md-4 mb-3">
        <a href="galeri.php" class="text-decoration-none text-dark">
          <div class="img-box gallery-item resim">
            <img src="./images/galeri-menu/1.png" alt="asd" class="img-fluid">
          </div>
        </a>
        <h3 class="text-center mt-2">Resimler</h3>
      </div>

      <div class="col-md-4 mb-3">
        <a href="video.php" class="text-decoration-none text-dark">
          <div class="img-box gallery-item resim">
            <img src="./images/galeri-menu/2.png" alt="asd" class="img-fluid">
          </div>
        </a>
        <h3 class="text-center mt-2">Videolar</h3>
      </div>

      <div class="col-md-4 mb-3">
        <a href="salon.php" class="text-decoration-none text-dark">
          <div class="img-box gallery-item resim">
            <img src="./images/galeri-menu/3.png" alt="asd" class="img-fluid">
          </div>
          <h3 class="text-center mt-2">Salonumuz</h3>
        </a>
      </div>
      <!-- Diğer resimler için aynı yapıyı tekrarlayabilirsiniz -->
    </div>
  </div>
</section>




  <!-- end food section -->

  <!-- footer section -->
  <?php include 'social-media.php'; ?>

  <!-- end client section -->

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

  <!-- Büyütme için modal -->
  <div id="myModal" class="modal" onclick="closeModal()">
    <div class="modal-content" id="modalContent">
      <span onclick="closeModal()" class="closeBtn">&times;</span>
      <img id="modalImg" src="" alt="" style="display: none; max-width: 90%; height: auto;">
      <video id="modalVideo" controls style="display: none; max-width: 90%; height: auto;"></video>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Fancybox JavaScript dosyası -->
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

  <!-- End Google Map -->

  <script>
    $(document).ready(function() {
      $('[data-fancybox="gallery"]').fancybox({
        // Özelleştirme seçenekleri buraya eklenebilir
      });
    });
  </script>

</body>

</html>