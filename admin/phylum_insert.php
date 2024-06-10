<?php require("../help/connect.php");


$phylum_id1=$_POST['namephylum1'];
$phylum_id2=$_POST['namephylum2'];
    
// ตรวจสอบ gill ซ้ำ
$sql1 = "SELECT * FROM phylum WHERE phylum_eng = '$phylum_id1' OR phylum_thai = '$phylum_id2' ";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีไฟลัมนี้แล้ว');</script>";
    echo "<script>location ='phylum_add.php';</script>";
  exit;
}

//เพิ่มข้อมูล phylum
$sql="INSERT INTO phylum(phylum_eng,phylum_thai)
VALUES('$phylum_id1','$phylum_id2')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='phylum_add.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>