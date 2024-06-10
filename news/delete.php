<?php require("../help/connect.php"); 
$ids=$_GET['id'];
$sql="DELETE FROM ckeditor WHERE id='$ids'";
if(mysqli_query($connection,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย')</script>";
    echo "<script>window.location='shownews.php';</script>";
}else{
    echo "Error :" . $sql . "<br>". mysqli_error($connection);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
}

mysqli_close($connection);

?>