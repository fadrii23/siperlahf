<?php
	include ('../../config/koneksi.php');

	$id		= $_GET['id'];
	$qHapus		= mysqli_query($connect, "DELETE FROM tb_pejabat WHERE id_pejabat = '$id'");

	if($qHapus){
		header('location:pejabat.php');
	} else {
		header('location:index.php?pesan=gagal-menghapus');
	}
?>