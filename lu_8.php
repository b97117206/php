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
$way = array("bhc/bhc.php","bhc/lu_8.php","bhc/ks_1.php","bhc/nh_1.php","bhc/nt_1.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("��·","bhc/lu_8.php","$user_id");
?>
<?
	echo "<br>=============��·===============<br>";
	echo ("���������Ͼ���ͨ���Ϻ���һ�����������Կ������ﻹ��һ��·����ͨ����ɽ��<br>
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
	<a href=./ks_1.php>����ɽ��·��<a/>
	<a href=./bhc.php>���ٻ��ǡ�<a/>
	<a href=./nt_1.php>��ũ���·��<a/>
	<a href=./nh_1.php>���Ϻ���<a/>
	");
?>