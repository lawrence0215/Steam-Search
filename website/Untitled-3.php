<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");



if($_POST['tags']!='')
	$tags=$_POST['tags'];
else
	$tags="";
if($_POST['ages']!='')
	$ages=$_POST['ages'];
else
	$ages=99;
if($_POST['platform']!='')
	$platform=$_POST['platform'];
else
	$platform="";
if($_POST['language']!='')
	$language=$_POST['language'];
else
	$language=2;
if($_POST['price']!='')
	$price=$_POST['price'];
else
	$price=999;


$c=$_GET['c'];
$s=$_GET['s'];
$number= $_GET['numpage'];

if($c == '')
{
	$c = "appid";
}

if($number == '')
{
	$number = 50;
}

if($s==1)
{
	$data=mysqli_query($db, "select name, 
					steamspy_tags, 
					positive_ratings/(positive_ratings+negative_ratings)*100 as Ratings,
					average_playtime,
					owners,
					price 
					from steam 
					where steamspy_tags like '%$tags%' and require_age < $ages and platforms like '%$platform%' and english != $language and price <= $price 
					order by $c desc
					limit $number"); 
}
else
{
	$data=mysqli_query($db, "select name, 
					steamspy_tags, 
					positive_ratings/(positive_ratings+negative_ratings)*100 as Ratings,
					average_playtime,
					owners,
					price 
					from steam 
					where steamspy_tags like '%$tags%' and require_age < $ages and platforms like '%$platform%' and english != $language and price <= $price 
					order by $c asc
					limit $number"); 
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Steam Search One Page Version</title>
</head>

<body>
	<H1><a href="Untitled-3.php"?><img src="https://image.flaticon.com/icons/png/512/23/23822.png" width="30" height="30"></a><font face="Comic Sans MS"> Steam Game Search</font></H1>
<form id="form1" name="form1" method="post" action="">
  <p>
  	<input name="tags" type="radio" id="radio" value="" checked="checked" />
  <font face="Comic Sans MS">All Tags</font>
  	<input type="radio" name="tags" id="radio1" value="Action" />
  <font face="Comic Sans MS">Action</font>
	<input type="radio" name="tags" id="radio2" value="Casual" />
  <font face="Comic Sans MS">Casual</font>
	<input type="radio" name="tags" id="radio3" value="FPS" />
  <font face="Comic Sans MS">FPS</font>
	<input type="radio" name="tags" id="radio4" value="Indie" />
  <font face="Comic Sans MS">Indie</font>
	<input type="radio" name="tags" id="radio5" value="Multiplayer" />
  <font face="Comic Sans MS">Multiplayer</font>
	<input type="radio" name="tags" id="radio6" value="Open World" />
  <font face="Comic Sans MS">Open World</font>
	<input type="radio" name="tags" id="radio7" value="Racing" />
  <font face="Comic Sans MS">Racing</font>
	<input type="radio" name="tags" id="radio8" value="RPG" />
  <font face="Comic Sans MS">RPG</font>
	<input type="radio" name="tags" id="radio9" value="Sport" />
  <font face="Comic Sans MS">Sport</font>
  	<input type="radio" name="tags" id="radio10" value="Simulation" />
  <font face="Comic Sans MS">Simulation</font>
  	<input type="radio" name="tags" id="radio11" value="Strategy" />
  <font face="Comic Sans MS">Strategy</font>
	<input type="radio" name="tags" id="radio12" value="VR" />
  <font face="Comic Sans MS">VR</font>
  </p>
	
  <p>
	<input name="ages" type="radio" id="radio" value=100 checked="checked" />
  <font face="Comic Sans MS">All Ages</font>
	<input name="ages" type="radio" id="radio1" value= 12 />
  <font face="Comic Sans MS">Under 12</font>
	<input name="ages" type="radio" id="radio2" value= 16 />
  <font face="Comic Sans MS">Under 16</font>
	<input name="ages" type="radio" id="radio3" value= 18 />
  <font face="Comic Sans MS">Under 18</font>
  </p>
	
  <p>
	<input name="platform" type="radio" id="radio" value="" checked="checked" />
  <font face="Comic Sans MS">All Platforms</font>
	<input name="platform" type="radio" id="radio1" value= "windows" />
  <font face="Comic Sans MS">Windows</font>
	<input name="platform" type="radio" id="radio2" value= "mac" />
  <font face="Comic Sans MS">Mac</font>
	<input name="platform" type="radio" id="radio3" value= "linux" />
  <font face="Comic Sans MS">Linux</font>
  </p>
	
  <p>
	<input name="language" type="radio" id="radio" value= 2 checked="checked" />
  <font face="Comic Sans MS">All Languages</font>
	<input name="language" type="radio" id="radio1" value= 0 />
  <font face="Comic Sans MS">English</font>
	<input name="language" type="radio" id="radio2" value= 1 />
  <font face="Comic Sans MS">Non-English</font>
  </p>
	
  <p>
	<input name="price" type="radio" id="radio" value= 999 checked="checked" />
  <font face="Comic Sans MS">All Prices</font>
	<input name="price" type="radio" id="radio1" value= 0 />
  <font face="Comic Sans MS">Free</font>
	<input name="price" type="radio" id="radio2" value= 3.99 />
  <font face="Comic Sans MS">Below 3.99</font>
	<input name="price" type="radio" id="radio3" value= 6.99 />
  <font face="Comic Sans MS">Below 6.99</font>
	<input name="price" type="radio" id="radio4" value= 10.99 />
  <font face="Comic Sans MS">Below 12.99</font>
  </p>
  
  <p>
    <input type="submit" name="button" id="button" value="Search" />
  </p>
</form>
<p></p>
<table width="1200" border="1" style="border:4px #000079 solid;padding:5px;" rules="all" cellpadding='7'>
   <tr>
	<td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="Untitled-3.php?c=appid&amp;s=1"?>Name</a>';
													else
														echo '<a href="Untitled-3.php?c=appid&amp;s=2"?>Name</a>';
												  ?></font></td>
    <td align="center"><font face="Comic Sans MS">Tags</font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="Untitled-3.php?c=Ratings&amp;s=1"?>Ratings</a>';
													else
														echo '<a href="Untitled-3.php?c=Ratings&amp;s=2"?>Ratings</a>';
												  ?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="Untitled-3.php?c=average_playtime&amp;s=1"?>Playtime</a>';
													else
														echo '<a href="Untitled-3.php?c=average_playtime&amp;s=2"?>Playtime</a>';
												  ?></font></td>
    <td align="center"><font face="Comic Sans MS">Owners</font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="Untitled-3.php?c=price&amp;s=1"?>Price</a>';
													else
														echo '<a href="Untitled-3.php?c=price&amp;s=2"?>Price</a>';
												  ?></font></td>
  </tr>
  <?php
  for($i=1;$i<=mysqli_num_rows($data);$i++){
$rs=mysqli_fetch_row($data);
?>
  <tr>
    <td ><font face="Comic Sans MS"><?php echo $rs[0]?></font></td>
    <td ><font face="Comic Sans MS"><?php echo $rs[1]?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php echo $rs[2]?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php echo $rs[3]?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php echo $rs[4]?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php echo $rs[5]?></font></td>
  </tr>
  
  <?php
}
?>
</table>
	<form id="form1" name="form1" method="post" action="">
  	<div align="center"><font face="Comic Sans MS">Show
    <input name="numpage" type="text" id="numpage" size="5" />
  	Datas</font>
  	<input type="submit" name="button" id="button" value="Set" />
  	</div>
	</form>
<p>&nbsp;</p>
</body>
</html>