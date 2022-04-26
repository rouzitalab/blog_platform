<html>
<head> <script src="jquery-1.6.2.min.js"></script> </head>
<body style="background-color: #008080;">
<?php 
if(isset($_COOKIE['blogeruser'])){
$blogid = $_REQUEST['blogid'];
$post = $_REQUEST['post'];
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$blogadquery = mysqli_query($db, "SELECT * FROM blogs WHERE blogid='$blogid'") or die(mysql_error($db));
$blogadrow = mysqli_fetch_array($blogadquery);
$blogad = $blogadrow['blogad'];
$rowSQL = mysqli_query($db, "SELECT MIN( postid ) AS min FROM posts WHERE blogad='$blogad'" );
$row = mysqli_fetch_array($rowSQL);
$smallestNumber = $row['min'];
$postid = $smallestNumber + $post - 1;
echo $postid;
echo "<div id=test style='color:#FFD8B0; width:650px; position:relative; left:25%; top:100px;'><form action='commentsubmit.php?id=".$postid."' method='post' id='usrform'><fieldset><legend><em><b>Post a comment: </b></em></legend><b><br/>Name: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='name'/><br/><br/><b>Comment:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='comment' form='usrform' style='display:inline-block; vertical-align:top; width:400px; height: 200px; relative; top:25px;'>Enter text here...</textarea><br /><br/><br /><input type='submit' value='Post' /></fieldset></form></div>";
}
else {echo "You Should Login to Post a Comment!";
echo "<meta http-equiv=\"refresh\" content=\"3;login.php\"/>";
}
?>
</body>
</html>