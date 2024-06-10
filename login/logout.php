<?php 

// กด logout แล้วจะปิดsessionทั้งหมดแล้วจะไปหน้า login
session_start();
session_destroy();
header("location: login.php")

?>
