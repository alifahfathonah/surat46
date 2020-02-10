<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  .img_logo {
    width: 120px;
    height: 120px;
  }
  </style>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengaturan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
              <li class="breadcrumb-item active">Pengaturan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#sites" data-toggle="tab">Situs</a></li>
                  <li class="nav-item"><a class="nav-link" href="#upload" data-toggle="tab">Upload</a></li>
                  <li class="nav-item"><a class="nav-link suratLink" href="#mail" data-toggle="tab">Disposisi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab"><i class="fa fa-info-circle"></i></a></li>
                  <?php if ($flash) : ?>
                  <li class="nav-link text-success font-weight-bold"><?php echo $flash; ?></li>
                  <?php endif; ?>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="sites">
                    <?php echo form_open_multipart('settings/edit_sites'); ?>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama situs:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="name" value="<?php echo set_value('name', get_site_name()); ?>" required>
                        </div>
                        <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                  </div>

                  <div class="tab-pane" id="upload">
                  <?php echo form_open('settings/edit_upload'); ?>
                    <div class="form-group row">
                        <label for="inputSize" class="col-sm-2 col-form-label">Ukuran maksimal file:</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputSize" name="settings[max_mail_file_size]" value="<?php echo set_value('settings[max_mail_file_size]', get_settings('max_mail_file_size')); ?>" required>
                        </div>
                        <?php echo form_error('size', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                      </div>

                      <div class="form-group row">
                        <label for="inputFmt" class="col-sm-2 col-form-label">Berkas yang diizinkan:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputFmt" name="settings[allowed_types]" value="<?php echo set_value('settings[allowed_types]', get_settings('allowed_types')); ?>">
                        </div>
                        <?php echo form_error('file_format', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputFmt" class="col-sm-2 col-form-label">Batas ukuran file:</label>
                        <div class="col-sm-10">
                          Tentukan batas ukuran file yang bisa diupload dalam satuan KB.
                          <br>
                          Pengaturan server Anda membatasi sebesar <?php echo $max_size; ?>B (<?php echo $max_size_kb; ?> KB)
                        </div>
                      </div>

                      <?php echo form_close(); ?>
                  </div>
                  
                  <div class="tab-pane" id="mail">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="card">
                          <div class="card-body p-0">
                            <div class="print_head">
                              <table class="table th m-0" style="border-bottom: 3px;">
                                <tr class="bb2">
                                  <td class="border-none">
                                    <?php if ( get_settings('kop_logo_1') == '0') : ?>
                                    {{ LOGO_1 }}
                                    <?php else : ?>
                                      <img alt="Logo 1" src="<?php echo base_url('assets/uploads/static/'. get_settings('kop_logo_1')); ?>" class="img-fluid img_logo img-responsive">
                                    <?php endif; ?>
                                  </td>
                                  <td class="text-center border-none">
                                    <h5>
                                      <b class="kop1"><?php echo get_settings('kop_1'); ?></b>
                                    </h5>
                                    <h5>
                                      <b class="kop2"><?php echo get_settings('kop_2'); ?></b>
                                    </h5>
                                    <h5>
                                      <b class="kop3"><?php echo get_settings('kop_3'); ?></b>
                                    </h5>
                                    <h5>
                                      <b class="kop4"><?php echo get_settings('kop_4'); ?></b>
                                    </h5>
                                    <h5>
                                      <b class="kop5"><?php echo get_settings('kop_5'); ?></b>
                                    </h5>
                                    <span>
                                      <b class="kopalamat"><?php echo get_settings('kop_alamat'); ?></b>
                                    </span>
                                  </td>
                                  <td style="border-left: none;">
                                    <?php if (get_settings('kop_logo_2') == '0') : ?>
                                    {{ LOGO_2 }}
                                    <?php else : ?>
                                      <img alt="Logo 2" src="<?php echo base_url('assets/uploads/static/'. get_settings('kop_logo_2')); ?>" class="img-fluid img_logo img-responsive">
                                    <?php endif; ?>
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
                                    {{ INDEX_BERKAS }}
                                  </td>
                                  <td style="width: 25%;" class="br">
                                    Kode: {{ KODE_KLASIFIKASI }}
                                  </td>
                                </tr>
                                <tr>
                                  <td class="left">
                                    Tanggal surat
                                  </td>
                                  <td class="mid">:</td>
                                  <td class="right br" colspan="2">{{ TANGGAL_SURAT }}</td>
                                </tr>
                                <tr>
                                  <td class="left">
                                    Nomor surat
                                  </td>
                                  <td class="mid">:</td>
                                  <td class="right br" colspan="2">{{ NOMOR_SURAT }}</td>
                                </tr>
                                <tr>
                                  <td class="left">
                                    Asal surat
                                  </td>
                                  <td class="mid">:</td>
                                  <td class="right br" colspan="2">{{ ASAL_SURAT }}</td>
                                </tr>
                                <tr>
                                  <td class="left">
                                    Isi ringkas
                                  </td>
                                  <td class="mid">:</td>
                                  <td class="right br text-justify" colspan="2">{{ ISI_RINGKAS }}</td>
                                </tr>
                                <tr class="br">
                                  <td class="left">
                                    Diterima tanggal
                                  </td>
                                  <td class="mid">:</td>
                                  <td>
                                    {{ TANGGAL_TERIMA }}
                                  </td>
                                  <td style="width: 25%;"  class="br">
                                    No. Agenda: {{ NO_AGENDA }}
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="3">
                                    <b>Isi disposisi:</b>
                                      <br>
                                    <ol class="disp_content">
                                      <li>
                                        <b><i>{{ ISI DISPOSISI }}</i></b>
                                          <br>
                                        Batas: {{ BATAS_WAKTU }}
                                          <br>
                                        Sifat: {{ SIFAT }}
                                      </li>
                                      <li>
                                        <b><i>{{ ISI DISPOSISI }}</i></b>
                                          <br>
                                        Batas: {{ BATAS_WAKTU }}
                                          <br>
                                        Sifat: {{ SIFAT }}
                                      </li>
                                      <li>
                                        <b><i>{{ ISI DISPOSISI }}</i></b>
                                          <br>
                                        Batas: {{ BATAS_WAKTU }}
                                          <br>
                                        Sifat: {{ SIFAT }}
                                      </li> 
                                    </ol>
                                  </td>
                                  <td  class="br bl">
                                    <b style="padding-top: -2px">Diteruskan kepada:</b>
                                      <br>
                                    <ol class="disp_content">
                                      <li>{{ TUJUAN DISPOSISI }}</li>
                                      <li>{{ TUJUAN DISPOSISI }}</li>
                                      <li>{{ TUJUAN DISPOSISI }}</li>
                                    </ol> 
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="3"></td>
                                  <td style="width: 30%;" colspan="2">
                                    <span class="kop6"><?php echo get_settings('chairman_text'); ?></span>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                    <div style="margin-left: 25px">
                                      <span style="border-bottom: 2px solid #aaa" class="kop7"><?php echo get_settings('chairman_name'); ?></span>
                                        <br>
                                      <span class="kop8"><?php echo get_settings('chairman_add'); ?></span>
                                    </div>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h5 class="card-title">Sesuaikan Tampilan Print</h5>
                          </div>

                          <?php echo form_open_multipart('settings/edit_mail'); ?>
                          <div class="card-body">
                            <div class="form-group row">
                              <label for="logo1" class="col-sm-2 col-form-label">Logo 1:</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="logo1" name="logo_1">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="logo1" class="col-sm-2 col-form-label">Logo 2:</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="logo2" name="logo_2">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Kop 1:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks1" name="settings[kop_1]" value="<?php echo get_settings('kop_1'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Kop 2:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks2" name="settings[kop_2]" value="<?php echo get_settings('kop_2'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Kop 3:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks3" name="settings[kop_3]" value="<?php echo get_settings('kop_3'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Kop 4:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks4" name="settings[kop_4]" value="<?php echo get_settings('kop_4'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Kop 5:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks5" name="settings[kop_5]" value="<?php echo get_settings('kop_5'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Kop Alamat:</label>
                              <div class="col-sm-10">
                                <textarea class="form-control teksalamat" name="settings[kop_alamat]"><?php echo get_settings('kop_alamat'); ?></textarea>
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>


                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Judul ketua:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks6" name="settings[chairman_text]" value="<?php echo get_settings('chairman_text'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Nama ketua:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks7" name="settings[chairman_name]" value="<?php echo get_settings('chairman_name'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Nomor:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control teks8" name="settings[chairman_add]" value="<?php echo get_settings('chairman_add'); ?>">
                              </div>

                              <?php echo form_error('name', '<div class="text-danger font-weight-bold">', '</div>'); ?>
                            </div>
                            
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Tips:</label>
                              <div class="col-sm-10">
                                <ul>
                                  <li>Kosongkan kolom logo jika tidak ingin mengganti</li>
                                  <li>Format berkas yang diizinkan: JPG, PNG maksimal 1MB</li>
                                  <li>Disarankan gambar berukuran 80px saja dan transparan</li>
                                  <li>Kosongkan kolom untuk menghapus</li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          <div class="card-footer">
                            <input type="submit" class="btn btn-primary float-right" value="Simpan">
                          </div>
                          <?php echo form_close(); ?>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="about">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h5 class="card-title">
                          Tentang Surat46
                        </h5>
                      </div>
                      <div class="card-body">
                        <img src="<?php echo base_url('assets/uploads/static/Logo.png'); ?>" class="img-fluid img-responsive">
                        <br>
                        <p>
                          Halo, terima kasih telah menggunakan aplikasi <b>Surat46</b>
                        </p>
                        <p>
                          <b>Surat46</b> adalah aplikasi manajemen surat sederhana, yang ditujukan untuk pengelolaan surat dalam suatu organisasi. Project ini sebenarnya adalah project liburan semester kemarin, yang akan digunakan untuk salah satu UKM di Universitas Bengkulu, namun saya memutuskan untuk "serius" dan memperbaiki project ini untuk bisa digunakan secara umum. Fitur-fiturnya masih sederhana dan hanya sebatas pencatatan saja. Namun ke depannya saya harap bisa menambahkan fitur-fitur lainnya.
                        </p>
                        <p>
                          Jika Anda mempunyai kritik, saran perbaikan, pertanyaan atau permintaan fitur, dapat menghubungi saya melalui kontak berikut.
                          <ul>
                            <li>Email <b>martinms.za@gmail.com</b></li>
                            <li>SMS / Telp. / WhatsApp <b>0822-8166-6584</b></li>
                            <li>Telegram <b>@mul.yoo</b></li>
                            <li>Blog <b><?php echo anchor('https://jurnalmms.web.id', 'Jurnal MMS'); ?></b></li>
                          </ul>
                        </p>
                        <p>
                          Jika Anda membutuhkan jasa kustomisasi aplikasi ini, atau jasa pembuatan aplikasi sistem informasi, juga bisa menghubungi saya melalui kontak diatas. Terima kasih.
                        </p>
                      </div>
                      <div class="card-footer">
                        <?php echo anchor('https://github.com/mulyosyahidin/surat46', '<i class="fa fa-github"></i> View on GitHub'); ?>
                          <br>
                        <?php echo anchor('https://jurnalmms.web.id/contact/', '<i class="fa fa-phone"></i> Contact the Author'); ?>
                      </div>
                    </div>
                  </div>
                </div>   
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="helpModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Halo!</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>