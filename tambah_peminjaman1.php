<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-perpus.png">
    <title>Tambah Peminjaman - SI Perpus</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.min.css">
</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b>
                            <img src="assets/images/logo-perpus.png" alt="homepage" class="dark-logo" width="45px" />
                        </b>
                        <span>
                            <img src="assets/images/logo-teks.png" alt="homepage" class="dark-logo" width="150px" />
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        /ul>
                        <ul class="navbar-nav my-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria- haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic m-r-5" />Admin</a>
                            </li>
                        </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="index.php" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="data_anggota.php" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Data Anggota</a>
                        </li>
                        <li>
                            <a href="data_buku.php" class="waves-effect"><i class="fa fa-book m-r-10" aria-hidden="true"></i>Data Buku</a>
                        </li>
                        <li>
                            <a href="data_peminjaman.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Data Peminjaman</a>
                        </li>
                    </ul>
                    <div class="text-center m-t-30">
                        <a href="login.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> &nbsp; Logout</a>
                    </div>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Tambah Peminjaman</h3>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <form method="POST" action="simpan_peminjaman.php">
                                    <input type="hidden" value="<?php echo $data['id_peminjaman']; ?>" name="id_peminjaman">
                                    <div class="form-group row">
                                        <label for="tanggal_pinjam" class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control tanggal" id="tanggal_pinjam" name="tanggal_pinjam" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Anggota</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_anggota" id="nama" required>
                                                <option disabled selected> --Pilih anggota-- </option>
                                                <?php
                                                $sql = mysqli_query($koneksi, "SELECT * FROM data_anggota");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?= $data['id_anggota'] ?>"><?= $data['id_anggota'] ?> - <?= $data['nama'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="judul_buku" class="col-sm-3 col-form-label">Judul Buku</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_buku" id="judul" required>
                                                <option disabled selected> --Pilih buku-- </option>
                                                <?php
                                                $sql = mysqli_query($koneksi, "SELECT * FROM data_buku");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?= $data['id_buku'] ?>"><?= $data['id_buku'] ?> - <?= $data['judul'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_kembali" class="col-sm-3 col-form-label">Tanggal Pengembalian</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control tanggal" id="tanggal_kembali" name="tanggal_kembali" required>
                                        </div>
                                    </div>
                                    <div class="form-group row float-right">
                                        <div class="col-sm-5 mb-2 mr-2">
                                            <a href="data_peminjaman.php" class="btn btn-danger p-2 float-right">Batal</a>
                                        </div>
                                        <div class="col-sm-5 ml-2 mr-1">
                                            <button type="submit" class="btn btn-primary p-2 float-right" value="simpan">Simpan data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                © 2021 Perpustakaan Sumber Ilmu
            </footer>
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
    <script>
        $('.tanggal').datepicker({
            format: "d-m-yyyy",
            todayBtn: "linked",
            language: "id",
            autoclose: true,
            todayHighlight: true
        });
    </script>
</body>

</html>