<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $nim = $_POST['fnip'];
        $name = $_POST['fnama'];
        $place = $_POST['fplace'];
        $date_birth = $_POST['fdate_birth'];
        $gender = $_POST['fgender'];
        $agama = $_POST['fagama'];
        $jalan = addslashes($_POST['fjalan']);
        $dusun = $_POST['fdusun'];
        $rt = $_POST['frt'];
        $rw = $_POST['frw'];
        $desa = $_POST['fdesa'];
        $kecamatan = $_POST['fkecamatan'];
        $kota = "Kabupaten " . $_POST['fkota'];
        $no_kk = $_POST['fno_kk'];
        $pend_kk = $_POST['fpend_kk'];
        $pend_terakhir = $_POST['fpend_terakhir'];
        $pend_ditempuh = $_POST['fpend_ditempuh'];
        $pekerjaan = $_POST['fpekerjaan'];
        $status_perkawinan = $_POST['fstatus_perkawinan'];
        $status_dlm_keluarga = $_POST['fstatus_dlm_keluarga'];
        $kewarganegaraan = $_POST['fkewarganegaraan'];
        $nama_ayah = $_POST['fnama_ayah'];
        $nama_ibu = $_POST['fnama_ibu'];

        $qCekGuru = mysqli_query($connect, "SELECT * FROM tb_guru WHERE nip='$nip'");
        $row          = mysqli_num_rows($qCekGuru);

        if($row > 0){
            header('location:index.php?pesan=gagal-menambah');
        }else{
            $qTambahGuru = "INSERT INTO tb_guru VALUES(NULL, '$nik', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$jalan', '$dusun', '$rt', '$rw', '$desa', '$kecamatan', '$kota', '$no_kk', '$pend_kk', '$pend_terakhir', '$pend_ditempuh', '$pekerjaan', '$status_perkawinan', '$status_dlm_keluarga', '$kewarganegaraan', '$nama_ayah', '$nama_ibu')";
            $tambahGuru = mysqli_query($connect, $qTambahGuru);
            if($tambahGuru){
                header("location:index.php");
            }
        }
    }
?>