<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
    <style>
        body {
            height: 100vh;
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            /* background: #f4f6f9; */
        }


        .content-header {
            margin-bottom: 20px;
        }

        .small-box {
            border-radius: 10px;
            padding: 15px;
            color: #fff;
            position: relative;
            overflow: hidden;
            transition: background 0.3s ease;
        }

        .small-box:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .small-box .inner {
            padding: 10px;
        }

        .small-box .icon {
            font-size: 70px;
            top: 10px;
            right: 15px;
            position: absolute;
            opacity: 0.15;
            color: rgba(0, 0, 0, 0.15);
        }

        .chart-container {
            margin-top: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .footer {
            background: #ddd;
            color: #000000;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
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
                            <div class="marquee-container">
                                <?php foreach ($admin_data as $i) : ?>
                                    <h5 class="marquee-text">
                                        🌟 Selamat Datang 🚀
                                    </h5>
                                    <h6><b><?= $i['nama_lengkap'] ?></b>, Anda masuk sebagai Admin!</h6>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- small box -->
                    <div class="row">
                        <!-- small box -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $cuti['total_cuti'] ?></h3>
                                    <p>Data Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $cuti_acc['total_cuti'] ?></h3>
                                    <p>Cuti Diterima</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $cuti_reject['total_cuti'] ?></h3>
                                    <p>Cuti Ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- small box -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= $pegawai['total_user'] ?></h3>
                                    <p>Pegawai</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Pegawai/view_admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- ./col -->


                    </div>
                    <!-- /.row -->

                    <!-- Additional Stats Section -->
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Grafik Cuti
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <!-- Tambahkan grafik di sini -->
                                        <canvas id="cutiChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Profil
                                </div>
                                <div class="card-body">
                                    <?php foreach ($admin_data as $i) : ?>
                                        <!-- Tambahkan feed aktivitas di sini -->
                                        <ul class="list-unstyled">
                                            <h6>Selamat datang kembali, <b><?= $i['nama_lengkap'] ?></b> di sini anda dapat melihat dan mengelola data cuti & user.
                                                Studio 12 Palembang adalah salah satu tempat hiburan terkemuka di Kota Palembang, Sumatera Selatan.Kombinasi unik antara
                                                studio rental band, restoran, dan kafe ini menjadikannya destinasi populer bagi berbagai kalangan.Dengan suasana yang nyaman
                                                dan fasilitas yang lengkap, Studio 12 menawarkan pengalaman yang berbeda bagi para pengunjungnya.
                                            </h6>
                                        </ul>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js script to render the chart
        var ctx = document.getElementById('cutiChart').getContext('2d');
        var cutiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Data Cuti', 'Menunggu Konfirmasi', 'Cuti Diterima', 'Cuti Ditolak'],
                datasets: [{
                    label: 'Jumlah Cuti',
                    data: [<?= $cuti['total_cuti'] ?>, <?= $cuti_confirm['total_cuti'] ?>, <?= $cuti_acc['total_cuti'] ?>, <?= $cuti_reject['total_cuti'] ?>],
                    backgroundColor: [
                        'rgba(0, 123, 255, 0.5)',
                        'rgba(255, 193, 7, 0.5)',
                        'rgba(40, 167, 69, 0.5)',
                        'rgba(220, 53, 69, 0.5)'
                    ],
                    borderColor: [
                        'rgba(0, 123, 255, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(40, 167, 69, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>