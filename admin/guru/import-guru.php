<?php 
	include ('../../config/koneksi.php');
	include ('excel_reader2.php');
	$dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
$connect = $dbConnection->getConnection();

	$target = basename($_FILES['dataguru']['name']) ;
	move_uploaded_file($_FILES['dataguru']['tmp_name'], $target);
	chmod($_FILES['dataguru']['name'],0777);
	$data = new Spreadsheet_Excel_Reader($_FILES['dataguru']['name'],false);
	$jumlah_baris = $data->rowcount($sheet_index=0);
	$berhasil = 0;
	for ($i=2; $i<=$jumlah_baris; $i++){
		$nip  = $data->val($i, 1);
		$name  = $data->val($i, 2);
		$gender  = $data->val($i, 3);
		$position  = $data->val($i, 4);
		$date_birth  = $data->val($i, 5);
		$place = $data->val($i, 6);
		$address  = $data->val($i, 7);
		$religion  = $data->val($i, 8);
		$email  = $data->val($i, 9);
		$mapel  = $data->val($i, 10);
		$education  = $data->val($i, 11);
		$status  = $data->val($i, 12);
		$join_date  = $data->val($i, 13);
		
		
		if($nip != "" && $name != "" && $gender != "" && $position != "" && $date_birth != "" && $place != "" && $address != "" && $religion != "" && $email != "" && $mapel != "" && $education != "" && $status != "" && $join_date != ""){
			mysqli_query($connect,"INSERT INTO tb_guru (VALUES(NULL, '$nip','$nama','$gender','$date_birth','$place','$address','$religion','$email','$mapel','$education','$status','$join_date')");
			$berhasil++;
		}
	}
	unlink($_FILES['dataguru']['name']);
	echo ("berhasil upload");
	// header("location:index.php");
?>