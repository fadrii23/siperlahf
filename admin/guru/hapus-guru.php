<?php
	include ('../../config/koneksi.php');
	$dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();

	$id		= $_GET['id'];
	$qHapus		= mysqli_query($connect, "DELETE FROM tb_guru WHERE id_guru = '$id'");

	if($qHapus){
		header('location:guru.php');
	} else {
		header('location:index.php?pesan=gagal-menghapus');
	}
?>