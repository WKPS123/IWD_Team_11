<?php
session_start(); // Start the session if it's not already started

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

require "../db_connection.php"; // Include your database connection file

// Retrieve progress information from the database
$username = $_SESSION["username"];
$sql = "SELECT topic_name, progress FROM user_progress WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Create an array to store progress data
$progressData = [];

while ($row = $result->fetch_assoc()) {
    $topic_name = $row["topic_name"];
    $progress = $row["progress"];
    $progressData[$topic_name] = $progress;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
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
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/reading.css" rel="stylesheet" />
    <link href="../chatbot.css" rel="stylesheet" />

    <style>
        /* Custom CSS for table styling */
table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px auto;
  border:1px solid black; 
}

th , td{
  padding: 10px 30px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  border:1px solid black; 
}


th {
  background-color: #f2f2f2;
  font-weight: bold;
}

tr:hover {
  background-color: #f5f5f5;
}

tr:nth-child(odd) {
  background-color: #f2f2f2;
}

/* Adjust styles for small screens */
@media screen and (max-width: 600px) {
  th, td {
    padding: 8px;
  }
}

        </style>
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
                  $sql = "SELECT topic_id, topic_name, topic_url FROM topics";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      // Output data of each row
                      while ($row = $result->fetch_assoc()) {
                          $topic_id = $row["topic_id"];
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
    <!-- Include your header or navigation bar here -->

    <div class="container" style="text-align: center;">
        <div>
        <h1>Progress Report</h1>
          <p>Hello, <?php echo "" . $_SESSION['username'] . ""; ?>! Here are your Progress report</p>
        </div>
        <table>
            <tr>
                <th>Topic</th>
                <th>Progress</th>
            </tr>
            <?php foreach ($progressData as $topic => $progress) : ?>
                <tr>
                    <td><?php echo $topic; ?></td>
                    <td><?php echo $progress; ?>%</td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>


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
        <h2>Dementia Chatbot</h2>
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

    <!-- Include your footer here -->
</body>
</html>
