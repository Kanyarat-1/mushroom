<?php require("../help/connect.php");


$gill1=$_POST['gill1'];

// ตรวจสอบ gill ซ้ำ
$sql1 = "SELECT * FROM gill WHERE gill_description = '$gill1' ";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีครีบนี้แล้ว');</script>";
    echo "<script>location ='gill_add.php';</script>";
  exit;
}

//เพิ่มข้อมูล phylum
$sql="INSERT INTO gill(gill_description)
VALUES('$gill1')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='gill_add.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>