<?php
$servername = "sql6.freesqldatabase.com";
$username = "sql6679860";
$password = "fMdTxwTkSc";
$database = "sql6679860";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
