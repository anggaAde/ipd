<?php
session_start();
include "database.php";

include "database.php";
if(isset($_POST['submit']))
{
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>form Kuisioner Dosen</title>
</head>
<body>

	<div align = 'center'>

	<h2>Indeks Prestasi Dosen</h2>
	<h4>Semester Ganjil 2014/2015</h4>

	<table border="1" bordercolor="#FF3300" cellpadding="3" cellspacing="0">

	<tr align = "center" style="background-color:#FF9933" > 

		<td nowrap="nowrap">no.</td>

		<td nowrap="nowrap">dosen</td>

		<td nowrap="nowrap">Mata Kuliah</td>

		<td nowrap="nowrap">nilai pedagogik</td>
		<td nowrap="nowrap">nilai profesional</td>
		<td nowrap="nowrap">nilai kepribadian</td>
		<td nowrap="nowrap">nilai sosial</td>

		<td nowrap="nowrap">dari jumlah mahasiswa</td>
		<td nowrap="nowrap">jumlah kelas</td>

	</tr>

	<?php
	$iddos = $_POST['dosen'];
	//$sqldos = "select distinct dos from nilai where nilai <> '0' and nrp <>'' and dos not like 'Lab_%' and dos not like 'B_B%' and dos not like 'B_L%' and dos not like 'B_M%' and dos not like 'B_N%' and dos not like 'B_P%' and dos not like 'B_S%' and dos not like 'SG_%'"; //echo $sqldos;
	//$sqldos = "select distinct dos from nilai where dos IS NOT NULL"; //echo $sqldos;
	$sqldos = "select distinct dos from nilai where dos ='$iddos'"; //echo $sqldos;
	$rowdos = mysql_query($sqldos, $konek) or die ("login sqldos telah gagal");



	$no = 1;

	while ($dos = mysql_fetch_assoc($rowdos))

	{

		$dosen = $dos['dos'];

		$sqlmk = "select distinct mk from nilai where dos='$dosen' and (kelas like '_1%' or kelas like '_3%' or kelas like '_5%' or kelas like '_7%' or kelas like '%1_' or kelas like '%3_' or kelas like '%5_' or kelas like '%7_')"; //echo $sqlmk;

		$rowmk = mysql_query($sqlmk, $konek) or die ("login sqlmk telah gagal");

		$rata1=0;
		$rata2=0;
		$rata3=0;
		$rata4=0;

		$totpedagogik=0;
		$totprofesional=0;
		$totkepribadian=0;
		$totsosial=0;
		$ipd=0;
		$kelas = 0;
		while ($mk = mysql_fetch_assoc($rowmk)) 
		{
			
			$matakuliah = $mk['mk'];

			$sqlkelas = "select distinct kelas from nilai where mk = '$matakuliah' and dos='$dosen'"; //echo $sqlkelas;
			$rowkelas = mysql_query($sqlkelas, $konek) or die ("login sqlkelas telah gagal");
			$kelas = mysql_num_rows($rowkelas);

			$sqlnil = "select * from nilai where dos='$dosen' and mk='$matakuliah'";//echo $sqlnil;

			$rownil = mysql_query($sqlnil, $konek) or die ("login sqlnil telah gagal");

			

			$niltotal = 0;

			$count=0;

			$nilpedagogik = 0;
			$nilprofesional = 0;
			$nilkepribadian = 0;
			$nilsosial = 0;

			while ($nil = mysql_fetch_assoc($rownil))

			{

				$nilpedagogikmhs=($nil['n1']+$nil['n2']+$nil['n3']+$nil['n4']+$nil['n5']+$nil['n6']+$nil['n7']+$nil['n8']+$nil['n9']+$nil['n10']+$nil['n11']+$nil['n12']+$nil['n13']+$nil['n14'])/14;
				$nilprofesionalmhs=($nil['n15']+$nil['n16']+$nil['n17']+$nil['n18']+$nil['n19']+$nil['n20']+$nil['n21']+$nil['n22'])/8;
				$nilkepribadianmhs=($nil['n23']+$nil['n24']+$nil['n25']+$nil['n26']+$nil['n27']+$nil['n28']+$nil['n29'])/7;
				$nilsosialmhs=($nil['n30']+$nil['n31']+$nil['n32']+$nil['n33']+$nil['n34'])/5;

				$nilpedagogik = $nilpedagogik+$nilpedagogikmhs;
				$nilprofesional = $nilprofesional+$nilprofesionalmhs;
				$nilkepribadian = $nilkepribadian+$nilkepribadianmhs;
				$nilsosial = $nilsosial+$nilsosialmhs;
				$count++;

			}

			$rata1 = $nilpedagogik/$count;
			$rata2 = $nilprofesional/$count;
			$rata3 = $nilkepribadian/$count;
			$rata4 = $nilsosial/$count;
		
			$sqlnmdos = "select lecturer_name from m_lecturer where lecturer_id = '$dosen'"; //echo $sqlnmdos;

			$rownmdos = mysql_query($sqlnmdos, $konek) or die ("login sqlnmdos telah gagal");

			$nmdos = mysql_fetch_assoc($rownmdos);

			

			$sqlnmmk = "select distinct curriculum_subjectname, curriculum_program, curriculum_semester from curriculum where curriculum_id='$matakuliah'"; //echo $sqlnmmk;
			$rownmmk = mysql_query($sqlnmmk, $konek) or die ("login sqlnmmk telah gagal");
			$nmmk = mysql_fetch_assoc($rownmmk);

			$idprog = $nmmk['curriculum_program'];
			if ($idprog=='') {$idprog='111';}
			$sqlprog = "select distinct program_shortname from m_program where program_id = $idprog"; //echo $sqlprog;
			$rowprog = mysql_query($sqlprog, $konek) or die ("login sqlprog telah gagal");
			$prog = mysql_fetch_assoc($rowprog);
			//$prog['program_shortname']
			?>

			

			<tr align = "center">

				<td nowrap="nowrap"><?php echo $no;?></td>

				<td nowrap="nowrap" align="left"><?php echo $nmdos['lecturer_name']; ?></td>

				<td nowrap="nowrap"><?php echo $nmmk['curriculum_subjectname'].'('.$prog['program_shortname'].'. Sem '.$nmmk['curriculum_semester'].')'; ?></td>

				<td nowrap="nowrap"><?php echo round($rata1,2); ?></td>
				<td nowrap="nowrap"><?php echo round($rata2,2); ?></td>
				<td nowrap="nowrap"><?php echo round($rata3,2); ?></td>
				<td nowrap="nowrap"><?php echo round($rata4,2); ?></td>

				<td nowrap="nowrap"><?php echo $count;?></td>
				<td nowrap="nowrap"><?php echo $kelas;?></td>

			</tr>
			<?php

			//echo $niltotal; echo '=======>'; echo $count; echo '=======>'; echo $rata2;

			$totpedagogik = $totpedagogik+$rata1; //echo $totpedagogik.'</br>';
			$totprofesional = $totprofesional+$rata2;
			$totkepribadian = $totkepribadian+$rata3;
			$totsosial = $totsosial+$rata4;
			$no++;
		}

		$totpedagogik2 = $totpedagogik/($no-1); //echo $totpedagogik.'</br>';
		$totprofesional2 = $totprofesional/($no-1);
		$totsosial2 = $totsosial/($no-1);
		$totkepribadian2 = $totkepribadian/($no-1);

		$ipd = round(($totsosial2+$totkepribadian2+$totprofesional2+$totpedagogik2),2)/4;
		?>
		<tr align="center">
			<td></td>
			<td></td>
			<td>Rata-rata</td>
			<td><?php echo round($totpedagogik2,2);?></td>
			<td><?php echo round($totprofesional2,2);?></td>
			<td><?php echo round($totkepribadian2,2);?></td>
			<td><?php echo round($totsosial2,2);?></td>
			<td></td>
			<td></td>
		</tr>
		<tr align="center">
			<td></td>
			<td></td>
			<td>IPD</td>
			<td colspan="4"><?php echo round($ipd,2);?></td>
			<td></td>
			<td></td>
		</tr>
		<?php
	}

?>

	</table>
	</div>
</body>

</html>