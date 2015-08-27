<?php

session_start();

include "database.php";

	

	//$konek = mysql_connect($namahost,$pengguna,$passwd) or die("Gagal koneksi dengan database");

	//$link = mysql_select_db($database,$konek) or die ("login1 telah gagal");



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>form Kuisioner Dosen</title>



</head>



<body>

	<div align = 'center'>

	<h2>Daftar Indeks Pengajaran Dosen Politeknik Perkapalan Negeri Surabaya</h2>
	<h3>2013/2014 Ganjil</h3>

	<table border="1" bordercolor="#FF3300" cellpadding="3" cellspacing="0">

	<tr align = "center" style="background-color:#FF9933" > 

		<td nowrap="nowrap">no.</td>

		<td nowrap="nowrap">dosen</td>

		<td nowrap="nowrap">IPD</td>

	</tr>

	<?php

	$sqldos = "select distinct dos from nilaisemester1 where nilai <> '0' and nrp <>'' and dos not like 'Lab_%' and dos not like 'B_B%' and dos not like 'B_L%' and dos not like 'B_M%' and dos not like 'B_N%' and dos not like 'B_P%' and dos not like 'B_S%' and dos not like 'SG_%' and dos !=''"; //echo $sqldos;

	$rowdos = mysql_query($sqldos, $konek) or die ("login sqldos telah gagal");



	$no = 0;

	while ($dos = mysql_fetch_assoc($rowdos))

	{

		$dosen = $dos['dos'];

		$sqlmk = "select distinct mk from nilaisemester1 where dos='$dosen'";

		$rowmk = mysql_query($sqlmk, $konek) or die ("login sqlmk telah gagal");


		$ipd = 0;
		$ipdtot = 0;
		$no2 = 0;
		while ($mk = mysql_fetch_assoc($rowmk)) 
		{
			$matakuliah = $mk['mk'];
			$sqlnil = "select nilai from nilaisemester1 where dos='$dosen' and mk='$matakuliah'"; //echo $sqlnil;
			$rownil = mysql_query($sqlnil, $konek) or die ("login sqlnil telah gagal");

			$niltotal = 0;
			$count=0;
			$counttot=0;
			while ($nil = mysql_fetch_assoc($rownil))
			{
				$niltotal=$niltotal+$nil['nilai'];
				$count++;
			}
			$rata = $niltotal/$count;
			$rata2 = $rata/10;

			$sqlnmdos = "select lecturer_name from m_lecturer where lecturer_id = '$dosen'"; //echo $sqlnmdos;
			$rownmdos = mysql_query($sqlnmdos, $konek) or die ("login sqlnmdos telah gagal");
			$nmdos = mysql_fetch_assoc($rownmdos);

			$sqlnmmk = "select curriculum_subjectname from curriculum where curriculum_id='$matakuliah'"; //echo $sqlnmmk;
			$rownmmk = mysql_query($sqlnmmk, $konek) or die ("login sqlnmmk telah gagal");
			$nmmk = mysql_fetch_assoc($rownmmk);
			//$niltotal; echo '=======>'; echo $count; echo '=======>'; echo $rata2;
			$no2++;

			$ipdtot = $ipdtot + $rata2;
			$ipd = $ipdtot/$no2;
		}
		$no++;
		?>
			<tr align = "center">
				<td nowrap="nowrap"><?php echo $no;?></td>
				<td nowrap="nowrap" align="left"><?php echo $nmdos['lecturer_name']; ?></td>
				<td nowrap="nowrap"><?php echo round($ipd,2); ?></td>
			</tr>
			<?php
			//echo 
	}
?>

	</table>
	</div>

</body>

</html>