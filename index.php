<?php
require 'dashboard/config.php';
?>
<?php
$sql = 'SELECT * FROM carshow limit 6';
$result = mysqli_query($conn, $sql);
$carshow = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
$sql = 'SELECT * FROM parts limit 6';
$result = mysqli_query($conn, $sql);
$parts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
$sql = 'SELECT * FROM blog limit 6';
$result = mysqli_query($conn, $sql);
$blog = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
require 'header.php'
?>


<section class="home" id="home">
    <div class="home-text">
        <h1>We Have Everything <br>Your <span>car</span> Need</h1>
        <a href="#" class="buttun">Discover Now</a>
    </div>
</section>
<section>
    <div class="heading">
        <span>All Cars</span>
        <h1>We have all types cars</h1>
    </div>

    <div class="seemore">
        <a href="cars.php" class="see">See All Cars</a>
    </div>
    <div class="cars-container container">
        <?php if (empty($carshow)) : ?>
            <p>There is no Car</p>
        <?php endif; ?>
        <?php foreach ($carshow as $item) : ?>

            <div class="box">
                <a href="carpage.php?id=<?php echo $item['id']; ?>">

                    <img src="<?php echo 'img/' . $item['image']; ?>">
                    <h2><?php echo $item['carname'] ?></h2>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="about container" id="about">
    <div class="about-img">
        <img src="img/about.png" alt="">
    </div>
    <div class="about-text">
        <span>About Us</span>
        <br>
        <h2>Cheap Price With <br>Quality Cars</h2>
        <br>
        <a href="#" class="btn">Learn More</a>
    </div>
</section>
<section class="parts" id="parts">
    <div class="heading">
        <span>What We Offer</span>
        <h2>Our Car Is Always Excellent</h2>

    </div>
    <div class="seemore">
        <a href="parts.php" class="see">See All Parts</a>
    </div>
    <div class="parts-container container">
        <?php if (empty($parts)) : ?>
            <p>There is no Parts</p>
        <?php endif; ?>
        <?php foreach ($parts as $item) : ?>

            <div class="box">
                <img src="<?php echo 'img/' . $item['image']; ?>">
                <h3><?php echo $item['partname'] ?></h3>
                <span>$<?php echo $item['price'] ?></span>
                <i class='bx bxs-star'>(<?php echo $item['review'] ?> Reviews)</i>
                <a href="#" class="btn">Buy Now</a>
                <a href="#" class="details">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="blog" id="blog">
    <div class="heading">
        <span>Blog & News</span>
        <h2>Our Blog Content</h2>
        <p>See The Car News Here.</p>
    </div>
    <div class="seemore">
        <a href="blogs.php" class="see">See All Blogs</a>
    </div>
    <div class="blog-container container">
        <?php if (empty($blog)) : ?>
            <p>There is no blog</p>
        <?php endif; ?>
        <?php foreach ($blog as $item) : ?>
            <div class="box">
                <img src="<?php echo 'img/' . $item['image']; ?>">
                <span id="span"><?php echo $item['created_at'] ?></span>
                <h3><?php echo $item['title'] ?></h3>
                <p><?php echo substr($item['description'], 0, 50) ?>...</p>
                <a href="#" id="link" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
        <?php endforeach; ?>
</section>

<?php require 'footer.php' ?>