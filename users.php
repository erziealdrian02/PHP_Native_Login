<?php
include("koneksi.php");
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION["email"];
?>

<?php include("component/header.php"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("component/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("component/navbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6><br>
                            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                                Tambah User
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    // Query untuk mengambil data pengguna
                                    $users_query = "SELECT * FROM users";
                                    $users_result = $conn->query($users_query);

                                    if ($users_result->num_rows > 0) {
                                        while ($user_row = $users_result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $user_row['id'] . "</td>";
                                            echo "<td>" . $user_row['name'] . "</td>";
                                            echo "<td>" . $user_row['email'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-warning btn-sm edit-btn' data-toggle='modal' data-target='#editModal' data-userid='" . $user_row['id'] . "'>Edit</button>     ";
                                            echo "<button class='btn btn-danger btn-sm' onclick='deleteUser(" . $user_row['id'] . ")'>Delete</button>";
                                            // Tambahkan tombol lain atau tautan sesuai kebutuhan
                                            echo "</td>";
                                            // Tambahkan kolom lain sesuai kebutuhan
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No users found.</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("component/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include("component/scroll.php"); ?>

    <!-- Logout Modal-->
    <?php include("component/modal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>