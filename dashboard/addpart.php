<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}

$partname = $price = $review  = '';
$partnameErr = $priceErr = $reviewErr = $imgErr = '';

if (isset($_POST['submit'])) {
    // to upload image ti img folder
    $targetDir = "../img/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    if (empty($_POST['partname'])) {
        $partnameErr = 'Partname is required';
    } else {
        $partname = filter_input(INPUT_POST, 'partname', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_POST['price'])) {
        $priceErr = 'price is required';
    } else {
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_POST['review'])) {
        $reviewErr = 'review is required';
    } else {
        $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_FILES["file"]["name"])) {
        $imgErr = 'image is required';
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    }

    if (empty($partnameErr) && empty($priceErr) && empty($reviewErr) && empty($imgErr)) {
        $sql = "INSERT INTO parts (partname, price, review, image)VALUES ('$partname','$price','$review','$fileName') ";
        if (mysqli_query($conn, $sql)) {
            header('Location:index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<h1>Add Parts</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="mt-4 w-75">
    <div class="mb-3">
        <label for="partname" class="form-label">Part Name</label>
        <input type="text" class="form-control <?php echo $partnameErr ? 'is-invalid' : null ?>" id="partname" name="partname" placeholder="Enter part name" />
        <div class="invalid-feedback">
            <?php echo $partnameErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="price" class="form-control <?php echo $priceErr ? 'is-invalid' : null ?>" id="price" name="price" placeholder="Enter price" />
        <div class="invalid-feedback">
            <?php echo $priceErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">review</label>
        <input class="form-control <?php echo $reviewErr ? 'is-invalid' : null ?>" id="review" name="review" placeholder="Enter your feedback" />
        <div class="invalid-feedback">
            <?php echo $reviewErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="file" name="file" class="form-control <?php echo $imgErr ? 'is-invalid' : null ?>" />
        <div class="invalid-feedback">
            <?php echo $imgErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" class="btn btn-dark w-100" />
    </div>
</form>