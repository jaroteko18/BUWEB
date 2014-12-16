<h3>Pencarian Data</h3>
<form action="?go=cari" method="post">
Cari : <input type="text" name="key" />
<select name="table" onchange="get(this.value)">
<?PHP
$s=sql("show tables");
while($d=fRow($s)){
	echo "<option value='$d[0]'>".ucwords(str_replace("_"," ",$d[0]))."</option>";
}
?>
</select>
<div id="field"></div>
<input type="submit" value="go" name="cari" />
</form>
<?PHP
if($_POST['cari']){
	extract($_POST);
	$sql=sql("select * from $table where $field like '%$key%'") or die(mysql_error());
	$s=sql("desc $table");
	$n=nRow($s);
	echo $n;
	echo "<table>";
	while($d=fRow($sql)){
		echo "<tr>";
		for($i=0;$i<=$n;$i++){
			echo "<td>$d[$i]</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
?>