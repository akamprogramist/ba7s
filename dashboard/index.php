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
    <a href="../index.php">Home</a><br> <br>
    <a href="../logout.php">Logout</a><br> <br>
    <a href="addcar.php">add a car</a><br> <br>
    <a href="addpart.php">add a part</a><br> <br>
    <a href="addblog.php">add a blog</a><br> <br>
    <a href="viewcar.php">view cars</a><br> <br>
    <a href="viewpart.php">view parts</a><br> <br>
    <a href="viewblog.php">view blogs</a><br> <br>

</body>

</html>