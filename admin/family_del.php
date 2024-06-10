<?php require("../help/connect.php"); 

$family = $_GET['family_id'];
$sql = "DELETE FROM family WHERE family_id='$family' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='family_show.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>