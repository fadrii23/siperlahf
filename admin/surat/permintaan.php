<?php
  include ('../../config/koneksi.php');
  include ('../part/akses.php');
  include ('../part/header.php');
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
        <h1>Permintaan Surat</h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/dashboard.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Permintaan Surat</li>
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
                            <th><strong>Tanggal</strong></th>
                            <th><strong>NIP</strong></th>
                            <th><strong>Nama</strong></th>
                            <th><strong>Jenis Surat</strong></th>
                            <th><strong>Keperluan</strong></th>
                            <th><strong>Status</strong></th>
                            <th><strong>Aksi</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $no = 1;
                $no=1;
                $qTampil= mysqli_query($connect, "SELECT tb_guru.name, tb_surat.id_surat, tb_surat.no_surat, tb_surat.nip, tb_surat.position, tb_surat.jenis_surat, tb_surat.keperluan_surat, tb_surat.status_surat, tb_surat.created_date_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip WHERE tb_surat.status_surat='PENDING'" );
                if ($qTampil->num_rows > 0){
                    foreach ($qTampil as $row){
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
                            <td><?php echo $tgl . $blnIndo[$bln] . $thn; ?></td>
                            <td><?php echo $row['nip']; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $row['name']; ?></td>
                            <td><?php echo $row['jenis_surat']; ?></td>
                            <td><?php echo $row['keperluan_surat']; ?></td>
                            <td><a class="btn btn-danger btn-sm" href='#'><i class="fa fa-spinner"></i><b>
                                        <?php echo $row['status_surat']; ?></b></a></td>
                            <td>
                                <?php  
                          if($row['jenis_surat']=="Surat Dinas"){
                        ?>
                                <a class="btn btn-success btn-sm"
                                    href='../surat/konfirmasi_surat/konfirmasi/surat_dinas/sudin_konfirmasi.php?id=<?php echo $row['id_surat']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a>
                                <?php
                          } else if($row['jenis_surat']=="Surat Undangan"){
                        ?>
                                <a class="btn btn-success btn-sm"
                                    href='../surat/konfirmasi_surat/konfirmasi/surat_undangan/view_konfirmasi_suratundangan.php?id=<?php echo $row['id_surat']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a>
                                <?php
                        //   } else if($row['jenis_surat']=="Surat Keterangan Domisili"){
                        ?>
                                <!-- <a class="btn btn-success btn-sm"
                                    href='konfirmasi/surat_keterangan_domisili/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a> -->
                                <?php
                        //   } else if($row['jenis_surat']=="Surat Keterangan Kepemilikan Kendaraan Bermotor"){
                        ?>
                                <!-- <a class="btn btn-success btn-sm"
                                    href='konfirmasi/surat_keterangan_kepemilikan_kendaraan_bermotor/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a> -->
                                <?php
                        //   } else if($row['jenis_surat']=="Surat Keterangan Perhiasan"){
                        ?>
                                <!-- <a class="btn btn-success btn-sm"
                                    href='konfirmasi/surat_keterangan_perhiasan/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a> -->
                                <?php
                        //   } else if($row['jenis_surat']=="Surat Keterangan Usaha"){
                        ?>
                                <!-- <a class="btn btn-success btn-sm"
                                    href='konfirmasi/surat_keterangan_usaha/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a> -->
                                <?php
                        //   } else if($row['jenis_surat']=="Surat Lapor Hajatan"){
                        ?>
                                <!-- <a class="btn btn-success btn-sm"
                                    href='konfirmasi/surat_lapor_hajatan/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a> -->
                                <?php
                        //   } else if($row['jenis_surat']=="Surat Pengantar SKCK"){
                            
                        ?>
                                <!-- <a class="btn btn-success btn-sm"
                                    href='konfirmasi/surat_pengantar_skck/index.php?id=<?php echo $row['id_sk']; ?>'><i
                                        class="fa fa-check"></i><b> KONFIRMASI</b></a> -->
                                <?php
                          }
                        ?>
                            </td>
                        </tr>

                        <?php 
                 }
                }else{
                  echo "<tr><td colspan='8' align='center'>Tidak Ada Permintaan Surat.</td></tr>";
                }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php 
  include ('../../part/footer.php');
?>