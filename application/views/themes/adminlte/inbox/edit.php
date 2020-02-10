<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Surat Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox/view/'. $data->id, $data->number); ?></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            Tambah Data Surat Masuk
                        </h5>
                    </div>
                    <?php echo form_open_multipart('inbox/edit_inbox'); ?>
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">

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
                                        <input type="text" name="agenda_number" value="<?php echo set_value('agenda_number', $data->agenda_number); ?>" title="Diurutkan berdasarkan data sebelumnya" class="form-control" id="no" required>
                                    </div>
                                    <?php echo form_error('agenda_number'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="file_index">Indeks berkas:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                        </div>
                                        <input type="text" name="file_index" value="<?php echo set_value('file_index', $data->file_index); ?>" class="form-control" id="file_index" maxlength="255">
                                    </div>
                                    <?php echo form_error('file_index'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="classification">Klasifikasi: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-list"></i></span>
                                        </div>
                                        <select name="classification_id" id="classification" class="form-control" required>
                                            <?php foreach ($classifications as $classification) : ?>
                                            <?php if ($data->classification_code == $classification->id) : ?>
                                            <option value="<?php echo $classification->id; ?>" selected><?php echo $classification->code; ?> <?php echo $classification->name; ?></option>
                                            <?php else : ?>
                                            <option value="<?php echo $classification->id; ?>"><?php echo $classification->code; ?> <?php echo $classification->name; ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php form_error('classification_id'); ?>
                                </div>

                                <?php if ($data->file_id == NULL) : ?>
                                <div class="form-group">
                                    <label for="file">File: <span class="text-danger">**</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                                        </div>
                                        <input type="file" title="File scan: PDF | WORD | PNG | JPG. Ukuran maksimal 2 MB" name="file" class="form-control" id="file">
                                    </div>
                                    <?php form_error('file'); ?>
                                </div>
                                <?php else : ?>
                                <div class="card cardBox">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="currentFile">
                                                <label>File:</label>
                                                <?php echo anchor(base_url('assets/uploads/userfiles/'. $data->file_name), $data->file_name); ?>
                                            </div>
                                                
                                            <label for="file" class="changeTxt">Ganti berkas: <span class="text-danger">**</span></label>
                                            <input type="file" title="File scan: PDF | WORD | PNG | JPG. Ukuran maksimal 2 MB" name="file" class="form-control" id="file">
                                        </div>
                                    </div>
                                    <div class="card-footer deleteBox text-right">
                                        <a href="#" data-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#deleteDialog" class="btn btn-danger deleteImgBtn">
                                            <i class="fa fa-trash"></i> Hapus File
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="desc">Keterangan:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <textarea name="desc" class="form-control" id="desc" maxlength="255"><?php echo set_value('desc', $data->description); ?></textarea>
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
                                        <input type="text" name="subject" value="<?php echo set_value('subject', $data->subject); ?>" class="form-control" id="subject" minlength="6" maxlength="255" required>
                                    </div>
                                    <?php echo form_error('subject'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="src">Asal surat: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-database"></i></span>
                                        </div>
                                        <input type="text" name="src" value="<?php echo set_value('src', $data->from); ?>" class="form-control" id="src" minlength="6" maxlength="255" required>
                                    </div>
                                   <?php echo form_error('src'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="number">Nomor surat: <span class="text-red">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                        </div>
                                        <input type="text" name="number" value="<?php echo set_value('number', $data->number); ?>" class="form-control" id="number" minlength="6" maxlength="255" required>
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
                                                <input type="text" name="mail_date" value="<?php echo set_value('mail_date', $data->date); ?>" class="form-control" id="mail_date" minlength="6" maxlength="255" required>
                                            </div>
                                            <?php echo form_error('mail_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="accepted_date">Tanggal diterima:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="accepted_date" value="<?php echo set_value('accepted_date', $data->accepted_date); ?>" class="form-control" id="accepted_date" minlength="6" maxlength="255" required>
                                            </div>
                                            <?php echo form_error('accepted_date'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="resume">Isi ringkas:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-file-pdf"></i></span>
                                        </div>
                                        <textarea name="resume" class="form-control" id="resume" maxlength="512"><?php echo set_value('resume', $data->resume); ?></textarea>
                                    </div>
                                    <?php echo form_error('resume'); ?>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btn btn-primary" value="Perbarui">
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

<div class="modal fade" id="deleteDialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Berkas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="confirmDeleteText">Yakin ingin menghapus berkas? Tindakan ini tidak dapat dibatalkan.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary confirmFileDelete">Hapus</button>
      </div>
    </div>
  </div>
</div>