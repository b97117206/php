<?
include "../inc/attest_lu.inc.php";
/*
===============================================================
=                 ����(Ver 0.9.0) ʹ�ù���汾(Ver 0.2)       =
             �˳������а�Ȩ��ԭ��������. �˰�Ȩ��Ϣ����ɾ��.
= Copyright (C) 2001-2002  WFoxd                              =
=                                                             =
=��Ȩ����(C)2002������ ��Ұ������� δ����� ����ʹ�� ����    =
=E-MAIL:wfoxd@cnnetgame.com                                   =
=http://www.cnnetgame.com                                     =
===============================================================
*/
include "../inc/config.inc.php";
include "../inc/style.inc.php";
//�ж�˲��
include "../include/area_now.inc.php";
$way = array("dl/jj_lu41.php","dl/jj_lu40.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("����·","dl/jj_lu40.php","$user_id");
?>
<?
	echo "<br>=============����·===============<br>";
	echo ("����һ�������˾�����С·��<br>
	");
	
	include "../inc/db.inc.php";
	$bao_time = mysql_query("SELECT bao7 FROM dl_bao");
	$bao_time = mysql_result($bao_time,0,"bao7");
	$now_time = time();
	$my_info = mysql_query("SELECT yun FROM renwu_member WHERE id='$user_id'");
	$my_yun = mysql_result($my_info,0,"yun");
	$add_exp = $my_yun * 20 + 500;
	$add_mon = $my_yun * 10 + 200;
	
	if(($now_time - $bao_time) > 72000){
		echo ("
			<p align=center><img src=$jzpic_url/bao.gif border=0></img><br>
			<font color=#D7BB5B>�㷢����һ��С����.......</font><br><br>
			��õ��ˣ�".$add_exp."�㾭��<br>
			��õ��ˣ�".$add_mon."��Ǯ<br>
			</p>			
		");
		mysql_query("UPDATE renwu_member SET exp=exp+'$add_exp',mon=mon+'$add_mon' WHERE id='$user_id'");
		mysql_query("UPDATE dl_bao SET bao7='$now_time'");
		mysql_close();		
	}else{
		echo "<br><br><font color=#D7BB5B>�����и�С���䣬������ողű��򿪹�...</font><br><br>\n";
	}
	
/*
	$npc_org = "";
    	include "../include/list_npc.inc.php";  
*/
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./jj_lu41.php>������·��<a/>
	");
?>