<?php 
	include ('../../../part/akses.php');
  	include ('../../../../config/koneksi.php');
      $dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
      $connect = $dbConnection->getConnection();

  	$id = $_GET['id'];
  	$id = $_GET['id'];
      $qCek = mysqli_query($connect, "SELECT tb_guru.name, tb_guru.position, tb_surat.*, tb_pejabat.* FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip LEFT JOIN tb_pejabat ON tb_surat.nip = tb_pejabat.nip WHERE tb_surat.id_surat='$id'");

  	while($row = mysqli_fetch_array($qCek)){

        // $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        // foreach($qTampilDesa as $rows){

		// 	$id_pejabat_desa = $row['id_pejabat_desa'];
		//   	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_keterangan ON surat_keterangan.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_keterangan.id_pejabat_desa = '$id_pejabat_desa' AND surat_keterangan.id_sk='$id'");
		//   	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
?>

<html>

<head>
    <link rel="shortcut icon" href="../../../../assets/img/mini-logo.png">
    <title>CETAK SURAT</title>
    <link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css" />
    <style type="text/css" media="print">
    @page {
        margin: 0;
    }

    body {
        margin: 1cm;
        margin-left: 2cm;
        margin-right: 2cm;
        font-family: "Times New Roman", Times, serif;
    }
    </style>
</head>

<body>
    <div>
        <table width="100%">
            <tr><img src="../../../../assets/img/logo_sekolah.png" alt="" class="logo"></tr>
            <div class="header">
                <h4 class="kop" style="text-transform: uppercase">PEMERINTAH KAB. KARAWANG</h4>
                <h4 class="kop" style="text-transform: uppercase">DINAS PENDIDIKAN</h4>
                <h4 class="kop" style="text-transform: uppercase">SMK TI MUHAMMADIYAH CIKAMPEK</h4>

                <div style="text-align: center;">
                    <hr>
                </div>
            </div>
            <br>
            <!-- <div align="center"><u>
                    <h4 class="kop">SURAT DINAS</h4>
                </u></div>
            <div align="center">
                <h4 class="kop3">Nomor :&nbsp;&nbsp;&nbsp;<?php echo $row['no_surat']; ?></h4>
            </div> -->
        </table>
        <br>
        <div class="clear"></div>
        <div id="isi3">
            <table width="100%">
                <tr>
                    <td class="indentasi" style="text-align:right">Karawang,
                        <?php
                        $tanggal = date('D d F Y');
                        $hari = date('D', strtotime($tanggal));
                        $bulan = date('F', strtotime($tanggal));
                        $bulanIndo = array(
                          'January' => 'Januari',
                          'February' => 'Februari',
                          'March' => 'Maret',
                          'April' => 'April',
                          'May' => 'Mei',
                          'June' => 'Juni',
                          'July' => 'Juli',
                          'August' => 'Agustus',
                          'September' => 'September',
                          'October' => 'Oktober',
                          'November' => 'November',
                          'December' => 'Desember'
                        );
                        echo '' . date('d ') . $bulanIndo[$bulan] . date(' Y');
                      ?>
                    </td>
                </tr>
            </table>
            <br><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">
                        Nomor Surat : &nbsp;&nbsp;<?php echo $row['no_surat']; ?>
                    </td>
                <tr>
                    <td class="indentasi">
                        Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        &nbsp;&nbsp;<?php echo $row['jenis_surat']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">
                        Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;Terlampir
                    </td>
                </tr>
                </tr>
            </table>
            <br><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">
                        Kepada Yth.
                    </td>
                <tr>
                    <td class="indentasi">
                        Seluruh Guru
                </tr>
                <tr>
                    <td class="indentasi">
                        di SMK TI MUHAMMADIYAH CIKAMPEK
                    </td>
                </tr>
                </tr>
            </table>
            <br><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">
                        Dengan Hormat,
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">
                        Diberitahukan kepada seluruh guru SMK TI Muhammadiyah Cikampek, untuk dapat menghadiri acara
                        yang akan diadakan oleh yang akan dilaksanakan pada :
                </tr>
                <tr>
                    <td class="indentasi">
                        Hari / Tanggal :
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">
                        Tempat :
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">
                        Pukul :
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td class="indentasi">
                        Mengingat pentingnya acara tersebut,maka diharapkan kepada Bapak/Ibu untuk dapat menghadiri acar
                        tersebut.
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">
                        Demikian Surat Undangan ini diberitahukan, atas perhatiannya kami ucapkan,terimakasih.
                </tr>
            </table>
            <br><br>
            <!-- <table width="100%">
                <tr>
                    <td class="indentasi">Guru tersebut diatas benar-benar penduduk kami Dusun <a
                            style="text-transform: capitalize;"><?php echo $row['dusun']; ?>, Desa
                            <?php echo $rows['nama_desa']; ?>, Kecamatan <?php echo $rows['kecamatan']; ?>,
                            <?php echo $rows['kota']; ?></a>. Bahwa nama yang bersangkutan tidak berada di rumah dan
                        tidak diketahui keberadaannya.</td>
                </tr>
            </table><br> -->
            <!-- <table width="100%">
                <tr>
                    <td class="indentasi">Surat keterangan ini dipergunakan untuk <a
                            style="text-transform: capitalize;"><u><b><?php echo $row['keperluan_surat']; ?>.</a></u></b>
                    </td>
                </tr>
            </table><br> -->
            <!-- <table width="100%">
                <tr>
                    <td class="indentasi">Demikian surat keterangan ini dibuat dengan sebenar-benarnya dan digunakan
                        sebagaimana mestinya.</td>
                </tr>
            </table> -->
        </div>
        <br>
        <table width="100%" style="text-transform: capitalize;">
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td width="10%"></td>
                <td width="30%"></td>
                <td width="10%"></td>
                <td align="center">
                    <?php
					$tanggal = date('d F Y');
					$bulan = date('F', strtotime($tanggal));
					$bulanIndo = array(
					    'January' => 'Januari',
					    'February' => 'Februari',
					    'March' => 'Maret',
					    'April' => 'April',
					    'May' => 'Mei',
					    'June' => 'Juni',
					    'July' => 'Juli',
					    'August' => 'Agustus',
					    'September' => 'September',
					    'October' => 'Oktober',
					    'November' => 'November',
					    'December' => 'Desember'
					);
					echo "Karawang,". date('d ') . $bulanIndo[$bulan] . date(' Y');
				?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td align="center"><?php echo $row['jabatan'] ?></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td align="center" style="text-transform: uppercase;">
                    <u><b><?php echo $row['nama']; ?></b></u>
                </td>
            </tr>
        </table>
    </div>
    <script>
    window.print();
    </script>
</body>

</html>

<?php
			}
	// 	}
  	// }
?>