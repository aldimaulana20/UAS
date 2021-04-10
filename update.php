<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$no               = $_POST['no'];
$jumlah_positif   = $_POST['jumlah_positif'];
$jumlah_dirawat   = $_POST['jumlah_dirawat'];
$jumlah_sembuh    = $_POST['jumlah_sembuh'];
$jumlah_meninggal = $_POST['jumlah_meninggal'];   
$wilayah          = $_POST['propinsi'];
 
// // update data ke database
// mysqli_query($koneksi,"update mahasiswa set nama='$nama', nim='$nim', alamat='$alamat' where id='$id'");
 
// // mengalihkan halaman kembali ke index.php
// header("location:index.php");
	switch ($wilayah) {
	case "11";
	$prov = "ACEH";
	break;
	
	case "12";
	$prov = "SUMATERA UTARA";
	break;
	
	case "13";
	$prov = "SUMATERA BARAT";
	break;
	
	case "14";
	$prov = "RIAU";
	break;
	
	case "15";
	$prov = "JAMBI";
	break;
	
	case "16";
	$prov = "SUMATERA SELATAN";
	break;
	
	case "17";
	$prov = "BENGKULU";
	break;
	
	case "18";
	$prov = "LAMPUNG";
	break;
	
	case "19";
	$prov = "KEPULAUAN BANGKA BELITUNG";
	break;
		
	case "21";
	$prov  = "KEPULAUAN RIAU";
	break;
	
	case "31";
	$prov = "DKI JAKARTA";
	break;
	
	case "32":
	$prov = "JAWA BARAT";
	break;
	
	case "33";
	$prov = "JAWA TENGAH";
	break;
	
	case "34";
	$prov = "DI YOGYAKARTA";
	break;
	
	case "35";
	$prov = "JAWA TIMUR";
	break;
	
	case "36";
	$prov = "BANTEN";
	break;
	
	case "51";
	$prov = "BALI";
	break;
	
	case "52";
	$prov = "NUSA TENGGARA BARAT";
	break;
	
	case "53";
	$prov = "NUSA TENGGARA TIMUR";
	break;
	
	case "61";
	$prov = "KALIMANTAN BARAT";
	break;
	
	case "62";
	$prov = "KALIMANTAN TENGAH";
	break;
	
	case "63";
	$prov = "KALIMANTAN SELATAN";
	break;
	
	case "64";
	$prov = "KALIMANTAN TIMUR";
	break;
	
	case "65";
	$prov = "KALIMANTAN UTARA";
	break;
	
	case "71";
	$prov = "SULAWESI UTARA";
	break;
	
	case "72";
	$prov = "SULAWESI TENGAH";
	break;
	
	case "73";
	$prov = "SULAWESI SELATAN";
	break;
	
	case "74";
	$prov = "SULAWESI TENGGARA";
	break;
	
	case "75";
	$prov = "GORONTALO";
	break;
	
	case "76";
	$prov = "SULAWESI BARAT";
	break;
	
	case "81";
	$prov = "MALUKU";
	break;
	
	case "82";
	$prov = "MALUKU UTARA";
	break;
	
	case "91";
	$prov = "PAPUA BARAT";
	break;
	
	case "94";
	$prov = "PAPUA";
	break;
}
    
    // update data ke database
    $input = "UPDATE data_pendaftar set jumlah_positif='$jumlah_positif',jumlah_dirawat='$jumlah_dirawat',jumlah_sembuh='$jumlah_sembuh',jumlah_meninggal='$jumlah_meninggal',wilayah='$prov' WHERE no=$no";
    $query = mysqli_query($con, $input);

    //Tutup koneksi engine MySQL

  if (!$query) {
    die ('SQL Error: ' . mysqli_error($con));
  }

    header("location:tampil.php");
 
?>