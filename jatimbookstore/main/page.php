<?PHP
$page=$_GET['go'];
switch($page){
	case '';include 'home.php';break;
	case 'beranda';include 'home.php';break;
	case 'katalog';include 'katalog.php';break;
	case 'informasi';include 'informasi.php';break;
	case 'tentang';include 'tentang.php';break;
	case 'berita';include 'berita.php';break;
	case 'cart';include 'cart.php';break;
	case 'hapus';include 'misc/hapus.php';break;
	case 'login';include 'login.php';break;
	case 'cek';include 'cek.php';break;
	case 'keluar';include 'keluar.php';break;
	case 'checkout';include 'checkout.php';break;
	case 'konfirmasi';include 'konfirmasi.php';break;
	case 'barang';include 'barang.php';break;
	case 'user';include 'user.php';break;
	case 'katalog';include 'katalog.php';break;
	case 'list';include 'katalog.php';break;
	case 'proses';include 'misc/proses.php';break;
	case 'profile';include 'profile.php';break;
	case 'dashboard';include 'misc/dashboard.php';break;
	case 'cari';include 'search.php';break;
	case 'cetak';include 'cetak.php';break;
}
?>