<?php
require 'dashboard/config.php';
?>
<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $results = mysqli_query($conn, "SELECT * FROM carshow WHERE carname LIKE '%"  . $search .  "%' ");
    $carshow = mysqli_fetch_all($results, MYSQLI_ASSOC);
} else {
    $sql = 'SELECT * FROM carshow';
    $result = mysqli_query($conn, $sql);
    $carshow = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<?php
require 'header.php'
?>


<section>

    <div class="containers">
        <div class="view">
            <h1 class="title">We have all types cars</h1>
            <form action="cars.php" method="POST">
                <input class="search" type="search" placeholder="search" name="search" id="search">
                <button class="searchbutton" type="submit" name="submit">search</button>
            </form>
        </div>
        <div class="grid">

            <?php foreach ($carshow as $item) : ?>
                <div class="cars">
                    <?php if (empty($carshow)) : ?>
                        <p>There is no Cars</p>
                    <?php endif; ?>
                    <img class="img" src="<?php echo 'img/' . $item['image']; ?>" alt="">
                    <div class="text">
                        <h1 class="title"><?php echo $item['carname'] ?></h1>
                        <div class="year-container">
                            <h5 class="year"><?php echo $item['year'] ?></h5>
                            <h5 class="loan"><?php echo $item['price'] ?>$/day</h5>
                        </div>
                        <div class="ava">
                            <h5><?php echo $item['ava'] ?></h5>
                        </div>
                        <a href="carpage.php?id=<?php echo $item['id']; ?>" class="buy">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require 'footer.php'
?>