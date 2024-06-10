<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
}
?>

<?php require("../help/connect.php"); 

$mushid=$_GET['mush_id'];
$sql1="SELECT * FROM mushroom 
JOIN region ON mushroom.region_id = region.region_id
JOIN phylum ON mushroom.phylum_id = phylum.phylum_id
JOIN category ON mushroom.cate_id = category.cate_id
JOIN family ON mushroom.family_id = family.family_id
JOIN common_name ON mushroom.com_id = common_name.com_id
JOIN cap ON mushroom.cap_id = cap.cap_id
JOIN cap_skin ON mushroom.skin_id = cap_skin.skin_id
JOIN gill ON mushroom.gill_id = gill.gill_id
JOIN stalk ON mushroom.stalk_id = stalk.stalk_id
where mush_id='$mushid'";
$hand=mysqli_query($connection,$sql1);
$row1=mysqli_fetch_array($hand);
$Phylum=$row1['phylum_id'];
$Region=$row1['region_id'];
$Cate=$row1['cate_id'];
$Family=$row1['family_id'];
$Cap=$row1['cap_id'];
$SkinCap=$row1['skin_id'];
$Gill=$row1['gill_id'];
$Stalk=$row1['stalk_id'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>mushroom</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        
    <?php include 'meedit.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">แก้ไขข้อมูลเห็ด</h1>

                        <!-- แบ่งฝั่ง ที่1 -->
<div class="row">
  <div class="col-sm-6">
 <form name="form1" method="post" action="mush_up.php" enctype="multipart/form-data">
 <div class="row"> <!-- ชื่อเห็ด -->
    <div class="col-sm-10">
    <input type="hidden" name="idmush" class="form-control" readonly value=<?=$row1['mush_id'] ?>  ><br>
    </div>
  </div>

  <div class="row"> <!-- ชื่อเห็ด -->
 <label class="col-sm-2 col-form-label">ชื่อเห็ด :</label>
    <div class="col-sm-9">
    <input type="text" name="nmush" class="form-control" value=<?=$row1['mush_name'] ?>  ><br>
    </div>
  </div>


  <div class="form-group row">
                <label class="col-sm-2 col-form-label">หมวดหมู่ :</label>
                <div class="col-sm-10">
                    <?php 
                    $sql="SELECT * FROM category ORDER BY cate_thai";
                    $hand=mysqli_query($connection,$sql);
                    
                    while($row = mysqli_fetch_array($hand)) { 
                      $cate_id=$row['cate_id'];
                      ?>
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" name="cateid" 
                            value="<?=$row['cate_id']?>" <?php if($cate_id==$Cate) {echo 'checked';} ?>  > 
                            <img src="../image/<?=$row['imagecate']?>" class="img-thumbnail"><br>
                            <?=$row['cate_thai']?><br><br>
                </label>
                        </div>
                    <?php } ?>
                </div>
  </div>

  <div class="row"> <!-- ไฟลัม -->
  <label class="col-sm-2 col-form-label">ไฟลัม :</label>
    <div class="col-sm-5">
    <select class="form-select" name="phylumid">
    <?php 
$sql="SELECT * FROM phylum ORDER BY phylum_eng";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $phylum_id=$row['phylum_id'];
  ?>
  <option value="<?=$row['phylum_id']?>" <?php if($phylum_id==$Phylum) { echo "selected=selected"; } ?>  ><?=$row['phylum_eng']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
    <!--ปุ่ม + ต่อจากไฟลัม-->
    <div class="col-sm-1">
      <a href="phylum_add.php" class="btn btn-outline-success" role="button">+</a> 
    </div><!--จบ ปุ่ม + ต่อจากไฟลัม-->
  </div>

  <div class="row"> <!-- วงศ์ -->
  <label class="col-sm-2 col-form-label">วงศ์ :</label>
    <div class="col-sm-5">
    <select class="form-select" name="familyid">
    <?php 
$sql="SELECT * FROM family ORDER BY family_eng";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $family_id=$row['family_id'];
  ?>
  <option value="<?=$row['family_id']?>" <?php if($family_id==$Family) { echo "selected=selected"; } ?>  ><?=$row['family_eng']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
     <!--ปุ่ม + ต่อจากไฟลัม-->
     <div class="col-sm-1">
      <a href="family_add.php" class="btn btn-outline-success" role="button">+</a> 
    </div><!--จบ ปุ่ม + ต่อจากไฟลัม-->
  </div>

  <div class="row"> <!-- หมวกเห็ด -->
  <label class="col-sm-2 col-form-label">หมวกเห็ด :</label>
    <div class="col-sm-5">
    <select class="form-select" name="cap">
    <?php 
$sql="SELECT * FROM cap ORDER BY cap_description";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $cap_id=$row['cap_id'];
  ?>
  <option value="<?=$row['cap_id']?>" <?php if($cap_id==$Cap) { echo "selected=selected"; } ?>  ><?=$row['cap_description']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
    <!--ปุ่ม + ต่อจากไฟลัม-->
    <div class="col-sm-1">
      <a href="cap_add.php" class="btn btn-outline-success" role="button">+</a> 
    </div><!--จบ ปุ่ม + ต่อจากไฟลัม-->
  </div>

  <div class="row"> <!-- ผิวหมวกเห็ด -->
  <label class="col-sm-2 col-form-label">ผิวของหมวกเห็ด :</label>
    <div class="col-sm-5">
    <select class="form-select" name="capcap">
    <?php 
$sql="SELECT * FROM cap_skin ORDER BY skin_cap";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $skin_id=$row['skin_id'];
  ?>
  <option value="<?=$row['skin_id']?>" <?php if($skin_id==$SkinCap) { echo "selected=selected"; } ?>  ><?=$row['skin_cap']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
    <!--ปุ่ม + ต่อจากไฟลัม-->
    <div class="col-sm-1">
      <a href="capcap_add.php" class="btn btn-outline-success" role="button">+</a> 
    </div><!--จบ ปุ่ม + ต่อจากไฟลัม-->
  </div>

  <div class="row"> <!-- ครีบ -->
  <label class="col-sm-2 col-form-label">ครีบ :</label>
    <div class="col-sm-5">
    <select class="form-select" name="gill">
    <?php 
$sql="SELECT * FROM gill ORDER BY gill_description";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $gill_id=$row['gill_id'];
  ?>
  <option value="<?=$row['gill_id']?>" <?php if($gill_id==$Gill) { echo "selected=selected"; } ?>  ><?=$row['gill_description']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
    <!--ปุ่ม + ต่อจากไฟลัม-->
    <div class="col-sm-1">
      <a href="gill_add.php" class="btn btn-outline-success" role="button">+</a> 
    </div><!--จบ ปุ่ม + ต่อจากไฟลัม-->
  </div>

  <div class="row"> <!-- ก้าน -->
  <label class="col-sm-2 col-form-label">ก้าน :</label>
    <div class="col-sm-5">
    <select class="form-select" name="stalk">
    <?php 
$sql="SELECT * FROM stalk ORDER BY stalk_description";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $stalk_id=$row['stalk_id'];
  ?>
  <option value="<?=$row['stalk_id']?>" <?php if($stalk_id==$Stalk) { echo "selected=selected"; } ?>  ><?=$row['stalk_description']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
    <!--ปุ่ม + ต่อจากไฟลัม-->
    <div class="col-sm-1">
      <a href="stalk_add.php" class="btn btn-outline-success" role="button">+</a> 
    </div><!--จบ ปุ่ม + ต่อจากไฟลัม-->
  </div>

  


 </div> <!-- แบ่งฝั่ง ที่1 จบ -->

 <!-- แบ่งฝั่ง ที่2 -->
 <div class="col-sm-6">

 <div class="row"> <!-- ชื่อสามัญ -->
  <label class="col-sm-3 col-form-label">ชื่อสามัญ :</label>
    <div class="col-sm-9">
    <textarea class="form-control" name="ncom" > <?=$row1['com_name'] ?>  </textarea> <br>
    </div>
  </div>

  
  <div class="row"> <!-- ชื่อวิทยาศสตร์ -->
  <label class="col-sm-3 col-form-label">ชื่อวิทยาศสตร์ :</label>
    <div class="col-sm-9">
    <textarea class="form-control" name="nsci" > <?=$row1['sci_name'] ?>  </textarea> <br>
    </div>
  </div>

  <div class="row"> <!-- ภูมิภาค -->
  <label class="col-sm-3 col-form-label">ภูมิภาค :</label>
    <div class="col-sm-5">
    <select class="form-select" name="regionid" >
    <?php 
$sql="SELECT * FROM region ORDER BY region_name";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  $region_id=$row['region_id'];?>
  <option value="<?=$row['region_id']?>" <?php if($region_id==$Region) { echo "selected=selected"; } ?> ><?=$row['region_name']?></option>
   <?php  
}  ?>
</select> <br>
    </div>
  </div>

  <div class="row"> <!-- รายละเอียด -->
  <label class="col-sm-3 col-form-label">รายละเอียด :</label>
    <div class="col-sm-9">
    <textarea class="form-control" name="mushdetail" > <?=$row1['mush_detail'] ?>  </textarea> <br>
    </div>
  </div>


<?php //แสดงรูปเก่า   ?>
<img src="../image/<?=$row1['image']?>" width="500" ><br><br>

  <div class="form-group">
    <label for="image" class="form-label">อัพโหลดรูปภาพ</label>
    <input type="file" accept="image" id="imageInput" name="image" class="form-control"  >
    <img id="previewImg" class="img-fluid rounded">

    <?php //hidden ซ่อนรูปเก่า  ไฟล์เก่าของรูปเอามารับเวลาที่ไม่ได้เปลี่ยนรูป ?>
    <input type="hidden" name="imgtext" class="form-control" value=<?=$row1['image'] ?>  > <br>
  </div>
  
  <!--ปุ่ม-->
<button type="submit" class="btn btn-success mb-4">บันทึก</button>
<a href="mush1.php" class="btn btn-danger mb-4" role="button">ยกเลิก</a>
  
</form>
            </div> <!-- แบ่งฝั่ง ที่2 จบ -->

            <div class="card mb-4 mt-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อเห็ด</th>
                                        <th>หมวดหมู่</th>
                                        <th>ไฟลัม</th>
                                        <th>ชื่อวิทยาศสตร์</th>
                                        <th>ภูมิภาค</th>
                                        <th>รูปภาพ</th>
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr> <!-- ใช้ค้นหา -->
                                            <th>mush_name</th>
                                            <th>cate_id</th>
                                            <th>phylum_id</th>
                                            <th>sci_name</th>
                                            <th>region_id</th>
                                            
                                        </tr>
                                    </tfoot>
                            <?php 
                            $sql ="SELECT * FROM mushroom 
                            JOIN region ON mushroom.region_id = region.region_id
                            JOIN phylum ON mushroom.phylum_id = phylum.phylum_id
                            JOIN category ON mushroom.cate_id = category.cate_id
                            ORDER BY mush_name ASC"; //เรียงตามพยัญชนะ
                            $result = mysqli_query($connection,$sql);
                            
                            $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                            while($row=mysqli_fetch_array($result)){
                            ?>
                                    
                                    <tr>
                                        <td><?= $counter ?></td> <!-- แสดงเลขลำดับ -->
                                        <td><?=$row["mush_name"]?></td>
                                        <td><?=$row["cate_thai"]?></td>
                                        <td><?=$row["phylum_eng"]?></td>
                                        <td><?=$row["sci_name"]?></td>
                                        <td><?=$row["region_name"]?></td>

                                        <td><image src="../image/<?=$row["image"]?>" width="150px" hieght="100px" > </td>
                                        
                                    </tr>
                                    <?php  
                                    $counter++; // เพิ่มค่าตัวแปรนับลำดับ
                                    //mysqli_close($connection); 
                                    }?>
                                </table>
                            </div>
                        </div>
                    
                    
             



    <?php //แสดงรูปที่เลือก ?>
    <script>
      let imageInput = document.querySelector("#imageInput");
      let previewImg = document.querySelector("#previewImg");

      imageInput.onchange = evt => {
        const [file] = imageInput.files;
        if (file) {
          previewImg.src = URL.createObjectURL(file);
        }
      }

    </script>
                        
                        
                            
                        
                        
                    </div>
                    <a href="mush1.php" class="btn btn-secondary mb-4" role="button">ย้อนกลับ</a>
                </main>

            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php mysqli_close($connection); ?>