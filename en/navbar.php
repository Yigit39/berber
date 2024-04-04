<style>
  #test {
    box-sizing: content-box !important;
    padding-left: 16%;

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

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul id="test" class="navbar-nav mx-auto">
              <li class="nav-item  <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Ana Sayfa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'menu.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="menu.php">Blog</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="about.php">Hakkımızda</a>
                </li>

                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'galeri.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="galeri-menu.php">Galeri</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="contact.php">İletişim</a>
                </li>

              </ul>
              
            </div>
          </nav>
        </div>
      </header>