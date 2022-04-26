<html>
<body>

<?php
$user = $_GET["user"];
$pass = $_GET["pass"];
$db = mysqli_connect("127.0.0.1", "root", "", "hw4") or die(mysqli_connect_error());
$result = mysqli_query($db, "SELECT * FROM blogers WHERE user='$user'") or die(mysql_error($db));
if (!($row = mysqli_fetch_assoc($result))){
//echo "you havn't registered";
echo "Haven't Register Yet!";
echo "<meta http-equiv=\"refresh\" content=\"3;register.php\"/>";
}
elseif ($pass==$row["pass"]){
$name = $row["name"];
setcookie("blogeruser",$user);
setcookie("bloger",$name);
echo "Logged In Succesfully!";
echo "<meta http-equiv=\"refresh\" content=\"3;my_home.php\"/>";
}

else {
echo "Password Incorrect!";
echo "<meta http-equiv=\"refresh\" content=\"3;login.php\"/>";
}
 ?>

</body>
</html>