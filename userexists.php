<?php
	$username = $_POST['username'];
	$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
	$query = mysqli_query($db, "SELECT * FROM blogers WHERE user='$username'") or die(mysql_error($db));     // mysql_select_db(DATABASE) or die(mysql_error());
    if (mysqli_num_rows($query) == 0){
		echo '0';
	}
	else {
		echo '1';
}
	 
	 

?>