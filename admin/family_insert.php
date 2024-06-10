<?php require("../help/connect.php");


$family1=$_POST['family1'];
$family2=$_POST['family2'];
    
// ตรวจสอบ วงศ์ ซ้ำ
$sql1 = "SELECT * FROM family WHERE family_eng = '$family1' OR family_thai = '$family2'";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีวงศตระกูลนี้แล้ว');</script>";
    echo "<script>location ='family_add.php';</script>";
  exit;
}

//เพิ่มข้อมูล phylum
$sql="INSERT INTO family(family_eng,family_thai)
VALUES('$family1','$family2')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='family_add.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>