<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>แก้ไขข้อมูลข่าวสาร</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script><meta charset="UTF-8">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
        body {font-family: "Lato", sans-serif}
        .mySlides {display: none}
        </style>  

        
    </head>

    <body class="sb-nav-fixed">

        
    <?php include 'meenew.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                    <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a class="w3-bar-item w3-padding-large">ข้อมูลข่าวที่ค้นพบ</a>
  </div>
</div>
<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">



  <?php
  if (isset($_POST['search'])) {
      include ("../help/connect.php");
      $search = "%" . $_POST['search'] . "%";
      $data = $connection->prepare("SELECT * FROM ckeditor WHERE content LIKE ?");
      $data->bind_param("s", $search);
      $data->execute();
      $result = $data->get_result();
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $date = $row['created_at'];
              $content = $row['content'];
  ?>
          <!-- The Band Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width: 800px;" id="band">
          <p class="w3-opacity"><i><?= htmlspecialchars($date) ?></i></p>
          <div style="text-align: left;">
          <p style="white-space: pre-line;"><?= ($row["content"]) ?></p>
        </div>
        <div class="w3-row w3-padding-32"></div>

  <?php
          }
      } else {
          echo "<div class='w3-container w3-content w3-center w3-padding-64' style='max-width:800px'><h2>ขอภัย ไม่พบข้อมูล!!!</h2></div>";
      }
      $data->close();
  }
  ?> 
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
