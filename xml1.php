<?php
	$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
	$query = mysqli_query($db, "SELECT * FROM blogs ORDER BY `blogid` ASC") or die(mysql_error($db));
	
	header('Content-type:text/xml');
	echo"<blogs>";
	while($row=mysqli_fetch_array($query)){
	echo"<id>";
	echo $row['blogid'];
	echo "</id>";
	
	echo "<url>";
	echo $row['blogad'];
	echo "</url>";
	}
	echo "</blogs>";

?>