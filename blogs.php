<?php
require 'dashboard/config.php';
?>
<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $results = mysqli_query($conn, "SELECT * FROM blog WHERE title LIKE '%"  . $search .  "%' ");
    $blog = mysqli_fetch_all($results, MYSQLI_ASSOC);
} else {
    $sql = 'SELECT * FROM blog';
    $result = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<?php
require 'header.php'
?>


<section>

    <div class="containers">
        <div class="view">
            <h1 class="title">Our Blogs</h1>
            <form action="cars.php" method="POST">
                <input class="search" type="search" placeholder="search" name="search" id="search">
                <button class="searchbutton" type="submit" name="submit">search</button>
            </form>
        </div>

        <div class="grid">

            <?php foreach ($blog as $item) : ?>
                <div class="cars">
                    <?php if (empty($blog)) : ?>
                        <p>There is no Parts</p>
                    <?php endif; ?>
                    <img class="img" src="<?php echo 'img/' . $item['image']; ?>" alt="">
                    <div class="text">
                        <h1 class="title"><?php echo $item['title'] ?></h1>
                        <div>
                            <h5><?php echo substr($item['description'], 0, 50) ?>...</h5>
                        </div>
                        <div class="year-container">
                            <h5 class="loan"><?php echo $item['created_at'] ?></h5>
                        </div>

                        <div class="blogbutton">
                            <a href="#" id="link" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
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