<?php require("../help/connect.php"); 

$id_phylum = $_GET['phylum_id'];
$sql = "DELETE FROM phylum WHERE phylum_id='$id_phylum' ";


if(mysqli_query($connection,$sql)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='phylum_show.php'</script>";
}
else{
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}


mysqli_close($connection);?>