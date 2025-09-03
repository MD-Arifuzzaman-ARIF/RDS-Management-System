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
   <title>View Grade History</title>

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
         <a href="profile.php" class="btn">view profile</a>
         
    </div>
   
   <nav class="navbar">
      
   </nav>
</div>

<section class="home-grid" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
    
    <div class="box-container" style="display: flex; justify-content: space-between;">
       <div class="box" style="width: 30%;">
          <h2 class="title">Summer 2022</h2>
          <table>
             <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Obtained Grade</th>
             </tr>
             
             <tr>
                <td>CSE101</td>
                <td>Introduction to Database Systems</td>
                <td>3</td>
                <td>B+</td>
             </tr>
             <tr>
                <td>CSE201</td>
                <td>Software Engineering Principles</td>
                <td>4</td>
                <td>A-</td>
             </tr>
             <tr>
                <td>CSE301</td>
                <td>Data Structures and Algorithms</td>
                <td>3</td>
                <td>B</td>
             </tr>
             <tr>
                <td>CSE401</td>
                <td>Web Development</td>
                <td>4</td>
                <td>A</td>
             </tr>
             <tr>
                <td colspan="4" style="text-align: right;">Total GPA: 3.65</td>
             </tr>
          </table>
       </div>
       <div class="box" style="width: 30%;">
          <h2 class="title">Fall 2022</h2>
          <table>
             <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Obtained Grade</th>
             </tr>
             <!-- Course rows -->
             <tr>
                <td>CSE501</td>
                <td>Machine Learning</td>
                <td>3</td>
                <td>A</td>
             </tr>
             <tr>
                <td>CSE601</td>
                <td>Computer Networks</td>
                <td>4</td>
                <td>B+</td>
             </tr>
             <tr>
                <td>CSE701</td>
                <td>Operating Systems</td>
                <td>3</td>
                <td>A-</td>
             </tr>
             <tr>
                <td>CSE801</td>
                <td>Software Testing and Quality Assurance</td>
                <td>4</td>
                <td>B</td>
             </tr>
             <tr>
                <td colspan="4" style="text-align: right;">Total GPA: 3.80</td>
             </tr>
          </table>
       </div>
       <div class="box" style="width: 30%;">
          <h2 class="title">Spring 2023</h2>
          <table>
             <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Obtained Grade</th>
             </tr>
            
             <tr>
                <td>CSE102</td>
                <td>Computer Graphics</td>
                <td>3</td>
                <td>A-</td>
             </tr>
             <tr>
                <td>CSE202</td>
                <td>Artificial Intelligence</td>
                <td>4</td>
                <td>B</td>
             </tr>
             <tr>
                <td>CSE302</td>
                <td>Software Architecture</td>
                <td>3</td>
                <td>B+</td>
             </tr>
             <tr>
                <td>CSE402</td>
                <td>Network Security</td>
                <td>4</td>
                <td>A</td>
             </tr>
             <tr>
                <td colspan="4" style="text-align: right;">Total GPA: 3.70</td>
             </tr>
          </table>
       </div>
    </div>
 </section>
 
 
<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>

</body>
</html>
