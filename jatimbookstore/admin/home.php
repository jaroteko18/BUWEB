<br /><br />Selamat datang admin <br />
<ul>
	<li>bla...bla...bla...</li>
    <li>bla...bla...bla...</li>
    <li>bla...bla...bla...</li>
    <li>bla...bla...bla...</li>
    <li>bla...bla...bla...</li>
</ul>
<?PHP
	$s=sql("select * from tb_transaksi inner join tb_user using(id_user) where tipe_trans='pembelian' and status='sudah'");
	echo "<div id='det_trans' style='position:absolute;'></div>
	<div id='det_user' style='position:absolute;margin-left:180px;'></div>
	<div id='det_rek' style='position:absolute;margin-left:400px;'></div>
	<fieldset>
	<legend> Informasi Transaksi Pembelian </legend>
	<table class='table' cellpadding=5>
	<tr bgcolor='#CCCCCC'><th>No.Trans</th><th>Pembeli</th><th>Tanggal</th><th>Status</th><th>Detail</th></tr>";
	while($d=fObj($s)){
		if($d->status=='sudah' || $d->status=='selesai'){
		$detail="<a href='javascript:void(0)' onclick=det_rek($d->id_trans)><b>Detail</b></a>";
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
		<tr><td><a href='javascript:void(0)' onClick='det_trans($d->id_trans)'><b>Trans $d->id_trans</b></a></td><td><a href='javascript:void(0)' onClick='det_user($d->id_user)'><b>$d->nama</b></a></td><td>$d->tgl_trans</td><td>$d->status $status</td><td>
		$detail</td></tr>		
		";
	}
	echo "</table></fieldset>";
?>