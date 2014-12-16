<?PHP
	session_start();
	include("../conf/lib.php");
	if(!isset($_SESSION[admin])){
		echo "Anda belum login....";
		go("login.php",1);
		exit();
	}
?>
<html>
<head>
<title>Toko Buku Jarot</title>
<script type="text/javascript" src="../conf/ajax.js"></script>
<script type="text/javascript" src="misc/cart.js"></script>
<script type="text/javascript" src="../conf/function.js"></script>
<link rel="stylesheet" href="../main/style.css">
<link rel="shortcut icon" href="../images/dll/logo.png">
</head>
<body onLoad="waktu()">
<center>
<div id="bfooter" style="position:fixed; background:#FFF; width:100%;position:absolute;height:108px;top:0px;z-index:1;"></div>
<div id="main">
<div id="waktu" style="z-index:3;top:85px;margin-left:0px;color:white;font-weight:bold;"></div>
<div id="menul"><br><br><br><br><br><?PHP include "menu.php"; ?></div>
<br><br><br><br><br><br>
<div id="menu"></div><br><br>
<div id="wrapper">
    <div id="navigation"> 
    <?PHP include "navigasi.php"; ?>
    </div>
    <div id="content">
    <div id="content2"> 
    <?PHP include "page.php"; ?>
    </div>
    </div>
</div>

<div id="footer"><div align="center">


</div></div>
<div style="clear:both;"></div>
</div>
<div id="bfooter" style="position:fixed; background:#FFF; width:100%;position:fixed;height:20px;bottom:0px;z-index:1;"></div>
</center>
</body>
</html>