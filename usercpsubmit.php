<html>
<body>

<?php
$user = $_COOKIE["blogeruser"];
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$query = mysqli_query($db, "SELECT * FROM blogers WHERE user='$user'") or die(mysql_error($db));
$row = mysqli_fetch_array($query);
$oldname = $row['name'];
$oldbday = $row['bday'];
$oldavatar = $row['avatar'];
$name = (empty($_POST["name"]) ? $oldname : $_POST['name']);
$bday = (empty($_POST["bday"]) ? $oldbday : $_POST['bday']);
$avatarPURI = (empty($_FILES["avatar"]["name"]) ? $oldavatar : "avatar/".$_FILES ["avatar"]["name"]);
	move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatarPURI);
	$result = mysqli_query($db, "UPDATE blogers SET avatar='$avatarPURI', name='$name', bday='$bday' WHERE user='$user'") or die(mysql_error($db));
	mysqli_close($db);
	echo "Changes Have Been Made!";
	//setcookie("bloger") = $name;
	//setcookie("blogeruser") = $user;
	echo "<meta http-equiv=\"refresh\" content=\"5;my_blogs.php\"/>";
?>
</body>
</html>