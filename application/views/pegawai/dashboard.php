<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view("pegawai/components/header.php") ?>
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

            /* General Styles */
            h3 {
                color: #333;
                font-weight: bold;
                margin-bottom: 20px;
            }

            /* Small Box Styles */
            .small-box {
                border-radius: 10px;
                transition: transform 0.3s, box-shadow 0.3s;
                position: relative;
                overflow: hidden;
                color: white;
            }

            .small-box:hover {
                transform: scale(1.05);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }

            .small-box .icon {
                font-size: 70px;
                position: absolute;
                top: 10px;
                right: 10px;
                opacity: 0.2;
            }

            /* Card Styles */
            .card {
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            }

            .card-header {
                background-color: #007bff;
                color: white;
                font-weight: bold;
                text-align: center;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .card-body {
                padding: 20px;
                background-color: #ffffff;
            }

            .card-title {
                color: #333;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .card-text {
                color: #666;
                line-height: 1.6;
            }

            /* Responsive Styles */
            @media (max-width: 768px) {
                .small-box {
                    margin-bottom: 20px;
                }
            }
        </style>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({title: "Success!", text: "Data Berhasil Ditambahkan!", icon: "success"});
        </script>
        <?php } ?>

        <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({title: "Erorr!", text: "Data Gagal Ditambahkan!", icon: "error"});
        </script>
        <?php } ?>
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img
                    class="animation__shake"
                    src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png"
                    alt="AdminLTELogo"
                    height="60"
                    width="60">
            </div>

            <!-- Navbar -->
            <?php $this->load->view("pegawai/components/navbar.php") ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php $this->load->view("pegawai/components/sidebar.php") ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"><br><br><br>
                                <div class="marquee-container">
                                    <h5 class="marquee-text">
                                        🌟 Selamat Datang 🚀
                                    </h5>
                                    <h6>
                                        <b><?= $this->session->userdata('username'); ?></b>, Anda masuk sebagai Pegawai!</h6>
                                </div>
                            </div>
                            <div class="col-sm-6"><br><br><br>
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?= $cuti['total_cuti'] ?></h3>
                                        <p>Data Cuti</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a
                                        href="<?= base_url(); ?>Cuti/view_pegawai"
                                        class="small-box-footer text-dark">More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?= $cuti_acc['total_cuti'] ?></h3>
                                        <p>Cuti Diterima</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a
                                        href="<?= base_url(); ?>Cuti/view_pegawai"
                                        class="small-box-footer text-dark">More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?= $cuti_confirm['total_cuti'] ?></h3>
                                        <p>Cuti Ditolak</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a
                                        href="<?= base_url(); ?>Cuti/view_pegawai"
                                        class="small-box-footer text-dark">More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 class="text-light"><?= $cuti_confirm['total_cuti'] ?></h3>
                                        <p class="text-light">Menunggu Konfirmasi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a
                                        href="<?= base_url(); ?>Cuti/view_pegawai"
                                        class="small-box-footer text-light">More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h3 >Syarat Permohonan Cuti</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Cuti Tahunan
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Cuti Tahunan : 12 Hari Kerja</h5>
                                        <p class="card-text">Aturan cuti ini diberikan untuk PNS yang setidaknya sudah
                                            bekerja sekurang-kurangnya 1 tahun secara terus menerus. Dengan lamanya masa
                                            cuti adalah 12 hari kerja.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Cuti Besar
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Cuti Besar : 3 Bulan</h5>
                                        <p class="card-text">Jenis cuti ini diberikan kepada mereka yang telah
                                            mengabdikan dirinya sekurang-kurangnya 6 tahun secara terus menerus. Durasi cuti
                                            besar yang boleh diambil adalah 3 bulan.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Mohon Di Baca
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">Bila jatuh sakit dan tidak memungkinkan untuk melakukan
                                            pekerjaan,yang bersangkutan berhak atas cuti sakit. Aturan cuti prgawai yang
                                            sakit diberikan beberapa hari cuti tergantung dari sakit apa yang di alamai
                                            dengan ketentuan bahwa ia harus memberitahukan kepada atasannyadan melampirkan
                                            surat keterangan dokter.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Cuti Melahirkan
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Cuti Melahirkan : 3 Bulan</h5>
                                        <p class="card-text">Untuk persalinan anak yang pertama, kedua, dan ketiga,
                                            wanita berhak atas cuti melahirkan. Namun, untuk persalinan anak keempat dan
                                            seterusnya, diberikan cuti di luar tanggungan negara. Ketentuan lamanya cuti
                                            melahirkan adalah 1 bulan sebelum dan 2 bulan sesudah persalinan. Cuti ini
                                            diajukan secara tertulis dan selama menjalankan cuti ini, PNS wanita masih
                                            berhak mendapatkan penghasilannya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Cuti Alasan Penting
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Cuti Alasan Penting : Maksimal 2 bulan</h5>
                                        <p class="card-text">Cuti alasan penting ini diberikan ketika ibu, bapak, istri,
                                            suami, anak, adik, kakak, mertua, atau menantu yang sedang sakit keras atau
                                            meninggal dunia.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Cuti Bersama
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Cuti Bersama</h5>
                                        <p class="card-text">Salah satu jenis cuti yang pasti sudah tidak asing lagi.
                                            Cuti bersama ditetapkan oleh Presiden. Biasanya cuti bersama ada saat perayaan
                                            Idulfitri, Natal dan tahun baru. Tentu saja, karena namanya cuti bersama, cuti
                                            ini tidak perlu diajukan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Cuti di Luar Tanggungan Negara
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Cuti di Luar Tanggungan Negara</h5>
                                <p class="card-text">Jenis cuti ini diberikan kepada PNS yang telah bekerja
                                    sekurang-kurangnya 5 tahun secara terus menerus karena alasan-alasan pribadi
                                    yang penting dan mendesak dapat diberikan cuti di luar tanggungan negara. Cuti
                                    di luar tanggungan negara dapat diberikan paling lama 3 tahun. Jangka waktu cuti
                                    di luar tanggungan negara dapat diperpanjang paling lama 1 tahun apabila ada
                                    alasan-alasan yang penting untuk memperpanjangnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <?php $this->load->view("pegawai/components/js.php") ?>
    </body>

</html>