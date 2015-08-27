<?
include "database.php";
	
	$konek = mysql_connect($namahost,$pengguna,$passwd) or die("Gagal koneksi dengan database");
	$pilihdatabase = mysql_select_db($database,$konek) or die ("login telah gagal");
	
	$sqldos = "select distinct dos from nilai where (dos like 'Lab_%' or dos like 'B_B%' or dos like 'B_L%' or dos like 'B_M%' or dos like 'B_N%' or dos like 'B_P%' or dos like 'B_S%' or dos like 'SG_%') and nilai <> '0' and nrp <>''"; //echo $sqlnil;
	$rowdos = mysql_query($sqldos) or die ("login nilai telah gagal");
	
	?>
			<h2>Rekap Saran Mahasiswa Kepada Lab., Bengkel, Studio Gambar</h2>
			<br>
			<br>
	<?
	
	while ($dos = mysql_fetch_assoc($rowdos))
	{		
		?>
		<b><? echo $dos['dos'];?></b>
		<br>
		<?
	
		$sqlsaran = "SELECT distinct saran FROM nilai WHERE dos = '$dos[dos]' and saran <>''"; //echo $sqlsaran;
		$rowsaran = mysql_query($sqlsaran) or die ("login nilai telah gagal");

		$no = 1;
		while ($saran = mysql_fetch_assoc($rowsaran))
		{
			echo $no; echo '.  ';
			echo $saran['saran'];
			echo '<br>';
			$no++;
		}	
		echo '+====================================================================================>';
		echo '<br>';
	}
?>
