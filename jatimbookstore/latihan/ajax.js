function ajax(){
	var xml;
	try{
		xml=new XMLHttpRequest();
	}catch(e){
		try{
			xml=new XMLHttpRequest("Msxml.XMLHTTP");
		}catch(e1){
			try{
				xml=new XMLHttpReques("Microsoft.XMLHTTP");
			}catch(e2){
				alert("Browser ga support");
			}
		}
	}
	return xml;
}