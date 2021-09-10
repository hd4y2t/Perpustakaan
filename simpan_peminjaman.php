<?php
include 'koneksi.php';

// menyimpan data kedalam variabel
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
// query untuk insert data mahasiswa
$query = "INSERT INTO data_peminjaman SET id_peminjaman='', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali', judul='$id_buku', nama='$id_anggota'";
mysqli_query($koneksi, $query);
echo "<script>alert('Data berhasil ditambahkan!');window.location='data_pinjaman.php'</script>";
