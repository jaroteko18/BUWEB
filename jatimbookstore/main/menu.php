<a href="?go=beranda">BERANDA </a> 
<a href="?go=list">KATALOG </a> 
<a href="?go=berita">BERITA </a>
<a href="?go=informasi">DOWNLOAD </a>
<?PHP
if(isset($_SESSION['user'])){
echo "<a href=?go=profile>AKUN</a> <a href=?go=keluar>KELUAR </a>";
}else{
echo "<a href=?go=login>LOGIN </a>";
}
?>
<a href="?go=tentang">ABOUT</a>