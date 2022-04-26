<html>
<head> <script src="jquery-1.6.2.min.js"></script> </head>
<body style="background-color: #008080;">
<?php $blogid = $_REQUEST['id'];
echo $blogid;
echo "<div id=test style='color:#800080; width:650px; position:relative; left:25%; top:100px;'><form action='newpostsubmit.php?id=".$blogid."' method='post' id='usrform'><fieldset><legend><em><b>Create New Post: </b></em></legend><b><br/>Title: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='title'/><br/><br/><b>Content:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='content' form='usrform' style='display:inline-block; vertical-align:top; width:400px; height: 200px; relative; top:25px;'>Enter text here...</textarea><br /><br/><br /><input type='submit' value='Post' /></fieldset></form></div>";
?>
</body>
</html>