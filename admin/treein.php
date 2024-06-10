<?php require("../help/connect.php");

$mush_name=$_POST['nmush'];
$mushdetail=$_POST['mushdetail'];

// ตรวจสอบ ชื่อเห็ด ซ้ำ
$sql1 = "SELECT * FROM mushroom WHERE mush_name = '$mush_name'";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    header("Location: tree.php?error=ชื่อเห็ดซ้ำ");
    echo "<script>alert('มีเห็ดชนิดนี้แล้ว');</script>";
    echo "<script>location ='tree.php';</script>";
  exit;
}

//เพิ่มข้อมูล mushroom
$sql="INSERT INTO mushroom(mush_name,mush_detail)
VALUES('$mush_name','$mushdetail')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='tree.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>