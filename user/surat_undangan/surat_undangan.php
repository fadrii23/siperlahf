<?php
	include ('../../config/koneksi.php');
	include ('../../admin/part/akses.php');
	include ('../../admin/part/header.php');
		 
?>
<aside class="main-sidebar">
    <?php
    include ('../../admin/part/sidebar.php')
    ?>
</aside>

<div class="content-wrapper">
    <section class="content-header" style="padding-bottom:20px" ;>
        <h1>Buat Surat</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tachometer-alt"></i>Buat Surat</a></li>
        </ol>
    </section>
    <div class="container"
        style="max-height:cover; padding-top:30px;  padding-bottom:60px; position:relative; min-height: 100%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT</h5>
                    <div class="container-fluid">
                        <div class="row">
                            <a class="col-sm-6">
                                <h5><b>Jenis Surat : SURAT UNDANGAN</b></h5>
                                <br>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="simpan_surat_undangan.php">
                <h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI PENGAJUAN</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">NIP</label>
                            <div class="col-sm-12">
                                <input type="text" name="fnip" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Nama Pengaju</label>
                            <div class="col-sm-12">
                                <input type="text" name="fnama" class="form-control" style="text-transform: capitalize;"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Keperluan Surat</label>
                            <div class="col-sm-12">
                                <input type="text" name="fkeperluan_surat" class="form-control"
                                    style="text-transform: capitalize;" required>
                            </div>
                        </div>


                    </div>

                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Tempat Lahir</label>
                            <div class="col-sm-12">
                                <input type="text" name="fplace" class="form-control"
                                    style="text-transform: capitalize;" value="<?php echo $data['place']; ?>" readonly>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Agama</label>
                            <div class="col-sm-12">
                                <input type="text" name="freligion" class="form-control"
                                    style="text-transform: capitalize;" value="<?php echo $data['religion']; ?>"
                                    readonly>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="row"> -->
                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Jabatan</label>
                            <div class="col-sm-12">
                                <input type="text" name="fposition" class="form-control"
                                    style="text-transform: capitalize;" value="<?php echo $data['position']; ?>"
                                    readonly>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Alamat</label>
                            <div class="col-sm-12">
                                <textarea type="text" name="faddress" class="form-control"
                                    style="text-transform: capitalize;"
                                    readonly><?php echo $data['address'] ?></textarea>
                            </div>
                        </div>
                    </div> -->
                </div>
                <br>
                <h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT UNDANGAN</h5>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="fkegiatan" class="form-control" required>
                    </div>
                    <br>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Tempat Acara</label>
                    <div class="col-sm-8">
                        <input type="text" name="ftempat_acara" class="form-control" required>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tanggal Acara</label>
                    <div class="col-sm-8">
                        <input type="date" name="ftanggal_acara" class="form-control" required>
                    </div>
                </div>
                <hr width="97%">
                <div class="container-fluid">
                    <input type="reset" class="btn btn-warning" value="Batal">
                    <input type="submit" name="submit" class="btn btn-info" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
    //     }
    // }  
  include ('../../admin/part/footer.php');

?>