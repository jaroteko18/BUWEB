<?PHP
$m=$_GET['m'];
if($m=='komentar'){
	$s="select id_komentar,komentar, tb_user.nama as nuser, tb_barang.nama as nbarang,tb_komentar.tgl as tgl_komen from tb_komentar inner join tb_barang using(id_barang) inner join tb_user using(id_user)";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "<br>
	<table class='table' cellpadding=5>
	<tr>
		<th>No</th>
		<th>User</th>
		<th>Judul Buku</th>
		<th>Komentar</th>
		<th>Waktu</th>
		<th>Action</th>
	</tr>";
	while($d=fObj($dataP[query])){
		echo "
		<tr>
			<td>$d->id_komentar</td>
			<td>$d->nuser</td>
			<td>$d->nbarang</td>
			<td>$d->komentar</td>
			<td>$d->tgl_komen</td>
			<td><a href=?go=pcrud&m=dkomen&id=$d->id_komentar class='button'>Hapus</a></td>
		</tr>
		";
	}
	echo "</table>";
	num_page("index.php?go=master&m=komentar",$_GET[hal],$dataP[jum]);
}
if($m=='kategori'){
	$s="select * from tb_kategori";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "<br><a href=?go=crud&m=ckat class='button'>Tambah Kategori</a><br><br>
	<table class='table' cellpadding=5>
	<tr>
		<th>No</th>
		<th>Kategori</th>
		<th>Action</th>
	</tr>";
	while($d=fObj($dataP[query])){
		echo "
		<tr>
			<td>$d->id_kategori</td>
			<td>$d->nama</td>
			<td><a href=?go=crud&m=ukat&id=$d->id_kategori class='button'>Edit</a></td>
		</tr>
		";
	}
	echo "</table>";
	num_page("index.php?go=master&m=kategori",$_GET[hal],$dataP[jum]);
}
if($m=='berita'){
	$s="select * from tb_berita order by id_berita desc";
	$dataP=pagging($s,5,$_GET[hal]);
	echo "<br><a href=?go=crud&m=cber class='button'>Tambah Berita</a><br><br>
	<table class='table' cellpadding=5>
	<tr>
		<th>No</th>
		<th>Judul</th>
		<th>Isi</th>
		<th>Tgl</th>
		<th>Gambar</th>
		<th>Action</th>
	</tr>";
	while($d=fObj($dataP[query])){
		echo "
		<tr>
			<td>$d->id_berita</td>
			<td>$d->judul</td>
			<td>".substr($d->isi,0,100)."</td>
			<td>$d->tgl</td>
			<td><img src='../images/berita/$d->gambar' width='50px'></td>
			<td><a href=?go=crud&m=uber&id=$d->id_berita class='button'>Edit</a><br><br>
			<a href=?go=crud&m=dber&id=$d->id_berita class='button'>Hapus</a></td>
		</tr>
		";
	}
	echo "</table>";
	num_page("index.php?go=master&m=berita",$_GET[hal],$dataP[jum]);
}
?>