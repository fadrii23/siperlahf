<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Undangan";
        $nip = $_POST['fnip'];
        $nama = $_POST['fnama'];
        $kegiatan = $_POST['fkegiatan'];
        $tempat_acara = $_POST['ftempat_acara'];
        $tanggal_acara = $_POST['ftanggal_acara'];
        $keperluan_surat = $_POST['fkeperluan_surat'];
        $status_surat_undangan = "PENDING";
        

        $qTambahSuratUndangan = "INSERT INTO surat_undangan (jenis_surat, nip, nama, kegiatan, tempat_acara, tanggal_acara, keperluan_surat,  status_surat_undangan) VALUES('$jenis_surat', '$nip','$nama',   '$kegiatan', '$tempat_acara', '$tanggal_acara', '$keperluan_surat', '$status_surat_undangan')";
        $qTambahSurat = "INSERT INTO tb_surat (jenis_surat, nama,nip, keperluan_surat,status_surat) VALUES('$jenis_surat', '$nama','$nip', '$keperluan_surat','$status_surat_undangan')";
        $TambahSurat = mysqli_query($connect, $qTambahSuratUndangan);
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header('Location:../user/user.php');
        // echo ("Surat Sudah Ditambahkan");
    }else{
        echo("gagal ditambahkan");
        }
?>