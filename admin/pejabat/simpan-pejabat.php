<?php

require '../../config/koneksi.php';

class PejabatInsert extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function insertPejabat($nip, $nama, $jabatan, $awal_menjabat, $foto) {
        $randomFilename = time() . '-' . md5(rand()) . '-' . $foto;
        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $randomFilename;

        if ($uploadPath) {
            $query = "INSERT INTO tb_pejabat (nip, nama, jabatan, awal_menjabat, foto)
                        VALUES ('$nip', '$nama', '$jabatan', '$awal_menjabat', '/upload/$randomFilename')";

            if (mysqli_query($this->getConnection(), $query)) {
                header("Location:pejabat.php");
            } else {
                header('location:index.php?pesan=gagal-menambah');
            }
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }
    }
}

// Usage
$database = new PejabatInsert("localhost", "root", "", "siperlah_db");

$nip = $_POST['fnip'];
$nama = $_POST['fnama'];
$jabatan = $_POST['fjabatan'];
$awal_menjabat = $_POST['fawal_menjabat'];
$foto = $_POST['ffoto'];

$pejabatInsert = new PejabatInsert($database->host, $database->username, $database->password, $database->db_name);
$pejabatInsert->insertPejabat($nip, $nama, $jabatan, $awal_menjabat, $foto);

?>