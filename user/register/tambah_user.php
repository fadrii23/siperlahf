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

$userInsert = new UserInsert($database->host, $database->username, $database->password, $database->db_name);
$userInsert->insertUser($name, $username, $password, $email);
?>