<?php
	$id=$_GET['id'];
	
	if(isset($id)){
		
	$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
	$blogadquery = mysqli_query($db, "SELECT * FROM blogs WHERE blogid='$id'") or die(mysql_error($db));
	$blogadrow = mysqli_fetch_array($blogadquery);
	$blogad = $blogadrow['blogad'];
	$postsquery = mysqli_query($db, "SELECT * FROM posts WHERE blogad='$blogad'") or die(mysql_error($db));
	$query = mysqli_query($db, "SELECT * FROM blogs WHERE blogid='$id'") or die(mysql_error($db));

	header('Content-type:text/xml');
	
	echo"<post>";
	echo"<id>";
	echo $id;
	echo "</id>";
	while($row=mysqli_fetch_array($query)){
	echo "<name>";
	echo $row['blogname'];
	echo"</name>";
	
	echo "<author>";
	echo $row['name'];
	echo "</author>";
	
	echo"<description>";
	echo $row['describe'];
	echo"</description>";
	
	echo "<tag>";
	echo $row['cat'];
	echo "</tag>";
	
	echo "<header>";
	echo $row['header'];
	echo "</header>";
	
	echo "<posts>";
	
	
	
	while($postrow=mysqli_fetch_array($postsquery)){
		echo "<post>";
		echo "<id>";
		echo $postrow['postid'];
		echo "</id>";
		echo "<date>";
		echo $postrow['date'];
		echo "</date>";
		echo "<url>";
		echo $postrow['postid'];
		echo "</url>";
		echo "</post>";
	}
		 echo "</posts>";
	}
	
	echo "</post>";
	 
	 
	}
?>