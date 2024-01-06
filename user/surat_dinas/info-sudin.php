<?php
	include ('../../config/koneksi.php');
	include ('../../admin/part/akses.php');
	include ('../../admin/part/header.php');
		 
	$nip = $_POST['fnip'];
	 
	$qCekNip = mysqli_query($connect,"SELECT * FROM tb_guru WHERE nip = '$nip'");
	$row = mysqli_num_rows($qCekNip);
	 
	if($row > 0){
		$data = mysqli_fetch_assoc($qCekNip);
		if($data['nip']==$nip){
			$_SESSION['nip'] = $nip;
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
                                <h5><b>Jenis Surat : SURAT DINAS</b></h5>
                                <br>
                                <h5><b>Nomor Surat : - </b></h5>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="simpan-sudin.php">
                <h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI PRIBADI</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">NIP</label>
                            <div class="col-sm-12">
                                <input type="text" name="fnip" class="form-control" value="<?php echo $data['nip']; ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
                            <div class="col-sm-12">
                                <input type="text" name="fname" class="form-control" style="text-transform: capitalize;"
                                    value="<?php echo $data['name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Jabatan</label>
                            <div class="col-sm-12">
                                <input type="text" name="fposition" class="form-control"
                                    style="text-transform: capitalize;" value="<?php echo $data['position']; ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Email</label>
                            <div class="col-sm-12">
                                <input type="text" name="femail" class="form-control"
                                    style="text-transform: capitalize;" value="<?php echo $data['email']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
                            <div class="col-sm-12">
                                <input type="text" name="fplace" class="form-control"
                                    style="text-transform: capitalize;" value="<?php echo $data['date_birth']; ?>" readonly<?php
										// 	$tgl_lhr = date($data['date_birth']);
										// 	$tgl = date('d ', strtotime($date_birth));
										// 	$bln = date('m', strtotime($date_birth));
										// 	$thn = date(' Y', strtotime($date_birth));
										// 	$blnIndo = array(
										// 	    'January' => 'Januari',
										// 	    'February' => 'Februari',
										// 	    'March' => 'Maret',
										// 	    'April' => 'April',
										// 	    'May' => 'Mei',
										// 	    'June' => 'Juni',
										// 	    'July' => 'Juli',
										// 	    'August' => 'Agustus',
										// 	    'September' => 'September',
										// 	    'October' => 'Oktober',
										// 	    'November' => 'November',
										// 	    'December' => 'Desember'
										// 	);
										// ?> </div>
                            </div>
                        </div>
                    </div> -->
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
                <h5 class="card-header"><i class="fas fa-envelope"></i> KEPERLUAN SURAT</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="fkeperluan_sudin" class="form-control"
                                    style="text-transform: capitalize;" placeholder="Masukkan Keperluan Surat" required>
                            </div>
                        </div>
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
        }
    }  
  include ('../../admin/part/footer.php');

?>