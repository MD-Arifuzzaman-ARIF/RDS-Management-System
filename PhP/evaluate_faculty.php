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
