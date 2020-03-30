<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Surat Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item active">Tulis Surat</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-title">Surat Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <p>Surat keluar untuk melakukan peminjaman barang untuk kegiatan</p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="<?php echo site_url('mails/write_borrowing_mail'); ?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Tulis baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="card-title">Surat Undangan</h5>
                    </div>
                    <div class="card-body">
                        <p>Surat keluar untuk mengundang seseorang dalam suatu kegiatan</p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="<?php echo site_url('mails/write_invitation_mail'); ?>" class="btn btn-info">
                                <i class="fa fa-plus"></i> Tulis baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Surat Izin Rektorat</h5>
                    </div>
                    <div class="card-body">
                        <p>Surat keluar untuk meminta izin ke rektorat jika ingin menggunakan sarana / pra sarana di kampus</p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="<?php echo site_url('mails/write_permission_mail'); ?>" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tulis baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-title">Surat Keterangan Aktif</h5>
                    </div>
                    <div class="card-body">
                        <p>Surat keterangan bahwa yang bersangkutan adalah pengurus aktif di <?php echo get_settings('site_name'); ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="<?php echo site_url('mails/surat_aktif'); ?>" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tulis baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Surat Mandat</h5>
                    </div>
                    <div class="card-body">
                        <p>Surat mandat organisasi</p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="<?php echo site_url('mails/surat_mandat'); ?>" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tulis baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>