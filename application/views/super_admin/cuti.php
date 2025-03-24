<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("super_admin/components/header.php") ?>
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
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Status Cuti Berhasil Diubah!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Status Cuti Gagal Diubah!",
                icon: "error"
            });
        </script>
    <?php } ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("super_admin/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("super_admin/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Cuti</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Cuti Pegawai</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>Mulai</th>
                                                <th>Berakhir</th>
                                                <th>Perihal Cuti</th>
                                                <th>Alasan Verifikasi</th>
                                                <th>Status Cuti</th>
                                                <th>Cetak Surat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($cuti as $i) :
                                                $no++;
                                                $id_cuti = $i['id_cuti'];
                                                $id_user = $i['id_user'];
                                                $nama_lengkap = $i['nama_lengkap'];
                                                $alasan = $i['alasan'];
                                                $tgl_diajukan = $i['tgl_diajukan'];
                                                $mulai = $i['mulai'];
                                                $berakhir = $i['berakhir'];
                                                $id_status_cuti = $i['id_status_cuti'];
                                                $alasan_verifikasi = $i['alasan_verifikasi'];
                                                $perihal_cuti = $i['perihal_cuti'];
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $nama_lengkap ?></td>
                                                    <td><?= $alasan ?></td>
                                                    <td><?= $tgl_diajukan ?></td>
                                                    <td><?= $mulai ?></td>
                                                    <td><?= $berakhir ?></td>
                                                    <td><?= $perihal_cuti ?></td>
                                                    <td><?= ($alasan_verifikasi == NULL) ? 'Belum Ada' : $alasan_verifikasi ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($id_status_cuti == 1) { ?>
                                                            <span class="badge badge-pill badge-info">Menunggu Konfirmasi</span>
                                                        <?php } elseif ($id_status_cuti == 2) { ?>
                                                            <span class="badge badge-pill badge-success">Izin Cuti
                                                                Diterima</span>
                                                        <?php } elseif ($id_status_cuti == 3) { ?>
                                                            <span class="badge badge-pill badge-danger">Izin Cuti Ditolak</span>
                                                        <?php } elseif ($id_status_cuti == 4) { ?>
                                                            <span class="badge badge-pill badge-warning">Cuti Dibatalkan</span>
                                                        <?php } ?>
                                                    </td>
                                                    </td>
                                                    <td>
                                                        <?php if ($id_status_cuti == 2) { ?>
                                                            <a href="<?= base_url(); ?>Cetak/surat_cuti_pdf/<?= $id_cuti ?>" class="badge badge-info">Cetak Surat</a>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Tidak Bisa</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <!-- Tombol Aksi -->
                                                        <?php if ($id_status_cuti != 4) { ?>
                                                            <div class="container">
                                                                <div class="d-flex justify-content-between">
                                                                    <div style="margin-right: 5px;">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fas fa-cog"></i> Aksi
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#setuju<?= $id_cuti ?>">
                                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                                    Terima
                                                                                </a>
                                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#tidak_setuju<?= $id_cuti ?>">
                                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                                    Tolak
                                                                                </a>
                                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapus<?= $id_cuti ?>">
                                                                                    <i class="fas fa-trash-alt text-warning"></i>
                                                                                    Hapus
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>

                                                     <!-- Modal Setuju Cuti -->
                                                <div class="modal fade" id="setuju<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Setujui Data
                                                                    Cuti</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Cuti/acc_cuti_super_admin/2" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?= $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?= $id_user ?>" />
                                                                            <p>Apakah kamu yakin ingin Menyetujui Izin Cuti
                                                                                ini?</p>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">Alasan</label>
                                                                                <textarea class="form-control" id="alasan_verifikasi" name="alasan_verifikasi" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Tidak Setuju Cuti -->
                                                <div class="modal fade" id="tidak_setuju<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tolak Data
                                                                    Cuti</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Cuti/acc_cuti_super_admin/3" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?= $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?= $id_user ?>" />
                                                                            <p>Apakah kamu yakin ingin Menolak Izin Cuti
                                                                                ini?</p>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">Alasan</label>
                                                                                <textarea class="form-control" id="alasan_verifikasi" name="alasan_verifikasi" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Hapus Cuti -->
                                                <div class="modal fade" id="hapus<?= $id_cuti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Cuti</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Cuti/hapus_cuti" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_cuti" value="<?= $id_cuti ?>" />
                                                                            <input type="hidden" name="id_user" value="<?= $id_user ?>" />
                                                                            <p>Apakah kamu yakin ingin menghapus data ini?
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("super_admin/components/js.php") ?>
</body>

</html>