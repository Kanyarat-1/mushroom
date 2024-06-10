<?php 
session_start();

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

<form method="POST" action="login_check.php">

<div class="input-group">
    <label for="username">Username</label>
    <input type="text" name="Username" required>
</div>

<div class="input-group">
    <label for="password">Password</label>
    <input type="password" name="password" required>
</div>

<div>

<?php
if(isset($_SESSION["Error"])){
    echo "<div class='text-danger'>";
    echo $_SESSION["Error"];
    echo "</div>";
}
$_SESSION['Error'] ="";
?>

</div>

<div class="input-group">
    <button type="submit" name="submit" class="btn btn-success">login</button>
</div>
<p> <a href="register.php">Sign up</a></p>

 </form>

</body>
</html>