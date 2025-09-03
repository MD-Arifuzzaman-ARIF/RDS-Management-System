<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
   <link rel="stylesheet" href="css/style.css">
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
         <?php
            session_start();
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "login_register";

            
            $conn = new mysqli($servername, $username, $password, $dbname);

         
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            if(isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM profile WHERE user_id = $user_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        $user_name = $row["name"];
                        $user_email = $row["email"];
                        $parent_name = $row["parent_name"];
                        $phone_number = $row["phone_number"];
                        $date_of_birth = $row["date_of_birth"];
                        $address = $row["address"];
                        $total_credits_completed = $row["total_credits_completed"];
                        $cgpa = $row["cgpa"];
                        $department = $row["department"];
                        $chosen_subjects = $row["chosen_subjects"];
                    }
                } else {
                    echo "0 results";
                }
            } else {
                echo "User session not found";
            }

            $conn->close();
            
            
            echo "<h3 class='name'>$user_name</h3>"; 
            echo "<p class='role'>student</p>";
         ?>
         <a href="profile.html" class="btn">view profile</a>
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
      <?php
         
         echo "<h3 class='name'>$user_name</h3>"; 
         echo "<p class='role'>student</p>";
      ?>
      <a href="home.php" class="btn">Home</a>
   </div>
   <nav class="navbar">
   </nav>
</div>

<section class="profile-section" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
   <div class="container">
      <h1 class="section-title">Profile Information:</h1><br>
      <div class="row">
         <div class="col-md-6">
            <div class="profile-item">
               <h3 class="label">Name:</h3>
               <p class="value"><?php echo $user_name; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Email:</h3>
               <p class="value"><?php echo $user_email; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Parent's Name:</h3>
               <p class="value"><?php echo $parent_name; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Phone Number:</h3>
               <p class="value"><?php echo $phone_number; ?></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="profile-item">
               <h3 class="label">Date of Birth:</h3>
               <p class="value"><?php echo $date_of_birth; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Address:</h3>
               <p class="value"><?php echo $address; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Total Credits Completed:</h3>
               <p class="value"><?php echo $total_credits_completed; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">CGPA:</h3>
               <p class="value"><?php echo $cgpa; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Department:</h3>
               <p class="value"><?php echo $department; ?></p>
            </div>
            <div class="profile-item">
               <h3 class="label">Chosen Subjects:</h3>
               <p class="value"><?php echo $chosen_subjects; ?></p>
            </div>
         </div>
      </div>
   </div>
</section>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

</body>
</html>
