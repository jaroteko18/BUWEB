<?PHP
	session_start();
	$u=$_SESSION['user'];
	$sql=sql("select * from tb_user where id_user='$u[id_user]'");
	$d=fAr($sql);
	$tR=mysql_query("insert into tb_transaksi values('','$u[id_user]','pembelian','belum','','','','','',now())") or die(mysql_error());
	$idtR=mysql_insert_id();
	foreach($_SESSION[cart] as $id=>$val){
		if($val>0){
			$tR=mysql_query("insert into tb_det_trans values('','$idtR','$id','$val')") or die(mysql_error());
		}
	}
 

echo "<a href='cetak.php?id=$idtR' class='button' target='_new'>CETAK INVOICE</a>";
?>
<center>
<div class="invoice" style="border:1px solid gray;padding:0px;margin:10px;width:400px;"> <br />
<img src="../images/dll/logo.png" style="left:260px;position:absolute;"/><u><b>INVOICE</b></u><br />
NO #<?PHP echo $idtR ?> <br /><br />
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
echo "<br><table cellpadding=5>";
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
Setelah transfer anda bisa konfirmasi pembayaran melalui akun anda.<br />
Jika sudah membayar Klik <a href=?go=profile&m=pembelian>disini</a> untuk menuju ke halaman akun.
</div>
</div>
</center>