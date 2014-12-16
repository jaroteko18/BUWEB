<?PHP
	$conn=konek();
	function konek(){
		include "setting.php";
		$conn=mysql_connect($host,$user,$pass);
		$db=mysql_select_db($db,$conn);
		error_reporting(0);
		return $conn;
	}
	function sql($sql){
		return mysql_query($sql);
	}
	function fObj($sql){
		return mysql_fetch_object($sql);
	}
	function fArr($sql){
		return mysql_fetch_array($sql);
	}
	function fRow($sql){
		return mysql_fetch_row($sql);
	}
	function nRow($sql){
		return mysql_num_rows($sql);
	}
	function uang($n){
		return "Rp. ".number_format($n,0,",",".")." ,-";
	}
	function go($url,$time){
		echo "<meta http-equiv='refresh' content='$time,$url'>";
	}
?>