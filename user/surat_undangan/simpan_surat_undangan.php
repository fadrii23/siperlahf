<?php

require '../../config/koneksi.php';

class SuratUndanganInsert extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function insertSuratUndangan($nip, $nama, $kegiatan, $tempat_acara, $tanggal_acara, $keperluan_surat) {
        $jenis_surat = "Surat Undangan";
        $status_surat_undangan = "PENDING";

        // Ganti $id_user sesuai dengan cara Anda mendapatkan ID user (mungkin dari session atau parameter lainnya)
        $id_user = 1;

        $querySuratUndangan = "INSERT INTO surat_undangan (id_user,jenis_surat, nip, nama, kegiatan, tempat_acara, tanggal_acara, keperluan_surat, status_surat_undangan)
                               VALUES('$id_user','$jenis_surat', '$nip', '$nama', '$kegiatan', '$tempat_acara', '$tanggal_acara', '$keperluan_surat', '$status_surat_undangan')";

        $querySurat = "INSERT INTO tb_surat (id_user, jenis_surat, nama, nip, keperluan_surat, status_surat)
                       VALUES('$id_user', '$jenis_surat', '$nama', '$nip', '$keperluan_surat', '$status_surat_undangan')";

        $insertSuratUndangan = mysqli_query($this->getConnection(), $querySuratUndangan);
        $insertSurat = mysqli_query($this->getConnection(), $querySurat);

        if ($insertSuratUndangan && $insertSurat) {
            header('Location:../user/user.php');
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }
    }
}

// Usage
$database = new SuratUndanganInsert("localhost", "root", "", "siperlah_db");

$nip = $_POST['fnip'];
$nama = $_POST['fnama'];
$kegiatan = $_POST['fkegiatan'];
$tempat_acara = $_POST['ftempat_acara'];
$tanggal_acara = $_POST['ftanggal_acara'];
$keperluan_surat = $_POST['fkeperluan_surat'];

$suratUndanganInsert = new SuratUndanganInsert($database->host, $database->username, $database->password, $database->db_name);
$suratUndanganInsert->insertSuratUndangan($nip, $nama, $kegiatan, $tempat_acara, $tanggal_acara, $keperluan_surat);

?>