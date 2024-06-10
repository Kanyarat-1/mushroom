<?php 
session_start();

if(!isset($_SESSION['usrname'])) {
    $_SESSION['msg'] = "loginนะ";
    header('location: login.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
<h3>login</h3>
</div>

<div class="content">
    <!--login เข้ามา-->
    <?php 
    if(isset($_SESSION['username'])) :?>
    <p>welcom <strong><?php echo $_SESSION['username']; ?></strong></p> 
    <p><a href="logindex.php?logout='1'" style="color: red;">logout</a></p>
    <?php endif ?>
</div>



</body>
</html>