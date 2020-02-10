<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dasbor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dasbor</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total['inbox']; ?></h3>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo site_url('inbox'); ?>" class="small-box-footer">Kelola Surat Masuk <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $total['outbox']; ?></h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('outbox'); ?>" class="small-box-footer">Kelola Surat Keluar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $total['classifications']; ?></h3>

                <p>Klasifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo site_url('classifications'); ?>" class="small-box-footer">Kelola Klasifikasi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total['dispositions']; ?></h3>

                <p>Disposisi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo site_url('dispositions'); ?>" class="small-box-footer">Kelola Disposisi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
       
        <div class="row">
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card p-0">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-envelope mr-1"></i>
                  Surat
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#sMasuk" data-toggle="tab">Masuk</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sKeluar" data-toggle="tab">Keluar</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="chart tab-pane active" id="sMasuk" style="position: relative; height: 300px; overflow: scroll">
                    <?php if ($total['inbox'] > 0) : ?>
                        <h5><?php echo (($total['inbox'] < 5) ? $total['inbox'] : 5); ?> Surat Masuk Terakhir</h5>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tr>
                          <th>No. Surat</th>
                          <th>Asal Surat</th>
                          <th>Isi ringkas</th>
                          <th>Lihat</th>
                        </tr>
                        <?php foreach ($latest['inbox'] as $inbox) : ?>
                        <tr>
                          <td><?php echo $inbox->number; ?></td>
                          <td><?php echo $inbox->from; ?></td>
                          <td><?php echo character_limiter($inbox->resume, 80, '....'); ?></td>
                          <td>
                            <a href="<?php echo site_url('inbox/view/'. $inbox->id); ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                    <?php else : ?>
                    <div class="alert alert-info">Belum ada data surat masuk</div>
                    <?php endif; ?>
                             
                  </div>
                  <div class="chart p-0 tab-pane" id="sKeluar" style="position: relative; height: 300px; overflow: scroll">
                    <?php if ($total['outbox'] > 0) : ?>
                        <h5><?php echo (($total['outbox'] < 5) ? $total['outbox'] : 5); ?> Surat Keluar Terakhir</h5>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tr>
                          <th>No. Surat</th>
                          <th>Tujuan Surat</th>
                          <th>Isi ringkas</th>
                          <th>Lihat</th>
                        </tr>
                        <?php foreach ($latest['outbox'] as $outbox) : ?>
                        <tr>
                          <td><?php echo $outbox->number; ?></td>
                          <td><?php echo $outbox->to; ?></td>
                          <td><?php echo character_limiter($outbox->resume, 80, '...'); ?></td>
                          <td>
                            <a href="<?php echo site_url('outbox/view/'. $outbox->id); ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                    <?php else : ?>
                    <div class="alert alert-info">Belum ada data surat keluar</div>
                    <?php endif; ?>         
                  </div>  
                </div>
              </div>
            </div>
          </section>
          <section class="col-lg-5 connectedSortable">
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-chart-bar"></i>
                  Statistik
                </h3>
              </div>
              <div class="card-body">
                <canvas id="stats" height="300" style="height: 300px;"></canvas>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>