<?php 

require_once("../help/connect.php");


$region_id=$_POST['regionid'];
$mush_detail=$_POST['mush_detail'];
$area=$_POST['area'];

$sql = "INSERT INTO survey(area, mush_detail, region_id) 
        VALUES ('$area','$mush_detail','$region_id')";
$result=mysqli_query($connection,$sql);
$last_ncom = mysqli_insert_id($connection);

if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='img4.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}


//โหลดรูปหลายๆรูป
if (isset($_FILES['img'])) { //ตรวจสอบว่ามีไฟล์ถูกส่งมามั้ย
    $total_files = count($_FILES['img']['name']); //นับไฟล์รูป
    $uploaded_files = [];

    for ($i = 0; $i < $total_files; $i++) {
        if (is_uploaded_file($_FILES['img']['tmp_name'][$i])) { //ไฟล์ถูกอัปโหลดมาจริงมั้ย  uniqidสร้างชื่อไฟล์ไม่ซำ้กัน
            //ตั้งแต่อันนี้ pathinfo ดึงนามสกุลของไฟล์เดิม
            $new_image_name = 'sur_' . uniqid() . "-" . pathinfo(basename($_FILES['img']['name'][$i]), PATHINFO_EXTENSION);
            $image_upload_path = "../imagesur/" . $new_image_name;//กำหนด path

            if (move_uploaded_file($_FILES['img']['tmp_name'][$i], $image_upload_path)) { //ย้ายไฟล์เพื่อเอาไปเก็บ
                // เข้าฐานข้อมูล
                $sql1 = "INSERT INTO image_survey (image_sur, sur_id) VALUES ('$new_image_name','$last_ncom')";
                $result1 = mysqli_query($connection, $sql1);
                
                if ($result1) {
                    $uploaded_files[] = $new_image_name;
                } else {
                    echo "Database insert failed for file: " . $_FILES['img']['name'][$i] . " - " . mysqli_error($connection) . "<br>";
                }
            } else {
                echo "Failed to move uploaded file: " . $_FILES['img']['name'][$i] . "<br>";
            }
        } else {
            echo "No file was uploaded or invalid file for index: " . $i . "<br>";
        }
    }

    if (!empty($uploaded_files)) {
        echo "Successfully uploaded and inserted the following files:<br>";
        echo implode("<br>", $uploaded_files);
    }
} else {
    echo "No files selected.";
}






     mysqli_close($connection);
?>