<?php
header('Content-Type: application/json');

require("../help/connect.php"); 

$sql = "SELECT region.region_name, COALESCE(COUNT(mushroom.region_id), 0) as region_count 
FROM region
LEFT JOIN mushroom ON mushroom.region_id = region.region_id
GROUP BY region.region_name";

$result = mysqli_query($connection, $sql);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$sql1 = "SELECT region.region_name, COALESCE(COUNT(mushroom.region_id), 0) as region_count 
FROM region
LEFT JOIN mushroom ON mushroom.region_id = region.region_id
GROUP BY region.region_name";

$result1 = mysqli_query($connection, $sql1);

$data1 = array();
foreach ($result1 as $row1) {
    $data1[] = $row;
}

mysqli_close($connection);

echo json_encode($data);
?>
