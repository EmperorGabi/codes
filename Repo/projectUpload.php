<?php
    if (isset($_POST['submit'])) {
        $studentId = $_POST['student_id'];
        $lecturerId = $_POST['lecturer_id'];
        $topic = $_POST['lecturer_id'];
        $time = time();
        $db = mysqli_connect('localhost', 'root', '', 'unregister'); 
        mysqli_query($db, "INSERT INTO pendingProject (studentId,lecturerId,topic,time) VALUES ('$studentId','$lecturerId','$topic', '$time')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Upload</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="student_id" placeholder="student id">
        <input type="text" name="lecturer_id" placeholder="lecturer id">
        <input type="text" name="topic" placeholder="topic">
        <input type="submit" name="submit">
    </form>
</body>
</html>