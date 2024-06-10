<?php require("../help/connect.php");


$stalk1=$_POST['stalk1'];
    
// ตรวจสอบ gill ซ้ำ
$sql1 = "SELECT * FROM stalk WHERE stalk_description = '$stalk1' ";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีก้านนี้แล้ว');</script>";
    echo "<script>location ='stalk_add.php';</script>";
  exit;
}

//เพิ่มข้อมูล phylum
$sql="INSERT INTO stalk(stalk_description)
VALUES('$stalk1')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='stalk_add.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>