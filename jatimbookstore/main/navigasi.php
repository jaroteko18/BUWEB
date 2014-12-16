<?PHP
$u=$_SESSION['user'];
$a=$_GET['go'];
if(!isset($_SESSION[user])){
?>
<div id="n1">
LOGIN
<div id="n11">
<div class="login" style="text-align:center;">
	<form action="cek.php" method="post">
    Username<br>
    <input type="text" name="user">
    </br>
    Password<br>
    <input type="password" name="pass">
    </br><br />
    <input type="submit" value="LOGIN" class="button"> atau <a href=?go=proses&mode=register class=button>Daftar</a>
    </form>
    </div>
</div>
</div>
<?PHP
}
if($a!='cart'&&$a!='checkout'&&$a!='konfirmasi'&&$a!='profile'&&$a!='dashboard'){
?>
<div id="infoCart">
<img src="../images/dll/keranjang.png" style="position:absolute;" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Shopping Cart :</b> <?PHP echo "".$_SESSION[jI]." item(s)"; ?>
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
</div>  
<?PHP
}

if($_GET['go']!='profile'&&$a!='dashboard'){

$sql=sql("select * from tb_kategori");
echo "<div id='n1'>KATEGORI BUKU
<div id='n11'><ul>";
while($d=fObj($sql)){
	echo "<li><a href=?go=katalog&id=$d->id_kategori>$d->nama</a></li>";
}
echo "</ul></div></div>";
}
if($a=='profile'||$a=='dashboard'){

echo "
<div id='n1'><b>DASHBOARD</b> <div id='n11'><b>Aktif sejak</b> $u[tgl_masuk]<br>
</div></div>

<div id='n1'><b>ACTION</b><div id='n11'>
<ul>
<li><a href=?go=profile&m=penjualan>Penjualan</a></li>
<li><a href=?go=profile&m=pembelian>Pembelian</a></li>
<li><a href=?go=profile&m=pemesanan>Pemesanan</a></li>
</ul>
</div></div>

<div id='n1'>
<b>USERNAME $u[username]</b><br>
<div id='n11'>
<b>Nama</b> $u[nama] <br>
<b>Email</b> $u[email] <br>
<b>Telp</b> $u[telp] <br>
</div>
</div>

<div id='n1'>
<b>LOKASI $u[provinsi]</b>
<div id='n11'>
<b>Alamat</b> $u[alamat] <br>
<b>Kota</b> $u[kota] <br>
<b>Negara</b> $u[negara] <br>
</div>
</div>

<div id='n1'>
<b>KETERANGAN</b>
<div id='n11'>
$u[keterangan] <br>
</div>
</div>

<div id='n1'><b>PESAN</b><div id='n11'>
<ul>
<li><a href=?go=profile&m=pm>Private Message</a></li>
</ul>
</div></div> <br><br><br><br><br><br>";
}
?>