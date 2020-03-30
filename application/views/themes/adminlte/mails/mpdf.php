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
                    <td>Hal</td>
                    <td>:</td>
                    <td>
                        <b><u><?php echo $subject; ?></u></b>
                    </td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>
                        Kepada Yth
                    </td>
                </tr>
                <tr>
                    <td>
                        <u><b><?php echo $mail_to; ?></b></u>
                    </td>
                </tr>
                <tr>
                    <td>Di-</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mail_to_place; ?></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>
                        <?php if ($type == 1) : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b><i>Bismillahirrohmanirrohiim</i></b>
                        </div>
                        <?php endif; ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i>Asalamu’alaikum Warahmatullahi Wabarakatuh</i>
                        </div>
                        <?php if ($type == 1) : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Puji dan syukur kita panjatkan kehadirat Allah subhanahuwata’ala, karena atas limpahan rahmat dan karunia-Nya kita bisa menjalankan aktivitas sehari-hari.
                        </div>
                        <?php else : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Alhamdulillahirobbil’aalamiin. Puji syukur kita panjatkan atas segala nikmat yang telah Allah subhanawata’ala berikan. Sholawat dan salam semoga selalu tercurahkan kepada junjungan kita Nabi Muhammad shallallahu’alaihiwasallam. 
                        </div>
                        <?php endif; ?>
                        <?php if ($type == 1) : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Sehubungan dengan diadakanya <b><?php echo $event_name; ?></b> yang insyaaAllah akan dilaksanakan pada :
                        </div>
                        <?php else : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Sehubungan dengan akan dilaksanakannya kegiatan <b><?php echo $event_name; ?></b>, dengan ini kami mengundang bapak untuk hadir dalam acara kami, yang insyaaAllah akan dilaksanakan pada : 
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <br>          
            <table>
                <tr>
                    <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>hari/tanggal</span>
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>waktu</span>
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>tempat</span>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <?php echo $event_date; ?>
                            <br>
                        <?php echo $event_time; ?>
                            <br>
                        <?php echo $event_location; ?>
                    </td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>
                        <?php if ($type == 1) : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Untuk itu kami memohon kepada Bapak/Ibu untuk dapat memberikan izin peminjaman <b><?php echo $borrowing_item; ?></b> sebagaimana perihal tersebut di atas.
                        </div>
                        <?php endif; ?>
                        <?php if ($type == 1) : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Demikian surat ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
                        </div>
                        <?php else : ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Atas perhatian dan kehadiran bapak tepat pada waktunya, kami ucapkan terima kasih. 
                        </div>
                        <?php endif; ?>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i>Wassalamu’alakum Warahmatullahi Wabarakatuh</i>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <table>
                <?php if ($type == 2 || $type == 3) : ?>
                <tr>
                    <td></td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <b>Mengetahui,</b>
                    </td>
                </tr>
                <?php endif; ?>

                <tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <td style="padding-left: 70px;">
                        <span>&nbsp;<?php echo $leader_text_one; ?></span>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        <span style="border-bottom: 2px solid #333;">
                            <span><?php echo $leader_item_one; ?></span>
                        </span>
                            <br>
                        <div style="text-indent: 15px;">
                            <span>&nbsp;&nbsp;&nbsp;<?php echo $leader_number_one; ?></span>
                        </div>
                    </td>
                    <td></td>
                    <td style="padding-left: 50px">
                        <span><?php echo ($type == 1) ? '&nbsp;&nbsp;&nbsp;&nbsp;' : ''; ?><?php echo $leader_text_second; ?></span>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        <span style="border-bottom: 2px solid #333">
                            <span><?php echo $leader_item_second; ?></span>
                        </span>
                            <br>
                        <div>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $leader_number_second; ?></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 80px;">
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $co_leader_co_text; ?>
                        </div>
                            <span><?php echo $co_leader_text; ?></span>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            <span style="border-bottom: 2px solid #333">
                                <span class="s28"><?php echo $co_leader_name; ?></span>
                            </span>
                                <br>
                            <div>
                                <?php if ($type == 2) : ?>
                                    &nbsp;&nbsp;&nbsp;
                                <?php endif; ?>
                                <span><?php echo $co_leader_number; ?></span>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>

    </body>
</html>