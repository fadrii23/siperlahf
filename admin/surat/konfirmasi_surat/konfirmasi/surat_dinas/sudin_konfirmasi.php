<?php 
  include ('../../../../part/akses.php');
  include ('../../../../../config/koneksi.php');
  include ('../part/header.php');
  $dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT tb_pejabat.*, tb_surat.*, tb_ FROM tb_pejabat LEFT JOIN tb_surat ON tb_surat.nip = tb_pejabat.nip WHERE tb_surat.id_surat='$id'");
  while($row = mysqli_fetch_array($qCek)){
?>

<aside class="main-sidebar">
    <?php
    include ('../part/sidebar.php')
    ?>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <h1>&nbsp;</h1>
        <ol class="breadcrumb">
            <li><a href="../../../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Permintaan Surat</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h2 class="box-title"><i class="fas fa-envelope"></i> Konfirmasi Surat Keterangan</h2>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="konfirmasi_sudin.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tanda Tangan</label>
                                            <div class="col-sm-9">
                                                <select name="ft_tangan" class="form-control"
                                                    style="text-transform: uppercase;" required>
                                                    <option value="-- Pilih Tanda Tangan --">-- Pilih Tanda Tangan --
                                                    </option>
                                                    <?php
                            $selectedPosition  = $row['position'];
                            $qTampilPosition   = "SELECT * FROM tb_pejabat";
                            $tampilPosition  = mysqli_query($connect, $qTampilPosition);
                            while($rows = mysqli_fetch_assoc($tampilPosition) ){
                              if($rows['position'] == $selectedPosition){
                          ?>
                                                    <option value="<?php echo $rows['id_pejabat']; ?>"
                                                        selected="selected">
                                                        <?php echo $rows['position']; ?></option>
                                                    <?php
                              }else{
                          ?>
                                                    <option value="<?php echo $rows['id_pejabat']; ?>">
                                                        <?php echo $rows['position'], " (", $rows['nama'], ")"; ?>
                                                    </option>

                                                    <?php 
                              } 
                            }
                          ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">No. Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fno_surat"
                                                    value="<?php echo $row['no_surat']; ?>" class="form-control"
                                                    placeholder="Masukkan No. Surat" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i>
                                <b>Informasi Penduduk</b>
                            </h5>
                            <br>
                            <hr style="border-bottom: 1px solid #DCDCDC;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fnama" style="text-transform: uppercase;"
                                                    value="<?php echo $row['nama']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <?php
                    //   $tgl_lhr = date($row['tgl_lahir']);
                    //   $tgl = date('d ', strtotime($tgl_lhr));
                    //   $bln = date('F', strtotime($tgl_lhr));
                    //   $thn = date(' Y', strtotime($tgl_lhr));
                    //   $blnIndo = array(
                    //       'January' => 'Januari',
                    //       'February' => 'Februari',
                    //       'March' => 'Maret',
                    //       'April' => 'April',
                    //       'May' => 'Mei',
                    //       'June' => 'Juni',
                    //       'July' => 'Juli',
                    //       'August' => 'Agustus',
                    //       'September' => 'September',
                    //       'October' => 'Oktober',
                    //       'November' => 'November',
                    //       'December' => 'Desember'
                    //   );
                    ?>
                                        <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Tempat, Tgl Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="ft_lahir" style="text-transform: capitalize;"
                                                    value="<?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?>"
                                                    class="form-control" readonly>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">NIP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fnip" style="text-transform: capitalize;"
                                                    value="<?php echo $row['nip']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Jabatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fposition" style="text-transform: capitalize;"
                                                    value="<?php echo $row['position']; ?>" class="form-control"
                                                    readonly>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Keperluan Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fkeperluan_surat"
                                                    style="text-transform: capitalize;"
                                                    value="<?php echo $row['keperluan_surat']; ?>" class="form-control"
                                                    readonly>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea rows="3" name="falamat" class="form-control"
                                                    style="text-transform: capitalize;"
                                                    readonly><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></textarea>
                                            </div>
                                        </div> -->
                                        <div>
                                            <input type="hidden" name="id" value="<?php echo $row['id_surat']; ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6"> -->
                                <!-- <div class="box-body"> -->
                                <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fj_kelamin"
                                                    value="<?php echo $row['jenis_kelamin']; ?>" class="form-control"
                                                    readonly>
                                            </div>
                                        </div> -->
                                <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Agama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fagama" style="text-transform: capitalize;"
                                                    value="<?php echo $row['agama']; ?>" class="form-control" readonly>
                                            </div>
                                        </div> -->
                                <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fnik" value="<?php echo $row['nik']; ?>"
                                                    class="form-control" readonly>
                                            </div>
                                        </div> -->
                                <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Kewarganegaraan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fkewarganegaraan"
                                                    style="text-transform: uppercase;"
                                                    value="<?php echo $row['kewarganegaraan']; ?>" class="form-control"
                                                    readonly>
                                            </div>
                                        </div> -->
                                <!-- </div> -->
                                <!-- </div> -->
                            </div>
                            <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i>
                                <b>Informasi Surat</b>
                            </h5>
                            <br>
                            <hr style="border-bottom: 1px solid #DCDCDC;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Keperluan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fkeperluan_surat"
                                                    style="text-transform: capitalize;"
                                                    value="<?php echo $row['keperluan_surat']; ?>" class="form-control"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Jenis Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fjenis
                                                -surat" style="text-transform: capitalize;"
                                                    value="<?php echo $row['jenis_surat']; ?>" class="form-control"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body pull-left">
                                <input type="submit" name="submit" class="btn btn-success" value="Konfirmasi">
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
  }

  include ('../../../../part/footer.php');
?>