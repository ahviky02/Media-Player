<?php
session_start(); // Start the session
require_once 'dbcon.php';
require_once '../Library/getid3/getid3.php';

if (isset($_POST['upload_music'])) {
    $targetDirectory = "../uploads/";
    $uploadedFile = $_FILES['file']['name'];
    $targetFile = $targetDirectory . basename($uploadedFile);

    $getID3 = new getID3();

    // Analyze the audio file
    $fileInfo = $getID3->analyze($_FILES['file']['tmp_name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $pre_name = $_FILES['file']['name'];
        $status = 1;
        $music_name = $_POST['music_name'];
        $duration = $fileInfo['playtime_seconds'];
        $created_at = date("Y-m-d H:i:s");

        $sql_query = "INSERT INTO music (music_name, pre_name, status, duration, created_at) VALUES ('$music_name', '$pre_name', '$status', '$duration', '$created_at')";
        $conn->query($sql_query);

        $_SESSION['Music_Upload'] = "File uploaded successfully.";
    } else {
        $_SESSION['Music_Upload'] = "Error uploading the file.";
    }

    // Redirect to the current page to display the message
    header("Location: ../upload.php");
    exit;
}
