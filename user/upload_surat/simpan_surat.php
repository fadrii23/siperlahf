<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $nip = $_POST['fnip'];
        $nama = $_POST['fnama'];
        $jenis_surat = $_POST['fjenis_surat'];
        $keperluan_surat = $_POST['fkeperluan_surat'];
        $no_surat= $_POST['fno_surat'];
        $status_surat = $_POST['fstatus_surat'];
        $bukti = $_POST['fbukti'];

        $randomFilename = time().'-'.md5(rand()).'-'.$bukti;
        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$randomFilename;

        if($uploadPath) {
            mysqli_query($connect,"INSERT INTO tb_surat (nip,nama,jenis_surat,keperluan_surat,no_surat,status_surat,bukti)
                        VALUES ('$nip','$nama','$jenis_surat','$keperluan_surat','$no_surat','$status_surat','/upload/$randomFilename')");
            header("Location:../riwayat_surat/riwayat.php");
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }
    }
?>