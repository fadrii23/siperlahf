<?php 
  include ('../../admin/part/akses.php');
  include ('../../admin/part/header.php');
  include ('../../config/koneksi.php');
?>

<aside class="main-sidebar">
    <?php
    include ('../../admin/part/sidebar.php')
    ?>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <h1>&nbsp;</h1>
        <ol class="breadcrumb">
            <li><a href="../user/user.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Data Guru</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fas fa-user-plus"></i> Upload Surat Anda</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="../upload_surat/simpan_surat.php">
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
                                            <label class="col-sm-4 control-label">Nomor Surat</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fno_surat" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Nomor Surat"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jenis Surat</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fjenis_surat" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Jenis Surat"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Keperluan Surat</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fkeperluan_surat" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status Surat</label>
                                            <div class="col-sm-8">
                                                <input type="radio" name="fstatus_surat"
                                                    style="text-transform: capitalize;" value="PENDING" required>PENDING
                                                <input type="radio" name="fstatus_surat"
                                                    style="text-transform: capitalize;" value="DONE" required>DONE
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">File</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="fbukti" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Bukti"
                                                    accept=".pdf" required>
                                            </div>
                                        </div>
                                        <div class="box-footer pull-right">
                                            <input type="reset" class="btn btn-default" value="Batal">
                                            <input type="submit" name="submit" class="btn btn-info" value="Submit">
                                        </div>
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