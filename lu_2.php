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
$way = array("ereng/lu_3.php","ereng/lu_1.php","ereng/lu_2.php");
//echo "����way".$way;
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���","ereng/lu_2.php","$user_id");
?>
<?
	echo "<br>==============���==============<br>";
	echo ("����һ��ͨ��������ǡ����Ϸ�������������롾����ǡ�����һ��·��Ҫ��������Ͻ���
	���Ҫ��һ���ˡ�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	$npc_org = "����С·2";
    	include "../include/list_npc.inc.php";  
    	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./lu_1.php>�����������<a/>
	<a href=./lu_3.php>�����������<a/>
	");
?>