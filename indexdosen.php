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
<?php //cari semua mata kuliah yang diajar tiap dosen di tiap kelas
$sqldos = "SELECT DISTINCT `dos` FROM nilai WHERE `dos` <> ''";
$resdos = mysql_query($sqldos) or die ("sqldos gagal");
$arrdos = array();
while($rowdos = mysql_fetch_assoc($resdos))
{
	$dos = $rowdos['dos'];
	$sqlmatkul = "SELECT distinct `mk` FROM nilai WHERE `dos`='$dos'";
	$resmatkul = mysql_query($sqlmatkul);
	$arrmk = array();
	while ($rowmatkul = mysql_fetch_assoc($resmatkul))
	{
		$matkul = $rowmatkul['mk'];
		$arrmk[] = $matkul;
	}
	$arrdos[$dos] = $arrmk;
}
//var_dump($arrdos); echo "</br>";
foreach ($arrdos as $dos => $matakuliah)
{
	echo "dosen:$dos,";
	$sqlnamadosen = "SELECT lecturer_name FROM m_lecturer WHERE lecturer_id = '$dos'";
	$resnamadosen = mysql_query($sqlnamadosen);
	$rownamadosen = mysql_fetch_assoc($resnamadosen);
	$namadosen = $rownamadosen['lecturer_name'];
	echo $namadosen;
	foreach ($matakuliah as $key => $value)
	{
		echo "matakuliah:[$key] $value </br>";
		
	}
}
?>
</body>

</html>