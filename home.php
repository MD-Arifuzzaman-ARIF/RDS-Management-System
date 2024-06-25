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
   <title>Home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

   <style>
      body {
         font-family: 'Arial', sans-serif;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      .lazy-image {
         min-height: 200px;
         background-color: #f0f0f0; 
         background-size: cover;
         background-position: center;
         margin: 20px 0; 
         border-radius: 10px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .info {
         padding: 20px;
         background: #fff;
         border-radius: 10px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         margin: 20px 0;
         text-align: center;
      }

      .info h3 {
         font-size: 24px;
         color: #333;
      }

      .info p {
         font-size: 16px;
         color: #666;
         line-height: 1.5;
      }

      .info-icon {
         color: #ff6f61;
         margin-bottom: 10px;
         font-size: 40px;
      }

      .header .profile, .side-bar .profile {
         text-align: center;
      }

      .header .profile img, .side-bar .profile img {
         border-radius: 50%;
         width: 80px;
         height: 80px;
         margin-bottom: 10px;
      }

      .header .profile .name, .side-bar .profile .name {
         font-size: 18px;
         color: #333;
      }

      .header .profile .role, .side-bar .profile .role {
         font-size: 14px;
         color: #666;
      }

      .box {
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         margin: 20px 0;
      }

      .box h1 {
         font-size: 36px;
         color: #333;
      }

      .box .description {
         font-size: 16px;
         color: #666;
         line-height: 1.5;
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
         <a href="profile.php" class="btn">View profile</a>
    </div>
   <nav class="navbar">
      <a href="view_course.php"><i class="fas fa-book"></i><span>View Course (Student)</span></a>
      <a href="attendance.php"><i class="fas fa-user-clock"></i><span>Attendance (Student)</span></a>
      <a href="advising.php"><i class="fas fa-comments"></i><span>Advising</span></a>
      <a href="evaluation.php"><i class="fas fa-user-tie"></i><span>Faculty Evaluation</span></a>
      <a href="profile.php"><i class="fas fa-user-circle"></i><span>View Profile</span></a>
      <a href="grade.php"><i class="fas fa-history"></i><span>View Grade History</span></a>
      <a href="index.php"><i class="fas fa-credit-card"></i><span>Online Payment</span></a>
      <a href="notification.php"><i class="fas fa-bell"></i><span>Notification Page (Student)</span></a>
      <a href="service.php"><i class="fas fa-handshake"></i><span>Service</span></a>
   </nav>
</div>

<section class="home-grid">
   
   <section class="welcome">
      <div class="box" style="background: linear-gradient(to bottom, #66ff99 0%, #ff99cc 100%);">
         <h1 class="title">Welcome to RDS :) </h1>
         <h3 class="description">Dear students, welcome to RDS System of NorthSouth University! We are excited to have you join our esteemed institution. Whether you're embarking on a journey of advanced database management, diving into the world of software engineering, or exploring the depths of linear algebra, we're here to support and guide you every step of the way. Our dedicated faculty and comprehensive curriculum are designed to equip you with the knowledge and skills needed to excel in your academic and professional endeavors. So, embrace the opportunities that lie ahead, engage with enthusiasm, and let's embark on this educational journey together!</h3>
      </div>
   </section>

   
   <section class="courses">
      <div class="box-container">
        
         <div class="lazy-image" data-src="images/a.jpg"></div>
         <div class="info">
            <i class="fas fa-book-open info-icon"></i>
            <h3>Course Overview</h3>
            <p>Explore the various courses available at NorthSouth University and find the perfect one that matches your interests and career goals.</p>
         </div>

         <div class="lazy-image" data-src="images/b.jpg"></div>
         <div class="info">
            <i class="fas fa-database info-icon"></i>
            <h3>Advanced Database Management</h3>
            <p>Learn about advanced database concepts, including normalization, SQL, and big data technologies to manage and analyze large datasets.</p>
         </div>

         <div class="lazy-image" data-src="images/c.jpg"></div>
         <div class="info">
            <i class="fas fa-code info-icon"></i>
            <h3>Software Engineering</h3>
            <p>Gain skills in software development, testing, and maintenance to build high-quality software solutions for various applications.</p>
         </div>

         <div class="lazy-image" data-src="images/d.jpg"></div>
         <div class="info">
            <i class="fas fa-calculator info-icon"></i>
            <h3>Linear Algebra</h3>
            <p>Understand the principles of linear algebra and its applications in computer science, engineering, and data analysis.</p>
         </div>

         <div class="lazy-image" data-src="images/e.jpg"></div>
         <div class="info">
            <i class="fas fa-chalkboard-teacher info-icon"></i>
            <h3>Faculty and Staff</h3>
            <p>Meet our dedicated faculty and staff who are committed to providing a supportive and enriching learning environment.</p>
         </div>

         <div class="lazy-image" data-src="images/f.jpg"></div>
         <div class="info">
            <i class="fas fa-users info-icon"></i>
            <h3>Student Life</h3>
            <p>Discover the vibrant student life at NorthSouth University, with various clubs, activities, and events to enhance your university experience.</p>
         </div>

         <div class="lazy-image" data-src="images/g.jpg"></div>
         <div class="info">
            <i class="fas fa-school info-icon"></i>
            <h3>Campus Facilities</h3>
            <p>Explore our state-of-the-art campus facilities, including libraries, labs, and sports complexes, designed to support your academic and personal growth.</p>
         </div>

         <div class="lazy-image" data-src="images/h.jpg"></div>
         <div class="info">
            <i class="fas fa-graduation-cap info-icon"></i>
            <h3>Alumni Success</h3>
            <p>Read about the success stories of our alumni and how NorthSouth University has helped them achieve their career aspirations.</p>
         </div>
      </div>
   </section>
</section>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function() {
      let lazyImages = [].slice.call(document.querySelectorAll(".lazy-image"));

      if ("IntersectionObserver" in window) {
         let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
               if (entry.isIntersecting) {
                  let lazyImage = entry.target;
                  lazyImage.style.backgroundImage = "url(" + lazyImage.dataset.src + ")";
                  lazyImageObserver.unobserve(lazyImage);
               }
            });
         });

         lazyImages.forEach(function(lazyImage) {
            lazyImageObserver.observe(lazyImage);
         });
      } else {
        
         lazyImages.forEach(function(lazyImage) {
            lazyImage.style.backgroundImage = "url(" + lazyImage.dataset.src + ")";
         });
      }
   });
</script>

</body>
</html>
