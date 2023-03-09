<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}

if (isset($_POST["submit"])) {
    $name = $_POST["carname"];
    if ($_FILES["image"]["error"] == 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
        } else if ($fileSize > 1000000) {
            echo
            "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'img/' . $newImageName);
            $query = "INSERT INTO carshow VALUES('', '$name', '$newImageName')";
            mysqli_query($conn, $query);
            echo
            "
      <script>
        alert('Successfully Added');
      </script>
      ";
        }
    }
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
    <a href="logout.php">Logout</a><br> <br>
    <a href="addcar.php">add a car</a><br> <br>
    <a href="addpart.php">add a part</a><br> <br>
    <a href="addblog.php">add a blog</a><br> <br>
    <a href="viewcar.php">view cars</a><br> <br>
    <a href="viewpart.php">view parts</a><br> <br>
    <a href="viewblog.php">view blogs</a><br> <br>

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
    </form> -->
</body>

</html>