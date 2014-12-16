<?PHP
session_start();
include "../conf/lib.php";
$u=$_SESSION[user];
$idtR=$_GET[id];
?>

<html>
<head>
<title></title>
<link rel="stylesheet" href="style.css">
</head>
<body onLoad="window.print()"> 

<div class="invoice" style="border:1px solid gray;padding:0px;margin:10px;width:400px; text-align:center;"> <br />
<img src="../images/dll/logo.png" style="left:130px;position:absolute;"/><u><b>INVOICE</b></u><br />
NO #$idtR <br /><br />
<div style="border-top:1px solid gray;text-align:right;">
<?PHP
echo "
<table align='center'>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td>$u[nama]</td>
</tr>
<tr>
	<td>Email</td>
	<td>:</td>
	<td>$u[email]</td>
</tr>
<tr>
	<td>Telp</td>
	<td>:</td>
	<td>$u[telp]</td>
</tr>
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td>$u[alamat]</td>
</tr>
</table>";
?>
</div>
<div style="border-top:1px solid gray;">
<?PHP
echo "<br><table cellpadding=5 align=center>";
foreach($_SESSION[cart] as $id=>$val){
    if($val>0){
    $sql=sql("select * from tb_barang where id_barang='$id'");
    $d=fRow($sql);
    $tot+=$d[6]*$val;
    echo "<tr>
        <td  style='border:1px solid gray;'>$d[2]</td>
        <td  style='border:1px solid gray;'>x</td>
        <td  style='border:1px solid gray;'>$val buku</td>
        <td  style='border:1px solid gray;'>=</td>
        <td  style='border:1px solid gray;'>".uang($d[6]*$val)."</td>
        </tr>";
    }
}
echo "</table>
    Jumlah Buku = ".$_SESSION[jI]."<br>
	Jumlah Jenis = ".$_SESSION[jJ]."<br>
	Kode Transfer = ".substr($u['telp'],-3,3)."<br>
    Total Keseluruhan = ".uang($tot+substr($u['telp'],-3,3))." <br><br>";
	session_unregister("cart");
	session_unregister("jI");
	session_unregister("jJ");

?>
</div>
<div style="border-top:1px solid gray;">
<p align="left">Terima kasih Sdr <b> <?PHP echo $d['nama']  ?></b> atas pembelian anda.<br />
Nomor transaksi anda "<?php echo $idtR?>"<br />
Silahkan lakukan transfer pada :</p> 
<ul style="text-align:left;">
<li>085-7909-33044 (BNI) a/n Sdr Jarot Eko Saputra</li>
<li>085-7909-33044 (BNA) a/n Sdr Saputra</li>
<li>085-7909-33044 (BNC) a/n Sdr Eko</li>
</ul>
</div>
</div>

</body>
</html>