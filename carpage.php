<?php
require 'dashboard/config.php';
?>
<?php
$id = $_GET['id'];
$results = mysqli_query($conn, "SELECT * FROM carshow WHERE id='$id'");
$carshow = mysqli_fetch_all($results, MYSQLI_ASSOC);

?>

<?php
require 'header.php'
?>


<section>

    <div class="eachcon">
        <?php foreach ($carshow as $item) : ?>
            <div class="imgcon">
                <img class="image" src="<?php echo 'img/' . $item['image']; ?>" alt="">
            </div>
            <div class="textcon">
                <div class="namecon">
                    <h1 class="eachtitle"><?php echo $item['carname'] ?></h1>
                    <div class="avacontainer">
                        <p><?php echo $item['year'] ?></p>
                        <p class="dash">|</p>
                        <p><?php echo $item['ava'] ?></p>
                    </div>
                </div>
                <div class="avacontainer">
                    <p class="money"><?php echo $item['price'] ?>$/day</p>
                    <button class="eachbtn">get the car</button>
                </div>
            </div>
            <div class="eachgrid">
                <div class="gridcon">
                    <p class="icons"><i class='bx bxs-cylinder'></i></i></p>
                    <p class="iconname"><?php echo $item['slender'] ?> Selender</p>
                </div>
                <div class="gridcon">
                    <p class="icons"><img src="img/seats.png" style="height: 35px; width: 35px;" class="seats" alt=""></i></p>
                    <p class="iconname"><?php echo $item['seats'] ?> Seats</p>
                </div>
                <div class="gridcon">
                    <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                    <p class="iconname"><?php echo $item['gas'] ?></p>
                </div>
                <div class="gridcon">
                    <p class="icons"><i class='bx bxs-cog'></i></i></p>
                    <p class="iconname"><?php echo $item['automatic'] ?></p>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
require 'footer.php'
?>