<?PHP
session_start();
?>
<html>
<head>
<title>Jarot / 41512120077</title>
<script type="text/javascript" src="../conf/ajax.js"></script>
<script type="text/javascript" src="misc/cart.js"></script>
<script type="text/javascript" src="../conf/function.js"></script>
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="../images/dll/logo.png">
</head>
<body onLoad="waktu()">
<?PHP
include "../conf/lib.php";
?>
<!-- <div class="abso"><div></div></div> -->
<center>
<div id="bfooter" style="position:fixed; background:#FFF; width:100%;position:absolute;height:108px;top:0px;z-index:1;"></div>

<div id="main">
<div id="search"><?PHP include "cari.php"; ?></div>
<div id="waktu" style="z-index:3;top:85px;margin-left:0px;color:white;font-weight:bold;"></div>
<div id="menul"><br><br><br><br><br><?PHP include "menu.php"; ?></div>
<br><br><br><br><br><br>
<div id="menu"></div>
<div id="header">
  <object classid="clsid:166B1BCA-3F9C-11CF-8075-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=10,1,1,0" width="900" height="180">
    <param name="src" value="../images/header.swf">
    <embed src="../images/header.swf" pluginspage="http://www.adobe.com/shockwave/download/" width="900" height="180"></embed>
  </object>
</div>
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
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>