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

  <style>.social-buttons {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
    }

    .social-buttons a {
      display: block;
      margin-bottom: 10px;
    }</style>

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
        <h2>
          Galeri
        </h2>
      </div>

      <div class="filters-content">
        <div class="row grid">
          <?php
          $folder = 'images/galeri'; // Klasör yolunu belirt
          $files = scandir($folder);
          foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
              $file_path = $folder . '/' . $file;
              $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
          ?>
              <div class="col-sm-6 col-lg-4 all pizza">
                <div class="box">
                  <a href="<?php echo $file_path; ?>" data-fancybox="gallery">
                    <div>
                      <div class="img-box gallery-item resim">
                        <?php if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) : ?>


                          <img src="<?php echo $file_path; ?>" alt="<?php echo $file; ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <div id="myModal" class="modal" onclick="closeModal()">
    <div class="modal-content" id="modalContent">
      <span onclick="closeModal()" class="closeBtn">&times;</span>
      <img id="modalImg" src="" alt="" style="display: none; max-width: 90%; height: auto;">
      <video id="modalVideo" controls style="display: none; max-width: 90%; height: auto;"></video>
    </div>
  </div>

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