<?php
    include ('../part/akses.php');
    include ('../part/header.php');
    include ('../../config/koneksi.php');
   
$dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();
?>

<aside class="main-sidebar">
    <?php
    include ('../part/sidebar.php')
    ?>
</aside>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php 
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php
               
                $qTampil = mysqli_query($connect, "SELECT * FROM tb_guru");
                $jumlahGuru = mysqli_num_rows($qTampil);
                echo $jumlahGuru;
              ?>
                        </h3>
                        <p>Data Guru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users" style="font-size:70px"></i>
                    </div>
                    <a href="../guru/guru.php" class="small-box-footer">Lihat detail <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            <?php
               
                $qTampil = mysqli_query($connect, "SELECT * FROM tb_pejabat");
                $jumlahGuru = mysqli_num_rows($qTampil);
                echo $jumlahGuru;
              ?>
                        </h3>
                        <p>Data Pejabat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users" style="font-size:70px"></i>
                    </div>
                    <a href="../pejabat/pejabat.php" class="small-box-footer">Lihat detail <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php

                $qTampil = mysqli_query($connect, "SELECT * FROM tb_surat WHERE status_surat='pending'");
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                echo $jumlahPermintaanSurat;
              ?>
                        </h3>
                        <p>Permintaan Surat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope-open-text" style="font-size:70px"></i>
                    </div>
                    <a href="../surat/permintaan.php" class="small-box-footer">Lihat detail <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php

                $qTampil = mysqli_query($connect, "SELECT no_surat FROM tb_surat WHERE status_surat='done'");
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                echo $jumlahPermintaanSurat;
              ?>
                        </h3>
                        <p>Surat Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope" style="font-size:70px"></i>
                    </div>
                    <a href="../surat/selesai.php" class="small-box-footer">Lihat detail <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <?php 
        } else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'user')){
        }
      ?>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Welcome Home!</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="simpan-penduduk.php">
                                <div class="col-md-12">
                                    <div class="col-md-4" style="text-align: center;">
                                        <img style="max-width:300px; width:100%; height:auto;"
                                            src="../../assets/img/logo_sekolah.png"><br>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="pull-right">
                                            <?php
                        $tanggal = date('D d F Y');
                        $hari = date('D', strtotime($tanggal));
                        $bulan = date('F', strtotime($tanggal));
                        $hariIndo = array(
                          'Mon' => 'Senin',
                          'Tue' => 'Selasa',
                          'Wed' => 'Rabu',
                          'Thu' => 'Kamis',
                          'Fri' => 'Jumat',
                          'Sat' => 'Sabtu',
                          'Sun' => 'Minggu',
                        );
                        $bulanIndo = array(
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
                        echo $hariIndo[$hari] . ', ' . date('d ') . $bulanIndo[$bulan] . date(' Y');
                      ?>
                                        </div><br>
                                        <div style="font-size: 35pt; font-weight: 500;">
                                            <p>Halo, <strong><?php echo $_SESSION['lvl']; ?></strong>
                                        </div>
                                        <div style="font-size: 15pt; font-weight: 500;">
                                            <p>Selamat datang di <a href="#" style="text-decoration:none"><strong>Web
                                                        Sistem Persuratan Sekolah.</strong></a>
                                            </p>
                                        </div><br><br><br>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
  include ('../part/footer.php');
?>