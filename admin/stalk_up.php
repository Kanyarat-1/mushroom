<?php require '../help/connect.php';

$stalk0=$_POST['stalk0'];
$stalk1=$_POST['stalk1'];



$sql = "UPDATE stalk SET 
stalk_description='$stalk1'
WHERE stalk_id='$stalk0'";


$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='stalk_show.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>