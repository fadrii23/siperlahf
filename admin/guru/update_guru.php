<?php

require '../../config/koneksi.php';

class GuruUpdate extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function updateGuru($id, $nip, $name, $place, $date_birth, $gender, $religion, $address, $position, $email, $education, $status, $join_date) {
        $query = "UPDATE tb_guru SET nip = '$nip', name = '$name', place = '$place', date_birth = '$date_birth', gender = '$gender', religion = '$religion', address = '$address', position = '$position', email = '$email', education = '$education', status = '$status', join_date = '$join_date' WHERE id_guru='$id'";
        
        if (mysqli_query($this->getConnection(), $query)) {
            header("Location:guru.php");
        } else {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data guru'); window.location.href='guru.php'</script>");
        }
    }
}

// Usage
$database = new GuruUpdate("localhost", "root", "", "siperlah_db");

$id = $_POST['id'];
$nip = $_POST['fnip'];
$name = $_POST['fname'];
$place = $_POST['fplace'];
$date_birth = $_POST['fdate_birth'];
$gender = $_POST['fgender'];
$religion = $_POST['freligion'];
$address = $_POST['faddress'];
$position = $_POST['fposition'];
$education = $_POST['feducation'];
$email = $_POST['femail'];
$status = $_POST['fstatus'];
$join_date = $_POST['fjoin_date'];

$guruUpdate = new GuruUpdate($database->host, $database->username, $database->password, $database->db_name);
$guruUpdate->updateGuru($id, $nip, $name, $place, $date_birth, $gender, $religion, $address, $position, $email, $education, $status, $join_date);

?>