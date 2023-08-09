<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>StarRight</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Google Fonts Link For Icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="chatbot.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
      <div class="row align-items-center py-4 px-xl-5">
        <div class="col-lg-3">
          <a href="" class="text-decoration-none">
            <h1 class="m-0"><span class="text-primary">Star</span>Right</h1>
          </a>
        </div>
        <?php
        echo "Welcome : " . $_SESSION['username'] . "";
        ?>
        <div class="col-lg-3 text-right">
          <div class="d-inline-flex align-items-center">
            <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
            <div class="text-left">
              <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
              <small>0125445@kdu-online.com</small>
              <small>/ 0125124@kdu-online.com</small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 text-right">
          <div class="d-inline-flex align-items-center">
            <i class="fa fa-2x fa-phone text-primary mr-3"></i>
            <div class="text-left">
              <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
              <small>01118769881</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid">
      <div class="row border-top px-xl-5">
        <div class="col-lg-3">
          <a
            class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none"
            data-toggle="collapse"
            href="#navbar-vertical"
            style="height: 67px; padding: 0 30px"
          >
            <h5 class="text-primary m-0">
              <i class="fa fa-book-open mr-2"></i>Dementia Reading Corner
            </h5>
            <i class="fa fa-angle-down text-primary"></i>
          </a>
          <nav
            class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
            id="navbar-vertical"
            style="width: calc(100% - 30px); z-index: 9"
          >
            <div class="navbar-nav w-100">
              <a href="chapter/Symptoms.php" class="nav-item nav-link"
                >Dementia Symptoms</a
              >
              <a href="chapter/communication.php" class="nav-item nav-link"
                >Tips for communicating with a person with Dementia</a
              >
              <a href="chapter/dealing.php" class="nav-item nav-link">
                Dealing with the troubling behavior of a person with dementia.
              </a>
            </div>
          </nav>
        </div>
        <div class="col-lg-9">
          <nav
            class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0"
          >
            <a href="" class="text-decoration-none d-block d-lg-none">
              <h1 class="m-0"><span class="text-primary">Star</span>Right</h1>
            </a>
            <button
              type="button"
              class="navbar-toggler"
              data-toggle="collapse"
              data-target="#navbarCollapse"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-between"
              id="navbarCollapse"
            >
              <div class="navbar-nav py-0">
                <a href="home.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="quiz.php" class="nav-item nav-link">Result</a>
                <a href="chapter/progress_report.php" class="nav-item nav-link">Report</a>
              </div>
              <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px">
      <div class="container">
        <div
          class="d-flex flex-column justify-content-center"
          style="min-height: 300px"
        >
          <h3 class="display-4 text-white text-uppercase">About</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase">
              <a class="text-white" href="">Home</a>
            </p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">About</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container py-5">
        <div class="row align-items-center">
          <div
            class="col-lg-5"
            style="
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 50%;
            "
          >
          </div>
          <div style="text-align: center">
            <div>
              <br>
              <h1
                class="text-primary text-uppercase mb-3"
                style="letter-spacing: 20px"
              >
                About Us
              </h1>
              <h1>StarRight</h1>
              <br><hr>
            </div>
            <p style="text-align: justify">
              Dementia courses offered by StarRight provide an in-depth and
              specialized approach to understanding and managing
              dementia-related conditions. These courses are designed to cater
              to a wide range of learners, including healthcare professionals,
              caregivers, family members, and individuals interested in gaining
              knowledge about dementia.
            </p>
            <br>
            <div
            class="col-lg-5"
            style="
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 50%;
            "
          >
            <img
              class="img-fluid rounded mb-4 mb-lg-0"
              src="img/dementia.png"
              alt=""
            />
            </div>
            <br>
            <a
              href="https://www.nia.nih.gov/health/what-is-dementia"
              class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2"
              >Learn More About Dementia</a
            >
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    <div
      class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5"
      style="margin-top: 90px"
    >
      <div class="row pt-5">
        <div class="col-lg-7 col-md-12">
          <div class="row">
            <div class="col-md-6 mb-5">
              <h5
                class="text-primary text-uppercase mb-4"
                style="letter-spacing: 5px"
              >
                Get In Touch
              </h5>
              <p><i class="fa fa-phone-alt mr-2"></i>01118769881</p>
              <p><i class="fa fa-envelope mr-2"></i>0125445@kdu-online.com</p>
              <p><i class="fa fa-envelope mr-2"></i>0125124@kdu-online.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-12 mb-5">
          <form class="contact_form" action="send_mail.php" method="post">
            <h5
              class="text-primary text-uppercase mb-4"
              style="letter-spacing: 5px"
            >
              Invite Friend to Join
            </h5>
            <div class="w-100">
              <div class="input-group">
                <input
                  type="email"
                  class="form-control border-light"
                  style="padding: 30px"
                  placeholder="Your Email Address"
                  name="email"
                />
                  <button
                    class="btn btn-primary"
                    type="submit"
                  >
                    Send Invitation
                  </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div
      class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
      style="border-color: rgba(256, 256, 256, 0.1) !important"
    >
      <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
          <p class="m-0 text-white">&copy; <a href="#">StarRight</a></p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
          <ul class="nav d-inline-flex">
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Privacy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Terms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">FAQs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Help</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there 👋<br />How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea
          placeholder="Enter a message..."
          spellcheck="false"
          required
        ></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
      <script src="js/chatbot.js"></script>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
