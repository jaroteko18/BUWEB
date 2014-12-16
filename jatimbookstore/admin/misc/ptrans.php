<?PHP
$m=$_GET['m'];
if($m=='pembelian'){
	$id=$_GET['id'];
	$sql=sql("update tb_transaksi set status='selesai' where id_trans='$id'");
	$s=sql("select * from tb_transaksi inner join tb_det_trans using(id_trans) inner join tb_barang using(id_barang) where id_trans='$id'" );
	while($d=fObj($s)){
		$s=sql("update tb_barang set stok=stok-".$d->jumlah." where id_barang=$d->id_barang") or die(mysql_error());
	}
	go("index.php?go=t&m=pembelian",0);
}
if($m=='bpembelian'){
	$id=$_GET['id'];
	$sql=sql("update tb_transaksi set status='batal' where id_trans='$id'");
	go("index.php?go=t&m=pembelian",0);
}
if($m=='bpenjualan'){
	$id=$_GET['id'];
	$sql=sql("update tb_transaksi set status='batal' where id_trans='$id'");
	go("index.php?go=t&m=penjualan",0);
}
if($m=='bpemesanan'){
	$id=$_GET['id'];
	$sql=sql("update tb_transaksi set status='batal' where id_trans='$id'");
	go("index.php?go=t&m=pemesanan",0);
}
if($m=='penjualan'){
	$id=$_GET['id'];
	$sql=sql("update tb_transaksi set status='selesai' where id_trans='$id'");
	go("index.php?go=t&m=penjualan",0);
}
if($m=='pemesanan'){
	$id=$_GET['id'];
	$sql=sql("update tb_transaksi set status='selesai' where id_trans='$id'");
	go("index.php?go=t&m=pemesanan",0);
}
?>