<?php
require 'dashboard/config.php';
?>
<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $results = mysqli_query($conn, "SELECT * FROM parts WHERE partname LIKE '%"  . $search .  "%' ");
    $parts = mysqli_fetch_all($results, MYSQLI_ASSOC);
} else {
    $sql = 'SELECT * FROM parts';
    $result = mysqli_query($conn, $sql);
    $parts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<?php
require 'header.php'
?>


<section>

    <div class="containers">
        <div class="view">
            <h1 class="title">We have all types of Parts</h1>
            <form action="parts.php" method="POST">
                <input class="search" type="search" placeholder="search" name="search" id="search">
                <button class="searchbutton" type="submit" name="submit">search</button>
            </form>
        </div>
        <div class="grid">

            <?php foreach ($parts as $item) : ?>
                <div class="cars">
                    <?php if (empty($parts)) : ?>
                        <p>There is no Parts</p>
                    <?php endif; ?>
                    <img class="img" src="<?php echo 'img/' . $item['image']; ?>" alt="">
                    <div class="text">
                        <h1 class="title"><?php echo $item['partname'] ?></h1>
                        <div class="year-container">
                            <span>$<?php echo $item['price'] ?></span>
                            <i class='bx bxs-star'>(<?php echo $item['review'] ?> Reviews)</i>

                        </div>
                        <div class="year-container">
                            <a href="partspage.php?id=<?php echo $item['id']; ?>" class="buy">View Details</a>
                            <a href="#" class="buy button">Buy Now</a>
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