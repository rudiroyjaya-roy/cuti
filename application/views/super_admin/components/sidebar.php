<?php
$current_url = current_url(); // atau gunakan metode lain untuk mendapatkan URL saat ini
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link bg-info">
        <img src="<?= base_url(); ?>assets/studio12.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><i>Studio 12</i></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-white">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"><br>
                <img src="<?= base_url('assets/upload/' . $super_admin_data[0]['pangkat']); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php foreach ($super_admin_data as $i) : ?>
                    <a class="d-block text-dark"><?= $i['nama_lengkap'] ?></a>
                    <a class="status">Online</a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group " data-widget="sidebar-search">
                <input class="form-control form-control-sidebar bg-light" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append ">
                    <button class="btn btn-sidebar bg-light">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Dashboard/dashboard_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt text-dark <?= ($current_url == base_url() . 'Dashboard/dashboard_super_admin') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Dashboard/dashboard_super_admin') ? 'active' : '' ?>">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/view_super_admin" class="nav-link">
                        <i class="nav-icon far fa-user text-dark <?= ($current_url == base_url() . 'Admin/view_super_admin') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Admin/view_super_admin') ? 'active' : '' ?>">Data Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Pegawai/view_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-users text-dark <?= ($current_url == base_url() . 'Pegawai/view_super_admin') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Pegawai/view_super_admin') ? 'active' : '' ?>">Data Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Cuti/view_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-envelope text-dark <?= ($current_url == base_url() . 'Cuti/view_super_admin') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Cuti/view_super_admin') ? 'active' : '' ?>">Data Cuti</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Rekap_Laporan/view_super_admin" class="nav-link">
                        <i class="nav-icon fas fa-file-alt text-dark <?= ($current_url == base_url() . 'Rekap_Laporan/view_super_admin') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Rekap_Laporan/view_super_admin') ? 'active' : '' ?>">Rekap Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>