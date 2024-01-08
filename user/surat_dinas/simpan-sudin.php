<?php

require '../../config/koneksi.php';

class SudinInsert extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function insertSudin($id_user, $jenis_surat, $nip, $name, $position, $status_sudin, $keperluan_sudin) {
        $querySudin = "INSERT INTO tb_sudin (id_user, jenis_surat, nip, position, status_sudin, keperluan_sudin) VALUES('$id_user','$jenis_surat', '$nip', '$position', '$status_sudin', '$keperluan_sudin')";
        $querySurat = "INSERT INTO tb_surat (id_user, jenis_surat, nama, nip, position, keperluan_surat, status_surat) VALUES('$id_user','$jenis_surat', '$name', '$nip', '$position', '$keperluan_sudin', '$status_sudin')";

        $insertSudin = mysqli_query($this->getConnection(), $querySudin);
        $insertSurat = mysqli_query($this->getConnection(), $querySurat);

        if ($insertSudin && $insertSurat) {
            header('Location:../../admin/dashboard/dashboard.php');
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }
    }
}

// Usage
$database = new SudinInsert("localhost", "root", "", "siperlah_db");

$id_user = $_POST['id_user'];
$jenis_surat = "Surat Dinas";
$nip = $_POST['fnip'];
$name = $_POST['fname'];
$position = $_POST['fposition'];
$status_sudin = "PENDING";
$keperluan_sudin = addslashes($_POST['fkeperluan_sudin']);

$sudinInsert = new SudinInsert($database->host, $database->username, $database->password, $database->db_name);
$sudinInsert->insertSudin($id_user, $jenis_surat, $nip, $name, $position, $status_sudin, $keperluan_sudin);

?>