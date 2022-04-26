<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="FPStyle.css">
</head>
<body style="background-color: #008880;" onload="initial()">
	<div id="Buttons">
		<button onclick="home()"> Home </button>
		<button onclick="window.location.href='new_blog.php'"> Create New Blog </button>
		<button onclick="window.location.href='index.php'"> Go to Index </button>
	</div>
	<div id="Head" style= 'border-radius: 1cm; border-style: solid; width: 70%; margin-left: 15%; box-shadow: 25px 25px 195px 90px rgb(215,226,239); color: white;' align="center" ></div>
	<!-- 
	<button onclick="window.location.href='login.php'"> Login </button>
	<button onclick="window.location.href='register.php'"> Register </button>
	 </div>
	 <div id="Tag">
	<button onclick="initial()"> Select Tag </button>
	<form name="frmSelTag">
	<select name="selTag">
		<option value="default">All</option>
		<option value="first">Linux</option>
		<option value="second">Technology</option>
		<option value="third">Programming</option>
		<option value="fourth">Apple</option>
		<option value="fifth">Hack</option>
		<option value="sixth">Google</option>
	</select>
	</form>
	</div> -->

	<div id="Blogs" style=' font-family:candara; position:relative; width:50%; left:25%;'> </div>
	<script>
	var username = <?php echo json_encode($_COOKIE['bloger']); ?>;
	alert (username);
	initial();
	// b();
	
</script>
<div id="Pages"> </div>
</body>
</html>
<script>

Request = new XMLHttpRequest();
Request.open ("GET", "xml1.php",false);
Request.send();
MainXML = Request.responseXML;


var Num = MainXML.getElementsByTagName("id");
var NumberOfBlogs = Num.length;
var Address = MainXML.getElementsByTagName("url");
var Names = new Array();
var Author = new Array();
var BlogDescription = new Array();
var NumberOfPosts = new Array();
var NumberOfPages = new Array();
var Posts = new Array();
var PostsBody = new Array();
var PostsDate = new Array();
var PostsTitle = new Array();
var SearchTag = new Array();
var HeaderSrc = new Array();
var PostsXMLForComments = new Array();
var TempStuff;
var TempStuffArray = new Array();


for (i=0; i<NumberOfBlogs; i++){
	SearchTag[i] = new Array();
	Posts[i] = new Array();
	PostsDate[i] = new Array();
	PostsBody[i] = new Array();
	PostsTitle[i] = new Array();
	Request = new XMLHttpRequest();
	Request.open("GET","xml2.php?id="+Num[i].childNodes[0].nodeValue, false);
	Request.send();
	Blogs = Request.responseXML;
	
	TempStuff = Blogs.getElementsByTagName("name");
	Names[i] = TempStuff[0].childNodes[0].nodeValue;
	TempStuff = Blogs.getElementsByTagName("author");
	Author[i] = TempStuff[0].childNodes[0].nodeValue;
	TempStuff = Blogs.getElementsByTagName("description");
	BlogDescription[i] = TempStuff[0].childNodes[0].nodeValue;
	TempStuff = Blogs.getElementsByTagName("header");
	HeaderSrc[i] = "'"+TempStuff[0].childNodes[0].nodeValue+"'";
	TempStuffArray = Blogs.getElementsByTagName("url");
	for (j=0; j<TempStuffArray.length; j++){
		Posts[i][j] = TempStuffArray[j].childNodes[0].nodeValue;
	}
	TempStuffArray = Blogs.getElementsByTagName("date");
	for (j=0; j<TempStuffArray.length; j++){
		PostsDate[i][j] = TempStuffArray[j].childNodes[0].nodeValue;
	}
	NumberOfPosts[i] = Posts[i].length;
	NumberOfPages[i] = Math.ceil(NumberOfPosts[i]/2);
	
	 TempStuffArray= Blogs.getElementsByTagName("tag");
	 for (j=0; j<TempStuffArray.length; j++){
	 SearchTag[i][j] = TempStuffArray[j].childNodes[0].nodeValue;
	 }
	}
	
function initial(){
	
	var element = document.getElementById("Blogs");
	element.innerHTML = (" ");
	element = document.getElementById("Head");
	element.innerHTML = ("<h1>Front Page:</h1><h5>Select the Chosen Blog</h5>");
	
for (i=0; i<NumberOfBlogs; i++){
	if(Author[i]==username){
	var box = document.createElement("div");
	box.id= "Blog#"+ i;

	box.innerHTML = ("<br><h2> Blog " +(i+1)+ ": " +Names[i]+ "</h2><p style='font-weight:Bold'> By: " +Author[i]+ "</p><p> <span style='font-weight:Bold'> Description: </span>" +BlogDescription[i]+ "<p><span style='font-weight:Bold'> Number of posts: </span>" + NumberOfPosts[i]+ "<br><br><button onclick='OpenBlog("+i+")'> View Blog </button>" );
	
	box.style.borderStyle = 'solid';
	box.style.borderRadius = '1em';
	box.style.backgroundColor = 'rgb(215,226,239)';
	
	box.style.padding = '5px';
	box.style.paddingLeft = '10px';
	box.style.margin = '10px';
	box.style.marginLeft = '0';
	var division = document.getElementById("Blogs");
	division.appendChild(box);
}	else continue;}
	alert(Posts[0][1]);

}

function OpenBlog(i){
	alert(HeaderSrc[i]);
	var str = "window.location.href='new_post.php?id="+(i+1)+"'";
	var element = document.getElementById("Blogs");
		element.innerHTML = (" ");
		element = document.getElementById("Head");
		element.innerHTML = ("<div style='background-image="+HeaderSrc[i]+"'> <h1>"+Names[i]+"</h1><h3>"+Author[i]+"</h3></div>");
		//element.style.backgroundColor = red;
		element = document.getElementById("Buttons");
		element.innerHTML = ("<button onclick='home()'> Home </button><button onclick="+str+"> Create New Post </button>");
		// element = document.getElementById("Tag");
		// element.innerHTML = (" ");
	for (j=0; j<NumberOfPosts[i]; j++){
		Request.open("GET", "xml3.php?id="+Posts[i][j], false);
		Request.send();
		PostsXML = Request.responseXML;
		PostsXMLForComments[j] = Request.responseXML;
		TempStuffArray = PostsXML.getElementsByTagName("body");
		PostsBody[i][j] = TempStuffArray[0].childNodes[0].nodeValue;
		TempStuff = PostsXML.getElementsByTagName("title");
		PostsTitle[i][j] = TempStuff[0].childNodes[0].nodeValue;
	
	// if(NumberOfPosts[i]!=0){
	// for (k=0; k<(NumberOfPosts[i]<2? NumberOfPosts[i]:2); k++){
		
		var element2 = document.createElement("div");
		element2.innerHTML = ("<br><h2> " +PostsTitle[i][j]+ "</h2><p style='font-weight:Bold'> Date:  " +PostsDate[i][j]+ "</p><p>  " +PostsBody[i][j]+ "</p> <button onclick='OpenComments("+i+","+j+")'> Show Comments </button>");
		element2.style.borderStyle = 'solid';
		element2.style.borderRadius = '1em';
		element2.style.backgroundColor = 'rgb(215,226,239)';
		element2.style.padding = '10px';
		element2.style.margin = '10px';
		element2.style.marginLeft = '0';
		element = document.getElementById("Blogs");
		element.appendChild(element2);
	}
	}
	// element = document.getElementById("Pages");
	// for (j=0; j<NumberOfPages[i]; j++){
		// element.innerHTML += ("<button onclick='blogPages("+i+","+j+")'>Page"+(j+1)+"</button>")
	// }
function blogPages(i,j){
	
	var element = document.getElementById("Blogs");
	element.innerHTML = (" ");
	for (k=2*j; k<Math.min((2*j)+2,NumberOfPosts[i]); k++){
		
		var element2 = document.createElement("div");
		element2.innerHTML = ("<br><h2> " +PostsTitle[i][k]+ "</h2><p style='font-weight:Bold'> Date:  " +PostsDate[i][k]+ "</p><p>  " +PostsBody[i][k]+ "</p> <button onclick='OpenComments("+i+","+k+")'> Show Comments </button>");
		element2.style.borderStyle = 'solid';
		element2.style.borderRadius = '1em';
		element2.style.backgroundColor = 'rgb(215,226,239)';
		element2.style.padding = '10px';
		element2.style.margin = '10px';
		element2.style.marginLeft = '0';
		element.appendChild(element2);
	}
}
function home(){
	var element = document.getElementById("Blogs");
	element.innerHTML = (" ");
	element = document.getElementById("Pages");
	element.innerHTML = (" ");
	element = document.getElementById("Buttons");
	element.innerHTML = ("<button onclick='home()'> Home </button> <button onclick='home()'> Create New Blog </button>");
	initial();
}
function OpenComments(i,j){
var element = document.getElementById("Blogs");
	element.innerHTML = (" ");		
		var element2 = document.createElement("div");
		element2.innerHTML = ("<br><h2> " +PostsTitle[i][j]+ "</h2><p style='font-weight:Bold'> Date:  " +PostsDate[i][j]+ "</p><p>  " +PostsBody[i][j]+ "</p>");
		element2.style.borderStyle = 'solid';
		element2.style.borderRadius = '1em';
		element2.style.backgroundColor = 'rgb(215,226,239)';
		element2.style.padding = '10px';
		element2.style.margin = '10px';
		element2.style.marginLeft = '0';
		element.appendChild(element2);
		element2 = document.createElement("div");
		element2.innerHTML = ("<br><div id='commentGaah'><b>Comments:<b></div><br><br>");
		element2.style.borderStyle = 'solid';
		element2.style.borderRadius = '1em';
		element2.style.backgroundColor = 'rgb(215,226,239)';
		element2.style.padding = '10px';
		element2.style.margin = '10px';
		element2.style.marginLeft = '0';
		element.appendChild(element2);
		element = document.getElementById("Pages");
		element.innerHTML = (" ");
		xmlhttp_POST = new XMLHttpRequest();
	xmlhttp_POST.open("GET","FPXSLT.xsl",false);
	xmlhttp_POST.send();
xslt=	xmlhttp_POST.responseXML;
xml=PostsXMLForComments[j];
 	xsltProcessor = new XSLTProcessor();
	xsltProcessor.importStylesheet(xslt);
 	resultDocument = xsltProcessor.transformToFragment(xml, document);
	document.getElementById("commentGaah").appendChild(resultDocument);
}


</script>