<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $nip = $_POST['fnip'];
        $nama = $_POST['fnama'];
        $jabatan = $_POST['fjabatan'];
        $awal_menjabat = $_POST['fawal_menjabat'];
        $foto = $_POST['ffoto'];

        $randomFilename = time().'-'.md5(rand()).'-'.$foto;
        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$randomFilename;

        if($uploadPath) {
            mysqli_query($connect,"INSERT INTO tb_pejabat (nip,nama,jabatan,awal_menjabat,foto)
                        VALUES ('$nip','$nama','$jabatan','$awal_menjabat','/upload/$randomFilename')");
            header("Location:pejabat.php");
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }

    }
?>