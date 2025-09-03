<?php

include 'database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $course_id = $_POST["course_id"];
    $user_id = $_POST["user_id"];
    $teachings = $_POST["teachings"];
    $enjoy = $_POST["enjoy"];
    $useful = $_POST["useful"];
    $up_to_date = $_POST["up_to_date"];
    $recommend = $_POST["recommend"];

    
    $sql = "INSERT INTO faculty_evaluation (course_id, user_id, teachings, enjoy, useful, up_to_date, recommend) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $course_id, $user_id, $teachings, $enjoy, $useful, $up_to_date, $recommend);

    if ($stmt->execute()) {
       
        echo "Evaluation submitted successfully!";
        setcookie('course_id', $course_id, time() + 20, "/"); 
        setcookie('user_id', $user_id, time() + 20, "/"); 
        setcookie('teachings', $teachings, time() + 20, "/"); 
        setcookie('enjoy', $enjoy, time() + 20, "/"); 
        setcookie('useful', $useful, time() + 20, "/"); 
        setcookie('up_to_date', $up_to_date, time() + 20, "/"); 
        setcookie('recommend', $recommend, time() + 20, "/");
        

       
        header("Location: faculty_evaluation.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $stmt->close();
}


$conn->close();
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
   <title>Faculty Evaluation</title>

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
<section class="faculty-evaluation" style="background: linear-gradient(to bottom, #66ff99 0%, #ff99cc 100%);">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="evaluation-form">
               <h1 class="section-title">Faculty Evaluation</h1>
               <h4 class="criteria-description">Please provide your feedback for the following criteria:</h4>
               <form id="evaluationForm" action="evaluate_faculty.php" method="post">
                   <input type="hidden" name="course_name" value="<?php echo $course_name; ?>">
                
                 <div class="form-group">
                      <h2 for="course_id">Course ID:</h2>
                      <input type="number" name="course_id" id="course_id" class="form-control">
                 </div>

                 <div class="form-group">
                      <h2 for="user_id">User ID:</h2>
                      <input type="number" name="user_id" id="user_id" class="form-control">
                 </div> 
                 <div class="form-group">
                     <h2 for="teachings">Teachings:</h2>
                     <select name="teachings" id="teachings" class="form-control">
                        <option value="excellent"><h3>Excellent</h3></option>
                        <option value="good"><h3>Good</h3></option>
                        <option value="average"><h3>Average</h3></option>
                        <option value="poor"><h3>Poor</h3></option>
                     </select>
                  </div>
                  <div class="form-group">
                     <h2 for="enjoy">Did you enjoy the course?</h2>
                     <select name="enjoy" id="enjoy" class="form-control">
                        <option value="yes"><h3>Yes</h3></option>
                        <option value="no"><h3>No</h3></option>
                     </select>
                  </div>
                  <div class="form-group">
                     <h2 for="useful">How useful was the course?</h2>
                     <select name="useful" id="useful" class="form-control">
                        <option value="very"><h3>Very Useful</h3></option>
                        <option value="somewhat"><h3>Somewhat Useful</h3></option>
                        <option value="not"><h3>Not Useful</h3></option>
                     </select>
                  </div>
                  <div class="form-group">
                     <h2 for="up_to_date">Was the course material up to date?</h2>
                     <select name="up_to_date" id="up_to_date" class="form-control">
                        <option value="yes"><h3>Yes</h3></option>
                        <option value="no"><h3>No</h3></option>
                     </select>
                  </div>
                  <div class="form-group">
                     <h2 for="recommend">Would you recommend this faculty?</h2>
                     <select name="recommend" id="recommend" class="form-control">
                        <option value="yes"><h3>Yes</h3></option>
                        <option value="no"><h3>No</h3></option>
                     </select>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script>
    function setCookie(name, value, seconds) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (seconds * 1000));
    document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
   }

    function getCookie(name) {
        var cookieName = name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        return null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const course_id = getCookie('course_id');
        if (course_id !== null) {
            document.getElementById('course_id').value = course_id;
        }

        const user_id = getCookie('user_id');
        if (user_id !== null) {
            document.getElementById('user_id').value = user_id;
        }

        const teachings = getCookie('teachings');
        if (teachings !== null) {
            document.getElementById('teachings').value = teachings;
        }

        const enjoy = getCookie('enjoy');
        if (enjoy !== null) {
            document.getElementById('enjoy').value = enjoy;
        }

        const useful = getCookie('useful');
        if (useful !== null) {
            document.getElementById('useful').value = useful;
        }

        const up_to_date = getCookie('up_to_date');
        if (up_to_date !== null) {
            document.getElementById('up_to_date').value = up_to_date;
        }

        const recommend = getCookie('recommend');
        if (recommend !== null) {
            document.getElementById('recommend').value = recommend;
        }
    });

    document.getElementById('evaluationForm').addEventListener('submit', function(event) {
      
        event.preventDefault();

        var course_id = document.getElementById('course_id').value;
        var user_id = document.getElementById('user_id').value;
        var teachings = document.getElementById('teachings').value;
        var enjoy = document.getElementById('enjoy').value;
        var useful = document.getElementById('useful').value;
        var up_to_date = document.getElementById('up_to_date').value;
        var recommend = document.getElementById('recommend').value;


        setCookie('course_id', course_id, 20);
        setCookie('user_id', user_id, 20);
        setCookie('teachings', teachings, 20);
        setCookie('enjoy', enjoy, 20);
        setCookie('useful', useful, 20);
        setCookie('up_to_date', up_to_date, 20);
        setCookie('recommend', recommend, 20);

        this.submit();
    });
</script>

<script src="js/script.js"></script>
</body>
</html>
