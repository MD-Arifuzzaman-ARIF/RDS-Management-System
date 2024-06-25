<?php

require_once "database.php";

if (isset($_POST["query"])) {
    $searchQuery = mysqli_real_escape_string($conn, $_POST["query"]);
    $sql = "SELECT * FROM courses WHERE course_code LIKE '%$searchQuery%' OR course_name LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='box'>";
            echo "<h2 class='title'>" . htmlspecialchars($row['course_code']) . " - " . htmlspecialchars($row['course_name']) . "</h2>";
            echo "<p class='description'>" . htmlspecialchars($row['course_description']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<div class='box'>";
        echo "<h2 class='title'>No matching courses found.</h2>";
        echo "</div>";
    }

    mysqli_close($conn);
}
?>
