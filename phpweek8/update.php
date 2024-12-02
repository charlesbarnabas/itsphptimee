<?php
// update.php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM data_buku WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $Judul_Buku = $_POST['Judul_Buku'];
    $Penulis = $_POST['Penulis'];
    $Tahun_Terbit = $_POST['Tahun_Terbit'];
    $Genre = $_POST['Genre'];
    $id = $_POST['id'];

    $sql = "UPDATE data_buku SET Judul_Buku = '$Judul_Buku', Penulis = '$Penulis', Tahun_Terbit = '$Tahun_Terbit', Genre = '$Genre' WHERE id = '$id'";
    if (mysqli_query($db, $sql)) {
        header("Location: read.php?update=success");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . mysqli_error($db) . "</div>";
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
    <h1>Update Buku</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <label for="Judul_Buku" class="form-label">Judul Buku:</label>
            <input type="text" class="form-control" name="Judul_Buku" id="Judul_Buku" value="<?php echo $row['Judul_Buku']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Penulis" class="form-label">Penulis:</label>
            <input type="text" class="form-control" name="Penulis" id="Penulis" value="<?php echo $row['Penulis']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Tahun_Terbit" class="form-label">Tahun Terbit:</label>
            <input type="number" class="form-control" name="Tahun_Terbit" id="Tahun_Terbit" value="<?php echo $row['Tahun_Terbit']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Genre" class="form-label">Genre:</label>
            <input type="text" class="form-control" name="Genre" id="Genre" value="<?php echo $row['Genre']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
        <a href="read.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
