<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Klasifikasi Surat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
              <li class="breadcrumb-item active">Klasifikasi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card card-primary">
        <div class="card-body p-0">
        <?php if ( count($classifications) > 0) : ?>
          <div class="table-responsive">
            <table class="table table-hover">
              <tr class="bg-primary">
                <th style="width: 10%;">Kode</th>
                <th style="width: 20%;">Nama</th>
                <th style="width: 60%;">Uraian</th>
                <th style="width: 10%;">Tindakan</th>
              </tr>
              <?php foreach ($classifications as $classification) : ?>
              <tr class="data-<?php echo $classification->id; ?>">
                <td><span class="clsf_code"><?php echo $classification->code; ?></span></td>
                <td><span class="clsf_name"><?php echo $classification->name; ?></span></td>
                <td class="animationContainer text-justify"><span class="clsf_year"><?php echo $classification->description; ?></span></td>
                <td>
                  <a href="<?php echo site_url('classifications/edit/'. $classification->id); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <button type="button" class="deleteBtn btn btn-danger" data-id="<?php echo $classification->id; ?>" data-toggle="modal" data-target="#confirmDeleteDialog"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <?php else : ?>
          <div class="alert alert-info">
            Belum ada data klasifikasi. Tambahkan baru!
          </div>
          <?php endif; ?>
        </div>
        <?php if ( ! empty($pagination)) : ?>
        <div class="card-footer">
          <?php echo $pagination; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

  </div>
  

    <div class="modal fade" id="confirmDeleteDialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data</h4>
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
        </div>
    </div>