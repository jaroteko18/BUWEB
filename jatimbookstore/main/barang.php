<?PHP
session_start();
$u=$_SESSION['user'];
$id=$_GET['id'];
$sql=sql("select gambar,deskripsi,isbn,harga,stok,tb_barang.nama as nb,tb_kategori.nama as nk,penulis,penerbit,views from tb_barang inner join tb_kategori using(id_kategori) where id_barang='$id'") or die(mysql_error());
$s=sql("update tb_barang set views=views+1 where id_barang='$id'");
$d=fObj($sql);
echo "<img src='../images/produk/$d->gambar' width='250px'height='350px' border='1' style='margin:20px;margin-left:50px;border:10px solid #F2F2E6;'> 
<fieldset style='float:right;width:200px;margin:10px;margin-right:60px;'>
<legend>$d->nb</legend>
ISBN : $d->isbn <br>
Harga : ".uang($d->harga)." <br>
Tersedia : $d->stok buku <br><br>

Kategori : $d->nk <br>
Nama Buku : $d->nb <br>
Penulis : $d->penulis <br>
Penerbit : $d->penerbit <br>
Dilihat : $d->views <br><br>

Qty : <input type='text' size='2' id='val_$id' class='qty'> <input type='button' value='Beli Buku' onClick='add($id)' class='button'>
</fieldset> <br>
<fieldset>
<legend>Deskripsi</legend>
<p>$d->deskripsi</p>
</fieldset>";
$query=sql("select id_user, tipe_trans, tb_user.nama as nuser from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) inner join tb_user using(id_user) where id_barang='$id'");
$data=fObj($query);
if($data->tipe_trans=='pemesanan'){
echo "
<fieldset>
<legend>Informasi Pemesan Buku</legend>
Buku ini dipesan oleh <a href=?go=user&id=$data->id_user>Sdr. $data->nuser</a> 
</fieldset>";
}else if($data->tipe_trans=='penjualan'){
echo "
<fieldset>
<legend>Informasi Penjual Buku</legend>
Buku ini dijual oleh <a href=?go=user&id=$data->id_user>Sdr. $data->nuser</a>
</fieldset>";
}
echo "</fieldset>";
$s=sql("select * from tb_komentar inner join tb_user using(id_user) where id_barang='$id'");
echo "<fieldset><legend>Komentar Buku</legend><div id='komentar'><br>";
	while($d=fObj($s)){
	echo "
	<div class='berita'>
		<small>$d->tgl</small><br><a href='?go=user&id=$d->id_user'><b>$d->username </b></a><br><hr>
		<p>$d->komentar</p>
	</div> <br>";
	}
echo "</div></fieldset>";

if(isset($_SESSION['user'])){
echo "<fieldset>
<legend>Komentar Anda</legend>
<form>
<table>
<tr>
	<td>User</td>
	<td>:</td>
	<td>$u[username]</td>
</tr>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td>$u[nama]</td>
</tr>
<tr>
	<td>Komentar</td>
	<td>:</td>
	<td>
	<textarea id=komen></textarea>
	</td>
</tr>
<tr>
<td colspan=3> <input type=button value=kirim onClick='a($id)' class='button'> </td>
</tr>
</table>
</form>
</fieldset>";
}else{
	echo "<a href=?go=login>Login</a> terlebih dahulu agar dapat menulis komentar";
}
?>