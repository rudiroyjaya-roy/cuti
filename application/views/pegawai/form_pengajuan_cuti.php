<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
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

    <?php if ($this->session->flashdata('eror_input')) { ?>
        <script>
            swal({
                title: "Error!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <?php $this->load->view("pegawai/components/sidebar.php") ?><br><br><br>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Permohonan Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">

                    <form action="<?= base_url(); ?>Form_Cuti/proses_cuti" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?= $this->session->userdata('id_user') ?>" name="id_user" hidden>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea class="form-control" id="alasan" rows="3" placeholder="masukan alasan anda" name="alasan" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="perihal_cuti">Perihal</label>
                            <select class="form-control" id="perihal_cuti" name="perihal_cuti" required>
                                <option value="cuti">Cuti</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mulai">Mulai Cuti</label>
                            <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="berakhir">Berakhir Cuti</label>
                            <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" required>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <?php $this->load->view("pegawai/components/js.php") ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mulaiInput = document.getElementById("mulai");
            var berakhirInput = document.getElementById("berakhir");

            mulaiInput.addEventListener("change", function() {
                var mulaiDate = new Date(this.value);

                // Set min date for berakhirInput
                var yyyy = mulaiDate.getFullYear();
                var mm = String(mulaiDate.getMonth() + 1).padStart(2, '0');
                var dd = String(mulaiDate.getDate()).padStart(2, '0');
                var minDate = yyyy + '-' + mm + '-' + dd;

                berakhirInput.setAttribute("min", minDate);

                // Calculate the max date for berakhirInput (3 days after mulaiDate)
                var maxBerakhirDate = new Date(mulaiDate);
                maxBerakhirDate.setDate(mulaiDate.getDate() + 3);

                var yyyyMax = maxBerakhirDate.getFullYear();
                var mmMax = String(maxBerakhirDate.getMonth() + 1).padStart(2, '0');
                var ddMax = String(maxBerakhirDate.getDate()).padStart(2, '0');
                var maxDate = yyyyMax + '-' + mmMax + '-' + ddMax;

                berakhirInput.setAttribute("max", maxDate);
            });

            // Set the initial min attribute of the mulai input field
            var today = new Date();
            var yyyy = today.getFullYear();
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var dd = String(today.getDate()).padStart(2, '0');
            var minDate = yyyy + '-' + mm + '-' + dd;

            mulaiInput.setAttribute("min", minDate);
        });
    </script>
</body>

</html>