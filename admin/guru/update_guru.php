<?php
	include ('../../config/koneksi.php');

	$id = $_POST['id'];
	$nip = $_POST['fnip'];
	$name = $_POST['fname'];
	$place = $_POST['fplace'];
	$date_birth = $_POST['fdate_birth'];
	$gender = $_POST['fgender'];
	$religion = $_POST['freligion'];
	$address = $_POST['faddress'];
	$position = $_POST['fposition'];
	$email = $_POST['femail'];
	$education = $_POST['feducation'];
	$status = $_POST['fstatus'];
	$join_date = $_POST['fjoin_date'];
	

	$qUpdate = "UPDATE tb_guru SET nip = '$nip', name = '$name', place = '$place', date_birth = '$date_birth', gender = '$gender', religion = '$religion', address = '$address', position = '$position', email = '$email', education = '$education', status = '$status', join_date = '$join_date' WHERE id_guru='$id'";
	$update = mysqli_query($connect, $qUpdate);

	if($update){
		// echo("Data sudah diupdate");
		header('location:guru.php');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data penduduk'); window.location.href='../penduduk/'</script>");
	}
?>