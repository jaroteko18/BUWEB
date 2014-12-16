<?PHP
	session_start();
	include "../../conf/lib.php";
	$u=$_SESSION['user'];
	$m=$_GET['mode'];
	if($m=="komen"){
	$text = nl2br($_GET['komen']);
	$id = $_GET['id'];
	
	$sql=sql("insert into tb_komentar values('','$id','$u[id_user]','$text',now())");
	$s=sql("select * from tb_komentar inner join tb_user using(id_user) where id_barang='$id'");
	
	echo "<br>";
	while($d=fObj($s)){
	echo "
	<div class='berita'>
		<small>$d->tgl</small><br><a href='?go=user&id=$d->id_user'><b>$d->username </b></a><br><hr>
		<p>$d->komentar</p>
	</div> <br>";
	}
	}
	if($m=="pesan"){
		$id=$_GET['id'];
		if(isset($_SESSION['user'])){
		echo "
		<fieldset>
		<legend>Kirim Pesan</legend>
			Judul : <input type='text' id='judul'><br>
			Pesan : <textarea id='p'></textarea><br>
			<input type='button' onclick='pPesan($id)' value='Kirim' class='button'>  <input type='button' class='button' onclick='tutup()' value='Tutup'>  
		</fieldset>";
		}else{
		echo "Maaf anda harus <a href=?go=login>login</a> untuk mengirim pesan";
		}
	}
	if($m=="pPesan"){
		$idP=$u['id_user'];
		$id=$_GET['id'];
		$j=$_GET['judul'];
		$p=nl2br($_GET['p']);
		
		$sql=sql("insert into tb_pm values('','$id','$idP','$j','$p',now())") or die(mysql_error());
		if($sql){
			echo "Berhasil";
		}else{
			echo "Gagal";
		}
	}
	
	if($m=="register"){
		?>
		<form action="misc/proses.php?mode=pRegister" method="post">
        <table>
        <tr>
        	<td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" /> *</td>
        </tr>
        <tr>
        	<td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" /> *</td>
        </tr>
        <tr>
        	<td>Provinsi</td>
            <td>:</td>
            <td><input type="text" name="provinsi" /> *</td>
        </tr>
        <tr>
        	<td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota" /> *</td>
        </tr>
        <tr>
        	<td>Negara</td>
            <td>:</td>
            <td><input type="text" name="negara" /> *</td>
        </tr>
        <tr>
        	<td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" /> *</td>
        </tr>
        <tr>
        	<td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" /> *</td>
        </tr>
        <tr>
        	<td>Telp</td>
            <td>:</td>
            <td><input type="text" name="telp" /> *</td>
        </tr>
        <tr>
        	<td>Email</td>
            <td>:</td>
            <td><input type="text" name="email" /> *</td>
        </tr>
        <tr>
        	<td>Keterangan</td>
            <td>:</td>
            <td><textarea name="keterangan"></textarea> *</td>
        </tr>
        <tr>
        	<td><input type="submit" class="button" value="Daftar" /></td>
            <td></td>
            <td><input type="reset" class="button" value="Ulang" /></td>
        </tr>
        
        </table>
        </form>
		<?PHP
	}
	if($m=='pRegister'){
	extract($_POST);
	$sql=sql("insert into tb_user values('','$nama','$alamat','$provinsi','$kota','$negara','$username','".md5($password)."','$telp','$email','$keterangan',now())");
	if($sql){
		echo "<div id='footer'><div>Berhasil</div>";
	}else{
		echo "<div id='footer'><div>Gagal</div>";
	}
	go("../index.php?go=login",1);
	}
	if($m=='pkonfirmasi'){
	$id=$_GET['id'];
	extract($_POST);
	$sql=sql("update tb_transaksi set status='sudah', nama_bank='$nbank', atas_nama='$nabank', no_rek='$nrek', keterangan='$keterangan', tgl_pembayaran=now() where id_trans='$id'") or die(mysql_error());
	if($sql){
	echo "Terimakasih Pesanan anda akan segera kami proses";
	go("index.php?go=dashboard&m=konfirmasi&id=$id",1);
	}else{
	echo "Gagal";
	go("index.php?go=dashboard&m=konfirmasi&id=$id",1);
	}
	}
?>