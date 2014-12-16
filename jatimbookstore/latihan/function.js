function waktu(){
	hariA=Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	bulanA=Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	date=new Date();
	jam=date.getHours();
	menit=date.getMinutes();
	detik=date.getSeconds();
	hari=date.getDay();
	bulan=date.getMonth();
	tahun=date.getYear()+1900;
	document.getElementById("waktu").innerHTML=""+hariA[hari]+", "+bulanA[bulan]+" "+tahun+" "+jam+":"+menit+":"+detik+"";
	setTimeout("waktu()",500);
}

var idrow=1;
function tambah(){
	var x=document.getElementById("table").insertRow(idrow);
	var td1=x.insertCell(0);
	td1.innerHTML="hahaha";
	idrow++;
}
function kurang(){
	if(idrow>1){
		var x=document.getElementById("table").deleteRow(idrow-1);
		idrow--;
	}
}