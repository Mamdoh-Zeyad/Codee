<!--Request Header-->
<?php
  require_once('../includes/partials/header.php');
  include("../includes/functions.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div class="header">
  <!-- Navbaer -->
  <nav class="navbar my_navbar fixed-top">
      <div class="container">
          <a class="navbar-brand" href="home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
          <button class="my_btn1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class=" text-center sidebar_body">
              <div class="my_nav">
                <a class="nav-link active" aria-current="page" href="#home"><i class="fa-solid fa-house fa-2x"></i></a>
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
              </div>
              <div class="my_nav">
                <a class="nav-link active" aria-current="page" href="#About"><i class="fa-solid fa-address-card fa-2x"></i></a>
                <a class="nav-link active" aria-current="page" href="#About">About</a>
              </div>
              <div class="my_nav">
                <a class="nav-link active" aria-current="page" href="#OurServices"><i class="fa-solid fa-server fa-2x"></i></a>
                <a class="nav-link active" aria-current="page" href="#OurServices">Our Services</a>
              </div>
              <div class="my_nav">
                <a class="nav-link active" aria-current="page" href="#Workflow"><i class="fa-solid fa-stairs fa-2x"></i></a>
                <a class="nav-link active" aria-current="page" href="#Workflow">Workflow</a>
              </div>
              <div class="my_nav">
                <a href="https://wa.me/966545219170" class="nav-link" target="_blank"><i class="fa-brands fa-whatsapp fa-2x"></i></a>
                <a class="nav-link active" aria-current="page" target="_blank" href="https://wa.me/966545219170">Contact</a>
              </div>
              <div class="my_nav">
                <a class="nav-link active" aria-current="page" href="login.php"><i class="fa-solid fa-right-to-bracket fa-2x"></i></a>
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </div>
              <div class="my_nav_toggle">
                <label class="toggle">
                    <input type="checkbox" id="modeToggle" onclick="toggleMode()">
                    <span class="slider"></span>
                </label>
              </div>
            </div>
          </div>
      </div>
  </nav>
  <div class="header_caption d-md-block" id="home">
    <img src="../assets/img/codee-logo - Copy.png" alt="Logo" class="caption_logo">
    <p class="header_caption_font1">WE <span class="header_caption_blueFont">PROGRAM</span> THINGS</p> 
    <p class="header_lead">
      CODEE offers an integrated environment for all programming needs.
    </p>
    <p class="header_lead">
      CODEE provides a unique experience for all. 
    </p>
    <div class="text-center">
        <button class="my_btn3" type="submit"><a href="login.php">Login</a></button>
        <button class="my_btn3" type="submit"><a href="signup.php">Sign Up</a></button>
    </div>
  </div>
</div>

<div class="About py-5 animate__animated">
  <div class="container">
    <h3 class="sections_headers" id="About">About</h3>
    <hr class="my_hr">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left Section -->
        <div class="col-md-4 slider-text animate__animated animate__fadeInLeft">
        <div class=" h-100 text-center pt-4">
          <i class="fa-solid fa-calendar-days fa-3x my_IconeColor2"></i>
          <div class="card-body p-2">
            <h4 class="card-title p-1">Launch</h4>
            <p class="card-text p-1">Codee was launched in March 2024 by developers Mamdoh Zeyad and Ahmed Sabbagh.</p>
          </div>
        </div>
        </div>
        <!-- center Section -->
        <div class="col-md-4 slider-text animate__animated animate__fadeInUp">
        <div class=" h-100 text-center pt-4 ">
          <i class="fa-solid fa-trophy fa-3x my_IconeColor"></i>
          <div class="card-body p-2">
            <h4 class="card-title p-1">Achievements</h4>
            <p class="card-text p-1">
              The website has been awarded first place for the best poster in 
              Software Engineering field in UOJ.
            </p>
          </div>
        </div>
        </div>
        <!-- Right Section -->
        <div class="col-md-4 slider-text animate__animated animate__fadeInRight">
          <div class=" h-100 text-center pt-4">
            <i class="fa-solid fa-hourglass-start fa-3x my_IconeColor2"></i>
            <div class="card-body p-2">
              <h4 class="card-title p-1">Aspirations</h4>
              <p class="card-text p-1">
                The aim of a website is to become a popular platform around the world!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Our Services -->
<div class="About py-5">
  <div class="container">
    <h3 class="sections_headers" id="OurServices">Our Services</h3>
      <hr class="my_hr">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left Section -->
        <div class="col-md-4 slider-text animate__animated animate__fadeInLeft">
        <div class="text-center">
          <img src="../assets/img/chatting.png" class="img_size pt-4" alt="...">
          <div class="card-body p-2">
            <h5 class="card-title p-1">Direct chatting</h5>
            <p class="card-text p-1">Direct communication for swift resolution of programming issues.</p>
          </div>
        </div>
      </div>
        <!-- center Section -->
        <div class="col-md-4 slider-text animate__animated animate__fadeInUp">
        <div class="text-center">
          <img src="../assets/img/Consultant.png" class="img_size pt-4" alt="...">
          <div class="card-body p-2">
            <h5 class="card-title p-1">Consultant</h5>
            <p class="card-text p-1">Consultants direct each coding issue to a skilled developer for resolution.</p>
          </div>
        </div>
      </div>
        <!-- Right Section -->
        <div class="col-md-4 slider-text animate__animated animate__fadeInRight">
        <div class="text-center">
          <img src="../assets/img/environments.png" class="img_size pt-4" alt="...">
          <div class="card-body p-2">
            <h5 class="card-title p-1">IDE & AI-talking bot </h5>
            <p class="card-text p-1">Our platform offers diverse, user-friendly coding environments.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Register shortcut -->
<figure class="my_figure text-center p-4 card_shadow">
  <blockquote class="blockquote">
  <pre>Dedicated developers seriously refine the software to deliver an effortless 
    experience for users. This sentence confirms the importance of attention 
    to detail and the commitment to quality that developers have.</pre>
  </blockquote>
  <div class="d-flex justify-content-center">
    <button class="my_btn1" type="submit"><a href="login.php">Login</a></button>
    <button class="my_btn1" type="submit"><a href="signup.php">Sign Up</a></button>
  </div>
</figure>

<!-- Workflow -->
<div class="About py-5 animate__animated">
  <div class="container">
    <h3 class="sections_headers" id="Workflow">Workflow</h3>
    <hr class="my_hr">
    <div class="container">
      <div class="row align-items-center My-font-family">
        <!-- Left Section -->
        <div class="col-md-3 slider-text animate__animated animate__fadeInUp">
        <div class="text-center">
              <i class="my_IconeColor fa-regular fa-address-card fa-3x  p-2"></i>
              <div class="card-body text-center p-2">
                  <h5 class="card-title p-1">Register an Account</h5>
                  <p class="my_textCardColor card-text">Users promptly navigate to the login page with valid personal details.</p>
                  <input type="text" class="my_numberInsideCard" value="1" readonly>
              </div>
          </div>
      </div>
      <!-- center one Section -->
      <div class="col-md-3 slider-text animate__animated animate__fadeInUp">
        <div class="text-center">
              <i class="my_IconeColor2 fa-solid fa-user fa-3x p-2"></i>
              <div class="card-body text-center p-2">
                  <h5 class="card-title p-1">Login</h5>
                  <p class="my_textCardColor card-text">Upon entering valid credentials, permissions display based on user type.</p>
                  <input type="text" class="my_numberInsideCard2" value="2" readonly>
              </div>
          </div>
      </div>
      <!-- center two Section -->
      <div class="col-md-3 slider-text animate__animated animate__fadeInUp">
        <div class=" text-center ">
            <i class="my_IconeColor fa-solid fa-list fa-3x p-2"></i>
            <div class="card-body text-center p-2">
                <h5 class="card-title p-1">Browse a Catalog</h5>
                <p class="my_textCardColor card-text"> View available Devs and consultants; choose based on specific needs.</p>
                <input type="text" class="my_numberInsideCard" value="3" readonly>
            </div>
        </div>
      </div>
      <!-- Right Section -->
      <div class="col-md-3 slider-text animate__animated animate__fadeInUp">
        <div class=" text-center ">
            <i class="my_IconeColor2 fa-solid fa-comments fa-3x p-2"></i>
            <div class="card-body text-center p-2">
                <h5 class="card-title p-1">Chat Directly</h5>
                <p class="my_textCardColor card-text">The Users communicate to resolve issues or address unique needs</p>
                <input type="text" class="my_numberInsideCard2" value="4" readonly>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
        
<!-- Contact Us -->
<!-- <h3 class="text-center space_section" id="ContactUs"><strong>Contact Us</strong></h3>
<div class="container-fluid About pb-4">
  <div class="row justify-content-center pt-4">
    <div class="col-md-4">
      <form id="contact_form" class="needs-validation" method="post" action="../controllers/contact_us_controller.php" novalidate>
        <div class="mb-3">
          <label for="validationCustom01" class="form-label">Full Name<span class="red_star">*</span></label>
          <input type="text" class="form-control form-control-sm" id="validationCustom01" placeholder="Your full name" name="full_name" required>
          <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="mb-3">
          <label for="validationCustom02" class="form-label">Email<span class="red_star">*</span></label>
          <input type="email" class="form-control form-control-sm" id="validationCustom02" placeholder="example@domain.com" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
        </div>

        <div class="mb-3">
          <label for="validationCustom03" class="form-label">Phone Number<span class="red_star">*</span></label>
          <div class="input-group has-validation">
            <input type="text" class="form-control form-control-sm" id="validationCustom03" placeholder="00965xxxxxxxx" name="phone_number" pattern="[0-9]+" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="validationTextarea" class="form-label">Comments<span class="red_star">*</span></label>
          <textarea class="form-control form-control-sm" id="validationTextarea" placeholder="Start Writing..." rows="5" name="comments" required></textarea>
          <div class="invalid-feedback">Please enter a message in the comment section.</div>
        </div>

        <div class="text-center">
          <button class="my_btn1 w-50" type="submit">Send</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

<!-- Footer -->
<?php
  displayFooter();
?>

<!-- Top function -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-angles-up"></i></button>

<a href="https://wa.me/966545219170" class="whatsapp_icon_contianer" target="_blank">
  <i class="fa-brands fa-whatsapp whatsapp_icon"></i></a>

<!-- Scripts File -->
<script src="../assets/js/home.js"></script>
<script src="../assets/js/loader.js"></script>

<!--Request Footer-->
<?php
  require_once('../includes/partials/footer.php')
?>