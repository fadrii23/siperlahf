<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
?>

<aside class="main-sidebar">
    <?php
    include ('../part/sidebar.php')
    ?>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Pejabat</h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Data Pejabat</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal-menambah"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menambah data. NIK tersebut sudah digunakan.</center></div>";
              }
              if($_GET['pesan']=="gagal-menghapus"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menghapus data tersebut.</center></div>";
              }
            }
          ?>
                </div>
                <?php 
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
        ?>
                <a class="btn btn-success btn-md" href='../pejabat/tambah-pejabat.php'><i class="fa fa-user-plus"></i>
                    Tambah
                    Data
                    Pejabat</a>
                <a target="_blank" class="btn btn-info btn-md" href='../pejabat/export-pejabat.php'><i
                        class="fas fa-file-export"></i>
                    Export .XLS</a>
                <?php 
          } else {

          }
        ?>
                <div class="content" style="margin-top: 15px;">
                    <div class="body">
                        <div class="card">
                            <div class="row table-responsive">
                                <table class="table table-bordered" id="data-table" cellspacing="0" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th><strong>No</strong></th>
                                            <th><strong>NIP</strong></th>
                                            <th><strong>Nama</strong></th>
                                            <th><strong>Jabatan</strong></th>
                                            <th><strong>Awal Menjabat</strong></th>
                                            <th><strong>Foto</strong></th>
                                            <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
                                            <th><strong>Aksi</strong></th>
                                            <?php  
                } else {
  
                }
              ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
              include ('../../config/koneksi.php');
  
              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM tb_pejabat");
              
              foreach($qTampil as $row){
                $tanggal = $row['awal_menjabat'];
            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nip']; ?></td>
                                            <td style=" text-transform: capitalize;"><?php echo $row['nama']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['jabatan']; ?></td>
                                            <?php
                $tanggal = date('d', strtotime($row['awal_menjabat']));
                $bulan = date('F', strtotime($row['awal_menjabat']));
                $tahun = date('Y', strtotime($row['awal_menjabat']));
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
              ?>
                                            <td style="text-transform: capitalize;">
                                                <?php echo  "" . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?>
                                            <td><a href="<?=$row['foto'];?>" target="_blank">unduh</a></td>

                                            <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
                                            <td>
                                                <a class="btn btn-success btn-sm"
                                                    href='edit-pejabat.php?id=<?php echo $row['id_pejabat']; ?>'><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"
                                                    href='hapus-pejabat.php?id=<?php echo $row['id_pejabat'];?>'
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                            <?php  
                } else {
                  
                }
              ?>
                                        </tr>
                                        <?php
              }
            ?>
                                    </tbody>
                                </table>
                            </div>
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