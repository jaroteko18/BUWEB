<?PHP
if(isset($_SESSION['admin'])){
echo "<a href=?go=home>BERANDA</a> <a href=?go=cari>CARI</a> <a href=?go=keluar>KELUAR</a>";
}else{
echo "<a href=?go=login>LOGIN</a>";
}
?>