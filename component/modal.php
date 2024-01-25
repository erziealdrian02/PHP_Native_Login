<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="tambah.php">
                    <div class="form-group">
                        <label for="username">Nama Pengguna:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="user_email">Email Pengguna:</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" required>
                    </div>

                    <div class="form-group">
                        <label for="user_password">Password Pengguna:</label>
                        <input type="password" class="form-control" id="user_password" name="user_password" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir untuk mengedit pengguna -->
                <form method="post" action="edit.php" id="editForm">
                    <label for="edited_username">Nama Pengguna:</label>
                    <input type="text" class="form-control" id="edited_username" name="edited_username" required>

                    <label for="edited_user_email">Email Pengguna:</label>
                    <input type="email" class="form-control" id="edited_user_email" name="edited_user_email" required>

                    <label for="edited_user_password">Password Pengguna:</label>
                    <input type="password" class="form-control" id="edited_user_password" name="edited_user_password" required>

                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menanggapi event show.bs.modal saat modal ditampilkan
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang membuka modal
            var userId = button.data('userid'); // Mendapatkan ID pengguna dari atribut data-userid

            // Mengambil data pengguna dari server menggunakan AJAX
            $.ajax({
                url: 'edit.php', // Gantilah dengan URL yang benar
                method: 'GET',
                data: { id: userId },
                dataType: 'json',
                success: function (data) {
                    // Isi formulir edit sesuai dengan data pengguna yang diambil
                    $('#edited_username').val(data.name);
                    $('#edited_user_email').val(data.email);
                    $('#edited_user_password').val(data.password);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            // Menghapus data pengguna menggunakan AJAX
            $.ajax({
                url: 'delete.php', // Gantilah dengan URL yang benar
                method: 'POST',
                data: { id: userId },
                success: function () {
                    // Refresh halaman atau perbarui tabel
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    }
</script>



