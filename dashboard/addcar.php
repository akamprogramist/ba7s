<?php
require 'config.php';
if (!empty($_SESSION["id"]) && $_SESSION['type'] === '1') {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: ../login.php");
}
$carname = '';
$carnameErr =  $imgErr = '';

if (isset($_POST['submit'])) {
    // to upload image ti img folder
    $targetDir = "../img/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    if (empty($_POST['carname'])) {
        $carnameErr = 'carname is required';
    } else {
        $carname = filter_input(INPUT_POST, 'carname', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_FILES["file"]["name"])) {
        $imgErr = 'image is required';
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    }

    if (empty($carnameErr) && empty($imgErr)) {
        $sql = "INSERT INTO carshow (carname, image)VALUES ('$carname','$fileName') ";
        if (mysqli_query($conn, $sql)) {
            header('Location:index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
</head>

<body>
    <h1>Add Cars</h1>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="carname" class="form-label">Part Name</label>
            <input type="text" class="form-control <?php echo $carnameErr ? 'is-invalid' : null ?>" id="carname" name="carname" placeholder="Enter part name" />
            <div class="invalid-feedback">
                <?php echo $carnameErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <input type="file" name="file" class="form-control <?php echo $imgErr ? 'is-invalid' : null ?>" />
            <div class="invalid-feedback">
                <?php echo $imgErr; ?>
            </div>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>

</body>

</html>