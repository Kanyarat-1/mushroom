<?php
// Your database connection setup should be above the usage
$hostname = "localhost";
$username = "root";
$password = "";
$database = "arisa";
$port = 3306;

mysqli_report(MYSQLI_REPORT_OFF);
$connection = mysqli_connect($hostname, $username, $password, $database, $port);
if (!$connection) {
    die ("ไม่ได้ เพราะ" . mysqli_connect_error());
}
?>