<?php
require_once './api/dbcon.php';

$data = $_GET['data'];

$vid = $data; // Replace 123 with the desired ID

$query = "SELECT * FROM video WHERE vid = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $vid);
mysqli_stmt_execute($stmt);
$query_result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($query_result);
// Access the column values
$video_name = $row['video_name'];
$pre_name = $row['pre_name'];
$status = $row['status'];
$duration = $row['duration'];
$created_at = $row['created_at'];


?>

<head>
    <link rel="stylesheet" href="./assets/css/ground.css">





    <style>
        .ground video::-webkit-media-controls-current-time-display,
        .ground video::-webkit-media-controls-time-remaining-display {
            color: rgb(76, 246, 201);
        }

        .ground video::-webkit-media-controls-play-button,
        .ground video::-webkit-media-controls-pause-button {
            color: rgb(76, 246, 201);
        }

        .ground video::-webkit-media-controls-mute-button {
            color: rgb(76, 246, 201);
        }

        .ground video::-webkit-slider-runnable-track {
            background-color: rgb(76, 246, 201);
        }
    </style>
</head>

<div class="ground">
    <video id="myVideo" src="<?php echo 'uploads/videos/' . $pre_name ?>" controls></video>
</div>