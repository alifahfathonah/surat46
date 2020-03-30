<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
#data {
    line-height: 1.3
}
</style>

<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Surat Keterangan Aktif</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item"><?php echo anchor('mails', 'Tulis Surat'); ?></li>
                        <li class="breadcrumb-item active">Surat Keterangan Aktif</li>
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
                            <div style="border: 2px solid #333; margin-bottom: 20px;"></div>

                           
                            <table class="table borderless m-0 cc nn">
                                <tr>
                                    <td>
                                        Nomor
                                            <br>
                                        Perihal
                                    </td>
                                    <td>:<br>:</td>
                                    <td>
                                        <span class="s6 snosurat">01/Ketum/SAO/Mostaneer/FT/UNIB/III/2020</span>
                                        <input type="text" name="number" class="form-control d-none i6" value="01/Ketum/SAO/Mostaneer/FT/UNIB/III/2020">
                                            <br>
                                        <span class="s7">Surat Aktif Organisasi</span>
                                        <input type="text" class="form-control d-none i7" name="subject" value="Surat Aktif Organisasi">
                                    </td>
                                    <td style="float:right">
                                        <span class="s8 today"></span>
                                        <input type="text" class="form-control d-none i8 itoday">
                                        <input type="hidden" name="date" value="" class="maildate">
                                    </td>
                                </tr>
                            </table>

                            <div class="text-center">
                                <span style="font-size: 26px; font-weight: bold;">SURAT KETERANGAN AKTIF ORGANISASI</span>
                            </div>

                            <table class="table borderless m-0 cc nn">
                                <tr>
                                    <td>
                                    Yang bertandatangan di bawah ini :     
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc ck" style="margin-top: -10px">
                                <tr>
                                    <td>
                                        Nama
                                            <br>
                                        NPM
                                            <br>
                                        Strata/Prodi
                                            <br>
                                        Jabatan
                                            <br>
                                        Organisasi
                                    </td>
                                    <td>:<br>:<br>:<br>:<br>:</td>
                                    <td>
                                        <span class="s15 font-weight-bold">Arsyi Arif Agami</span>
                                        <input type="text" class="form-control d-none i15" value="Arsyi Arif Agami" name="k_name">
                                            <br>
                                        <span class="s16 font-weight-bold">G1A018035</span>
                                        <input type="text" class="form-control d-none i16" value="G1A018035" name="k_npm">
                                            <br>
                                        <span class="s17 font-weight-bold">S1/Informatika</span>
                                        <input type="text" class="form-control d-none i17" value="S1/Informatika" name="k_prodi">
                                            <br>
                                        <span class="s18 font-weight-bold">Ketua Umum </span>
                                        <input type="text" class="form-control d-none i18" value="Ketua Umum " name="k_jabatan">
                                            <br>
                                        <span class="s19 font-weight-bold">UKM MOSTANEER FT KBM UNIB</span>
                                        <input type="text" class="form-control d-none i19" value="UKM MOSTANEER FT KBM UNIB" name="k_organisasi">
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc nn" style="margin-top: 20px">
                                <tr>
                                    <td>
                                    Dengan mengucapkan <i>bismillahirrohmanirohim</i>, dengan ini menyatakan bahwa,    
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc ck" style="margin-top: -40px">
                                <tr>
                                    <td>
                                        Nama
                                            <br>
                                        NPM
                                            <br>
                                        Strata/Prodi
                                            <br>
                                        Jabatan
                                            <br>
                                        Organisasi
                                    </td>
                                    <td>:<br>:<br>:<br>:<br>:</td>
                                    <td>
                                        <span class="s24 font-weight-bold">Martin Mulyo Syahidin</span>
                                        <input type="text" class="form-control d-none i24" value="Martin Mulyo Syahidin" name="a_name">
                                            <br>
                                        <span class="s20 font-weight-bold">G1A019061</span>
                                        <input type="text" class="form-control d-none i20" value="G1A019061" name="a_npm">
                                            <br>
                                        <span class="s21 font-weight-bold">S1/Informatika</span>
                                        <input type="text" class="form-control d-none i21" value="S1/Informatika" name="a_prodi">
                                            <br>
                                        <span class="s22 font-weight-bold">Apa adanya</span>
                                        <input type="text" class="form-control d-none i22" value="Ketua Umum " name="a_jabatan">
                                            <br>
                                        <span class="s23 font-weight-bold">UKM MOSTANEER FT KBM UNIB</span>
                                        <input type="text" class="form-control d-none i23" value="UKM MOSTANEER FT KBM UNIB" name="a_organisasi">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table class="table borderless cc">
                                <tr>
                                    <td>
                                        <div>
                                            <span class="s25">
                                            Adalah benar-benar mahasiswa yang masih aktif sebagai pengurus Unit Kegiatan Mahasiswa Moslem Station of Engineering Fakultas Teknik Universitas Bengkulu masa jabatan 2020.
                                            </span>
                                            <input type="text" class="form-control d-none i25" value="Adalah benar-benar mahasiswa yang masih aktif sebagai pengurus Unit Kegiatan Mahasiswa Moslem Station of Engineering Fakultas Teknik Universitas Bengkulu masa jabatan 2020.">
                                        </div>
                                        
                                        <div style="margin-top: 15px;">
                                            <span class="s26">
                                               Demikian surat ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.	
                                            </span>
                                            <input type="text" class="form-control d-none i26" value="Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table class="table borderless cc">
                                <tr>
                                    <td></td>
                                    <td align="right" style="padding-right: 75px; width: 50%">
                                        <div class="text-center">
                                            <b><span class="s27">Ketua Umum UKM Mostaneer</span></b>
                                            <input type="text" class="form-control d-none i27" name="ketum_txt" value="Ketua Umum UKM Mostaneer">
                                                <br>
                                            <b><span class="s28">FT KBM UNIB</span></b>
                                            <input type="text" class="form-control d-none i28" name="ketum_organisasi" value="FT KBM UNIB">

                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            <b><span class="s29">Arsyi Arif Agami</span></b>
                                            <input type="text" class="form-control d-none i29" name="ketum_name" value="Arsyi Arif Agami">
                                                <br>
                                                <span class="s30">G1A018035</span>
                                            <input type="text" class="form-control d-none i30" name="ketum_npm" value="G1A018035">

                                        </div>
                                    </td>
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
                        <h5 class="card-title">Surat Keterangan Aktif</h5>
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
                                <input type="text" name="subject" value="<?php echo set_value('subject', 'Surat Aktif Organisasi'); ?>" class="form-control a7 a" data-a="7" id="subject">
                            </div>
                            <?php echo form_error('subject'); ?>
                        </div>

                        <div class="form-group">
                            <label for="number">No. Surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="number" value="<?php echo set_value('number', '01/Ketum/SAO/Mostaneer/FT/UNIB/III/2020'); ?>" class="form-control a6 a" data-a="6" id="number">
                            </div>
                            <?php echo form_error('number'); ?>
                        </div>

                        <div class="form-group">
                            <label for="mail_date">Tanggal surat:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" value="<?php echo set_value('mail_date'); ?>" class="form-control a8 itoday a" data-a="8" id="mail_date" minlength="6" maxlength="255" required>
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
            url: '<?php echo site_url('mails/export_pdf_surat_aktif'); ?>',
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