<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Check if the user has completed the quiz
if (!isset($_SESSION["quiz_completed"]) || $_SESSION["quiz_completed"] !== true) {
  $nextChapterButtonStyle = "display: none;"; // Hide the next chapter button
} else {
  $nextChapterButtonStyle = ""; // Show the next chapter button
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
    <link href="../img/favicon.ico" rel="icon" />

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

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"
    />

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet" />
    <link href="css/reading.css" rel="stylesheet" />
    <link href="../chatbot.css" rel="stylesheet" />
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
                  <?php
                  require "../db_connection.php";
                  $sql = "SELECT topic_name, topic_url FROM topics";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      // Output data of each row
                      while ($row = $result->fetch_assoc()) {
                          $topic_name = $row["topic_name"];
                          $topic_url = $row["topic_url"];
                          echo '<a href="' . $topic_url . '" class="nav-item nav-link">' . $topic_name . '</a>';
                      }
                  } else {
                      echo "No topics found.";
                  }

                  // Close the database connection
                  $conn->close();
                  ?>
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
                <a href="../home.php" class="nav-item nav-link active"
                  >Home</a
                >
                <a href="../about.php" class="nav-item nav-link">About</a>
                <a href="../quiz.php" class="nav-item nav-link">Result</a>
                <a href="progress_report.php" class="nav-item nav-link">Report</a>
              </div>
              <a class="btn btn-primary" style="margin-right: 5%;" href="../logout.php">Logout</a>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- Navbar End -->
    
  <!-- Static navbar -->
  <div class="navbar-reading navbar-inverse">
        <div class="container" style="text-align: center;">
            <div class="navbar-header">
                <h1 class="navbar-brand">Dealing with the troubling behavior of a person with dementia</h1>
            </div>
        </div>
        <div class="progress-indicator">
            <svg>
                <g>
                    <circle cx="0" cy="0" r="20" stroke="black" class="animated-circle" transform="translate(50,50) rotate(-90)"  />
                </g>
                <g>
                    <circle cx="0" cy="0" r="40" transform="translate(50,50) rotate(-90)"  />
                </g>
            </svg>
            <div class="progress-count"></div>
        </div>
    </div>

    <!-- +++++ Post +++++ -->
        <div class="container sim">
                <div class="col-lg-10">
                <img
                class="w-50 h-50"
                src="../img/deal.jpg"
                style="margin:auto; display:block;"
                />
                <br>
                    <h2 class="text-center">Definition</h2>
                    <br>
                    <p>Dealing with the troubling behavior of a person with dementia can be challenging, but it's essential to approach the situation with patience, empathy, and understanding. Dementia is a progressive neurological disorder that affects cognitive abilities, behavior, and emotions, leading to various changes in the affected person's personality and actions.</p>
                    <p>Caring for a person who has dementia may be frustrating, confusing, or upsetting at times. Understanding why certain behaviors occur and learning ways to handle a variety of situations can help smooth the path ahead.</p>
                    <br>
                    <h3 class="text-center">What behaviors are common when a person has dementia?</h3>
                    <br>
                    <ul>
                      <p>People with dementia often exhibit a combination of unusual behaviors, such as:</p>
                      <li>Making odd statements or using the wrong words for certain items.</li>
                      <li>Not realizing they need to bathe or forgetting how to maintain good hygiene.</li>
                      <li>Repeating themselves or asking the same question over and over.</li>
                      <li>Misplacing objects or taking others' belongings.</li>
                      <li>Not recognizing you or remembering who they are.</li>
                      <li>Being convinced that a deceased loved one is still alive.</li>
                      <li>Hoarding objects, such as mail or even garbage.</li>
                      <li>Leaving the house without telling you, and getting lost.</li>
                  </ul>
                  <br>
                  <h3 class="text-center">Why do these behaviors occur?</h3>
                  <br>
                  <p>Imagine the brain of a cherished one with dementia as a raging wildfire, its path constantly shifting, causing harm to precious brain cells (neurons) and disrupting the neural networks responsible for regulating behavior.</p>
                  <p>The catalyst for this devastation varies, contingent on the underlying causes of dementia. In the case of Alzheimer's disease, the exact trigger remains elusive, but there is a strong association with proteins that either accumulate and clog brain cells or entangle them. On the other hand, vascular dementia emerges when specific areas of the brain suffer from periodic insufficient blood flow, leading to the death of neurons.</p>
                  <p>"As dementia advances, the person experiences a decline in brain cells crucial for memory, planning, judgment, and emotional regulation. Their filters gradually dissipate," explains Dr. Stephanie Collier, a psychiatrist at Harvard-affiliated McLean Hospital.</p>
                  <br>
                  <h3 class="text-center">Six strategies for coping with dementia-related behaviors</h3>
                  <br>
                  <ul>
                    <li>Don't point out inaccurate or strange statements. "It can make people with dementia feel foolish or belittled. They may not remember details but hold onto those emotions, feel isolated, and withdraw. Instead, put them at ease. Just go with what they're saying. Keep things light," Cho says.</li>
                    <li>Don't try to reason with the person. Dementia has damaged your loved one's comprehension. Attempting to reason might be frustrating for both of you.</li>
                    <li>User Distraction: When the person makes unreasonable requests or becomes moderately agitated, it is beneficial to respond in a calming manner. Dr. Collier suggests acknowledging their feelings by saying, "I see that you're upset. Let's go over here for a minute." Then, transition to an activity that engages their senses and promotes relaxation, like sitting outside together, listening to music, folding socks, or enjoying a piece of fruit. These activities can help redirect their focus and create a more soothing environment.</li>
                  </ul>
                </div>
        </div> <!-- /container -->
        <br><br>
        <hr>
        <form method="post" action="save_progress.php">
          <a class="btn btn-primary" style="margin-left: 10%;" href="communication.php">Previous Chapter</a>
          <a class="btn btn-primary" style="margin-left: 30%;" href="quiz-dealing.php">Quizz</a>
          <button class="btn btn-primary" style="margin-left: 30%; <?= $nextChapterButtonStyle ?>" id="nextChapterBtn" type="submit" name="next_chapter" value="3">Finish Reading</button>
        </form>
        


    <script src="../js/progress.min.js"></script>
    <script>Progress.init();</script>
    
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
          <form class="contact_form" action="../send_mail.php" method="post">
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
          <p>Hi there 👋<br>How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
      <script src="../js/chatbot.js"></script>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
  </body>
</html>