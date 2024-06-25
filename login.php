<?php
session_start();
if (isset($_SESSION["user"])) {
    require_once "database.php";
    $userId = $_SESSION["user_id"]; 
    $sql = "SELECT registration_type, email FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $registrationType = $user["registration_type"];
            $_SESSION["email"] = $user["email"]; 
            switch ($registrationType) {
                case "student":
                    header("Location: home.php");
                    break;
                case "teacher":
                    header("Location: teachers.php");
                    break;
                case "admin":
                    header("Location: admin.html");
                    break;
                default:
                    header("Location: login.php");
            }
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    } else {
        
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body{
    padding:50px;
}
.container{
    max-width: 600px;
    margin:0 auto;
    padding:50px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.form-group{
    margin-bottom:30px;
}
</style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($result);
                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        
                        $_SESSION["user"] = $user["full_name"]; 
                        $_SESSION["user_id"] = $user["id"]; 
                        
                        $registrationType = $user["registration_type"];
                        
                        switch ($registrationType) {
                            case "student":
                                header("Location: home.php");
                                break;
                            case "teacher":
                                header("Location: teachers.php");
                                break;
                            case "admin":
                                header("Location: admin.html");
                                break;
                            default:
                               
                                header("Location: login.php");
                        }
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Email does not exist</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Failed to prepare statement</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form><br>
        <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>
