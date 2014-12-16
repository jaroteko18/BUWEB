
<?PHP
include "../../conf/lib.php";
$m=$_GET['mode'];
if($m=="det_trans"){
	sleep(1);
	$id=$_GET['id'];
	echo "<div>
	<table class='table' cellpadding='5'>
		<tr>
			<th>NO</th>
			<th>JUDUL BUKU</th>
			<th>JUMLAH</th>
			<th>TOTAL</th>
		</tr>";
	$sql=sql("select * from tb_transaksi inner join tb_det_trans using(id_trans) inner join tb_barang using(id_barang) inner join tb_user using(id_user) where id_trans='$id'");
	while($d=fObj($sql)){
		echo "
		<tr>
			<td>$d->id_barang</td>
			<td>$d->nama</td>
			<td>$d->jumlah buku</td>
			<td>".uang($d->jumlah*$d->harga)."</td>
		</tr>
		";
		$tot+=$d->jumlah*$d->harga;
		$telp=substr($d->telp,-3,3);
	}
	echo "
	<tr><th><a href='javascript:void(0)' onClick='t_det_trans()'>Tutup</a></th>
	<td>Kode Validasi $telp </td>
	<td colspan=2 align=right> Total Keseluruhan : ".uang($tot+$telp)."</td></tr>
	</table>
	</div>";
}
if($m=="det_user"){
	$id=$_GET['id'];
	$sql=sql("select * from tb_user where id_user='$id'");
	$d=fObj($sql);
	echo "<div class='flow'>
		<fieldset>
		<legend>Data User #$d->username</legend>
		Nama : $d->nama <br>
		Alamat : $d->alamat, $d->kota, $d->provinsi-$d->negara<br>
		Telp : $d->telp <br>
		Email : $d->email <br>
		<a href='javascript:void(0)' onClick='t_det_user()'>Tutup</a>
		</fieldset>
	</div>
	";
}
if($m=="det_rek"){
	$id=$_GET['id'];
	$sql=sql("select * from tb_transaksi inner join tb_user using(id_user) where id_trans='$id'") or die(mysql_error());
	$d=fObj($sql);
	echo "<div class='flow'>
		<fieldset>
		<legend>Detail Pengiriman #$d->username</legend>
		Nama Bank : $d->nama_bank <br>
		No. Rekening : $d->no_rek <br>
		A/N : $d->atas_nama <br>
		Keterangan : $d->keterangan <br>
		Telp : $d->telp <br>
		<a href='javascript:void(0)' onClick='t_det_rek()'>Tutup</a>
		</fieldset>
	</div>
	";
}
if($m=="det_transp"){
	$id=$_GET['id'];
	echo "<div class='flow'>
	<table class='table' cellpadding='5'>
		<tr>
			<th>NO</th>
			<th>JUDUL BUKU</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th>TOTAL</th>
		</tr>";
	$sql=sql("select * from tb_transaksi inner join tb_det_tmp using(id_trans) inner join tb_barang using(id_barang) where id_trans='$id'") or die(mysql_error());
	while($d=fObj($sql)){
		echo "
		<tr>
			<td>$d->id_barang</td>
			<td><a href='javascript:void(0)' onClick='det_bar($d->id_barang)'>$d->nama</a></td>
			<td>".uang($d->harga)."</td>
			<td>$d->stok</td>
			<td>".uang($d->stok*$d->harga)."</td>
		</tr>
		";
		$tot+=$d->stok*$d->harga;
	}
	echo "
	<tr><th><a href='javascript:void(0)' onClick='t_det_trans()'>Tutup</a></th><td colspan=3 align=right> Total Keseluruhan : ".uang($tot)."</td></tr>
	</table>
	</div>";
}
if($m=="det_bar"){
	$id=$_GET['id'];
	$sql=sql("select * from tb_barang where id_barang='$id'");
	$d=fObj($sql);
	echo "<table>
	<tr>
		<td>Judul Buku</td>
		<td>:</td>
		<td>$d->nama</td>
		<td><a href='javascript:void(0)' onClick='t_det_bar()'>Tutup</a></td>
	</tr>
	<tr>
		<td>ISBN</td>
		<td>:</td>
		<td>$d->isbn</td>
		<td rowspan=6><img src='../images/produk/$d->gambar' width='100px'></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td>$d->penulis</td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td>:</td>
		<td>$d->penerbit</td>
	</tr>
	<tr>
		<td>Kondisi Buku</td>
		<td>:</td>
		<td>$d->kondisi</td>
	</tr>
	<tr>
		<td>Tgl Penjualan</td>
		<td>:</td>
		<td>$d->tgl</td>
	</tr>
	</table>";
}

if($m=="get"){
	$tabel=$_GET[tabel];
	$s=sql("desc $tabel");
	echo "<select name='field' id='field'>";
	while($d=fRow($s)){
		echo "<option value='$d[0]'>".ucwords(str_replace("_"," ",$d[0]))."</option>";
	}
	echo "</select>";
}

?>