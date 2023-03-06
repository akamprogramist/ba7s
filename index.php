<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Index</title>
</head>

<body>
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <a href="logout.php">Logout</a>

    <form class="" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <label for="namecar">Car Name : </label>
        <input type="text" name="namecar" id="namecar" required value=""> <br>
        <label for="img">Image : </label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required> <br>
        <button type="submit" name="submit">Add Car</button>
    </form>

    <!-- <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" required value=""> <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required value=""> <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <label for="confirmpassword">Confirm Password : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
        <button type="submit" name="submit">Register</button>
    </form>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" required value=""> <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required value=""> <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <label for="confirmpassword">Confirm Password : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
        <button type="submit" name="submit">Register</button>
    </form> -->
</body>

</html>