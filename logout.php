<?php
	/****************************************************
	Halaman ini merupakan halaman logout, dimana kita menghapus session yang ada.
	*****************************************************/
	session_start();
	if (isset($_SESSION['Nama'])) {
		unset ($_SESSION);
		session_destroy();
		//
		echo "<p style= text-align:center>Anda sudah berhasil LOGOUT</p>";
		echo "<p style= text-align:center>Klik <a href='login.php'>di sini</a> untuk
		LOGIN kembali</p>";
	}
?>