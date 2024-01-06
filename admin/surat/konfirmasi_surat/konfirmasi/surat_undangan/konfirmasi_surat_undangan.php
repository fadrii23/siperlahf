<?php
	include ('../../../../../config/koneksi.php');

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$nip	= $_POST['fnip'];
	$status_surat 		= "DONE";

	$qUpdate 	= "UPDATE tb_surat SET no_surat='$no_surat', nip='$nip', status_surat='$status_surat' WHERE id_surat='$id'";
	$update 	= mysqli_query($connect, $qUpdate);

	if($update){
		header('Location:../../../permintaan.php');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>