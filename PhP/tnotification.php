<?php
session_start();
require 'database.php';
require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_SESSION["user"])) {
   
    $userName = $_SESSION["user"];
} else {
   
    header("Location: login.php");
    exit;
}


$courses = [];
$sql = "SELECT course_id, course_name FROM courses";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $message_text = $_POST['message'];


    $sql = "INSERT INTO notification (course_id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $course_id, $message_text);
    if ($stmt->execute()) {
        
        $email = 'mdarifuzzamanarif1999@gmail.com';

        $mail = new PHPMailer(true);

        try {
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'mdarifuzzamanarif1999@gmail.com'; 
            $mail->Password = 'prwv ieyn gkue mcuc'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            
            $mail->setFrom('mdarifuzzamanarif1999@gmail.com', 'Your Name');
            $mail->addAddress($email);

            
            $mail->isHTML(true);
            $mail->Subject = 'Course Notification';
            $mail->Body = $message_text;

            $mail->send();
            $message = "Notification sent successfully.";
        } catch (Exception $e) {
            $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $message = "Error: " . $conn->error;
    }
}
$conn->close();
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
     
      .notification-title {
         text-align: center;
         margin-top: 30px; 
         color: #3806bf; 
         font-size: 24px; 
      }

      .notification-form {
         max-width: 600px;
         margin: 0 auto;
         padding: 20px;
         background-color: #f9f9f9;
         border: 1px solid #ddd;
         border-radius: 5px;
      }

      .notification-form select, .notification-form textarea {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ccc;
         border-radius: 5px;
      }

      .notification-form button {
         padding: 10px 20px;
         background-color: #3806bf;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .success-message {
         text-align: center;
         color: green;
         margin-top: 20px;
      }
   </style>
</head>
<body>

<header class="header">
   <section class="flex">
      <a href="teachers.html" class="logo">Educa.</a>
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
         <p class="role">teacher</p>
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
      <p class="role">teacher</p>
      <a href="teachers.php" class="btn">Home</a>
      
 </div>
   <nav class="navbar">
   </nav>
</div>

<div class="notification-title">
   <h1>Notification</h1>
</div>

<section class="home-grid" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%)">
   <section class="notification">
      <form class="notification-form" method="post" action="tnotification.php">
         <label for="course_id">Select Course:</label>
         <select name="course_id" id="course_id" required>
            <?php foreach ($courses as $course): ?>
               <option value="<?php echo $course['course_id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></option>
            <?php endforeach; ?>
         </select>

         <label for="message">Notification Message:</label>
         <textarea name="message" id="message" rows="5" required></textarea>

         <button type="submit">Send Notification</button>
      </form>
   </section>
</section>

<?php if ($message): ?>
<div class="success-message">
   <?php echo htmlspecialchars($message); ?>
</div>
<?php endif; ?>

<footer class="footer">
   &copy; Designed by Group-2 | all rights reserved!
</footer>

<script src="js/script.js"></script>

</body>
</html>