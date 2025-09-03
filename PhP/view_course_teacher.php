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
         <h3 class="name"><?php echo $userName; ?></h3>
         <p class="role">Teachers</p>
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
         <p class="role">Teachers</p>
         <a href="teachers.php" class="btn">Home</a>
         
    </div>
   <nav class="navbar">
      
   </nav>
</div>

<section class="home-grid" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
   
   <div class="box-container">
      <div class="box">
         <h2 class="title">CSE482 - Advanced Database Management System</h2>
         <h2 class="description">This course covers advanced topics in database management systems including relational algebra, SQL, indexing, query optimization, transaction management, and concurrency control.</h2>
      </div>
      <div class="box">
         <h1 class="title">CSE428L - Software Engineering Lab</h1>
         <h2 class="description">This lab course provides hands-on experience in software engineering principles and practices. Students will work on real-world projects applying software engineering methodologies.</h2>
      </div>
      <div class="box">
         <h1 class="title">MAT250 - Linear Algebra</h1>
         <h2 class="description">This course introduces fundamental concepts in linear algebra, including vector spaces, linear transformations, matrices, determinants, eigenvalues, and eigenvectors.</h2>
      </div>
      <div class="box">
         <h1 class="title">ENG110 - English Composition</h1>
         <h2 class="description">This course focuses on developing writing skills, including grammar, syntax, and composition.</h2>
      </div>
      <div class="box">
         <h1 class="title">CHEM210 - Organic Chemistry</h1>
         <h2 class="description">This course covers the fundamental principles of organic chemistry, including nomenclature, structure, and reactions.</h2>
      </div>
      <div class="box">
         <h1 class="title">BIO450 - Molecular Biology</h1>
         <h2 class="description">This course explores the molecular basis of biological processes, including DNA replication, transcription, and translation.</h2>
      </div>
      <div class="box">
         <h1 class="title">PHY301 - Quantum Mechanics</h1>
         <h2 class="description">This course introduces the principles of quantum mechanics, including wave-particle duality, Schrödinger's equation, and quantum operators.</h2>
      </div>
      <div class="box">
         <h1 class="title">MAT202 - Calculus II</h1>
         <h2 class="description">This course builds upon the concepts introduced in Calculus I, focusing on techniques of integration, sequences, and series.</h2>
      </div>
      <div class="box">
         <h1 class="title">EEE305 - Digital Signal Processing</h1>
         <h2 class="description">This course covers the analysis and processing of digital signals, including filtering, modulation, and spectral analysis.</h2>
      </div>
   </div>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>

</body>
</html>
