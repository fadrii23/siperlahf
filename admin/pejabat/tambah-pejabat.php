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
        <h1>&nbsp;</h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Data Pejabat</li>
            <li class="active">Tambah Data Pejabat</li>
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
                        <h3 class="box-title"><i class="fas fa-user-plus"></i> Tambah Data Pejabat</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="../pejabat/simpan-pejabat.php">
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
                                                <input type="text" name="fnama" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fjabatan" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Jabatan" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Awal Menjabat</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="fawal_menjabat" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Foto</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="ffoto" clafotoss="form-control"
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