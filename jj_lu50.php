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
$way = array("dl/jj_lu49.php","dl/jj_lu48.php","dl/jj_lu50.php","bhc/bhc.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("ɭ��","dl/jj_lu50.php","$user_id");
?>
<?
	echo "<br>=============ɭ��===============<br>";
	echo ("�����Ѿ���ɭ����ˣ�͸�����������϶�����������һ�������⣬��������˾���
	�������ˡ�����Կ�������������һ���ˡ�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(20);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
	include "../inc/db.inc.php";
	$de_b = mysql_query("SELECT de_dao FROM dl_bao");
	
	if(mysql_result($de_b,0,"de_dao") == "N"){
	$npc_org = "��¹ɭ��";
    	include "../include/list_npc.inc.php";  
	}

	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./jj_lu49.php>������·��<a/>
	<a href=../bhc/bhc.php>��ͨ���ٻ��ǵ�С·��<a/>
	<a href=./jj_lu48.php>������·��<a/>
	");
?>