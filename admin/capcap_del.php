<?php require("../help/connect.php"); 

$capskin = $_GET['skin_id'];
$sql = "DELETE FROM cap_skin WHERE skin_id='$capskin' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='capcap_show.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>