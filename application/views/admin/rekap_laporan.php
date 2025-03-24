<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
    <style>
        .footer {
            background: #ddd;
            color: #000000;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 80%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("admin/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("admin/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Rekap Laporan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rekap laporan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3 class="card-title">Rekap Laporan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="<?= base_url('Cuti/cetak_data_cuti') ?>" method="post" target="_blank">
                                        <div class="form-group row justify-content-center">
                                            <label for="start_date" class="col-sm-3 col-form-label text-right">Tanggal Mulai</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label for="end_date" class="col-sm-3 col-form-label text-right">Tanggal Akhir</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-2 text-center">
                                                <button type="submit" class="btn btn-info btn-block">Print</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer bg-transparent">
                <div>&copy; 2024 Studio12 Palembang Sumatera Selatan. All rights reserved.</div>
            </footer>
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("admin/components/js.php") ?>
</body>

</html>