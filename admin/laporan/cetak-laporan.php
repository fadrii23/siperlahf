<html>

<head>
    <link rel="shortcut icon" href="../../assets/img/mini-logo.png">
    <title>CETAK LAPORAN</title>
    <style>
    @page {
        margin: 2cm;
        color: none;
    }

    body {
        font-family: "Times New Roman", Times, serif;
    }

    hr {
        border-bottom: 1px solid #000000;
        height: 0px;
    }
    </style>
</head>

<body>
    <?php
    include "../../config/koneksi.php";
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){
      $filter = $_GET['filter'];
      if($filter == '1'){
        echo '
          <div class="header">
            <div align="center" style="font-size: 14pt;"><b>Laporan Surat SMK TI Muhammadiyah Cikampek</b></div>
            <hr>
          </div><br>
        ';

        $query = "SELECT tb_guru.name, tb_surat.no_surat, tb_surat.created_date_surat, tb_surat.jenis_surat, tb_surat.nama, tb_surat.keperluan_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip WHERE tb_surat.status_surat='done' ORDER BY created_date_surat";
      }else if($filter == '2'){
        $tgl = date('d-m-y', strtotime($_GET['tanggal']));
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat SMK TI Muhammadiyah Cikampek</b></div>
            <div align="center" style="font-size: 12pt;"><b>Tanggal '.$tgl.'</b></div>
            <hr>
          </div><br>
        ';
        
        $query = "SELECT tb_guru.name, tb_surat.no_surat, tb_surat.created_date_surat, tb_surat.jenis_surat, tb_surat.nama, tb_surat.keperluan_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip WHERE tb_surat.status_surat='done' AND DATE(tb_surat.created_date_surat)='{$_GET['tanggal']}' ORDER BY created_date_surat";

      }else if($filter == '3'){
        $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat SMK TI Muhammadiyah Cikampek</b></div>
            <div align="center" style="font-size: 12pt;"><b>Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b></div>
            <hr>
          </div><br>
        ';
        
        $query = "SELECT tb_guru.name, tb_surat.no_surat, tb_surat.created_date_surat, tb_surat.jenis_surat, tb_surat.nama, tb_surat.keperluan_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip WHERE tb_surat.status_surat='done' AND MONTH(tb_surat.created_date_surat)='{$_GET['bulan']}' AND YEAR(tb_surat.created_date_suratj)='{$_GET['tahun']}'ORDER BY created_date_surat";

      }else if($filter == '4'){
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat SMK TI Muhammadiyah Cikampek</b></div>
            <div align="center" style="font-size: 12pt;"><b>Tahun '.$_GET['tahun'].'</b></div>
            <hr>
          </div><br>
        ';
       
        $query = "SELECT tb_guru.name, tb_surat.no_surat, tb_surat.created_date_surat, tb_surat.jenis_surat, tb_surat.nama, tb_surat.keperluan_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip =tb_guru.nip WHERE tb_surat.status_surat='done' AND YEAR(tb_surat.created_date_surat)='{$_GET['tahun']}'ORDER BY created_date_surat";

      }
    }else{
      echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat SMK TI Muhammadiyah Cikampek</b></div>
            <hr>
          </div><br>
        ';
      $query = "SELECT tb_guru.name, tb_surat.no_surat, tb_surat.created_date_surat, tb_surat.jenis_surat, tb_surat.nama, tb_surat.keperluan_surat FROM tb_guru LEFT JOIN tb_surat ON tb_surat.nip = tb_guru.nip WHERE tb_surat.status_surat='done'ORDER BY created_date_surat";

    }
  ?>
    <table width="100%" border="1" cellpadding="5" style="border-collapse:collapse;">
        <tr>
            <th>No. Surat</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jenis Surat</th>
            <th>Keperluan</th>
        </tr>
        <?php
      $sql = mysqli_query($connect, $query);
      $row = mysqli_num_rows($sql);
      if($row > 0){
        while($data = mysqli_fetch_assoc($sql)){
          $tgl = date('d-m-Y', strtotime($data['no_surat']));
          echo "<tr>";
          echo "<td>".$data['no_surat']."</td>";
          echo "<td>".$tgl."</td>";
          echo "<td>".$data['nama']."</td>";
          echo "<td>".$data['jenis_surat']."</td>";
          echo "<td>".$data['keperluan_surat']."</td>";
          echo "</tr>";
        }
      }else{
        echo "<tr><td colspan='5'>Data tidak ditemukan.</td></tr>";
      }
    ?>
    </table>
    <script>
    window.print();
    </script>
</body>

</html>