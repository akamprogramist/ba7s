<?php
require 'config.php';
if (!empty($_SESSION["id"]) && $_SESSION['type'] === '1') {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}

$title = $description = '';
$titleErr = $descriptionErr  = $imgErr = '';

if (isset($_POST['submit'])) {
    // to upload image ti img folder
    $targetDir = "../img/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    if (empty($_POST['title'])) {
        $titleErr = 'title is required';
    } else {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_POST['description'])) {
        $descriptionErr = 'description is required';
    } else {
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_FILES["file"]["name"])) {
        $imgErr = 'image is required';
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    }

    if (empty($titleErr) && empty($descriptionErr) && empty($imgErr)) {
        $sql = "INSERT INTO blog (title, description, image)VALUES ('$title','$description','$fileName') ";
        if (mysqli_query($conn, $sql)) {
            header('Location:index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<h1>Add Blog</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="mt-4 w-75">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control <?php echo $titleErr ? 'is-invalid' : null ?>" id="title" name="title" placeholder="Enter Title" />
        <div class="invalid-feedback">
            <?php echo $titleErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="description" class="form-control <?php echo $descriptionErr ? 'is-invalid' : null ?>" id="description" name="description" placeholder="Enter description" />
        <div class="invalid-feedback">
            <?php echo $descriptionErr; ?>
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