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
                <h1 class="navbar-brand">How to Communcaite with a person with dementia</h1>
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
                <div class="col-lg-11">
                  <h3 class="text-center">Definition</h3>
                  <br>
                  <p> Dementia affects everyone differently so it's important to communicate in a way that is right for the person. Listen carefully and think about what you're going to say and how you'll say it. You can also communicate meaningfully without using spoken words.</p>
                  <br>
                  <h2>Before you communicate</h2>
                  <br>
                  <h3>Making sure the person is comfortable</h3>
                  <br>
                  <ul>
                    <li>Make sure you're in a good place to communicate. Ideally it will be quiet and calm, with good lighting. Busy environments can make it especially difficult for a person with dementia to concentrate on the conversation, so turn off distractions such as the radio or TV.</li>
                    <li>If there is a time of day where the person is able to communicate more clearly, try to use this time to ask any questions or talk about anything you need to. </li>
                    <li>Make the most of 'good' days and find ways to adapt on more difficult ones.</li>
                      li>Make sure any of the person's other needs are met before you start - for example, ensuring they are not in pain or hungry.</li>
                  </ul>
                  <br>
                  <h3>How to communicate?</h3>
                  <br>
                  <h5>There are several way to communicate with a person that have dementia:</h5>
                  <br>
                  <ul>
                    <li>Communicate clearly and calmly.</li>
                    <li>Use short, simple sentences.</li>
                    <li>Don't talk to the person as you would to a child - be patient and have respect for them.</li>
                    <li>Try to communicate with the person in a conversational way, rather than asking question after question which may feel quite tiring or intimidating.</li>
                    <li>Ensure that the person with dementia is actively involved in conversations with others. It is crucial not to talk about them as if they are not present. Including them in discussions can play a vital role in preserving their sense of identity and reaffirming their value. Moreover, it can alleviate feelings of exclusion or isolation, providing them with a sense of belonging and connection to those around them.</li>
                    <li>If the person experiences frequent fatigue, opting for short and regular conversations would be more beneficial.</li>
                    <li>Avoid speaking sharply or raising your voice.</li>
                  </ul>
                  <br>
                  <h5>Things to consider about body language</h5>
                  <br>
                  <ul>
                    <li>Position yourself in a way that ensures optimal visibility and audibility for the person, typically by standing or sitting in front of them. Make sure your face is well-illuminated to enhance communication. Whenever possible, aim to be at eye level with the individual instead of towering over them.</li>
                    <li>Be as close to the person as is comfortable for you both, so that you can clearly hear each other, and make eye contact as you would with anyone.</li>
                    <li>Utilize prompts to assist communication.<li>
                    <li>Try to make sure your body language is open and relaxed.</li>
                  </ul>
                  <br>
                  <h3>What to Communicate?</h3>
                  <br>
                  <h5>Tips for asking questions</h5>
                  <br>
                  <ul>
                    <li>Minimize the number of questions you ask, and avoid posing overly complex ones. Excessive questioning or difficult inquiries might lead the person to feel frustrated or withdrawn, especially if they are unable to find the answers.</li>
                    <li>Try to stick to one idea at a time. Giving someone a choice is important, but too many options can be confusing and frustrating.</li>
                    <li>Phrase questions in a way that allows for a simple answer. For example, rather than asking someone what they would like to drink, ask if they would like tea or coffee. Questions with a 'yes' or 'no' answer are easier to answer.</li>
                  </ul>
                  <br>
                  <h5>What to do if the person has difficulty understanding</h5>
                  <br>
                  <ul>
                    <li>If the person doesn't understand what you're saying even after you repeat it, try saying it in a slightly different way instead.</li>
                    <li>If the person is finding it hard to understand, consider breaking down what you're saying into smaller chunks so that it is more manageable.</li>
                    <li>Try to laugh together about misunderstandings and mistakes. Humour can help to relieve tension and bring you closer together. Make sure the person doesn't feel you are laughing at them.</li>
                  </ul>
                </div>
          </div> <!-- /container -->
          <br><br>
          <hr>
          <form method="post" action="save_progress.php">
            <a class="btn btn-primary" style="margin-left: 10%;" href="Symptoms.php">Previous Chapter</a>
            <a class="btn btn-primary" style="margin-left: 30%;" href="quiz-communication.php">Quizz</a>
            <button class="btn btn-primary" style="margin-left: 30%; <?= $nextChapterButtonStyle ?>" id="nextChapterBtn" type="submit" name="next_chapter" value="2">Next Chapter</button>
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
  </body>
</html>