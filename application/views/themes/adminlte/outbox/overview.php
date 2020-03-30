<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5">
                    <h1>Ringkasan Surat Keluar</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <?php echo anchor('outbox/download_excel', '<i class="fa fa-download"></i>'); ?>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('outbox/overview', 'Surat Keluar'); ?></li>
                        <li class="breadcrumb-item active">Ringkasan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-body<?php echo (count($outbox) > 0) ? ' p-0' : ''; ?>">
            <?php if ( count($outbox) > 0) : ?>
                <div class="table-responsive tableFixHead">
                    <table class="table table-striped table-bordered m-0">
                        <tr class="bg-primary">
                            <th>#</th>
                            <th>No. Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat</th>
                            <th>Tujuan Surat</th>
                        </tr>
                        <?php $n = 1; ?>
                        <?php foreach ($outbox as $mail) : ?>
                        <tr>
                            <td>
                                <?php echo $n; ?>
                            </td>
                            <td class="text-justify">
                                <?php echo $mail->number; ?>
                            </td>
                            <td class="animColumn"><?php echo $mail->subject; ?></td>
                            <td>
                               <?php echo get_formatted_date($mail->date); ?>
                            </td>
                            <td class="text-right" style="width: 20%;">
                                <?php echo $mail->to; ?>
                            </td>
                        </tr>
                        <?php $n++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else : ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="alert alert-info">
                    Belum ada data surat Keluar. Tambahkan baru!
                </div>
                    </div>
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
                <p class="confirmDeleteText">Yakin ingin menghapus data surat Keluar? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary confirmDeleteMailBtn">Hapus</button>
            </div>
        </div>
    </div>
</div>