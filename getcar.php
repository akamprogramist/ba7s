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

<?php
$GLOBALS["value"] = $value;
foreach ($carshow as $row) {
    if (isset($_POST['submit'])) {
        $value = $_POST['select'];
        $GLOBALS["value"] = $value;
    }
    $carname = $row['carname'];
    $price = $GLOBALS["value"] * $row['price'];
    $GLOBALS["price"] = $price;
    $GLOBALS["carname"] = $row['carname'];
}

if (array_key_exists('rent', $_POST)) {
    rent($conn);
}

$_SESSION['price'] = $GLOBALS["price"];
$_SESSION['value'] = $GLOBALS["value"];
$_SESSION['carname'] = $GLOBALS["carname"];
function rent($conn)
{
    $price = $_SESSION["price"];
    $value = $_SESSION["value"];
    $carname = $_SESSION["carname"];
    echo '<script>alert("the car rented for ' . $value . ' days with the price of ' . $price . ' $ successfully ")</script>';
    $sql = "INSERT INTO rent (days, money,carname)VALUES ('$value','$price','$carname') ";
    mysqli_query($conn, $sql);
}

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
                </div>
                <div class="avacontainer">
                    <p class="money"><?php echo $item['price'] ?>$/day</p>
                </div>
            </div>
            <div class="eachgrid">
                <form method="post">
                    <div class="avacontainer">
                        <div class="textcon">
                            <p>get this car for </p>
                            <select name="select" id="select" class="select">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                            <p>days</p>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn">calculate</button>

                </form>
            </div>
            <div class="textcon">
                <p> the car for <?php echo $GLOBALS["value"] ?> days is <?php echo $GLOBALS["price"] ?> $</p>
            </div>
            <div class="textcon">

                <form method="post">
                    <div><input type="submit" name="rent" class="eachbtn" value="Rent This Car"></input></div>
                </form>
            </div>

        <?php endforeach; ?>
    </div>
</section>

<?php
require 'footer.php'
?>