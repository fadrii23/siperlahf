<?php
  include ('../../admin/part/akses.php');
  include ('../../admin/part/header.php');
  include('../../config/koneksi.php');
  $dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();
?>

<aside class="main-sidebar">
    <?php
    include ('../../admin/part/sidebar.php')
    ?>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Surat Selesai</h1>
        <ol class="breadcrumb">
            <li><a href="../user/user.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
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
                            <th><strong>No. Surat</strong></th>
                            <th><strong>NIP</strong></th>
                            <th><strong>Nama</strong></th>
                            <th><strong>Jenis Surat</strong></th>
                            <th><strong>Keperluan Surat</strong></th>
                            <th><strong>Tanggal Surat</strong></th>
                            <th><strong>Status</strong></th>
                            <th><strong>Bukti</strong></th>
                            <th><strong>Aksi</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

              $no = 1;
                 $qTampil = mysqli_query($connect, "SELECT * FROM tb_surat");
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

                            <td><?php echo $row['no_surat']; ?></td>
                            <td><?php echo $row['nip']; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis_surat']; ?></td>
                            <td><?php echo $row['keperluan_surat']; ?></td>
                            <td><?php echo $tgl . $blnIndo[$bln] . $thn; ?></td>
                            <td><a class="btn btn-success btn-sm" href='#'><i class="fa fa-check"></i><b>
                                        <?php echo $row['status_surat']; ?></b></a></td>
                            <td><a href="<?=$row['bukti'];?>" download target="bukti">unduh</a></td>
                            <td>
                                <?php  
                  if($row['jenis_surat']=="Surat Dinas"){
                ?>
                                <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../../admin/surat/cetak/surat_dinas/sudin.php?id=<?php echo $row['id_surat']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a>
                                <a class="btn btn-danger btn-sm"
                                    href='hapus_surat.php?id=<?php echo $row['id_surat']; ?>'
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="fa fa-trash"></i></a>
                                <?php
              } else if($row['jenis_surat']=="Surat Undangan"){
                ?>
                                <a name="cetak" target="output" class="btn btn-primary btn-sm"
                                    href='../../admin/surat/cetak/surat_undangan/surat_undangan.php?id=<?php echo $row['id_surat']; ?>'><i
                                        class="fa fa-print"></i><b> CETAK</b></a>
                                <a class="btn btn-danger btn-sm"
                                    href='hapus_surat.php?id=<?php echo $row['id_surat']; ?>'
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="fa fa-trash"></i></a>
                                <?php
            }
        }

            ?>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php 
  include ('../part/footer.php');
?>