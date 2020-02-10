<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pencarian Surat Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('inbox', 'Surat Masuk'); ?></li>
                        <li class="breadcrumb-item active">Cari "<b><?php echo $query; ?></b>"</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-body p-0">
            <?php if ( count($inbox) > 0) : ?>
                <div class="table-responsive tableFixHead">
                    <table class="table table-striped table-bordered m-0">
                        <tr class="bg-primary">
                            <th style="width: 10%;">No. Agenda / Klasifikasi</th>
                            <th style="width: 40%;">Ringkasan / File</th>
                            <th style="width: 15%;">Asal Surat</th>
                            <th style="width: 25%;">No. Surat / Tanggal Surat</th>
                            <th style="width: 10%;"></th>
                        </tr>
                        <?php foreach ($inbox as $mail) : ?>
                        <tr class="data-<?php echo $mail->id; ?> ">
                            <td>
                                <?php echo $mail->agenda_number; ?> 
                                    <br><hr>
                                <?php echo $mail->classification_code; ?>  / <?php echo $mail->name; ?> 
                            </td>
                            <td class="text-justify">
                                <?php echo ($mail->resume) ? $mail->resume : '-'; ?> 
                                    <br><hr>
                                    <?php if ($mail->file_id) : ?>
                                    File: <?php echo anchor(base_url('assets/uploads/userfiles/'. $mail->file_name), $mail->file_name); ?>
                                    <?php else : ?>
                                    File: Tidak ada file yang diupload
                                    <?php endif; ?>
                            </td>
                            <td class="animColumn"><?php echo $mail->from; ?></td>
                            <td>
                                <?php echo $mail->number; ?> 
                                    <br><hr>
                                <?php echo date('d F Y', strtotime($mail->date)); ?>
                            </td>
                            <td class="text-right" style="width: 20%;">
                                <a href="<?php echo site_url('inbox/view/'. $mail->id); ?>" class="btn btn-primary btn-sm">LIHAT</a>
                                <a href="<?php echo site_url('inbox/edit/'. $mail->id); ?>" class="btn btn-sm btn-warning m-1">EDIT</a>
                                <a href="#" data-id="<?php echo $mail->id; ?>" class="btn btn-danger deleteBtn btn-sm" data-toggle="modal" data-target="#confirmDeleteDialog">HAPUS</a>
                                <a href="<?php echo site_url('dispositions/mail/'. $mail->id); ?>" class="btn  btn-info m-1 btn-sm">DISPOSISI</a>
                                <form action="<?php echo site_url('inbox/print'); ?>" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $mail->id; ?>">
                                  <input type="submit" value="PRINT" class="btn btn-success btn-sm">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else : ?>
                <div class="alert alert-info">
                    Tidak ada hasil pencarian yang ditemukan dengan kata kunci tersebut.
                </div>
                <?php endif; ?>
            </div>

            <?php if ($pagination) : ?>
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
                <h4 class="modal-title">Hapus Data Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="confirmDeleteText">Yakin ingin menghapus data surat masuk? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary confirmDeleteMailBtn">Hapus</button>
            </div>
        </div>
    </div>
</div>