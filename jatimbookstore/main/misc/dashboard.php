<?PHP
	session_start();
	include "../../conf/lib.php";
	$u=$_SESSION['user'];
	$m=$_GET['m'];
	if($m=='konfirmasi'){
		$id=$_GET['id'];
		$sql=sql("select * from tb_det_trans inner join tb_barang using(id_barang) where id_trans='$id'");
		echo "
		<fieldset>
		<legend>Data Pengiriman Barang</legend>
		Nama : $u[nama] <br>
		Alamat : $u[alamat], $u[kota], $u[provinsi]-$u[negara] *alamat pengiriman<br>
		Telp : $u[telp] <br>
		Email : $u[email] <br>
		</fieldset>
		
		<fieldset><legend>Data Barang Pembelian</legend><table class='keranjang' cellspacing=5 cellpadding=5 width='100%'>";
		while($d=fObj($sql)){
			$biaya=$d->harga*$d->jumlah;
			$tot+=$biaya;
			echo "<tr>
			<td><small><a href=?go=barang&id=$d->id_barang>$d->nama</a></small></td>
			<td>$d->jumlah buku</td>
			<td><small>".uang($d->harga)."</small></td>
			<td><small>".uang($biaya)."</small></td>
			</tr>";
		}
		$s=sql("select * from tb_transaksi where id_trans='$id'");
		$data=fObj($s);
		echo "<tr>
		<td colspan=4 align=right><small>Total ".uang($tot)."</small></td>
		</tr></table></fieldset>";
		if($data->status=='belum'){
		echo "
		<fieldset>
		<legend>Data Konfirmasi</legend>
		<form action='?go=proses&mode=pkonfirmasi&id=$id' method='post'>	
		<input type='hidden' value='sudah' name='kStatus'>
		<table>
		<tr><td>Nama Bank</td><td>:</td><td><input name='nbank' type='text'></td></tr>
		<tr><td>No Rekening</td><td>:</td><td><input name='nrek' type='text'></td></tr>
		<tr><td>Atas Nama</td><td>:</td><td><input name='nabank' type='text'></td></tr>
		<tr><td>Keterangan</td><td>:</td><td><textarea name='keterangan'></textarea></td></tr>
		<tr><td colspan=2>
		<input type='submit' value='Konfirmasi' class='button'>
		</td></tr>
		</table>
		</form>
		</fieldset>";
		}else if($data->status=='sudah'){
		echo "<fieldset><legend>Status Transaksi $id</legend>Transaksi anda sedang diproses</fieldset>";
		}else if($data->status=='selesai'){
		echo "<fieldset><legend>Status Transaksi $id</legend>Transaksi anda sudah selesai</fieldset>";
		}
	}
	if($m=='ppenjualan'){
	$uploads_dir = '../images/produk/';
	$sql=sql("insert into tb_transaksi values('','$u[id_user]','penjualan','belum','','','','','',now())");
	$ins=mysql_insert_id();
	foreach($_POST['kategori'] as $index => $value){ 
		$tmp_name = $_FILES["gambar"]["tmp_name"][$index];
		$name = $_FILES["gambar"]["name"][$index];
		$type = $_FILES["gambar"]["type"][$index];
		$size = $_FILES["gambar"]["size"][$index];
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
			$query="INSERT INTO tb_barang VALUES('','".$_POST['kategori'][$index]."',
					'".$_POST['isbn'][$index]."','".$_POST['penulis'][$index]."',
					'".$_POST['penerbit'][$index]."','".$_POST['nama'][$index]."',
					'".$_POST['harga'][$index]."','".$_POST['stok'][$index]."',
					'".$_POST['deskripsi'][$index]."','".$_POST['kondisi'][$index]."',
					'$name','0',now())"; 
		$s=sql($query) or die(mysql_error());
		$id_barang=mysql_insert_id();
		$sq=sql("insert into tb_det_tmp values('','$ins','$id_barang')") or die(mysql_error());
	} 
	go("index.php?go=profile&m=penjualan");
	}
	if($m=='ppemesanan'){
	$uploads_dir = '../images/produk/';
	$sql=sql("insert into tb_transaksi values('','$u[id_user]','pemesanan','belum','','','','','',now())");
	$ins=mysql_insert_id();
	foreach($_POST['kategori'] as $index => $value){ 
		$tmp_name = $_FILES["gambar"]["tmp_name"][$index];
		$name = $_FILES["gambar"]["name"][$index];
		$type = $_FILES["gambar"]["type"][$index];
		$size = $_FILES["gambar"]["size"][$index];
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
			$query="INSERT INTO tb_barang VALUES('','".$_POST['kategori'][$index]."',
					'".$_POST['isbn'][$index]."','".$_POST['penulis'][$index]."',
					'".$_POST['penerbit'][$index]."','".$_POST['nama'][$index]."',
					'".$_POST['harga'][$index]."','".$_POST['stok'][$index]."',
					'".$_POST['deskripsi'][$index]."','".$_POST['kondisi'][$index]."',
					'$name','0',now())"; 
		$s=sql($query) or die(mysql_error());
		$id_barang=mysql_insert_id();
		$sq=sql("insert into tb_det_tmp values('','$ins','$id_barang')") or die(mysql_error());
	} 
	go("index.php?go=profile&m=pemesanan");
	}
?>