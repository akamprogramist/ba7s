<?php
require 'dashboard/config.php';
?>
<?php
$sql = 'SELECT * FROM carshow';
$result = mysqli_query($conn, $sql);
$carshow = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
$sql = 'SELECT * FROM parts';
$result = mysqli_query($conn, $sql);
$parts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
$sql = 'SELECT * FROM blog';
$result = mysqli_query($conn, $sql);
$blog = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="nav container">
            <i class='bx bx-menu' id="menu-icon"></i>
            <a href="#" class="logo">Car<span>point</span></a>
            <ui class="navbar">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="cars.php">Cars</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#parts">Parts</a></li>
                <li><a href="#blog">Our Blog</a></li>
                <?php if (!empty($_SESSION["id"]) && $_SESSION['type'] === '1') : ?>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="dashboard/index.php">Manage</a></li>
                <?php elseif (!empty($_SESSION["id"]) && $_SESSION['type'] === '0') : ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ui>
            <i class='bx bx-search' id="search-icon"></i>
            <div class="search-box container">
                <input type="search" name="" id="" placeholder="Search here...">
            </div>
        </div>
        </div>
    </header>

    <section class="home" id="home">
        <div class="home-text">
            <h1>We Have Everything <br>Your <span>car</span> Need</h1>
            <a href="#" class="buttun">Discover Now</a>
        </div>
    </section>
    <section>
        <section class="cars" id="cars"></section>
        <div class="heading">
            <span>All Cars</span>
            <h1>We have all types cars</h1>
        </div>
        <div class="cars-container container">
            <?php if (empty($carshow)) : ?>
                <p>There is no Car</p>
            <?php endif; ?>
            <?php foreach ($carshow as $item) : ?>

                <div class="box">
                    <img src="<?php echo 'img/' . $item['image']; ?>">
                    <h2><?php echo $item['carname'] ?></h2>
                    <h3>this is a new div</h3>
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
        <div class="blog-container container">
            <?php if (empty($blog)) : ?>
                <p>There is no blog</p>
            <?php endif; ?>
            <?php foreach ($blog as $item) : ?>
                <div class="box">

                    <img src="<?php echo 'img/' . $item['image']; ?>">
                    <span id="span"><?php echo $item['created_at'] ?></span>
                    <h3><?php echo $item['title'] ?></h3>
                    <p><?php echo $item['description'] ?></p>
                    <a href="#" id="link" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
                </div>
            <?php endforeach; ?>

    </section>
    <section class="footer">
        <div class="footer-container container">
            <div class="footer-box">
                <a href="#" class="logo">Car<span>Point</span></a>
                <div class="social">
                    <a href="https://www.facebook.com/Yahia.1221?mibextid=LQQJ4d"><i class='bx bxl-facebook'></i></a>
                    <a href="https://twitter.com/YahiaNazm?t=PpEpG1p7xBF0fyJZJLBgxg&s=09"><i class='bx bxl-twitter'></i></a>
                    <a href="https://instagram.com/yahiay__haji?igshid=YmMyMTA2M2Y="><i class='bx bxl-instagram'></i></a>
                    <a href="https://youtube.com/@yahiayhaji4734"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
            <div class="footer-box">
                <h3>Page</h3>
                <a href="#">Home</a>
                <a href="#">cars</a>
                <a href="#">Parts</a>
                <a href="#">Our blog</a>
            </div>
            <div class="footer-box">
                <h3>Legal</h3>
                <a href="#">Privacy</a>
                <a href="#">Refund Policy</a>
                <a href="#">Cookia Policy</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <p>Kifri</p>
                <p>Qladiza</p>
                <p>Ghanaqin</p>
                <p>Sharazwr</p>
            </div>
        </div>
    </section>
    <div class="copyright">
        <p>&#169; CarpoolVenom All Right Reserved</p>
    </div>
    <script src="main.js"></script>
</body>

</html>