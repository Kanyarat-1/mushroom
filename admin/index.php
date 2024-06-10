<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mushroom show</title>
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'me.php'; ?>

    <div class="container mt-4">
        <h3>หน้าแรก</h3>
    </div>
    
</body>
</html>