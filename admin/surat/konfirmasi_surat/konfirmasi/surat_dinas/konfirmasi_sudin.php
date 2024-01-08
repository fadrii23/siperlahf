<?php
	include ('../../../../../config/koneksi.php');
	$dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
	$connect = $dbConnection->getConnection();

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$nip 				= $_POST['fnip'];
	$status_surat 		= "DONE";
	$status_sudin 		= "DONE";

	$qUpdate 	= "UPDATE tb_surat SET no_surat='$no_surat', nip='$nip', status_surat='$status_surat' WHERE id_surat='$id'";
	$qUpdateSudin 	= "UPDATE tb_sudin SET no_sudin='$no_surat', nip='$nip', status_sudin='$status_sudin' WHERE id_sudin='$id'";
	
	// Eksekusi query pertama
	$updateQuery1 = mysqli_query($connect, $qUpdate);

	// Eksekusi query kedua
	$updateQuery2 = mysqli_query($connect, $qUpdateSudin);

	// Periksa apakah keduanya berhasil dieksekusi
	if($updateQuery1 && $updateQuery2){
		header('Location:../../../permintaan.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>