<?PHP
session_start();
?>
<link rel="stylesheet" href="../main/style.css" />
<?PHP
if(!isset($_SESSION['admin'])){
?>
<center>
<div class="login">
<div>
<fieldset><legend>Login Admin</legend>
	<form action="cek.php" method="post">
    Username<br>
    <input type="text" name="user">
    </br>
    Password<br>
    <input type="password" name="pass">
    </br>
    <input type="submit" value="masuk" class="button"> 
    </form>
    </fieldset>
</div>
</div>
</center>
<?PHP
}else{
go("index.php?go=home",0);
}
?>