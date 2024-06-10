<?php 

require_once("../help/connect.php");

$date=$_POST['date'];
$datemonth = date("F");
$ex_mushname=$_POST['ex_mushname'];
$cateid=$_POST['cateid'];

$ex_capdescription=$_POST['ex_capdescription'];
$ex_capskindescription=$_POST['ex_capskindescription'];
$ex_stalkdescription=$_POST['ex_stalkdescription'];
$ex_gilldescription=$_POST['ex_gilldescription'];

$region_id=$_POST['regionid'];
$area=$_POST['area'];
$mush_detail=$_POST['mush_detail'];



//เพิ่มรายละเอียด ex_cap
$sql2="INSERT INTO ex_cap(ex_capdescription) VALUES ('$ex_capdescription')";
$result2=mysqli_query($connection,$sql2);
$last_ex_cap = mysqli_insert_id($connection);
//เพิ่มรายละเอียด ex_capskin
$sql3="INSERT INTO ex_capskin(ex_capskindescription) VALUES ('$ex_capskindescription')";
$result3=mysqli_query($connection,$sql3);
$last_ex_capskin = mysqli_insert_id($connection);

//เพิ่มรายละเอียด ex_stalk
$sql4="INSERT INTO ex_stalk(ex_stalkdescription) VALUES ('$ex_stalkdescription')";
$result4=mysqli_query($connection,$sql4);
$last_ex_stalk = mysqli_insert_id($connection);

//เพิ่มรายละเอียด ex_gill
$sql5="INSERT INTO ex_gill(ex_gilldescription) VALUES ('$ex_gilldescription')";
$result5=mysqli_query($connection,$sql5);
$last_ex_gill = mysqli_insert_id($connection);

$sql = "INSERT INTO survey(date,ex_mushname,area,mush_detail,region_id,cate_id,ex_capid,ex_stalkid,ex_gillid,ex_capskinid,datemonth) 
        VALUES ('$date','$ex_mushname','$area','$mush_detail','$region_id','$cateid','$last_ex_cap','$last_ex_stalk','$last_ex_gill','$last_ex_capskin','$datemonth')";
$result=mysqli_query($connection,$sql);
$last_ncom = mysqli_insert_id($connection);

if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='survey_show.php'</script>";
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

     mysqli_close($connection); ?>