<?php
require 'dashboard/config.php';
?>
<?php
$id = $_GET['id'];
$results = mysqli_query($conn, "SELECT * FROM blog WHERE id='$id'");
$blog = mysqli_fetch_all($results, MYSQLI_ASSOC);

?>

<?php
require 'header.php'
?>


<section>

    <div class="eachcon">
        <?php foreach ($blog as $item) : ?>
            <div class="imgcon">
                <img class="image" src="<?php echo 'img/' . $item['image']; ?>" alt="">
            </div>
            <div class="textcon">
                <div class="namecon">
                    <h1 class="eachtitle"><?php echo $item['title'] ?></h1>
                </div>
                <div class="avacontainer">
                    <p class="money"><?php echo $item['created_at'] ?></p>
                    <button class="eachbtn">get the car</button>
                </div>
            </div>
            <p><?php echo $item['description'] ?></p>


    </div>
<?php endforeach; ?>
</div>
</section>

<?php
require 'footer.php'
?>