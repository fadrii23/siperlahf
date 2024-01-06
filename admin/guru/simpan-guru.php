<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $nip = $_POST['fnip'];
        $name = $_POST['fname'];
        $place = $_POST['fplace'];
        $date_birth = $_POST['fdate_birth'];
        $gender= $_POST['fgender'];
        $address = $_POST['faddress'];
        $religion = $_POST['freligion'];
        $position = $_POST['fposition'];
        $education = $_POST['feducation'];
        $email = $_POST['femail'];
        $mapel = $_POST['fmapel'];
        $status = $_POST['fstatus'];
        $join_date = $_POST['fjoin_date'];
        $photo = $_POST['fphoto'];

        $randomFilename = time().'-'.md5(rand()).'-'.$photo;
        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$randomFilename;

        if($uploadPath) {
            mysqli_query($connect,"INSERT INTO tb_guru (nip,name,place,date_birth,gender,address,religion,position,education,email,mapel,status,join_date,photo)
                        VALUES ('$nip','$name','$place','$date_birth','$gender','$address','$religion','$position','$education','$email','$mapel','$status','$join_date','/upload/$randomFilename')");
            header("Location:guru.php");
        } else {
            header('location:index.php?pesan=gagal-menambah');
        }
    }
?>