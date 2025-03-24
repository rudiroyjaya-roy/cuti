<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('edit')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Diedit!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Diedit!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Dihapus!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Dihapus !",
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
                            <h1 class="m-0">Pegawai</h1>
                        </div>
                        <!-- /.col -->

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Pegawai</li>
                            </ol>
                        </div>

                        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#exampleModal2">
                            Tambah Pegawai
                        </button>
                        <br>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-transparent">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pegawai</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No Telp</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($pegawai as $i) :
                                                $no++;
                                                $id_user = $i['id_user'];
                                                $username = $i['username'];
                                                $password = $i['password'];
                                                $email = $i['email'];
                                                $nama_lengkap = $i['nama_lengkap'];
                                                $id_jenis_kelamin_P = $i['jenis_kelamin'];
                                                $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                                $no_telp = $i['no_telp'];
                                                $alamat = $i['alamat'];
                                                $foto = base_url('assets/upload/' . $i['pangkat']);

                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $username ?></td>
                                                    <td><?= $nama_lengkap ?></td>
                                                    <td><?= $id_jenis_kelamin_P ?></td>
                                                    <td><?= $no_telp ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td><img src="<?= $foto ?>" class="img-fluid img-thumbnail" style="max-width: 100px;" alt="Foto Profil"></td>
                                                    <td>
                                                        <!-- Tombol dropdown untuk edit, view, dan hapus -->
                                                        <div class="container">
                                                            <div class="d-flex justify-content-between">
                                                                <div style="margin-right: 5px;">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton<?= $id_user ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-cog"></i>
                                                                            Aksi
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton<?= $id_user ?>">
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_data_pegawai<?= $id_user ?>">
                                                                                <i class="fas fa-edit text-primary"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#view<?= $id_user ?>">
                                                                                <i class="fa fa-eye text-info"></i>
                                                                                View
                                                                            </a>
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapus<?= $id_user ?>">
                                                                                <i class="fas fa-trash text-danger"></i>
                                                                                Hapus
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Hapus Data Pegawai -->
                                                <div class="modal fade" id="hapus<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Pegawai
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Pegawai/hapus_pegawai" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
                                                                            <p>Apakah kamu yakin ingin menghapus data
                                                                                ini?</i>
                                                                                </b>
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

                                                <!-- Modal Edit Pegawai -->
                                                <div class="modal fade" id="edit_data_pegawai<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url(); ?>Pegawai/edit_pegawai" method="POST">
                                                                    <input type="text" value="<?= $id_user ?>" name="id_user" hidden="hidden">
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?= $username ?>" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="text" class="form-control" id="password" aria-describedby="password" name="password" value="<?= $password ?>" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">email</label>
                                                                        <input type="text" class="form-control" id="email" aria-describedby="email" name="email" value="<?= $email ?>" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                                        <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap ?>" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                                        <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                                                            <?php foreach ($jenis_kelamin as $u) : ?>
                                                                                <option value="<?= $u['id_jenis_kelamin'] ?>" <?php if ($u['id_jenis_kelamin'] == $i['id_jenis_kelamin']) echo 'selected'; ?>>
                                                                                    <?= $u['jenis_kelamin'] ?>
                                                                                </option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jabatan">Jabatan</label>
                                                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $i['jabatan'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">No Telp</label>
                                                                        <input type="text" class="form-control" id="no_telp" aria-describedby="no_telp" name="no_telp" value="<?= $no_telp ?>" required maxlength="13" oninput="validateNoTelp(this)">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat" value="<?= $alamat ?>" required="required">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal View Pegawai -->
                                                <div class="modal fade" id="view<?= $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">View Pegawai
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group text-center">
                                                                        <label for="foto">Foto</label>
                                                                        <div>
                                                                            <img src="<?= $foto ?>" alt="Foto Pegawai" class="img-fluid rounded-circle" style="max-width: 150px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username" class="font-weight-bold">Username:</label>
                                                                        <span id="username"><?= $username ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password" class="font-weight-bold">Password:</label>
                                                                        <span id="password"><?= $password ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email" class="font-weight-bold">Email:</label>
                                                                        <span id="email"><?= $email ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_lengkap" class="font-weight-bold">Nama Lengkap:</label>
                                                                        <span id="nama_lengkap"><?= $nama_lengkap ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="profile_jenis_kelamin" class="font-weight-bold">Jenis Kelamin:</label>
                                                                        <span id="profile_jenis_kelamin">
                                                                            <?php
                                                                            foreach ($jenis_kelamin as $u) {
                                                                                if ($u['id_jenis_kelamin'] == $i['id_jenis_kelamin']) {
                                                                                    echo $u['jenis_kelamin'];
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jabatan" class="font-weight-bold">Jabatan:</label>
                                                                        <span id="jabatan"><?= $i['jabatan'] ?></span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="no_telp" class="font-weight-bold">No
                                                                            Telp:</label>
                                                                        <span id="no_telp"><?= $no_telp ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat" class="font-weight-bold">Alamat:</label>
                                                                        <span id="alamat"><?= $alamat ?></span>
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
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- Modal Tambah Pegawai -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>Pegawai/tambah_pegawai" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" aria-describedby="password" name="password" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="email" name="email" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" name="nama_lengkap" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required="required">
                                        <?php foreach ($jenis_kelamin as $u) :
                                            $id = $u["id_jenis_kelamin"];
                                            $jenis_kelamin = $u["jenis_kelamin"];
                                        ?>
                                            <option value="<?= $id ?>"><?= $jenis_kelamin ?></option>

                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" aria-describedby="no_telp" name="no_telp" required maxlength="13" oninput="validateNoTelp(this)">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat" required="required">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    <script>
        function validateNoTelp(input) {
            // Menghapus semua karakter yang bukan angka
            input.value = input.value.replace(/[^0-9]/g, '');

            // Membatasi jumlah karakter menjadi maksimal 13
            if (input.value.length > 13) {
                input.value = input.value.slice(0, 13);
            }
        }
    </script>
</body>

</html>