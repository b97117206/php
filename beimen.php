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
$way = array("bhc/lu_7.php","bhc/beimen.php","bhc/bhc.php","org_zt/wd_1.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("����","bhc/beimen.php","$user_id");
?>
<?
	echo "<br>=============����===============<br>";
	echo ("������ǡ��ٻ��ǡ������ˣ�����Կ������ﷱ���ľ���<br>
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
	<a href=./lu_7.php>�������<a/>
	<a href=./bhc.php>�����ǡ�<a/>
	<a href=../org_zt/wd_1.php>�������䵱�����<a/>
	");
?>