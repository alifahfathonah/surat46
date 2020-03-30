<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
?><!DOCTYPE html>
<html lang="ID-id">
    <head>
        <meta charset="utf-8">

        <title>Export PDF</title>

        <style type="text/css">
            .img_logo {
                margin-top: 10px;
                width: 80px;
                height: 80px;
            }
            .text-center { text-align: center; }
            body {
                font-family: 'Times New Roman';
            }

            .content-wrapper {
                line-height: 1.6;
            }
        </style>
    </head>
    <body>

        <div class="content-wrapper">
            <table>
                <tr>
                    <td style="width: 20%;">
                        <img alt="Logo 1" src="<?php echo base_url('assets/uploads/static/'. get_settings('kop_logo_1')); ?>" class="img-fluid img_logo img-responsive">
                    </td>
                    <td style="text-align: center; width: 80%;">
                        <h5>
                            <span style="font-size: 14px;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</span>
                                <br>
                            <span style="font-size: 14px;">UNIVERSITAS BENGKULU</span>
                                <br>
                            <span style="font-size: 14px;">FAKULTAS TEKNIK</span>
                                <br>
                            <span style="font-size: 14px;">UKM MOSLEM’S STATION OF ENGINEERING (MOSTANEER)</span>
                        </h5>

                        <span class="address">
                            <i><span style="font-size: 9px;">Sekretariat: Aula Terpadu Fakultas Teknik UNIB Jl. WR. Supratman Kandang Limun Bengkulu</span></i>
                        </span>
                    </td>
                    <td style="width: 20%; text-align: right;">
                        <img alt="Logo 2" src="<?php echo base_url('assets/uploads/static/mostaneer.png'); ?>" class="img-fluid img_logo img-responsive">
                    </td>
                </tr>
            </table>

            <div style="border: 1px solid #333;"></div>
            <div style="border: 2px solid #333; margin-top: 2px; margin-bottom: 3px;"></div>

            <table>
                <tr>
                    <td height="25">
                        Nomor
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $number; ?>
                    </td>
                    <td valign="top" style="float: right; width: 25%">
                    &nbsp;&nbsp;&nbsp;<?php echo $date; ?>
                    </td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td>
                        <?php echo $subject; ?>
                    </td>
                </tr>
            </table>
            <br>
            <div class="text-center">
                <span style="font-size: 14px; font-weight: bold;">SURAT KETERANGAN AKTIF ORGANISASI</span>
            </div>

            <table class="table borderless m-0 cc nn" style="margin-top: 10px;">
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
                                        <b>Arsyi Arif Agami</b>
                                            <br>
                                        <b>G1A018035</b>
                                            <br>
                                        <b>S1/Informatika</b>
                                            <br>
                                        <b>Ketua Umum</b>
                                            <br>
                                        <b>UKM MOSTANEER FT KBM UNIB</b>
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
        </div>

    </body>
</html>