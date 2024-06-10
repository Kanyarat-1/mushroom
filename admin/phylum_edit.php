<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
}
?>

<?php require("../help/connect.php"); 
$phylumid = $_GET['phylum_id'];
$sql = "SELECT * FROM phylum WHERE phylum_id='$phylumid'";
$result=mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);

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
                        <h1 class="mt-4">แก้ไขไฟลัม</h1>

                        <!-- แบ่งฝั่ง ที่1 -->
<div class="row">
  <div class="col-sm-6">
 <form name="form1" method="post" action="phylum_up.php" enctype="multipart/form-data">

 <div class="row"> <!-- ชื่อเห็ด -->
    <div class="col-sm-10">
    <input type="hidden" name="namephylum0" class="form-control" value=<?=$row['phylum_id'] ?>  ><br>
    </div>
  </div>

  <div class="row"> <!-- ชื่อเห็ด -->
 <label class="col-sm-2 col-form-label">ชื่อไฟลัมอังกฤษ :</label>
    <div class="col-sm-10">
    <input type="text" name="namephylum1" class="form-control" value=<?=$row['phylum_eng'] ?>  ><br>
    </div>
  </div>

  <div class="row"> <!-- ชื่อเห็ด -->
 <label class="col-sm-2 col-form-label">ชื่อไฟลัมไทย :</label>
    <div class="col-sm-10">
    <input type="text" name="namephylum2" class="form-control" value=<?=$row['phylum_thai'] ?>  ><br>
    </div>
  </div>

  <!-- ปุ่ม -->
<button type="submit" value="Update" class="btn btn-success">บันทึก</button>
<a href="phylum_show.php" class="btn btn-danger" role="button">ยกเลิก</a>

</form>

</div> <!-- end edit -->

<div class="card mb-4 mt-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">

                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่ออังกฤษ</th>
                                            <th>ชื่อไทย</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr> <!-- ใช้ค้นหา -->
                                            <th>phylum_eng</th>
                                            <th>phylum_thai</th>
                                        </tr>
                                    </tfoot>
                            <?php 
                            $sql ="SELECT * FROM phylum
                            ORDER BY phylum_eng ASC"; //เรียงตามพยัญชนะ
                            $result = mysqli_query($connection,$sql);
                            
                            $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                            while($row=mysqli_fetch_array($result)){
                            ?>
                                    
                                    <tr>
                                        <td><?= $counter ?></td> <!-- แสดงเลขลำดับ -->
                                        <td><?=$row["phylum_eng"]?></td>
                                        <td><?=$row['phylum_thai']?></td>
                                        
                                    </tr>
                                    <?php  
                                    $counter++; // เพิ่มค่าตัวแปรนับลำดับ
                                    //mysqli_close($connection); 
                                    }?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="phylum_show.php" class="btn btn-secondary" role="button">ย้อนกลับ</a>
                </main>
                
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