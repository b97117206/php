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
$way = array("ereng/ereng_dong3.php","ereng/ereng_dong1.php","ereng/ereng_dong2.php");
area_now($way,$user_id);
?>
<?
	echo "<br>==============����==============<br>";
	echo ("
	ɽ��������ֲ���������а��֮���������������˵�����һ���ܲ��˵ġ�<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";
	
	include "../inc/db.inc.php";
	
	$npc_info = mysql_query("SELECT hpnow FROM npc_member WHERE id='ereng_ls'");
	$npc_hpnow= mysql_result($npc_info,0,"hpnow");
	if($npc_hpnow > 80 && $lu == "killls"){
		echo "<p><font color=#6DA2B6>����ͻȻ�����������������ǰ.....\n";
		echo "<br>���Ķ���˵��:�����Ѿ��������ּ�ׯ����ռ�ˣ��㻹�ǿ���ɣ�\n";
		echo "<br>�������Ĳ�������ȥ���ˡ�</font>\n";
		echo "<br><br><a href=./ereng_dong1.php>���ض���ɽ���ڡ�<a/>\n";
		mysql_close();
		exit();
    	}    	
    	include "../include/location_lu.inc.php";
	up_location("����","ereng/ereng_dong2.php","$user_id");
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong1.php>�����ڡ�<a/>
	<a href=./ereng_dong3.php>�����ڲ�·1��<a/>
	");
?>