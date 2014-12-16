<?PHP
	session_start();
	include '../../../buweb/js/lib.php';
	sleep(1);
	$id=$_GET[id];
	$_SESSION[keranjang][$id]=0;
	$_SESSION[jumI]=0;
	$_SESSION[jumJ]=0;
	foreach($_SESSION[keranjang] as $id=>$val){
		if($val>0){
			$_SESSION[jumI]+=$val;
			$_SESSION[jumJ]+=1;
		}
	}
?>
	<div id="infoCart">
    <?php
        if(isset($_SESSION[keranjang])){	
            echo "<table>";
            foreach($_SESSION[keranjang] as $id_b=> $val){	
                if($val>0){
                    $sql=mysql_query("select * from barang where id_barang='$id_b'");
                    $data=fRow($sql);
                        $tot+=$val*$data[4];
                        echo "<tr>";
                        echo "<td><a href=javascript:void(0) id='d".$data[0]."' onclick=del(".$data[0].")><img src='../images/site/x.gif'></a></td><td>$val<td></td><td>x</td><td><a href=?go=det_barang&id_barang=$data[0]>$data[2]</a></td>";
                        echo "<tr>";
                }
            }
            echo "</table>";
            echo "<div style='text-align:right; margin:0px; padding:0px; border:0px solid gray; width:180px; font-size:11px;'><b>Total Harga:</b> ".uang($tot)."<br />";
            echo "<b>Jumlah Barang:</b> ".$_SESSION[jumI]."<br />";
            echo "<b>Jumlah Jenis:</b> ".$_SESSION[jumJ]."<br /></div>";
            echo "<a href=?go=cart>[View Cart]</a> <a href=?go=login>[Checkout]</a>";
        }
    ?>
    </div>