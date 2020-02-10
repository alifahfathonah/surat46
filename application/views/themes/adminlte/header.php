<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$query = (NULL !== $this->input->get('query')) ? html_escape($this->input->get('query')) : '';
?><!DOCTYPE html>
<html lang="ID-id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>
  
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_uri('css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/toastr/toastr.min.css'); ?>">

    <link rel="icon" href="<?php echo base_url('assets/uploads/static/icon.png'); ?>" type="image/icon">

    <?php if ($current_section == 'add_inbox' || $current_section == 'add_outbox') : ?>
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/air-datepicker/dist/css/datepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/select2js/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/select2js/dist/css/select2-bootstrap.min.css'); ?>">
    <?php endif; ?>

    <?php if ($current_section == 'add_disposition') : ?>
      <link rel="stylesheet" href="<?php echo get_template_uri('plugins/air-datepicker/dist/css/datepicker.min.css'); ?>">
      <link rel="stylesheet" href="<?php echo get_template_uri('plugins/select2js/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_uri('plugins/select2js/dist/css/select2-bootstrap.min.css'); ?>">
    <?php endif; ?>


    <?php if ($current_section == 'view_inbox') : ?>
      <style>
        .left {
            width: 18%;
        }
        .mid {
            width: 2%;
        }
        .disp_content {
            margin-left: -25px
        }
        .bl {
            border-left: none !important;
        }
        .br {
            border-right: none !important;
        }
        .bb {
            border-right: none !important;
            border-left: none !important;
        }
    </style>
  <?php endif; ?>

  <?php if ($current_section == 'add_mail') : ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/print.css'); ?>">
  <?php endif; ?>

  <?php if ($current_section == 'print') : ?>
    <style type="text/css">
    .img_logo {
            width: 125px;
            height: 120px;
            position: relative;
            float: left;
            margin: .5rem 0 0 .5rem;
        }
  </style>
    <style>
        .print_head h6 {
            font-size: 17px!important;
            font-weight: normal;
        }
        .head_1 b {
            font-size: 17px;
        }
        .left {
            width: 18%;
        }
        .mid {
            width: 2%;
        }
        .right {
            
        }
        .disp_content {
            margin-left: -25px
        }

        @media print {
            .th, .tb {
                border: 1px solid #ddd;
            }
            nav, aside, footer {
                display: none;
            }
            .border-none {
                border-right: none !important;
                border-left: none !important;
            }
            .br {
                border-right: 1px solid #ddd;
            }
            .bb2 {
                border-bottom: 3px solid #ddd
            }
            a[href]:after {
                content: none !important;
            }
        }

        .bl {
                border-left: 1px solid #ddd;
            }
    </style>
  <?php endif; ?>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <?php if ($current_section == 'print') : ?>
            <li class="nav-item">
              Muat ulang halaman untuk mencetak (F5)
            </li>
          <?php endif; ?>
        </ul>

    <ul class="navbar-nav ml-auto">
    <?php if ($current_section == 'classifications') : ?>
      <li class="nav-item">
        <a href="<?php echo site_url('classifications/add'); ?>" title="Tambah data klasifikasi"><i class="fa fa-plus-circle"></i></a>
    </li>
    <?php endif; ?>
    <?php if ($current_section == 'dispositions') : ?>
      <li class="nav-item">
        <a href="<?php echo site_url('dispositions/add'); ?>" title="Tambah data disposisi"><i class="fa fa-plus-circle"></i></a>
    </li>
    <?php endif; ?>
    <?php if ($current_section == 'inbox' || $current_section == 'add_inbox' || $current_section == 'view_inbox' || $current_section == 'print') : ?>
      <li class="nav-item">
        <a href="<?php echo site_url('inbox/add'); ?>" title="Tambah surat baru"><i class="fa fa-plus-circle"></i></a>
    </li>
    <?php endif; ?>

    <?php if ($current_section == 'outbox' || $current_section == 'add_outbox' || $current_section == 'view_outbox') : ?>
      <li class="nav-item">
        <a href="<?php echo site_url('outbox/add'); ?>" title="Tambah surat baru"><i class="fa fa-plus-circle"></i></a>
    </li>
    <?php endif; ?>

      <li class="nav-item dropdown">
        <?php if ($current_section == 'classifications') : ?>
    <form class="form-inline ml-3" action="<?php echo site_url('classifications/search'); ?>" method="GET">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" value="<?php echo $query; ?>" name="query" placeholder="Cari klasifikasi..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
            </div>
          </div>
        </form>
          <?php else : ?>
        <form class="form-inline ml-3" action="<?php echo site_url('inbox/search'); ?>" method="GET">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" value="<?php echo $query; ?>" name="query" placeholder="Cari surat masuk..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
            </div>
          </div>
        </form>
      <?php endif; ?>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo get_site_logo(); ?>" alt="<?php echo get_site_name(); ?> Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo get_site_name(); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo get_user_image(); ?>" class="img-circle elevation-2" alt="Foto profil <?php echo get_user_name(); ?>">
        </div>
        <div class="info">
          <a href="<?php echo site_url('profile'); ?>" class="d-block"><?php echo get_user_name(); ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard'); ?>" class="nav-link<?php echo ($sidebar_section == 'dashboard') ? ' active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasbor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('mails/write'); ?>" class="nav-link<?php echo ($sidebar_section == 'mails' || $sidebar_section == 'add_mail') ? ' active' : ''; ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tulis Surat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('inbox'); ?>" class="nav-link<?php echo ($sidebar_section == 'inbox') ? ' active' : ''; ?>">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Surat Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('outbox'); ?>" class="nav-link<?php echo ($sidebar_section == 'outbox') ? ' active' : ''; ?>">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Surat Keluar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('classifications'); ?>" class="nav-link<?php echo ($sidebar_section == 'classifications') ? ' active' : ''; ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Klasifikasi
              </p>
            </a>
          </li>
          <li class="divider nav-header"></li>
          <li class="nav-item">
            <a href="<?php echo site_url('settings'); ?>" class="nav-link<?php echo ($sidebar_section == 'settings') ? ' active' : ''; ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>