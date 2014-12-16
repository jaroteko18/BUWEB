<?PHP
include "../../conf/lib.php";
$m=$_GET['m'];
if($m=="cbuku"){
	echo "
	<fieldset><legend>Tambah Buku</legend>
	<form action=?go=pcrud&m=cbuku enctype='multipart/form-data' method='post'>
	<table>
	<tr>
		<td>Judul Buku</td>
		<td>:</td>
		<td><input type='text' name='nama'></td>
	</tr>
	<tr>
		<td>ISBN</td>
		<td>:</td>
		<td><input type='text' name='isbn'></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>:</td>
		<td><select name='kategori'>";
		$sk=sql("select * from tb_kategori"); 
		while($dk=fObj($sk)){
			echo "<option value='$dk->id_kategori'>$dk->nama</option>";
		}
		echo "</select></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><input type='text' name='penulis'></td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td>:</td>
		<td><input type='text' name='penerbit'></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type='text' name='harga'></td>
	</tr>
	<tr>
		<td>Stok</td>
		<td>:</td>
		<td><input type='text' name='stok'></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td>:</td>
		<td><textarea name='deskripsi'></textarea></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td>:</td>
		<td><input type='file' name='gambar'></td>
	</tr>
	<tr>
		<td>Kondisi</td>
		<td>:</td>
		<td><input type='text' name='kondisi'></td>
	</tr>
	<tr>
		<td><input type='submit' value='tambah'></td>
		<td colspan=2><input type='reset' value='reset'></td>
	</tr>
	</table>
	</form>
	
	</fieldset>
	";
}
if($m=="ubuku"){
	$id=$_GET['id'];
	$s=sql("select * from tb_barang where id_barang='$id'") or die(mysql_error());
	$d=fObj($s);
	echo "
	<fieldset><legend>Edit Buku</legend>
	<form action=?go=pcrud&m=ubuku enctype='multipart/form-data' method='post'>
	<input type='hidden' value='$d->id_barang' name='id'>
	<table>
	<tr>
		<td>Judul Buku</td>
		<td>:</td>
		<td><input type='text' name='nama' value='$d->nama'></td>
	</tr>
	<tr>
		<td>ISBN</td>
		<td>:</td>
		<td><input type='text' name='isbn' value='$d->isbn'></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>:</td>
		<td><select name='kategori'>";
		$sk=sql("select * from tb_kategori"); 
		while($dk=fObj($sk)){
			echo "<option value='$dk->id_kategori'>$dk->nama</option>";
		}
		echo "</select></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><input type='text' name='penulis' value='$d->penulis'></td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td>:</td>
		<td><input type='text' name='penerbit' value='$d->penerbit'></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type='text' name='harga' value='$d->harga'></td>
	</tr>
	<tr>
		<td>Stok</td>
		<td>:</td>
		<td><input type='text' name='stok' value='$d->stok'></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td>:</td>
		<td><textarea name='deskripsi'>$d->deskripsi</textarea></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td>:</td>
		<td><input type='file' name='gambar'></td>
	</tr>
	<tr>
		<td>Kondisi</td>
		<td>:</td>
		<td><input type='text' name='kondisi' value='$d->kondisi'></td>
	</tr>
	<tr>
		<td><input type='submit' value='tambah'></td>
		<td colspan=2><input type='reset' value='reset'></td>
	</tr>
	</table>
	</form>
	
	</fieldset>
	";
}
if($m=="ukat"){
	$id=$_GET['id'];
	$s=sql("select * from tb_kategori where id_kategori='$id'");
	$d=fObj($s);
	echo "<form action=?go=pcrud&m=ukat method='post'>
	<table>
		<tr>
			<td>Kategori</td><td>:</td>
			<td><input type='text' name='nama' value='$d->nama'><input type='hidden' name='id' value='$d->id_kategori'></td>
		</tr>
		<tr>
			<td colspan=2><input type='submit' value='ubah'></td><td><input type='button' onClick='history.go(-1)' value='kembali'></td>
		</tr>
	</table></form>
	";
}
if($m=="ckat"){
	echo "<form action=?go=pcrud&m=ckat method='post'>
	<table>
		<tr>
			<td>Kategori</td><td>:</td>
			<td><input type='text' name='nama'></td>
		</tr>
		<tr>
			<td colspan=2><input type='submit' value='tambah'></td><td><input type='button' onClick='history.go(-1)' value='kembali'></td>
		</tr>
	</table></form>
	";
}
if($m=="dbuku"){
	$id=$_GET['id'];
	$sa=sql("select * from tb_det_tmp inner join tb_transaksi using(id_trans) where id_barang='$id'");
	while($d=fObj($sa)){
		$sql=sql("delete from tb_transaksi where id_trans=$d->id_trans");
	}
	$sq=sql("delete from tb_det_tmp where id_barang='$id'");
	$s=sql("delete from tb_barang where id_barang='$id'");
	$ss=sql("delete from tb_komentar where id_barang='$id'");
	go("index.php?go=t&m=pengadaan",0);
}
if($m=="cber"){
	echo "<form action=?go=pcrud&m=cber method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>Judul</td><td>:</td>
			<td><input type='text' name='judul'></td>
		</tr>
		<tr>
			<td>Isi</td><td>:</td>
			<td><textarea name='isi'></textarea></td>
		</tr>
		<tr>
			<td>Gambar</td><td>:</td>
			<td><input type='file' name='gambar'></td>
		</tr>
		<tr>
			<td colspan=2><input type='submit' value='tambah'></td><td><input type='button' onClick='history.go(-1)' value='kembali'></td>
		</tr>
	</table></form>";
}
if($m=="uber"){
	$s=sql("select * from tb_berita where id_berita = '".$_GET['id']."';") or die(mysql_error());
	$d=fObj($s);
	echo "<form action=?go=pcrud&m=uber method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>Judul</td><td>:</td>
			<td><input type='text' name='judul' value='$d->judul'><input type='hidden' name='id' value='$d->id_berita'></td>
		</tr>
		<tr>
			<td>Isi</td><td>:</td>
			<td><textarea name='isi'>$d->isi</textarea></td>
		</tr>
		<tr>
			<td>Gambar</td><td>:</td>
			<td><input type='file' name='gambar'></td>
		</tr>
		<tr>
			<td colspan=2><input type='submit' value='tambah'></td><td><input type='button' onClick='history.go(-1)' value='kembali'></td>
		</tr>
	</table></form>";
}
if($m=="dber"){
	$id=$_GET['id'];
	$sql=sql("delete from tb_berita where id_berita='$id'");
	go("index.php?go=master&m=berita",0);
}
?>