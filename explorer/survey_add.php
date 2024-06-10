<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../login/login.php");
    exit();
}
?>

<?php require("../help/connect.php"); ?>

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
        max-width: 350px;
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

<body class="sb-nav-fixed">
    <?php include 'pag.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">เพิ่มข้อมูลการสำรวจ</h1>

                <!-- แบ่งฝั่ง ที่1 -->
                <div class="row">
                    <div class="col-sm-6">
                        <form name="form1" method="post" action="survey_insert.php" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">วันที่ :</label>
                                <div class="col-sm-3">
                                    <input type="date" name="date" class="form-control" required><br>
                                </div>
                            </div>

                            <div class="row"> <!-- ชื่อเห็ด -->
                                <label class="col-sm-2 col-form-label">ชื่อเห็ด :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ex_mushname" class="form-control " >
                                    <h1 class="mt-1" style="font-size: small; color: red;">หมายเหตุ: ถ้าไม่ทราบชื่อเห็ดไม่ต้องใส่</h1><br>
                                </div>
                            </div>

                            <div class="form-group row"><!-- หมวดหมู่ -->
                                <label class="col-sm-2 col-form-label">หมวดหมู่ :</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql="SELECT * FROM category_survey ORDER BY cate_thai";
                                    $hand=mysqli_query($connection,$sql);
                                    while($row = mysqli_fetch_array($hand)) { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cateid" id="cateid<?=$row['cate_id']?>" value="<?=$row['cate_id']?>">
                                            <img src="../image/<?=$row['imagecate']?>" style="width: 50px; height: 50px;" class="img-thumbnail"><br>
                                            <?=$row['cate_thai']?><br><br>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">หมวกเห็ด :</label>
                                <div class="col-sm-9">
                                    <textarea name="ex_capdescription" class="form-control"></textarea><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ผิวของหมวดเห็ด :</label>
                                <div class="col-sm-9">
                                    <textarea name="ex_capskindescription" class="form-control"></textarea><br>
                                </div>
                            </div>

                            
                        </div><!-- แบ่งฝั่ง1 end -->

                        <!-- แบ่งฝั่ง ที่2 -->
                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ครีบ :</label>
                                <div class="col-sm-9">
                                    <textarea name="ex_gilldescription" class="form-control"></textarea><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ก้าน :</label>
                                <div class="col-sm-9">
                                    <textarea name="ex_stalkdescription" class="form-control"></textarea><br>
                                </div>
                            </div>
                            
                            <div class="row"> <!-- ภูมิภาค -->
                                <label class="col-sm-2 col-form-label">ภูมิภาค :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="regionid" required>
                                        <option value="" selected disabled>--กรุณาเลือก-- </option>
                                        <?php 
                                        $sql="SELECT * FROM region ORDER BY region_name";
                                        $hand=mysqli_query($connection,$sql);
                                        while($row=mysqli_fetch_array($hand)) { ?>
                                            <option value="<?=$row['region_id']?>"><?=$row['region_name']?></option>
                                        <?php } ?>
                                    </select> <br>
                                </div>
                            </div><!-- ภูมิภาค end -->

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">พื้นที่ที่พบ :</label>
                                <div class="col-sm-9">
                                    <textarea name="area" class="form-control"></textarea><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">รายละเอียด:</label>
                                <div class="col-sm-9">
                                    <textarea name="mush_detail" class="form-control"></textarea><br>
                                </div>
                            </div>

                            
                        </div><!-- แบ่งฝั่ง2 end -->  

                        <div class="col-sm-12"><!-- อัปโหลดรูปภาพ -->  
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">อัปโหลดรูปภาพ:</label>
                                <div class="col-sm-3">
                                    <input type="file" name="img[]" id="imageInput" accept="image/*" class="form-control" multiple><br>
                                </div>
                            </div>

                            <div id="previewContainer" class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                    <div id="previewImg"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">บันทึก</button>
                            <a href="survey_show.php" class="btn btn-danger" role="button">ยกเลิก</a>
                        </form>      
                        </div><!-- อัปโหลดรูปภาพ จบ -->

                    <div class="card mb-4 mt-4">
                        <div class="card-body text-primary">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วันที่</th>
                                        <th>ชื่อเห็ด</th>
                                        <th>ภูมิภาค</th>
                                        <th>จัดการข้อมูล</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>date</th>
                                        <th>region_id</th>
                                        <th>ex_mushname</th>
                                    </tr>
                                </tfoot>
                                <?php 
                                $sql6 ="SELECT * FROM survey 
                                JOIN region ON survey.region_id = region.region_id
                                ORDER BY survey.date ASC"; //เรียงตามพยัญชนะ
                                $result6 = mysqli_query($connection,$sql6);
                                $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                                while($row=mysqli_fetch_array($result6)){ ?>
                                    <tr>
                                        <td><?= $counter ?></td> <!-- แสดงเลขลำดับ -->
                                        <td><?=$row["date"]?></td>
                                        <td><?=$row["ex_mushname"]?></td>
                                        <td><?=$row["region_name"]?></td>
                                        
                                        <td><a href="survey_edit.php?sur_id=<?=$row["sur_id"]?> "  class="btn mb-4">
                                        <img src="../image/icons8-edit-64.png" alt="แก้ไข" style="width: 30px; height: 30px;"></a>
                            
                                        <a href="survey_del.php?sur_id=<?=$row["sur_id"]?> "  class="btn mb-4" onclick="Del(this.href);return false;">
                                        <img src="../image/icons8-delete-48.png" alt="ลบ" style="width: 30px; height: 30px;"></a>

                                        <a href="survey_details.php?sur_id=<?=$row["sur_id"]?> "  class="btn mb-4" >
                                        <img src="../image/icons8-detail-48.png" alt="รายละเอียด" style="width: 30px; height: 30px;"></a>
                                        </td>
                                    </tr>
                                    <?php  
                                    $counter++; // เพิ่มค่าตัวแปรนับลำดับ
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <?php //แสดงรูปที่เลือก ?>
        <script>
            let imageInput = document.querySelector("#imageInput");
            let previewContainer = document.querySelector("#previewImg");

            imageInput.onchange = evt => { //ถ้ามีการเลือกรูปก็จะแสดง
                previewContainer.innerHTML = ""; // เคลียร์ภาพก่อนหน้า
                const files = imageInput.files;
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (file) {
                        let imgWrapper = document.createElement("div"); 
                        imgWrapper.classList.add("img-preview-wrapper");

                        let img = document.createElement("img");
                        img.src = URL.createObjectURL(file);

                        let removeBtn = document.createElement("button"); //ปุ่มรูปกากบาท
                        removeBtn.classList.add("remove-btn");
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.onclick = () => { //ถ้าลบจะมาทำตรงนี้
                            previewContainer.removeChild(imgWrapper); // ลบภาพเมื่อคลิก
                            removeFile(i); // ลบไฟล์ออกจาก input
                        };

                        imgWrapper.appendChild(img);
                        imgWrapper.appendChild(removeBtn);
                        previewContainer.appendChild(imgWrapper);
                    }
                }
            }

            function removeFile(index) {
                // สร้าง DataTransfer object เพื่อจัดการกับไฟล์ใน input
                let dt = new DataTransfer();
                let files = imageInput.files;

                for (let i = 0; i < files.length; i++) {
                    if (i !== index) {
                        dt.items.add(files[i]); // เพิ่มไฟล์ที่ไม่ใช่ไฟล์ที่ต้องการลบกลับเข้าไป
                    }
                }

                imageInput.files = dt.files; // ตั้งค่าไฟล์ใหม่ให้กับ input
            }
        </script><!--แสดงรูปที่เลือก จบ -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
