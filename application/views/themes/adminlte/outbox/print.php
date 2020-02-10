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
                <li class="breadcrumb-item"><?php echo anchor('inbox/view/'. $mail->id, $mail->number .' '. $mail->subject); ?></li>
                <li class="breadcrumb-item">PRINT</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="print_head">
                            <table class="table th m-0" style="border-bottom: 3px;">
                                <tr class="bb2">
                                    <td class="border-none">
                                        <img alt="Logo UNIB" src="" class="img-fluid img_logo">
                                    </td>
                                    <td class="text-center border-none">
                                        <h5><b>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</b></h5>
                                        <h5><b>UNIVERSITAS BENGKULU</b></h5>
                                        <h5><b>UKM KSR PMI UNIVERSITAS BENGKULU</b></h5>
                                        <span><b>Sekretariat : Jl. W. R. Supratman Kandang Limun Kompleks Gd. PKM Lt. 2 Universitas Bengkulu</b></span>
                                    </td>
                                    <td style="border-left: none;">
                                        <img alt="Logo UNIB" src="" class="img-fluid img_logo">
                                    </td>
                                </tr>
                            </table>
                            <table class="table tb m-0">
                                <tr>
                                    <td class="text-center head_1" colspan="5">
                                        <b>LEMBAR DISPOSISI</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        Indeks berkas
                                    </td>
                                    <td class="mid">:</td>
                                    <td>
                                        <?php echo $mail->file_index; ?>
                                    </td>
                                    <td style="width: 25%;" class="br">
                                        Kode: <?php echo $mail->classification_code; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        Tanggal surat
                                    </td>
                                    <td class="mid">:</td>
                                    <td class="right br" colspan="2"><?php echo date('d F Y', strtotime($mail->date)); ?>
                                </tr>
                                <tr>
                                    <td class="left">
                                        Nomor surat
                                    </td>
                                    <td class="mid">:</td>
                                    <td class="right br" colspan="2"><?php echo $mail->number; ?>
                                </tr>
                                <tr>
                                    <td class="left">
                                        Asal surat
                                    </td>
                                    <td class="mid">:</td>
                                    <td class="right br" colspan="2"><?php echo $mail->from; ?>
                                </tr>
                                <tr>
                                    <td class="left">
                                        Isi ringkas
                                    </td>
                                    <td class="mid">:</td>
                                    <td class="right br text-justify" colspan="2"><?php echo $mail->resume; ?>
                                </tr>
                                <tr class="br">
                                    <td class="left">
                                        Diterima tanggal
                                    </td>
                                    <td class="mid">:</td>
                                    <td>
                                        <?php echo date('d F Y', strtotime($mail->accepted_date)); ?>
                                    </td>
                                    <td style="width: 25%;"  class="br">
                                        No. Agenda: <?php echo $mail->agenda_number; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <b>Isi disposisi:</b>
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
                                            Tidak ada disposisi
                                        <?php endif; ?>
                                    </td>
                                    <td  class="br bl">
                                        <b style="padding-top: -2px">Diteruskan kepada:</b>
                                            <br>
                                        <?php if ($disps !== FALSE) : ?>
                                        <ol class="disp_content">
                                            <?php foreach ($disps as $d) : ?>
                                            <li><?php echo $d->to; ?></li>
                                            <?php endforeach; ?>
                                        </ol>
                                        <?php else : ?>
                                            Tidak ada disposisi
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="width: 30%;" colspan="2">
                                        Ketua <?php echo get_site_name(); ?>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #aaa">Ria Sari Putri</span>
                                            <br>
                                        G1A019061
                                    </td>
                                </tr>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>