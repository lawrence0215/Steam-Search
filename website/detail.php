<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");


$pids=$_GET['pid'];

$data=mysqli_query($db, "select s.name, 
					d.short_description, 
					r.minimum,
					m.header_image,
					m.background,
					s.release_date,
					s.publisher
					from steam s, steam_description_data d, steam_requirements_data r, steam_media_data m
					where s.appid = $pids and s.appid = d.steam_appid and s.appid = r.steam_appid and s.appid = m.steam_appid  and d.steam_appid = r.steam_appid and d.steam_appid = m.steam_appid and r.steam_appid = m.steam_appid");
					if (!$data) {
						printf("Error: %s\n", mysqli_error($db));
						exit();
					}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Details</title>
</head>
<?php
  	for($i=1;$i<=mysqli_num_rows($data);$i++){
		$rs=mysqli_fetch_row($data);
	?>
<body background="<?php echo $rs[4]?>">
	
	<H1><img src="<?php echo $rs[3]?>" width="184" height="86"><font color="white" face="Comic Sans MS"><?php echo "  $rs[0]"?></font></H1>
	<table width="1675" border="1" style="border:4px #97CBFF solid;padding:5px;" rules="all" cellpadding='7'>
   <tr> 
	<td align="center"><font color="white" face="Comic Sans MS">Release Date</font></td>
	<td align="center"><font color="white" face="Comic Sans MS">Publisher</font></td>
	<td align="center"><font color="white" face="Comic Sans MS">About This Game</font></td>
	<td align="center"><font color="white" face="Comic Sans MS">System Requirements</font></td>
   </tr>
	
	<tr>	
    <td align="center"><font color="white" face="Comic Sans MS"><?php echo $rs[5]?></font></td>
	<td ><font color="white" face="Comic Sans MS"><?php echo $rs[6]?></font></td>	
    <td ><font color="white" face="Comic Sans MS"><?php echo $rs[1]?></font></td>
    <td ><font color="white" face="Comic Sans MS"><?php echo $rs[2]?></font></td>
  </tr>	
<?php
}
?>
	</table>
</body>
</html>