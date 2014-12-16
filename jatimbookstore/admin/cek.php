<?php
session_start();
include "../conf/lib.php";
extract($_POST);
$sql=sql("select * from tb_admin where username='$user' and password='".md5($pass)."'") or die(mysql_error());
$d=fAr($sql);
if(nRow($sql)>0){
    $_SESSION[admin]=$d;
	echo "<div>Username dan Password Sesuai</div>";
    go("index.php?go=home",1);
	exit();
}else{
    echo "<div>Username dan Password Tidak Sesuai</div>";
	go('index.php?go=home',1);
}
?>
