<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Klasifikasi Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('classifications', 'Klasifikasi'); ?></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Klasifikasi</h5>
                    </div>

                    <?php echo form_open('classifications/add_classification'); ?>

                    <div class="card-body">
                        <?php if ($flash) : ?>
                        <div class="alert alert-success">
                            <?php echo $flash; ?>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="code">Kode:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="code" value="<?php echo set_value('code'); ?>" class="form-control" id="code" maxlength="32" required>
                            </div>
                            <?php echo form_error('code'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-heading"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name" id="nama" minlength="4" maxlength="255" required>
                            </div>
                            <?php echo form_error('name'); ?>
                        </div>

                        <div class="form-group">
                            <label for="desc">Uraian:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                </div>
                                <textarea class="form-control" name="desc" id="desc" maxlength="512"><?php echo set_value('desc'); ?></textarea>
                            </div>
                            <?php echo form_error('desc'); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Tambah">
                    </div>

                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </section>
</div>