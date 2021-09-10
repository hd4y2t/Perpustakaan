<?php
include 'koneksi.php';

$id_buku = $_GET['id_anggota'];
mysqli_query($koneksi, "DELETE FROM data_anggota WHERE id_anggota= $id_buku");
echo "<script>alert('Data berhasil dihapus!');window.location='data_buku.php'</script>";
