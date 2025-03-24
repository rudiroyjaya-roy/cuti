<nav class="main-header navbar navbar-expand bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user text-dark"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Profil -->
                <a type="button" href="#" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#profileModal">Profil</a>
                <!-- Ganti Password -->
                <a type="button" href="<?= base_url(); ?>Settings/view_admin/<?= $this->session->userdata('id_user'); ?>" class="dropdown-item dropdown-footer">Ganti Password</a>
                <!-- Button Logout -->
                <a href="<?= base_url(); ?>Login/log_out" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt text-dark"></i>
            </a>
        </li>
    </ul>
</nav>


<!-- Modal Lengkapi Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($admin_data as $i) : ?>
                    <form action="<?= base_url(); ?>Settings/lengkapi_data_admin" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $this->session->userdata('id_user'); ?>" name="id">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $i['nama_lengkap'] ?>" required>
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
                            <label for="no_telp">No HP</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $i['no_telp'] ?>" required maxlength="13" oninput="validateNoTelp(this)">
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $i['nip'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $i['jabatan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $i['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pangkat">Foto</label>
                            <input type="file" class="form-control-file" id="pangkat" name="pangkat" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal Profil -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($admin_data as $i) : ?>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="form-group">
                                <img src="<?= base_url('assets/upload/' . $i['pangkat']); ?>" class="img-fluid" alt="Foto Profil">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="profile_nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="profile_nama_lengkap" value="<?= $i['nama_lengkap'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="profile_jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="profile_jenis_kelamin" value="<?php
                                                                                                            foreach ($jenis_kelamin as $u) {
                                                                                                                if ($u['id_jenis_kelamin'] == $i['id_jenis_kelamin']) {
                                                                                                                    echo $u['jenis_kelamin'];
                                                                                                                }
                                                                                                            }
                                                                                                            ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="profile_no_telp">No HP</label>
                                <input type="text" class="form-control" id="profile_no_telp" value="<?= $i['no_telp'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="profile_nip">NIP</label>
                                <input type="text" class="form-control" id="profile_nip" value="<?= $i['nip'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="profile_jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="profile_jabatan" value="<?= $i['jabatan'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="profile_alamat">Alamat</label>
                                <textarea class="form-control" id="profile_alamat" rows="3" disabled><?= $i['alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Tombol Lengkapi Data -->
                <div class="text-center">
                    <a href="#" class="btn btn-primary" onclick="openLengkapiDataModal()">Lengkapi Data</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openLengkapiDataModal() {
        $('#profileModal').modal('hide'); // Sembunyikan modal profil
        $('#exampleModal').modal('show'); // Tampilkan modal lengkapi data
    }
</script>
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