<?php
require("../help/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $id = $_POST['id'];
    $content = $_POST['content'];
    $title = $_POST['title'];

    // Prepare the SQL statement with placeholders
    $sql = "UPDATE ckeditor SET 
    content='$content',
    title ='$title' 
    WHERE id = '$id'";
    $stmt = $connection->prepare($sql);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย'); window.location='shownews.php';</script>";
    } else {
        echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้: " . $connection->error . "'); window.location='shownews.php';</script>";
    }

    // Close the statement and the connection
    $stmt->close();
    $connection->close();
} else {
    echo "<script>alert('ไม่มีข้อมูล POST ที่รับได้'); window.location='shownews.php';</script>";
}
?>