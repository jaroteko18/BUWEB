<?PHP
session_start();

if(!isset($_SESSION['user'])){
?>
<div class="login">
<fieldset><legend>Login</legend>
	<form action="cek.php" method="post">
    Username<br>
    <input type="text" name="user">
    </br>
    Password<br>
    <input type="password" name="pass">
    </br>
    <input type="submit" value="masuk" class="button"> | <a href=?go=proses&mode=register class=button>Daftar</a>
    </form></fieldset>
	<br /><br />
</div>
<?PHP
}else{
echo "
<fieldset>
<legend>Info</legend>
Anda Sudah Login sebagai ".$_SESSION['user']['nama']." 
</fieldset>
";
}
?>