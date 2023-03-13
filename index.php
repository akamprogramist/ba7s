<?php
require 'dashboard/config.php';
?>
<?php
$sql = 'SELECT * FROM carshow';
$result = sqlsrv_query($conn, $sql);
$carshow = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>
<?php
$sql = 'SELECT * FROM parts';
$result = sqlsrv_query($conn, $sql);
$parts = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>
<?php
$sql = 'SELECT * FROM blog';
$result = sqlsrv_query($conn, $sql);
$blog = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header>
        <div class="nav container">
            <i class='bx bx-menu' id="menu-icon"></i>
            <a href="#" class="logo">Car<span>point</span></a>
            <ui class="navbar">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#cars">Cars</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#parts">Parts</a></li>
                <li><a href="#blog">Our Blog</a></li>
                <li><a href="login.html">Login</a></li>
            </ui>
            <i class='bx bx-search' id="search-icon"></i>
            <div class="search-box container">
                <input type="search" name="" id="" placeholder="Search here...">
            </div>
            <!-- <div class="lang-menu">
                <div class="selected-lang">
                  English
              <ul>
                  <li>
                      <a href="" class="us">English</a>
                  </li>
                  <li>
                      <a href="" class="ae">Arabic</a>
                  </li>
              </ul> -->
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
                </div>
            <?php endforeach; ?>
            <!-- <div class="box">
                <img src="img/car2.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car4.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car5.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car6.jpg" alt="">
                <h2>Porche Car</h2>
            </div> -->
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
            <!-- <div class="box">
                <img src="img/part2.png" alt="">
                <h3>Auto Spare Parts</h3>
                <span>$120.99</span>
                <i class='bx bxs-star'>(6 Reviews)</i>
                <a href="#" class="btn">Buy Now</a>
                <a href="#" class="details">View Details</a>
            </div>
            <div class="box">
                <img src="img/part3.png" alt="">
                <h3>Auto Spare Parts</h3>
                <span>$120.99</span>
                <i class='bx bxs-star'>(6 Reviews)</i>
                <a href="#" class="btn">Buy Now</a>
                <a href="#" class="details">View Details</a>
            </div>
            <div class="box">
                <img src="img/part4.png" alt="">
                <h3>Auto Spare Parts</h3>
                <span>$120.99</span>
                <i class='bx bxs-star'>(6 Reviews)</i>
                <a href="#" class="btn">Buy Now</a>
                <a href="#" class="details">View Details</a>
            </div>
            <div class="box">
                <img src="img/part5.png" alt="">
                <h3>Auto Spare Parts</h3>
                <span>$120.99</span>
                <i class='bx bxs-star'>(6 Reviews)</i>
                <a href="#" class="btn">Buy Now</a>
                <a href="#" class="details">View Details</a>
            </div>
            <div class="box">
                <img src="img/part6.png" alt="">
                <h3>Auto Spare Parts</h3>
                <span>$120.99</span>
                <i class='bx bxs-star'>(6 Reviews)</i>
                <a href="#" class="btn">Buy Now</a>
                <a href="#" class="details">View Details</a>
            </div> -->
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
            <!-- <div class="box">
                <img src="img/car4.jpg" alt="">
                <span id="span">Dec 14 2022</span>
                <h3>What is the best car on this day</h3>
                <p>See the best cars here.</p>
                <a href="#" id="link" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <span id="span">Dec 14 2022</span>
                <h3>property about the AUDI car</h3>
                <p>know aboute the AUDI car.</p>
                <a href="#" id="link" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div> -->
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