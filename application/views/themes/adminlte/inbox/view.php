<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Surat Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(site_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
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
                                    Indeks berkas
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bb">
                                    <?php echo $data->file_index; ?>
                                </td>
                                <td class="bl" style="width: 25%;">
                                    Klasifikasi: <?php echo $data->classification_code; ?> <?php echo $data->name; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Tanggal surat
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo date('d F Y', strtotime($data->date)); ?></td>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Nomor surat
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo $data->number; ?></td>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Asal surat
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bl" colspan="2"><?php echo $data->from; ?></td>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Isi ringkas
                                </td>
                                <td class="mid bb">:</td>
                                <td class="text-justify bl" colspan="2"><?php echo $data->resume; ?></td>
                            </tr>
                            <tr>
                                <td class="left br">
                                    Diterima tanggal
                                </td>
                                <td class="mid bb">:</td>
                                <td class="bb">
                                    <?php echo date('d F Y', strtotime($data->accepted_date)); ?>
                                </td>
                                <td class="bl" style="width: 25%;">
                                    No. Agenda: <?php echo $data->agenda_number; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <b>Disposisi:</b>
                                        <br>
                                    <?php if ($disps !== FALSE) : ?>
                                    <ol class="disp_content">
                                        <?php foreach ($disps as $d) : ?>
                                        <li>
                                            <b><i><?php echo $d->content; ?></i></b>
                                                <br>
                                            Batas: <?php echo date('d F Y', strtotime($d->date_limit)); ?>
                                                <br>
                                            Sifat: <?php echo $d->sifat; ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <?php else : ?>
                                    Tidak ada data disposisi (<a href="<?php echo site_url('dispositions/add/'. $data->id); ?>">Tambahkan disposisi untuk surat ini</a>)
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <b style="padding-top: -2px">Diteruskan kepada:</b>
                                        <br>
                                    <?php if ($disps !== FALSE) : ?>
                                    <ol class="disp_content">
                                        <?php foreach ($disps as $d) : ?>
                                        <li><?php echo $d->to; ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <?php else : ?>
                                    Tidak ada data disposisi
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <?php if ( ! empty($data->description)) : ?>
                        <p class="m-2 text-justify alert alert-info">
                        <?php else : ?>
                        <p>
                        <?php endif; ?>
                            <b>Keterangan:</b> <?php echo ($data->description) ? $data->description : '-'; ?>
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
                <?php echo form_open('inbox/print'); ?>
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                    <input type="submit" value="PRINT" class="btn btn-sm btn-success">
                    <a href="<?php echo site_url('dispositions/mail/'. $data->id); ?>" class="btn btn-info btn-sm">KELOLA DISPOSISI</a>
                    <a href="<?php echo site_url('inbox/edit/'. $data->id); ?>" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="#" class="btn btn-danger btn-sm deleteBtn" data-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#deleteDialog">HAPUS</a>
                <?php echo form_close(); ?>
            </div>
        </div>    
    </section>
    
</div>

<div class="modal fade" id="deleteDialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data Surat Masuk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="confirmDeleteText">Yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary doDeleteInbox">Hapus</button>
      </div>
    </div>
  </div>
</div>