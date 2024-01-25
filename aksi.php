<?php
// Fungsi untuk logout
function logout() {
    if (isset($_SESSION["email"])) {
        // Hapus semua variabel sesi
        session_unset();

        // Hancurkan sesi
        session_destroy();
    }

    // Mengarahkan kembali ke halaman login
    header("Location: index.php");
    exit();
}

// Fungsi untuk menambah file
function addFile($conn) {
    // Memeriksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai dari form
        $username = $_POST["username"];
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];

        // Lakukan validasi atau logika lainnya sesuai kebutuhan

        // Query untuk menambahkan pengguna ke database (sesuaikan dengan struktur tabel Anda)
        $query = "INSERT INTO users (username, user_email, user_password) VALUES ('$username', '$user_email', '$user_password')";

        if ($conn->query($query) === TRUE) {
            // Jika berhasil menambahkan pengguna, arahkan ke halaman dashboard
            header("Location: users.php");
            exit();
        } else {
            // Jika terjadi kesalahan, Anda dapat menangani sesuai kebutuhan
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

// Fungsi untuk menghapus file
function deleteFile() {
    // Tambahkan logika untuk menghapus file di sini
    // ...

    // Setelah menghapus file, bisa mengarahkan ke halaman yang sesuai
    header("Location: dashboard.php");
    exit();
}

// Check apakah parameter action terdefinisi dan panggil fungsi yang sesuai
if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case "logout":
            logout();
            break;
        case "addFile":
            addFile($username, $user_email, $user_password);
            break;
        case "deleteFile":
            deleteFile();
            break;
        // Tambahkan case lainnya sesuai kebutuhan
        default:
            // Jika action tidak sesuai, bisa diarahkan ke halaman yang sesuai atau berikan respons lainnya
            break;
    }
}

if (isset($_GET["action"]) && $_GET["action"] == "addFile") {
    addFile($conn);
}

// ... Selanjutnya, bisa menambahkan bagian HTML atau PHP lainnya sesuai kebutuhan
?>
