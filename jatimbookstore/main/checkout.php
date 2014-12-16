<?PHP
$u=$_SESSION['user'];
echo "
<fieldset>
<legend>Data Anda</legend>
<table>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td>$u[nama]</td>
</tr>
<tr>
	<td>Email</td>
	<td>:</td>
	<td>$u[email]</td>
</tr>
<tr>
	<td>Telp</td>
	<td>:</td>
	<td>$u[telp]</td>
</tr>
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td>$u[alamat] <small><span style='color:red;'> *Buku akan dikirim ke alamat ini</span></small></td>
</tr>
<tr>
	<td>Kota</td>
	<td>:</td>
	<td>$u[kota]</td>
</tr>
<tr>
	<td>Provinsi</td>
	<td>:</td>
	<td>$u[provinsi]</td>
</tr>
<tr>
	<td>Negara</td>
	<td>:</td>
	<td>$u[negara]</td>
</tr>
<tr>
	<td>Keterangan</td>
	<td>:</td>
	<td>$u[keterangan]</td>
</tr>
</table>
</fieldset>
";
echo "<table class='keranjang' cellpadding=5 cellspacing=5 width='100%'>";
foreach($_SESSION[cart] as $id=>$val){
    if($val>0){
    $sql=sql("select * from tb_barang where id_barang=$id");
    $d=fObj($sql);
    $tot+=$d->harga*$val;
    echo "<tr>
        <td><a href='#'>$d->nama</a></td>
        <td>x</td>
        <td id='u_".$d->id_barang."'>$val</td>
        <td>=</td>
        <td id='u2_".$d->id_barang."'>".uang($d->harga*$val)."</td>
        </tr>";
    }
}
echo "</table>
    Jumlah Jenis = ".$_SESSION[jJ]."<br>
    Total Keseluruhan = ".uang($tot)."
    <br><br>
	<form action=?go=konfirmasi method='post'> 
	<input type='checkbox' value='1' name='setuju'> Saya setuju dengan data diatas
	<br><br>
    <a href=?go=list class='button'>Lanjutkan Belanja </a> | <input type='submit' value='KONFIRMASI PEMBELIAN' class='button'><br>
	</form>";

?>