<?php 
  session_start();
  //pemeriksaan session
  if (isset($_SESSION['Nama'])) {
    } else {
      //session belum ada artinya belum login
      die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
      ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
    }
	
	$koneksi = mysqli_connect("localhost", "root", "", "db_covid19");
?>

<html>
<head>
<title>Cetak PDF</title>
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
<body style="text-align:center">

<?php 
$prov = $_GET['wilayah'];
?>

<?php 
      $sql=mysqli_query($koneksi,"SELECT * FROM data_pendaftar where wilayah='$prov'");
      while ($data=mysqli_fetch_array($sql)) {
		  $jumlah_positif = $data['jumlah_positif'];
		  $jumlah_dirawat = $data['jumlah_dirawat'];
		  $jumlah_sembuh = $data['jumlah_sembuh'];
		  $jumlah_meninggal = $data['jumlah_meninggal'];
	  }
	  
	  
	
  ?>
  
<h1>DATA PEMANTAUAN COVID-19 DI WILAYAH <?php echo $prov?></h1>

<?php
    date_default_timezone_set('Asia/Jakarta');
    echo "Per " . date("d F Y H:i:s") . "<br>";
    echo "Operator " . $_SESSION['Nama'];?> / <?php echo $_SESSION['NIM'];
  ?>
  
<tr><br></tr>
<tr><br></tr>  
<table  width = "55%" height = "15%" border = "1" cellspacing = "0" cellpadding = "10">

<tr>
<td align = "center"><b>Positif</td>
<td align = "center"><b>Dirawat</td>
<td align = "center"><b>Sembuh</td>
<td align = "center"><b>Meninggal</td>
</tr>

<tr>
<td align = "center"><?php echo $jumlah_positif?></td>
<td align = "center"><?php echo $jumlah_dirawat?></td>
<td align = "center"><?php echo $jumlah_sembuh?></td>
<td align = "center"><?php echo $jumlah_meninggal?></td>
</tr>

</table>
<script>
		window.print()
	</script>
</body>
</html>