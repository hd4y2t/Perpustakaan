<?php
include 'koneksi.php';


if (isset($_POST['btnsimpan'])) {
    if (@$_GET['hal'] == "edit") {
        $edit = mysqli_query($koneksi, "UPDATE data_anggota set
                                                 id_anggota = '$_POST[nomor]',
                                                 nama = '$_POST[nama_lengkap]',
                                                 jenis_kelamin = '$_POST[jenis_kelamin]',
                                                 email = '$_POST[email]'
                                               WHERE id_anggota = '$_GET[id_anggota]'
                                               ");

        if (!$edit) {
            echo "<script>
               alert('Edit data gagal!');
               document.location='data_anggota.php';
               </script>";
        } else {
            echo "<script>
                document.location='data_anggota.php';
                </script>";
        }
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO data_anggota (id_anggota, nama, jenis_kelamin, email) 
                                                                             VALUES ('$_POST[nomor]', 
                                                                             '$_POST[nama_lengkap]', 
                                                                             '$_POST[jenis_kelamin]', 
                                                                             '$_POST[email]')
                                                                             ");

        if (!$simpan) {
            echo "<script>alert('Data gagal ditambahkan!');
                document.location='tambah_anggota.php';
                </script>";
        }
    }
}


if (isset($_GET['hal'])) {
    //Pengujian jika edit Data
    if ($_GET['hal'] == "edit") {
        //Tampilkan Data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM data_anggota WHERE id_anggota = '$_GET[id_anggota]' ");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //Jika data ditemukan, maka data ditampung ke dalam variabel
            $vnomor        = $data['id_anggota'];
            $vnama          = $data['nama'];
            $vjeniskelamin = $data['jenis_kelamin'];
            $vemail        = $data['email'];
        }
    } else if ($_GET['hal'] == "hapus") {
        //Persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM data_anggota WHERE id_anggota = '$_GET[id_anggota]' ");
        if ($hapus) {
            echo "<script>
                  alert('Hapus Data Suksess!!');
                  document.location='tambah_anggota.php';
                  </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan Bersama</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-angular"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Perpustakaan Bersama</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-archive"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_anggota.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Anggota</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_buku.php">
                    <i class="far fa-bookmark"></i>
                    <span>Data Buku</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="data_pinjaman.php">
                    <i class="fas fa-arrow-right"></i>
                    <span>Data Pinjaman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-arrow-right"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" style="font-size: 30px;">
                        <div class="sidebar-brand-icon rotate-n-15 success">
                            <i class="fab fa-angular text-success"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3 text-success">Perpustakaan Bersama</div>
                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <!-- Nav Item - Alerts -->



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Anggota</h1><br>
                    <div class="card px-4">

                        <br />
                        <div class="card w-50 mb-5 mt-4">
                            <div class="card-header">
                                <i class="fas fa-external-link-alt"></i> Tambah Data
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    <div class="mb-3 row">
                                        <label for="nomor" class="col-sm-3 col-form-label">Nomor Anggota</label>
                                        <div class="col-sm-5">
                                            <input id="nomor" value="<?= @$vnomor ?>" type="text" class="form-control" name="nomor" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input id="nama_lengkap" value="<?= @$vnama ?>" type="text" class="form-control" name="nama_lengkap" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-5">
                                            <select id="jenis_kelamin" class="custom-select" name="jenis_kelamin" required>
                                                <option value="<?= @$vjeniskelamin ?>"><?= @$vjeniskelamin ?></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input id="email" value="<?= @$vemail ?>" type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="reset" class="btn btn-outline-danger" name="btnbatal">Batal</button>

                                        <button type="submit" name="btnsimpan" class="btn btn-outline-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- TABEL -->
                        <hr>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No Anggota</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * from data_anggota order by id_anggota desc");
                                    while ($data = mysqli_fetch_array($tampil)) :
                                    ?>
                                        <tr>
                                            <td><?= $data['id_anggota'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td>
                                                <a href="tambah_anggota.php?hal=edit&id=<?= $data['id'] ?>"> <button type="button" class="btn btn-primary"><i class="far fa-edit"></i></button></a>
                                                <a href="tambah_anggota.php?hal=hapus&id=<?= $data['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> <i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                </tbody>
                            <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <!-- <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div> -->
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-success" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>