<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
$sql = 'SELECT * FROM blog';
$result = mysqli_query($conn, $sql);
$blog = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM blog WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:viewblog.php');
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
        <h1>Here is list of your blog</h1>
        <thead>
            <tr>
                <?php if (empty($blog)) : ?>
                    <p>There is no blog</p>
                <?php endif; ?>


                <th scope="col">Blog Title</th>
                <th scope="col">Blog Created At</th>
                <th scope="col">Blog description</th>
                <th scope="col">Blog image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blog as $item) : ?>
                <tr>
                    <td><?php echo $item['title'] ?></td>
                    <td><?php echo $item['created_at'] ?></td>
                    <td><?php echo $item['description'] ?></td>
                    <td><img src="<?php echo '../img/' . $item['image']; ?>" width="100px" height="100px" alt=""></td>
                    <td><a href="viewblog.php?delete=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>