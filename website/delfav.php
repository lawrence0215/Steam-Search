<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");


$pidd=$_GET['pid'];

$data=mysqli_query($db, "DELETE FROM favorite WHERE steam_appid = $pidd");
$data=mysqli_query($db, "select name from steam where appid = $pidd");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Remove From Favorite</title>
</head>
<?php
  	for($i=1;$i<=mysqli_num_rows($data);$i++){
		$rs=mysqli_fetch_row($data);
?>
<body>
	<p><H1><font color="black" face="Comic Sans MS"><?php echo "Remove Game: '$rs[0]' From "?><a href="favorite.php"?>MY FAVORITE</a></font></H1></p>
<?php
	}
?>
	
	<p><H2><font face="Comic Sans MS"><a href="search.php"?>Click here back to SEARCH</a></font><H2></p>
</body>
</html>