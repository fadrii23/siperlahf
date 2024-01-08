<?php

require '../../config/koneksi.php';

class UserInsert extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function insertUser($name, $username, $password, $email) {
        $password = md5($password);
        $sql = "INSERT INTO tb_user (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
        if (mysqli_query($this->getConnection(), $sql)) {
            return mysqli_insert_id($this->getConnection()); // Mengembalikan ID User yang baru saja di-generate
        } else {
            echo "gagal upload lagi";
            return false;
        }
    }

    public function insertGuru($id_user, $name, $nip, $gender, $position, $date_birth, $place, $address, $religion, $email, $mapel, $education, $status, $join_date, $photo) {
        // Mengabaikan kolom id_user karena diisi otomatis (AUTO_INCREMENT)
        $sql = "INSERT INTO tb_guru (id_user, name, nip, gender, position, date_birth, place, address, religion, mapel, email, education, status, join_date, photo) 
                VALUES ('$id_user', '$name', '$nip', '$gender', '$position', '$date_birth', '$place', '$address', '$religion', '$mapel', '$email', '$education', '$status', '$join_date', '$photo')";

        if (mysqli_query($this->getConnection(), $sql)) {
            header("location:../../login/login.php");
        } else {
            echo "gagal upload lagi";
        }
    }
}

// Usage
$database = new UserInsert("localhost", "root", "", "siperlah_db");

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$id_user = $database->insertUser($name, $username, $password, $email);

$guruInsert = new UserInsert("localhost", "root", "", "siperlah_db");

$name = $_POST['name'];
$nip = $_POST['nip'];
$gender = $_POST['gender'];
$position = $_POST['position'];
$date_birth = $_POST['date_birth'];
$place = $_POST['place'];
$address = $_POST['address'];
$religion = $_POST['religion'];
$email = $_POST['email'];
$mapel = $_POST['mapel'];
$education = $_POST['education'];
$status = $_POST['status'];
$join_date = $_POST['join_date'];
$photo = $_FILES['photo']['name'];

$photo_temp = $_FILES['photo']['tmp_name'];
move_uploaded_file($photo_temp, "path/to/your/uploaded/folder/" . $photo);

$guruInsert->insertGuru($id_user, $name, $nip, $gender, $position, $date_birth, $place, $address, $religion, $email, $mapel, $education, $status, $join_date, $photo);
?>