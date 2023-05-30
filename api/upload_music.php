<?php
session_start(); // Start the session
require_once 'dbcon.php';
require_once '../Library/getid3/getid3.php';

if (isset($_POST['upload_music'])) {
    $targetDirectory = "../uploads/audios/";
    $uploadedFile = $_FILES['file']['name'];
    $targetFile = $targetDirectory . basename($uploadedFile);

    function formatTime($time)
    {
        $hours = floor($time / 3600);
        $minutes = floor(($time % 3600) / 60);
        $seconds = $time % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    $getID3 = new getID3();

    // Analyze the audio file
    $fileInfo = $getID3->analyze($_FILES['file']['tmp_name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $pre_name = $_FILES['file']['name'];
        $status = 1;
        $music_name = $_POST['music_name'];
        $durationSeconds = $fileInfo['playtime_seconds'];
        $durationFormatted = formatTime($durationSeconds);
        $created_at = date("Y-m-d H:i:s");

        $sql_query = "INSERT INTO music (music_name, pre_name, status, duration, created_at) VALUES ('$music_name', '$pre_name', '$status', '$durationFormatted', '$created_at')";
        $conn->query($sql_query);

        $_SESSION['Music_Upload'] = "File uploaded successfully.";
    } else {
        $_SESSION['Music_Upload'] = "Error uploading the file.";
    }

    // Redirect to the current page to display the message
    header("Location: ../upload.php");
    exit;
}
