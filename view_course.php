<?php

require_once "database.php";
?>

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
   <title>View Course</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="css/style.css"> 
   <style>
    
    .box-container {
       display: flex;
       flex-wrap: wrap;
       gap: 20px;
       justify-content: center;
       margin-top: 20px;
    }
    .box {
       background-color: #6692cb; 
       border-radius: 10px;
       box-shadow: 0 0 10px rgba(150, 8, 8, 0.1);
       padding: 20px;
       transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .box:hover {
       transform: translateY(-5px);
       box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    .title {
       font-size: 1.5rem; 
       margin-bottom: 10px;
    }
    .description {
       font-size: 1.2rem;
       line-height: 1.6; 
    }
   </style>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
        $(document).ready(function() {
            $("#search_box").keyup(function() {
                var query = $(this).val();
                if (query !== "") {
                    $.ajax({
                        url: "live_search.php",
                        method: "POST",
                        data: { query: query },
                        success: function(data) {
                            $(".box-container").html(data);
                        }
                    });
                } else {
                    $(".box-container").html("<div class='box'><h2 class='title'>Please enter a search query.</h2></div>");
                }
            });
        });
    </script>
</head>
<body>

<header class="header">
   <section class="flex">
      <a href="home.html" class="logo">Educa.</a>
      
      <form class="search-form">
         <input type="text" id="search_box" name="search_box" required placeholder="Search courses..." maxlength="100">
         <button type="button" class="fas fa-search"></button>
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
         <a href="home.php" class="btn">Home</a>
         
    </div>
   <nav class="navbar">
    
   </nav>
</div>

<section class="home-grid" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
   <section class="home-grid">
     
      <div class="box-container">
         <div class="box">
            <h2 class="title">Please enter a Course code.</h2>
         </div>
      </div>
   </section>
</section>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>

</body>
</html>
