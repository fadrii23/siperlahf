<?php

class DatabaseConnection {
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $db_name = "siperlah_db";
    public $connect;

    public function __construct($host = null, $username = null, $password = null, $db_name = null) {
        if ($host !== null) {
            $this->host = $host;
        }
        if ($username !== null) {
            $this->username = $username;
        }
        if ($password !== null) {
            $this->password = $password;
        }
        if ($db_name !== null) {
            $this->db_name = $db_name;
        }

        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

        if (mysqli_connect_errno()) {
            echo "Error Connection!" . mysqli_connect_error();
        }
    }

    public function getConnection() {
        return $this->connect;
    }

    public function getHost() {
        return $this->host;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDbName() {
        return $this->db_name;
    }
}
?>