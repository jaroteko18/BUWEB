<?PHP
if(isset($_GET['id'])){
echo "<fieldset>
<legend>Berita</legend>";
	$sql=sql("select * from tb_berita where id_berita=".$_GET['id']."");
	$s=sql("update tb_berita set views=views+1 where id_berita=".$_GET['id']."");
	while($d=fObj($sql)){
		echo "<div class='berita'>
		Dilihat $d->views kali <br><b>$d->judul</b> <br>  $d->tgl <br>
		<img src='../images/berita/$d->gambar' width='50px' height='50px' style='float:left'>
		<p>$d->isi</p>
		</div>
		<div style='clear:both;'></div>";
	}
echo "</fieldset>";
}else{
echo "<fieldset>
<legend>Berita</legend>";
	$sql="select * from tb_berita order by id_berita desc";
	$dataP=pagging($sql,5,$_GET[hal]);
	// print_r($dataP);
	while($d=fObj($dataP[query])){
		echo "<div class='berita'>
		Dilihat $d->views kali <br><b>$d->judul</b> <br>  $d->tgl <br>
		<img src='../images/berita/$d->gambar' width='50px' height='50px' style='float:left'>
		<p>".substr($d->isi,0,250)." 
		<a href=?go=berita&id=$d->id_berita>Selengkapnya...</a></p>
		</div>
		<div style='clear:both;'></div>";
	}
echo "</fieldset>";
num_page("index.php?go=berita",$_GET[hal],$dataP[jum]);
}
?>