<?php require("../help/connect.php"); 

$id_mushroom = $_GET['mush_id'];
$sql = "DELETE FROM mushroom WHERE mush_id='$id_mushroom' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='mush1.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>