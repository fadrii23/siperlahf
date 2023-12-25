<?php
	session_start();
	require ('../config/koneksi.php');	

	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	
	$qLogin 	= mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
	$row 		= mysqli_num_rows($qLogin);
	
	
	if($row > 0){
		$login = mysqli_fetch_assoc($qLogin);
		if($login['role']=="admin"){
			$_SESSION['username'] = $username;
			// $_SESSION['lvl'] = "Administrator";

			header("location:../admin/");

		} else if ($login['role']=="user"){
			$_SESSION['username'] = $username;
			// $_SESSION['lvl'] = "Fadri Tri Hartanto";

			echo " ini bagianmu";
			// header("location:../admin/");
		
	}else{
		echo "gaagl masuk lagi";
	}
}
?>