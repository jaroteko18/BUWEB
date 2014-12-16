<?PHP
	session_start();
	$u=$_SESSION['user'];
	$sql=sql("select * from customer where id_customer='$u[id_customer]'") or die(mysql_error());
	$d=fAr($sql);
	$tR=mysql_query("insert into transaksi_barang values('','$u[id_customer]','belum','','','',now()") or die(mysql_error());
	$idtR=mysql_insert_id();
	foreach($_SESSION[cart] as $id=>$val){
		if($val>0){
			$tR=mysql_query("insert into detail_transaksi values('','$idtR','$id','$val')") or die(mysql_error());
		}
	}
	session_unregister("cart");
	session_unregister("jI");
	session_unregister("jJ");
?>
<h3>Transaksi Selesai</h3>
Terima kasih Sdr <b> <?PHP echo $d['name']  ?></b> atas pembelian anda.<br />
Nomor transaksi anda "<?php echo $idtR?>"<br />
Silahkan lakukan transfer pada : 
<blockquote>
085-7909-33044 (BNI) a/n Sdr Jarot Eko Saputra
085-7909-33044 (BNA) a/n Sdr Saputra
085-7909-33044 (BNC) a/n Sdr Eko
</blockquote>
Setelah melakukan transfer baru bla bla bla bla........
