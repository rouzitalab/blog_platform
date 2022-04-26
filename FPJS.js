Request = new XMLHttpRequest();
Request.open ("GET", "xml1.php",false);
Request.send();
MainXML = Request.responseXML;


var Num = MainXML.getElementsByTagName("id");
var NumberOfBlogs = Num.length;
var Address = MainXML.getElementsByTagName("url");
var Posts = new Array();
var PostsBody = new Array();
var PostsDate = new Array();
var PostsTitle = new Array();
var Tags = new Array();
var NumberOfPosts = new Array();
var NumberOfPages = new Array();
var Names = new Array();
var Author = new Array();
var BlogDescription = new Array();
var SearchTag = new Array();
var TempStuffArray = new Array();
var PostsXMLForComments = new Array();

for (i=0; i<NumberOfBlogs; i++){
	SearchTag[i] = new Array();
	Posts[i] = new Array();
	PostsDate[i] = new Array();
	PostsBody[i] = new Array();
	PostsTitle[i] = new Array();
	Request.open("GET","xml2.php?id="+Address[i].childNodes[0].nodeValue, false);
	Request.send();
	Blogs = Request.responseXML;
	
	var TempStuff = Blogs.getElementsByTagName("name");
	Names[i] = TempStuff[0].childNodes[1].nodeValue;
	TempStuff = Blogs.getElementsByTagName("author");
	Author[i] = TempStuff[0].childNodes[0].nodeValue;
	TempStuff = Blogs.getElementsByTagName("description");
	BlogDescription[i] = TempStuff[0].childNodes[1].nodeValue;
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
	
	var selObj = document.frmSelTag.selTag;
	var selIndex = selObj.selectedIndex;
	var selOptionValue = selObj.options[selIndex].value;
	var selOptionText = selObj.options[selIndex].text;
	
if(selIndex==0){
for (i=0; i<NumberOfBlogs; i++){
	var box = document.createElement("div");
	box.id= "Blog#"+ i;

	box.innerHTML = ("<br><h2> Blog " +(i+1)+ ": " +Names[i]+ "</h2><p style='font-weight:Bold'> By: " +Author[i]+ "</p><p> <span style='font-weight:Bold'> Description: </span>" +BlogDescription[i]+ "<p><span style='font-weight:Bold'> Number of posts: </span>" + NumberOfPosts[i]+ "<br><br><button onclick='OpenBlog("+i+")'> View Blog </button>");
	
	box.style.borderStyle = 'solid';
	box.style.borderRadius = '1em';
	box.style.backgroundColor = 'rgb(215,226,239)';
	
	box.style.padding = '5px';
	box.style.paddingLeft = '10px';
	box.style.margin = '10px';
	box.style.marginLeft = '0';
	var division = document.getElementById("Blogs");
	division.appendChild(box);
}
}
else{
for (i=0; i<NumberOfBlogs; i++){

	for(j=0; j<SearchTag[i].length; j++){
		if (SearchTag[i][j]==selOptionText){
	var box = document.createElement("div");
	box.id= "Blog#"+ i;

	box.innerHTML = ("<br><h2> Blog " +(i+1)+ ": " +Names[i]+ "</h2><p style='font-weight:Bold'> By: " +Author[i]+ "</p><p> <span style='font-weight:Bold'> Description: </span>" +BlogDescription[i]+ "<p><span style='font-weight:Bold'> Number of posts: </span>" + NumberOfPosts[i]+ "<br><br><button onclick='OpenBlog("+i+")'> View Blog </button>");
	
	box.style.borderStyle = 'solid';
	box.style.borderRadius = '1em';
	box.style.backgroundColor = 'rgb(215,226,239)';
	box.style.padding = '5px';
	box.style.paddingLeft = '10px';
	box.style.margin = '10px';
	box.style.marginLeft = '0';
	var division = document.getElementById("Blogs");
	division.appendChild(box);
		break;
		}
		else continue;
	}
}
	
}
}

function home(){
	var element = document.getElementById("Blogs");
	element.innerHTML = (" ");
	element = document.getElementById("Pages");
	element.innerHTML = (" ");
	element = document.getElementById("Tag");
	element.innerHTML = ("<button onclick='initial()'> Select Tag </button> <form name='frmSelTag'><select name='selTag'><option value='default'>All</option><option value='first'>Linux</option><option value='second'>Technology</option><option value='third'>Programming</option><option value='fourth'>Apple</option><option value='fifth'>Hack</option><option value='sixth'>Google</option></select></form> ");
	initial();
}
	

function OpenBlog(i){
	var element = document.getElementById("Blogs");
		element.innerHTML = (" ");
		element = document.getElementById("Head");
		element.innerHTML = ("<h1>"+Names[i]+"</h1><h3>"+Author[i]+"</h3>");
		element = document.getElementById("Tag");
		element.innerHTML = (" ");
	for (j=0; j<NumberOfPosts[i]; j++){
		Request.open("GET", Posts[i][j], false);
		Request.send();
		PostsXML = Request.responseXML;
		PostsXMLForComments[j] = Request.responseXML;
		TempStuffArray = PostsXML.getElementsByTagName("body");
		PostsBody[i][j] = TempStuffArray[0].childNodes[1].nodeValue;
		TempStuff = PostsXML.getElementsByTagName("title");
		PostsTitle[i][j] = TempStuff[0].childNodes[1].nodeValue;
	}
	
	for (k=0; k<2; k++){
		
		var element2 = document.createElement("div");
		element2.innerHTML = ("<br><h2> " +PostsTitle[i][k]+ "</h2><p style='font-weight:Bold'> Date:  " +PostsDate[i][k]+ "</p><p>  " +PostsBody[i][k]+ "</p> <button onclick='OpenComments("+i+","+k+")'> Show Comments </button>");
		element2.style.borderStyle = 'solid';
		element2.style.borderRadius = '1em';
		element2.style.backgroundColor = 'rgb(215,226,239)';
		element2.style.padding = '10px';
		element2.style.margin = '10px';
		element2.style.marginLeft = '0';
		element = document.getElementById("Blogs");
		element.appendChild(element2);
	}
	element = document.getElementById("Pages");
	for (j=0; j<NumberOfPages[i]; j++){
		element.innerHTML += ("<button onclick='blogPages("+i+","+j+")'>Page"+(j+1)+"</button>")
	}

	
}
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
