<?PHP
if($_GET['stat']==1){
	echo dlFile('b1.jpg');
}else if($_GET['stat']==2){
	echo dlFile('b2.jpg');
}else if($_GET['stat']==3){
	echo dlFile('b3.jpg');
}
?>
<fieldset>
<legend>Download Katalog</legend>
<ul>
	<li><?PHP echo "<a href='?go=informasi&stat=1'>Katalog 1</a>"; ?></li>
    <li><?PHP echo "<a href='?go=informasi&stat=2'>Katalog 2</a>"; ?></li>
    <li><?PHP echo "<a href='?go=informasi&stat=3'>Katalog 3</a>"; ?></li>
</ul>
</fieldset>

<fieldset>
<legend>Cara Membayar</legend>
<ul>
	<li>1
    <ul>
    	<li>a) </li>
    	<li>b)</li>
    	<li>c)</li>
    </ul></li>
    <li>2</li>
    <li>3</li>
</ul>
</fieldset>

<fieldset>
<legend>Keanggotaan</legend>
<ul>
	<li>Jarot Eko Saputra</li>
    <li>Dhea</li>
    <li>Eko</li>
</ul>
</fieldset>