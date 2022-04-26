<html>
<head> <script src="jquery-1.6.2.min.js"></script> </head>
<body style="background-color: rgb(144,247,144);">

<div id=test style='color:#8028E0; width:650px; position:relative; left:25%; top:100px;'><form action='registersubmit.php' method='post' enctype='multipart/form-data'><fieldset><legend><em><b>Register Form</b></em></legend><b><br/>User Name: </b>&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='user' id='user'/>&nbsp;<input type='button' value='?' onclick='duplicateuser();'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight:bold;' id='duplicatestatus'></span><br/><b>Password: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' name='pass'/><br/><b>Name: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='name'/><br/><b>Date of Birth: </b>&nbsp;<input type='date' name='bday'/><br/><br/><b>Avatar: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id='uploadPreview' style='width: 100px; height: 100px;' src='empty-avatar.png' align='middle' />&nbsp;&nbsp;&nbsp;<input  id='uploadImage' type='file' name='avatar' onchange='PreviewImage();' accept='image/*' /><script type='text/javascript'>function PreviewImage() {var oFReader = new FileReader();oFReader.readAsDataURL(document.getElementById('uploadImage').files[0]); oFReader.onload = function (oFREvent) {document.getElementById('uploadPreview').src = oFREvent.target.result;};};</script><br/><br/><input type='submit' value='Register' /></fieldset></form></div>
</body>

<script>
function  duplicateuser() {var username = document.getElementById("user").value;
	   jQuery.ajax({
            type: 'POST',
            url: 'userexists.php',
            data: 'username='+username,
            cache: false,
            success: function(response){
                if(response == 0){
                   document.getElementById("duplicatestatus").innerHTML=("Availabel");
                   document.getElementById("user").style.backgroundColor = 'green';
                }
                else {
                   document.getElementById("duplicatestatus").innerHTML=("Not available");
                   document.getElementById("user").style.backgroundColor = 'red';
                     }
                     }
                     
                     });
               
}
</script>
</html>