<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 badge text-bg-light">
<div class=" h4 text-center alert alert-success mb-4 mt-4" role="alert">
Login
</div>

<form method="POST" action="login_check.php">
<input type="text" name="Username" class="form-control" required placeholder="Username"> <br>
<input type="password" name="password" class="form-control" required placeholder="Password"> <br>

<?php 
if(isset($_SESSION["Error"])){
    echo "<div class='text-danger'>";
    echo $_SESSION["Error"];
    echo "</div>";
}
$_SESSION['Error'] ="";
?>

<input type="submit" name="submit" value="Login" class="btn btn-success"><br><br>

<a href="register.php"> register </a>

</form>

            </div>
        </div>


</div>


</body>
</html>