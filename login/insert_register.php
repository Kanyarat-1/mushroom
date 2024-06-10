<?php require("../help/connect.php"); 

//รับค่าตัวแปรจาก insert.php (ตรง name)
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$Username = $_POST['Username'];
$password = $_POST['password'];


// ตรวจสอบ username ซ้ำ
$sql2 = "SELECT * FROM user WHERE user_username = '$Username'";
$result2 = mysqli_query($connection, $sql2);
$row = mysqli_fetch_assoc($result2);
if($row > 0) {
    echo "<script>alert('Username นี้ถูกใช้งานแล้ว');</script>";
    echo "<script>location ='register.php';</script>";
  exit;
}


//เข้า password ด้วย sha512
$password = hash('sha512',$password);//รับค่าตัวแปร password เข้ามาจากนั้นก็เข้ารหัส sha512 แล้วก็ส่งกับคืนเป็น password เพื่อ insert เข้า

//เพื่มข้อมูล
$sql = "INSERT INTO user(user_firstname,user_lastname,user_username,user_userpassword,type_id)
VALUE ('$firstname','$lastname','$Username','$password','ex_02')";

$result = mysqli_query($connection,$sql);

if ($result){
    echo "<script> alert ('บันทึกข้อมูลแล้ว') </script> ";
    echo "<script> window.location='register.php' </script> ";//บันทึกได้แล้วไปหน้า register.php
} else {
    echo "Error:" . $sql . "<br>" . mysqli_error($connection);//ผิดตรงส่วนไหนใน sql และดูว่าในฐานข้อมูลมีตัวแปรนี้มั้ย
    echo "<script> alert ('ไม่สามารถบันทึกได้') </script> ";
}
mysqli_close($connection);
?>