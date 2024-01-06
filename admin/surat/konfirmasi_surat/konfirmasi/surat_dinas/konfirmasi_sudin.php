<?php

require '../../../../../config/koneksi.php';

class SuratConfirmation extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function confirmSurat($id, $no_surat, $nip) {
        $status_surat = "DONE";

        $queryUpdateSurat = "UPDATE tb_surat SET no_surat='$no_surat', nip='$nip', status_surat='$status_surat' WHERE id_surat='$id'";
        $queryUpdateSudin = "UPDATE tb_sudin SET status_sudin='$status_surat' WHERE no_surat='$no_surat'";

        $updateSurat = mysqli_query($this->getConnection(), $queryUpdateSurat);
        $updateSudin = mysqli_query($this->getConnection(), $queryUpdateSudin);

        if ($updateSurat && $updateSudin) {
            header('Location:../../../permintaan.php');
        } else {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
        }
    }
}

// Usage
$database = new SuratConfirmation("localhost", "root", "", "siperlah_db");

$id = $_POST['id'];
$no_surat = $_POST['fno_surat'];
$nip = $_POST['fnip'];

$suratConfirmation = new SuratConfirmation($database->host, $database->username, $database->password, $database->db_name);
$suratConfirmation->confirmSurat($id, $no_surat, $nip);

?>