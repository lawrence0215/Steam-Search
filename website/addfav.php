<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");


$pidd=$_GET['pid'];
$time=date(Ymd);

$data=mysqli_query($db, "insert into favorite (steam_appid, time) values ('$pidd', '$time')");
$data=mysqli_query($db, "select name from steam where appid = $pidd");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add To Favorite</title>
</head>
<?php
  	for($i=1;$i<=mysqli_num_rows($data);$i++){
		$rs=mysqli_fetch_row($data);
?>
<body>
	<p><H1><font color="black" face="Comic Sans MS"><?php echo "Insert Game: '$rs[0]' To "?><a href="favorite.php"?>MY FAVORITE</a></font></H1></p>
<?php
	}
?>
</body>
</html>