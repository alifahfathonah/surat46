<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Template Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('mails'); ?>">Surat</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('mails/templates'); ?>">Template</a></li>
                        <li class="breadcrumb-item active">Tambah Template</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table th m-0" style="border-bottom: 3px;">
                            <tr class="bb2">
                                <td class="border-none">
                                    <img alt="Logo 1" src="<?php echo base_url('assets/uploads/static/'. get_settings('default_first_kop_image')); ?>" class="img-fluid img_logo img-responsive">
                                </td>
                                <td class="text-center border-none">
                                    <h5 style="font-size: 17px;">
                                        <b class="kop1">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</b>
                                    </h5>

                                    <h5 style="font-size: 17px;">
                                      <b class="kop2">UNIVERSITAS BENGKULU</b>
                                    </h5>

                                    <h5 style="font-size: 17px;">
                                      <b class="kop3">FAKULTAS TEKNIK</b>
                                    </h5>

                                    <h5 style="font-size: 17px;">
                                      <b class="kop4">UKM MOESLEM'S STATION OF ENGINEERING (MOSTANEER)</b>
                                    </h5>

                                    <span>
                                      <b class="kop5" style="font-size: 12px;">Sekretariat: Aula Lab. Terpadu Fakultas Teknik UNIB Jl. WR. Supratman Kandang Limun Bengkulu</b>
                                    </span>
                                </td>
                                <td style="border-left: none;">
                                    <img alt="Logo 2" src="<?php echo base_url('assets/uploads/static/'. get_settings('default_second_kop_image')); ?>" class="img-fluid img_logo img-responsive">
                                </td>
                            </tr>
                        </table>
                        <div style="border: 1px solid #333; margin-bottom: 1px"></div>
                        <div style="border: 2px solid #333"></div>

                        <style>
                            .borderless td, .borderless th {
                                border: none;
                            }
                        </style>

                        <table class="table borderless">
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>(...)/S.I/PanPel/Muker/Mostaneer/FT/UNIB/XII/2019</td>
                                <td style="float:right">15 Desember 2019</td>
                            </tr>
                            <tr>
                                <td>Hal</td>
                                <td>:</td>
                                <td>
                                    <b><u>Perihal Surat</u></b>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php echo form_open_multipart('mails/add_template'); ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Template Surat</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Nama template:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="form-control" id="title">
                            </div>
                            <?php echo form_error('title'); ?>
                        </div>

                        <div class="form-group">
                            <label for="kop_1"></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="kop[1]" value="<?php echo set_value('', 'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN'); ?>" class="form-control" id="kop_1">
                            </div>
                            <?php echo form_error(''); ?>
                        </div>

                        <div class="form-group">
                            <label for="kop_2"></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="kop[2]" value="<?php echo set_value('', 'UNIVERSITAS BENGKULU'); ?>" class="form-control" id="kop_2">
                            </div>
                            <?php echo form_error(''); ?>
                        </div>

                        <div class="form-group">
                            <label for="kop_3"></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="kop[3]" value="<?php echo set_value('', 'FAKULTAS TEKNIK'); ?>" class="form-control" id="kop_3">
                            </div>
                            <?php echo form_error(''); ?>
                        </div>

                        <div class="form-group">
                            <label for="kop_4"></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="kop[4]" value="<?php echo set_value('', 'UKM MOESLEM\'S STATION OF ENGINEERING (MOSTANEER)'); ?>" class="form-control" id="kop_4">
                            </div>
                            <?php echo form_error(''); ?>
                        </div>

                        <div class="form-group">
                            <label for="kop_5"></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="kop[5]" value="<?php echo set_value('', 'Sekretariat: Aula Lab. Terpadu Fakultas Teknik UNIB Jl. WR. Supratman Kandang Limun Bengkulu'); ?>" class="form-control" id="kop_5" placeholder="Alamat...">
                            </div>
                            <?php echo form_error(''); ?>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Tambah Template" class="btn btn-primary float-right">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>