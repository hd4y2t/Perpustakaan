<?php
$koneksi = mysqli_connect("localhost", "root", "123456", "perpustakaan");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
