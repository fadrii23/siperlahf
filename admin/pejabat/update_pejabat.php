<?php

require '../../config/koneksi.php';

class PejabatUpdate extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function updatePejabat($id, $nip, $nama, $jabatan, $awal_menjabat, $foto) {
        $query = "UPDATE tb_pejabat SET nip = '$nip', nama = '$nama', jabatan = '$jabatan', awal_menjabat = '$awal_menjabat', foto = '/upload/$foto' WHERE id_pejabat='$id'";
        
        if (mysqli_query($this->getConnection(), $query)) {
            header("Location:pejabat.php");
        } else {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data pejabat'); window.location.href='pejabat.php'</script>");
        }
    }
}

// Usage
$database = new PejabatUpdate("localhost", "root", "", "siperlah_db");

$id = $_POST['id'];
$nip = $_POST['fnip'];
$nama = $_POST['fnama'];
$jabatan = $_POST['fjabatan'];
$awal_menjabat = $_POST['fawal_menjabat'];
$foto = $_POST['ffoto'];

$pejabatUpdate = new PejabatUpdate($database->host, $database->username, $database->password, $database->db_name);
$pejabatUpdate->updatePejabat($id, $nip, $nama, $jabatan, $awal_menjabat, $foto);

?>