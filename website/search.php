<?php
$user = 'root';
$pass = '';
$db = 'final_project';
$db = new mysqli('localhost', $user, $pass, $db) or die("Connect Failed");

if($_COOKIE['set']=='')
{
 setcookie('set', 50, time()+60);
 header("location:search.php");
}
if(@$_POST['numpage']!=''){
 setcookie('set', $_POST['numpage'], time()+60);
 header("location:search.php");
}

// if(!isset($_COOKIE['tags1']))
// 	$tags=' ';
// else{
// 	if($_COOKIE['tags1']=='')
// 	{
// 	 setcookie('tags1', ' ', time()+60);
// 	 header("location:search.php");
// 	}
// 	if(@$_POST['tags']!=''){
// 	 setcookie('tags1', $_POST['tags'], time()+60);
// 	 header("location:search.php");
// 	}
// 	$tags = $_COOKIE['tags1'];
// }

// if(!isset($_COOKIE['ages']))
// 	$ages=99;
// else{
// 	if($_COOKIE['ages1']=='')
// 	{
// 	 setcookie('ages1', 99, time()+60);
// 	 header("location:search.php");
// 	}
// 	if(@$_POST['ages']!=''){
// 	 setcookie('ages1', $_POST['ages'], time()+60);
// 	 header("location:search.php");
// 	}
// 	$ages = $_COOKIE['ages1'];
// }

// if(!isset($_COOKIE['platform1']))
// 	$platform=' ';
// else{
// 	if($_COOKIE['platform1']=='')
// 	{
// 	 setcookie('platform1', ' ', time()+60);
// 	 header("location:search.php");
// 	}
// 	if(@$_POST['platform']!=''){
// 	 setcookie('platform1', $_POST['platform'], time()+60);
// 	 header("location:search.php");
// 	}
// 	$platform = $_COOKIE['platform1'];
// }

// if(!isset($_COOKIE['language1']))
// 	$language=2;
// else{
// 	if($_COOKIE['language1']=='')
// 	{
// 	 setcookie('language1', 2, time()+60);
// 	 header("location:search.php");
// 	}
// 	if(@$_POST['language']!=''){
// 	 setcookie('language1', $_POST['language'], time()+60);
// 	 header("location:search.php");
// 	}
// 	$language = $_COOKIE['language1'];
// }

// if(!isset($_COOKIE['price1']))
// 	$price = 999;
// else{
// 	if($_COOKIE['price1']=='')
// 	{
// 	 setcookie('price1', 999, time()+60);
// 	 header("location:search.php");
// 	}
// 	if(@$_POST['price']!=''){
// 	 setcookie('price1', $_POST['price'], time()+60);
// 	 header("location:search.php");
// 	}
// 	$price = $_COOKIE['price1'];
// }

// if(!isset($_COOKIE['name1']))
// 	$name=' ';
// else{
// 	if($_COOKIE['name1']=='')
// 	{
// 	 setcookie('name1', ' ', time()+60);
// 	 header("location:search.php");
// 	}
// 	if(@$_POST['name']!=''){
// 	 setcookie('name1', $_POST['name'], time()+60);
// 	 header("location:search.php");
// 	}
// 	$name = $_COOKIE['name1'];
// }
if($_COOKIE['tags1']=='')
{
 setcookie('tags1', ' ', time()+60);
 header("location:search.php");
}
if($_POST['tags']!=''){
 setcookie('tags1', $_POST['tags'], time()+60);
 header("location:search.php");
}
$tags = $_COOKIE['tags1'];

if($_COOKIE['ages1']=='')
{
 setcookie('ages1', 99, time()+60);
 header("location:search.php");
}
if($_POST['ages']!=''){
 setcookie('ages1', $_POST['ages'], time()+60);
 header("location:search.php");
}
$ages = $_COOKIE['ages1'];

if($_COOKIE['platform1']=='')
{
 setcookie('platform1', ' ', time()+60);
 header("location:search.php");
}
if($_POST['platform']!=''){
 setcookie('platform1', $_POST['platform'], time()+60);
 header("location:search.php");
}
$platform = $_COOKIE['platform1'];

if($_COOKIE['language1']=='')
{
 setcookie('language1', 2, time()+60);
 header("location:search.php");
}
if($_POST['language']!=''){
 setcookie('language1', $_POST['language'], time()+60);
 header("location:search.php");
}
$language = $_COOKIE['language1'];

if($_COOKIE['price1']=='')
{
 setcookie('price1', 999, time()+60);
 header("location:search.php");
}
if($_POST['price']!=''){
 setcookie('price1', $_POST['price'], time()+60);
 header("location:search.php");
}
$price = $_COOKIE['price1'];

	if($_COOKIE['name1']=='')
	{
	 setcookie('name1', ' ', time()+60);
	 header("location:search.php");
	}
	if(@$_POST['name']!=''){
	 setcookie('name1', $_POST['name'], time()+60);
	 header("location:search.php");
	}
	$name = $_COOKIE['name1'];
$data=mysqli_query($db, "select name, 
					steamspy_tags, 
					positive_ratings/(positive_ratings+negative_ratings)*100 as Ratings,
					average_playtime,
					owners,
					price,
					appid
					from steam 
					where name like '%$name%' and steamspy_tags like '$tags' and require_age < $ages and platforms like '$platform' and english != $language and price <= $price"); 

if (!$data) {
	printf("Error: %s\n", mysqli_error($db));
	exit();
}
$number = $_COOKIE['set'];
$total = mysqli_num_rows($data);
$page = ceil($total/$number);

$p=@$_GET['p'];
$c=@$_GET['c'];
$s=@$_GET['s'];
$pid=@$_GET['pid'];

//setcookie('id', $pid, 3600);

if($p == '')
{
	$p = 1;
}

if($c == '')
{
	$c = "appid";
}

$start = ($p-1)*$number;

if($s==1)
{
	$data=mysqli_query($db, "select name, 
					steamspy_tags, 
					positive_ratings/(positive_ratings+negative_ratings)*100 as Ratings,
					average_playtime,
					owners,
					price,
					appid
					from steam 
					where name like '%$name%' and steamspy_tags like '$tags' and require_age < $ages and platforms like '$platform' and english != $language and price <= $price 
					order by $c desc
					limit $start, $number"); 
}
else
{
	$data=mysqli_query($db, "select name, 
					steamspy_tags, 
					positive_ratings/(positive_ratings+negative_ratings)*100 as Ratings,
					average_playtime,
					owners,
					price,
					appid
					from steam 
					where name like '%$name%' and steamspy_tags like '$tags' and require_age < $ages and platforms like '$platform' and english != $language and price <= $price 
					order by $c asc
					limit $start, $number"); 
}



?>
<!doctype html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
</style>
<html>
<title>Steam Search</title>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
  <!-- MDBootstrap Datatables  -->
  <link rel="stylesheet" href="css/style.css">
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="test.css">
</head>

</head>

<body>
	
	<H1><a href="search.php"?><img src="https://image.flaticon.com/icons/png/512/23/23822.png" width="30" height="30"><font face="Comic Sans MS"></a>  Steam Game Search </font></H1>

	
	
	<form id="form1" name="form1" method="post" action="">

		<div class="form-group">
		  <div class="row">	  
		  <div class="col-sm col-md">
    			<select class="form-control" name="tags">
    			  	<option value= "%%">All Tags</option>
					<option value= "%Action%">Action</option>
					<option value= "%Casual%">Casual</option>
					<option value= "%FPS%">FPS</option>
					<option value= "%Indie%">Indie</option>
					<option value= "%Multiplayer%">Multiplayer</option>
					<option value= "%Open World%">Open World</option>
					<option value= "%Racing%">Racing</option>
					<option value= "%RPG%">RPG</option>
					<option value= "%Sport%">Multiplayer</option>
					<option value= "%Simulation%">Simulation</option>
					<option value= "%Strategy%">Strategy</option>
					<option value= "%VR%">VR</option>
				</select>
			</div>

			<div class="col-sm col-md">
    			<select class="form-control" name="ages">
    			  	<option value= 100>All Ages</option>
      				<option value= 12>Under 12</option>
					<option value= 16>Under 16</option>
					<option value= 18>Under 18</option>
				</select>
			</div>

			<div class="col-sm col-md">
    			<select class="form-control" name="platform">
    			  	<option value= "%%">All Platforms</option>
      				<option value= "%Windows%">Windows</option>
					  <option value= "%mac%">mac</option>
					  <option value= "%Linux%">Linux</option>
				</select>
			</div>

			<div class="col-sm col-md">
    			<select class="form-control" name="language">
    			  	<option value= 2>All Languages</option>
      				<option value= 0>English</option>
      				<option value= 1>Non-English</option>
				</select>
			</div>

			<div class="col-sm col-md">
    			<select class="form-control" name="price">
    			  	<option value= 999>All Prices</option>
      				<option value= 0>Free</option>
					<option value= 3.99>Below 3.99</option>
					<option value= 6.99>Below 6.99</option>
					<option value= 14.99>Below 14.99</option>
					<option value= 29.99>Below 29.99</option>
				</select>
			</div>
		</div>
		</div>
		
		<div class="input-group input-group-sm mb-3">
  			<div class="input-group-prepend">
    			<span class="input-group-text" id="inputGroup-sizing-sm">Game Name：</span>
			  </div>
			   <?php $name2=' '; ?>
			   <input value="<?php echo $name2?>" name="name" id="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
			   <?php $name1=$name2; ?>
		</div>

	  <p>
	    <input type="submit" name="button" id="button" value="Search" />
	  </p>
	</form>
	
	<H2><a href="favorite.php"?><img src="https://obs.line-scdn.net/0hw7zT292rKBhHLQID8AxXT317K3d0QTsbIxt5BxhDdiw4Gz0dK01gLWt4JS1uSW9GLkhgeWIoMyliTmYae0xg/w644" width="30" height="30"></a><font face="Comic Sans MS" color="red"> Favorite Games  </font>
	<font face="Comic Sans MS" color = "green"><a href="compare.php"?><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQw6AZoPll-EalqaKR5dbAnlvTv5ZC3GaedVw&usqp=CAU" width="30" height="30"></a> Compare publishers</font> 
	</H2>
<p></p>

<table width="1500" border="1" style="border:4px #000079 solid;padding:5px;" rules="all" cellpadding='7'>
   <tr>
	<td align="center"><font face="Comic Sans MS">Name</font></td>
    <td align="center"><font face="Comic Sans MS">Tags</font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="search.php?c=Ratings&amp;s=1"?>Ratings</a>';
													else
														echo '<a href="search.php?c=Ratings&amp;s=2"?>Ratings</a>';
												  ?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="search.php?c=average_playtime&amp;s=1"?>Playtime</a>';
													else
														echo '<a href="search.php?c=average_playtime&amp;s=2"?>Playtime</a>';
												  ?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo '<a href="search.php?c=length(owners) desc,owners&amp;s=1"?>Owners</a>';
													else
														echo '<a href="search.php?c=length(owners),owners&amp;s=2"?>Owners</a>';
												  ?></font></td>
    <td align="center"><font face="Comic Sans MS"><?php 
													if($s!=1)
														echo "<a href=search.php?c=price&s=1&p=$p>Price</a>";
													else
														echo "<a href=search.php?c=price&s=2&p=$p>Price</a>";
												  ?></font></td>
	<td align="center"><font face="Comic Sans MS">Details</font></td>
	<td align="center"><font face="Comic Sans MS"><a href="favorite.php"?>Favorites </a></font></td>
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
	<td align="center"><font face="Comic Sans MS"><?php echo "<a href=detail.php?pid=$rs[6]> Click </a>" ?></font></td>
	<td align="center"><font face="Comic Sans MS"><?php echo "<a href=addfav.php?pid=$rs[6]> Add  </a>" ?></font></td>
  </tr>
  
  <?php
}
?>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
		<?php
		$previous_page=$p-1;
			echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=$previous_page>Previous</a></li>";
			if($p==2)
				echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=1>1</a></li>";
			else if($p>2)
				echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=1>1...</a></li>";
			$page_limit=0;
			for($i=$p;$i<=$page && $i<=$p+9 ;$i++)
			{
				if($i==$p+9)
					$page_limit=$i+1;
				echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=$i > $i </a></li>";
			}
			if($page>$page_limit){
				echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=$page_limit > ... </a></li>";
				echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=$page> $page </a></li>";}
		$next_page=$p+1;
			echo "<li class=\"page-item\"><a class=\"page-link\" href=search.php?s=$s&c=$c&p=$next_page>Next</a></li>"
		?>
	</li>
    </ul>
  </nav>

	<form id="form1" name="form1" method="post" action="">
  	<div align="center">
    <input name="numpage" type="text" id="numpage" size="5" />
  	<font face="Comic Sans MS">Datas Per Page</font>
  	<input type="submit" name="button" id="button" value="Set" />
  	</div>
	</form>
	<p align="center"><font face="Comic Sans MS">Page <?php echo $p?> / Total <?php echo $page?> Pages</font></p> 
<p>&nbsp;</p>

  
  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="test.js"></script>
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>

</body>
</html>