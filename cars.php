<?php
require 'dashboard/config.php';
?>
<?php
$sql = 'SELECT * FROM carshow';
$result = mysqli_query($conn, $sql);
$carshow = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

    <section>
        <section class="cars" id="cars"></section>
        <div class="heading">
            <span>View All Cars</span>
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
        </div>
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
</body>

</html>