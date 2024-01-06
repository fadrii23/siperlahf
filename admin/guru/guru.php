<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include('../../config/koneksi.php');

// Membuat objek DatabaseConnection
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
        <h1>Data Guru</h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Data Guru</li>
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
                <a class="btn btn-success btn-md" href='../guru/tambah-guru.php'><i class="fa fa-user-plus"></i> Tambah
                    Data
                    Guru</a>
                <a target="_blank" class="btn btn-info btn-md" href='export-guru.php'><i class="fas fa-file-export"></i>
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
                                            <th><strong>Tempat / Tgl Lahir</strong></th>
                                            <th><strong>Jenis Kelamin</strong></th>
                                            <th><strong>Agama</strong></th>
                                            <th><strong>Alamat</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Mapel</strong></th>
                                            <th><strong>Pendidikan</strong></th>
                                            <th><strong>Status</strong></th>
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

              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM tb_guru");
              
              foreach($qTampil as $row){
                $tanggal = $row['date_birth'];
            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nip']; ?></td>
                                            <td style=" text-transform: capitalize;"><?php echo $row['name']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['position']; ?></td>
                                            <?php
                $tanggal = date('d', strtotime($row['date_birth']));
                $bulan = date('F', strtotime($row['date_birth']));
                $tahun = date('Y', strtotime($row['date_birth']));
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
                                                <?php echo $row['place'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?>
                                            </td>
                                            <td style="text-transform: capitalize;"><?php echo $row['gender']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['religion']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['address']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['email']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['mapel']; ?></td>
                                            <td style="text-transform: capitalize;"><?php echo $row['education']; ?>
                                            </td>
                                            <td style="text-transform: capitalize;"><?php echo $row['status']; ?></td>
                                            <td><a href="<?=$row['photo'];?>" target="_blank">unduh</a></td>

                                            <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
                                            <td>
                                                <a class="btn btn-success btn-sm"
                                                    href='edit-guru.php?id=<?php echo $row['id_guru']; ?>'><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"
                                                    href='hapus-guru.php?id=<?php echo $row['id_guru']; ?>'
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