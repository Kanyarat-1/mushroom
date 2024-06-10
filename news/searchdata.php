<?php
require("../help/connect.php");

if (isset($_POST['search'])) {
    $search = "%" . $_POST['search'] . "%";
    $data = $connection->prepare("SELECT * FROM ckeditor  WHERE content LIKE ? ORDER BY created_at DESC");
    $data->bind_param("s", $search);
    $data->execute();
    $result = $data->get_result();
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC); // Fetch all matching rows
    } else {
        $error_message = "ขออภัย ไม่พบข้อมูล!!!";
    }
    $data->close();
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
        <title>mushroom</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <style>
        .box {
            width: 100%;
            max-width: 1500px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 16px;
            margin: 0 auto;
        }
        .custom-textarea {
            min-height: 300px;
            overflow-y: auto;
        }
        /* New CSS to center images */
        .content img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%; /* Ensure images do not overflow their container */
        }
    </style>
    </head>

    <body class="sb-nav-fixed">
        
    <?php include 'meenew.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                    <div class="container">
    <h2 class="mt-4">รายละเอียดข่าวสารที่ค้นพบ</h2>
    <a href="shownews.php" class="btn btn-primary">กลับ</a>
    <div class="card mt-4">
        <div class="card-body">
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php else: ?>
                <?php foreach ($rows as $row): ?>
                <div class="container">
                <div class="form-group content">
                    <p><?=$row['created_at'] ?></p>
                    <p><?=$row['content'] ?></p>
                </div>
                </div>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>


            <!-- to the top -->
        <footer class="w3-container " style="padding:32px">
            <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        </footer>
        </div>
        
    </div>
</div>

</div>
                   
                </main>
                
            </div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    <?php if (!isset($error_message)): ?>
        <?php foreach ($rows as $row): ?>
            ClassicEditor
                .create(document.querySelector('#content_<?= $row['id'] ?>'), {
                  toolbar: false, // ปิดแถบเมนูด้านบน
                    ckfinder: {
                        uploadUrl: 'fileupload.php'
                    }
                })
                .then(editor => {
                    console.log('Editor was initialized', editor);
                })
                .catch(error => {
                    console.error('There was a problem initializing the editor:', error);
                });
        <?php endforeach; ?>
    <?php endif; ?>

</script>
                    
                        

                    

    </body>
</html>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>


