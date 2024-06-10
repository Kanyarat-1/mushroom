<?php require("../help/connect.php");


$cap1=$_POST['cap1'];

// ตรวจสอบ ชื่อหมวก ซ้ำ
$sql1 = "SELECT * FROM cap WHERE cap_description = '$cap1'";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีหมวกชนิดนี้แล้ว');</script>";
    echo "<script>location ='cap_add.php';</script>";
  exit;
}

//เพิ่มข้อมูล phylum
$sql="INSERT INTO cap(cap_description)
VALUES('$cap1')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='cap_add.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>