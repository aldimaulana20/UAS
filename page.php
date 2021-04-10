<?php 
	session_start();
	//pemeriksaan session
	if (isset($_SESSION['Nama'])) {
		//jika sudah login
		//menampilkan isi session
		
		} else {
			//session belum ada artinya belum login
			die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
			ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
		}
?>

<html>
<head>
<title>DATA PEMANTAUAN COVID-19 DI INDONESIA</title>
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script>
		$(document).ready(function(){
			$('#propinsi').change(function(){
				var propinsi_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'prop_id='+propinsi_id, //$_POST['prov_id']
					success : function(response){
						$('#kota').html(response);
					}
				});
			})
		});

		$(document).ready(function(){
			$('#kota').change(function(){
				var kabupatenkota_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'kabkota_id='+kabupatenkota_id, //$_POST['kabkot_id']
					success : function(response){
						$('#kecamatan').html(response);
					}
				});
			})
		});

	</script>
<style type="text/css">
    body { 
        max-width: 500px; margin: auto; 
    }

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #E0FFFF;
    text-align: left;
    padding: 8px;
    }

    tr{
    background-color:#E0FFFF;
    }

    p {
    	font-family: arial, sans-serif;
    }

    a {
    	color: grey;
    }

</style>

	<?php
    include("koneksi.php");     
  	?>

</head>
<body>


	<h3><p align="center"><big>Form Input Data Pemantauan Covid-19</big><br/></p></h3>
	<p align="center">Operator <?php echo $_SESSION['Nama'];?> / <?php echo $_SESSION['NIM'];?></p>
	<form action="simpan.php" method="post" enctype="multipart/form-data" name="inputdata">
	<table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
	    <tr>
	        <td>Nama Wilayah</td>
	        <td>
	        	 <?php 
					$sql_propinsi = mysqli_query($con, 'select * from propinsi order by name asc');
				 ?>
				 <select name="propinsi" id="propinsi" required="">
				 	<option value="">Pilih Propinsi</option>
				 	<?php 
				 		while($row_propinsi = mysqli_fetch_array($sql_propinsi)){
				 	?>
				 	<option value="<?php echo $row_propinsi['id'] ?>">
				 		<?php echo $row_propinsi['name'] ?>
				 	</option>	
				 	<?php } ?>
                  </select><br>
	        </td>
	    </tr>
	    <tr>
	        <td>Kab/Kota</td>
	        <td>
	        	<select name="kota" id="kota" required="">
			 		<option>Pilih Kota</option>
			 		<option></option>
		 		</select>
	        </td>
	    </tr>
	    <tr>
	    	<tr>
	        <td>Kecamatan</td>
	        <td>
	        	<select name="kecamatan" id="kecamatan" required="">
			 		<option>Pilih Kecamatan</option>
			 		<option></option>
		 		</select>
	        </td>
	    </tr>
	    <tr>
	    	<tr>
	        <td>No</td>
	        <td><input type="text" name="no" size="20" required=""></td>
	    </tr>
	    <tr>
	        <td>Jumlah Positif</td>
	        <td><input type="text" name="jumlah_positif" size="20" required=""></td>
	    </tr>
	    <tr>
	        <td>Jumlah Dirawat</td>
	        <td><input type="text" name="jumlah_dirawat" size="20" required=""></td>
	    </tr>
	    <tr>
	        <td>Jumlah Sembuh</td>
	        <td><input type="text" name="jumlah_sembuh" size="20" required=""></td>
	    </tr>
	    <tr>
	        <td>Jumlah Meninggal</td>
	        <td><input type="text" name="jumlah_meninggal" size="20" required=""></td>
	    </tr>
	    <tr>
	        <td>&nbsp;</td>
	        <td><input type="submit" value="Submit" name="submit">
	        <input type="reset" value="reset" name="reset"></td>
	    </tr>
	</table>
	<p align="right">
	<a href="tampil.php" style="color : blue"><b>Lihat Data</b></a> &nbsp
	<a href='logout.php' style="color : blue"><b>Logout</b></a>
	</p>
	</form>

	<p align="center"><br>
	<br>

</body>
</html>