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
=���˹� 1/9/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_dong13.php","ereng/ereng_dong14.php","ereng/ereng_dong12.php","ereng/ereng_dong11.php");
area_now($way,$user_id);
?>
<?
	echo "<br>==============���ڲ�·10==============<br>";
	echo ("
	ɽ��������ֲ���������а��֮���������������˵�����һ���ܲ��˵ġ�<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";
	
	include "../inc/db.inc.php";
	
	$npc_info = mysql_query("SELECT hpnow FROM npc_member WHERE id='erc_lld'");
	$npc_hpnow= mysql_result($npc_info,0,"hpnow");
	if($npc_hpnow > 80 && $lu == "killld"){
		echo "<p><font color=#6DA2B6>���ϴ�ͻȻ�����������������ǰ.....\n";
		echo "<br>���ϴ����˵��:���������������ȥ��İɣ�\n";
		echo "<br>�������ϴ󲻻�����ȥ���ˡ�</font>\n";
		echo "<br><br><a href=./ereng_dong11.php>���ض��ڲ�·9��<a/>\n";
		mysql_close();
		exit();
    	}    	
    	include "../include/location_lu.inc.php";
	up_location("����","ereng/ereng_dong12.php","$user_id");
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong11.php>�����ڲ�·9��<a/>
	<a href=./ereng_dong14.php>�����ڲ�·12��<a/>
	<a href=./ereng_dong13.php>�����ڲ�·11��<a/>
	");
?>