<?php
require("../help/connect.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure id is an integer to prevent SQL injection
    $sql = "SELECT * FROM ckeditor WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if (!$row) {
            $error_message = "No record found with the given ID.";
        } else {
            // Assign fetched data to variables
            $ids = $row['id']; // assuming 'id' is the primary key
            $content = $row['content'];
        }
    } else {
        $error_message = "Query failed: " . mysqli_error($connection);
    }
} else {
    $error_message = "ID parameter is missing.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X_UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Details</title>
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
<body>

<div class="container">
    <h2 class="mt-4">รายละเอียดข่าวสาร</h2>
    <div class="card mt-4">
        <div class="card-body">
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php else: ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                <div class="container">
                    <div class="form-group content">
                        <p><?=$row['content'] ?></p>
                    </div>
                </div>
            <?php endif; ?><br>
            <a href="shownews.php" class="btn btn-primary">กลับ</a>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
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
</script>

</body>
</html>


