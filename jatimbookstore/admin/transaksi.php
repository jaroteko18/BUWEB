<?PHP
$m=$_GET['m'];
if($m=='pembelian'){
	$s="select * from tb_transaksi inner join tb_user using(id_user) where tipe_trans='pembelian'";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "
	<br>
	<div id='det_trans' style='position:absolute;'></div>
	<div id='det_user' style='position:absolute;margin-left:180px;'></div>
	<div id='det_rek' style='position:absolute;margin-left:400px;'>
	</div><table class='table' cellpadding=5>
	<tr><th>No.Trans</th><th>Pembeli</th><th>Tanggal</th><th>Status</th><th>Detail</th></tr>";
	while($d=fObj($dataP[query])){
		if($d->status=='sudah' || $d->status=='selesai'){
		$detail="<a href='javascript:void(0)' onclick=det_rek($d->id_trans)>Detail</a>";
		}else{
		$detail="";
		}
		if($d->status=='sudah'){
		$status="<a href=?go=ptrans&m=pembelian&id=$d->id_trans class='button'>Kirim</a>
		<a href=?go=ptrans&m=bpembelian&id=$d->id_trans class='button'>Batal</a>";
		}else{
		$status="";
		}
		echo "
		<tr><td><a href='javascript:void(0)' onClick='det_trans($d->id_trans)'>Trans $d->id_trans</a></td><td><a href='javascript:void(0)' onClick='det_user($d->id_user)'>$d->nama</a:</td><td>$d->tgl_trans</td><td>$d->status $status</td><td>
		$detail</td></tr>		
		";
	}
	echo "</table>";
	num_page("index.php?go=t&m=pembelian",$_GET[hal],$dataP[jum]);
	
}
if($m=='penjualan'){
	$s="select * from tb_transaksi inner join tb_user using(id_user) where tipe_trans='penjualan'";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "<br><div id='det_trans' style='position:absolute;'></div>
	<div id='det_user' style='position:absolute;margin-left:180px;'></div>
	<div id='det_bar' style='position:absolute;margin-left:380px;' class='flow'></div>
	<table class='table' cellpadding=5>
	<tr><th>No.Trans</th><th>Penjual</th><th>Tanggal</th><th>Status</th></tr>";
	while($d=fObj($dataP[query])){
		if($d->status=='belum'){
		$status="<a href=?go=ptrans&m=penjualan&id=$d->id_trans class='button'>Konfirmasi</a> 
		<a href=?go=ptrans&m=bpenjualan&id=$d->id_trans class='button'>Batal</a>";
		}else{
		$status="";
		}
		echo "
		<tr><td><a href='javascript:void(0)' onClick='det_transp($d->id_trans)'>Trans $d->id_trans</a></td><td><a href='javascript:void(0)' onClick='det_user($d->id_user)'>$d->nama</a:</td><td>$d->tgl_trans</td><td>$d->status $status</td><td></td></tr>		
		";
	}
	echo "</table>";
	num_page("index.php?go=t&m=penjualan",$_GET[hal],$dataP[jum]);
}
if($m=='pemesanan'){
	$s="select * from tb_transaksi inner join tb_user using(id_user) where tipe_trans='pemesanan'";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "<div id='det_trans' style='position:absolute;'></div>
	<div id='det_user' style='position:absolute;margin-left:180px;'></div>
	<div id='det_bar' style='position:absolute;margin-left:380px;' class='flow'></div>
	<table class='table' cellpadding=5>
	<tr><th>No.Trans</th><th>Pemesan</th><th>Tanggal</th><th>Status</th></tr>";
	while($d=fObj($dataP[query])){
		if($d->status=='belum'){
		$status="<a href=?go=ptrans&m=pemesanan&id=$d->id_trans class='button'>Konfirmasi</a>
		<a href=?go=ptrans&m=bpemesanan&id=$d->id_trans class='button'>Batal</a>";
		}else{
		$status="";
		}
		echo "
		<tr><td><a href='javascript:void(0)' onClick='det_transp($d->id_trans)'>Trans $d->id_trans</a></td><td><a href='javascript:void(0)' onClick='det_user($d->id_user)'>$d->nama</a:</td><td>$d->tgl_trans</td><td>$d->status $status</td><td></td></tr>		
		";
	}
	echo "</table>";
	num_page("index.php?go=t&m=pemesanan",$_GET[hal],$dataP[jum]);
}
if($m=='pengadaan'){
	$sql="select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' order by id_barang desc";
	$dataP=pagging($sql,5,$_GET[hal]);
	$sb=sql("select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' order by id_barang");
	$sbeli=sql("select * from tb_barang inner join tb_det_trans using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and tipe_trans='pembelian' order by id_barang");
	$spesan=sql("select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and tipe_trans='pemesanan' order by id_barang");
	$sjual=sql("select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and tipe_trans='penjualan' order by id_barang");
	$sada=sql("select * from tb_barang inner join tb_det_tmp using(id_barang) inner join tb_transaksi using(id_trans) where status='selesai' and tipe_trans='pengadaan' order by id_barang");
	$jb=nRow($sb);
	
	$jbeli=nRow($sbeli);
	$jpesan=nRow($spesan);
	$jjual=nRow($sjual);
	$jada=nRow($sada);
	
	echo "<fieldset>
	<legend> Laporan Jumlah Buku </legend>
	<i>Jumlah penjualan dari member :</i> $jjual buku<br>
	<i>Jumlah pemesanan dari member :</i> $jpesan buku<br>
	<i>Jumlah pengadaan :</i> $jada buku <br>
	<i>Total :</i> $jb buku <br>
	</fieldset><fieldset>
	<legend> Laporan Transaksi Buku </legend>
	<i>Total Buku yang telah terjual :</i> $jbeli buku<br>
	</fieldset> <br>";
	echo "<a href=?go=crud&m=cbuku class='button'>Tambah Buku</a><br><br>
	<table class='table' cellpadding=5><tr>
		<th>No</th>
		<th>ISBN</th>
		<th>Judul Buku</th>
		<th>Kategori</th>
		<th>Harga</th>
		<th>Stok</th>
		<th>Deskripsi</th>
		<th>Kondisi</th>
		<th>Gambar</th>
		<th>Tanggal</th>
		<th>Action</th>
	</tr>";
	while($d=fObj($dataP[query])){
		$s=sql("select * from tb_kategori where id_kategori=$d->id_kategori");
		$k=fObj($s);
		echo "<tr>
		<td>$d->id_barang</td>
		<td>$d->isbn</td>
		<td>$d->nama</td>
		<td>$k->nama</td>
		<td>$d->harga</td>
		<td>$d->stok</td>
		<td>$d->deskripsi</td>
		<td>$d->kondisi</td>
		<td><img src='../images/produk/$d->gambar' width='50px'></td>
		<td>$d->tgl</td>
		<td><a href=?go=crud&m=dbuku&id=$d->id_barang class='button'>hapus</a> <br><br> <a href=?go=crud&m=ubuku&id=$d->id_barang class='button'>edit</a></td>
	</tr>";
	}
	echo "</table>";
	num_page("index.php?go=t&m=pengadaan",$_GET[hal],$dataP[jum]);
}

if($m=='member'){
	$sql="select * from tb_user";
	$dataP=pagging($sql,5,$_GET[hal]);
	echo "
	<table class='table'>
		<tr>
			<th>No</th>
			<th>Judul Buku</th>
			<th>Alamat</th>
			<th>Provinsi</th>
			<th>Kota</th>
			<th>Negara</th>
			<th>Username</th>
			<th>Telp</th>
			<th>Email</th>
			<th>Tgl Daftar</th>
		</tr>";
	while($d=fObj($dataP[query])){
		echo "<tr>
			<td>$d->id_user</td>
			<td>$d->nama</td>
			<td>$d->alamat</td>
			<td>$d->provinsi</td>
			<td>$d->kota</td>
			<td>$d->negara</td>
			<td>$d->username</td>
			<td>$d->telp</td>
			<td>$d->email</td>
			<td>$d->tgl_masuk</td>
		</tr>";
	}
	echo "</table>";
	num_page("index.php?go=t&m=pengadaan",$_GET[hal],$dataP[jum]);
}
?>