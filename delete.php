<?php
// delete.php
include 'koneksi.php';
$success_message = '';
$error_message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['confirm_delete'])) {
        $sql = "DELETE FROM data_buku WHERE id = '$id'";
        if (mysqli_query($db, $sql)) {
            $success_message = "Data berhasil dihapus.";
        } else {
            $error_message = "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Hapus Buku</h1>
    <p>Apakah Anda yakin ingin menghapus buku ini?</p>
    <button type="button" id="confirmButton" class="btn btn-danger">Hapus Buku</button>
    <a href="read.php" class="btn btn-secondary">Batal</a>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus buku ini? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="confirm_delete" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resultModalLabel">Hasil Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (!empty($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
                <?php if (!empty($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="read.php" class="btn btn-primary">Kembali ke Data Buku</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('confirmButton').addEventListener('click', function() {
        var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();
    });

    <?php if (!empty($success_message) || !empty($error_message)) : ?>
        var resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
        resultModal.show();
    <?php endif; ?>
</script>
</body>
</html>
