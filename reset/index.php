<?php
mysql_connect("localhost", "ipd", "dpi") or die("NOT CONNECTED!");
mysql_select_db("poling") or die("NOT FOUND!");

if(isset($_POST['cek'])){
	$qry_cek = mysql_query("SELECT * FROM `login` WHERE `usrnm` = '".stripslashes(trim($_POST['nrp']))."' AND `passwd` = '".md5($_POST['pas'])."' LIMIT 0,1");
	$gacocok = 1;
	if(mysql_num_rows($qry_cek) > 0){
		$result = "Password cocok!";
		$gacocok = 0;
	}
	else
		$result = "NRP / Password Salah!";
}

elseif(isset($_POST['reset'])){
	$qry_reset = mysql_query("UPDATE `login` SET `passwd` = '".md5($_POST['pas'])."' WHERE `usrnm` = '".stripslashes(trim($_POST['nrp']))."'");
	$result = "Password untuk NRP ".trim($_POST['nrp'])." telah diupdate!";
}
?>
<html>
<head>
	<title>Cek dan Reset Password</title>
</head>
<body>
	<?php if(isset($_GET['act']) && $_GET['act'] == "cek") : ?>

	<h3>Result : <?php echo $result; ?></h3><hr>

	<?php if($gacocok) : ?>
	<h3>Isikan password baru untuk reset</h3>
	 <form method="post" action="index.php?act=reset">
                NRP: <input type="text" name="nrp" /><br/>
                PAS: <input type="text" name="pas" /><br/>
                <input type="submit" name="reset" value="Go!" />
        </form>
	<?php endif; ?>
	<?php elseif(isset($_GET['act']) && $_GET['act'] == "reset") : ?>
	
	<h3><?php echo $result; ?></h3>
	Klik <a href="index.php">disini</a> untuk cek.
	
	<?php else : ?>
	
	<em>Cek login IPD</em><br/>
	<form method="post" action="index.php?act=cek">
		NRP: <input type="text" name="nrp" /><br/>
		PAS: <input type="text" name="pas" /><br/>
		<input type="submit" name="cek" value="Go!" />
	</form>
	<?php endif; ?>
</body>
</html>
