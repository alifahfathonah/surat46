<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Disposisi Surat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
              <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
              <li class="breadcrumb-item"><?php echo anchor('inbox/view/'. $mail->id, $mail->number); ?></li>
              <li class="breadcrumb-item active">Disposisi</li>
            </ol>
          </div>
        </div>
      </div>

    <section class="content">
            <div class="card">
                <?php if ( count($dispositions) > 0) : ?>
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="alert">
                    <b>No. Surat:</b> <?php echo $mail->number; ?>
                        <br>
                    <b>Perihal:</b> <?php echo $mail->subject; ?>
                        <br>
                    <b>Ringkasan:</b> <?php echo $mail->resume; ?>
                </div>
              </div>
              <div class="col-md-6">
                <?php if ($flash) : ?>
                  <div class="alert alert-success m-1">
                    <?php echo $flash; ?>
                  </div>
                <?php endif; ?>
                <?php echo anchor('dispositions/add_mail/'. $mail->id, '<i class="fa fa-plus-circle"></i> Tambah disposisi', array('class' => 'btn btn-success btn-sm')); ?>
              </div>
                  </div>
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered m-0">
                        <tr class="bg-primary">
                            <th style="width: 5%;">ID</th>
                            <th style="width: 15%;">Tujuan</th>
                            <th style="width: 40%;">Isi Disposisi</th>
                            <th style="width: 25%;">Sifat / Batas Waktu</th>
                            <th style="width: 15%;">Tindakan</th>
                        </tr>
                        <tbody>
                        <?php foreach ($dispositions as $disp) : ?>
                        <tr class="data-<?php echo $disp->id; ?>">
                            <td><span class="disp_code"><?php echo $disp->id; ?></span></td>
                            <td><span class="disp_name"><?php echo $disp->to; ?></span></td>
                            <td class="yearColumn text-justify"><span class="disp_year"><?php echo $disp->content; ?></span></td>
                            <td>
                                    <?php echo $disp->sifat; ?>
                                    <br><hr>
                                <?php echo date('d F Y', strtotime($disp->date_limit)); ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('dispositions/edit/'. $disp->id); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button type="button" class="deleteBtn btn btn-danger" data-id="<?php echo $disp->id; ?>" data-toggle="modal" data-target="#confirmDeleteDialog"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else : ?>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="alert alert-info">
                          Belum ada disposisi untuk surat ini. Silahkan tambahkan baru.
                        </div>
                      </div>
                      <div class="col-md-6">
                        <?php echo anchor('dispositions/add_mail/'. $mail->id, '<i class="fa fa-plus-circle"></i> Tambah disposisi', array('class' => 'btn btn-success btn-sm')); ?>
                      </div>
                    </div>
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
              <?php if ( isset($pagination)) : ?>
              <div class="card-footer">
                        
                </div>
                <?php endif; ?>
            </div>
            <!-- /.card -->
      
    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal fade" id="confirmDeleteDialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Disposisi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="confirmDeleteText">Yakin ingin menghapus data? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary confirmDeleteBtn">Hapus</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>