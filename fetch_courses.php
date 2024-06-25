<?php

include 'database.php';

$query = "SELECT * FROM `offeredcourses`";
$result = mysqli_query($connection, $query);

$courses = array();


while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = $row;
}

echo json_encode($courses);

mysqli_close($connection);
?>