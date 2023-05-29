<?php
require_once './api/dbcon.php';

$data = $_GET['data'];

$vid = 2; // Replace 123 with the desired ID

$query = "SELECT * FROM video WHERE vid = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $vid);
mysqli_stmt_execute($stmt);
$query_result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($query_result)) {
    // Access the column values
    $video_name = $row['video_name'];
    $pre_name = $row['pre_name'];
    $status = $row['status'];
    $duration = $row['duration'];
    $created_at = $row['created_at'];

    // Process the data as needed
    // ...
} else {
    // Handle case when ID is not found
    // ...
}
