<?php
require 'dashboard/config.php';
?>
<?php
$id = $_GET['id'];
$results = mysqli_query($conn, "SELECT * FROM parts WHERE id='$id'");
$parts = mysqli_fetch_all($results, MYSQLI_ASSOC);

?>

<?php
require 'header.php'
?>


<section>

    <div class="eachcon">
        <?php foreach ($parts as $item) : ?>
            <div class="imgcon">
                <img class="image" src="<?php echo 'img/' . $item['image']; ?>" alt="">
            </div>
            <div class="textcon">
                <div class="namecon">
                    <h1 class="eachtitle"><?php echo $item['partname'] ?></h1>
                    <div class="avacontainer">
                        <p><?php echo $item['review'] ?> Reviews</p>
                    </div>
                </div>
                <div class="avacontainer">
                    <p class="money"><?php echo $item['price'] ?> $</p>
                    <button class="eachbtn">get the part</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
require 'footer.php'
?>