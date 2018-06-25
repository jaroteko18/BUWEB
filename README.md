# BUWEB E-Commerce (PHP & NO FRAMEWORK)

BUWEB is a open source project E-Commerce built on top of Pure PHP with NO Framework 

Role :

 * Pembeli
 * Penjual
 * Pemesan
 * Admin (User/pass admin/admin)

Daftar Fitur :
 
 * Produk/Barang
 * Detail Barang
 * Keranjang Belanja
 * Berita
 * Sistem Checkout
 * Daftar Pencarian
 * Management Data Pembeli, Penjual, dan pemesanan barang
 * Management Admin
 * Master Data (CRUD)
 * Komentar
 * Informasi Penjual, Pemesan & Pembeli
 
Setting Database

```php
//dir conf->setting.php
$host	= "localhost";
$user	= "root";
$pass	= "";
$db   = "jatimbookstore";
```

Setting Library

```php
//dir conf->lib.php
$connect=konek();
function konek(){
include("setting.php");
    $conn=mysql_connect($host,$user,$pass);
    $db=mysql_select_db($db,$conn);
    error_reporting(0);
    return $conn;
}
function fRow($sql){
    return mysql_fetch_row($sql);
}
function go($url,$time){
  echo "<meta http-equiv='refresh' content='$time,$url' />";
}
//anda bisa menambahkan function, constant variable, dll sendiri disini
```

## Contributors:

 * [Jarot Eko Saputra](http://id.linkedin.com/pub/jarot-eko-saputra/44/6a8/24b)

Want your name here? Go fork this repo and send pull request with your name in this file 
