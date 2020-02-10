<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Disposisi Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox/view/'. $data->mail_id, $data->mail_number); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('dispositions/mail/'. $data->mail_id, 'Disposisi'); ?></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">Edit Disposisi</h5>
            </div>

            <?php echo form_open('dispositions/edit_disposition'); ?>
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                <div class="card-body">
                    <?php if ($flash) : ?>
                        <div class="alert alert-success">
                            <?php echo $flash; ?>
                        </div>
                    <?php endif; ?>
                    <div class="alert alert-info">
                        <b>Perihal surat:</b> <?php echo $data->mail_subject; ?><br>
                        <b>Ringkasan:</b> <?php echo $data->mail_resume; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to">Tujuan:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="to" value="<?php echo set_value('to', $data->to); ?>" class="form-control" id="to" maxlength="128" required>
                                </div>
                                <?php echo form_error('to'); ?>
                            </div>

                            <div class="form-group">
                                <label for="content">Isi disposisi:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <textarea name="content" class="form-control" id="content" maxlength="255" required><?php echo set_value('content', $data->content); ?></textarea>
                                </div>
                                
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sifat">Sifat: (<?php echo anchor('dispositions/characteristics', 'Kelola'); ?>)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <select name="sifat" id="sifat" class="form-control" required="required">
                                        <?php foreach ($charcs as $charc) : ?>
                                            <?php if ($charc->id == $data->characteristic) : ?>
                                            <option value="<?php echo $charc->id; ?>" selected><?php echo $charc->meta_content; ?></option>
                                            <?php else : ?>
                                            <option value="<?php echo $charc->id; ?>"><?php echo $charc->meta_content; ?></option>
                                            <?php endif; ?>
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
                                    <input type="text" name="date_limit" value="<?php echo set_value('date_limit', $data->date_limit); ?>" class="form-control" id="bw">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="note">Catatan:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info"></i></span>
                                    </div>
                                    <textarea name="note" class="form-control" id="content" maxlength="255"><?php echo set_value('note', $data->note); ?></textarea>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </section>
</div>