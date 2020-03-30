<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Surat Izin Rektorat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('mails', 'Tulis Surat'); ?></li>
                        <li class="breadcrumb-item active">Surat Izin Rektorat</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0 printpage">
                        <div class="print_head">
                            <table class="table th m-0 borderless" style="border-bottom: 3px;">
                                <tr class="bb2">
                                    <td class="border-none">
                                      <img alt="Logo 1" src="<?php echo base_url('assets/uploads/static/'. get_settings('kop_logo_1')); ?>" class="img-fluid img_logo img-responsive">
                                    </td>
                                    <td class="text-center border-none">
                                    <h5>
                                      <span class="s1">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</span>
                                      <input type="text" class="form-control d-none i1" value="KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN">
                                    <br>
                                    <span class="s2">UNIVERSITAS BENGKULU</span>
                                    <input type="text" class="form-control d-none i2" value="UNIVERSITAS BENGKULU">
                                   <br>
                                   <span class="s3">FAKULTAS TEKNIK</span>
                                   <input type="text" class="form-control d-none i3" value="FAKULTAS TEKNIK">
                                    <br>
                                    <span class="s4">UKM MOSLEM’S STATION OF ENGINEERING (MOSTANEER)</span>
                                    <input type="text" class="form-control d-none i4" value="UKM MOSLEM’S STATION OF ENGINEERING (MOSTANEER)">
                                    </h5>

                                    <span class="address">
                                      <i><span class="s5">Sekretariat: Aula Terpadu Fakultas Teknik UNIB Jl. WR. Supratman Kandang Limun Bengkulu</span></i>
                                      <input type="text" class="form-control d-none i5" value="Sekretariat: Aula Terpadu Fakultas Teknik UNIB Jl. WR. Supratman Kandang Limun Bengkulu">
                                    </span>
                                    </td>
                                    <td style="border-left: none;">
                                      <img alt="Logo 2" src="<?php echo base_url('assets/uploads/static/mostaneer.png'); ?>" class="img-fluid img_logo img-responsive">
                                    </td>
                                </tr>
                            </table>

                            <div style="border: 1px solid #333;" class="line-1"></div>
                            <div style="border: 2px solid #333; margin-bottom: 3px;"></div>

                           
                            <table class="table borderless m-0 cc nn">
                                <tr>
                                    <td>
                                        Nomor
                                            <br>
                                        Hal
                                    </td>
                                    <td>:<br>:</td>
                                    <td>
                                        <span class="s6">(...)/S.I/PanPel/Muker/Mostaneer/FT/UNIB/XII/<span class="currentYear">2020</span></span>
                                        <input type="text" class="form-control d-none i6" value="(...)/S.I/PanPel/Muker/Mostaneer/FT/UNIB/XII/2019">
                                            <br>
                                        <b><u><span class="s7">Surat Izin Pemakaian Gedung (.......)</span></u></b>
                                        <input type="text" class="form-control d-none i7" value="Surat Izin Pemakaian Gedung (.......)">
                                    </td>
                                    <td style="float:right">
                                        <span class="s8 today"></span>
                                        <input type="text" class="form-control d-none i8 itoday">
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc">
                                <tr>
                                    <td>
                                        Kepada Yth
                                            <br>
                                        <b><u><span class="s9">Kassubag Rumah Tangga</span></u></b>
                                        <input type="text" class="form-control d-none i9" value="Kassubag Rumah Tangga">
                                            <br>
                                        Di -
                                            <br>
                                        <div style="text-indent: 25px;">
                                            <span class="s10">Tempat</span>
                                            <input type="text" class="form-control d-none i10" value="Tempat">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc cn">
                                <tr>
                                    <td>
                                        <div class="txt1">
                                            <b><i><span class="s11">Bismillahirrohmanirrohiim</span></i></b>
                                            <input type="text" class="form-control d-none i11" value="Bismillahirrohmanirrohiim">
                                        </div>
                                        <div class="txt1">
                                            <i><span class="s12">Asalamu’alaikum Warahmatullahi Wabarakatuh</span></i>
                                            <input type="text" class="form-control d-none i12" value="Asalamu’alaikum Warahmatullahi Wabarakatuh">
                                        </div>
                                        <div class="txt1">
                                            <span class="s13">
                                                Puji dan syukur kita panjatkan kehadirat Allah subhanahuwata’ala, karena atas limpahan rahmat dan karunia-Nya kita bisa menjalankan aktivitas sehari-hari.
                                            </span>
                                            <input type="text" class="form-control i12 d-none" value="Puji dan syukur kita panjatkan kehadirat Allah subhanahuwata’ala, karena atas limpahan rahmat dan karunia-Nya kita bisa menjalankan aktivitas sehari-hari.">
                                        </div>
                                        <div class="txt1">
                                            <span class="s14">
                                                Sehubungan dengan diadakanya (Nama Kegiatan), maka kami ingin membuka (Mau Ngapain)  tersebut yang insyaaAllah akan dilaksanakan pada :
                                            </span>
                                            <input type="text" class="form-control i14 d-none" value="Sehubungan dengan diadakanya (Nama Kegiatan), maka kami ingin membuka (Mau Ngapain)  tersebut yang insyaaAllah akan dilaksanakan pada :">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                                
                            <table class="table borderless cc ck">
                                <tr>
                                    <td></td>
                                    <td>
                                        hari/tanggal
                                            <br>
                                        waktu
                                            <br>
                                        tempat
                                    </td>
                                    <td>:<br>:<br>:</td>
                                    <td>
                                        <span class="s15">Jum'at, <span class="today">7 Februari 2020</span></span>
                                        <input type="text" class="form-control d-none i15 itoday">
                                            <br>
                                        <span class="s16">07:00</span>
                                        <input type="text" class="form-control d-none i16" value="07:00">
                                            <br>
                                        <span class="s17">Dekanat FT</span>
                                        <input type="text" class="form-control d-none i17" value="Dekanat FT">
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc">
                                <tr>
                                    <td>
                                        <div class="txt1">
                                            <span class="s18">
                                                Untuk itu kami memohon kepada Bapak/Ibu untuk dapat memberikan izin sebagaimana perihal tersebut di atas.
                                            </span>
                                            <input type="text" class="form-control d-none i18" value="Untuk itu kami memohon kepada Bapak/Ibu untuk dapat memberikan izin sebagaimana perihal tersebut di atas.">
                                        </div>
                                        <div class="txt1">
                                            <span class="s19">
                                               Demikian surat ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.	
                                            </span>
                                            <input type="text" class="form-control d-none i19" value="Demikian surat ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.">
                                        </div>
                                        <div class="txt1">
                                            <i><span class="s20">Wassalamu’alakum Warahmatullahi Wabarakatuh</span></i>
                                            <input type="text" class="form-control d-none i20" value="Wassalamu’alakum Warahmatullahi Wabarakatuh">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc ccc">
                                <tr>
                                    <td style="padding-left: 120px;">
                                        <span class="s21">Ketua Umum</span>
                                        <input type="text" class="form-control d-none i21" value="Ketua Umum">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #333;">
                                            <span class="s22">Arsyi Arif Agami</span>
                                            <input type="text" class="form-control i22 d-none" value="Arsyi Arif Agami">
                                        </span>
                                            <br>
                                        <div style="text-indent: 15px;">
                                            <span class="s23">G1A018035</span>
                                        </div>
                                        <input type="text" class="form-control d-none i23" value="G1A018035">
                                    </td>
                                    <td></td>
                                    <td>
                                        <span class="s24">Ketua Panitia</span>
                                        <input type="text" class="form-control d-none i24" value="Ketua Panitia">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #333">
                                            <span class="s25">Alfath Arif Rizkullah</span>
                                            <input type="text" class="form-control i25 d-none" value="Alfath Arif Rizkullah">
                                        </span>
                                            <br>
                                        <div style="text-indent: 15px;">
                                            <span class="s26">G1A018035</span>
                                        </div>
                                        <input type="text" class="form-control d-none i26" value="G1A0190825">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div style="text-indent: 40px;">Mengetahui,</div>
                                            <span class="s27">Pembina UKM Mostaneer</span>
                                            <input type="text" class="form-control d-none i27" value="Pembina UKM Mostaneer">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            <span style="border-bottom: 2px solid #333">
                                                <span class="s28">Irnanda Priyadi, S.T., M.T.</span>
                                                <input type="text" class="form-control d-none i28" value="Irnanda Priyadi, S.T., M.T.">
                                            </span>
                                                <br>
                                        <div>
                                            <span class="s29">NIP. 19760410200312100</span>
                                        </div>
                                        <input type="text" class="form-control d-none i29" value="NIP. 19760410200312100">
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 outbox_data">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Surat Izin Pemakaian Gedung (.......)</h5>
                    </div>
                    <?php echo form_open_multipart('outbox/add_outbox'); ?>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="no">No agenda:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-id-card-alt"></i></span>
                                </div>
                                <input type="text" name="agenda_number" value="<?php echo set_value('agenda_number', $last_agenda); ?>" title="Diurutkan berdasarkan data sebelumnya" class="form-control" id="no" required>
                            </div>
                            <?php echo form_error('agenda_number'); ?>
                        </div>

                        <div class="form-group">
                            <label for="classification">Klasifikasi:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                                </div>
                                <select name="classification_id" id="classification" class="form-control" required>
                                    <?php foreach ($classifications as $classification) : ?>
                                    <option value="<?php echo $classification->id; ?>"><?php echo $classification->code; ?> <?php echo $classification->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php form_error('classification_id'); ?>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subjek Surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-language"></i></span>
                                </div>
                                <input type="text" name="subject" value="<?php echo set_value('subject', 'Surat Izin Pemakaian Gedung (.......)'); ?>" class="form-control a7" id="subject">
                            </div>
                            <?php echo form_error('subject'); ?>
                        </div>

                        <div class="form-group">
                            <label for="number">No. Surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="number" value="<?php echo set_value('number', '(...)/S.I/PanPel/Muker/Mostaneer/FT/UNIB/XII/2019'); ?>" class="form-control a6" id="number">
                            </div>
                            <?php echo form_error('number'); ?>
                        </div>

                        <div class="form-group">
                            <label for="mail_date">Tanggal surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="mail_date" value="<?php echo set_value('mail_date'); ?>" class="form-control a8 itoday" id="mail_date" minlength="6" maxlength="255" required>
                            </div>
                            <?php echo form_error('mail_date'); ?>
                        </div>

                        <div class="form-group">
                            <label for="out_date">Tanggal keluar:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="out_date" value="<?php echo set_value('out_date'); ?>" class="form-control itoday" id="out_date" minlength="6" maxlength="255" required>
                            </div>
                            <?php echo form_error('out_date'); ?>
                        </div>

                        <div class="form-group">
                            <label for="to">Tujuan surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-database"></i></span>
                                </div>
                                <input type="text" name="to" value="<?php echo set_value('to', 'Kassubag Rumah Tangga'); ?>" class="form-control a9" id="to" minlength="6" maxlength="255" required>
                            </div>
                            <?php echo form_error('to'); ?>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-primary btn-print" value="Print">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>