<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include ('../../config/koneksi.php');
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
            <li class="add">
                <a href="../../surat/mail.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Buat Surat</span>
                </a>
            </li>
            <li class="active">
                <a href="../dashboard/dashboard.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
                </a>
            </li>
            <li class="teacher">
                <a href="../guru/guru.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Data Guru</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../surat/permintaan_surat/">
                            <i class="fa fa-circle-notch"></i> Permintaan Surat
                        </a>
                    </li>
                    <li>
                        <a href="../surat/surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../laporan/">
                    <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <h1>&nbsp;</h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Data Guru</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" action="import-penduduk.php">
                    <div class="col-md-3">
                        <input name="datapenduduk" type="file" required="required">
                    </div>
                    <div>
                        <input name="upload" type="submit" class="btn btn-primary" value="Import .XLS">
                    </div>
                </form><br>
            </div>
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fas fa-user-plus"></i> Tambah Data Guru</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="../guru/simpan-guru.php">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">NIP</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fnip" maxlength="16"
                                                    onkeypress="return hanyaAngka(event)" class="form-control"
                                                    placeholder="NIP" required>
                                                <script>
                                                function hanyaAngka(evt) {
                                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                                                        return false;
                                                    return true;
                                                }
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fname" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tempat Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fplace" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Tempat Lahir"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="fdate_birth" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <select name="fgender" class="form-control" required>
                                                    <option value="">-- Jenis Kelamin --</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="faddress" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Alamat" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Agama</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="freligion" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Agama" required>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">Jalan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fjalan" class="form-control" style="text-transform: capitalize;" placeholder="Jalan" required>
                      </div>
                    </div> -->
                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">Dusun</label>
                      <div class="col-sm-8">
                        <select name="fdusun" class="form-control" style="text-transform: capitalize;" required>
                          <option value="">-- Dusun --</option>
                          <?php
                            // $qTampilDusun = "SELECT * FROM dusun";
                            // $tampilDusun = mysqli_query($connect, $qTampilDusun);
                            // while($rows = mysqli_fetch_assoc($tampilDusun)){
                          ?>
                          <option value="<?php echo $rows['nama_dusun']; ?>"><?php echo $rows['nama_dusun']; ?></option>
                          <?php 
                            // }
                          ?>
                        </select>
                      </div>
                    </div> -->
                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">RT</label>
                      <div class="col-sm-8">
                        <select name="frt" class="form-control" required>
                          <option value="">-- RT --</option>
                          <option value="001">001</option>
                          <option value="002">002</option>
                          <option value="003">003</option>
                          <option value="004">004</option>
                          <option value="005">005</option>
                          <option value="006">006</option>
                        </select>
                      </div>
                    </div> -->
                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">RW</label>
                      <div class="col-sm-8">
                        <select name="frw" class="form-control" required>
                          <option value="">-- RW --</option>
                          <option value="001">001</option>
                          <option value="002">002</option>
                          <option value="003">003</option>
                        </select>
                      </div>
                    </div> -->
                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">Desa</label>
                      <div class="col-sm-8">
                        <input type="text" name="fdesa" class="form-control" style="text-transform: capitalize;" placeholder="Desa" required>
                      </div>
                    </div> -->
                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">Kecamatan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fkecamatan" class="form-control" style="text-transform: capitalize;" placeholder="Kecamatan" required>
                      </div>
                    </div> -->
                                        <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">Kota</label>
                      <div class="col-sm-8">
                        <input type="text" name="fkota" class="form-control" style="text-transform: capitalize;" placeholder="Kota" required>
                      </div>
                    </div> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fposition" class="form-control"
                                                    placeholder="Jabatan" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
                                            <div class="col-sm-8">
                                                <select name="feducation" class="form-control" required>
                                                    <option value="">-- Pendidikan Terakhir --</option>
                                                    <option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                                    <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                                    <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                                    <option value="D1/SEDERAJAT">D1/SEDERAJAT</option>
                                                    <option value="D2/SEDERAJAT">D2/SEDERAJAT</option>
                                                    <option value="D3/SEDERAJAT">D3/SEDERAJAT</option>
                                                    <option value="D4/SEDERAJAT">D4/SEDERAJAT</option>
                                                    <option value="S1/SEDERAJAT">S1/SEDERAJAT</option>
                                                    <option value="S2/SEDERAJAT">S2/SEDERAJAT</option>
                                                    <option value="S3/SEDERAJAT">S3/SEDERAJAT</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="femail" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Mata Pelajaran</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fmapel" class="form-control"
                                                    style="text-transform: capitalize;"
                                                    placeholder="Mata Pelajaran yg Diampu" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status</label>
                                            <div class="col-sm-8">
                                                <select name="fstatus" class="form-control" required>
                                                    <option value="">-- Status --</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Non PNS">NON PNS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tanggal Bergabung</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="fjoin_date" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-sm-4 control-label">Kewarganegaraan</label>
                                            <div class="col-sm-8">
                                                <select name="fkewarganegaraan" class="form-control" required>
                                                    <option value="">-- Kewarganegaraan --</option>
                                                    <option value="WNI">WNI</option>
                                                    <option value="WNA">WNA</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label class="col-sm-4 control-label">Nama Ayah</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fnama_ayah" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Nama Ayah"
                                                    required>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Foto Terkini</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="fphoto" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Foto Terkini"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer pull-right">
                                        <input type="reset" class="btn btn-default" value="Batal">
                                        <input type="submit" name="submit" class="btn btn-info" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
  include ('../part/footer.php');
?>