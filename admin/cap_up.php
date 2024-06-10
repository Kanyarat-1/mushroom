<?php require '../help/connect.php';

$cap0=$_POST['cap0'];
$cap1=$_POST['cap1'];




$sql = "UPDATE cap SET 
cap_description='$cap1'
WHERE cap_id='$cap0'";


$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='cap_show.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>