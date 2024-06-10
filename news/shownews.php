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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .truncate {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: pre-wrap; /* Ensure the newline characters are respected */
            font-size: 16px; /* Set the font size to 16px */
            font-weight: normal; /* Ensure the font weight is normal */
        }
    </style>
    </head>

    <body class="sb-nav-fixed">
        
    <?php include 'meenew.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        

                    <div class="container">
        <div class="h4 text-center alert alert-primary mb-4 mt-4" role="alert">แสดงข้อมูลข่าวสาร</div>
        <div class="row mb-4">
            <div class="col-sm">
                <a href="ckeditor.php" class="btn btn-info">เพิ่มข้อมูลข่าวสาร</a>
            </div>
            <div class="col-sm-6">
                <form action="searchdata.php" method="POST" class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="search" name="search" required>
                    <button class="btn btn-info" type="submit">ค้นหา</button>
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>วันที่</th>
                    <th>รายการข่าว</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM ckeditor
                ORDER BY created_at DESC";
                $result = mysqli_query($connection, $sql);
                $count = 1; // เริ่มต้นที่ลำดับ 1
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr> 
                        <td><?= $count++ ?></td> <!-- แสดงเลขลำดับและเพิ่มค่าลำดับทีละ 1 -->
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["title"] ?></td>
                        
                        <td><a href="detail.php?id=<?= $row["id"] ?>" class="btn ">
                        <img src="../image/icons8-detail-48.png" alt="รายละเอียด" style="width: 30px; height: 30px;"></a></td>

                        <td><a href="edit.php?id=<?= $row["id"] ?>" class="btn ">
                        <img src="../image/icons8-edit-64.png" alt="แก้ไข" style="width: 30px; height: 30px;"></a></td>

                        <td><a href="delete.php?id=<?= $row["id"] ?>" class="btn " onclick="Del(this.href);return false;">
                        <img src="../image/icons8-delete-48.png" alt="ลบ" style="width: 30px; height: 30px;"></a></a></td>
                    </tr>
                <?php
                }
                mysqli_close($connection); //ปิดการเชื่อมต่อฐานข้อมูล
                ?>
            </tbody>
        </table>
    </div>
                        

                    </div>
                   
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

        <script language="JavaScript">
    function Del(mypage) {
        var agree = confirm("คุณต้องการลบข้อมูลใช่หรือไม่");
        if (agree) {
            window.location = mypage;
        }
    }
</script>