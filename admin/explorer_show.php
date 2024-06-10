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
                    <h1 class="mt-4">ข้อมูลการสำรวจ</h1>
                    <div class="card mb-4 mt-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <a href="explorer_add.php" class="btn btn-primary" role="button">เพิ่ม</a><br><br>

                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่</th>
                                            <th>พื้นที่สำวจ</th>
                                            <th>ภูมิภาค</th>
                                            <th>จัดการข้อมูล</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr> <!-- ใช้ค้นหา -->
                                            <th>area</th>
                                        </tr>
                                    </tfoot>
                            <?php 
                            $sql ="SELECT * FROM survey
                            ORDER BY date ASC"; //เรียงตามพยัญชนะ
                            $result = mysqli_query($connection,$sql);
                            
                            $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                            while($row=mysqli_fetch_array($result)){
                            ?>
                                    
                                    <tr>
                                        <td><?= $counter ?></td> <!-- แสดงเลขลำดับ -->
                                        <td><?=$row["date"]?></td>
                                        <td><?=$row['area']?></td>
                                        <td><?=$row['region_id']?></td>
  
                                        <td><a href="explorer_edit.php?explorer_id=<?=$row["explorer_id"]?>" class="btn btn-primary mb-4">แก้ไข</a>
                                        <a href="explorer_del.php?explorer_id=<?=$row["explorer_id"]?> "  class="btn btn-danger mb-4" onclick="Del(this.href);return false;">ลบ</a></td>
                                        
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
