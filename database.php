<?php
	$namahost = "localhost";
	$pengguna = "ppipd";
	$passwd = "2015prestasidosen";
	$database = "ppipd_main";

	//$namahost2 = "localhost";
	//$pengguna2 = "ipd";
	//$passwd2 = "dpi";
	//$database2 = "hippo";

	$konek = mysql_connect($namahost,$pengguna,$passwd) or die("Gagal koneksi dengan database");
	mysql_select_db($database,$konek) or die ("login1 telah gagal");

			//$konek2 = mysql_connect($namahost2,$pengguna2,$passwd2, true) or die("Gagal koneksi dengan database");
			//mysql_select_db($database2,$konek2) or die ("login2 telah gagal");

?>
