<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹�ɽ�� 1/8/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_dong3.php","ereng/ereng_dong4.php","ereng/ereng_dong2.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("����","ereng/ereng_dong3.php","$user_id");
?>
<?
	echo "<br>==============���ڲ�·1==============<br>";
	echo ("
	ɽ��������ֲ���������а��֮���������������˵�����һ���ܲ��˵ġ�<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";
	$lu = "lu";
    	session_register("killls");
    	$npc_org = "����3";
    	include "../include/list_npc.inc.php";
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong2.php>�����ڡ�<a/>
	<a href=./ereng_dong4.php>�����ڲ�·2��<a/>
	");
?>