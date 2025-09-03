<?php
session_start();

if (isset($_SESSION["user"])) {
   
    $userName = $_SESSION["user"];
} else {
    
    $userName = "Guest";
  
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
   <title>Attendance</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <style>
     
      .attendance-details {
         display: none;
         padding: 10px;
         background-color: #f2f2f2;
         border: 1px solid #ccc;
      }

      .attendance-title {
         text-align: center;
         margin-top: 30px; 
         color: #3806bf; 
         font-size: 24px; 
      }
   </style>
</head>
<body>

<header class="header">
   <section class="flex">
      <a href="home.html" class="logo">Educa.</a>
      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
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
         <h3 class="name"><?php echo $userName; ?></h3> 
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
      <h3 class="name"><?php echo $userName; ?></h3> 
      <p class="role">student</p>
      <a href="home.php" class="btn">Home</a>
      
 </div>
   <nav class="navbar">
   </nav>
</div>

<div class="attendance-title">
   <h1>Attendance</h1>
</div>

<section class="home-grid"style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
   <section class="attendance">
      <div class="box-container">
         <div class="box" onclick="toggleAttendance('attendance-cse482')">
            <h3 class="title">CSE482 - Advanced Database Management System</h3>
            <div class="attendance-details" id="attendance-cse482">
               <h2 class="description">Attendance:</h2><br>
               <ul><br>
                  <li><h3>Date: 2024-04-01 - Present</h3></li>
                  <li><h3>Date: 2024-04-08 - Present</h3></li>
                  <li><h3>Date: 2024-04-15 - Absent</h3></li>
                
               </ul>
            </div>
         </div>
         
         <div class="box" onclick="toggleAttendance('attendance-mat250')">
            <h3 class="title">MAT250 - Linear Algebra</h3>
            <div class="attendance-details" id="attendance-mat250">
               <h2 class="description">Attendance:</h2><br>
               <ul><br>
                  <li><h3>Date: 2024-04-02 - Present</h3></li>
                  <li><h3>Date: 2024-04-09 - Present</h3></li>
                  <li><h3>Date: 2024-04-16 - Present</h3></li>
                 
               </ul>
            </div>
         </div>

         <div class="box" onclick="toggleAttendance('attendance-cse428l')">
            <h3 class="title">CSE428L - Software Engineering Lab</h3>
            <div class="attendance-details" id="attendance-cse428l">
               <br>
                <h2 class="description">Attendance:</h2>
               <ul>   <br>
                   <li><h3>Date: 2024-04-03 - Absent</h3></li>
                   <li><h3>Date: 2024-04-10 - Present</h3></li>
                   <li><h3>Date: 2024-04-17 - Absent</h3></li>
                 
               </ul>
            </div>
         </div>
      </div>
   </section>
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
