<?PHP
session_start();
include("../../conf/lib.php");
$id=$_GET[id];
empty($_GET[qty])?$qty=1:$qty=$_GET[qty];
$_SESSION[cart][$id]=$qty;
$_SESSION[jI]=0;
$_SESSION[jJ]=0;
foreach($_SESSION[cart] as $id=>$val){
    $_SESSION[jI]+=$val;
    $_SESSION[jJ]+=1;
}
echo "<div id=cart>
    <table class='keranjang' width='100%' cellpadding=5 cellspacing=5>";
foreach($_SESSION[cart] as $id=>$val){
    if($val>0){
    $sql=sql("select * from tb_barang where id_barang=$id");
    $d=fObj($sql);
    $tot+=$d->harga*$val;
    echo "<tr>
        <td><a href='#'>$d->nama</a></td>
        <td>x</td>
        <td id='u_".$d->id_barang."'>$val</td>
        <td><input type=text id=val$d->id_barang size=2 onChange=up($d->id_barang)></td>
        <td>=</td>
        <td id='u2_".$d->id_barang."'>".uang($d->harga*$val)."</td>
        <td><a href='?go=hapus&id=$d->id_barang' class='button'>hapus</a></td>
        </tr>";
    }
}
echo "</table>
    Jumlah Jenis = ".$_SESSION[jJ]."<br>
	Jumlah Barang = ".$_SESSION[jI]."<br>
    Total Keseluruhan = ".uang($tot)."
    <br><br>
    <a href=?go=home class='button'>Kembali </a> | ";
if(!isset($_SESSION[user])){
    echo "<a href=?go=login class='button'>Login</a>";
}else{
    echo "<a href=?go=checkout class='button'> Konfirmasi</a>";
}
echo "</div><br>";
?>