<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
}
?>

<?php require("../help/connect.php");?>

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

        <title>Select Category with Image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-check-inline {
            display: inline-block;
            margin-right: 10px;
        }
        .img-thumbnail {
            max-width: 50px;
            max-height: 50px;
        }
    </style>

    </head>

    <body class="sb-nav-fixed">
        
    <?php include 'meedit.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">เพิ่มข้อมูลเห็ด</h1>

                        <!-- แบ่งฝั่ง ที่1 -->
<div class="row">
  <div class="col-sm-6">
 <form name="form1" method="post" action="mush_insert.php" enctype="multipart/form-data">
  <div class="row"> <!-- ชื่อเห็ด -->
  <label class="col-sm-2 col-form-label  ">ชื่อเห็ด :</label>
    <div class="col-sm-10">
    <input type="text" name="nmush" class="form-control" placeholder="ชื่อเห็ด..." required  ><br>
    </div>
  </div>
    
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">หมวดหมู่ :</label>
                <div class="col-sm-10">
                    <?php 
                    $sql="SELECT * FROM category ORDER BY cate_thai";
                    $hand=mysqli_query($connection,$sql);
                    while($row = mysqli_fetch_array($hand)) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cateid" id="cateid<?=$row['cate_id']?>" value="<?=$row['cate_id']?>">

                                <img src="../image/<?=$row['imagecate']?>" class="img-thumbnail">

                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>
       
            
        

  

  <div class="row"> <!-- ไฟลัม -->
  <label class="col-sm-2 col-form-label">ไฟลัม :</label>
    <div class="col-sm-5">
    <select class="form-select" name="phylumid" >
    <option value="" selected disabled>--กรุณาเลือก--</option>
    <?php 
$sql="SELECT * FROM phylum ORDER BY phylum_eng";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {  //วนลูปไฟลัมโดยที่ใช้ phylum_idในการวนแล้วแสดงออกมาเป็นphylu_eng
  ?>
  
  <option value="<?=$row['phylum_id']?>"><?=$row['phylum_eng']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
  </div>
  


  <div class="row"> <!-- วงศ์ -->
  <label class="col-sm-2 col-form-label">วงศ์ :</label>
    <div class="col-sm-5">
    <select class="form-select" name="familyid" >
    <option value="" selected disabled>--กรุณาเลือก--</option>
    <?php 
$sql="SELECT * FROM family ORDER BY family_eng";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {  //วนลูปไฟลัมโดยที่ใช้ phylum_idในการวนแล้วแสดงออกมาเป็นphylu_eng
  ?>
  <option value="<?=$row['family_id']?>"><?=$row['family_eng']?></option>
</div>
   <?php
}  ?>
</select> <br>
    </div>
  </div>

  <div class="row"> <!-- หมวกเห็ด -->
  <label class="col-sm-2 col-form-label">หมวกเห็ด :</label>
    <div class="col-sm-5">
    <select class="form-select" name="capid">
    <option value="" selected disabled>--กรุณาเลือก--</option>
    <?php 
$sql="SELECT * FROM cap ORDER BY cap_description";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  ?>
  <option value="<?=$row['cap_id']?>"><?=$row['cap_description']?></option>
   <?php
}  ?>
</select> <br>
    </div>
  </div>

  <div class="row"> <!-- ผิวหมวกเห็ด -->
  <label class="col-sm-2 col-form-label">ผิวของหมวกเห็ด :</label>
    <div class="col-sm-5">
    <select class="form-select" name="capcap">
    <option value="" selected disabled>--กรุณาเลือก--</option>
    <?php 
$sql="SELECT * FROM cap_skin ORDER BY skin_cap";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  ?>
  <option value="<?=$row['skin_id']?>"><?=$row['skin_cap']?></option>
   <?php
}  ?>
</select> <br>
    </div>
  </div>

  <div class="row"> <!-- ครีบ -->
  <label class="col-sm-2 col-form-label">ครีบ :</label>
    <div class="col-sm-5">
    <select class="form-select" name="gill">
    <option value="" selected disabled>--กรุณาเลือก--</option>
    <?php 
$sql="SELECT * FROM gill ORDER BY gill_description";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  ?>
  <option value="<?=$row['gill_id']?>"><?=$row['gill_description']?></option>
   <?php
}  ?>
</select> <br>
    </div>
  </div>

  <div class="row"> <!-- ก้าน -->
  <label class="col-sm-2 col-form-label">ก้าน :</label>
    <div class="col-sm-5">
    <select class="form-select" name="stalk">
    <option value="" selected disabled>--กรุณาเลือก--</option>
    <?php 
$sql="SELECT * FROM stalk ORDER BY stalk_description";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  ?>
  <option value="<?=$row['stalk_id']?>"><?=$row['stalk_description']?></option>
   <?php
}  ?>
</select> <br>
    </div>
  </div>


 </div>

 <!-- แบ่งฝั่ง ที่2 -->
 <div class="col-sm-6">
 <form>
  <div class="row"> <!-- ชื่อสามัญ -->
  <label class="col-sm-3 col-form-label">ชื่อสามัญ :</label>
    <div class="col-sm-9">
    <input type="text" name="ncom" class="form-control" placeholder="ชื่อสามัญ..." required > <br>
    </div>
  </div>

  <div class="row"> <!-- ชื่อวิทยาศสตร์ -->
  <label class="col-sm-3 col-form-label">ชื่อวิทยาศสตร์ :</label>
    <div class="col-sm-9">
    <textarea name="nsci" class="form-control" class="form-control"  required > </textarea> <br>
    </div>
  </div>

  <div class="row"> <!-- ภูมิภาค -->
  <label class="col-sm-3 col-form-label">ภูมิภาค :</label>
    <div class="col-sm-5">
    <select class="form-select" name="regionid" >
    <option value="" selected disabled>--กรุณาเลือก-- </option>
  <?php 
$sql="SELECT * FROM region ORDER BY region_name";
$hand=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($hand)) {
  ?>
  <option value="<?=$row['region_id']?>"required><?=$row['region_name']?></option>
   <?php 
}  
mysqli_close($connection);?>
</select> <br>
 </div>
</div>
  
<div class="row"> <!-- รายละเอียด -->
  <label class="col-sm-3 col-form-label">รายละเอียด :</label>
    <div class="col-sm-9 ">
    <textarea name="mushdetail" class="form-control" class="form-control "  required > </textarea> <br>
    </div>
  </div>

  <div class="form-group">
    <label for="image" class="form-label">อัพโหลดรูปภาพ</label>
    <input type="file" accept="image" id="imageInput" name="image" multiple class="form-control" required >

    <img id="previewImg" class="img-fluid rounded">

    

  </div>

  <!-- ปุ่ม -->
<button type="submit" class="btn btn-success">บันทึก</button>
<a href="mush1.php" class="btn btn-danger" role="button">ยกเลิก</a>

</form>

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
                </main>

            </div>
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
