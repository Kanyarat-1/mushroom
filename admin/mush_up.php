<?php require '../help/connect.php';

$idmush=$_POST['idmush'];
$namemush=$_POST['nmush'];
$namesci=$_POST['nsci'];
$idcate=$_POST['cateid'];
$idphylum=$_POST['phylumid'];
$idregion=$_POST['regionid'];
$img=$_POST['imgtext'];
$familyid=$_POST['familyid'];
$idcom=$_POST['ncom'];
$mushdetail=$_POST['mushdetail'];
$cap=$_POST['cap'];
$capskin=$_POST['capcap'];
$gillid=$_POST['gill'];
$stalkid=$_POST['stalk'];




//โหลดรูป
if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../image/".$new_image_name;
    move_uploaded_file($_FILES['image']['tmp_name'],$image_upload_path);
     }
     else{
         $new_image_name = "$img";
     }



$sql = "UPDATE mushroom 
JOIN common_name ON mushroom.com_id = common_name.com_id
SET 
mush_name='$namemush',
sci_name='$namesci',
cate_id='$idcate',
phylum_id='$idphylum',
family_id='$familyid',
cap_id='$cap',
skin_id='$capskin',
gill_id='$gillid',
stalk_id='$stalkid',
com_name='$idcom',
region_id='$idregion',
mush_detail='$mushdetail',
image='$new_image_name' 
WHERE mush_id='$idmush'";





$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='mush1.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>