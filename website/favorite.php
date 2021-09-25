<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");



$data=mysqli_query($db, "select s.name, f.time, s.appid from steam s, favorite f where s.appid = f.steam_appid order by f.time");
if (!$data) {
	printf("Error: %s\n", mysqli_error($db));
	exit();
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Favorite</title>
</head>

<body>
	<p><H1><a href="search.php"?><img src="https://image.flaticon.com/icons/png/512/23/23822.png" width="30" height="30"><font face="Comic Sans MS"></a><font color="black" face="Comic Sans MS">  My Favorite Games</font></H1></p>
		
	<table width="500" border="1" style="border:4px #000079 solid;padding:5px;" rules="all" cellpadding='7'>
   <tr>
	<td align="center"><font face="Comic Sans MS">Name</font></td>
	<td align="center"><font face="Comic Sans MS">Add Time</font></td>
	<td align="center"><font face="Comic Sans MS">Delete</font></td>
  </tr>
<?php
  	for($i=1;$i<=mysqli_num_rows($data);$i++){

		$rs=mysqli_fetch_row($data);
?>
	<tr>
    <td ><font face="Comic Sans MS"><?php echo $rs[0]?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php echo $rs[1]?></font></td>
	<td align="center"><font face="Comic Sans MS"><?php echo "<a href=delfav.php?pid=$rs[2]> Delete </a>" ?></font></td>
	</tr>
	
<?php
	}
?>
	</table>
	<p><div align="center"><font face="Comic Sans MS"><a href="search.php"?>Click here back to SEARCH</a></font></div></p>
</body>
</html>