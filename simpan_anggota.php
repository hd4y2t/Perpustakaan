<?php
include 'koneksi.php';

// menyimpan data kedalam variabel
// $nama = $_POST['nama'];
// $tmpt = $_POST['tempat_lahir'];
// $tgl = $_POST['tanggal'];
// $jenis = $_POST['jenis_kelamin'];
// $alamat = $_POST['alamat'];
// $no_hp = $_POST['no_hp'];
// $email = $_POST['email'];
// // query untuk insert data mahasiswa
// $query = "INSERT INTO data_anggota VALUES('',$nama,$tmpt,$tgl,$jenis,$alamat,$no_hp,$email)";
// mysqli_query($koneksi, $query);

// echo "<script>alert('Data berhasil ditambahkan!');window.location='data_anggota.php'</script>";



// menyimpan data kedalam variabel

$nama = $_POST['nama'];
$tmpt = $_POST['tempat_lahir'];
$tgl = $_POST['tanggal'];
$jenis = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
// query untuk insert data mahasiswa
$query = "INSERT INTO data_anggota
values('','$nama','$tmpt','$tgl','$jenis','$alamat','$no_hp','$email')";

mysqli_query($koneksi, $query);
// echo $query;
// echo $koneksi;
echo "<script>alert('Data berhasil ditambahkan!');window.location='data_anggota.php'</script>";
