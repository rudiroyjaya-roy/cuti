<td>
                                                        <?php
                                                        if ($id_status_cuti == 1) { ?>
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
                                                    <td>
                                                        <?php if ($id_status_cuti == 2) { ?>
                                                            <a href="<?= base_url(); ?>Cetak/surat_cuti_pdf/<?= $id_cuti ?>" class="badge badge-info">
                                                                Cetak Surat
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="badge badge-danger">Tidak Bisa</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <!-- Tombol Aksi -->
                                                        <?php if ($id_status_cuti == 2 || $id_status_cuti == 3 || $id_status_cuti == 4) { ?>
                                                            <!-- Tampilkan Hanya Tombol Hapus -->
                                                            <div class="container">
                                                                <div class="d-flex justify-content-between">
                                                                    <div style="margin-right: 5px;">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fas fa-cog"></i> Aksi
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapus<?= $id_cuti ?>">
                                                                                    <i class="fas fa-trash-alt text-warning"></i>
                                                                                    Hapus
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } elseif ($id_status_cuti != 4) { ?>
                                                            <!-- Tampilkan Semua Tombol Kecuali Hapus -->
                                                            <div class="container">
                                                                <div class="d-flex justify-content-between">
                                                                    <div style="margin-right: 5px;">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                </tr>