<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		h2 {
			text-align: center;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
		}
		.kotak_login {

			margin: 20px auto;
	        width: 400px;
	        padding: 10px;
	        border: 1px solid #ccc;
	        background: lightblue;
	        font-family: "segoe-ui", "open-sans", tahoma, arial;
		}

		input[type=text], input[type=password] {
        margin: 5px auto;
        width: 150%;
        padding: 10px;
   		}
	    input[type=submit] {
	        margin 5px auto;
	        float: right;
	        padding: 5px;
	        width: 90px;
	        border: 1px solid #fff;
	        color: #fff;
	        background: grey;
	        cursor: pointer;
	    }
	</style>
</head>
<body>
 
	<h2> SILAHKAN LOGIN TERLEBIH DAHULU !</h2>
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
 
		<form action="cek_login.php" method="post">
		<table > 
			<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" class="form_login" placeholder="Masukkan No. Handphone" required="required"><td>
			</tr>
			
			<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" class="form_login" placeholder="Masukkan Password" required="required"></td>
			</tr>
			
			<tr> 
			<td>&nbsp;</td> 
			</tr>
			
			<tr>
			<td>&nbsp;</td> 
			<td>&nbsp;</td>
			<td><input type="submit" class="tombol_login" value="LOGIN"></td>
			</tr>
			</table>
		</form>
		
	</div>
 
 
</body>
</html>