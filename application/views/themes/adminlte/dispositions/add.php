<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Disposisi Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('dispositions', 'Disposisi'); ?></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">Tambah Disposisi</h5>
            </div>

            <?php echo form_open('dispositions/add_disposition'); ?>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php if ($flash) : ?>
                                <div class="alert alert-success">
                                    <?php echo $flash; ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="mail_id">Pilih surat:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <select name="mail_id" id="mail_id" class="form-control" required="required">
                                        <?php foreach ($inbox as $in) : ?>
                                        <option value="<?php echo $in->id; ?>"><?php echo $in->number; ?> <?php echo $in->subject; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php echo form_error('mail_id'); ?>
                            </div>

                            <div class="form-group">
                                <label for="to">Tujuan:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="to" value="" class="form-control" id="to" maxlength="128" required>
                                </div>
                                <?php echo form_error('to'); ?>
                            </div>

                            <div class="form-group">
                                <label for="content">Isi disposisi:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <textarea name="content" class="form-control" id="content" maxlength="255" required></textarea>
                                </div>
                                
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sifat">Sifat:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <select name="sifat" id="sifat" class="form-control" required="required">
                                        <?php foreach ($charcs as $charc) : ?>
                                        <option value="<?php echo $charc->id; ?>"><?php echo $charc->meta_content; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="bw">Batas waktu:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="date_limit" value="" class="form-control" id="bw">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="note">Catatan:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info"></i></span>
                                    </div>
                                    <textarea name="note" class="form-control" id="content" maxlength="255"></textarea>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="reset" class="btn btn-secondary" value="Reset">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>
            </form>
        </div>
    </section>
</div>