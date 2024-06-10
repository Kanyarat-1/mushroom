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
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include 'me.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">ข้อมูลเห็ด</h1>

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
                            จำนวนเห็ดของแต่ละเดือน
                        </div>
                        <div class="card-body"><canvas id="datemonth" width="100%" height="50"></canvas></div>
                    </div>
                </div>
            </div>

                        <div class="card mb-4 mt-4">
                            
                            <div class="card-body text-primary >">

                            <a href="mush_add.php" class="btn btn-primary mb-4" role="button">เพิ่ม</a><br><br>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อเห็ด</th>
                                        <th>หมวดหมู่</th>
                                        <th>ไฟลัม</th>
                                        <th>ชื่อวิทยาศสตร์</th>
                                        <th>ภูมิภาค</th>
                                        <th>รูปภาพ</th>
                                        <th>จัดการข้อมูล</th>
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr> <!-- ใช้ค้นหา -->
                                            <th>mush_name</th>
                                            <th>cate_id</th>
                                            <th>phylum_id</th>
                                            <th>sci_name</th>
                                            <th>region_id</th>
                                            
                                        </tr>
                                    </tfoot>
                            <?php 
                            $sql ="SELECT * FROM mushroom 
                            JOIN region ON mushroom.region_id = region.region_id
                            JOIN phylum ON mushroom.phylum_id = phylum.phylum_id
                            JOIN category ON mushroom.cate_id = category.cate_id
                            ORDER BY mush_name ASC"; //เรียงตามพยัญชนะ
                            $result = mysqli_query($connection,$sql);
                            
                            $counter = 1; // ตัวแปรนับลำดับเริ่มต้นจาก 1

                            while($row=mysqli_fetch_array($result)){
                            ?>
                                    
                                    <tr>
                                        <td><?= $counter ?></td> <!-- แสดงเลขลำดับ -->
                                        <td><?=$row["mush_name"]?></td>
                                        <td><image src="../image/<?=$row["imagecate"]?>" width="70px" hieght="100px" > </td>
                                        
                                        <td><?=$row["phylum_eng"]?></td>
                                        <td><?=$row["sci_name"]?></td>
                                        <td><?=$row["region_name"]?></td>

                                        <td><image src="../image/<?=$row["image"]?>" width="150px" hieght="100px" > </td>

                                        <td><a href="mush_edit.php?mush_id=<?=$row['mush_id']?>" class="btn mb-4">
                                        <img src="../image/icons8-edit-64.png" alt="แก้ไข" style="width: 30px; height: 30px;"></a>

                                        <a href="mush_del.php?mush_id=<?=$row["mush_id"]?> "  class="btn mb-4" onclick="Del(this.href);return false;">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

<script type="text/javascript" src="./chart-js/jquery.min.js"></script>
<script type="text/javascript" src="./chart-js/Chart.min.js"></script>
</head>
<body>
    
<!-- กราฟภูมิภาค -->
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
                type: 'pie',
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


<!-- กราฟเดือน -->
<script>
    $(document).ready(function () {
        showGraph1();
    });

    function showGraph1() {
        $.post("chart_data_date.php", function (data) {
            console.log(data);
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var counts = Array(12).fill(0);

            for (var i in data) {
                var monthIndex = new Date(data[i].datemonth + "-01").getMonth();
                counts[monthIndex] = data[i].count;
            }

            var colors = [
                '#e51c23', '#36A2EB', '#e91e63', '#9c27b0', '#673ab7', '#ff5722', 
                '#D3AD79', '#ffeb3b', '#b2dfdb', '#009688', '#259b24', '#8bc34a'
            ];

            var chartdata = {
                labels: months,
                datasets: [
                    {
                        label: 'เดือน',
                        backgroundColor: colors,  // Array of colors for each bar
                        borderColor: colors,  // Array of border colors for each bar
                        hoverBackgroundColor: colors.map(color => shadeColor(color, -20)),  // Darker shades for hover effect
                        hoverBorderColor: colors.map(color => shadeColor(color, -20)),  // Darker shades for hover effect
                        data: counts 
                    }
                ]
            };

            var graphTarget = $("#datemonth");

            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata
            });
        }, "json");  // Ensure that the response is parsed as JSON
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

