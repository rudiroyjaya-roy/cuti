<?php
$current_url = current_url(); // atau gunakan metode lain untuk mendapatkan URL saat ini
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link bg-info">
        <img src="<?= base_url();?>assets/studio12.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>studio12</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-light">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
                <img src="<?= base_url('assets/upload/'.$pegawai_data[0]['pangkat']); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block text-dark"><?=$this->session->userdata('username');?></a>
                <a class="status">Online</a>
            </div>
        </div>



        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar bg-light" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-light">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Dashboard/dashboard_pegawai" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt text-dark <?= ($current_url == base_url() . 'Dashboard/dashboard_pegawai') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Dashboard/dashboard_pegawai') ? 'active' : '' ?>">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>Cuti/view_pegawai/<?=$this->session->userdata('id_user');?>" class="nav-link">
                        <i class="nav-icon fas fa-envelope text-dark <?= ($current_url == base_url() . 'Cuti/view_pegawai/' . $this->session->userdata('id_user')) ? 'active' : '' ?>" data-id="<?=$this->session->userdata('id_user');?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Cuti/view_pegawai/' . $this->session->userdata('id_user')) ? 'active' : '' ?>" data-id="<?=$this->session->userdata('id_user');?>">Data Cuti</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Form_Cuti/view_pegawai" class="nav-link">
                        <i class="nav-icon fas fa-edit text-dark <?= ($current_url == base_url() . 'Form_Cuti/view_pegawai') ? 'active' : '' ?>"></i>
                        <p class="text-dark <?= ($current_url == base_url() . 'Form_Cuti/view_pegawai') ? 'active' : '' ?>">Ajukan Cuti</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
