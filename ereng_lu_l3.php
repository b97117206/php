<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$lu=$_SESSION['lu'];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹���· 1/8/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_lu_l3.php","ereng/ereng_dong1.php","ereng/ereng_lu_l2.php");
area_now($way,$user_id);
include "../include/location_lu.inc.php";
up_location("���˹���·3","ereng/ereng_lu_l3.php","$user_id");
?>
<?
	echo "<br>==============���˹���·3==============<br>";
	echo ("����һ����᫵�ɽ·��������Կ������˹�ɽ���Ķ����ˡ�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(20);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	include "../inc/db.inc.php";
	
	
	
	$npc_info = mysql_query("SELECT hpnow FROM npc_member WHERE id='ereng_lq'");
	$npc_hpnow= mysql_result($npc_info,0,"hpnow");
	if($npc_hpnow > 80 && $lu == "kill"){
		echo "<p><font color=#6DA2B6>����ͻȻ�����������������ǰ.....\n";
		echo "<br>���߶���˵��:Ҫ���������������Ӯ���ҡ�\n";
		echo "<br>�������߲�������ȥ���ˡ�</font>\n";
		echo "<br><br><a href=./ereng_lu_l2.php>���ض��˹���·2��<a/>\n";
		mysql_close();
		exit();
    	}    	
  
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_lu_l2.php>�����˹���·2��<a/>
	<a href=./ereng_dong1.php>�����˹�ɽ����<a/>
	");
?>