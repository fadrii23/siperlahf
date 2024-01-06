<?php
	include ('../../config/koneksi.php');

	$id		= $_GET['id'];
	$qHapus		= mysqli_query($connect, "DELETE FROM tb_surat WHERE id_surat = '$id'");

	if($qHapus){
		header('location:selesai.php');
	} else {
		header('location:index.php?pesan=gagal-menghapus');
	}
?>