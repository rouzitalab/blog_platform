<html>
<head> <script src="jquery-1.6.2.min.js"></script> </head>
<body style="background-color: #E0D8E0;">

<div id=test style='color:#800000; width:1000px; position:relative; left:15%; top:100px;'><form method='post' action='newblogsubmit.php' enctype='multipart/form-data' id="usrform"><fieldset><legend><em><b>New Blog: </b></em></legend><b><br/>Blog Name: </b>&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='blogname'/><br/><b>Blog Address: </b>&nbsp;<em>http://localhost:1234/</em>&nbsp;&nbsp;&nbsp;<input type='text' name='blogad' id='blogad'/>&nbsp;&nbsp;<input type='button' value='?' onclick='duplicateblogad();'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight:bold;' id='duplicatestatus'></span><br/><b>Category: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="cat"><option value="general">General</option><option value="os">OS</option><option value="google">Google</option><option value="apple">Apple</option><option value="tech">Tech</option><option value="linux">Linux</option><option value="programming">Programming</option></select><br/><br/><br /><br /><b>Blog Header: </b>&nbsp;&nbsp;&nbsp;&nbsp;<input  id='uploadImage' type='file' name='header' onchange='PreviewImage();' accept='image/*' /><script type='text/javascript'>function PreviewImage() {var oFReader = new FileReader();oFReader.readAsDataURL(document.getElementById('uploadImage').files[0]); oFReader.onload = function (oFREvent) {document.getElementById('uploadPreview').src = oFREvent.target.result;};};</script><br/><br/><img id='uploadPreview' style='position: relative; left:30px; width: 900px; height: 200px;' src='empty-header.jpg'/><br/><br/><br/><b>Description:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="describe" form="usrform" style='display:inline-block; vertical-align: middle; width:400px; height: 200px; relative; top:25px;'>Enter text here...</textarea><br /><br /><br /><input type='submit' value='Create' /></fieldset></form></div>
</body>

<script>
function  duplicateblogad() {var username = document.getElementById("blogad").value;
	   jQuery.ajax({
            type: 'POST',
            url: 'blogadexists.php',
            data: 'username='+username,
            cache: false,
            success: function(response){
                if(response == 0){
                   document.getElementById("duplicatestatus").innerHTML=("Availabel");
                   document.getElementById("blogad").style.backgroundColor = 'green';
                }
                else {
                   document.getElementById("duplicatestatus").innerHTML=("Not available");
                   document.getElementById("blogad").style.backgroundColor = 'red';
                     }
                     }
                     
                     });
               
}
</script>
</html>