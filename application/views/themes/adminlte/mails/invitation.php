<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Undangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('mails', 'Tulis Surat'); ?></li>
                        <li class="breadcrumb-item active">Undangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
        
            <div class="col-md-8">
            <form action="#" id="data" method="post">
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
                                        <span class="s6 nosurat"></span>
                                        <input type="text" name="number" class="form-control d-none i6 inosurat" value="">
                                            <br>
                                        <b><u><span class="s7">Undangan</span></u></b>
                                        <input type="text" class="form-control d-none i7" name="subject" value="Undangan">
                                    </td>
                                    <td style="float:right">
                                        <span class="s8 today"></span>
                                        <input type="text" class="form-control d-none i8 itoday">
                                        <input type="hidden" name="date" value="" class="maildate">
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc">
                                <tr>
                                    <td>
                                        Kepada Yth
                                            <br>
                                        <b><u><span class="s9">Tujuan Undangan</span></u></b>
                                        <input type="text" class="form-control d-none i9" value="Tujuan Undangan" name="mail_to">
                                            <br>
                                        Di -
                                            <br>
                                        <div style="text-indent: 25px;">
                                            <span class="s10">Tempat</span>
                                            <input type="text" class="form-control d-none i10" value="Tempat" name="mail_to_place">
                                        </div>
                                            
                                        <span style="display: block;">Dengan hormat,</span>
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc cn">
                                <tr>
                                    <td>
                                        <div class="txt1">
                                            <i><span class="s12">Asalamu’alaikum Warahmatullahi Wabarakatuh</span></i>
                                            <input type="text" class="form-control d-none i12" value="Asalamu’alaikum Warahmatullahi Wabarakatuh">
                                        </div>
                                        <div class="txt1">
                                            <span class="s13">
                                                Alhamdulillahirobbil’aalamiin. Puji syukur kita panjatkan atas segala nikmat yang telah Allah subhanawata’ala berikan. Sholawat dan salam semoga selalu tercurahkan kepada junjungan kita Nabi Muhammad shallallahu’alaihiwasallam.
                                            </span>
                                            <input type="text" class="form-control i13 d-none" value="Alhamdulillahirobbil’aalamiin. Puji syukur kita panjatkan atas segala nikmat yang telah Allah subhanawata’ala berikan. Sholawat dan salam semoga selalu tercurahkan kepada junjungan kita Nabi Muhammad shallallahu’alaihiwasallam.">
                                        </div>
                                        <div class="txt1">
                                            Sehubungan dengan akan dilaksanakannya kegiatan <span class="s14">(Nama Kegiatan)</span>, dengan ini kami mengundang bapak untuk hadir dalam acara kami, yang insyaaAllah akan dilaksanakan pada :
                                            <input type="text" class="form-control i14 d-none" value="(Nama Kegiatan)" name="event_name">
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
                                        <div>
                                            <span class="s18">
                                                Atas perhatian dan kehadiran bapak tepat pada waktunya, kami ucapkan terima kasih.
                                            </span>
                                            <input type="text" class="form-control d-none i18" value="Atas perhatian dan kehadiran bapak tepat pada waktunya, kami ucapkan terima kasih.">
                                        </div>
                                        <div>
                                            <i><span class="s20">Wassalamu’alakum Warahmatullahi Wabarakatuh</span></i>
                                            <input type="text" class="form-control d-none i20" value="Wassalamu’alakum Warahmatullahi Wabarakatuh">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="text-center cc">
                                <b>Mengetahui,</b>
                            </div>

                            <table class="table borderless cc ccc">
                                <tr>
                                    <td style="padding-left: 120px;">
                                        <span class="s21">Ketua Pelaksana</span>
                                        <input type="text" class="form-control d-none i21" value="Ketua Pelaksana" name="leader_text_one">
                                        <input type="text" class="form-control d-none p21" data-p="21" value="0">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #333;">
                                            <span class="s22">Abdul Latif Mubarok</span>
                                            <input type="text" class="form-control i22 d-none" value="Abdul Latif Mubarok" name="leader_item_one">
                                            <input type="text" class="form-control d-none p22" data-p="22" value="0">
                                        </span>
                                            <br>
                                        <div style="text-indent: 15px;">
                                            <span class="s23">G1A019035</span>
                                        </div>
                                        <input type="text" class="form-control d-none i23" value="G1A018035" name="leader_number_one">
                                        <input type="text" class="form-control d-none p23" data-p=23"" value="0">
                                    </td>
                                    <td></td>
                                    <td>
                                        <span class="s24">Sekretaris Pelaksana</span>
                                        <input type="text" class="form-control d-none i24" value="Sekretaris Pelaksana" name="leader_text_second">
                                        <input type="text" class="form-control d-none p24" data-p="24" value="0">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <span style="border-bottom: 2px solid #333">
                                            <span class="s25">Alfath Arif Rizkullah</span>
                                            <input type="text" class="form-control i25 d-none" value="Alfath Arif Rizkullah" name="leader_item_second">
                                            <input type="text" class="form-control d-none p24" data-p="24" value="0">
                                        </span>
                                            <br>
                                        <div style="text-indent: 25px;">
                                            <span class="s26">G1A019082</span>
                                        </div>
                                        <input type="text" class="form-control d-none i26" value="G1A0190825" name="leader_number_second">
                                        <input type="text" class="form-control d-none p24" data-p="24" value="0">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                            <div class="ketum">
                                                <span class="s27">Ketua Umum</span>
                                            </div>
                                            <input type="text" name="co_leader_text" class="form-control d-none i27" value="Ketua Umum">
                                            <input type="text" class="form-control d-none p27" data-p="27" value="0">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            <span style="border-bottom: 2px solid #333">
                                                <span class="s28">Arsyi Arif Agami</span>
                                                <input type="text" name="co_leader_name" class="form-control d-none i28" value="Arsyi Arif Agami">
                                                <input type="text" class="form-control d-none p28" data-p="28" value="0">
                                            </span>
                                                <br>
                                        <div style="text-indent: 20px">
                                            <span class="s29">G1A018035</span>
                                        </div>
                                        <input type="text" name="co_leader_number" class="form-control d-none i29" value="G1A018035">
                                        <input type="text" class="form-control d-none p29" data-p="29" value="0">
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
                </form>
            </div>
           

            <div class="col-md-4 outbox_data">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Undangan</h5>
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
                                <input type="text" name="subject" value="<?php echo set_value('subject', 'Undangan'); ?>" class="form-control a7 a" data-a="7" id="subject">
                            </div>
                            <?php echo form_error('subject'); ?>
                        </div>

                        <div class="form-group">
                            <label for="number">No. Surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="number" value="<?php echo set_value('number'); ?>" class="form-control a6 a inosurat" data-a="6" id="number">
                            </div>
                            <?php echo form_error('number'); ?>
                        </div>

                        <div class="form-group">
                            <label for="mail_date">Tanggal surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="date" value="<?php echo set_value('mail_date'); ?>" class="form-control a8 itoday a" data-a="8" id="mail_date" minlength="6" maxlength="255" required>
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
                                <input type="text" name="to" value="<?php echo set_value('to', 'Tujuan Undangan'); ?>" class="form-control a9 a" data-a="9" id="to" minlength="6" maxlength="255" required>
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

        setTimeout(() => {
            $('#mail_data').submit();
        }, 1000);
        
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