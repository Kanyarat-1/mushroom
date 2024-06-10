<?php
header('Content-Type: application/json');

require("../help/connect.php");

// Get distinct months from database
$sql = "SELECT DISTINCT datemonth FROM survey ORDER BY datemonth";

$result = mysqli_query($connection, $sql);

$months = array();
while ($row = mysqli_fetch_assoc($result)) {
    $months[] = $row['datemonth'];
}

// Get count of entries for each month
$sql = "SELECT COUNT(*) as count, datemonth FROM survey GROUP BY datemonth ORDER BY datemonth";

$result = mysqli_query($connection, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['datemonth']] = $row['count'];
}

$finalData = array();
foreach ($months as $month) {
    $finalData[] = array(
        'datemonth' => $month,
        'count' => isset($data[$month]) ? $data[$month] : 0
    );
}

mysqli_close($connection);

echo json_encode($finalData);
?>
