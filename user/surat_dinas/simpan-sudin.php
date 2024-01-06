<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Dinas";
        $nip = $_POST['fnip'];
        $name = $_POST['fname'];
        $position = $_POST['fposition'];
        $status_sudin = "PENDING";
        $keperluan_sudin = addslashes($_POST['fkeperluan_sudin']);
        

        $qTambahSudin = "INSERT INTO tb_sudin (jenis_surat, nip, position, status_sudin, keperluan_sudin) VALUES('$jenis_surat', '$nip','$position',   '$status_sudin', '$keperluan_sudin')";
        $qTambahSurat = "INSERT INTO tb_surat (jenis_surat, nama,nip,position,  keperluan_surat,status_surat) VALUES('$jenis_surat', '$name','$nip', '$position', '$keperluan_sudin','$status_sudin')";
        $TambahSurat = mysqli_query($connect, $qTambahSudin);
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header('Location:../../admin/dashboard/dashboard.php');
        // echo ("Surat Sudah Ditambahkan");
    }
?>