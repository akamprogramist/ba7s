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

    <div class="eachcon">
        <div class="imgcon">

            <img class="image" src="img/car1.jpg" alt="">
        </div>
        <div class="textcon">
            <div class="namecon">
                <h1 class="eachtitle">name</h1>
                <div class="avacontainer">
                    <p>2018</p>
                    <p class="dash">|</p>
                    <p>Available</p>
                </div>
            </div>
            <div class="avacontainer">
                <p class="money">100$/day</p>
                <button class="eachbtn">get the car</button>
            </div>
        </div>
        <div class="eachgrid">
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>
            <div class="gridcon">
                <p class="icons"><i class='bx bxs-gas-pump'></i></p>
                <p class="iconname">name</p>
            </div>

        </div>
    </div>
</section>

<?php
require 'footer.php'
?>