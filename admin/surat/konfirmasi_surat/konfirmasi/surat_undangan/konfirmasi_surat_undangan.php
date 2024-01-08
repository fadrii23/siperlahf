<?php
	include ('../../../../../config/koneksi.php');
	$dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
	$connect = $dbConnection->getConnection();

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$nip 				= $_POST['fnip'];
	$status_surat 		= "DONE";
	$status_surat_undangan 		= "DONE";

	$qUpdate 	= "UPDATE tb_surat SET no_surat='$no_surat', nip='$nip', status_surat='$status_surat' WHERE id_surat='$id'";
	$qUpdateSuratUndangan 	= "UPDATE surat_undangan SET no_surat_undangan='$no_surat', nip='$nip', status_surat_undangan='$status_surat_undangan' WHERE id_undangan='$id'";
	
	// Eksekusi query pertama
	$updateQuery1 = mysqli_query($connect, $qUpdate);

	// Eksekusi query kedua
	$updateQuery2 = mysqli_query($connect, $qUpdateSuratUndangan);

	// Periksa apakah keduanya berhasil dieksekusi
	if($updateQuery1 && $updateQuery2){
		header('Location:../../../permintaan.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>