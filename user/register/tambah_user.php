<?php

require '../config/koneksi.php';

// if(isset($_POST['submit'])) {
    // global $db_connect;

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    // $image = $_FILES['image']['name'];
    // $tempImage = $_FILES['image']['tmp_name'];
    // $randomFilename = time().'-'.md5(rand()).'-'.$image;
    // $uploadPath = $_SERVER['DOCUMENT_ROOT'];
    //$upload = move_uploaded_file($tempImage,$uploadPath);

    $sql = "INSERT INTO tb_user (name,username,password,email) VALUES ('$name', '$username', '$password', '$email')";

    if (mysqli_query($connect, $sql)) {
        header ("location:login.php") ;
    } else {
        echo "gagal upload lagi";
    }
    
    // if($uploadPath) {
        // mysqli_query($db_connect,"INSERT * INTO tb_user (name,username,password,email)");
        // echo "Berhasil Diupload";
    // } else {
        // echo "gagal upload";
    // }

// } else {
    // var_dump(" gagal upload") ;

// }