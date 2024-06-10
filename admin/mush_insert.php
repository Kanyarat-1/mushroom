<?php require("../help/connect.php");

$mush_name=$_POST['nmush'];
$com_id=$_POST['ncom'];
$csi_name=$_POST['nsci'];
$phylum_id=$_POST['phylumid'];
$cate_id=$_POST['cateid'];
$region_id=$_POST['regionid'];
$familyid=$_POST['familyid'];
$cap=$_POST['capid'];
$capskin=$_POST['capcap'];
$gill=$_POST['gill'];
$stalk=$_POST['stalk'];
$mushdetail=$_POST['mushdetail'];

$datemonth = date("F");

//ตรวจสอบ ชื่อเห็ด ซ้ำ
$sql1 = "SELECT * FROM mushroom WHERE mush_name = '$mush_name'";
$result1 = mysqli_query($connection, $sql1);
$row = mysqli_fetch_assoc($result1);
if($row > 0) {
    echo "<script>alert('มีเห็ดชนิดนี้แล้ว');</script>";
    echo "<script>location ='mush_add.php';</script>";
  exit;
}



//รูป
 if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../image/".$new_image_name;
    move_uploaded_file($_FILES['image']['tmp_name'],$image_upload_path);
     }
     else{
         $new_image_name = "";
     }


//เพิ่มรายละเอียด common_name
$sql4="INSERT INTO common_name(com_name) VALUES ('$com_id')";
$result4=mysqli_query($connection,$sql4);
$last_ncom = mysqli_insert_id($connection);


    
//เพิ่มข้อมูล mushroom
$sql="INSERT INTO mushroom(mush_name,com_id,sci_name,phylum_id,family_id,cap_id,skin_id,gill_id,stalk_id,cate_id,region_id,image,mush_detail,datemonth)
VALUES('$mush_name','$last_ncom','$csi_name','$phylum_id','$familyid','$cap','$capskin','$gill','$stalk','$cate_id','$region_id','$new_image_name','$mushdetail','$datemonth')";

    
$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('บันทึกแล้ว');</script>";
    echo "<script>window.location='mush1.php'</script>";
}
else{
    echo "<script>alert('บันทึกไม่ได้');</script>";
}

mysqli_close($connection); ?>