<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/quill.snow.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/remixicon.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Siperlah</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Personal Information</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST" action="register_guru.php">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Nama</label>
                                            <input type="text" name="name" class="form-control" id="yourName" required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">NIP</label>
                                            <input type="text" name="nip" class="form-control" id="yourNIP" required>
                                            <div class="invalid-feedback">Please enter a valid NIP adddress!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                    value="Laki-Laki" checked>
                                                <label class="form-check-label" for="gender">
                                                    Laki - Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                                    value="Perempuan">
                                                <label class="form-check-label" for="gender">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Jabatan</label>
                                            <input type="position" name="position" class="form-control"
                                                id="yourPosition" required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Tanggal Lahir</label><br>
                                            <input type="date" name="date_birth" class="form-control" id="yourDateBirth"
                                                required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="place" class="form-control" id="yourPlace"
                                                required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Alamat</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Email</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Mata Pelajaran yang
                                                diampu</label>
                                            <input type="text" name="mapel" class="form-control" id="mapel" required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-8 control-label">Pendidikan Terakhir</label>
                                            <div class="col-sm-12">
                                                <select name="education" class="form-control" required>
                                                    <option value="">-- Pendidikan Terakhir --</option>
                                                    <option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                                    <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                                    <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                                    <option value="D1/SEDERAJAT">D1/SEDERAJAT</option>
                                                    <option value="D2/SEDERAJAT">D2/SEDERAJAT</option>
                                                    <option value="D3/SEDERAJAT">D3/SEDERAJAT</option>
                                                    <option value="D4/SEDERAJAT">D4/SEDERAJAT</option>
                                                    <option value="S1/SEDERAJAT">S1/SEDERAJAT</option>
                                                    <option value="S2/SEDERAJAT">S2/SEDERAJAT</option>
                                                    <option value="S3/SEDERAJAT">S3/SEDERAJAT</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status</label>
                                            <div class="col-sm-12">
                                                <select name="status" class="form-control" required>
                                                    <option value="">-- Status --</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="NON_PNS">NON PNS</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPosition" class="form-label">Tanggal Pertama
                                                Bergabung</label>
                                            <input type="date" name="date_birth" class="form-control" id="yourDateBirth"
                                                required>
                                            <div class="invalid-feedback">Please enter your position!</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Foto Terkini</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="fphoto" class="form-control"
                                                    style="text-transform: capitalize;" placeholder="Foto Terkini"
                                                    required>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create An
                                                Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="../login/login.php">Log
                                                    in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>