<?PHP
$m=$_GET['m'];
if($m=='cbuku'){
	$uploads_dir = '../images/produk/';
	$tmp_name = $_FILES["gambar"]["tmp_name"];
	$name = $_FILES["gambar"]["name"];
	$type = $_FILES["gambar"]["type"];
	$size = $_FILES["gambar"]["size"];
	move_uploaded_file($tmp_name, "$uploads_dir/$name");
	$s=sql("insert into tb_transaksi values('','','pengadaan','selesai','','','','','',now());") or die(mysql_error());
	$idt=mysql_insert_id();
	$sq=sql("insert into tb_barang values('','".$_POST['kategori']."','".$_POST['isbn']."','".$_POST['penulis']."'
	,'".$_POST['penerbit']."','".$_POST['nama']."','".$_POST['harga']."','".$_POST['stok']."','".$_POST['deskripsi']."'
	,'".$_POST['kondisi']."','$name','',now());") or die(mysql_error());
	$idb=mysql_insert_id();
	$sql=sql("insert into tb_det_tmp values('','$idt','$idb');") or die(mysql_error());
	go("index.php?go=t&m=pengadaan",0);
}
if($m=='ubuku'){
	$id=$_POST['id'];
	$uploads_dir = '../images/produk/';
	$tmp_name = $_FILES["gambar"]["tmp_name"];
	if($_FILES["gambar"]["name"]!=""){
		$name=$_FILES["gambar"]["name"];
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
	}else{
		$sql=sql("select * from tb_barang where id_barang='$id'");
		$d=fObj($sql);
		$name=$d->gambar;
	}
	$sq=sql("update tb_barang set id_kategori='".$_POST['kategori']."',isbn='".$_POST['isbn']."',penulis='".$_POST['penulis']."'
	,penerbit='".$_POST['penerbit']."',nama='".$_POST['nama']."',harga='".$_POST['harga']."',stok='".$_POST['stok']."',deskripsi='".$_POST['deskripsi']."',kondisi='".$_POST['kondisi']."',gambar='$name' where id_barang='$id';") or die(mysql_error());
	go("index.php?go=t&m=pengadaan",0);
}
if($m=='dkomen'){
	$id=$_GET['id'];
	$s=sql("delete from tb_komentar where id_komentar='$id'");
	go("index.php?go=master&m=komentar",0);
}
if($m=='ukat'){
	$sql=sql("update tb_kategori set nama='".$_POST['nama']."' where id_kategori='".$_POST['id']."'; ") or die(mysql_error());
	go("index.php?go=master&m=kategori",0);
}
if($m=='ckat'){
	$sql=sql("insert into tb_kategori values('','".$_POST['nama']."')");
	go("index.php?go=master&m=kategori",0);
}
if($m=='cber'){
	$uploads_dir = '../images/berita/';
	$tmp_name = $_FILES["gambar"]["tmp_name"];
	$name = $_FILES["gambar"]["name"];
	$type = $_FILES["gambar"]["type"];
	$size = $_FILES["gambar"]["size"];
	move_uploaded_file($tmp_name, "$uploads_dir/$name");
	$sq=sql("insert into tb_berita values('','".$_POST['judul']."','".$_POST['isi']."',now(),'$name','');") or die(mysql_error());
	go("index.php?go=master&m=berita",0);
}
if($m=='uber'){
	$id=$_POST['id'];
	$uploads_dir = '../images/berita/';
	$tmp_name = $_FILES["gambar"]["tmp_name"];
	if($_FILES["gambar"]["name"]!=""){
		$name=$_FILES["gambar"]["name"];
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
	}else{
		$sql=sql("select * from tb_berita where id_berita='$id'") or die(mysql_error());
		$d=fObj($sql);
		$name=$d->gambar;
	}
	$sq=sql("update tb_berita set judul='".$_POST['judul']."',isi='".$_POST['isi']."',gambar='$name' where id_berita='$id';") or die(mysql_error());
	go("index.php?go=master&m=berita",0);
}
?>