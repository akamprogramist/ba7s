<?php
require 'config.php';
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
$sql = 'SELECT * FROM carshow';
$result = mysqli_query($conn, $sql);
$carshow = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM carshow WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:viewcar.php');
    } else {
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <table>
        <h1>Here is list of your Cars</h1>
        <thead>
            <tr>
                <?php if (empty($carshow)) : ?>
                    <p class="lead mt3">There is no carshow</p>
                <?php endif; ?>


                <th scope="col">Car Name</th>
                <th scope="col">Car Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carshow as $item) : ?>
                <tr>

                    <td><?php echo $item['carname'] ?></td>
                    <td><img src="<?php echo '../img/' . $item['image']; ?>" width="100px" height="100px" alt=""></td>
                    <td><a href="viewcar.php?delete=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>