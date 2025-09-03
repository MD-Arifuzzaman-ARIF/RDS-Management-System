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
   <title>Advising</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   
   
   <style>
     .advising {
       text-align: center;
       margin-top: 30px; 
       color: #7302ec; 
       font-size: 24px; 
    }
    .course-table {
       margin-top: 50px; 
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


<div class="advising">
   <h1>Advising</h1>
</div>

<div class="container course-table">
    <table class="table table-bordered" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
       <thead class="thead-dark">
          <tr>
             <th scope="col">Course Name</th>
             <th scope="col">Timings</th>
             <th scope="col">Credit</th>
             <th scope="col">Add</th>
             <th scope="col">Drop</th>
          </tr>
       </thead>
       <tbody>
          <tr>
             <td><h3>CSE101</h3></td>
             <td><h3>Mon/Wed 9:00 AM - 10:30 AM</h3></td>
             <td><h3>2</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>MAT202</h3></td>
             <td><h3>Tue/Thu 11:00 AM - 12:30 PM</h3></td>
             <td><h3>3</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>PHY301</h3></td>
             <td><h3>Mon/Wed/Fri 2:00 PM - 4:00 PM</h3></td>
             <td><h3>1</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>ENG110</h3></td>
             <td><h3>Tue/Thu 9:00 AM - 10:30 AM</h3></td>
             <td><h3>3</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>CHEM210</h3></td>
             <td><h3>Mon/Wed 11:00 AM - 12:30 PM</h3></td>
             <td><h3>2</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>BIO450</h3></td>
             <td><h3>Tue/Thu 2:00 PM - 4:00 PM</h3></td>
             <td><h3>4</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>CSE482</h3></td>
             <td><h3>Mon/Wed/Fri 9:00 AM - 11:00 AM</h3></td>
             <td><h3>1</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>MAT250</h3></td>
             <td><h3>Tue/Thu 8:00 AM - 10:00 AM</h3></td>
             <td><h3>4</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>CSE428L</h3></td>
             <td><h3>Mon 1:00 PM - 4:00 PM</h3></td>
             <td><h3>2</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
          <tr>
             <td><h3>EEE305</h3></td>
             <td><h3>Wed/Fri 2:00 PM - 3:30 PM</h3></td>
             <td><h3>3</h3></td>
             <td><button class="btn btn-success add-course-btn">Add</button></td>
             <td><button class="btn btn-danger drop-course-btn">Drop</button></td>
          </tr>
       </tbody>
    </table>
 </div>
 
 

<footer class="footer">
   &copy; Designed by Azmain Group-2 | all rights reserved!
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

$(document).ready(function() {
   $('body').on('click', '.add-course-btn', function() {
      var courseName = $(this).closest('tr').find('td:eq(0)').text();
      alert('Course added successfully: ' + courseName);
   });

   
   $('body').on('click', '.drop-course-btn', function() {
      var courseName = $(this).closest('tr').find('td:eq(0)').text();
      alert('Course dropped successfully: ' + courseName);
   });

   setTimeout(function() {
      document.cookie = 'advising_info=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
      alert('Your advising information cookie has expired. Please complete advising within 20.');
   }, 20000); 
});
</script>

</body>
</html>
