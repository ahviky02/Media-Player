<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "player";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
