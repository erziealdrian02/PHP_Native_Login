<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $user_id = $_POST["id"];

    // Query untuk menghapus data pengguna
    $delete_query = "DELETE FROM users WHERE id = $user_id";

    if ($conn->query($delete_query) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
