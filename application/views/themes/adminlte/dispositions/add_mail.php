<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
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
                        <li class="breadcrumb-item"><?php echo anchor('inbox/view/'. $mail->id, $mail->number); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('dispositions/mail/'. $mail->id, 'Disposisi'); ?></li>
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
                
                <input type="hidden" name="mail_id" value="<?php echo $mail->id; ?>">

                <div class="card-body">
                    <div class="alert alert-info">
                        <b>Perihal surat:</b> <?php echo $mail->subject; ?><br>
                        <b>Ringkasan:</b> <?php echo $mail->resume; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to">Tujuan:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="to" value="<?php echo set_value('to'); ?>" class="form-control" id="to" maxlength="128" required>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="content">Isi disposisi:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <textarea name="content" class="form-control" id="content" maxlength="255" required><?php echo set_value('content'); ?></textarea>
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
                                    <input type="text" name="date_limit" value="<?php echo set_value('date_limit'); ?>" class="form-control" id="bw">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="note">Catatan:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info"></i></span>
                                    </div>
                                    <textarea name="note" class="form-control id="note" maxlength="255"><?php echo set_value('note'); ?></textarea>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>
            </form>
        </div>
    </section>
</div>