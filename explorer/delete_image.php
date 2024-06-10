<?php require("../help/connect.php"); 

$imagesur_id = $_GET['imagesur_id'];

 $sql = "DELETE FROM image_survey WHERE imagesur_id = $imagesur_id";

 if(mysqli_query($connection,$sql)) {
    echo "ลบรูปภาพเรียบร้อยแล้ว";
}
else{
    echo "เกิดข้อผิดพลาดในการลบรูปภาพ: " . mysqli_error($connection);
}

mysqli_close($connection);?>




