<?PHP
session_start();
include "lib.php";
$id=$_GET[id];
empty($_GET[qty])?$qty=1:$qty=$_GET[qty];
$_SESSION[cart][$id]+=$qty;
$_SESSION[jI]=0;
$_SESSION[jJ]=0;
foreach($_SESSION[cart] as $id=>$val){
	$_SESSION[jI]+=$val;
	$_SESSION[jJ]+=1;
}

foreach($_SESSION[cart] as $id=>$val){
	if($val>0){
		echo "<br><br> IDnya $id dan VALnya $val <br>";
		$n=9000000;
		echo uang($n);
	}
}



?>