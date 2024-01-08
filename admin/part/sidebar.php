<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'user')){
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
            <!-- <li class="add">
                <a href="../surat/mail.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Buat Surat</span>
                </a>
            </li> -->



            <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
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
            <li class="teacher">
                <a href="../pejabat/pejabat.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Data Pejabat</span>
                </a>
            </li>
            <li class="take">
                <a href="../surat/permintaan.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Permintaan Surat</span>
                </a>
            </li>

            <li>
                <a href="../surat/selesai.php"><i class="fa fa-circle-notch"></i> Surat Selesai</a>
            </li>
            <li>
                <a href="../laporan/laporan.php"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span></a>
            </li>
        </ul>

        <?php 

        }
      ?>

        <?php 
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'user')) {
      ?>

        <li class="add">
            <a href="../mail/mail.php">
                <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Buat Surat</span>
            </a>
        </li>
        <li class="upload">
            <a href="../../user/upload_surat/upload.php">
                <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Upload Surat</span>
            </a>
        </li>
        <li class="riwayat">
            <a href="../../user/riwayat_surat/riwayat.php">
                <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Riwayat Surat</span>
            </a>
        </li>
        <li class="add">
            <a href="../../user/data_diri/data_diri.php">
                <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Data Diri</span>
            </a>
        </li>
        <?php 

        }
      ?>
    </section>
</body>

</html>