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


  <link rel="stylesheet" href="glightbox/dist/css/glightbox.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    /* Kapatma butonunun stilleri */
    .close {
      color: #fff;
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .video {
      position: relative;
      max-width: 100%;

      cursor: pointer;
    }

    .video video {
      width: 100%;
      height: auto;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      /* Tıklamaları engelle */
    }

    .video video:hover {
      transition: .2s linear;
      transform: scale(1.3);
    }

    .video .active {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      height: 80%;
      max-height: 1080px;
      width: auto;
      box-shadow: 0 0 0 100vh rgba(0, 0, 0, .7);
      z-index: 1;
    }

    .video .active:hover {
      transition: none;
      transform: translate(-50%, -50%) scale(1);
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
        <h2 style="margin-bottom: 2rem;">
          Videolar
        </h2>
      </div>

      <div id="videoModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <video controls id="modalVideo" width="640" height="360">
            <source src="" type="video/mp4">
            Tarayıcınız video desteği sağlamıyor.
          </video>
        </div>
      </div>

      <div class="filters-content">
        <div class="row grid">
          <?php
          $folder = 'images/videolar'; // Klasör yolunu belirt
          $folder2 = 'images/thumbnails';
          $files = scandir($folder);
          foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
              $file_path = $folder . '/' . $file;
              $file_path2 = $folder2 . '/' . $file;
              $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
              $file_path2 = $folder2 . '/' . pathinfo($file_path, PATHINFO_FILENAME) . '.jpg';
          ?>

              <div class="col-sm-6 col-lg-4 all pizza">
                <div class="box">
                <a href="<?php echo $file_path; ?>" class="glightbox">
                  <div>
                    <div class="img-box gallery-item video" onclick="openModal('<?php echo $file_path; ?>')">
                      <?php if (in_array($file_extension, ['mp4', 'avi', 'mov'])) : ?>
                          <img src="<?php echo $file_path2; ?>" alt="image" />
                        
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                </a>
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

  <script src="glightbox/dist/js/glightbox.min.js"></script>



  <script>
    var videos = document.querySelectorAll('video');

    document.addEventListener('click', function(event) {
      var isVideoClicked = event.target.tagName === 'VIDEO';
      var clickedVideo = event.target;

      var allVideosPaused = Array.from(videos).every(function(video) {
        return video.paused;
      });

      if (!isVideoClicked) {
        videos.forEach(function(video) {
          video.classList.remove('active');
        });
      }

      if (!isVideoClicked) {
        videos.forEach(function(video) {
          if (video !== clickedVideo) {
            video.pause();
          }
        });
      }
    });

    videos.forEach(function(video) {
      video.addEventListener('click', function(event) {
        var isVideoPaused = this.paused;

        if (!isVideoPaused) {
          this.pause();
        } else {
          videos.forEach(function(v) {
            if (v !== video && !v.paused) {
              v.pause();
              v.classList.remove('active');
            }
          });
          this.play();
          this.classList.add('active');
        }

        event.stopPropagation();
      });
    });

    const lightbox = GLightbox({
      selector: '.glightbox'
    });
  </script>

</body>

</html>