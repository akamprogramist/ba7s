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
foreach ($carshow as $row) {
    if (isset($_POST['submit'])) {
        $fromdate = $_POST['fromdate'];
        $todate =  $_POST['todate'];
        $carname = $row['carname'];
        $sql = "INSERT INTO rent (fromdate, todate,carname)VALUES ('$fromdate','$todate','$carname') ";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Car rented successfully")</script>';
        }
    }
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
                <form method="POST">
                    <p>get this car </p>
                    <div class="avacontainer">
                        <div class="textcon">
                            <p> from </p>
                            <input type="date" name="fromdate" style="margin-right: 5px;margin-left: 5px;" id="fromdate" placeholder="from">
                            <p> to </p>
                            <input type="date" name="todate" style="margin-left: 5px;" id="todate" placeholder="to">
                            <input type="submit" name="submit" class="btn btn-dark w-100" />
                        </div>
                    </div>
                </form>
            </div>


        <?php endforeach; ?>
    </div>
</section>

<?php
require 'footer.php'
?>