<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-color: sienna;">
<?php
	//setcookie("blogger","",-1);
	if (!isset($_COOKIE["bloger"]))
	echo "<div style='color:white; width:350px; position:relative; left:35%; top:100px;'><form action='logincheck.php' method='GET'><fieldset><legend><em><b>Login Form</b></em></legend><b><br/>User Name: </b>&nbsp;&nbsp;<input type='text' name='user'/><br/><b>Password: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' name='pass'/><br/><br/><br/><input type='submit' value='Login' />&nbsp;&nbsp;<a href='register.php'>Register Here</a></fieldset></form></div>";	
	else
		header('Location: my_home.php');
?>

</body>
</html>