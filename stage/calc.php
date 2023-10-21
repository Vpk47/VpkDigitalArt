<?php
$showModal = false;
$results = "";

if (isset($_POST['calculate_btn'])) {
    $showModal = true;

    // Get form data
    $energy_consumption = floatval($_POST['energy_consumption']);
    $solar_panel_efficiency = 0.9;
    $sunlight_hours = 5;

    // Calculate daily solar power generation
    $daily_solar_power = ($energy_consumption / (30 * $sunlight_hours * $solar_panel_efficiency));

    // Calculate monthly solar power generation
    $monthly_solar_power_generation = $energy_consumption;

    // Calculate yearly solar power generation
    $yearly_solar_power_generation = $monthly_solar_power_generation * 12;

    $solar_capacity = $daily_solar_power;
    $total_cost = $solar_capacity * 70000;
    $capital_subsidy = $total_cost * 0.3;
    $Energy_savings = $solar_capacity * 5 * 300 * 4;
    $daily_solar_power_generation = $solar_capacity * 5;

    // Store the results in a variable
    $results .= '<table class="table">';
    $results .= '<tr><td>Estimated Solar Power Capacity:</td><td>' . round($daily_solar_power, 2) . ' kW</td></tr>';
    $results .= '<tr><td>Estimated Solar Power Generation (Daily):</td><td>' . round($daily_solar_power_generation, 2) . ' kWh</td></tr>';
    $results .= '<tr><td>Estimated Solar Power Cost:</td><td>' . round($total_cost, 0) . ' Rs</td></tr>';
    $results .= '<tr><td>Estimated Capital Subsidy:</td><td>' . round($capital_subsidy, 0) . ' Rs</td></tr>';
    $results .= '<tr><td>Estimated Energy Savings (Yearly):</td><td>' . round($Energy_savings, 0) . ' Rs</td></tr>';
    $results .= '</table>';
}
?>


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

  <title>Solar Calculator</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href=" css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
        .custom-modal .modal-body {
            background-color: black;
            color: white;
        }
        .custom-modal .close {
            color: white;
        }
        .custom-modal .close:hover {
            color: #aaa;
        }
    </style>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #ccc;
        }
    </style>

</head>

<body>
    <!-- Header Section (You can use your website's header) -->
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
                  <a class="" href="login.php">Login </a>
                  <a class="" href="about.php">About </a>
                  <a class="" href="gallery.php">Gallery </a>
                  <a class="" href="blog.php">Blog </a>
                  <a class="" href="testimonial.php">Testimonial </a>
                  <a class="" href="calc.php">Solar Calculator</a>
                </div>
              </div>
            </div>
            <a class="navbar-brand" href="index.php">
              <span>
                Vpk Digital Art
              </span>
            </a>
            <div class="user_option">
              <a href="login.php">
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
    
    

    <!-- Main Content Section -->
   
    <div class="layout_padding-bottom">
        <section class="solar_calculator_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="calculator_box">
                            <h2>Solar Calculator</h2>
                            <form id="solar_calculator_form" method="post" action="">
                                 <div class="form-group">
                                    <label for="energy_consumption">Energy Consumption (kWh/Month)</label>
                                    <input type="number" class="form-control" id="energy_consumption" name="energy_consumption" required>
                                </div>
                                <div class="form-group">
                                    <label for="solar_panel_installation_location">Solar Panel Installation Pincode</label>
                                    <input type="number" class="form-control" id="solar_panel_installation_location" name="solar_panel_installation_location" required>
                                </div>
                                <button type="submit" class="btn btn-primary" id="calculate_btn" name="calculate_btn">Calculate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Bootstrap Modal -->
    <div class="container">
            <?php if ($showModal): ?>
                <h3>Solar Calculator Results</h3>
                <?php echo $results; ?>
            <?php endif; ?>
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
                  <li class=" ">
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
    <script>
    <?php if ($showModal): ?>
        // Show the modal
        $('#resultsModal').modal('show');
    <?php endif; ?>
</script>


</body>

</html>
