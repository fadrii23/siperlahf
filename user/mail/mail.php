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
    <section class="content-header" style="padding-bottom:20px," ;>
        <h1>Buat Surat</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tachometer-alt"></i>Buat Surat</a></li>
        </ol>
    </section>
    <div class="col-sm-3 mt-4">
        <div class="card">
            <img src="../../assets/img/menu-surat.jpg" class="card-img-top" alt="..." style="width:250px; ">
            <div class="card-body text-center">
                <h5 class="card-title">SURAT DINAS</h5><br><br>
                <a href="../surat_dinas/surat_dinas.php" class="btn btn-info">BUAT SURAT</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mt-4">
        <div class="card">
            <img src="../../assets/img/menu-surat.jpg" class="card-img-top" alt="..." style="width:250px; ">
            <div class=" card-body text-center">
                <h5 class="card-title">SURAT UNDANGAN</h5><br><br>
                <a href="../surat_undangan/surat_undangan.php" class="btn btn-info">BUAT SURAT</a>
            </div>
        </div>
    </div>

</div>

<?php 
  include ('../../admin/part/footer.php');
?>