<?php
session_start();
include "database.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>form Kuisioner Dosen</title>
</head>
<body>
<?php
	$sqldos = "select distinct dos from nilai where dos IS NOT NULL"; //echo $sqldos;
	$rowdos = mysql_query($sqldos, $konek) or die ("login sqldos telah gagal");
?>
	<form action="hitungnilai.php" method="post">
		First name:<br>
		<select name="dosen">
		<?php
		while ($dos = mysql_fetch_assoc($rowdos))
		{ 
			$dosen = $dos['dos'];
			$sqlnmdos = "select lecturer_name from m_lecturer where lecturer_id = '$dosen'"; //echo $sqlnmdos;
			$rownmdos = mysql_query($sqlnmdos, $konek) or die ("login sqlnmdos telah gagal");
			$nmdos = mysql_fetch_assoc($rownmdos);
		?>
			<option value="<?php echo $dosen;?>"><?php echo $nmdos['lecturer_name'];?></option>
		<?php
		}
		?>
		</select>
		<br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>