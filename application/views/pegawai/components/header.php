<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Studio12 | Pegawai</title>

<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?= base_url();?>assets/studio12.png" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url();?>assets/admin_lte/plugins/summernote/summernote-bs4.min.css">
<!-- Sweetalert -->
<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Style CSS -->
<link rel="stylesheet" href="<?= base_url();?>assets/style.css">

<style>
 body {
        height: 100vh;
        font-family: 'Roboto', sans-serif;
        font-size: 12px;
        /* background: #f4f6f9; */
    }

    /* Background dengan gradien bergerak */
    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }


    /* Efek Hover dan Ikon Berputar */
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .nav-link:hover .nav-icon {
        animation: rotate 2s linear infinite;
    }

    .nav-item a:hover .nav-icon,
    .nav-item a:hover .text-dark {
        color: #343a40 !important;
        /* Warna dark yang diinginkan */
    }

    .nav-item .nav-link .active {
        color: #007bff;
        /* Warna teks saat aktif */
        font-weight: bold;
        /* Membuat teks lebih tebal saat aktif */
        transform: scale(1.1);
        /* Membuat elemen sedikit membesar saat aktif */
        transition: transform 0.2s ease-in-out;
        animation: rotate 2s linear infinite;
        /* Animasi transisi */
    }


    .nav-sidebar>.nav-item>.nav-link:hover .text-dark {
        color: #007bff;
        font-weight: bold;
    }

    .nav-sidebar .nav-icon {
        margin-right: 10px;
        transition: transform 0.3s;
    }

    .nav-sidebar>.nav-item>.nav-link:hover .nav-icon {
        transform: scale(1.2);
    }


.user-panel .image {
    position: absolute;
    /* Membuat posisi gambar menjadi absolut */
    top: 10px;
    /* Sesuaikan nilai ini untuk mengatur ketinggian gambar */
    margin-right: 10px;
}

.user-panel .image img {
    padding: 1px;
    width: 50px;
    /* Lebar gambar */
    height: 50px;
    /* Tinggi gambar */
    object-fit: cover;
    /* Menjaga proporsi gambar */
    border-radius: 50%;
    /* Membuat gambar berbentuk lingkaran */
}

.user-panel .info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-left: 65px;
    /* Sesuaikan margin kiri untuk mengakomodasi gambar */
}

.user-panel .info a {
    font-weight: bold;
    font-size: 1.1em;
    pointer-events: none;
    /* Menonaktifkan hover */
}

.user-panel .info .status {
    color: #28a745;
    font-weight: bold;
    font-size: 0.9em;
    padding: 2px 8px;
    border-radius: 12px;
    margin-top: 5px;
    display: inline-flex;
    align-items: center;
}



</style>