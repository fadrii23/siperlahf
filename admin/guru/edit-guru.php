<?php 
  include ('../part/akses.php');
  include ('../../config/koneksi.php');
  include ('../part/header.php');
  $dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT * FROM tb_guru WHERE id_guru='$id'");
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
            <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Data Guru</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fas fa-edit"></i> Edit Data Guru</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="update_guru.php">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <input type="hidden" name="id" class="form-control"
                                            value="<?php echo $row['id_guru']; ?>">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">NIP</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fnip" maxlength="16"
                                                    onkeypress="return hanyaAngka(event)" class="form-control"
                                                    value="<?php echo $row['nip']; ?>" required>
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
                                                    style="text-transform: capitalize;" placeholder="Nama"
                                                    value="<?php echo $row['name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tempat Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fplace" class="form-control"
                                                    style="text-transform: capitalize;"
                                                    value="<?php echo $row['place']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="fdate_birth" class="form-control"
                                                    value="<?php echo $row['date_birth']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <select name="fgender" class="form-control"
                                                    value="<?php echo $row['gender']; ?>" required>
                                                    <option value="">--Jenis Kelamin--</option>
                                                    <option
                                                        <?php if($row['gender'] == 'Laki-laki'){ echo 'selected'; } ?>
                                                        value="Laki-laki">Laki-laki</option>
                                                    <option
                                                        <?php if($row['gender'] == 'Perempuan'){ echo 'selected'; } ?>
                                                        value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Agama</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="freligion" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Agama"
                                                    value="<?php echo $row['religion']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="faddress" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Jalan"
                                                    value="<?php echo $row['address']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fposition" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Jabatan"
                                                    value="<?php echo $row['position']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="femail" maxlength="16"
                                                    onkeypress="return hanyaAngka(event)" class="form-control"
                                                    placeholder="Email" value="<?php echo $row['email']; ?>" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
                                        <div class="col-sm-8">
                                            <select name="feducation" class="form-control"
                                                value="<?php echo $row['education']; ?>" required>
                                                <option value="">-- Pendidikan Terakhir --</option>
                                                <option
                                                    <?php if($row['education'] == 'SD/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'SLTP/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'SLTA/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'D1/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="D1/SEDERAJAT">D1/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'D2/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="D2/SEDERAJAT">D2/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'D3/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="D3/SEDERAJAT">D3/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'D4/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="D4/SEDERAJAT">D4/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'S1/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="S1/SEDERAJAT">S1/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'S2/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="S2/SEDERAJAT">S2/SEDERAJAT</option>
                                                <option
                                                    <?php if($row['education'] == 'S3/SEDERAJAT'){ echo 'selected'; } ?>
                                                    value="S3/SEDERAJAT">S3/SEDERAJAT</option>
                                                <option <?php if($row['education'] == '-'){ echo 'selected'; } ?>
                                                    value="-">-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fstatus" class="form-control"
                                                style="text-transform: capitalize;" placeholder="status"
                                                value="<?php echo $row['status']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal Bergabung</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fjoin_date" class="form-control"
                                                style="text-transform: capitalize;"
                                                value="<?php echo $row['join_date']; ?>" required>
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
  }

  include ('../part/footer.php');
?>