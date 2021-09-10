<?php
include 'koneksi.php';

$id_buku = $_GET['id_buku'];
mysqli_query($koneksi, "DELETE FROM data_buku WHERE id_buku= $id_buku");
echo "<script>alert('Data berhasil dihapus!');window.location='data_buku.php'</script>";
