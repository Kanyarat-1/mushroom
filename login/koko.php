<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-light ">

<div class=" h4 text-center alert alert-success mb-4 mt-4" role="alert">
Register
</div>

<form method="POST" action="insert_register.php">
ชื่อ <input type="text" name="firstname" class="form-control" required> <br>
นามสกุล <input type="text" name="lastname" class="form-control" required> <br>
Username <input type="text" name="Username" maxlength="15" class="form-control" required> <br>
Password <input type="password" name="password" maxlength="15" class="form-control" required> <br>

<button type="submit" name="submit" class="btn btn-success">บันทึก</button>
<a href="login.php" name="cancel" class="btn btn-danger" role="button">ยกเลิก</a>

<a href="login.php"> Login </a>


 </form>
    </div>
    </div>
    </div>

</body>
</html>