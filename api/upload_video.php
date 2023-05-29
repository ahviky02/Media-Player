<?php
session_start(); // Start the session
require_once 'dbcon.php';
require_once '../Library/getid3/getid3.php';

if (isset($_POST['upload_video'])) {
    $targetDirectory = "../uploads/videos/";
    $uploadedFile = $_FILES['file']['name'];
    $targetFile = $targetDirectory . basename($uploadedFile);

    $getID3 = new getID3();

    // Analyze the video file
    $fileInfo = $getID3->analyze($_FILES['file']['tmp_name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $pre_name = $_FILES['file']['name'];
        $status = 1;
        $video_name = $_POST['video_name'];

        // Get the duration in seconds
        $durationInSeconds = $fileInfo['playtime_seconds'];

        // Format the duration as H:i:s (hours:minutes:seconds)
        $duration = gmdate('H:i:s', $durationInSeconds);

        $created_at = date("Y-m-d H:i:s");

        $sql_query = "INSERT INTO video (video_name, pre_name, status, duration, created_at) VALUES ('$video_name', '$pre_name', '$status', '$duration', '$created_at')";
        $conn->query($sql_query);

        $_SESSION['Video_Upload'] = "File uploaded successfully.";
    } else {
        $_SESSION['Video_Upload'] = "Error uploading the file.";
    }

    // Redirect to the current page to display the message
    header("Location: ../upload-video.php");
    exit;
}
