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
              <li class="breadcrumb-item active">Disposisi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary">
                <?php if ( count($dispositions) > 0) : ?>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr class="bg-primary">
                            <th style="width: 10%;">Surat</th>
                            <th style="width: 15%;">Tujuan</th>
                            <th style="width: 35%;">Isi Disposisi</th>
                            <th style="width: 25%;">Sifat / Batas Waktu</th>
                            <th style="width: 15%;">Tindakan</th>
                        </tr>
                        <tbody>
                        <?php foreach ($dispositions as $disposition) : ?>
                        <tr class="data-<?php echo $disposition->id; ?>">
                            <td><a href="<?php echo site_url('inbox/view/'. $disposition->mail_id); ?>"><?php echo $disposition->mail_number; ?> <?php echo $disposition->mail_subject; ?></a></td>
                            <td><span class="disp_name"><?php echo $disposition->to; ?></span></td>
                            <td class="yearColumn text-justify"><span class="disp_year"><?php echo $disposition->content; ?></span></td>
                            <td>
                                <?php echo $disposition->characteristic; ?>
                                    <br><hr>
                                <?php echo date('d F Y', strtotime($disposition->date_limit)); ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('dispositions/edit/'. $disposition->id); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button type="button" class="deleteBtn btn btn-danger" data-id="<?php echo $disposition->id; ?>" data-toggle="modal" data-target="#confirmDeleteDialog"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else : ?>
                <div class="card-body">
                    <div class="alert alert-info">
                        Belum ada data disposisi. Tambahkan baru!
                    </div>
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
              <?php if ( count($dispositions) > 0) : ?>
              <div class="card-footer">
                        
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3">
          <div class="card card-primary">
            <div class="card-header">
              <h5 class="card-title">
                Sifat Disposisi Surat
              </h5>
              <a href="<?php echo site_url('dispositions/characteristics'); ?>" class="float-right"><i class="fa fa-edit"></i></a>
            </div>
            <div class="card-body">
              <?php if ( count($characteristics) > 0) : ?>
              <div class="table-responsive">
                <table class="table table-condensed">
                  <?php foreach ($characteristics as $characteristic) : ?>
                  <tr>
                    <td><b>#</b></td>
                    <td><?php echo $characteristic->meta_content; ?></td>
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
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
              <button type="button" class="btn btn-primary confirmDoDeleteBtn">Hapus</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>