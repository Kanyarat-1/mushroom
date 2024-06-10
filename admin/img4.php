<?php require("../help/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>

<form action="imginsert4.php" method="post" enctype="multipart/form-data">


  <label class="col-sm-2 col-form-label ">ลักษณะเห็ด :</label>
    <div class="col-sm-10 ">
    <textarea type="text" name="mush_detail" class="form-control "  required  ></textarea><br>
    </div>
  </div>

  <label class="col-sm-2 col-form-label ">พื้นที่ที่พบ :</label>
    <div class="col-sm-10 ">
    <textarea type="text" name="area" class="form-control "  required  ></textarea><br>
    </div>
  </div>
  

  <div class="row"> <!-- ภูมิภาค -->
  <label class="col-sm-1 col-form-label">ภูมิภาค :</label>
    <div class="col-sm-5">
    <select class="form-control " name="regionid" >
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

  <label class="col-sm-2 col-form-label ">อัพโหลดรูปภาพ :</label>
    <input class="form-control" type="file" accept="image" name="img[]" multiple>
    <input type="submit" value="Upload Images">
</form>






</body>
</html>