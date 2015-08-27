<?php
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
include "database.php";

$dos = $_SESSION['dos'];
$username = $_SESSION['mhs'];
$mk = $_SESSION['mk'];
$lab = $_SESSION['lab'];
$kelaslengkap = $_SESSION['kelaslengkap'];
	
	$konek = mysql_connect($namahost,$pengguna,$passwd) or die("Gagal koneksi dengan database");
	mysql_select_db($database,$konek) or die ("konek database poling gagal");

	//$konek2 = mysql_connect($namahost2,$pengguna2,$passwd2) or die("Gagal koneksi dengan database");
	//mysql_select_db($database2,$konek2) or die ("konek database hippo gagal");

if(isset($_POST['submit'])&&$_POST['submit']=='kirim')
{
	$jum = $_POST['jumdos']; //echo $jum;
	$jumlab = $_POST['jumlab']; //echo $jumlab;
	
	$a = 1;
	$nilaitotal = 0;
	$cek = 0;
	//echo $_POST['dosen1'];
	while ($a <= $jum)
	{
		//echo 'dosen';
		//echo $_POST['dosen'.$a];
		//$dose = 'dosen'.$a;
		//$dose = isset($_POST['dosen'.'$a']);
		$dosen =  isset($_POST['dosen'.$a])?$_POST['dosen'.$a]:'';// echo $dosen; echo '<br>';
		$matakul = isset($_POST['mk'.$a])?$_POST['mk'.$a]:'';
		
		$tanya1 = isset($_POST['tanya1'.$matakul.$dosen])?$_POST['tanya1'.$matakul.$dosen]:'';
		$tanya2 = isset($_POST['tanya2'.$matakul.$dosen])?$_POST['tanya2'.$matakul.$dosen]:'';
		$tanya3 = isset($_POST['tanya3'.$matakul.$dosen])?$_POST['tanya3'.$matakul.$dosen]:'';
		$tanya4 = isset($_POST['tanya4'.$matakul.$dosen])?$_POST['tanya4'.$matakul.$dosen]:'';
		$tanya5 = isset($_POST['tanya5'.$matakul.$dosen])?$_POST['tanya5'.$matakul.$dosen]:'';
		$tanya6 = isset($_POST['tanya6'.$matakul.$dosen])?$_POST['tanya6'.$matakul.$dosen]:'';
		$tanya7 = isset($_POST['tanya7'.$matakul.$dosen])?$_POST['tanya7'.$matakul.$dosen]:'';
		$tanya8 = isset($_POST['tanya8'.$matakul.$dosen])?$_POST['tanya8'.$matakul.$dosen]:'';
		$tanya9 = isset($_POST['tanya9'.$matakul.$dosen])?$_POST['tanya9'.$matakul.$dosen]:'';
		$tanya10 = isset($_POST['tanya10'.$matakul.$dosen])?$_POST['tanya10'.$matakul.$dosen]:'';
		$tanya11 = isset($_POST['tanya11'.$matakul.$dosen])?$_POST['tanya11'.$matakul.$dosen]:'';
		$tanya12 = isset($_POST['tanya12'.$matakul.$dosen])?$_POST['tanya12'.$matakul.$dosen]:'';
		$tanya13 = isset($_POST['tanya13'.$matakul.$dosen])?$_POST['tanya13'.$matakul.$dosen]:'';
		$tanya14 = isset($_POST['tanya14'.$matakul.$dosen])?$_POST['tanya14'.$matakul.$dosen]:'';
		$tanya15 = isset($_POST['tanya15'.$matakul.$dosen])?$_POST['tanya15'.$matakul.$dosen]:'';
		$tanya16 = isset($_POST['tanya16'.$matakul.$dosen])?$_POST['tanya16'.$matakul.$dosen]:'';
		$tanya17 = isset($_POST['tanya17'.$matakul.$dosen])?$_POST['tanya17'.$matakul.$dosen]:'';
		$tanya18 = isset($_POST['tanya18'.$matakul.$dosen])?$_POST['tanya18'.$matakul.$dosen]:'';
		$tanya19 = isset($_POST['tanya19'.$matakul.$dosen])?$_POST['tanya19'.$matakul.$dosen]:'';
		$tanya20 = isset($_POST['tanya20'.$matakul.$dosen])?$_POST['tanya20'.$matakul.$dosen]:'';
		$tanya21 = isset($_POST['tanya21'.$matakul.$dosen])?$_POST['tanya21'.$matakul.$dosen]:'';
		$tanya22 = isset($_POST['tanya22'.$matakul.$dosen])?$_POST['tanya22'.$matakul.$dosen]:'';
		$tanya23 = isset($_POST['tanya23'.$matakul.$dosen])?$_POST['tanya23'.$matakul.$dosen]:'';
		$tanya24 = isset($_POST['tanya24'.$matakul.$dosen])?$_POST['tanya24'.$matakul.$dosen]:'';
		$tanya25 = isset($_POST['tanya25'.$matakul.$dosen])?$_POST['tanya25'.$matakul.$dosen]:'';
		$tanya26 = isset($_POST['tanya26'.$matakul.$dosen])?$_POST['tanya26'.$matakul.$dosen]:'';
		$tanya27 = isset($_POST['tanya27'.$matakul.$dosen])?$_POST['tanya27'.$matakul.$dosen]:'';
		$tanya28 = isset($_POST['tanya28'.$matakul.$dosen])?$_POST['tanya28'.$matakul.$dosen]:'';
		$tanya29 = isset($_POST['tanya29'.$matakul.$dosen])?$_POST['tanya29'.$matakul.$dosen]:'';
		$tanya30 = isset($_POST['tanya30'.$matakul.$dosen])?$_POST['tanya30'.$matakul.$dosen]:'';
		$tanya31 = isset($_POST['tanya31'.$matakul.$dosen])?$_POST['tanya31'.$matakul.$dosen]:'';
		$tanya32 = isset($_POST['tanya32'.$matakul.$dosen])?$_POST['tanya32'.$matakul.$dosen]:'';
		$tanya33 = isset($_POST['tanya33'.$matakul.$dosen])?$_POST['tanya33'.$matakul.$dosen]:'';
		$tanya34 = isset($_POST['tanya34'.$matakul.$dosen])?$_POST['tanya34'.$matakul.$dosen]:'';
	
		$saran = isset($_POST['saran'.$a.$dosen])?$_POST['saran'.$a.$dosen]:'';
	
		//$nilaitotal = $tanya0 +$tanya1 +$tanya2 +$tanya3 +$tanya4 +$tanya5 +$tanya6 +$tanya7 +$tanya8 +$tanya9 ; //echo $nilaitotal;

		if(!empty($username))
		{
			//$sqlceki = "SELECT * FROM m_student"; echo $sqlceki;
			$sqlceki = "SELECT * FROM nilai WHERE nrp='$username' and dos='$dosen'and mk='$matakul'"; //echo $sqlceki;
			$rowceki = mysql_query($sqlceki) or die ("cek isi database nilai gagal");
			$ceki = mysql_fetch_assoc($rowceki);
			if(empty($ceki['nrp']))
			{
				$sqlins = "insert into nilai values ('$username', '$kelaslengkap', '$dosen', '$matakul', '$tanya1','$tanya2', '$tanya3','$tanya4','$tanya5','$tanya6','$tanya7','$tanya8','$tanya9','$tanya10','$tanya11','$tanya12','$tanya13','$tanya14','$tanya15','$tanya16','$tanya17','$tanya18','$tanya19','$tanya20','$tanya21','$tanya22','$tanya23','$tanya24','$tanya25','$tanya26','$tanya27','$tanya28','$tanya29','$tanya30','$tanya31','$tanya32','$tanya33','$tanya34','$saran')"; //echo $sqlins;
				mysql_query($sqlins) or die ("login insert gagal");
				$sqldel = "delete from nilai where `1`='0' and `2`='0' and `3`='0' and `4`='0' and `5`='0' and `6`='0' and `7`='0' and `8`='0' and `9`='0' and `10`='0' and `11`='0' and `12`='0' and `13`='0' and `14`='0' and `15`='0' and `16`='0' and `17`='0' and `18`='0' and `19`='0' and `20`='0' and `21`='0' and `21`='0' and `22`='0' and `23`='0' and `24`='0' and `25`='0' and `26`='0' and `27`='0' and `28`='0' and `29`='0' and `30`='0' and `31`='0' and `32`='0' and `33`='0' and `34`='0'";
			}
			else
			{
				$pesan =1;
			}
		}
		$a++;
	}
	
	$b = 1;
	$nilaitotallab = 0;
	$ceklab = 0;
	//echo $jumlab;
	while ($b <= $jumlab)
	{
		//echo 'tanyalab';
		$lab = isset($_POST['lab'.$b])?$_POST['lab'.$b]:''; //echo $lab; echo '.';
		$tanyalab1 = isset($_POST['tanya1'.$lab])?$_POST['tanya1'.$lab]:''; //echo $tanyalab1; echo '<br>';
		$tanyalab2 = isset($_POST['tanya2'.$lab])?$_POST['tanya2'.$lab]:'';
		$tanyalab3 = isset($_POST['tanya3'.$lab])?$_POST['tanya3'.$lab]:'';
		$tanyalab4 = isset($_POST['tanya4'.$lab])?$_POST['tanya4'.$lab]:'';
		$tanyalab5 = isset($_POST['tanya5'.$lab])?$_POST['tanya5'.$lab]:'';
		$tanyalab6 = isset($_POST['tanya6'.$lab])?$_POST['tanya6'.$lab]:'';
		$tanyalab7 = isset($_POST['tanya7'.$lab])?$_POST['tanya7'.$lab]:'';
		$tanyalab8 = isset($_POST['tanya8'.$lab])?$_POST['tanya8'.$lab]:'';
		$tanyalab9 = isset($_POST['tanya9'.$lab])?$_POST['tanya9'.$lab]:'';
		$tanyalab10 = isset($_POST['tanya10'.$lab])?$_POST['tanya10'.$lab]:'';
		$tanyalab11 = isset($_POST['tanya11'.$lab])?$_POST['tanya11'.$lab]:'';
		$tanyalab12 = isset($_POST['tanya12'.$lab])?$_POST['tanya12'.$lab]:'';
		$tanyalab13 = isset($_POST['tanya13'.$lab])?$_POST['tanya13'.$lab]:'';
		$tanyalab14 = isset($_POST['tanya14'.$lab])?$_POST['tanya14'.$lab]:'';
		$tanyalab15 = isset($_POST['tanya15'.$lab])?$_POST['tanya15'.$lab]:'';
		$tanyalab16 = isset($_POST['tanya16'.$lab])?$_POST['tanya16'.$lab]:'';
		$tanyalab17 = isset($_POST['tanya17'.$lab])?$_POST['tanya17'.$lab]:'';
		
		$saranlab = isset($_POST['saran'.$lab])?$_POST['saran'.$lab]:'';
		
		$nilaitotallab = $tanyalab1 + $tanyalab2 + $tanyalab3 + $tanyalab4 + $tanyalab5 + $tanyalab6 + $tanyalab7 + $tanyalab8 + $tanyalab9 + $tanyalab10 + $tanyalab11 + $tanyalab12 + $tanyalab13 + $tanyalab14 + $tanyalab15 + $tanyalab16 + $tanyalab17;
		//echo $nilaitotallab; echo '<br>';

		if(!empty($username))
		{
			$sqldelnol = "delete from nilailab where nilai ='0' or nilai =''";
			mysql_query($sqldelnol) or die ("login delete nilai 0 gagal");

			$sqlcekj = "SELECT * FROM nilailab WHERE nrp='$username' and dos='$lab'"; //echo $sqlcekj; echo '<br>';
			$rowcekj = mysql_query($sqlcekj) or die ("login cek lab gagal");
			$cekj = mysql_fetch_assoc($rowcekj);
			if(empty($cekj['dos']))
			{
				$sqlinslab = "insert into nilailab values ('$username', '$lab', '', '$nilaitotallab', '$saranlab')"; //echo $sqlinslab;
				mysql_query($sqlinslab) or die ("login insert lab gagal");
			}
			else
			{
				$pesan=2;
			}
		}
		$nilaitotallab;
		$b++;
	}
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: logout.php" );
	session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<title>form Kuisioner Dosen dan Laboratorium</title>

<link href="login-box.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script>

</head>

<body>

<div style="padding: 100px 0 0 250px;" align="left">

<form action="" method="POST" name="form1" id="form1" >
			<B>FORM KUISIONER untuk DOSEN </B><br>
			Ket. Range Nilai 1 = Sangat Tidak Setuju / 4 = Sangat Setuju<br>
			mata kuliah yang tidak ada dosen nya kemungkinan besar diajar oleh teknisi kuisioner boleh diisi boleh tidak
			<br><br>
			<?
			$count=1;
			while ($a = each($dos))
			{
				$sqldose = "SELECT lecturer_name FROM m_lecturer WHERE lecturer_id='$a[1]'"; //echo $sqldose;
				$rowdose = mysql_query($sqldose) or die ("gagal cari nama dosen");
				$dose = mysql_fetch_assoc($rowdose);
				
				$matkul = $mk[$count-1]; //echo $matkul;
				$sqlnmmk = "SELECT distinct curriculum_subjectname FROM curriculum WHERE curriculum_id='$matkul'"; //echo $sqlmhs;
				$rownmmk = mysql_query($sqlnmmk) or die ("gagal cari nama mk");
				$nmmk = mysql_fetch_assoc($rownmmk);
				?>
				<input name="dosen<? echo $count;?>" value="<? echo $a[1];?>" type="hidden"> <? echo $dose['lecturer_name']; echo '    - ['; echo $nmmk['curriculum_subjectname']; echo ']    ';?>
				<input name="mk<? echo $count;?>" value="<? echo $matkul;?>" type="hidden">

				<br>
				
				<table id="table">
				<label>
				<tr>
					<td>1.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Kesiapan memberikan kuliah dan atau praktek)</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Kelengkapan persiapan mengajar (meliputi: SAP, media ajar, problem solving))</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Ketepatan kehadiran dosen)</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>4.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Lama waktu tatap muka sesuai SKS (1 SKS 100 menit))</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>5.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Upaya membangkitkan minat mahasiswa pada mata kuliah ini di awal kuliah)</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>6.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Kemampuan menghidupkan suasana kelas)</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>7.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Kesesuaian materi yang diberikan dan kompetensi yang ditetapkan)</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>8.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Kemampuan mengarahkan diskusi sehingga mencapai sasaran)</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>9.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Keragaman metode pembelajaran (ceramah, diskusi, SCL, tanya jawab))</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>10.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Keragaman sumber belajar (referensi, kasus lapangan, pengalaman, dll))</td>
					<td><input name="tanya10<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya10<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya10<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya10<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>11.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Pemanfaatan media dan teknologi pembelajaran)</td>
					<td><input name="tanya11<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya11<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya11<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya11<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>12.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Pemberian tugas terstruktur (paper, rangkuman, latihan soal/pemecahan masalah, dll))</td>
					<td><input name="tanya12<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya12<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya12<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya12<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>13.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Pemberian umpan balik sebelum perkuliahan berakhir)</td>
					<td><input name="tanya13<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya13<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya13<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya13<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>14.</td>
					<td>KOMPETENSI PEDAGOGIK <br> (Kesesuaian materi ujian dan atau tugas dengan tujuan kompetensi mata kuliah)</td>
					<td><input name="tanya14<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya14<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya14<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya14<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>15.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Penguasaan terhadap materi pembelajaran)</td>
					<td><input name="tanya15<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya15<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya15<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya15<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>16.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Kemampuan menjelaskan pokok bahasan/topik secara sistematis)</td>
					<td><input name="tanya16<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya16<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya16<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya16<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>17.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Kemampuan memberi contoh relevan dari konsep yang diajarkan)</td>
					<td><input name="tanya17<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya17<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya17<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya17<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>18.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Kedalaman dan keleluasaan dalam membahas contoh kasus)</td>
					<td><input name="tanya18<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya18<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya18<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya18<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>19.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan bidang/topik lain)</td>
					<td><input name="tanya19<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya19<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya19<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya19<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>20.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan konteks kehidupan)</td>
					<td><input name="tanya20<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya20<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya20<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya20<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>21.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan)</td>
					<td><input name="tanya21<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya21<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya21<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya21<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>22.</td>
					<td>KOMPETENSI PROFESIONAL <br> (Kemampuan menggunakan beragam teknologi komunikasi untuk pengayaan materi ajar)</td>
					<td><input name="tanya22<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya22<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya22<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya22<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>23.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Rasa percaya diri akan kemampuan mengajar)</td>
					<td><input name="tanya23<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya23<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya23<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya23<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>24.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Kewibawaan sebagai pribadi dosen)</td>
					<td><input name="tanya24<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya24<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya24<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya24<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>25.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Kearifan dalam mengambil keputusan (menyelesaikan persoalan mahasiswa))</td>
					<td><input name="tanya25<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya25<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya25<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya25<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>26.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Menjadi contoh dalam bersikap dan berperilaku)</td>
					<td><input name="tanya26<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya26<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya26<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya26<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>27.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Satunya kata dan tindakan (konsisten))</td>
					<td><input name="tanya27<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya27<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya27<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya27<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>28.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Kemampuan mengendalikan diri dalam berbagai situasi)</td>
					<td><input name="tanya28<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya28<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya28<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya28<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>29.</td>
					<td>KOMPETENSI KEPRIBADIAN <br> (Adil dalam memperlakuka mahasiswa)</td>
					<td><input name="tanya29<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya29<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya29<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya29<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>30.</td>
					<td>KOMPETENSI SOSIAL <br> (Kemampuan menerima kritik, saran, dan pendapat orang lain)</td>
					<td><input name="tanya30<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya30<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya30<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya30<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>31.</td>
					<td>KOMPETENSI SOSIAL <br> (Kesediaan meluangkan waktu konsultasi di luar kelas)</td>
					<td><input name="tanya31<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya31<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya31<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya31<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>32.</td>
					<td>KOMPETENSI SOSIAL <br> (Mengenal dengan baik mahasiswa yang mengikuti kuliahnya)</td>
					<td><input name="tanya32<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya32<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya32<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya32<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>33.</td>
					<td>KOMPETENSI SOSIAL <br> (Mudah bergaul dengan mahasiswa)</td>
					<td><input name="tanya33<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya33<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya33<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya33<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>34.</td>
					<td>KOMPETENSI SOSIAL <br> (Toleransi terhadap keberagaman mahasiswa)</td>
					<td><input name="tanya34<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya34<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya34<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya34<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				</label>
				</table>
				Saran untuk Dosen :  <input name="saran<? echo $count; echo $a[1];?>" type="textarea" size='100' maxlength='100'/>
				<br>
				<br>
				<br>
				<?
				$jumdos = $count;
				$count++;
			}
			
			
			?>
			<b>
			FORM KUISIONER untuk LABORATORIUM, BENGKEL, dan STUDIO GAMBAR <br><br>
			KET:<br>
			SG : Studio Gambar<br>
			B : Bengkel<br>
			Lab : Lab<br>
			</b>
			<br>
			<?
			$count2=1;
			while ($b = each($lab))
			{
				if(!empty($b[1]))
				{ 
					$b2 = $b[1];
					$rownmlab = "SELECT distinct room_name FROM m_room where room_id ='$b2' and room_type='2'"; //echo $rownmlab;
					$rownmlab2 = mysql_query($rownmlab) or die ("gagal cari nama dosen");
					$nmlab = mysql_fetch_assoc($rownmlab2);
					if(!empty($nmlab['room_name']))
					{
				?>
					<input name="lab<? echo $count2;?>" value="<? echo $b2;?>" type="hidden">
					<table id="table">
					<label>
					<tr>
						<td colspan="2"><b>PELAYANAN di <?echo $nmlab['room_name'];?></b></td>
					</tr>
					<tr>
						<td>1.</td>
						<td>Sistem administrasi dan informasi</td>
						<td><input name="tanya1<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya1<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya1<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya1<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>2.</td>
						<td>Ketersediaan petunjuk pratikum</td>
						<td><input name="tanya2<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya2<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya2<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya2<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>3.</td>
						<td>Ketersediaan alat dan bahan praktek</td>
						<td><input name="tanya3<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya3<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya3<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya3<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>4.</td>
						<td>Pelaksanaan ujian praktek</td>
						<td><input name="tanya4<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya4<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya4<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya4<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>5.</td>
						<td>Pengumuman nilai ujian praktek</td>
						<td><input name="tanya5<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya5<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya5<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya5<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>6.</td>
						<td>Kecepatan dalam menyelesaikan keluhan terkait sarana prasarana</td>
						<td><input name="tanya6<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya6<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya6<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya6<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>7.</td>
						<td>Keramahan dalam pelayanan kepada mahasiswa</td>
						<td><input name="tanya7<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya7<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya7<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya7<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>8.</td>
						<td>Kedisiplinan dan ketepatan waktu pratikum</td>
						<td><input name="tanya8<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya8<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya8<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya8<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>9.</td>
						<td>Kepedulian terhadap keselamatan dan kesehatan dalam bekerja dan belajar</td>
						<td><input name="tanya9<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya9<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya9<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya9<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td colspan="2"><b>SARANA PRASARANA di <?echo $nmlab['room_name'];?></b></td>
					</tr>
					<tr>
						<td>10.</td>
						<td>Tata letak ruangan</td>
						<td><input name="tanya10<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya10<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya10<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya10<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>11.</td>
						<td>Kesiapan peralatan pratikum</td>
						<td><input name="tanya11<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya11<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya11<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya11<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>12.</td>
						<td>Ketersediaan alat  bantu ajar (LCD, OHP, papan tulis, spidol, dll)</td>
						<td><input name="tanya12<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya12<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya12<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya12<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>13.</td>
						<td>Kebersihan ruang pratikum / praktek</td>
						<td><input name="tanya13<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya13<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya13<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya13<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>14.</td>
						<td>Kenyamanan ruang pratikum / praktek</td>
						<td><input name="tanya14<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya14<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya14<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya14<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>15.</td>
						<td>Kebersihan toilet</td>
						<td><input name="tanya15<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya15<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya15<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya15<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>16.</td>
						<td>Ketersediaan perlengkapan K3</td>
						<td><input name="tanya16<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya16<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya16<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya16<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					<tr>
						<td>17.</td>
						<td>Ketersediaan koneksi Internet di Lab dan bengkel</td>
						<td><input name="tanya17<?echo $b[1];?>" type="radio" value="1" />1</td>
						<td><input name="tanya17<?echo $b[1];?>" type="radio" value="2" />2</td>
						<td><input name="tanya17<?echo $b[1];?>" type="radio" value="3" />3</td>
						<td><input name="tanya17<?echo $b[1];?>" type="radio" value="4" />4</td>
					</tr>
					</label>
					</table>
					Saran :  <input name="saran<? echo $b[1];?>" type="textarea" size='100' maxlength='100'/>
					<br><br>
				<?
					}
			
				}
				$jumlab = $count2; //echo $jumlab;
				$count2++;
			}
			?>
<input type="submit" name="submit" value="kirim" />
<input type="hidden" name="jumdos" value="<? echo $jumdos;?>" />
<input type="hidden" name="jumlab" value="<? echo $jumlab;?>" />
</form>
<?php
if(isset($pesan))
{
	if($pesan==1)
	{
		$sqlnmdos = "SELECT lecturer_name FROM m_lecturer WHERE lecturer_id='$a[1]'";
		$rownmdos = mysql_query($sqlnmdos) or die ("login cek nama dosen udah pernah diinput gagal");
		$nmdos = mysql_fetch_assoc($rownmdos);
		echo 'anda sudah pernah memasukkan nilai untuk dosen';
		echo $nmdos['lecturer_name']; 
		echo '<br>';
	}
	if($pesan==2)
	{
		echo 'anda sudah pernah memasukkan nilai lab';
	}
	
	echo '<a href="index.php">Silahkan Kembali ke Halaman Login</a>';
}
?>
</div>
</body>
</html>
