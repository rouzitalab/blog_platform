<?php
	$id=$_GET['id'];
	
	if(isset($id)){
		
	$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
	$query = mysqli_query($db, "SELECT * FROM posts WHERE postid='$id'") or die(mysql_error($db));
	$commentquery = mysqli_query($db, "SELECT * FROM comment WHERE postid='$id'") or die(mysql_error($db));
	header('Content-type:text/xml');
	
	echo"<post>";
	echo"<id>";
	echo $id;
	echo "</id>";
	while($row=mysqli_fetch_array($query)){
	echo "<title>";
	echo $row['title'];
	echo"</title>";
	
	echo "<date>";
	echo $row['date'];
	echo "</date>";
	
	echo"<body>";
	echo $row['content'];
	echo"</body>";	
	echo "<comments>";
	while($commetnrow=mysqli_fetch_array($commentquery)){
		echo "<comment>";
		echo "<id>";
		echo $commetnrow['commentid'];
		echo "</id>";
		echo "<author>";
		echo $commetnrow['author'];
		echo "</author>";
		echo "<date>";
		echo $commetnrow['date'];
		echo "</date>";
		echo "<body>";
		echo $commetnrow['content'];
		echo "</body>";
		echo "</comment>";
	}
	echo "</comments>";
	echo "</post>";
	 
	 
	}
	}
?>