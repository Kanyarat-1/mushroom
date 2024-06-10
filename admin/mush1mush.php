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
        
    <?php include 'me.php'; 
    
    //แบ่งหน้าเพจ
    $perpage =  4;
    if(isset($_GET['page'])) {
        $page = $_GET['page'];

    }else{
        $page = 1;

    }
    $start = ($page -1) * $perpage;
    
    ?>

    

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">ข้อมูลเห็ด</h1>

                        <a href="mush_add.php" class="btn btn-primary" role="button">เพิ่ม</a><br><br>
                    
                

    <table class="table table-striped">
    <tr> <!-- หัวข้อตาราง -->
        <th>ชื่อเห็ด</th>
        <th>หมวดหมู่</th>
        <th>ไฟลัม</th>
        <th>ชื่อวิทยาศสตร์</th>
        <th>ภูมิภาค</th>
        <th>รูปภาพ</th>
        <th>จัดการข้อมูล</th>

    </tr>

    <?php  

$search = @$_POST['search'];
if($search !=""){

    $sql = "SELECT *
    FROM mushroom 
    JOIN region ON mushroom.region_id = region.region_id
    JOIN phylum ON mushroom.phylum_id = phylum.phylum_id
    JOIN category ON mushroom.cate_id = category.cate_id 
    ORDER BY mush_id limit {$start},{$perpage}
    WHERE mush_name LIKE '%$search%' or sci_name LIKE '%$search%' 
    or region_name LIKE '%$search%' or phylum_eng LIKE '%$search%'
    or cate_thai LIKE '%$search%'";

}else{

    $sql = "SELECT *
    FROM mushroom 
    JOIN region ON mushroom.region_id = region.region_id
    JOIN phylum ON mushroom.phylum_id = phylum.phylum_id
    JOIN category ON mushroom.cate_id = category.cate_id";

}

$result=mysqli_query($connection, $sql);

while($row=mysqli_fetch_array($result)) {
?>

    <tr>
    <td><?=$row["mush_name"]?></td>
    <td><?=$row["cate_thai"]?></td>
    <td><?=$row["phylum_eng"]?></td>
    <td><?=$row["sci_name"]?></td>
    <td><?=$row["region_name"]?></td>

    <td><image src="../image/<?=$row["image"]?>" width="150px" hieght="100px" > </td>
    
    <td><a href="mush_edit.php?mush_id=<?=$row["mush_id"]?> "  class="btn btn-success mb-4">แก้ไข</a>
    <a href="del.php?mush_id=<?=$row["mush_id"]?> "  class="btn btn-danger mb-4" onclick="Del(this.href);return false;">ลบ</a></td>
    
    </tr>
    <?php
}  
//mysqli_close($connection);
?>

</table>

        </main>                
       </div>      
       </div>            
                            
    <?php 
    
    $sql1 = "SELECT * FROM mushroom ";
    $query1 = mysqli_query($connection,$sql1);
    $total_record = mysqli_num_rows($query1);
    $total_page = ceil($total_record / $perpage);
    ?>  
    
    <br><br><br>

<nav aria-label="Page navigation example ">
  <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link" href="mush1.php?page=1">Previous</a></li>
    <?php for($i=1;$i<=$total_page;$i++) { ?>
    <li class="page-item"><a class="page-link" href="mush1.php?page=<?=$i?>"><?=$i?></a></li>
   <?php } ?>
    <li class="page-item"><a class="page-link" href="mush1.php?page=<?=$total_page?>">Next</a></li>
  </ul>
</nav>

<?php mysqli_close($connection); ?>
                        
                    

    
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

<script language="JavaScript">
function Del(mypage){
    var agree=confirm("คุณต้องการลบหรือไม่")
    if(agree){
        window.location=mypage;
    }
}

</script>
