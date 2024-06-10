<?php require("../help/connect.php"); 

$stalk = $_GET['stalk_id'];
$sql = "DELETE FROM stalk WHERE stalk_id='$stalk' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='stalk_show.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>