<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="cars.css">
</head>

<body>

    <header>
        <div class="nav container">
            <i class='bx bx-menu' id="menu-icon"></i>
            <a href="#" class="logo">Car<span>point</span></a>
            <ui class="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="cars.php">Cars</a></li>
                <li><a href="parts.php">Parts</a></li>
                <li><a href="blog.php">Our Blog</a></li>
                <li><a href="about.php">About</a></li>
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