<?php
require 'dashboard/config.php';
?>
<?php
$sql = 'SELECT * FROM carshow';
$result = mysqli_query($conn, $sql);
$carshow = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
require 'header.php'
?>


<section>

    <div class="containers">
        <div class="view">
            <h1>We have all types cars</h1>
        </div>
        <div class="grid">

            <?php foreach ($carshow as $item) : ?>
                <div class="cars">
                    <?php if (empty($carshow)) : ?>
                        <p>There is no Parts</p>
                    <?php endif; ?>
                    <img src="img/car1.jpg" alt="">
                    <div class="text">
                        <h1 class="title"><?php echo $item['carname'] ?></h1>
                        <div class="year-container">
                            <h5 class="year"><?php echo $item['year'] ?></h5>
                            <h5 class="loan"><?php echo $item['price'] ?>$/day</h5>
                        </div>
                        <div class="ava">
                            <h5><?php echo $item['ava'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require 'footer.php'
?>