<?php
session_start();
include "database.php";
if(isset($_POST['submit'])&&$_POST['submit']=='kirim')
{	
	//$konek2 = mysql_connect($namahost2,$pengguna2,$passwd2) or die("Gagal koneksi dengan database");
	//mysql_select_db($database2,$konek2) or die ("konek database hippo gagal");

	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	$pass =sha1($password);
	
	//$sql = "SELECT user_id FROM w_user WHERE user_username = '$username' and user_password = '$password'";
	$sql = "SELECT user_id FROM w_user WHERE user_username = '$username' and user_password = '$pass'"; //echo $sql;
	$qr = mysql_query($sql) or die ("koneksi database w_user gagal");
	$hasil = mysql_fetch_assoc($qr); //echo $hasil;
	//echo 'kalsjdfl;kjas;dfjk;asdf';

	if(!empty($hasil['user_id']))
	{
			$sqlmhs = "SELECT student_id FROM m_student WHERE student_number='$username'"; //echo $sqlmhs;
			$rowmhs = mysql_query($sqlmhs) or die ("nrp tidak terdaftar");
			$mhs = mysql_fetch_assoc($rowmhs);

			$mhs_student_id = $mhs['student_id'];
			//$sqlkelas = "SELECT DISTINCT classmember_programclass FROM m_classmember WHERE classmember_student='$mhs_student_id' and classmember_academicyear=(select (max(classmember_academicyear)-1) from m_classmember where classmember_student='$mhs_student_id') and classmember_semester=(select (max(classmember_semester)-1) from m_classmember where classmember_student='$mhs_student_id')"; //echo $sqlkelas;
			$sqlkelas = "SELECT DISTINCT classmember_programclass FROM m_classmember WHERE classmember_student='$mhs_student_id' and classmember_academicyear=(select (max(classmember_academicyear)) from m_classmember where classmember_student='$mhs_student_id') and classmember_semester=(select (max(classmember_semester)) from m_classmember where classmember_student='$mhs_student_id')"; //echo $sqlkelas;
			$rowkelas = mysql_query($sqlkelas) or die ("classmember_programclass gak ada");
			$kelas = mysql_fetch_assoc($rowkelas);

			$kelas_id = $kelas['classmember_programclass'];
			$sqlkelas2 = "SELECT * FROM m_programclass WHERE programclass_id='$kelas_id'"; //echo $sqlkelas2;
			$rowkelas2 = mysql_query($sqlkelas2) or die ("queri sqlkelas2 gagal");
			$kelas2 = mysql_fetch_assoc($rowkelas2);
			$kelaslengkap = $kelas2['programclass_program'].$kelas2['programclass_semester'].$kelas2['programclass_paralel'];

			$sqldos = "SELECT DISTINCT lecturerworkload_id, lecturerworkload_lecturer, lecturerworkload_curriculum FROM m_lecturerworkload WHERE lecturerworkload_programclass='$kelas_id'"; //echo $sqldos; echo '<br>';
			$rowdos = mysql_query($sqldos) or die ("lecturerworkload kosong");
			
			$no = 0;
			while ($dos = mysql_fetch_assoc($rowdos))
			{
				$dose = $dos['lecturerworkload_lecturer']; //echo $dose; echo '<br>';
				$arrdos[] = $dose;
				
				$mk = $dos['lecturerworkload_curriculum'];
				$arrmk[] = $mk;

				$lecturerworkload_id=$dos['lecturerworkload_id'];
				$arrlecturerworkload_id[]=$lecturerworkload_id;
			}
			
			foreach ($arrlecturerworkload_id as $lecturerworkload) {
				//$sqllab="SELECT DISTINCT schedule_room from m_schedule WHERE schedule_lecturerworkload = '$lecturerworkload'"; echo $sqllab;
				$sqllab="SELECT DISTINCT m_schedule.schedule_room from m_schedule, m_room where m_schedule.schedule_room=m_room.room_id and m_schedule.schedule_lecturerworkload = '$lecturerworkload' and m_room.room_type='2'"; //echo $sqllab;
				$rowlab=mysql_query($sqllab) or die ("login lab gagal");
				$rowlab2 = mysql_fetch_assoc($rowlab);
				$labe = $rowlab2['schedule_room']; //echo $labe; echo '<br>.';
				$arrlab[] = $labe;
			}
			
			$_SESSION['dos']=$arrdos;
			$_SESSION['mhs']=$mhs_student_id;
			$_SESSION['mk']=$arrmk;
			$_SESSION['lab']= array_unique($arrlab);
			$_SESSION['kelaslengkap']=$kelaslengkap;
			
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: form.php" ); 
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
