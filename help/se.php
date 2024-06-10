<?php require("help/connect.php"); 

$searchmush="";
$searchvelue="";
if (isset($_GET["search"])) {
    $searchmush="ค้นหา $_GET[search] | ";
    $searchvelue = $_GET["search"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $searchmush; ?>mushroom</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" > 
</head>
<body>
    <div>
        <?php 
        
        $sql="SELECT * FROM mushroom ";
        if (isset($_GET["search"])) {
            $search = mysqli_real_escape_string($connection, $_GET["search"]);
            $sql .= "WHERE mush_name LIKE '%$search%'";
        }
        $sql .= "ORDER BY mush_id DESC";
        $result = mysqli_query($connection,$sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <form>
            <p>
                <input type="search" name="search" value="<?php echo $searchvelue; ?>">
                <button type="submit">ค้นหา</button>
            </p>
        </form>

        <h3>พบเห็ด <?php echo count($rows); ?> รายการ</h3>
        <?php foreach ($rows as $row): ?>
            <div>
                <h4><?php echo $row['mush_name']; ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>

