<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹ȹȿ� 1/8/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_lu1.php","ereng/ereng_lu2.php","ereng/ereng_lu_l1.php","ereng/ereng_lu_r1.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���˹Ȳ�·","ereng/ereng_lu2.php","$user_id");
?>
<?
	echo "<br>==============���˹Ȳ�·==============<br>";
	echo ("������һ����·�ڣ����������ұ���·;�Ƚ�ƽ̹��������ҲԶ�˲��١�������߿��Խ�ʡ�ܶ�ʱ�䣬��ʮ��Σ�ա�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	$npc_org = "���˹Ȳ�·";
    	include "../include/list_npc.inc.php";
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_lu_l1.php>����·��<a/>
	<a href=./ereng_lu1.php>�����˹ȿڡ�<a/>
	<a href=./ereng_lu_r1.php>����·��<a/>
	");
?>