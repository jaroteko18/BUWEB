function add(id){
	val=document.getElementById("val"+id).value;
	xml=ajax();
	url="add.php?id="+id+"&qty="+val;
	xml.onreadystatechange=function(){
		if(xml.readyState==4){
			data=xml.responseText;
			document.getElementById("infoCart").innerHTML=data;
		}
	}
	xml.open("GET",url,true);
	xml.send(null);
}

function show(id){
	document.getElementById("hide"+id).style.visibility="visible";
}
function hide(id){
	document.getElementById("hide"+id).style.visibility="hidden";
}