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
$way = array("ereng/ereng_lu_l1.php","ereng/ereng_lu2.php","ereng/ereng_lu_l2.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���˹���·","ereng/ereng_lu_l1.php","$user_id");
?>
<?	
	echo "<br>==============���˹���·==============<br>";
	echo ("����һ����᫵�ɽ·����ǰ�߿���ͨ����˹�ɽ����<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(20);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_lu2.php>�����˹Ȳ�·��<a/>
	<a href=./ereng_lu_l2.php>�����˹���·2��<a/>
	");
?>