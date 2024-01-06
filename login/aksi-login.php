<?php
session_start();
require '../config/koneksi.php';

class UserLogin extends DatabaseConnection {
    public function __construct($host, $username, $password, $db_name) {
        parent::__construct($host, $username, $password, $db_name);
    }

    public function authenticateUser($username, $password) {
        $password = md5($password);
        $qLogin = mysqli_query($this->getConnection(), "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
        $row = mysqli_num_rows($qLogin);

        if ($row > 0) {
            $login = mysqli_fetch_assoc($qLogin);
            if ($login['role'] == "admin") {
                $_SESSION['username'] = $username;
                $_SESSION['lvl'] = "Administrator";
                header("Location: ../admin/dashboard/dashboard.php");
            } else if ($login['role'] == "user") {
                $_SESSION['username'] = $username;
                $_SESSION['lvl'] = 'user';
                header("Location: ../user/user/user.php");
            }
        } else {
            echo "gagal masuk lagi";
        }
    }
}

// Usage
$database = new UserLogin("localhost", "root", "", "siperlah_db");

$username = $_POST['username'];
$password = $_POST['password'];

$userLogin = new UserLogin($database->getHost(), $database->getUsername(), $database->getPassword(), $database->getDbName());
$userLogin->authenticateUser($username, $password);
?>