<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-color: #609020;">
<?php
	$user = $_COOKIE['blogeruser'];
	$name = $_COOKIE['bloger'];
	$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
	$query = mysqli_query($db, "SELECT * FROM blogers WHERE user='$user'") or die(mysql_error($db));
	$row = mysqli_fetch_array($query);
	$avatarPURI = $row['avatar'];
	echo "<div style='color:#B0C0E0; width:300px; position:relative; left:87%; top:10px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id='avatar' style='width: 50px; height: 50px;' src='".$avatarPURI."' /><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome, ".$name."<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'> Logout </a></div><br/><br/><br/><br/><div style='width:400px; position:relative; left:30%; border-style:solid; border-radius:1cm; background-color: #D070D0; padding:15px; font-style:italic; font-weight:bold; font-size:x-large;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='user_cp.php'>Edit your Account</a><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='my_blogs.php'>Blog Area</a></div>";	
?>

</body>
</html>