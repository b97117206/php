<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=
=��Ԫ 2002������
==============
*/
//�ж�˲��
include "../include/area_now.inc.php";
$way = array("bhc/lu_6.php","bhc/lu_7.php","bhc/beimen.php","org_zt/sbls_1.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("�����7","bhc/lu_7.php","$user_id");
?>
<?
	echo "<br>=============�����7===============<br>";
	echo ("�����������ǡ�����ǡ������߾������ĳ��С��ٻ��ǡ������
	�Կ�������·���ֿ���ƽ��<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
/*
	$npc_org = "";
    	include "../include/list_npc.inc.php";  
*/
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./lu_6.php>�������6��<a/>
	<a href=../org_zt/sbls_1.php>��ˮ����ɽ��<a/>
	<a href=./beimen.php>�������š�<a/>
	");
?>