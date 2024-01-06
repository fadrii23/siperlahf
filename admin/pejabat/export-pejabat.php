<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
    body {
        font-family: sans-serif;
        text-transform: capitalize;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table th,
    table td {
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }

    a {
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }

    .str {
        mso-number-format: \@;
    }
    </style>
    <?php
  	header("Content-type: application/vnd-ms-excel");
  	header("Content-Disposition: attachment; filename=Data Guru SMK TI MUHAMMADIYAH CIKAMPEK.xls");
	?>
    <center>
        <h2>Data Guru <br /> SMK TI MUHAMMADIYAH CIKAMPEK</h2>
    </center>
    <table border="1">
        <thead>
            <tr>
                <th><strong>No</strong></th>
                <th><strong>NIP</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Jabatan</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Tempat/Tanggal Lahir</strong></th>
                <th><strong>Jenis Kelamin</strong></th>
                <th><strong>Agama</strong></th>
                <th><strong>Alamat</strong></th>
                <th><strong>Mapel</strong></th>
                <th><strong>Pendidikan Terakhir</strong></th>
                <th><strong>Status</strong></th>
        </thead>
        <tbody>
            <?php
        include ('../../config/koneksi.php');

        $no = 1;
        $qTampil = mysqli_query($connect, "SELECT * FROM tb_guru");
        foreach($qTampil as $row){
          $tanggal = $row['date_birth'];
      ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td class="str"><?php echo $row['nip']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <?php
          $tanggal = date('d', strtotime($row['date_birth']));
          $bulan = date('F', strtotime($row['date_birth']));
          $tahun = date('Y', strtotime($row['date_birth']));
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
        ?>
                <td><?php echo $row['place'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['religion']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['mapel']; ?></td>
                <td><?php echo $row['education']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php
        }
      ?>
        </tbody>
    </table>
</body>

</html>