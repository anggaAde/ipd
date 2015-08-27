<?php
session_start();
include "database.php";

$dos = $_SESSION['dos'];
$username = $_SESSION['mhs'];
$mk = $_SESSION['mk'];
$lab = $_SESSION['lab'];
	
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
	while ($a <= $jum)
	{
		$dosen = isset($_POST['dosen.$a']);
		$matakul = isset($_POST['mk.$a']);
		
		$tanya0 = isset($_POST['tanya0.$matakul.$dosen']);
		$tanya1 = isset($_POST['tanya1.$matakul.$dosen']);
		$tanya2 = isset($_POST['tanya2.$matakul.$dosen']);
		$tanya3 = isset($_POST['tanya3.$matakul.$dosen']);
		$tanya4 = isset($_POST['tanya4.$matakul.$dosen']);
		$tanya5 = isset($_POST['tanya5.$matakul.$dosen']);
		$tanya6 = isset($_POST['tanya6.$matakul.$dosen']);
		$tanya7 = isset($_POST['tanya7.$matakul.$dosen']);
		$tanya8 = isset($_POST['tanya8.$matakul.$dosen']);
		$tanya9 = isset($_POST['tanya9.$matakul.$dosen']);
	
		$saran = isset($_POST['saran.$a.$dosen']);
	
		$nilaitotal = $tanya0 +$tanya1 +$tanya2 +$tanya3 +$tanya4 +$tanya5 +$tanya6 +$tanya7 +$tanya8 +$tanya9 ; //echo $nilaitotal;

		if(!empty($username))
		{
			//$sqlceki = "SELECT * FROM m_student"; echo $sqlceki;
			$sqlceki = "SELECT * FROM nilai WHERE nrp='$username' and dos='$dosen'and mk='$matakul'"; //echo $sqlceki;
			$rowceki = mysql_query($sqlceki) or die ("cek isi database nilai gagal");
			$ceki = mysql_fetch_assoc($rowceki);
			if(empty($ceki['nrp']))
			{
				$sqlins = "insert into nilai values ('$username', '$dosen', '$matakul', '$nilaitotal', '$saran')"; //echo $sqlins;
				$rowins = mysql_query($sqlins) or die ("login insert gagal");
			}
			else
			{
				$pesan =1;
			}
		}
		
		$nilaitotal = 0;
		$a++;
	}
	
	$b = 1;
	$nilaitotallab = 0;
	$ceklab = 0;
	while ($b <= $jumlab)
	{
		$lab = isset($_POST['lab.$b']);
		$tanyalab1 = isset($_POST['tanya1.$lab']);
		$tanyalab2 = isset($_POST['tanya2.$lab']);
		$tanyalab3 = isset($_POST['tanya3.$lab']);
		$tanyalab4 = isset($_POST['tanya4.$lab']);
		$tanyalab5 = isset($_POST['tanya5.$lab']);
		$tanyalab6 = isset($_POST['tanya6.$lab']);
		$tanyalab7 = isset($_POST['tanya7.$lab']);
		$tanyalab8 = isset($_POST['tanya8.$lab']);
		$tanyalab9 = isset($_POST['tanya9.$lab']);
		$tanyalab10 = isset($_POST['tanya10.$lab']);
		$tanyalab11 = isset($_POST['tanya11.$lab']);
		$tanyalab12 = isset($_POST['tanya12.$lab']);
		$tanyalab13 = isset($_POST['tanya13.$lab']);
		$tanyalab14 = isset($_POST['tanya14.$lab']);
		$tanyalab15 = isset($_POST['tanya15.$lab']);
		$tanyalab16 = isset($_POST['tanya16.$lab']);
		$tanyalab17 = isset($_POST['tanya17.$lab']);
		
		$saranlab = isset($_POST['saran.$lab']);
		
		$nilaitotallab = $tanyalab1 + $tanyalab2 + $tanyalab3 + $tanyalab4 + $tanyalab5 + $tanyalab6 + $tanyalab7 + $tanyalab8 + $tanyalab9 + $tanyalab10 + $tanyalab11 + $tanyalab12 + $tanyalab13 + $tanyalab14 + $tanyalab15 + $tanyalab16 + $tanyalab17;
		
		if(!empty($username))
		{
			$sqldelnol = "delete from nilai where nilai ='0'";
			mysql_query($sqldelnol) or die ("login delete nilai 0 gagal");

			$sqlcekj = "SELECT * FROM nilai WHERE nrp='$username' and dos='$lab'"; //echo $sqlcekj;
			$rowcekj = mysql_query($sqlcekj) or die ("login cek lab gagal");
			$cekj = mysql_fetch_assoc($rowcekj);
			if(empty($cekj['dos']))
			{
				$sqlinslab = "insert into nilai values ('$username', '$lab', '', '$nilaitotallab', '$saranlab')"; //echo $sqlinslab;
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
	//exit;
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
					<td>KEHADIRAN <br> (Ketepatan waktu datang mengajar)</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya1<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>2.</td>
					<td>KEHADIRAN <br> (Ketepatan waktu mengakhiri kuliah)</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya2<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>3.</td>
					<td>KEHADIRAN <br> (Ketepatan waktu dalam mengajar tiap minggu)</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya3<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>4.</td>
					<td>PEMBELAJARAN <br> (Persiapan Mengajar)</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya4<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>5.</td>
					<td>PEMBELAJARAN <br> (Memberikan Rencana Program Kegiatan Pembelajaran Semester / Satuan Acara Perkuliahan)</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya5<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>6.</td>
					<td>PEMBELAJARAN <br> (Memberikan Daftar Buku Yang Dipakai dalam Perkuliahan)</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya6<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>7.</td>
					<td>PEMBELAJARAN <br> (Penguasaan Materi Kuliah)</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya7<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>8.</td>
					<td>PEMBELAJARAN <br> (Penyampaian Materi)</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya8<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>9.</td>
					<td>PEMBELAJARAN <br> (Relevansi Contoh yang Diberikan)</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya9<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
					
				</tr>
				<tr>
					<td>10.</td>
					<td>PEMBELAJARAN <br> (Kesesuaian Materi Ujian dengan Materi Kuliah)</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
				</tr>
				<tr>
					<td>10.</td>
					<td>PEMBELAJARAN <br> (Pengembalian Hasil Tugas, Quis, Ujian)</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="1" />1</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="2" />2</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="3" />3</td>
					<td><input name="tanya0<? echo $matkul; echo $a[1];?>" type="radio" value="4" />4</td>
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
				$jumlab = $count2;
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
