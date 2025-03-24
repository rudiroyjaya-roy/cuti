<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('hapus')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')){ ?>
    <script>
    swal({
        title: "Error!",
        text: "Data Gagal Dihapus!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <!-- Main Sidebar Container -->
        <?php $this->load->view("pegawai/components/sidebar.php") ?><br><br><br>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Cuti</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Cuti</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Cuti</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Al<br><br>asan</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>Mulai</th>
                                                <th>Berakhir</th>
                                                <th>Status Cuti</th>
                                                <th>Alasan Verifikasi</th>
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
                                            ?>
                                           <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $nama_lengkap ?></td>
                                                <td><?= $alasan ?></td>
                                                <td><?= $tgl_diajukan ?></td>
                                                <td><?= $mulai ?></td>
                                                <td><?= $berakhir ?></td>
                                                <td>
                                                    <?php if ($id_status_cuti == 1) { ?>
                                                        <span class="badge badge-pill badge-info">Menunggu Konfirmasi</span>
                                                    <?php } elseif ($id_status_cuti == 2) { ?>
                                                        <span class="badge badge-pill badge-success">Izin Cuti Diterima</span>
                                                    <?php } elseif ($id_status_cuti == 3) { ?>
                                                        <span class="badge badge-pill badge-danger">Izin Cuti Ditolak</span>
                                                    <?php } elseif ($id_status_cuti == 4) { ?>
                                                        <span class="badge badge-pill badge-warning">Cuti Dibatalkan</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($alasan_verifikasi == NULL) { ?>
                                                        <span class="badge badge-pill badge-danger">Belum Ada</span>
                                                    <?php } else { ?>
                                                        <?= $alasan_verifikasi ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($id_status_cuti == 2) { ?>
                                                        <a href="<?= base_url();?>Cetak/surat_cuti_pdf/<?= $id_cuti ?>"
                                                            target="_blank" class="badge badge-pill badge-info">Cetak Surat</a>
                                                    <?php } else { ?>
                                                        <span class="badge badge-pill badge-danger">Tidak Bisa</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($id_status_cuti == 1) { ?>
                                                        <a href="" data-toggle="modal" data-target="#batalkan<?= $id_cuti ?>"
                                                            class="btn btn-warning btn-sm"><i class=""></i> Batalkan</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <!-- Modal Batalkan Data Cuti -->
                                            <div class="modal fade" id="batalkan<?= $id_cuti ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title btn btn-sm" id="exampleModalLabel">
                                                                Batalkan Data Cuti</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url()?>Cuti/batalkan_cuti"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_cuti"
                                                                            value="<?= $id_cuti ?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?= $id_user ?>" />
                                                                        <p>Apakah kamu yakin ingin membatalkan cuti ini?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <?php $this->load->view("pegawai/components/js.php") ?>
</body>

</html>

