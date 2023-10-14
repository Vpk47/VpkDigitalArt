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

  <title>Request Form</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href=" css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
          h2 {
              text-align: center;
          }

          form {
              max-width: 400px;
              margin: 0 auto;
          }

          label {
              display: block;
              margin-bottom: 5px;
          }

          input[type="text"],
          input[type="email"],
          textarea {
              width: 100%;
              padding: 10px;
              margin-bottom: 15px;
              border: 1px solid #ccc;
              border-radius: 3px;
          }

          input[type="submit"] {
              background-color: #007BFF;
              color: #fff;
              padding: 10px 20px;
              border: none;
              border-radius: 3px;
              cursor: pointer;
          }
      </style>
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

  <div class="layout_padding">
    <!-- about section -->

    <section class="about_section layout_padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box">
              <div class="heading_container">
                    <h2>Request Quote </h2>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $recipient = "47@stage.vpk.org.in"; // Replace with your email address

                        $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
                        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                        $message = htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');

                        $subject = "New Request from $name";
                        $headers = "From: $email";

                        $success = mail($recipient, $subject, $message, $headers);

                        if ($success) {
                            echo "Your request has been sent successfully.";
                        } else {
                            echo "There was an error sending your request.";
                        }
                    } else {
                        echo '
                        <form action="' . htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') . '" method="post">
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>

                            <label for="email">Email:</label>
                            <input type="email" name="email" required>

                            <label for="message">Request:</label>
                            <textarea name="message" rows="4" required></textarea>

                            <input type="submit" value="Submit Request">
                        </form>
                        ';
                    }
                    ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="img-box">
        <div class="play_btn">
          <a href="#">
            <img src="images/play.png" alt="" />
          </a>
        </div>
        <img src="images/about-img.png" class="about-img" alt="" />
      </div>
    </section>

    <!-- end about section -->
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
        &copy; <span id="displayYear"></span> All Rights Reserved. ©Vpk Digital Art 
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