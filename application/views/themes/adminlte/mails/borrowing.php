<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Surat Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('mails', 'Tulis Surat'); ?></li>
                        <li class="breadcrumb-item active">Surat Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                <form action="#" id="data" method="post">
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
                                        <span class="s6 nosurat"></span>
                                        <input type="text" name="number" class="form-control d-none i6 inosurat" value="">
                                            <br>
                                        <b><u><span class="s7">Surat Peminjaman</span></u></b>
                                        <input type="text" class="form-control d-none i7" name="subject" value="Surat Peminjaman">
                                    </td>
                                    <td style="float:right">
                                        <span class="s8 today"></span>
                                        <input type="text" class="form-control d-none i8 itoday" name="date">
                                        <input type="hidden" name="date" value="" class="maildate">
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc">
                                <tr>
                                    <td>
                                        Kepada Yth
                                            <br>
                                        <b><u><span class="s9">Kassubag Rumah Tangga</span></u></b>
                                        <input type="text" class="form-control d-none i9" value="Kassubag Rumah Tangga" name="mail_to">
                                            <br>
                                        Di -
                                            <br>
                                        <div style="text-indent: 25px;">
                                            <span class="s10">Tempat</span>
                                            <input type="text" class="form-control d-none i10" value="Tempat" name="mail_to_place">
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
                                            <input type="text" class="form-control i13 d-none" value="Puji dan syukur kita panjatkan kehadirat Allah subhanahuwata’ala, karena atas limpahan rahmat dan karunia-Nya kita bisa menjalankan aktivitas sehari-hari.">
                                        </div>
                                        <div class="txt1">
                                                Sehubungan dengan diadakanya <span class="s14">(Nama Agenda)</span> yang insyaaAllah akan dilaksanakan pada :
                                            <input type="text" class="form-control i14 d-none" name="event_name" value="(Nama Agenda)">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                                
                            <table class="table borderless cc ck">
                                <tr>
                                    <td></td>
                                    <td>
                                        <span class="s30">hari/tanggal</span>
                                        <input type="text" class="form-control d-none i30" value="hari/tanggal">
                                            <br>
                                        <span class="s31">waktu</span>
                                        <input type="text" class="form-control d-none i31" value="waktu">
                                            <br>
                                        <span class="s32">tempat</span>
                                        <input type="text" class="form-control d-none i32" value="tempat">
                                    </td>
                                    <td>:<br>:<br>:</td>
                                    <td>
                                        <span class="s15"><span class="today"></span></span>
                                        <input type="text" class="form-control d-none i15 itoday" name="event_date">
                                            <br>
                                        <span class="s16">07:00</span>
                                        <input type="text" class="form-control d-none i16" value="07:00" name="event_time">
                                            <br>
                                        <span class="s17">Dekanat FT</span>
                                        <input type="text" class="form-control d-none i17" value="Dekanat FT" name="event_location">
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc">
                                <tr>
                                    <td>
                                        <div class="txt1">
                                                Untuk itu kami memohon kepada Bapak/Ibu untuk dapat memberikan izin peminjaman <span class="s18">(Mau Minjam Apa)</span> sebagaimana perihal tersebut di atas.
                                            <input type="text" class="form-control d-none i18" value="(Mau Minjam Apa)" name="borrowing_item">
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
                                        <input type="text" class="form-control d-none i21" value="Ketua Umum" name="leader_text_one">
                                        <input type="text" class="form-control d-none p p21" data-p="21" value="0">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #333;">
                                            <span class="s22">Arsyi Arif Agami</span>
                                            <input type="text" class="form-control i22 d-none" value="Arsyi Arif Agami" name="leader_item_one">
                                            <input type="text" class="form-control d-none p p22" data-p="22" value="0">
                                        </span>
                                            <br>
                                        <div style="text-indent: 15px;">
                                            <span class="s23">G1A018035</span>
                                        </div>
                                        <input type="text" class="form-control d-none i23" value="G1A018035" name="leader_number_one">
                                        <input type="text" class="form-control d-none p p23" data-p="23" value="0">
                                    </td>
                                    <td></td>
                                    <td>
                                        <span class="s24">Ketua Panitia</span>
                                        <input type="text" class="form-control d-none i24" value="Ketua Panitia" name="leader_text_second">
                                        <input type="text" class="form-control d-none p24" data-p="24" value="0">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #333">
                                            <span class="s25">Alfath Arif Rizkullah</span>
                                            <input type="text" class="form-control i25 d-none" value="Alfath Arif Rizkullah" name="leader_item_second">
                                            <input type="text" class="form-control d-none p p25" data-p="25" value="0">
                                        </span>
                                            <br>
                                        <div style="text-indent: 15px;">
                                            <span class="s26">G1A018035</span>
                                        </div>
                                        <input type="text" class="form-control d-none i26" value="G1A0190825" name="leader_number_second">
                                        <input type="text" class="form-control d-none p p26" data-p="21" value="0">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div style="text-indent: 40px;">Mengetahui,</div>
                                            <span class="s27">Pembina UKM Mostaneer</span>
                                            <input type="text" name="co_leader_text" class="form-control d-none i27" value="Pembina UKM Mostaneer">
                                            <input type="text" class="form-control d-none p p27" data-p="27" value="0">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            <span style="border-bottom: 2px solid #333">
                                                <span class="s28">Irnanda Priyadi, S.T., M.T.</span>
                                                <input type="text" name="co_leader_name" class="form-control d-none i28" value="Irnanda Priyadi, S.T., M.T.">
                                                <input type="text" class="form-control d-none p p28" data-p="28" value="0">
                                            </span>
                                                <br>
                                        <div>
                                            <span class="s29">NIP. 19760410200312100</span>
                                        </div>
                                        <input type="text" name="co_leader_number" class="form-control d-none i29" value="NIP. 19760410200312100">
                                        <input type="text" class="form-control d-none p p29" data-p="29" value="0">
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <input type="hidden" name="type" value="1">
                </form>

                </div>
            </div>

            <div class="col-md-4 outbox_data">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Surat Peminjaman</h5>
                    </div>
                    <?php echo form_open_multipart('outbox/add_outbox', array('id' => 'mail_data')); ?>
                    <input type="hidden" name="time" value="" class="mail-time">
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
                                <input type="text" name="subject" value="<?php echo set_value('subject', 'Surat Peminjaman'); ?>" class="form-control a7 a" data-a="7" id="subject">
                            </div>
                            <?php echo form_error('subject'); ?>
                        </div>

                        <div class="form-group">
                            <label for="number">No. Surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="number" value="<?php echo set_value('number', '(...)/S.I/PanPel/Muker/Mostaneer/FT/UNIB/XII/2019'); ?>" class="form-control a6 a" data-a="6" id="number">
                            </div>
                            <?php echo form_error('number'); ?>
                        </div>

                        <div class="form-group">
                            <label for="mail_date">Tanggal surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control a8 itoday a" data-a="8" id="mail_date" minlength="6" maxlength="255" value="<?php echo date('Y-m-d'); ?>" required>
                                <input type="hidden" name="mail_date" value="<?php echo date('Y-m-d'); ?>" class="mail-date">
                            </div>
                            <?php echo form_error('mail_date'); ?>
                        </div>

                        <div class="form-group">
                            <label for="out_date">Tanggal keluar:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="out_date" value="<?php echo date('Y-m-d'); ?>" class="form-control itoday" id="out_date" minlength="6" maxlength="255" required>
                            </div>
                            <?php echo form_error('out_date'); ?>
                        </div>

                        <div class="form-group">
                            <label for="to">Tujuan surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-database"></i></span>
                                </div>
                                <input type="text" name="to" value="<?php echo set_value('to', 'Kassubag Rumah Tangga'); ?>" class="form-control a9 a" data-a="9" id="to" minlength="6" maxlength="255" required>
                            </div>
                            <?php echo form_error('to'); ?>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn-save">Simpan</button>
                        <input type="button" class="btn btn-primary btn-print" value="Print">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/i18n/datepicker.id.js'); ?>"></script>

<script>
    function saveMail(time) {
        $('.mail-time').val(time);

        $('#mail_data').submit();
    }

    $('.btn-save').click(function(e) {
        e.preventDefault();

        $(this).html('<i class="fa fa-spin fa-spinner"></i> Menyimpan...').attr('disabled', true);

        var data = $('#data').serialize();
        
        $.ajax({
            method: 'GET',
            url: '<?php echo site_url('mails/export_pdf'); ?>',
            data: data,
            context: this,
            success: function(res) {
                if (res.success) {
                    $(this).html('<i class="fa fa-check"></i> Berhasil');
                    var time = res.time;

                    saveMail(time);
                    setTimeout(function() {
                        $(this).html('Simpan').removeAttr('disabled');
                    }, 1000);
                }
            }
        });
    });

    $('#mail_date').datepicker({
        language: 'id',
        dateFormat: 'yyyy-mm-dd',
        todayButton: new Date(),
        clearButton: true,
        autoClose: true,
        onSelect : function(dateText, inst) {
            $.ajax({
                method: 'GET',
                url: '<?php echo site_url('mails/convert_date'); ?>',
                data: { date: dateText },
                success: function(res) {
                    $('#mail_date, .maildate').val(res.day);
                    $('.s8.today').text(res.day);
                    $('.mail-date').val(dateText);
                }
            })
        }
    });
</script>