<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$huifu=$_GET['huifu'];
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
==============
=
=��Ԫ 2002������
==============
*/
//�ж�˲��
include "./include/area_now_ct.inc.php";
$way = array("bhc/bhc.php","shenshou.php");
area_now($way,$user_id);
//��¼λ��
include "./include/location.inc.php";
up_location("ʥ�ֻش�","shenshou.php","$user_id");
?>
<?
	echo "<br>=============ʥ�ֻش�===============<br>";
	echo ("������ʥ�ֻش��ļң�����Կ���һ������ģ��������
	�������ϡ��������Ƽ���������˫�����԰�����ָ�������<br>
	ע�⣺�������ƽ���ʧ�ķ�֮һ���顣<br>
	");
	echo "<a href=shenshou.php?huifu=1>��������</a>";
	echo "<br><a href=shenshou.php?huifu=2>�Է��ڹ�</a>";
/*
	$npc_org = "ʥ�ֻش�";
    	include "../include/list_npc.inc.php";  
*/
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./bhc/bhc.php>����֡�<a/>
	");
	
	if($huifu == 1){
		include "./inc/db.inc.php";
		$myinfo = mysql_query("SELECT hp FROM renwu_member where id='$user_id'");
		
		$my_hp = mysql_result($myinfo,0,"hp");
		
		if($my_hp >= 100){
			echo "<font color=red>����ֻ������Щ����ʮ�����ص��˻ָ���</font>";
			mysql_close();
			exit();
		}
	mysql_query("UPDATE renwu_member SET hp=150,exp=exp*0.75 WHERE id='$user_id'");
	echo "<font color=red>���ֻش�����ʩչ��������ָ��ˡ�����</font>";
	
	mysql_close();
	}
	if($huifu == 2){
		include "./inc/db.inc.php";
		$myinfo = mysql_query("SELECT hp FROM renwu_member where id='$user_id'");
		
		$my_hp = mysql_result($myinfo,0,"hp");
		
		if($my_hp >= 100){
			echo "<font color=red>����ֻ������Щ����ʮ�����ص��˻ָ���</font>";
			mysql_close();
			exit();
		}
		mysql_query("UPDATE renwu_membe SET en=0,ennow=0 WHERE id='$user_id'");
		mysql_query("UPDATE renwu_wugong SET wugongexp=1 WHERE id='$user_id' AND cla='�ڹ�'");
		echo "<font color=red>���ֻش�����ʩչ����ʹ����ڹ�ȫ��ʧȥ�ˡ�����</font>";
	}
?>