<?php 
session_start();
if(!isset($_SESSION['username'])){
    $show=header("location: ../login/login.php");
    
}
?>

<?php 
require("../help/connect.php");

$ids = $_GET['id'];
$sql = "SELECT * FROM ckeditor WHERE id = $ids";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$content = $row['content'];
$title = $row['title'];
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
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            min-height: 300px;
        }
        .error {
            color: green;
        }
    </style>

        
    </head>

    <body class="sb-nav-fixed">

        
    <?php include 'meenew.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                    <div class="container">
        <div class="h2 text-center alert alert-primary mb-4 mt-4" role="alert">แก้ไขข้อมูลข่าวสาร</div>
        <br>
        <div class="box">
            <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($ids, ENT_QUOTES, 'UTF-8') ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <textarea id="title" name="title" class="form-control"> <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>
                <input type="hidden" name="id" value="<?= htmlspecialchars($ids, ENT_QUOTES, 'UTF-8') ?>">
                <div class="form-group">
                <label for="title">Content:</label>
                    <textarea id="content" name="content" class="form-control"><?= htmlspecialchars($content, ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="บันทึกการเปลี่ยนแปลง" class="btn btn-primary">
                    <button href="shownews.php" type="button" class="btn btn-secondary" onclick="cancel()">ยกเลิก</button>
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

        function cancel() {
            window.location.href = 'shownews.php';
        }
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
