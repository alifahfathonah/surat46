<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Surat Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('secretary') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('outbox'); ?>">Surat Keluar</a></li>
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
                        <h5 class="card-subject">
                            Tambah Data Surat Keluar
                        </h5>
                    </div>
                    <?php echo form_open_multipart('outbox/add_outbox'); ?>

                    <div class="card-body">
                    <?php if ($flash) : ?>
                        <div class="alert alert-success">
                            <?php echo $flash; ?>
                        </div>
                    <?php endif; ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no">No agenda: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-card-alt"></i></span>
                                        </div>
                                        <input type="text" name="agenda_number" value="<?php echo set_value('agenda_number', $last_agenda); ?>" title="Diurutkan berdasarkan data sebelumnya" class="form-control" id="no" required>
                                    </div>
                                    <?php echo form_error('agenda_number'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="classification">Klasifikasi: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-list"></i></span>
                                        </div>
                                        <select name="classification_id" id="classification" class="form-control" required>
                                            <?php foreach ($classifications as $classification) : ?>
                                            <option value="<?php echo $classification->id; ?>"><?php echo $classification->code; ?> <?php echo $classification->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php form_error('classification_id'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="file">File: <span class="text-danger">**</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                                        </div>
                                        <input type="file" title="File scan: PDF | WORD | PNG | JPG. Ukuran maksimal 2 MB" name="file" class="form-control" id="file">
                                    </div>
                                    <?php echo form_error('file'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="desc">Keterangan:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <textarea name="desc" class="form-control" id="desc" maxlength="255"><?php echo set_value('desc'); ?></textarea>
                                    </div>
                                    <?php echo form_error('desc'); ?>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subjek surat: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-language"></i></span>
                                        </div>
                                        <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control" id="subject" minlength="6" maxlength="255" required>
                                    </div>
                                    <?php echo form_error('subject'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="to">Tujuan surat: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-database"></i></span>
                                        </div>
                                        <input type="text" name="to" value="<?php echo set_value('to'); ?>" class="form-control" id="to" minlength="6" maxlength="255" required>
                                    </div>
                                   <?php echo form_error('to'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="number">Nomor surat: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                        </div>
                                        <input type="text" name="number" value="<?php echo set_value('number'); ?>" class="form-control" id="number" minlength="6" maxlength="255" required>
                                    </div>
                                    <?php echo form_error('number'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mail_date">Tanggal surat: <span class="text-red">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="mail_date" value="<?php echo set_value('mail_date'); ?>" class="form-control" id="mail_date" minlength="6" maxlength="255" required>
                                            </div>
                                            <?php echo form_error('mail_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="out_date">Tanggal keluar:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="out_date" value="<?php echo set_value('out_date'); ?>" class="form-control" id="out_date" minlength="6" maxlength="255" required>
                                            </div>
                                            <?php echo form_error('out_date'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="resume">Isi ringkas:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-file-pdf"></i></span>
                                        </div>
                                        <textarea name="resume" class="form-control" id="resume" maxlength="512"><?php echo set_value('resume'); ?></textarea>
                                    </div>
                                    <?php echo form_error('resume'); ?>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                            <div class="col-6">
                                <span class="float-right">
                                    <span class="text-red font-weight-bold">*</span> Wajib diisi
                                    <br>
                                    <span class="text-red font-weight-bold">**</span> File scan: PDF | WORD | PNG | JPG. Ukuran maksimal 2 MB
                                </span>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>