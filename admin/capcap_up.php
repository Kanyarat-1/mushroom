<?php require '../help/connect.php';

$cap0=$_POST['cap0'];
$cap2=$_POST['cap2'];



$sql = "UPDATE cap_skin SET 
skin_cap='$cap2'
WHERE skin_id='$cap0'";


$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='capcap_show.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>