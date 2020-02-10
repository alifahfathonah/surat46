<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <?php echo anchor(base_url(), get_site_name()); ?>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Surat46</b>, dari <?php echo anchor('https://jurnalmms.web.id/', 'MT Kun'); ?>
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>


<script src="<?php echo get_template_uri('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo get_template_uri('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo get_template_uri('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<script src="<?php echo get_template_uri('js/adminlte.js'); ?>"></script>
<script src="<?php echo get_template_uri('plugins/toastr/toastr.min.js'); ?>"></script>

<?php if ($current_section == 'add_inbox') : ?>
  <script src="<?php echo get_template_uri('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/i18n/datepicker.id.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/select2js/dist/js/select2.min.js'); ?>"></script>

    <script>
        $('#mail_date, #accepted_date').datepicker({
            language: 'id',
            dateFormat: 'yyyy-mm-dd',
            todayButton: new Date(),
            clearButton: true,
            position: 'top left'
        });

        var d = new Date();
        var year = d.getFullYear();
        var mo = d.getMonth() + 1;
        var day = d.getDate();
        if (day < 10)
            day = '0'+ day;
        if (mo < 10)
            mo = '0'+ mo;
        var today = year +'-'+ mo +'-'+ day;
        $('#accepted_date').val(today);

        $('#classification').select2({
            theme: 'bootstrap'
        });

        $('#classification').data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Cari klasifikasi...');
    </script>
<?php endif; ?>


<?php if ($current_section == 'add_outbox') : ?>
  <script src="<?php echo get_template_uri('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/i18n/datepicker.id.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/select2js/dist/js/select2.min.js'); ?>"></script>

    <script>
        $('#mail_date, #out_date').datepicker({
            language: 'id',
            dateFormat: 'yyyy-mm-dd',
            todayButton: new Date(),
            clearButton: true,
            position: 'top left'
        });

        var d = new Date();
        var year = d.getFullYear();
        var mo = d.getMonth() + 1;
        var day = d.getDate();
        if (day < 10)
            day = '0'+ day;
        if (mo < 10)
            mo = '0'+ mo;
        var today = year +'-'+ mo +'-'+ day;
        $('#out_date').val(today);

        $('#classification').select2({
            theme: 'bootstrap'
        });

        $('#classification').data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Cari klasifikasi...');
    </script>
<?php endif; ?>


<?php if ($current_section == 'edit_inbox') : ?>
  <script src="<?php echo get_template_uri('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/i18n/datepicker.id.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/select2js/dist/js/select2.min.js'); ?>"></script>
<script>
    $(function () {
        function doDeleteFile (id) {
            $('.confirmFileDelete').click(function (e) {
                e.preventDefault();

                $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('inbox/delete_file'); ?>',
                    data: { id: id },
                    beforeSend: function () {
                        $('.confirmDeleteText').html('<i class="fa fa-spin fa-spinner"></i> Sedang menghapus file ...');
                    },
                    success: function (res) {
                        if (res.success) {
                            toastr.success('Berkas berhasil dihapus');
                            setTimeout(function () {
                               $('.currentFile, .deleteBox').hide('slow');
                                $('.changeTxt').html('Upload File baru: <span class="text-danger">**</span>');
                                $('.cardBox').removeClass('card');
                            }, 2000);
                            setTimeout(function () {
                                $('#deleteDialog').modal('hide');
                            }, 750);
                        }
                        else if (res.errors) {

                        }
                    }
                });
            });
        } 

        $('.deleteImgBtn').click(function(e) {
            var id = $(this).data('id');
            doDeleteFile (id);
        });
    });
    </script>
    <script>

        $('#mail_date, #accepted_date').datepicker({
            language: 'id',
            dateFormat: 'yyyy-mm-dd',
            todayButton: new Date(),
            clearButton: true,
            position: 'top left'
        });

        var d = new Date();
        var year = d.getFullYear();
        var mo = d.getMonth() + 1;
        var day = d.getDate();
        if (day < 10)
            day = '0'+ day;
        if (mo < 10)
            mo = '0'+ mo;
        var today = year +'-'+ mo +'-'+ day;
        $('#accepted_date').val(today);

        $('#classification').select2({
            theme: 'bootstrap'
        });

        $('#classification').data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Cari klasifikasi...');
    </script>
<?php endif; ?>

<?php if ($current_section == 'edit_outbox') : ?>
  <script src="<?php echo get_template_uri('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/i18n/datepicker.id.js'); ?>"></script>
  <script src="<?php echo get_template_uri('plugins/select2js/dist/js/select2.min.js'); ?>"></script>
<script>
    $(function () {
        function doDeleteFile (id) {
            $('.confirmFileDelete').click(function (e) {
                e.preventDefault();

                $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('outbox/delete_file'); ?>',
                    data: { id: id },
                    beforeSend: function () {
                        $('.confirmDeleteText').html('<i class="fa fa-spin fa-spinner"></i> Sedang menghapus file ...');
                    },
                    success: function (res) {
                        if (res.success) {
                            toastr.success('Berkas berhasil dihapus');
                            setTimeout(function () {
                               $('.currentFile, .deleteBox').hide('slow');
                                $('.changeTxt').html('Upload File baru: <span class="text-danger">**</span>');
                                $('.cardBox').removeClass('card');
                            }, 2000);
                            setTimeout(function () {
                                $('#deleteDialog').modal('hide');
                            }, 750);
                        }
                        else if (res.errors) {

                        }
                    }
                });
            });
        } 

        $('.deleteImgBtn').click(function(e) {
            var id = $(this).data('id');
            doDeleteFile (id);
        });
    });
    </script>
    <script>
        $('#mail_date, #out_date').datepicker({
            language: 'id',
            dateFormat: 'yyyy-mm-dd',
            todayButton: new Date(),
            clearButton: true,
            position: 'top left'
        });

        var d = new Date();
        var year = d.getFullYear();
        var mo = d.getMonth() + 1;
        var day = d.getDate();
        if (day < 10)
            day = '0'+ day;
        if (mo < 10)
            mo = '0'+ mo;
        var today = year +'-'+ mo +'-'+ day;
        $('#out_date').val(today);

        $('#classification').select2({
            theme: 'bootstrap'
        });

        $('#classification').data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Cari klasifikasi...');
    </script>
<?php endif; ?>

<?php if ($current_section == 'classifications') : ?>
<script>
function confirmClassificationDelete (classification_id) {
    $('.confirmdoDeleteFileBtn').click(function (e) {
        e.preventDefault();

        var currentClassification = $('.data-'+ classification_id);
        var currentAnimContainer = $('.animationContainer', currentClassification);

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('classifications/delete'); ?>',
            data: { id: classification_id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    $(currentClassification).css('background', '#eb3337');
                    $(currentClassification).css('color', 'white');
                    $('a', currentClassification).css('color', 'white');

                    currentAnimContainer.html('<i class="fa fa-spin fa-spinner"></i> Menghapus ...');
                    toastr.success('Data berhasil dihapus');
                    setTimeout(function() {
                        $('#confirmDeleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function() {
                        currentAnimContainer.html('<i class="fa fa-check"></i> Data berhasil dihapus');
                    }, 2000);
                    setTimeout(function() {
                        currentAnimContainer.html('<i class="fa fa-sync fa-spin"></i> Memuat ulang...');
                    }, 3000);
                    setTimeout(function() {
                        currentClassification.hide('slow');
                    }, 4000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var classification_id = $(this).data('id');
    confirmClassificationDelete (classification_id);
});
</script>
<?php endif; ?>
<?php if ($current_section == 'inbox') : ?>
    <script>
function confirmDeleteIncomingMail (mail_id) {
    $('.confirmDeleteMailBtn').click(function (e) {
        e.preventDefault();

        var currentMailAction = $('.data-'+ mail_id);
        var currentAnimationContainer = $('.animColumn', currentMailAction);

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('inbox/delete'); ?> ',
            data: { id: mail_id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    $(currentMailAction).css('background', '#eb3337');
                    $(currentMailAction).css('color', 'white');
                    $('a', currentMailAction).css('color', 'white');

                    currentAnimationContainer.html('<i class="fa fa-spin fa-spinner"></i> Menghapus ...');
                    toastr.options = {
                        preventDuplicates: true
                    };
                    toastr.success('Data berhasil dihapus');
                    setTimeout(function() {
                        $('#confirmDeleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function() {
                        currentAnimationContainer.html('<i class="fa fa-check"></i> Data berhasil dihapus');
                    }, 2000);
                    setTimeout(function() {
                        currentAnimationContainer.html('<i class="fa fa-sync fa-spin"></i> Memuat ulang...');
                    }, 3000);
                    setTimeout(function() {
                        currentMailAction.hide('slow');
                    }, 4000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var mail_id = $(this).data('id');
    confirmDeleteIncomingMail (mail_id);
});
</script>
<?php endif; ?>

<?php if ($current_section == 'outbox') : ?>
    <script>
function confirmDeleteIncomingMail (mail_id) {
    $('.confirmDeleteMailBtn').click(function (e) {
        e.preventDefault();

        var currentMailAction = $('.data-'+ mail_id);
        var currentAnimationContainer = $('.animColumn', currentMailAction);

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('outbox/delete'); ?> ',
            data: { id: mail_id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    $(currentMailAction).css('background', '#eb3337');
                    $(currentMailAction).css('color', 'white');
                    $('a', currentMailAction).css('color', 'white');

                    currentAnimationContainer.html('<i class="fa fa-spin fa-spinner"></i> Menghapus ...');
                    toastr.options = {
                        preventDuplicates: true
                    };
                    toastr.success('Data berhasil dihapus');
                    setTimeout(function() {
                        $('#confirmDeleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function() {
                        currentAnimationContainer.html('<i class="fa fa-check"></i> Data berhasil dihapus');
                    }, 2000);
                    setTimeout(function() {
                        currentAnimationContainer.html('<i class="fa fa-sync fa-spin"></i> Memuat ulang...');
                    }, 3000);
                    setTimeout(function() {
                        currentMailAction.hide('slow');
                    }, 4000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var mail_id = $(this).data('id');
    confirmDeleteIncomingMail (mail_id);
});
</script>
<?php endif; ?>

<?php if ($current_section == 'characteristics') : ?>
    <script>
//show hide, object = addCard
function showCard() {
    $('.editCard').hide('fade');
    $('.addCard').show('fast');
}

function hideCard() {
    $('.addCard').hide('fade');
    $('.editCard').show('fast');
}

<?php if ($show_edit_card) : ?>
hideCard();
<?php else : ?>
    showCard();
<?php endif; ?>

$('.editBtn').click(function(e) {
    e.preventDefault();

    var id = $(this).data('id');

    $.ajax({
        method: 'GET',
        url: '<?php echo site_url('dispositions/characteristics_data'); ?>',
        data : { id: id },
        success: function (res) {
            $('#sifatt').val(res.meta_content);
            $('.editID').val(res.id);

            hideCard();
        }
    });
});

$('.cancelBtn').click(function(e) {
    e.preventDefault();

    $('#sifatt, .editID').val(null);
    showCard();
});
</script>
<?php endif; ?>

<?php if ($current_section == 'dispositions' || $current_section == 'disposition_mail') : ?>
<script>
function doDeleteDisposition (disposition_id) {
    $('.confirmDeleteBtn').click(function (e) {
        e.preventDefault();

        var con = $('.data-'+ disposition_id);
        var bo = $('.yearColumn', con);

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('dispositions/delete'); ?>',
            data: { id: disposition_id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    $(con).css('background', '#eb3337');
                    $(con).css('color', 'white');
                    $('a', con).css('color', 'white');

                    bo.html('<i class="fa fa-spin fa-spinner"></i> Menghapus ...');
                    toastr.success('Data berhasil dihapus');
                    setTimeout(function() {
                        $('#confirmDeleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function() {
                        bo.html('<i class="fa fa-check"></i> Data berhasil dihapus');
                    }, 2000);
                    setTimeout(function() {
                        bo.html('<i class="fa fa-sync fa-spin"></i> Memuat ulang...');
                    }, 3000);
                    setTimeout(function() {
                        con.hide('slow');
                    }, 4000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var disposition_id = $(this).data('id');
    doDeleteDisposition (disposition_id);
});
</script>
<?php endif; ?>

<?php if ($current_section == 'add_disposition') : ?>
    <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
    <script src="<?php echo get_template_uri('plugins/air-datepicker/dist/js/i18n/datepicker.id.js'); ?>"></script>
    <script src="<?php echo get_template_uri('plugins/select2js/dist/js/select2.min.js'); ?>"></script>
    
    <script>
        $('#bw').datepicker({
            language: 'id',
            dateFormat: 'yyyy-mm-dd',
            todayButton: new Date(),
            clearButton: true
        });

        $('#mail_id').select2({
            theme: 'bootstrap'
        });

        $('#mail_id').data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Cari surat...');
    </script>
<?php endif; ?>
<?php if ($current_section == 'print') : ?>
    <script>
    $('body').onload=print();
    document.title = "<?php echo $mail->number; ?>";
</script>
<?php endif; ?>
<?php if ($current_section == 'view_inbox') : ?>
<script src="<?php echo get_template_uri('plugins/loading-overlay/dist/loadingoverlay.min.js'); ?>"></script>
<script>
function doDeleteInboxMail (id) {
    $('.doDeleteInbox').click(function (e) {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('inbox/delete'); ?>',
            data: { id: id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    setTimeout(function () {
                        $('#deleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function () {
                        $('body').LoadingOverlay('show');
                    }, 1010);
                    setTimeout( function () {
                        window.location = '<?php echo site_url('inbox'); ?>';
                    }, 3000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var id = $(this).data('id');
    doDeleteInboxMail (id);
});
</script>
<?php endif; ?>

<?php if ($current_section == 'view_outbox') : ?>
<script src="<?php echo get_template_uri('plugins/loading-overlay/dist/loadingoverlay.min.js'); ?>"></script>
<script>
function doDeleteOutboxMail (id) {
    $('.doDeleteoutbox').click(function (e) {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('outbox/delete'); ?>',
            data: { id: id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    setTimeout(function () {
                        $('#deleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function () {
                        $('body').LoadingOverlay('show');
                    }, 1010);
                    setTimeout( function () {
                        window.location = '<?php echo site_url('outbox'); ?>';
                    }, 3000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var id = $(this).data('id');
    doDeleteOutboxMail (id);
});
</script>
<?php endif; ?>

<?php if ($current_section == 'profile') : ?>
<script type="text/javascript">
    $('.logout').click(function (e) {
        e.preventDefault();

        window.location = '<?php echo site_url('auth/logout'); ?>';
    });

    <?php if ($flash) : ?>
    toastr.options = {
        preventDuplicates: true
    };
    toastr.success('<?php echo $flash; ?>');
    <?php endif; ?>
    $('#inputUserName, #inputPassword').val('');
    <?php if ( isset($tab) && $tab == 'email') : ?>
        $('#profile, #akun').removeClass('active').addClass('hide');
        $('#email').tab('show').addClass('active');
        $('.email').addClass('active');
        $('.akun, .profil').removeClass('active');
    <?php endif; ?>

    <?php if ( isset($tab) && $tab == 'akun') : ?>
        $('#profile, #email').removeClass('active').addClass('hide');
        $('#akun').tab('show').addClass('active');
        $('.akun').addClass('active');
        $('.email, .profil').removeClass('active');
    <?php endif; ?>
</script>
    <?php endif; ?>

    <?php if ($current_section == 'dasbor') : ?>
    <script src="<?php echo get_template_uri('plugins/chart.js/Chart.min.js'); ?>"></script>
    <script type="text/javascript">
        var pieChartCanvas = $('#stats').get(0).getContext('2d')
  var pieData        = {
    labels: [
        'Total Surat',
        'Surat Minggu Ini',
        'Surat Bulan Ini',
        'Disposisi'
    ],
    datasets: [
      {
        data: [
        <?php echo ($total['inbox'] + $total['outbox']); ?>,
        <?php echo $total['mail_this_week']; ?>,
        <?php echo $total['mail_this_month']; ?>,
        <?php echo $total['dispositions']; ?>],
        backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
      }
    ]
  }


  var pieOptions = {
    legend: {
      display: false
    },
    maintainAspectRatio : false,
    responsive : true,
  }
  
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions      
  });

    </script>
    <?php endif; ?>
    <?php if ($current_section == 'settings') : ?>
        <script type="text/javascript">
            $('.suratLink').click( function (e) {
                e.preventDefault();

                $('body').addClass('sidebar-collapse');

                $('.teks1').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop1').text(txt);
                });

                $('.teks2').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop2').text(txt);
                });

                $('.teks3').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop3').text(txt);
                });

                $('.teks4').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop4').text(txt);
                });

                $('.teks5').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop5').text(txt);
                });

                $('.teksalamat').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kopalamat').text(txt);
                });

                $('.teks6').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop6').text(txt);
                });

                $('.teks7').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop7').text(txt);
                });

                $('.teks8').keyup(function(e) {
                    var txt = $(this).val();
                    $('.kop8').text(txt);
                });
            });
        </script>
    <?php endif; ?>

    <?php if ($current_section == 'add_mail') : ?>
    <script>
    $('.btn-print').click(function(e) {
        window.print();
    });

    function getBulan(no) {
        var bulan = [];
        bulan[0] = 'Januari';
        bulan[1] = 'Februari';
        bulan[2] = 'Maret';
        bulan[3] = 'April';
        bulan[4] = 'Mei';
        bulan[5] = 'Juni';
        bulan[6] = 'Juli';
        bulan[7] = 'Agustus';
        bulan[8] = 'September';
        bulan[9] = 'Oktober';
        bulan[10] = 'November';
        bulan[11] = 'Desember';

        return bulan[no];
    }

    var d = new Date();
    var day = d.getDate();
    var month = d.getMonth();
    var year = d.getFullYear();

    if (day < 10) {
        day = '0'+ day;
    }

    var date = day +' '+ getBulan(month) +' '+ year;
    $('.today').text(date);
    $('.itoday').val(date);

    function change(no) {
        $('.s'+ no).click(function() {
            $(this).hide();
            $('.i'+ no).removeClass('d-none').focus().css('margin-bottom', '-25px');

            $('.i'+ no).keyup(function(e) {
                var key = e.keyCode;
                var val = $(this).val();

                if (key == 13) {
                    $('.s'+ no).text(val).show();
                    $('.a'+ no).val(val);
                    $(this).addClass('d-none');
                }
            });
        });
    }

    for(var i = 1; i <= 29; i++) {
        change(i);
    }
    </script>
    <?php endif; ?>

<!-- Elapsed in {elapsed_time} times  -->
</body>
</html>