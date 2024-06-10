<?php
    require("../help/connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $content = $_POST['content'];
        $title = $_POST['title'];
        
        // Use prepared statements to prevent SQL injection
        $stmt = $connection->prepare("INSERT INTO ckeditor (title, content, created_at) VALUES (?, ?, CURDATE())");
        $stmt->bind_param("ss", $title, $content);
        
        if ($stmt->execute()) {
            echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location='shownews.php';</script>";
        } else {
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้: " . $connection->error . "'); window.location='shownews.php';</script>";
        }

        $stmt->close();
        $connection->close();
    }
    ?>
