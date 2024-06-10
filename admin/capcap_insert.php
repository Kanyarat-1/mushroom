<?php require("../help/connect.php");


$cap2=$_POST['cap2'];
    
// ตรวจสอบ ชื่อผิวหมวก ซ้ำ
$sql1 = "SELECT * FROM cap_skin WHERE skin_cap = '$cap2'";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีผิวหมวกชนิดนี้แล้ว');</script>";
    echo "<script>location ='capcap_add.php';</script>";
  exit;
}

//เพิ่มข้อมูล phylum
$sql="INSERT INTO cap_skin(skin_cap)
VALUES('$cap2')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='capcap_add.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>