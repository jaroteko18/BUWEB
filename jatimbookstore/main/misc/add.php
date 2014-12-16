<?PHP
session_start();
include "../../conf/lib.php";
sleep(1);
$id=$_GET[id];
empty($_GET[qty])?$qty=1:$qty=$_GET[qty];
$_SESSION[cart][$id]+=$qty;
$_SESSION[jI]=0;
$_SESSION[jJ]=0;
foreach($_SESSION[cart] as $id=>$val){
    $_SESSION[jI]+=$val;
    $_SESSION[jJ]+=1;
}
?>
<img src="../images/dll/keranjang.png" style="position:absolute;" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Shopping Cart :</b> <?PHP echo "".$_SESSION[jI]." item(s)"; ?>
<br /><br />
Silhakan menuju kehalaman <a href=?go=cart>cart</a> untuk konfirmasi pemesanan.

<?PHP
echo "<table>";
foreach($_SESSION[cart] as $id=>$val){
	if($val>0){
     	$sql=sql("select * from tb_barang where id_barang=$id");
        $d=fAr($sql);
        $tot+=$d["harga"]*$val;
        echo "<tr>
        <td>$val</td><td>x</td><td><a href=?go=barang?id=".$d["id_barang"]." title=".$d["nama"].">".$d["nama"]."</a></td>   
         </tr>";
     }
}
echo "</table>
<b>Total Harga :</b> ".uang($tot)."<br>
<b>Jumlah Barang : </b> ".$_SESSION[jI]." <br>
<b>Jumlah Jenis : </b>".$_SESSION[jJ]." <br>
";
?>