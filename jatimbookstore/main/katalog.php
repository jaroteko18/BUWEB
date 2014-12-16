<fieldset>
<legend>Daftar Buku</legend>
<?PHP
	if($_GET['go']=='list'){
	$sql="select id_barang,b.nama, kondisi, deskripsi, k.nama as kat, gambar, harga from tb_barang b inner join tb_kategori k using(id_kategori) inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' order by id_barang desc";
	}else{
	$id=$_GET['id'];
    $sql="select id_barang,b.nama, kondisi, deskripsi, k.nama as kat, gambar, harga from tb_barang b inner join tb_kategori k using(id_kategori) inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and id_kategori='$id' order by id_barang desc";
	}
	$dataP=pagging($sql,6,$_GET[hal]);
    while($d=fAr($dataP[query])){
       echo "
		<div class='produk' onMouseOver='show_b(".$d['id_barang'].")' onMouseOut='hide_b(".$d['id_barang'].")'>
        <div id='hide_b_".$d['id_barang']."' class='hide'>
		Qty : <input class='qty' type='text' size='2' id='val_".$d['id_barang']."'> <input type='button' class='button' value='BELI' onClick='add(".$d["id_barang"].")'>
        </div>
		
		
        <a href='?go=barang&id=".$d['id_barang']."'><img src='../images/produk/".$d["gambar"]."' width='100px' height='120px'></a> <br>
       	<a href='?go=barang&id=".$d['id_barang']."'>	<font color='#000033'><strong><b>".$d["nama"]."</b></strong></font></a><br>
		<font color='#FF3300'>".uang($d["harga"])."</font><br><br> 
		<a href='?go=barang&id=".$d['id_barang']."' class='button'>DETAIL</a>
		<br>
		</div>";
    } 
	echo "<div style='clear:both;'></div>";
	num_page("index.php?go=list",$_GET[hal],$dataP[jum]);
?>
</fieldset>