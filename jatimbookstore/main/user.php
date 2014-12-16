<?PHP
session_start();
$id=$_GET['id'];
$sql=sql("select * from tb_user where id_user='$id'");
$d=fObj($sql);
echo "
<fieldset>
<legend>User $d->username</legend>
<table cellpadding=2>
<tr>
<td rowspan=4><img src='../images/dll/avatar.png'></td>
<td>User</td><td>:</td><td>$d->username</td>
<td>Email</td><td>:</td><td>$d->email</td>
</tr>
<tr>
<td>Nama</td><td>:</td><td>$d->nama</td>
<td>Alamat</td><td>:</td><td>$d->alamat</td>
</tr>
<tr>
<td>Negara</td><td>:</td><td>$d->negara</td>
<td>Telp</td><td>:</td><td>$d->telp</td>
</tr>
<tr>
<td>Kota</td><td>:</td><td>$d->kota</td>
<td>Provinsi</td><td>:</td><td>$d->provinsi</td>
</tr>
</table>
</fieldset>";
if($d->id_user==$_SESSION[user]['id_user']){
	echo "Profile anda";
}else{
	echo "<div id='pesan'>
	<a href='javascript:void(0)' onClick='pesan($id)' class='button'>Kirim Pesan</a><br><br>
	</div>";
}
?>