<?php
	include ('../../config/koneksi.php');

	$id = $_POST['id'];
	$nip = $_POST['fnip'];
	$nama = $_POST['fnama'];
	$jabatan = $_POST['fjabatan'];
	$awal_menjabat = $_POST['fawal_menjabat'];
	$foto = $_POST['ffoto'];
	
	

	$qUpdate = "UPDATE tb_pejabat SET nip = '$nip', nama = '$nama', jabatan = '$jabatan', awal_menjabat = '$awal_menjabat', foto = '/upload/$randomFilename' WHERE id_pejabat='$id'";
	$update = mysqli_query($connect, $qUpdate);

	if($update){
		// echo("Data sudah diupdate");
		header('location:pejabat.php');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data penduduk'); window.location.href='../penduduk/'</script>");
	}
?>