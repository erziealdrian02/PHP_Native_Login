<?php
session_start();

include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    // Lakukan validasi data jika diperlukan

    // Query untuk menambahkan pengguna baru ke database
    $insert_query = "INSERT INTO users (name, email, password) VALUES ('$username', '$user_email', '$user_password')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Pengguna berhasil ditambahkan!";
        header("Location: user.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>
