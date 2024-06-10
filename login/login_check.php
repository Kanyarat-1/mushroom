<?php require("../help/connect.php"); 

session_start();

$username = $_POST['Username'];
$password = $_POST['password'];

//เข้า password ด้วย sha512
$password = hash('sha512',$password);//รับค่าตัวแปร password เข้ามาจากนั้นก็เข้ารหัส sha512 แล้วก็ส่งกับคืนเป็น password เพื่อ insert เข้า

//ตรวจสอบ username password ว่าตรงกับฐานข้อมูลมั้ย
$sql = "SELECT * FROM user 
WHERE user_username = '$username' and user_userpassword = '$password'";

$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);



//ตรวจสอบประเภทผู้ใช้
$type = $row['type_id'];
if ($row > 0) {
    $_SESSION['username'] = $row ['user_username'];
    $_SESSION['password'] = $row ['user_userpassword'];
    $_SESSION['firstname'] = $row ['user_firstname'];
    $_SESSION['lastname'] = $row ['user_lastname'];



    //ex_02 นักสำรวจ
    //ad_01 แอดมิน
        if($type == "ex_02"){
            $show = header("location:../explorer/survey_show.php");  
        }elseif($type == "ad_01"){
            $show = header("location:../admin/home1.php");
        }
               
}else{
    $_SESSION["Error"] = "<p> Username หรือ Password ไม่ถูกต้อง </p>";
    $show = header("location:login.php");
}
echo $show;

mysqli_close($connection);
?>

