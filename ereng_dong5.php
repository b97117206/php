<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹���· 1/8/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_dong4.php","ereng/ereng_dong5.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("����","ereng/ereng_dong5.php","$user_id");
?>
<?
	echo "<br>==============���ڲ�·3==============<br>";
	echo ("
	�����ƺ��Ǹ���·��<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";
	include "../inc/db.inc.php";
	$bao_time = mysql_query("SELECT ereng_bao1 FROM ereng_bao");
	$bao_time = mysql_result($bao_time,0,"ereng_bao1");
	$now_time = time();
	$my_info = mysql_query("SELECT yun FROM renwu_member WHERE id='$user_id'");
	$my_yun = mysql_result($my_info,0,"yun");
	$add_exp = $my_yun * 10 + 200;
	$add_mon = $my_yun * 5 + 100;
	
	if(($now_time - $bao_time) > 7200){
		echo ("
			<p align=center><img src=$jzpic_url/bao.gif border=0></img><br>
			<font color=#D7BB5B>�㷢����һ��С����.......</font><br><br>
			��õ��ˣ�".$add_exp."�㾭��<br>
			��õ��ˣ�".$add_mon."��Ǯ<br>
			</p>			
		");
		mysql_query("UPDATE renwu_member SET exp=exp+'$add_exp',mon=mon+'$add_mon' WHERE id='$user_id'");
		mysql_query("UPDATE ereng_bao SET ereng_bao1='$now_time'");
		mysql_close();		
	}else{
		echo "<br><br><font color=#D7BB5B>�����и�С���䣬������ողű��򿪹�...</font><br><br>\n";
	}
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong4.php>�����ڲ�·2��<a/>
	");
?>