<!DOCTYPE html>
<html lang="en">

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

  <title>Vpk Digital Art</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container d-block">
          <div class="main_nav_menu">
            <div class="fk_width">
              <div class="custom_menu-btn">
                <button onclick="openNav()">
                  <span class="s-1"> </span>
                  <span class="s-2"> </span>
                  <span class="s-3"> </span>
                </button>
              </div>
              <div id="myNav" class="overlay">
                <div class="overlay-content">
                  <a class="" href="index.php">Home <span class="sr-only">(current)</span></a>
                  <a class="" href="about.php">About </a>
                  <a class="" href="gallery.php">Gallery </a>
                  <a class="" href="blog.php">Blog </a>
                  <a class="" href="testimonial.php">Testimonial </a>
                </div>
              </div>
            </div>
            <a class="navbar-brand" href="index.php">
              <span>
                Vpk Digital Art
              </span>
            </a>
            <div class="user_option">
              <a href="#">
                login
              </a>
              <form class="form-inline ">
                <button class="btn  nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <div class="layout_padding-bottom">

    <!-- blog section -->

    <section class="blog_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box">
              <div class="heading_container">
                <h2>Login</h2>
                    <form method="post" action="login_process.php">
                        <label for="username">Username:</label>
                        <input type="text" name="username" required><br><br>
                        <label for="password">Password: </label>
                        <input type="password" name="password" required><br><br>
                        <input type="submit" value="Login">
                    </form>
                <a href="index.php">
                  Home
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="blog_container">
        <div class="blog_bg">
          <img src="images/gallery-bg.png" alt="" />
        </div>
        <div class="container">
          <div class="blog_box">
            <div class="row">
              <div class="col-md-6">
                <div class="box b1">
                  <div class="img-box">
                    <img src="images/blog1.jpg" alt="" />
                  </div>
                  <div class="blog-detail">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end blog section -->
  </div>

  <!-- info section -->

  <section class="info_section ">
    <div class="info_container layout_padding-top">
      <div class="container">
        <div class="heading_container">
          <h2>
            Contact Us
          </h2>
        </div>
        <div class="info_main">
          <div class="row">
            <div class="col-md-4 col-lg-3">
              <div class="info_contact ">
                <a href="#" class="link-box">
                  <div class="img-box">
                    <img src="images/location.png" alt="" />
                  </div>
                  <div class="detail-box">
                    <h6>
                      Location
                    </h6>
                  </div>
                </a>
                <a href="#" class="link-box">
                  <div class="img-box">
                    <img src="images/mail.png" alt="" />
                  </div>
                  <div class="detail-box">
                    <h6>
                      47@vpk.org.in
                    </h6>
                  </div>
                </a>
                <a href="#" class="link-box">
                  <div class="img-box">
                    <img src="images/call.png" alt="" />
                  </div>
                  <div class="detail-box">
                    <h6>
                      Call +91 9400381736
                    </h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-2 col-lg-3">
              <div class="info_link-box">
                <ul>
                  <li class=" active">
                    <a class="" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="">
                    <a class="" href="about.php">About </a>
                  </li>
                  <li class="">
                    <a class="" href="gallery.php">Gallery </a>
                  </li>
                  <li class="">
                    <a class="" href="blog.php">Blog </a>
                  </li>
                  <li class="">
                    <a class="" href="testimonial.php">Testimonial </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="social_box">
                <a href="#">
                  <img src="images/facebook.png" alt="" />
                </a>
                <a href="#">
                  <img src="images/twitter.png" alt="" />
                </a>
                <a href="#">
                  <img src="images/linkedin.png" alt="" />
                </a>
                <a href="#">
                  <img src="images/instagram.png" alt="" />
                </a>
                <a href="#">
                  <img src="images/youtube.png" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section ">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved. &copy;Vpk Digital Art 
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
