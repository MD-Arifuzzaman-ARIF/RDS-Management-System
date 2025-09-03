<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION["user"])) {
    // Retrieve the user's name from the session
    $userName = $_SESSION["user"];
} else {
    // If the user is not logged in, set a default name or redirect to the login page
    // You can customize this according to your requirement
    $userName = "Guest";
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the notification title and message are set
    if (isset($_POST["notificationTitle"]) && isset($_POST["notificationMessage"])) {
        // Get the notification title and message from the form
        $title = $_POST["notificationTitle"];
        $message = $_POST["notificationMessage"];

        // Here, you would insert code to save the notification to your database
        // and send it to the motivation page of the students
        // For demonstration purposes, we'll just display the notification
        echo "<script>alert('Notification sent successfully!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Notification</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="css/style.css"> <!-- Link to your provided CSS file -->
   <!-- Add Bootstrap CSS link if needed -->

   <style>
      /* Add CSS styles for the hidden attendance details */
      .attendance-details {
         display: none;
         padding: 10px;
         background-color: #f2f2f2;
         border: 1px solid #ccc;
      }

      /* Center the attendance title */
      .attendance-title {
         text-align: center;
         margin-top: 30px; /* Adjust the margin as needed */
         color: #3806bf; /* Adjust the color as needed */
         font-size: 24px; /* Adjust the font size as needed */
      }

      /* Notification section styles */
      .notification-section {
         padding: 50px 0;
         background-color: #33ccff;
      }

      .notification-card {
         max-width: 600px;
         margin: 0 auto;
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .notification-card-header {
         background-color: #007bff;
         color: #fff;
         padding: 15px;
         border-top-left-radius: 10px;
         border-top-right-radius: 10px;
      }

      .notification-card-body {
         padding: 20px;
      }

      .notification-card-body form {
         margin-bottom: 0;
      }

      .notification-card-body .form-group {
         margin-bottom: 20px;
      }
   </style>
</head>
<body>

<header class="header">
   <section class="flex">
      <a href="home.html" class="logo">Educa.</a>
      <!-- Search Form -->
      <form action="view_course_search.php" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="Search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>
      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $userName; ?></h3> <!-- Dynamic user name -->
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="logout.php" class="option-btn">Logout</a>
        </div>
      </div>
   </section>
</header>

<div class="side-bar">
   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>
    <!-- Profile section with dynamic user name -->
    <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $userName; ?></h3> <!-- Dynamic user name -->
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
         
    </div>
</div>
   
<div class="attendance-title">
   <h1>Notification</h1>
</div>

<section class="home-grid" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
   <!-- Attendance section -->
</section>

<section class="notification-section">
   <div class="notification-card">
      <div class="notification-card-header">
         Send Notification
      </div>
      <div class="notification-card-body">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
               <label for="notificationTitle">Title:</label>
               <input type="text" class="form-control" id="notificationTitle" name="notificationTitle" required>
            </div>
            <div class="form-group">
               <label for="notificationMessage">Message:</label>
               <textarea class="form-control" id="notificationMessage" name="notificationMessage" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Notification</button>
         </form>
      </div>
   </div>
</section>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>

<script>
   // JavaScript function to toggle attendance details visibility
   function toggleAttendance(id) {
      var details = document.getElementById(id);
      if (details.style.display === "none") {
         details.style.display = "block";
      } else {
         details.style.display = "none";
      }
   }
</script>

</body>
</html>
