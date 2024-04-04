<style>
  #test {
  white-space: nowrap; /* Uzun bağlantıları tek satırda tutmak için */
}

  .language-selector {
    position: absolute;
    top: 0;
    right: 0;
    margin-top: 20px;
    margin-left: 40px;
    /* Uygun bir boşluk bırakmak için */
  }

  .language-selector a {
    margin-left: 20px;
    /* Dil seçenekleri arasındaki boşluk */
    text-decoration: none;
    color: #fff;
  }

  .language-selector a:hover {
    color: #555;
  }
</style>

<header class="header_section">
  <div class="bg-box">
    <img src="images/home/menu.png" alt="" />
  </div>
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="index.php">
        <img src="images/home/logo.png" alt="Kuaförünüzün Adı" />
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="test" class="navbar-nav mx-auto">
          <li class="nav-item  <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Ana Sayfa <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="about.php">Hakkımızda</a>
          </li>
          <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'menu.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="menu.php">Blog</a>
          </li>


          <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'galeri.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="galeri-menu.php">GALERİ</a>
          </li>
          <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="contact.php">İLETİŞİM</a>
          </li>

          <div class="ml-lg-2 mt-2 mt-lg-0" style="margin-left: 4rem !important;"> <!-- Bootstrap Grid sistemini kullanarak boşluk bırakma -->
          <span>
            <div class="translate" id="google_translate_element"></div>
            <script type="text/javascript">
              function google_Translate_ElementInit() {
                new google.translate.TranslateElement({
                  pageLanguage: 'tr'
                }, 'google_translate_element');
              }
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=google_Translate_ElementInit"> </script>
          </span>
        </div>
        </ul>


      </div>


    </nav>
  </div>
</header>