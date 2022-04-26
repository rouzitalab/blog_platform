<html>
<body>

<?php
$user = $_COOKIE['blogeruser'];
$name = $_COOKIE['bloger'];
$blogad = $_POST['blogad'];
$cat = $_POST["cat"];
$blogname = $_POST["blogname"];
$describe = strip_tags($_POST['describe']);
date_default_timezone_set('Asia/Tehran');
$timezone = date_default_timezone_get();
$date = date('F j, Y, g:i a', time());
$headerPURI = (empty($_FILES ["header"]["name"]) ? "empty-header.jpg" : "headers/".$_FILES ["header"]["name"]);
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$query = mysqli_query($db, "SELECT * FROM blogs WHERE blogad='$blogad'") or die(mysql_error($db));
if (mysqli_num_rows($query) == 0){
	move_uploaded_file($_FILES["header"]["tmp_name"], $headerPURI);
	$rowSQL = mysqli_query($db, "SELECT MAX( blogid ) AS max FROM blogs;" );
	$row = mysqli_fetch_array($rowSQL);
	$largestNumber = $row['max'];
	$blogid = $largestNumber + 1;
	$result = mysqli_query($db, "INSERT INTO blogs(blogad, user, date, header,cat, `describe`, blogid, blogname, name) VALUES('$blogad','$user','$date', '$headerPURI','$cat', '$describe','$blogid','$blogname', '$name');") or die(mysql_error($db));
}
else {
	echo "Blog Exists Already!";
	echo "<meta http-equiv=\"refresh\" content=\"5;new_blog.php\"/>";
	exit();
}
	mysqli_close($db);
	echo "Blog Created!";
	echo "<meta http-equiv=\"refresh\" content=\"5;my_home.php\"/>";
?>
</body>
</html>