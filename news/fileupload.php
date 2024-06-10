<?php
$data = array();

if(isset($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_path = '../news/upload/' . $file_name;
    $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

    // Debugging (remove or comment out in production)
    // echo "File Name: $file_name<br>";
    // echo "File Path: $file_path<br>";
    // echo "File Extension: $file_extension<br>";

    // Corrected file extension check
    if($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png') {
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $file_path)) {
            $data['file'] = $file_name;
            $data['url'] = $file_path;
            $data['uploaded'] = 1;
        } else {
            $data['uploaded'] = 0;
            $data['error']['message'] = 'Error! File not uploaded.';
        }
    } else {
        $data['uploaded'] = 0;
        $data['error']['message'] = 'Invalid file extension.';
    }
} else {
    $data['uploaded'] = 0;
    $data['error']['message'] = 'No file uploaded.';
}

echo json_encode($data);
?>
