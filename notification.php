<?php
session_start();
if (isset($_SESSION["user_id"])) {
    require_once "database.php";
    $userId = $_SESSION["user_id"];
    $userName = $_SESSION["user"];
    
    
    $sql = "SELECT notification.*, courses.course_name 
    FROM notification 
    JOIN courses ON notification.course_id = courses.course_id 
    JOIN students ON courses.course_id = students.course_id 
    WHERE students.user_id = ? 
    ORDER BY notification.notification_id DESC";


    
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        echo "Failed to prepare statement";
    }
} else {
    header("Location: login.php");
    exit;
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
   <link rel="stylesheet" href="css/style.css">

   <style>
      .attendance-title {
         text-align: center;
         margin-top: 30px;
         color: #3806bf;
         font-size: 28px; 
         font-weight: bold; 
      }

      .notification-section {
         padding: 50px 0;
         
      }

      .notification-card {
         max-width: 800px; 
         margin: 0 auto;
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
         overflow: hidden; 
      }

      .notification-card-header {
         background-color: #007bff;
         color: #fff;
         padding: 20px; 
         font-size: 22px; 
         font-weight: bold; 
         text-align: center; 
      }

      .notification-card-body {
         padding: 30px;
      }

      .notification-item {
         padding: 20px;
         margin-bottom: 20px;
         border-bottom: 2px solid #ccc;
         font-size: 18px; 
         transition: background-color 0.3s; 
      }

      .notification-item:hover {
         background-color: #f1f1f1; 
      }

      .notification-item h3 {
         margin: 0;
         font-size: 20px; 
         color: #007bff; 
      }

      .notification-item p {
         margin: 10px 0 0; 
         font-size: 16px; 
         color: #333; 
      }

      .notification-item small {
         display: block; 
         margin-top: 10px; 
         font-size: 14px; 
         color: #999;
      }
   </style>
</head>
<body>

<header class="header">
   <section class="flex">
      <a href="home.html" class="logo">Educa.</a>
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
         <h3 class="name"><?php echo htmlspecialchars($userName); ?></h3>
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
    <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo htmlspecialchars($userName); ?></h3>
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
    </div>
</div>
   
<div class="attendance-title">
   <h1>Notification</h1>
</div>

<section class="notification-section">
   <div class="notification-card">
      <div class="notification-card-header">
         Received Notifications
      </div>
      <div class="notification-card-body">
         <?php
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 echo "<div class='notification-item'>";
                 echo "<h3>" . htmlspecialchars($row["course_name"]) . "</h3>";
                 echo "<h4>" . htmlspecialchars($row["message"]) . "</h4>";
                 echo "<small>Created at: " . htmlspecialchars($row["created_at"]) . "</small>";
                 echo "</div>";
             }
         } else {
             echo "<p>No notifications found.</p>";
         }
         ?>
      </div>
   </div>
</section>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>

<script>
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
