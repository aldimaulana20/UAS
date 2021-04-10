<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no = $_GET['no'];
 
 
// menghapus data dari database
$input = "DELETE from data_pendaftar where no='$no'";
    $query = mysqli_query($con, $input);
 
 if (!$query) {
    die ('SQL Error: ' . mysqli_error($con));
  }

    header("location:tampil.php");
 
?>