<?php
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
        <h1>Buat Surat Dinas</h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active">Buat Surat</li>
        </ol>
    </section>
    <div class="container" style="max-height:cover; padding-top:60px; position:relative; min-height: 100%;"
        align="center">
        <div class="card col-md-4" style="position: absolute; top:50%; left:30%;">
            <div class="card-content">
                <div class="card-body">
                    <form action="info-sudin.php" method="post">
                        <?php 
        	          if(isset($_GET['pesan'])){
            		      if($_GET['pesan']=="gagal"){
                 		    echo "<div class='alert alert-danger'><center>NIK Anda tidak terdaftar. Silahkan hubungi Kantor Desa!</center></div>";
                    	}
                  	}
                	?>
                        <img src="../../assets/img/logo_sekolah.png" style="width:150px;">
                        <hr>
                        <label style="font-weight: 700;"><i class="fas fa-id-card"></i> NIP <i>(Nomor Induk
                                Pegawai)</i></label>
                        <input type="text" class="form-control form-control-md" maxlength="16"
                            onkeypress="return hanyaAngka(event)" name="fnip" placeholder="Masukkan NIP" required>
                        <script>
                        function hanyaAngka(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                                return false;
                            return true;
                        }
                        </script>
                        <div class="form-control-position">
                            <i class="ft-search primary font-medium-4"></i>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info btn-md"><i class="fas fa-search"></i> CEK NIK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

<?php 
  include ('../../admin/part/footer.php');
?>