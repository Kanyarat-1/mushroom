<?php require("../help/connect.php"); 

$cap = $_GET['cap_id'];
$sql = "DELETE FROM cap WHERE cap_id='$cap' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='cap_show.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>