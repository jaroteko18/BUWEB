<?php
session_start();
?>

<style>
#c{
padding:5px;width:665px;height:auto;  -moz-border-radius: 25px 10px / 10px 25px;
background-color:#CC9;margin-top:10px;border:1px solid #AA5; font-size:12px;
}
#c div{
padding:5px;width:650px;height:auto;  -moz-border-radius: 25px 10px / 10px 25px;
background-color:#FBFBFB;border:1px solid #808040;font-size:12px;
}
</style>

<?PHP
include "../conf/lib.php";
extract($_POST);
$sql=sql("select * from tb_user where username='$user' and password='".md5($pass)."'") or die(mysql_error());
$d=fAr($sql);
$a= nRow($sql);
if($a>0){
    $_SESSION[user]=$d;
	echo "Username dan Password Sesuai";
    go('index.php',1);
}else{
    echo "<div id='c'><div>Username dan Password Tidak Sesuai</div></div>";
	go('index.php',1);
}
?>
