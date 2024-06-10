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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="sb-nav-fixed">
<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        $show=header("location: ../login/login.php");
    }
?>
<?php require("../help/connect.php"); ?>

<?php include 'pag.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ข้อมูลการสำรวจ</h1>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            สำรวจเห็ดทางภูมิภาค
                        </div>
                        <div class="card-body"><canvas id="graphCanvas" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="graphCanvasdate" width="100%" height="50"></canvas></div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 mt-4">
                <div class="card-body text-primary">
                    <a href="survey_add.php" class="btn btn-primary" role="button">เพิ่ม</a><br><br>
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
                            <tr> <!-- ใช้ค้นหา -->
                                <th>date</th>
                                <th>region_id</th>
                                <th>ex_mushname</th>
                            </tr>
                        </tfoot>
                        <?php 
                            $sql ="SELECT * FROM survey 
                            JOIN region ON survey.region_id = region.region_id
                            ORDER BY survey.date ASC "; //เรียงตามพยัญชนะ
                            $result = mysqli_query($connection,$sql);
                            
                            $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                            while($row=mysqli_fetch_array($result)){
                        ?>
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
                            }?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
</body>

<script language="JavaScript">
    function Del(mypage){
        var agree=confirm("คุณต้องการลบหรือไม่")
        if(agree){
            window.location=mypage;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

<script>
    $(document).ready(function () {
        showGraph();
    });

    function showGraph() {
        $.post("chart_data.php", function (data) {
            console.log(data);
            var name = [];
            var counts = [];

            for (var i in data) {
                name.push(data[i].region_name);
                counts.push(data[i].region_count);
            }

            var colors = [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', 
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
            ];

            var chartdata = {
                labels: name,
                datasets: [
                    {
                        label: 'ข้อมูลสำรวจเห็ดภูมิภาค',
                        backgroundColor: colors,  // Array of colors for each bar
                        borderColor: colors,  // Array of border colors for each bar
                        hoverBackgroundColor: colors.map(color => shadeColor(color, -20)),  // Darker shades for hover effect
                        hoverBorderColor: colors.map(color => shadeColor(color, -20)),  // Darker shades for hover effect
                        data: counts
                    }
                ]
            };

            var graphTarget = $("#graphCanvas");

            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata
            });
        });
    }

    function shadeColor(color, percent) {
        var num = parseInt(color.slice(1), 16),
            amt = Math.round(2.55 * percent),
            R = (num >> 16) + amt,
            G = (num >> 8 & 0x00FF) + amt,
            B = (num & 0x0000FF) + amt;
        return "#" + (0x1000000 + (R < 255 ? (R < 1 ? 0 : R) : 255) * 0x10000 + (G < 255 ? (G < 1 ? 0 : G) : 255) * 0x100 + (B < 255 ? (B < 1 ? 0 : B) : 255)).toString(16).slice(1).toUpperCase();
    }
</script>



</html>

