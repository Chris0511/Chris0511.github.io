<?php
include 'koneksi.php';

// Periksa apakah parameter id telah dikirim melalui GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Escape input untuk menghindari SQL Injection
    $id = $koneksi->real_escape_string($_GET['id']);

    // Buat dan jalankan query DELETE
    $sql = "DELETE FROM tbminuman WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        echo '<script>alert("Data berhasil dihapus."); window.location.href = "form.php";</script>';
    } else {
        echo "Terjadi kesalahan: " . $koneksi->error;
    }
} else {
    echo "ID tidak valid atau tidak ditemukan.";
}

$koneksi->close();
?>
