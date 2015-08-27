<?

include "database.php";

	

	$sqldos = "select distinct dos from nilai where nilai <> '0' and nrp <>'' and dos not like 'Lab_%' and dos not like 'B_B%' and dos not like 'B_L%' and dos not like 'B_M%' and dos not like 'B_N%' and dos not like 'B_P%' and dos not like 'B_S%' and dos not like 'SG_%'"; //echo $sqlnil;

	$rowdos = mysql_query($sqldos, $konek) or die ("login nilai telah gagal");

	

	?>

			<h2>Rekap Saran Mahasiswa Kepada Dosen</h2>

			<br>

			<br>

	<?

	

	while ($dos = mysql_fetch_assoc($rowdos))

	{

		$dosen = $dos['dos'];

		$sqlnmdos = "select lecturer_name from lecturer where lecturer_id = '$dosen'";

		$rownmdos = mysql_query($sqlnmdos, $konek2) or die ("login sqlnmdos telah gagal");

		$nmdos = mysql_fetch_assoc($rownmdos);

		

		?>

		<b><? echo $nmdos['lecturer_name']?></b>

		<br><br>

		<?



		$sqlmk = "select distinct mk from nilai where dos='$dosen'";

		$rowmk = mysql_query($sqlmk, $konek) or die ("login sqlmk telah gagal");



		while ($mk = mysql_fetch_assoc($rowmk))

		{

			$mk=$mk['mk'];

			$sqlnamamk = "select curriculum_subjectname from curriculum where curriculum_id='$mk'";

			$rownamamk = mysql_query($sqlnamamk, $konek2) or die ("login sqlnamamk telah gagal");

			$namamk = mysql_fetch_assoc($rownamamk);

			

			?>

			<b><? echo $namamk['curriculum_subjectname']?></b>

			<br>

			<?



			$sqlsaran = "SELECT distinct saran FROM nilai WHERE dos = '$dos[dos]' and mk='$mk' and saran <> ''"; //echo $sqlsaran;

			$rowsaran = mysql_query($sqlsaran, $konek) or die ("login nilai telah gagal");



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

	}

?>