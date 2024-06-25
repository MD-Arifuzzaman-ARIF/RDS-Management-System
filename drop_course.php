<?php

include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function getCourseAndUserID() {
        $course_id = $_POST["course_id"];
        $user_id = $_POST["user_id"];
        return array("course_id" => $course_id, "user_id" => $user_id);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formData = getCourseAndUserID();
        $course_id = $formData["course_id"];
        $user_id = $formData["user_id"];
}
    
    $query = "DELETE FROM advising WHERE course_id = '$course_id' AND user_id = '$user_id'";
    if (mysqli_query($conn, $query)) {
        echo "Advising information dropped successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request method!";
}

$conn->close();
?>