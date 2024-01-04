<!--Request Header-->
<?php
  require_once('../includes/partials/header.php')
?>

<!--Home Page Header-->
<nav class="navbar navbar-expand-lg my_navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                <a class="nav-link my_nav" aria-current="page" href="#About">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#OurServices">Our Services</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#Workflow">Workflow</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#ContactUs">Contact Us</a>
                </li>
            </ul>
            <div class="text-center">
                <button class="my_btn1" type="submit"><a href="login.php">Login</a></button>
                <button class="my_btn1" type="submit"><a href="signup.php">Sign Up</a></button>
            </div>
        </div>
    </div>
</nav>

<!--Start Home Page Slider-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/img/ToIncreaseYourProgramming2.jpg" class="d-block w-100 img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>CODEE: Leading Solutions in Programming</h5>
        <p class="lead">CODEE provides a unique experience for programmers and users, offering an integrated environment for all programming needs. Our services include a consultant guiding users to the right programmer and the ability to book appointments for direct communication.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/Second-slider.jpg" class="d-block w-100 img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>CODEE: Your Partner for Forward-Thinking Programming Solutions</h5>
        <p class="lead">CODEE: Revolutionizing the programming landscape, we facilitate tailored connections between developers and clients, offering personalized consultations.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/keyboard.jpg" class="d-block w-100 img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>CODEE: Your Gateway to Top-Tier Programming Solutions</h5>
        <p class="lead">CODEE offers an unparalleled experience for programmers and clients alike, serving as the gateway to premium programming solutions. Our comprehensive services feature expert consultations guiding clients to the right programmer.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--Start Home Page About-->
<h3 class="text-center space_section" id="About"><strong>About</strong></h3>
<div class="About py-5 text-center">
  <div class="container">
    <div class="row align-items-center">
       <!-- Left Section -->
      <div class="col-md-4 slider-text">
      <div class="card h-100 text-center pt-4">
        <i class="fa-solid fa-calendar-days fa-5x my_IconeColor2"></i>
        <div class="card-body">
          <h4 class="card-title">Launch</h4>
          <p class="card-text">Codee was launched in March 2024 by developers Mamdoh Zeyad and Ahmed Sabbagh.</p>
        </div>
      </div>
      </div>
       <!-- center Section -->
       <div class="col-md-4 slider-text">
       <div class="card h-100 text-center pt-4">
        <i class="fa-solid fa-trophy fa-5x my_IconeColor"></i>
        <div class="card-body">
          <h4 class="card-title">Achievements</h4>
          <p class="card-text">The website has been awarded first place for the best poster in Software Engineering field in UOJ.</p>
        </div>
      </div>
      </div>
      <!-- Right Section -->
      <div class="col-md-4 slider-text">
       <div class="card h-100 text-center pt-4">
        <i class="fa-solid fa-hourglass-start fa-5x my_IconeColor2"></i>
        <div class="card-body">
          <h4 class="card-title">Aspirations</h4>
          <p class="card-text">The aim of a website is to become a popular platform not only in the Middle East but also around the world!</p>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Start Home Page Our Services -->
<h3 class="text-center space_section" id="OurServices"><strong>Our Services</strong></h3>
<div class="About py-5 text-center">
  <div class="container">
    <div class="row align-items-center">
       <!-- Left Section -->
      <div class="col-md-4 slider-text">
      <div class="card text-center" style="max-width: 400px; margin: auto;">
        <img src="../assets/img/chatting.png" class="card-img-top pt-4" alt="...">
        <div class="card-body">
          <h5 class="card-title">Direct chatting</h5>
          <p class="card-text">Direct communication for swift resolution of programming issues.</p>
        </div>
      </div>
    </div>
       <!-- center Section -->
       <div class="col-md-4 slider-text">
       <div class="card text-center" style="max-width: 400px; margin: auto;">
        <img src="../assets/img/Consultant.png" class="card-img-top pt-4" alt="...">
        <div class="card-body">
          <h5 class="card-title">Consultant</h5>
          <p class="card-text">Consultants direct each coding issue to a skilled developer for resolution.</p>
        </div>
      </div>
    </div>
      <!-- Right Section -->
      <div class="col-md-4 slider-text">
      <div class="card text-center" style="max-width: 400px; margin: auto;">
        <img src="../assets/img/environments.png" class="card-img-top pt-4" alt="...">
        <div class="card-body">
          <h5 class="card-title">IDE & AI-talking bot </h5>
          <p class="card-text">Our platform offers diverse, user-friendly coding environments.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Start Home Page register shortcut-->
<figure class="my_figure text-center p-4">
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

<!-- Start Home Page Workflow-->
<h3 class="text-center space_section" id="Workflow"><strong>Work Flow</strong></h3>
<div class="About pb-5 ">
  <div class="container">
  <div class="card-body" >
    <h2 class="my_text card-title"><strong>Work Flow</strong></h5>
    <div>
      <hr class="my_hr">
    </div>
    <h6 class="card-text mb-4"><strong>Will help you to gain knowledge about the sequence of 
                          activities for each actor during the use of the system. 
                          The following are our proposed activity diagrams:</strong></h6></div>
    <div class="row align-items-center">
       <!-- Left Section -->
      <div class="col-md-3 slider-text">
      <div class="card text-center">
            <i class="my_IconeColor fa-regular fa-address-card card-img-top pt-3" style="font-size: 5rem;"></i>
            <div class="card-body text-center">
                <h5 class="card-title">The User Will Register His Account</h5>
                <p class="my_textCardColor card-text">Users promptly navigate to the login page with valid personal details.</p>
                <input type="text" class="my_numberInsideCard" value="1" readonly>
            </div>
        </div>
    </div>
    <!-- center one Section -->
    <div class="col-md-3 slider-text">
       <div class="card text-center">
            <i class="my_IconeColor2 fa-solid fa-user card-img-top pt-3" style="font-size: 5rem;"></i>
            <div class="card-body text-center">
                <h5 class="card-title">The User Will Log In To Their Account</h5>
                <p class="my_textCardColor card-text">Upon entering valid credentials, permissions display based on user type.</p>
                <input type="text" class="my_numberInsideCard2" value="2" readonly>
            </div>
        </div>
    </div>
    <!-- center two Section -->
    <div class="col-md-3 slider-text">
    <div class="card text-center">
            <i class="my_IconeColor fa-solid fa-list card-img-top pt-3" style="font-size: 5rem;"></i>
            <div class="card-body text-center">
                <h5 class="card-title">Browse Developers & Consultants</h5>
                <p class="my_textCardColor card-text"> View available Devs and consultants; choose based on specific needs.</p>
                <input type="text" class="my_numberInsideCard" value="3" readonly>
            </div>
        </div>
    </div>
      <!-- Right Section -->
      <div class="col-md-3 slider-text">
      <div class="card text-center">
            <i class="my_IconeColor2 fa-solid fa-comments card-img-top pt-3" style="font-size: 5rem;"></i>
            <div class="card-body text-center">
                <h5 class="card-title">Connect with specific Devs or consultants</h5>
                <p class="my_textCardColor card-text">The Users communicate to resolve issues or address unique needs</p>
                <input type="text" class="my_numberInsideCard2" value="4" readonly>
              </div>
           </div>
        </div>
      </div>
    </div>
</div>
        
<!-- Start Home Page Contact Us -->
<h3 class="text-center space_section" id="ContactUs"><strong>Contact Us</strong></h3>
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
            <input type="text" class="form-control form-control-sm" id="validationCustom03" aria-describedby="inputGroupPrepend" placeholder="00965xxxxxxxx" name="phone_number" pattern="[0-9]+" required>
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
</div>

<!--Start Home Page Footer-->
<div class="home_footer">
    <p>&copy; 2023 Codee - All Rights Reserved</p>
</div>

<!-- Top function -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-angles-up"></i></button>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/home.js"></script>

<!--Request Footer-->
<?php
  require_once('../includes/partials/footer.php')
?>