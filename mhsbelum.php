<?
include "database.php";

$konek = mysql_connect($namahost,$pengguna,$passwd) or die("Gagal koneksi dengan database");
$pilihdatabase = mysql_select_db($database,$konek) or die ("login telah gagal");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>form Kuisioner Dosen</title>

</head>

<body>
	<div align = 'center'>
	<h2>Daftar Mahasiswa yg Belum Mengisi Indeks Pengajaran Dosen Politeknik Perkapalan Negeri Surabaya</h2>
	<table border="1" bordercolor="#FF3300" cellpadding="3" cellspacing="0">
	<tr align = "center" style="background-color:#FF9933" > 
		<td nowrap="nowrap">no.</td>
		<td nowrap="nowrap">NRP</td>
		<td nowrap="nowrap">NAMA</td>
		<td nowrap="nowrap">PRODI</td>
	</tr>
<?
$sqlmhs = "select distinct NIMHSMSMHS from msmhs where statusmhs='A'";
$rowmhs = mysql_query($sqlmhs) or die ("sqlmhs telah gagal");

$no = 1;
while ($mhs = mysql_fetch_assoc($rowmhs))
{
	$mhs2 = $mhs['NIMHSMSMHS']; //echo $mhs2; echo "&nbsp";
	$sqlmhscek = "select distinct nrp from nilai where nrp='$mhs2'";
	$rowmhscek = mysql_query($sqlmhscek) or die ("rowmhscek telah gagal");
	$mhscek=mysql_fetch_assoc($rowmhscek);
	$mhscek = $mhscek['nrp'];
	if(empty($mhscek))
	{
		?>
		<tr align = "center">
			<td nowrap="nowrap"><? echo $no;?></td>
			<td nowrap="nowrap" align="left"><? echo $mhs2; ?></td>
			<?
				$sqlprodi = "SELECT * FROM msmhs WHERE NIMHSMSMHS ='$mhs2'";
				$rowprodi = mysql_query($sqlprodi) or die ("rowprodi telah gagal");
				$prodi = mysql_fetch_assoc($rowprodi);
			?>
			<td nowrap="nowrap"><? echo $prodi['NMMHSMSMHS']; ?></td>
			<td nowrap="nowrap"><? echo $prodi['KODEKELAS'];?></td>
		</tr>
		<?
		$no++;
	}
}
echo $no;
?>