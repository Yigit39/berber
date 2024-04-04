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

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact_info">
            <h2>Bize Ulaşın</h2>
            <p>Adres: Söğütlüçeşme Caddesi Vişne Sokak Mustafa Oragaz İş Hanı No:5/1 Kadıköy / İstanbul</p>
            <p>Telefon: 0216 405 14 04</p>
            <p>Telefon: 0535 430 08 27</p>
            <p>E-posta: kadikoysackaynak@gmail.com</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form_container">
            <h2>Bize e-posta yollayın.</h2>
            <form action="mail_handler.php" method="POST">
            <div>
                <input type="text" name="fullname" class="form-control" placeholder="Ad-Soyad" required />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email Adresi" required />
              </div>
              <div>
                <input type="text" name="subject" class="form-control" placeholder="Konusu" required />
              </div>
              <div>
                <textarea name="message" class="form-control" placeholder="Mesaj" rows="5" required></textarea>
              </div>
              <div class="btn_box">
                <button type="submit">
                  Gönder
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48184.84720443659!2d29.030738!3d40.99126900000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab86f07416c35%3A0x686f2dac75cac1fa!2zQ1MgS2FkxLFrw7Z5IFNhw6cgS2F5bmFrIE1lcmtlemk!5e0!3m2!1str!2sus!4v1701466537956!5m2!1str!2sus" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <?php include 'social-media.php'; ?>

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