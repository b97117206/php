<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=С·1 1/5/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/lu_3.php","ereng/lu_2.php","ereng/lu_4.php","ereng/xiaodian_1.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���","ereng/lu_3.php","$user_id");
?>
<?
	echo "<br>==============���==============<br>";
	echo ("����һ��ͨ��������ǡ����Ϸ����������������һֱͨ��Զ����<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./lu_2.php>�����������<a/>	
	<a href=./xiaodian_1.php>��С�꡿<a/>
	<a href=./lu_4.php>�����������<a/>
	");
?>