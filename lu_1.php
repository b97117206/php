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
$way = array("explorer.php","ereng/lu_2.php","ereng/lu_1.php","org_zt/srg_1.php","org_zt/ssjp_1.php","org_zt/xlm_1.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���","ereng/lu_1.php","$user_id");
?>
<?
	echo "<br>==============���==============<br>";
	echo ("����һ��ͨ��������ǡ����Ϸ�������������롾����ǡ��ܽ��ˣ������ԶԶ�Ŀ���
	����Ĵ��̡�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=../explorer.php>����·�ڡ�<a/>
	<a href=./lu_2.php>�����������<a/>
	<a href=../org_zt/srg_1.php>��ʥ�˹���<a/>
	<a href=../org_zt/ssjp_1.php>����ɽ���ɡ�<a/>
	<a href=../org_zt/xlm_1.php>�������š�<a/>
	");
?>