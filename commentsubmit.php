<html>
<body>

<?php
$postid = $_REQUEST['id'];
echo $postid;
$author = $_POST['name'];
$content = $_POST['comment'];
date_default_timezone_set('Asia/Tehran');
$timezone = date_default_timezone_get();
$date = date('F j, Y, g:i a', time());
echo $date;
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$rowSQL = mysqli_query($db, "SELECT MAX( commentid ) AS max FROM comment" );
$row = mysqli_fetch_array($rowSQL);
$largestNumber = $row['max'];
$commentid = $largestNumber + 1;
$query = mysqli_query($db, "INSERT INTO comment(postid, commentid, date, author, `content`) VALUES('$postid','$commentid','$date','$author','$content');") or die(mysql_error($db));
mysqli_close($db);
echo "Comment Posted!";
echo "<meta http-equiv=\"refresh\" content=\"5;index.php\"/>";
?>
</body>
</html>