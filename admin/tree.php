<?php require("../help/connect.php");?>

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

        <title>Select Category with Image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<h1 class="mt-4">เพิ่มข้อมูลเห็ด</h1>

<div class="col-sm-6">
<form name="form1" method="post" action="treein.php" enctype="multipart/form-data">
    <div class="row"> <!-- ชื่อเห็ด -->
        <label class="col-sm-2 col-form-label  ">ชื่อเห็ด :</label>
            <div class="col-sm-10">
                <input type="text" id="mush_name" name="mush_name" class="form-control" placeholder="ชื่อเห็ด..." required  onblur="checkname
                (this.value)"><br>
                <span id="checkname"></span>
            </div>
    </div>

    <div class="row"> <!-- รายละเอียด -->
        <label class="col-sm-3 col-form-label">รายละเอียด :</label>
            <div class="col-sm-9 ">
                <textarea name="mushdetail" class="form-control" class="form-control "   > </textarea> <br>
            </div>
    </div>

<button type="submit" class="btn btn-success">บันทึก</button>
<a href="mush1.php" class="btn btn-danger" role="button">ยกเลิก</a>


</form>
</div>

<script> scr ="https://code.jquery.com/jquery-3.7.1.js"</script>
<script>
    function checkname(val){
        $.ajax({
            type: 'POST',
            url: 'treein.php',
            data: 'nmush='+val,
            success: function(data){
                $('#checkname').html(data);
            }
        });
    }
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


        