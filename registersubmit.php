<html>
<body>

<?php
$user = $_POST["user"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$bday = $_POST["bday"];
$avatarPURI = (empty($_FILES ["avatar"]["name"]) ? "empty-avatar.png" : "avatar/".$_FILES ["avatar"]["name"]);
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$query = mysqli_query($db, "SELECT * FROM blogers WHERE user='$user'") or die(mysql_error($db));
if (mysqli_num_rows($query) == 0){
	move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatarPURI);
	$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
	$result = mysqli_query($db, "INSERT INTO blogers(user, pass, avatar, name, bday) VALUES('$user', '$pass', '$avatarPURI', '$name', '$bday');") or die(mysql_error($db));
}
else {
	echo "Username Exists Already!";
	echo "<meta http-equiv=\"refresh\" content=\"5;register.php\"/>";
}
	mysqli_close($db);
	echo "You've Registered!";
	//setcookie("bloger") = $name;
	//setcookie("blogeruser") = $user;
	echo "<meta http-equiv=\"refresh\" content=\"5;login.php\"/>";
?>
</body>
</html>