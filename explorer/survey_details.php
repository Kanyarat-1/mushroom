<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../login/login.php");
    exit();
}
?>

<?php require("../help/connect.php"); ?>

<?php
$sur_id=$_GET['sur_id'];
$sql1="SELECT * FROM survey 
JOIN ex_cap ON survey.ex_capid = ex_cap.ex_capid
JOIN ex_capskin ON survey.ex_capskinid = ex_capskin.ex_capskinid
JOIN ex_gill ON survey.ex_gillid = ex_gill.ex_gillid
JOIN ex_stalk ON survey.ex_stalkid = ex_stalk.ex_stalkid
where sur_id = '$sur_id'";
$hand=mysqli_query($connection,$sql1);
$row1=mysqli_fetch_array($hand);
$Cate=$row1['cate_id'];
$Region=$row1['region_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mushroom</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    .img-preview-wrapper { 
        position: relative;  
        display: inline-block;
        margin: 10px; 
    }
    .img-preview-wrapper img {
        max-width: 500px;
    }
    .img-preview-wrapper .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 255, 255, 0.7);
        border: none;
        border-radius: 50%;
        cursor: pointer;
    }
    .img-preview-wrapper .remove-btn i {
        color: #a94442;
    }
</style>

<style>/* กรอบ ชื่อ วันที่ เป็นต้น*/
  .bordered-box {
    border: 1px solid #DCDCDC; /* เส้นกรอบ */
    padding: 15px;
    border-radius: 5px;
    background-color: #FFFAFA;
    margin-bottom: 15px;
  }
  .bordered-box p {
    margin-bottom: 10px; /* Adjust the space between lines if needed */
  }
</style>



<body class="sb-nav-fixed">
    <?php include 'pag.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">รายละเอียดข้อมูลการสำรวจ</h1>

                <!-- แบ่งฝั่ง ที่1 -->
                <div class="row">
                    <div class="col-sm-6">
                        <form name="form1" method="post" action="survey_insert.php" enctype="multipart/form-data">
                        <div class="row"> <!-- ชื่อเห็ด -->
                            <div class="col-sm-10">
                                <input type="hidden" name="sur_id" class="form-control" readonly value=<?=$row1['sur_id'] ?>  ><br>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">วันที่ :</label>
                                <div class="col-sm-3">
                                    <div class="bordered-box">
                                        <p><?=$row1['date'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> <!-- ชื่อเห็ด -->
                                <label class="col-sm-2 col-form-label">ชื่อเห็ด :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['ex_mushname'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> <!-- ชื่อเห็ด -->
  <label class="col-sm-2 col-form-label">หมวดหมู่ :</label>
  <div class="col-sm-10">
    <?php 

    $sql = "SELECT * FROM category_survey WHERE cate_id = $Cate"; // ดึงข้อมูลจากตาราง category_survey ทั้งหมด
    $hand = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($hand)) { // ใช้ while loop เพื่อดึงข้อมูลทุกแถว
        ?>
          <img src="../image/<?=$row['imagecate'] ?>" class="img-thumbnail" alt="<?=$row['cate_id']?><?=$row['cate_thai']?>"><br>
           <!-- Display the category name as well -->
          <?=$row['cate_thai']?><br><br>
        <?php
        }
        ?>
      </div>
    </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">หมวกเห็ด :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['ex_capdescription'] ?></p>
                                    </div>  
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ผิวของหมวดเห็ด :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['ex_capskindescription'] ?></p>
                                    </div>
                                </div>
                            </div>

 

                            
                        </div><!-- แบ่งฝั่ง1 end -->

                        <!-- แบ่งฝั่ง ที่2 -->
                        <div class="col-sm-6">
                            
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ครีบ :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['ex_gilldescription'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ก้าน :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['ex_stalkdescription'] ?></p>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row mb-3"> <!-- ภูมิภาค -->
  <label class="col-sm-2 col-form-label">ภูมิภาค :</label>
  <div class="col-sm-10">
    <?php 
    $sql = "SELECT * FROM region WHERE region_id = $Region"; // เลือกข้อมูลภูมิภาคที่เลือกไว้
    $hand = mysqli_query($connection, $sql);
    if ($row = mysqli_fetch_array($hand)) { // เรียกใช้ข้อมูลแถวเดียว
    ?>
    <div class="bordered-box">
      <p><?= $row['region_name'] ?></p> 
    </div>
    <?php
    }
    ?>
  </div>
</div>
<!-- ภูมิภาค end -->



                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">พื้นที่ที่พบ :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['area'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">รายละเอียด :</label>
                                <div class="col-sm-10">
                                    <div class="bordered-box">
                                        <p><?=$row1['mush_detail'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- แบ่งฝั่ง2 end -->
                        
        <div class="col-sm-12"><!-- แสดงรูป -->  
            <div class="form-group row">

            <?php $sql = "SELECT imagesur_id, image_sur FROM image_survey WHERE sur_id='$sur_id'";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="row" id="image-container">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-3 position-relative d-flex justify-content-center align-items-center" id="image-' . $row['imagesur_id'] . '">';
                    echo '<img src="../imagesur/' . $row['image_sur'] . '" class="img-fluid" style="max-width: 100%; height: auto;">';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo "ไม่พบรูปภาพในฐานข้อมูล";
            }
            ?><!-- แสดงรูป จบ-->
            </div><br>      
                            <a href="survey_show.php" class="btn btn-secondary" role="button">ย้อนกลับ</a>
                        </form>      
                        </div>

                        

                    
                </div>
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
