<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>
    <div class="container">
        <div class=" h4 text-center alert alert-primary mb-4 mt-4" role="alert"> เพิ่มข้อมูลข่าวสาร </div>

        <div class="container"> 
            <form method="POST" action="insert.php" enctype="multipart/form-data"> 
                <label>Date :</label> 
                <input type="date" name="date" ><br>
                <div class="row">
                    <label class="mt-3">Topic :</label>
                    <div class="col-sm-15">
                        <textarea class="form-control" name="topic" placeholder="หัวข้อข่าว" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <label class="mt-3">Content :</label>
                    <div class="col-sm-15">
                        <textarea class="form-control" name="content"placeholder="เนื้อหาข่าว" required></textarea>
                    </div>
                </div>
                <label class="mt-3">URL :</label> 
                <input type="text" name="url" class="form-control" ><br>

                <div class="form-group">
                    <label for="image" class="form-label">Upload Image :</label>
                    <input type="file" accept="image" id="imageInput" name="image" class="form-control" required >
                    <img id="previewImg" class="img-fluid rounded">
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-1">
                        <input type="submit" value="บันทึก" class="btn btn-success btn-block">
                    </div>
                    <div class="col-sm-1">
                        <a href="shownews.php" class="btn btn-danger btn-block">ยกเลิก</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script> //แสดงรูปที่เลือก
        let imageInput = document.querySelector("#imageInput"); 
        let previewImg = document.querySelector("#previewImg");

        imageInput.onchange = evt => {
            const [file] = imageInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>
    <style>
        #previewImg {
            max-width: 300px; /* ปรับขนาดรูปภาพตามที่ต้องการ */
            height: auto; /* ปรับความสูงให้สอดคล้องกับอัตราส่วน */
            margin-top: 20px; /* ระยะห่างด้านบนของรูป */
        }
    </style>
</body>
</html>
