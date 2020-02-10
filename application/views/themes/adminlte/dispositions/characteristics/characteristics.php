<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sifat Disposisi Surat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
              <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
              <li class="breadcrumb-item"><?php echo anchor('dispositions', 'Disposisi'); ?></li>
              <li class="breadcrumb-item active">Sifat</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-7">
          <div class="card card-primary">
            <div class="card-header">
              <h5 class="card-title">
                Sifat Disposisi Surat
              </h5>
            </div>
            <div class="card-body">
              <?php if ( count($characteristics) > 0) : ?>
              <div class="table-responsive">
                <table class="table table-condensed m-0">
                  <?php foreach ($characteristics as $characteristic) : ?>
                  <tr>
                    <td><b>#</b></td>
                    <td><?php echo $characteristic->meta_content; ?></td>
                    <td>
                        <?php echo form_open('dispositions/characteristics_delete'); ?>
                            <input type="hidden" name="id" value="<?php echo $characteristic->id; ?>">
                          
                            <a href="#" class="btn btn-warning editBtn" data-id="<?php echo $characteristic->id; ?>"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            <?php echo form_close(); ?>
                        
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </div>
              <?php else : ?>
              <div class="alert alert-info">
                Belum ada data saat ini.
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-5">
            <div class="card card-primary addCard">
                <div class="card-header">
                    <h5 class="card-title">Tambah Data</h5>
                </div>
                <?php echo form_open('dispositions/characteristics_add'); ?>

                <div class="card-body">
                    <?php if ($flash) : ?>
                    <div class="alert alert-success">
                        <?php echo $flash; ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="sifat">Sifat:</label>
                        <input type="text" class="form-control" id="sifat" name="name" value="<?php echo set_value('name'); ?>" required>
                    </div>
                    <?php echo form_error('name'); ?>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>
                </form>
            </div>

            <div class="card card-primary editCard">
                <div class="card-header">
                    <h5 class="card-title">Edit Data</h5>
                </div>
                <form action="<?php echo site_url('dispositions/characteristics_edit'); ?>" method="POST">
                
                <input type="hidden" name="id" value="" class="editID">

                <div class="card-body">
                  <?php if ($edit_flash) : ?>
                    <div class="alert alert-success">
                        <?php echo $edit_flash; ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="sifatt">Sifat:</label>
                        <input type="text" class="form-control" id="sifatt" name="edit_name" value="<?php echo set_value('edit_name'); ?>" required>
                    </div>
                    <?php echo form_error('edit_name'); ?>
                </div>
                <div class="card-footer">
                    <input type="button" class="cancelBtn btn btn-secondary" value="Batal">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </div>