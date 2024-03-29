<?php
require 'config.php';
if (!empty($_SESSION["id"]) && $_SESSION['type'] === '1') {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: ../login.php");
}
$carnameErr =  $imgErr = $yearErr = $priceErr = $seatsErr  = '';

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
    if (empty($_POST['year'])) {
        $yearErr = 'year is required';
    } else {
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['price'])) {
        $priceErr = 'price is required';
    } else {
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['seats'])) {
        $seatsErr = 'seats is required';
    } else {
        $seats = filter_input(
            INPUT_POST,
            'seats',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    $slender = filter_input(INPUT_POST, 'slender', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($_POST['ava'])) {
        $avaErr = 'ava is required';
    } else {
        $ava = filter_input(
            INPUT_POST,
            'ava',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }
    if (empty($_POST['gas'])) {
        $gasErr = 'gas is required';
    } else {
        $gas = filter_input(
            INPUT_POST,
            'gas',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }
    if (empty($_POST['automatic'])) {
        $automaticErr = 'automatic is required';
    } else {
        $automatic = filter_input(
            INPUT_POST,
            'automatic',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    if (empty($_FILES["file"]["name"])) {
        $imgErr = 'image is required';
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    }

    if (empty($carnameErr) && empty($imgErr) && empty($yearErr) && empty($priceErr) && empty($seatsErr) && empty($slenderErr) && empty($avaErr) && empty($gasErr) && empty($automaticErr)) {
        $sql = "INSERT INTO carshow (carname, image,year,price,slender,seats,ava,gas,automatic)VALUES ('$carname','$fileName','$year','$price','$slender','$seats','$ava','$gas','$automatic') ";
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
            <label for="carname" class="form-label">Car Name</label>
            <input type="text" class="form-control <?php echo $carnameErr ? 'is-invalid' : null ?>" id="carname" name="carname" placeholder="Enter Car Name" />
            <div class="invalid-feedback">
                <?php echo $carnameErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">year</label>
            <input type="number" class="form-control <?php echo $yearErr ? 'is-invalid' : null ?>" id="year" name="year" placeholder="Enter year" />
            <div class="invalid-feedback">
                <?php echo $yearErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price a day</label>
            <input type="number" class="form-control <?php echo $priceErr ? 'is-invalid' : null ?>" id="price" name="price" placeholder="Enter price" />
            <div class="invalid-feedback">
                <?php echo $priceErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="slender" class="form-label">slender</label>
            <input type="number" class="form-control" id="slender" name="slender" placeholder="Enter slender number" />
        </div>

        <div class="mb-3">
            <label for="seats" class="form-label">seats</label>
            <input type="number" class="form-control <?php echo $seatsErr ? 'is-invalid' : null ?>" id="seats" name="seats" placeholder="Enter seats" />
            <div class="invalid-feedback">
                <?php echo $seatsErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="ava" class="form-label">available or not</label>
            <select name="ava" id="ava">
                <option value="available">available</option>
                <option value="not available">not available</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gas" class="form-label">gas or electric</label>
            <select name="gas" id="gas">
                <option value="gas">gasilable</option>
                <option value="electric">electric</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="automatic" class="form-label">automatic or manual</label>
            <select name="automatic" id="automatic">
                <option value="automatic">automatic</option>
                <option value="manual">manual</option>
            </select>
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