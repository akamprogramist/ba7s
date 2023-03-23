<?php
require 'dashboard/config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successful'); </script>";
        } else {
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login2.css">
    <title>Registration</title>
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title signup">Signup</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login">
                <input type="radio" name="slide" id="signup" checked>
                <a for="login" class="slide login" href="login.php">Login</a>
                <a for="signup" class="slide signup" href="registration.php">Signup</a>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">

                <!-- the signup form  -->
                <form action="#" method="post" class="signup">

                    <div class="row">
                        <div class="field">
                            <input type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="field">
                            <input type="text" name="username" placeholder="Username" required>
                        </div>

                    </div>

                    <div class="column">
                        <div class="field">
                            <input type="text" name="email" placeholder="Email" required>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="License Number" required>
                        </div>
                    </div>

                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="field">
                        <input type="password" name="confirmpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="submit" value="Signup">
                    </div>
                    <div class="signup-link">already a member? <a href="login.php" style="text-decoration: none;">Login now</a></div>
                </form>
                <a href="login.php">Login</a>
            </div>
        </div>
    </div>
    </form>
    <br>
</body>

</html>