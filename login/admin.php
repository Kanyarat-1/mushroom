<?php 
session_start();
if(!isset($_SESSION['username']))
    header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

</head>
<body>
    <div class="container">
    <div class=" h4 text-center alert alert-success mb-4 mt-4" role="alert">
Welcome to Admin
</div>

<br><br>
<h3>Admin</h3>

<?php 
if(isset($_SESSION["firstname"])){
    echo "<div class='text-dark'> ";
    echo $_SESSION["firstname"] ." " . $_SESSION["lastname"];
    echo "</div>";
}
?>

<a href="logout.php"> Logout </a>
    </div>
    
</body>
</html>