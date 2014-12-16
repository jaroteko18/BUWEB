
<fieldset>
<legend>Produk Terbaru</legend>
<?PHP
    $sql=sql("select id_barang,b.nama, kondisi, deskripsi, k.nama as kat, gambar, harga from tb_barang b inner join tb_kategori k using(id_kategori) inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' order by id_barang limit 3");
    
    while($d=fAr($sql)){
        echo "
		<div class='produk' onMouseOver='show_a(".$d['id_barang'].")' onMouseOut='hide_a(".$d['id_barang'].")'>
        <div id='hide_a_".$d['id_barang']."' class='hide'>
		Qty : <input class='qty' type='text' size='2' id='val_".$d['id_barang']."'> <input type='button' class='button' value='BELI' onClick='add(".$d["id_barang"].")'>
        </div>
		
		
        <a href='?go=barang&id=".$d['id_barang']."'><img src='../images/produk/".$d["gambar"]."' width='100px' height='120px'></a> <br>
       	<a href='?go=barang&id=".$d['id_barang']."'>	<font color='#000033'><strong><b>".$d["nama"]."</b></strong></font></a><br>
		<font color='#FF3300'>".uang($d["harga"])."</font><br><br> 
		<a href='?go=barang&id=".$d['id_barang']."' class='button'>DETAIL</a>
		<br>
		</div>";
    } 
?>
</fieldset>

<fieldset>
<legend>Produk Yang Paling Dicari</legend>
<?PHP
    $sql=sql("select id_barang,b.nama, kondisi, deskripsi, k.nama as kat, gambar, harga from tb_barang b inner join tb_kategori k using(id_kategori) inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and tipe_trans='pemesanan' order by views desc limit 3");
    
    while($d=fAr($sql)){
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
?>
</fieldset>
<fieldset>
<legend>Berita</legend>
<?PHP
	$sql=sql("select * from tb_berita order by id_berita desc limit 3");
	while($d=fObj($sql)){
		echo "<div class='berita'>
		Dilihat $d->views kali <br><b>$d->judul</b> <br>  $d->tgl <br>
		<img src='../images/berita/$d->gambar' width='50px' height='50px' style='float:left'>
		<p>".substr($d->isi,0,250)." 
		<a href=?go=berita&id=$d->id_berita>Selengkapnya...</a></p>
		</div>
		<div style='clear:both;'></div>";
	}
?>
</fieldset>



