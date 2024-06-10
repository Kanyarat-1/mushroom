<?php
require("../help/connect.php");
//ตาราง survey
$sur_id = $_GET['sur_id'];

// ตารางimage_survey ลบรูปภาพจากระบบไฟล์
$sql_images = "SELECT image_sur FROM image_survey WHERE sur_id='$sur_id'";
$result_images = mysqli_query($connection, $sql_images);

if ($result_images) {
    while ($row = mysqli_fetch_assoc($result_images)) {
        $filePath = '../imagesur/' . $row['image_sur'];
        if (file_exists($filePath)) {
            unlink($filePath); // ลบไฟล์จากระบบไฟล์
        }
    }

    // ลบข้อมูลรูปภาพจากฐานข้อมูล
    $sql_delete_images = "DELETE FROM image_survey WHERE sur_id='$sur_id'";
    mysqli_query($connection, $sql_delete_images);
} else {
    echo "Error retrieving images: " . mysqli_error($connection);
}

// จากนั้น ลบข้อมูลจากตาราง survey
$sql_delete_survey = "DELETE FROM survey WHERE sur_id='$sur_id'";

if (mysqli_query($connection, $sql_delete_survey)) {
    echo "<script>alert('ลบแล้ว');</script>";
    echo "<script>window.location='survey_show.php'</script>";
} else {
    echo "Error deleting survey: " . mysqli_error($connection);
    echo "<script>alert('ลบไม่ได้');</script>";
}

mysqli_close($connection);
?>
