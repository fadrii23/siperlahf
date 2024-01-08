<?php 
    include ('../../../part/akses.php');
    include ('../../../../config/koneksi.php');
    $dbConnection = new DatabaseConnection("localhost", "root", "", "siperlah_db");
    $connect = $dbConnection->getConnection();

    $id = $_GET['id'];
$qCek = mysqli_query($connect, "SELECT tb_guru.name, tb_guru.position, tb_surat.no_surat, tb_surat.keperluan_surat, tb_surat.created_date_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip WHERE tb_surat.id_surat='$id'");


    while($row = mysqli_fetch_array($qCek)){
        $qTampil = mysqli_query($connect, "SELECT * FROM tb_pejabat");
        foreach($qTampil as $rows){
            $id_pejabat = $row['id_pejabat'];
            $qCekPejabat = mysqli_query($connect,"SELECT tb_pejabat.jabatan, tb_pejabat.nama_pejabat FROM tb_pejabat WHERE tb_pejabat.id_pejabat='$id_pejabat'");
            while($rowss = mysqli_fetch_array($qCekPejabat)){
                // ... (lakukan sesuatu dengan data $rowss jika diperlukan)
            }
        }
    }
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
                        Hari / Tanggal : <?php echo $row['created_date_surat']?>
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