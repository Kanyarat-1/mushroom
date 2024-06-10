<?php
header('Content-Type: application/json');

require("../help/connect.php"); 

$sql = "SELECT MONTHNAME(survey.date) AS month_name, COALESCE(COUNT(survey.region_id), 0) as region_count 
        FROM survey
        LEFT JOIN region ON survey.region_id = region.region_id
        GROUP BY MONTH(survey.date)";

$result = mysqli_query($connection, $sql);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($connection);

echo json_encode($data);
?>
