<?PHP
session_start();
$u=$_SESSION['user'];
$m=$_GET['m'];
if($_GET['go']=='profile' && $m==''){
	echo "<br>Selamat Datang di halaman dashboard Sdr. $u[nama]<br><br>";
}
if($m=='penjualan'){
	$sql="select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where id_user='$u[id_user]' and tipe_trans='penjualan'";
	$dataP=pagging($sql,5,$_GET[hal]);
	echo "<table border=1 class='table'>
		<tr bgcolor='#CCCCCC'>
			<th>No</th>
			<th>ISBN</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Keterangan</th>
			<th>Kondisi</th>
			<th>Gambar</th>
			<th>Status</th>
		</tr>";
	while($data=fObj($dataP[query])){
		$i++;
		echo "<tr>
			<td>$i</td>
			<td>$data->isbn </td>
			<td>$data->penulis</td>
			<td>$data->penerbit</td>
			<td>$data->nama</td>
			<td>$data->harga</td>
			<td>$data->stok</td>
			<td>$data->deskripsi</td>
			<td>$data->kondisi</td>
			<td><img src='../images/produk/$data->gambar' width='50px'></td>
			<td>$data->status</td>
		</tr>";
	}	
	num_page("index.php?go=profile&m=penjualan",$_GET[hal],$dataP[jum]);
	echo "
	</table>
	<form action=?go=dashboard&m=ppenjualan method=post enctype='multipart/form-data'> 
	<table id=datatable border=0 cellpadding=0 cellspacing=0 style='font-size:10px;'>  
	<tr>
		<td style='display:table;'>
		No.1<br>
		Kategori&nbsp;&nbsp;&nbsp; :
		<select name='kategori[]' id='kategori'>";
		$s=sql("select * from tb_kategori");
		while($d=fObj($s)){
			echo "<option value='$d->id_kategori'>$d->nama</option>";
		}
		echo "</select><br>
		ISBN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='isbn[]' > <br>
		Nama Buku : <input type ='text' name='nama[]'><br>
		Penulis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='penulis[]'> <br>
		Penerbit&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='penerbit[]'> <br>
		Harga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='harga[]' > <br>
		Stok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='stok[]' > <br>
		Kondisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='kondisi[]'> <br>
		Gambar&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='file' name='gambar[]'> <br>
		Deskripsi&nbsp;&nbsp; : <textarea name='deskripsi[]'></textarea></td>  
	</tr> 
	</table> 
	<br>
	<input type=button value=tambah onclick=tambah() class='button'> |
	<input type=button value=hapus onclick=hapus() class='button'> 
	<br> <br>
	<input type=submit value=kirim class='button'> 
	</form> 
	";
}
if($m=='pembelian'){
	$sql="select * from tb_transaksi where id_user=$u[id_user] and tipe_trans='pembelian'";
	$dataP=pagging($sql,5,$_GET[hal]);
	echo "<br>";
	while($d=fObj($dataP[query])){
		echo "<table border=1 class='table' style='width:50%;'>
		<tr>
			<td rowspan=2 align=center>Transaksi <br>$d->id_trans</td>
			<td>Tanggal Trans : $d->tgl_trans</td>";
		if($d->status=='belum'){
			echo "<th rowspan=2><a href=?go=dashboard&m=konfirmasi&id=$d->id_trans>Konfirmasi</a></th>";
		}else{
			echo "<th rowspan=2><a href=?go=dashboard&m=konfirmasi&id=$d->id_trans>Detail</a></th>";
		}
		echo "</td>
		<tr>
			<td>Status : $d->status</td>
		</tr></table><br>";
	}
	num_page("index.php?go=profile&m=pembelian",$_GET[hal],$dataP[jum]);
}
if($m=='pemesanan'){
	$sql="select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where id_user='$u[id_user]' and tipe_trans='pemesanan'";
	$dataP=pagging($sql,5,$_GET[hal]);
	echo "<table border=1 class='table'>
		<tr bgcolor='#CCCCCC'>
			<th>No</th>
			<th>ISBN</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Keterangan</th>
			<th>Kondisi</th>
			<th>Gambar</th>
			<th>Status</th>
		</tr>";
	while($data=fObj($dataP[query])){
	$i++;
		echo "<tr>
			<td>$i</td>
			<td>$data->isbn </td>
			<td>$data->penulis</td>
			<td>$data->penerbit</td>
			<td>$data->nama</td>
			<td>$data->harga</td>
			<td>$data->stok</td>
			<td>$data->deskripsi</td>
			<td>$data->kondisi</td>
			<td><img src='../images/produk/$data->gambar' width='50px'></td>
			<td>$data->status</td>
		</tr>";
	}	
	
	num_page("index.php?go=profile&m=pemesanan",$_GET[hal],$dataP[jum]);
	echo "
	</table>
	<form action=?go=dashboard&m=ppemesanan method=post enctype='multipart/form-data'> 
	<table id=datatable border=0 cellpadding=0 cellspacing=0 style='font-size:10px;'>  
	<tr>
		<td style='display:table;'>
		No.1<br>
		Kategori&nbsp;&nbsp;&nbsp; :
		<select name='kategori[]' id='kategori'>";
		$s=sql("select * from tb_kategori");
		while($d=fObj($s)){
			echo "<option value='$d->id_kategori'>$d->nama</option>";
		}
		echo "</select><br>
		ISBN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='isbn[]' > <br>
		Nama Buku : <input type ='text' name='nama[]'><br>
		Penulis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='penulis[]'> <br>
		Penerbit&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='penerbit[]'> <br>
		Harga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='harga[]' > <br>
		Stok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='stok[]' > <br>
		Kondisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='kondisi[]'> <br>
		Gambar&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='file' name='gambar[]'> <br>
		Deskripsi&nbsp;&nbsp; : <textarea name='deskripsi[]'></textarea></td>  
	</tr> 
	</table> 
	<br>
	<input type=button value=tambah onclick=tambah() class='button'> |
	<input type=button value=hapus onclick=hapus() class='button'> 
	<br> <br>
	<input type=submit value=kirim class='button'> 
	</form> 
	";
}
if($m=='pm'){
	$s="select * from tb_pm inner join tb_user on tb_pm.id_pengirim=tb_user.id_user where tb_pm.id_user='$u[id_user]'";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "<fieldset> <legend>Private Message</legend>";
	while($d=fObj($dataP[query])){
	echo "
	<fieldset>
	<legend> Dari <a href=?go=user&id=$d->id_user>$d->nama</a> </legend>
	<b>$d->judul</b><br>
	$d->pesan
	</fieldset>
	";
	}
	echo "</fieldset>";
	num_page("index.php?go=profile&m=pm",$_GET[hal],$dataP[jum]);
}
?>