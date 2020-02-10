<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Surat Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(site_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('outbox', 'Surat Keluar'); ?></li>
                        <li class="breadcrumb-item"><?php echo $data->number; ?> <?php echo $data->subject; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    Surat <?php echo $data->number; ?>
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered tb">
                            <tr>
                                <td class="left br">
                                    Subjek
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo $data->subject; ?>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Klasifikasi
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo $data->classification_code; ?> <?php echo $data->name; ?>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Tanggal surat
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo date('d F Y', strtotime($data->date)); ?>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Nomor surat
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo $data->number; ?>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Tujuan surat
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo $data->to; ?>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Isi ringkas
                                </td>
                                <td class="mid bb">:</td>
                                <td class="text-justify bl" colspan="2"><?php echo $data->resume; ?>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Tanggal keluar
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bb">
                                    <?php echo date('d F Y', strtotime($data->out_date)); ?>
                                </td>
                                <td class="bl" style="width: 25%;">
                                    No. Agenda: <?php echo $data->agenda_number; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <?php if ( ! empty($data->note)) : ?>
                        <p class="m-2 text-justify alert alert-info">
                        <?php else : ?>
                        <p>
                        <?php endif; ?>
                            <b>Keterangan:</b> <?php echo ($data->note) ? $data->note : '-'; ?>
                        </p>
                        <p>File:
                        <?php if ($data->file_id != NULL) : ?>
                            <?php echo anchor(base_url('assets/uploads/userfiles/'. $data->file_name), $data->file_name); ?>
                        <?php else : ?>
                            Tidak ada file diunggah
                        <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo site_url('outbox/edit/'. $data->id); ?>" class="btn btn-warning btn-sm">EDIT</a>
                <a href="#" class="btn btn-danger btn-sm deleteBtn" data-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#deleteDialog">HAPUS</a>
            </div>
        </div>    
    </section>
    
</div>

<div class="modal fade" id="deleteDialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data Surat Keluar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="confirmDeleteText">Yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary doDeleteoutbox">Hapus</button>
      </div>
    </div>
  </div>
</div>