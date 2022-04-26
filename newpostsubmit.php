<html>
<body>

<?php
$user = $_COOKIE["blogeruser"];
$blogid = $_REQUEST['id'];
$title = $_POST["title"];
$content = $_POST["content"];
date_default_timezone_set('Asia/Tehran');
$timezone = date_default_timezone_get();
$date = date('F j, Y, g:i a', time());
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$blogadquery = mysqli_query($db, "SELECT * FROM blogs WHERE blogid='$blogid'") or die(mysql_error($db));
$blogadrow = mysqli_fetch_array($blogadquery);
$blogad = $blogadrow['blogad'];
$query = mysqli_query($db, "SELECT * FROM posts WHERE title='$title'") or die(mysql_error($db));
if (mysqli_num_rows($query) == 0){
	$rowSQL = mysqli_query($db, "SELECT MAX( postid ) AS max FROM posts" );
	$row = mysqli_fetch_array($rowSQL);
	$largestNumber = $row['max'];
	$postid = $largestNumber + 1;
	$result = mysqli_query($db, "INSERT INTO posts(blogad, user, date,postid, title, `content`) VALUES('$blogad','$user','$date','$postid','$title','$content');") or die(mysql_error($db));
	$queryblog = mysqli_query($db, "SELECT * FROM posts WHERE blogad = '$blogad'");
	$numofposts = mysqli_num_rows($queryblog);
	$resultblog = mysqli_query($db,"UPDATE blogs SET numofposts='$numofposts' WHERE blogad='$blogad'");
}
else {
	echo "Post with this Tiltle Exists Already!";
	echo "<meta http-equiv=\"refresh\" content=\"5;new_post.php\"/>";
	exit();
}
	mysqli_close($db);
	echo "Post Created!";
	echo "<meta http-equiv=\"refresh\" content=\"5;my_home.php\"/>";
?>
</body>
</html>