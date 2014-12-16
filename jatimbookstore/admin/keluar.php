<?PHP
session_start();
session_destroy();
go('index.php?go=login',0);
?>