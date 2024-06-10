<?php
header('Content-Type: application/json');

require("../help/connect.php"); 

$sql = "SELECT region.region_name, COALESCE(COUNT(survey.region_id), 0) as region_count 
        FROM region 
        LEFT JOIN survey ON survey.region_id = region.region_id
        GROUP BY region.region_name";

$result = mysqli_query($connection, $sql);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}



mysqli_close($connection);

echo json_encode($data);
?>
