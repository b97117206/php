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
$way = array("bhc/lu_4.php","bhc/lu_5.php","bhc/lu_6.php","org_zt/bhg_1.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("�����5","bhc/lu_5.php","$user_id");
?>
<?
	echo "<br>=============�����5===============<br>";
	echo ("����һ����ֱ�����������Կ���Զ�������ɽ�͡�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	$npc_org = "�����5";
    	include "../include/list_npc.inc.php"; 
    	 
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./lu_4.php>�������4��<a/>
	<a href=../org_zt/bhg_1.php>���ٻ�����<a/>
	<a href=./lu_6.php>�������6��<a/>
	");
?>