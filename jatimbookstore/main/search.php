<?PHP
extract($_POST);
switch($field){
	case '0';$f='isbn';break;
	case '1';$f='k.nama';break;
	case '2';$f='penulis';break;
	case '3';$f='penerbit';break;
	case '4';$f='b.nama';break;
	case '5';$f='harga';break;
	case '6';$f='deskripsi';break;
	case '7';$f='kondisi';break;
}
$s=sql("select id_barang,b.nama, kondisi, deskripsi, k.nama as kat, gambar, harga from tb_barang b inner join tb_kategori k using(id_kategori) inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and $f like '%$key%' order by $f desc") or die(mysql_error());

$a=nRow($s);

if($a>0){
	while($d=fAr($s)){
        echo "
		<div class='produk' onMouseOver='show_a(".$d['id_barang'].")' onMouseOut='hide_a(".$d['id_barang'].")'>
        <div id='hide_a_".$d['id_barang']."' class='hide'>
        <b>Kondisi :</b><br> ".$d['kondisi']."<br>
		<b>Sekilas Buku :</b><br> ".substr($d['deskripsi'],0,80)."<br>
		Qty : <input class='qty' type='text' size='2' id='val_".$d['id_barang']."'> <input type='button' class='button' value='BELI' onClick='add(".$d["id_barang"].")'>
        </div>
		
		<a href='?go=barang&id=".$d['id_barang']."'><b>".$d["nama"]."</b></a><br>
        <a href='?go=barang&id=".$d['id_barang']."'><img src='../images/produk/".$d["gambar"]."' width='100px' height='120px'></a> <br>
        ".$d["kat"]."<br>
       	".uang($d["harga"])."<br><br> 
		<a href='?go=barang&id=".$d['id_barang']."' class='button'>DETAIL</a>
		<br>
		</div>";
    } 
}else{
	echo "Pencarian <b>$key</b> berdasarkan <b>$f</b> tidak ada";
}
echo "<div style='clear:both;'></div>";
?>