<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
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
        <title>mushroom</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        
    <?php include 'me.php'; ?>


    

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4">หมวกเห็ด</h1>
                    <div class="card mb-4 mt-4">
                            
                            <div class="card-body text-primary"><!--ใส่สีตัวอักษร-->
                                <table id="datatablesSimple">
                                <a href="family_add.php" class="btn btn-info" role="button">เพิ่ม</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อวงศ์อังกฤษ</th>
                                            <th>ชื่อวงศ์ไทย</th>
                                            <th>จัดการข้อมูล</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr> <!-- ใช้ค้นหา -->
                                            <th>cap_description</th>
                                        </tr>
                                    </tfoot>
                            <?php 
                            $sql ="SELECT * FROM family 
                            ORDER BY family_eng ASC"; //เรียงตามพยัญชนะ
                            $result = mysqli_query($connection,$sql);
                            
                            $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                            while($row=mysqli_fetch_array($result)){
                            ?>
                                    
                                    <tr>
                                        <td><?= $counter ?></td> <!-- แสดงเลขลำดับ -->
                                        <td><?=$row["family_eng"]?></td>
                                        <td><?=$row["family_thai"]?></td>
  
                                        <td><a href="family_edit.php?family_id=<?=$row["family_id"]?>" class="btn mb-4">
                                        <img src="../image/icons8-edit-64.png" alt="แก้ไข" style="width: 30px; height: 30px;"></a>

                                        <a href="family_del.php?family_id=<?=$row["family_id"]?> "  class="btn mb-4" onclick="Del(this.href);return false;">
                                        <img src="../image/icons8-delete-48.png" alt="ลบ" style="width: 30px; height: 30px;"></a></td>
                                        
                                    </tr>
                                    <?php  
                                    $counter++; // เพิ่มค่าตัวแปรนับลำดับ
                                    //mysqli_close($connection); 
                                    }?>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </main>
                
            </div>

        </div>
        
    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

<script language="JavaScript">
function Del(mypage){
    var agree=confirm("คุณต้องการลบหรือไม่")
    if(agree){
        window.location=mypage;
    }
}

</script>
