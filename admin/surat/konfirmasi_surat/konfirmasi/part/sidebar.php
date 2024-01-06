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
            <li class="add">
                <a href="../../../mail.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Buat Surat</span>
                </a>
            </li>
            <li class="active">
                <a href="../../../../dashboard/dashboard.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
                </a>
            </li>
            <li class="teacher">
                <a href="../../../../guru/guru.php">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Data Guru</span>
                </a>
            </li>


            <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../../../permintaan.php"><i class="fa fa-circle-notch"></i> Permintaan
                            Surat</a>
                    </li>
                    <li>
                        <a href="../../../surat_selesai/index.php"><i class="fa fa-circle-notch"></i> Surat Selesai</a>
                    </li>
                </ul>
            </li>
            <?php 
        }else{
          
        }
      ?>
            <li>
                <a href="../../../../laporan/laporan.php"><i class="fas fa-chart-line"></i>
                    <span>&nbsp;&nbsp;Laporan</span></a>
            </li>
        </ul>
    </section>
</body>

</html>