<?
session_start();
include "database.php";

$dos = $_SESSION['dos'];
$username = $_SESSION['mhs'];
$mk = $_SESSION['mk'];
$lab = $_SESSION['lab'];
	
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
	<h2>Daftar Indeks Pengajaran Dosen Politeknik Perkapalan Negeri Surabaya</h2>
		
	<table border="1" bordercolor="#FF3300" cellpadding="3" cellspacing="0">
	<tr align = "center" style="background-color:#FF9933" > 
		<td nowrap="nowrap">no.</td>
		<td nowrap="nowrap">Lab</td>
		<td nowrap="nowrap">IP</td>
		<td nowrap="nowrap">dari jumlah mahasiswa</td>
	</tr>
	<?
	$sqldos = "select distinct dos from nilai where (dos like 'Lab_%' or dos like 'B_B%' or dos like 'B_L%' or dos like 'B_M%' or dos like 'B_N%' or dos like 'B_P%' or dos like 'B_S%' or dos like 'SG_%') and nilai <> '0' and nrp <>''"; //echo $sqlnil;
	$rowdos = mysql_query($sqldos) or die ("login nilai telah gagal");
	
	$no = 1;
	while ($dos = mysql_fetch_assoc($rowdos))
	{
		$sqlnil = "select nilai from nilai where dos='$dos[dos]'"; //echo $sqlnil;
		$rownil = mysql_query($sqlnil) or die ("login nilai telah gagal");
		//$nil = mysql_fetch_assoc($rownil);
		
		//$rata2 = array_sum($nil)/count($nil);
		$niltotal = 0;
		$count=0;
		while ($nil = mysql_fetch_assoc($rownil))
		{
			$niltotal=$niltotal+$nil['nilai'];
			$count++;
		}
		$rata = $niltotal/$count;
		$rata2 = $rata/17;
		
		$sqlnmdos = "select NMDOSTBDOS from tbdos where NIPNSTBDOS = '$dos[dos]'";
		$rownmdos = mysql_query($sqlnmdos) or die ("login nilai telah gagal");
		$nmdos = mysql_fetch_assoc($rownmdos);
		?>
		
		<tr align = "center">
			<td nowrap="nowrap"><? echo $no;?></td>
			<td nowrap="nowrap" align="left"><? echo $dos[dos]; ?></td>
			<td nowrap="nowrap"><? echo round($rata2,2); ?></td>
			<td nowrap="nowrap"><? echo $count;?></td>
		</tr>
		
		
		</div>
		<?
		//echo $niltotal; echo '=======>'; echo $count; echo '=======>'; echo $rata2;
		$no++;
	}
?>
	</table>
</body>
</html>
