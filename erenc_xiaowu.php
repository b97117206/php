<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=С�� 1/7/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/erenc.php","ereng/erenc_xiaowu.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���˴�С��","ereng/erenc_xiaowu.php","$user_id");
?>
<?
	echo "<br>==============���˴�С��==============<br>";
	echo ("����һ��ʮ��ƽ����С�ݣ����ƺ��������˲���ôƽ����
	<br>
	");
	
	$npc_org = "���˴�С��";
    	include "../include/list_npc.inc.php";
    	
	echo ("
	<br>
	������Է���==><br>	
	<a href=./erenc.php>�����˴塿<a/><br>
	");
?>