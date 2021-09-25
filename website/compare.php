<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");

if($_POST['pub1']!='')
	$pub1=$_POST['pub1'];
else
	$pub1="";
if($_POST['pub2']!='')
	$pub2=$_POST['pub2'];
else
	$pub2="";
if($_POST['pub3']!='')
	$pub3=$_POST['pub3'];
else
	$pub3="";

$data=mysqli_query($db, "select Publisher, cnt, Ratings, Playtime, Price
						from(select Publisher, count(*) as cnt, 
						ROUND(avg(Ratings),3) as Ratings, ROUND(avg(Playtime)) as Playtime, ROUND(avg(Price),2) as Price
						from (select publisher as Publisher,
						positive_ratings/(positive_ratings+negative_ratings)*100 as Ratings,
						average_playtime as Playtime,
        				price as Price
						from steam
						where publisher like '%$pub1%' or publisher like '%$pub2%' or publisher like '%$pub3%') as tbl
						group by tbl.Publisher
						order by cnt desc
						limit 30) as tbl2
						where tbl2.cnt >15"); 
						if (!$data) {
							printf("Error: %s\n", mysqli_error($db));
							exit();
						}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Publisher</title>
</head>

<body>
	<H1><a href="compare.php"?><img src="https://image.flaticon.com/icons/png/512/23/23822.png" width="30" height="30"></a><font face="Comic Sans MS">  Publisher Comparison </font></H1>
	
<form id="form1" name="form1" method="post" action="">
  <p>
	<input name="pub1" type="radio" id="radio" value="XXX" />
  <font face="Comic Sans MS">None</font>
	<input name="pub1" type="radio" id="radio1" value="2K" />
  <font face="Comic Sans MS">2K</font>
	<input name="pub1" type="radio" id="radio2" value="Activision" />
  <font face="Comic Sans MS">Activision</font>
	<input name="pub1" type="radio" id="radio3" value= "Big Fish Games" />
  <font face="Comic Sans MS">Big Fish Games</font>
	<input name="pub1" type="radio" id="radio4" value="Electronic Arts" />
  <font face="Comic Sans MS">Electronic Arts</font>
	<input name="pub1" type="radio" id="radio5" value= "Sekai Project" />
  <font face="Comic Sans MS">Sekai Project</font>
	<input name="pub1" type="radio" id="radio6" value= "SEGA" />
  <font face="Comic Sans MS">SEGA</font>
	<input name="pub1" type="radio" id="radio7" value= "Square Enix" />
  <font face="Comic Sans MS">Square Enix</font>
	<input name="pub1" type="radio" id="radio8" value= "THQ Nordic" />
  <font face="Comic Sans MS">THQ Nordic</font>
	<input name="pub1" type="radio" id="radio9" value= "Ubisoft" />
  <font face="Comic Sans MS">Ubisoft</font>
  </p>
	
  <p>
	<input name="pub2" type="radio" id="radio" value="XXX" checked="checked"/>
  <font face="Comic Sans MS">None</font>
	<input name="pub2" type="radio" id="radio1" value="2K" />
  <font face="Comic Sans MS">2K</font>
	<input name="pub2" type="radio" id="radio2" value="Activision" />
  <font face="Comic Sans MS">Activision</font>
	<input name="pub2" type="radio" id="radio3" value= "Big Fish Games" />
  <font face="Comic Sans MS">Big Fish Games</font>
	<input name="pub2" type="radio" id="radio4" value="Electronic Arts" />
  <font face="Comic Sans MS">Electronic Arts</font>
	<input name="pub2" type="radio" id="radio5" value= "Sekai Project" />
  <font face="Comic Sans MS">Sekai Project</font>
	<input name="pub2" type="radio" id="radio6" value= "SEGA" />
  <font face="Comic Sans MS">SEGA</font>
	<input name="pub2" type="radio" id="radio7" value= "Square Enix" />
  <font face="Comic Sans MS">Square Enix</font>
	<input name="pub2" type="radio" id="radio8" value= "THQ Nordic" />
  <font face="Comic Sans MS">THQ Nordic</font>
	<input name="pub2" type="radio" id="radio9" value= "Ubisoft" />
  <font face="Comic Sans MS">Ubisoft</font>
  </p>
	
  <p>
	<input name="pub3" type="radio" id="radio" value="XXX" checked="checked"/>
  <font face="Comic Sans MS">None</font>
	<input name="pub3" type="radio" id="radio1" value="2K" />
  <font face="Comic Sans MS">2K</font>
	<input name="pub3" type="radio" id="radio2" value="Activision" />
  <font face="Comic Sans MS">Activision</font>
	<input name="pub3" type="radio" id="radio3" value= "Big Fish Games" />
  <font face="Comic Sans MS">Big Fish Games</font>
	<input name="pub3" type="radio" id="radio4" value="Electronic Arts" />
  <font face="Comic Sans MS">Electronic Arts</font>
	<input name="pub3" type="radio" id="radio5" value= "Sekai Project" />
  <font face="Comic Sans MS">Sekai Project</font>
	<input name="pub3" type="radio" id="radio6" value= "SEGA" />
  <font face="Comic Sans MS">SEGA</font>
	<input name="pub3" type="radio" id="radio7" value= "Square Enix" />
  <font face="Comic Sans MS">Square Enix</font>
	<input name="pub3" type="radio" id="radio8" value= "THQ Nordic" />
  <font face="Comic Sans MS">THQ Nordic</font>
	<input name="pub3" type="radio" id="radio9" value= "Ubisoft" />
  <font face="Comic Sans MS">Ubisoft</font>
  </p>
	
  <p> <input name="pub1" type="radio" id="radio" value= "" checked="checked"/>
  <font face="Comic Sans MS">All Publishers</font> 
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Compare" />
  </p>
</form>
	<H2>
	<font face="Comic Sans MS" color = "#005AB5"><a href="search.php"?><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRKXfurPskVhX17pQOlA_qB5fUwOS3K730ThQ&usqp=CAU" width="30" height="30"></a> Steam Game Search</font> 
	</H2>
	
<p></p>
<table width="700" border="1" style="border:4px #000079 solid;padding:5px;" rules="all" cellpadding='7'>
   <tr>
	<td align="center"><font face="Comic Sans MS">Publisher</font></td>
	<td align="center"><font face="Comic Sans MS">Game Amounts</font></td>
	<td align="center"><font face="Comic Sans MS">Ratings</font></td>
	<td align="center"><font face="Comic Sans MS">Playtime</font></td>
	<td align="center"><font face="Comic Sans MS">Price</font></td>
  </tr>
  <?php
  for($i=1;$i<=mysqli_num_rows($data);$i++){
	  $rs=mysqli_fetch_row($data);
?>
	<tr>
    <td ><font face="Comic Sans MS"><?php echo $rs[0]?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php echo $rs[1]?></font></td>
	<td align="center"><font face="Comic Sans MS"><?php echo $rs[2]?></font></td>
	<td align="center"><font face="Comic Sans MS"><?php echo $rs[3]?></font></td>
	<td align="center"><font face="Comic Sans MS"><?php echo $rs[4]?></font></td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>