<?php require '../help/connect.php';

$sur_id = $_POST['sur_id'];
$date = $_POST['date'];
$ex_mushname = $_POST['ex_mushname'];
$cateid = $_POST['cateid'];
$ex_capdescription = $_POST['ex_capdescription'];
$ex_capskindescription = $_POST['ex_capskindescription'];
$ex_gilldescription = $_POST['ex_gilldescription'];
$ex_stalkdescription = $_POST['ex_stalkdescription'];
$idregion = $_POST['regionid'];
$area = $_POST['area'];
$mush_detail = $_POST['mush_detail'];

// อัปเดตข้อมูลในตาราง survey และตารางที่เกี่ยวข้อง
$sql = "UPDATE survey 
JOIN ex_gill ON survey.ex_gillid = ex_gill.ex_gillid 
JOIN ex_cap ON survey.ex_capid = ex_cap.ex_capid 
JOIN ex_capskin ON survey.ex_capskinid = ex_capskin.ex_capskinid 
JOIN ex_stalk ON survey.ex_stalkid = ex_stalk.ex_stalkid 
SET 
date='$date',
ex_mushname='$ex_mushname',
cate_id='$cateid',
ex_capdescription='$ex_capdescription',
ex_gilldescription='$ex_gilldescription',
ex_capskindescription='$ex_capskindescription',
ex_stalkdescription='$ex_stalkdescription',
region_id='$idregion',
area='$area',
mush_detail='$mush_detail'
WHERE sur_id='$sur_id'";

$result = mysqli_query($connection, $sql);

// ตรวจสอบการอัปโหลดไฟล์รูปภาพใหม่
if (isset($_FILES['img'])) {
    $total_files = count($_FILES['img']['name']);
    $uploaded_files = [];

    for ($i = 0; $i < $total_files; $i++) {
        if (is_uploaded_file($_FILES['img']['tmp_name'][$i])) {
            $extension = pathinfo($_FILES['img']['name'][$i], PATHINFO_EXTENSION);
            $new_image_name = 'sur_' . uniqid() . "." . $extension;
            $image_upload_path = "../imagesur/" . $new_image_name;

            if (move_uploaded_file($_FILES['img']['tmp_name'][$i], $image_upload_path)) {
                $sql1 = "INSERT INTO image_survey (image_sur, sur_id) VALUES ('$new_image_name', '$sur_id')";
                $result1 = mysqli_query($connection, $sql1);
                
                if ($result1) {
                    $uploaded_files[] = $new_image_name;
                } else {
                    echo "Database insert failed for file: " . $_FILES['img']['name'][$i] . " - " . mysqli_error($connection) . "<br>";
                }
            } 
        } 
    }

    if (!empty($uploaded_files)) {
        echo "Successfully uploaded and inserted the following files:<br>";
        echo implode("<br>", $uploaded_files);
    }
} else {
    echo "No files selected.";
}



if ($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='survey_show.php'</script>";
} else {
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection);
?>
