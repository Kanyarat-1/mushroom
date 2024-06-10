<?php require '../help/connect.php';

$family0=$_POST['family0'];
$family1=$_POST['family1'];
$family2=$_POST['family2'];



$sql = "UPDATE family SET 
family_eng='$family1',
family_thai='$family2'
WHERE family_id='$family0'";


$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='family_add.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>