<?php
	session_start();
 
	if(isset($_SESSION['admin'])){
		header('location:../admin/dashboard/');
	}else if(isset($_SESSION['kades'])){
		header('location:../admin/dashboard/');
	}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/img/mini-logo.png">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/fontawesome-5.10.2/css/all.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/loginCSS/login.css">
</head>

<body>
    <div class="container">
        <?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="login-gagal"){
				echo "<div class='alert alert-danger'><center>Username atau Password Anda salah!</center></div>";
			}
		}
	?>
        <div class=" d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header text-center mt-4">
                    <h3>Login</h3>

                    <div class="card-body">
                        <form method="POST" action="aksi-login.php">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="username" placeholder="username" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="password"
                                    required>
                            </div><br>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-right login_btn">
                            </div>

                        </form>

                    </div>

                </div>
                <p class="small mb-0" style="color: white; text-align: center; ">Don't have
                    account? <a href="register.php">Create
                        an account</a></p>
            </div>

        </div>
    </div>
</body>

</html>