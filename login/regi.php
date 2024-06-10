<?php  
session_start();
include('../help/connect.php');

$errors = array();

if(isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($connection ,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection ,$_POST['lastname']);
    $username = mysqli_real_escape_string($connection ,$_POST['username']);
    $password_1 = mysqli_real_escape_string($connection ,$_POST['password_1']);

    if (empty($firstname)) {
        array_push($errors, "ใส่ชื่อ ");
    }
    if (empty($lastname)) {
        array_push($errors, "ใส่นามสกุล ");
    }
    if (empty($username)) {
        array_push($errors, "ใส่ username ");
    }
    if (empty($password_1)) {
        array_push($errors, "ใส่ password ");
    }


    $user_check = 
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
<h1>php</h1>

</body>
</html>