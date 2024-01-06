<?php

require '../../config/koneksi.php';

class GuruInsert extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function insertGuru($nip, $name, $place, $date_birth, $gender, $address, $religion, $position, $education, $email, $mapel, $status, $join_date, $photo) {
        $randomFilename = time() . '-' . md5(rand()) . '-' . $photo;
        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $randomFilename;

        if ($uploadPath) {
            $query = "INSERT INTO tb_guru (nip, name, place, date_birth, gender, address, religion, position, education, email, mapel, status, join_date, photo)
                        VALUES ('$nip', '$name', '$place', '$date_birth', '$gender', '$address', '$religion', '$position', '$education', '$email', '$mapel', '$status', '$join_date', '/upload/$randomFilename')";

            if (mysqli_query($this->getConnection(), $query)) {
                header("Location:guru.php");
            } else {
                header('location:index.php?pesan=gagal-menambah');
            }
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }
    }
}

// Usage
$database = new GuruInsert("localhost", "root", "", "siperlah_db");

$nip = $_POST['fnip'];
$name = $_POST['fname'];
$place = $_POST['fplace'];
$date_birth = $_POST['fdate_birth'];
$gender = $_POST['fgender'];
$address = $_POST['faddress'];
$religion = $_POST['freligion'];
$position = $_POST['fposition'];
$education = $_POST['feducation'];
$email = $_POST['femail'];
$mapel = $_POST['fmapel'];
$status = $_POST['fstatus'];
$join_date = $_POST['fjoin_date'];
$photo = $_POST['fphoto'];

$guruInsert = new GuruInsert($database->host, $database->username, $database->password, $database->db_name);
$guruInsert->insertGuru($nip, $name, $place, $date_birth, $gender, $address, $religion, $position, $education, $email, $mapel, $status, $join_date, $photo);

?>