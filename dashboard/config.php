
 <?php
   //  session_start();
   //  $conn = mysqli_connect("localhost", "root", "", "reglog");

   $serverName = "AKAM";

   $connection = array("Database" => "reglog");
   $conn = sqlsrv_connect($serverName, $connection);

   if ($conn) {
      echo "Connection established.<br />";
   } else {
      echo "Connection could not be established.<br />";
      die(print_r(sqlsrv_errors(), true));
   }
   ?>