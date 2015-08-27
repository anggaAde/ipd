<?
session_start();
include 'database.php';
echo $namahost;

if($_POST[submit]=='kirim')
{	
	$konek = mysql_connect($namahost,$pengguna,$passwd) or die("Gagal koneksi dengan database");
	$pilihdatabase = mysql_select_db($database,$konek) or die ("login telah gagal");

	$username = stripslashes($_POST[username]);
	$password = stripslashes($_POST[password]);
	$pass =md5($password);
	
	//$sql = "SELECT hakakses FROM login WHERE usrnm = '$username' and passwd = '$password'";
	$sql = "SELECT hakakses FROM login WHERE usrnm = '$username' and passwd = '$pass'"; //echo $sql;
	$qr = mysql_query($sql) or die ("login telah gagal");
	$hasil = mysql_fetch_assoc($qr); //echo $hasil;

	if(!empty($hasil['hakakses']) && $hasil['hakakses']=='mahasiswa')
	{
			$sqlmhs = "SELECT * FROM msmhs WHERE NIMHSMSMHS='$username'"; //echo $sqlmhs;
			$rowmhs = mysql_query($sqlmhs) or die ("login telah gagal1");
			$mhs = mysql_fetch_assoc($rowmhs);
			
			$sqldos = "SELECT DISTINCT NODOSJADWAL,NAMKJADWAL,tbdos.statuspengajar FROM jadwalrealisasi,tbdos WHERE kdkelas = '$mhs[KODEKELAS]' and NODOSJADWAL= NIPNSTBDOS AND tbdos.statuspengajar = 'dosen' and THSMSJADWAL='20122'"; //echo $sqldos;
			$rowdos = mysql_query($sqldos) or die ("login telah gagal2");
			
			$no = 0;
			while ($dos = mysql_fetch_assoc($rowdos))
			{
				$dose = $dos[NODOSJADWAL];
				$arrdos[] = $dose;
				
				$mk = $dos[NAMKJADWAL];
				$arrmk[] = $mk;
			}
			
			$sqllab="SELECT DISTINCT KODERUANGAN from jadwalrealisasi WHERE THSMSJADWAL='20122' and kdkelas = '$mhs[KODEKELAS]' and (KODERUANGAN like 'Lab_%' or KODERUANGAN like 'B_%' or KODERUANGAN like 'SG_%')"; //echo $sqllab;
			$rowlab=mysql_query($sqllab) or die ("login lab gagal");
			
			while ($lab = mysql_fetch_assoc($rowlab))
			{
				$labe = $lab[KODERUANGAN];
				$arrlab[] = $labe;
			}
			
			$_SESSION['dos']=$arrdos;
			$_SESSION['mhs']=$username;
			$_SESSION['mk']=$arrmk;
			$_SESSION['lab']=$arrlab;
			
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: form.php" ); 
	}
	if(!empty($hasil['hakakses']) && $hasil['hakakses']=='laporan')
	{
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: laporan.php" ); 
	}
	if(empty($hasil['hakakses']))
	{
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: index.php" );
			session_destroy();
	}
}
?>
