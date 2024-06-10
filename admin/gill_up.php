<?php require '../help/connect.php';

$gill0=$_POST['gill0'];
$gill1=$_POST['gill1'];



$sql = "UPDATE gill SET 
gill_description='$gill1'
WHERE gill_id='$gill0'";


$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='gill_show.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>