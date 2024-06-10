<?php require("../help/connect.php"); 

$gill = $_GET['gill_id'];
$sql = "DELETE FROM gill WHERE gill_id='$gill' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='gill_show.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>