<?php
// create.php
include 'koneksi.php';
$success_message = '';

if (isset($_POST['submit'])) {
    $sql_max_id = "SELECT MAX(id) as max_id FROM data_buku";
    $result_max = mysqli_query($db, $sql_max_id);
    $row_max = mysqli_fetch_assoc($result_max);
    $max_id = $row_max['max_id'];

    $new_id = ($max_id === null) ? 1 : $max_id + 1;

    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];

    $sql = "INSERT INTO data_buku (id, judul_buku, penulis, tahun_terbit, genre) VALUES ('$new_id', '$judul_buku', '$penulis', '$tahun_terbit', '$genre')";
    
    if (mysqli_query($db, $sql)) {
        $success_message = "Data berhasil ditambahkan!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . mysqli_error($db);
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
    <h1 class="mb-4">Tambahkan Buku Baru</h1>
    <form method="post">
        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku:</label>
            <input type="text" class="form-control" name="judul_buku" id="judul_buku" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis:</label>
            <input type="text" class="form-control" name="penulis" id="penulis" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
            <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre:</label>
            <input type="text" class="form-control" name="genre" id="genre" required>
        </div>
        <div class="d-flex">
            <button type="submit" name="submit" class="btn btn-primary me-2">Tambahkan</button>
            <a href="read.php" class="btn btn-secondary">Lihat Data Buku</a>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (!empty($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
                <?php if (!empty($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="read.php" class="btn btn-primary">Lihat Data Buku</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    <?php if (!empty($success_message) || !empty($error_message)) : ?>
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    <?php endif; ?>
</script>
</body>
</html>
