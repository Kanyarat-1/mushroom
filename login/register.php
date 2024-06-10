<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="style.css">
    
</head>
<body>

<div class="header">
<h3>Register</h3>
</div>

<form method="POST" action="insert_register.php">
<div class="input-group">
    <label for="firstname">ชื่อ</label>
    <input type="text" name="firstname" required>
</div>

<div class="input-group">
    <label for="lastname">นามสกุล</label>
    <input type="text" name="lastname" required>
</div>

<div class="input-group">
    <label for="username">Username</label>
    <input type="text" name="Username" required>
</div>

<div class="input-group">
    <label for="password">Password</label>
    <input type="password" name="password" required>
</div>

<div class="input-group">
    <button type="submit" name="submit" class="btn btn-success">Register</button>
</div>
<p> <a href="login.php">Sign in</a></p>

 </form>


</body>
</html>