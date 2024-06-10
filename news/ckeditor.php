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
        <title>CKEditor Example</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
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
        .ck-editor__editable[role="textbox"] {
            min-height: 500px;
        }
        .error {
            color: green;            
        }
    </style>

        
    </head>

    <body class="sb-nav-fixed">

    <?php
    require("../help/connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $content = $_POST['content'];
        $title = $_POST['title'];
        
        // Use prepared statements to prevent SQL injection
        $stmt = $connection->prepare("INSERT INTO ckeditor (title, content, created_at) VALUES (?, ?, CURDATE())");
        $stmt->bind_param("ss", $title, $content);
        
        if ($stmt->execute()) {
            echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location='shownews.php';</script>";
        } else {
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้: " . $connection->error . "'); window.location='shownews.php';</script>";
        }

        $stmt->close();
        $connection->close();
    }
    ?>
        
    <?php include 'meenew.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                    <div class="container">
        <div class="h2 text-center alert alert-primary mb-4 mt-4" role="alert">เพิ่มข้อมูลข่าวสาร</div>
        <br>
        <div class="box">
            <form method="post" action="insert.php">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
                <div class="form-group">
                <label for="title">Content:</label>
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                    <a href="shownews.php" class="btn btn-secondary">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
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
    </script>
                        

                        

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
