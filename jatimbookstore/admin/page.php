<?PHP
$page=$_GET['go'];
switch($page){
	case '';include 'home.php';break;
	case 'home';include 'home.php';break;
	case 'beranda';include 'home.php';break;
	case 'login';include 'login.php';break;
	case 'cek';include 'cek.php';break;
	case 'keluar';include 'keluar.php';break;
	case 't';include 'transaksi.php';break;
	case 'ptrans';include 'misc/ptrans.php';break;
	case 'crud';include 'misc/crud.php';break;
	case 'pcrud';include 'misc/pcrud.php';break;
	case 'master';include 'master.php';break;
	case 'cari';include 'cari.php';break;
}
?>