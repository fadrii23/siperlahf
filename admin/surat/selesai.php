<?php
  include ('../part/akses.php');
  include ('../part/header.php');
  include('../../config/koneksi.php');

  $dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();
?>

<aside class="main-sidebar">
    <?php
    include ('../part/sidebar.php')
    ?>
</aside>
<!-- <aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['lvl']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="../../dashboard/">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../../penduduk/">
                    <i class="fa fa-users"></i> <span>Data Penduduk</span>
                </a>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../../surat/permintaan_surat/">
                            <i class="fa fa-circle-notch"></i> Permintaan Surat
                        </a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-notch"></i> Surat Selesai
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../../laporan/">
                    <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
                </a>
            </li>
        </ul>
    </section>
</aside> -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Surat Selesai</h1>
        <ol class="breadcrumb">
            <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Surat Selesai</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th><strong>No</strong></th>
                            <th><strong>NIP</strong></th>
                            <th><strong>Nama</strong></th>
                            <th><strong>Jenis Surat</strong></th>
                            <th><strong>Keperluan Surat</strong></th>
                            <th><strong>Tanggal Surat</strong></th>
                            <th><strong>Status</strong></th>
                            <th><strong>Aksi</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

              $no = 1;
                 $qTampil = mysqli_query($connect, "SELECT tb_surat.nama, tb_surat.id_surat, tb_surat.no_surat , tb_surat.nip , tb_surat.jenis_surat , tb_surat.status_surat , tb_surat.keperluan_surat, tb_surat.created_date_surat FROM tb_surat WHERE tb_surat.status_surat='done' ");
              foreach($qTampil as $row){
            ?>
                        <tr>
                            <?php
                $tgl_lhr = date($row['created_date_surat']);
                $tgl = date('d ', strtotime($tgl_lhr));
                $bln = date('F', strtotime($tgl_lhr));
                $thn = date(' Y', strtotime($tgl_lhr));
                $blnIndo = array(
                  'January' => 'Januari',
                  'February' => 'Februari',
                  'March' => 'Maret',
                  'April' => 'April',
                  'May' => 'Mei',
                  'June' => 'Juni',
                  'July' => 'Juli',
                  'August' => 'Agustus',
                  'September' => 'September',
                  'October' => 'Oktober',
                  'November' => 'November',
                  'December' => 'Desember'
                );
              ?>

                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nip']; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis_surat']; ?></td>
                            <td><?php echo $row['keperluan_surat']; ?></td>
                            <td><?php echo $tgl . $blnIndo[$bln] . $thn; ?></td>
                            <td><a class="btn btn-success btn-sm" href='#'><i class="fa fa-check"></i><b>
                                        <?php echo $row['status_surat']; ?></b></a></td>
                            <td>
                                <?php  
                  if($row['jenis_surat']=="Surat Dinas"){
                ?>
                                <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../surat/cetak/surat_dinas/sudin.php?id=<?php echo $row['id_surat']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a>
                                <a class="btn btn-danger btn-sm"
                                    href='hapus_surat.php?id=<?php echo $row['id_surat']; ?>'
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="fa fa-trash"></i></a>
                                <?php
                  } else if($row['jenis_surat']=="Surat Undangan"){
                    ?>
                                <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../surat/cetak/surat_dinas/sudin.php?id=<?php echo $row['id_surat']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a>
                                <a class="btn btn-danger btn-sm"
                                    href='hapus_surat.php?id=<?php echo $row['id_surat']; ?>'
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="fa fa-trash"></i></a>
                                <?php
                //   } else if($row['jenis_surat']=="Surat Keterangan Domisili"){
                ?>
                                <!-- <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../cetak/surat_keterangan_domisili/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a> -->
                                <?php
                //   } else if($row['jenis_surat']=="Surat Keterangan Kepemilikan Kendaraan Bermotor"){
                ?>
                                <!-- <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../cetak/surat_keterangan_kepemilikan_kendaraan_bermotor/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a> -->
                                <?php
                //   } else if($row['jenis_surat']=="Surat Keterangan Perhiasan"){
                ?>
                                <!-- <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../cetak/surat_keterangan_perhiasan/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a> -->
                                <?php
                //   } else if($row['jenis_surat']=="Surat Keterangan Usaha"){
                ?>
                                <!-- <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../cetak/surat_keterangan_usaha/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a> -->
                                <?php
                //   } else if($row['jenis_surat']=="Surat Lapor Hajatan"){
                ?>
                                <!-- <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../cetak/surat_lapor_hajatan/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a> -->
                                <?php
                //   } else if($row['jenis_surat']=="Surat Pengantar SKCK"){
                ?>
                                <!-- <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../cetak/surat_pengantar_skck/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a> -->
                                <?php
                  }
                ?>
                            </td>
                        </tr>
                        <?php
              }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php 
  include ('../part/footer.php');
?>