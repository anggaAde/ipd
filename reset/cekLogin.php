<?php
session_start();
include "database.php";
if($_POST[submit]=='kirim')
{	
	//$konek2 = mysql_connect($namahost2,$pengguna2,$passwd2) or die("Gagal koneksi dengan database");
	//mysql_select_db($database2,$konek2) or die ("konek database hippo gagal");

	$username = stripslashes($_POST[username]);
	$password = stripslashes($_POST[password]);
	$pass =sha1($password);
	
	//$sql = "SELECT user_id FROM w_user WHERE user_username = '$username' and user_password = '$password'";
	$sql = "SELECT user_id FROM w_user WHERE user_username = '$username' and user_password = '$pass'"; //echo $sql;
	$qr = mysql_query($sql) or die ("koneksi database w_user gagal");
	$hasil = mysql_fetch_assoc($qr); //echo $hasil;

	if(!empty($hasil['user_id']))
	{
			$sqlmhs = "SELECT student_id FROM m_student WHERE student_number='$username'"; //echo $sqlmhs;
			$rowmhs = mysql_query($sqlmhs) or die ("nrp tidak terdaftar");
			$mhs = mysql_fetch_assoc($rowmhs);

			$mhs_student_id = $mhs['student_id'];
			$sqlkelas = "SELECT DISTINCT classmember_programclass FROM m_classmember WHERE classmember_student='$mhs_student_id' and classmember_academicyear=(select max(classmember_academicyear)-1 from m_classmember where classmember_student='$mhs_student_id') and classmember_semester=(select (max(classmember_semester)) from m_classmember where classmember_student='$mhs_student_id')"; //echo $sqlkelas;
			$rowkelas = mysql_query($sqlkelas) or die ("classmember_programclass gak ada");
			$kelas = mysql_fetch_assoc($rowkelas);

			$kelas_id = $kelas['classmember_programclass'];
			$sqldos = "SELECT DISTINCT lecturerworkload_lecturer, lecturerworkload_curriculum FROM m_lecturerworkload WHERE lecturerworkload_programclass='$kelas_id'"; echo $sqldos;
			$rowdos = mysql_query($sqldos) or die ("login telah gagal2");
			
			$no = 0;
			while ($dos = mysql_fetch_assoc($rowdos))
			{
				$dose = $dos[lecturerworkload_lecturer];
				//echo $dose;
				//echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
				$arrdos[] = $dose;
				
				$mk = $dos[lecturerworkload_curriculum];
				$arrmk[] = $mk;
			}
			
			//$sqllab="SELECT DISTINCT KODERUANGAN from jadwalrealisasi WHERE THSMSJADWAL='20122' and kdkelas = '$mhs[KODEKELAS]' and (KODERUANGAN like 'Lab_%' or KODERUANGAN like 'B_%' or KODERUANGAN like 'SG_%')"; //echo $sqllab;
			//$rowlab=mysql_query($sqllab) or die ("login lab gagal");
			
			while ($lab = mysql_fetch_assoc($rowlab))
			{
				$labe = $lab[KODERUANGAN];
				$arrlab[] = $labe;
			}
			
			$_SESSION['dos']=$arrdos;
			$_SESSION['mhs']=$mhs_student_id;
			$_SESSION['mk']=$arrmk;
			$_SESSION['lab']=$arrlab;
			
			//Header( "HTTP/1.1 301 Moved Permanently" );
			//Header( "Location: form.php" ); 
	}
	if(!empty($hasil['user_id']) && $hasil['user_id']=='laporan')
	{
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: laporan.php" ); 
	}
	if(empty($hasil['user_id']))
	{
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: index.php" );
			session_destroy();
	}
}
?>
