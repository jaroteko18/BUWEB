<?php
$id=$_GET[id];
$_SESSION[cart][$id]=0;
$_SESSION[jI]=0;
$_SESSION[jJ]=0;
foreach($_SESSION[cart] as $id=>$val){
    $_SESSION[jI]+=$val;
    $_SESSION[jJ]+=1;
}
go("?go=cart",0);
?>
