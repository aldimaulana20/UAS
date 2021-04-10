<?php 
  session_start();
  //pemeriksaan session
  if (isset($_SESSION['Nama'])) {
    } else {
      //session belum ada artinya belum login
      die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
      ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
    }
	
?>

  <?php
    $db_host = 'localhost'; // Nama Server
    $db_user = 'root'; // User Server
    $db_pass = ''; // Password Server
    $db_name = 'db_covid19'; // Nama Database

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
      die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());  
    }
    $sql = 'SELECT * FROM data_pendaftar';
      
    $query = mysqli_query($conn, $sql);

    if (!$query) {
      die ('SQL Error: ' . mysqli_error($conn));
    }
  ?>

<html>
<head>
  <title>TAMPILAN DATA</title>
  <style type="text/css">
    body {
      font-size: 15px;
      color: #343d44;
      font-family: "segoe-ui", "open-sans", tahoma, arial;
      padding: 0;
      margin: 0;
    }
    table {
      margin: auto;
      font-family: "segoe-ui", "open-sans", tahoma, arial;
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #000000;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #FFFFFF;
      color: #000000;
      border-color: #000000 !important;
      
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: left;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: #ffffa2;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }

    a {
      color: grey; 
    }
  </style>
</head>
<body>
 
  <body style="text-align:center">

    <?php 
      $sql2=mysqli_query($conn,"SELECT * FROM data_pendaftar");
      while ($data=mysqli_fetch_array($sql2)) {
		$_SESSION['cetak'] = $data['wilayah'];
  ?>
 <h1>Data Pemantauan Covid-19 Di Wilayah <?php echo $data['wilayah']; ?> </h1>
 
 <?php
    date_default_timezone_set('Asia/Jakarta');
    echo "Per " . date("d F Y H:i:s") . "<br>";
    echo "Operator " . $_SESSION['Nama'];?> / <?php echo $_SESSION['NIM'];
	
  ?>
  <table class="data-table">
    <caption class="title"> </caption>
    <thead>
      <tr>
        <th ><a href="page.php" style = "color : blue">BACK</a></th>
      </tr>
      <tr>
        <th align = "center">Positif</th>
        <th align = "center">Dirawat</th>
        <th align = "center">Sembuh</th>
        <th align = "center">Meninggal</th>
        <th align = "center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
        ?>
        <tr>
    
            <td align = "center"><?php echo $data["jumlah_positif"];?></td>
            <td align = "center"><?php echo $data["jumlah_dirawat"];?></td>
            <td align = "center"><?php echo $data["jumlah_sembuh"];?></td>
            <td align = "center"><?php echo $data["jumlah_meninggal"];?></td>
      
            <td>
              <a href="edit.php?no=<?php echo $data['no']; ?>" style = "color : blue">EDIT</a> &nbsp
              <a href="hapus.php?no=<?php echo $data['no']; ?>" style = "color : blue">HAPUS</a> &nbsp
			  <a href="cetak.php?wilayah=<?php echo $data['wilayah']; ?>" style = "color : blue">CETAK</a>
            </td>
        </tr>
        <?php $no++; } ?>

</tbody>
  </table>

 <?php
  }
 ?>


</body>
</html>

