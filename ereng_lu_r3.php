<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹���· 1/8/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_lu_r4.php","ereng/ereng_lu_r2.php","ereng/ereng_lu_r3.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���˹���·3","ereng/ereng_lu_r3.php","$user_id");
?>
<?
	echo "<br>==============���˹���·3==============<br>";
	echo ("����һ���Ƚ�ƽ̹��ɽ·����ǰ�߿���ͨ����˹�ɽ����<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	include "../inc/db.inc.php";
	$de_b = mysql_query("SELECT n_status FROM sp_wupin WHERE id='qi_sd'");
	
	if(mysql_result($de_b,0,"n_status") == "N"){
	$npc_org = "���˹���·3";
    	include "../include/list_npc.inc.php";
	}
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_lu_r2.php>�����˹���·2��<a/>
	<a href=./ereng_lu_r4.php>�����˹���·4��<a/>
	");
?>