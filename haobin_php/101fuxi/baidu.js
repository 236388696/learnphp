var mor = document.getElementById("more");
var ri = document.getElementById("right");
mor.onmouseover = function(){
	more.style.backgroundColor = "#f9f9f9";
	moretxt.style.color = "black";
	right.style.display = "block";
}
mor.onmouseleave = function(){
	more.style.backgroundColor = "rgb(57, 139, 251)";
	moretxt.style.color = "white";
	right.style.display = "none";
}
ri.onmouseover = function(){
	if(ri.style.opacity = "1"){
		more.style.backgroundColor = "#f9f9f9";
		moretxt.style.color = "black";
		right.style.display = "block";
	}
}
ri.onmouseleave = function(){
	more.style.backgroundColor = "rgb(57, 139, 251)";
	moretxt.style.color = "white";
	right.style.display = "none";
}
var setting = document.getElementById("set");
var stxt = document.getElementById("settxt");
var timer;
var a = document.getElementsByClassName("a");

setting.onmouseenter = function(){
	stxt.style.display = "block";
}
stxt.onmouseenter = function(){
	clearTimeout(timer);
	stxt.style.display = "block";
}
setting.onmouseleave = function(){
	timer = setTimeout(function(){
		stxt.style.display = "none";
	},500)
}
stxt.onmouseleave = function(){
	stxt.style.display = "none";
}
for(i = 0; i < a.length; i++){
	a[i].onmouseenter = function(){
		for(j = 0; j < a.length; j++){
			if(this == a[j]){
				a[j].style.backgroundColor = "rgb(57, 139, 251)";
			}
		}
	}
	a[i].onmouseleave = function(){
		for(j = 0; j < a.length; j++){
			if(this == a[j]){
				a[j].style.backgroundColor = "white";
			}
		}
	}
}
var bgc = document.getElementById("bgc");
var loadin = document.getElementById("loadin");
var x = document.getElementById("x");
loadin.onclick = function(){
	bgc.style.display = "block";
}
x.onclick = function(){
	bgc.style.display = "none";
}
