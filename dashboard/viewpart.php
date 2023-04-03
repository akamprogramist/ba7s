<?php
require 'config.php';
if (!empty($_SESSION["id"]) && $_SESSION['type'] === '1') {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: ../login.php");
}
$sql = 'SELECT * FROM parts';
$result = mysqli_query($conn, $sql);
$parts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM parts WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:viewpart.php');
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
        <h1>Here is list of your parts</h1>
        <thead>
            <tr>
                <?php if (empty($parts)) : ?>
                    <p class="lead mt3">There is no parts</p>
                <?php endif; ?>


                <th scope="col">Part Name</th>
                <th scope="col">Part Price</th>
                <th scope="col">Part Review</th>
                <th scope="col">Part image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parts as $item) : ?>
                <tr>

                    <td><?php echo $item['partname'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo $item['review'] ?></td>
                    <td><img src="<?php echo '../img/' . $item['image']; ?>" width="100px" height="100px" alt=""></td>
                    <td><a href="viewpart.php?delete=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>