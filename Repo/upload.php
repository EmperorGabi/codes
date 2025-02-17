<?php
session_start();
$lecturerID = $_SESSION['id'];

if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    
    // Move the uploaded file to a designated directory
    $uploadDir = 'uploads/';
    $targetFilePath = $uploadDir . $fileName;
    move_uploaded_file($fileTmpName, $targetFilePath);
    
    // Store information in database (e.g., filename, title, description, lecturerID)
    // Perform database INSERT query here
}
?>
